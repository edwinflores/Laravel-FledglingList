@if ($task->status == 1)
    <div class="task_button_pending"><label class="truncate">{{ $task->title }}</label>
            @include('edit-element', compact($task))
            @include('delete-element', compact($task))
    </div>
@elseif($task->status == 2)
    <div class="task_button_overdue"><label class="truncate">{{ $task->title }}</label>
        @include('edit-element', compact($task))
        @include('delete-element', compact($task))
    </div>
@else
    <div class="task_button_done"><label class="truncate">{{ $task->title }}</label>
        @include('edit-element', compact($task))
        @include('delete-element', compact($task))
    </div>
@endif