<?php

Class Message {
    public $message_aid;
    public $message_name;
    public $message_email;
    public $message_subject;
    public $message_publish_date;
    public $message_note;
    public $message_is_active;
    public $message_created;
    public $message_datetime;
   
    public $message_search;

    public $connection; 
    public $lastInsertedId;
    public $tblMessage;
    


    public function __construct($db) {
        $this->connection = $db;
        $this->tblMessage = "message";
    }

    public function create() {
        try {
            $sql = "insert into {$this->tblMessage} ";
            $sql .= "(message_name, ";
            $sql .= "message_email, "; 
            $sql .= "message_subject, "; 
            $sql .= "message_publish_date, "; 
            $sql .= "message_note, "; 
            $sql .= "message_is_active, "; 
            $sql .= "message_created, "; 
            $sql .= "message_datetime ) values ( "; 
            $sql .= ":message_name, "; 
            $sql .= ":message_email, "; 
            $sql .= ":message_subject, "; 
            $sql .= ":message_publish_date, "; 
            $sql .= ":message_note, "; 
            $sql .= ":message_is_active, "; 
            $sql .= ":message_created, "; 
            $sql .= ":message_datetime )"; 
            $query = $this->connection->prepare($sql);
            $query->execute([
                "message_name"=> $this->message_name,
                "message_email"=> $this->message_email,
                "message_subject"=> $this->message_subject,
                "message_publish_date"=> $this->message_publish_date,
                "message_note"=> $this->message_note,
                "message_is_active"=> $this->message_is_active,
                "message_created"=> $this->message_created,
                "message_datetime"=> $this->message_datetime,
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
            $sql .= "from {$this->tblMessage} ";
            $sql .= "order by message_is_active desc ";
            $query = $this->connection->query($sql);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function delete()
    {
        try {
            $sql = "delete from {$this->tblMessage} ";
            $sql .= "where message_aid = :message_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "message_aid" => $this->message_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function update()
    {
        try {
            $sql = "update {$this->tblMessage} set ";
            $sql .= "message_name = :message_name, ";
            $sql .= "message_email = :message_email, ";
            $sql .= "message_publish_date = :message_publish_date, ";
            $sql .= "message_subject = :message_subject, ";
            $sql .= "message_note = :message_note, ";
            $sql .= "message_datetime = :message_datetime ";
            $sql .= "where message_aid  = :message_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "message_name" => $this->message_name,
                "message_email" => $this->message_email,
                "message_note" => $this->message_note,
                "message_publish_date" => $this->message_publish_date,
                "message_subject" => $this->message_subject,
                "message_datetime" => $this->message_datetime,
                "message_aid" => $this->message_aid,
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }


    public function active()
    {
        try {
            $sql = "update {$this->tblMessage} set ";
            $sql .= "message_is_active = :message_is_active, ";
            $sql .= "message_datetime = :message_datetime ";
            $sql .= "where message_aid  = :message_aid ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "message_is_active" => $this->message_is_active,
                "message_datetime" => $this->message_datetime,
                "message_aid" => $this->message_aid,
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
            $sql .= "from {$this->tblMessage} ";
            $sql .= "where message_title like :message_title ";
            $sql .= "order by message_is_active desc, ";
            $sql .= "message_title asc ";
            $query = $this->connection->prepare($sql);
            $query->execute([
                "message_title" => "%{$this->message_search}%",
            ]);
        } catch (PDOException $ex) {
            $query = false;
        }
        return $query;
    }
}