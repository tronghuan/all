<?php
class student_model extends MY_Model
{
    protected $table = "student";
    public function listStudent()
    {
        return $this->getAll($this->table);
    }
    public function deleteStudent($id)
    {   
        $this->setWhere('id='.$id);
        $this->delete($this->table);
    }
    public function insertStudent($array){
        $this->insert($this->table,$array);
    }
    public function updateStudent($array){
        $this->update($this->table,$array);
    }
    public function detailStudent($id)
    {
        $this->setWhere("id = $id");
        return $this->getOnce($this->table);
    }
}