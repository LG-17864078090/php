<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('file_model');
    }


    //默认访问index方法
    public function index()
    {
        $this->load->view('operateSystem');
    }
    public function getAll(){
        $arr = json_encode($this->file_model->getAll());
        echo $arr;
    }
    public function saveToDB(){
        $this->file_model->clearAll();
        $folders = $this->input->get('folders');
        $files = $this->input->get('files');

        foreach ($folders as $index=>$folder){
            $this->file_model->saveAll($folder['name'],1,$folder['size'],$folder['creatTime'],$folder["folder"]['name']);
        }
        foreach ($files as $index=>$file){
            $this->file_model->saveAll($file['name'],0,$file['size'],$file['creatTime'],$file["folder"]['name']);
        }

    }
}