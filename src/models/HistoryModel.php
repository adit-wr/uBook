<?php

class HistoryModel extends Database {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $query = "SELECT * FROM history";
        return $this->qry($query)->fetchAll();
    }

    public function getById($username) {
        $query = "SELECT * FROM history WHERE username = '$username'";
        return $this->qry($query)->fetchAll();
    }

    public function addToHistory($data) {
        $query = "INSERT INTO history 
        (username, book, quantity, price, image, inserted_at) 
        VALUES (?, ?, ?, ?, ?, NOW())";
        return $this->qry($query, [
            $data
        ]);
    }
}