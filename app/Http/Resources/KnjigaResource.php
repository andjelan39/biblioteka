<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnjigaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'knjiga';

    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'naziv' => $this->resource->naziv,
            'autor' => $this->resource->autor,
            'godina_izdanja' => $this->resource->godina_izdanja,
            'izdavac' => $this->resource->izdavac,
            'zanr' => $this->resource->zanr
        ];
    }
}
