-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 04:59 PM
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
  `id_activity` int(10) NOT NULL,
  `id_jobassignment` int(10) DEFAULT NULL,
  `name` char(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `startTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finishTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `information` text,
  `komputer` varchar(5) DEFAULT NULL,
  `fileLocation` varchar(100) DEFAULT NULL,
  `fileBackupLocation` varchar(100) DEFAULT NULL,
  `uploadFile` varchar(100) DEFAULT NULL,
  `commentByManager` text,
  `commentByClient` text
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
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `name`, `phone`, `email`, `address`) VALUES
(3, 'PT. Multipolar Technology, Tbk.', '+6255 777 000', 'center@multipolar.com', 'BeritaSatu Plaza, Gatot Subroto, Jakarta Selatan.'),
(4, 'PT Maju Kena', '12308', 'majukena@mail.com', 'Jalan Kaliurang'),
(6, 'PT Benteng', '123987', 'mail@benteng.com', 'jalan kaliurang km 10'),
(7, 'PT Sembarangan', '120398', 'mail@sembarangan.com', 'jalan disana');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `phone`, `id_user`, `id_company`) VALUES
(2, 'Alpha', '098234678123', 3, 3),
(3, 'Naqi', '213987', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `id_crew` int(10) NOT NULL,
  `id_project` int(10) DEFAULT NULL,
  `id_status` int(10) DEFAULT NULL,
  `id_staff` int(10) NOT NULL,
  `status_permintaan` enum('Belum','Terima','Tolak') NOT NULL,
  `fee` double DEFAULT NULL,
  `paymentDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew`
--

INSERT INTO `crew` (`id_crew`, `id_project`, `id_status`, `id_staff`, `status_permintaan`, `fee`, `paymentDate`) VALUES
(1, 1, 1, 3, 'Terima', 500000, NULL),
(2, 4, 1, 5, 'Terima', 5000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `debt`
--

CREATE TABLE `debt` (
  `id_debt` int(11) NOT NULL,
  `status` enum('borrow','return') NOT NULL,
  `id_staf` int(11) NOT NULL,
  `id_saving` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id_job` int(10) NOT NULL,
  `name` char(100) DEFAULT NULL,
  `fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id_job`, `name`, `fee`) VALUES
