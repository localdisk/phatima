<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\AuthInterface;
use App\Services\LaravelAuth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Hashing\HashManager;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->app->bind(AuthInterface::class, function($app) {
            return new LaravelAuth($app->make(HashManager::class));
        });
    }
}
