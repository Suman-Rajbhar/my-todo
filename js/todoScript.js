$('.todo').keypress(function(event) {
    if (event.keyCode == 13) {
        $('.complete-todo').show();
        $('.active-todo').show();
        var tododata = $('.todo').val();
        if(tododata == "" || tododata.trim() == ""){
            return false;
        }
        $.ajax({
            method: "POST",
            url: "/todo/todoController.php",
            data: { todo: tododata }
        })
            .success(function(last_id) {
                var total = $(".total-items").val();
                var nowTotal = parseInt(total)+1;
                $('.todo').val("");
                $(".addTodo").append("<tr class='remove-"+last_id+"'><td onmouseover='showCheck("+last_id+")' onmouseout='hideCheck("+last_id+")'><input type='checkbox' value='"+tododata+"' class='"+last_id+" list[]' onclick='completeTodo("+last_id+")' style='display: none;'></td><td class='label-checked-"+last_id+"'><input type='text' value='"+tododata+"' class='form-control input-todo-"+last_id+" input-todo' readonly ondblclick='editTodo("+last_id+")' onmouseout='updateTodo("+last_id+")'></td><td class='text-right'><span class='label label-purple status-"+last_id+"' onclick='removeTodo("+last_id+")'><i class='fa fa-remove'></i></span></td></tr>");
                $(".total-now").text(nowTotal);
                $(".total-items").val(nowTotal);
            });
    }
});

function showCheck(shid) {
    $('.'+shid).css('display', 'block');
}

function hideCheck(shid) {
    if($('.'+shid).prop("checked") == true){
        $('.'+shid).css('display', 'block');
    }
    else if($('.'+shid).prop("checked") == false){
        $('.'+shid).css('display', 'none');
    }
}


function completeTodo(todo) {
    $('.label-checked-'+todo).css('text-decoration', 'line-through');
    var total = $(".total-items").val();
    var nowTotal = parseInt(total)-1;
    $.ajax({
        method: "GET",
        url: "/todo/todoController.php",
        data: { todoId: todo }
    }).success(function(updated_id) {
        $('.status-'+updated_id).html("<i class='fa fa-check-square'></i>");
        $(".total-now").text(nowTotal);
        $(".total-items").val(nowTotal);
    });
}

function removeTodo(todo) {
    var total = $(".total-items").val();
    var nowTotal = parseInt(total)-1;
    $.ajax({
        method: "GET",
        url: "/todo/todoController.php",
        data: { todoRemove: todo }
    }).success(function(removed_id) {
        $('.remove-'+removed_id).remove();
        $(".total-now").text(nowTotal);
        $(".total-items").val(nowTotal);
    });
}

function editTodo(todo) {
    $('.input-todo-'+todo).removeAttr("readonly");
}

function updateTodo(todo) {
    $('.input-todo-'+todo).prop('readonly', true);
    var todoUpdate = $('.input-todo-'+todo).val();
    if(todoUpdate == "" || todoUpdate.trim() == ""){
        location.reload();
        return false;
    }
    $.ajax({
        method: "GET",
        url: "/todo/todoController.php",
        data: { todoId: todo, todoUpdate: todoUpdate  }
    }).success(function(update_id) {
        // alert(update_id+" updated");
    });
}

$('.check-complete').click(function () {
    $('.complete-todo').show();
    $('.active-todo').hide();
});

$('.check-active').click(function () {
    $('.complete-todo').hide();
    $('.active-todo').show();
});

$('.check-all').click(function () {
    $('.complete-todo').show();
    $('.active-todo').show();
});
