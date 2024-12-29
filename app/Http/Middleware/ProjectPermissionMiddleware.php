<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProjectPermissionMiddleware
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
        $project = Project::findOrFail($request->route('project'));
        $user = auth()->user();

        if(!$user->hasPermissionToAccess($project, $permission)) {
            return redirect()->route('projects.index');
        }

        return $next($request);
    }
}
