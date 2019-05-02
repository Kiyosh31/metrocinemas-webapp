<?php

namespace Metrocinemas\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * Policy se puede hacer un attach con el modelo y ya no es necesario meter codigo en el controller del modelo
     *
     * @var array
     */
    protected $policies = [
        'Metrocinemas\Model' => 'Metrocinemas\Policies\ModelPolicy',
        'Metrocinemas\Movie' => 'Metrocinemas\Policies\MoviePolicy',
        'Metrocinemas\Auditorium' => 'Metrocinemas\Policies\AuditoriumPolicy',
        'Metrocinemas\Screening' => 'Metrocinemas\Policies\ScreeningPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
