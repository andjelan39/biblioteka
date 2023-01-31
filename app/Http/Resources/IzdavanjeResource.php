<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IzdavanjeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'izdavanje';
    
    public function toArray($request)
    {
        return [
            'id' => $this->resource->izdavanje_id,
            'knjiga' => new KnjigaResource($this->resource->knjiga),
            'napomena' => $this->resource->napomena,
            'datum_izdavanja' => $this->resource->datum_izdavanja,
            'datum_vracanja' => $this->resource->datum_vracanja,
            'student' => new StudentResource($this->resource->student),
            'user' => new UserResource($this->resource->user)
        ];
    }
}
