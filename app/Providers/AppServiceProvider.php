<?php

namespace App\Providers;

use App\Interfaces\Services\EventServiceInterface;
use App\Services\EventService;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(EventServiceInterface::class, EventService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // query logger
        if (config('app.debug')) {
            DB::listen(function (QueryExecuted $query) {
                Log::channel('query')->info('-- ' . date('Y-m-d H:i:s'));
                Log::channel('query')->info($query->toRawSql());
                Log::channel('query')->info("Zeit: {$query->time}ms");
            });
        }
    }
}
