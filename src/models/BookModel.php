<?php

class BookModel extends Database{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $query = "SELECT * FROM book";
        return $this->qry($query)->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT * FROM book WHERE id_book = ?";
        return $this->qry($query, [$id])->fetch();
    }

    public function getByNamePublisher($name, $publisher) {
        $query = "SELECT * FROM book WHERE name = ? AND publisher = ?";
        return $this->qry($query, [$name, $publisher])->fetch();
    }

    public function getByNamePublisherId($name, $publisher, $id) {
        $query = "SELECT * FROM book WHERE name = ? AND publisher = ? AND id_book != ?";
        return $this->qry($query, [$name, $publisher, $id])->fetch();
    }

    public function getImageId($id) {
        $query = "SELECT image FROM book WHERE id_book = ?";
        return $this->qry($query, [$id])->fetchColumn();
    }

    public function insert($name, $publisher, $stock, $price, $image) {
        $query = "INSERT INTO book
        (name, publisher, stock, price, image)
        VALUES (?, ?, ?, ?, ?)";
        return $this->qry($query, [
            $name,
            $publisher,
            $stock,
            $price,
            $image
        ]);
    }
    public function update($name, $publisher, $stock, $price, $image, $id) {
        $query = "UPDATE book SET name = ?, publisher = ?, stock = ?, price = ?, image = ? WHERE id_book = ?";
        return $this->qry($query, [
            $name,
            $publisher,
            $stock,
            $price,
            $image,
            $id
        ]);
    }

    public function getStock($id) {
        $query = "SELECT stock FROM book WHERE id_book = ?";
        return $this->qry($query, [$id])->fetchColumn();
    }
    public function getStockName($book) {
        $query = "SELECT stock FROM book WHERE name = ?";
        return $this->qry($query, [$book])->fetchColumn();
    }

    public function delete($id) {
        $query = "DELETE FROM book WHERE id_book = ?";
        return $this->qry($query, [$id]);
    }

    public function updateStock($stock, $book) {
        $query = "UPDATE book SET stock = stock - ? WHERE name = ?";
        return $this->qry($query, [$stock, $book]);
    }

    public function addStock($stock, $id) {
        $query = "UPDATE book SET stock = stock + ? WHERE id_book = ?";
        return $this->qry($query, [$stock, $id]);
    }
}