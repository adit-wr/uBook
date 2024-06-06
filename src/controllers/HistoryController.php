<?php

class HistoryController extends BaseController {
    private $historyModel;
    public function __construct()
    {
        $this->historyModel = $this->model('HistoryModel');
    }

    public function index() {
        $data = [
            'style' => '/css/style2.css',
            'title' => 'History',
            'AllHistory' => $this->historyModel->getAll()
        ];
        if ($_SESSION['role'] == 'admin') {
            $this->view('admin/template/header', $data);
            $this->view('admin/history/index', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/history/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }

    public function indexL() {
        $data = [
            'style' => '/css/style2.css',
            'title' => 'History',
            'AllHistory' => $this->historyModel->getAll()
        ];
        if ($_SESSION['role'] == 'librarian') {
            $this->view('librarian/template/header', $data);
            $this->view('librarian/history/index', $data);
            $this->view('librarian/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/history/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }

    public function indexC() {
        if ($_SESSION['role'] == 'customer') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'History',
                'History' => $this->historyModel->getById($_SESSION['username'])
            ];
            $this->view('customer/template/header', $data);
            $this->view('customer/history/index', $data);
            $this->view('customer/template/footer');
        } else {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'History',
                'AllHistory' => $this->historyModel->getAll()
            ];
            Message::setFlash('error', 'Sorry', 'You not have an access');
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/history/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }
}