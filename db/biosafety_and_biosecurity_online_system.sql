-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 03:03 PM
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
(2, '100072290@students.swinburne.edu.my', 'Si Kim Yeung', '123456', 1, 1, '2018-10-05 13:41:29'),
(3, 'BSO@swinburne.edu.my', 'Biosafety Officer', 'BSOpassword', 4, 1, '2018-10-14 06:43:51'),
(4, 'SSBC@swinburne.edu.my', 'SSBC Member', '123456', 3, 1, '2018-10-14 09:42:07'),
(5, 'HSO@gmail.com', 'HSO name', 'HSOpassword', 5, 1, '2018-10-14 09:42:07'),
(6, 'Chair@swinburne.edu.my', 'SSBC Chair', 'Chairpassword', 2, 1, '2018-10-14 10:58:41'),
(7, 'a@s.com.my', 'aaa', 'aaa', 1, 0, '2018-10-17 02:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `annex2`
--

CREATE TABLE `annex2` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '1',
  `project_id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `annex2` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `general_info_edit`, `applicant_name`, `institutional_address`, `collaborating_partners`, `project_title`, `exp_param_edit`, `project_objective_methodology`, `biological_system_parent_organisms`, `biological_system_donor_organisms`, `biological_system_modified_traits`, `premises`, `period`, `risk_assessment_and_management`, `emergency_response_plan`, `IBC_recommendation`, `PI_details_edit`, `PI_experience_and_expertise`, `PI_training`, `PI_health`, `PI_other`, `personnel_involved_list_edit`, `personnel_involved`, `personnel_designation`, `IBC_approved`, `IBC_name`, `IBC_date`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 1, 28, 0, 'save project status update', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, ',,,,', ',,,,', NULL, '', '0000-00-00', NULL, 0, 'saved'),
(2, 2, 5, 1, 29, 0, 'Submit project edited', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, ',,,,', ',,,,', NULL, '', '0000-00-00', NULL, 0, 'submitted'),
(3, 2, NULL, 1, 30, 0, 'New type', ' New address', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, ',,,,', ',,,,', NULL, '', '0000-00-00', NULL, 0, 'submitted'),
(4, 2, 6, 1, 65, 0, 'Test Submit Date', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, ',,,,', ',,,,', NULL, '', '0000-00-00', 4, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `annex3`
--

CREATE TABLE `annex3` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '2',
  `project_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) DEFAULT NULL,
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

--
-- Dumping data for table `annex3`
--

