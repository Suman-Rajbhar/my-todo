<?php
include 'todoClass.php';

$newTodo = new todoClass();

if (!empty($_POST["todo"])) {
    $last_todo_id = $newTodo->addTodo($_POST["todo"]);
}

if (!empty($_GET["todoId"])) {
    $newTodo->doneTodo($_GET["todoId"]);
}

if (!empty($_GET["todoRemove"])) {
    $newTodo->removeTodo($_GET["todoRemove"]);
}

if (!empty($_GET["todoUpdate"])) {
    $newTodo->updateTodo($_GET["todoId"], $_GET["todoUpdate"]);
}