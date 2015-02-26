<button type="button" class="complete_button" id="task-edit-btn-{{$task->id}}" task-id="{{$task->id}}" >
    <span class="glyphicon glyphicon-ok" style="color: darkgreen"></span>
</button>

<script>
    var to_complete = "<?php echo "#task-edit-btn-" . $task->id ?>"
    $(to_complete).off().click(function(){
        var parent = $(this).closest("li");
        $.ajax({
            type: "POST",
            url: "<?php echo url("/complete")?>",
            data: {id: this.getAttribute("task-id")},
            cache: false,
            success: function() {
                $(parent).remove();
            }
        });
    });
</script>