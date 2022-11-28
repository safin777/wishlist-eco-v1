<?php

namespace App\Http\Controllers;
use App\Models\Bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = Auth::user();
        $max = 50;
        $min = 20;
        $bar = new Bar();
        $bar->max = $max;
        $bar->min = $min;
        //$bar->shop_id = $shop->id;  
        $bar->save();

        $themes = $shop->api()->rest('GET', '/admin/script_tags.json');
        $snippet = "https://a2ee-202-53-164-153.in.ngrok.io/scripttag/progressbar.js";
        $array = array('script_tag' => array('event' => 'onload', 'src' => $snippet));
        $shop->api()->rest('POST', '/admin/api/2022-10/script_tags.json', $array);
        
        return redirect()->route('settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function show(Bar $bar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bar $bar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bar $bar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bar  $bar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bar $bar)
    {
        //
    }
}
