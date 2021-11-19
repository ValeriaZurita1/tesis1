function guardarReporteGame(){


    var JSONRoles = [];

    var rolNuevo = {};

    		rolNuevo.name = "Ok";
    		rolNuevo.jugador = "Ok";
            rolNuevo.ok = "Ok";
            rolNuevo.acciones = "Ok";
            rolNuevo.aciertos = "Ok";
            rolNuevo.tiempo = "Ok";

    JSONRoles.push(rolNuevo);

    var reportesJson = JSON.stringify(JSONRoles);

	$.ajax({
        type: "POST",
        url: "reports/store",
        data: reportesJson,
        success: function (data) {
            alert('ok');
        },
        error: function (error) {
            alert('no');
        }
    });

}

function tiempoEjecucion(){
	$('iframe').contents().find('button.JClicCountCnt').click(function(){
		$('.btnGuardar').removeAttr('disabled');
	});
}

function guardarReporteGame1(){
    console.log('Guardar Reportes');
	var res = $('iframe').contents().find('.JCDetailed tr').last().find('td');
	var con = 0;
    console.log('res ', res);
	$.each(res, function () {
		var td = $(this).text();
		if (con>=2){
			$('input:text').eq(con).val(td);
		}
		con++;
	});

	$('input:submit').click();
}

setInterval(tiempoEjecucion, 3000);
