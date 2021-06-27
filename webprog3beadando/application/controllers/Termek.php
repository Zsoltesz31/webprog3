<?php
class Termek extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
        $this->load->model('Termekmodel');
    }
    public function list($termekId = NULL){
        $this->load->helper('url');
        if($termekId == NULL){
        $view_params=[
            'title' => 'Termékek',
            'records' => $this->Termekmodel->get_list()
        ];

        $this->load->view('termek/termeklista',$view_params);
    }
    else{
        if(!is_numeric($termekId)){ 
            show_error('Nem helyes paraméterérték!');
        }
        
       
        $record = $this->Termekmodel->get_one($termekId);
       
        if($record == NULL || empty($record)){
            show_error('Az id-vel nem létezik aktív rekord');
        }
        
        $view_params = [
            'title'     =>  'Kiválasztott szállítócég adatai',
            'record'    =>  $record
        ];
       
        $this->load->view('termek/termekadat', $view_params);
    }
    }
    public function delete($termekId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('termek/list');
        }
        $this->load->helper('url');
        if($termekId == NULL){
            redirect(base_url('termek/list'));
        }
        
        if(!is_numeric($termekId)){
            redirect(base_url('termek/list'));
        }
        
        $record = $this->Termekmodel->get_one($termekId);
        if($record == NULL || empty($record)){
            redirect(base_url('termek/list'));
        }
        
        if($this->Termekmodel->delete($termekId)){
            redirect(base_url('termek/list'));
        }
        else{
            show_error('A törlés sikertelen!');
        }
    }   
    public function update($termekId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('termek/list');
        }
        $this->load->helper('url');
        if($termekId == NULL){
            redirect(base_url('termek/list'));
        }
        
        if(!is_numeric($termekId)){
            redirect(base_url('termek/list'));
        }
        
        $record = $this->Termekmodel->get_one($termekId);
        if($record == NULL || empty($record)){
            redirect(base_url('termek/list'));
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('termek_nev','Termék neve','required');
        
        if($this->form_validation->run() == TRUE){
            $nev = $this->input->post('termek_nev');
            $anyag = $this->input->post('termek_anyaga');
            
            if($this->Termekmodel->update($termekId,$nev, $anyag)){
                redirect(base_url('termek/list'));
            }
            else{
                show_error('Sikertelen frissítés!');
            }
        }
        else{
            $view_params = [
                'record'    =>  $record,
            ];

            $this->load->helper('form');
            $this->load->view('termek/termekmodositas', $view_params);
        }
    }
    public function insert()
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('termek/list');
        }
        $this->load->helper('url');
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('termek_nev','Termék neve','required');
        if($this->form_validation->run() == TRUE){
            $nev = $this->input->post('termek_nev');
            $anyag = $this->input->post('termek_anyaga');

            
            $id = $this->Termekmodel->insert($anyag,$nev );
            if($id){
                $this->load->helper('url');
                redirect(base_url('termek/list/'.$id));
            }
            else{
                show_error('Hiba a beszúrás során!');
            }
        }
        else{
            $this->load->helper('form');
            $this->load->view('termek/termekhozzaadas');
        }
    }
}
?>