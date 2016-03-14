<nav class="navbar navbar-default navbar-fixed-top menuVentana" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>    
        <a href="ventana_educativa"><img class="image-responsive imgLogo " src="imagenes/ventana/encabezado/logoventana.png"></a>
    </div> 
    <div class="navbar-collapse collapse collapseBarra">
        <ul class=" nav navbar-nav navbar-right">
            <!--<li class="col-md-pull-12 col-xs-pull-4 col-sm-pull-2 libuscar">-->
            <li class="libuscar col-md-pull-11 col-xs-offset-6">
                <form action="" class="search-form" style="width: 200px;">
                    <div class="form-group has-feedback">
                        <label for="search" class="sr-only">Buscar</label>
                        <input type="text" class="form-control" name="buscar" id="buscar" placeholder="buscar">
                        <span class="glyphicon glyphicon-search form-control-feedback spanbuscar"></span>
                    </div>
                </form>
            </li>
            <li class="dropdown">
                <div class=" divli dropdown-toggle" data-toggle="dropdown">
                    <img class="iconoApps"  src="imagenes/ventana/encabezado/iconoApps.png">
                </div>
                <ul class="dropdown-menu image-responsive menuVentanaApps">
                    <table class="">
                        <tr>
                            <td class="divApp centered">
                                <a class="text-center" href="ventana_educativa"><img src="imagenes/ventana/encabezado/appVentana.png" class="img-responsive"></a>
                                <label class="etiquetaApp text-center">Ventana Educativa</label>
                            </td>
                            <td class="divApp centered">
                                <a class="text-center" href="http://redmite.televisioneducativa.gob.mx/" target="_blank"><img src="imagenes/ventana/encabezado/appRed.png" class="img-responsive"></a>
                                <label class="etiquetaApp text-center">Red <br> Mesoamericana</label>
                            </td>
                            <td class="divApp centered">
                                <a class="text-center" href="http://mx.televisioneducativa.gob.mx" target="_blank"><img src="imagenes/ventana/encabezado/appMexico.png" class="img-responsive"></a>
                                <label class="etiquetaApp text-center">MéxicoX</label>
                            </td>                            
                        </tr>
                        <tr>
                            <td class="divApp" style="vertical-align:middle !important;">
                                <a class="text-center" target="_blank" href="http://www.ibe.tv/es/canal/iberoamericano/756/Iberoam%C3%A9rica-al-d%C3%ADa-1032016.htm"><img class="img-responsive" src="imagenes/ventana/encabezado/appIbero.png"></a>
                                <label class="etiquetaApp text-center">Canal <br> Iberoamericano</label>
                            </td>
                            <td class="divApp">
                                <a class="" href="#"><img src=""></a>
                                <label class="etiquetaApp text-center"></label>
                            </td>
                            <td class="divApp">
                                <a class="" href="#"><img src=""></a>
                                <label class="etiquetaApp text-center"></label>
                            </td>                            
                        </tr>                      
                    </table>                                       
                </ul>
            </li>
            <li class="dropdown">
                <div class=" divli dropdown-toggle" data-toggle="dropdown">
                    <div class="fotoUsuario text-center">R</div>
                </div>
                <ul class="dropdown-menu fondoRegistro">
                    <li class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                @if (Auth::guest ())
                                <form id="login-form" action="sessions" method="POST" role="form" style="display: block;">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="form-group">
                                        <input type="email" name="email"  tabindex="1" class="form-control inputLogin" placeholder="Usuario" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"  tabindex="2" class="form-control inputLogin" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-md-offset-3">
                                                <input type="submit" name="login-submit" style="color: white;" id="login-submit" tabindex="4" class="form-control btn btn-sm" value="Entrar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="col-md-6 text-center">
                                        <a href="{{url('password/email')}}" tabindex="5" style="color: white;" class="forgot-password">Olvide mi contraseña</a>
                                    </div>

                                    <div class=" col-md-6 text-center">
                                        <a href="registro"  tabindex="5" style="color: white;" class="forgot-password">Registrate</a>
                                    </div>
                                    </div>
                                </form>
                                @else
                                loggeado
                                {{Auth::user()->email}}
                                <a href="logout" tabindex="5" style="color: white;" class="forgot-password">Cerrar Sesión</a>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>