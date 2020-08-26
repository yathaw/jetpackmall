<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Subcategory;
use App\Http\Resources\SubcategoryResource;

use App\Brand;
use App\Http\Resources\BrandResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $baseurl = URL('/');

        $photos = json_decode($this->photo);

        $photo  = $baseurl.'/'.$photos[0];

        return [
            'item_id'           => $this->id,
            'item_codeno'       => $this->codeno,
            'item_name'         => $this->name,
            'item_price'        => $this->price,
            'item_discount'     => $this->discount,
            'item_description'  => $this->description,
            'item_photo'        => $photo,
            'item_photos'       => $photos,

            'subcategory_id'         => $this->subcategory_id,
            'subcategory'            => new SubcategoryResource(Subcategory::find($this->subcategory_id)),

            'brand_id'         => $this->brand_id,
            'brand'            => new SubcategoryResource(Subcategory::find($this->brand_id)),

            'created_at'          => $this->created_at->format('d-m-Y'),
            'updated_at'          => $this->updated_at->format('d-m-Y')
        ];
    }
}
