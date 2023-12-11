<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
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
        $locale = $request->route('locale');
        // 當網址列沒有出現語系的參數時，指定繁體中文為預設語系
        if (!in_array($locale, ['zh-CN', 'zh-TW', 'en'])) {
            $locale = 'zh-TW';
        }
    
        App::setLocale($locale);
    
        return $next($request);
    }
}
