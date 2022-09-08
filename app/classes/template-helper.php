<?php 
function is_user_logged_in(){
    if( isset($_SESSION['fullname']) ){
        return true;
    }
}
