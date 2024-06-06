<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
  public function handle(Request $request, Closure $next)
  {
    $request->header('Access-Control-Allow-Origin', '*');
    $request->header('Access-Control-Allow-Methods', 'PUT, POST, DELETE, GET, OPTIONS');
    $request->header('Access-Control-Allow-Headers', 'Accept, Authorization, Content-Type, Token');
    return $next($request);
  }
}