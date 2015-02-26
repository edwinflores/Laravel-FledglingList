<a href="#" data-toggle="modal" data-target="#edit-task-modal-{{ $task->id }}">
    <button type="button" class="edit_button" id="task-edit-btn" task-id="{{$task->id}}" >
        <span class="glyphicon glyphicon-pencil" style="color: darkgreen"></span>
    </button>
</a>

<div class="modal fade" id="edit-task-modal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="Edit Form" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Task</h4>
        </div>
        <div class="modal-body">
            {{ Form::open(array('url' => 'edit', 'method' => 'post', 'id' => 'editform-' . $task->id, 'enctype' => 'multipart/form-data')) }}
            <div class="centered">
                {{ Form::text('task_editor', '', array('class' => 'form-control', 'placeholder' => $task->title, 'style' => 'text-align: center', 'id' => 'task_editor-' . $task->id)) }}
                <br>
                {{ Form::text('task_due_edited', '', array('class' => 'date-form', 'placeholder' => $task->due_date, 'id' => 'datepicker_editor-' . $task->id)) }}
                <input type="submit" name="t5" style="position: absolute; left: -99999999999px;">
            </div>
            {{ Form::close() }}
        </div>
    </div>
    </div>
</div>

<script>
    var edit_form = "<?php echo "#editform-" . $task->id ?>";
    $(edit_form).submit(function(e) {
        var modal_form = "<?php echo "#edit-task-modal-" . $task->id ?>";
        var task_editor_form = "<?php echo "#task_editor-" . $task->id?>";
        var date_form = "<?php  echo "#datepicker_editor-".  $task->id ?>";
        var data = $(task_editor_form).val();
        var to_update = "<?php echo "li#tsk-element-" . $task->id ?>";
        var tsk_id = "<?php echo $task->id ?>";
        if (data) {
            $(modal_form).modal('toggle');
            $("#flash").show();
            $("#flash").fadeIn(400).html('<img src="<?php echo url("../img/loader.gif"); ?>" />Updating Task...');
            $.ajax({
                type: "POST",
                url: "<?php echo url("/edit")?>",
                data: {task: $(task_editor_form).val(), task_due: $(date_form).val(), id: tsk_id},
                cache: false,
                success: function(response) {
                    $(to_update).replaceWith(response);
                    $("#flash").hide();
                }
            });
        }

        e.preventDefault();
        return false;
    });

    $(function() {
        var date_form = "<?php  echo "#datepicker_editor-".  $task->id ?>";
        $(date_form).datepicker();
    });
</script>