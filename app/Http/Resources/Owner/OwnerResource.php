<?php

namespace App\Http\Resources\Owner;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'name'              => $this->name,
            'email'             => $this->email != null ? $this->email : 'abc@gmail.com',
            'phone'             => $this->phone,
            'image'             => $this->image != null ? $this->image : "null",
            'address'             => $this->address != null ? $this->address : "null",
            'status'             => $this->status,
            'nid'             => $this->nid != null ? $this->nid : "null",
            'district_id'             => $this->district_id != null ? $this->district_id : "null",
            'upazila_id'             => $this->upazila_id != null ? $this->upazila_id : "null",
            'total_point'   => sprintf("%.1f", $this->total_point),
            'total_amount'   => sprintf("%.1f", $this->total_amount),
            'referrel_income'   => sprintf("%.1f", $this->referrel_income),
        ];
    }
}
