<?php


/**
 * +--------+-----------+-------------------------+------------------+-------------------------------------------------+------------+
 * | Domain | Method    | URI                     | Name             | Action                                          | Middleware |
 * +--------+-----------+-------------------------+------------------+-------------------------------------------------+------------+
 * |        | GET|HEAD  | /                       |                  | Closure                                         | web        |
 * |        | GET|HEAD  | api/question            | question.index   | App\Http\Controllers\QuestionController@index   | api        |
 * |        | POST      | api/question            | question.store   | App\Http\Controllers\QuestionController@store   | api        |
 * |        | GET|HEAD  | api/question/{question} | question.show    | App\Http\Controllers\QuestionController@show    | api        |
 * |        | PUT|PATCH | api/question/{question} | question.update  | App\Http\Controllers\QuestionController@update  | api        |
 * |        | DELETE    | api/question/{question} | question.destroy | App\Http\Controllers\QuestionController@destroy | api        |
 * +--------+-----------+-------------------------+------------------+-------------------------------------------------+------------+
 */
Route::apiResource('/question', 'QuestionController');

Route::apiResource('/category', 'CategoryController');
