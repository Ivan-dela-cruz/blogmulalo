<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'inicio');
Route::get('login', 'Web\PageController@login')->name('login');


Route::get('nuevo', function () {
    return view('admin.inicio.index');
});
Auth::routes();

//user administradores
Route::get('autoridades', 'Admin\RepresentativeController@indexUser')->name('autoridades');

//user
Route::get('inicio', 'Web\PageController@home')->name('home');
Route::get('noticias', 'Web\PageController@blog')->name('blog');
Route::get('noticia/{slug}', 'Web\PageController@post')->name('post');
Route::get('categoria/{slug}', 'Web\PageController@category')->name('category');
Route::get('etiqueta/{slug}', 'Web\PageController@tag')->name('tag');

//Userplanification
Route::get('planificaciones', 'Web\planificationUser@index')->name('planificaciones');
Route::get('planificacion/{slug}', 'Web\planificationUser@show')->name('planificacion');
Route::get('category-planification/{slug}', 'Web\planificationUser@category')->name('category-planification');

//User releases
Route::get('convocatorias', 'Web\releaseUserController@index')->name('convocatorias');
Route::get('convocatoria-detalle/{slug}', 'Web\releaseUserController@show')->name('convocatoria-detalle');
Route::get('category-convocatorias/{slug}', 'Web\releaseUserController@category')->name('category-convocatorias');



//user userservice
Route::resource('userservice', 'Admin\UserServiceController');


Route::middleware('auth')->group(function () {
    Route::get('administrador', function () {
        return view('admin.inicio.index');
    });

    //admin tags
    Route::resource('tag', 'Admin\TagController');
    Route::POST('store-tag', 'Admin\TagController@store');
    Route::POST('update-tag', 'Admin\TagController@update');
    Route::POST('destroy-tag', 'Admin\TagController@destroy');

    //admin category post
    Route::resource('category', 'Admin\CategoryController');
    Route::POST('store-category', 'Admin\CategoryController@store');
    Route::POST('update-category', 'Admin\CategoryController@update');
    Route::POST('destroy-category', 'Admin\CategoryController@destroy');

    //admin category planification
    Route::resource('categoryplanification', 'Admin\CategoryPlanificationController');
    Route::POST('store-categoryplanification', 'Admin\CategoryPlanificationController@store');
    Route::POST('update-categoryplanification', 'Admin\CategoryPlanificationController@update');
    Route::POST('destroy-categoryplanification', 'Admin\CategoryPlanificationController@destroy');

    //admin category planification
    Route::resource('categoryservice', 'Admin\CategoryServiceController');
    Route::POST('store-categoryservice', 'Admin\CategoryServiceController@store');
    Route::POST('update-categoryservice', 'Admin\CategoryServiceController@update');
    Route::POST('destroy-categoryservice', 'Admin\CategoryServiceController@destroy');

    //admin representative
    Route::resource('representative', 'Admin\RepresentativeController');

    //admin post
    Route::resource('posts', 'Admin\PostController');
    Route::POST('destroy-post', 'Admin\PostController@destroy');
    Route::get('post-draft', 'Admin\PostController@borrador')->name('post-draft');
    Route::get('post-published', 'Admin\PostController@publicadas')->name('post-published');
    
     //admin service
   // Route::resource('services', 'Admin\ServiceController');
    //Route::POST('destroy-service', 'Admin\ServiceController@destroy');
    //Route::get('service-draft', 'Admin\ServiceController@borrador')->name('service-draft');
    //Route::get('service-published', 'Admin\ServiceController@publicadas')->name('service-published');
    //admin service
    Route::resource('services', 'Admin\ServiceController');
    Route::POST('destroy-service', 'Admin\ServiceController@destroy');
    Route::get('service-draft', 'Admin\ServiceController@borrador')->name('service-draft');
    Route::get('service-published', 'Admin\ServiceController@publicadas')->name('service-published');

    //admin planification
    Route::resource('planification', 'Admin\PlanificationController');
    Route::POST('destroy-planification', 'Admin\PlanificationController@destroy');
    Route::get('download-planification/{id}', 'Admin\PlanificationController@dowmloadPdf')->name('downloadfile');
    
    
    //admin period Administrativo
    Route::resource('period', 'Admin\PeriodoAdminController');
    Route::POST('store-period', 'Admin\PeriodoAdminController@store');
    Route::POST('update-period', 'Admin\PeriodoAdminController@update');
    Route::POST('destroy-period', 'Admin\PeriodoAdminController@destroy');

    //admin representatives
    //admin representatives
    Route::resource('representative', 'Admin\RepresentativeController');
    Route::POST('destroy-representative', 'Admin\RepresentativeController@destroy');


    Route::get('plan-draft', 'Admin\PlanificationController@borrador')->name('plan-draft');
    Route::get('plan-published', 'Admin\PlanificationController@publicadas')->name('plan-published');


    Route::resource('period', 'Admin\PeriodoAdminController');
    Route::resource('planification', 'Admin\PlanificationController');


    //admin convocatoria
    Route::resource('categoria_convocatoria', 'Admin\CategoryReleaseController');
    Route::resource('convocatoria', 'Admin\ReleaseController');
    Route::resource('reunion', 'Admin\MeetingController');

});

