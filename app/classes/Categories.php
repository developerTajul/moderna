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
         * procedural way
         * $name = mysqli_real_escape_string($this->connect(),  trim($data['name']));
         */   


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
        // mysqli_query($this->connect(), "INSERT INTO categories (name, slug) VALUES('$name', '$slug')");
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

        $update_name = $this->connect()->real_escape_string( trim($data['update_name']) );
        $update_slug = strtolower( implode('-', explode(' ', trim($update_name))));


        $category_exists = mysqli_query($this->connect(), "SELECT * FROM categories WHERE name = '$update_name'");

        $current_update_id = $data['id'];


        if( mysqli_num_rows($category_exists ) >= 1 ){
            echo "No Changes Found";
        }else{
            $this->connect()->query("UPDATE categories SET name='$update_name', slug='$update_slug' WHERE id='$current_update_id'");
            header("Location: categories.php");
        }
    }

    /**
     * Category Delete
     */
    public function destroy( $id ){

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
