<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
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
        //
        Gate::define('admin-menu', function ($user) {
            return $user->UserRoles->Roles->admin;
        });
        Gate::define('berita-config', function ($user) {
            return $user->UserRoles->Roles->berita;
        });
        Gate::define('galery-config', function ($user) {
            return $user->UserRoles->Roles->galery;
        });
        Gate::define('ettd-config', function ($user) {
            return $user->UserRoles->Roles->ettd;
        });
        Gate::define('user-config', function ($user) {
            return $user->UserRoles->Roles->users;
        });
        Gate::define('jenis-surat', function ($user) {
            return $user->UserRoles->Roles->jenis_surat;
        });

        Gate::define('banjar-config', function ($user) {
            return $user->UserRoles->Roles->banjar;
        });
        Gate::define('role-config', function ($user) {
            return $user->UserRoles->Roles->role;
        });
        Gate::define('penduduk-config', function ($user) {
            return ($user->UserRoles->Roles->penduduk || $user->UserRoles->Roles->penduduk_all);
        });
    }
}
