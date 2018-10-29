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
            
            if (!isset($save) && !isset($submit)){
                
                $this->load->template('lmoproj_view', $data);
                
            }elseif(isset($save)){
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved'));
                $ar2 = implode(',',$this->input->post('personnel_designation'));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name'));
                $ar4 = implode(',',$this->input->post('project_team_address'));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number'));
                $ar6 = implode(',',$this->input->post('project_team_email_address'));
                $ar7 = implode(',',$this->input->post('project_team_qualification'));
                $ar8 = implode(',',$this->input->post('project_team_designation'));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent'));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor'));
                $ar11= implode(',',$this->input->post('LMO_desc_method'));
                $ar12 = implode(',',$this->input->post('LMO_desc_class'));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait'));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function'));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard'));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments'));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management'));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual'));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments'));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management'));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual'));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard'));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments'));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management'));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual'));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard'));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments'));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management'));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual'));
                $ar31 = implode(',',$this->input->post('premise_name'));
                $ar32 = implode(',',$this->input->post('premise_type'));
                $ar33 = implode(',',$this->input->post('premise_BSL'));
                $ar34 = implode(',',$this->input->post('premise_IBC'));
                $ar35 = implode(',',$this->input->post('premise_IBC_date'));
                $ar36 = implode(',',$this->input->post('premise_certification_date'));
                $ar37 = implode(',',$this->input->post('premise_certification_no'));
                $ar38 = implode(',',$this->input->post('premise_address'));
                $ar39 = implode(',',$this->input->post('premise_officer_name'));
                $ar40 = implode(',',$this->input->post('premise_telephone_business'));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile'));
                $ar42 = implode(',',$this->input->post('premise_fax'));
                $ar43 = implode(',',$this->input->post('premise_email'));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification'));
                $ar45 = implode(',',$this->input->post('project_add_name'));
                $ar46 = implode(',',$this->input->post('project_add_department'));
                $ar47 = implode(',',$this->input->post('project_add_campus'));
                $ar48 = implode(',',$this->input->post('project_add_postal_address'));
                $ar49 = implode(',',$this->input->post('project_add_telephone'));
                $ar50 = implode(',',$this->input->post('project_add_fax'));
                $ar51 = implode(',',$this->input->post('project_add_email_address'));
                $ar52 = implode(',',$this->input->post('project_add_title'));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification'));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name'));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department'));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus'));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address'));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone'));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address'));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name'),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address'),
                    'collaborating_partners' => $this->input->post('collaborating_partners'),
                    'project_title' => $this->input->post('project_title'),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology'),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms'),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms'),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits'),
                    'premises' => $this->input->post('premises'),
                    'period' => $this->input->post('period'),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management'),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan'),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation'),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise'),
                    'PI_training' => $this->input->post('PI_training'),
                    'PI_health' => $this->input->post('PI_health'),
                    'PI_other' => $this->input->post('PI_other'),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name'),
                    'IBC_date' => $this->input->post('IBC_date'),
                    'status' => $saveStatus
                    //End Of Annex 2 Submission
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title'),
                    'project_id' => $proj_id,
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
                    'IBC_date' => $this->input->post('forme_IBC_date'),
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
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    'project_intro_objective' => $this->input->post('project_intro_objective'),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics'),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement'),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion'),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date'),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment'),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
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
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description'),
                    'reference_description' => $this->input->post('reference_description'),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                    'project_title' => $this->input->post('pc1_project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a'),
                    'dealing_type_c' => $this->input->post('dealing_type_c'),
                    'project_summary' => $this->input->post('project_summary'),
                    'GMO_name' => $this->input->post('GMO_name'),
                    'GMO_method' => $this->input->post('GMO_method'),
                    'GMO_origin' => $this->input->post('GMO_origin'),
                    'modified_trait_class' => $this->input->post('modified_trait_class'),
                    'modified_trait_description' => $this->input->post('modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps'),
                    'project_transport' => $this->input->post('project_transport'),
                    'project_disposal' => $this->input->post('project_disposal'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $saveStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('pc2_date_received '),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no'),
                    'project_title' => $this->input->post('pc2_project_title'),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address'),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address'),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a'),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa'),
                    'dealing_type_b' => $this->input->post('dealing_type_b'),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c'),
                    'dealing_type_d' => $this->input->post('dealing_type_d'),
                    'dealing_type_e' => $this->input->post('dealing_type_e'),
                    'dealing_type_f' => $this->input->post('dealing_type_f'),
                    'dealing_type_g' => $this->input->post('dealing_type_g'),
                    'dealing_type_h' => $this->input->post('dealing_type_h'),
                    'dealing_type_i ' => $this->input->post('dealing_type_i'),
                    'dealing_type_j ' => $this->input->post('dealing_type_j '),
                    'dealing_type_k' => $this->input->post('dealing_type_k'),
                    'dealing_type_l' => $this->input->post('dealing_type_l'),
                    'dealing_type_m' => $this->input->post('dealing_type_m'),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name'),
                    'GMO_method' => $this->input->post('pc2_GMO_method'),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin'),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class'),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps'),
                    'project_transport' => $this->input->post('pc2_project_transport'),
                    'project_disposal' => $this->input->post('pc2_project_disposal'),
                    'project_SOP' => $this->input->post('pc2_project_SOP'),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('pc2_officer_notified'),
                    'officer_name' => $this->input->post('pc2_officer_name'),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager'),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                
                
                if($this->annex2_model->insert_new_applicant_data($annex2Data) && $this->forme_model->insert_new_applicant_data($formeData) && $this->pc1_model->insert_new_applicant_data($pc1Data) && $this->pc2_model->insert_new_applicant_data($pc2Data) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $annex2Data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                 
                
            }elseif(isset($submit)){
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved'));
                $ar2 = implode(',',$this->input->post('personnel_designation'));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name'));
                $ar4 = implode(',',$this->input->post('project_team_address'));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number'));
                $ar6 = implode(',',$this->input->post('project_team_email_address'));
                $ar7 = implode(',',$this->input->post('project_team_qualification'));
                $ar8 = implode(',',$this->input->post('project_team_designation'));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent'));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor'));
                $ar11= implode(',',$this->input->post('LMO_desc_method'));
                $ar12 = implode(',',$this->input->post('LMO_desc_class'));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait'));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function'));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard'));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments'));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management'));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual'));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments'));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management'));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual'));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard'));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments'));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management'));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual'));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard'));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments'));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management'));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual'));
                $ar31 = implode(',',$this->input->post('premise_name'));
                $ar32 = implode(',',$this->input->post('premise_type'));
                $ar33 = implode(',',$this->input->post('premise_BSL'));
                $ar34 = implode(',',$this->input->post('premise_IBC'));
                $ar35 = implode(',',$this->input->post('premise_IBC_date'));
                $ar36 = implode(',',$this->input->post('premise_certification_date'));
                $ar37 = implode(',',$this->input->post('premise_certification_no'));
                $ar38 = implode(',',$this->input->post('premise_address'));
                $ar39 = implode(',',$this->input->post('premise_officer_name'));
                $ar40 = implode(',',$this->input->post('premise_telephone_business'));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile'));
                $ar42 = implode(',',$this->input->post('premise_fax'));
                $ar43 = implode(',',$this->input->post('premise_email'));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification'));
                $ar45 = implode(',',$this->input->post('project_add_name'));
                $ar46 = implode(',',$this->input->post('project_add_department'));
                $ar47 = implode(',',$this->input->post('project_add_campus'));
                $ar48 = implode(',',$this->input->post('project_add_postal_address'));
                $ar49 = implode(',',$this->input->post('project_add_telephone'));
                $ar50 = implode(',',$this->input->post('project_add_fax'));
                $ar51 = implode(',',$this->input->post('project_add_email_address'));
                $ar52 = implode(',',$this->input->post('project_add_title'));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification'));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name'));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department'));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus'));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address'));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone'));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address'));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name'),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address'),
                    'collaborating_partners' => $this->input->post('collaborating_partners'),
                    'project_title' => $this->input->post('project_title'),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology'),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms'),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms'),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits'),
                    'premises' => $this->input->post('premises'),
                    'period' => $this->input->post('period'),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management'),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan'),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation'),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise'),
                    'PI_training' => $this->input->post('PI_training'),
                    'PI_health' => $this->input->post('PI_health'),
                    'PI_other' => $this->input->post('PI_other'),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name'),
                    'IBC_date' => $this->input->post('IBC_date'),
                    'status' => $submitStatus
                    //End Of Annex 2 Submission
                    
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title'),
                    'project_id' => $proj_id,
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
                    'IBC_date' => $this->input->post('forme_IBC_date'),
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
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    'project_intro_objective' => $this->input->post('project_intro_objective'),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics'),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement'),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion'),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date'),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment'),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
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
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description'),
                    'reference_description' => $this->input->post('reference_description'),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                    'project_title' => $this->input->post('pc1_project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a'),
                    'dealing_type_c' => $this->input->post('dealing_type_c'),
                    'project_summary' => $this->input->post('project_summary'),
                    'GMO_name' => $this->input->post('GMO_name'),
                    'GMO_method' => $this->input->post('GMO_method'),
                    'GMO_origin' => $this->input->post('GMO_origin'),
                    'modified_trait_class' => $this->input->post('modified_trait_class'),
                    'modified_trait_description' => $this->input->post('modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps'),
                    'project_transport' => $this->input->post('project_transport'),
                    'project_disposal' => $this->input->post('project_disposal'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $submitStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('pc2_date_received '),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no'),
                    'project_title' => $this->input->post('pc2_project_title'),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address'),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address'),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a'),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa'),
                    'dealing_type_b' => $this->input->post('dealing_type_b'),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c'),
                    'dealing_type_d' => $this->input->post('dealing_type_d'),
                    'dealing_type_e' => $this->input->post('dealing_type_e'),
                    'dealing_type_f' => $this->input->post('dealing_type_f'),
                    'dealing_type_g' => $this->input->post('dealing_type_g'),
                    'dealing_type_h' => $this->input->post('dealing_type_h'),
                    'dealing_type_i ' => $this->input->post('dealing_type_i'),
                    'dealing_type_j ' => $this->input->post('dealing_type_j '),
                    'dealing_type_k' => $this->input->post('dealing_type_k'),
                    'dealing_type_l' => $this->input->post('dealing_type_l'),
                    'dealing_type_m' => $this->input->post('dealing_type_m'),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name'),
                    'GMO_method' => $this->input->post('pc2_GMO_method'),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin'),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class'),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps'),
                    'project_transport' => $this->input->post('pc2_project_transport'),
                    'project_disposal' => $this->input->post('pc2_project_disposal'),
                    'project_SOP' => $this->input->post('pc2_project_SOP'),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('pc2_officer_notified'),
                    'officer_name' => $this->input->post('pc2_officer_name'),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager'),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                
                if($this->annex2_model->insert_new_applicant_data($annex2Data) && $this->forme_model->insert_new_applicant_data($formeData) && $this->pc1_model->insert_new_applicant_data($pc1Data) && $this->pc2_model->insert_new_applicant_data($pc2Data) && $this->hirarc_model->insert_new_applicant_data($hirarcData) && $this->swp_model->insert_new_applicant_data($swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    
                    $this->notification_model->insert_new_notification(null, 4, "New Project Application For Living Modified Organism", "The following user has submitted a new application for a living modified organism project: " . $this->session->userdata('account_name'));
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $annex2Data);
                    redirect('home/index');
                    
                    $this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
                    
                }
                
            }
            
        }
        
        //load project in disabled state
        public function load_project(){
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            $this->form_validation->set_rules('officer_notified', 'Visibility', ' ');
            
            $data['load'] = "true";
            $data['disabled'] = "true";
            
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
        
        public function update_form(){
            
            $data['readnotif'] = $this->notification_model->get_read( $this->session->userdata('account_id'), $this->session->userdata('account_type') );
            
            
            $update = $this->input->post('updateButton');
            $saveStatus = "saved";
            $submitStatus = "submitted";
            $projectSave = 'saved';
            $projectSubmit = 'submitted';
            $editableValue = 0;
            
            if (!isset($update)){
                
                $this->load->template('lmoproj_view', $data);
                
            }elseif(isset($update)){
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved'));
                $ar2 = implode(',',$this->input->post('personnel_designation'));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name'));
                $ar4 = implode(',',$this->input->post('project_team_address'));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number'));
                $ar6 = implode(',',$this->input->post('project_team_email_address'));
                $ar7 = implode(',',$this->input->post('project_team_qualification'));
                $ar8 = implode(',',$this->input->post('project_team_designation'));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent'));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor'));
                $ar11= implode(',',$this->input->post('LMO_desc_method'));
                $ar12 = implode(',',$this->input->post('LMO_desc_class'));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait'));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function'));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard'));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments'));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management'));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual'));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments'));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management'));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual'));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard'));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments'));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management'));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual'));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard'));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments'));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management'));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual'));
                $ar31 = implode(',',$this->input->post('premise_name'));
                $ar32 = implode(',',$this->input->post('premise_type'));
                $ar33 = implode(',',$this->input->post('premise_BSL'));
                $ar34 = implode(',',$this->input->post('premise_IBC'));
                $ar35 = implode(',',$this->input->post('premise_IBC_date'));
                $ar36 = implode(',',$this->input->post('premise_certification_date'));
                $ar37 = implode(',',$this->input->post('premise_certification_no'));
                $ar38 = implode(',',$this->input->post('premise_address'));
                $ar39 = implode(',',$this->input->post('premise_officer_name'));
                $ar40 = implode(',',$this->input->post('premise_telephone_business'));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile'));
                $ar42 = implode(',',$this->input->post('premise_fax'));
                $ar43 = implode(',',$this->input->post('premise_email'));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification'));
                $ar45 = implode(',',$this->input->post('project_add_name'));
                $ar46 = implode(',',$this->input->post('project_add_department'));
                $ar47 = implode(',',$this->input->post('project_add_campus'));
                $ar48 = implode(',',$this->input->post('project_add_postal_address'));
                $ar49 = implode(',',$this->input->post('project_add_telephone'));
                $ar50 = implode(',',$this->input->post('project_add_fax'));
                $ar51 = implode(',',$this->input->post('project_add_email_address'));
                $ar52 = implode(',',$this->input->post('project_add_title'));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification'));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name'));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department'));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus'));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address'));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone'));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address'));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name'),
                    'project_id' => $appID,
                    'institutional_address' => $this->input->post('institutional_address'),
                    'collaborating_partners' => $this->input->post('collaborating_partners'),
                    'project_title' => $this->input->post('project_title'),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology'),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms'),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms'),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits'),
                    'premises' => $this->input->post('premises'),
                    'period' => $this->input->post('period'),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management'),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan'),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation'),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise'),
                    'PI_training' => $this->input->post('PI_training'),
                    'PI_health' => $this->input->post('PI_health'),
                    'PI_other' => $this->input->post('PI_other'),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name'),
                    'IBC_date' => $this->input->post('IBC_date'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                    //End Of Annex 2 Submission
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title'),
                    'project_id' => $appID,
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
                    'IBC_date' => $this->input->post('forme_IBC_date'),
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
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    'project_intro_objective' => $this->input->post('project_intro_objective'),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics'),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement'),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion'),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date'),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment'),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
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
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description'),
                    'reference_description' => $this->input->post('reference_description'),
                    'editable' => $editableValue,
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                    'project_title' => $this->input->post('pc1_project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a'),
                    'dealing_type_c' => $this->input->post('dealing_type_c'),
                    'project_summary' => $this->input->post('project_summary'),
                    'GMO_name' => $this->input->post('GMO_name'),
                    'GMO_method' => $this->input->post('GMO_method'),
                    'GMO_origin' => $this->input->post('GMO_origin'),
                    'modified_trait_class' => $this->input->post('modified_trait_class'),
                    'modified_trait_description' => $this->input->post('modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps'),
                    'project_transport' => $this->input->post('project_transport'),
                    'project_disposal' => $this->input->post('project_disposal'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'date_received ' => $this->input->post('pc2_date_received '),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no'),
                    'project_title' => $this->input->post('pc2_project_title'),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address'),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address'),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a'),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa'),
                    'dealing_type_b' => $this->input->post('dealing_type_b'),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c'),
                    'dealing_type_d' => $this->input->post('dealing_type_d'),
                    'dealing_type_e' => $this->input->post('dealing_type_e'),
                    'dealing_type_f' => $this->input->post('dealing_type_f'),
                    'dealing_type_g' => $this->input->post('dealing_type_g'),
                    'dealing_type_h' => $this->input->post('dealing_type_h'),
                    'dealing_type_i ' => $this->input->post('dealing_type_i'),
                    'dealing_type_j ' => $this->input->post('dealing_type_j '),
                    'dealing_type_k' => $this->input->post('dealing_type_k'),
                    'dealing_type_l' => $this->input->post('dealing_type_l'),
                    'dealing_type_m' => $this->input->post('dealing_type_m'),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name'),
                    'GMO_method' => $this->input->post('pc2_GMO_method'),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin'),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class'),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps'),
                    'project_transport' => $this->input->post('pc2_project_transport'),
                    'project_disposal' => $this->input->post('pc2_project_disposal'),
                    'project_SOP' => $this->input->post('pc2_project_SOP'),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('pc2_officer_notified'),
                    'officer_name' => $this->input->post('pc2_officer_name'),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager'),
                    'editable' => $editableValue,
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus,
                    'editable' => $editableValue
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $appID,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
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
                redirect('home/index');
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
            
            if (!isset($save) && !isset($submit)){
                
                $this->load->template('lmoproj_view', $data);
                
            }elseif(isset($save)){
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved'));
                $ar2 = implode(',',$this->input->post('personnel_designation'));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name'));
                $ar4 = implode(',',$this->input->post('project_team_address'));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number'));
                $ar6 = implode(',',$this->input->post('project_team_email_address'));
                $ar7 = implode(',',$this->input->post('project_team_qualification'));
                $ar8 = implode(',',$this->input->post('project_team_designation'));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent'));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor'));
                $ar11= implode(',',$this->input->post('LMO_desc_method'));
                $ar12 = implode(',',$this->input->post('LMO_desc_class'));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait'));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function'));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard'));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments'));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management'));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual'));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments'));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management'));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual'));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard'));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments'));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management'));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual'));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard'));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments'));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management'));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual'));
                $ar31 = implode(',',$this->input->post('premise_name'));
                $ar32 = implode(',',$this->input->post('premise_type'));
                $ar33 = implode(',',$this->input->post('premise_BSL'));
                $ar34 = implode(',',$this->input->post('premise_IBC'));
                $ar35 = implode(',',$this->input->post('premise_IBC_date'));
                $ar36 = implode(',',$this->input->post('premise_certification_date'));
                $ar37 = implode(',',$this->input->post('premise_certification_no'));
                $ar38 = implode(',',$this->input->post('premise_address'));
                $ar39 = implode(',',$this->input->post('premise_officer_name'));
                $ar40 = implode(',',$this->input->post('premise_telephone_business'));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile'));
                $ar42 = implode(',',$this->input->post('premise_fax'));
                $ar43 = implode(',',$this->input->post('premise_email'));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification'));
                $ar45 = implode(',',$this->input->post('project_add_name'));
                $ar46 = implode(',',$this->input->post('project_add_department'));
                $ar47 = implode(',',$this->input->post('project_add_campus'));
                $ar48 = implode(',',$this->input->post('project_add_postal_address'));
                $ar49 = implode(',',$this->input->post('project_add_telephone'));
                $ar50 = implode(',',$this->input->post('project_add_fax'));
                $ar51 = implode(',',$this->input->post('project_add_email_address'));
                $ar52 = implode(',',$this->input->post('project_add_title'));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification'));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name'));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department'));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus'));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address'));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone'));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address'));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name'),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address'),
                    'collaborating_partners' => $this->input->post('collaborating_partners'),
                    'project_title' => $this->input->post('project_title'),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology'),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms'),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms'),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits'),
                    'premises' => $this->input->post('premises'),
                    'period' => $this->input->post('period'),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management'),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan'),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation'),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise'),
                    'PI_training' => $this->input->post('PI_training'),
                    'PI_health' => $this->input->post('PI_health'),
                    'PI_other' => $this->input->post('PI_other'),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name'),
                    'IBC_date' => $this->input->post('IBC_date'),
                    'status' => $saveStatus
                    //End Of Annex 2 Submission
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title'),
                    'project_id' => $proj_id,
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
                    'IBC_date' => $this->input->post('forme_IBC_date'),
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
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    'project_intro_objective' => $this->input->post('project_intro_objective'),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics'),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement'),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion'),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date'),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment'),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
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
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description'),
                    'reference_description' => $this->input->post('reference_description'),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                    'project_title' => $this->input->post('pc1_project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a'),
                    'dealing_type_c' => $this->input->post('dealing_type_c'),
                    'project_summary' => $this->input->post('project_summary'),
                    'GMO_name' => $this->input->post('GMO_name'),
                    'GMO_method' => $this->input->post('GMO_method'),
                    'GMO_origin' => $this->input->post('GMO_origin'),
                    'modified_trait_class' => $this->input->post('modified_trait_class'),
                    'modified_trait_description' => $this->input->post('modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps'),
                    'project_transport' => $this->input->post('project_transport'),
                    'project_disposal' => $this->input->post('project_disposal'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $saveStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('pc2_date_received '),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no'),
                    'project_title' => $this->input->post('pc2_project_title'),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address'),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address'),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a'),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa'),
                    'dealing_type_b' => $this->input->post('dealing_type_b'),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c'),
                    'dealing_type_d' => $this->input->post('dealing_type_d'),
                    'dealing_type_e' => $this->input->post('dealing_type_e'),
                    'dealing_type_f' => $this->input->post('dealing_type_f'),
                    'dealing_type_g' => $this->input->post('dealing_type_g'),
                    'dealing_type_h' => $this->input->post('dealing_type_h'),
                    'dealing_type_i ' => $this->input->post('dealing_type_i'),
                    'dealing_type_j ' => $this->input->post('dealing_type_j '),
                    'dealing_type_k' => $this->input->post('dealing_type_k'),
                    'dealing_type_l' => $this->input->post('dealing_type_l'),
                    'dealing_type_m' => $this->input->post('dealing_type_m'),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name'),
                    'GMO_method' => $this->input->post('pc2_GMO_method'),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin'),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class'),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps'),
                    'project_transport' => $this->input->post('pc2_project_transport'),
                    'project_disposal' => $this->input->post('pc2_project_disposal'),
                    'project_SOP' => $this->input->post('pc2_project_SOP'),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('pc2_officer_notified'),
                    'officer_name' => $this->input->post('pc2_officer_name'),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager'),
                    'editable' => $editableValue,
                    'status' => $saveStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $saveStatus
                );
                
                
                
                if($this->annex2_model->update_saved_data($proj_id, $annex2Data) && $this->forme_model->update_saved_data($proj_id, $formeData) && $this->pc1_model->update_saved_data($proj_id, $pc1Data) && $this->pc2_model->update_saved_data($proj_id, $pc2Data) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSave))
                {
                    
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Project has been successfully submitted!</div>', $annex2Data);
                    redirect('home/index');
                    
                    #$this->session->unset_userdata('projectId');
                    
                        
                } else {
                    
                   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">An error has occured. Please try again later.</div>');
                   redirect('home/index');
  
                }
                 
                
            }elseif(isset($submit)){
                
                //Annex 2 Data
                $ar1 = implode(',',$this->input->post('personnel_involved'));
                $ar2 = implode(',',$this->input->post('personnel_designation'));
                
                //Form E
                $ar3 = implode(',',$this->input->post('project_team_name'));
                $ar4 = implode(',',$this->input->post('project_team_address'));
                $ar5 = implode(',',$this->input->post('project_team_telephone_number'));
                $ar6 = implode(',',$this->input->post('project_team_email_address'));
                $ar7 = implode(',',$this->input->post('project_team_qualification'));
                $ar8 = implode(',',$this->input->post('project_team_designation'));
                $ar9 = implode(',',$this->input->post('LMO_desc_name_parent'));
                $ar10 = implode(',',$this->input->post('LMO_desc_name_donor'));
                $ar11= implode(',',$this->input->post('LMO_desc_method'));
                $ar12 = implode(',',$this->input->post('LMO_desc_class'));
                $ar13 = implode(',',$this->input->post('LMO_desc_trait'));
                $ar14 = implode(',',$this->input->post('LMO_desc_genes_function'));
                $ar15 = implode(',',$this->input->post('risk_assessment_genes_potential_hazard'));
                $ar16 = implode(',',$this->input->post('risk_assessment_genes_comments'));
                $ar17 = implode(',',$this->input->post('risk_assessment_genes_management'));
                $ar18 = implode(',',$this->input->post('risk_assessment_genes_residual'));
                $ar19 = implode(',',$this->input->post('risk_assessment_admin_potential_hazard'));
                $ar20 = implode(',',$this->input->post('risk_assessment_admin_comments'));
                $ar21 = implode(',',$this->input->post('risk_assessment_admin_management'));
                $ar22 = implode(',',$this->input->post('risk_assessment_admin_residual'));
                $ar23 = implode(',',$this->input->post('risk_assessment_containment_potential_hazard'));
                $ar24 = implode(',',$this->input->post('risk_assessment_containment_comments'));
                $ar25 = implode(',',$this->input->post('risk_assessment_containment_management'));
                $ar26 = implode(',',$this->input->post('risk_assessment_containment_residual'));
                $ar27 = implode(',',$this->input->post('risk_assessment_special_potential_hazard'));
                $ar28 = implode(',',$this->input->post('risk_assessment_special_comments'));
                $ar29 = implode(',',$this->input->post('risk_assessment_special_management'));
                $ar30 = implode(',',$this->input->post('risk_assessment_special_residual'));
                $ar31 = implode(',',$this->input->post('premise_name'));
                $ar32 = implode(',',$this->input->post('premise_type'));
                $ar33 = implode(',',$this->input->post('premise_BSL'));
                $ar34 = implode(',',$this->input->post('premise_IBC'));
                $ar35 = implode(',',$this->input->post('premise_IBC_date'));
                $ar36 = implode(',',$this->input->post('premise_certification_date'));
                $ar37 = implode(',',$this->input->post('premise_certification_no'));
                $ar38 = implode(',',$this->input->post('premise_address'));
                $ar39 = implode(',',$this->input->post('premise_officer_name'));
                $ar40 = implode(',',$this->input->post('premise_telephone_business'));
                $ar41 = implode(',',$this->input->post('premise_telephone_mobile'));
                $ar42 = implode(',',$this->input->post('premise_fax'));
                $ar43 = implode(',',$this->input->post('premise_email'));
                
                //PC1
                $ar44 = implode(',',$this->input->post('project_add_qualification'));
                $ar45 = implode(',',$this->input->post('project_add_name'));
                $ar46 = implode(',',$this->input->post('project_add_department'));
                $ar47 = implode(',',$this->input->post('project_add_campus'));
                $ar48 = implode(',',$this->input->post('project_add_postal_address'));
                $ar49 = implode(',',$this->input->post('project_add_telephone'));
                $ar50 = implode(',',$this->input->post('project_add_fax'));
                $ar51 = implode(',',$this->input->post('project_add_email_address'));
                $ar52 = implode(',',$this->input->post('project_add_title'));
                
                //PC2
                $ar53 = implode(',',$this->input->post('pc2_project_add_qualification'));
                $ar54 = implode(',',$this->input->post('pc2_project_add_name'));
                $ar55 = implode(',',$this->input->post('pc2_project_add_department'));
                $ar56 = implode(',',$this->input->post('pc2_project_add_campus'));
                $ar57 = implode(',',$this->input->post('pc2_project_add_postal_address'));
                $ar58 = implode(',',$this->input->post('pc2_project_add_telephone'));
                $ar59 = implode(',',$this->input->post('pc2_project_add_fax'));
                $ar60 = implode(',',$this->input->post('pc2_project_add_email_address'));
                $ar61 = implode(',',$this->input->post('pc2_project_add_title'));
                $editableValue = 0;
                $appID = $this->input->post('appid');
                
                //hirarc
                $ar62 = implode(',',$this->input->post('HIRARC_activity'));
                $ar63 = implode(',',$this->input->post('HIRARC_hazard'));
                $ar64 = implode(',',$this->input->post('HIRARC_effects'));
                $ar65 = implode(',',$this->input->post('HIRARC_risk_control'));
                $ar66 = implode(',',$this->input->post('HIRARC_LLH'));
                $ar67 = implode(',',$this->input->post('HIRARC_SEV'));
                $ar68 = implode(',',$this->input->post('HIRARC_RR'));
                $ar69 = implode(',',$this->input->post('HIRARC_control_measure'));
                $ar70 = implode(',',$this->input->post('HIRARC_PIC'));
                
                
                $annex2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'applicant_name' => $this->input->post('applicant_name'),
                    'project_id' => $proj_id,
                    'institutional_address' => $this->input->post('institutional_address'),
                    'collaborating_partners' => $this->input->post('collaborating_partners'),
                    'project_title' => $this->input->post('project_title'),
                    'project_objective_methodology' => $this->input->post('project_objective_methodology'),
                    'biological_system_parent_organisms' => $this->input->post('biological_system_parent_organisms'),
                    'biological_system_donor_organisms' => $this->input->post('biological_system_donor_organisms'),
                    'biological_system_modified_traits' => $this->input->post('biological_system_modified_traits'),
                    'premises' => $this->input->post('premises'),
                    'period' => $this->input->post('period'),
                    'risk_assessment_and_management' => $this->input->post('risk_assessment_and_management'),
                    'emergency_response_plan' => $this->input->post('emergency_response_plan'),
                    'IBC_recommendation' => $this->input->post('IBC_recommendation'),
                    'PI_experience_and_expertise' => $this->input->post('PI_experience_and_expertise'),
                    'PI_training' => $this->input->post('PI_training'),
                    'PI_health' => $this->input->post('PI_health'),
                    'PI_other' => $this->input->post('PI_other'),
                    'personnel_involved' => $ar1,
                    'personnel_designation' => $ar2,
                    'IBC_name' => $this->input->post('IBC_name'),
                    'IBC_date' => $this->input->post('IBC_date'),
                    'status' => $submitStatus
                    //End Of Annex 2 Submission
                    
                    
                );
                
                //Form E Submission
                $formeData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_title' => $this->input->post('forme_project_title'),
                    'project_id' => $proj_id,
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
                    'IBC_date' => $this->input->post('forme_IBC_date'),
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
                    'project_team_name' => $ar3,
                    'project_team_address' => $ar4,
                    'project_team_telephone_number' => $ar5,
                    'project_team_email_address' => $ar6,
                    'project_team_qualification' => $ar7,
                    'project_team_designation' => $ar8,
                    'project_intro_objective' => $this->input->post('project_intro_objective'),
                    'project_intro_specifics' => $this->input->post('project_intro_specifics'),
                    'project_intro_BSL' => $this->input->post('project_intro_BSL'),
                    'project_intro_intended_date_commencement' => $this->input->post('project_intro_intended_date_commencement'),
                    'project_intro_expected_date_completion' => $this->input->post('project_intro_expected_date_completion'),
                    'project_intro_importation_date' => $this->input->post('project_intro_importation_date'),
                    'project_intro_field_experiment' => $this->input->post('project_intro_field_experiment'),
                    'LMO_desc_name_parent' => $ar9,
                    'LMO_desc_name_donor' => $ar10,
                    'LMO_desc_method' => $ar11,
                    'LMO_desc_class' => $ar12,
                    'LMO_desc_trait' => $ar13,
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
                    'premise_name' => $ar31,
                    'premise_type' => $ar32,
                    'premise_BSL' => $ar33,
                    'premise_IBC' => $ar34,
                    'premise_IBC_date' => $ar35,
                    'premise_certification_date' => $ar36,
                    'premise_certification_no' => $ar37,
                    'premise_address' => $ar38,
                    'premise_officer_name' => $ar39,
                    'premise_telephone_business' => $ar40,
                    'premise_telephone_mobile' => $ar41,
                    'premise_fax' => $ar42,
                    'premise_email' => $ar43,
                    'confidential_description' => $this->input->post('confidential_description'),
                    'reference_description' => $this->input->post('reference_description'),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                //PC1 Form Submission
                $pc1Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('date_received '),
                    'SBC_reference_no' => $this->input->post('SBC_reference_no'),
                    'project_title' => $this->input->post('pc1_project_title'),
                    'project_supervisor_title' => $this->input->post('project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('project_supervisor_postal_address'),
                    'pc1_project_supervisor_telephone' => $this->input->post('pc1_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('project_supervisor_email_address'),
                    'project_add_title ' => $ar52,
                    'project_add_qualification' => $ar44,
                    'project_add_name' => $ar45,
                    'project_add_department' => $ar46,
                    'project_add_campus' => $ar47,
                    'project_add_postal_address' => $ar48,
                    'project_add_telephone' => $ar49,
                    'project_add_fax' => $ar50,
                    'project_add_email_address' => $ar51,
                    'dealing_type_a' => $this->input->post('dealing_type_a'),
                    'dealing_type_c' => $this->input->post('dealing_type_c'),
                    'project_summary' => $this->input->post('project_summary'),
                    'GMO_name' => $this->input->post('GMO_name'),
                    'GMO_method' => $this->input->post('GMO_method'),
                    'GMO_origin' => $this->input->post('GMO_origin'),
                    'modified_trait_class' => $this->input->post('modified_trait_class'),
                    'modified_trait_description' => $this->input->post('modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('project_hazard_steps'),
                    'project_transport' => $this->input->post('project_transport'),
                    'project_disposal' => $this->input->post('project_disposal'),
                    'project_SOP' => $this->input->post('project_SOP'),
                    'project_facilities_building_no' => $this->input->post('project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('officer_notified'),
                    'officer_name' => $this->input->post('officer_name'),
                    'laboratory_manager' => $this->input->post('laboratory_manager'),
                    'status' => $submitStatus
                );
                
                //PC2 Form Submission
                $pc2Data = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'date_received ' => $this->input->post('pc2_date_received '),
                    'SBC_reference_no' => $this->input->post('pc2_SBC_reference_no'),
                    'project_title' => $this->input->post('pc2_project_title'),
                    'project_supervisor_title' => $this->input->post('pc2_project_supervisor_title'),
                    'project_supervisor_name' => $this->input->post('pc2_project_supervisor_name'),
                    'project_supervisor_qualification' => $this->input->post('pc2_project_supervisor_qualification'),
                    'project_supervisor_department' => $this->input->post('pc2_project_supervisor_department'),
                    'project_supervisor_campus' => $this->input->post('pc2_project_supervisor_campus'),
                    'project_supervisor_postal_address' => $this->input->post('pc2_project_supervisor_postal_address'),
                    'pc2_project_supervisor_telephone' => $this->input->post('pc2_project_supervisor_telephone'),
                    'project_supervisor_fax' => $this->input->post('pc2_project_supervisor_fax'),
                    'project_supervisor_email_address' => $this->input->post('pc2_project_supervisor_email_address'),
                    'project_add_title ' => $ar61,
                    'project_add_qualification' => $ar53,
                    'project_add_name' => $ar54,
                    'project_add_department' => $ar55,
                    'project_add_campus' => $ar56,
                    'project_add_postal_address' => $ar57,
                    'project_add_telephone' => $ar58,
                    'project_add_fax' => $ar59,
                    'project_add_email_address' => $ar60,
                    'dealing_type_a' => $this->input->post('pc2_dealing_type_a'),
                    'dealing_type_aa' => $this->input->post('dealing_type_aa'),
                    'dealing_type_b' => $this->input->post('dealing_type_b'),
                    'dealing_type_c' => $this->input->post('pc2_dealing_type_c'),
                    'dealing_type_d' => $this->input->post('dealing_type_d'),
                    'dealing_type_e' => $this->input->post('dealing_type_e'),
                    'dealing_type_f' => $this->input->post('dealing_type_f'),
                    'dealing_type_g' => $this->input->post('dealing_type_g'),
                    'dealing_type_h' => $this->input->post('dealing_type_h'),
                    'dealing_type_i ' => $this->input->post('dealing_type_i'),
                    'dealing_type_j ' => $this->input->post('dealing_type_j '),
                    'dealing_type_k' => $this->input->post('dealing_type_k'),
                    'dealing_type_l' => $this->input->post('dealing_type_l'),
                    'dealing_type_m' => $this->input->post('dealing_type_m'),
                    'project_summary' => $this->input->post('pc2_project_summary'),
                    'GMO_name' => $this->input->post('pc2_GMO_name'),
                    'GMO_method' => $this->input->post('pc2_GMO_method'),
                    'GMO_origin' => $this->input->post('pc2_GMO_origin'),
                    'modified_trait_class' => $this->input->post('pc2_modified_trait_class'),
                    'modified_trait_description' => $this->input->post('pc2_modified_trait_description'),
                    'project_hazard_staff' => $this->input->post('pc2_project_hazard_staff'),
                    'project_hazard_environment' => $this->input->post('pc2_project_hazard_environment'),
                    'project_hazard_steps' => $this->input->post('pc2_project_hazard_steps'),
                    'project_transport' => $this->input->post('pc2_project_transport'),
                    'project_disposal' => $this->input->post('pc2_project_disposal'),
                    'project_SOP' => $this->input->post('pc2_project_SOP'),
                    'project_facilities_building_no' => $this->input->post('pc2_project_facilities_building_no'),
                    'project_facilities_room_no' => $this->input->post('pc2_project_facilities_room_no'),
                    'project_facilities_containment_level' => $this->input->post('pc2_project_facilities_containment_level'),
                    'project_facilities_certification_no' => $this->input->post('pc2_project_facilities_certification_no'),
                    'officer_notified' => $this->input->post('pc2_officer_notified'),
                    'officer_name' => $this->input->post('pc2_officer_name'),
                    'laboratory_manager' => $this->input->post('pc2_laboratory_manager'),
                    'editable' => $editableValue,
                    'status' => $submitStatus
                );
                
                $hirarcData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'company_name' => $this->input->post('company_name'),
                    'date' => $this->input->post('date'),
                    'process_location' => $this->input->post('process_location'),
                    'conducted_name' => $this->input->post('conducted_name'),
                    'conducted_designation' => $this->input->post('conducted_designation'),
                    'approved_name' => $this->input->post('approved_name'),
                    'approved_designation' => $this->input->post('approved_designation'),
                    'date_from' => $this->input->post('date_from'),
                    'date_to' => $this->input->post('date_to'),
                    'review_date' => $this->input->post('review_date'),
                    'HIRARC_activity' => $ar62,
                    'HIRARC_hazard' => $ar63,
                    'HIRARC_effects' => $ar64,
                    'HIRARC_risk_control' => $ar65,
                    'HIRARC_LLH' => $ar66,
                    'HIRARC_SEV' => $ar67,
                    'HIRARC_RR' => $ar68,
                    'HIRARC_control_measure' => $ar69,
                    'HIRARC_PIC' => $ar70,
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                $swpData = array(
                    'account_id' => $this->session->userdata('account_id'),
                    'project_id' => $proj_id,
                    'SWP_prepared_by' => $this->input->post('SWP_prepared_by'),
                    'SWP_staff_student_no' => $this->input->post('SWP_staff_student_no'),
                    'SWP_designation' => $this->input->post('SWP_designation'),
                    'SWP_faculty' => $this->input->post('SWP_faculty'),
                    'SWP_unit_title' => $this->input->post('SWP_unit_title'),
                    'SWP_project_title' => $this->input->post('SWP_project_title'),
                    'SWP_location' => $this->input->post('SWP_location'),
                    'SWP_description' => $this->input->post('SWP_description'),
                    'SWP_preoperational' => $this->input->post('SWP_preoperational'),
                    'SWP_operational' => $this->input->post('SWP_operational'),
                    'SWP_postoperational' => $this->input->post('SWP_postoperational'),
                    'SWP_risk' => $this->input->post('SWP_risk'),
                    'SWP_control' => $this->input->post('SWP_control'),
                    'SWP_declaration_name' => $this->input->post('SWP_declaration_name'),
                    'SWP_declaration_date' => $this->input->post('SWP_declaration_date'),
                    'SWP_signature_prepared_by' => $this->input->post('SWP_signature_prepared_by'),
                    'SWP_signature_PI' => $this->input->post('SWP_signature_PI'),
                    'SWP_signature_prepared_by_date' => $this->input->post('SWP_signature_prepared_by_date'),
                    'SWP_signature_PI_date' => $this->input->post('SWP_signature_PI_date'),
                    'SWP_lab_trained' => $this->input->post('SWP_lab_trained'),
                    'SWP_lab_trainer' => $this->input->post('SWP_lab_trainer'),
                    'SWP_approval_by' => $this->input->post('SWP_approval_by'),
                    'SWP_declined_by' => $this->input->post('SWP_declined_by'),
                    'SWP_approve_decline_date' => $this->input->post('SWP_approve_decline_date'),
                    'SWP_approve_decline_remarks' => $this->input->post('SWP_approve_decline_remarks'),
                    'SWP_reviewed_by' => $this->input->post('SWP_reviewed_by'),
                    'SWP_reviewed_by_date' => $this->input->post('SWP_reviewed_by_date'),
                    'SWP_reviewed_by_remarks' => $this->input->post('SWP_reviewed_by_remarks'),
                    'application_type' => $this->input->post('application_type'),
                    'status' => $submitStatus
                );
                
                
                if($this->annex2_model->update_saved_data($proj_id, $annex2Data) && $this->forme_model->update_saved_data($proj_id, $formeData) && $this->pc1_model->update_saved_data($proj_id, $pc1Data) && $this->pc2_model->update_saved_data($proj_id, $pc2Data) && $this->hirarc_model->update_saved_data($proj_id, $hirarcData) && $this->swp_model->update_saved_data($proj_id, $swpData) && $this->project_model->update_proj_status($proj_id, $projectSubmit))
                {
                    
                    $this->notification_model->insert_new_notification(null, 4, "New Annex 2 Application", "The following user has submitted a new application form: " . $this->session->userdata('account_name'));
                    
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
?>