(1, 'film', 40000),
(2, 'video', 50000),
(3, 'iklan', 60000),
(4, 'poster', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `jobassignment`
--

CREATE TABLE `jobassignment` (
  `id_jobassignment` int(10) NOT NULL,
  `id_job` int(10) DEFAULT NULL,
  `id_crew` int(10) DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `information` text,
  `acceptanceDate` datetime DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `reviewDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `dealTime` date NOT NULL,
  `price` int(30) NOT NULL,
  `deadline` date NOT NULL,
  `revisionDeadline` date NOT NULL,
  `status` enum('on_process','done','canceled','') NOT NULL DEFAULT 'on_process',
  `DP` int(80) DEFAULT NULL,
  `id_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `name`, `dealTime`, `price`, `deadline`, `revisionDeadline`, `status`, `DP`, `id_contact`) VALUES
(1, 'Proyek Tengkorak 1', '2017-12-05', 10000000, '2017-12-28', '2017-12-31', 'on_process', 2000000, 2),
(4, 'Tengkulak', '2017-12-08', 12000000, '2017-12-20', '2017-12-29', 'on_process', 6000000, 3),
(6, 'Lorem Ipsum', '0000-00-00', 12000, '2018-01-06', '2018-01-27', 'on_process', 6000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `projectoffer`
--

CREATE TABLE `projectoffer` (
  `id_projectOffer` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `status_offer` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectoffer`
--

INSERT INTO `projectoffer` (`id_projectOffer`, `id_project`, `id_staff`, `status_offer`) VALUES
(1, 6, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projecttype`
--

CREATE TABLE `projecttype` (
  `id_projectType` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projecttype`
--

INSERT INTO `projecttype` (`id_projectType`, `id_project`, `id_type`) VALUES
(3, 5, 3),
(4, 5, 4),
(5, 6, 1),
(6, 6, 2),
(7, 4, 1),
(8, 4, 2),
(9, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id_skill` int(10) NOT NULL,
  `skill_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id_skill`, `skill_name`) VALUES
(1, 'Edit fotos'),
(3, 'Animating'),
(4, 'Videography');

-- --------------------------------------------------------

--
-- Table structure for table `skillmapping`
--

CREATE TABLE `skillmapping` (
  `id_skillMapping` int(11) NOT NULL,
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
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status_account` enum('active','inactive','','') NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `id_user`, `name`, `address`, `phone`, `status_account`, `photo`) VALUES
(1, 2, 'Ikhsan', 'Tangerang', '026543216888', 'active', ''),
(2, 1, 'Muhammad Saefulloh', 'Kediri', '123', 'active', ''),
(3, 4, 'Yola', 'Jogja', '120397124', 'active', ''),
(4, 7, 'Havil Wintas Ernanda', '', '', 'active', ''),
(5, 8, 'Asti Nugraheni', '', '', 'active', ''),
(6, 9, 'Fadhilah Herawati', '', '', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `id_tool` int(11) NOT NULL,
  `tool_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`id_tool`, `tool_name`) VALUES
(1, 'Blender'),
(2, 'Adobe Premiere'),
(3, 'Adobe Photoshop'),
(4, 'CorelDRAW'),
(6, 'Skechtup');

-- --------------------------------------------------------

--
-- Table structure for table `toolskill`
--

CREATE TABLE `toolskill` (
  `id_toolskill` int(10) NOT NULL,
  `id_skill` int(10) NOT NULL,
  `id_tool` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toolskill`
--

INSERT INTO `toolskill` (`id_toolskill`, `id_skill`, `id_tool`) VALUES
(1, 1, 3),
(3, 3, 2),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `name`) VALUES
(1, 'Films'),
(2, 'Animasi'),
(3, 'Modelling'),
(4, 'Iklan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `id_user_role`) VALUES
(1, 'Ipul', 'ipul@gmail.com', 'ipul', 2),
(2, 'Ikhsan', 'ikhsan@gmail.com', 'ikhsan', 1),
(3, 'Agi', 'agi@gmail.com', 'agi', 4),
(4, 'Yola', 'yola', 'yola@gmail.com', 3),
(5, 'Naqiya Zorahima', 'naqiyazorahima@gmail.com', '1234', 4),
(6, 'al', 'al@mail.com', '1234', 4),
(7, 'Havil Wintas Ernanda', 'havil@mail.com', 'havil123', 3),
(8, 'Asti Nugraheni', 'asti@mail.com', '1234', 3),
(9, 'Fadhilah Herawati', 'hera@mail.com', '1234', 3),
(10, 'Naqi', 'nqy@mail.com', '1234', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(1) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `user_role`) VALUES
(1, 'Manager Vokasi Studio'),
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
  ADD KEY `jaa1` (`id_jobassignment`);

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
  ADD KEY `id_company` (`id_company`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`id_crew`),
  ADD KEY `pc1` (`id_project`),
  ADD KEY `cs1` (`id_status`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`id_debt`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `jobassignment`
--
ALTER TABLE `jobassignment`
  ADD PRIMARY KEY (`id_jobassignment`),
  ADD KEY `idjob` (`id_job`),
  ADD KEY `id_crew` (`id_crew`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `projectoffer`
--
ALTER TABLE `projectoffer`
  ADD PRIMARY KEY (`id_projectOffer`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `projecttype`
--
ALTER TABLE `projecttype`
  ADD PRIMARY KEY (`id_projectType`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id_skill`);

--
-- Indexes for table `skillmapping`
--
ALTER TABLE `skillmapping`
  ADD PRIMARY KEY (`id_skillMapping`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`id_tool`);

--
-- Indexes for table `toolskill`
--
ALTER TABLE `toolskill`
  ADD PRIMARY KEY (`id_toolskill`),
  ADD KEY `id_tool` (`id_tool`),
  ADD KEY `id_skill` (`id_skill`);

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
  MODIFY `id_activity` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crew`
--
ALTER TABLE `crew`
  MODIFY `id_crew` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `debt`
--
ALTER TABLE `debt`
  MODIFY `id_debt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobassignment`
--
ALTER TABLE `jobassignment`
  MODIFY `id_jobassignment` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projectoffer`
--
ALTER TABLE `projectoffer`
  MODIFY `id_projectOffer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projecttype`
--
ALTER TABLE `projecttype`
  MODIFY `id_projectType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id_skill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skillmapping`
--
ALTER TABLE `skillmapping`
  MODIFY `id_skillMapping` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `id_tool` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toolskill`
--
ALTER TABLE `toolskill`
  MODIFY `id_toolskill` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `crew`
--
ALTER TABLE `crew`
  ADD CONSTRAINT `crew_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crew_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projectoffer`
--
ALTER TABLE `projectoffer`
  ADD CONSTRAINT `projectoffer_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projectoffer_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `staff` (`id_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `toolskill`
--
ALTER TABLE `toolskill`
  ADD CONSTRAINT `tss1` FOREIGN KEY (`id_skill`) REFERENCES `skill` (`id_skill`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tst1` FOREIGN KEY (`id_tool`) REFERENCES `tool` (`id_tool`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_role`) REFERENCES `user_role` (`id_user_role`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
