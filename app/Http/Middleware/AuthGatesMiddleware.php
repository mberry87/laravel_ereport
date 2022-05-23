<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGatesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $auth = Auth::check();
        if ($auth) {
            Gate::define('is_admin', function (User $user) {
                if ($user->role == 'admin') {
                    return true;
                } else {
                    return false;
                }
            });

                    $users = User::with('permissions')->get();
                    $permissionsArray = array();
                    foreach ($users as $user) {
                        foreach ($user->permissions as $permissions) {
                            $permissionsArray[$permissions->name][] = $user->id;
                        }
                    }

                    // dd($permissionsArray);

                    foreach ($permissionsArray as $title => $usr) {
                        Gate::define($title, function (\App\Models\User $user) use ($usr) {
                            return count(array_intersect($user->permissions->pluck('id')->toArray(), $usr)) > 0;
                        });
                    }
                    return $next($request);
        } else {
            return $next($request);
        }
    }
}
