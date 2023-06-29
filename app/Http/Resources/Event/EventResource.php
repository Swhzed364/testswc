<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
                'title' => $this->title,
                'text' => $this->text,
                'creator' => $this->creator,
                'members' => $this->members,
            ]];
    }
}
