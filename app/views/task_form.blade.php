{{ Form::open(array('url' => 'index', 'method' => 'post', 'id' => 'taskform')) }}
    <div class="centered">
        {{ Form::text('task_adder', '', array('class' => 'form-control', 'placeholder' => 'Add a task here', 'style' => 'text-align: center', 'id' => 'task_adder')) }}
    </div>
{{ Form::close() }}
<br>
<div id="flash"></div>

<script>
    $("#taskform").submit(function(event) {
        var data = $("#task_adder").val();
        if (data) {
            $("#flash").show();
            $("#flash").fadeIn(400).html('<img src="https://d13yacurqjgara.cloudfront.net/users/12755/screenshots/1037374/hex-loader2.gif" />Adding Task...');
            alert(data);
        }
        event.preventDefault();
    });
</script>