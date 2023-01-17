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
            $stmt->bindparam(':email', $email);
            ;
            $stmt->bindparam(':password', $hashed_password);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function find_user($username, $password)
    {
        try {
            $sql = "SELECT user_id, username, password, is_admin FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>