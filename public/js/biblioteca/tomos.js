/*  *****    Cambuio de iconos en menu de ventana para la vista de tomos    *****   */
    $('#buscar').css('display', 'none');
    $('#iconoBuscar').css('display', 'none');
    $('#navegacionVentana').addClass('menuNavegacionVentana');
    $('.imgLogo').attr('src', '../../../imagenes/biblioteca/imgMenu/ventanaEducativa.png');
    $('.appsLogo').attr('src', '../../../imagenes/biblioteca/imgMenu/menu.png');
    $('#img-usuario').attr('src', '../../../imagenes/biblioteca/imgMenu/registro.png');
    $('#navegacionVentana').addClass('fondoDegradadoMenuInicial');
    
    if($(window).width() < 768){
        $('#myNavbar').addClass('fondoDegradadoMenuInicial');
    }

    $(document).ready(function () {
        activaAnimacion = true;
        var contenedor = '#contenedor11';
        anchoCol = $(contenedor).width() * 1.25;
        anchoAumenta = anchoCol * 3.17;
        altoLomos = $('#imagenLomo1').height();
        anchoLomos = $('#imagenLomo1').width();
        $('.imagenLomo').css('height', altoLomos);
        $('.imagenLomo').css('width', anchoLomos);
        $('.imagenDescribe').css('height', altoLomos);
        anchoMargen = $('#columnaMargen1').width();
    });
/*   *****   Muestra las imagenes con descripciones de las bibliotecas y agrega los efectos de movimiento    *****   */
    function muestraDescripcion(elem, libro) {
        var contenedor = '#contenedor' + elem + libro;
        $(contenedor).css('width', anchoAumenta);
        var colMargen = '#columnaMargen' + elem;
        $(colMargen).css('width', '0px');
        var contenedorDescr = '#descripcion' + elem + libro;
        $(contenedorDescr).removeClass('ocultaImgDescribe');
        var textoLigaBiblio = '#ligaBiblioteca' + elem + libro;
        $(textoLigaBiblio).css('display', 'block');
    }
/*   *****   Oculta las imagenes con descripciones de las bibliotecas y agrega los efectos de movimiento    *****   */
    function ocultaDescripcion(elem, libro) {
        activaAnimacion=false;
        recuperaAncho = anchoCol * 1.20;
        var contenedor = '#contenedor' + elem + libro;
        $(contenedor).css('width', recuperaAncho);
        var colMargen = '#columnaMargen' + elem;
        $(colMargen).css('width', anchoMargen);
        var contenedorDescr = '#descripcion' + elem + libro;
        $(contenedorDescr).addClass('ocultaImgDescribe');
        var textoLigaBiblio = '#ligaBiblioteca' + elem + libro;
        $(textoLigaBiblio).css('display', 'none');
        setTimeout(function(){ activaAnimacion = true; }, 800);
    }
    $(window).scroll(function () {
        var scroll_v = this.pageYOffset;
        if (scroll_v > 10) {
            $('#navegacionVentana').removeClass('fondoDegradadoMenuInicial');
            $('#navegacionVentana').addClass('fondoDegradadoMenu');
        }
        if (scroll_v < 10) {
            $('#navegacionVentana').removeClass('fondoDegradadoMenu');
            $('#navegacionVentana').addClass('fondoDegradadoMenuInicial');
        }
    });