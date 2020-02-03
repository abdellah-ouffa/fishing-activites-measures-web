<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Http\Resources\API\V1\AgentResource;
use JWTAuth;

class AuthController extends Controller
{
    public function login()
    {
        $agent = Agent::whereHas('user', function($query) {
            $query->where('ppr_number', request()->PPRNumber)
                ->where('is_active', true);
        })->first();

        if($agent && $token = JWTAuth::fromUser($agent->user)) {
            return response()->json(AgentResource::make($agent), 200);
        }

        return response()->json([
            'error' => 'Unauthorized'
        ], 401);
    }
}