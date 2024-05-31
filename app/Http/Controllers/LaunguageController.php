<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaunguageController extends Controller
{
    public function switchLanguage(Request $request){
        $language = $request->input('language');

        session(['language' => $language]);

        return redirect()->back()->with('success', 'Language switched');
    }
}
