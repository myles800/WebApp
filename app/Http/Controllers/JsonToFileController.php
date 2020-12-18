<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class JsonToFileController extends Controller
{
    public function downloadJSON(){
        $table = $user = Auth::user();
        $filename = "mydata.json";
        $handle = fopen($filename, 'w+');
        fputs($handle, $table->toJson(JSON_PRETTY_PRINT));
        fclose($handle);
        $headers = array('Content-type'=> 'application/json');
        return response()->download($filename,$filename,$headers);
    }
    public function gdpr(){
        return view("gdpr");
    }
}
