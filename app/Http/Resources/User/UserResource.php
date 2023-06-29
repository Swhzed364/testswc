<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'error' => null,
            'result' => [
                'id' => $this->id,
                'first_name' => $this->name,
                'last_name' => $this->last_name,
                'date_of_birth' => $this->date_of_birth,
            ]];
    }
}
