<?php

namespace App\Http\Controllers;

use Mail;
use DB;
use App\User;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Intereses_educativos;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\URL;



class VentanaController extends Controller {
  //    public function correoEnviado() {/*para pruebas de visualización*/
  //        return view('viewVentana/correoEnviado');
  //    }
  //
  public function ventana_educativa() {
    Flash::message('Para una mejor experiencia de visualización le recomendamos usar el navegador Google Chrome o Firefox');
    return view('viewVentana/ventana-educativa');
  }

  public function registraUsuario(Request $request) {

    if($request->is_teacher != 'on'){

    $validator = Validator::make($request->all(), [
      'name' => 'required|max:254',
	    'ApPaterno' => 'required|max:254',
	    'ApMaterno' => 'required|max:254',
      'email' => 'required|email|max:254|unique:users',
      'password' => 'required|max:60|min:6|confirmed',
      'genero' => 'required',
      'nacimiento' => 'required',
      'ciudad' => 'required|max:100',
      'pais' => 'required|max:100',
      'condiciones' => 'required|accepted',

    ]);

    if ($validator->fails()) {
      return redirect('registro')
      ->withErrors($validator)
      ->withInput();
    }


    }elseif ($request->is_teacher == 'on' && $request->tipo_docente == 'telesecundaria') {

      $validator = Validator::make($request->all(), [

      'name' => 'required|max:254',
      'ApPaterno' => 'required|max:254',
      'ApMaterno' => 'required|max:254',
      'email' => 'required|email|max:254|unique:users',
      'password' => 'required|max:60|min:6|confirmed',
      'genero' => 'required',
      'nacimiento' => 'required',
      'ciudad' => 'required|max:100',
      'pais' => 'required|max:100',
      'condiciones' => 'required|accepted',
      'cct' => 'required',
      'curpDocente' => 'required',

      ]);

      if ($validator->fails()) {
        return redirect('registro')
        ->withErrors($validator)
        ->withInput();
      }

  }


    $users = new \App\User();



    $users->name = filter_input(INPUT_POST, 'name');
	$users->a_paterno = filter_input(INPUT_POST, 'ApPaterno');
	$users->a_materno = filter_input(INPUT_POST, 'ApMaterno');
    $users->email = filter_input(INPUT_POST, 'email');
    $users->password = bcrypt(filter_input(INPUT_POST, 'password'));
    $users->genero = filter_input(INPUT_POST, 'genero');
    $users->nacimiento = filter_input(INPUT_POST, 'nacimiento');
    $users->ciudad = filter_input(INPUT_POST, 'ciudad');
    $users->pais = filter_input(INPUT_POST, 'pais');
    $users->intereses_edu = filter_input(INPUT_POST, 'intereses_edu');
    $users->is_teacher = (filter_input(INPUT_POST, 'is_teacher') == 'on')? 1 : 0;
    $users->is_student = (filter_input(INPUT_POST, 'is_student') == 'on')? 1 : 0;
    $users->is_parent =  (filter_input(INPUT_POST, 'is_parent') == 'on')? 1 : 0;
    $users->condiciones = (filter_input(INPUT_POST, 'condiciones') == 'on')? 1 : 0;

    $users->save();

    if ($request->is_teacher == 'on') {

      $med_docente = new \App\Model\Docente\Med_Docente();
      $med_docente->user_id = \App\User::whereemail($request->email)->first()->id;

      if($request->tipo_docente == 'telesecundaria'){

        $med_docente->clavecct = $request->cct;
        $med_docente->rfc = $request->curpDocente;
        $med_docente->tipo_docente = '1';

      }elseif ($request->tipo_docente == 'basica') {

        $med_docente->tipo_docente = '2';

      }
      else {

        $med_docente->tipo_docente = '3';

      }

      $med_docente->save();

    }

    return $this->enviaCorreoActivacion($users->email, md5($users->password), filter_input (INPUT_POST, 'back_url'));

  }

  public function presentacion() {
    return view('viewVentana/presentacionVentana');
  }

  public function registro() {

    return view('viewVentana/registroVentana')
    ->with ('back_url', URL::previous());
  }

  public function acceso() {
    return view('viewVentana/acceso');
  }


  private function newImage ($originalFile){
    $info = getimagesize($originalFile);
    $mime = $info['mime'];
    switch ($mime) {
      case 'image/jpeg':
      $img = imagecreatefromjpeg($originalFile);
      break;

      case 'image/png':
      $img = imagecreatefrompng($originalFile);
      break;

      case 'image/gif':
        $img = imagecreatefromgif($originalFile);
        break;

        default:
        throw new Exception('Unknown image type.');
      }
      return $img;
    }

    public function enviaCorreoActivacion($correo, $hash, $back_url) {
        Mail::send('viewVentana.emails.activacion', ['correo' => $correo, 'hash' => $hash], function ($m) use ($correo) {
            $m->from('ventana@televisioneducativa.gob.mx', 'Ventana Educativa');
            $m->to($correo)->subject('Activación de correo!');
        });
//        return redirect ($back_url);
        return view('viewVentana/correoEnviado');
    }

    public function activaCorreo(Request $request, $correo, $hash) {
        $user = \App\User::where('email', '=', $correo)->first();

        if (md5($user->password) == $hash) {
            $user->activo = 1;
            $user->save();
            return Redirect::home()->with('message','¡Bienvenido! Gracias por ser parte de Ventana Educativa. Ahora puedes iniciar sesión');
//            return view('viewVentana/activacionCorrecta');
        } else {
            print 'error';
        }
    }

    private function resize($newWidth, $targetFile, $originalFile) {
      $img = $this->newImage ($originalFile);
      list($width, $height) = getimagesize($originalFile);
      //        $newHeight = ($height / $width) * $newWidth;
      $newHeight = $newWidth;
      $tmp = imagecreatetruecolor($newWidth, $newHeight);
      $width = ($width > $height)? $height : $width;
      $height = ($height > $width) ? $width : $height;
      imagecopyresampled($tmp, $img,
      0,              //dst_x
      0,              //dst_y
      0,              //src_x
      0,              //src_y
      $newWidth,      //dst_w
      $newHeight,     //dst_h
      $width,         //src_w
      $height);       //src_h

      if (file_exists($targetFile)) {
        unlink($targetFile);
      }
      imagepng ($tmp, $targetFile);
    }

    public function cambiaAvatar() {

      if (Input::file('image')->isValid()) {
        $targetFile = 'uploaded/avatares/'.Auth::user()->id . '.png';
        $this->resize(200, $targetFile, Input::file('image')->getRealPath());
        print url($targetFile);
      } else {
        print 0;
      }
    }

	public function existeCCT($claveCCT){

		$consultaCCT = \App\Model\Mediateca\Med_cct::where('clave_cct',$claveCCT)->first();

    if ( isset($consultaCCT) ) {
      return $consultaCCT->nombre_cct;
    }

    else {
      return 0;
    }

	}
}
