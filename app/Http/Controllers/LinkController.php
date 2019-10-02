<?php

namespace App\Http\Controllers;

use App\Link;
use App\LinkGroup;
use Illuminate\Http\Request;
use Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('myLinks');
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
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return view('onelink',['link' => $link]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        //
    }

    public function apiLinks(Request $request)
    {
        $Links = Link::where('user_id', Auth::user()->id)->with('linkGroups')->get();

        return $Links;
    }
    
    public function apiNewLink(Request $request)
    {
        $validatedData = $request->validate([
            'url' => 'required|url|unique:links|max:512',
            'linkgroup' => 'nullable|exists:link_groups,id',
        ]);

        $formError = [];
        
        try {
            $newLink = Auth::user()->links()->create(['url' => $request->url]);
        } catch (Exception $e) {
            array_push($formError,"coud not create the link");
        }

        if ($request->linkgroup) {
            try {
                LinkGroup::findOrFail($request->linkgroup)->links()->attach($newLink->id);
            } catch (Exception $e) {
                array_push($formError,"coud not associate the link with link group.");
            }
        }

        if ($newLink) {
            return Link::where('id',$newLink->id)->with('linkGroups')->get();
        } else {
            return response(422,$formError);
        }
    }

    public function apiDeleteLink(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:links,id'
        ]);

        Link::destroy($request->id);

        return response($request->id,200);
    }
}
