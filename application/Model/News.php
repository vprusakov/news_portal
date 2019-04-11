    
<?php

require APP . "Core/Model.php";

class News extends Model
{
    public function getAllNews()
    {
        $sql = "SELECT id, headline, intro FROM news ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getNewsEntryById($id) {
        $sql = "SELECT id, headline, intro, content FROM news WHERE id=$id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }
    
    public function deleteNewsEntryById($id) {
        $sql = "DELETE FROM news WHERE id=$id";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    
    public function addNewsEntry($headline, $intro, $content) {
        $sql = "INSERT INTO news (headline, intro, content) VALUES ('$headline', '$intro', '$content')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function updateNewsEntryById($id, $headline, $intro, $content) {
        $sql = "UPDATE news SET headline = '$headline', intro = '$intro', content = '$content' WHERE id=$id";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}