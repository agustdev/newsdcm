<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LangController extends Controller
{
    public function switchLang(Request $request)
    {
        $language = $request->language;
        session(['language' => $language]);
        return redirect()->back()->with(['language_switched' => $language]);
    }
}
