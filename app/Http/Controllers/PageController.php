<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() {
        return view('Footer.about');
    }

    public function contact() {
        return view('Footer.contact');
    }

    public function faq() {
        return view('Footer.faq');
    }

    public function terms() {
        return view('Footer.terms');
    }

    public function privacy() {
        return view('Footer.privacy');
    }

    public function returnPolicy() {
        return view('Footer.return');
    }
}

