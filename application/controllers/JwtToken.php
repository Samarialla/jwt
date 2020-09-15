<?php
require APPPATH . '/libraries/CreatorJwt.php';

class JwtToken extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->objOfJwt = new CreatorJwt();
        header('Content-Type: application/json');
    }

    /*************Ganerate token this function use**************/

    public function CreaCuenta()
    {
      $tarjeta=  $this->input->post('tarjeta');
      $precio=   $this->input->post('precio');
        $tokenData['idtarjeta'] = '0001';
        $jwtToken = $this->objOfJwt->GenerateToken($tokenData);
        $token = $jwtToken;
        $randon = rand();
        // idDeuda es opcional, pero recomendado
        $idDeuda = 'demo'.$randon;
        $apiUrl = 'https://staging.adamspay.com/api/v1/debts?update_if_exists=1';
        $apiKey = 'adams-0260148c0610d7';
        // Hora DEBE ser en UTC!
        $ahora = new DateTimeImmutable('now', new DateTimeZone('UTC'));
        $expira = $ahora->add(new DateInterval('P2D'));

        // Crear modelo de la deuda
        $deuda = [
           'docId' => $idDeuda,
            'label' => $tarjeta,
            'amount' => ['currency' => 'PYG', 'value' => $precio],
            'validPeriod' => [
                'start' => $ahora->format(DateTime::ATOM),
                'end' => $expira->format(DateTime::ATOM)
            ]
        ];

        // Crear JSON para el post
        $post = json_encode(['debt' => $deuda]);


        // Hacer el POST
        $curl = curl_init();
          curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_HTTPHEADER => ['apikey: ' . $apiKey, 'Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0

           

        ]);

        $response = curl_exec($curl);
        if ($response) {
            $data = json_decode($response, true);

            // Deuda es retornada en la propiedad "debt"
            $payUrl = isset($data['debt']) ? $data['debt']['payUrl'] : null;
            if ($payUrl) {
               // echo "Deuda creada exitosamente\n";
                $jsondata['success'] = true;
                $jsondata['url'] =$payUrl;
                echo json_encode($jsondata);
            } else {
                   $jsondata['success'] = false;
                $jsondata['retorno'] = $data['meta'];
                $jsondata['error'] ='No se pudo crear la deuda';
            }
        } else {
            echo 'curl_error: ', curl_error($curl);
        }
        curl_close($curl);
    }
}
