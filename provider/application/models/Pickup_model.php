<?php

 
class Pickup_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pickup by pickUpId
     */
    function get_pickup($pickUpId)
    {
        return $this->db->get_where('pickUp',array('pickUpId'=>$pickUpId))->row_array();
    }
    
    /*
     * Get all pickups count
     */
    function get_all_pickups_count()
    {   $user = $this->session->userdata("auth");
        $this->db->where('provider',$user->providerId);
        $this->db->from('pickUp');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pickups
     */
    function get_all_pickups($params = array())
    {
        $this->db->order_by('pickUpId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $user = $this->session->userdata("auth");
        $this->db->where('providerId',$user->providerId);
        return $this->db->get('pickup_view')->result_array();
    }
    function get_all_picks($params = array())
    {
        $this->db->order_by('pickUpId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $user = $this->session->userdata("auth");
        $this->db->where('provider',$user->providerId);
        return $this->db->get('pickup')->result_array();
    }
        
    /*
     * function to add new pickup
     */
    function add_pickup($params)
    {
        $this->db->insert('pickUp',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pickup
     */
    function update_pickup($pickUpId,$params)
    {
        $this->db->where('pickUpId',$pickUpId);
        return $this->db->update('pickUp',$params);
    }
    
    /*
     * function to delete pickup
     */
    function delete_pickup($pickUpId)
    {
        return $this->db->delete('pickUp',array('pickUpId'=>$pickUpId));
    }
    function connect($email , $pass){
        $this->db->where('providerEmail',$email);
         $this->db->where('password',$pass);
       return $this->db->get('provider')->result();
   }
}