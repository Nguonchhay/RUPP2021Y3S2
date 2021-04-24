<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HtmlTagFilterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->isMethod('post') || $request->isMethod('put') || $request->isMethod('patch')) {
            $input = $request->all();
            foreach ($input as $field => $value) {
                $input[$field] = strip_tags($value);
            }
            $request->replace($input);
        }

        return $next($request);
    }
}
