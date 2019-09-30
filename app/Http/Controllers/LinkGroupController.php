<?php

namespace App\Http\Controllers;

use App\LinkGroup;
use Illuminate\Http\Request;
use Auth;

class LinkGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('myLinkGroups');
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
     * @param  \App\LinkGroup  $linkGroup
     * @return \Illuminate\Http\Response
     */
    public function show(LinkGroup $linkGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LinkGroup  $linkGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkGroup $linkGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LinkGroup  $linkGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkGroup $linkGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LinkGroup  $linkGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkGroup $linkGroup)
    {
        //
    }

    public function apiLinkGroups(Request $request)
    {
        $LinkGroups = LinkGroup::where('user_id',Auth::user()->id)->with('links')->get();

        return $LinkGroups;
    }
}
