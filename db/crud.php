<?php
class crud
{
    private $db; //private db object

    // constructor to initzialize private variable to the db connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert_user($username, $email, $password)
    {
        try {
            $sql = "INSERT INTO users (username,email,password) VALUES (:username,:email,:password)";
            $stmt = $this->db->prepare($sql);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':email', $email);;
            $stmt->bindparam(':password', $hashed_password);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }
}
?>