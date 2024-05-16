<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'firstLastName' => $this->firstLastName,
            'secondLastName' => $this->secondLastName,
            'firstName' => $this->firstName,
            'otherName' => $this->otherName,
            'countryEmployment' => $this->countryEmployment,
            'idType' => $this->idType,
            'idNumber' => $this->idNumber,
            'email' => $this->email,
            'admission' => $this->admission,
            'area' => $this->area,
            'state' => $this->state
        ];
    }
}
