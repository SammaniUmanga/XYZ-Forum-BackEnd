<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GetPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $resourceResponse = $this->resource;

        if ($resourceResponse instanceof Collection) {
            return [
                "data" => $resourceResponse->map(function ($data) {
                    return $data;
                })
            ];
        } else {
            return [
                "data" => $resourceResponse
            ];
        }
    }

}
