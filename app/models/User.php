<?php

class User extends Database
{
    public function checkIfExists($username, $pass)
    {
        $sql = $this->conn->prepare('select * from users where username = ? and password = ?');
        $sql->execute(array($username, $pass));

        if ($sql->rowCount() == 1) {
            $user_data = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_data'] = $user_data;
            return true;
        } else {
            return false;
        }
    }

    public function changeStatusToActive($id)
    {
        $sql = $this->conn->prepare('update users set active = "'.true.'" WHERE id = "'.$id.'"');
        $sql->execute();
        return;
    }

    public function changeStatusToNotActive($id)
    {
        $sql = $this->conn->prepare('update users set active = "'.false.'" WHERE id = "'.$id.'"');
        $sql->execute();
        return;
    }

    public function create($username, $pass, $name, $email)
    {
        $sql = $this->conn->prepare('insert into users (name, username, password, email) values (?, ?, ?, ?)');
        if ($sql->execute(array($name, $username, $pass, $email))) {
            return true;
        }
    }
}
