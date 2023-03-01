<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::post('/newsletter', function() {

    request()->validate(['email' => 'required | email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('4be3244b0a', [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);
    }catch (\Exception $e) {
        return redirect()->back()->withErrors('message',"Cannot register the email address provided");
       /*throw \Illuminate\Validation\ValidationException::withMessage([
            'email' => 'Email could not be added to our newsletter'
        ]);*/
    }

    return redirect('/')->with('success'. 'You are now signed up for our newsletter');

});

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/post/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/register', [RegisterController::class. 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
