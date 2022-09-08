<?php 
namespace App\classes;
use App\classes\Database;

class Categories extends Database{

    /**
     * Add New Category
     *
     * @param [type] $data
     * @return void
     */
    public function add_category( $data ):void
    { 
        /**
         * Category Thumbnail
         */
        $filename = $_FILES['thumbnail']['name'];
        $file_tmp_name = $_FILES['thumbnail']['tmp_name'];
        move_uploaded_file($file_tmp_name, '../uploads/categories/'.$filename);

        $name       = $this->connect()->real_escape_string( trim($data['name']) );
        $content    = $this->connect()->real_escape_string( trim($data['content']) );

        $slug = strtolower( implode('-', explode(' ', trim($name))));
        $category_exists = mysqli_query($this->connect(), "SELECT * FROM categories WHERE name = '$name'");

        if( mysqli_num_rows($category_exists ) >= 1 ){
            echo "Category already exists";
        }else{
            $this->connect()->query( "INSERT INTO categories (name, slug, content, thumbnail) VALUES('$name', '$slug', '$content', '$filename')" );
            header("Location: categories.php");
        }

    }


    public function index():mixed
    {
        $results = $this->connect()->query("SELECT * FROM categories");

        $data =  $results->fetch_all(MYSQLI_ASSOC);
        return $data;
    }   


    public function update( $id ){
        $current_id = $id;
        $categorys = $this->connect()->query("SELECT * FROM categories WHERE id='$current_id'");
        $categorys = mysqli_fetch_assoc($categorys);
        return $categorys;
    }


    public function update_cat( $data ){
        /**
         * Category Thumbnail
         */
        $filename = $_FILES['update_thumbnail']['name'];
        $file_tmp_name = $_FILES['update_thumbnail']['tmp_name'];
        move_uploaded_file($file_tmp_name, '../uploads/categories/'.$filename);

        $update_name = $this->connect()->real_escape_string( trim($data['update_name']) );
        $update_slug = strtolower( implode('-', explode(' ', trim($update_name))));
        $update_content = $this->connect()->real_escape_string(trim( $data['update_content'] ));

 

        $current_update_id = $data['id'];

    
     

        if( $filename != '' ){
            /**
             * delete image from uploads folder
             */
            $old_img_replace = $this->connect()->query("SELECT * FROM categories WHERE id={$current_update_id}");
            $replace_imge = mysqli_fetch_assoc($old_img_replace);
            unlink('../uploads/categories/'.$replace_imge['thumbnail']);

            $this->connect()->query("UPDATE categories SET name='$update_name', slug='$update_slug', content='$update_content', thumbnail='$filename'  WHERE id='$current_update_id'");
            header("Location: categories.php");
        }else{
            $this->connect()->query("UPDATE categories SET name='$update_name', slug='$update_slug', content='$update_content'  WHERE id='$current_update_id'");
            header("Location: categories.php");
        }

       
    }

    /**
     * Category Delete
     */
    public function destroy( $id ){

        /**
         * delete image from uploads folder
         */
        $old_img_replace = $this->connect()->query("SELECT * FROM categories WHERE id={$id}");
        $replace_imge = mysqli_fetch_assoc($old_img_replace);
        unlink('../uploads/categories/'.$replace_imge['thumbnail']);

        $this->connect()->query("DELETE FROM categories WHERE id='$id'");
        header("Location: categories.php");
    }

    /**
     * Category Status Change
     */
    public function status_change( $status, $id ){
        if( $status == '1' ){
            $status = 0;
        }else{
            $status = 1;
        }

        $current_id = $id;
  
        $this->connect()->query("UPDATE categories SET status='$status'  WHERE id='$current_id'");
    }


}
