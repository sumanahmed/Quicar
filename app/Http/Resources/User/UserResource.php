<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'image'             => $this->image == null ? "null" : $this->image,
            'referrel_income'   => sprintf("%.1f", $this->referrel_income),
        ];
    }
}
