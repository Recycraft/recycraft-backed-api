<?php

namespace App\Http\Controllers;

use App\Enums\ScrapType;
use Illuminate\Http\Request;
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
            'scrapType' => ScrapType::cases(),
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

        $desc = $request->desc;
        $dom = new \DomDocument();
        $dom->loadHtml($desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/upload/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $desc = $dom->saveHTML();
        $data['desc'] = $desc;

        if (ScrapCategory::create($data)){
            return redirect()->route('scrap.index')->with('success', 'Upload berhasil');
        } else {
            return back()->withInput()->withErrors('Cannot Store in Database');
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
        $scrapCategory->delete();
        return redirect()->route('scrap.index')->with('success', 'Scrap has been deleted successfully!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(ScrapCategory::class, 'slug', $request->category);
        return response()->json(['slug' => $slug]);
    }
}
