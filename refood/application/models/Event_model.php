<?php

 
class Event_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get event by eventId
     */
    function get_event($eventId)
    {
        return $this->db->get_where('event',array('eventId'=>$eventId))->row_array();
    }
    
    /*
     * Get all events count
     */
    function get_all_events_count()
    {
        $this->db->from('event');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all events
     */
    function get_all_events($params = array())
    {
        $this->db->order_by('eventId', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('event_user')->result_array();
    }
        
    /*
     * function to add new event
     */
    function add_event($params)
    {
        $this->db->insert('event',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update event
     */
    function update_event($eventId,$params)
    {
        $this->db->where('eventId',$eventId);
        return $this->db->update('event',$params);
    }
    
    /*
     * function to delete event
     */
    function delete_event($eventId)
    {
        return $this->db->delete('event',array('eventId'=>$eventId));
    }
}
