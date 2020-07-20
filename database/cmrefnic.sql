-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 01:55 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmrefnic`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_district`
--

CREATE TABLE `mst_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_district`
--

INSERT INTO `mst_district` (`district_id`, `district_name`, `created_on`, `is_active`, `is_deleted`) VALUES
(1, 'Chamba', '2020-03-26 19:17:31', 'Y', 'N'),
(2, 'Kangra', '2020-03-26 19:17:31', 'Y', 'N'),
(3, 'Lahul & Spiti', '2020-03-26 19:17:31', 'Y', 'N'),
(4, 'Kullu', '2020-03-26 19:17:31', 'Y', 'N'),
(5, 'Hamirpur', '2020-03-26 19:17:31', 'Y', 'N'),
(6, 'Shimla', '2020-03-26 19:17:31', 'Y', 'N'),
(7, 'Mandi', '2020-03-26 19:17:31', 'Y', 'N'),
(8, 'Una', '2020-03-26 19:17:31', 'Y', 'N'),
(9, 'Bilaspur', '2020-03-26 19:17:31', 'Y', 'N'),
(10, 'Solan', '2020-03-26 19:17:31', 'Y', 'N'),
(11, 'Sirmour', '2020-03-26 19:17:31', 'Y', 'N'),
(12, 'Kinnaur', '2020-03-26 19:17:31', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mst_notifications`
--

CREATE TABLE `mst_notifications` (
  `notification_id` int(11) NOT NULL,
  `notification_name` text NOT NULL,
  `notification_description` longtext NOT NULL,
  `notification_file` tinytext DEFAULT NULL,
  `notification_start_date` datetime NOT NULL,
  `notification_end_date` datetime NOT NULL,
  `notification_media` enum('ELECTRONIC','PRINT','SOCIAL') NOT NULL DEFAULT 'SOCIAL',
  `notification_district` int(11) DEFAULT 6,
  `name_of_newspaper` varchar(500) DEFAULT NULL,
  `newspaper_page_no` varchar(100) DEFAULT NULL,
  `source_of_detection` varchar(200) DEFAULT NULL,
  `name_of_channel_tv` varchar(200) DEFAULT NULL,
  `social_media_name` varchar(200) DEFAULT NULL,
  `website_url` tinytext DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `name_of_authority` text DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_role_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_mobile_number` bigint(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` tinytext DEFAULT NULL,
  `remote_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_approved` enum('A','P','R','F','O') NOT NULL DEFAULT 'P',
  `approval_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_roles`
--

CREATE TABLE `mst_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_roles`
--

INSERT INTO `mst_roles` (`role_id`, `role_name`, `is_active`, `is_deleted`, `created_on`, `modified_on`) VALUES
(1, 'Applicant', 'Y', 'N', '2020-04-04 16:47:44', '2020-04-04 16:47:44'),
(2, 'DA', 'Y', 'N', '2020-04-04 16:47:44', '2020-04-04 16:47:44'),
(3, 'Nodal Officer', 'Y', 'N', '2020-04-04 16:47:44', '2020-04-04 16:47:44'),
(4, 'Approver', 'Y', 'N', '2020-04-04 16:47:44', '2020-04-04 16:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `mst_social_media`
--

CREATE TABLE `mst_social_media` (
  `media_id` int(11) NOT NULL,
  `media_name` varchar(200) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_social_media`
--

INSERT INTO `mst_social_media` (`media_id`, `media_name`, `is_active`, `is_deleted`, `created_on`) VALUES
(1, 'WhatsApp', 'Y', 'N', '2020-04-05 11:04:04'),
(2, 'WhatsApp Group', 'Y', 'N', '2020-04-05 11:04:04'),
(3, 'YouTube', 'Y', 'N', '2020-04-05 11:04:04'),
(4, 'YouTube Channel', 'Y', 'N', '2020-04-05 11:04:04'),
(5, 'Facebook', 'Y', 'N', '2020-04-05 11:04:04'),
(6, 'Facebook Page', 'Y', 'N', '2020-04-05 11:04:04'),
(7, 'Twitter', 'Y', 'N', '2020-04-05 11:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `district_id` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_on` datetime NOT NULL DEFAULT current_timestamp(),
  `is_password_updated` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`user_id`, `user_name`, `user_full_name`, `email_id`, `password`, `auth_key`, `mobile_number`, `district_id`, `is_active`, `is_deleted`, `created_on`, `modified_on`, `is_password_updated`) VALUES
(1, 'amit62mishra', 'Anil Semwal', 'amit62mishra@gmail.com', '4d6aac801e3f143be92d99ebd3a290492994d638', '8486d6fda432f7050bb53bba51e1714b', 9418497722, 6, 'Y', 'N', '2020-03-27 17:18:40', '2020-03-27 17:18:40', 'N'),
(2, 'DA_Invest', 'Anil Semwal', 'da@nic.in', '4d6aac801e3f143be92d99ebd3a290492994d638', '8486d6fda432f7050bb53bba51e1714b', 9418497722, 6, 'Y', 'N', '2020-03-27 17:18:40', '2020-03-27 17:18:40', 'N'),
(3, 'nodal@shimla', 'Anonymous User', 'nodal@@nic.in', '4d6aac801e3f143be92d99ebd3a290492994d638', '8486d6fda432f7050bb53bba51e1714b', 9999999999, 6, 'Y', 'N', '2020-03-27 17:18:40', '2020-03-27 17:18:40', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_role_mapping`
--

CREATE TABLE `mst_user_role_mapping` (
  `map_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user_role_mapping`
--

INSERT INTO `mst_user_role_mapping` (`map_id`, `user_id`, `role_id`, `is_active`, `is_deleted`, `created_on`) VALUES
(1, 1, 1, 'Y', 'N', '2020-04-04 16:52:44'),
(2, 2, 2, 'Y', 'N', '2020-04-04 16:52:44'),
(3, 3, 3, 'Y', 'N', '2020-04-04 16:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_system`
--

CREATE TABLE `order_system` (
  `id` int(11) NOT NULL,
  `type_of_request` enum('transfer_adjustment','development_work','financial_assistance','complaint_inquiry','other') NOT NULL,
  `received_through` enum('letter','do_letter','email','others') NOT NULL,
  `concerned_department` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `applicant_name` varchar(225) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `constituency_detail_from` enum('Constituency from 1','Constituency from 2','Constituency from 3','Constituency from 4') NOT NULL,
  `constituency_detail_to` enum('Constituency To 1','Constituency To 2','Constituency To 3','Constituency To 4') NOT NULL,
  `issued_by` enum('Self-Request','XYZ','VIP','Others') NOT NULL,
  `letter_date` date DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `action_take` varchar(225) DEFAULT NULL,
  `document` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` int(10) NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_system`
--

INSERT INTO `order_system` (`id`, `type_of_request`, `received_through`, `concerned_department`, `subject`, `applicant_name`, `mobile_number`, `constituency_detail_from`, `constituency_detail_to`, `issued_by`, `letter_date`, `remark`, `action_take`, `document`, `created_at`, `updated_at`, `user_id`, `is_active`, `is_deleted`) VALUES
(1, 'development_work', '', 'gfdgfd', 'gdfgdf', 'gdfgdf', '9876543215', 'Constituency from 1', 'Constituency To 3', 'VIP', '2020-10-12', 'gfdgdf', NULL, '', '2020-07-20 09:56:38', '2020-07-20 09:56:38', 0, 'Y', 'N'),
(2, 'development_work', '', 'gfdgfd', 'gdfgdf', 'gdfgdf', '9876543215', 'Constituency from 1', 'Constituency To 3', 'VIP', '2020-10-12', 'gfdgdf', NULL, '', '2020-07-20 09:58:43', '2020-07-20 09:58:43', 0, 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `yii_process_flow`
--

CREATE TABLE `yii_process_flow` (
  `step_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(10) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `discription` text DEFAULT NULL,
  `step_action` text DEFAULT NULL,
  `web_action` text DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `sla_days` int(10) DEFAULT NULL,
  `available_after_sla` varchar(10) DEFAULT NULL,
  `can_update` varchar(10) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'A',
  `forward_action` varchar(255) DEFAULT NULL,
  `disp_order` int(10) DEFAULT NULL,
  `in_inbox` int(10) DEFAULT NULL,
  `office_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yii_process_flow`
--

INSERT INTO `yii_process_flow` (`step_id`, `service_id`, `name`, `discription`, `step_action`, `web_action`, `role_id`, `sla_days`, `available_after_sla`, `can_update`, `updated`, `created`, `status`, `forward_action`, `disp_order`, `in_inbox`, `office_id`) VALUES
(1, 1, 'Application Submit', 'user submit application by Fill Form', 'Application Submission', 'ordersystem/apply', NULL, 15, 'n', 'n', '2020-07-20 06:25:46', '2020-07-20 06:25:46', '1', NULL, 1, 1, NULL),
(2, 1, 'Application is forwarded to DA', 'Application is forwarded to DA', 'Application is forwarded to DA', 'department/inbox', NULL, 15, 'n', 'n', '2020-07-20 06:25:46', '2020-07-20 06:25:46', '1', NULL, 1, 1, NULL),
(3, 1, 'forwarded to Nodal officer', 'then forwarded to Nodal officer after\r\nscrutiny of the application by DA ', 'forwarded to Nodal officer', 'department/inbox', NULL, 15, 'n', 'n', '2020-07-20 06:25:46', '2020-07-20 06:25:46', '1', NULL, 1, 1, NULL),
(4, 1, 'forwarded to Approver for Remarks', 'forwarded to Approver for Remarks', 'forwarded to Approver', 'department/inbox', NULL, 15, 'n', 'n', '2020-07-20 06:25:46', '2020-07-20 06:25:46', '1', NULL, 1, 1, NULL),
(5, 1, 'forwarded for final approval ', 'forwarded for final approval ', 'forwarded to Approver for final approval ', 'department/inbox', NULL, 15, 'n', 'n', '2020-07-20 06:25:46', '2020-07-20 06:25:46', '1', NULL, 1, 1, NULL),
(6, 1, 'generate the final copy of letter and send back to applicant', 'generate the final copy of letter and send back to applicant', 'generate the final copy of letter and send back to applicant', 'department/inbox', NULL, 15, 'n', 'n', '2020-07-20 06:25:46', '2020-07-20 06:25:46', '1', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `yii_process_flow_steps`
--

CREATE TABLE `yii_process_flow_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `process_step_id` int(10) DEFAULT NULL,
  `next_process_id` int(10) DEFAULT NULL,
  `label` text DEFAULT NULL,
  `history_label` text DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yii_process_flow_steps`
--

INSERT INTO `yii_process_flow_steps` (`id`, `process_step_id`, `next_process_id`, `label`, `history_label`, `created`) VALUES
(1, 1, 2, 'application submited', 'application submited', '2020-07-20 08:35:21'),
(2, 2, 3, 'Application is forwarded to DA', 'Application is forwarded to DA', '2020-07-20 08:35:21'),
(3, 3, 4, 'forwarded to Nodal officer', 'forwarded to Nodal officer', '2020-07-20 08:36:20'),
(4, 4, 5, 'Forwarded to Approver for Remarks', 'Forwarded to Approver for Remarks', '2020-07-20 08:36:59'),
(5, 5, 6, 'forwarded for final approval', 'forwarded for final approval', '2020-07-20 08:36:59'),
(6, 6, 7, 'generate the final copy of letter and send back to applicant', 'generate the final copy of letter and send back to applicant', '2020-07-20 08:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `yii_services`
--

CREATE TABLE `yii_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `services` varchar(500) DEFAULT NULL,
  `short_name` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `service_model` varchar(255) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `validity_in_months` int(2) DEFAULT NULL,
  `is_multiple` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yii_services`
--

INSERT INTO `yii_services` (`id`, `services`, `short_name`, `department`, `time_limit`, `service_model`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`, `validity_in_months`, `is_multiple`) VALUES
(1, 'Order System', 'order_system', 'Order System', 30, 'OrderSystem', '1', '2020-07-20 06:09:20', '2020-07-20 11:39:20', NULL, 'A', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_district`
--
ALTER TABLE `mst_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `mst_notifications`
--
ALTER TABLE `mst_notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `created_by_role_id` (`created_by_role_id`),
  ADD KEY `notification_district` (`notification_district`);

--
-- Indexes for table `mst_roles`
--
ALTER TABLE `mst_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `mst_social_media`
--
ALTER TABLE `mst_social_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `mst_user_role_mapping`
--
ALTER TABLE `mst_user_role_mapping`
  ADD PRIMARY KEY (`map_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `order_system`
--
ALTER TABLE `order_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yii_process_flow`
--
ALTER TABLE `yii_process_flow`
  ADD PRIMARY KEY (`step_id`),
  ADD UNIQUE KEY `step_id` (`step_id`);

--
-- Indexes for table `yii_process_flow_steps`
--
ALTER TABLE `yii_process_flow_steps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `yii_services`
--
ALTER TABLE `yii_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_district`
--
ALTER TABLE `mst_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mst_notifications`
--
ALTER TABLE `mst_notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_roles`
--
ALTER TABLE `mst_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_social_media`
--
ALTER TABLE `mst_social_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_user_role_mapping`
--
ALTER TABLE `mst_user_role_mapping`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_system`
--
ALTER TABLE `order_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `yii_process_flow`
--
ALTER TABLE `yii_process_flow`
  MODIFY `step_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `yii_process_flow_steps`
--
ALTER TABLE `yii_process_flow_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `yii_services`
--
ALTER TABLE `yii_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mst_notifications`
--
ALTER TABLE `mst_notifications`
  ADD CONSTRAINT `mst_notifications_ibfk_1` FOREIGN KEY (`notification_district`) REFERENCES `mst_district` (`district_id`),
  ADD CONSTRAINT `mst_notifications_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `mst_user` (`user_id`),
  ADD CONSTRAINT `mst_notifications_ibfk_3` FOREIGN KEY (`created_by_role_id`) REFERENCES `mst_roles` (`role_id`);

--
-- Constraints for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD CONSTRAINT `mst_user_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `mst_district` (`district_id`);

--
-- Constraints for table `mst_user_role_mapping`
--
ALTER TABLE `mst_user_role_mapping`
  ADD CONSTRAINT `mst_user_role_mapping_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `mst_user` (`user_id`),
  ADD CONSTRAINT `mst_user_role_mapping_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `mst_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
