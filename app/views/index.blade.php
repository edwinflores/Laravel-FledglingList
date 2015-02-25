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
                <div id="flash" style="text-align: center"></div>
                <ol id="update">
                @if(!empty($tasks))
                    @foreach($tasks as $task)
                        <li style="list-style-type: none;">@include('task-element', compact($task))</li>
                    @endforeach
                @else
                    <h2 id="no-task-header" class="bg-warning" style="text-align: center">No tasks at the moment~</h2>
                @endif
                </ol>
            </div>
    </section>

    <script>
        $('.delete_button').off().click(function(){
            var parent = $(this).closest("li");
            $.ajax({
                type: "POST",
                url: "<?php echo url("/delete")?>",
                data: {id: this.getAttribute("task-id")},
                cache: false,
                success: function() {
                    $(parent).remove();
                }
            });
        });
    </script>
@stop