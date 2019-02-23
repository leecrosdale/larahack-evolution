<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserBuildingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['pivot']['next_timestamp'] = Carbon::parse($data['pivot']['next_work'])->timestamp;
        $data['pivot']['start_timestamp'] = Carbon::now()->timestamp;

        return $data;
    }
}
