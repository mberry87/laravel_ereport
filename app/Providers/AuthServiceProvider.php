<?php

namespace App\Providers;

use App\Models\Bup;
use App\Models\KeagenanKapal;
use App\Models\Pbm;
use App\Models\Pelnas;
use App\Models\Tersus;
use App\Policies\BupPolicy;
use App\Policies\KeagenanKapalPolicy;
use App\Policies\PbmPolicy;
use App\Policies\PelnasPolicy;
use App\Policies\TersusPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Tersus::class => TersusPolicy::class,
        Bup::class => BupPolicy::class,
        Pelnas::class => PelnasPolicy::class,
        KeagenanKapal::class => KeagenanKapalPolicy::class,
        Pbm::class => PbmPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function (User $user) {
            return $user->role == 'admin';
        });
    }
}
