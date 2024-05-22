<?php

Class Aboutme {
    public $aboutme_aid;
    public $aboutme_description;
    public $aboutme_startYear;
    public $aboutme_endYear;
    public $aboutme_course;
    public $aboutme_school;
    public $aboutme_is_active;
    public $aboutme_created;
    public $aboutme_datetime;
   
   
    public $aboutme_search;

    public $connection; 
    public $lastInsertedId;
    public $tblAboutme;
    


    public function __construct($db) {
        $this->connection = $db;
        $this->tblAboutme = "aboutme";
    }

    public function create() {
        try {
            $sql = "insert into {$this->tblAboutme} ";
            $sql .= "(aboutme_description, ";
            $sql .= "aboutme_startYear, "; 
            $sql .= "aboutme_endYear, "; 
            $sql .= "aboutme_course, "; 
            $sql .= "aboutme_school ,";
            $sql .= "aboutme_is_active, "; 
            $sql .= "aboutme_created, "; 
            $sql .= "aboutme_datetime ) values ( "; 
            $sql .= ":aboutme_description, "; 
            $sql .= ":aboutme_startYear, "; 
            $sql .= ":aboutme_endYear, "; 
            $sql .= ":aboutme_course, "; 
            $sql .= ":aboutme_school ,";
            $sql .= ":aboutme_is_active, "; 
            $sql .= ":aboutme_created, "; 
            $sql .= ":aboutme_datetime ) "; 
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutme_description"=> $this->aboutme_description,
                "aboutme_startYear"=> $this->aboutme_startYear,
                "aboutme_endYear"=> $this->aboutme_endYear,
                "aboutme_course"=> $this->aboutme_course,
                "aboutme_school"=> $this->aboutme_school,
                "aboutme_is_active"=> $this->aboutme_is_active,
                "aboutme_created"=> $this->aboutme_created,
                "aboutme_datetime"=> $this->aboutme_datetime,
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
            $sql .= "from {$this->tblAboutme} ";
            $sql .= "order by aboutme_aid desc ";
            $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function delete()
    {
        try {
            $sql = "delete from {$this->tblAboutme} ";
            $sql .= "where aboutme_aid = :aboutme_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutme_aid" => $this->aboutme_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function update()
    {
        try {
            $sql = "update {$this->tblAboutme} set ";
            $sql .= "aboutme_description = :aboutme_description, ";
            $sql .= "aboutme_startYear = :aboutme_startYear, ";
            $sql .= "aboutme_endYear = :aboutme_endYear, ";
            $sql .= "aboutme_course = :aboutme_course, ";
            $sql .= "aboutme_school = :aboutme_school, ";
            $sql .= "aboutme_datetime = :aboutme_datetime ";
            $sql .= "where aboutme_aid  = :aboutme_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutme_description" => $this->aboutme_description,
                "aboutme_startYear" => $this->aboutme_startYear,
                "aboutme_endYear" => $this->aboutme_endYear,
                "aboutme_course" => $this->aboutme_course,
                "aboutme_school" => $this->aboutme_school,
                "aboutme_datetime" => $this->aboutme_datetime,
                "aboutme_aid" => $this->aboutme_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function active()
    {
        try {
            $sql = "update {$this->tblAboutme} set ";
            $sql .= "Aboutme_is_active = :aboutme_is_active, ";
            $sql .= "aboutme_datetime = :aboutme_datetime ";
            $sql .= "where aboutme_aid  = :aboutme_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutme_is_active" => $this->aboutme_is_active,
                "aboutme_datetime" => $this->aboutme_datetime,
                "aboutme_aid" => $this->aboutme_aid,
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
            $sql .= "from {$this->tblAboutme} ";
            $sql .= "where aboutme_title like :aboutme_title ";
            $sql .= "order by aboutme_is_active desc, ";
            $sql .= "aboutme_title asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "aboutme_title" => "%{$this->aboutme_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}