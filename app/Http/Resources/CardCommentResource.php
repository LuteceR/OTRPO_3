<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'character_card' => [
                'id' => $this->characterCard->id,
                'name' => $this->characterCard->name,
                'creator' => [
                    'id' => $this->characterCard->user->id,
                    'name' => $this->characterCard->user->name,
                ]
            ]
        ];
    }
}
