<?php

 
class Organisationtype extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organisationtype_model');
    } 

    /*
     * Listing of organisationtypes
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('organisationtype/index?');
        $config['total_rows'] = $this->Organisationtype_model->get_all_organisationtypes_count();
        $this->pagination->initialize($config);

        $data['organisationtypes'] = $this->Organisationtype_model->get_all_organisationtypes($params);
        
        $data['_view'] = 'organisationtype/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new organisationtype
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'organisationTypeName' => $this->input->post('organisationTypeName'),
            );
            
            $organisationtype_id = $this->Organisationtype_model->add_organisationtype($params);
            redirect('organisationtype/index');
        }
        else
        {            
            $data['_view'] = 'organisationtype/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a organisationtype
     */
    function edit($organisationTypeId)
    {   
        // check if the organisationtype exists before trying to edit it
        $data['organisationtype'] = $this->Organisationtype_model->get_organisationtype($organisationTypeId);
        
        if(isset($data['organisationtype']['organisationTypeId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'organisationTypeName' => $this->input->post('organisationTypeName'),
                );

                $this->Organisationtype_model->update_organisationtype($organisationTypeId,$params);            
                redirect('organisationtype/index');
            }
            else
            {
                $data['_view'] = 'organisationtype/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The organisationtype you are trying to edit does not exist.');
    } 

    /*
     * Deleting organisationtype
     */
    function remove($organisationTypeId)
    {
        $organisationtype = $this->Organisationtype_model->get_organisationtype($organisationTypeId);

        // check if the organisationtype exists before trying to delete it
        if(isset($organisationtype['organisationTypeId']))
        {
            $this->Organisationtype_model->delete_organisationtype($organisationTypeId);
            redirect('organisationtype/index');
        }
        else
            show_error('The organisationtype you are trying to delete does not exist.');
    }
    
}
