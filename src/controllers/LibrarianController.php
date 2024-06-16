<?php

class LibrarianController extends BaseController{

    private $librarianModel;
    public function __construct()
    {
        $this->librarianModel = $this->model('LibrarianModel');
    }
    public function index(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Librarian',
                'AllLibrarian' => $this->librarianModel->getAll()
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/librarian/index', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/dashboard/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }

    public function insert(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Librarian',
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/librarian/insert', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/dashboard/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }

    public function edit($id){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Librarian',
                'account' => $this->librarianModel->getById($id)
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/librarian/edit', $data);
            $this->view('admin/template/footer');
        } else {
            Message::setFlash('error', 'Sorry', 'You are ' . $_SESSION['role'] . ' not have an access');
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Dashboard'
            ];
            $this->view($_SESSION['role'] . '/template/header', $data);
            $this->view($_SESSION['role'] . '/dashboard/index', $data);
            $this->view($_SESSION['role'] . '/template/footer');
        }
    }

    public function insert_account() {
        $fields = [
            'name' => 'string | required',
            'username' => 'string | required | alphanumeric | min:5',
            'password' => 'string | required | min:8',
            'phone' => 'int | required | min:10 '
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        $cekLibrarian = $this->librarianModel->getByUsername($inputs['username']);
        if ($cekLibrarian) {
            Message::setFlash('error', 'Failed', $inputs['username'] . ' already exists', $inputs);
            $this->redirect('admin/librarianinsert');
        }

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/librarianinsert');
        }

        $proc = $this->librarianModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Successfully', $inputs['name'] . ' added');
            $this->redirect('admin/librarian');
        }
    }

    public function edit_account() {
        $fields = [
            'name' => 'string | required',
            'username' => 'string | required | alphanumeric | min:5',
            'password' => 'string | required | min:8',
            'phone' => 'int | required | min:10',
            'mode' => 'string',
            'id' => 'int'
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($inputs['mode'] == 'delete') {
            $proc = $this->librarianModel->delete($inputs['id']);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' deleted');
                $this->redirect('admin/librarian');
            }
        }

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/librarianedit/' . $inputs['id']);
        }

        $cekLibrarian = $this->librarianModel->getById($inputs['id']);

        if ($inputs['username'] != $cekLibrarian['username']) {
            $cekUsername = $this->librarianModel->getByUsernameId($inputs['username'], $inputs['id']);
            if ($cekUsername) {
                Message::setFlash('error', 'Failed', $inputs['username'] . ' already exists', $inputs);
                $this->redirect('admin/librarianedit/' . $inputs['id']);
            }
        }

        if ($inputs['mode'] == 'update') {
            $proc = $this->librarianModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' updated');
                $this->redirect('admin/librarian');
            } 
        } 
    }
}