@if ($task->status == 1)
    <div class="task_button_pending">{{ $task->title }}
            @include('edit-element', compact($task))
            @include('delete-element', compact($task))
    </div>
@elseif($task->status == 2)
    <div class="task_button_overdue">{{ $task->title }}
        @include('edit-element', compact($task))
        @include('delete-element', compact($task))
    </div>
@else
    <div class="task_button_done">{{ $task->title }}
        @include('edit-element', compact($task))
        @include('delete-element', compact($task))
    </div>
@endif