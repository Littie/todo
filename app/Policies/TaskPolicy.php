<?php

namespace App\Policies;

use App\Models\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /*
     * Rule for show user's task 
     */
    
    public function show(User $user, Task $task) {
        return $user->id == $task->user_id && $task->is_delete == 0;
    }
    
    /*
     * Rule for edit user's task 
     */
    public function edit(User $user, Task $task) {
        return $user->id == $task->user_id;
    }

    /*
     * Rule for delete user's task
     */
    public function delete(User $user, Task $task) {
        return $user->id == $task->user_id && $task->is_delete == 0;
    }

    /*
     * Rule for check user's task
     */
    public function check(User $user, Task $task) {
        return $user->id == $task->user_id && $task->is_delete == 0 && $task->is_check == 0;
    }

    /*
     * Rule for restore user's task
     */
    public function restore(User $user, Task $task) {
        return $user->id == $task->user_id && $task->is_delete == 0 && $task->is_check == 1;
    }
}
