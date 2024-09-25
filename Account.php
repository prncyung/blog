<?php
include('db.php');
session_start();
class Account
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    #login
    public function login($username, $password)
    {
        $sql = "SELECT username,password FROM users WHERE username='$username'
            AND password='$password'";
        $result = mysqli_query($this->db, $sql);

        //check if the user is in the database
        if (mysqli_num_rows($result) > 0) {
            //adds a session
            $_SESSION['username'] = $_POST['username'];
            header('Location:dashboard.php');
        }
    }
}
