<?php

class AuthController extends BaseController{
    private $authModel;
    public function __construct()
    {
        $this->authModel = $this->model('AuthModel');
    }

    public function index() {
        $data = [
            'style' => '/css/style.css',
            'title' => 'E-Library'
        ];
        $this->view('sign/template/header', $data);
        $this->view('sign/landingpage/index', $data);
        $this->view('sign/template/footer');
    }

    public function log() {
        $data = [
            'style' => '/css/style.css',
            'title' => 'Login'
        ];
        $this->view('sign/template/header', $data);
        $this->view('sign/signin/index', $data);
        $this->view('sign/template/footer');
    }

    public function reg() {
        $data = [
            'style' => '/css/style.css',
            'title' => 'Register'
        ];
        $this->view('sign/template/header', $data);
        $this->view('sign/signup/index', $data);
        $this->view('sign/template/footer');
    }

    public function register() {
        $fields = [
            'name' => 'string | required',
            'username' => 'string | required | alphanumeric',
            'password' => 'string | required',
            'phone' => 'int | required '
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('signup');
        }

        $cekUsername = $this->authModel->getByUsername($inputs['username']);
        if ($cekUsername) {
            Message::setFlash('error', 'Failed', $inputs['username'] . ' already exists', $inputs);
            $this->redirect('signup');
        }

        $proc = $this->authModel->insert($inputs);
        if ($proc) {
            Message::setFlash('success', 'Successfully', $inputs['name'] . ' registered succesfully');
            $this->redirect('signin');
        }
    }

    public function saveLogin(){
        $fields = [
            'username' => 'string | required | alphanumeric',
            'password' => 'string | required'
        ];

        $message = [];
        [$inputs, $errors] = $this->filter($_POST, $fields, $message);

        if ($errors) {
            Message::setFlash('error', 'Failed', $errors[0], $inputs);
            $this->redirect('signin');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->authModel->getAll($username);
            
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    Message::setFlash('success', 'Welcome, ' . $_SESSION['name'], 'You are ' . $user['role'] );

                    setcookie('role', $user['role'], time() + 86400, '/');

                    switch ($user['role']) {
                        case 'admin':
                            $this->redirect('admin/dashboard');
                            break;
                        case 'librarian':
                            $this->redirect('librarian/dashboard');
                            break;
                        case 'customer':
                            $this->redirect('customer/dashboard');
                            break;
                        default:
                            $this->redirect('signin');
                    }
                } else {
                    Message::setFlash('error', 'Failed', 'Username or password wrong');
                    $this->redirect('signin');
                }
            } else {
                Message::setFlash('error', 'Failed', 'Username or password wrong');
                $this->redirect('signin');
            }
        }
    }
    public function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        // session_unset();
        // session_destroy();
        setcookie('role', '', time() - 3600, '/');
        $this->redirect('signin');
    }
}
?>
