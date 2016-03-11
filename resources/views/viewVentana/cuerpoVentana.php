	<style>
		.difumina{
			-webkit-filter: blur(3px);
			-moz-filter: blur(3px);
			-o-filter: blur(3px);
			-ms-filter: blur(3px);
			filter: blur(3px);
		}
		.txtHomeLg{
			font-size:1.8em;
			font-family: 'Ubuntu';
		}
		.txtHomeMd{
			font-size:1.3em;
			font-family: 'Ubuntu';
		}
		.txtHomeSm{
			font-size:1em;
			font-family: 'Ubuntu';
		}
		.txtHomeXs{
			font-size:0.6em;
			font-family: 'Ubuntu';
		}
		.contieneTxt{
			color: white;
			font-size:16px;
			visibility:hidden;
		}
	</style>
<script>

    /*	---------------------------------------	Sección Usabilidad. Agregar animación de entrada a imagenes 	--------------------------------*/
    function cambiaImgFoto(imagen) {
        imagenCubo = '#CUBO' + imagen;
        imagenFoto = 'imagenes/homeventana/FOTO-' + imagen + '.png';
        $(imagenCubo).attr('src', imagenFoto);
    }
    function cambiaImgCubo(imagen) {
        imagenFoto = '#CUBO' + imagen;
        imagenCubo = 'imagenes/homeventana/CUBO-' + imagen + '.png';
        $(imagenFoto).attr('src', imagenCubo);
    }
    function quitaEfxDifumina(clase) {
        var elems = $(clase);    //elementos que quiero saber si estan en el área visible
        elems.each(function () {
            $(this).removeClass("difumina");
        });
    }
    function muestraCubos() {
        var Intervalo4 = $('.Intervalo4');    //elementos que quiero saber si estan en el área visible
        Intervalo4.each(function () {
            var cubo = $(this);
            setTimeout(function () {
                cubo.addClass("animated");
                cubo.css("visibility", "visible");
                cubo.fadeIn();
                setTimeout(function () {
                    quitaEfxDifumina('.Intervalo4');
                }, 750);
            }, 1000);
        });
        var Intervalo3 = $('.Intervalo3');    //elementos que quiero saber si estan en el área visible
        Intervalo3.each(function () {
            var cubo = $(this);
            setTimeout(function () {
                cubo.addClass("animated");
                cubo.css("visibility", "visible");
                cubo.fadeIn();
                setTimeout(function () {
                    quitaEfxDifumina('.Intervalo3');
                }, 750);
            }, 750);
        });
        var Intervalo2 = $('.Intervalo2');    //elementos que quiero saber si estan en el área visible
        Intervalo2.each(function () {
            var cubo = $(this);
            setTimeout(function () {
                cubo.addClass("animated");
                cubo.css("visibility", "visible");
                cubo.fadeIn();
                setTimeout(function () {
                    quitaEfxDifumina('.Intervalo2');
                }, 750);
            }, 500);
        });
        var Intervalo1 = $('.Intervalo1');    //elementos que quiero saber si estan en el área visible
        Intervalo1.each(function () {
            var cubo = $(this);
            setTimeout(function () {
                cubo.addClass("animated");
                cubo.css("visibility", "visible");
                cubo.fadeIn();
                setTimeout(function () {
                    quitaEfxDifumina('.Intervalo1');
                }, 750);
            }, 250);
        });
    }
    $(document).ready(function () {
        $(function () {
            var elems = $('.oculta');    //elementos que quiero saber si estan en el área visible
            elems.each(function () {
                $(this).fadeOut();
            });
            muestraCubos();
        });

        /* ------    Se llama la función que redimensiona mapas de imagenes responsivas -----  */
        $(document).ready(function (e) {
            $('img[usemap]').rwdImageMaps();
        });
    })
