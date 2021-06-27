<?php
class Regio extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
        $this->load->model('Regiomodel');
    }
    public function list() 
    {     
        $this->load->helper('url'); 
       
      
            $view_params = [
                'title'     => 'Régiók',
                'records'   => $this->Regiomodel->get_list(),
            ];

            $this->load->view('regiok/regioklist', $view_params);
        
    }
    public function insert()
    { 
        if(!$this->ion_auth->is_admin())
        {
            $errors=[
                ['Csak admin felhasználó használhatja ezt a funkciót']
            ];
            $this->session->set_userdata(['errors' =>$errors]);
            redirect('regio/list');
        }
    
        $this->load->helper('url');
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('regio_nev','Régió név','required');
        if($this->form_validation->run() == TRUE){
            $rnev = $this->input->post('regio_nev');
            $rorszag = $this->input->post('regio_orszag');
            $id = $this->Regiomodel->insert($rnev, $rorszag );
            if($id){
                $this->load->helper('url');
                redirect(base_url('regio/list'));
            }
            else{
                show_error('Hiba a beszúrás során!');
            }
        }
        else{
            $this->load->helper('form');
            $this->load->view('regiok/regiokhozzaadas');
        }
    }
    public function delete($regioId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('regio/list');
        }
        $this->load->helper('url');
        if($regioId == NULL){
            redirect(base_url('regio/list'));
        }
        
        if(!is_numeric($regioId)){
            redirect(base_url('regio/list'));
        }
        
        $record = $this->Regiomodel->get_one($regioId);
        if($record == NULL || empty($record)){
            redirect(base_url('regio/list'));
        }
        
        if($this->Regiomodel->delete($regioId)){
            redirect(base_url('regio/list'));
        }
        else{
            show_error('A törlés sikertelen!');
        }
    }   
}
?>