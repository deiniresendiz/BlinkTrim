<?php

namespace App\Http\Controllers;

use App\Models\UrlShort;
use Illuminate\Http\Request;

class UrlShortController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('createGuest');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UrlShort $urlShort)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UrlShort $urlShort)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UrlShort $urlShort)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UrlShort $urlShort)
    {
        //
    }

    public function createGuest(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        $urlShort = new UrlShort();
        $urlShort->to_url = $request->url;
        $urlShort->url_key = UrlShort::generateShortUrl();
        $urlShort->visits = 0;
        $saved = $urlShort->save();

        $newUrl = url('/' . $urlShort->url_key);

        if ($saved) {
            return redirect()->back()->with('success', $newUrl);
        } else {
            return redirect()->back()->with('error', 'Error creating the link, please try again.');
        }
    }
}
