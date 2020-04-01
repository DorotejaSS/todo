<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        // if (!empty($_POST['Submit'])) {
        //     $this->addNewTask();
        // }
    }

    public function checkStatus()
    {
        if (!empty($_SESSION['user_data'])) {
            self::$view_data[] = $this->personalDashboard();
            self::loadView('main', self::$view_data);
        } else {
            header('Location: /todo/public/login');
        }
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
}
