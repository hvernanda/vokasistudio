-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2017 at 08:59 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vokasistudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `file_location` varchar(255) NOT NULL,
  `file_backup_location` varchar(255) NOT NULL,
  `komputer` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `finish_time` datetime NOT NULL,
  `comment_by_manager` text NOT NULL,
  `comment_by_client` text NOT NULL,
  `id_job_assignment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `name`, `phone`, `email`, `address`) VALUES
(1, 'Maju Makmur, Inc.', '1230982', 'majumakmur@mail.com', 'Jalan Maju Makmur Jaya Sentosa');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `phone`, `id_user`, `id_company`) VALUES
(1, '210398', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `id_crew` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `payment_date` datetime NOT NULL,
  `id_staff` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_crew_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crew_role`
--

CREATE TABLE `crew_role` (
  `id_crew_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew_role`
--

INSERT INTO `crew_role` (`id_crew_role`, `name`) VALUES
(1, 'Manajer Proyek'),
(2, 'Staff Keuangan Proyek'),
(3, 'Crew');

-- --------------------------------------------------------

--
-- Table structure for table `debt`
--

CREATE TABLE `debt` (
  `id_debt` int(11) NOT NULL,
  `status` enum('borrow','return','','') NOT NULL,
  `id_staff` int(11) NOT NULL,
  `id_finance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id_finance` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `ammount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `information` text NOT NULL,
  `id_staff` int(11) NOT NULL,
  `id_savings` int(11) NOT NULL,
  `id_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id_job` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobassignment`
--

CREATE TABLE `jobassignment` (
  `id_job_assignment` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `review_date` datetime NOT NULL,
  `acceptance_date` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `information` text NOT NULL,
  `id_crew` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dealtime` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  `revision_deadline` datetime NOT NULL,
  `status` enum('on process','done','canceled','') NOT NULL DEFAULT 'on process',
  `DP` int(11) DEFAULT NULL,
  `id_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `name`, `dealtime`, `price`, `deadline`, `revision_deadline`, `status`, `DP`, `id_contact`) VALUES
(1, 'Film Tengkulak', '0000-00-00 00:00:00', 12000, '2017-12-28 00:00:00', '2018-01-25 00:00:00', 'on process', 6000, 1),
(2, 'Film Nelayan', '0000-00-00 00:00:00', 30000, '2017-12-29 00:00:00', '2018-01-19 00:00:00', 'on process', 15000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projectoffer`
--

CREATE TABLE `projectoffer` (
  `id_project_offer` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `status_offer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectoffer`
--

INSERT INTO `projectoffer` (`id_project_offer`, `id_project`, `id_staff`, `status_offer`) VALUES
(1, 1, 2, -1),
(2, 2, 2, 0),
(3, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projecttype`
--

CREATE TABLE `projecttype` (
  `id_project_type` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projecttype`
--

INSERT INTO `projecttype` (`id_project_type`, `id_project`, `id_type`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id_savings` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ammount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id_skill` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id_skill`, `skill_name`) VALUES
(1, 'Editing Video');

-- --------------------------------------------------------

--
-- Table structure for table `skillmapping`
--

CREATE TABLE `skillmapping` (
  `id_skill_mapping` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status_account` enum('active','inactive','','') NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `id_user`, `address`, `phone`, `status_account`, `photo`) VALUES
(1, 1, 'Jalan Lorem Ipsum Dolorsit Amet', '081123124', 'active', ''),
(2, 2, '', '', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `id_tool` int(11) NOT NULL,
  `tool_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`id_tool`, `tool_name`) VALUES
(1, 'Adobe Premiere'),
(2, 'Sony Vegas');

-- --------------------------------------------------------

--
-- Table structure for table `toolskill`
--

CREATE TABLE `toolskill` (
  `id_tool_skill` int(11) NOT NULL,
  `id_skill` int(11) NOT NULL,
  `id_tool` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toolskill`
--

INSERT INTO `toolskill` (`id_tool_skill`, `id_skill`, `id_tool`) VALUES
(1, 1, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `visibility` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `name`, `visibility`) VALUES
(1, 'Film', '0'),
(2, 'Iklan', '0'),
(3, 'Company Profile', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `name`, `password`, `id_user_role`) VALUES
(1, 'ikhsan@gmail.com', 'Ikhsan', '4e9194a3bb65ab53e41247480905c391', 1),
(2, 'naqiya@gmail.com', 'Naqiya Zorahima', 'd3f90cfcc35acbfc676be1aba1f107ee', 3),
(3, 'steven@maju.com', 'Steven Gerard', '6ed61d4b80bb0f81937b32418e98adca', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `user_role`) VALUES
(1, 'Manajer Vokasi'),
(2, 'Staff Keuangan'),
(3, 'Staff'),
(4, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `activity_ibfk_1` (`id_job_assignment`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`),
  ADD KEY `contact_ibfk_1` (`id_user`),
  ADD KEY `company_ibfk_1` (`id_company`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`id_crew`),
  ADD KEY `crew_ibfk_2` (`id_crew_role`),
  ADD KEY `crew_ibfk_3` (`id_project`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `crew_role`
--
ALTER TABLE `crew_role`
  ADD PRIMARY KEY (`id_crew_role`);

--
-- Indexes for table `debt`
--
ALTER TABLE `debt`
  ADD KEY `id_finance` (`id_finance`),
  ADD KEY `debt_ibfk_1` (`id_staff`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id_finance`),
  ADD KEY `id_staff` (`id_staff`),
  ADD KEY `id_saving` (`id_savings`),
  ADD KEY `id_activity` (`id_activity`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `jobassignment`
--
ALTER TABLE `jobassignment`
  ADD PRIMARY KEY (`id_job_assignment`),
  ADD KEY `jobassignment_ibfk_1` (`id_crew`),
  ADD KEY `jobassignment_ibfk_2` (`id_job`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `project_ibfk_1` (`id_contact`);

--
-- Indexes for table `projectoffer`
--
ALTER TABLE `projectoffer`
  ADD PRIMARY KEY (`id_project_offer`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `projecttype`
--
ALTER TABLE `projecttype`
  ADD PRIMARY KEY (`id_project_type`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_type` (`id_type`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id_savings`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Indexes for table `skillmapping`
--
ALTER TABLE `skillmapping`
  ADD PRIMARY KEY (`id_skill_mapping`),
  ADD KEY `skillmapping_ibfk_2` (`id_skill`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `staff_ibfk_1` (`id_user`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`id_tool`);

--
-- Indexes for table `toolskill`
--
ALTER TABLE `toolskill`
  ADD PRIMARY KEY (`id_tool_skill`),
  ADD KEY `toolskill_ibfk_1` (`id_tool`),
  ADD KEY `toolskill_ibfk_2` (`id_skill`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_role` (`id_user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crew`
--
ALTER TABLE `crew`
  MODIFY `id_crew` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crew_role`
--
ALTER TABLE `crew_role`
  MODIFY `id_crew_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id_finance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobassignment`
--
ALTER TABLE `jobassignment`
  MODIFY `id_job_assignment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projectoffer`
--
ALTER TABLE `projectoffer`
  MODIFY `id_project_offer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projecttype`
--
ALTER TABLE `projecttype`
  MODIFY `id_project_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id_savings` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skillmapping`
--
ALTER TABLE `skillmapping`
  MODIFY `id_skill_mapping` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `id_tool` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `toolskill`
--
ALTER TABLE `toolskill`
  MODIFY `id_tool_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`id_job_assignment`) REFERENCES `jobassignment` (`id_job_assignment`) ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `crew`
--
ALTER TABLE `crew`
  ADD CONSTRAINT `crew_ibfk_2` FOREIGN KEY (`id_crew_role`) REFERENCES `crew_role` (`id_crew_role`) ON UPDATE CASCADE,
  ADD CONSTRAINT `crew_ibfk_3` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON UPDATE CASCADE,
  ADD CONSTRAINT `crew_ibfk_4` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON UPDATE CASCADE;

--
-- Constraints for table `debt`
--
ALTER TABLE `debt`
  ADD CONSTRAINT `debt_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON UPDATE CASCADE,
  ADD CONSTRAINT `debt_ibfk_2` FOREIGN KEY (`id_finance`) REFERENCES `finance` (`id_finance`) ON UPDATE CASCADE;

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_ibfk_1` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `finance_ibfk_3` FOREIGN KEY (`id_activity`) REFERENCES `activity` (`id_activity`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `finance_ibfk_4` FOREIGN KEY (`id_savings`) REFERENCES `savings` (`id_savings`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobassignment`
--
ALTER TABLE `jobassignment`
  ADD CONSTRAINT `jobassignment_ibfk_1` FOREIGN KEY (`id_crew`) REFERENCES `crew` (`id_crew`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jobassignment_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `job` (`id_job`) ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `contact` (`id_contact`) ON UPDATE CASCADE;

--
-- Constraints for table `projectoffer`
--
ALTER TABLE `projectoffer`
  ADD CONSTRAINT `projectoffer_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `projectoffer_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON UPDATE CASCADE;

--
-- Constraints for table `projecttype`
--
ALTER TABLE `projecttype`
  ADD CONSTRAINT `projecttype_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `projecttype_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Constraints for table `skillmapping`
--
ALTER TABLE `skillmapping`
  ADD CONSTRAINT `skillmapping_ibfk_2` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON UPDATE CASCADE,
  ADD CONSTRAINT `skillmapping_ibfk_3` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `toolskill`
--
ALTER TABLE `toolskill`
  ADD CONSTRAINT `toolskill_ibfk_1` FOREIGN KEY (`id_tool`) REFERENCES `tool` (`id_tool`) ON UPDATE CASCADE,
  ADD CONSTRAINT `toolskill_ibfk_2` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_role`) REFERENCES `user_role` (`id_user_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
