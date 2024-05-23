<?php

Class Feature {
    public $feature_aid;
    public $feature_title;
    public $feature_category;
    public $feature_image;
    public $feature_author;
    public $feature_publish_date;
    public $feature_article;
    public $feature_is_active;
    public $feature_created;
    public $feature_datetime;
   
    public $feature_search;

    public $connection; 
    public $lastInsertedId;
    public $tblFeature;
    


    public function __construct($db) {
        $this->connection = $db;
        $this->tblFeature = "feature";
    }

    public function create() {
        try {
            $sql = "insert into {$this->tblFeature} ";
            $sql .= "(feature_title, ";
            $sql .= "feature_category, "; 
            $sql .= "feature_image, "; 
            $sql .= "feature_author, "; 
            $sql .= "feature_publish_date, "; 
            $sql .= "feature_article, "; 
            $sql .= "feature_is_active, "; 
            $sql .= "feature_created, "; 
            $sql .= "feature_datetime ) values ( "; 
            $sql .= ":feature_title, "; 
            $sql .= ":feature_category, "; 
            $sql .= ":feature_image, "; 
            $sql .= ":feature_author, "; 
            $sql .= ":feature_publish_date, "; 
            $sql .= ":feature_article, "; 
            $sql .= ":feature_is_active, "; 
            $sql .= ":feature_created, "; 
            $sql .= ":feature_datetime )"; 
            $query = $this->connection->prepare($sql);
            $query->execute([
                "feature_title"=> $this->feature_title,
                "feature_category"=> $this->feature_category,
                "feature_image"=> $this->feature_image,
                "feature_author"=> $this->feature_author,
                "feature_publish_date"=> $this->feature_publish_date,
                "feature_article"=> $this->feature_article,
                "feature_is_active"=> $this->feature_is_active,
                "feature_created"=> $this->feature_created,
                "feature_datetime"=> $this->feature_datetime,
            ]);
            $this->lastInsertedId = $this->connection->lastInsertId();
        }catch (PDOException $ex) {
            $query = false;
        }

        return $query;
    }


    public function readById()
    {
        try {
            $sql = "select * ";
            $sql .= "from {$this->tblFeature} ";
            $sql .= "where feature_aid = :feature_aid ";
            $sql .= "order by feature_aid desc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "feature_aid" => $this->feature_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function readAll()
    {
        try {
            $sql = "select * ";
            $sql .= "from {$this->tblFeature} ";
            $sql .= "order by feature_is_active desc ";
            $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function delete()
    {
        try {
            $sql = "delete from {$this->tblFeature} ";
            $sql .= "where feature_aid = :feature_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "feature_aid" => $this->feature_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function update()
    {
        try {
            $sql = "update {$this->tblFeature} set ";
            $sql .= "feature_title = :feature_title, ";
            $sql .= "feature_image = :feature_image, ";
            $sql .= "feature_author = :feature_author, ";
            $sql .= "feature_publish_date = :feature_publish_date, ";
            $sql .= "feature_article = :feature_article, ";
            $sql .= "feature_category = :feature_category, ";
            $sql .= "feature_datetime = :feature_datetime ";
            $sql .= "where feature_aid  = :feature_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "feature_title" => $this->feature_title,
                "feature_image" => $this->feature_image,
                "feature_author" => $this->feature_author,
                "feature_category" => $this->feature_category,
                "feature_publish_date" => $this->feature_publish_date,
                "feature_article" => $this->feature_article,
                "feature_datetime" => $this->feature_datetime,
                "feature_aid" => $this->feature_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function active()
    {
        try {
            $sql = "update {$this->tblFeature} set ";
            $sql .= "feature_is_active = :feature_is_active, ";
            $sql .= "feature_datetime = :feature_datetime ";
            $sql .= "where feature_aid  = :feature_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "feature_is_active" => $this->feature_is_active,
                "feature_datetime" => $this->feature_datetime,
                "feature_aid" => $this->feature_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }

    public function search()
    {
        try {
            $sql = "select ";
            $sql .= "* ";
            $sql .= "from {$this->tblFeature} ";
            $sql .= "where feature_title like :feature_title ";
            $sql .= "order by feature_is_active desc, ";
            $sql .= "feature_title asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "feature_title" => "%{$this->feature_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}