<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Word extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'word' => $this->word,
            'tanslation' => $this->translation,
            'type' => $this->type_id,
            'example' => $this->example,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
