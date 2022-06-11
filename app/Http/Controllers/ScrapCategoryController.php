<?php

namespace App\Http\Controllers;

use App\Enums\ScrapType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ScrapCategory;
use App\Http\Resources\ScrapCategoryResource;
use \Cviebrock\EloquentSluggable\Services\SlugService;


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
            'title' => 'Scrap Categories',
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
            'scrapType' => ScrapType::cases(),
        ]);
    }

    public function storeApi(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|unique:scrap_categories',
            'desc' => 'required|string',
            'type' => 'required|string',
            'image' => 'required|image'
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'desc' => $request->desc,
            'type' => $request->type,
        ];

        $path_image = $request->file('image')->store('images/scrap-categories/');
        $data['image'] = $path_image;

        if(ScrapCategory::create($data)){
            return response()->json([
                'message' => 'Data has been saved'
            ], 201);
        } else {
            return response()->json([
                'message' => "Data failed to save",
            ], 401);
        }
    }

    /**
     * Store a newly created Scrap Category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:scrap_categories',
            'desc' => 'required',
            'type' => 'required',
            'image' => 'required|image'
        ]);

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'type' => $request->type,
        ];

        $path_image = $request->file('image')->store('images/scrap-categories/');
        $data['image'] = $path_image;

        $desc = processSummernote($request->desc);
        $data['desc'] = $desc;

        if (ScrapCategory::create($data)){
            return redirect()->secure_url('/admin/scrap')->with('success', 'Upload berhasil');
        } else {
            return back()->withInput()->with('error', 'Cannot Store in Database');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScrapCategory  $scrapCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ScrapCategory $scrapCategory)
    {
        return view('admin.scraps.show', [
            'title' => 'Detail',
            'scrap' => $scrapCategory,
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
        return view('admin.scraps.edit', [
            'title' => 'Edit',
            'scrap' => $scrapCategory,
            'scrapType' => ScrapType::cases(),
        ]);
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
        $rules = [
            'name' => 'required|string',
            'desc' => 'required',
            'type' => 'required',
        ];

        if ($request->hasFile('image')){
            $rules['image'] = 'image';
        }

        if ($request->slug != $scrapCategory->slug){
            $rules = 'required|unique:scrap_categories';
        }

        $request->validate($rules);

        cekImageSummernote($scrapCategory->desc, $request->desc);

        $data = [
            'name' => $request->name,
            'type' => $request->type,
            'desc' => processSummernote($request->desc),
        ];

        if ($request->slug != $scrapCategory->slug){
            $data['slug'] = $request->slug;
        }

        if ($request->hasFile('image')){
            if ($scrapCategory->image != ''){
                Storage::delete($scrapCategory->image);
            }
            $new_image = $request->file('image')->store('images/scrap-categories');
            $data['image'] = $new_image;
        }

        if (ScrapCategory::where('id', $scrapCategory->id)->update($data)){
            return redirect()->secure_url('/admin/scrap')->with('success', 'Data has been updated');
        } else {
            return back()->withInput()->with('error', 'Cannot Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScrapCategory  $scrapCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScrapCategory $scrapCategory)
    {
        summernoteDeleteImage($scrapCategory->desc);
        if ($scrapCategory->image != ''){
            Storage::delete($scrapCategory->image);
        }
        $scrapCategory->delete();
        return redirect()->secure_url('/admin/scrap')->with('success', 'Scrap has been deleted successfully!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(ScrapCategory::class, 'slug', $request->category);
        return response()->json(['slug' => $slug]);
    }
}
