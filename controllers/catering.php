<?php
class catering extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Pesanan Catering';
        $data['catering']=$this->model('CateringModel')->getAllCatering();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('catering/index', $data);
        $this->view('templates/footer');
    }




    public function tambahCatering(){
        $data['title'] = 'Tambah Data Pesanan Catering';
        $data['menu']=$this->model('MenuModel')->getAllMenu();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('catering/create', $data);
        $this->view('templates/footer');
    }
    public function simpanCatering(){
        if( $this->model('CateringModel')->tambahCatering($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/catering');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/catering');
            exit;
        }
    }  



    
    public function editCatering($id){
        $data['title'] = 'Detail Pesanan Catering';
        $data['menu']=$this->model('MenuModel')->getAllMenu();
        $data['catering'] = $this->model('CateringModel')->getCateringById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('catering/edit', $data);
        $this->view('templates/footer');
    }
    public function updateCatering(){
        if( $this->model('CateringModel')->updateDataCatering($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/catering');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/catering');
            exit;
        }
    }  


    

    public function cariCatering(){
        $data['title'] = 'Data Pesanan Catering';
        $data['catering'] = $this->model('CateringModel')->cariCatering();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('catering/index', $data);
        $this->view('templates/footer');
    }
    public function hapusCatering($id){
        if( $this->model('CateringModel')->deleteCatering($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/catering');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/catering');
            exit;
        }
    }  



}
