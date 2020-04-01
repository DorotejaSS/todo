<?php

class Todo extends Database
{
    public function userDashboard($user_id)
    {
        $sql = $this->conn->prepare('select * from tasks where user_id = ?');
        $sql->execute(array($user_id));


        if ($sql->rowCount() >= 1) {
            $tasks = [];
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $tasks[] = $row;
            }
            return $tasks;
        } else {
            echo 'You don\'t have any task yet.';
        }
    }

    public function createNewTask($new_task, $priority)
    {
        $id = $_SESSION['user_data']['id'];
        $sql = $this->conn->prepare('insert into tasks (user_id, task, priority)
        values (?, ?, ?)');
        $sql->execute(array($id, $new_task, $priority));
    }
}
