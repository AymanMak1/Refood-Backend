<?php

  
class Gender_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gender by genderId
     */
    function get_gender($genderId)
    {
        return $this->db->get_where('gender',array('genderId'=>$genderId))->row_array();
    }
    
    /*
     * Get all genders count
     */
    function get_all_genders_count()
    {
        $this->db->from('gender');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all genders
     */
    function get_all_genders($params = array())
    {
        $this->db->order_by('genderId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('gender')->result_array();
    }
        
    /*
     * function to add new gender
     */
    function add_gender($params)
    {
        $this->db->insert('gender',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gender
     */
    function update_gender($genderId,$params)
    {
        $this->db->where('genderId',$genderId);
        return $this->db->update('gender',$params);
    }
    
    /*
     * function to delete gender
     */
    function delete_gender($genderId)
    {
        return $this->db->delete('gender',array('genderId'=>$genderId));
    }
}
