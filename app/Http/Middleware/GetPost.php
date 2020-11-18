<?php

namespace App\Http\Middleware;

use Closure;

class GetPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $posts = Post::latest()->get();
        $request->marge(['posts' => $posts]);

        return $next($request);
    }
}
