<?php

class User extends Database
{
    private $table = 'users';

    /**
     * Checks if user exists
     * @param string $username
     * @param string $pass
     * @return bool
     */
    public function checkIfExists($username, $pass)
    {
        $sql = $this->conn->prepare('select * from '.$this->table.' where username = ? and password = ?');
        $sql->execute(array($username, $pass));

        if ($sql->rowCount() == 1) {
            $user_data = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_data'] = $user_data;
            return true;
        }
        return false;
    }
    /**
     * Change status to active
     * @param integer $id
     * @return
     */
    public function changeStatusToActive($id)
    {
        $sql = $this->conn->prepare('update '.$this->table.' set active = "'.true.'" WHERE id = "'.$id.'"');
        $sql->execute();
        return;
    }

    /**
     * Change status from active(true) to false
     * @param integer $id
     * @return
     */
    public function changeStatusToNotActive($id)
    {
        $sql = $this->conn->prepare('update '.$this->table.' set active = "'.false.'" WHERE id = "'.$id.'"');
        $sql->execute();
        return;
    }

    /**
     * Registering new user
     * @param string $username
     * @param string $pass
     * @param string $name
     * @param string $email
     * @return bool
     */
    public function create($username, $pass, $name, $email)
    {
        $sql = $this->conn->prepare('insert into '.$this->table.' (name, username, password, email) values (?, ?, ?, ?)');
        if ($sql->execute(array($name, $username, $pass, $email))) {
            return true;
        }
    }
}
