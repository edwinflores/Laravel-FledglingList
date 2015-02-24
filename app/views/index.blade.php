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
            @include('task_form')
        </div>
        <div class="container">
            @if(!empty($tasks))
                @foreach($tasks as $task)
                    @include('task-element', compact($task))
                @endforeach
            @else
                <h2 class="bg-warning" style="text-align: center">No tasks at the moment~</h2>
            @endif
        </div>
    </section>
@stop