<?php

namespace App\Http\Resources\Package;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'id'              => $this->id,
            'owner_id'        => $this->owner_id,
            'car_id'          => $this->car_id,
            'name'            => $this->name,
            'price'           => $this->price,
            'type'            => $this->type,
            'start_date'      => $this->start != null ? date("Y-m-d", strtotime($this->start)) : 'null',
            'start_time'      => $this->start != null ? date("H:i:s", strtotime($this->start)) : 'null',
            'end_date'        => $this->end != null ? date("Y-m-d", strtotime($this->end)) : 'null',
            'end_time'        => $this->end != null ? date("H:i:s", strtotime($this->end)) : 'null',
            'image'           => $this->image != null ? $this->image : 'null',
            'status'          => $this->status
        ];
    }
}
