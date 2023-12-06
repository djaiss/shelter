<?php

namespace App\Http\Middleware;

use App\Models\Channel;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckChannel
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $channel = Channel::where('organization_id', auth()->user()->organization_id)
                ->with('users')
                ->findOrFail($request->route()->parameter('channel'));

            $isPartOfChannel = $channel->users->contains(auth()->user()->id);

            if (! $channel->is_public && ! $isPartOfChannel) {
                abort(401);
            }

            $request->attributes->add(['channel' => $channel]);

            return $next($request);
        } catch (ModelNotFoundException) {
            abort(401);
        }
    }
}
