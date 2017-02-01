<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('item');
    }
    
    public function index()
    {
        
        $data['items'] = $this->item->getItems();

        
        $this->load->view('items', $data);
    }
    
    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->item->create();
            redirect('/items');
        }else{
            $this->load->model('category');
            $data['categories'] = $this->category->getItems();
            $this->load->view('add_item', $data);
        }
    }
    
    public function edit($id){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->item->update($id);
            redirect('/items');
        }else{
            $this->load->model('category');
            $data['categories'] = $this->category->getItems();
            $data['item'] = $this->item->getItem($id);
            $this->load->view('add_item', $data);
        }
    }
    
    public function delete($id){
        $this->item->delete($id);
        redirect('/items');
    }
}

