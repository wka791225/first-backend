<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckNumber
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
        // 加入判斷 如果是會員登入的話
        if (Auth::check()) {
            // 判斷會員身分別是誰的話回傳到我要呈現的頁面
            if (Auth::user()->name == 'admin') {
                // 這邊會跟route那邊做連動
                return $next($request);
            }
        }
        // 自動做登出功能
        Auth::logout();
        // 寫完後要在kernel.php 裡面增加一行引用才能在route的web.php 使用
        return redirect('/')->with('message','你不是admin,你不可以進來');
    }
}
