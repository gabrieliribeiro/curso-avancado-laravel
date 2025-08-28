<?php

namespace App\Http\Middleware;

use App\Models\LogAcesso;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //
        LogAcesso::create(['log' => 'IP '.$request->ip().' - Acessou a rota '.$request->url()]);
        $resposta =  $next($request);

        $resposta->setStatusCode(201, 'O status foi alterado');
        
        return $resposta;
    }
}
