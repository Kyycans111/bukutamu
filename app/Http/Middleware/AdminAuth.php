<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Cek jika session admin belum login
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}

