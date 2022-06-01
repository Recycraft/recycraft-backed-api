<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScrapCategoryResource;
use App\Models\ScrapCategory;
use Illuminate\Http\Request;

class ScrapCategoryController extends Controller
{
    /**
     * Return all of Scrap Category
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return ScrapCategoryResource::collection(ScrapCategory::all());
    }

    /**
     * Return all of Scrap Category with all the related handicrafts.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllWithCraft()
    {
        return ScrapCategoryResource::collection(ScrapCategory::with('handicrafts')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScrapCategory  $scrapCategory
     * @return \Illuminate\Http\Response
     */
    public function getById(ScrapCategory $scrapCategory)
    {
        return new ScrapCategoryResource($scrapCategory);
    }

    /**
     * Return all of Scrap Category
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.scraps.index', [
            'title' => 'Scrap Category',
            'scraps' => ScrapCategory::all(),
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
        return view('admin.scraps.create', [
            'title' => 'Add Scrap Category',
        ]);
    }

    /**
     * Store a newly created Scrap Category.
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
     * @param  \App\Models\ScrapCategory  $scrapCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ScrapCategory $scrapCategory, $slug)
    {
        $scrap = $scrapCategory::where('slug', $slug)->get()->first();
        return view('admin.scraps.show', [
            'title' => 'Detail',
            'scrap' => $scrap,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScrapCategory  $scrapCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ScrapCategory $scrapCategory)
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
    public function update(Request $request, ScrapCategory $scrapCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScrapCategory  $scrapCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScrapCategory $scrapCategory)
    {
        //
    }
}
