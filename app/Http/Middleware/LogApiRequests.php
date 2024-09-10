<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class LogApiRequests
{
    public function handle(Request $request, Closure $next)
    {
        // Log the incoming request
        Log::channel('api')->info('API Request:', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'headers' => $request->headers->all(),
            'payload' => $request->all(),
        ]);

        $response = $next($request);

        // Log the response
        Log::channel('api')->info('API Response:', [
            'status' => $response->status(),
            'response' => $response->getContent(),
        ]);

        return $response;
    }
}
