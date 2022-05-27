<?php

namespace App\Http\Controllers;

use App\Models\Handicraft;
use Illuminate\Http\Request;
use App\Http\Resources\HandicraftResource;

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
}
