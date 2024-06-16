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
        (username, book, quantity, price, totalprice, image, status, inserted_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
        return $this->qry($query, [
            $data['username'],
            $data['name'],
            $data['newstock'],
            $data['price'],
            $data['newstock'] * $data['price'],
            $data['image'],
            $data['status']
        ]);
    }

    public function success($id) {
        $query = "UPDATE history SET status = 'done' WHERE id_history = '$id'";
        return $this->qry($query);
    }

    public function failed($id) {
        $query = "UPDATE history SET status = 'expired' WHERE id_history = '$id'";
        return $this->qry($query);
    }
}