<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Mediateca\Telesecundaria;
use App\Model\Mediateca\Telebachillerato;
use App\Model\Mediateca\RatingTelesecundaria;
use \Alaouy\Youtube\Facades\Youtube;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class MediatecaController extends Controller {

    public function mediateca() {
        return view('viewMediateca/mediateca');
    }

    public function telesecundaria() {
        return view('viewMediateca/telesecundaria');
    }

    public function telebachillerato() {
        return view('viewMediateca/telebachillerato');
    }

    public function primergrado() {
        return view('viewMediateca/primerGrado');
    }

    public function segundogrado() {
        return view('viewMediateca/segundoGrado');
    }

    public function tercergrado() {
        return view('viewMediateca/tercerGrado');
    }

    public function semestreI() {
        return view('viewMediateca/semestreI');
    }

    public function semestreII() {
        return view('viewMediateca/semestreII');
    }

    public function semestreIII() {
        return view('viewMediateca/semestreIII');
    }

    public function semestreIV() {
        return view('viewMediateca/semestreIV');
    }

    public function semestreV() {
        return view('viewMediateca/semestreV');
    }

    public function semestreVI() {
        return view('viewMediateca/semestreVI');
    }

    public function componente() {
        return view('viewMediateca/componente');
    }
	
    public function videos() {
//        $thumbnail = "https://i.ytimg.com/vi/".$video1."/default.jpg";

        return view('viewMediateca/videos');
    }

    public function test(Request $request) {
        /* Obtener información de video */
//        $video = Youtube::getVideoInfo('DuoWIRDptWM');
//        var_dump ($video);
        /* obtener url de thumbnail */
//        echo $thumbnail = $video->snippet->thumbnails->default->url;
        /* obtener url */
//        $url = $request->path();
//        print 'url de seccion:  '.$url;
//        $consultaVideo = DB::select('select * from telesecundaria where grado = "primero" and materia=');
//             $bloquePaginacion = Telesecundaria::distinct()->select('bloque')->get();
//        dd($bloquePaginacion);
    }

    public function getVideos(Request $request, $nivel, $grado, $materia, $bloque) {
        /* Obtener el path */
        $url_actual = $request->path();
        /* Obtener el último fragmento de l path y agregarselo a la cadena de path actual */
        $url = substr($url_actual, 0, strrpos($url_actual, '/'));
        if ($nivel == 'telesecundaria') {
            return $this->getVideosTelesecundaria($grado, $materia, $bloque, $url);
        } else if ($nivel == 'telebachillerato') {
            return $this->getVideosTelebachillerato($grado, $materia, $bloque, $url);
        } else {
            //VISTA ERROR
            return 'error';
        }
    }

    public function getVideosTelesecundaria($grado, $materia, $bloque, $url) {
        if ($bloque > 0){
            /* Query para filtrar videos por grado, bloque, materia */
            $videos = Telesecundaria::whereNested(function($sQL) use ($grado, $materia, $bloque) {
                        $sQL->where('grado', '=', $grado);
                        $sQL->where('materia_id', '=', $materia);
                        $sQL->where('bloque', '=', $bloque);
                    })->get();
                    /* Query para extraer los distintos bloques que existen en la tabla */
            $paginacion = Telesecundaria::distinct()->select('bloque')->orWhereNotNull('bloque')->get();
        } else {
                    /* Query para filtrar videos por grado, bloque, materia */
            $videos = Telesecundaria::whereNested(function($sQL) use ($grado, $materia, $bloque) {
                    $sQL->where('grado', '=', $grado);
                    $sQL->where('materia_id', '=', $materia);
//                    $sQL->where('bloque', '=','null');
            })->get();
            $paginacion [] = new Telesecundaria;
            $paginacion[0]->bloque = 0;
        }
        
        /* Envío de querys y variables a la vista */
        return view('viewMediateca/videos')
                        ->with('nivel', 'telesecundaria')
                        ->with('videos', $videos)
                        ->with('paginacion', $paginacion)
                        ->with('url', $url);
    }
    
    public function guardaRating (){
        $nivel = filter_input(INPUT_POST, 'nivel');
        $id = filter_input(INPUT_POST, 'id');
        $rating = filter_input(INPUT_POST, 'rating');
        if ($nivel == 'telesecundaria') {
            $user_id = Auth::user ()->id;            
            $ratingSaved = RatingTelesecundaria::
                    firstOrCreate(['user_id' => $user_id, 
                                   'telesecundaria_id' => $id]);
            $ratingSaved->rating = $rating;
            $ratingSaved->save ();
        }
        
    }

    public function getVideosTelebachillerato($grado, $materia, $bloque, $url) {
             if ($bloque > 0){
            /* Query para filtrar videos por grado, bloque, materia */
            $videos = Telebachillerato::whereNested(function($sQL) use ($grado, $materia, $bloque) {
                        $sQL->where('semestre', '=', $grado);
                        $sQL->where('materia_id', '=', $materia);
                        $sQL->where('numero_programa', '=', $bloque);
                    })->get();
                    /* Query para extraer los distintos bloques que existen en la tabla */
            $paginacion = Telebachillerato::distinct()->select('numero_programa')->orWhereNotNull('numero_programa')->get();
        } else {
                    /* Query para filtrar videos por grado, bloque, materia */
            $videos = Telebachillerato::whereNested(function($sQL) use ($grado, $materia, $bloque) {
                    $sQL->where('semestre', '=', $grado);
                    $sQL->where('materia_id', '=', $materia);
//                    $sQL->where('bloque', '=','null');
            })->get();
            $paginacion [] = new Telebachillerato;
            $paginacion[0]->bloque = 0;
        }
        
        /* Envío de querys y variables a la vista */
        return view('viewMediateca/videos')
                        ->with('nivel', 'telebachillerato')
                        ->with('videos', $videos)
                        ->with('paginacion', $paginacion)
                        ->with('url', $url);
    }

    public function store(Request $request) {
        Flash::message('Welcome Aboard!');
        return redirect('educamedia/telesecundaria/primergrado')->with('key', 'You have done successfully');
    }

    public function storeTelesecundariaComment (){
        
        $comment = new \App\Model\Mediateca\TelesecundariaComments;
        $comment->comment_id = filter_input (INPUT_POST, 'comment_id');
        $comment->usuario_id = Auth::user ()->id;
        $comment->telesecundaria_id = filter_input (INPUT_POST, 'video_id');        
        $comment->comment = filter_input (INPUT_POST, 'comment');
        $comment->save ();
        return view('viewMediateca/comments')->with('comment', $comment);
    }
}
