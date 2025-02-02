<link rel="stylesheet" type="text/css" href="{{url('css/ventana/cuerpoVentana.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('css/ventana/estiloventana.css')}}"/>
<script type="text/javascript" src="{{url('js/ventana/ventanaCuerpo.js')}}"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		@if($errors->any())
			<div id='mensaje-error' class="alert alert-danger msgError">
        <h4 class="pull-right">{{$errors->first()}}</h4>
				<!-- <h4 class="pull-right">{{$errors->first()}} Debe activar su cuenta</h4> -->
			</div>
		@endif
        </div>
    </div>
    <!----------------------------------	Elementos para vistas en dispositivos grandes		--------------------------------->
    <div class="row visible-md-inline visible-lg-inline">
        <div>
            <div class="pad1Pc">
            </div>
        </div>
		<div class="col-md-9 col-md-offset-1 margen10px">
			<map name="mapaRombos" id="mapaRombos">
				<area alt="Cultura" title="" shape="poly" coords="230,280,459,54,680,280,450,500" onmouseover="cambiaImgFoto('02')" onmouseout="cambiaImgCubo('02')"  href="{{url('cultura')}}"/>
				<area alt="Canal IberoAmericano" title="" shape="poly" coords="442,511,680,750,918,512,681,274" onmouseover="cambiaImgFoto('04')" onmouseout="cambiaImgCubo('04')" href="http://www.ibe.tv/es/canal/iberoamericano/315/En-directo.htm" target="_blank"/>
				<area alt="Red MITE" title="" shape="poly" coords="933,1,680,253,933,506,1187,255" onmouseover="cambiaImgFoto('05')" onmouseout="cambiaImgCubo('05')" href="{{url('redmite')}}"/>
				<area alt="educaplay" title="" shape="poly" coords="932,511,681,764,933,1017,1185,766" onmouseover="cambiaImgFoto('06')" onmouseout="cambiaImgCubo('06')" href="{{url('educaplay')}}"/>
				<area alt="conocenos" title="" shape="poly" coords="1215,226,934,508,1216,794,1497,510" onmouseover="cambiaImgFoto('07')" onmouseout="cambiaImgCubo('07')" href="{{url('conocenos')}}"/>
				<area alt="Biblioteca" title="" shape="poly" coords="1496,1,1243,253,1497,507,1750,253" onmouseover="cambiaImgFoto('08')" onmouseout="cambiaImgCubo('08')" href="{{url('biblioteca')}}"/>
				<area alt="educamedia" title="" shape="poly" coords="1498,513,1245,765,1497,1017,1751,765" onmouseover="cambiaImgFoto('09')" onmouseout="cambiaImgCubo('09')" href="{{url('educamedia')}}"/>
				<area alt="México X" title="" shape="poly" coords="1516,511,1753,274,1989,511,1753,748" onmouseover="cambiaImgFoto('10')" onmouseout="cambiaImgCubo('10')" href="http://mexicox.gob.mx/" target="_blank"/>
				<area alt="Salud" title="" shape="poly" coords="1766,738,2000,520,2230,745,2000,980" onmouseover="cambiaImgFoto('12')" onmouseout="cambiaImgCubo('12')" href="http://www.promocion.salud.gob.mx/dgps/interior1/programas/escuela_salud.html" target="_blank"/>
			</map>
			{{HTML::image('imagenes/ventana/homeventana/mapaRombos.png','mapaRombos',['name'=>'mapaRombos','id'=>'mapaRombos', 'class'=>'mapaRombos img-responsive', 'usemap'=>'#mapaRombos'])}}
		</div>
		<div class="col-md-12">
		</div>
        <div class="col-md-1 col-lg-1 col-md-offset-1 col-lg-offset-1 bandaSuperior">

        </div>
        <div class="col-md-1 col-lg-1 cubo2">
            {{HTML::image('imagenes/ventana/homeventana/CUBO-02.png', 'Idiomas',['id'=>'CUBO02','class'=>'imgColor oculta difumina Intervalo3 slideInLeft rombo2'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/cultura.png','Cultura',['id'=>'iconoRombo02','class'=>'imgColor oculta difumina Intervalo3 slideInLeft iconoIdiomas','onmouseover'=>'cambiaImgFoto("02")','onmouseout'=>'cambiaImgCubo("02")'])}}
        </div>

        <div class="col-md-1 col-lg-1 cubo4">
            {{HTML::image('imagenes/ventana/homeventana/CUBO-04.png','Padres',['id'=>'CUBO04','class'=>'imgColor oculta difumina Intervalo2 slideInLeft rombo4'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/canal_ibero.png','canal IberoAmericano',['id'=>'iconoRombo04','class'=>'imgColor oculta difumina Intervalo2 slideInLeft iconoPadres','onmouseover'=>'cambiaImgFoto("04")','onmouseout'=>'cambiaImgCubo("04")'])}}
        </div>
        <div class="col-md-1 col-lg-1 cubo5">
            {{HTML::image('imagenes/ventana/homeventana/CUBO-05.png','Estudiantes',['id'=>'CUBO05','class'=>'imgColor oculta difumina Intervalo1 slideInLeft rombo5'])}}
            {{HTML::image('imagenes/ventana/homeventana/CUBO-06.png','VOD',['id'=>'CUBO06','class'=>'imgColor oculta difumina Intervalo1 slideInLeft rombo6'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/redmiteBco.png','Red Mesoamericana',['id'=>'iconoRombo05','class'=>'imgColor oculta difumina Intervalo1 slideInLeft iconoEstudiantes','onmouseover'=>'cambiaImgFoto("05")','onmouseout'=>'cambiaImgCubo("05")'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/vod.png','VOD',['id'=>'iconoRombo06','class'=>'imgColor oculta difumina Intervalo1 slideInLeft iconoVOD','onmouseover'=>'cambiaImgFoto("06")','onmouseout'=>'cambiaImgCubo("06")'])}}
        </div>

        <div class="col-md-1 col-lg-1 cubo7">
            {{HTML::image('imagenes/ventana/homeventana/CUBO-07.png','Ventana Educativa',['id'=>'CUBO07','class'=>'imgColor rombo7'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/ventanaBco.png','Ventana Educativa',['id'=>'iconoRombo07','class'=>'imgColor iconoVentana','onmouseover'=>'cambiaImgFoto("07")','onmouseout'=>'cambiaImgCubo("07")'])}}
        </div>
        <div class="col-md-1 col-lg-1 cubo8">
            {{HTML::image('imagenes/ventana/homeventana/CUBO-08.png','Docentes',['id'=>'CUBO08','class'=>'imgColor oculta difumina Intervalo1 slideInRight rombo8'])}}
            {{HTML::image('imagenes/ventana/homeventana/CUBO-09.png','Mediateca',['id'=>'CUBO09','class'=>'imgColor oculta difumina Intervalo1 slideInRight rombo9'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/biblioteca.png','Biblioteca',['id'=>'iconoRombo08','class'=>'imgColor oculta difumina Intervalo1 slideInRight iconoDocentes','onmouseover'=>'cambiaImgFoto("08")','onmouseout'=>'cambiaImgCubo("08")'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/mediateca.png','Mediateca',['id'=>'iconoRombo09','class'=>'imgColor oculta difumina Intervalo1 slideInRight iconoMediateca','onmouseover'=>'cambiaImgFoto("09")','onmouseout'=>'cambiaImgCubo("09")'])}}
        </div>
        <div class="col-md-1 col-lg-1 cubo10">
            {{HTML::image('imagenes/ventana/homeventana/CUBO-10.png','Red Mesoamerica',['id'=>'CUBO10','class'=>'imgColor oculta difumina Intervalo2 slideInRight rombo10'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/mexicoxBco.png','Mexico X',['id'=>'iconoRombo10','class'=>'imgColor oculta difumina Intervalo2 slideInRight iconoRedMesoamerica','onmouseover'=>'cambiaImgFoto("10")','onmouseout'=>'cambiaImgCubo("10")'])}}
        </div>
        <div class="col-md-1 col-lg-1 cubo12">
            {{HTML::image('imagenes/ventana/homeventana/CUBO-12.png',' ',['id'=>'CUBO12','class'=>'imgColor oculta difumina Intervalo3 slideInRight rombo12'])}}
            {{HTML::image('imagenes/ventana/iconoSeccion/salud.png','Salud',['id'=>'iconoRombo12','class'=>'imgColor oculta difumina Intervalo3 slideInRight iconoBiblioteca','onmouseover'=>'cambiaImgFoto("12")','onmouseout'=>'cambiaImgCubo("12")'])}}
        </div>
        <div class="col-md-1 col-lg-1 bandaInferior">
        </div>

        <div class="derechaSociales">
            <ul class="sociales">
                <li><a href="https://twitter.com/tveducativamx" target="_blank" class="cambiacolorredesSociales"><span><i class="fa fa-twitter fa-2x " id="ct"></i></span></a></li><br/>
                <li><a href="https://www.facebook.com/TvEducativaMx" target="_blank" class="cambiacolorredesSociales"><span><i class="fa fa-facebook fa-2x" id="cf"></i></span></a></li><br/>
                <li><a href="https://www.youtube.com/user/tveducativamx?feature=sub_widget_1" target="_blank" class="cambiacolorredesSociales"><span><i class="fa fa-youtube-play fa-2x" id="cy"></i></span></a></li>
            </ul>
        </div>
        <div class="visible-md-inline visible-lg-inline">
            <div class="padd2pc">
            </div>
        </div>

        <div class="col-md-12">
            <div id="browserWarning" class="col-md-3 alert margenSup3pc">
                {{ HTML::image('imagenes/ventana/homeventana/alertaNav.png','alerta',['class'=>'imgAlertaNav'])}}
            </div>
            <div class="col-md-8"></div>
        </div>
    </div>
    <!----------------------------------	Elementos para vistas en dispositivos pequeños		--------------------------------->
    <div class="row visible-xs-inline visible-sm-inline">
		<div class="col-xs-9 col-xs-offset-1">
			{{HTML::image('imagenes/ventana/homeventana/mapaRombosCh.png','mapaRombosCh',['name'=>'mapaRombosCh','id'=>'mapaRombosCh', 'class'=>'mapaRombosCh img-responsive', 'usemap'=>'#mapaRombosCh'])}}
			<map name="mapaRombosCh" id="mapaRombosCh">
				<area title="" shape="poly" coords="140,140,265,20,385,150,265,270" alt="conocenos" href="{{url('conocenos')}}" />
				<area title="" shape="poly" coords="15,275,135,150,260,275,135,400" alt="educamedia" href="{{url('educamedia')}}" />
				<area title="" shape="poly" coords="270,280,390,150,510,280,390,400" alt="educaplay" href="{{url('educaplay')}}" />
				<area title="" shape="poly" coords="260,275,390,400,260,520,140,400" alt="canal IberoAmericano" href="http://www.ibe.tv/es/canal/iberoamericano/315/En-directo.htm" target="_blank" />
				<area title="" shape="poly" coords="15,520,135,400,260,520,135,650" alt="biblioteca" href="{{url('biblioteca')}}" />
				<area title="" shape="poly" coords="265,520,390,400,510,520,388,640" alt="RedMITE" href="{{url('redmite')}}" />
				<area title="" shape="poly" coords="260,525,380,650,260,770,140,650" alt="México X" href="http://mexicox.gob.mx/" target="_blank"/>
				<area title="" shape="poly" coords="140,650,15,770,140,900,260,770" alt="Cultura" href="{{url('cultura')}}" />
				<area title="" shape="poly" coords="380,650,510,770,380,900,260,770" alt="Salud" href="http://www.promocion.salud.gob.mx/dgps/interior1/programas/escuela_salud.html" target="_blank"/>
			</map>
		</div>
        <div class="col-xs-10 col-sm-10 col-xs-offset-1 col-sm-offset-1 padd20pc">
            <table>
                <tr><td></td><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-07.png','Ventana Educativa',['id'=>'CUBOSM07','class'=>'imgColor rombosm7','usemap'=>'#mapacubosm07'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/ventanaBco.png','ventana Educativa',['id'=>'iconoRomboSM07','class'=>'imgColor iconoRomboSM7'])}}
                    </td><td></td>
                </tr><tr><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-09.png','Educaplay',['id'=>'CUBOSM08','class'=>'imgColor oculta difumina Intervalo2 slideInLeft romboSM8','usemap'=>'#mapacubosm08'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/mediateca.png','Educaplay',['id'=>'iconoRombosm08','class'=>'imgColor oculta difumina Intervalo2 slideInLeft iconoDocentesSM'])}}
                    </td><td></td><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-06.png','Mediateca',['id'=>'CUBOSM09','class'=>'imgColor oculta difumina Intervalo2 slideInRight foto9','usemap'=>'#mapacubosm09'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/vod.png','Mediateca',['id'=>'iconoRombo09','class'=>'imgColor oculta difumina Intervalo2 slideInRight iconoFoto9'])}}
                    </td>
                </tr><tr><td></td><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-04.png','Canal IberoAmericano',['id'=>'CUBOSM10','class'=>'imgColor oculta difumina Intervalo1 slideInLeft foto10','usemap'=>'#mapacubosm10'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/canal_ibero.png','Canal IberoAmericano',['id'=>'iconoRombosm10','class'=>'imgColor oculta difumina Intervalo1 slideInLeft iconoFoto10'])}}
                    </td><td></td>
                </tr>
                <tr><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-08.png','Biblioteca',['id'=>'CUBOSM05','class'=>'imgColor oculta difumina Intervalo3 slideInLeft foto5','usemap'=>'#mapacubosm05'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/biblioteca.png','Biblioteca',['id'=>'iconoRomboSM05','class'=>'imgColor oculta difumina Intervalo3 slideInLeft iconoFoto5'])}}
                    </td><td></td><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-05.png','Red Mesoamericana',['id'=>'CUBOSM06','class'=>'imgColor oculta difumina Intervalo3 slideInRight foto6','usemap'=>'#mapacubosm06'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/redmiteBco.png','Red Mesoamericana',['id'=>'iconoRomboSM06','class'=>'imgColor oculta difumina Intervalo3 slideInRight iconoFoto6'])}}
                    </td>
                </tr><tr><td></td><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-10.png','Mexico X',['id'=>'CUBOSM13','class'=>'imgColor oculta difumina Intervalo1 slideInRight foto13','usemap'=>'#mapacubosm13'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/mexicoxBco.png','Mexico X',['id'=>'iconoRomboSM13','class'=>'imgColor oculta difumina Intervalo1 slideInRight iconoFoto13'])}}
                    </td><td></td>
                </tr><tr><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-02.png','Cultura',['id'=>'CUBOSM02','class'=>'imgColor oculta difumina Intervalo4 slideInLeft foto2','usemap'=>'#mapacubosm2'])}}
                        {{HTML::image('imagenes/ventana/iconoSeccion/cultura.png','Cultura',['id'=>'iconoRomboSM02','class'=>'imgColor oculta difumina Intervalo4 slideInLeft iconoFoto2'])}}
                    </td><td></td><td>
                        {{HTML::image('imagenes/ventana/homeventana/FOTO-12.png','Salud',['id'=>'CUBOSM04','class'=>'imgColor oculta difumina Intervalo4 slideInRight foto4','usemap'=>'#mapacubosm4'])}}
						{{HTML::image('imagenes/ventana/iconoSeccion/salud.png','Salud',['id'=>'iconoRomboSM04','class'=>'imgColor oculta difumina Intervalo4 slideInRight iconoFotoPadres'])}}
                    </td>
                </tr>
            </table>
            <div class="derechaSociales">
                <ul class="sociales">
                    <li><a href="https://twitter.com/tveducativamx" target="_blank" class="cambiacolorredesSociales"><span class="padRight"><i class="fa fa-twitter fa-2x " id="ct"></i></span></a></li>
                    <li><a href="https://www.facebook.com/TvEducativaMx" target="_blank" class="cambiacolorredesSociales"><span class="padRight"><i class="fa fa-facebook fa-2x" id="cf"></i></span></a></li>
                    <li><a href="https://www.youtube.com/user/tveducativamx?feature=sub_widget_1" target="_blank" class="cambiacolorredesSociales"><span class="padRight"><i class="fa fa-youtube-play fa-2x" id="cy"></i></span></a></li>
                </ul>
            </div>
        </div>
    </div>
    @if(Session::has('message'))
    <div class="col-xs-11 col-sm-11 col-md-12 posicionMsj">
        <div class="col-md-3"></div>
        <p class="alert col-md-6 text-center message-compatible {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        <div class="col-md-3"></div>
    </div>
    @endif
</div>
