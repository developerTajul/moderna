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

    public function edit_post( $data ){
        $current_id = $data;
        $posts = $this->connect()->query("SELECT * FROM posts WHERE id='$current_id'");
        $posts = mysqli_fetch_assoc($posts);
        return $posts;
    }

    public function update_post( $data ){
        echo "<pre>";
        print_r( $data );
        print_r( $_FILES );
        echo "</pre>";
 

        /**
         * Post Thumbnail
         */
        $filename = $_FILES['update_thumbnail']['name'];
        $file_tmp_name = $_FILES['update_thumbnail']['tmp_name'];
        move_uploaded_file($file_tmp_name, '../uploads/blog/'.$filename);

        $update_title = $this->connect()->real_escape_string( trim($data['update_title']) );
        $update_slug = strtolower( implode('-', explode(' ', trim($update_title))));
        $update_excerpt = $this->connect()->real_escape_string(trim( $data['update_excerpt'] ));
        $update_content = $this->connect()->real_escape_string(trim( $data['update_content'] ));

        $current_update_id = $data['id'];

        if( $filename != '' ){
            /**
             * delete image from uploads folder
             */
            $old_img_replace = $this->connect()->query("SELECT * FROM posts WHERE id={$current_update_id}");
            $replace_imge = mysqli_fetch_assoc($old_img_replace);
            unlink('../uploads/blog/'.$replace_imge['thumbnail']);

            $this->connect()->query("UPDATE posts SET title='$update_title', slug='$update_slug', excerpt='$update_excerpt', content='$update_content', thumbnail='$filename'  WHERE id='$current_update_id'");
            header("Location: posts.php");
        }else{
            $this->connect()->query("UPDATE posts SET title='$update_title', slug='$update_slug', excerpt='$update_excerpt', content='$update_content'  WHERE id='$current_update_id'");
            header("Location: posts.php");
        }
    }



    public function add_post( $data ){

        $title          = $this->connect()->real_escape_string( trim($data['title']) );
        $slug           = strtolower( implode('-', explode(' ', trim($title))));
        $excerpt        = $this->connect()->real_escape_string( trim($data['excerpt']) );
        $content        = $this->connect()->real_escape_string( trim($data['content']) );
        $categories     = json_encode($data['cats']);
        $tags           = json_encode($data['tags']);


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
            $this->connect()->query( "INSERT INTO posts (title, slug, content, excerpt, thumbnail, cats, tags, user_id) VALUES ('{$title}', '{$slug}', '{$content}', '{$excerpt}', '{$filename}', '{$categories}', '{$tags}', '{$current_user}');" );
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