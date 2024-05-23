<?php

Class Fashion {
    public $fashion_aid;
    public $fashion_title;
    public $fashion_category;
    public $fashion_image;
    public $fashion_author;
    public $fashion_publish_date;
    public $fashion_article;
    public $fashion_is_active;
    public $fashion_created;
    public $fashion_datetime;
   
    public $fashion_search;

    public $connection; 
    public $lastInsertedId;
    public $tblFashion;
    


    public function __construct($db) {
        $this->connection = $db;
        $this->tblFashion = "fashion";
    }

    public function create() {
        try {
            $sql = "insert into {$this->tblFashion} ";
            $sql .= "(fashion_title, ";
            $sql .= "fashion_category, "; 
            $sql .= "fashion_image, "; 
            $sql .= "fashion_author, "; 
            $sql .= "fashion_publish_date, "; 
            $sql .= "fashion_article, "; 
            $sql .= "fashion_is_active, "; 
            $sql .= "fashion_created, "; 
            $sql .= "fashion_datetime ) values ( "; 
            $sql .= ":fashion_title, "; 
            $sql .= ":fashion_category, "; 
            $sql .= ":fashion_image, "; 
            $sql .= ":fashion_author, "; 
            $sql .= ":fashion_publish_date, "; 
            $sql .= ":fashion_article, "; 
            $sql .= ":fashion_is_active, "; 
            $sql .= ":fashion_created, "; 
            $sql .= ":fashion_datetime )"; 
            $query = $this->connection->prepare($sql);
            $query->execute([
                "fashion_title"=> $this->fashion_title,
                "fashion_category"=> $this->fashion_category,
                "fashion_image"=> $this->fashion_image,
                "fashion_author"=> $this->fashion_author,
                "fashion_publish_date"=> $this->fashion_publish_date,
                "fashion_article"=> $this->fashion_article,
                "fashion_is_active"=> $this->fashion_is_active,
                "fashion_created"=> $this->fashion_created,
                "fashion_datetime"=> $this->fashion_datetime,
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
            $sql .= "from {$this->tblFashion} ";
            $sql .= "where fashion_aid = :fashion_aid ";
            $sql .= "order by fashion_aid desc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "fashion_aid" => $this->fashion_aid,
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
            $sql .= "from {$this->tblFashion} ";
            $sql .= "order by fashion_is_active desc ";
            $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function delete()
    {
        try {
            $sql = "delete from {$this->tblFashion} ";
            $sql .= "where fashion_aid = :fashion_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "fashion_aid" => $this->fashion_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function update()
    {
        try {
            $sql = "update {$this->tblFashion} set ";
            $sql .= "fashion_title = :fashion_title, ";
            $sql .= "fashion_image = :fashion_image, ";
            $sql .= "fashion_author = :fashion_author, ";
            $sql .= "fashion_publish_date = :fashion_publish_date, ";
            $sql .= "fashion_article = :fashion_article, ";
            $sql .= "fashion_category = :fashion_category, ";
            $sql .= "fashion_datetime = :fashion_datetime ";
            $sql .= "where fashion_aid  = :fashion_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "fashion_title" => $this->fashion_title,
                "fashion_image" => $this->fashion_image,
                "fashion_author" => $this->fashion_author,
                "fashion_category" => $this->fashion_category,
                "fashion_publish_date" => $this->fashion_publish_date,
                "fashion_article" => $this->fashion_article,
                "fashion_datetime" => $this->fashion_datetime,
                "fashion_aid" => $this->fashion_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function active()
    {
        try {
            $sql = "update {$this->tblFashion} set ";
            $sql .= "fashion_is_active = :fashion_is_active, ";
            $sql .= "fashion_datetime = :fashion_datetime ";
            $sql .= "where fashion_aid  = :fashion_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "fashion_is_active" => $this->fashion_is_active,
                "fashion_datetime" => $this->fashion_datetime,
                "fashion_aid" => $this->fashion_aid,
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
            $sql .= "from {$this->tblFashion} ";
            $sql .= "where fashion_title like :fashion_title ";
            $sql .= "order by fashion_is_active desc, ";
            $sql .= "fashion_title asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "fashion_title" => "%{$this->fashion_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}