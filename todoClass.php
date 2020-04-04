<?php
include ("todoInterface.php");
include ("dbConn.php");

class todoClass implements todoInterface
{
    private $msqli;
    function __construct() {
        $dbc = new dbConn();
        $this->msqli = $dbc->db_connect();
    }

    public function addTodo()
    {
        // TODO: Implement addTodo() method.
        $dbconn = $this->msqli;
        if ($dbconn) {
            $todonew = $_POST["todo"];
            $sqlin = "INSERT INTO todos (id, todo, active_status) VALUES ('','$todonew', 1)";
            if ($dbconn->query($sqlin) === TRUE) {
                $last_id = $dbconn->insert_id;
                echo $last_id;
            } else {
                echo "Error: " . $sqlin . "<br>" . $dbconn->error;
            }
        }
    }

    public function getTodos()
    {
        $dbconn = $this->msqli;
        if ($dbconn) {
            $sql = "SELECT * FROM todos";
            $todos = $dbconn->query($sql);
            return $todos;
        }
        // TODO: Implement getTodos() method.
    }

    public function updateTodo($id, $todo)
    {
        // TODO: Implement updateTodo() method.
        $dbconn = $this->msqli;
        if ($dbconn) {
            $todoId = $id;
            $todoUpdate = $todo;
            $sqlin = "UPDATE todos SET todo='$todoUpdate', active_status=1 WHERE id=$todoId";
            if ($dbconn->query($sqlin) === TRUE) {
                echo $todoId;
            } else {
                echo "Error: " . $sqlin . "<br>" . $dbconn->error;
            }
        }
    }

    public function removeTodo($id)
    {
        // TODO: Implement removeTodo() method.
        $dbconn = $this->msqli;
        if ($dbconn) {
            $todoId = $_GET["todoRemove"];
            $sqlin = "DELETE FROM todos WHERE id=$todoId";
            if ($dbconn->query($sqlin) === TRUE) {
                echo $todoId;
            } else {
                echo "Error: " . $sqlin . "<br>" . $dbconn->error;
            }
        }
    }

    public function doneTodo($id)
    {
        // TODO: Implement doneTodo() method.

        $dbconn = $this->msqli;
        if ($dbconn) {
            $todoId = $id;
            $sqlin = "UPDATE todos SET active_status=0 WHERE id=$todoId";
            if ($dbconn->query($sqlin) === TRUE) {
                echo $todoId;
            } else {
                echo "Error: " . $sqlin . "<br>" . $dbconn->error;
            }
        }
    }
}