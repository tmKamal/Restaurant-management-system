<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Gate;
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
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isManager',function($user){
            return $user->type=='manager';
        });

        $gate->define('isDriver',function($user){
            return $user->type=='driver';
        });

        $gate->define('isChef',function($user){
            return $user->type=='chef';
        });

        $gate->define('isCashier',function($user){
            return $user->type=='cashier';
        });

        //
    }
}
