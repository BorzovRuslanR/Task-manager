<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LkController extends Controller
{
    public function showLK()
    {

        $user = Auth::user();
        $taskCount = $user->tasks()->count();


        return view('lk', ['user' => $user, 'taskCount' => $taskCount]);
    }
}