</script>
		<div class="container-fluid">
		    <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:30px;">
				</div>
			</div>
            <div class="row">
				<div class="visible-md-inline visible-lg-inline">
					<div style="padding:2%;">
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1" style="padding-top: 8.9%; padding-left:0; padding-right:0;">
					<img name="CUBO01" id="CUBO01" class="oculta difumina Intervalo4 slideInLeft" src="imagenes/homeventana/CUBO-01.png" usemap="#mapacubo1" style="width:170%; height:170%; position: relative; left:30%; z-index:3; visibility:hidden;"/>
					<map name="mapacubo1" id="mapacubo1">
						<area shape="poly" coords="0,424,424,0,920,424,480,920" onmouseover="cambiaImgFoto('01')" onmouseout="cambiaImgCubo('01')" href="#"/>
						<area shape="poly" coords="528,0,920,0,920,392" onmouseover="cambiaImgFoto('02')" onmouseout="cambiaImgCubo('02')" href="#"/>
						<area shape="poly" coords="888,468,940,960,400,880" /> <!--onmouseover="cambiaImgFoto('03')" onmouseout="cambiaImgCubo('03')" -->
					</map>
					<a href="#">
						<img id="imgCI" class="oculta difumina Intervalo4 slideInLeft" src="imagenes/homeventana/canal_ibero.png" onmouseover="cambiaImgFoto('01')" onmouseout="cambiaImgCubo('01')" style="width:70%; height:25%; position: absolute; top: 55%; left:75%; z-index:3; visibility:hidden;"/>
					</a>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding:3%; padding-left:0px; padding-right:0px;">
					<img id="CUBO02" class="oculta difumina Intervalo3 slideInLeft" src="imagenes/homeventana/CUBO-02.png" usemap="#mapacubo2" style="width:155%; height:155%; position: relative; left:30%; z-index:2; visibility:hidden;"/>
					<img id="CUBO03" class="oculta difumina Intervalo3 slideInLeft" src="imagenes/homeventana/CUBO-03.png" usemap="#mapacubo3" style="width:155%; height:70%; position: absolute; left:25%; z-index:2; visibility:hidden;"/>
					<map name="mapacubo2" id="mapacubo2">
						<area shape="poly" coords="0,356,356,0,708,360,360,708" onmouseover="cambiaImgFoto('02')" onmouseout="cambiaImgCubo('02')" href="#"/>
					</map>
					<map name="mapacubo3" id="mapacubo3">
						<area shape="poly" coords="0,388,388,0,840,388,420,820" /> <!--onmouseover="cambiaImgFoto('03')" onmouseout="cambiaImgCubo('03')" -->
					</map>
					<div class="contieneTxt oculta difumina Intervalo3 slideInLeft" onmouseover="cambiaImgFoto('02')" onmouseout="cambiaImgCubo('02')" style="position:absolute; top:40%; left:60%; Z-index:5;">
						<p class="visible-lg-inline txtHomeLg">Idiomas</p>
						<p class="visible-md-inline txtHomeMd">Idiomas</p>
						<p class="visible-sm-inline txtHomeSm">Idiomas</p>
						<p class="visible-xs-inline txtHomeXs" style="position: relative; top:-10px; left:-7px;">Idiomas</p>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-top: 8.3%; padding-left:0px; padding-right:0px;">
					<img id="CUBO04" class="oculta difumina Intervalo2 slideInLeft" src="imagenes/homeventana/CUBO-04.png" usemap="#mapacubo4" style="width:178%; height:178%; position: relative; left:-8%; z-index:3; visibility:hidden;"/>
					<map name="mapacubo4"  id="mapacubo4">
						<area shape="poly" coords="0,456,456,0,912,456,456,912" onmouseover="cambiaImgFoto('04')" onmouseout="cambiaImgCubo('04')" href="#"/>
						<area shape="poly" coords="0,456,0,0,456,0" onmouseover="cambiaImgFoto('02')" onmouseout="cambiaImgCubo('02')" href="#"/>
						<area shape="poly" coords="-20,400,-20,960,520,960" /> <!--onmouseover="cambiaImgFoto('03')" onmouseout="cambiaImgCubo('03')" -->
					</map>
					<div class="contieneTxt oculta difumina Intervalo2 slideInLeft" onmouseover="cambiaImgFoto('04')" onmouseout="cambiaImgCubo('04')" style="position:absolute; top:60%; left:45%; Z-index:5;">
						<p class="visible-lg-inline txtHomeLg">Padres</p>
						<p class="visible-md-inline txtHomeMd">Padres</p>
						<p class="visible-sm-inline txtHomeSm">Padres</p>
						<p class="visible-xs-inline txtHomeXs" style="position: relative; top:-8px; left:-6px;">Padres</p>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding:0%">
					<img id="CUBO05" class="oculta difumina Intervalo1 slideInLeft" src="imagenes/homeventana/CUBO-05.png" usemap="#mapacubo5" style="width:187%; height:187%; position: relative; left:-18%; z-index:4; visibility:hidden;"/>
					<img id="CUBO06" class="oculta difumina Intervalo1 slideInLeft" src="imagenes/homeventana/CUBO-06.png" usemap="#mapacubo6" style="width:187%; height:187%; position: relative; left:-18%; z-index:4; visibility:hidden;"/>
					<map name="mapacubo5" id="mapacubo5">
						<area shape="poly" coords="0,488,488,0,976,488,488,976" onmouseover="cambiaImgFoto('05')" onmouseout="cambiaImgCubo('05')" href="#"/>
						<area shape="poly" coords="0,524,490,1030,0,1030" onmouseover="cambiaImgFoto('04')" onmouseout="cambiaImgCubo('04')" href="#"/>
					</map>
					<map name="mapacubo6" id="mapacubo6">
						<area shape="poly" coords="0,488,488,0,1020,500,510,1020" onmouseover="cambiaImgFoto('06')" onmouseout="cambiaImgCubo('06')" href="#"/>
						<area shape="poly" coords="0,0,488,0,0,488" onmouseover="cambiaImgFoto('04')" onmouseout="cambiaImgCubo('04')" href="#"/>
					</map>
					<div class="contieneTxt oculta difumina Intervalo1 slideInLeft" onmouseover="cambiaImgFoto('05')" onmouseout="cambiaImgCubo('05')" style="position:absolute; top:20%; left:30%; Z-index:5;">
						<p class="visible-lg-inline txtHomeLg">Primaria</p>
						<p class="visible-md-inline txtHomeMd">Primaria</p>
						<p class="visible-sm-inline txtHomeSm">Primaria</p>
						<p class="visible-xs-inline txtHomeXs" style="position: relative; top:-10px; left:-7px;">Primaria</p>
					</div>
					<div class="contieneTxt oculta difumina Intervalo1 slideInLeft" onmouseover="cambiaImgFoto('06')" onmouseout="cambiaImgCubo('06')" style="position:absolute; top:70%; left:50%; Z-index:5;">
						<p class="visible-lg-inline txtHomeLg">VOD</p>
						<p class="visible-md-inline txtHomeMd">VOD</p>
						<p class="visible-sm-inline txtHomeSm">VOD</p>
						<p class="visible-xs-inline txtHomeXs" style="position: relative; top:-8px; left:-5px;">VOD</p>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-top:6.8%; padding-left:0px; padding-right:0px;">                                    
					<img id="CUBO07" src="imagenes/homeventana/CUBO-07.png" usemap="#mapacubo7" style="width:212%; height:212%; position: relative; left:-25%; z-index:5;"/>
					<map name="mapacubo7" id="mapacubo7">
						<area shape="poly" coords="0,560,580,0,1140,544,544,1140" onmouseover="cambiaImgFoto('07')" onmouseout="cambiaImgCubo('07')" href="presentacion"/>
						<area shape="poly" coords="0,0,570,0,0,548" onmouseover="cambiaImgFoto('05')" onmouseout="cambiaImgCubo('05')" href="presentacion"/>
						<area shape="poly" coords="0,548,548,1160,0,1160" onmouseover="cambiaImgFoto('06')" onmouseout="cambiaImgCubo('06')" href="presentacion"/>
						<area shape="poly" coords="548,0,1160,0,1160,548" onmouseover="cambiaImgFoto('08')" onmouseout="cambiaImgCubo('08')" href="presentacion"/>
						<area shape="poly" coords="548,1160,1160,548,1160,1160" onmouseover="cambiaImgFoto('09')" onmouseout="cambiaImgCubo('09')" href="presentacion"/>
					</map>
					<a href="#">
						<img id="imgVentBco" src="imagenes/homeventana/ventanaBco.png" onmouseover="cambiaImgFoto('07')" onmouseout="cambiaImgCubo('07')" style="width:150%; height:20%; position: absolute; top: 55%; left:5%; z-index:5;"/>
					</a>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding:0">
					<img id="CUBO08" class="oculta difumina Intervalo1 slideInRight" src="imagenes/homeventana/CUBO-08.png" usemap="#mapacubo8" style="width:187%; height:187%; position: relative; left:-7%; z-index:4; visibility:hidden;"/>
					<img id="CUBO09" class="oculta difumina Intervalo1 slideInRight" src="imagenes/homeventana/CUBO-09.png" usemap="#mapacubo9" style="width:187%; height:187%; position: relative; left:-7%; z-index:4; visibility:hidden;"/>
					<map name="mapacubo8" id="mapacubo8">
						<area shape="poly" coords="0,488,500,0,1020,500,500,1010" onmouseover="cambiaImgFoto('08')" onmouseout="cambiaImgCubo('08')" href="#"/>
						<area shape="poly" coords="440,1040,1040,520,1040,1040" onmouseover="cambiaImgFoto('10')" onmouseout="cambiaImgCubo('10')" href="#"/>
					</map>
					<map name="mapacubo9" id="mapacubo9">
						<area shape="poly" coords="0,488,488,0,1020,500,510,1020" onmouseover="cambiaImgFoto('09')" onmouseout="cambiaImgCubo('09')" href="#"/>
						<area shape="poly" coords="516,0,1030,0,1030,500" onmouseover="cambiaImgFoto('10')" onmouseout="cambiaImgCubo('10')" href="#"/>
					</map>
					<div class="contieneTxt oculta difumina Intervalo1 slideInRight" onmouseover="cambiaImgFoto('08')" onmouseout="cambiaImgCubo('08')" style="position:absolute; top:20%; left:30%; Z-index:5;">
						<p class="visible-lg-inline txtHomeLg">Docentes</p>
						<p class="visible-md-inline txtHomeMd">Docentes</p>
						<p class="visible-sm-inline txtHomeSm">Docentes</p>
						<p class="visible-xs-inline txtHomeXs" style="position: relative; top:-10px; left:-7px;">Docentes</p>
					</div>
					<div class="contieneTxt oculta difumina Intervalo1 slideInRight" onmouseover="cambiaImgFoto('09')" onmouseout="cambiaImgCubo('09')" style="position:absolute; top:70%; left:30%; Z-index:5;">
						<p class="visible-lg-inline txtHomeLg">Mediateca</p>
						<p class="visible-md-inline txtHomeMd">Mediateca</p>
						<p class="visible-sm-inline txtHomeSm">Mediateca</p>
						<p class="visible-xs-inline txtHomeXs" style="position: relative; top:-10px; left:-7px;">Mediateca</p>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-top: 8.2%; padding-left:0px; padding-right:0px;">
					<img id="CUBO10" class="oculta difumina Intervalo2 slideInRight" src="imagenes/homeventana/CUBO-10.png" usemap="#mapacubo10" style="width:178%; height:178%; position: relative; left:-8%; z-index:3; visibility:hidden;"/>
					<map name="mapacubo10"  id="mapacubo10">
						<area shape="poly" coords="0,456,470,0,960,500,470,940" onmouseover="cambiaImgFoto('10')" onmouseout="cambiaImgCubo('10')" href="#"/>
						<area shape="poly" coords="456,0,980,0,980,480" /><!--onmouseover="cambiaImgFoto('11')" onmouseout="cambiaImgCubo('11')" -->
						<area shape="poly" coords="456,960,960,456,960,960" /><!--onmouseover="cambiaImgFoto('12')" onmouseout="cambiaImgCubo('12')" -->
					</map>
					<a href="#">
						<img id="imgRedmBCo" class="oculta difumina Intervalo2 slideInRight" src="imagenes/homeventana/redmiteBco.png" onmouseover="cambiaImgFoto('10')" onmouseout="cambiaImgCubo('10')" style="width:70%; height:30%; position: absolute; top: 50%; left:50%; z-index:3; visibility:hidden;"/>
					</a>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding:3.1%; padding-left:0px; padding-right:0px;">
					<img id="CUBO11" class="oculta difumina Intervalo3 slideInRight" src="imagenes/homeventana/CUBO-11.png" usemap="#mapacubo11" style="width:155%; height:155%; position: relative; left:-22%; z-index:1; visibility:hidden;"/>
					<img id="CUBO12" class="oculta difumina Intervalo3 slideInRight" src="imagenes/homeventana/CUBO-12.png" usemap="#mapacubo12" style="width:155%; height:155%; position: relative; left:-18%; z-index:1; visibility:hidden;"/>
					<map name="mapacubo11" id="mapacubo11">
						<area shape="poly" coords="0,356,370,0,725,360,360,708" /><!--onmouseover="cambiaImgFoto('11')" onmouseout="cambiaImgCubo('11')" -->
					</map>
					<map name="mapacubo12" id="mapacubo12">
						<area shape="poly" coords="0,388,388,0,840,388,420,820" /><!--onmouseover="cambiaImgFoto('12')" onmouseout="cambiaImgCubo('12')" -->
					</map>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" style="padding-top: 8.9%; padding-left:0; padding-right:0;">
					<img id="CUBO13" class="oculta difumina Intervalo4 slideInRight" src="imagenes/homeventana/CUBO-13.png" usemap="#mapacubo13" style="width:170%; height:170%; position: relative; left:-38%; z-index:2; visibility:hidden;"/>
					<map name="mapacubo13" id="mapacubo13">
						<area shape="poly" coords="0,424,470,0,920,424,480,920" onmouseover="cambiaImgFoto('13')" onmouseout="cambiaImgCubo('13')" href="#"/>
						<area shape="poly" coords="0,0,0,400,400,0" /><!--onmouseover="cambiaImgFoto('11')" onmouseout="cambiaImgCubo('11')" -->
						<area shape="poly" coords="0,460,0,920,430,920" /><!--onmouseover="cambiaImgFoto('12')" onmouseout="cambiaImgCubo('12')" -->
					</map>
					<a href="#">
						<img id="imgMexXBco" class="oculta difumina Intervalo4 slideInRight" src="imagenes/homeventana/mexicoxBco.png" onmouseover="cambiaImgFoto('13')" onmouseout="cambiaImgCubo('13')" style="width:100%; height:15%; position: absolute; top: 63%; left:0%; z-index:3; visibility:hidden;"/>
					</a>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 derechaSociales" style="padding-top: 8.9%; padding-left:0; padding-right:0;">
					<ul class="sociales">
						<li><a href="#" class="cambiacolorredesSociales"><span><i class="fa fa-twitter fa-2x"></i></span></a></li><br/>
						<li><a href="#" class="cambiacolorredesSociales"><span><i class="fa fa-facebook fa-2x"></i></span></a></li><br/>
						<li><a href="#" class="cambiacolorredesSociales"><span><i class="fa fa-youtube-play fa-2x"></i></span></a></li>
					</ul>
				</div>
				<div class="visible-md-inline visible-lg-inline">
					<div style="padding:2%;">
					</div>
				</div>
			</div>
        </div>
