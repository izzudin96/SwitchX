<?php

namespace App\Http\Middleware;

use Closure;
use App\Dashboard;

class BootDashboard
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
        if(!Dashboard::first())
        {
            Dashboard::create([
                'name' => 'Business Name',
                'storeName' => 'Online Store',
                'registrationNumber' => 'SA12345678-K',
                'description' => 'We seriously sells something you like.',
                'bankName' => 'Maybank Berhad',
                'bankAccountNo' => '1234-4567-8901',
                'bankHolderName' => 'John Din',
                'feature1' => 'Premium Material Quality',
                'feature1Description' => 'Soft and last longer',
                'feature2' => 'Free shipping',
                'feature2Description' => 'Free shipping entire Malaysia',
                'feature3' => 'Super-fast web',
                'feature3Description' => 'No more loading on your screen',
                'googleAnalyticCode' => '</script></script>'
            ]);
        }

        return $next($request);
    }
}
