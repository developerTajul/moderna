<?php 
namespace App\classes;
use App\classes\Database;

class Login{
    
    public function loginCheck( $data ){

        $username = $data['username'];   
        $password = md5($data['password']);   

       $users = Database::connect()->query("SELECT * FROM users WHERE username='$username' && password='$password'");
       
       
       if( $users->num_rows >= 1 ){

            $result = mysqli_fetch_assoc( $users );
            $_SESSION['id']         = $result['id'];
            $_SESSION['fullname']   = $result['fullname'];
            $_SESSION['username']   = $result['username'];
            $_SESSION['email']      = $result['email'];
            $_SESSION['password']   = $result['password'];

      

            header("Location: index.php");
       }
    }
}