<?php

namespace App\Providers;

use App\Models\Group;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Guard $auth
     */
    public function boot(Guard $auth)
    {
        view()->composer('layouts.partials.sidebar', function($view) use ($auth) {
            
            $user = $auth->user();
            $countTasksByGroup = [];

            $tasksCount = $user->tasks()->count();
            $newTasksCount = $user->tasks()->whereBetween('created_at', [Carbon::today(), Carbon::today()->addDay()])->where('user_id', $user->id)->count();
            $checkedTasksCount = $user->tasks()->where('is_delete', '0')->where('is_check', '1')->count();

            foreach (Group::all() as $group) {
               $countTasksByGroup[] = $user->tasks()->where('group_id', $group->id)->where('user_id', $user->id)->where('is_delete', '0')->where('is_check', '0')->count();
            }
            
            $activeUsers = User::where('is_delete', 0)->count();
            $newUsers = User::whereBetween('created_at', [Carbon::today(), Carbon::today()->addDay()])->count();
            $disabledUsers = User::where('is_delete', '1')->count();

            $view->with('tasksCount', $tasksCount);
            $view->with('newTasksCount', $newTasksCount);
            $view->with('checkedTasksCount', $checkedTasksCount);
            $view->with('countTasksByGroup', $countTasksByGroup);
            $view->with('groups', Group::all());
            $view->with('activeUsers', $activeUsers);
            $view->with('newUsers', $newUsers);
            $view->with('disabledUsers', $disabledUsers);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
