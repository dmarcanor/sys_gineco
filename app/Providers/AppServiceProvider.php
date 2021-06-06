<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SysGineco\Gineco\Pacientes\Domain\Contracts\PacienteRepository;
use SysGineco\Gineco\Pacientes\Infrastruture\Persistence\MysqlPacienteRepository;

class AppServiceProvider extends ServiceProvider
{
    private $wiringObjects = [
        PacienteRepository::class => MysqlPacienteRepository::class
    ];

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
        foreach ($this->wiringObjects as $abstract => $concrete){
            $this->app->bind($abstract, $concrete);
        }
    }
}
