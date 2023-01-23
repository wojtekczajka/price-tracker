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

    public function insert_comment($product_id, $user_id, $comment_text)
    {
        try {
            $sql = "INSERT INTO user_comments (product_id, user_id, comment_text) VALUES (:product_id, :user_id, :comment_text)";
            $stmt = $this->db->prepare($sql);

            $stmt->bindparam(':product_id', $product_id);
            $stmt->bindparam(':user_id', $user_id);
            $stmt->bindparam(':comment_text', $comment_text);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function get_all_products()
    {
        try {
            $sql = "SELECT product_id, product_name, measurements_unit FROM products";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function get_comments_by_product_id($product_id)
    {
        try {
            $sql = "SELECT * FROM user_comments WHERE product_id = :product_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':product_id', $product_id);
            $stmt->execute();
            $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $comments;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function get_username_by_user_id($user_id) {
        try {
            $sql = "SELECT username FROM users WHERE user_id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>