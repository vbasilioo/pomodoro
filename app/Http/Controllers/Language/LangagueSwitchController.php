<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangagueSwitchController extends Controller
{
    public function switch($locale): \Illuminate\Http\RedirectResponse
    {
        Session::put('locale', $locale);

        App::setLocale($locale);

        return redirect()->back();
    }
}
