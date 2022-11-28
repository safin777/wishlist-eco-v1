<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //auth user
        $shop = Auth::user();
        $shop_script_tag_api = $shop->api()->rest('GET', '/admin/api/2022-10/script_tags.json')['body'];
        return view('settings', compact('shop_script_tag_api'));
    }

    //add new script tag in script_tasg_api 

    public function addProgressbarScriptTag(Request $request )
    {
        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/script_tags.json');
        // get active theme id
        $snippet = "https://a2ee-202-53-164-153.in.ngrok.io/scripttag/progressbar.js";
        // Data to pass to our rest api request
        $array = array('script_tag' => array('event' => 'onload', 'src' => $snippet));
        $shop->api()->rest('POST', '/admin/api/2022-10/script_tags.json', $array);
        return redirect()->route('settings');
    }

    public function deleteProgressbarScriptTag( Request $id)
    {   
        $script_id = $id->id;
        
        $shop = Auth::user();
        $snippet = "https://a2ee-202-53-164-153.in.ngrok.io/scripttag/progressbar.js";
        $array = array('script_tag' => array('event' => 'onload', 'src' => $snippet));
        $cd = $shop->api()->rest('DELETE', '/admin/api/2022-10/script_tags/'.$script_id.'.json',$array);
        return redirect()->route('settings');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
