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
        $model= new Task();
        $model->createNewTask($new_task, $priority);
    }

    public function checkTask()
    {
        $tasks = $this->req->post['checkbox'];
        $model = new Task();
        $model->taskToBeChecked($tasks);
    }

    public function removeTask()
    {
        $tasks = $this->req->post['checkbox'];
        $model = new Task();
        $model->taskToBeRemoved($tasks);
    }

    public function update()
    {
        if (!empty($this->req->post['task']) && !empty($this->req->post['priority']) && !empty($this->req->post['submit'])) {
            $this->addNewTask();
        }

        if (!empty($this->req->post['checkbox'])) {
            $this->checkTask();
        }

        if (!empty($this->req->post['delete']) && !empty($this->req->post['checkbox'])) {
            $this->removeTask();
        }

        header('Location: /todo/public/dashboard');
    }
}
