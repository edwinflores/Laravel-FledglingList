<div class="<?php echo ($task->status == 1) ? "task_button_pending" : "task_button_overdue"?>">
    <label><span class="truncate" id="task-{{$task->id}}">{{ $task->title }}</span></label>
    <span style="margin-left: 80px;">Due: {{ date("M j Y", strtotime($task->due_date)) }}</span>
    @include('complete-element', compact($task))
    @include('edit-element', compact($task))
    @include('delete-element', compact($task))
</div>