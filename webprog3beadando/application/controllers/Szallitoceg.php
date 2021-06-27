<?php
class Szallitoceg extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->ion_auth->logged_in()){
            redirect(base_url());
        }
        $this->load->model('SzallitocegModel');
        $this->load->model('TermekModel');
    }
    public function list($szallitocegId = NULL){
        $this->load->helper('url');
        if($szallitocegId == NULL){
        $view_params=[
            'title' => 'Szállítócégek',
            'records' => $this->SzallitocegModel->get_list()
        ];
        $this->load->view('szallitoceg/szallitoceglista',$view_params);
    }
    else{
        if(!is_numeric($szallitocegId)){ 
            show_error('Nem helyes paraméterérték!');
        }
        
       
        $record = $this->SzallitocegModel->get_one($szallitocegId);
       
        if($record == NULL || empty($record)){
            show_error('Az id-vel nem létezik aktív rekord');
        }
        
        $view_params = [
            'title'     =>  'Kiválasztott szállítócég adatai',
            'record'    =>  $record
        ];
       
        $this->load->view('szallitoceg/szallitocegadat', $view_params);
    }
    }
    public function delete($szallitocegId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('szalltioceg/list');
        }
        $this->load->helper('url');
        if($szallitocegId == NULL){
            redirect(base_url('szallitoceg/list'));
        }
        
        if(!is_numeric($szallitocegId)){
            redirect(base_url('szallitoceg/list'));
        }
        
        $record = $this->SzallitocegModel->get_one($szallitocegId);
        if($record == NULL || empty($record)){
            redirect(base_url('szallitoceg/list'));
        }
        
        if($this->SzallitocegModel->delete($szallitocegId)){
            redirect(base_url('szallitoceg/list'));
        }
        else{
            show_error('A törlés sikertelen!');
        }
    }   
    public function update($szallitocegId = NULL)
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('szalltioceg/list');
        }
        $this->load->helper('url');
        if($szallitocegId == NULL){
            redirect(base_url('szallitoceg/list'));
        }
        
        if(!is_numeric($szallitocegId)){
            redirect(base_url('szallitoceg/list'));
        }
        
        $record = $this->SzallitocegModel->get_one($szallitocegId);
        if($record == NULL || empty($record)){
            redirect(base_url('szallitoceg/list'));
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('szallitoceg_szallithatotermek','Szállítható termék','required');
        
        if($this->form_validation->run() == TRUE){
            $nev = $this->input->post('szallitoceg_nev');
            $termek_id = !empty($this->input->post('szallitoceg_szallithatotermek')) ? $this->input->post('raktar_termek') : NULL;
            
            if($this->SzallitocegModel->update($szallitocegId,$termek_id, $nev)){
                redirect(base_url('szallitoceg/list'));
            }
            else{
                show_error('Sikertelen frissítés!');
            }
        }
        else{
            $view_params = [
                'record'    =>  $record,
                'trecords'   => $this->TermekModel->get_list(),
            ];

            $this->load->helper('form');
            $this->load->view('szallitoceg/szallitocegmodositas', $view_params);
        }
    }
    public function insert()
    { 
        if(!$this->ion_auth->is_admin())
        {
            redirect('szalltioceg/list');
        }
        $this->load->helper('url');
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('szallitoceg_szallithatotermek','Szállítható termék','required');
        if($this->form_validation->run() == TRUE){
            $nev = $this->input->post('szallitoceg_nev');
            $termek_id = !empty($this->input->post('szallitoceg_szallithatotermek')) ? $this->input->post('szallitoceg_szallithatotermek') : NULL;

            
            $id = $this->SzallitocegModel->insert($termek_id,$nev );
            if($id){
                $this->load->helper('url');
                redirect(base_url('szallitoceg/list/'.$id));
            }
            else{
                show_error('Hiba a beszúrás során!');
            }
        }
        else{
            $view_params = [
                'trecords'   => $this->TermekModel->get_list(),
            ];
            $this->load->helper('form');
            $this->load->view('szallitoceg/szallitoceghozzaadas',$view_params);
        }
    }




}
?>