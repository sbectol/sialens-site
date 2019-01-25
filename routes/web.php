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


Route::get('/scores/highscores' , 'ScoresController@highScores');

Route::get('/scores/highschools', 'ScoresController@highSchools');

Route::get('/scores/topschools', 'ScoresController@topSchools');

Route::get('/scores/schoolstats/{id}', 'ScoresController@schoolStats');


Route::get('/scores/topclass', 'ScoresController@topClass');

Route::get('/scores/profileStats/{id}' , 'ScoresController@profileStats');

Route::post('/scores/store', 'ScoresController@store');

Route::get('/', ['uses' => 'QuestionsController@index' ,'as' => 'home']);

// Route::get('/avatar/{id}' , 'AvatarsController@hasAvatar');

Route::get('/avatar/get/{id}' , 'AvatarsController@getAvatar');

Route::get('/questions/delete/{id}' , 'QuestionsController@deleteConfirm');

Route::post('/questions/delete/{id}', 'QuestionsController@delete');

Route::get('/avatar/create' , 'AvatarsController@create');

Route::post('/avatar/store' , 'AvatarsController@store');

Route::get('/questions', 'QuestionsController@index');

Route::get('/users', 'UsersController@index');

Route::get('/users/edit/{id}', 'UsersController@edit');

Route::post('/users/role','UsersController@setRole');

Route::get('/questions/edit/{id}', 'QuestionsController@edit');

Route::post('/questions/update/{id}', 'QuestionsController@update');

Route::get('/options/edit/{id}', 'OptionsController@edit');

Route::post('/options/update/{id}', 'OptionsController@update');

Route::get('/questionsids', 'QuizController@getIds');

Route::get('/questions/create', 'QuestionsController@create');

Route::get('/pori', 'QuestionsController@approved');

Route::get('/ysgol/creu' , 'SchoolsController@create');

Route::get('/ysgol/golygu/{id}' , 'SchoolsController@edit');

Route::post('/ysgol/golygu/{id}' , 'SchoolsController@update');

Route::post('/ysgol/creu' , 'SchoolsController@store');

Route::get('/ysgolion' , 'SchoolsController@index');

Route::get('/proffil/creu' , 'ProfilesController@create');

Route::get('/proffil' , 'ProfilesController@index');

Route::get('/proffil/{id}' , 'ProfilesController@index');

Route::post('/proffil/creu' , 'ProfilesController@store');


Route::get('/options/create', 'OptionsController@create');

Route::post('/questions', 'QuestionsController@store');

Route::post('/options', 'OptionsController@store');

Route::get('/questions/{question}', 'QuestionsController@show');

Route::post('/questions/{question}/options', 'OptionsController@store');


Route::get('/login', [ 'as' => 'login', 'uses' => 'SessionsController@create']);

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/quiz', 'QuizController@getQuiz');

Route::get('/singleQuestion/{question}', 'QuizController@getSingle');

Route::post('/quiz/result', 'QuizController@result');

Route::get('about', function(){

    return view('about');

});

