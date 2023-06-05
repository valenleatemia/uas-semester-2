<?php
class Login extends Controller {

    public function index(){

        $data['title'] = 'Valentina | UAS';
        $this->view('login/index', $data);

    }
    public function prosesLogin() {

        if($row = $this->model('LoginModel')->checkLogin($_POST) > 0 ) {

            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['session_login'] = 'sudah_login';
            header('location: '. base_url . '/home');

        } else {

            Flasher::setMessage('Username / Password','salah.','danger');
            header('location: '. base_url . '/login');
            exit;
            
        }
    }
}