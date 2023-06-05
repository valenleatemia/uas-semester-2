<?php
class menu extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Menu Catering';
        $data['menu']=$this->model('MenuModel')->getAllMenu();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('menu/index', $data);
        $this->view('templates/footer');
    }




    public function tambahMenu(){
        $data['title'] = 'Tambah Data Menu Catering';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('menu/create', $data);
        $this->view('templates/footer');
    }
    public function simpanMenu(){
        if( $this->model('MenuModel')->tambahMenu($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/menu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/menu');
            exit;
        }
    }  



    
    public function editMenu($id){
        $data['title'] = 'Detail Menu Catering';
        $data['menu'] = $this->model('MenuModel')->getMenuById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('menu/edit', $data);
        $this->view('templates/footer');
    }
    public function updateMenu(){
        if( $this->model('MenuModel')->updateDataMenu($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/menu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/menu');
            exit;
        }
    }  


    

    public function cariMenu(){
        $data['title'] = 'Data Menu Catering';
        $data['menu'] = $this->model('MenuModel')->cariMenu();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('menu/index', $data);
        $this->view('templates/footer');
    }
    public function hapusMenu($id){
        if( $this->model('MenuModel')->deleteMenu($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/menu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/menu');
            exit;
        }
    }  



}
