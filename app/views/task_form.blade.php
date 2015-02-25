{{ Form::open(array('url' => 'index', 'method' => 'post', 'id' => 'taskform', 'enctype' => 'multipart/form-data')) }}
    <div class="centered">
        {{ Form::text('task_adder', '', array('class' => 'form-control', 'placeholder' => 'Add a task here', 'style' => 'text-align: center', 'id' => 'task_adder')) }}
        <br>
        {{ Form::text('task_due', '', array('class' => 'date-form', 'placeholder' => 'Select Due Date', 'id' => 'datepicker')) }}
        <input type="submit" name="t4" style="position: absolute; left: -99999999999px;">
    </div>
{{ Form::close() }}
<br>

<script>
    $("#taskform").submit(function(e) {
        var data = $("#task_adder").val();

        if (data) {
            $("#flash").show();
            $("#flash").fadeIn(400).html('<img src="<?php echo url("../img/loader.gif"); ?>" />Adding Task...');
            $.ajax({
                type: "POST",
                url: "<?php echo url("/add_task")?>",
                data: {task: $("#task_adder").val(), task_due: $("#datepicker").val()},
                cache: false,
                success: function(html) {
                    $("ol#update").append(html);
                    $("ol#update li:first").fadeIn("slow");
                    $("#flash").hide();
                    $("h2#no-task-header").remove();
                    $("#task_adder").val('');
                    $("#task_adder").attr("placeholder", "Add a task here");
                    $("#datepicker").val('');
                    $("#datepicker").attr("placeholder", "Select Due Date");
                }
            });
        }

        e.preventDefault();
        return false;
    });

    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>