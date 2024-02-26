<?php
namespace App\Http\Middleware;

use Closure;

class DisablePageCache
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        return $response;
    }
}