<?php

/* * ************************ Autenticación ************************ */
//Route::get ('/createUser', function (){
//    \App\User::create ([
//        'name'=>'Israel',
//        'email'=>'j.israel.toledo@gmail.com',
//        'password'=> Hash::make ('israel')
//        ]);
//});
Route::resource('user', 'Api\User');
Route::resource('sessions', 'SessionsController');
Route::get('user/existEmail/{email}', ['as' => 'user.existEmail', 'uses' => 'Api\User@existEmail']);
Route::get('user/existNick/{nickname}', ['as' => 'user.existNick', 'uses' => 'Api\User@existNick']);
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');




/* * ************************ Autenticación ************************ */

/* * **************************REDMITE********************** */
/* Vistas principales REDMITE */
//Route::get('/','RedmiteController@redmite');
Route::get('redmite', 'RedmiteController@redmite');

/* Vistas de páginas secundarias REDMITE */
Route::get('redmite/publicaciones', 'RedmiteController@publicaciones');
Route::get('redmite/quienesSomos', 'RedmiteController@quienesSomos');
Route::get('redmite/areastematicas', 'RedmiteController@areastematicas');
Route::get('redmite/proyectos', 'RedmiteController@proyectos');
Route::get('redmite/contacto', 'RedmiteController@contacto');
Route::get('redmite/correoValidado', 'RedmiteController@correoValidado');
Route::get('redmite/contacto', 'RedmiteController@contacto');
Route::get('correoValidado', 'RedmiteController@correoValidado');


/* Vistas de administración Formularios REDMITE */
Route::get('redmite/usuarios', 'RedmiteController@usuarios');
Route::post('redmite/guardaCorreoNewsLetter', 'RedmiteController@guardaCorreoNewsLetter');
Route::get('redmite/activaCorreo/{correo}/{hash}', 'RedmiteController@activaCorreoNews');
Route::post('redmite/guardaContacto', 'RedmiteController@guardaContacto');


/* * **************************REDMITE********************** */



/* * **************************HOME VENTANA********************** */

/* Las rutas dentro de este grupo, tienen sesión */
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'VentanaController@ventana_educativa');
    Route::get('ventana_educativa', ['as' => 'home', 'uses' => 'VentanaController@ventana_educativa']);
    Route::get('home', 'VentanaController@ventana_educativa');
    Route::resource('sessions', 'SessionsController');
    Route::get('login', 'SessionsController@create');
    Route::get('logout', 'SessionsController@destroy');
    Route::post('cambiaAvatar', 'VentanaController@cambiaAvatar');

    // Password reset link request routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    //
    //// Password reset routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');


    Route::get('verificaCorreo/{correo}/{hash}', 'VentanaController@activaCorreo');
    Route::get('registro', 'VentanaController@registro');
    Route::get('presentacion', 'VentanaController@presentacion');
    Route::post('registraUsuario', 'VentanaController@registraUsuario');
    Route::get('correoEnviado', 'VentanaController@correoEnviado');
    
    /* REDMITE */
    Route::resource('redmite/blog', 'RedBlogController');
    Route::post('redmite/blog/comment', 'RedBlogController@comment');
    /* /REDMITE */

//Route::get ('testSession','SessionsController@test');
    /*     * **************************HOME VENTANA********************** */
    
    

    /*     * **************************MEDIATECA********************** */
    Route::get('mediateca', 'MediatecaController@mediateca');
    Route::get('mediateca/telesecundaria', 'MediatecaController@telesecundaria');
    Route::get('mediateca/telebachillerato', 'MediatecaController@telebachillerato');
    Route::get('mediateca/telesecundaria/primergrado', 'MediatecaController@primergrado');
    /* ejemplo de uso para youtube */
    Route::get('mediateca/{nivel}/{grado}/{materia}/{bloque}', 'MediatecaController@getVideos');
//Route::get('mediateca/telesecundaria/1/11', 'MediatecaController@getVideos');
    Route::get('mediateca/telesecundaria/segundogrado', 'MediatecaController@segundogrado');
    Route::get('mediateca/telesecundaria/tercergrado', 'MediatecaController@tercergrado');
    Route::get('mediateca/telebachillerato/semestreI', 'MediatecaController@semestreI');
    Route::get('mediateca/telebachillerato/semestreII', 'MediatecaController@semestreII');
    Route::get('mediateca/telebachillerato/semestreIII', 'MediatecaController@semestreIII');
    Route::get('mediateca/telebachillerato/semestreIV', 'MediatecaController@semestreIV');
    Route::get('mediateca/telebachillerato/semestreV', 'MediatecaController@semestreV');
    Route::get('mediateca/telebachillerato/semestreVI', 'MediatecaController@semestreVI');
    Route::get('mediateca/videos', 'MediatecaController@videos');
    Route::get('mediateca/test', 'MediatecaController@test');
    Route::get('mediateca/getVideosTelesec', 'MediatecaController@getVideosTelesec');
    /*     * **************************MEDIATECA********************** */
});
