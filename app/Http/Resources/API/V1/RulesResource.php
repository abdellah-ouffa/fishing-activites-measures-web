<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\StudyCaseElement;

class RulesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $studyCaseElements = StudyCaseElement::all();
        $rules = [];
        
        $rule = [
            'name' => $this->name,
            'id' => $this->id,
        ];  

        foreach ($studyCaseElements as $element) {
            $rule['elements'][] = [
                'name' => $element->name,
                'content' => optional($element->getContentBySudyCaseId($this->id))->content
            ];
            
        }

        return $rule;
    }
}
