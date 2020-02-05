<?php namespace Quasar\Admin\GraphQL\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Quasar\Admin\Services\AuthService;

class Authorization
{
    /**
     * Force the Accept header of the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //info($request->operationName);
        //info($request->variables); 

        if ($request->operationName !== 'AdminCredentials')
        {
            // $jwt = AuthService::decode($request->bearerToken());
            // info($jwt->username);
        }
        
        return $next($request);
    }
}
