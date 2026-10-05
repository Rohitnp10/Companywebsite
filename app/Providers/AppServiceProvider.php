<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->ignoreUploadedViteDevServer();
    }

    /**
     * public/hot is created by `npm run dev` and points CSS at this computer.
     * A cPanel upload of that file makes the live site request localhost and render unstyled.
     */
    private function ignoreUploadedViteDevServer(): void
    {
        if (! is_file(public_path('hot'))) {
            return;
        }

        $host = request()->getHost();

        if (in_array($host, ['localhost', '127.0.0.1', '::1'], true)) {
            return;
        }

        Vite::useHotFile(storage_path('framework/vite.hot'));
    }
}
