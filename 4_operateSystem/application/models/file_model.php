<?php


class file_model extends CI_Model
{
//    public function save($email,$name,$pwd,$sex){
//        $data = array(
//            'name' => $name,
//            'password' => $pwd,
//            'email'=>$email,
//            'sex'=>$sex
//        );
//        $query = $this->db->insert('t_user', $data);
//        return $query;
//    }

    public function getAll(){
        $query = $this->db->get('t_file');
        return $query->result();
    }

    public function clearAll(){
        $this->db->empty_table('t_file');
    }
    public  function saveAll($name,$type,$size,$creatTime,$folderName){
        $data = array(
            'name' => $name,
            'type' => $type,
            'size'=>$size,
            'creatTime'=>$creatTime,
            'foldername'=>$folderName,
        );
        $query = $this->db->insert('t_file', $data);
        return $query;
    }
}