<?php

 
class Providertype extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Providertype_model');
    } 

    /*
     * Listing of providertypes
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('providertype/index?');
        $config['total_rows'] = $this->Providertype_model->get_all_providertypes_count();
        $this->pagination->initialize($config);

        $data['providertypes'] = $this->Providertype_model->get_all_providertypes($params);
        
        $data['_view'] = 'providertype/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new providertype
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'providerTypeName' => $this->input->post('providerTypeName'),
            );
            
            $providertype_id = $this->Providertype_model->add_providertype($params);
            redirect('providertype/index');
        }
        else
        {            
            $data['_view'] = 'providertype/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a providertype
     */
    function edit($providerTypeId)
    {   
        // check if the providertype exists before trying to edit it
        $data['providertype'] = $this->Providertype_model->get_providertype($providerTypeId);
        
        if(isset($data['providertype']['providerTypeId']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'providerTypeName' => $this->input->post('providerTypeName'),
                );

                $this->Providertype_model->update_providertype($providerTypeId,$params);            
                redirect('providertype/index');
            }
            else
            {
                $data['_view'] = 'providertype/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The providertype you are trying to edit does not exist.');
    } 

    /*
     * Deleting providertype
     */
    function remove($providerTypeId)
    {
        $providertype = $this->Providertype_model->get_providertype($providerTypeId);

        // check if the providertype exists before trying to delete it
        if(isset($providertype['providerTypeId']))
        {
            $this->Providertype_model->delete_providertype($providerTypeId);
            redirect('providertype/index');
        }
        else
            show_error('The providertype you are trying to delete does not exist.');
    }
    
}
