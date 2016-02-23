<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller {

    public function home() {
        return view('home');
    }

    public function indexRed() {
        return view('indexRed');
    }

    public function indexVod() {
        return view('indexVod');
    }

    public function indexDocentes() {
        return view('indexDocentes');
    }

    public function publicaciones() {
        return view('red/paginapublicaciones');
    }

////
    public function quienesSomos() {
        return view('red/paginaquienessomos');
    }

    public function prueba() {
        return view('red/paginaprueba');
    }

    public function proyectos() {
        return view('red/paginaproyectos');
    }

    public function areastematicas() {
        return view('red/paginaareastematicas');
    }

    public function viewTable() {
        $proyectos = \App\Red\Proyectos::all();
    }

    public function contacto() {
        return view('red/paginacontacto');
    }

    public function frmbanner() {
        return view('red/frmbanner');
    }

    public function frmcolaboradores() {
        return view('red/frmcolaboradores');
    }

    public function frmproyectos() {
        return view('red/frmproyectos');
    }

    public function frmpublicaciones() {
        return view('red/frmpublicaciones');
    }

    public function usuarios() {
        return view('red/frmusuarios');
    }

    public function guardaCorreoNewsLetter() {

        $news = new \App\Red\News();
        $correo = filter_input(INPUT_POST, 'correo_newsletter');
        $news->correo = 
        $news->hash = md5(date('Y/m/d H:i:s'));
        $news->save();
        $this->sendConfirmMail($correo);
        print 'guardado';
    }

    private function sendConfirmMail($mail) {
        
        $título = 'Recordatorio de cumpleaños para Agosto';
        $mensaje = '
                    <html>
                    <head>
                      <title>Recordatorio de cumpleaños para Agosto</title>
                    </head>
                    <body>
                      <p>¡Estos son los cumpleaños para Agosto!</p>
                      <table>
                        <tr>
                          <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
                        </tr>
                        <tr>
                          <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
                        </tr>
                        <tr>
                          <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
                        </tr>
                      </table>
                    </body>
                    </html>
                    ';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
        $cabeceras .= 'To: Israel  <j.israel.toledo@gmail.com.com>' . "\r\n";
        $cabeceras .= 'From: Recordatorio <ventana@televisioneducativa.gob.mx>' . "\r\n";        

// Enviarlo
        mail($mail, $título, $mensaje, $cabeceras);
    }

//    public function integrantesSlider() {
//        return view('integrantesSlider');
//    }
}
