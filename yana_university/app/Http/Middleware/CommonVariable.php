<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Auth\AuthManager;
use Illuminate\View\Factory;

use App\Models\Lecture;

class CommonVariable
{
    public function __construct(Factory $viewFactory, AuthManager $authManager)
    {
        $this->viewFactory = $viewFactory;
        $this->authManager = $authManager;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $account = $this->authManager->user();
        $lecture_model = new Lecture();
        $lectures = $lecture_model->allget();
        $this->viewFactory->share('account', $account);
        $this->viewFactory->share('lectures', $lectures);
        return $next($request);
    }
}
