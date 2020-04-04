<?php
include 'header.php';
include 'todoClass.php';

$newTodo = new todoClass();
$todos = $newTodo->getTodos();
?>
<style>
    .input-todo[readonly]{
        border: none;
        background: #ffffff;
        padding: 0px;
        height: 20px;
    }
</style>
<div id="container" class="effect mainnav-full">
    <div class="boxed">
        <section id="content-container">
            <section id="page-content">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">My ToDo List</h3>
                            </div>
                            <div class="panel-body">
                                <!--Validation States-->
                                <!--===================================================-->
                                <div class="form-group has-feedback">
                                    <label for="demo-oi-definput" class="control-label">Todo</label>
                                    <input type="text" id="demo-oi-definput" class="form-control todo">
                                    <span class="fa fa-list-ol fa-lg form-control-feedback"></span>
                                </div>
                                <!--===================================================-->
                                <!--End Validation States-->
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 12px;">#</th>
                                            <th>Todo</th>
                                            <th class="text-right" style="width: 22px;">Option</th>
                                        </tr>
                                        </thead>
                                        <tbody class="addTodo all-todo">
                                        <?php $left_item = 0; if ($todos->num_rows > 0) {
                                        // output data of each row
                                        while($row = $todos->fetch_assoc()) { ?>
                                            <tr class="remove-<?php echo $row["id"]; ?>">
                                                <?php if($row["active_status"] == 1) { $left_item++; ?>
                                                    <td class="active-todo" onmouseover="showCheck(<?php echo $row["id"]; ?>)" onmouseout="hideCheck(<?php echo $row["id"]; ?>)"><input type="checkbox" value="<?php echo $row["id"]; ?>" class="<?php echo $row["id"]; ?> list[]" onclick="completeTodo(this.value)" style="display: none;"></td>
                                                    <td class="active-todo label-checked-<?php echo $row["id"]; ?>"><input type="text" value="<?php echo $row["todo"]; ?>" class="form-control input-todo-<?php echo $row["id"]; ?> input-todo" readonly ondblclick="editTodo(<?php echo $row["id"]; ?>)" onmouseout="updateTodo(<?php echo $row["id"]; ?>)"></td>
                                                    <td class="active-todo text-right status-align"><span class="label label-purple status-<?php echo $row["id"]; ?>" onclick="removeTodo(<?php echo $row["id"]; ?>)"><i class="fa fa-remove"></i></span></td>
                                                <?php }else{ ?>
                                                    <td class="complete-todo"><input type="checkbox" checked disabled></td>
                                                    <td class="complete-todo"><del><?php echo $row["todo"]; ?></del></td>
                                                    <td class="text-right complete-todo"><span class="label label-purple status-<?php echo $row["id"]; ?>"><i class="fa fa-check-square"></i> </span></td>
                                                <?php } ?>
                                            </tr>
                                        <?php }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <p>
                                        <input type="hidden" value="<?php echo $left_item; ?>" class="total-items">
                                        <div class="badge badge-success total-now"><?php echo $left_item; ?></div> Items left
                                    <div class="btn btn-xs btn-default check-active">Active items</div>
                                    <div class="btn btn-xs btn-default check-complete">Completed items</div>
                                    <div class="btn btn-xs btn-default check-all">All items</div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</div>

<?php include 'footer.php'; ?>