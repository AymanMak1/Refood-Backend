<?php

 
class Preparation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get preparation by preparationId
     */
    function get_preparation($preparationId)
    {
        return $this->db->get_where('preparation',array('preparationId'=>$preparationId))->row_array();
    }
    
    /*
     * Get all preparations count
     */
    function get_all_preparations_count()
    {
        $this->db->from('preparation');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all preparations
     */
    function get_all_preparations($params = array())
    {
        $this->db->order_by('preparationId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('preparation_user')->result_array();
    }
    
    function get_all_preps($params = array())
    {
        $this->db->order_by('preparationId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('preparation')->result_array();
    }
        
    /*
     * function to add new preparation
     */
    function add_preparation($params)
    {
        $this->db->insert('preparation',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update preparation
     */
    function update_preparation($preparationId,$params)
    {
        $this->db->where('preparationId',$preparationId);
        return $this->db->update('preparation',$params);
    }
    
    /*
     * function to delete preparation
     */
    function delete_preparation($preparationId)
    {
        return $this->db->delete('preparation',array('preparationId'=>$preparationId));
    }
}
