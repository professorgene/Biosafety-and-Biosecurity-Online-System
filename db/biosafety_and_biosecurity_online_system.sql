-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 11:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biosafety_and_biosecurity_online_system`
--

CREATE DATABASE IF NOT EXISTS biosafety_and_biosecurity_online_system;
USE biosafety_and_biosecurity_online_system;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(10) UNSIGNED NOT NULL,
  `account_email` varchar(100) NOT NULL,
  `account_fullname` varchar(100) NOT NULL,
  `account_password` varchar(20) NOT NULL,
  `account_type` int(1) UNSIGNED NOT NULL,
  `account_approved` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `account_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_email`, `account_fullname`, `account_password`, `account_type`, `account_approved`, `account_date`) VALUES
(1, '100061722@students.swinburne.edu.my', 'Eugene Chiang', 'lagoon', 4, 1, '2018-04-09 21:44:22'),
(2, '100072290@students.swinburne.edu.my', 'Si Kim Yeung', '123456', 1, 1, '2018-10-05 13:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `annex2`
--

CREATE TABLE `annex2` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '1',
  `project_name` varchar(250) NOT NULL,
  `general_info_edit` int(1) DEFAULT '0',
  `applicant_name` varchar(100) DEFAULT NULL,
  `institutional_address` varchar(250) DEFAULT NULL,
  `collaborating_partners` varchar(1000) DEFAULT NULL,
  `project_title` varchar(150) DEFAULT NULL,
  `exp_param_edit` int(1) DEFAULT '0',
  `project_objective_methodology` varchar(1000) DEFAULT NULL,
  `biological_system_parent_organisms` varchar(1000) DEFAULT NULL,
  `biological_system_donor_organisms` varchar(1000) DEFAULT NULL,
  `biological_system_modified_traits` varchar(1000) DEFAULT NULL,
  `premises` varchar(1000) DEFAULT NULL,
  `period` varchar(1000) DEFAULT NULL,
  `risk_assessment_and_management` varchar(1000) DEFAULT NULL,
  `emergency_response_plan` varchar(1000) DEFAULT NULL,
  `IBC_recommendation` varchar(1000) DEFAULT NULL,
  `PI_details_edit` int(1) DEFAULT '0',
  `PI_experience_and_expertise` varchar(1000) DEFAULT NULL,
  `PI_training` varchar(1000) DEFAULT NULL,
  `PI_health` varchar(1000) DEFAULT NULL,
  `PI_other` varchar(1000) DEFAULT NULL,
  `personnel_involved_list_edit` int(1) DEFAULT '0',
  `personnel_involved` varchar(100) DEFAULT NULL,
  `personnel_designation` varchar(100) DEFAULT NULL,
  `IBC_approved` int(1) DEFAULT NULL,
  `IBC_name` varchar(100) DEFAULT NULL,
  `IBC_date` date DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annex2`
--

INSERT INTO `annex2` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_name`, `general_info_edit`, `applicant_name`, `institutional_address`, `collaborating_partners`, `project_title`, `exp_param_edit`, `project_objective_methodology`, `biological_system_parent_organisms`, `biological_system_donor_organisms`, `biological_system_modified_traits`, `premises`, `period`, `risk_assessment_and_management`, `emergency_response_plan`, `IBC_recommendation`, `PI_details_edit`, `PI_experience_and_expertise`, `PI_training`, `PI_health`, `PI_other`, `personnel_involved_list_edit`, `personnel_involved`, `personnel_designation`, `IBC_approved`, `IBC_name`, `IBC_date`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 1, 'New Save Test', 0, 'Save 2', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, ',,,,', ',,,,', NULL, '', '0000-00-00', NULL, 0, 'saved'),
(2, 2, NULL, 1, 'Test Submit', 0, '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, ',,,,', ',,,,', NULL, '', '0000-00-00', NULL, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `annex3`
--

CREATE TABLE `annex3` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '2',
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `reference_no` varchar(10) DEFAULT NULL,
  `annex3_header_edit` int(1) DEFAULT '0',
  `organization` varchar(250) DEFAULT NULL,
  `faculty` varchar(250) DEFAULT NULL,
  `laboratory` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `annex3_sec_1_edit` int(1) DEFAULT '0',
  `PI_name` varchar(100) DEFAULT NULL,
  `PI_telephone_number` int(20) DEFAULT NULL,
  `PI_reported_date` date DEFAULT NULL,
  `PI_reported_time` varchar(10) DEFAULT NULL,
  `annex3_sec_2_edit` int(1) DEFAULT '0',
  `incident_description` varchar(500) DEFAULT NULL,
  `incident_cause_checklist_faulty_equipment` int(1) DEFAULT NULL,
  `incident_cause_checklist_no_equipment` int(1) DEFAULT NULL,
  `incident_cause_checklist_storage` int(1) DEFAULT NULL,
  `incident_cause_checklist_weather` int(1) DEFAULT NULL,
  `incident_cause_checklist_assistance` int(1) DEFAULT NULL,
  `incident_cause_checklist_electrical` int(1) DEFAULT NULL,
  `incident_cause_checklist_carelessness` int(1) DEFAULT NULL,
  `incident_cause_checklist_terrain` int(1) DEFAULT NULL,
  `incident_cause_checklist_workspace` int(1) DEFAULT NULL,
  `incident_cause_checklist_training` int(1) DEFAULT NULL,
  `incident_cause_checklist_poor_access` int(1) DEFAULT NULL,
  `incident_cause_checklist_unknown` int(1) DEFAULT NULL,
  `incident_cause_checklist_maintenance_staff` int(1) DEFAULT NULL,
  `incident_cause_checklist_supervision` int(1) DEFAULT NULL,
  `incident_cause_checklist_method` int(1) DEFAULT NULL,
  `incident_cause_checklist_none` int(1) DEFAULT NULL,
  `incident_cause_checklist_none_description` varchar(500) DEFAULT NULL,
  `incident_LMO_rDNA_release` int(1) DEFAULT NULL,
  `incident_LMO_rDNA_response` varchar(500) DEFAULT NULL,
  `incident_contribution` varchar(500) DEFAULT NULL,
  `incident_personal_factors` varchar(500) DEFAULT NULL,
  `incident_corrective_actions` varchar(500) DEFAULT NULL,
  `incident_responsible` varchar(500) DEFAULT NULL,
  `signature_PI_edit` int(1) DEFAULT '0',
  `signature_PI_name` varchar(100) DEFAULT NULL,
  `signature_PI_date` date DEFAULT NULL,
  `signature_BO_name` varchar(100) DEFAULT NULL,
  `signature_BO_date` date DEFAULT NULL,
  `signature_IBC_name` varchar(100) DEFAULT NULL,
  `signature_IBC_date` date DEFAULT NULL,
  `IBC_approval` int(1) DEFAULT NULL,
  `IBC_termination` int(1) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `annex4`
--

CREATE TABLE `annex4` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '3',
  `reference_no` varchar(10) DEFAULT NULL,
  `annex4_sec_1_edit` int(1) DEFAULT '0',
  `personnel_name` varchar(100) DEFAULT NULL,
  `personnel_NRIC` int(20) DEFAULT NULL,
  `personnel_age` int(2) DEFAULT NULL,
  `personnel_race` varchar(20) DEFAULT NULL,
  `personnel_telephone_number` int(20) DEFAULT NULL,
  `personnel_office_number` int(20) DEFAULT NULL,
  `personnel_ext_number` int(20) DEFAULT NULL,
  `personnel_employment_job` varchar(100) DEFAULT NULL,
  `personnel_employment_faculty` varchar(100) DEFAULT NULL,
  `personnel_employment_status` int(1) DEFAULT NULL,
  `personnel_employment_duration` varchar(100) DEFAULT NULL,
  `annex4_sec_2_edit` int(1) DEFAULT '0',
  `exposure_location` varchar(500) DEFAULT NULL,
  `exposure_date` date DEFAULT NULL,
  `exposure_time` varchar(10) DEFAULT NULL,
  `exposure_diagnosis` varchar(500) DEFAULT NULL,
  `exposure_treatment` int(1) DEFAULT NULL,
  `exposure_medical_cert` int(1) DEFAULT NULL,
  `exposure_medical_cert_duration` varchar(100) DEFAULT NULL,
  `exposure_work_description` varchar(500) DEFAULT NULL,
  `exposure_hazard_or_agent` varchar(500) DEFAULT NULL,
  `exposure_duration` varchar(100) DEFAULT NULL,
  `exposure_symptoms` varchar(500) DEFAULT NULL,
  `exposure_symptoms_duration` varchar(100) DEFAULT NULL,
  `signature_PI_edit` int(1) DEFAULT '0',
  `signature_PI_name` varchar(100) DEFAULT NULL,
  `signature_PI_date` date DEFAULT NULL,
  `signature_BO_name` varchar(100) DEFAULT NULL,
  `signature_BO_date` date DEFAULT NULL,
  `signature_IBC_name` varchar(100) DEFAULT NULL,
  `signature_IBC_date` date DEFAULT NULL,
  `IBC_approval` int(1) DEFAULT NULL,
  `IBC_termination` int(1) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `annex5`
--

CREATE TABLE `annex5` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '4',
  `annex5_sec_1_edit` int(1) DEFAULT '0',
  `identification_PI_name` varchar(100) NOT NULL,
  `identification_email_address` varchar(150) NOT NULL,
  `identification_faculty` varchar(200) NOT NULL,
  `identification_telephone` int(20) NOT NULL,
  `identification_IBC_reference_no` varchar(10) DEFAULT NULL,
  `identification_NBB_reference_no` varchar(10) DEFAULT NULL,
  `identification_project_title` varchar(100) NOT NULL,
  `identification_LMO_rDNA` varchar(100) NOT NULL,
  `annex5_sec_2_edit` int(1) DEFAULT '0',
  `request_type` int(1) NOT NULL,
  `request_description` varchar(500) DEFAULT NULL,
  `annex5_sec_3_edit` int(1) DEFAULT '0',
  `PI_change` int(1) NOT NULL,
  `RG_change` int(1) NOT NULL,
  `BSL_change` int(1) NOT NULL,
  `LMO_rDNA_type_change` int(1) NOT NULL,
  `LMO_rDNA_moved` int(1) NOT NULL,
  `LMO_rDNA_usage_change` int(1) NOT NULL,
  `annex5_sec_4_edit` int(1) DEFAULT '0',
  `adverse_events` int(1) NOT NULL,
  `incident_report` varchar(500) DEFAULT NULL,
  `signature_PI_edit` int(1) DEFAULT '0',
  `signature_PI_name` varchar(100) DEFAULT NULL,
  `signature_PI_date` date DEFAULT NULL,
  `signature_BO_name` varchar(100) DEFAULT NULL,
  `signature_BO_date` date DEFAULT NULL,
  `signature_IBC_name` varchar(100) DEFAULT NULL,
  `signature_IBC_date` date DEFAULT NULL,
  `IBC_approval` int(1) DEFAULT NULL,
  `IBC_termination` int(1) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `announcement_description` varchar(1000) NOT NULL,
  `announcement_date` datetime NOT NULL,
  `announcement_page` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `annualfinalreport`
--

CREATE TABLE `annualfinalreport` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '5',
  `date_received` date DEFAULT NULL,
  `annualfinalreport_header_edit` int(1) DEFAULT '0',
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `project_approval_date` date DEFAULT NULL,
  `project_report_date` date DEFAULT NULL,
  `report_type` int(1) DEFAULT NULL,
  `annualfinalreport_sec_1_edit` int(1) DEFAULT '0',
  `project_title` varchar(100) DEFAULT NULL,
  `annualfinalreport_sec_2_edit` int(1) DEFAULT '0',
  `chief_investigator` varchar(100) DEFAULT NULL,
  `annualfinalreport_sec_3_edit` int(1) DEFAULT '0',
  `personnel_extra` int(1) DEFAULT NULL,
  `personnel_extra_title` varchar(500) DEFAULT NULL,
  `personnel_extra_name` varchar(500) DEFAULT NULL,
  `personnel_extra_qualifications` varchar(500) DEFAULT NULL,
  `personnel_extra_department` varchar(500) DEFAULT NULL,
  `personnel_extra_campus` varchar(500) DEFAULT NULL,
  `personnel_extra_postal_address` varchar(500) DEFAULT NULL,
  `personnel_extra_telephone` int(20) DEFAULT NULL,
  `personnel_extra_fax` varchar(100) DEFAULT NULL,
  `personnel_extra_email_address` varchar(500) DEFAULT NULL,
  `annualfinalreport_sec_4_edit` int(1) DEFAULT '0',
  `project_summary` varchar(500) DEFAULT NULL,
  `annualfinalreport_sec_5_edit` int(1) DEFAULT '0',
  `project_outline` varchar(500) DEFAULT NULL,
  `annualfinalreport_sec_6_edit` int(1) DEFAULT '0',
  `project_incidents` varchar(500) DEFAULT NULL,
  `annualfinalreport_sec_7_edit` int(1) DEFAULT '0',
  `project_SOP` varchar(255) DEFAULT NULL,
  `annualfinalreport_sec_8_edit` int(1) DEFAULT '0',
  `project_facility_changes` int(1) DEFAULT NULL,
  `project_facility_building_number` varchar(100) DEFAULT NULL,
  `project_facility_room_number` varchar(100) DEFAULT NULL,
  `project_facility_description` varchar(500) DEFAULT NULL,
  `project_sign_off_chief_investigator_name` varchar(100) DEFAULT NULL,
  `project_sign_off_BO_name` varchar(100) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biohazardousmaterial`
