<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class lmoproj extends CI_Controller{
        
    function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->model('project_model');
        $this->load->model('notification_model');
        $this->load->model('annex2_model');
        $this->load->model('forme_model');
        $this->load->model('pc1_model');
        $this->load->model('pc2_model');
        $this->load->model('hirarc_model');
        $this->load->model('swp_model');
        
    }
		
		public function index(){
			 $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $save = $this->input->post('saveButton');
            $submit = $this->input->post('submitButton');
            $proj_id = $this->session->userdata("projectId");
            $saveStatus = "saved";
            $submitStatus = "submitted";
            $projectSave = 'saved';
            $projectSubmit = 'submitted';
            $this->form_validation->set_rules('project_title', 'Title', 'required');
            
            if($this->form_validation->run() == FALSE){
                
                $this->load->template('lmoproj_view', $data);
                
            }else{
                
                if(isset($save)){
                    
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|pdf|zip';
                    $config['overwrite'] = true;
            

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if(!empty($_FILES['project_intro_activities'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_activities']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_activities')){
                            $project_intro_activities = $this->upload->data();
                            $project_activities = $project_intro_activities['file_name'];
                            
                        }else{
                            
                            $project_activities = null;
                        }
                        
                    }
                    
                    
                    
                    if(!empty($_FILES['project_intro_duration'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_duration']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_duration')){
                            $project_intro_duration = $this->upload->data();
                            $project_duration = $project_intro_duration['file_name'];
                        }else{
                            $project_duration = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['applicant_PI_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['applicant_PI_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('applicant_PI_signature_file')){
                            $applicant_PI_signature_file = $this->upload->data();
                            $applicant_signature = $applicant_PI_signature_file['file_name'];
                        }else{
                            $applicant_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['IBC_chairperson_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['IBC_chairperson_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('IBC_chairperson_signature_file')){
                            $IBC_chairperson_signature_file = $this->upload->data();
                            $IBC_signature = $IBC_chairperson_signature_file['file_name'];
                        }else{
                            $IBC_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['organization_representative_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['organization_representative_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('organization_representative_signature_file')){
                            $organization_representative_signature_file = $this->upload->data();
                            $organization_signature = $organization_representative_signature_file['file_name'];
                        }else{
                            $organization_signature = null;
                        }
                    }
                    
                
                
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved', TRUE));
                $ar2 = implode(',',$this->input->post('personnel_designation', TRUE));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name', TRUE));
                $ar4 = implode(',',$this->input->post('project_team_address', TRUE));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number', TRUE));
                $ar6 = implode(',',$this->input->post('project_team_email_address', TRUE));
                $ar7 = implode(',',$this->input->post('project_team_qualification', TRUE));
                $ar8 = implode(',',$this->input->post('project_team_designation', TRUE));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent', TRUE));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor', TRUE));
                $ar11= implode(',',$this->input->post('LMO_desc_method', TRUE));
                $ar12 = implode(',',$this->input->post('LMO_desc_class', TRUE));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait', TRUE));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function', TRUE));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard', TRUE));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments', TRUE));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management', TRUE));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual', TRUE));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard, TRUE'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments', TRUE));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management', TRUE));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual', TRUE));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard', TRUE));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments', TRUE));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management', TRUE));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual', TRUE));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard', TRUE));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments', TRUE));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management', TRUE));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual', TRUE));
                $ar31 = implode(',',$this->input->post('premise_name', TRUE));
                $ar32 = implode(',',$this->input->post('premise_type', TRUE));
                $ar33 = implode(',',$this->input->post('premise_BSL', TRUE));
                $ar34 = implode(',',$this->input->post('premise_IBC', TRUE));
                $ar35 = implode(',',$this->input->post('premise_IBC_date', TRUE));
                $ar36 = implode(',',$this->input->post('premise_certification_date', TRUE));
                $ar37 = implode(',',$this->input->post('premise_certification_no', TRUE));
                $report = implode(',',$this->input->post('premise_certification_report', TRUE));
                $ar38 = implode(',',$this->input->post('premise_address', TRUE));
                $ar39 = implode(',',$this->input->post('premise_officer_name', TRUE));
                $ar40 = implode(',',$this->input->post('premise_telephone_business', TRUE));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile', TRUE));
                $ar42 = implode(',',$this->input->post('premise_fax', TRUE));
                $ar43 = implode(',',$this->input->post('premise_email', TRUE));
                $numGenes = implode(',',$this->input->post('LMO_num_gene', TRUE));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification', TRUE));
                $ar45 = implode(',',$this->input->post('project_add_name', TRUE));
                $ar46 = implode(',',$this->input->post('project_add_department', TRUE));
                $ar47 = implode(',',$this->input->post('project_add_campus', TRUE));
                $ar48 = implode(',',$this->input->post('project_add_postal_address', TRUE));
                $ar49 = implode(',',$this->input->post('project_add_telephone', TRUE));
                $ar50 = implode(',',$this->input->post('project_add_fax', TRUE));
                $ar51 = implode(',',$this->input->post('project_add_email_address', TRUE));
                $ar52 = implode(',',$this->input->post('project_add_title', TRUE));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification', TRUE));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name', TRUE));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department', TRUE));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus', TRUE));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address', TRUE));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone', TRUE));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax', TRUE));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address', TRUE));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title', TRUE));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name', TRUE),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address', TRUE),
                    'collaborating_partners' => $this->input->post('collaborating_partners', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology', TRUE),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms', TRUE),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms', TRUE),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits', TRUE),
                    'premises' => $this->input->post('premises', TRUE),
                    'period' => $this->input->post('period', TRUE),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management', TRUE),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan', TRUE),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation', TRUE),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise', TRUE),
                    'PI_training' => $this->input->post('PI_training', TRUE),
                    'PI_health' => $this->input->post('PI_health', TRUE),
                    'PI_other' => $this->input->post('PI_other', TRUE),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name', TRUE),
                    'IBC_date' => $this->input->post('IBC_date', TRUE),
                    'status' => $saveStatus
                    //End Of Annex 2 Submission
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title', TRUE),
                    'project_id' => $proj_id,
                    'NBB_reference_no' => $this->input->post('NBB_reference_no', TRUE),
                    'checklist_form' => $this->input->post('checklist_form', TRUE),
                    'checklist_coverletter' => $this->input->post('checklist_coverletter', TRUE),
                    'checklist_IBC' => $this->input->post('checklist_IBC', TRUE),
                    'checklist_IBC_report' => $this->input->post('checklist_IBC_report', TRUE),
                    'checklist_clearance' => $this->input->post('checklist_clearance', TRUE),
                    'checklist_CBI' => $this->input->post('checklist_CBI', TRUE),
                    'checklist_CBI_submit' => $this->input->post('checklist_CBI_submit', TRUE),
                    'checklist_support' => $this->input->post('checklist_support', TRUE),
                    'checklist_RnD' => $this->input->post('checklist_RnD', TRUE),
                    'organization' => $this->input->post('organization', TRUE),
                    'applicant_name_PI' => $this->input->post('applicant_name_PI', TRUE),
                    'position' => $this->input->post('position', TRUE),
                    'telephone_office' => $this->input->post('telephone_office', TRUE),
                    'telephone_mobile' => $this->input->post('telephone_mobile', TRUE),
                    'fax' => $this->input->post('fax', TRUE),
                    'email_address' => $this->input->post('email_address', TRUE),
                    'postal_address' => $this->input->post('postal_address', TRUE),
                    'project_title2' => $this->input->post('project_title2', TRUE),
                    'IBC_project_identification_no' => $this->input->post('IBC_project_identification_no', TRUE),
                    'notified_first' => $this->input->post('notified_first', TRUE),
                    'NBB_reference ' => $this->input->post('NBB_reference', TRUE),
                    'NBB_difference ' => $this->input->post('NBB_difference', TRUE),
                    'importer_organization' => $this->input->post('importer_organization', TRUE),
                    'importer_contact_person' => $this->input->post('importer_contact_person', TRUE),
                    'importer_position' => $this->input->post('importer_position', TRUE),
                    'importer_telephone_office' => $this->input->post('importer_telephone_office', TRUE),
                    'importer_telephone_mobile' => $this->input->post('importer_telephone_mobile', TRUE),
                    'importer_fax' => $this->input->post('importer_fax', TRUE),
                    'importer_email_address' => $this->input->post('importer_email_address', TRUE),
                    'importer_postal_address' => $this->input->post('importer_postal_address', TRUE),
                    'IBC_organization_name' => $this->input->post('IBC_organization_name', TRUE),
                    'IBC_chairperson' => $this->input->post('IBC_chairperson', TRUE),
                    'IBC_telephone_number' => $this->input->post('IBC_telephone_number', TRUE),
                    'IBC_fax' => $this->input->post('IBC_fax', TRUE),
                    'IBC_email_address' => $this->input->post('IBC_email_address', TRUE),
                    'IBC_PI_name' => $this->input->post('IBC_PI_name', TRUE),
                    'IBC_project_title' => $this->input->post('IBC_project_title', TRUE),
                    'IBC_date' => $this->input->post('forme_IBC_date', TRUE),
                    'IBC_adequate' => $this->input->post('IBC_adequate', TRUE),
                    'IBC_checklist_activities' => $this->input->post('IBC_checklist_activities', TRUE),
                    'IBC_checklist_description' => $this->input->post('IBC_checklist_description', TRUE),
                    'IBC_checklist_emergency_response' => $this->input->post('IBC_checklist_emergency_response', TRUE),
                    'IBC_checklist_trained' => $this->input->post('IBC_checklist_trained', TRUE),
                    'IBC_form_approved' => $this->input->post('IBC_form_approved', TRUE),
                    'IBC_biosafety_approved' => $this->input->post('IBC_biosafety_approved', TRUE),
                    'signature_statutory_endorsed' => $this->input->post('signature_statutory_endorsed', TRUE),
                    'signature_statutory_applicant_free' => $this->input->post('signature_statutory_applicant_free', TRUE),
                    'applicant_PI_signature' => $this->input->post('applicant_PI_signature', TRUE),
                    //'applicant_PI_signature_file' => $applicant_signature,
                    'applicant_PI_signature_date' => $this->input->post('applicant_PI_signature_date', TRUE),
                    'applicant_PI_signature_name' => $this->input->post('applicant_PI_signature_name', TRUE),
                    'applicant_PI_signature_stamp' => $this->input->post('applicant_PI_signature_stamp', TRUE),
                    'IBC_chairperson_signature' => $this->input->post('IBC_chairperson_signature', TRUE),
                    //'IBC_chairperson_signature_file' => $IBC_signature,
                    'IBC_chairperson_signature_date' => $this->input->post('IBC_chairperson_signature_date', TRUE),
                    'IBC_chairperson_signature_name' => $this->input->post('IBC_chairperson_signature_name', TRUE),
                    'IBC_chairperson_signature_stamp' => $this->input->post('IBC_chairperson_signature_stamp', TRUE),
                    'organization_representative_signature' => $this->input->post('organization_representative_signature', TRUE),
                    //'organization_representative_signature_file' => $organization_signature,
                    'organization_representative_signature_date' => $this->input->post('organization_representative_signature_date', TRUE),
                    'organization_representative_signature_name' => $this->input->post('organization_representative_signature_name', TRUE),
                    'organization_representative_signature_stamp' => $this->input->post('organization_representative_signature_stamp', TRUE),
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    //'project_intro_activities' => $project_activities,
                    //'project_intro_duration' => $project_duration,
                    'project_intro_objective' => $this->input->post('project_intro_objective', TRUE),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics', TRUE),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement', TRUE),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion', TRUE),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date', TRUE),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment', TRUE),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
                    'LMO_num_gene' => $numGenes,
                    'LMO_desc_genes_function' => $ar14,
                    'risk_assessment_genes_potential_hazard' => $ar15,
                    'risk_assessment_genes_comments' => $ar16,
                    'risk_assessment_genes_management' => $ar17,
                    'risk_assessment_genes_residual' => $ar18,
                    'risk_assessment_admin_potential_hazard' => $ar19,
                    'risk_assessment_admin_comments' => $ar20,
                    'risk_assessment_admin_management' => $ar21,
                    'risk_assessment_admin_residual' => $ar22,
                    'risk_assessment_containment_potential_hazard' => $ar23,
                    'risk_assessment_containment_comments' => $ar24,
                    'risk_assessment_containment_management' => $ar25,
                    'risk_assessment_containment_residual' => $ar26,
                    'risk_assessment_special_potential_hazard' => $ar27,
                    'risk_assessment_special_comments' => $ar28,
                    'risk_assessment_special_management' => $ar29,
                    'risk_assessment_special_residual' => $ar30,
                    'risk_management_transport' => $this->input->post('risk_management_transport', TRUE),
                    'risk_management_disposed' => $this->input->post('risk_management_disposed', TRUE),
                    'risk_management_wastes' => $this->input->post('risk_management_wastes', TRUE),
                    'risk_management_wastewater' => $this->input->post('risk_management_wastewater', TRUE),
                    'risk_management_decontaminated' => $this->input->post('risk_management_decontaminated', TRUE),
                    'risk_response_environment' => $this->input->post('risk_response_environment', TRUE),
                    'risk_response_plan' => $this->input->post('risk_response_plan', TRUE),
                    'risk_response_disposal' => $this->input->post('risk_response_disposal', TRUE),
                    'risk_response_isolation' => $this->input->post('risk_response_isolation', TRUE),
                    'risk_response_contigency' => $this->input->post('risk_response_contigency', TRUE),
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_certification_report' => $report,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description', TRUE),
                    'reference_description' => $this->input->post('reference_description', TRUE),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc1_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address', TRUE),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a', TRUE),
                    'dealing_type_c' => $this->input->post('dealing_type_c', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'GMO_name' => $this->input->post('GMO_name', TRUE),
                    'GMO_method' => $this->input->post('GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('project_transport', TRUE),
                    'project_disposal' => $this->input->post('project_disposal', TRUE),
                    'project_SOP' => $this->input->post('project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no', TRUE),
                    'pc1_officer_notified' => $this->input->post('pc1_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('laboratory_manager', TRUE),
                    'status' => $saveStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('pc2_date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc2_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address', TRUE),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a', TRUE),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa', TRUE),
                    'dealing_type_b' => $this->input->post('dealing_type_b', TRUE),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c', TRUE),
                    'dealing_type_d' => $this->input->post('dealing_type_d', TRUE),
                    'dealing_type_e' => $this->input->post('dealing_type_e', TRUE),
                    'dealing_type_f' => $this->input->post('dealing_type_f', TRUE),
                    'dealing_type_g' => $this->input->post('dealing_type_g', TRUE),
                    'dealing_type_h' => $this->input->post('dealing_type_h', TRUE),
                    'dealing_type_i' => $this->input->post('dealing_type_i', TRUE),
                    'dealing_type_j' => $this->input->post('dealing_type_j', TRUE),
                    'dealing_type_k' => $this->input->post('dealing_type_k', TRUE),
                    'dealing_type_l' => $this->input->post('dealing_type_l', TRUE),
                    'dealing_type_m' => $this->input->post('dealing_type_m', TRUE),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name', TRUE),
                    'GMO_method' => $this->input->post('pc2_GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('pc2_project_transport', TRUE),
                    'project_disposal' => $this->input->post('pc2_project_disposal', TRUE),
                    'project_SOP' => $this->input->post('pc2_project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no', TRUE),
                    'officer_notified' => $this->input->post('pc1_officer_notified, TRUE'),
                    'officer_name' => $this->input->post('pc2_officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager, TRUE'),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                    
                    if ($project_activities != null){
                        $formeData = $formeData + array(
                            'project_intro_activities' => $project_activities
                        );
                    }
                    
                    if ($project_duration != null){
                        $formeData = $formeData + array(
                            'project_intro_duration' => $project_duration
                        );
                    }
                    
                    if ($applicant_signature != null){
                        $formeData = $formeData + array(
                            'applicant_PI_signature_file' => $applicant_signature
                        );
                    }
                    
                    if ($IBC_signature != null){
                        $formeData = $formeData + array(
                            'IBC_chairperson_signature_file' => $IBC_signature
                        );
                    }
                    
                    if ($organization_signature != null){
                        $formeData = $formeData + array(
                            'organization_representative_signature_file' => $organization_signature
                        );
                    }
                    
                    if($this->annex2_model->insert_new_applicant_data($annex2Data) && $this->forme_model->insert_new_applicant_data($formeData) && $this->pc1_model->insert_new_applicant_data($pc1Data) && $this->pc2_model->insert_new_applicant_data($pc2Data) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                    {
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $annex2Data);
                        redirect('home/index');
                    
                        $this->session->unset_userdata('projectId');
                    
                        
                    } else {
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                        redirect('home/index');
  
                    }
                    
                    
                }
                elseif(isset($submit)){
                    
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|pdf|zip';
                    $config['overwrite'] = true;
            

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if(!empty($_FILES['project_intro_activities'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_activities']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_activities')){
                            $project_intro_activities = $this->upload->data();
                            $project_activities = $project_intro_activities['file_name'];
                            
                        }else{
                            
                            $project_activities = null;
                        }
                        
                    }
                    
                    
                    
                    if(!empty($_FILES['project_intro_duration'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_duration']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_duration')){
                            $project_intro_duration = $this->upload->data();
                            $project_duration = $project_intro_duration['file_name'];
                        }else{
                            $project_duration = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['applicant_PI_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['applicant_PI_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('applicant_PI_signature_file')){
                            $applicant_PI_signature_file = $this->upload->data();
                            $applicant_signature = $applicant_PI_signature_file['file_name'];
                        }else{
                            $applicant_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['IBC_chairperson_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['IBC_chairperson_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('IBC_chairperson_signature_file')){
                            $IBC_chairperson_signature_file = $this->upload->data();
                            $IBC_signature = $IBC_chairperson_signature_file['file_name'];
                        }else{
                            $IBC_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['organization_representative_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['organization_representative_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('organization_representative_signature_file')){
                            $organization_representative_signature_file = $this->upload->data();
                            $organization_signature = $organization_representative_signature_file['file_name'];
                        }else{
                            $organization_signature = null;
                        }
                    }
                
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved', TRUE));
                $ar2 = implode(',',$this->input->post('personnel_designation', TRUE));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name', TRUE));
                $ar4 = implode(',',$this->input->post('project_team_address', TRUE));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number', TRUE));
                $ar6 = implode(',',$this->input->post('project_team_email_address', TRUE));
                $ar7 = implode(',',$this->input->post('project_team_qualification', TRUE));
                $ar8 = implode(',',$this->input->post('project_team_designation', TRUE));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent', TRUE));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor', TRUE));
                $ar11= implode(',',$this->input->post('LMO_desc_method', TRUE));
                $ar12 = implode(',',$this->input->post('LMO_desc_class', TRUE));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait', TRUE));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function', TRUE));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard', TRUE));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments', TRUE));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management', TRUE));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual', TRUE));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard, TRUE'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments', TRUE));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management', TRUE));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual', TRUE));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard', TRUE));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments', TRUE));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management', TRUE));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual', TRUE));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard', TRUE));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments', TRUE));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management', TRUE));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual', TRUE));
                $ar31 = implode(',',$this->input->post('premise_name', TRUE));
                $ar32 = implode(',',$this->input->post('premise_type', TRUE));
                $ar33 = implode(',',$this->input->post('premise_BSL', TRUE));
                $ar34 = implode(',',$this->input->post('premise_IBC', TRUE));
                $ar35 = implode(',',$this->input->post('premise_IBC_date', TRUE));
                $ar36 = implode(',',$this->input->post('premise_certification_date', TRUE));
                $ar37 = implode(',',$this->input->post('premise_certification_no', TRUE));
                $report = implode(',',$this->input->post('premise_certification_report', TRUE));
                $ar38 = implode(',',$this->input->post('premise_address', TRUE));
                $ar39 = implode(',',$this->input->post('premise_officer_name', TRUE));
                $ar40 = implode(',',$this->input->post('premise_telephone_business', TRUE));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile', TRUE));
                $ar42 = implode(',',$this->input->post('premise_fax', TRUE));
                $ar43 = implode(',',$this->input->post('premise_email', TRUE));
                $numGenes = implode(',',$this->input->post('LMO_num_gene', TRUE));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification', TRUE));
                $ar45 = implode(',',$this->input->post('project_add_name', TRUE));
                $ar46 = implode(',',$this->input->post('project_add_department', TRUE));
                $ar47 = implode(',',$this->input->post('project_add_campus', TRUE));
                $ar48 = implode(',',$this->input->post('project_add_postal_address', TRUE));
                $ar49 = implode(',',$this->input->post('project_add_telephone', TRUE));
                $ar50 = implode(',',$this->input->post('project_add_fax', TRUE));
                $ar51 = implode(',',$this->input->post('project_add_email_address', TRUE));
                $ar52 = implode(',',$this->input->post('project_add_title', TRUE));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification', TRUE));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name', TRUE));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department', TRUE));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus', TRUE));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address', TRUE));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone', TRUE));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax', TRUE));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address', TRUE));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title', TRUE));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name', TRUE),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address', TRUE),
                    'collaborating_partners' => $this->input->post('collaborating_partners', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology', TRUE),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms', TRUE),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms', TRUE),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits', TRUE),
                    'premises' => $this->input->post('premises', TRUE),
                    'period' => $this->input->post('period', TRUE),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management', TRUE),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan', TRUE),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation', TRUE),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise', TRUE),
                    'PI_training' => $this->input->post('PI_training', TRUE),
                    'PI_health' => $this->input->post('PI_health', TRUE),
                    'PI_other' => $this->input->post('PI_other', TRUE),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name', TRUE),
                    'IBC_date' => $this->input->post('IBC_date', TRUE),
                    'status' => $submitStatus
                    //End Of Annex 2 Submission
                    
                    
                );
                
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title', TRUE),
                    'project_id' => $proj_id,
                    'NBB_reference_no' => $this->input->post('NBB_reference_no', TRUE),
                    'checklist_form' => $this->input->post('checklist_form', TRUE),
                    'checklist_coverletter' => $this->input->post('checklist_coverletter', TRUE),
                    'checklist_IBC' => $this->input->post('checklist_IBC', TRUE),
                    'checklist_IBC_report' => $this->input->post('checklist_IBC_report', TRUE),
                    'checklist_clearance' => $this->input->post('checklist_clearance', TRUE),
                    'checklist_CBI' => $this->input->post('checklist_CBI', TRUE),
                    'checklist_CBI_submit' => $this->input->post('checklist_CBI_submit', TRUE),
                    'checklist_support' => $this->input->post('checklist_support', TRUE),
                    'checklist_RnD' => $this->input->post('checklist_RnD', TRUE),
                    'organization' => $this->input->post('organization', TRUE),
                    'applicant_name_PI' => $this->input->post('applicant_name_PI', TRUE),
                    'position' => $this->input->post('position', TRUE),
                    'telephone_office' => $this->input->post('telephone_office', TRUE),
                    'telephone_mobile' => $this->input->post('telephone_mobile', TRUE),
                    'fax' => $this->input->post('fax', TRUE),
                    'email_address' => $this->input->post('email_address', TRUE),
                    'postal_address' => $this->input->post('postal_address', TRUE),
                    'project_title2' => $this->input->post('project_title2', TRUE),
                    'IBC_project_identification_no' => $this->input->post('IBC_project_identification_no', TRUE),
                    'notified_first' => $this->input->post('notified_first', TRUE),
                    'NBB_reference ' => $this->input->post('NBB_reference', TRUE),
                    'NBB_difference ' => $this->input->post('NBB_difference', TRUE),
                    'importer_organization' => $this->input->post('importer_organization', TRUE),
                    'importer_contact_person' => $this->input->post('importer_contact_person', TRUE),
                    'importer_position' => $this->input->post('importer_position', TRUE),
                    'importer_telephone_office' => $this->input->post('importer_telephone_office', TRUE),
                    'importer_telephone_mobile' => $this->input->post('importer_telephone_mobile', TRUE),
                    'importer_fax' => $this->input->post('importer_fax', TRUE),
                    'importer_email_address' => $this->input->post('importer_email_address', TRUE),
                    'importer_postal_address' => $this->input->post('importer_postal_address', TRUE),
                    'IBC_organization_name' => $this->input->post('IBC_organization_name', TRUE),
                    'IBC_chairperson' => $this->input->post('IBC_chairperson', TRUE),
                    'IBC_telephone_number' => $this->input->post('IBC_telephone_number', TRUE),
                    'IBC_fax' => $this->input->post('IBC_fax', TRUE),
                    'IBC_email_address' => $this->input->post('IBC_email_address', TRUE),
                    'IBC_PI_name' => $this->input->post('IBC_PI_name', TRUE),
                    'IBC_project_title' => $this->input->post('IBC_project_title', TRUE),
                    'IBC_date' => $this->input->post('forme_IBC_date', TRUE),
                    'IBC_adequate' => $this->input->post('IBC_adequate', TRUE),
                    'IBC_checklist_activities' => $this->input->post('IBC_checklist_activities', TRUE),
                    'IBC_checklist_description' => $this->input->post('IBC_checklist_description', TRUE),
                    'IBC_checklist_emergency_response' => $this->input->post('IBC_checklist_emergency_response', TRUE),
                    'IBC_checklist_trained' => $this->input->post('IBC_checklist_trained', TRUE),
                    'IBC_form_approved' => $this->input->post('IBC_form_approved', TRUE),
                    'IBC_biosafety_approved' => $this->input->post('IBC_biosafety_approved', TRUE),
                    'signature_statutory_endorsed' => $this->input->post('signature_statutory_endorsed', TRUE),
                    'signature_statutory_applicant_free' => $this->input->post('signature_statutory_applicant_free', TRUE),
                    'applicant_PI_signature' => $this->input->post('applicant_PI_signature', TRUE),
                    //'applicant_PI_signature_file' => $applicant_signature,
                    'applicant_PI_signature_date' => $this->input->post('applicant_PI_signature_date', TRUE),
                    'applicant_PI_signature_name' => $this->input->post('applicant_PI_signature_name', TRUE),
                    'applicant_PI_signature_stamp' => $this->input->post('applicant_PI_signature_stamp', TRUE),
                    'IBC_chairperson_signature' => $this->input->post('IBC_chairperson_signature', TRUE),
                    //'IBC_chairperson_signature_file' => $IBC_signature,
                    'IBC_chairperson_signature_date' => $this->input->post('IBC_chairperson_signature_date', TRUE),
                    'IBC_chairperson_signature_name' => $this->input->post('IBC_chairperson_signature_name', TRUE),
                    'IBC_chairperson_signature_stamp' => $this->input->post('IBC_chairperson_signature_stamp', TRUE),
                    'organization_representative_signature' => $this->input->post('organization_representative_signature', TRUE),
                    //'organization_representative_signature_file' => $organization_signature,
                    'organization_representative_signature_date' => $this->input->post('organization_representative_signature_date', TRUE),
                    'organization_representative_signature_name' => $this->input->post('organization_representative_signature_name', TRUE),
                    'organization_representative_signature_stamp' => $this->input->post('organization_representative_signature_stamp', TRUE),
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    //'project_intro_activities' => $project_activities,
                    //'project_intro_duration' => $project_duration,
                    'project_intro_objective' => $this->input->post('project_intro_objective', TRUE),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics', TRUE),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement', TRUE),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion', TRUE),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date', TRUE),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment', TRUE),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
                    'LMO_num_gene' => $numGenes,
                    'LMO_desc_genes_function' => $ar14,
                    'risk_assessment_genes_potential_hazard' => $ar15,
                    'risk_assessment_genes_comments' => $ar16,
                    'risk_assessment_genes_management' => $ar17,
                    'risk_assessment_genes_residual' => $ar18,
                    'risk_assessment_admin_potential_hazard' => $ar19,
                    'risk_assessment_admin_comments' => $ar20,
                    'risk_assessment_admin_management' => $ar21,
                    'risk_assessment_admin_residual' => $ar22,
                    'risk_assessment_containment_potential_hazard' => $ar23,
                    'risk_assessment_containment_comments' => $ar24,
                    'risk_assessment_containment_management' => $ar25,
                    'risk_assessment_containment_residual' => $ar26,
                    'risk_assessment_special_potential_hazard' => $ar27,
                    'risk_assessment_special_comments' => $ar28,
                    'risk_assessment_special_management' => $ar29,
                    'risk_assessment_special_residual' => $ar30,
                    'risk_management_transport' => $this->input->post('risk_management_transport', TRUE),
                    'risk_management_disposed' => $this->input->post('risk_management_disposed', TRUE),
                    'risk_management_wastes' => $this->input->post('risk_management_wastes', TRUE),
                    'risk_management_wastewater' => $this->input->post('risk_management_wastewater', TRUE),
                    'risk_management_decontaminated' => $this->input->post('risk_management_decontaminated', TRUE),
                    'risk_response_environment' => $this->input->post('risk_response_environment', TRUE),
                    'risk_response_plan' => $this->input->post('risk_response_plan', TRUE),
                    'risk_response_disposal' => $this->input->post('risk_response_disposal', TRUE),
                    'risk_response_isolation' => $this->input->post('risk_response_isolation', TRUE),
                    'risk_response_contigency' => $this->input->post('risk_response_contigency', TRUE),
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_certification_report' => $report,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description', TRUE),
                    'reference_description' => $this->input->post('reference_description', TRUE),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc1_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address', TRUE),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a', TRUE),
                    'dealing_type_c' => $this->input->post('dealing_type_c', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'GMO_name' => $this->input->post('GMO_name', TRUE),
                    'GMO_method' => $this->input->post('GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('project_transport', TRUE),
                    'project_disposal' => $this->input->post('project_disposal', TRUE),
                    'project_SOP' => $this->input->post('project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no', TRUE),
                    'pc1_officer_notified' => $this->input->post('pc1_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('laboratory_manager', TRUE),
                    'status' => $submitStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('pc2_date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc2_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address', TRUE),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a', TRUE),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa', TRUE),
                    'dealing_type_b' => $this->input->post('dealing_type_b', TRUE),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c', TRUE),
                    'dealing_type_d' => $this->input->post('dealing_type_d', TRUE),
                    'dealing_type_e' => $this->input->post('dealing_type_e', TRUE),
                    'dealing_type_f' => $this->input->post('dealing_type_f', TRUE),
                    'dealing_type_g' => $this->input->post('dealing_type_g', TRUE),
                    'dealing_type_h' => $this->input->post('dealing_type_h', TRUE),
                    'dealing_type_i' => $this->input->post('dealing_type_i', TRUE),
                    'dealing_type_j' => $this->input->post('dealing_type_j', TRUE),
                    'dealing_type_k' => $this->input->post('dealing_type_k', TRUE),
                    'dealing_type_l' => $this->input->post('dealing_type_l', TRUE),
                    'dealing_type_m' => $this->input->post('dealing_type_m', TRUE),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name', TRUE),
                    'GMO_method' => $this->input->post('pc2_GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('pc2_project_transport', TRUE),
                    'project_disposal' => $this->input->post('pc2_project_disposal', TRUE),
                    'project_SOP' => $this->input->post('pc2_project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no', TRUE),
                    'officer_notified' => $this->input->post('pc1_officer_notified, TRUE'),
                    'officer_name' => $this->input->post('pc2_officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager, TRUE'),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                    
                    if ($project_activities != null){
                        $formeData = $formeData + array(
                            'project_intro_activities' => $project_activities
                        );
                    }
                    
                    if ($project_duration != null){
                        $formeData = $formeData + array(
                            'project_intro_duration' => $project_duration
                        );
                    }
                    
                    if ($applicant_signature != null){
                        $formeData = $formeData + array(
                            'applicant_PI_signature_file' => $applicant_signature
                        );
                    }
                    
                    if ($IBC_signature != null){
                        $formeData = $formeData + array(
                            'IBC_chairperson_signature_file' => $IBC_signature
                        );
                    }
                    
                    if ($organization_signature != null){
                        $formeData = $formeData + array(
                            'organization_representative_signature_file' => $organization_signature
                        );
                    }
                    
                    if($this->annex2_model->insert_new_applicant_data($annex2Data) && $this->forme_model->insert_new_applicant_data($formeData) && $this->pc1_model->insert_new_applicant_data($pc1Data) && $this->pc2_model->insert_new_applicant_data($pc2Data) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                    {
                    
                        $this->notification_model->insert_new_notification(null, 4, "New Project Application For LMO", "The following user has submitted a new application for LMO: " . $this->session->userdata('account_name'));
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $annex2Data);
                        redirect('home/index');
                    
                        $this->session->unset_userdata('projectId');
                    
                        
                    } else {
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                        redirect('home/index');
                    
                    }
                    
                    
                }
                    
                
            }
        }
            
  
        //load project in disabled state
        public function load_project($proj_id){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('officer_notified', 'Visibility', ' ');
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
            //$id = $this->input->get('id');
            $id = $this->uri->segment(3);
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->annex2_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->forme_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved4'] = $this->pc1_model->get_form_by_project_id($id);
            $data['retrieved5'] = $this->pc2_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);
        
            $this->load->template('lmoproj_view', $data);
        }
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            
            $update = $this->input->post('updateButton');
            $this->form_validation->set_rules('project_title', 'Title', 'required');
            $saveStatus = "saved";
            $submitStatus = "submitted";
            $projectSave = 'saved';
            $projectSubmit = 'submitted';
            $editableValue = 0;
            
            if($this->form_validation->run() == FALSE){
                
                $this->load->template('lmoproj_view', $data);
                
            }else{
                
                if(isset($update)){
                    
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|pdf|zip';
                    $config['overwrite'] = true;
            

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                if(!empty($_FILES['project_intro_activities'])){
                
                    $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_activities']['name'];

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                
                    if($this->upload->do_upload('project_intro_activities')){
                        $project_intro_activities = $this->upload->data();
                        $project_activities = $project_intro_activities['file_name'];
                            
                    }else{
                            
                        $project_activities = null;
                    }
                        
                }
                    
                    
                    
                    if(!empty($_FILES['project_intro_duration'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_duration']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_duration')){
                            $project_intro_duration = $this->upload->data();
                            $project_duration = $project_intro_duration['file_name'];
                        }else{
                            $project_duration = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['applicant_PI_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['applicant_PI_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('applicant_PI_signature_file')){
                            $applicant_PI_signature_file = $this->upload->data();
                            $applicant_signature = $applicant_PI_signature_file['file_name'];
                        }else{
                            $applicant_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['IBC_chairperson_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['IBC_chairperson_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('IBC_chairperson_signature_file')){
                            $IBC_chairperson_signature_file = $this->upload->data();
                            $IBC_signature = $IBC_chairperson_signature_file['file_name'];
                        }else{
                            $IBC_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['organization_representative_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['organization_representative_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('organization_representative_signature_file')){
                            $organization_representative_signature_file = $this->upload->data();
                            $organization_signature = $organization_representative_signature_file['file_name'];
                        }else{
                            $organization_signature = null;
                        }
                    }
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved', TRUE));
                $ar2 = implode(',',$this->input->post('personnel_designation', TRUE));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name', TRUE));
                $ar4 = implode(',',$this->input->post('project_team_address', TRUE));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number', TRUE));
                $ar6 = implode(',',$this->input->post('project_team_email_address', TRUE));
                $ar7 = implode(',',$this->input->post('project_team_qualification', TRUE));
                $ar8 = implode(',',$this->input->post('project_team_designation', TRUE));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent', TRUE));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor', TRUE));
                $ar11= implode(',',$this->input->post('LMO_desc_method', TRUE));
                $ar12 = implode(',',$this->input->post('LMO_desc_class', TRUE));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait', TRUE));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function', TRUE));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard', TRUE));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments', TRUE));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management', TRUE));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual', TRUE));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard, TRUE'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments', TRUE));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management', TRUE));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual', TRUE));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard', TRUE));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments', TRUE));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management', TRUE));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual', TRUE));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard', TRUE));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments', TRUE));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management', TRUE));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual', TRUE));
                $ar31 = implode(',',$this->input->post('premise_name', TRUE));
                $ar32 = implode(',',$this->input->post('premise_type', TRUE));
                $ar33 = implode(',',$this->input->post('premise_BSL', TRUE));
                $ar34 = implode(',',$this->input->post('premise_IBC', TRUE));
                $ar35 = implode(',',$this->input->post('premise_IBC_date', TRUE));
                $ar36 = implode(',',$this->input->post('premise_certification_date', TRUE));
                $ar37 = implode(',',$this->input->post('premise_certification_no', TRUE));
                $report = implode(',',$this->input->post('premise_certification_report', TRUE));
                $ar38 = implode(',',$this->input->post('premise_address', TRUE));
                $ar39 = implode(',',$this->input->post('premise_officer_name', TRUE));
                $ar40 = implode(',',$this->input->post('premise_telephone_business', TRUE));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile', TRUE));
                $ar42 = implode(',',$this->input->post('premise_fax', TRUE));
                $ar43 = implode(',',$this->input->post('premise_email', TRUE));
                $numGenes = implode(',',$this->input->post('LMO_num_gene', TRUE));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification', TRUE));
                $ar45 = implode(',',$this->input->post('project_add_name', TRUE));
                $ar46 = implode(',',$this->input->post('project_add_department', TRUE));
                $ar47 = implode(',',$this->input->post('project_add_campus', TRUE));
                $ar48 = implode(',',$this->input->post('project_add_postal_address', TRUE));
                $ar49 = implode(',',$this->input->post('project_add_telephone', TRUE));
                $ar50 = implode(',',$this->input->post('project_add_fax', TRUE));
                $ar51 = implode(',',$this->input->post('project_add_email_address', TRUE));
                $ar52 = implode(',',$this->input->post('project_add_title', TRUE));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification', TRUE));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name', TRUE));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department', TRUE));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus', TRUE));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address', TRUE));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone', TRUE));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax, TRUE'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address', TRUE));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title', TRUE));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name', TRUE),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address', TRUE),
                    'collaborating_partners' => $this->input->post('collaborating_partners', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology', TRUE),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms', TRUE),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms', TRUE),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits', TRUE),
                    'premises' => $this->input->post('premises', TRUE),
                    'period' => $this->input->post('period', TRUE),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management', TRUE),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan', TRUE),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation', TRUE),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise', TRUE),
                    'PI_training' => $this->input->post('PI_training', TRUE),
                    'PI_health' => $this->input->post('PI_health', TRUE),
                    'PI_other' => $this->input->post('PI_other', TRUE),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name', TRUE),
                    'IBC_date' => $this->input->post('IBC_date', TRUE),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                    //End Of Annex 2 Submission
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title', TRUE),
                    'project_id' => $proj_id,
                    'NBB_reference_no' => $this->input->post('NBB_reference_no', TRUE),
                    'checklist_form' => $this->input->post('checklist_form', TRUE),
                    'checklist_coverletter' => $this->input->post('checklist_coverletter', TRUE),
                    'checklist_IBC' => $this->input->post('checklist_IBC', TRUE),
                    'checklist_IBC_report' => $this->input->post('checklist_IBC_report', TRUE),
                    'checklist_clearance' => $this->input->post('checklist_clearance', TRUE),
                    'checklist_CBI' => $this->input->post('checklist_CBI', TRUE),
                    'checklist_CBI_submit' => $this->input->post('checklist_CBI_submit', TRUE),
                    'checklist_support' => $this->input->post('checklist_support', TRUE),
                    'checklist_RnD' => $this->input->post('checklist_RnD', TRUE),
                    'organization' => $this->input->post('organization', TRUE),
                    'applicant_name_PI' => $this->input->post('applicant_name_PI', TRUE),
                    'position' => $this->input->post('position', TRUE),
                    'telephone_office' => $this->input->post('telephone_office', TRUE),
                    'telephone_mobile' => $this->input->post('telephone_mobile', TRUE),
                    'fax' => $this->input->post('fax', TRUE),
                    'email_address' => $this->input->post('email_address', TRUE),
                    'postal_address' => $this->input->post('postal_address', TRUE),
                    'project_title2' => $this->input->post('project_title2', TRUE),
                    'IBC_project_identification_no' => $this->input->post('IBC_project_identification_no', TRUE),
                    'notified_first' => $this->input->post('notified_first', TRUE),
                    'NBB_reference ' => $this->input->post('NBB_reference', TRUE),
                    'NBB_difference ' => $this->input->post('NBB_difference', TRUE),
                    'importer_organization' => $this->input->post('importer_organization', TRUE),
                    'importer_contact_person' => $this->input->post('importer_contact_person', TRUE),
                    'importer_position' => $this->input->post('importer_position', TRUE),
                    'importer_telephone_office' => $this->input->post('importer_telephone_office', TRUE),
                    'importer_telephone_mobile' => $this->input->post('importer_telephone_mobile', TRUE),
                    'importer_fax' => $this->input->post('importer_fax', TRUE),
                    'importer_email_address' => $this->input->post('importer_email_address', TRUE),
                    'importer_postal_address' => $this->input->post('importer_postal_address', TRUE),
                    'IBC_organization_name' => $this->input->post('IBC_organization_name', TRUE),
                    'IBC_chairperson' => $this->input->post('IBC_chairperson', TRUE),
                    'IBC_telephone_number' => $this->input->post('IBC_telephone_number', TRUE),
                    'IBC_fax' => $this->input->post('IBC_fax', TRUE),
                    'IBC_email_address' => $this->input->post('IBC_email_address', TRUE),
                    'IBC_PI_name' => $this->input->post('IBC_PI_name', TRUE),
                    'IBC_project_title' => $this->input->post('IBC_project_title', TRUE),
                    'IBC_date' => $this->input->post('forme_IBC_date', TRUE),
                    'IBC_adequate' => $this->input->post('IBC_adequate', TRUE),
                    'IBC_checklist_activities' => $this->input->post('IBC_checklist_activities', TRUE),
                    'IBC_checklist_description' => $this->input->post('IBC_checklist_description', TRUE),
                    'IBC_checklist_emergency_response' => $this->input->post('IBC_checklist_emergency_response', TRUE),
                    'IBC_checklist_trained' => $this->input->post('IBC_checklist_trained', TRUE),
                    'IBC_form_approved' => $this->input->post('IBC_form_approved', TRUE),
                    'IBC_biosafety_approved' => $this->input->post('IBC_biosafety_approved', TRUE),
                    'signature_statutory_endorsed' => $this->input->post('signature_statutory_endorsed', TRUE),
                    'signature_statutory_applicant_free' => $this->input->post('signature_statutory_applicant_free', TRUE),
                    'applicant_PI_signature' => $this->input->post('applicant_PI_signature', TRUE),
                    //'applicant_PI_signature_file' => $applicant_signature,
                    'applicant_PI_signature_date' => $this->input->post('applicant_PI_signature_date', TRUE),
                    'applicant_PI_signature_name' => $this->input->post('applicant_PI_signature_name', TRUE),
                    'applicant_PI_signature_stamp' => $this->input->post('applicant_PI_signature_stamp', TRUE),
                    'IBC_chairperson_signature' => $this->input->post('IBC_chairperson_signature', TRUE),
                    //'IBC_chairperson_signature_file' => $IBC_signature,
                    'IBC_chairperson_signature_date' => $this->input->post('IBC_chairperson_signature_date', TRUE),
                    'IBC_chairperson_signature_name' => $this->input->post('IBC_chairperson_signature_name', TRUE),
                    'IBC_chairperson_signature_stamp' => $this->input->post('IBC_chairperson_signature_stamp', TRUE),
                    'organization_representative_signature' => $this->input->post('organization_representative_signature', TRUE),
                    //'organization_representative_signature_file' => $organization_signature,
                    'organization_representative_signature_date' => $this->input->post('organization_representative_signature_date', TRUE),
                    'organization_representative_signature_name' => $this->input->post('organization_representative_signature_name', TRUE),
                    'organization_representative_signature_stamp' => $this->input->post('organization_representative_signature_stamp', TRUE),
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    //'project_intro_activities' => $project_activities,
                    //'project_intro_duration' => $project_duration,
                    'project_intro_objective' => $this->input->post('project_intro_objective', TRUE),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics', TRUE),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement', TRUE),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion', TRUE),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date', TRUE),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment', TRUE),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
                    'LMO_num_gene' => $numGenes,
                    'LMO_desc_genes_function' => $ar14,
                    'risk_assessment_genes_potential_hazard' => $ar15,
                    'risk_assessment_genes_comments' => $ar16,
                    'risk_assessment_genes_management' => $ar17,
                    'risk_assessment_genes_residual' => $ar18,
                    'risk_assessment_admin_potential_hazard' => $ar19,
                    'risk_assessment_admin_comments' => $ar20,
                    'risk_assessment_admin_management' => $ar21,
                    'risk_assessment_admin_residual' => $ar22,
                    'risk_assessment_containment_potential_hazard' => $ar23,
                    'risk_assessment_containment_comments' => $ar24,
                    'risk_assessment_containment_management' => $ar25,
                    'risk_assessment_containment_residual' => $ar26,
                    'risk_assessment_special_potential_hazard' => $ar27,
                    'risk_assessment_special_comments' => $ar28,
                    'risk_assessment_special_management' => $ar29,
                    'risk_assessment_special_residual' => $ar30,
                    'risk_management_transport' => $this->input->post('risk_management_transport', TRUE),
                    'risk_management_disposed' => $this->input->post('risk_management_disposed', TRUE),
                    'risk_management_wastes' => $this->input->post('risk_management_wastes', TRUE),
                    'risk_management_wastewater' => $this->input->post('risk_management_wastewater', TRUE),
                    'risk_management_decontaminated' => $this->input->post('risk_management_decontaminated', TRUE),
                    'risk_response_environment' => $this->input->post('risk_response_environment', TRUE),
                    'risk_response_plan' => $this->input->post('risk_response_plan', TRUE),
                    'risk_response_disposal' => $this->input->post('risk_response_disposal', TRUE),
                    'risk_response_isolation' => $this->input->post('risk_response_isolation', TRUE),
                    'risk_response_contigency' => $this->input->post('risk_response_contigency', TRUE),
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_certification_report' => $report,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description', TRUE),
                    'reference_description' => $this->input->post('reference_description', TRUE),
                    'editable' => $editableValue,
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc1_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address', TRUE),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a', TRUE),
                    'dealing_type_c' => $this->input->post('dealing_type_c', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'GMO_name' => $this->input->post('GMO_name', TRUE),
                    'GMO_method' => $this->input->post('GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('project_transport', TRUE),
                    'project_disposal' => $this->input->post('project_disposal', TRUE),
                    'project_SOP' => $this->input->post('project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no', TRUE),
                    'pc1_officer_notified' => $this->input->post('pc1_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('laboratory_manager', TRUE),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('pc2_date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc2_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address', TRUE),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a', TRUE),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa', TRUE),
                    'dealing_type_b' => $this->input->post('dealing_type_b', TRUE),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c', TRUE),
                    'dealing_type_d' => $this->input->post('dealing_type_d', TRUE),
                    'dealing_type_e' => $this->input->post('dealing_type_e', TRUE),
                    'dealing_type_f' => $this->input->post('dealing_type_f', TRUE),
                    'dealing_type_g' => $this->input->post('dealing_type_g', TRUE),
                    'dealing_type_h' => $this->input->post('dealing_type_h', TRUE),
                    'dealing_type_i' => $this->input->post('dealing_type_i', TRUE),
                    'dealing_type_j' => $this->input->post('dealing_type_j', TRUE),
                    'dealing_type_k' => $this->input->post('dealing_type_k', TRUE),
                    'dealing_type_l' => $this->input->post('dealing_type_l', TRUE),
                    'dealing_type_m' => $this->input->post('dealing_type_m', TRUE),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name', TRUE),
                    'GMO_method' => $this->input->post('pc2_GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('pc2_project_transport', TRUE),
                    'project_disposal' => $this->input->post('pc2_project_disposal', TRUE),
                    'project_SOP' => $this->input->post('pc2_project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no', TRUE),
                    'officer_notified' => $this->input->post('pc1_officer_notified, TRUE'),
                    'officer_name' => $this->input->post('pc2_officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager, TRUE'),
                    'editable' => $editableValue,
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                
                if($this->annex2_model->update_applicant_data($appID, $annex2Data) && $this->forme_model->update_applicant_data($appID, $formeData) && $this->pc1_model->update_applicant_data($appID, $pc1Data) && $this->pc2_model->update_applicant_data($appID, $pc2Data) && $this->hirarc_model->update_applicant_data($appID, $hirarcData) && $this->swp_model->update_applicant_data($appID, $swpData) && $this->project_model->update_applicant_data($appID, $editableValue))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $annex2Data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                    
                }
                 
                
            }
            
            
        }
        
        //function for viewing saved projects in saveHistory page
        public function load_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $data['load'] = "true";
            $data['saveload'] = "true";
            
            $id = $this->input->get('id');
            
            $data['appID'] = $id;
            
            $data['retrieved'] = $this->annex2_model->get_form_by_project_id($id);
            $data['retrieved2'] = $this->forme_model->get_form_by_project_id($id);
            $data['retrieved3'] = $this->hirarc_model->get_form_by_project_id($id);
            $data['retrieved4'] = $this->pc1_model->get_form_by_project_id($id);
            $data['retrieved5'] = $this->pc2_model->get_form_by_project_id($id);
            $data['retrieved6'] = $this->swp_model->get_form_by_project_id($id);
        
            $this->load->template('lmoproj_view', $data);
        }
        
        public function delete_saved_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $id = $this->input->get('id');
            $status = "deleted";
            
            
            if($this->project_model->update_proj_status($id, $status))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been removed</div>');
                
                redirect('saveHistory/index');
            }
        
            
        }
        
        //function for continuing working on saved projects
        public function continue(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $save = $this->input->post('saveButton');
            $submit = $this->input->post('submitButton');
            $proj_id = $this->input->post('appid');
            $saveStatus = "saved";
            $submitStatus = "submitted";
            $projectSave = 'saved';
            $projectSubmit = 'submitted';
            $this->form_validation->set_rules('project_title', 'Title', 'required');
            
            
            
            if($this->form_validation->run() == FALSE){
                
                $this->load->template('lmoproj_view', $data);
                
            }else{
                
                if(isset($save)){
                    
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|pdf|zip';
                    $config['overwrite'] = true;
            

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if(!empty($_FILES['project_intro_activities'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_activities']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_activities')){
                            $project_intro_activities = $this->upload->data();
                            $project_activities = $project_intro_activities['file_name'];
                            
                        }else{
                            
                            $project_activities = null;
                        }
                        
                    }
                    
                    
                    
                    if(!empty($_FILES['project_intro_duration'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_duration']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_duration')){
                            $project_intro_duration = $this->upload->data();
                            $project_duration = $project_intro_duration['file_name'];
                        }else{
                            $project_duration = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['applicant_PI_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['applicant_PI_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('applicant_PI_signature_file')){
                            $applicant_PI_signature_file = $this->upload->data();
                            $applicant_signature = $applicant_PI_signature_file['file_name'];
                        }else{
                            $applicant_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['IBC_chairperson_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['IBC_chairperson_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('IBC_chairperson_signature_file')){
                            $IBC_chairperson_signature_file = $this->upload->data();
                            $IBC_signature = $IBC_chairperson_signature_file['file_name'];
                        }else{
                            $IBC_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['organization_representative_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['organization_representative_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('organization_representative_signature_file')){
                            $organization_representative_signature_file = $this->upload->data();
                            $organization_signature = $organization_representative_signature_file['file_name'];
                        }else{
                            $organization_signature = null;
                        }
                    }
                    
                
                
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved', TRUE));
                $ar2 = implode(',',$this->input->post('personnel_designation', TRUE));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name', TRUE));
                $ar4 = implode(',',$this->input->post('project_team_address', TRUE));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number', TRUE));
                $ar6 = implode(',',$this->input->post('project_team_email_address', TRUE));
                $ar7 = implode(',',$this->input->post('project_team_qualification', TRUE));
                $ar8 = implode(',',$this->input->post('project_team_designation', TRUE));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent', TRUE));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor', TRUE));
                $ar11= implode(',',$this->input->post('LMO_desc_method', TRUE));
                $ar12 = implode(',',$this->input->post('LMO_desc_class', TRUE));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait', TRUE));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function', TRUE));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard', TRUE));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments', TRUE));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management', TRUE));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual', TRUE));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard, TRUE'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments', TRUE));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management', TRUE));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual', TRUE));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard', TRUE));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments', TRUE));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management', TRUE));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual', TRUE));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard', TRUE));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments', TRUE));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management', TRUE));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual', TRUE));
                $ar31 = implode(',',$this->input->post('premise_name', TRUE));
                $ar32 = implode(',',$this->input->post('premise_type', TRUE));
                $ar33 = implode(',',$this->input->post('premise_BSL', TRUE));
                $ar34 = implode(',',$this->input->post('premise_IBC', TRUE));
                $ar35 = implode(',',$this->input->post('premise_IBC_date', TRUE));
                $ar36 = implode(',',$this->input->post('premise_certification_date', TRUE));
                $ar37 = implode(',',$this->input->post('premise_certification_no', TRUE));
                $report = implode(',',$this->input->post('premise_certification_report', TRUE));
                $ar38 = implode(',',$this->input->post('premise_address', TRUE));
                $ar39 = implode(',',$this->input->post('premise_officer_name', TRUE));
                $ar40 = implode(',',$this->input->post('premise_telephone_business', TRUE));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile', TRUE));
                $ar42 = implode(',',$this->input->post('premise_fax', TRUE));
                $ar43 = implode(',',$this->input->post('premise_email', TRUE));
                $numGenes = implode(',',$this->input->post('LMO_num_gene', TRUE));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification', TRUE));
                $ar45 = implode(',',$this->input->post('project_add_name', TRUE));
                $ar46 = implode(',',$this->input->post('project_add_department', TRUE));
                $ar47 = implode(',',$this->input->post('project_add_campus', TRUE));
                $ar48 = implode(',',$this->input->post('project_add_postal_address', TRUE));
                $ar49 = implode(',',$this->input->post('project_add_telephone', TRUE));
                $ar50 = implode(',',$this->input->post('project_add_fax', TRUE));
                $ar51 = implode(',',$this->input->post('project_add_email_address', TRUE));
                $ar52 = implode(',',$this->input->post('project_add_title', TRUE));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification', TRUE));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name', TRUE));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department', TRUE));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus', TRUE));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address', TRUE));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone', TRUE));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax, TRUE'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address', TRUE));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title', TRUE));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name', TRUE),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address', TRUE),
                    'collaborating_partners' => $this->input->post('collaborating_partners', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology', TRUE),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms', TRUE),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms', TRUE),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits', TRUE),
                    'premises' => $this->input->post('premises', TRUE),
                    'period' => $this->input->post('period', TRUE),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management', TRUE),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan', TRUE),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation', TRUE),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise', TRUE),
                    'PI_training' => $this->input->post('PI_training', TRUE),
                    'PI_health' => $this->input->post('PI_health', TRUE),
                    'PI_other' => $this->input->post('PI_other', TRUE),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name', TRUE),
                    'IBC_date' => $this->input->post('IBC_date', TRUE),
                    'status' => $saveStatus
                    //End Of Annex 2 Submission
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title', TRUE),
                    'project_id' => $proj_id,
                    'NBB_reference_no' => $this->input->post('NBB_reference_no', TRUE),
                    'checklist_form' => $this->input->post('checklist_form', TRUE),
                    'checklist_coverletter' => $this->input->post('checklist_coverletter', TRUE),
                    'checklist_IBC' => $this->input->post('checklist_IBC', TRUE),
                    'checklist_IBC_report' => $this->input->post('checklist_IBC_report', TRUE),
                    'checklist_clearance' => $this->input->post('checklist_clearance', TRUE),
                    'checklist_CBI' => $this->input->post('checklist_CBI', TRUE),
                    'checklist_CBI_submit' => $this->input->post('checklist_CBI_submit', TRUE),
                    'checklist_support' => $this->input->post('checklist_support', TRUE),
                    'checklist_RnD' => $this->input->post('checklist_RnD', TRUE),
                    'organization' => $this->input->post('organization', TRUE),
                    'applicant_name_PI' => $this->input->post('applicant_name_PI', TRUE),
                    'position' => $this->input->post('position', TRUE),
                    'telephone_office' => $this->input->post('telephone_office', TRUE),
                    'telephone_mobile' => $this->input->post('telephone_mobile', TRUE),
                    'fax' => $this->input->post('fax', TRUE),
                    'email_address' => $this->input->post('email_address', TRUE),
                    'postal_address' => $this->input->post('postal_address', TRUE),
                    'project_title2' => $this->input->post('project_title2', TRUE),
                    'IBC_project_identification_no' => $this->input->post('IBC_project_identification_no', TRUE),
                    'notified_first' => $this->input->post('notified_first', TRUE),
                    'NBB_reference ' => $this->input->post('NBB_reference', TRUE),
                    'NBB_difference ' => $this->input->post('NBB_difference', TRUE),
                    'importer_organization' => $this->input->post('importer_organization', TRUE),
                    'importer_contact_person' => $this->input->post('importer_contact_person', TRUE),
                    'importer_position' => $this->input->post('importer_position', TRUE),
                    'importer_telephone_office' => $this->input->post('importer_telephone_office', TRUE),
                    'importer_telephone_mobile' => $this->input->post('importer_telephone_mobile', TRUE),
                    'importer_fax' => $this->input->post('importer_fax', TRUE),
                    'importer_email_address' => $this->input->post('importer_email_address', TRUE),
                    'importer_postal_address' => $this->input->post('importer_postal_address', TRUE),
                    'IBC_organization_name' => $this->input->post('IBC_organization_name', TRUE),
                    'IBC_chairperson' => $this->input->post('IBC_chairperson', TRUE),
                    'IBC_telephone_number' => $this->input->post('IBC_telephone_number', TRUE),
                    'IBC_fax' => $this->input->post('IBC_fax', TRUE),
                    'IBC_email_address' => $this->input->post('IBC_email_address', TRUE),
                    'IBC_PI_name' => $this->input->post('IBC_PI_name', TRUE),
                    'IBC_project_title' => $this->input->post('IBC_project_title', TRUE),
                    'IBC_date' => $this->input->post('forme_IBC_date', TRUE),
                    'IBC_adequate' => $this->input->post('IBC_adequate', TRUE),
                    'IBC_checklist_activities' => $this->input->post('IBC_checklist_activities', TRUE),
                    'IBC_checklist_description' => $this->input->post('IBC_checklist_description', TRUE),
                    'IBC_checklist_emergency_response' => $this->input->post('IBC_checklist_emergency_response', TRUE),
                    'IBC_checklist_trained' => $this->input->post('IBC_checklist_trained', TRUE),
                    'IBC_form_approved' => $this->input->post('IBC_form_approved', TRUE),
                    'IBC_biosafety_approved' => $this->input->post('IBC_biosafety_approved', TRUE),
                    'signature_statutory_endorsed' => $this->input->post('signature_statutory_endorsed', TRUE),
                    'signature_statutory_applicant_free' => $this->input->post('signature_statutory_applicant_free', TRUE),
                    'applicant_PI_signature' => $this->input->post('applicant_PI_signature', TRUE),
                    //'applicant_PI_signature_file' => $applicant_signature,
                    'applicant_PI_signature_date' => $this->input->post('applicant_PI_signature_date', TRUE),
                    'applicant_PI_signature_name' => $this->input->post('applicant_PI_signature_name', TRUE),
                    'applicant_PI_signature_stamp' => $this->input->post('applicant_PI_signature_stamp', TRUE),
                    'IBC_chairperson_signature' => $this->input->post('IBC_chairperson_signature', TRUE),
                    //'IBC_chairperson_signature_file' => $IBC_signature,
                    'IBC_chairperson_signature_date' => $this->input->post('IBC_chairperson_signature_date', TRUE),
                    'IBC_chairperson_signature_name' => $this->input->post('IBC_chairperson_signature_name', TRUE),
                    'IBC_chairperson_signature_stamp' => $this->input->post('IBC_chairperson_signature_stamp', TRUE),
                    'organization_representative_signature' => $this->input->post('organization_representative_signature', TRUE),
                    //'organization_representative_signature_file' => $organization_signature,
                    'organization_representative_signature_date' => $this->input->post('organization_representative_signature_date', TRUE),
                    'organization_representative_signature_name' => $this->input->post('organization_representative_signature_name', TRUE),
                    'organization_representative_signature_stamp' => $this->input->post('organization_representative_signature_stamp', TRUE),
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    //'project_intro_activities' => $project_activities,
                    //'project_intro_duration' => $project_duration,
                    'project_intro_objective' => $this->input->post('project_intro_objective', TRUE),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics', TRUE),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement', TRUE),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion', TRUE),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date', TRUE),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment', TRUE),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
                    'LMO_num_gene' => $numGenes,
                    'LMO_desc_genes_function' => $ar14,
                    'risk_assessment_genes_potential_hazard' => $ar15,
                    'risk_assessment_genes_comments' => $ar16,
                    'risk_assessment_genes_management' => $ar17,
                    'risk_assessment_genes_residual' => $ar18,
                    'risk_assessment_admin_potential_hazard' => $ar19,
                    'risk_assessment_admin_comments' => $ar20,
                    'risk_assessment_admin_management' => $ar21,
                    'risk_assessment_admin_residual' => $ar22,
                    'risk_assessment_containment_potential_hazard' => $ar23,
                    'risk_assessment_containment_comments' => $ar24,
                    'risk_assessment_containment_management' => $ar25,
                    'risk_assessment_containment_residual' => $ar26,
                    'risk_assessment_special_potential_hazard' => $ar27,
                    'risk_assessment_special_comments' => $ar28,
                    'risk_assessment_special_management' => $ar29,
                    'risk_assessment_special_residual' => $ar30,
                    'risk_management_transport' => $this->input->post('risk_management_transport', TRUE),
                    'risk_management_disposed' => $this->input->post('risk_management_disposed', TRUE),
                    'risk_management_wastes' => $this->input->post('risk_management_wastes', TRUE),
                    'risk_management_wastewater' => $this->input->post('risk_management_wastewater', TRUE),
                    'risk_management_decontaminated' => $this->input->post('risk_management_decontaminated', TRUE),
                    'risk_response_environment' => $this->input->post('risk_response_environment', TRUE),
                    'risk_response_plan' => $this->input->post('risk_response_plan', TRUE),
                    'risk_response_disposal' => $this->input->post('risk_response_disposal', TRUE),
                    'risk_response_isolation' => $this->input->post('risk_response_isolation', TRUE),
                    'risk_response_contigency' => $this->input->post('risk_response_contigency', TRUE),
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_certification_report' => $report,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description', TRUE),
                    'reference_description' => $this->input->post('reference_description', TRUE),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc1_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address', TRUE),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a', TRUE),
                    'dealing_type_c' => $this->input->post('dealing_type_c', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'GMO_name' => $this->input->post('GMO_name', TRUE),
                    'GMO_method' => $this->input->post('GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('project_transport', TRUE),
                    'project_disposal' => $this->input->post('project_disposal', TRUE),
                    'project_SOP' => $this->input->post('project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no', TRUE),
                    'pc1_officer_notified' => $this->input->post('pc1_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('laboratory_manager', TRUE),
                    'status' => $saveStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('pc2_date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc2_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address', TRUE),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a', TRUE),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa', TRUE),
                    'dealing_type_b' => $this->input->post('dealing_type_b', TRUE),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c', TRUE),
                    'dealing_type_d' => $this->input->post('dealing_type_d', TRUE),
                    'dealing_type_e' => $this->input->post('dealing_type_e', TRUE),
                    'dealing_type_f' => $this->input->post('dealing_type_f', TRUE),
                    'dealing_type_g' => $this->input->post('dealing_type_g', TRUE),
                    'dealing_type_h' => $this->input->post('dealing_type_h', TRUE),
                    'dealing_type_i' => $this->input->post('dealing_type_i', TRUE),
                    'dealing_type_j' => $this->input->post('dealing_type_j', TRUE),
                    'dealing_type_k' => $this->input->post('dealing_type_k', TRUE),
                    'dealing_type_l' => $this->input->post('dealing_type_l', TRUE),
                    'dealing_type_m' => $this->input->post('dealing_type_m', TRUE),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name', TRUE),
                    'GMO_method' => $this->input->post('pc2_GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('pc2_project_transport', TRUE),
                    'project_disposal' => $this->input->post('pc2_project_disposal', TRUE),
                    'project_SOP' => $this->input->post('pc2_project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no', TRUE),
                    'officer_notified' => $this->input->post('pc1_officer_notified, TRUE'),
                    'officer_name' => $this->input->post('pc2_officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager, TRUE'),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $saveStatus
                );
                    
                    if ($project_activities != null){
                        $formeData = $formeData + array(
                            'project_intro_activities' => $project_activities
                        );
                    }
                    
                    if ($project_duration != null){
                        $formeData = $formeData + array(
                            'project_intro_duration' => $project_duration
                        );
                    }
                    
                    if ($applicant_signature != null){
                        $formeData = $formeData + array(
                            'applicant_PI_signature_file' => $applicant_signature
                        );
                    }
                    
                    if ($IBC_signature != null){
                        $formeData = $formeData + array(
                            'IBC_chairperson_signature_file' => $IBC_signature
                        );
                    }
                    
                    if ($organization_signature != null){
                        $formeData = $formeData + array(
                            'organization_representative_signature_file' => $organization_signature
                        );
                    }
                
                
                
                    if($this->annex2_model->update_saved_data($proj_id, $annex2Data) && $this->forme_model->update_saved_data($proj_id, $formeData) && $this->pc1_model->update_saved_data($proj_id, $pc1Data) && $this->pc2_model->update_saved_data($proj_id, $pc2Data) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                    {
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully saved!</div>', $annex2Data);
                        redirect('saveHistory/index');
                    
                    
                    
                        
                    } else {
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                        redirect('saveHistory/index');
  
                    }
                    
                }elseif(isset($submit)){
                    
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|pdf|zip';
                    $config['overwrite'] = true;
            

                    //Load upload library and initialize configuration
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if(!empty($_FILES['project_intro_activities'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_activities']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_activities')){
                            $project_intro_activities = $this->upload->data();
                            $project_activities = $project_intro_activities['file_name'];
                            
                        }else{
                            
                            $project_activities = null;
                        }
                        
                    }
                    
                    
                    
                    if(!empty($_FILES['project_intro_duration'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['project_intro_duration']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('project_intro_duration')){
                            $project_intro_duration = $this->upload->data();
                            $project_duration = $project_intro_duration['file_name'];
                        }else{
                            $project_duration = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['applicant_PI_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['applicant_PI_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('applicant_PI_signature_file')){
                            $applicant_PI_signature_file = $this->upload->data();
                            $applicant_signature = $applicant_PI_signature_file['file_name'];
                        }else{
                            $applicant_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['IBC_chairperson_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['IBC_chairperson_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('IBC_chairperson_signature_file')){
                            $IBC_chairperson_signature_file = $this->upload->data();
                            $IBC_signature = $IBC_chairperson_signature_file['file_name'];
                        }else{
                            $IBC_signature = null;
                        }
                    }
                    
                    
                    if(!empty($_FILES['organization_representative_signature_file'])){
                
                        $config['file_name'] = $proj_id . $this->session->userdata('account_id') . $_FILES['organization_representative_signature_file']['name'];

                        //Load upload library and initialize configuration
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                
                        if($this->upload->do_upload('organization_representative_signature_file')){
                            $organization_representative_signature_file = $this->upload->data();
                            $organization_signature = $organization_representative_signature_file['file_name'];
                        }else{
                            $organization_signature = null;
                        }
                    }
                
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved', TRUE));
                $ar2 = implode(',',$this->input->post('personnel_designation', TRUE));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name', TRUE));
                $ar4 = implode(',',$this->input->post('project_team_address', TRUE));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number', TRUE));
                $ar6 = implode(',',$this->input->post('project_team_email_address', TRUE));
                $ar7 = implode(',',$this->input->post('project_team_qualification', TRUE));
                $ar8 = implode(',',$this->input->post('project_team_designation', TRUE));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent', TRUE));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor', TRUE));
                $ar11= implode(',',$this->input->post('LMO_desc_method', TRUE));
                $ar12 = implode(',',$this->input->post('LMO_desc_class', TRUE));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait', TRUE));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function', TRUE));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard', TRUE));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments', TRUE));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management', TRUE));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual', TRUE));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard, TRUE'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments', TRUE));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management', TRUE));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual', TRUE));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard', TRUE));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments', TRUE));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management', TRUE));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual', TRUE));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard', TRUE));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments', TRUE));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management', TRUE));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual', TRUE));
                $ar31 = implode(',',$this->input->post('premise_name', TRUE));
                $ar32 = implode(',',$this->input->post('premise_type', TRUE));
                $ar33 = implode(',',$this->input->post('premise_BSL', TRUE));
                $ar34 = implode(',',$this->input->post('premise_IBC', TRUE));
                $ar35 = implode(',',$this->input->post('premise_IBC_date', TRUE));
                $ar36 = implode(',',$this->input->post('premise_certification_date', TRUE));
                $ar37 = implode(',',$this->input->post('premise_certification_no', TRUE));
                $report = implode(',',$this->input->post('premise_certification_report', TRUE));
                $ar38 = implode(',',$this->input->post('premise_address', TRUE));
                $ar39 = implode(',',$this->input->post('premise_officer_name', TRUE));
                $ar40 = implode(',',$this->input->post('premise_telephone_business', TRUE));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile', TRUE));
                $ar42 = implode(',',$this->input->post('premise_fax', TRUE));
                $ar43 = implode(',',$this->input->post('premise_email', TRUE));
                $numGenes = implode(',',$this->input->post('LMO_num_gene', TRUE));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification', TRUE));
                $ar45 = implode(',',$this->input->post('project_add_name', TRUE));
                $ar46 = implode(',',$this->input->post('project_add_department', TRUE));
                $ar47 = implode(',',$this->input->post('project_add_campus', TRUE));
                $ar48 = implode(',',$this->input->post('project_add_postal_address', TRUE));
                $ar49 = implode(',',$this->input->post('project_add_telephone', TRUE));
                $ar50 = implode(',',$this->input->post('project_add_fax', TRUE));
                $ar51 = implode(',',$this->input->post('project_add_email_address', TRUE));
                $ar52 = implode(',',$this->input->post('project_add_title', TRUE));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification', TRUE));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name', TRUE));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department', TRUE));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus', TRUE));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address', TRUE));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone', TRUE));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax, TRUE'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address', TRUE));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title', TRUE));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity', TRUE));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard', TRUE));
                $ar64 = implode(',',$this->input->post('HIRARC_effects', TRUE));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control', TRUE));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH', TRUE));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV', TRUE));
                $ar68 = implode(',',$this->input->post('HIRARC_RR', TRUE));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure', TRUE));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC', TRUE));
                
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name', TRUE),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address', TRUE),
                    'collaborating_partners' => $this->input->post('collaborating_partners', TRUE),
                    'project_title' => $this->input->post('project_title', TRUE),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology', TRUE),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms', TRUE),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms', TRUE),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits', TRUE),
                    'premises' => $this->input->post('premises', TRUE),
                    'period' => $this->input->post('period', TRUE),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management', TRUE),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan', TRUE),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation', TRUE),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise', TRUE),
                    'PI_training' => $this->input->post('PI_training', TRUE),
                    'PI_health' => $this->input->post('PI_health', TRUE),
                    'PI_other' => $this->input->post('PI_other', TRUE),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name', TRUE),
                    'IBC_date' => $this->input->post('IBC_date', TRUE),
                    'status' => $submitStatus
                    //End Of Annex 2 Submission
                    
                    
                );
                
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title', TRUE),
                    'project_id' => $proj_id,
                    'NBB_reference_no' => $this->input->post('NBB_reference_no', TRUE),
                    'checklist_form' => $this->input->post('checklist_form', TRUE),
                    'checklist_coverletter' => $this->input->post('checklist_coverletter', TRUE),
                    'checklist_IBC' => $this->input->post('checklist_IBC', TRUE),
                    'checklist_IBC_report' => $this->input->post('checklist_IBC_report', TRUE),
                    'checklist_clearance' => $this->input->post('checklist_clearance', TRUE),
                    'checklist_CBI' => $this->input->post('checklist_CBI', TRUE),
                    'checklist_CBI_submit' => $this->input->post('checklist_CBI_submit', TRUE),
                    'checklist_support' => $this->input->post('checklist_support', TRUE),
                    'checklist_RnD' => $this->input->post('checklist_RnD', TRUE),
                    'organization' => $this->input->post('organization', TRUE),
                    'applicant_name_PI' => $this->input->post('applicant_name_PI', TRUE),
                    'position' => $this->input->post('position', TRUE),
                    'telephone_office' => $this->input->post('telephone_office', TRUE),
                    'telephone_mobile' => $this->input->post('telephone_mobile', TRUE),
                    'fax' => $this->input->post('fax', TRUE),
                    'email_address' => $this->input->post('email_address', TRUE),
                    'postal_address' => $this->input->post('postal_address', TRUE),
                    'project_title2' => $this->input->post('project_title2', TRUE),
                    'IBC_project_identification_no' => $this->input->post('IBC_project_identification_no', TRUE),
                    'notified_first' => $this->input->post('notified_first', TRUE),
                    'NBB_reference ' => $this->input->post('NBB_reference', TRUE),
                    'NBB_difference ' => $this->input->post('NBB_difference', TRUE),
                    'importer_organization' => $this->input->post('importer_organization', TRUE),
                    'importer_contact_person' => $this->input->post('importer_contact_person', TRUE),
                    'importer_position' => $this->input->post('importer_position', TRUE),
                    'importer_telephone_office' => $this->input->post('importer_telephone_office', TRUE),
                    'importer_telephone_mobile' => $this->input->post('importer_telephone_mobile', TRUE),
                    'importer_fax' => $this->input->post('importer_fax', TRUE),
                    'importer_email_address' => $this->input->post('importer_email_address', TRUE),
                    'importer_postal_address' => $this->input->post('importer_postal_address', TRUE),
                    'IBC_organization_name' => $this->input->post('IBC_organization_name', TRUE),
                    'IBC_chairperson' => $this->input->post('IBC_chairperson', TRUE),
                    'IBC_telephone_number' => $this->input->post('IBC_telephone_number', TRUE),
                    'IBC_fax' => $this->input->post('IBC_fax', TRUE),
                    'IBC_email_address' => $this->input->post('IBC_email_address', TRUE),
                    'IBC_PI_name' => $this->input->post('IBC_PI_name', TRUE),
                    'IBC_project_title' => $this->input->post('IBC_project_title', TRUE),
                    'IBC_date' => $this->input->post('forme_IBC_date', TRUE),
                    'IBC_adequate' => $this->input->post('IBC_adequate', TRUE),
                    'IBC_checklist_activities' => $this->input->post('IBC_checklist_activities', TRUE),
                    'IBC_checklist_description' => $this->input->post('IBC_checklist_description', TRUE),
                    'IBC_checklist_emergency_response' => $this->input->post('IBC_checklist_emergency_response', TRUE),
                    'IBC_checklist_trained' => $this->input->post('IBC_checklist_trained', TRUE),
                    'IBC_form_approved' => $this->input->post('IBC_form_approved', TRUE),
                    'IBC_biosafety_approved' => $this->input->post('IBC_biosafety_approved', TRUE),
                    'signature_statutory_endorsed' => $this->input->post('signature_statutory_endorsed', TRUE),
                    'signature_statutory_applicant_free' => $this->input->post('signature_statutory_applicant_free', TRUE),
                    'applicant_PI_signature' => $this->input->post('applicant_PI_signature', TRUE),
                    //'applicant_PI_signature_file' => $applicant_signature,
                    'applicant_PI_signature_date' => $this->input->post('applicant_PI_signature_date', TRUE),
                    'applicant_PI_signature_name' => $this->input->post('applicant_PI_signature_name', TRUE),
                    'applicant_PI_signature_stamp' => $this->input->post('applicant_PI_signature_stamp', TRUE),
                    'IBC_chairperson_signature' => $this->input->post('IBC_chairperson_signature', TRUE),
                    //'IBC_chairperson_signature_file' => $IBC_signature,
                    'IBC_chairperson_signature_date' => $this->input->post('IBC_chairperson_signature_date', TRUE),
                    'IBC_chairperson_signature_name' => $this->input->post('IBC_chairperson_signature_name', TRUE),
                    'IBC_chairperson_signature_stamp' => $this->input->post('IBC_chairperson_signature_stamp', TRUE),
                    'organization_representative_signature' => $this->input->post('organization_representative_signature', TRUE),
                    //'organization_representative_signature_file' => $organization_signature,
                    'organization_representative_signature_date' => $this->input->post('organization_representative_signature_date', TRUE),
                    'organization_representative_signature_name' => $this->input->post('organization_representative_signature_name', TRUE),
                    'organization_representative_signature_stamp' => $this->input->post('organization_representative_signature_stamp', TRUE),
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    //'project_intro_activities' => $project_activities,
                    //'project_intro_duration' => $project_duration,
                    'project_intro_objective' => $this->input->post('project_intro_objective', TRUE),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics', TRUE),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement', TRUE),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion', TRUE),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date', TRUE),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment', TRUE),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
                    'LMO_num_gene' => $numGenes,
                    'LMO_desc_genes_function' => $ar14,
                    'risk_assessment_genes_potential_hazard' => $ar15,
                    'risk_assessment_genes_comments' => $ar16,
                    'risk_assessment_genes_management' => $ar17,
                    'risk_assessment_genes_residual' => $ar18,
                    'risk_assessment_admin_potential_hazard' => $ar19,
                    'risk_assessment_admin_comments' => $ar20,
                    'risk_assessment_admin_management' => $ar21,
                    'risk_assessment_admin_residual' => $ar22,
                    'risk_assessment_containment_potential_hazard' => $ar23,
                    'risk_assessment_containment_comments' => $ar24,
                    'risk_assessment_containment_management' => $ar25,
                    'risk_assessment_containment_residual' => $ar26,
                    'risk_assessment_special_potential_hazard' => $ar27,
                    'risk_assessment_special_comments' => $ar28,
                    'risk_assessment_special_management' => $ar29,
                    'risk_assessment_special_residual' => $ar30,
                    'risk_management_transport' => $this->input->post('risk_management_transport', TRUE),
                    'risk_management_disposed' => $this->input->post('risk_management_disposed', TRUE),
                    'risk_management_wastes' => $this->input->post('risk_management_wastes', TRUE),
                    'risk_management_wastewater' => $this->input->post('risk_management_wastewater', TRUE),
                    'risk_management_decontaminated' => $this->input->post('risk_management_decontaminated', TRUE),
                    'risk_response_environment' => $this->input->post('risk_response_environment', TRUE),
                    'risk_response_plan' => $this->input->post('risk_response_plan', TRUE),
                    'risk_response_disposal' => $this->input->post('risk_response_disposal', TRUE),
                    'risk_response_isolation' => $this->input->post('risk_response_isolation', TRUE),
                    'risk_response_contigency' => $this->input->post('risk_response_contigency', TRUE),
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_certification_report' => $report,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description', TRUE),
                    'reference_description' => $this->input->post('reference_description', TRUE),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc1_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address', TRUE),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a', TRUE),
                    'dealing_type_c' => $this->input->post('dealing_type_c', TRUE),
                    'project_summary' => $this->input->post('project_summary', TRUE),
                    'GMO_name' => $this->input->post('GMO_name', TRUE),
                    'GMO_method' => $this->input->post('GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('project_transport', TRUE),
                    'project_disposal' => $this->input->post('project_disposal', TRUE),
                    'project_SOP' => $this->input->post('project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no', TRUE),
                    'pc1_officer_notified' => $this->input->post('pc1_officer_notified', TRUE),
                    'officer_name' => $this->input->post('officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('laboratory_manager', TRUE),
                    'status' => $submitStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received' => $this->input->post('pc2_date_received', TRUE),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no', TRUE),
                    'project_title' => $this->input->post('pc2_project_title', TRUE),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title', TRUE),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name', TRUE),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification', TRUE),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department', TRUE),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus', TRUE),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address', TRUE),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone', TRUE),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax', TRUE),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address', TRUE),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a', TRUE),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa', TRUE),
                    'dealing_type_b' => $this->input->post('dealing_type_b', TRUE),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c', TRUE),
                    'dealing_type_d' => $this->input->post('dealing_type_d', TRUE),
                    'dealing_type_e' => $this->input->post('dealing_type_e', TRUE),
                    'dealing_type_f' => $this->input->post('dealing_type_f', TRUE),
                    'dealing_type_g' => $this->input->post('dealing_type_g', TRUE),
                    'dealing_type_h' => $this->input->post('dealing_type_h', TRUE),
                    'dealing_type_i' => $this->input->post('dealing_type_i', TRUE),
                    'dealing_type_j' => $this->input->post('dealing_type_j', TRUE),
                    'dealing_type_k' => $this->input->post('dealing_type_k', TRUE),
                    'dealing_type_l' => $this->input->post('dealing_type_l', TRUE),
                    'dealing_type_m' => $this->input->post('dealing_type_m', TRUE),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name', TRUE),
                    'GMO_method' => $this->input->post('pc2_GMO_method', TRUE),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin', TRUE),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class', TRUE),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description', TRUE),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff', TRUE),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment', TRUE),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps', TRUE),
                    'project_transport' => $this->input->post('pc2_project_transport', TRUE),
                    'project_disposal' => $this->input->post('pc2_project_disposal', TRUE),
                    'project_SOP' => $this->input->post('pc2_project_SOP', TRUE),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no', TRUE),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no', TRUE),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level', TRUE),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no', TRUE),
                    'officer_notified' => $this->input->post('pc1_officer_notified, TRUE'),
                    'officer_name' => $this->input->post('pc2_officer_name', TRUE),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager, TRUE'),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name', TRUE),
                    'date' => $this->input->post('date', TRUE),
                    'process_location' => $this->input->post('process_location', TRUE),
                    'conducted_name' => $this->input->post('conducted_name', TRUE),
                    'conducted_designation' => $this->input->post('conducted_designation', TRUE),
                    'approved_name' => $this->input->post('approved_name', TRUE),
                    'approved_designation' => $this->input->post('approved_designation', TRUE),
                    'date_from' => $this->input->post('date_from', TRUE),
                    'date_to' => $this->input->post('date_to', TRUE),
                    'review_date' => $this->input->post('review_date', TRUE),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by', TRUE),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no', TRUE),
                    'SWP_designation' => $this->input->post('SWP_designation', TRUE),
                    'SWP_faculty' => $this->input->post('SWP_faculty', TRUE),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title', TRUE),
                    'SWP_project_title' => $this->input->post('SWP_project_title', TRUE),
                    'SWP_location' => $this->input->post('SWP_location', TRUE),
                    'SWP_description' => $this->input->post('SWP_description', TRUE),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational', TRUE),
                    'SWP_operational' => $this->input->post('SWP_operational', TRUE),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational', TRUE),
                    'SWP_risk' => $this->input->post('SWP_risk', TRUE),
                    'SWP_control' => $this->input->post('SWP_control', TRUE),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name', TRUE),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date', TRUE),
                    'SWP_name' => $this->input->post('SWP_name', TRUE),
                    'SWP_PI' => $this->input->post('SWP_PI', TRUE),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by', TRUE),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI', TRUE),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date', TRUE),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date', TRUE),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained', TRUE),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer', TRUE),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by', TRUE),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by', TRUE),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date', TRUE),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks', TRUE),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by', TRUE),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date', TRUE),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks', TRUE),
                    'application_type' => $this->input->post('application_type', TRUE),
                    'status' => $submitStatus
                );
                    
                    if ($project_activities != null){
                        $formeData = $formeData + array(
                            'project_intro_activities' => $project_activities
                        );
                    }
                    
                    if ($project_duration != null){
                        $formeData = $formeData + array(
                            'project_intro_duration' => $project_duration
                        );
                    }
                    
                    if ($applicant_signature != null){
                        $formeData = $formeData + array(
                            'applicant_PI_signature_file' => $applicant_signature
                        );
                    }
                    
                    if ($IBC_signature != null){
                        $formeData = $formeData + array(
                            'IBC_chairperson_signature_file' => $IBC_signature
                        );
                    }
                    
                    if ($organization_signature != null){
                        $formeData = $formeData + array(
                            'organization_representative_signature_file' => $organization_signature
                        );
                    }
                
                
                    if($this->annex2_model->update_saved_data($proj_id, $annex2Data) && $this->forme_model->update_saved_data($proj_id, $formeData) && $this->pc1_model->update_saved_data($proj_id, $pc1Data) && $this->pc2_model->update_saved_data($proj_id, $pc2Data) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                    {
                    
                        $this->notification_model->insert_new_notification(null, 4, "New Project Application for LMO", "The following user has submitted a new project application for LMO: " . $this->session->userdata('account_name'));
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $annex2Data);
                        redirect('saveHistory/index');
                    
                    
                    
                    } else {
                    
                        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                        redirect('saveHistory/index');
                    
                    }
                    
                }
                
                
            }
        }
            
        
        public function download($filename = NULL){
            
            //load download helper
            $this->load->helper('download');
            //read file contents
            $data = file_get_contents(base_url('/uploads/'.$filename));
            force_download($filename, $data);
            
        }
        
    }
?>