<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        \Menu::make('MyNavBar', function ($menu) {
            $menu->add('Главная');
            $menu->add('Документы', 'docs');
            $menu->add('Пункт', '1');
            $menu->add('Пункт', '');
        });

        return $next($request);
    }
}
