<?php



Route::get('/', function () {
    return view('welcome');
});

Route::get('send-message', function(){
	return view('send_message');
});

Route::post('send-message', function(){
	$message = request()->message;
	$username = request()->name;

	event(new App\Events\NewMessage($username , $message));

	return response()->json(['success' => true]);
});
