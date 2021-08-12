<?php
class Blog_model extends CI_Model
{
    public function getBlog($limit,$offset)
    {
        $filter = $this->input->get('find');
        $this->db->like('title',$filter);
        $this->db->limit($limit,$offset);
        $this->db->order_by('date','desc');
        $query=$this->db->get('blog');
        return $query-> result_array();
    }

    public function getTotalblog()
    {
        $filter = $this->input->get('find');
        $this->db->like('title',$filter);
        return $this->db->count_all_results('blog');
        //count_all_result Method  akan mengembalikan jumlah 
        //data blog sesuai hasil query (query menyesuaikan apakah user menginput pencarian atau tidak).

    }

    public function getSingleBlog($field,$value)
    {
        $this->db->where($field,$value);
        $query = $this->db->get('blog');
        return $query->row_array();
        
    }

    public function getInsert($data)
    {
        $this->db->insert('blog',$data);
        return $this->db->insert_id();
    }

    public function updateBlog($id, $alurupdate)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $alurupdate);
        return $this->db->affected_rows();
    }

    public function deleteBlog($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('blog');
        return $this->db->affected_rows();
    }
}