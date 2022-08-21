<?php 
namespace App\classes;
use App\classes\Database;


class PostController extends Database{

    public function index():mixed
    {
        $results = $this->connect()->query("SELECT * FROM posts");
        $data =  $results->fetch_all(MYSQLI_ASSOC);
        return $data;
    }  

    public function add_post( $data ){

        $title          = $this->connect()->real_escape_string( trim($data['title']) );
        $slug           = strtolower( implode('-', explode(' ', trim($title))));
        $excerpt        = $this->connect()->real_escape_string( trim($data['excerpt']) );
        $content        = $this->connect()->real_escape_string( trim($data['content']) );
        $categores      = json_encode($data['cats']);


        $current_user   = $_SESSION['id'];
        /**
         * Thumbnail
         */
        $filename       = $_FILES['thumbnail']['name'];
        $file_tmp_name  = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($file_tmp_name, '../uploads/blog/'.$filename);
        
        $post_exists = mysqli_query($this->connect(), "SELECT * FROM posts WHERE title = '$title'");
        if( mysqli_num_rows($post_exists ) >= 1 ){
            echo "Category already exists";
        }else{
            $this->connect()->query( "INSERT INTO posts (title, slug, content, excerpt, thumbnail, category_id, user_id) VALUES ('{$title}', '{$slug}', '{$content}', '{$excerpt}', '{$filename}', '{$categores}', '{$current_user}');" );
            header("Location: posts.php");
        }

    }   

    /**
     * Single Post
     *
     * @param [type] $data
     * @return void
     */
    public function single_post( $data ){
        $post_info = $this->connect()->query("SELECT * FROM posts WHERE id='$data'" );
        return mysqli_fetch_assoc($post_info );
    }


    public function user_wise_post( $data ){
        $user_all_posts = $this->connect()->query("SELECT * FROM posts WHERE user_id='$data'" );
        return mysqli_fetch_all($user_all_posts, MYSQLI_ASSOC ); 
    }

    /**
     * Categorywise Post
     *
     * @return void
     */
    public function category_post( $data ){
        $this->connect()->query("SELECT * FROM posts WHERE id = ");
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        // $cat_info = $this->connect()->query( "SELECT * FROM posts WHERE slug='$data'" );
        // $cat_post = mysqli_fetch_assoc($cat_info);
    }
}