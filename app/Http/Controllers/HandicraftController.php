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
    public function getById(Handicraft $handicraft)
    {
        return new HandicraftResource($handicraft);
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
            'handicrafts' => Handicraft::all(),
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

    public function storeApi(Request $request)
    {
        $request->validate([
            'scrap_category_id' => 'required|integer',
            'title' => 'required|string',
            'slug' => 'required|unique:handicrafts',
            'image' => 'required|image',
            'desc' => 'required',
            'materials' => 'required',
            'process' => 'required',
        ]);

        $data = [
            'scrap_category_id' => $request->scrap_category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'desc' => $request->desc,
            'materials' => $request->materials,
            'process' => $request->process,
        ];

        $image_path = $request->file('image')->store('images/handicrafts');

        $data['image'] = $image_path;

        if (Handicraft::create($data)){
            return response()->json([
                'message' => "Upload Successfull",
            ], 201);
        } else {
            return response()->json([
                'message' => "Upload Failed",
            ], 400);
        }
    }

    /**
     * Store a newly created Handicraft.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'scrap_category_id' => 'required|integer',
            'title' => 'required',
            'slug' => 'required|unique:handicraft',
            'image' => 'required|image',
            'desc' => 'required',
            'material' => 'required',
            'process' => 'required',
        ]);

        $data = [
            'scrap_category_id' => $request->scrap_category_id,
            'title' => $request->title,
            'slug' => $request->slug,
        ];

        $path_image = $request->file('image')->store('images/scrap-categories/');
        $data['image'] = $path_image;

        $desc = processSummernote($request->desc);
        $data['desc'] = $desc;
        $materials = processSummernote($request->materials);
        $data['materials'] = $materials;
        $process = processSummernote($request->process);
        $data['process'] = $process;

        if (Handicraft::create($data)){
            return redirect()->route('crafts.index')->with('success', 'Upload berhasil');
        } else {
            return back()->withInput()->with('error', 'Cannot Store in Database');
        }
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
        return view('admin.handicrafts.edit', [
            'title' => 'Edit',
            'handicraft' => $handiCraft,
        ]);
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
