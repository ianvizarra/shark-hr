<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;

class InertiaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->bootCacheBusting();
        $this->bootSharedProperties();
    }

    /**
     * Boot cache busting.
     */
    protected function bootCacheBusting()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });
    }

    /**
     * Boot shared properties.
     */
    protected function bootSharedProperties()
    {
        Inertia::share([
            'user' => function () {
                return auth()->user();
            },
            'app' => env('APP_NAME', 'Laravel'),
            'errors' => function () {
                return $this->sharedValidationErrors();
            },
        ]);
    }

    /**
     * Resolve shared validation errors.
     *
     * @return \Illuminate\Contracts\Support\MessageBag|\stdClass
     */
    protected function sharedValidationErrors()
    {
        if ($errors = session('errors')) {
            return $errors->getBag('default');
        }

        return new \stdClass;
    }
}
