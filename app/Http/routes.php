<?php

/************************** Autenticación *************************/
//Route::get ('/createUser', function (){
//    \App\User::create ([
//        'name'=>'Israel',
//        'email'=>'j.israel.toledo@gmail.com',
//        'password'=> Hash::make ('israel')
//        ]);
//});
Route::resource ('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');

// Password reset link request routes...
//Route::get('password/email', 'Auth\PasswordController@getEmail');
//Route::post('password/email', 'Auth\PasswordController@postEmail');
//
//// Password reset routes...
//Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
//Route::post('password/reset', 'Auth\PasswordController@postReset');

/************************** Autenticación *************************/

/****************************REDMITE***********************/
/*Vistas principales REDMITE*/
Route::get('/','RedmiteController@redmite');
Route::get('testCorreo','RedmiteController@testMail');
Route::get('redmite','RedmiteController@redmite');

/*Vistas de páginas secundarias REDMITE*/
Route::get('publicaciones','RedmiteController@publicaciones');
Route::get('quienesSomos','RedmiteController@quienesSomos');
Route::get('areastematicas','RedmiteController@areastematicas');
Route::get('proyectos','RedmiteController@proyectos');
Route::get('contacto','RedmiteController@contacto');
Route::get('correoValidado','RedmiteController@correoValidado');

/*Vistas de administración Formularios REDMITE*/
Route::get('frmbanner','RedmiteController@frmbanner');
Route::get('frmcolaboradores','RedmiteController@frmcolaboradores');
Route::get('frmproyectos','RedmiteController@frmproyectos');
Route::get('frmpublicaciones','RedmiteController@frmpublicaciones');
Route::get('usuarios','RedmiteController@usuarios');
Route::post('guardaCorreoNewsLetter', 'RedmiteController@guardaCorreoNewsLetter');
Route::get('activaCorreo/{correo}/{hash}', 'RedmiteController@activaCorreoNews');
Route::post('guardaContacto', 'RedmiteController@guardaContacto');

/****************************REDMITE***********************/



/****************************HOME VENTANA***********************/
//Route::get('/','VentanaController@ventana');
/* Las rutas dentro de este grupo, tienen sesión*/
Route::group(['middleware' => 'web'], function () {
     Route::auth();     
     Route::get('ventana_educativa',['as'=>'home', 'uses'=>'VentanaController@ventana_educativa']);
     Route::resource ('sessions', 'SessionsController');
     Route::get('login', 'SessionsController@create');
     Route::get('logout', 'SessionsController@destroy');

});

Route::get('registro','VentanaController@registro');
Route::get('presentacion','VentanaController@presentacion');
Route::post('registraUsuario', 'VentanaController@registraUsuario');
Route::get ('testSession','SessionsController@test');
/****************************HOME VENTANA***********************/