--

CREATE TABLE `biohazardousmaterial` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '6',
  `date_received` date DEFAULT NULL,
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `biohazard_sec_1_edit` int(1) DEFAULT '0',
  `project_title` varchar(100) NOT NULL,
  `biohazard_sec_2_edit` int(1) DEFAULT '0',
  `project_supervisor_name` varchar(100) DEFAULT NULL,
  `project_supervisor_department` varchar(100) DEFAULT NULL,
  `project_supervisor_email_address` varchar(100) DEFAULT NULL,
  `biohazard_sec_3_edit` int(1) DEFAULT '0',
  `project_alt_person` varchar(100) DEFAULT NULL,
  `project_alt_department` varchar(100) DEFAULT NULL,
  `project_alt_email` varchar(100) DEFAULT NULL,
  `biohazard_sec_4_edit` int(1) DEFAULT '0',
  `project_personnel_name` varchar(100) DEFAULT NULL,
  `project_personnel_role` varchar(100) DEFAULT NULL,
  `biohazard_sec_5_edit` int(1) DEFAULT '0',
  `proposed_work_known` int(1) DEFAULT NULL,
  `proposed_work_may` int(1) DEFAULT NULL,
  `proposed_work_unknown` int(1) DEFAULT NULL,
  `proposed_work_isolation` int(1) DEFAULT NULL,
  `proposed_work_risk` int(1) DEFAULT NULL,
  `proposed_work_sensitive` int(1) DEFAULT NULL,
  `proposed_work_other` int(1) DEFAULT NULL,
  `biohazard_sec_6_edit` int(1) DEFAULT '0',
  `project_summary` varchar(500) NOT NULL,
  `biohazard_sec_7_edit` int(1) DEFAULT '0',
  `project_activity` varchar(500) NOT NULL,
  `biohazard_sec_8_edit` int(1) DEFAULT '0',
  `project_SOP` blob,
  `project_SOP_title` varchar(100) DEFAULT NULL,
  `project_SOP_risk_title` varchar(100) DEFAULT NULL,
  `biohazard_sec_9_edit` int(1) DEFAULT '0',
  `project_facilities_building` varchar(100) NOT NULL,
  `project_facilities_room` varchar(100) NOT NULL,
  `biohazard_sec_10_edit` int(1) DEFAULT '0',
  `officer_notified` int(1) DEFAULT NULL,
  `officer_name` varchar(100) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `educational`
--

