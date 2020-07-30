<?php

class Login extends BaseController
{
    public function __construct($req)
    {
        $this->req = $req;
        // parent::__construct($req);

        $this->login();
    }

    /**
     * Rendering login view
     */
    public function displayLogin()
    {
        $this->loadView('login');
    }

    /**
     * Checking for data from login from
     * Check if user exists, if true change user status to active and log in
     * @return header(Location)
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $this->req->post['username'] ?? null;
            $pass = $this->req->post['password'] ?? null;

            if ($username != null && $pass != null && isset($this->req->post['Login'])) {
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

    /**
     * Destroy session, change user status to active(false)
     * Rendering logout view
     */
    public function logout()
    {
        $id = (int)$_SESSION['user_data']['id'] ?? null;
        session_destroy();
        $model = new User();
        $model->changeStatusToNotActive($id);
        $this->loadView('logout');
    }
}
