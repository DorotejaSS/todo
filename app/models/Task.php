<?php

class Task extends Database
{
    private $table = 'tasks';

    public function getUserTasks($user_id)
    {
        $sql = $this->conn->prepare('select * from '.$this->table.' where user_id = ? order by id desc');
        $sql->execute(array($user_id));


        if ($sql->rowCount() >= 1) {
            $tasks = [];
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $tasks[] = $row;
            }
            return $tasks;
        }
        echo 'You don\'t have any task yet.';
    }

    public function createNewTask($new_task, $priority)
    {
        $id = $_SESSION['user_data']['id'];
        $sql = $this->conn->prepare('insert into '.$this->table.' (user_id, task, priority)
        values (?, ?, ?)');
        $sql->execute(array($id, $new_task, $priority));
    }

    public function taskToBeChecked($tasks)
    {
        foreach ($tasks as $task_id) {
            $sql = $this->conn->prepare('update '.$this->table.' set done = "'.true.'" WHERE id = "'.$task_id.'"');
            $sql->execute();
        }
    }

    public function taskToBeRemoved($tasks)
    {
        foreach ($tasks as $task_id) {
            $sql = $this->conn->prepare('delete from '.$this->table.' where id = '.$task_id.';');
            $sql->execute();
        }
    }
}
