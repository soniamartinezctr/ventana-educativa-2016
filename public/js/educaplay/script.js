    $(document).ready(function () {
//        $().mouseover ({
//            $.ajax (){
//                url : 
//            }
//        });
        /* Additional Javascript (required) */
        $('#carouselVod').carousel({
            pause: 'none'
        })
        $('#carreteSerie1').carousel({
            interval: false
        })
        $('#carreteSerie2').carousel({
            interval: false
        })
    });
    function muestraDetalle(numDiv) {
        var nombreDivDetalle = '#detalleSerie' + numDiv;
        $(nombreDivDetalle).css('display', 'block');
        var windowTop = $(nombreDivDetalle).offset().top - '350';
        $(document).scrollTop(windowTop)
    }

    function cierraDetalle(numDiv) {
        var nombreDivDetalle = '#detalleSerie' + numDiv;
        $(nombreDivDetalle).css('display', 'none');
    }
    function muestraTitulo(idTitulo) {
        var divTitulo = '#titulo' + idTitulo;
        $(divTitulo).removeClass('escondeTitulo');
        /*var nombreImagen = '#imagen' + idTitulo;
         $(nombreImagen).attr("src","{{url('imagenes/educaplay/educacionVanguardia/thumbnailVertical2.jpg')}}");*/
    }
    function ocultaTitulo(idTitulo) {
        var divTitulo = '#titulo' + idTitulo;
        $(divTitulo).addClass('escondeTitulo');
        /*var nombreImagen = '#imagen' + idTitulo;
         $(nombreImagen).attr("src","{{url('imagenes/educaplay/educacionVanguardia/thumbnailVertical.jpg')}}");*/
    }