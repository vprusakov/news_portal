    
<?php

require APP . "Core/Model.php";

class News extends Model
{
    public function getAllNews()
    {
        $sql = "SELECT id, headline, intro FROM news";
        $query = $this->db->prepare($sql);
        $query->execute();
        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    public function getNewsEntryById($id) {
        $sql = "SELECT id, headline, content FROM news WHERE id=$id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    } 
}