<?php

namespace App\Http\Middleware;

use App\Models\Team;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $team = Team::where('organization_id', auth()->user()->organization_id)
                ->with('users')
                ->findOrFail($request->route()->parameter('team'));

            if (! $team->is_public && ! $team->users->contains(auth()->user()->id)) {
                abort(401);
            }

            $request->attributes->add(['team' => $team]);

            return $next($request);
        } catch (ModelNotFoundException) {
            abort(401);
        }
    }
}
