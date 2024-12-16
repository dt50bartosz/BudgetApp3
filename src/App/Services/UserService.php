<?php 

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService {
    
    public function __construct(private Database $db)
    {
        
    }

    public function isEmailTaken(string $email) {
        $emailCount =  $this->db->query(

            "SELECT COUNT(*) FROM users WHERE email= :email", [
                'email' => $email ]

        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => 'Email taken']);
        }
    }

    public function isUsernameTaken(string $username) {

        $usernameCount =  $this->db->query(

            "SELECT COUNT(*) FROM users WHERE username= :username", [
                'username' => $username ]

        )->count();

        if ($usernameCount > 0) {
            throw new ValidationException(['username' => 'Username taken']);
        }

    }


        
    public function create(array $formData) {
        
        $sql = "INSERT INTO users (username, email, password) 
                VALUES (:username, :email, :password)";
    
        
        $hashedPassword = password_hash($formData['password'], PASSWORD_DEFAULT);
    
    
        $this->db->query($sql, [
            'username' => $formData['username'],
            'email' => $formData['email'],
            'password' => $hashedPassword
        ]);
    
      


        session_regenerate_id();


        $_SESSION['user'] = $this->db->id();
    
       
    }
    


    
    public function login(array $formData) {
        
        $user = $this->db->query("SELECT * FROM users WHERE username = :username", [
            'username' => $formData['username']
        ])->find();

        $passwordsMatch = password_verify($formData['password'],$user['password'] ?? '');

        if(!$user || !$passwordsMatch) {
            throw new ValidationException(['password' => ['Invalid credentials']]);
        }

        session_regenerate_id();



        $_SESSION['user'] = $user['user_id'];
    }

    public function logout() {
        unset($_SESSION['user']);

        session_regenerate_id();
    }

}