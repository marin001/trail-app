<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        return [
            'id' => $this->id,
            'First_name' => $this->First_name,
            'Last_name' => $this->Last_name,
            'Club' => $this->Club,
            'Race_ID' => $this->Race_ID
        ];
    }
}
