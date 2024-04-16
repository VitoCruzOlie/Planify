<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $event = [
            'id' => $this->id,
            'name' => $this->name,
            'time' => $this->time,
            'date' => $this->date,
            'subject' => $this->subject,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'users' => $this->users,
        ];

        
        return  $event;
    }
}
