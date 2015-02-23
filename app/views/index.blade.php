@extends('layout')
@section('content')
    <section class="header">
        <div class="container">
            <div class="header-text">
                <br><br>
                <h2 style="text-align:center;">To Do List</h2>
            </div>
        </div>
    </section>
    <section class="task_index">
        <div class="container">
            @foreach($tasks as $task)
                @include('task-element', compact($task))
            @endforeach
        </div>
    </section>
@stop