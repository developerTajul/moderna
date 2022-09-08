<?php 
namespace App\classes;
use App\classes\Database;

class Tags extends Database{

    /**
     * Add New Tag
     *
     * @param [type] $data
     * @return void
     */
    public function add_tag( $data ):void
    { 
        /**
         * Tag Thumbnail
         */
        $filename = $_FILES['thumbnail']['name'];
        $file_tmp_name = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($file_tmp_name, '../uploads/tags/'.$filename);

        $name       = $this->connect()->real_escape_string( trim($data['name']) );
        $content    = $this->connect()->real_escape_string( trim($data['content']) );

        $slug = strtolower( implode('-', explode(' ', trim($name))));
        $category_exists = mysqli_query($this->connect(), "SELECT * FROM tags WHERE name = '$name'");

        if( mysqli_num_rows($category_exists ) >= 1 ){
            echo "Tag already exists";
        }else{
            $this->connect()->query( "INSERT INTO tags (name, slug, content, thumbnail) VALUES('$name', '$slug', '$content', '$filename')" );
            header("Location: tags.php");
        }

    }


    public function index():mixed
    {
        $results = $this->connect()->query("SELECT * FROM tags");

        $data =  $results->fetch_all(MYSQLI_ASSOC);
        return $data;
    }   


    public function update( $id ){
        $current_id = $id;
        $tags = $this->connect()->query("SELECT * FROM tags WHERE id='$current_id'");
        $tags = mysqli_fetch_assoc($tags);
        return $tags;
    }


    public function update_tag( $data ){
        /**
         * tag Thumbnail
         */
        $filename = $_FILES['update_thumbnail']['name'];
        $file_tmp_name = $_FILES['update_thumbnail']['tmp_name'];
        move_uploaded_file($file_tmp_name, '../uploads/tags/'.$filename);

        $update_name = $this->connect()->real_escape_string( trim($data['update_name']) );
        $update_slug = strtolower( implode('-', explode(' ', trim($update_name))));
        $update_content = $this->connect()->real_escape_string(trim( $data['update_content'] ));

        $current_update_id = $data['id'];

        if( $filename != '' ){
            /**
             * delete image from uploads folder
             */
            $old_img_replace = $this->connect()->query("SELECT * FROM tags WHERE id={$current_update_id}");
            $replace_imge = mysqli_fetch_assoc($old_img_replace);
            unlink('../uploads/tags/'.$replace_imge['thumbnail']);

            $this->connect()->query("UPDATE tags SET name='$update_name', slug='$update_slug', content='$update_content', thumbnail='$filename'  WHERE id='$current_update_id'");
            header("Location: tags.php");
        }else{
            $this->connect()->query("UPDATE tags SET name='$update_name', slug='$update_slug', content='$update_content'  WHERE id='$current_update_id'");
            header("Location: tags.php");
        }

       
    }

    /**
     * Tag Delete
     */
    public function destroy( $id ){

        /**
         * delete image from uploads folder
         */
        $old_img_replace = $this->connect()->query("SELECT * FROM tags WHERE id={$id}");
        $replace_imge = mysqli_fetch_assoc($old_img_replace);
        unlink('../uploads/tags/'.$replace_imge['thumbnail']);

        $this->connect()->query("DELETE FROM tags WHERE id='$id'");
        header("Location: tags.php");
    }

    /**
     * Tag Status Change
     */
    public function status_change( $status, $id ){
        if( $status == '1' ){
            $status = 0;
        }else{
            $status = 1;
        }

        $current_id = $id;
  
        $this->connect()->query("UPDATE tags SET status='$status'  WHERE id='$current_id'");
    }


}
