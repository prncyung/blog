<?php
include('db.php');
include('functions/function.php');
class Post
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //method to insert data
    public function addPost($title, $description, $image, $date, $slug)
    {
        $sql = "INSERT INTO post(title,description, image, created_at, slug) VALUES('$title','$description','$image', '$date','$slug')";
        $result = mysqli_query($this->db, $sql);

        //get the post_id and tag_id
        if ($result) {
            if ($_POST['tags']) {
                $tags = $_POST['tags'];
                //get the last inserted id for the database
                $lastInsertedId = mysqli_insert_id($this->db);
                foreach ($tags as $tag) {
                    $sql = "INSERT INTO post_tag(post_id,tag_id)VALUES('$lastInsertedId', $tag)";
                    $result = mysqli_query($this->db, $sql);
                }
            }
        }
        return $result;
        //return "Post Added";
    }

    //Get data from the database
    public function getPost()
    {
        #for search
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            return $this->search($keyword);
        }
        #for tag
        {
            //This gets the post by their tags if the user clicked on the tag.
            if (isset($_GET['tag'])) {
                $tag = $_GET['tag'];
                $sql = "SELECT * 
                    FROM post
                    INNER JOIN post_tag ON post.id = post_tag.post_id
                    INNER JOIN tag ON tag.id = post_tag.tag_id
                    WHERE tag.tag='$tag'";
                $result = mysqli_query($this->db, $sql);
                return $result;
            }
            /*$sql = "SELECT * FROM post";
            $result = mysqli_query($this->db, $sql);
            return $result;*/


            //pagination
            $limit = 2;
            //check the GET method
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }

            #start
            $start = ($page - 1) * $limit;

            $sql = "SELECT * FROM post LIMIT $start, $limit";
            $result = mysqli_query($this->db, $sql);
            return $result;
            //ends pagination
        }
    }
    public function search($keyword)
    {
        $sql = "SELECT * FROM post 
            WHERE title LIKE '%{$keyword}%'
            OR description LIKE '%{$keyword}%'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    //get single post in the database based on the slug
    public function getSinglePost($slug)
    {
        $sql = "SELECT * FROM post WHERE slug='$slug'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    //update the post in the database
    public function updatePost($title, $description, $slug)
    {
        //check if the user upload a new image.
        $newImage = $_FILES['image']['name'];
        if (!empty($newImage)) {
            $image = uploadImage();
            $sql = "UPDATE post SET title ='$title', description='$description', image = '$image' WHERE slug = '$slug'";
            $result = mysqli_query($this->db, $sql);
            return $result;
        } else {
            //if no new image is uploaded update the form without the new image.
            $sql = "UPDATE post SET title ='$title',description='$description' WHERE slug = '$slug'";
            $result = mysqli_query($this->db, $sql);
            return $result;
        }
    }

    //Delete post by slug
    public function deletePostBySlug($slug)
    {
        $sql = "DELETE FROM post WHERE slug='$slug'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    //get popular post
    public function getPopularPost()
    {
        $sql = "SELECT * FROM post LEFT JOIN comments on post.slug=
        comments.slug GROUP BY 
        comments.slug ORDER by count(comments.slug)DESC limit 5";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}
