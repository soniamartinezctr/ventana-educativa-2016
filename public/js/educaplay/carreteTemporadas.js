	function abreDivDetalle(respuesta, filaDiv){
		var nombreDivDetalle = '#ventanaSerie' + filaDiv;
		$(nombreDivDetalle).html(respuesta);
		$(nombreDivDetalle).css('display', 'block');
		var btnCerrarDesc = '#btnCerrarDesc' + filaDiv;
		$(btnCerrarDesc).css('display', 'block');
		var windowTop = $(nombreDivDetalle).offset().top - '300';
		$(document).scrollTop(windowTop);
	}
	
    function muestraDetalle(numDiv,serieId) {
		var urlget = "educaplay/descripcionSerie";
		var _url = urlget + '/' + serieId + '/' + numDiv;
		$.ajax({
			method: "GET",
			url: _url,
            divFila: numDiv,
			error: function (ts) {
				var msjSinDatos = '<div class="col-md-4 col-md-offset-4" style="padding:80px;"><p style="color:white; font-size:2em;"> P R Ó X I M A M E N T E </p></div>';
				abreDivDetalle(msjSinDatos, numDiv);
				console.log(ts.responseText);
			}})
			.done(function (msg) {
				console.log('Comentarios cargados: ' + serieId);
				abreDivDetalle(msg, numDiv);
				//                    console.log ( "Data Saved: " + msg );
			});
    }
	
    function cierraDetalle(numDiv) {
        var nombreDivDetalle = '#ventanaSerie' + numDiv;
        $(nombreDivDetalle).css('display', 'none');
		var btnCerrarDesc = '#btnCerrarDesc' + numDiv;
        $(btnCerrarDesc).css('display', 'none');
    }
    function muestraTitulo(idTitulo) {
        var divTitulo = '#titulo' + idTitulo;
        $(divTitulo).removeClass('escondeTitulo');
		var nombreImg = "#imagen"+ idTitulo;
        $(nombreImg).addClass('opacaImg');
    }
    function ocultaTitulo(idTitulo) {
        var divTitulo = '#titulo' + idTitulo;
        $(divTitulo).addClass('escondeTitulo');
		var nombreImg = "#imagen"+ idTitulo;
        $(nombreImg).removeClass('opacaImg');
    }