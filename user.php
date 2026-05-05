<?php


class User{
    private $conn;
    private $table_name = "useri";
    public function __construct($db){
        $this->conn = $db;
}


public function isDuplicate($field, $value) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE " . $field . " = :value LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':value', $value);
    $stmt->execute();
    return $stmt->rowCount() > 0;
}

public function register($username, $email, $password): bool {
    $query = "INSERT INTO {$this->table_name} (username, email, password, role) 
              VALUES (:username, :email, :password, 'user')";

    $stmt = $this->conn->prepare($query);

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    if (!$stmt->execute()) {
            print_r($stmt->errorInfo()); 
            return false;
        }

        return true;
    }

public function login($username, $password) {
    $query = "SELECT * FROM {$this->table_name} WHERE username = :username LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }

    return false;
}
}
?>