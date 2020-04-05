<?php

class Dashboard extends Authorization
{

    public function displayList()
    {
        self::$view_data[] = $this->personalDashboard();
        self::loadView('main', self::$view_data);
    }

    public function personalDashboard()
    {
        $user_id = (int)$_SESSION['user_data']['id'];
        $model = new Todo();
        return $model->userDashboard($user_id);
    }

    public function addNewTask()
    {
        $new_task = $_POST['task'] ?? false;
        $priority = $_POST['priority'] ?? false;
        $model= new Todo();
        $model->createNewTask($new_task, $priority);
    }

    public function checkTask()
    {
        $tasks = $_POST['checkbox'];
        $model = new Todo();
        $model->taskToBeChecked($tasks);
    }

    public function removeTask()
    {
        $tasks = $_POST['checkbox'];
        $model = new Todo();
        $model->taskToBeRemoved($tasks);
    }

    public function update()
    {
        if (!empty($_POST['task']) && !empty($_POST['submit'])) {
            $this->addNewTask();
        }

        if (!empty($_POST['checkbox'])) {
            $this->checkTask();
        }

        if (!empty($_POST['delete']) && !empty($_POST['checkbox'])) {
            $this->removeTask();
        }

        header('Location: /todo/public/dashboard');
    }
}