INSERT INTO `annex3` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `status`, `reference_no`, `annex3_header_edit`, `organization`, `faculty`, `laboratory`, `date`, `annex3_sec_1_edit`, `PI_name`, `PI_telephone_number`, `PI_reported_date`, `PI_reported_time`, `annex3_sec_2_edit`, `incident_description`, `incident_cause_checklist_faulty_equipment`, `incident_cause_checklist_no_equipment`, `incident_cause_checklist_storage`, `incident_cause_checklist_weather`, `incident_cause_checklist_assistance`, `incident_cause_checklist_electrical`, `incident_cause_checklist_carelessness`, `incident_cause_checklist_terrain`, `incident_cause_checklist_workspace`, `incident_cause_checklist_training`, `incident_cause_checklist_poor_access`, `incident_cause_checklist_unknown`, `incident_cause_checklist_maintenance_staff`, `incident_cause_checklist_supervision`, `incident_cause_checklist_method`, `incident_cause_checklist_none`, `incident_cause_checklist_none_description`, `incident_LMO_rDNA_release`, `incident_LMO_rDNA_response`, `incident_contribution`, `incident_personal_factors`, `incident_corrective_actions`, `incident_responsible`, `signature_PI_edit`, `signature_PI_name`, `signature_PI_date`, `signature_BO_name`, `signature_BO_date`, `signature_IBC_name`, `signature_IBC_date`, `IBC_approval`, `IBC_termination`, `application_approved`, `editable`) VALUES
(1, 2, NULL, 2, 59, 'saved', '', 0, 'major save changed', '', '', '0000-00-00', 0, '', 0, '0000-00-00', '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, NULL, NULL, 0),
(2, 2, 5, 2, 60, 'submitted', '', 0, 'major submit updated', '', '', '0000-00-00', 0, '', 0, '0000-00-00', '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '', '', 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `annex4`
--

CREATE TABLE `annex4` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '3',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annex4`
--

INSERT INTO `annex4` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `reference_no`, `annex4_sec_1_edit`, `personnel_name`, `personnel_NRIC`, `personnel_age`, `personnel_race`, `personnel_telephone_number`, `personnel_office_number`, `personnel_ext_number`, `personnel_employment_job`, `personnel_employment_faculty`, `personnel_employment_status`, `personnel_employment_duration`, `annex4_sec_2_edit`, `exposure_location`, `exposure_date`, `exposure_time`, `exposure_diagnosis`, `exposure_treatment`, `exposure_medical_cert`, `exposure_medical_cert_duration`, `exposure_work_description`, `exposure_hazard_or_agent`, `exposure_duration`, `exposure_symptoms`, `exposure_symptoms_duration`, `signature_PI_edit`, `signature_PI_name`, `signature_PI_date`, `signature_BO_name`, `signature_BO_date`, `signature_IBC_name`, `signature_IBC_date`, `IBC_approval`, `IBC_termination`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 3, 61, '', 0, 'Occupational save changed', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', '0000-00-00', '', '', NULL, 0, '', '', '', '', '', NULL, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, NULL, NULL, 0, 'saved'),
(2, 2, 5, 3, 0, '', 0, 'submit diseaase report updated', 0, 0, '', 0, 0, 0, '', '', 0, '', 0, '', '0000-00-00', '', '', NULL, 0, '', '', '', '', '', NULL, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, NULL, NULL, 1, 'submitted');

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
  `announcement_title` varchar(250) NOT NULL,
  `announcement_desc` varchar(1000) NOT NULL,
  `announcement_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `announcement_page` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `account_id`, `announcement_title`, `announcement_desc`, `announcement_date`, `announcement_page`) VALUES
(1, 1, 'Application Page Announcement 1', 'Hello! This is a sample message from the database to test out announce for application page!\r\n\r\nThis is very cool and interesting!\r\n\r\nPlease update this message latr', '2018-10-24 15:01:41', 'applicationpage'),
(2, 1, 'Application Page Announcement 2', 'Testing for Two announcements instead!', '2018-10-24 15:16:35', 'applicationpage'),
(3, 1, 'Deleted Announcement', 'This should not appear anywhere', '2018-10-24 15:16:35', 'deleted'),
(4, 1, 'Test from Web Page', 'This message should appear in the\r\nfront page as well!', '2018-10-24 16:25:12', 'applicationpage');

-- --------------------------------------------------------

--
-- Table structure for table `annualfinalreport`
--

CREATE TABLE `annualfinalreport` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '5',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annualfinalreport`
--

INSERT INTO `annualfinalreport` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `annualfinalreport_header_edit`, `SBC_reference_no`, `project_approval_date`, `project_report_date`, `report_type`, `annualfinalreport_sec_1_edit`, `project_title`, `annualfinalreport_sec_2_edit`, `chief_investigator`, `annualfinalreport_sec_3_edit`, `personnel_extra`, `personnel_extra_title`, `personnel_extra_name`, `personnel_extra_qualifications`, `personnel_extra_department`, `personnel_extra_campus`, `personnel_extra_postal_address`, `personnel_extra_telephone`, `personnel_extra_fax`, `personnel_extra_email_address`, `annualfinalreport_sec_4_edit`, `project_summary`, `annualfinalreport_sec_5_edit`, `project_outline`, `annualfinalreport_sec_6_edit`, `project_incidents`, `annualfinalreport_sec_7_edit`, `project_SOP`, `annualfinalreport_sec_8_edit`, `project_facility_changes`, `project_facility_building_number`, `project_facility_room_number`, `project_facility_description`, `project_sign_off_chief_investigator_name`, `project_sign_off_BO_name`, `application_approved`, `editable`, `status`) VALUES
(2, 2, NULL, 5, 47, NULL, 0, '', '0000-00-00', '0000-00-00', NULL, 0, 'save annual report change again', 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, NULL, '', '', NULL, '', '', NULL, 0, 'saved'),
(3, 2, 6, 5, 48, NULL, 0, '', '0000-00-00', '0000-00-00', NULL, 0, 'Test submit annual updated', 0, '', 0, 0, '', '', '', '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, NULL, '', '', NULL, '', '', NULL, 1, 'saved');

-- --------------------------------------------------------

--
-- Table structure for table `biohazardousmaterial`
--

CREATE TABLE `biohazardousmaterial` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '6',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biohazardousmaterial`
--

INSERT INTO `biohazardousmaterial` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `SBC_reference_no`, `biohazard_sec_1_edit`, `project_title`, `biohazard_sec_2_edit`, `project_supervisor_name`, `project_supervisor_department`, `project_supervisor_email_address`, `biohazard_sec_3_edit`, `project_alt_person`, `project_alt_department`, `project_alt_email`, `biohazard_sec_4_edit`, `project_personnel_name`, `project_personnel_role`, `biohazard_sec_5_edit`, `proposed_work_known`, `proposed_work_may`, `proposed_work_unknown`, `proposed_work_isolation`, `proposed_work_risk`, `proposed_work_sensitive`, `proposed_work_other`, `biohazard_sec_6_edit`, `project_summary`, `biohazard_sec_7_edit`, `project_activity`, `biohazard_sec_8_edit`, `project_SOP`, `project_SOP_title`, `project_SOP_risk_title`, `biohazard_sec_9_edit`, `project_facilities_building`, `project_facilities_room`, `biohazard_sec_10_edit`, `officer_notified`, `officer_name`, `application_approved`, `editable`, `status`) VALUES
(2, 2, NULL, 6, 33, NULL, NULL, 0, 'Biohazardous Test Save updated saved', 0, '', '', '', 0, '', NULL, '', 0, ',,,', ',,,', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', 0, NULL, ',,', ',,', 0, ',', ',', 0, NULL, NULL, NULL, 0, 'saved'),
(3, 2, 3, 6, 34, NULL, NULL, 0, 'Biohazardous Submit update', 0, '', '', '', 0, '', NULL, '', 0, ',,,', ',,,', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', 0, NULL, ',,', ',,', 0, ',', ',', 0, NULL, NULL, NULL, 0, 'submitted');

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
  `quiz_answer` varchar(1500) DEFAULT NULL,
  `quiz_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quiz_approval` int(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational`
--

INSERT INTO `educational` (`quiz_id`, `account_id`, `quiz_name`, `quiz_desc`, `quiz_fullmark`, `quiz_question`, `quiz_ans_a`, `quiz_ans_b`, `quiz_ans_c`, `quiz_ans_d`, `quiz_answer`, `quiz_date`, `quiz_approval`) VALUES
(1, 1, 'Hello World!', 'Programmed to work and not feel...', 2, 'a:2:{i:0;s:34:\"Don\'t know whether this is real...\";i:1;s:26:\"Although it sounds like...\";}', 'a:2:{i:0;s:12:\"Hello World!\";i:1;s:14:\"Bits and bytes\";}', 'a:2:{i:0;s:3:\"C++\";i:1;s:20:\"Woah\r\n\r\nHello there.\";}', 'a:2:{i:0;s:2:\"C#\";i:1;s:35:\"What is the game called Backgammon?\";}', 'a:2:{i:0;s:5:\"Basic\";i:1;s:24:\"I believe that munchkins\";}', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}', '2018-10-07 14:25:15', 1),
(2, 1, 'Very Important Biological Questions', 'This description is brought to you by Skillshare. An online platform that', 3, 'a:3:{i:0;s:5:\"water\";i:1;s:6:\"purple\";i:2;s:6:\"orange\";}', 'a:3:{i:0;s:1:\"a\";i:1;s:1:\"1\";i:2;s:1:\"f\";}', 'a:3:{i:0;s:1:\"b\";i:1;s:1:\"2\";i:2;s:2:\"ff\";}', 'a:3:{i:0;s:1:\"c\";i:1;s:1:\"3\";i:2;s:3:\"fff\";}', 'a:3:{i:0;s:1:\"d\";i:1;s:1:\"4\";i:2;s:4:\"ffff\";}', 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"1\";i:2;s:1:\"3\";}', '2018-10-07 14:26:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exemptdealing`
--

CREATE TABLE `exemptdealing` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '7',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exemptdealing`
--

INSERT INTO `exemptdealing` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `SBC_reference_no`, `exempt_sec_1_edit`, `project_title`, `exempt_sec_2_edit`, `project_supervisor_title`, `project_supervisor_name`, `project_supervisor_qualification`, `project_supervisor_department`, `project_supervisor_campus`, `project_supervisor_postal_address`, `project_supervisor_telephone`, `project_supervisor_fax`, `project_supervisor_email_address`, `exempt_sec_3_edit`, `project_add_title`, `project_add_name`, `project_add_qualification`, `project_add_department`, `project_add_campus`, `project_add_postal_address`, `project_add_telephone`, `project_add_fax`, `project_add_email_address`, `exempt_sec_4_edit`, `exemption_type_2`, `exemption_type_3`, `exemption_type_3A`, `exemption_type_4`, `exemption_type_5`, `exempt_sec_5_edit`, `project_summary`, `exempt_sec_6_edit`, `project_hazard`, `exempt_sec_7_edit`, `project_SOP`, `exempt_sec_8_edit`, `project_facilities_building_no`, `project_facilities_room_no`, `project_facilities_containment_level`, `project_facilities_certification_no`, `exempt_sec_9_edit`, `officer_notified`, `officer_name`, `laboratory_manager`, `application_approved`, `editable`, `status`) VALUES
(2, 2, NULL, 7, 36, NULL, '', 0, 'Exempt save test change', 0, '', '', '', '', '', '', '', '', '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', 0, '', 0, '', '', '', '', 0, 0, '', '', NULL, 0, 'saved'),
(3, 2, 3, 7, 37, NULL, '', 0, 'Submit exempt project edited', 0, '', '', '', '', '', '', '', '', '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', 0, '', 0, '', '', '', '', 0, 0, '', '', NULL, 1, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `forme`
--

CREATE TABLE `forme` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '8',
  `project_id` int(10) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `forme`
--

INSERT INTO `forme` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `forme_project_title_edit`, `project_title`, `forme_notif_list_edit`, `checklist_form`, `checklist_coverletter`, `checklist_IBC`, `checklist_IBC_report`, `checklist_clearance`, `checklist_CBI`, `checklist_CBI_submit`, `checklist_support`, `checklist_RnD`, `forme_preliminary_info_edit`, `organization`, `applicant_name_PI`, `position`, `telephone_office`, `telephone_mobile`, `fax`, `email_address`, `postal_address`, `project_title2`, `IBC_project_identification_no`, `notified_first`, `NBB_reference`, `NBB_difference`, `forme_importer_details_edit`, `importer_organization`, `importer_contact_person`, `importer_position`, `importer_telephone_office`, `importer_telephone_mobile`, `importer_fax`, `importer_email_address`, `importer_postal_address`, `forme_IBC_details_edit`, `IBC_organization_name`, `IBC_chairperson`, `IBC_telephone_number`, `IBC_fax`, `IBC_email_address`, `forme_IBC_assessment_edit`, `IBC_PI_name`, `IBC_project_title`, `IBC_date`, `IBC_adequate`, `IBC_checklist_activities`, `IBC_checklist_description`, `IBC_checklist_emergency_response`, `IBC_checklist_trained`, `IBC_form_approved`, `IBC_biosafety_approved`, `forme_signature_statuory_edit`, `signature_statutory_endorsed`, `signature_statutory_applicant_free`, `forme_PI_signature_edit`, `applicant_PI_signature_date`, `applicant_PI_signature_name`, `applicant_PI_signature_stamp`, `IBC_chairperson_signature_date`, `IBC_chairperson_signature_name`, `IBC_chairperson_signature_stamp`, `organization_representative_signature_date`, `organization_representative_signature_name`, `organization_representative_signature_stamp`, `forme_partA_edit`, `project_team_name`, `project_team_address`, `project_team_telephone_number`, `project_team_email_address`, `project_team_qualification`, `project_team_designation`, `forme_partB_edit`, `project_intro_objective`, `project_intro_specifics`, `project_intro_activities`, `project_intro_BSL`, `project_intro_duration`, `project_intro_intended_date_commencement`, `project_intro_expected_date_completion`, `project_intro_importation_date`, `project_intro_field_experiment`, `forme_partC_edit`, `LMO_desc_name_parent`, `LMO_desc_name_donor`, `LMO_desc_method`, `LMO_desc_class`, `LMO_desc_trait`, `LMO_desc_genes`, `LMO_desc_genes_function`, `forme_partD1_edit`, `risk_assessment_genes_potential_hazard`, `risk_assessment_genes_comments`, `risk_assessment_genes_management`, `risk_assessment_genes_residual`, `risk_assessment_admin_potential_hazard`, `risk_assessment_admin_comments`, `risk_assessment_admin_management`, `risk_assessment_admin_residual`, `risk_assessment_containment_potential_hazard`, `risk_assessment_containment_comments`, `risk_assessment_containment_management`, `risk_assessment_containment_residual`, `risk_assessment_special_potential_hazard`, `risk_assessment_special_comments`, `risk_assessment_special_management`, `risk_assessment_special_residual`, `forme_partD2_edit`, `risk_management_transport`, `risk_management_disposed`, `risk_management_wastes`, `risk_management_wastewater`, `risk_management_decontaminated`, `forme_partD3_edit`, `risk_response_environment`, `risk_response_plan`, `risk_response_disposal`, `risk_response_isolation`, `risk_response_contigency`, `forme_partE_edit`, `premise_name`, `premise_type`, `premise_BSL`, `premise_IBC`, `premise_IBC_date`, `premise_certification_date`, `premise_certification_no`, `premise_certification_report`, `premise_address`, `premise_officer_name`, `premise_telephone_business`, `premise_telephone_mobile`, `premise_fax`, `premise_email`, `forme_partF_edit`, `confidential_description`, `forme_partG_edit`, `reference_description`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 8, 28, 0, 'save status update', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', '', '', '', '', '', '', '', 0, '', '', NULL, 0, '', '', '', '', '', NULL, '', '', 0, '', '', '', '', '', 0, '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', 0, ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', 0, '', '', NULL, NULL, NULL, '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, ',,', ',,', ',,', ',,', ',,', NULL, ',,', 0, ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', NULL, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, '', 0, '', NULL, 0, 'saved'),
(2, 2, 5, 8, 29, 0, 'Submit project edited', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', '', '', '', '', '', '', '', 0, '', '', NULL, 0, '', '', '', '', '', NULL, '', '', 0, '', '', '', '', '', 0, '', '', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', 0, ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', 0, '', '', NULL, NULL, NULL, '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, ',,', ',,', ',,', ',,', ',,', NULL, ',,', 0, ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', NULL, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, '', 0, '', NULL, 0, 'submitted'),
(3, 2, NULL, 8, 30, 0, 'new type', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', '', '', '', '', '', '', '', 0, '', '', NULL, 0, '', '', '', '', '', NULL, '', '', 0, '', '', '', '', '', 0, '', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', 0, ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', 0, '', '', NULL, NULL, NULL, '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,', ',,', ',,', ',,', ',,', NULL, ',,', 0, ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', NULL, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, '', 0, '', NULL, 0, 'submitted'),
(4, 2, 6, 8, 65, 0, 'Test Submit Date', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', '', '', '', '', '', '', '', '', 0, '', '', NULL, 0, '', '', '', '', '', NULL, '', '', 0, '', '', '', '', '', 0, '', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', 0, ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', ',,,,', 0, '', '', NULL, NULL, NULL, '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,', ',,', ',,', ',,', ',,', NULL, ',,', 0, ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', ',,', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', NULL, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, '', 0, '', 4, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `formf`
--

CREATE TABLE `formf` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '9',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formf`
--

INSERT INTO `formf` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `NBB_reference_no`, `formf_notif_list_edit`, `notification_checklist_form_completed`, `notification_checklist_CBI`, `notification_checklist_submitted`, `formf_part1_edit`, `exporter_organization`, `exporter_name`, `exporter_position`, `exporter_telephone_office`, `exporter_telephone_mobile`, `exporter_fax`, `exporter_email_address`, `exporter_postal_address`, `formf_part2_edit`, `LMO_description`, `LMO_type`, `LMO_type_description`, `LMO_identification`, `LMO_scientific_name`, `LMO_trait`, `LMO_intended_usage`, `LMO_export_form`, `LMO_export_mode`, `LMO_export_mode_description`, `LMO_point_of_exit`, `LMO_methods`, `formf_part3_edit`, `import_country_name`, `import_evidence`, `formf_part4_edit`, `export_import_CBI`, `formf_part5_edit`, `applicant_signature_date`, `applicant_name`, `applicant_stamp`, `representative_signature_date`, `representative_name`, `representative_stamp`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 9, 50, NULL, 0, 1, NULL, 1, 0, 'Test save form f changed', '', '', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', NULL, '', '', '', 0, '', '', 0, '', 0, '0000-00-00', 'Si Kim Yeung', '', '0000-00-00', '', '', NULL, 0, 'saved'),
(2, 2, 6, 9, 51, NULL, 0, 1, 1, 1, 0, 'Submit Form F updated', '', '', '', '', '', '', '', 0, '', NULL, '', '', '', '', '', '', NULL, '', '', '', 0, '', '', 0, '', 0, '0000-00-00', 'Si Kim Yeung', '', '0000-00-00', '', '', NULL, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `hirarc`
--

CREATE TABLE `hirarc` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '10',
  `project_id` int(10) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `hirarc`
--

INSERT INTO `hirarc` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `hirarc_sec1_edit`, `company_name`, `date`, `process_location`, `conducted_name`, `conducted_designation`, `approved_name`, `approved_designation`, `date_from`, `date_to`, `review_date`, `document_no`, `hirarc_sec2_edit`, `HIRARC_activity`, `HIRARC_hazard`, `HIRARC_effects`, `HIRARC_risk_control`, `HIRARC_LLH`, `HIRARC_SEV`, `HIRARC_RR`, `HIRARC_control_measure`, `HIRARC_PIC`, `application_type`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 10, 28, 0, 'Save project status update', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', '<div style=,,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, NULL, 0, 'saved'),
(2, 2, 5, 10, 29, 0, 'Submit Project', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, NULL, 0, 'submitted'),
(3, 2, NULL, 10, 30, 0, 'safcsscf', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, NULL, 0, 'submitted'),
(5, 2, NULL, 10, 33, 0, 'Biohazardous Test Save updated saved', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', '<div style=,,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, NULL, 0, 'saved'),
(6, 2, 3, 10, 34, 0, 'Biohazardous Submit update', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', '<div style=,,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, NULL, 0, 'submitted'),
(8, 2, NULL, 10, 36, 0, 'exempt save test change', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', '<div style=,,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, NULL, 0, 'saved'),
(9, 2, 3, 10, 37, 0, 'Submit exempt project edited', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', '<div style=,,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, NULL, 1, 'submitted'),
(10, 2, 6, 10, 65, 0, 'Test Submit Date', '0000-00-00', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 0, ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', ',,,', 0, 4, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `incidentaccidentreport`
--

CREATE TABLE `incidentaccidentreport` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '11',
  `project_id` int(10) UNSIGNED NOT NULL,
  `incident_sec1_edit` int(1) DEFAULT '0',
  `victim_name` varchar(100) DEFAULT NULL,
  `victim_gender` int(1) DEFAULT NULL,
  `victim_age` int(2) DEFAULT NULL,
  `victim_citizenship` varchar(100) DEFAULT NULL,
  `victim_employment_designation` varchar(100) DEFAULT NULL,
  `victim_faculty` varchar(100) DEFAULT NULL,
  `doc_id` varchar(10) DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `incident_sec2_edit` int(1) DEFAULT '0',
  `incident_date` date DEFAULT NULL,
  `incident_time` varchar(25) DEFAULT NULL,
  `incident_location` varchar(100) DEFAULT NULL,
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
  `incident_injury` int(1) DEFAULT NULL,
  `incident_physician_or_hospital` int(1) DEFAULT NULL,
  `incident_details` varchar(500) DEFAULT NULL,
  `incident_actions` varchar(500) DEFAULT NULL,
  `incident_sec3_edit` int(1) DEFAULT '0',
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_designation` varchar(100) DEFAULT NULL,
  `reporter_date` date DEFAULT NULL,
  `incident_sec4_edit` int(1) DEFAULT '0',
  `investigation_victim` int(1) DEFAULT NULL,
  `investigation_victim_age` varchar(100) DEFAULT NULL,
  `investigation_victim_citizenship` varchar(100) DEFAULT NULL,
  `investigation_victim_job_description` varchar(500) DEFAULT NULL,
  `investigation_findings` varchar(500) DEFAULT NULL,
  `investigation_preventive_no` varchar(500) DEFAULT NULL,
  `investigation_preventive_action` varchar(500) DEFAULT NULL,
  `investigation_preventive_by_whom` varchar(500) DEFAULT NULL,
  `investigation_preventive_timeline` varchar(500) DEFAULT NULL,
  `investigated_by` varchar(100) DEFAULT NULL,
  `reviewed_by` varchar(100) DEFAULT NULL,
  `application_type` int(1) DEFAULT '0',
  `application_approved` int(1) DEFAULT NULL,
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidentaccidentreport`
--

INSERT INTO `incidentaccidentreport` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `incident_sec1_edit`, `victim_name`, `victim_gender`, `victim_age`, `victim_citizenship`, `victim_employment_designation`, `victim_faculty`, `doc_id`, `review_date`, `incident_sec2_edit`, `incident_date`, `incident_time`, `incident_location`, `incident_type1`, `incident_type2`, `incident_type3`, `incident_type4`, `incident_type5`, `incident_type6`, `incident_type7`, `incident_type8`, `incident_type9`, `incident_type_description`, `incident_injury`, `incident_physician_or_hospital`, `incident_details`, `incident_actions`, `incident_sec3_edit`, `reporter_name`, `reporter_designation`, `reporter_date`, `incident_sec4_edit`, `investigation_victim`, `investigation_victim_age`, `investigation_victim_citizenship`, `investigation_victim_job_description`, `investigation_findings`, `investigation_preventive_no`, `investigation_preventive_action`, `investigation_preventive_by_whom`, `investigation_preventive_timeline`, `investigated_by`, `reviewed_by`, `application_type`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 11, 55, 0, 'Test save changed', 0, 0, '', '', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'saved'),
(2, 2, 3, 11, 56, 0, 'submit test for incident exempt', 0, 0, '', 'updated', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'submitted'),
(3, 2, NULL, 11, 57, 0, 'minor save change', 0, 0, '', '', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'saved'),
(4, 2, 3, 11, 58, 0, 'minor submit test updated', 0, 0, '', '', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'submitted'),
(5, 2, NULL, 11, 59, 0, 'major save', 0, 0, '', '', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'saved'),
(6, 2, 3, 11, 60, 0, 'major submit', 1, 0, '', '', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'submitted'),
(7, 2, NULL, 11, 61, 0, 'fafaf changed', 0, 0, '', '', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'saved'),
(8, 2, 3, 11, 62, 0, 'submit disease report updated', 0, 0, '', '', '', NULL, '0000-00-00', 0, '0000-00-00', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', '', 0, '', '', '0000-00-00', 0, 0, '', '', '', '', ',,,,,', ',,,,,', ',,,,,', ',,,,,', '', '', 0, NULL, 0, 'submitted');

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

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `quiz_id`, `account_id`, `mark`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `materialriskassessment`
--

CREATE TABLE `materialriskassessment` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '12',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materialriskassessment`
--

INSERT INTO `materialriskassessment` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `material_sec1_edit`, `Sec1_chemical`, `Sec1_biological_material`, `Sec1_equipment`, `Sec1_doc_id`, `Sec1_review_date`, `material_sec2A1_edit`, `Sec2A_name`, `Sec2A_manufacturer`, `Sec2A_hazardous`, `Sec2A_statement`, `Sec2A_waste`, `Sec2A_waste_type_corrosive`, `Sec2A_waste_type_ignitable`, `Sec2A_waste_type_reactive`, `Sec2A_waste_type_toxic`, `Sec2A_waste_type_infectious`, `material_sec2A2_edit`, `Sec2A2_permit`, `Sec2A2_permit_type`, `Sec2A2_MSDS`, `Sec2A2_exposure_inhalation`, `Sec2A2_exposure_skin`, `Sec2A2_exposure_ingestion`, `Sec2A2_exposure_injection`, `Sec2A2_exposure_others`, `Sec2A2_exposure_description`, `Sec2A2_storage`, `Sec2A2_waste_requirement`, `Sec2A2_risk_control_training`, `Sec2A2_risk_control_inspection`, `Sec2A2_risk_control_SOP`, `Sec2A2_risk_control_PPE`, `Sec2A2_risk_control_engineering`, `Sec2A2_emergency_first_aid_kit`, `Sec2A2_emergency_shower`, `Sec2A2_emergency_eyewash`, `Sec2A2_emergency_neutralizing`, `Sec2A2_emergency_spill`, `Sec2A2_emergency_restrict`, `material_sec2A3_edit`, `Sec2A3_storage_inhalation`, `Sec2A3_storage_skin`, `Sec2A3_storage_ingestion`, `Sec2A3_storage_injection`, `Sec2A3_storage_others`, `Sec2A3_storage_description`, `Sec2A3_storage_control`, `Sec2A3_handling_inhalation`, `Sec2A3_handling_skin`, `Sec2A3_handling_ingestion`, `Sec2A3_handling_injection`, `Sec2A3_handling_others`, `Sec2A3_handling_description`, `Sec2A3_handling_control`, `Sec2A3_spill_inhalation`, `Sec2A3_spill_skin`, `Sec2A3_spill_ingestion`, `Sec2A3_spill_injection`, `Sec2A3_spill_others`, `Sec2A3_spill_description`, `Sec2A3_spill_control`, `Sec2A3_disposal_inhalation`, `Sec2A3_disposal_skin`, `Sec2A3_disposal_ingestion`, `Sec2A3_disposal_injection`, `Sec2A3_disposal_others`, `Sec2A3_disposal_description`, `Sec2A3_disposal_control`, `material_sec2B1_edit`, `Sec2B1_equipment_name`, `Sec2B1_activity_type`, `Sec2B1_activity_location`, `material_sec2B2_edit`, `Sec2B2_machinery_description`, `Sec2B2_checklist_crushing`, `Sec2B2_checklist_shearing`, `Sec2B2_checklist_drawing`, `Sec2B2_checklist_cutting`, `Sec2B2_checklist_entangle`, `Sec2B2_checklist_impact`, `Sec2B2_checklist_abrasion`, `Sec2B2_checklist_stabbing`, `Sec2B2_checklist_puncture`, `Sec2B2_checklist_ejection`, `Sec2B2_checklist_temperature`, `Sec2B2_checklist_electrical`, `Sec2B2_checklist_noise`, `Sec2B2_checklist_vibration`, `Sec2B2_checklist_dust`, `Sec2B2_checklist_pressure`, `Sec2B2_checklist_waste`, `Sec2B2_checklist_fumes`, `Sec2B2_checklist_chemical`, `Sec2B2_checklist_allergens`, `Sec2B2_exposure`, `Sec2B2_users`, `Sec2B2_control_measures`, `Sec2B2_procedural_behavioural`, `Sec2B2_overall_assessment_risk_level`, `Sec2B2_risk_reduction_action`, `Sec2B2_risk_reduction_by_who`, `Sec2B2_risk_reduction_by_when`, `Sec2B2_risk_reduction_action_completed`, `Sec2B2_overall_assessment_risk_level_after`, `material_sec3_edit`, `Sec3_requestor`, `Sec3_requestor_date`, `Sec3_supervisor`, `Sec3_supervisor_date`, `Sec3_LO`, `Sec3_LO_date`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 12, 41, 0, NULL, NULL, NULL, '', '0000-00-00', 0, 'Save Procurement', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', 0, ' ', '', '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '', '', '', '', NULL, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, 0, 'saved'),
(2, 2, 3, 12, 42, 0, NULL, NULL, NULL, '', '0000-00-00', 0, 'New material submitted', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, '', '', 0, ' ', '', '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, '', '', '', '', NULL, 0, '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', 1, 2, 'submitted');

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
(1, NULL, 4, 'New Registration', 'The following user has requested for an account: Si Kim Yeung', '2018-10-05 21:41:29', 1),
(2, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-06 20:41:14', 1),
(3, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-06 20:57:20', 1),
(4, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-09 16:20:30', 1),
(5, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-12 20:50:23', 1),
(6, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-14 14:15:59', 1),
(7, NULL, 2, 'New Application For LMO Approved', 'BSO has approved an application for LMO', '2018-10-14 17:30:23', 1),
(8, NULL, 3, 'Annex 2 Application Approved', 'SSBC Chair has approved an Annex 2 Application that requires additional input', '2018-10-14 19:01:13', 1),
(9, NULL, 2, 'Annex 2 Application Approved', 'SSBC members have approved an Annex 2 Application.', '2018-10-14 19:11:15', 1),
(10, NULL, 4, 'Annex 2 Application Modification Request', 'The following user has requested to edit an Annex 2 form: Si Kim Yeung', '2018-10-14 19:52:30', 1),
(11, NULL, 2, 'New Application For Biohazardous Materials Approved', 'BSO has approved a Biohazard Materials Form ', '2018-10-15 13:51:59', 1),
(12, NULL, 2, 'New Application For Biohazardous Materials Approved', 'BSO has approved a Biohazard Materials Form ', '2018-10-15 14:09:49', 1),
(13, NULL, 4, 'Application for Biohazardous Materials Modification Request', 'The following user has requested to edit an Application for Biohazardous Materials: Si Kim Yeung', '2018-10-15 15:40:18', 1),
(14, NULL, 2, 'New Application For Exempt Dealing Approved', 'BSO has approved an Exempt Dealing Application ', '2018-10-15 18:05:01', 1),
(15, NULL, 3, 'New Application For Exempt Dealing Approved', 'SSBC Chair has approved an Application For Exempt Dealing that requires additional input.', '2018-10-15 18:06:07', 1),
(16, NULL, 2, 'New Application For Exempt Dealing Approved', 'SSBC Member has approved an Application For Exempt Dealing', '2018-10-15 18:06:36', 1),
(17, NULL, 4, 'Application for Exempt Dealings Modification Request', 'The following user has requested to edit an Application for Exempt Dealings: Si Kim Yeung', '2018-10-15 18:19:16', 1),
(18, NULL, 4, 'Application for Exempt Dealings Modification Request', 'The following user has requested to edit an Application for Exempt Dealings: Si Kim Yeung', '2018-10-15 22:50:02', 1),
(19, NULL, 4, 'Application for Exempt Dealings Modification Request', 'The following user has requested to edit an Application for Exempt Dealings: Si Kim Yeung', '2018-10-16 15:39:42', 1),
(20, NULL, 3, 'Annual Final Report Form Application Approved', 'BSO has approved an Annual Final Report Form Application that requires additional input. ', '2018-10-16 22:13:59', 1),
(21, NULL, 2, 'Annual Final Report Form Application Approved', 'SSBC Members have approved an Annual Final Report Form Application. ', '2018-10-16 22:15:44', 1),
(22, NULL, 4, 'Annual or Final Report Modification Request', 'The following user has requested to edit an Annual or Final Report: Si Kim Yeung', '2018-10-16 22:21:29', 1),
(23, NULL, 4, 'Notification of LMO and BM Modification Request', 'The following user has requested to edit an Application for Notification of LMO and BM: Si Kim Yeung', '2018-10-16 22:35:31', 1),
(24, NULL, 4, 'Application for Exempt Dealings Modification Request', 'The following user has requested to edit an Application for Exempt Dealings: Si Kim Yeung', '2018-10-16 22:35:34', 1),
(25, NULL, 4, 'Application for Exempt Dealings Modification Request', 'The following user has requested to edit an Application for Exempt Dealings: Si Kim Yeung', '2018-10-16 22:36:16', 1),
(26, NULL, 3, 'Notification For Exporting LMO Form Approved', 'BSO has approved a Notification For Exporting LMO Form Application', '2018-10-16 23:14:32', 1),
(27, NULL, 2, 'Notification For Exporting LMO Form Approved', 'SSBC Member has approved a Notification For Exporting LMO Form Application', '2018-10-16 23:16:19', 1),
(28, NULL, 4, 'Annual or Final Report Modification Request', 'The following user has requested to edit an Annual or Final Report: Si Kim Yeung', '2018-10-16 23:22:56', 1),
(29, NULL, 4, 'Annual or Final Report Modification Request', 'The following user has requested to edit an Annual or Final Report: Si Kim Yeung', '2018-10-16 23:29:44', 1),
(30, NULL, 4, 'Annual or Final Report Modification Request', 'The following user has requested to edit an Annual or Final Report: Si Kim Yeung', '2018-10-17 00:33:03', 1),
(31, NULL, 5, 'Minor Biological Incident/Accident Report Form Approved', 'BSO has approved a Minor Biological Incident/Accident Form.', '2018-10-17 01:48:11', 1),
(32, NULL, 5, 'Minor Biological Incident/Accident Report Form Approved', 'BSO has approved a Minor Biological Incident/Accident Form.', '2018-10-17 01:49:32', 1),
(33, NULL, 5, 'Minor Biological Incident/Accident Report Form Approved', 'BSO has approved a Minor Biological Incident/Accident Form.', '2018-10-17 01:50:05', 1),
(34, NULL, 5, 'Minor Biological Incident/Accident Report Form Approved', 'BSO has approved a Minor Biological Incident/Accident Form.', '2018-10-17 01:50:07', 1),
(35, NULL, 4, 'Annual or Final Report Modification Request', 'The following user has requested to edit an Annual or Final Report: Si Kim Yeung', '2018-10-17 01:59:12', 1),
(36, NULL, 5, 'Minor Biological Incident/Accident Report Form Approved', 'BSO has approved a Minor Biological Incident/Accident Form.', '2018-10-17 02:34:48', 1),
(37, NULL, 4, 'Minor Incident Accident Report Modification Request', 'The following user has requested to edit a Minor Incident Accident Report: Si Kim Yeung', '2018-10-17 02:37:54', 1),
(38, NULL, 3, 'Major Biological Incident/Accident Report Form Approved', 'BSO has approved a Major Biological Incident/Accident Form.', '2018-10-17 03:36:28', 1),
(39, NULL, 5, 'Major Biological Incident/Accident Report Form Approved', 'BSO has approved a Major Biological Incident/Accident Form.', '2018-10-17 03:36:28', 1),
(40, NULL, 4, 'Major Incident Accident Report Modification Request', 'The following user has requested to edit a Major Incident Accident Report: Si Kim Yeung', '2018-10-17 03:39:58', 1),
(41, NULL, 3, 'Occupational Disease or Exposure Project Approved', 'BSO has approved a Occupational Disease or Exposure Project.', '2018-10-17 09:10:56', 1),
(42, NULL, 5, 'Occupational Disease or Exposure Project Approved', 'BSO has approved a Occupational Disease or Exposure Project.', '2018-10-17 09:10:56', 1),
(43, NULL, 4, 'Major Incident Accident Report Modification Request', 'The following user has requested to edit a Major Incident Accident Report: Si Kim Yeung', '2018-10-17 09:15:38', 1),
(44, NULL, 4, 'New Registration', 'The following user has requested for an account: aaa', '2018-10-17 10:17:31', 1),
(45, NULL, 4, 'New Annex 2 Application', 'The following user has submitted a new application form: Si Kim Yeung', '2018-10-23 16:47:52', 1),
(46, NULL, 2, 'New Application For LMO Approved', 'BSO has approved an application for LMO', '2018-10-23 16:56:07', 1),
(47, NULL, 3, 'Annex 2 Application Approved', 'SSBC Chair has approved an Annex 2 Application that requires additional input', '2018-10-23 16:57:35', 1),
(48, NULL, 2, 'New Project Application for LMO Approved', 'SSBC members have approved an application for an LMO project.', '2018-10-23 17:07:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notificationexportingbiologicalmaterial`
--

CREATE TABLE `notificationexportingbiologicalmaterial` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '13',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificationexportingbiologicalmaterial`
--

INSERT INTO `notificationexportingbiologicalmaterial` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `SBC_reference_no`, `notificationexport_sec1_edit`, `personnel_name`, `personnel_staff_student_no`, `personnel_designation`, `personnel_faculty`, `personnel_project_title`, `personnel_reference_no`, `notificationexport_sec2_edit`, `LMO_list`, `LMO_name`, `LMO_risk_level`, `LMO_category`, `LMO_quantity`, `LMO_volume`, `biological_list`, `biological_name`, `biological_risk_level`, `biological_category`, `biological_quantity`, `biological_volume`, `notificationexport_sec3_edit`, `importing_country`, `importing_institude`, `importing_person_in_charge`, `importing_person_in_charge_telephone_no`, `notificationexport_sec4_edit`, `declaration_name`, `declaration_date`, `notificationexport_sec5_edit`, `signature_verified_by`, `signature_verified_date`, `notification_approved_by`, `notification_declined_by`, `notification_approve_decline_date`, `notification_approve_decline_remarks`, `notification_reviewed_by`, `notification_reviewed_by_date`, `notification_reviewed_by_remarks`, `delivered_date`, `incident_accident_report`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 13, 52, NULL, NULL, 0, 'New export exempt save changed', 0, '', '', '', '', 0, NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', ',,,,,', NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', ',,,,,', 0, '', '', '', 0, 0, '', '0000-00-00', 0, '', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', NULL, 0, 'saved'),
(2, 2, 3, 13, 53, NULL, NULL, 0, 'Submit export exempt test', 0, 'updated here', '', '', '', 0, NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', ',,,,,', NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', ',,,,,', 0, '', '', '', 0, 0, '', '0000-00-00', 0, '', '0000-00-00', NULL, NULL, '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', NULL, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `notificationlmobiohazardousmaterial`
--

CREATE TABLE `notificationlmobiohazardousmaterial` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(1) DEFAULT '14',
  `project_id` int(10) UNSIGNED NOT NULL,
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
  `editable` int(1) DEFAULT '0',
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificationlmobiohazardousmaterial`
--

INSERT INTO `notificationlmobiohazardousmaterial` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `SBC_reference_no`, `notificationlmo_sec1_edit`, `personnel_name`, `personnel_staff_student_no`, `personnel_designation`, `personnel_faculty`, `personnel_unit_code`, `personnel_project_title`, `personnel_reference_no`, `personnel_storage`, `personnel_keeper_name`, `notificationlmo_sec2_edit`, `LMO_list`, `LMO_name`, `LMO_risk_level`, `LMO_quantity`, `LMO_volume`, `biohazard_list`, `biohazard_name`, `biohazard_risk_level`, `biohazard_quantity`, `biohazard_volume`, `notificationlmo_sec3_edit`, `declaration_name`, `declaration_date`, `signature_verified_by`, `signature_verified_date`, `notification_approved_by`, `notification_declined_by`, `notification_approver`, `notification_decliner`, `notification_approve_decline_date`, `notification_approve_decline_remarks`, `notification_reviewed_by`, `notification_reviewed_by_date`, `notification_reviewed_by_remarks`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 14, 43, NULL, NULL, 0, 'NotificationLMOandBM save updated', 0, '', '', '', '', NULL, '', '', 0, NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', 0, '', '0000-00-00', '', '0000-00-00', NULL, NULL, '', '', '0000-00-00', '', '', '0000-00-00', '', NULL, 0, 'saved'),
(2, 2, 3, 14, 44, NULL, NULL, 0, '', 0, '', '', 'Test if can submit updated', '', NULL, '', '', 0, NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', NULL, ',,,,,', ',,,,,', ',,,,,', ',,,,,', 0, '', '0000-00-00', '', '0000-00-00', NULL, NULL, '', '', '0000-00-00', '', '', '0000-00-00', '', NULL, 1, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `pc1`
--

CREATE TABLE `pc1` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '15',
  `project_id` int(10) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `pc1`
--

INSERT INTO `pc1` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `SBC_reference_no`, `pc1_sec1_edit`, `project_title`, `pc1_sec2_edit`, `project_supervisor_title`, `project_supervisor_name`, `project_supervisor_qualification`, `project_supervisor_department`, `project_supervisor_campus`, `project_supervisor_postal_address`, `project_supervisor_telephone`, `project_supervisor_fax`, `project_supervisor_email_address`, `pc1_sec3_edit`, `project_add_title`, `project_add_name`, `project_add_qualification`, `project_add_department`, `project_add_campus`, `project_add_postal_address`, `project_add_telephone`, `project_add_fax`, `project_add_email_address`, `pc1_sec4_edit`, `dealing_type_a`, `dealing_type_c`, `pc1_sec5_edit`, `project_summary`, `pc1_sec6_edit`, `GMO_name`, `GMO_method`, `GMO_origin`, `pc1_sec7_edit`, `modified_trait_class`, `modified_trait_description`, `pc1_sec8_edit`, `project_hazard_staff`, `pc1_sec9_edit`, `project_hazard_environment`, `pc1_sec10_edit`, `project_hazard_steps`, `pc1_sec11_edit`, `project_transport`, `pc1_sec12_edit`, `project_disposal`, `pc1_sec13_edit`, `project_SOP`, `pc1_sec14_edit`, `project_facilities_building_no`, `project_facilities_room_no`, `project_facilities_containment_level`, `project_facilities_certification_no`, `pc1_sec15_edit`, `officer_notified`, `officer_name`, `laboratory_manager`, `application_approved`, `editable`, `status`) VALUES
(1, 2, NULL, 15, 28, NULL, '', 0, 'save status update', 0, '', '', '', '', '', '', '', '', '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, 0, '', '', NULL, 0, 'saved'),
(2, 2, 5, 15, 29, NULL, '', 0, 'Submit Project', 0, '', '', '', '', '', '', '', '', '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, NULL, '', '', NULL, 0, 'submitted'),
(3, 2, NULL, 15, 30, NULL, '', 0, 'jasccs', 0, '', '', '', '', '', '', '', '', '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, NULL, '', '', NULL, 0, 'submitted'),
(4, 2, 6, 15, 65, NULL, '', 0, 'Test Submit Date', 0, '', '', '', '', '', '', '', '', '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, NULL, '', '', 4, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `pc2`
--

CREATE TABLE `pc2` (
  `application_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `form_type` int(2) DEFAULT '16',
  `project_id` int(10) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `pc2`
--

INSERT INTO `pc2` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `SBC_reference_no`, `pc2_sec1_edit`, `project_title`, `pc2_sec2_edit`, `project_supervisor_title`, `project_supervisor_name`, `project_supervisor_qualification`, `project_supervisor_department`, `project_supervisor_campus`, `project_supervisor_postal_address`, `project_supervisor_telephone`, `project_supervisor_fax`, `project_supervisor_email_address`, `pc2_sec3_edit`, `project_add_title`, `project_add_name`, `project_add_qualification`, `project_add_department`, `project_add_campus`, `project_add_postal_address`, `project_add_telephone`, `project_add_fax`, `project_add_email_address`, `pc2_sec4_edit`, `dealing_type_a`, `dealing_type_aa`, `dealing_type_b`, `dealing_type_c`, `dealing_type_d`, `dealing_type_e`, `dealing_type_f`, `dealing_type_g`, `dealing_type_h`, `dealing_type_i`, `dealing_type_j`, `dealing_type_k`, `dealing_type_l`, `dealing_type_m`, `pc2_sec5_edit`, `project_summary`, `pc2_sec6_edit`, `GMO_name`, `GMO_method`, `GMO_origin`, `pc2_sec7_edit`, `modified_trait_class`, `modified_trait_description`, `pc2_sec8_edit`, `project_hazard_staff`, `pc2_sec9_edit`, `project_hazard_environment`, `pc2_sec10_edit`, `project_hazard_steps`, `pc2_sec11_edit`, `project_transport`, `pc2_sec12_edit`, `project_disposal`, `pc2_sec13_edit`, `project_SOP`, `pc2_sec14_edit`, `project_facilities_building_no`, `project_facilities_room_no`, `project_facilities_containment_level`, `project_facilities_certification_no`, `pc2_sec15_edit`, `officer_notified`, `officer_name`, `laboratory_manager`, `application_approved`, `editable`, `status`) VALUES
(1, 2, 4, 16, 28, NULL, '', 0, 'save status update', 0, '', '', '', '', '', '', NULL, 0, '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, 0, '', '', 3, 0, 'saved'),
(2, 2, 5, 16, 29, NULL, '', 0, 'Submit Project', 0, '', 'Submit Project', '', '', '', '', NULL, 0, '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, NULL, '', '', 3, 0, 'submitted'),
(3, 2, 4, 16, 30, NULL, '', 0, 'dvsdvsdvs', 0, '', '', '', '', '', '', NULL, 0, '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, NULL, '', '', 3, 0, 'submitted'),
(4, 2, 6, 16, 65, NULL, '', 0, 'Test Submit Date', 0, '', '', '', '', '', '', NULL, 0, '', 0, ',', ',', ',', ',', ',', ',', ',', ',', ',', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 0, '', '', '', 0, '', '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', '', '', 0, NULL, '', '', 4, 0, 'submitted');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `approver_id` int(10) UNSIGNED DEFAULT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `project_desc` varchar(500) DEFAULT NULL,
  `project_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_type` varchar(20) DEFAULT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `project_approval` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `project_status` varchar(15) DEFAULT NULL,
  `project_editable` int(1) NOT NULL DEFAULT '0',
  `project_duration` int(1) UNSIGNED DEFAULT NULL,
  `approval_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `approver_id`, `project_name`, `project_desc`, `project_date`, `project_type`, `account_id`, `project_approval`, `project_status`, `project_editable`, `project_duration`, `approval_date`) VALUES
(28, NULL, 'Test save project', 'save the project status', '2018-10-12 12:33:41', 'app_lmo', 2, 0, 'saved', 0, NULL, NULL),
(29, 5, 'Test project submit', 'Submit project status', '2018-10-12 12:49:43', 'app_lmo', 2, 0, 'submitted', 0, NULL, NULL),
(30, NULL, 'New Type Porject', 'asascassabfebdfb ', '2018-10-14 06:15:21', 'app_lmo', 2, 0, 'submitted', 0, NULL, NULL),
(33, NULL, 'Biohazard Test Save Project', 'Test if biohazard project can be saved', '2018-10-14 15:35:29', 'app_bio', 2, 0, 'saved', 0, NULL, NULL),
(34, 3, 'Biohazard submit', 'Biohazardous submit function', '2018-10-14 15:37:44', 'app_bio', 2, 0, 'submitted', 0, NULL, NULL),
(36, NULL, 'Exempt save', 'Exempt submission', '2018-10-15 08:35:03', 'app_exempt', 2, 0, 'saved', 0, NULL, NULL),
(37, 3, 'exempt submit', 'submit testing for exempt project', '2018-10-15 08:37:58', 'app_exempt', 2, 0, 'submitted', 0, NULL, NULL),
(41, NULL, 'New Procurement project saved', 'New Save project', '2018-10-15 12:34:55', 'procurement', 2, 0, 'saved', 0, NULL, NULL),
(42, 3, 'Procurement submit', 'ascacascasc', '2018-10-15 12:38:21', 'procurement', 2, 1, 'submitted', 0, NULL, NULL),
(43, NULL, 'Notifcation of LMO and BM save', 'Test save function for notification of LMO and BM', '2018-10-16 06:16:56', 'notifLMOBM', 2, 0, 'saved', 0, NULL, NULL),
(44, 3, 'New Submit For Notification of LMO and BM', 'test submit', '2018-10-16 07:19:54', 'notifLMOBM', 2, 0, 'submitted', 0, NULL, NULL),
(47, NULL, 'annual save', 'test save', '2018-10-16 13:24:16', 'anuualfinalreport', 2, 0, 'saved', 0, NULL, NULL),
(48, 3, 'Test submit anual', 'acscac', '2018-10-16 13:32:34', 'anuualfinalreport', 2, 0, 'submitted', 0, NULL, NULL),
(50, NULL, 'Form F test save', 'ksjdvmsdmv', '2018-10-16 14:48:20', 'exportLMO', 2, 0, 'saved', 0, NULL, NULL),
(51, 3, 'Test Form F submit', 'Sajinasc', '2018-10-16 14:51:43', 'exportLMO', 2, 0, 'submitted', 0, NULL, NULL),
(52, NULL, 'Test save export exempt', 'advdvdx', '2018-10-16 15:59:05', 'exportExempt', 2, 0, 'saved', 0, NULL, NULL),
(53, 3, 'Test export exempt submit', 'vsdvsdv', '2018-10-16 16:04:54', 'exportExempt', 2, 0, 'submitted', 0, NULL, NULL),
(55, NULL, 'Test exempt incident save', 'scscsdcd', '2018-10-16 17:17:35', 'incidentExempt', 2, 0, 'saved', 0, NULL, NULL),
(56, 3, 'Exempt incident submit', 'sdgvdsvgd', '2018-10-16 17:20:49', 'incidentExempt', 2, 0, 'submitted', 0, NULL, NULL),
(57, NULL, 'New minor save', 'asdcfsc', '2018-10-16 18:22:43', 'minorbio', 2, 0, 'saved', 0, NULL, NULL),
(58, 3, 'minor submit', 'bfgftrjt6jngf', '2018-10-16 18:24:45', 'minorbio', 2, 0, 'submitted', 0, NULL, NULL),
(59, NULL, 'major save', 'dksmvsv', '2018-10-16 19:07:48', 'majorbio', 2, 0, 'saved', 0, NULL, NULL),
(60, 3, 'major submit', 'sfascf', '2018-10-16 19:12:50', 'majorbio', 2, 0, 'submitted', 0, NULL, NULL),
(61, NULL, 'occupational disease save', 'wndfnmvswd', '2018-10-16 19:58:09', 'occupational', 2, 0, 'saved', 0, NULL, NULL),
(62, 3, 'disease submit', 'scscc', '2018-10-16 19:59:26', 'occupational', 2, 0, 'submitted', 0, NULL, NULL),
(63, NULL, 'project one', 'project testing', '2018-10-17 02:04:55', 'app_lmo', 2, 0, NULL, 0, NULL, NULL),
(64, NULL, 'Bacteria', 'HAUSHAUBDANXXAJ', '2018-10-17 02:12:31', 'app_lmo', 2, 0, NULL, 0, NULL, NULL),
(65, 6, 'Test Date Insertion', 'Testing if can saved approval date into database', '2018-10-23 08:42:10', 'app_lmo', 2, 4, 'submitted', 0, 2, '2018-10-23');

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
  `project_id` int(10) UNSIGNED NOT NULL,
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
-- Dumping data for table `swp`
--

INSERT INTO `swp` (`application_id`, `account_id`, `approver_id`, `form_type`, `project_id`, `date_received`, `SBC_reference_no`, `swp_sec1_edit`, `SWP_prepared_by`, `SWP_staff_student_no`, `SWP_designation`, `SWP_faculty`, `SWP_unit_title`, `SWP_project_title`, `SWP_location`, `swp_sec2_edit`, `SWP_description`, `SWP_preoperational`, `SWP_operational`, `SWP_postoperational`, `SWP_risk`, `SWP_control`, `swp_sec3_edit`, `SWP_declaration_name`, `SWP_declaration_date`, `swp_sec4_edit`, `SWP_signature_prepared_by`, `SWP_signature_prepared_by_date`, `SWP_signature_PI`, `SWP_signature_PI_date`, `SWP_lab_trained`, `SWP_lab_trainer`, `SWP_approval_by`, `SWP_approved_by`, `SWP_declined_by`, `SWP_approve_decline_date`, `SWP_approve_decline_remarks`, `SWP_reviewed_by`, `SWP_reviewed_by_date`, `SWP_reviewed_by_remarks`, `application_type`, `application_approved`, `editable`, `status`) VALUES
(1, 2, 3, 17, 28, NULL, NULL, 0, 'save project update', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, 1, 0, 'saved'),
(2, 2, 3, 17, 29, NULL, NULL, 0, 'Submit Project', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, 1, 0, 'submitted'),
(3, 2, 3, 17, 30, NULL, NULL, 0, 'sdcscsdcv', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, 1, 0, 'submitted'),
(5, 2, 3, 17, 33, NULL, NULL, 0, 'Biohazardous Test Save updated saved', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, 1, 0, 'saved'),
(6, 2, 3, 17, 34, NULL, NULL, 0, 'Biohazardous Submit', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, 4, 0, 'submitted'),
(8, 2, NULL, 17, 36, NULL, NULL, 0, 'exempt save test change', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, NULL, 0, 'saved'),
(9, 2, 3, 17, 37, NULL, NULL, 0, 'Submit exempt project edited', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, NULL, 1, 'submitted'),
(10, 2, 6, 17, 65, NULL, NULL, 0, 'Test Submit Date', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', NULL, '', NULL, NULL, '', '0000-00-00', '', '', '0000-00-00', '', 0, 4, 0, 'submitted');

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
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `annex3`
--
ALTER TABLE `annex3`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

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
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `biohazardousmaterial`
--
ALTER TABLE `biohazardousmaterial`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

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
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

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
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

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
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

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
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `notificationlmobiohazardousmaterial`
--
ALTER TABLE `notificationlmobiohazardousmaterial`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`),
  ADD KEY `project_id` (`project_id`);

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
  ADD KEY `account_id` (`account_id`),
  ADD KEY `approver_id` (`approver_id`);

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
  MODIFY `account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `annex2`
--
ALTER TABLE `annex2`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `annex3`
--
ALTER TABLE `annex3`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `annex4`
--
ALTER TABLE `annex4`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `annex5`
--
ALTER TABLE `annex5`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `annualfinalreport`
--
ALTER TABLE `annualfinalreport`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `biohazardousmaterial`
--
ALTER TABLE `biohazardousmaterial`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educational`
--
ALTER TABLE `educational`
  MODIFY `quiz_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exemptdealing`
--
ALTER TABLE `exemptdealing`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forme`
--
ALTER TABLE `forme`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formf`
--
ALTER TABLE `formf`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hirarc`
--
ALTER TABLE `hirarc`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `incidentaccidentreport`
--
ALTER TABLE `incidentaccidentreport`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materialriskassessment`
--
ALTER TABLE `materialriskassessment`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notificationexportingbiologicalmaterial`
--
ALTER TABLE `notificationexportingbiologicalmaterial`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notificationlmobiohazardousmaterial`
--
ALTER TABLE `notificationlmobiohazardousmaterial`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pc1`
--
ALTER TABLE `pc1`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pc2`
--
ALTER TABLE `pc2`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `storage_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `swp`
--
ALTER TABLE `swp`
  MODIFY `application_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annex2`
--
ALTER TABLE `annex2`
  ADD CONSTRAINT `annex2_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `annex3`
--
ALTER TABLE `annex3`
  ADD CONSTRAINT `annex3_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `annualfinalreport`
--
ALTER TABLE `annualfinalreport`
  ADD CONSTRAINT `annualfinalreport_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `biohazardousmaterial`
--
ALTER TABLE `biohazardousmaterial`
  ADD CONSTRAINT `biohazardousmaterial_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `educational`
--
ALTER TABLE `educational`
  ADD CONSTRAINT `educational_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `formf`
--
ALTER TABLE `formf`
  ADD CONSTRAINT `formf_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `incidentaccidentreport`
--
ALTER TABLE `incidentaccidentreport`
  ADD CONSTRAINT `incidentaccidentreport_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `educational` (`quiz_id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`);

--
-- Constraints for table `materialriskassessment`
--
ALTER TABLE `materialriskassessment`
  ADD CONSTRAINT `materialriskassessment_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `notificationexportingbiologicalmaterial`
--
ALTER TABLE `notificationexportingbiologicalmaterial`
  ADD CONSTRAINT `notificationexportingbiologicalmaterial_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `notificationlmobiohazardousmaterial`
--
ALTER TABLE `notificationlmobiohazardousmaterial`
  ADD CONSTRAINT `notificationlmobiohazardousmaterial_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `account_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`),
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`approver_id`) REFERENCES `accounts` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
