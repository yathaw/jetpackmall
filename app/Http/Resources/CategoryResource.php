<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);

        $baseurl = URL('/');

        return [
            'category_id'       => $this->id,
            'category_name'     => $this->name,
            'category_photo'    => $baseurl.'/'.$this->photo,
            'created_at'        => $this->created_at->format('d-m-Y'),
            'updated_at'        => $this->updated_at->format('d-m-Y')
        ];






    }
}
