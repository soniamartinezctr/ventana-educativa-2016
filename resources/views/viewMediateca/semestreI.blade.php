@section('titleMediateca')
    Educamedia
@stop
@extends('indexMediateca')
@section('menuMediateca')
	@include('viewMediateca.encabezadoMediateca')
@endsection
@section('cuerpoMediateca')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="padding:4%">
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center textoTitulo">
		<p><?php
			generaBreadCrumbs();
		?></p><br>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
		<map name="mapaSemI" id="mapaSemI">
			<area alt="" title="" href="{{(url('educamedia/telebachillerato/I/5'))}}" onmouseover="resaltaImgSecu('SemestreI','InformaticaI')" onmouseout="normalImgSecu('SemestreI','InformaticaI')" shape="poly" coords="1,233,100,232,106,198,116,169,132,144,161,124,101,45,79,60,61,78,37,112,19,146,5,194" />
			<area alt="" title="" href="{{(url('educamedia/telebachillerato/I/4'))}}" onmouseover="resaltaImgSecu('SemestreI','TallerLectura')" onmouseout="normalImgSecu('SemestreI','TallerLectura')" shape="poly" coords="163,123,104,44,134,27,164,12,187,3,269,0,314,10,284,103,258,96,218,96,190,103" />
			<area alt="" title="" href="{{(url('educamedia/telebachillerato/I/3'))}}" onmouseover="resaltaImgSecu('SemestreI','IntroCS')" onmouseout="normalImgSecu('SemestreI','IntroCS')" shape="poly" coords="287,103,316,12,349,27,379,40,402,62,430,90,457,131,471,161,375,192,362,162,331,128" />
			<area alt="" title="" href="{{(url('educamedia/telebachillerato/I/7'))}}" onmouseover="resaltaImgSecu('SemestreI','EticaValoresI')" onmouseout="normalImgSecu('SemestreI','EticaValoresI')" shape="poly" coords="377,192,470,164,483,204,482,263,478,301,467,336,451,364,367,313,382,276,387,250,386,219" />
			<area alt="" title="" href="{{(url('educamedia/telebachillerato/I/1'))}}" onmouseover="resaltaImgSecu('SemestreI','MatematicasI')" onmouseout="normalImgSecu('SemestreI','MatematicasI')" shape="poly" coords="266,384,281,480,336,465,379,443,416,410,442,378,450,366,367,314,349,338,317,366" />
			<area alt="" title="" href="{{(url('educamedia/telebachillerato/I/6'))}}" onmouseover="resaltaImgSecu('SemestreI','LenguaAdicionalI')" onmouseout="normalImgSecu('SemestreI','LenguaAdicionalI')" shape="poly" coords="144,348,179,371,208,382,248,386,266,384,281,482,203,483,155,471,123,453,97,438,81,424" />
			<area alt="" title="" href="{{(url('educamedia/telebachillerato/I/2'))}}" onmouseover="resaltaImgSecu('SemestreI','QuimicaI')" onmouseout="normalImgSecu('SemestreI','QuimicaI')" shape="poly" coords="82,421,143,348,137,340,120,317,107,285,99,253,99,234,95,233,2,234,2,248,2,273,3,298,12,316,21,340,40,381" />
		</map>
		{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/semestreI.png','telebachillerato Semestre I',['class'=>'posicionInicial img-responsive', 'id'=>'SemestreI'])}}
			{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/InformaticaIHover.png','Telebachillerato InformaticaI',['class'=>'resaltaImg img-responsive', 'id'=>'InformaticaIHover'])}}
			{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/TallerLecturaHover.png','Telebachillerato TallerLectura',['class'=>'resaltaImg img-responsive', 'id'=>'TallerLecturaHover'])}}
			{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/IntroCSHover.png','Telebachillerato IntroCS',['class'=>'resaltaImg img-responsive', 'id'=>'IntroCSHover'])}}
			{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/EticaValoresIHover.png','Telebachillerato EticaValoresI',['class'=>'resaltaImg img-responsive', 'id'=>'EticaValoresIHover'])}}
			{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/MatematicasIHover.png','Telebachillerato MatematicasI',['class'=>'resaltaImg img-responsive', 'id'=>'MatematicasIHover'])}}
			{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/LenguaAdicionalIHover.png','Telebachillerato LenguaAdicionalI',['class'=>'resaltaImg img-responsive', 'id'=>'LenguaAdicionalIHover'])}}
			{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/QuimicaIHover.png','Telebachillerato QuimicaI',['class'=>'resaltaImg img-responsive', 'id'=>'QuimicaIHover'])}}
		{{HTML::image('imagenes/mediateca/tbachillerato/SemestreI/imgMapa.png','Telebachillerato Semestre I',['class'=>'posicionMapa img-responsive', 'id'=>'telebachilleratoSEMI', 'usemap'=>'#mapaSemI'])}}
	</div>
    @include('viewMediateca.barraSociales')
@endsection
@section('pieMediateca')
    @include('viewMediateca.menuMediatecaTelebachillerato')
@endsection