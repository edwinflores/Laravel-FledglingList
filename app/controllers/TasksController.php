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
        $data = Input::all();

        $task = new Task();
        $task->title = $data['task'];
        $task->due_date = $data['task_due'];
        $task->AddTask();

        return View::make('task-element', ["task" => $task]);
    }

    public function edit()
    {
        return View::make('edit');
    }

    public function delete()
    {
        $data = Input::all();
        Task::DeleteTask($data['id']);
    }
}