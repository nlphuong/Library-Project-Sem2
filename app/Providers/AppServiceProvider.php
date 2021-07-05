<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Membership;
use App\Models\ratingBook;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cats = Category::orderby('name')->get();
        $count= [
            'countUnpaid'=>Membership::where('status','1')->count(),
            'countExpired'=>Membership::where('status','3')->count(),
            'countPendingRating'=>ratingBook::where('active',0)->count(),
        ];

        view()->share(compact('cats','count'));
    }
}
