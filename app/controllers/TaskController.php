<?php

class TaskController extends Authorization
{
    public function __construct($req)
    {
        parent::__construct($req);
        $this->req = $req;
    }

    public function display()
    {
        self::$view_data[] = $this->getTasks();
        self::loadView('main', self::$view_data);
    }

    public function displayArchived()
    {
        self::$view_data[] = $this->getArchivedTasks();
        self::loadView('archived', self::$view_data);
    }

    public function getArchivedTasks()
    {
        $user_id = (int)$_SESSION['user_data']['id'];
        $model = new Task();
        return $model->getArchivedTasks($user_id);
    }

    public function getTasks()
    {
        $user_id = (int)$_SESSION['user_data']['id'];
        $model = new Task();
        return $model->getUserTasks($user_id);
    }

    public function addNewTask()
    {
        $new_task = $this->req->post['task'] ?? false;
        $priority = $this->req->post['priority'] ?? false;
        $start = $this->req->post['start'] ?? false;
        $end = $this->req->post['end'] ?? false;
        $model= new Task();
        $model->createNewTask($new_task, $priority, $start, $end);
    }

    public function checkTask()
    {
        $tasks = $this->req->post['checkbox'];
        $model = new Task();
        $model->taskToBeChecked($tasks);
    }

    public function uncheckTask()
    {
        $tasks = $this->req->post['checkbox'];
        $model = new Task();
        $model->taskToBeUnChecked($tasks);
    }


    public function archiveTask()
    {
        $tasks = $this->req->post['checkbox'];
        $model = new Task();
        $model->taskToBeArchieved($tasks);
    }

    public function removeTask()
    {
        $tasks = $this->req->post['checkbox'];
        $model = new Task();
        $model->taskToBeRemoved($tasks);
    }

    public function restoreTask()
    {
        $tasks = $this->req->post['checkbox'];
        $model = new Task();
        $model->taskToBeRestored($tasks);
    }

    public function displayActiveTask()
    {
        $datetime = date('Y-m-d'); // H:i:s
        $user_id = $_SESSION['user_data']['id'];
        $model = new Task();
        $active_task = $model->getActiveTasks($datetime, $user_id);
        self::$view_data[] = $active_task;
        self::loadView('active', self::$view_data);
    }

    public function update()
    {
        if (
            !empty($this->req->post['task']) &&
            !empty($this->req->post['priority']) &&
            !empty($this->req->post['start']) &&
            !empty($this->req->post['end']) &&
            !empty($this->req->post['submit'])) {
            $this->addNewTask();
        }

        if (!empty($this->req->post['checkbox']) && !empty($this->req->post['submit'])) {
            $this->checkTask();
        }

        if (!empty($this->req->post['checkbox']) && !empty($this->req->post['uncheck'])) {
            $this->uncheckTask();
        }

        if (!empty($this->req->post['archive']) && !empty($this->req->post['checkbox'])) {
            $this->archiveTask();
        }

        if (!empty($this->req->post['delete']) && !empty($this->req->post['checkbox'])) {
            $this->removeTask();
        }

        if (!empty($this->req->post['restore']) && !empty($this->req->post['checkbox'])) {
            $this->restoreTask();
        }

        header('Location: /todo/public/dashboard');
    }
}
