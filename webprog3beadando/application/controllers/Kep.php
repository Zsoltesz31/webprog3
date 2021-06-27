<?php
class Kep extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
        $this->load->model('Kepekmodel');

    }
    public function index() {
        $this->load->view('kephozzaadas');
    }
    public function store() {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('kephozzaadas', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('kephozzaadas', $data);
        }
    }
}
?>