$("#submit").click(function (event) {
	event.preventDefault();
	var tarjeta = $("#select option:selected").text();
    var precio = $("#precio").val();
    console.log(precio);

	if (tarjeta != "" && precio != "") {
		$.ajax({
			method: "POST",
			url: "JwtToken/CreaCuenta",
			data: { precio: precio, tarjeta: tarjeta },
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR);
			},
		}).done(function (msg) {
			$("#succes").show();
			$("#alerta").html("<a  href=" + msg.url + " target='_blank'><em>" + msg.url + "</em></a>");
			$("#select").attr("disabled", true);
			$("#precio").attr("disabled", true);
			$("#cancelar").hide();
			$("#submit").hide();
		});
	} else {
        $("#notificacion").html("<p>Favor cargar los datos, algun dato aun no se encuentra listo </p>");
        $("#notificacion").fadeIn(1500);
        setTimeout(function() {
        $("#notificacion").fadeOut(1500);
    }, 5000);
	}
});
$("#succes").hide();
