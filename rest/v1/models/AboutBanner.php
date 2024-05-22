<?php

Class AboutBanner {
    public $aboutBanner_aid;
    public $aboutBanner_title;
    public $aboutBanner_category;
    public $aboutBanner_image;
    public $aboutBanner_publish_date;
    public $aboutBanner_description;
    public $aboutBanner_is_active;
    public $aboutBanner_created;
    public $aboutBanner_datetime;
   
    public $aboutBanner_search;

    public $connection; 
    public $lastInsertedId;
    public $tblAboutBanner;
    


    public function __construct($db) {
        $this->connection = $db;
        $this->tblAboutBanner = "aboutBanner";
    }

    public function create() {
        try {
            $sql = "insert into {$this->tblAboutBanner} ";
            $sql .= "(aboutBanner_title, ";
            $sql .= "aboutBanner_category, "; 
            $sql .= "aboutBanner_image, "; 
            $sql .= "aboutBanner_publish_date, "; 
            $sql .= "aboutBanner_description, "; 
            $sql .= "aboutBanner_is_active, "; 
            $sql .= "aboutBanner_created, "; 
            $sql .= "aboutBanner_datetime ) values ( "; 
            $sql .= ":aboutBanner_title, "; 
            $sql .= ":aboutBanner_category, "; 
            $sql .= ":aboutBanner_image, "; 
            $sql .= ":aboutBanner_publish_date, "; 
            $sql .= ":aboutBanner_description, "; 
            $sql .= ":aboutBanner_is_active, "; 
            $sql .= ":aboutBanner_created, "; 
            $sql .= ":aboutBanner_datetime )"; 
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutBanner_title"=> $this->aboutBanner_title,
                "aboutBanner_category"=> $this->aboutBanner_category,
                "aboutBanner_image"=> $this->aboutBanner_image,
                "aboutBanner_publish_date"=> $this->aboutBanner_publish_date,
                "aboutBanner_description"=> $this->aboutBanner_description,
                "aboutBanner_is_active"=> $this->aboutBanner_is_active,
                "aboutBanner_created"=> $this->aboutBanner_created,
                "aboutBanner_datetime"=> $this->aboutBanner_datetime,
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
            $sql .= "from {$this->tblAboutBanner} ";
            $sql .= "order by aboutBanner_is_active desc ";
            $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function delete()
    {
        try {
            $sql = "delete from {$this->tblAboutBanner} ";
            $sql .= "where aboutBanner_aid = :aboutBanner_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutBanner_aid" => $this->aboutBanner_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function update()
    {
        try {
            $sql = "update {$this->tblAboutBanner} set ";
            $sql .= "aboutBanner_title = :aboutBanner_title, ";
            $sql .= "aboutBanner_image = :aboutBanner_image, ";
            $sql .= "aboutBanner_publish_date = :aboutBanner_publish_date, ";
            $sql .= "aboutBanner_description = :aboutBanner_description, ";
            $sql .= "aboutBanner_category = :aboutBanner_category, ";
            $sql .= "aboutBanner_datetime = :aboutBanner_datetime ";
            $sql .= "where aboutBanner_aid  = :aboutBanner_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutBanner_title" => $this->aboutBanner_title,
                "aboutBanner_image" => $this->aboutBanner_image,
                "aboutBanner_category" => $this->aboutBanner_category,
                "aboutBanner_publish_date" => $this->aboutBanner_publish_date,
                "aboutBanner_description" => $this->aboutBanner_description,
                "aboutBanner_datetime" => $this->aboutBanner_datetime,
                "aboutBanner_aid" => $this->aboutBanner_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function active()
    {
        try {
            $sql = "update {$this->tblAboutBanner} set ";
            $sql .= "aboutBanner_is_active = :aboutBanner_is_active, ";
            $sql .= "aboutBanner_datetime = :aboutBanner_datetime ";
            $sql .= "where aboutBanner_aid  = :aboutBanner_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutBanner_is_active" => $this->aboutBanner_is_active,
                "aboutBanner_datetime" => $this->aboutBanner_datetime,
                "aboutBanner_aid" => $this->aboutBanner_aid,
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
            $sql .= "from {$this->tblAboutBanner} ";
            $sql .= "where aboutBanner_title like :aboutBanner_title ";
            $sql .= "order by aboutBanner_is_active desc, ";
            $sql .= "aboutBanner_title asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutBanner_title" => "%{$this->aboutBanner_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}