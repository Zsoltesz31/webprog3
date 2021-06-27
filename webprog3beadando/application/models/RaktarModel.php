<?php
class RaktarModel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get_list() 
    {
        $this->db->select('r.id, r.nev, r.orszag,t.nev t_termeknev, sz.nev sz_sznev');
        $this->db->from('raktarok r');
        $this->db->join('termek t', 't.id=r.termek_id','inner');
        $this->db->join('szallitoceg sz', 'sz.id=r.szallitoceg_id','inner');
        return $this->db->get()->result();
    }
    
    public function get_one($id){
        
        $this->db->select('r.id, r.nev, r.orszag, t.nev t_termeknev, sz.nev sz_sznev');
        $this->db->from('raktarok r');
        $this->db->join('termek t', 't.id=r.termek_id','inner');
        $this->db->join('szallitoceg sz', 'sz.id=r.szallitoceg_id','inner');
        $this->db->where('r.id', $id);
        
        return $this->db->get()->row();
    }
    
    public function delete($id){

        $this->db->where('id',$id);
        return $this->db->delete('raktarok');
    }
    
    public function update($id, $nev, $orszag, $termek_id, $szallitoceg_id){
        $record = [
            'nev'       =>  $nev, 
            'orszag'    =>  $orszag,
            'termek_id'     =>  $termek_id,
            'szallitoceg_id' => $szallitoceg_id,
        ];
        
        $this->db->where('id', $id);
        return $this->db->update('raktarok',$record);
    }
    
    public function insert($nev, $orszag, $termek_id, $szallitoceg_id)
    {
        $record = [
            'nev'       =>  $nev, 
            'orszag'    =>  $orszag,
            'termek_id'     =>  $termek_id,
            'szallitoceg_id' => $szallitoceg_id,
        ];
        
        $this->db->insert('raktarok', $record);
        return $this->db->insert_id(); 
    }
  
}
?>