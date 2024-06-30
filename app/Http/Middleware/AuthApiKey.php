<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthApiKey
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('API_KEY') !== 'helloatg') {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid API key',
            ]);
        }

        return $next($request);
    }
}
