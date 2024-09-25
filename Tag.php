<?php
include('db.php');
class Tag
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    //get all the tags
    public function getAllTags()
    {
        $sql = "SELECT * FROM tag";
        $result = mysqli_query($this->db, $sql);
        return $result;
    }
}
