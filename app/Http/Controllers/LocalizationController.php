<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller {

    protected $layout = 'layouts.default';

    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function index(Request $request, $locale) {
//        $this->layout->title = "Hi I am a title"; //add a dynamic title 
//        $this->layout->content = View::make('home');
        //set’s application’s locale
        app()->setLocale($locale);

        //Gets the translated message and displays it
        echo trans('lang.msg');
    }

}