CREATE TABLE `educational` (
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `quiz_name` varchar(100) DEFAULT NULL,
  `quiz_desc` varchar(500) DEFAULT NULL,
  `quiz_fullmark` int(2) UNSIGNED DEFAULT NULL,
  `quiz_question` varchar(1500) DEFAULT NULL,
  `quiz_ans_a` varchar(1500) DEFAULT NULL,
  `quiz_ans_b` varchar(1500) DEFAULT NULL,
  `quiz_ans_c` varchar(1500) DEFAULT NULL,
  `quiz_ans_d` varchar(1500) DEFAULT NULL,
  `quiz_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quiz_approval` int(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational`
--

INSERT INTO `educational` (`quiz_id`, `account_id`, `quiz_name`, `quiz_desc`, `quiz_fullmark`, `quiz_question`, `quiz_ans_a`, `quiz_ans_b`, `quiz_ans_c`, `quiz_ans_d`, `quiz_date`, `quiz_approval`) VALUES
(1, 1, 'Hello World!', 'Programmed to work and not to feel', 3, 'a:3:{i:0;s:32:\"Not even sure if this is real...\";i:1;s:26:\"What is the answer of 2+2?\";i:2;s:31:\"What is the weather like today?\";}', 'a:3:{i:0;s:2:\"ho\";i:1;s:1:\"3\";i:2;s:6:\"Cloudy\";}', 'a:3:{i:0;s:2:\"he\";i:1;s:1:\"4\";i:2;s:5:\"Sunny\";}', 'a:3:{i:0;s:2:\"ha\";i:1;s:1:\"5\";i:2;s:5:\"Rainy\";}', 'a:3:{i:0;s:2:\"hu\";i:1;s:1:\"6\";i:2;s:5:\"Snowy\";}', '2018-10-07 09:19:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exemptdealing`
--

CREATE TABLE `exemptdealing` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '7',
  `date_received` date DEFAULT NULL,
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `exempt_sec_1_edit` int(1) DEFAULT '0',
  `project_title` varchar(100) DEFAULT NULL,
  `exempt_sec_2_edit` int(1) DEFAULT '0',
  `project_supervisor_title` varchar(100) DEFAULT NULL,
  `project_supervisor_name` varchar(100) DEFAULT NULL,
  `project_supervisor_qualification` varchar(100) DEFAULT NULL,
  `project_supervisor_department` varchar(100) DEFAULT NULL,
  `project_supervisor_campus` varchar(100) DEFAULT NULL,
  `project_supervisor_postal_address` varchar(100) DEFAULT NULL,
  `project_supervisor_telephone` varchar(20) DEFAULT NULL,
  `project_supervisor_fax` varchar(20) DEFAULT NULL,
  `project_supervisor_email_address` varchar(100) DEFAULT NULL,
  `exempt_sec_3_edit` int(1) DEFAULT '0',
  `project_add_title` varchar(500) DEFAULT NULL,
  `project_add_name` varchar(500) DEFAULT NULL,
  `project_add_qualification` varchar(500) DEFAULT NULL,
  `project_add_department` varchar(500) DEFAULT NULL,
  `project_add_campus` varchar(500) DEFAULT NULL,
  `project_add_postal_address` varchar(500) DEFAULT NULL,
  `project_add_telephone` varchar(100) DEFAULT NULL,
  `project_add_fax` varchar(100) DEFAULT NULL,
  `project_add_email_address` varchar(500) DEFAULT NULL,
  `exempt_sec_4_edit` int(1) DEFAULT '0',
  `exemption_type_2` int(1) DEFAULT NULL,
  `exemption_type_3` int(1) DEFAULT NULL,
  `exemption_type_3A` int(1) DEFAULT NULL,
  `exemption_type_4` int(1) DEFAULT NULL,
  `exemption_type_5` int(1) DEFAULT NULL,
  `exempt_sec_5_edit` int(1) DEFAULT '0',
  `project_summary` varchar(500) DEFAULT NULL,
  `exempt_sec_6_edit` int(1) DEFAULT '0',
  `project_hazard` varchar(500) DEFAULT NULL,
  `exempt_sec_7_edit` int(1) DEFAULT '0',
  `project_SOP` varchar(250) DEFAULT NULL,
  `exempt_sec_8_edit` int(1) DEFAULT '0',
  `project_facilities_building_no` varchar(100) DEFAULT NULL,
  `project_facilities_room_no` varchar(100) DEFAULT NULL,
  `project_facilities_containment_level` varchar(50) DEFAULT NULL,
  `project_facilities_certification_no` varchar(10) DEFAULT NULL,
  `exempt_sec_9_edit` int(1) DEFAULT '0',
  `officer_notified` int(1) DEFAULT NULL,
  `officer_name` varchar(100) DEFAULT NULL,
  `laboratory_manager` varchar(100) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forme`
--

CREATE TABLE `forme` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '8',
  `project_name` varchar(250) NOT NULL,
  `forme_project_title_edit` int(1) DEFAULT '0',
  `project_title` varchar(100) DEFAULT NULL,
  `forme_notif_list_edit` int(1) DEFAULT '0',
  `checklist_form` int(1) DEFAULT NULL,
  `checklist_coverletter` int(1) DEFAULT NULL,
  `checklist_IBC` int(1) DEFAULT NULL,
  `checklist_IBC_report` int(1) DEFAULT NULL,
  `checklist_clearance` int(1) DEFAULT NULL,
  `checklist_CBI` int(1) DEFAULT NULL,
  `checklist_CBI_submit` int(1) DEFAULT NULL,
  `checklist_support` int(1) DEFAULT NULL,
  `checklist_RnD` int(1) DEFAULT NULL,
  `forme_preliminary_info_edit` int(1) DEFAULT '0',
  `organization` varchar(100) DEFAULT NULL,
  `applicant_name_PI` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `telephone_office` varchar(20) DEFAULT NULL,
  `telephone_mobile` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `postal_address` varchar(100) DEFAULT NULL,
  `project_title2` varchar(100) DEFAULT NULL,
  `IBC_project_identification_no` int(10) DEFAULT NULL,
  `notified_first` varchar(10) DEFAULT NULL,
  `NBB_reference` varchar(500) DEFAULT NULL,
  `NBB_difference` varchar(500) DEFAULT NULL,
  `forme_importer_details_edit` int(1) DEFAULT '0',
  `importer_organization` varchar(100) DEFAULT NULL,
  `importer_contact_person` varchar(100) DEFAULT NULL,
  `importer_position` varchar(100) DEFAULT NULL,
  `importer_telephone_office` varchar(20) DEFAULT NULL,
  `importer_telephone_mobile` varchar(20) DEFAULT NULL,
  `importer_fax` varchar(20) DEFAULT NULL,
  `importer_email_address` varchar(100) DEFAULT NULL,
  `importer_postal_address` varchar(100) DEFAULT NULL,
  `forme_IBC_details_edit` int(1) DEFAULT '0',
  `IBC_organization_name` varchar(100) DEFAULT NULL,
  `IBC_chairperson` varchar(100) DEFAULT NULL,
  `IBC_telephone_number` varchar(20) DEFAULT NULL,
  `IBC_fax` varchar(20) DEFAULT NULL,
  `IBC_email_address` varchar(100) DEFAULT NULL,
  `forme_IBC_assessment_edit` int(1) DEFAULT '0',
  `IBC_PI_name` varchar(100) DEFAULT NULL,
  `IBC_project_title` varchar(100) DEFAULT NULL,
  `IBC_date` date DEFAULT NULL,
  `IBC_adequate` int(1) DEFAULT NULL,
  `IBC_checklist_activities` int(1) DEFAULT NULL,
  `IBC_checklist_description` int(1) DEFAULT NULL,
  `IBC_checklist_emergency_response` int(1) DEFAULT NULL,
  `IBC_checklist_trained` int(1) DEFAULT NULL,
  `IBC_form_approved` int(1) DEFAULT NULL,
  `IBC_biosafety_approved` int(1) DEFAULT NULL,
  `forme_signature_statuory_edit` int(1) DEFAULT '0',
  `signature_statutory_endorsed` int(1) DEFAULT NULL,
  `signature_statutory_applicant_free` int(1) DEFAULT NULL,
  `forme_PI_signature_edit` int(1) DEFAULT '0',
  `applicant_PI_signature_date` date DEFAULT NULL,
  `applicant_PI_signature_name` varchar(100) DEFAULT NULL,
  `applicant_PI_signature_stamp` varchar(100) DEFAULT NULL,
  `IBC_chairperson_signature_date` date DEFAULT NULL,
  `IBC_chairperson_signature_name` varchar(100) DEFAULT NULL,
  `IBC_chairperson_signature_stamp` varchar(100) DEFAULT NULL,
  `organization_representative_signature_date` date DEFAULT NULL,
  `organization_representative_signature_name` varchar(100) DEFAULT NULL,
  `organization_representative_signature_stamp` varchar(100) DEFAULT NULL,
  `forme_partA_edit` int(1) DEFAULT '0',
  `project_team_name` varchar(100) DEFAULT NULL,
  `project_team_address` varchar(100) DEFAULT NULL,
  `project_team_telephone_number` varchar(200) DEFAULT NULL,
  `project_team_email_address` varchar(100) DEFAULT NULL,
  `project_team_qualification` varchar(100) DEFAULT NULL,
  `project_team_designation` varchar(300) DEFAULT NULL,
  `forme_partB_edit` int(1) DEFAULT '0',
  `project_intro_objective` varchar(300) DEFAULT NULL,
  `project_intro_specifics` varchar(500) DEFAULT NULL,
  `project_intro_activities` blob,
  `project_intro_BSL` int(1) DEFAULT NULL,
  `project_intro_duration` blob,
  `project_intro_intended_date_commencement` date DEFAULT NULL,
  `project_intro_expected_date_completion` date DEFAULT NULL,
  `project_intro_importation_date` date DEFAULT NULL,
  `project_intro_field_experiment` int(1) DEFAULT NULL,
  `forme_partC_edit` int(1) DEFAULT '0',
  `LMO_desc_name_parent` varchar(500) DEFAULT NULL,
  `LMO_desc_name_donor` varchar(500) DEFAULT NULL,
  `LMO_desc_method` varchar(500) DEFAULT NULL,
  `LMO_desc_class` varchar(500) DEFAULT NULL,
  `LMO_desc_trait` varchar(500) DEFAULT NULL,
  `LMO_desc_genes` blob,
  `LMO_desc_genes_function` varchar(500) DEFAULT NULL,
  `forme_partD1_edit` int(1) DEFAULT '0',
  `risk_assessment_genes_potential_hazard` varchar(500) DEFAULT NULL,
  `risk_assessment_genes_comments` varchar(500) DEFAULT NULL,
  `risk_assessment_genes_management` varchar(500) DEFAULT NULL,
  `risk_assessment_genes_residual` varchar(500) DEFAULT NULL,
  `risk_assessment_admin_potential_hazard` varchar(500) DEFAULT NULL,
  `risk_assessment_admin_comments` varchar(500) DEFAULT NULL,
  `risk_assessment_admin_management` varchar(500) DEFAULT NULL,
  `risk_assessment_admin_residual` varchar(500) DEFAULT NULL,
  `risk_assessment_containment_potential_hazard` varchar(500) DEFAULT NULL,
  `risk_assessment_containment_comments` varchar(500) DEFAULT NULL,
  `risk_assessment_containment_management` varchar(500) DEFAULT NULL,
  `risk_assessment_containment_residual` varchar(500) DEFAULT NULL,
  `risk_assessment_special_potential_hazard` varchar(500) DEFAULT NULL,
  `risk_assessment_special_comments` varchar(500) DEFAULT NULL,
  `risk_assessment_special_management` varchar(500) DEFAULT NULL,
  `risk_assessment_special_residual` varchar(500) DEFAULT NULL,
  `forme_partD2_edit` int(1) DEFAULT '0',
  `risk_management_transport` varchar(500) DEFAULT NULL,
  `risk_management_disposed` varchar(500) DEFAULT NULL,
  `risk_management_wastes` varchar(500) DEFAULT NULL,
  `risk_management_wastewater` varchar(500) DEFAULT NULL,
  `risk_management_decontaminated` varchar(500) DEFAULT NULL,
  `forme_partD3_edit` int(1) DEFAULT '0',
  `risk_response_environment` varchar(500) DEFAULT NULL,
  `risk_response_plan` varchar(500) DEFAULT NULL,
  `risk_response_disposal` varchar(500) DEFAULT NULL,
  `risk_response_isolation` varchar(500) DEFAULT NULL,
  `risk_response_contigency` varchar(500) DEFAULT NULL,
  `forme_partE_edit` int(1) DEFAULT '0',
  `premise_name` varchar(250) DEFAULT NULL,
  `premise_type` varchar(250) DEFAULT NULL,
  `premise_BSL` varchar(500) DEFAULT NULL,
  `premise_IBC` varchar(500) DEFAULT NULL,
  `premise_IBC_date` varchar(200) DEFAULT NULL,
  `premise_certification_date` varchar(200) DEFAULT NULL,
  `premise_certification_no` varchar(10) DEFAULT NULL,
  `premise_certification_report` blob,
  `premise_address` varchar(100) DEFAULT NULL,
  `premise_officer_name` varchar(100) DEFAULT NULL,
  `premise_telephone_business` varchar(20) DEFAULT NULL,
  `premise_telephone_mobile` varchar(20) DEFAULT NULL,
  `premise_fax` varchar(20) DEFAULT NULL,
  `premise_email` varchar(100) DEFAULT NULL,
  `forme_partF_edit` int(1) DEFAULT '0',
  `confidential_description` varchar(500) DEFAULT NULL,
  `forme_partG_edit` int(1) DEFAULT '0',
  `reference_description` varchar(500) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formf`
--

CREATE TABLE `formf` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '9',
  `NBB_reference_no` varchar(10) DEFAULT NULL,
  `formf_notif_list_edit` int(1) DEFAULT '0',
  `notification_checklist_form_completed` int(1) DEFAULT NULL,
  `notification_checklist_CBI` int(1) DEFAULT NULL,
  `notification_checklist_submitted` int(1) DEFAULT NULL,
  `formf_part1_edit` int(1) DEFAULT '0',
  `exporter_organization` varchar(100) DEFAULT NULL,
  `exporter_name` varchar(100) DEFAULT NULL,
  `exporter_position` varchar(100) DEFAULT NULL,
  `exporter_telephone_office` varchar(20) DEFAULT NULL,
  `exporter_telephone_mobile` varchar(20) DEFAULT NULL,
  `exporter_fax` varchar(20) DEFAULT NULL,
  `exporter_email_address` varchar(100) DEFAULT NULL,
  `exporter_postal_address` varchar(100) DEFAULT NULL,
  `formf_part2_edit` int(1) DEFAULT '0',
  `LMO_description` varchar(500) DEFAULT NULL,
  `LMO_type` int(1) DEFAULT NULL,
  `LMO_type_description` varchar(500) DEFAULT NULL,
  `LMO_identification` varchar(500) DEFAULT NULL,
  `LMO_scientific_name` varchar(500) DEFAULT NULL,
  `LMO_trait` varchar(500) DEFAULT NULL,
  `LMO_intended_usage` varchar(500) DEFAULT NULL,
  `LMO_export_form` varchar(500) DEFAULT NULL,
  `LMO_export_mode` int(1) DEFAULT NULL,
  `LMO_export_mode_description` varchar(500) DEFAULT NULL,
  `LMO_point_of_exit` varchar(500) DEFAULT NULL,
  `LMO_methods` varchar(500) DEFAULT NULL,
  `formf_part3_edit` int(1) DEFAULT '0',
  `import_country_name` varchar(100) DEFAULT NULL,
  `import_evidence` blob,
  `formf_part4_edit` int(1) DEFAULT '0',
  `export_import_CBI` varchar(300) DEFAULT NULL,
  `formf_part5_edit` int(1) DEFAULT '0',
  `applicant_signature_date` date DEFAULT NULL,
  `applicant_name` varchar(100) DEFAULT NULL,
  `applicant_stamp` varchar(100) DEFAULT NULL,
  `representative_signature_date` date DEFAULT NULL,
  `representative_name` varchar(100) DEFAULT NULL,
  `representative_stamp` varchar(100) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hirarc`
--

CREATE TABLE `hirarc` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '10',
  `project_name` varchar(250) NOT NULL,
  `hirarc_sec1_edit` int(1) DEFAULT '0',
  `company_name` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `process_location` varchar(200) DEFAULT NULL,
  `conducted_name` varchar(200) DEFAULT NULL,
  `conducted_designation` varchar(200) DEFAULT NULL,
  `approved_name` varchar(200) DEFAULT NULL,
  `approved_designation` varchar(200) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `document_no` varchar(10) DEFAULT NULL,
  `hirarc_sec2_edit` int(1) DEFAULT '0',
  `HIRARC_activity` varchar(500) DEFAULT NULL,
  `HIRARC_hazard` varchar(500) DEFAULT NULL,
  `HIRARC_effects` varchar(500) DEFAULT NULL,
  `HIRARC_risk_control` varchar(500) DEFAULT NULL,
  `HIRARC_LLH` varchar(500) DEFAULT NULL,
  `HIRARC_SEV` varchar(500) DEFAULT NULL,
  `HIRARC_RR` varchar(500) DEFAULT NULL,
  `HIRARC_control_measure` varchar(500) DEFAULT NULL,
  `HIRARC_PIC` varchar(500) DEFAULT NULL,
  `application_type` int(1) DEFAULT '0',
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `incidentaccidentreport`
--

CREATE TABLE `incidentaccidentreport` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '11',
  `incident_sec1_edit` int(1) DEFAULT '0',
  `victim_name` varchar(100) NOT NULL,
  `victim_gender` int(1) NOT NULL,
  `victim_age` int(2) NOT NULL,
  `victim_citizenship` varchar(100) NOT NULL,
  `victim_employment_designation` varchar(100) NOT NULL,
  `victim_faculty` varchar(100) NOT NULL,
  `doc_id` varchar(10) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `incident_sec2_edit` int(1) DEFAULT '0',
  `incident_date` date DEFAULT NULL,
  `incident_time` varchar(25) NOT NULL,
  `incident_location` varchar(100) NOT NULL,
  `incident_type1` int(1) DEFAULT NULL,
  `incident_type2` int(1) DEFAULT NULL,
  `incident_type3` int(1) DEFAULT NULL,
  `incident_type4` int(1) DEFAULT NULL,
  `incident_type5` int(1) DEFAULT NULL,
  `incident_type6` int(1) DEFAULT NULL,
  `incident_type7` int(1) DEFAULT NULL,
  `incident_type8` int(1) DEFAULT NULL,
  `incident_type9` int(1) DEFAULT NULL,
  `incident_type_description` varchar(500) DEFAULT NULL,
  `incident_injury` int(1) NOT NULL,
  `incident_physician_or_hospital` int(1) NOT NULL,
  `incident_details` varchar(500) DEFAULT NULL,
  `incident_actions` varchar(500) DEFAULT NULL,
  `incident_sec3_edit` int(1) DEFAULT '0',
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_designation` varchar(100) DEFAULT NULL,
  `reporter_date` date DEFAULT NULL,
  `incident_sec4_edit` int(1) DEFAULT '0',
  `investigation_victim` int(1) NOT NULL,
  `investigation_victim_age` varchar(100) NOT NULL,
  `investigation_victim_citizenship` varchar(100) NOT NULL,
  `investigation_victim_job_description` varchar(500) NOT NULL,
  `investigation_findings` varchar(500) NOT NULL,
  `investigation_preventive_no` varchar(500) NOT NULL,
  `investigation_preventive_action` varchar(500) NOT NULL,
  `investigation_preventive_by_whom` varchar(500) NOT NULL,
  `investigation_preventive_timeline` varchar(500) NOT NULL,
  `investigated_by` varchar(100) DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `application_type` int(1) DEFAULT '0',
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `program` varchar(100) NOT NULL,
  `program_type` varchar(100) NOT NULL,
  `unit_convenor` varchar(100) DEFAULT NULL,
  `project_investigator` varchar(100) DEFAULT NULL,
  `unit_name` varchar(100) DEFAULT NULL,
  `experiment_title` varchar(100) DEFAULT NULL,
  `project_title` varchar(100) DEFAULT NULL,
  `project_reference_no` varchar(100) DEFAULT NULL,
  `biohazard_type` varchar(100) NOT NULL,
  `biohazard_name` varchar(100) NOT NULL,
  `biohazard_id` varchar(100) NOT NULL,
  `date_received` date DEFAULT NULL,
  `log_in_personnel` varchar(100) NOT NULL,
  `keeper_name` varchar(100) NOT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `approval` int(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mark_id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `mark` int(2) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materialriskassessment`
--

CREATE TABLE `materialriskassessment` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '12',
  `material_sec1_edit` int(1) DEFAULT '0',
  `Sec1_chemical` varchar(100) DEFAULT NULL,
  `Sec1_biological_material` varchar(100) DEFAULT NULL,
  `Sec1_equipment` varchar(100) DEFAULT NULL,
  `Sec1_doc_id` varchar(10) DEFAULT NULL,
  `Sec1_review_date` date DEFAULT NULL,
  `material_sec2A1_edit` int(1) DEFAULT '0',
  `Sec2A_name` varchar(100) DEFAULT NULL,
  `Sec2A_manufacturer` varchar(100) DEFAULT NULL,
  `Sec2A_hazardous` int(1) DEFAULT NULL,
  `Sec2A_statement` varchar(500) DEFAULT NULL,
  `Sec2A_waste` int(1) DEFAULT NULL,
  `Sec2A_waste_type_corrosive` int(1) DEFAULT NULL,
  `Sec2A_waste_type_ignitable` int(1) DEFAULT NULL,
  `Sec2A_waste_type_reactive` int(1) DEFAULT NULL,
  `Sec2A_waste_type_toxic` int(1) DEFAULT NULL,
  `Sec2A_waste_type_infectious` int(1) DEFAULT NULL,
  `material_sec2A2_edit` int(1) DEFAULT '0',
  `Sec2A2_permit` int(1) DEFAULT NULL,
  `Sec2A2_permit_type` varchar(500) DEFAULT NULL,
  `Sec2A2_MSDS` int(1) DEFAULT NULL,
  `Sec2A2_exposure_inhalation` int(1) DEFAULT NULL,
  `Sec2A2_exposure_skin` int(1) DEFAULT NULL,
  `Sec2A2_exposure_ingestion` int(1) DEFAULT NULL,
  `Sec2A2_exposure_injection` int(1) DEFAULT NULL,
  `Sec2A2_exposure_others` int(1) DEFAULT NULL,
  `Sec2A2_exposure_description` varchar(500) DEFAULT NULL,
  `Sec2A2_storage` varchar(500) DEFAULT NULL,
  `Sec2A2_waste_requirement` int(1) DEFAULT NULL,
  `Sec2A2_risk_control_training` int(1) DEFAULT NULL,
  `Sec2A2_risk_control_inspection` int(1) DEFAULT NULL,
  `Sec2A2_risk_control_SOP` int(1) DEFAULT NULL,
  `Sec2A2_risk_control_PPE` int(1) DEFAULT NULL,
  `Sec2A2_risk_control_engineering` int(1) DEFAULT NULL,
  `Sec2A2_emergency_first_aid_kit` int(1) DEFAULT NULL,
  `Sec2A2_emergency_shower` int(1) DEFAULT NULL,
  `Sec2A2_emergency_eyewash` int(1) DEFAULT NULL,
  `Sec2A2_emergency_neutralizing` int(1) DEFAULT NULL,
  `Sec2A2_emergency_spill` int(1) DEFAULT NULL,
  `Sec2A2_emergency_restrict` int(1) DEFAULT NULL,
  `material_sec2A3_edit` int(1) DEFAULT '0',
  `Sec2A3_storage_inhalation` int(1) DEFAULT NULL,
  `Sec2A3_storage_skin` int(1) DEFAULT NULL,
  `Sec2A3_storage_ingestion` int(1) DEFAULT NULL,
  `Sec2A3_storage_injection` int(1) DEFAULT NULL,
  `Sec2A3_storage_others` int(1) DEFAULT NULL,
  `Sec2A3_storage_description` varchar(500) DEFAULT NULL,
  `Sec2A3_storage_control` varchar(500) DEFAULT NULL,
  `Sec2A3_handling_inhalation` int(1) DEFAULT NULL,
  `Sec2A3_handling_skin` int(1) DEFAULT NULL,
  `Sec2A3_handling_ingestion` int(1) DEFAULT NULL,
  `Sec2A3_handling_injection` int(1) DEFAULT NULL,
  `Sec2A3_handling_others` int(1) DEFAULT NULL,
  `Sec2A3_handling_description` varchar(500) DEFAULT NULL,
  `Sec2A3_handling_control` varchar(500) DEFAULT NULL,
  `Sec2A3_spill_inhalation` int(1) DEFAULT NULL,
  `Sec2A3_spill_skin` int(1) DEFAULT NULL,
  `Sec2A3_spill_ingestion` int(1) DEFAULT NULL,
  `Sec2A3_spill_injection` int(1) DEFAULT NULL,
  `Sec2A3_spill_others` int(1) DEFAULT NULL,
  `Sec2A3_spill_description` varchar(500) DEFAULT NULL,
  `Sec2A3_spill_control` varchar(500) DEFAULT NULL,
  `Sec2A3_disposal_inhalation` int(1) DEFAULT NULL,
  `Sec2A3_disposal_skin` int(1) DEFAULT NULL,
  `Sec2A3_disposal_ingestion` int(1) DEFAULT NULL,
  `Sec2A3_disposal_injection` int(1) DEFAULT NULL,
  `Sec2A3_disposal_others` int(1) DEFAULT NULL,
  `Sec2A3_disposal_description` varchar(500) DEFAULT NULL,
  `Sec2A3_disposal_control` varchar(500) DEFAULT NULL,
  `material_sec2B1_edit` int(1) DEFAULT '0',
  `Sec2B1_equipment_name` varchar(100) DEFAULT NULL,
  `Sec2B1_activity_type` varchar(100) DEFAULT NULL,
  `Sec2B1_activity_location` varchar(100) DEFAULT NULL,
  `material_sec2B2_edit` int(1) DEFAULT '0',
  `Sec2B2_machinery_description` varchar(500) DEFAULT NULL,
  `Sec2B2_checklist_crushing` int(1) DEFAULT NULL,
  `Sec2B2_checklist_shearing` int(1) DEFAULT NULL,
  `Sec2B2_checklist_drawing` int(1) DEFAULT NULL,
  `Sec2B2_checklist_cutting` int(1) DEFAULT NULL,
  `Sec2B2_checklist_entangle` int(1) DEFAULT NULL,
  `Sec2B2_checklist_impact` int(1) DEFAULT NULL,
  `Sec2B2_checklist_abrasion` int(1) DEFAULT NULL,
  `Sec2B2_checklist_stabbing` int(1) DEFAULT NULL,
  `Sec2B2_checklist_puncture` int(1) DEFAULT NULL,
  `Sec2B2_checklist_ejection` int(1) DEFAULT NULL,
  `Sec2B2_checklist_temperature` int(1) DEFAULT NULL,
  `Sec2B2_checklist_electrical` int(1) DEFAULT NULL,
  `Sec2B2_checklist_noise` int(1) DEFAULT NULL,
  `Sec2B2_checklist_vibration` int(1) DEFAULT NULL,
  `Sec2B2_checklist_dust` int(1) DEFAULT NULL,
  `Sec2B2_checklist_pressure` int(1) DEFAULT NULL,
  `Sec2B2_checklist_waste` int(1) DEFAULT NULL,
  `Sec2B2_checklist_fumes` int(1) DEFAULT NULL,
  `Sec2B2_checklist_chemical` int(1) DEFAULT NULL,
  `Sec2B2_checklist_allergens` int(1) DEFAULT NULL,
  `Sec2B2_exposure` varchar(500) DEFAULT NULL,
  `Sec2B2_users` varchar(200) DEFAULT NULL,
  `Sec2B2_control_measures` varchar(500) DEFAULT NULL,
  `Sec2B2_procedural_behavioural` varchar(500) DEFAULT NULL,
  `Sec2B2_overall_assessment_risk_level` int(1) DEFAULT NULL,
  `Sec2B2_risk_reduction_action` varchar(500) DEFAULT NULL,
  `Sec2B2_risk_reduction_by_who` varchar(500) DEFAULT NULL,
  `Sec2B2_risk_reduction_by_when` varchar(500) DEFAULT NULL,
  `Sec2B2_risk_reduction_action_completed` varchar(500) DEFAULT NULL,
  `Sec2B2_overall_assessment_risk_level_after` int(1) DEFAULT NULL,
  `material_sec3_edit` int(1) DEFAULT '0',
  `Sec3_requestor` varchar(100) DEFAULT NULL,
  `Sec3_requestor_date` date DEFAULT NULL,
  `Sec3_supervisor` varchar(100) DEFAULT NULL,
  `Sec3_supervisor_date` date DEFAULT NULL,
  `Sec3_LO` varchar(100) DEFAULT NULL,
  `Sec3_LO_date` date DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `notification_type` int(1) DEFAULT '1',
  `notification_title` varchar(100) DEFAULT NULL,
  `notification_description` varchar(500) NOT NULL,
  `notification_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `notification_read` int(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `account_id`, `notification_type`, `notification_title`, `notification_description`, `notification_date`, `notification_read`) VALUES
(1, NULL, 4, 'New Registration', 'The following user has requested for an account: Si Kim Yeung', '2018-10-05 21:41:29', 0),
(2, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-06 20:41:14', 0),
(3, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-06 20:57:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notificationexportingbiologicalmaterial`
--

CREATE TABLE `notificationexportingbiologicalmaterial` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '13',
  `date_received` date DEFAULT NULL,
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `notificationexport_sec1_edit` int(1) DEFAULT '0',
  `personnel_name` varchar(100) DEFAULT NULL,
  `personnel_staff_student_no` int(10) DEFAULT NULL,
  `personnel_designation` varchar(100) DEFAULT NULL,
  `personnel_faculty` varchar(100) DEFAULT NULL,
  `personnel_project_title` varchar(100) DEFAULT NULL,
  `personnel_reference_no` varchar(10) DEFAULT NULL,
  `notificationexport_sec2_edit` int(1) DEFAULT '0',
  `LMO_list` int(1) DEFAULT NULL,
  `LMO_name` varchar(500) DEFAULT NULL,
  `LMO_risk_level` varchar(500) DEFAULT NULL,
  `LMO_category` varchar(500) DEFAULT NULL,
  `LMO_quantity` varchar(500) DEFAULT NULL,
  `LMO_volume` varchar(500) DEFAULT NULL,
  `biological_list` int(1) DEFAULT NULL,
  `biological_name` varchar(500) DEFAULT NULL,
  `biological_risk_level` varchar(500) DEFAULT NULL,
  `biological_category` varchar(500) DEFAULT NULL,
  `biological_quantity` varchar(500) DEFAULT NULL,
  `biological_volume` varchar(500) DEFAULT NULL,
  `notificationexport_sec3_edit` int(1) DEFAULT '0',
  `importing_country` varchar(100) DEFAULT NULL,
  `importing_institude` varchar(100) DEFAULT NULL,
  `importing_person_in_charge` varchar(100) DEFAULT NULL,
  `importing_person_in_charge_telephone_no` int(20) DEFAULT NULL,
  `notificationexport_sec4_edit` int(1) DEFAULT '0',
  `declaration_name` varchar(100) DEFAULT NULL,
  `declaration_date` date DEFAULT NULL,
  `notificationexport_sec5_edit` int(1) DEFAULT '0',
  `signature_verified_by` varchar(100) DEFAULT NULL,
  `signature_verified_date` date DEFAULT NULL,
  `notification_approved_by` varchar(100) DEFAULT NULL,
  `notification_declined_by` varchar(100) DEFAULT NULL,
  `notification_approve_decline_date` date DEFAULT NULL,
  `notification_approve_decline_remarks` varchar(300) DEFAULT NULL,
  `notification_reviewed_by` varchar(100) DEFAULT NULL,
  `notification_reviewed_by_date` date DEFAULT NULL,
  `notification_reviewed_by_remarks` varchar(300) DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `incident_accident_report` varchar(500) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notificationlmobiohazardousmaterial`
--

CREATE TABLE `notificationlmobiohazardousmaterial` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '14',
  `date_received` date DEFAULT NULL,
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `notificationlmo_sec1_edit` int(1) DEFAULT '0',
  `personnel_name` varchar(100) DEFAULT NULL,
  `personnel_staff_student_no` int(10) DEFAULT NULL,
  `personnel_designation` varchar(100) DEFAULT NULL,
  `personnel_faculty` varchar(100) DEFAULT NULL,
  `personnel_unit_code` varchar(100) DEFAULT NULL,
  `personnel_project_title` varchar(100) DEFAULT NULL,
  `personnel_reference_no` varchar(10) DEFAULT NULL,
  `personnel_storage` varchar(100) DEFAULT NULL,
  `personnel_keeper_name` varchar(100) DEFAULT NULL,
  `notificationlmo_sec2_edit` int(1) DEFAULT '0',
  `LMO_list` int(1) DEFAULT NULL,
  `LMO_name` varchar(500) DEFAULT NULL,
  `LMO_risk_level` varchar(500) DEFAULT NULL,
  `LMO_quantity` varchar(500) DEFAULT NULL,
  `LMO_volume` varchar(500) DEFAULT NULL,
  `biohazard_list` int(1) DEFAULT NULL,
  `biohazard_name` varchar(500) DEFAULT NULL,
  `biohazard_risk_level` varchar(500) DEFAULT NULL,
  `biohazard_quantity` varchar(500) DEFAULT NULL,
  `biohazard_volume` varchar(500) DEFAULT NULL,
  `notificationlmo_sec3_edit` int(1) DEFAULT '0',
  `declaration_name` varchar(100) DEFAULT NULL,
  `declaration_date` date DEFAULT NULL,
  `signature_verified_by` varchar(100) DEFAULT NULL,
  `signature_verified_date` date DEFAULT NULL,
  `notification_approved_by` varchar(100) DEFAULT NULL,
  `notification_declined_by` varchar(100) DEFAULT NULL,
  `notification_approver` varchar(25) DEFAULT NULL,
  `notification_decliner` varchar(25) DEFAULT NULL,
  `notification_approve_decline_date` date DEFAULT NULL,
  `notification_approve_decline_remarks` varchar(300) DEFAULT NULL,
  `notification_reviewed_by` varchar(100) DEFAULT NULL,
  `notification_reviewed_by_date` date DEFAULT NULL,
  `notification_reviewed_by_remarks` varchar(300) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pc1`
--

CREATE TABLE `pc1` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '15',
  `project_name` varchar(250) NOT NULL,
  `date_received` datetime DEFAULT NULL,
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `pc1_sec1_edit` int(1) DEFAULT '0',
  `project_title` varchar(100) DEFAULT NULL,
  `pc1_sec2_edit` int(1) DEFAULT '0',
  `project_supervisor_title` varchar(100) DEFAULT NULL,
  `project_supervisor_name` varchar(100) DEFAULT NULL,
  `project_supervisor_qualification` varchar(100) DEFAULT NULL,
  `project_supervisor_department` varchar(100) DEFAULT NULL,
  `project_supervisor_campus` varchar(100) DEFAULT NULL,
  `project_supervisor_postal_address` varchar(100) DEFAULT NULL,
  `project_supervisor_telephone` varchar(20) DEFAULT NULL,
  `project_supervisor_fax` varchar(20) DEFAULT NULL,
  `project_supervisor_email_address` varchar(100) DEFAULT NULL,
  `pc1_sec3_edit` int(1) DEFAULT '0',
  `project_add_title` varchar(500) DEFAULT NULL,
  `project_add_name` varchar(500) DEFAULT NULL,
  `project_add_qualification` varchar(500) DEFAULT NULL,
  `project_add_department` varchar(500) DEFAULT NULL,
  `project_add_campus` varchar(500) DEFAULT NULL,
  `project_add_postal_address` varchar(750) DEFAULT NULL,
  `project_add_telephone` varchar(100) DEFAULT NULL,
  `project_add_fax` varchar(100) DEFAULT NULL,
  `project_add_email_address` varchar(500) DEFAULT NULL,
  `pc1_sec4_edit` int(1) DEFAULT '0',
  `dealing_type_a` int(1) DEFAULT NULL,
  `dealing_type_c` int(1) DEFAULT NULL,
  `pc1_sec5_edit` int(1) DEFAULT '0',
  `project_summary` varchar(500) DEFAULT NULL,
  `pc1_sec6_edit` int(1) DEFAULT '0',
  `GMO_name` varchar(100) DEFAULT NULL,
  `GMO_method` varchar(250) DEFAULT NULL,
  `GMO_origin` varchar(250) DEFAULT NULL,
  `pc1_sec7_edit` int(1) DEFAULT '0',
  `modified_trait_class` varchar(100) DEFAULT NULL,
  `modified_trait_description` varchar(250) DEFAULT NULL,
  `pc1_sec8_edit` int(1) DEFAULT '0',
  `project_hazard_staff` varchar(250) DEFAULT NULL,
  `pc1_sec9_edit` int(1) DEFAULT '0',
  `project_hazard_environment` varchar(250) DEFAULT NULL,
  `pc1_sec10_edit` int(1) DEFAULT '0',
  `project_hazard_steps` varchar(250) DEFAULT NULL,
  `pc1_sec11_edit` int(1) DEFAULT '0',
  `project_transport` varchar(250) DEFAULT NULL,
  `pc1_sec12_edit` int(1) DEFAULT '0',
  `project_disposal` varchar(250) DEFAULT NULL,
  `pc1_sec13_edit` int(1) DEFAULT '0',
  `project_SOP` varchar(255) DEFAULT NULL,
  `pc1_sec14_edit` int(1) DEFAULT '0',
  `project_facilities_building_no` varchar(100) DEFAULT NULL,
  `project_facilities_room_no` varchar(100) DEFAULT NULL,
  `project_facilities_containment_level` varchar(50) DEFAULT NULL,
  `project_facilities_certification_no` varchar(10) DEFAULT NULL,
  `pc1_sec15_edit` int(1) DEFAULT '0',
  `officer_notified` int(1) DEFAULT NULL,
  `officer_name` varchar(100) DEFAULT NULL,
  `laboratory_manager` varchar(100) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pc2`
--

CREATE TABLE `pc2` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '16',
  `project_name` varchar(250) NOT NULL,
  `date_received` date DEFAULT NULL,
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `pc2_sec1_edit` int(1) DEFAULT '0',
  `project_title` varchar(100) DEFAULT NULL,
  `pc2_sec2_edit` int(1) DEFAULT '0',
  `project_supervisor_title` varchar(100) DEFAULT NULL,
  `project_supervisor_name` varchar(100) DEFAULT NULL,
  `project_supervisor_qualification` varchar(100) DEFAULT NULL,
  `project_supervisor_department` varchar(100) DEFAULT NULL,
  `project_supervisor_campus` varchar(100) DEFAULT NULL,
  `project_supervisor_postal_address` varchar(100) DEFAULT NULL,
  `project_supervisor_telephone` int(20) DEFAULT NULL,
  `project_supervisor_fax` int(20) DEFAULT NULL,
  `project_supervisor_email_address` varchar(100) DEFAULT NULL,
  `pc2_sec3_edit` int(1) DEFAULT '0',
  `project_add_title` varchar(500) DEFAULT NULL,
  `project_add_name` varchar(500) DEFAULT NULL,
  `project_add_qualification` varchar(500) DEFAULT NULL,
  `project_add_department` varchar(500) DEFAULT NULL,
  `project_add_campus` varchar(500) DEFAULT NULL,
  `project_add_postal_address` varchar(750) DEFAULT NULL,
  `project_add_telephone` varchar(100) DEFAULT NULL,
  `project_add_fax` varchar(100) DEFAULT NULL,
  `project_add_email_address` varchar(500) DEFAULT NULL,
  `pc2_sec4_edit` int(1) DEFAULT '0',
  `dealing_type_a` int(1) DEFAULT NULL,
  `dealing_type_aa` int(1) DEFAULT NULL,
  `dealing_type_b` int(1) DEFAULT NULL,
  `dealing_type_c` int(1) DEFAULT NULL,
  `dealing_type_d` int(1) DEFAULT NULL,
  `dealing_type_e` int(1) DEFAULT NULL,
  `dealing_type_f` int(1) DEFAULT NULL,
  `dealing_type_g` int(1) DEFAULT NULL,
  `dealing_type_h` int(1) DEFAULT NULL,
  `dealing_type_i` int(1) DEFAULT NULL,
  `dealing_type_j` int(1) DEFAULT NULL,
  `dealing_type_k` int(1) DEFAULT NULL,
  `dealing_type_l` int(1) DEFAULT NULL,
  `dealing_type_m` int(1) DEFAULT NULL,
  `pc2_sec5_edit` int(1) DEFAULT '0',
  `project_summary` varchar(500) DEFAULT NULL,
  `pc2_sec6_edit` int(1) DEFAULT '0',
  `GMO_name` varchar(100) DEFAULT NULL,
  `GMO_method` varchar(250) DEFAULT NULL,
  `GMO_origin` varchar(500) DEFAULT NULL,
  `pc2_sec7_edit` int(1) DEFAULT '0',
  `modified_trait_class` varchar(100) DEFAULT NULL,
  `modified_trait_description` varchar(250) DEFAULT NULL,
  `pc2_sec8_edit` int(1) DEFAULT '0',
  `project_hazard_staff` varchar(250) DEFAULT NULL,
  `pc2_sec9_edit` int(1) DEFAULT '0',
  `project_hazard_environment` varchar(250) DEFAULT NULL,
  `pc2_sec10_edit` int(1) DEFAULT '0',
  `project_hazard_steps` varchar(250) DEFAULT NULL,
  `pc2_sec11_edit` int(1) DEFAULT '0',
  `project_transport` varchar(250) DEFAULT NULL,
  `pc2_sec12_edit` int(1) DEFAULT '0',
  `project_disposal` varchar(250) DEFAULT NULL,
  `pc2_sec13_edit` int(1) DEFAULT '0',
  `project_SOP` varchar(255) DEFAULT NULL,
  `pc2_sec14_edit` int(1) DEFAULT '0',
  `project_facilities_building_no` varchar(100) DEFAULT NULL,
  `project_facilities_room_no` varchar(100) DEFAULT NULL,
  `project_facilities_containment_level` varchar(25) DEFAULT NULL,
  `project_facilities_certification_no` varchar(10) DEFAULT NULL,
  `pc2_sec15_edit` int(1) DEFAULT '0',
  `officer_notified` int(1) DEFAULT NULL,
  `officer_name` varchar(100) DEFAULT NULL,
  `laboratory_manager` varchar(100) DEFAULT NULL,
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `project_desc` varchar(500) DEFAULT NULL,
  `project_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `account_id` int(10) UNSIGNED NOT NULL,
  `project_approval` int(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_desc`, `project_date`, `account_id`, `project_approval`) VALUES
(1, 'James\' Bacterium Project', 'Highly sophisticated project about weird bacterium found in tap water.', '2018-09-24 15:34:36', 1, 0),
(2, 'Cedric\'s Flamebugs', 'The end is coming', '2018-09-24 15:38:34', 1, 0),
(3, 'Test Insert', 'asfcsacs', '2018-10-05 14:51:06', 2, 0),
(4, 'Test Project name', 'ascvsv try again', '2018-10-05 14:52:48', 2, 0),
(5, 'New Save Test', 'Test if status is saved with', '2018-10-06 12:39:00', 2, 0),
(6, 'New Save Test', 'Test status save', '2018-10-06 12:40:17', 2, 0),
(7, 'Test Submit', 'test submit status', '2018-10-06 12:56:38', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `storage_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `biohazard_id` varchar(20) NOT NULL,
  `biohazard_name` varchar(100) NOT NULL,
  `risk_group` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `biohazard_source` varchar(100) NOT NULL,
  `date_created` date DEFAULT NULL,
  `storage_location` varchar(100) NOT NULL,
  `keeper_name` varchar(100) NOT NULL,
  `log_in_personnel` varchar(100) NOT NULL,
  `approval` int(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `swp`
--

CREATE TABLE `swp` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '17',
  `project_name` varchar(250) NOT NULL,
  `date_received` date DEFAULT NULL,
  `SBC_reference_no` varchar(10) DEFAULT NULL,
  `swp_sec1_edit` int(1) DEFAULT '0',
  `SWP_prepared_by` varchar(100) NOT NULL,
  `SWP_staff_student_no` int(10) UNSIGNED DEFAULT NULL,
  `SWP_designation` varchar(100) NOT NULL,
  `SWP_faculty` varchar(100) NOT NULL,
  `SWP_unit_title` varchar(500) DEFAULT NULL,
  `SWP_project_title` varchar(500) DEFAULT NULL,
  `SWP_location` varchar(100) NOT NULL,
  `swp_sec2_edit` int(1) DEFAULT '0',
  `SWP_description` varchar(500) NOT NULL,
  `SWP_preoperational` varchar(500) NOT NULL,
  `SWP_operational` varchar(500) NOT NULL,
  `SWP_postoperational` varchar(500) NOT NULL,
  `SWP_risk` varchar(500) NOT NULL,
  `SWP_control` varchar(500) NOT NULL,
  `swp_sec3_edit` int(1) DEFAULT '0',
  `SWP_declaration_name` varchar(100) NOT NULL,
  `SWP_declaration_date` date DEFAULT NULL,
  `swp_sec4_edit` int(1) DEFAULT '0',
  `SWP_signature_prepared_by` varchar(100) DEFAULT NULL,
  `SWP_signature_prepared_by_date` date DEFAULT NULL,
  `SWP_signature_PI` varchar(100) DEFAULT NULL,
  `SWP_signature_PI_date` date DEFAULT NULL,
  `SWP_lab_trained` int(1) DEFAULT NULL,
  `SWP_lab_trainer` varchar(500) DEFAULT NULL,
  `SWP_approval_by` int(1) DEFAULT NULL,
  `SWP_approved_by` varchar(100) DEFAULT NULL,
  `SWP_declined_by` varchar(100) DEFAULT NULL,
  `SWP_approve_decline_date` date DEFAULT NULL,
  `SWP_approve_decline_remarks` varchar(300) DEFAULT NULL,
  `SWP_reviewed_by` varchar(100) DEFAULT NULL,
  `SWP_reviewed_by_date` date DEFAULT NULL,
  `SWP_reviewed_by_remarks` varchar(300) DEFAULT NULL,
  `application_type` int(1) DEFAULT '0',
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `annex2`
--
ALTER TABLE `annex2`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `annex3`
--
ALTER TABLE `annex3`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `annex4`
--
ALTER TABLE `annex4`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `annex5`
--
ALTER TABLE `annex5`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `announcement_fk` (`account_id`);

--
-- Indexes for table `annualfinalreport`
--
ALTER TABLE `annualfinalreport`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `biohazardousmaterial`
--
ALTER TABLE `biohazardousmaterial`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `educational`
--
ALTER TABLE `educational`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `exemptdealing`
--
ALTER TABLE `exemptdealing`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `forme`
--
ALTER TABLE `forme`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `formf`
--
ALTER TABLE `formf`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `hirarc`
--
ALTER TABLE `hirarc`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `incidentaccidentreport`
--
ALTER TABLE `incidentaccidentreport`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `materialriskassessment`
--
ALTER TABLE `materialriskassessment`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notification_fk` (`account_id`);

--
-- Indexes for table `notificationexportingbiologicalmaterial`
--
ALTER TABLE `notificationexportingbiologicalmaterial`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `notificationlmobiohazardousmaterial`
--
ALTER TABLE `notificationlmobiohazardousmaterial`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `pc1`
--
ALTER TABLE `pc1`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `pc2`
--
ALTER TABLE `pc2`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`storage_id`);

--
-- Indexes for table `swp`
--
ALTER TABLE `swp`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `annex2`
--
ALTER TABLE `annex2`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `annex3`
--
ALTER TABLE `annex3`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annex4`
--
ALTER TABLE `annex4`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annex5`
--
ALTER TABLE `annex5`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annualfinalreport`
--
ALTER TABLE `annualfinalreport`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biohazardousmaterial`
--
ALTER TABLE `biohazardousmaterial`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educational`
--
ALTER TABLE `educational`
  MODIFY `quiz_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exemptdealing`
--
ALTER TABLE `exemptdealing`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forme`
--
ALTER TABLE `forme`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formf`
--
ALTER TABLE `formf`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hirarc`
--
ALTER TABLE `hirarc`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incidentaccidentreport`
--
ALTER TABLE `incidentaccidentreport`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materialriskassessment`
--
ALTER TABLE `materialriskassessment`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notificationexportingbiologicalmaterial`
--
ALTER TABLE `notificationexportingbiologicalmaterial`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificationlmobiohazardousmaterial`
--
ALTER TABLE `notificationlmobiohazardousmaterial`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc1`
--
ALTER TABLE `pc1`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pc2`
--
ALTER TABLE `pc2`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `storage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `swp`
--
ALTER TABLE `swp`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educational`
--
ALTER TABLE `educational`
  ADD CONSTRAINT `educational_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `educational` (`quiz_id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `account_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
