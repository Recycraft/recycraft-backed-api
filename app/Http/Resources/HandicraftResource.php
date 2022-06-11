<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class HandicraftResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'scrap_category' => new ScrapCategoryResource($this->scrap_category),
            'title' => $this->title,
            'image' => Storage::url($this->image),
            'desc' => $this->desc,
            'materials' => $this->materials,
            'process' => $this->process,
        ];
    }
}
