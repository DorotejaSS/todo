<?php

class Registration extends BaseController
{
    public function __construct($req)
    {
        $this->req = $req;
        // parent::__construct($req);
        $this->registrate();
    }

    public function displayRegister()
    {
        $this->loadView('registration');
    }

    public function registrate()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->req->post['username'] ?? null;
            $pass = $this->req->post['password'] ?? null;
            $name = $this->req->post['name'] ?? null;
            $email = $this->req->post['email'] ?? null;
            if ($username != null && $pass != null && $name != null && $email != null && isset($this->req->post['Register'])) {
                $model = new User();
                if ($model->create($username, $pass, $name, $email)) {
                    header('Location: /todo/public/login');
                }
            }
        }
    }
}
