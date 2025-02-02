<?php
namespace App\Http\Controllers; ?>

<form accept-charset="utf-8" method="POST">
<div class="row visible-xs margenMenuChico">
</div>
<div class="row margenInferior">
    <!-- Carousel principal -->
    <div id="carouselEducaplay" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach ($banner as $item => $numeroitem)
            @if($item===0)
            <li data-target="#carouselEducaplay" data-slide-to="0" class="active"></li>
            @elseif($item != 0)
            <li data-target="#carouselEducaplay" data-slide-to="{{$item}}"></li>
            @endif
            @endforeach
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach ($banner as $item1 => $bannerImagen)
            @if($item1===0)
            <!-- Wrapper for slides -->

            <div class="item active" >
                <img src="{{$bannerImagen->url}}" alt="..." id="imgactive{{$bannerImagen->id}}" style="min-width:100%;">
                <div class="carousel-caption posicionDescripcion">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <p class="text-justify">
                            {{recortaDescripcion($bannerImagen->descripcion, 200)}}
                        </p>
                    </div>
                </div>
                <div class="carousel-caption posicionBotones">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						{{--*/ $url_video = EducaplayController::consultaUrlId($bannerImagen->id); $ligaDetalle = 'educaplay/detalleSeries/'.$bannerImagen->id.'/1/'.$url_video->url_video.'/'.$url_video->id /*--}}
                        <a href="{{url($ligaDetalle)}}"><div class="btn btn-danger text-uppercase anchoBtnRep textoPeque"><span class="fa fa-play hidden-xs" aria-hidden="true"></span><span class="hidden-xs">&nbsp;&nbsp;</span>Reproducir</div></a>
                        <div class="btn btn-info text-uppercase anchoBtnLista textoPeque" id = "addSerie" onclick="addmilista({{$bannerImagen->id}});"><span class="fa fa fa-plus hidden-xs" aria-hidden="true"></span><span class="hidden-xs">&nbsp;&nbsp;</span>Mi lista</div>
                    </div>
                </div>
            </div>
            @elseif($item1 != 0)
            <!-- Wrapper for slides -->
            <div class="item">
                <img src="{{$bannerImagen->url}}" alt="Imagen banner" style="min-width:100%;">
                <div class="carousel-caption posicionDescripcion">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <p class="text-justify">
                            {{recortaDescripcion($bannerImagen->descripcion, 200)}}
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>
                </div>
                <div class="carousel-caption posicionBotones">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						{{--*/ $url_video = EducaplayController::consultaUrlId($bannerImagen->id); $ligaDetalle = 'educaplay/detalleSeries/'.$bannerImagen->id.'/1/'.$url_video->url_video.'/'.$url_video->id /*--}}
                        <a href="{{url($ligaDetalle)}}"><div class="btn btn-danger text-uppercase anchoBtnRep textoPeque"><span class="fa fa-play hidden-xs" aria-hidden="true"></span><span class="hidden-xs">&nbsp;&nbsp;</span>Reproducir</div></a>
                        <div class="btn btn-info text-uppercase anchoBtnLista textoPeque" id = "addSerie" onclick="addmilista({{$bannerImagen->id}});"><span class="fa fa fa-plus hidden-xs" aria-hidden="true"></span>
                          <span class="hidden-xs">&nbsp;&nbsp;</span>Mi lista</div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <!-- Controls -->
        <a class="left carousel-control anchoFlechaBanner" href="#carouselEducaplay" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left agrandaIconoFlecha"></span>
        </a>
        <a class="right carousel-control anchoFlechaBanner" href="#carouselEducaplay" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right agrandaIconoFlecha"></span>
        </a>
    </div>
</div>
</form>

<script>
function addmilista(id_img){

var request = $.ajax({
  url: "{{ url ('agregaMiLista') }}",
  method: "GET",
  data: { id : id_img },
  dataType: "html"
});
request.done(function( msg ) {
  // console.log (msg);
  alert(msg);

  });

};
</script>
<!--Fin de Carousel -->
