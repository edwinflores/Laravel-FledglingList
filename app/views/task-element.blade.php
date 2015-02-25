@if ($task->status == 1)
    <div class="task_button_pending">
        <label><span class="truncate">{{ $task->title }}</span></label>
        <span style="margin-left: 100px;">Due: {{ date("M j Y", strtotime($task->due_date)) }}</span>
        @include('edit-element', compact($task))
        @include('delete-element', compact($task))
    </div>
@elseif($task->status == 2)
    <div class="task_button_overdue">
        <label><span class="truncate">{{ $task->title }}</span></label>
        <span style="margin-left: 100px;">Due: {{ date("M j Y", strtotime($task->due_date)) }}</span>
        @include('edit-element', compact($task))
        @include('delete-element', compact($task))
    </div>
@else
    <div class="task_button_done">
        <label><span class="truncate">{{ $task->title }}</span></label>
        <span style="margin-left: 100px;">Due: {{ date("M j Y", strtotime($task->due_date)) }}</span>
        @include('edit-element', compact($task))
        @include('delete-element', compact($task))
    </div>
@endif