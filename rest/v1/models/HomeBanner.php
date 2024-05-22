<?php

Class HomeBanner {
    public $homeBanner_aid;
    public $homeBanner_title;
    public $homeBanner_category;
    public $homeBanner_image;
    public $homeBanner_publish_date;
    public $homeBanner_description;
    public $homeBanner_is_active;
    public $homeBanner_created;
    public $homeBanner_datetime;
   
    public $homeBanner_search;

    public $connection; 
    public $lastInsertedId;
    public $tblHomeBanner;
    


    public function __construct($db) {
        $this->connection = $db;
        $this->tblHomeBanner = "homeBanner";
    }

    public function create() {
        try {
            $sql = "insert into {$this->tblHomeBanner} ";
            $sql .= "(homeBanner_title, ";
            $sql .= "homeBanner_category, "; 
            $sql .= "homeBanner_image, "; 
            $sql .= "homeBanner_publish_date, "; 
            $sql .= "homeBanner_description, "; 
            $sql .= "homeBanner_is_active, "; 
            $sql .= "homeBanner_created, "; 
            $sql .= "homeBanner_datetime ) values ( "; 
            $sql .= ":homeBanner_title, "; 
            $sql .= ":homeBanner_category, "; 
            $sql .= ":homeBanner_image, "; 
            $sql .= ":homeBanner_publish_date, "; 
            $sql .= ":homeBanner_description, "; 
            $sql .= ":homeBanner_is_active, "; 
            $sql .= ":homeBanner_created, "; 
            $sql .= ":homeBanner_datetime )"; 
            $query = $this->connection->prepare($sql);
            $query->execute([
                "homeBanner_title"=> $this->homeBanner_title,
                "homeBanner_category"=> $this->homeBanner_category,
                "homeBanner_image"=> $this->homeBanner_image,
                "homeBanner_publish_date"=> $this->homeBanner_publish_date,
                "homeBanner_description"=> $this->homeBanner_description,
                "homeBanner_is_active"=> $this->homeBanner_is_active,
                "homeBanner_created"=> $this->homeBanner_created,
                "homeBanner_datetime"=> $this->homeBanner_datetime,
            ]);
            $this->lastInsertedId = $this->connection->lastInsertId();
        }catch (PDOException $ex) {
            $query = false;
        }

        return $query;
    }


    public function readAll()
    {
        try {
            $sql = "select * ";
            $sql .= "from {$this->tblHomeBanner} ";
            $sql .= "order by homeBanner_is_active desc ";
            $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function delete()
    {
        try {
            $sql = "delete from {$this->tblHomeBanner} ";
            $sql .= "where homeBanner_aid = :homeBanner_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "homeBanner_aid" => $this->homeBanner_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function update()
    {
        try {
            $sql = "update {$this->tblHomeBanner} set ";
            $sql .= "homeBanner_title = :homeBanner_title, ";
            $sql .= "homeBanner_image = :homeBanner_image, ";
            $sql .= "homeBanner_publish_date = :homeBanner_publish_date, ";
            $sql .= "homeBanner_description = :homeBanner_description, ";
            $sql .= "homeBanner_category = :homeBanner_category, ";
            $sql .= "homeBanner_datetime = :homeBanner_datetime ";
            $sql .= "where homeBanner_aid  = :homeBanner_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "homeBanner_title" => $this->homeBanner_title,
                "homeBanner_image" => $this->homeBanner_image,
                "homeBanner_category" => $this->homeBanner_category,
                "homeBanner_publish_date" => $this->homeBanner_publish_date,
                "homeBanner_description" => $this->homeBanner_description,
                "homeBanner_datetime" => $this->homeBanner_datetime,
                "homeBanner_aid" => $this->homeBanner_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function active()
    {
        try {
            $sql = "update {$this->tblHomeBanner} set ";
            $sql .= "homeBanner_is_active = :homeBanner_is_active, ";
            $sql .= "homeBanner_datetime = :homeBanner_datetime ";
            $sql .= "where homeBanner_aid  = :homeBanner_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "homeBanner_is_active" => $this->homeBanner_is_active,
                "homeBanner_datetime" => $this->homeBanner_datetime,
                "homeBanner_aid" => $this->homeBanner_aid,
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
            $sql .= "from {$this->tblHomeBanner} ";
            $sql .= "where homeBanner_title like :homeBanner_title ";
            $sql .= "order by homeBanner_is_active desc, ";
            $sql .= "homeBanner_title asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "homeBanner_title" => "%{$this->homeBanner_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}