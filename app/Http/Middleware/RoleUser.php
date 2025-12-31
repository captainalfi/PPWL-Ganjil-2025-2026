<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleUser
{
    public function handle(Request $request, Closure $next): Response
    {
        dd('MASUK ROLE USER', auth()->user());
    }
}
