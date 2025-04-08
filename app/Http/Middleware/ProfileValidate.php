<?php
/**
 * Created by PhpStorm.
 * User: josephColonia
 * Date: 9/6/17
 * Time: 11:49 AM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class ProfileValidate
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $roles)
    {
        if(!$request->user()->profileEnable){
            return view('auth.register');
        }

        if ($this->auth->guest() || !$request->user()->hasRole(explode('|', $roles))) {
            abort(403);
        }

        return $next($request);
    }
}