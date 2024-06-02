<?php

namespace App\Http\Middleware;
use App\Models\Employee;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $employee = Employee::where("user_id", "=", auth()->id())->first();
        $user = User::where('id', '=', auth()->id())->first();
        if(is_null($employee) && $user->role != "admin"){
            return redirect(route('notVerificated'));
        }
        return $next($request);
    }
}
