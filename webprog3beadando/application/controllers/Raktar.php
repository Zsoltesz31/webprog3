<?php
class Raktar extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
        $this->load->model('RaktarModel');
        $this->load->model('TermekModel');
        $this->load->model('SzallitocegModel');

    }

    public function list($raktarId = NULL) 
    {     
        $this->load->helper('url'); 
        if($raktarId == NULL){
      
            $view_params = [
                'title'     => 'Raktárok',
                'records'   => $this->RaktarModel->get_list(),
                'trecords'   => $this->TermekModel->get_list(),
                'szrecords'   => $this->SzallitocegModel->get_list()
            ];

            $this->load->view('raktar/raktarlista', $view_params);
        }
        else{
            
            if(!is_numeric($raktarId)){ 
                show_error('Nem helyes paraméterérték!');
            }
            
           
            $record = $this->RaktarModel->get_one($raktarId);
           
            if($record == NULL || empty($record)){
                show_error('Az id-vel nem létezik aktív rekord');
            }
            $errors=[];
            if($this->session->has_userdata('errors')){
                $errors=$this->session->userdata['errors'];
            }
            $view_params = [
                'title'     =>  'Kiválasztott raktár adatai',
                'record'    =>  $record,
                'errors' =>$errors

            ];
           
            $this->load->view('raktar/raktaradat', $view_params);
            
        }
    }
    public function insert($szallitocegId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            $errors=[
                ['Csak admin felhasználó használhatja ezt a funkciót']
            ];
            $this->session->set_userdata(['errors' =>$errors]);
            redirect('raktar/list');
        }
    
        $this->load->helper('url');
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('raktar_termek','Tárólható termék','required');
        $this->form_validation->set_rules('raktar_szallitoceg','Raktár szállítócég','required');
        if($this->form_validation->run() == TRUE){
            $nev = $this->input->post('raktar_nev');
            $orszag = $this->input->post('raktar_orszag');
            $termek = !empty($this->input->post('raktar_termek')) ? $this->input->post('raktar_termek') : NULL;
            $szallitoceg = !empty($this->input->post('raktar_szallitoceg')) ? $this->input->post('raktar_szallitoceg') : NULL;
            
            $id = $this->RaktarModel->insert($nev, $orszag, $termek, $szallitoceg);
            if($id){
                $this->load->helper('url');
                redirect(base_url('raktar/list/'.$id));
            }
            else{
                show_error('Hiba a beszúrás során!');
            }
        }
        else{
            $view_params = [
                'trecords'   => $this->TermekModel->get_list(),
                'szrecords'   => $this->SzallitocegModel->get_list()
            ];
            $this->load->helper('form');
            $this->load->view('raktar/raktarhozzaadas',$view_params);
        }
    }
    public function update($raktarId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('raktar/list');
        }
        $this->load->helper('url');
        if($raktarId == NULL){
            redirect(base_url('raktar/list'));
        }
        
        if(!is_numeric($raktarId)){
            redirect(base_url('raktar/list'));
        }
        
        $record = $this->RaktarModel->get_one($raktarId);
        if($record == NULL || empty($record)){
            redirect(base_url('raktar/list'));
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('raktar_termek','Tárólható termék','required');
        $this->form_validation->set_rules('raktar_szallitoceg','Raktár szállítócég','required');
        
        if($this->form_validation->run() == TRUE){
            $nev = $this->input->post('raktar_nev');
            $orszag = $this->input->post('raktar_orszag');
            $termek = !empty($this->input->post('raktar_termek')) ? $this->input->post('raktar_termek') : NULL;
            $szallitoceg = !empty($this->input->post('raktar_szallitoceg')) ? $this->input->post('raktar_szallitoceg') : NULL;
            
            if($this->RaktarModel->update($raktarId, $nev, $orszag, $termek,$szallitoceg)){
                redirect(base_url('raktar/list'));
            }
            else{
                show_error('Sikertelen frissítés!');
            }
        }
        else{
            $view_params = [
                'record'    =>  $record,
                'trecords'   => $this->TermekModel->get_list(),
                'szrecords'   => $this->SzallitocegModel->get_list()
            ];

            $this->load->helper('form');
            $this->load->view('raktar/raktarmodositas', $view_params);
        }
    }
    public function delete($raktarId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('raktar/list');
        }
        $this->load->helper('url');
        if($raktarId == NULL){
            redirect(base_url('raktar/list'));
        }
        
        if(!is_numeric($raktarId)){
            redirect(base_url('raktar/list'));
        }
        
        $record = $this->RaktarModel->get_one($raktarId);
        if($record == NULL || empty($record)){
            redirect(base_url('raktar/list'));
        }
        
        if($this->RaktarModel->delete($raktarId)){
            redirect(base_url('raktar/list'));
        }
        else{
            show_error('A törlés sikertelen!');
        }
    }
}
?>