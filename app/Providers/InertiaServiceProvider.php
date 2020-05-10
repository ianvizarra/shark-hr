<?php

namespace App\Providers;

use Auth;
use Session;
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
            'app' => env('APP_NAME', 'Laravel'),
            'auth' => function () {
                return [
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'first_name' => Auth::user()->first_name,
                        'last_name' => Auth::user()->last_name,
                        'email' => Auth::user()->email,
                    ] : null,
                ];
            },
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                ];
            },
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
