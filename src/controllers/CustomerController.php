<?php

class CustomerController extends BaseController{

    private $customerModel;
    public function __construct()
    {
        $this->customerModel = $this->model('CustomerModel');
    }
    public function index(){
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'style' => '/css/style2.css',
                'title' => 'Customer',
                'AllCustomer' => $this->customerModel->getAll()
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/customer/index', $data);
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
    public function indexL(){
        if ($_SESSION['role'] == 'librarian') {

            $data = [
                'style' => '/css/style2.css',
                'title' => 'Customer',
                'AllCustomer' => $this->customerModel->getAll()
            ];
            $this->view('librarian/template/header', $data);
            $this->view('librarian/customer/index', $data);
            $this->view('librarian/template/footer');
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
                'title' => 'Customer',
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/customer/insert');
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
    public function insertL(){
        if ($_SESSION['role'] == 'librarian') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Customer',
            ];
            $this->view('librarian/template/header', $data);
            $this->view('librarian/customer/insert');
            $this->view('librarian/template/footer');
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
                'title' => 'Customer',
                'account' => $this->customerModel->getById($id)
            ];
            $this->view('admin/template/header', $data);
            $this->view('admin/customer/edit', $data);
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

    public function editL($id){
        if ($_SESSION['role'] == 'librarian') {
            $data = [
                'style' => '/css/style3.css',
                'title' => 'Customer',
                'account' => $this->customerModel->getById($id)
            ];
            $this->view('librarian/template/header', $data);
            $this->view('librarian/customer/edit', $data);
            $this->view('librarian/template/footer');
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
            'phone' => 'int | required | min:10'
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        $cekCust = $this->customerModel->getByUsername($inputs['username']);
        if ($cekCust) {
            Message::setFlash('error', 'Failed', $inputs['username'] . ' already exists', $inputs);
            $this->redirect('admin/customerinsert');
        }

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/customerinsert');
        }

        $proc = $this->customerModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Successfully', $inputs['name'] . ' added');
            $this->redirect('admin/customer');
        }
    }

    public function insert_accountL() {
        $fields = [
            'name' => 'string | required',
            'username' => 'string | required | alphanumeric | min:5',
            'password' => 'string | required | min:8',
            'phone' => 'int | required | min:10'
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        $cekCust = $this->customerModel->getByUsername($inputs['username']);
        if ($cekCust) {
            Message::setFlash('error', 'Failed', $inputs['username'] . ' already exists', $inputs);
            $this->redirect('librarian/customerinsert');
        }

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('librarian/customerinsert');
        }

        $proc = $this->customerModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Successfully', $inputs['name'] . ' added');
            $this->redirect('librarian/customer');
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
            $proc = $this->customerModel->delete($inputs['id']);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' deleted');
                $this->redirect('admin/customer');
            }
        }

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('admin/customeredit/' . $inputs['id']);
        }

        $cekCust = $this->customerModel->getById($inputs['id']);
        if ($inputs['username'] != $cekCust['username']) {
            $cekUsername = $this->customerModel->getByUsernameId($inputs['username'], $inputs['id']);
            if ($cekUsername) {
                Message::setFlash('error', 'Failed', $inputs['username'] . ' already exists', $inputs);
                $this->redirect('admin/customeredit/' . $inputs['id']);
            }
        }

        if ($inputs['mode'] == 'update') {
            $proc = $this->customerModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' updated');
                $this->redirect('admin/customer');
            } 
        } 
    }
    
    public function edit_accountL() {
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
            $proc = $this->customerModel->delete($inputs['id']);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' deleted');
                $this->redirect('librarian/customer');
            }
        }

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('librarian/customeredit/' . $inputs['id']);
        }

        $cekCust = $this->customerModel->getById($inputs['id']);
        if ($inputs['username'] != $cekCust['username']) {
            $cekUsername = $this->customerModel->getByUsernameId($inputs['username'], $inputs['id']);
            if ($cekUsername) {
                Message::setFlash('error', 'Failed', $inputs['username'] . ' already exists', $inputs);
                $this->redirect('librarian/customeredit/' . $inputs['id']);
            }
        }

        if ($inputs['mode'] == 'update') {
            $proc = $this->customerModel->update($inputs);
            if ($proc) {
                Message::setFlash('success', 'Successfully', $inputs['name'] . ' updated');
                $this->redirect('librarian/customer');
            } 
        } 
    }
}