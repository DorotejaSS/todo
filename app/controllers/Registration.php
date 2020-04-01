<?php

class Registration extends Controller
{
    public function __construct()
    {
        $this->registrate();
    }

    public function registrate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? null;
            $pass = $_POST['password'] ?? null;
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;

            if ($username != null && $pass != null && $name != null && $email != null && isset($_POST['Register'])) {
                $model = new User();
                if ($model->create($username, $pass, $name, $email)) {
                    header('Location: /todo/public/login');
                }
            }
        }
    }
}
