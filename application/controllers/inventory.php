<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('inventory_model');
        $this->load->model('notification_model');
    }
    
    public function index() {
			//breadcrumb
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Inventory Database', true);
			
        $data['inventory'] = $this->inventory_model->get_all_inventory();
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $this->load->template('inventory_view', $data);
		
    }
    
	public function index2()
	{
		//breadcrumb
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('Storage Database', true);
			
        $data['storage'] = $this->inventory_model->get_all_storage();
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        $this->load->template('inventory_view', $data);
	}
    
    public function edit() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $id = $this->uri->segment(3);
        $data['details'] = $this->inventory_model->get_inventory_by_id($id);
        
        $this->form_validation->set_rules('program', 'Program', 'required');
        #$this->form_validation->set_rules('program_type', 'Program Type', 'required');
        $this->form_validation->set_rules('biohazard_type', 'Biohazard Type', 'required');
        $this->form_validation->set_rules('biohazard_name', 'Biohazard Name', 'required');
        $this->form_validation->set_rules('biohazard_id', 'Biohazard ID', 'required');
        $this->form_validation->set_rules('log_in_personnel', 'Log In Personnel', 'required');
        $this->form_validation->set_rules('keeper_name', 'Keeper Name', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('inventory_form_view', $data);
        } else {
            $data = array(
                'account_id' => $this->session->userdata('account_id'),
                'program' => $this->input->post('program'),
                'program_type' => $this->input->post('program_type'),
                'unit_convenor' => $this->input->post('unit_convenor'),
                'project_investigator' => $this->input->post('project_investigator'),
                'unit_name' => $this->input->post('unit_name'),
                'experiment_title' => $this->input->post('experiment_title'),
                'project_title' => $this->input->post('project_title'),
                'project_reference_no' => $this->input->post('project_reference_no'),
                'biohazard_type' => $this->input->post('biohazard_type'),
                'biohazard_name' => $this->input->post('biohazard_name'),
                'biohazard_id' => $this->input->post('biohazard_id'),
                'date_received' => $this->input->post('date_received'),
                'log_in_personnel' => $this->input->post('log_in_personnel'),
                'keeper_name' => $this->input->post('keeper_name'),
                'remarks' => $this->input->post('remarks'),
                'approval' => 1
            );
            
            if($this->inventory_model->update_inventory($id, $data)){
                $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 2, "Inventory Modified", "Inventory has been modified by: " . $this->session->userdata('account_name'));
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully edited an inventory!</div>');
                redirect('inventory/index');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('inventory/index');
            }
        }
    }
    
    public function edit2() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $id = $this->uri->segment(3);
        $data['details'] = $this->inventory_model->get_storage_by_id($id);
        
        $this->form_validation->set_rules('biohazard_id', 'Biohazard ID', 'required');
        $this->form_validation->set_rules('biohazard_name', 'Biohazard Name', 'required');
        $this->form_validation->set_rules('risk_group', 'Risk Group', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('biohazard_source', 'Biohazard Source', 'required');
        $this->form_validation->set_rules('date_created', 'Date', 'required');
        $this->form_validation->set_rules('storage_location', 'Storage Location', 'required');
        $this->form_validation->set_rules('keeper_name', 'Keeper Name', 'required');
        $this->form_validation->set_rules('log_in_personnel', 'Log In Personnel', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('storage_form_view', $data);
        } else {
            $data = array(
                'account_id' => $this->session->userdata('account_id'),
                'biohazard_id' => $this->input->post('biohazard_id'),
                'biohazard_name' => $this->input->post('biohazard_name'),
                'risk_group' => $this->input->post('risk_group'),
                'storage_location' => $this->input->post('storage_location'),
                'location' => $this->input->post('location'),
                'biohazard_source' => $this->input->post('biohazard_source'),
                'date_created' => $this->input->post('date_created'),
                'storage_location' => $this->input->post('storage_location'),
                'keeper_name' => $this->input->post('keeper_name'),
                'log_in_personnel' => $this->input->post('log_in_personnel'),
                'approval' => 1
            );
            
            if($this->inventory_model->update_storage($id, $data)){
                $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 2, "Storage Modified", "Storage has been modified by: " . $this->session->userdata('account_name'));
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully edited a storage!</div>');
                redirect('inventory/index2');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('inventory/index2');
            }
        }
    }
    
    public function delete() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $id = $this->uri->segment(3);
        $msg = base64_decode($this->uri->segment(4));
        
        #$details = $this->inventory_model->get_inventory_by_id($id);
        
        if( $this->inventory_model->delete_item($id, 1) ){
            $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 2, "Inventory Deleted", "Inventory has been deleted by: " . $this->session->userdata('account_name') . ", due to: " . $msg);
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully deleted the inventory item!</div>');
            redirect('inventory/index');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
            redirect('inventory/index');
        }
    }
    
    public function delete2() {
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $id = $this->uri->segment(3);
        $msg = base64_decode($this->uri->segment(4));
        
        #$details = $this->inventory_model->get_storage_by_id($id);
        
        if( $this->inventory_model->delete_item($id, 2) ){
            $this->notification_model->insert_new_notification($this->session->userdata('account_id'), 2, "Storage Deleted", "Storage has been deleted by: " . $this->session->userdata('account_name') . ", due to: " . $msg);
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully deleted the storage item!</div>');
            redirect('inventory/index2');
        } else {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
            redirect('inventory/index2');
        }
    }
    
    public function new_inventory() {	
//breadcrumb
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('New Inventory Application', true);	
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
 
        $this->form_validation->set_rules('program', 'Program', 'required');
        $this->form_validation->set_rules('program_type', 'Program Type', 'required');
        $this->form_validation->set_rules('biohazard_type', 'Biohazard Type', 'required');
        $this->form_validation->set_rules('biohazard_name', 'Biohazard Name', 'required');
        $this->form_validation->set_rules('biohazard_id', 'Biohazard ID', 'required');
        $this->form_validation->set_rules('log_in_personnel', 'Log In Personnel', 'required');
        $this->form_validation->set_rules('keeper_name', 'Keeper Name', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('inventory_form_view', $data);
        } else {
            $data = array(
                'account_id' => $this->session->userdata('account_id'),
                'program' => $this->input->post('program'),
                'program_type' => $this->input->post('program_type'),
                'unit_convenor' => $this->input->post('unit_convenor'),
                'project_investigator' => $this->input->post('project_investigator'),
                'unit_name' => $this->input->post('unit_name'),
                'experiment_title' => $this->input->post('experiment_title'),
                'project_title' => $this->input->post('project_title'),
                'project_reference_no' => $this->input->post('project_reference_no'),
                'biohazard_type' => $this->input->post('biohazard_type'),
                'biohazard_name' => $this->input->post('biohazard_name'),
                'biohazard_id' => $this->input->post('biohazard_id'),
                'date_received' => $this->input->post('date_received'),
                'log_in_personnel' => $this->input->post('log_in_personnel'),
                'keeper_name' => $this->input->post('keeper_name'),
                'remarks' => $this->input->post('remarks')
            );
            
            if($this->inventory_model->insert_new_inventory($data)){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully applied for a new inventory!</div>');
                redirect('inventory/new_inventory');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('inventory/new_inventory');
            }
        }
	}
    
    public function new_storage() {
		//breadcrumb
            $this->breadcrumbs->unshift('Home', '/');	
            $this->breadcrumbs->push('New Storage Application', true);
		
        $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
        
        $this->form_validation->set_rules('biohazard_id', 'Biohazard ID', 'required');
        $this->form_validation->set_rules('biohazard_name', 'Biohazard Name', 'required');
        $this->form_validation->set_rules('risk_group', 'Risk Group', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('biohazard_source', 'Biohazard Source', 'required');
        $this->form_validation->set_rules('date_created', 'Date', 'required');
        $this->form_validation->set_rules('storage_location', 'Storage Location', 'required');
        $this->form_validation->set_rules('keeper_name', 'Keeper Name', 'required');
        $this->form_validation->set_rules('log_in_personnel', 'Log In Personnel', 'required');
        
        # Submit form
        if($this->form_validation->run() == FALSE){
            # validation fails
            $this->load->template('storage_form_view', $data);
        } else {
            $data = array(
                'account_id' => $this->session->userdata('account_id'),
                'biohazard_id' => $this->input->post('biohazard_id'),
                'biohazard_name' => $this->input->post('biohazard_name'),
                'risk_group' => $this->input->post('risk_group'),
                'storage_location' => $this->input->post('storage_location'),
                'location' => $this->input->post('location'),
                'biohazard_source' => $this->input->post('biohazard_source'),
                'date_created' => $this->input->post('date_created'),
                'storage_location' => $this->input->post('storage_location'),
                'keeper_name' => $this->input->post('keeper_name'),
                'log_in_personnel' => $this->input->post('log_in_personnel')
            );
            
            if($this->inventory_model->insert_new_storage($data)){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have successfully applied for a new storage!</div>');
                redirect('inventory/new_storage');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                redirect('inventory/new_storage');
            }
        }
	}
    
    /*
    
    <link rel="stylesheet" href="http://cdn.webix.com/edge/webix.css" type="text/css"> 
    <script src="http://cdn.webix.com/edge/webix.js" type="text/javascript"></script>
    
        <div id="inventory"></div>

        <script type="text/javascript" charset="utf-8">
            webix.ready(function(){
                grid = webix.ui({
                    container:"inventory",
                    view:"datatable",
                    columns:[
                        { id:"inventory_id", header:"", adjust:"data" },
                        { id:"program",	header:[{ text:"Program" }, { content:"textFilter" }], width:175 },
                        { id:"program_type", header:["Program Type", {content:"textFilter"}], width:175 },
                        { id:"unit_convenor", header:["Unit Convenor", {content:"textFilter"}], width:175 },
                        { id:"unit_name", header:["Unit Name", {content:"textFilter"}], width:175 }
                    ],
                    autowidth:true, 
                    autoheight:true,
                    data:<?php print json_encode($inventory); ?>
                });
            });
        </script>
    */
}
?>