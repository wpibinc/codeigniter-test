<?php


class Item extends CI_Model {
    
    
    public $name;
    
    public $category_id;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function create(){
        $this->name    = $_POST['name']; 
        $this->category_id  = $_POST['category'];
        
        $this->db->insert('items', $this);
    }
    
    public function update($id){
        $this->name    = $_POST['name']; 
        $this->category_id  = $_POST['category'];
        
        $this->db->update('items', $this, array('id' => $id));
    }
    
    public function delete($id){
        $this->db->delete('items', array('id' => $id));
    }
    
    public function getItems(){
        $query = $this->db->get('items');
        return $query->result();
    }
    
    public function getCategory($id){
        $this->db->select('title');
        $this->db->from('categories');
        $this->db->join('items', 'categories.id = items.category_id');
        $this->db->where('items.id', $id);
        $query = $this->db->get();
        $res = $query->result();
        
        return is_array($res)&&count($res)?$res[0]->title:'';
    }
    
    public function getItem($id){
        $this->db->where('id', $id);
        $query = $this->db->get('items');
        return $query->result();
    }
}
