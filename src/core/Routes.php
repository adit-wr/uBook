<?php

class Routes {
    public function run(){
        $router = new App();
        $router->setDefaultController('AuthController');
        $router->setDefaultMethod('index');

        // sign
        $router->get('/landingpage', ['AuthController','index']);
        $router->get('/signin', ['AuthController','log']);
        $router->get('/signup', ['AuthController','reg']);
        $router->get('/signinproccess', ['AuthController','saveLogin']);
        $router->get('/logout', ['AuthController','logout']);
        $router->post('/signinproccess', ['AuthController','saveLogin']);
        $router->post('/signupproccess', ['AuthController','register']);

        // page actor admin
        $router->get('/admin', ['DashboardController','index']);
        $router->get('/admin/dashboard', ['DashboardController','index']);
        $router->get('/admin/book', ['BookController', 'index']);
        $router->get('/admin/bookinsert', ['BookController', 'insert']);
        $router->get('/admin/bookedit', ['BookController', 'edit']);
        $router->get('/admin/customer', ['CustomerController', 'index']);
        $router->get('/admin/customerinsert', ['CustomerController', 'insert']);
        $router->get('/admin/customeredit', ['CustomerController', 'edit']);
        $router->get('/admin/librarian', ['LibrarianController','index']);
        $router->get('/admin/librarianinsert', ['LibrarianController','insert']);
        $router->get('/admin/librarianedit', ['LibrarianController','edit']);
        $router->get('/admin/history', ['HistoryController','index']);
        $router->post('/admin/librarianinsertproccess', ['LibrarianController','insert_account']);
        $router->post('/admin/librarianeditproccess', ['LibrarianController','edit_account']);
        $router->post('/admin/customerinsertproccess', ['CustomerController','insert_account']);
        $router->post('/admin/customereditproccess', ['CustomerController','edit_account']);
        $router->post('/admin/bookinsertproccess', ['BookController','insert_book']);
        $router->post('/admin/bookeditproccess', ['BookController','edit_book']);
        
        // page actor librarian
        $router->get('/librarian', ['DashboardController','indexL']);
        $router->get('/librarian/dashboard', ['DashboardController','indexL']);
        $router->get('/librarian/book', ['BookController', 'indexL']);
        $router->get('/librarian/bookinsert', ['BookController', 'insertL']);
        $router->get('/librarian/bookedit', ['BookController', 'editL']);
        $router->get('/librarian/customer', ['CustomerController', 'indexL']);
        $router->get('/librarian/customerinsert', ['CustomerController', 'insertL']);
        $router->get('/librarian/customeredit', ['CustomerController', 'editL']);
        $router->get('/librarian/history', ['HistoryController','indexl']);
        $router->post('/librarian/customerinsertproccess', ['CustomerController','insert_accountL']);
        $router->post('/librarian/customereditproccess', ['CustomerController','edit_accountL']);
        $router->post('/librarian/bookinsertproccess', ['BookController','insert_bookL']);
        $router->post('/librarian/bookeditproccess', ['BookController','edit_bookL']);
        
        // page actor customer
        $router->get('/customer', ['DashboardController', 'indexC']);
        $router->get('/customer/dashboard', ['DashboardController', 'indexC']);
        $router->get('/customer/book', ['BookController', 'indexC']);
        $router->get('/customer/history', ['HistoryController','indexC']);
        $router->get('/customer/buybook', ['BookController', 'buybook']);
        $router->post('/customer/buybookproccess', ['BookController', 'buybookproccess']);

        $router->run();
    }
}