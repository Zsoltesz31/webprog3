<?php
class Munkasok extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
        $this->load->model('Munkasmodel');
        $this->load->model('SzallitocegModel');

    }
    public function list() 
    {     
        $this->load->helper('url'); 
       
      
            $view_params = [
                'title'     => 'Raktárok',
                'records'   => $this->Munkasmodel->get_list(),
                'szrecords'   => $this->SzallitocegModel->get_list()
            ];

            $this->load->view('munkasok/munkasoklist', $view_params);
        
    }
    public function insert($munkasId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            $errors=[
                ['Csak admin felhasználó használhatja ezt a funkciót']
            ];
            $this->session->set_userdata(['errors' =>$errors]);
            redirect('munkasok/list');
        }
    
        $this->load->helper('url');
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('munkas_munkahely','Szállítócég','required');
        if($this->form_validation->run() == TRUE){
            $vezeteknevnev = $this->input->post('munkas_vnev');
            $keresztnev = $this->input->post('munkas_knev');
            $szallitoceg_id = !empty($this->input->post('munkas_munkahely')) ? $this->input->post('munkas_munkahely') : NULL;
            
            $id = $this->Munkasmodel->insert($vezeteknevnev, $keresztnev, $szallitoceg_id);
            if($id){
                $this->load->helper('url');
                redirect(base_url('munkasok/list'));
            }
            else{
                show_error('Hiba a beszúrás során!');
            }
        }
        else{
            $view_params = [
             
                'szrecords'   => $this->SzallitocegModel->get_list()
            ];
            $this->load->helper('form');
            $this->load->view('munkasok/munkasokhozzaadas',$view_params);
        }
    }
}
?>