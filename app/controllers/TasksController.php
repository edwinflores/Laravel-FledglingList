<?php

class TasksController extends BaseController
{
    public function index()
    {
        $tasks = Task::GetAll();
        return View::make('index', compact('tasks'));
    }

    public function add_task()
    {
        return View::make('add_task');
    }

    public function edit()
    {
        return View::make('edit');
    }

    public function delete()
    {
        return View::make('delete');
    }
}