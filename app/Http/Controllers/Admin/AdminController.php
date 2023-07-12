<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $team = Auth()->user()->role;
        if($team == 1)
        {
            $task = Task::get();
        }else{
            $task = Task::where('team', $team)->get();
        }
        return view('admin.pages.index', compact('task'));
    }
}
