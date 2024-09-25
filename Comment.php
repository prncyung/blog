<?php
include('db.php');


class Comment
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    #insert comment
    public function comment($name, $email, $subject, $description, $slug, $dateCreated, $status)
    {
        $sql = "INSERT INTO comments(name,email,subject,description,slug,created_at,status) 
                VALUES('$name','$email','$subject','$description','$slug', '$dateCreated', '$status')";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    #get comment by slug
    #this will determine the exact comment of a particular post.
    #this is suppost to be thesame with the slug of the post.

    public function getCommentBySlug($slug)
    {
        $sql = "SELECT * FROM comments WHERE slug = '$slug' 
        AND status =1";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    #count number of comment that are accepted
    public function countComment($slug)
    {
        $sql = "SELECT * FROM comments WHERE slug = '$slug' 
        AND status =1";
        $result = mysqli_query($this->db, $sql);
        return mysqli_num_rows($result);
    }

    #get pending comments
    public function getPendingComment()
    {
        $sql = "SELECT * FROM comments WHERE status =0";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    #update approved comments
    public function update($id)
    {
        $sql = "UPDATE comments SET status = 1 WHERE id='$id'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }

    #delete comments
    public function delete($id)
    {
        $sql = "DELETE FROM comments WHERE id='$id'";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}
