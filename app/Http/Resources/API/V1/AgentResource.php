<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
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
            'id' => $this->id,
            'firstName' => $this->user->first_name,
            'lastName' => $this->user->last_name,
            'gender' => $this->user->gender,
            'tel' => $this->user->tel,
            'PPRNumber' => $this->user->ppr_number,
            'picture' => $this->user->picturePath,
            'token' => \JWTAuth::fromUser($this->user),
        ];
    }
}
