<?php
use Illuminate\Http\Request;

Route::post('register', 'DrawController@register');
Route::post('getIn', 'DrawController@getIn');
Route::get('canvas', 'DrawController@canvas');
Route::post('draw', 'DrawController@draw');
Route::delete('undo/{id}', 'DrawController@undo');
Route::delete('leave/{id}', 'DrawController@leave');
