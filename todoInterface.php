<?php


interface todoInterface
{
    public function addTodo();
    public function getTodos();
    public function updateTodo($id, $todo);
    public function removeTodo($id);
    public function doneTodo($id);
}