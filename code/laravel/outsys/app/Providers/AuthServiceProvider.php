<?php

namespace App\Providers;

use App\Models\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Request;
use Route;

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

        //
        Gate::define('add-auth', function (\App\Models\Admin $user) {
          // dd($user->isAdmin);
          // dd(Auth::first()->auth_name);
          // dd(Auth::first()->role[0]->role_name);
          // dd(Auth::where()->role[0]->role_name);
          // dd($user->role->auth);
          // 获取用户角色所有权限
          $auths = $user->role->auth;
          $paths=[];
          foreach ($auths as $key => $value) {
            $paths[]=$value->path;
          }
          // dd($paths);

          // 针对所有权限
          // dd(Request::path());
          // $current_path=Request::path();
          // $has_auth=in_array($current_path,$paths);

          // 针对单独的权限
          $has_auth=in_array('/auth/add',$paths);

          // dd($has_auth);
          return $has_auth;

          // return $user->isAdmin;
      });
    }
}
