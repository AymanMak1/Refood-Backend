<?php

 
class Delivery_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get delivery by pickUpId
     */
    function get_delivery($pickUpId)
    {
        return $this->db->get_where('delivery',array('pickUpId'=>$pickUpId))->row_array();
    }
    
    /*
     * Get all deliveries count
     */
    function get_all_deliveries_count()
    
    {   
      
        $this->db->from('delivery');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all deliveries
     */
    function get_all_deliveries($params = array())
    {
        $this->db->order_by('pickUpId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        
        return $this->db->get('delivery_view')->result_array();
    }
    
    function get_all_delivs($params = array())
    {
        $this->db->order_by('pickUpId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }

        return $this->db->get('delivery')->result_array();
    }
    /*
     * function to add new delivery
     */
    function add_delivery($params)
    {
        $this->db->insert('delivery',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update delivery
     */
    function update_delivery($pickUpId,$params)
    {
        $this->db->where('pickUpId',$pickUpId);
        return $this->db->update('delivery',$params);
    }
    
    /*
     * function to delete delivery
     */
    function delete_delivery($pickUpId)
    {
        return $this->db->delete('delivery',array('pickUpId'=>$pickUpId));
    }
}
