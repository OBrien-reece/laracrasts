<?php

namespace App\Http\Controllers;

use App\Services\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(NewsLetter $newsLetter)
    {
        request()->validate(['email' => 'required | email']);

        try {

            /*(new NewsLetter())->subscribe(request('email'));*/

            /*$newsletter = new NewsLetter();*/

            $newsLetter->subscribe(request('email'));

        }catch (\Exception $e) {
            return redirect()->back()->withErrors('message',"Cannot register the email address provided");
            /*throw \Illuminate\Validation\ValidationException::withMessage([
                 'email' => 'Email could not be added to our newsletter'
             ]);*/
        }

        return redirect('/')->with('success'. 'You are now signed up for our newsletter');
    }
}
