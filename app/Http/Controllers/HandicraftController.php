<?php

namespace App\Http\Controllers;

use App\Models\Handicraft;
use Illuminate\Http\Request;
use App\Http\Resources\HandicraftResource;
use \Cviebrock\EloquentSluggable\Services\SlugService;
# composer require cviebrock/eloquent-sluggable

class HandicraftController extends Controller
{
    /**
     * Return all of Scrap Category
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return HandicraftResource::collection(Handicraft::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Handicraft  $handicraft
     * @return \Illuminate\Http\Response
     */
    public function getById(Handicraft $handiCraft)
    {
        return new HandicraftResource($handiCraft);
    }

    /**
     * Return all of Handicraft.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.handicrafts.index', [
            'title' => 'Handicrafts',
            'handicrafts' => Handicraft::all()
        ]);
    }
        /**
     * Show the form for creating new category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.handicrafts.create', [
            'title' => 'Add Handicrafts',
        ]);
    }
    /**
     * Store a newly created Handicraft.
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
     * @param  \App\Models\Handicraft  $handicraft
     * @return \Illuminate\Http\Response
     */
    public function show(Handicraft $handiCraft)
    {
        return view('admin.handicrafts.show', [
            'title' => 'Detail',
            'handicraft' => $handiCraft,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Handicraft  $handicraft
     * @return \Illuminate\Http\Response
     */
    public function edit(Handicraft $handiCraft)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScrapCategory  $scrapCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Handicraft $handiCraft)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Handicraft  $handicraft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Handicraft $handiCraft)
    {
        $handiCraft->delete();
        return redirect()->route('handicraft.index')->with('success', 'Handicraft has been deleted successfully!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Handicraft::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
