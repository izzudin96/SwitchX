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

                'feature1' => 'Premium Quality',
                'feature1Description' => 'Nulla ac erat semper, mollis dui in, pretium nunc. Aliquam imperdiet interdum velit id accumsan. Quisque porta ipsum et arcu finibus euismod. Etiam in pretium elit. Donec luctus sagittis.',
                'feature1Image' => 'http://placehold.it/230x230',

                'feature2' => 'Free shipping',
                'feature2Description' => 'Aliquam lacus ex, sollicitudin pellentesque sapien eu, vulputate pharetra erat. Nam vel ante et eros pellentesque ultrices. Nulla venenatis rutrum maximus. Sed consequat molestie magna, vel.',
                'feature2Image' => 'http://placehold.it/230x230',

                'feature3' => 'Super-fast web',
                'feature3Description' => 'Cras laoreet nibh sapien, nec tincidunt nunc lobortis a. Integer tempor dictum ex, quis iaculis ipsum viverra sit amet. Aliquam nec rhoncus augue. Nunc luctus et ipsum vel aliquam. Aliquam.',
                'feature3Image' => 'http://placehold.it/230x230',

                'slider1' => 'http://placehold.it/1140x500',
                'slider2' => 'http://placehold.it/1140x500',
                'slider3' => 'http://placehold.it/1140x500',


                'googleAnalyticCode' => '</script></script>'
            ]);
        }

        return $next($request);
    }
}
