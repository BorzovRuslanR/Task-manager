<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{

    public function show(User $user, Task $task)
    {

        $tasksUsers = $user->tasks; // для всех задач авторизированного пользователя
        foreach ($tasksUsers as $tasksUser) {

            if ($task->id === $tasksUser->id)
            {
                return true;
            }
        }
        return false;
    }

    // return $user->tasks()->find($task->id) !== null; вариант с использованием SQL запроса

    public function edit(User $user, Task $task)

    {
        return $user->tasks()->find($task->id) !== null;
    }


}
