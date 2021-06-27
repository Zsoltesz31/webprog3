<?php 
class SzallitocegModel extends CI_Model{
    public function __contruct(){
        parent::__construct();

        $this->load->database();
    }
public function get_list(){
    $this->db->select('sz.id,sz.nev,t.nev termek_nev');
    $this->db->from('szallitoceg sz');
    $this->db->join('termek t', 't.id=sz.termek_id','inner');
    return $this->db->get()->result();
}
public function get_one($id){
        
    $this->db->select('sz.id,sz.nev,t.nev termek_nev');
    $this->db->from('szallitoceg sz');
    $this->db->join('termek t', 't.id=sz.termek_id','inner');
    $this->db->where('sz.id', $id);
    
    return $this->db->get()->row();
}

public function delete($id){

    $this->db->where('id',$id);
    return $this->db->delete('szallitoceg');
}

public function update($id, $termek_id, $nev){
    $record = [
        'nev'       =>  $nev, 
        'termek_id'     =>  $termek_id,
    ];
    
    $this->db->where('id', $id);
    return $this->db->update('szallitoceg',$record);
}

public function insert($termek_id, $nev)
{
    $record = [
        'nev'       =>  $nev, 
        'termek_id'     =>  $termek_id,
    ];
    
    $this->db->insert('szallitoceg', $record);
    return $this->db->insert_id(); 
}


}
?>