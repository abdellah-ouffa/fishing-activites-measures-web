<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudyCase;
use App\Models\StudyCaseElement;
use App\Http\Resources\API\V1\RulesResource;

class RulesController extends Controller
{
    public function index()
    {
    	$studyCases = StudyCase::all();

        // $rules = [];
        // foreach ($studyCases as $case) {
        // 	$ruleItem = [
        // 		'name' => $case->name
        // 	];	

        // 	foreach ($studyCaseElements as $element) {
	       //  	$ruleItem['elements'][] = [
	       //  		'name' => $element->name,
	       //  		'content' => optional($element->getContentBySudyCaseId($case->id))->content
	       //  	];
	        	
	       //  }
	       //  $rules[] = $ruleItem;
        // }

        return response()->json([
        	'rules' => RulesResource::collection($studyCases)
        ], 200);
    }
}
