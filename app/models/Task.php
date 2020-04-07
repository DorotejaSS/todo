<?php

class Task extends Database
{
    private $table = 'tasks';

    public function getUserTasks($user_id)
    {
        $sql = $this->conn->prepare('select * from '.$this->table.' where user_id = ? and archived = 0 order by id desc');
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

    public function getArchivedTasks($user_id)
    {
        $sql = $this->conn->prepare('select * from '.$this->table.' where user_id = ? and archived = 1 order by id desc');
        $sql->execute(array($user_id));

        if ($sql->rowCount() >= 1) {
            $tasks = [];
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $tasks[] = $row;
            }
            return $tasks;
        }
        echo 'You don\'t have any archived task yet.';
    }

    public function getActiveTasks($datetime, $user_id)
    {
        $sql = $this->conn->prepare('select * from '.$this->table.' WHERE "'.$datetime.'" between start_time and end_time and archived = 0 and user_id = '.$user_id);
        $sql->execute();

        if ($sql->rowCount() >= 1) {
            $tasks = [];
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $tasks[] = $row;
            }
            return $tasks;
        }
        echo 'You don\'t have any active task yet.';
    }

    public function createNewTask($new_task, $priority, $start, $end)
    {
        $id = $_SESSION['user_data']['id'];
        $sql = $this->conn->prepare('insert into '.$this->table.' (user_id, task, priority, start_time, end_time)
        values (?, ?, ?, ?, ?)');
        $sql->execute(array($id, $new_task, $priority, $start, $end));
    }

    public function taskToBeChecked($tasks)
    {
        foreach ($tasks as $task_id) {
            $sql = $this->conn->prepare('update '.$this->table.' set done = "'.true.'" WHERE id = "'.$task_id.'"');
            $sql->execute();
        }
    }

    public function taskToBeUnChecked($tasks)
    {
        foreach ($tasks as $task_id) {
            $sql = $this->conn->prepare('update '.$this->table.' set done = "'.false.'" WHERE id = "'.$task_id.'"');
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

    public function taskToBeRestored($tasks)
    {
        foreach ($tasks as $task_id) {
            $sql = $this->conn->prepare('update '.$this->table.' set archived = 0 where id = '.$task_id.';');
            $sql->execute();
        }
    }

    public function taskToBeArchieved($tasks)
    {
        foreach ($tasks as $task_id) {
            $sql = $this->conn->prepare('update '.$this->table.' set archived = 1 where id = '.$task_id.';');
            $sql->execute();
        }
    }
}
