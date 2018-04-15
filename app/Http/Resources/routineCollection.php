<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class routineCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

    }

    public function with($request)
    {
        return [
            'response' => '200',
            'status' => 'success',
            'api_version' => '1.0.0',
            'author_url' => url('http://mhzahid.tk/team'),
        ];
    }

}
