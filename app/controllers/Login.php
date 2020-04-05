<?php

class Login extends BaseController
{
    public function __construct($req)
    {
        parent::__construct($req);
        self::login();
    }

    public static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? null;
            $pass = $_POST['password'] ?? null;

            if ($username != null && $pass != null && isset($_POST['Login'])) {
                $model = new User();
                if ($model->checkIfExists($username, $pass)) {
                    $id = (int)$_SESSION['user_data']['id'];
                    $model->changeStatusToActive($id);
                    header('Location: /todo/public/dashboard');
                } else {
                    header('Location: /todo/public/login');
                }
            }
        }
    }

    public static function logout()
    {
        $id = (int)$_SESSION['user_data']['id'] ?? null;
        $model = new User();
        $model->changeStatusToNotActive($id);
    }

}