<script>
    $(function () {
        var elems = $('.oculta');    //elementos que quiero saber si estan en el área visible
        elems.each(function () {
            $(this).fadeOut();
        });
        muestraCubos();
    })
            /* rwdImageMaps jQuery plugin v1.5
             *
             * Allows image maps to be used in a responsive design by recalculating the area coordinates to match the actual image size on load and window.resize
             *
             * Copyright (c) 2013 Matt Stow
             * https://github.com/stowball/jQuery-rwdImageMaps
             * http://mattstow.com
             * Licensed under the MIT license
             */
            ;
    (function ($) {
        $.fn.rwdImageMaps = function () {
            var $img = this;

            var rwdImageMap = function () {
                $img.each(function () {
                    if (typeof ($(this).attr('usemap')) == 'undefined')
                        return;

                    var that = this,
                            $that = $(that);

                    // Since WebKit doesn't know the height until after the image has loaded, perform everything in an onload copy
                    $('<img />').load(function () {
                        var attrW = 'width',
                                attrH = 'height',
                                w = $that.attr(attrW),
                                h = $that.attr(attrH);

                        if (!w || !h) {
                            var temp = new Image();
                            temp.src = $that.attr('src');
                            if (!w)
                                w = temp.width;
                            if (!h)
                                h = temp.height;
                        }

                        var wPercent = $that.width() / 100,
                                hPercent = $that.height() / 100,
                                map = $that.attr('usemap').replace('#', ''),
                                c = 'coords';

                        $('map[name="' + map + '"]').find('area').each(function () {
                            var $this = $(this);
                            if (!$this.data(c))
                                $this.data(c, $this.attr(c));

                            var coords = $this.data(c).split(','),
                                    coordsPercent = new Array(coords.length);

                            for (var i = 0; i < coordsPercent.length; ++i) {
                                if (i % 2 === 0)
                                    coordsPercent[i] = parseInt(((coords[i] / w) * 100) * wPercent);
                                else
                                    coordsPercent[i] = parseInt(((coords[i] / h) * 100) * hPercent);
                            }
                            $this.attr(c, coordsPercent.toString());
                        });
                    }).attr('src', $that.attr('src'));
                });
            };
            $(window).resize(rwdImageMap).trigger('resize');

            return this;
        };
    })(jQuery);
//* End image maps to be used in a responsive design by recalculating the area coordinates**//
</script>