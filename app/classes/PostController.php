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
            $this->connect()->query( "INSERT INTO posts (title, slug, content, excerpt, thumbnail, categories, user_id) VALUES ('{$title}', '{$slug}', '{$content}', '{$excerpt}', '{$filename}', '{$categores}', '{$current_user}');" );
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
        // getting category slug from url
        $current_cat_slug = $data;

        // getting category slug from databases
        $cats = $this->connect()->query("SELECT * FROM posts");
        $cats_from_db =  mysqli_fetch_all( $cats, MYSQLI_ASSOC);

        foreach( $cats_from_db as $post ){
            $cats_from_database = json_decode($post['categories'] );
            echo "<pre>";
            print_r($cats_from_database);
            echo "</pre>";
            

            $cat_info = $this->connect()->query( "SELECT * FROM posts WHERE categories= in_array($current_cat_slug, $cats_from_database)" );

            $result = mysqli_fetch_all( $cat_info, MYSQLI_ASSOC );
            print_r($result);
            die();

         
            // $cat_info = $this->connect()->query( "SELECT * FROM posts WHERE category_id='$current_cat_slug'" );
            // $cat_info = $this->connect()->query( "SELECT * FROM posts WHERE category_id ='$current_cat_slug'" );
            // $result = mysqli_fetch_all( $cat_info, MYSQLI_ASSOC );
        }
    }
}