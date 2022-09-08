<?php 
namespace App\classes;
use App\classes\Database;

class Login{

    public $success;
    public $fail;


    /**
     * Account Creation
     *
     * @param [type] $data
     * @return void
     */
    public function register( $data ){
        /**
         * User Thumbnail
         */
        $filename = $_FILES['thumbnail']['name'];
        $file_tmp_name = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($file_tmp_name, '../uploads/users/'.$filename);


        $fullname       = $data['fullname'];
        $email          = $data['email'];
        $username       = $data['username'];
        $password       = MD5($data['password']);

        $sql_reg = "INSERT INTO users (fullname, email, username, password, thumbnail) VALUES ('{$fullname}', '{$email}', '{$username}', '{$password}', '{$filename}')";

        if( Database::connect()->query($sql_reg) ){
            $this->success = "Account Created Successfully"; 
            header("Location: register.php");
        }else{
            $this->fail = "Account creation fails";
        }

    }
    



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