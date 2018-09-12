<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class forme extends CI_Controller{
		
		function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('forme_model');
        $this->load->model('notification_model');
        
        //breadcrumb
		$this->breadcrumbs->unshift('Home', '/');	
		$this->breadcrumbs->push('Application','/applicationpage', true);
        $this->breadcrumbs->push('New Application','/newapplicationpage', true);
        $this->breadcrumbs->push('Living Modified Organism','/livingmodifiedorganismpage',true);
        $this->breadcrumbs->push('Form E', true);
    }
		
		public function index(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('project_title', 'Project title', 'required|callback_fullname_check');
            $this->form_validation->set_rules('organization', 'Organization ', 'required');
            /*$this->form_validation->set_rules('applicant_name_PI', 'Applicant name', 'required');
            $this->form_validation->set_rules('position', 'position', 'required');
            $this->form_validation->set_rules('telephone_office', 'telephone office ', 'required');
            $this->form_validation->set_rules('telephone_mobile', 'telephone mobile', 'required');
            $this->form_validation->set_rules('fax', 'fax', 'required');
            $this->form_validation->set_rules('email_address', 'email address', 'required');
            $this->form_validation->set_rules('postal_address', 'postal address', 'required');
            $this->form_validation->set_rules('project_title2', 'project title', 'required|valid_email');
            $this->form_validation->set_rules('IBC_project_identification_no', 'IBC project identification no', 'required');
            $this->form_validation->set_rules('notified_first', 'notified', 'required');
            $this->form_validation->set_rules('NBB_reference', 'NBB reference', 'required');
            $this->form_validation->set_rules('NBB_difference', 'NBB difference', 'required');
            $this->form_validation->set_rules('importer_organization', 'importer organization', 'required');
            $this->form_validation->set_rules('importer_contact_person', 'importer contact person', 'required');
            $this->form_validation->set_rules('importer_position', 'importer position', 'required');
            $this->form_validation->set_rules('importer_telephone_office', 'importer telephone office', 'required');
            $this->form_validation->set_rules('importer_telephone_mobile', 'importer telephone mobile', 'required');
            $this->form_validation->set_rules('importer_fax', 'importer fax', 'required');
            $this->form_validation->set_rules('importer_email_address', 'importer email address', 'required');
            $this->form_validation->set_rules('importer_postal_address', 'importer postal address', 'required');
            $this->form_validation->set_rules('IBC_organization_name', 'IBC organization name', 'required');
            $this->form_validation->set_rules('IBC_chairperson', 'IBC chairperson', 'required');
            $this->form_validation->set_rules('IBC_telephone_number', 'IBC telephone number', 'required');
            $this->form_validation->set_rules('IBC_fax', 'IBC fax', 'required');
            $this->form_validation->set_rules('IBC_email_address', 'IBC email address', 'required');
            $this->form_validation->set_rules('IBC_PI_name', 'IBC PI name', 'required');
            $this->form_validation->set_rules('IBC_project_title', 'IBC project title', 'required');
            $this->form_validation->set_rules('IBC_date', 'IBC_date', 'required');
            $this->form_validation->set_rules('applicant_PI_signature_date', 'applicant PI signature_date', 'required');
            $this->form_validation->set_rules('applicant_PI_signature_name', 'applicant PI signature name', 'required');
            $this->form_validation->set_rules('applicant_PI_signature_stamp', 'applicant PI signature stamp', 'required');
            $this->form_validation->set_rules('project_team_name[0]', 'project team name', 'required');
            $this->form_validation->set_rules('project_team_address[0]', 'project team address', 'required');
            $this->form_validation->set_rules('project_team_telephone_number[0]', 'project team telephone number', 'required');
            $this->form_validation->set_rules('project_team_email_address[0]', 'project team email address', 'required');
            $this->form_validation->set_rules('project_team_qualification[0]', 'project team qualification', 'required');
            $this->form_validation->set_rules('project_team_designation[0]', 'project team designation', 'required');
            $this->form_validation->set_rules('project_intro_objective', 'objective', 'required');
            $this->form_validation->set_rules('project_intro_specifics', 'intro specifics', 'required');
            $this->form_validation->set_rules('project_intro_intended_date_commencement', 'intended date commencement', 'required');
            $this->form_validation->set_rules('project_intro_expected_date_completion', 'expected date completion', 'required');
            $this->form_validation->set_rules('project_intro_importation_date', 'project intro importation date', 'required');
            $this->form_validation->set_rules('LMO_desc_name_parent[0]', 'LMO desc name parent', 'required');
            $this->form_validation->set_rules('LMO_desc_name_donor[0]', 'LMO desc name donor', 'required');
            $this->form_validation->set_rules('LMO_desc_method[0]', 'Method', 'required');
            $this->form_validation->set_rules('LMO_desc_class[0]', 'Class', 'required');
            $this->form_validation->set_rules('LMO_desc_trait[0]', 'Trait', 'required');
            $this->form_validation->set_rules('LMO_desc_genes_function[0]', 'Genes function', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_potential_hazard[0]', 'Genes potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_comments[0]', 'Genes comments', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_management[0]', 'genes management', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_residual[0]', 'Genes residual', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_potential_hazard[0]', 'Admin potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_comments[0]', 'Admin comments', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_management[0]', 'Admin management', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_residual[0]', 'Admin residual', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_potential_hazard[0]', 'Containment potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_comments[0]', 'Containment comments', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_management[0]', 'Containment management', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_residual[0]', 'Containment residual', 'required');
            $this->form_validation->set_rules('risk_assessment_special_potential_hazard[0]', 'Special potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_special_comments[0]', 'Special comments', 'required');
            $this->form_validation->set_rules('risk_assessment_special_management[0]', 'Special management', 'required');
            $this->form_validation->set_rules('risk_assessment_special_residual[0]', 'Special residual', 'required');
            $this->form_validation->set_rules('risk_management_transport', 'risk management transport', 'required');
            $this->form_validation->set_rules('risk_management_disposed', 'risk management disposed', 'required');
            $this->form_validation->set_rules('risk_management_wastes', 'risk management wastes', 'required');
            $this->form_validation->set_rules('risk_management_wastewater', 'risk management wastewater', 'required');
            $this->form_validation->set_rules('risk_management_decontaminated', 'risk management decontaminated', 'required');
            $this->form_validation->set_rules('risk_response_environment', 'Environment Response', 'required');
            $this->form_validation->set_rules('risk_response_plan', 'risk response plan', 'required');
            $this->form_validation->set_rules('risk_response_disposal', 'risk response disposal', 'required');
            $this->form_validation->set_rules('risk_response_contigency', 'Contigency', 'required');
            $this->form_validation->set_rules('premise_name[0]', 'premise name', 'required');
            $this->form_validation->set_rules('premise_type[0]', 'premise type', 'required');
            $this->form_validation->set_rules('premise_BSL[0]', 'BSL level', 'required');
            $this->form_validation->set_rules('premise_IBC[0]', 'premise IBC', 'required');
            $this->form_validation->set_rules('premise_IBC_date[0]', 'premise IBC date', 'required');
            $this->form_validation->set_rules('premise_certification_date[0]', 'premise certification date', 'required');
            $this->form_validation->set_rules('premise_certification_no[0]', 'premise certification no', 'required');
            $this->form_validation->set_rules('premise_certification_report[0]', 'premise certification report', 'required');
            $this->form_validation->set_rules('premise_address[0]', 'premise address', 'required');
            $this->form_validation->set_rules('premise_officer_name[0]', 'premise officer name', 'required');
            $this->form_validation->set_rules('premise_telephone_business[0]', 'premise business telephone', 'required');
            $this->form_validation->set_rules('premise_telephone_mobile[0]', 'Applicant name', 'required');
            $this->form_validation->set_rules('premise_fax[0]', 'premise fax', 'required');
            $this->form_validation->set_rules('premise_email[0]', 'premise email', 'required');
           */
            
            
            
            
            if ($this->form_validation->run() == FALSE)
            {
                
                
                $this->load->template('forme_view', $data);
                
            }
            else
            {
                
                $ar1 = implode(',',$this->input->post('project_team_name'));
                $ar2 = implode(',',$this->input->post('project_team_address'));
                $ar3 = implode(',',$this->input->post('project_team_telephone_number'));
                $ar4 = implode(',',$this->input->post('project_team_email_address'));
                $ar5 = implode(',',$this->input->post('project_team_qualification'));
                $ar6 = implode(',',$this->input->post('project_team_designation'));
                $ar7 = implode(',',$this->input->post('LMO_desc_name_parent'));
                $ar8 = implode(',',$this->input->post('LMO_desc_name_donor'));
                $ar9 = implode(',',$this->input->post('LMO_desc_method'));
                $ar10 = implode(',',$this->input->post('LMO_desc_class'));
                $ar11 = implode(',',$this->input->post('LMO_desc_trait'));
                $ar12 = implode(',',$this->input->post('LMO_desc_genes_function'));
                $ar13 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard'));
                $ar14 = implode(',',$this->input->post('risk_assessment_genes_comments'));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_management'));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_residual'));
                $ar17 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard'));
                $ar18 = implode(',',$this->input->post('risk_assessment_admin_comments'));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_management'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_residual'));
                $ar21 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard'));
                $ar22 = implode(',',$this->input->post('risk_assessment_containment_comments'));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_management'));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_residual'));
                $ar25 = implode(',',$this->input->post('risk_assessment_special_potential_hazard'));
                $ar26 = implode(',',$this->input->post('risk_assessment_special_comments'));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_management'));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_residual'));
                $ar29 = implode(',',$this->input->post('premise_name'));
                $ar30 = implode(',',$this->input->post('premise_type'));
                $ar31 = implode(',',$this->input->post('premise_BSL'));
                $ar32 = implode(',',$this->input->post('premise_IBC'));
                $ar33 = implode(',',$this->input->post('premise_IBC_date'));
                $ar34 = implode(',',$this->input->post('premise_certification_date'));
                $ar35 = implode(',',$this->input->post('premise_certification_no'));
                $ar36 = implode(',',$this->input->post('premise_address'));
                $ar37 = implode(',',$this->input->post('premise_officer_name'));
                $ar38 = implode(',',$this->input->post('premise_telephone_business'));
                $ar39 = implode(',',$this->input->post('premise_telephone_mobile'));
                $ar40 = implode(',',$this->input->post('premise_fax'));
                $ar41 = implode(',',$this->input->post('premise_email'));
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('project_title'),
                    'checklist_form' => $this->input->post('checklist_form'),
                    'checklist_coverletter' => $this->input->post('checklist_coverletter'),
                    'checklist_IBC' => $this->input->post('checklist_IBC'),
                    'checklist_IBC_report' => $this->input->post('checklist_IBC_report'),
                    'checklist_clearance' => $this->input->post('checklist_clearance'),
                    'checklist_CBI' => $this->input->post('checklist_CBI'),
                    'checklist_CBI_submit' => $this->input->post('checklist_CBI_submit'),
                    'checklist_support' => $this->input->post('checklist_support'),
                    'checklist_RnD' => $this->input->post('checklist_RnD'),
                    'organization' => $this->input->post('organization'),
                    'applicant_name_PI' => $this->input->post('applicant_name_PI'),
                    'position' => $this->input->post('position'),
                    'telephone_office' => $this->input->post('telephone_office'),
                    'telephone_mobile' => $this->input->post('telephone_mobile'),
                    'fax' => $this->input->post('fax'),
                    'email_address' => $this->input->post('email_address'),
                    'postal_address' => $this->input->post('postal_address'),
                    'project_title2' => $this->input->post('project_title2'),
                    'IBC_project_identification_no' => $this->input->post('IBC_project_identification_no'),
                    'notified_first' => $this->input->post('notified_first'),
                    'NBB_reference ' => $this->input->post('NBB_reference'),
                    'NBB_difference ' => $this->input->post('NBB_difference '),
                    'importer_organization' => $this->input->post('importer_organization'),
                    'importer_contact_person' => $this->input->post('importer_contact_person'),
                    'importer_position' => $this->input->post('importer_position'),
                    'importer_telephone_office' => $this->input->post('importer_telephone_office'),
                    'importer_telephone_mobile' => $this->input->post('importer_telephone_mobile'),
                    'importer_email_address' => $this->input->post('importer_email_address'),
                    'importer_postal_address' => $this->input->post('importer_postal_address'),
                    'IBC_organization_name' => $this->input->post('IBC_organization_name'),
                    'IBC_chairperson' => $this->input->post('IBC_chairperson'),
                    'IBC_telephone_number' => $this->input->post('IBC_telephone_number'),
                    'IBC_fax' => $this->input->post('IBC_fax'),
                    'IBC_email_address' => $this->input->post('IBC_email_address'),
                    'IBC_PI_name' => $this->input->post('IBC_PI_name'),
                    'IBC_project_title' => $this->input->post('IBC_project_title'),
                    'IBC_date' => $this->input->post('IBC_date'),
                    'IBC_adequate' => $this->input->post('IBC_adequate'),
                    'IBC_checklist_activities' => $this->input->post('IBC_checklist_activities'),
                    'IBC_checklist_description' => $this->input->post('IBC_checklist_description'),
                    'IBC_checklist_emergency_response' => $this->input->post('IBC_checklist_emergency_response'),
                    'IBC_checklist_trained' => $this->input->post('IBC_checklist_trained'),
                    'IBC_form_approved' => $this->input->post('IBC_form_approved'),
                    'IBC_biosafety_approved' => $this->input->post('IBC_biosafety_approved'),
                    'signature_statutory_endorsed' => $this->input->post('signature_statutory_endorsed'),
                    'signature_statutory_applicant_free' => $this->input->post('signature_statutory_applicant_free'),
                    'applicant_PI_signature_date' => $this->input->post('applicant_PI_signature_date'),
                    'applicant_PI_signature_name' => $this->input->post('applicant_PI_signature_name'),
                    'applicant_PI_signature_stamp' => $this->input->post('applicant_PI_signature_stamp'),
                    'IBC_chairperson_signature_date' => $this->input->post('IBC_chairperson_signature_date'),
                    'IBC_chairperson_signature_name' => $this->input->post('IBC_chairperson_signature_name'),
                    'IBC_chairperson_signature_stamp' => $this->input->post('IBC_chairperson_signature_stamp'),
                    'organization_representative_signature_date' => $this->input->post('organization_representative_signature_date'),
                    'organization_representative_signature_name' => $this->input->post('organization_representative_signature_name'),
                    'organization_representative_signature_stamp' => $this->input->post('organization_representative_signature_stamp'),
                    'project_team_name' => $ar1,
                    'project_team_address' => $ar2,
                    'project_team_telephone_number' => $ar3,
                    'project_team_email_address' => $ar4,
                    'project_team_qualification' => $ar5,
                    'project_team_designation' => $ar6,
                    'project_intro_objective' => $this->input->post('project_intro_objective'),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics'),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement'),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion'),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date'),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment'),
                    'LMO_desc_name_parent' => $ar7,
                    'LMO_desc_name_donor' => $ar8,
                    'LMO_desc_method' => $ar9,
                    'LMO_desc_class' => $ar10,
                    'LMO_desc_trait' => $ar11,
                    'LMO_desc_genes_function' => $ar12,
                    'risk_assessment_genes_potential_hazard' => $ar13,
                    'risk_assessment_genes_comments' => $ar14,
                    'risk_assessment_genes_management' => $ar15,
                    'risk_assessment_genes_residual' => $ar16,
                    'risk_assessment_admin_potential_hazard' => $ar17,
                    'risk_assessment_admin_comments' => $ar18,
                    'risk_assessment_admin_management' => $ar19,
                    'risk_assessment_admin_residual' => $ar20,
                    'risk_assessment_containment_potential_hazard' => $ar21,
                    'risk_assessment_containment_comments' => $ar22,
                    'risk_assessment_containment_management' => $ar23,
                    'risk_assessment_containment_residual' => $ar24,
                    'risk_assessment_special_potential_hazard' => $ar25,
                    'risk_assessment_special_comments' => $ar26,
                    'risk_assessment_special_management' => $ar27,
                    'risk_assessment_special_residual' => $ar28,
                    'risk_management_transport' => $this->input->post('risk_management_transport'),
                    'risk_management_disposed' => $this->input->post('risk_management_disposed'),
                    'risk_management_wastes' => $this->input->post('risk_management_wastes'),
                    'risk_management_wastewater' => $this->input->post('risk_management_wastewater'),
                    'risk_management_decontaminated' => $this->input->post('risk_management_decontaminated'),
                    'risk_response_environment' => $this->input->post('risk_response_environment'),
                    'risk_response_plan' => $this->input->post('risk_response_plan'),
                    'risk_response_disposal' => $this->input->post('risk_response_disposal'),
                    'risk_response_isolation' => $this->input->post('risk_response_isolation'),
                    'risk_response_contigency' => $this->input->post('risk_response_contigency'),
                    'premise_name' => $ar29,
                    'premise_type' => $ar30,
                    'premise_BSL' => $ar31,
                    'premise_IBC' => $ar32,
                    'premise_IBC_date' => $ar33,
                    'premise_certification_date' => $ar34,
                    'premise_certification_no' => $ar35,
                    'premise_address' => $ar36,
                    'premise_officer_name' => $ar37,
                    'premise_telephone_business' => $ar38,
                    'premise_telephone_mobile' => $ar39,
                    'premise_fax' => $ar40,
                    'premise_email' => $ar41,
                    'confidential_description' => $this->input->post('confidential_description'),
                    'reference_description' => $this->input->post('reference_description')
                    
                    
                );
                
                
                if($this->forme_model->insert_new_applicant_data($data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "New Form E Application", "The following user has submitted a new Form E: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully submitted!</div>', $data);
                   redirect('forme/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('forme/index');
                    
                    
                    
                }
                
            }
        }
        
        public function load_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->session->userdata('account_id');
            //$id = $this->uri->segment(3);
            $id = $this->input->get('id');
            $data['retrieved'] = $this->forme_model->get_form_by_id($id);
            
            $this->load->template('forme_view', $data);
            

        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('project_title', 'Project title', 'required|callback_fullname_check');
            $this->form_validation->set_rules('organization', 'Organization ', 'required');
            /*$this->form_validation->set_rules('applicant_name_PI', 'Applicant name', 'required');
            $this->form_validation->set_rules('position', 'position', 'required');
            $this->form_validation->set_rules('telephone_office', 'telephone office ', 'required');
            $this->form_validation->set_rules('telephone_mobile', 'telephone mobile', 'required');
            $this->form_validation->set_rules('fax', 'fax', 'required');
            $this->form_validation->set_rules('email_address', 'email address', 'required');
            $this->form_validation->set_rules('postal_address', 'postal address', 'required');
            $this->form_validation->set_rules('project_title2', 'project title', 'required|valid_email');
            $this->form_validation->set_rules('IBC_project_identification_no', 'IBC project identification no', 'required');
            $this->form_validation->set_rules('notified_first', 'notified', 'required');
            $this->form_validation->set_rules('NBB_reference', 'NBB reference', 'required');
            $this->form_validation->set_rules('NBB_difference', 'NBB difference', 'required');
            $this->form_validation->set_rules('importer_organization', 'importer organization', 'required');
            $this->form_validation->set_rules('importer_contact_person', 'importer contact person', 'required');
            $this->form_validation->set_rules('importer_position', 'importer position', 'required');
            $this->form_validation->set_rules('importer_telephone_office', 'importer telephone office', 'required');
            $this->form_validation->set_rules('importer_telephone_mobile', 'importer telephone mobile', 'required');
            $this->form_validation->set_rules('importer_fax', 'importer fax', 'required');
            $this->form_validation->set_rules('importer_email_address', 'importer email address', 'required');
            $this->form_validation->set_rules('importer_postal_address', 'importer postal address', 'required');
            $this->form_validation->set_rules('IBC_organization_name', 'IBC organization name', 'required');
            $this->form_validation->set_rules('IBC_chairperson', 'IBC chairperson', 'required');
            $this->form_validation->set_rules('IBC_telephone_number', 'IBC telephone number', 'required');
            $this->form_validation->set_rules('IBC_fax', 'IBC fax', 'required');
            $this->form_validation->set_rules('IBC_email_address', 'IBC email address', 'required');
            $this->form_validation->set_rules('IBC_PI_name', 'IBC PI name', 'required');
            $this->form_validation->set_rules('IBC_project_title', 'IBC project title', 'required');
            $this->form_validation->set_rules('IBC_date', 'IBC_date', 'required');
            $this->form_validation->set_rules('applicant_PI_signature_date', 'applicant PI signature_date', 'required');
            $this->form_validation->set_rules('applicant_PI_signature_name', 'applicant PI signature name', 'required');
            $this->form_validation->set_rules('applicant_PI_signature_stamp', 'applicant PI signature stamp', 'required');
            $this->form_validation->set_rules('project_team_name[0]', 'project team name', 'required');
            $this->form_validation->set_rules('project_team_address[0]', 'project team address', 'required');
            $this->form_validation->set_rules('project_team_telephone_number[0]', 'project team telephone number', 'required');
            $this->form_validation->set_rules('project_team_email_address[0]', 'project team email address', 'required');
            $this->form_validation->set_rules('project_team_qualification[0]', 'project team qualification', 'required');
            $this->form_validation->set_rules('project_team_designation[0]', 'project team designation', 'required');
            $this->form_validation->set_rules('project_intro_objective', 'objective', 'required');
            $this->form_validation->set_rules('project_intro_specifics', 'intro specifics', 'required');
            $this->form_validation->set_rules('project_intro_intended_date_commencement', 'intended date commencement', 'required');
            $this->form_validation->set_rules('project_intro_expected_date_completion', 'expected date completion', 'required');
            $this->form_validation->set_rules('project_intro_importation_date', 'project intro importation date', 'required');
            $this->form_validation->set_rules('LMO_desc_name_parent[0]', 'LMO desc name parent', 'required');
            $this->form_validation->set_rules('LMO_desc_name_donor[0]', 'LMO desc name donor', 'required');
            $this->form_validation->set_rules('LMO_desc_method[0]', 'Method', 'required');
            $this->form_validation->set_rules('LMO_desc_class[0]', 'Class', 'required');
            $this->form_validation->set_rules('LMO_desc_trait[0]', 'Trait', 'required');
            $this->form_validation->set_rules('LMO_desc_genes_function[0]', 'Genes function', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_potential_hazard[0]', 'Genes potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_comments[0]', 'Genes comments', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_management[0]', 'genes management', 'required');
            $this->form_validation->set_rules('risk_assessment_genes_residual[0]', 'Genes residual', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_potential_hazard[0]', 'Admin potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_comments[0]', 'Admin comments', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_management[0]', 'Admin management', 'required');
            $this->form_validation->set_rules('risk_assessment_admin_residual[0]', 'Admin residual', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_potential_hazard[0]', 'Containment potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_comments[0]', 'Containment comments', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_management[0]', 'Containment management', 'required');
            $this->form_validation->set_rules('risk_assessment_containment_residual[0]', 'Containment residual', 'required');
            $this->form_validation->set_rules('risk_assessment_special_potential_hazard[0]', 'Special potential hazard', 'required');
            $this->form_validation->set_rules('risk_assessment_special_comments[0]', 'Special comments', 'required');
            $this->form_validation->set_rules('risk_assessment_special_management[0]', 'Special management', 'required');
            $this->form_validation->set_rules('risk_assessment_special_residual[0]', 'Special residual', 'required');
            $this->form_validation->set_rules('risk_management_transport', 'risk management transport', 'required');
            $this->form_validation->set_rules('risk_management_disposed', 'risk management disposed', 'required');
            $this->form_validation->set_rules('risk_management_wastes', 'risk management wastes', 'required');
            $this->form_validation->set_rules('risk_management_wastewater', 'risk management wastewater', 'required');
            $this->form_validation->set_rules('risk_management_decontaminated', 'risk management decontaminated', 'required');
            $this->form_validation->set_rules('risk_response_environment', 'Environment Response', 'required');
            $this->form_validation->set_rules('risk_response_plan', 'risk response plan', 'required');
            $this->form_validation->set_rules('risk_response_disposal', 'risk response disposal', 'required');
            $this->form_validation->set_rules('risk_response_contigency', 'Contigency', 'required');
            $this->form_validation->set_rules('premise_name[0]', 'premise name', 'required');
            $this->form_validation->set_rules('premise_type[0]', 'premise type', 'required');
            $this->form_validation->set_rules('premise_BSL[0]', 'BSL level', 'required');
            $this->form_validation->set_rules('premise_IBC[0]', 'premise IBC', 'required');
            $this->form_validation->set_rules('premise_IBC_date[0]', 'premise IBC date', 'required');
            $this->form_validation->set_rules('premise_certification_date[0]', 'premise certification date', 'required');
            $this->form_validation->set_rules('premise_certification_no[0]', 'premise certification no', 'required');
            $this->form_validation->set_rules('premise_certification_report[0]', 'premise certification report', 'required');
            $this->form_validation->set_rules('premise_address[0]', 'premise address', 'required');
            $this->form_validation->set_rules('premise_officer_name[0]', 'premise officer name', 'required');
            $this->form_validation->set_rules('premise_telephone_business[0]', 'premise business telephone', 'required');
            $this->form_validation->set_rules('premise_telephone_mobile[0]', 'Applicant name', 'required');
            $this->form_validation->set_rules('premise_fax[0]', 'premise fax', 'required');
            $this->form_validation->set_rules('premise_email[0]', 'premise email', 'required');
           */
            
            
            
            
            if ($this->form_validation->run() == FALSE)
            {
                
                //$data['load'] = "true";
                //$id = 1;
                //$data['retrieved'] = $this->annex2_model->get_form_by_id($id);
            
                
                $this->load->template('forme_view', $data);
                
            }
            else
            {
                
                $ar1 = implode(',',$this->input->post('project_team_name'));
                $ar2 = implode(',',$this->input->post('project_team_address'));
                $ar3 = implode(',',$this->input->post('project_team_telephone_number'));
                $ar4 = implode(',',$this->input->post('project_team_email_address'));
                $ar5 = implode(',',$this->input->post('project_team_qualification'));
                $ar6 = implode(',',$this->input->post('project_team_designation'));
                $ar7 = implode(',',$this->input->post('LMO_desc_name_parent'));
                $ar8 = implode(',',$this->input->post('LMO_desc_name_donor'));
                $ar9 = implode(',',$this->input->post('LMO_desc_method'));
                $ar10 = implode(',',$this->input->post('LMO_desc_class'));
                $ar11 = implode(',',$this->input->post('LMO_desc_trait'));
                $ar12 = implode(',',$this->input->post('LMO_desc_genes_function'));
                $ar13 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard'));
                $ar14 = implode(',',$this->input->post('risk_assessment_genes_comments'));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_management'));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_residual'));
                $ar17 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard'));
                $ar18 = implode(',',$this->input->post('risk_assessment_admin_comments'));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_management'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_residual'));
                $ar21 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard'));
                $ar22 = implode(',',$this->input->post('risk_assessment_containment_comments'));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_management'));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_residual'));
                $ar25 = implode(',',$this->input->post('risk_assessment_special_potential_hazard'));
                $ar26 = implode(',',$this->input->post('risk_assessment_special_comments'));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_management'));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_residual'));
                $ar29 = implode(',',$this->input->post('premise_name'));
                $ar30 = implode(',',$this->input->post('premise_type'));
                $ar31 = implode(',',$this->input->post('premise_BSL'));
                $ar32 = implode(',',$this->input->post('premise_IBC'));
                $ar33 = implode(',',$this->input->post('premise_IBC_date'));
                $ar34 = implode(',',$this->input->post('premise_certification_date'));
                $ar35 = implode(',',$this->input->post('premise_certification_no'));
                $ar36 = implode(',',$this->input->post('premise_address'));
                $ar37 = implode(',',$this->input->post('premise_officer_name'));
                $ar38 = implode(',',$this->input->post('premise_telephone_business'));
                $ar39 = implode(',',$this->input->post('premise_telephone_mobile'));
                $ar40 = implode(',',$this->input->post('premise_fax'));
                $ar41 = implode(',',$this->input->post('premise_email'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                
                $data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('project_title'),
                    'checklist_form' => $this->input->post('checklist_form'),
                    'checklist_coverletter' => $this->input->post('checklist_coverletter'),
                    'checklist_IBC' => $this->input->post('checklist_IBC'),
                    'checklist_IBC_report' => $this->input->post('checklist_IBC_report'),
                    'checklist_clearance' => $this->input->post('checklist_clearance'),
                    'checklist_CBI' => $this->input->post('checklist_CBI'),
                    'checklist_CBI_submit' => $this->input->post('checklist_CBI_submit'),
                    'checklist_support' => $this->input->post('checklist_support'),
                    'checklist_RnD' => $this->input->post('checklist_RnD'),
                    'organization' => $this->input->post('organization'),
                    'applicant_name_PI' => $this->input->post('applicant_name_PI'),
                    'position' => $this->input->post('position'),
                    'telephone_office' => $this->input->post('telephone_office'),
                    'telephone_mobile' => $this->input->post('telephone_mobile'),
                    'fax' => $this->input->post('fax'),
                    'email_address' => $this->input->post('email_address'),
                    'postal_address' => $this->input->post('postal_address'),
                    'project_title2' => $this->input->post('project_title2'),
                    'IBC_project_identification_no' => $this->input->post('IBC_project_identification_no'),
                    'notified_first' => $this->input->post('notified_first'),
                    'NBB_reference ' => $this->input->post('NBB_reference'),
                    'NBB_difference ' => $this->input->post('NBB_difference '),
                    'importer_organization' => $this->input->post('importer_organization'),
                    'importer_contact_person' => $this->input->post('importer_contact_person'),
                    'importer_position' => $this->input->post('importer_position'),
                    'importer_telephone_office' => $this->input->post('importer_telephone_office'),
                    'importer_telephone_mobile' => $this->input->post('importer_telephone_mobile'),
                    'importer_email_address' => $this->input->post('importer_email_address'),
                    'importer_postal_address' => $this->input->post('importer_postal_address'),
                    'IBC_organization_name' => $this->input->post('IBC_organization_name'),
                    'IBC_chairperson' => $this->input->post('IBC_chairperson'),
                    'IBC_telephone_number' => $this->input->post('IBC_telephone_number'),
                    'IBC_fax' => $this->input->post('IBC_fax'),
                    'IBC_email_address' => $this->input->post('IBC_email_address'),
                    'IBC_PI_name' => $this->input->post('IBC_PI_name'),
                    'IBC_project_title' => $this->input->post('IBC_project_title'),
                    'IBC_date' => $this->input->post('IBC_date'),
                    'IBC_adequate' => $this->input->post('IBC_adequate'),
                    'IBC_checklist_activities' => $this->input->post('IBC_checklist_activities'),
                    'IBC_checklist_description' => $this->input->post('IBC_checklist_description'),
                    'IBC_checklist_emergency_response' => $this->input->post('IBC_checklist_emergency_response'),
                    'IBC_checklist_trained' => $this->input->post('IBC_checklist_trained'),
                    'IBC_form_approved' => $this->input->post('IBC_form_approved'),
                    'IBC_biosafety_approved' => $this->input->post('IBC_biosafety_approved'),
                    'signature_statutory_endorsed' => $this->input->post('signature_statutory_endorsed'),
                    'signature_statutory_applicant_free' => $this->input->post('signature_statutory_applicant_free'),
                    'applicant_PI_signature_date' => $this->input->post('applicant_PI_signature_date'),
                    'applicant_PI_signature_name' => $this->input->post('applicant_PI_signature_name'),
                    'applicant_PI_signature_stamp' => $this->input->post('applicant_PI_signature_stamp'),
                    'IBC_chairperson_signature_date' => $this->input->post('IBC_chairperson_signature_date'),
                    'IBC_chairperson_signature_name' => $this->input->post('IBC_chairperson_signature_name'),
                    'IBC_chairperson_signature_stamp' => $this->input->post('IBC_chairperson_signature_stamp'),
                    'organization_representative_signature_date' => $this->input->post('organization_representative_signature_date'),
                    'organization_representative_signature_name' => $this->input->post('organization_representative_signature_name'),
                    'organization_representative_signature_stamp' => $this->input->post('organization_representative_signature_stamp'),
                    'project_team_name' => $ar1,
                    'project_team_address' => $ar2,
                    'project_team_telephone_number' => $ar3,
                    'project_team_email_address' => $ar4,
                    'project_team_qualification' => $ar5,
                    'project_team_designation' => $ar6,
                    'project_intro_objective' => $this->input->post('project_intro_objective'),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics'),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement'),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion'),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date'),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment'),
                    'LMO_desc_name_parent' => $ar7,
                    'LMO_desc_name_donor' => $ar8,
                    'LMO_desc_method' => $ar9,
                    'LMO_desc_class' => $ar10,
                    'LMO_desc_trait' => $ar11,
                    'LMO_desc_genes_function' => $ar12,
                    'risk_assessment_genes_potential_hazard' => $ar13,
                    'risk_assessment_genes_comments' => $ar14,
                    'risk_assessment_genes_management' => $ar15,
                    'risk_assessment_genes_residual' => $ar16,
                    'risk_assessment_admin_potential_hazard' => $ar17,
                    'risk_assessment_admin_comments' => $ar18,
                    'risk_assessment_admin_management' => $ar19,
                    'risk_assessment_admin_residual' => $ar20,
                    'risk_assessment_containment_potential_hazard' => $ar21,
                    'risk_assessment_containment_comments' => $ar22,
                    'risk_assessment_containment_management' => $ar23,
                    'risk_assessment_containment_residual' => $ar24,
                    'risk_assessment_special_potential_hazard' => $ar25,
                    'risk_assessment_special_comments' => $ar26,
                    'risk_assessment_special_management' => $ar27,
                    'risk_assessment_special_residual' => $ar28,
                    'risk_management_transport' => $this->input->post('risk_management_transport'),
                    'risk_management_disposed' => $this->input->post('risk_management_disposed'),
                    'risk_management_wastes' => $this->input->post('risk_management_wastes'),
                    'risk_management_wastewater' => $this->input->post('risk_management_wastewater'),
                    'risk_management_decontaminated' => $this->input->post('risk_management_decontaminated'),
                    'risk_response_environment' => $this->input->post('risk_response_environment'),
                    'risk_response_plan' => $this->input->post('risk_response_plan'),
                    'risk_response_disposal' => $this->input->post('risk_response_disposal'),
                    'risk_response_isolation' => $this->input->post('risk_response_isolation'),
                    'risk_response_contigency' => $this->input->post('risk_response_contigency'),
                    'premise_name' => $ar29,
                    'premise_type' => $ar30,
                    'premise_BSL' => $ar31,
                    'premise_IBC' => $ar32,
                    'premise_IBC_date' => $ar33,
                    'premise_certification_date' => $ar34,
                    'premise_certification_no' => $ar35,
                    'premise_address' => $ar36,
                    'premise_officer_name' => $ar37,
                    'premise_telephone_business' => $ar38,
                    'premise_telephone_mobile' => $ar39,
                    'premise_fax' => $ar40,
                    'premise_email' => $ar41,
                    'confidential_description' => $this->input->post('confidential_description'),
                    'reference_description' => $this->input->post('reference_description'),
                    'editable' => $editableValue
                    
                    
                );
                
                
                if($this->forme_model->update_applicant_data($appID, $data)){
                    
                    $this->notification_model->insert_new_notification(null, 4, "Form E Application Updated", "The following user has updated a Form E: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Form has been successfully updated!</div>', $data);
                    
                   redirect('history/index');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('history/index');
                    
                    
                    
                }
                
            }
            
        }
        
        public function fullname_check($str) {
            
            if (!preg_match('/^([a-z0-9 ])+$/i', $str)) {
                $this->form_validation->set_message('fullname_check', 'The %s field can only be alphanumerical and not empty');
                return FALSE;
            } else {
                return TRUE;
            }

        }
        
    }
?>