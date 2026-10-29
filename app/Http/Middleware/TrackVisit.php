<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tracker;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $referer = $request->headers->get('referer');
        $cleanReferer = $referer ? parse_url($referer, PHP_URL_PATH) : null;
        Tracker::create([
            'page' => $request->path(),
            'ip' => $request->ip(),
            'status' => $response->getStatusCode(),
            'method'=> $request->method(),
            'referer' => $cleanReferer,
            'visited_at' => now(),
        ]);
        return $response;
    }
}
