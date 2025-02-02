<?php

namespace App\Http\Controllers;

use DB;
use Mail;

use App\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Intereses_educativos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Educaplay\Edu_serie;
use App\Model\Educaplay\Edu_imagen;
use App\Model\Educaplay\Edu_rating;
use App\Model\Educaplay\Edu_comments;
use App\Model\Educaplay\Edu_clasificaciones;
use App\Model\Educaplay\Edu_video;
use App\Model\Educaplay\Edu_avance_visto;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class EducaplayController extends Controller {

    public function educaplay1() {
        return view('viewEducaplay/educaplay');
    }

    public function descripciones($serieId, $numFila) {
        $fila = filter_input(INPUT_GET, 'divFila');
        $primerDetalleSerie = DB::table('edu_serie')
                ->join('edu_imagen', 'edu_serie.id', '=', 'edu_imagen.serie_id')
                ->join('edu_video', 'edu_serie.id', '=', 'edu_video.serie_id')
                ->select('edu_serie.id', 'edu_serie.titulo_serie', 'edu_serie.temporadas_total', 'edu_serie.clasificacion_id', 'edu_serie.categoria_id', 'edu_serie.descripcion', 'edu_imagen.url', 'edu_imagen.ubicacion_id', 'edu_video.sinopsis', 'edu_video.temporada', 'edu_video.capitulo', 'edu_video.url_video')
                ->where('edu_serie.id', '=', $serieId)
                ->where('edu_imagen.ubicacion_id', '=', 1)
                ->first();
        $comentarios = DB::table('edu_comments')
                ->join('edu_video', 'edu_comments.video_id', '=', 'edu_video.id')
                ->select('edu_video.temporada', 'edu_video.capitulo', 'edu_comments.usuario_id', 'edu_comments.comment')
                ->where('edu_comments.serie_id', $serieId)
                ->orderBy('edu_video.temporada', 'ASC')
                ->orderBy('edu_video.capitulo', 'ASC')
                ->get();
        return view('viewEducaplay/descripcionSerie')->with('primerDetalleSerie', $primerDetalleSerie)->with('comentarios', $comentarios)->with('fila', $numFila);
    }

    public function temporada($serieId, $temporada) {
        $fila = filter_input(INPUT_GET, 'fila');
        /*$encuentraTemp = DB::table('edu_video')
                ->select('temporada')
                ->where('temporada', $temporada)
                ->get();
        if ($encuentraTemp == null) {*/
            if ($temporada == 0) {
                $temporada = 1;
            /*} else {
                $temporada = 1;
            }*/
        }
        $detallesSerie = DB::table('edu_serie')
                ->join('edu_imagen', 'edu_serie.id', '=', 'edu_imagen.serie_id')
                ->join('edu_video', 'edu_serie.id', '=', 'edu_video.serie_id')
                ->select('edu_serie.id', 'edu_serie.titulo_serie', 'edu_serie.temporadas_total', 'edu_serie.clasificacion_id', 'edu_serie.descripcion', 'edu_imagen.url', 'edu_imagen.ubicacion_id', 'edu_video.id AS videoId', 'edu_video.sinopsis', 'edu_video.temporada', 'edu_video.capitulo', 'edu_video.url_video')
                ->where('edu_serie.id', '=', $serieId)
                ->where('edu_video.temporada', '=', $temporada)
                ->where('edu_video.url_video', '!=', "")
                ->groupBy('edu_video.url_video')
                ->get();
        return view('viewEducaplay/carreteTemporada')->with('detallesSerie', $detallesSerie)->with('fila', $fila);
    }

    public function educaplayMenu() {   //* Funcion para alimentar el menu de Educaplay
        $menuEducaplay = DB::table('edu_categorias')
                ->select('categoria')
                ->get();

        return $menuEducaplay;
    }

    public function educaplay() {

        $banner = DB::table('edu_serie')
                ->join('edu_imagen', 'edu_serie.id', '=', 'edu_imagen.serie_id')
                ->select('edu_serie.id', 'edu_serie.descripcion', 'edu_imagen.url')
                ->where('edu_imagen.activo', '=', '1')
                ->where('edu_imagen.ubicacion_id', '=', '1')
                ->get();
        $carretes = DB::table('edu_serie')
                ->join('edu_imagen', 'edu_serie.id', '=', 'edu_imagen.serie_id')
                ->select('edu_imagen.url', 'edu_serie.titulo_serie', 'edu_serie.descripcion', 'edu_serie.categoria_id', 'edu_serie.id')
                ->where('edu_imagen.ubicacion_id', '=', '2')
                ->orderBy('categoria_id', 'ASC')
                ->get();
        $menuEducaplay = $this->educaplayMenu();
        return view('viewEducaplay/educaplay')->with('banner', $banner)->with('carretes', $carretes)->with('menuEducaplay', $menuEducaplay);
    }

    public static function consultaCategoria($cat) {
        $categoria = DB::table('edu_categorias')
                ->select('edu_categorias.imgCategoria')
                ->where('edu_categorias.id', '=', $cat)
                ->first();
        if ($categoria != null) {
            return $categoria->imgCategoria;
        } else {
            return 'Categoria no encontrada';
        }
    }

    static function consultaUrlId($SerieId) {
        $urlId = DB::table('edu_video')
                ->select('url_video', 'id')
                ->where('serie_id', '=', $SerieId)
                ->where('capitulo', '=', 1)
                ->first();
		if ($urlId == null) {
            $urlId = new Edu_video();
			$urlId->url_video = '000000';
			$urlId->id = '000000';
        }
		return $urlId;
    }

    public function queryRate() {
        $video_id = filter_input(INPUT_POST, 'video_id');
        $user_id = Auth::user()->id;
        $matchThese = ['user_id' => $user_id, 'video_id' => $video_id];
        $rating = Edu_rating::where($matchThese)->first();

        if ($rating != null) {
            $valorDevuelto = $rating->rating;
        } else {
            $valorDevuelto = 0;
        }
        return $valorDevuelto;
    }

    public function guardaRating() {
        $video_id = filter_input(INPUT_POST, 'video_id');
        $rating = filter_input(INPUT_POST, 'rating');
        $user_id = Auth::user()->id;
        $ratingSaved = Edu_rating::firstOrNew(['user_id' => $user_id, 'video_id' => $video_id]);
        $ratingSaved->rating = $rating;
        $ratingSaved->save();

        if ($ratingSaved != null) {
            $regreso = $ratingSaved;
        } else {
            $regreso = 0;
        }
        return $regreso;
    }

    static function consultaRatingXURL($urlVideo) {
        $ratingReproduce = DB::table('edu_rating')
                ->join('edu_video', 'edu_rating.video_id', '=', 'edu_video.id')
                ->select('rating')
                ->where('edu_video.url_video', $urlVideo)
                ->first();
        if ($ratingReproduce != null) {
            $devuelve = $ratingReproduce->rating;
        } else {
            $devuelve = 0;
        }
        return $devuelve;
    }

    public function guardaComentaVideo() {
        $comment = new Edu_comments;
        $comment->comment_id = filter_input(INPUT_POST, 'comment_id');
        $comment->usuario_id = Auth::user()->id;
        $comment->video_id = filter_input(INPUT_POST, 'video_id');
        $comment->comment = filter_input(INPUT_POST, 'comment');
        $comment->serie_id = filter_input(INPUT_POST, 'serie_id');
        $comment->save();
        
        $correo = 'dgtve.ventana@gmail.com';
        Mail::send('viewEducaplay.mailComentarios', ['comentario' => $comment], function ($m) use ($correo) {
            $m->from('ventana@televisioneducativa.gob.mx', 'Ventana Educativa');
            $m->to($correo)->subject('Ventana Educativa. Recepción de comentarios - Videos Educaplay');
            $m->cc('rene.aguina@mexicox.gob.mx');
        });
        
        return view('viewEducaplay/comment')->with('comment', $comment);
    }

    public function comentariosVideo($id) {
        $comments = Edu_comments::
                        where('video_id', $id)
                        ->where('comment_id', 0)
                        ->orderBy('created_at', 'desc')->get();
        return view('viewEducaplay/comments')->with('comments', $comments);
    }

    public function comentariosSerie($id) {
        $comments = Edu_comments::
                        where('serie_id', $id)
                        ->where('comment_id', 0)
                        ->orderBy('created_at', 'desc')->get();
        return view('viewEducaplay/comments')->with('comments', $comments);
    }

    function series($idSerie, $temporada, $urlVideo, $idVideo) {
        $restringeSerie = Edu_serie::find($idSerie);
        $menuEducaplay = $this->educaplayMenu();
        $episodiosSerie = DB::table('edu_serie')
                ->join('edu_imagen', 'edu_serie.id', '=', 'edu_imagen.serie_id')
                ->join('edu_video', 'edu_serie.id', '=', 'edu_video.serie_id')
                ->select('edu_serie.titulo_serie', 'edu_serie.temporadas_total', 'edu_serie.clasificacion_id', 'edu_serie.descripcion', 'edu_imagen.url', 'edu_imagen.ubicacion_id', 'edu_video.id', 'edu_video.sinopsis', 'edu_video.temporada', 'edu_video.capitulo', 'edu_video.url_video')
                ->where('edu_serie.id', '=', $idSerie)
                ->where('edu_imagen.ubicacion_id', '=', 1)
                ->where('edu_video.temporada','=', $temporada)
                ->get();
        return view('viewEducaplay/listaVideosEducaplay')->with('menuEducaplay', $menuEducaplay)->with('episodiosSerie', $episodiosSerie)
                ->with('idSerie', $idSerie)->with('urlVideo', $urlVideo)->with('idVideo', $idVideo)->with('temporada', $temporada)->with('restringido', $restringeSerie->restringido);
    }

    function videoSerie() {
        return view('viewEducaplay/videoSerie');
    }

    //    function getImagesVerticales ($tipo, $id){
    //         COnuslta
    //       dd($imagenVertical);
    ////          $imagenVertical->toJson();
    ////        return '{{urlimagen 1}, {url imagen2}}';
    //    }

    static function consultaClasificacion($idCat) {
        $clasificacion = Edu_clasificaciones::find($idCat);
        if ($clasificacion != null) {
            return $clasificacion->clasifica;
        } else {
            return 'No encontrada';
        }
    }

    static function consultaDatosVideo($idVideoAct) {
        $infoVideo = Edu_video::find($idVideoAct);
        return $infoVideo;
    }

    ///////////////////////////////////////

    public function agregaMiLista() {

        if (\Auth::User()) {

            $id_usuario = \Auth::User()->id;
            $id_serie = filter_input(INPUT_GET, 'id');
            $add = DB::table('edu_lista_usuario')->whereuser_id($id_usuario)->whereserie_id($id_serie)->get();

            if ($add == NULL) {
                $exito = DB::table('edu_lista_usuario')->insert(
                        ['user_id' => $id_usuario, 'video_id' => 0, 'serie_id' => $id_serie]
                );

                if ($exito == 1) {
                    return "Agregada con exito.";
                }
            } else {
                return "Esta serie ya esta agregada a tu lista.";
            }
        } else {
            return "Inicia sesión para poder agregar la serie.";
        }
    }

//////////////////////////////// Votación //////////////////////////////////////////////

    public function votacion() {

        if (\Auth::User()) {

            $id_usuario = \Auth::User()->id;
            $nombre_serie = filter_input(INPUT_GET, 'name');

            if ((DB::table('edu_serie')->wheretitulo_serie($nombre_serie)->wherecategoria_id('2')->get()) != NULL) {

                $n_votos = DB::table('muestra_votacion')->whereuser_id($id_usuario)->count();

                if ($n_votos < 5) {

                    $id_muestra = DB::table('edu_serie')->wheretitulo_serie($nombre_serie)->lists('id');

                    if (DB::table('muestra_votacion')->whereuser_id($id_usuario)->wheremuestraid($id_muestra) != NULL) {

                        $resultado = DB::table('muestra_votacion')->insert([
                            'muestra_id' => $id_muestra[0],
                            'user_id' => $id_usuario,
                        ]);

                        if ($resultado == 1) {

                            $n_votos = 5 - ($n_votos + 1);

                            $resultado = "Ya votaste, te quedan" . $n_votos . " votos";

                            return $resultado;
                        } else {
                            return "Error en la votación.";
                        }
                    } else {
                        return "Ya votaste por esta serie.";
                    }
                } else {
                    return "Ya no tienes votos disponibles";
                }
            } else {
                return "Esta serie no esta concursando.";
            }
        }return "Debes iniciar sesión para poder emitir tu voto.";
    }

    public function guardaposicion() {

        if (\Auth::User()) {

            $id_usuario = \Auth::User()->id;
            $datos = filter_input(INPUT_GET, 'datos');
            $tiempo = $datos->timeElapsed;
            $url = $datos->urlVideo;
            $id_video = DB::table('edu_video')->whereurl_video($url)->get();

            $result = DB::table('edu_avance_visto')->insert(
                    ['user_id' => $id_usuario, 'video_id' => $id_video, 'minuto' => $tiempo]
            );
            if ($result == 1) {
                return "Éxito";
            } else {
                return "No se realizo la operación con éxito";
            }
        } else {
            return "No hay sesión iniciada";
        }
    }
	public function guardaTiempoTranscurrido(){
		if (\Auth::User()){
			$id_usuario = \Auth::User()->id;
            $id_video = filter_input(INPUT_POST, 'video_id');
			$tiempoTranscurrido = filter_input(INPUT_POST, 'transcurrido');
			$avance_visto = Edu_avance_visto::firstOrNew(array('user_id' => $id_usuario , 'video_id' => $id_video));
			$avance_visto->minuto = $tiempoTranscurrido;
			$avance_visto->save();
		}
	}
}
