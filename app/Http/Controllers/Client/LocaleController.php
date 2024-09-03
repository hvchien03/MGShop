<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setLocale($lang)
    {
        if (in_array($lang, ['en', 'vi'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        return back();
    }
}
