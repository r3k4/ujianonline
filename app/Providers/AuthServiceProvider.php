<?php

namespace App\Providers;

use App\Models\Mst\User;
use App\Models\Ref\Kelas;
use App\Models\Ref\Mapel;
use App\Policies\AdminPolicy;
use App\Policies\KelasPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Kelas::class => KelasPolicy::class,
        User::class => AdminPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        //
    }
}
