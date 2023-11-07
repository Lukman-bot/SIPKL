<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    private $tasks = [];

    public function __construct()
    {
        $this->tasks = [];
    }

    public function index()
    {
        $this->tasks = Session::get('tasks', []);
        return view('tasks.index', ['tasks' => $this->tasks]);
    }

    public function store(Request $request)
    {
        $tasks = Session::get('tasks', []);
        $tasks[] = $request->input('name');
        Session::put('tasks', $tasks);

        return $this->index();
    }
}
