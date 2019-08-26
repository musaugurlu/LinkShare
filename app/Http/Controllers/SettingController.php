<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','apiSetSettings']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.index');
    }

    public function apiGetSettings(Request $request)
    {
        return $request->user()->setting;
    }
    
    public function apiSetSettings(Request $request)
    {
        $S = $request->user();
        // $S->S1 = $request->input('S1');
        // $S->save();
        // dd($request->input('S1'));
        return $S;
    }
    
}
