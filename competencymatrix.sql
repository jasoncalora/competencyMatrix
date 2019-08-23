-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 11:27 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `competencymatrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `competency_records`
--

CREATE TABLE `competency_records` (
  `rec_id` int(6) NOT NULL,
  `emp_id` int(6) DEFAULT NULL,
  `comp_id` int(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `data` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competency_records`
--

INSERT INTO `competency_records` (`rec_id`, `emp_id`, `comp_id`, `date`, `data`) VALUES
(1, 1, 1, '2019-08-16', '{ \"1\": 5, \"2\": 4 , \"3\": 2 , \"4\": 5, \"5\": 3, \"6\": 5}'),
(2, 1, 1, '2019-06-11', '{ \"1\":5, \"2\":5, \"3\":3, \"4\":1,\"5\":4, \"6\":5, \"7\":3, \"8\":1, \"9\":2, \"10\":2, \"11\":3, \"12\":4, \"13\":5, \"14\":4, \"15\":5, \"16\":3, \"17\":5, \"18\":6 }');

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `emp_id` int(6) NOT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `emp_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`emp_id`, `emp_name`, `emp_status`) VALUES
(1, 'Jason Calora', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `core_competencies`
--

CREATE TABLE `core_competencies` (
  `core_id` int(6) NOT NULL,
  `core_title` varchar(50) DEFAULT NULL,
  `core_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_competencies`
--

INSERT INTO `core_competencies` (`core_id`, `core_title`, `core_desc`) VALUES
(1, 'SQL', 'structured Query Language');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(6) NOT NULL,
  `group_id` int(6) DEFAULT NULL,
  `skill_name` varchar(150) DEFAULT NULL,
  `skill_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `group_id`, `skill_name`, `skill_desc`) VALUES
(1, 1, 'Create and alter tables', 'Create and alter tables'),
(2, 1, 'Create and alter views', 'Create and alter views'),
(3, 1, 'Create and alter indexes', 'Create and alter indexes'),
(4, 1, 'Create and modify constraints', 'Create and modify constraints'),
(5, 1, 'Implement data types', 'Implement data types'),
(6, 1, 'Implement partitioning solutions', 'Implement partitioning solutions'),
(7, 2, 'Create and alter stored procedures', 'Create and alter stored procedures'),
(8, 2, 'Create and alter user-defined functions (UDFs)', 'Create and alter user-defined functions (UDFs)'),
(9, 2, 'Create and alter DML triggers', 'Create and alter DML triggers'),
(10, 2, 'Create and alter DDL triggers', 'Create and alter DDL triggers'),
(11, 2, 'Create and deploy CLR-based objects', 'Create and deploy CLR-based objects'),
(12, 2, 'Implement error handling', 'Implement error handling'),
(13, 2, 'Manage transactions', 'Manage transactions'),
(14, 3, 'Query data by using SELECT statements', 'Query data by using SELECT statements'),
(15, 3, 'Modify data by using INSERT, UPDATE, and DELETE statements', 'Modify data by using INSERT, UPDATE, and DELETE statements'),
(16, 3, 'Return data by using the OUTPUT clause', 'Return data by using the OUTPUT clause'),
(17, 3, 'Modify data by using MERGE statements', 'Modify data by using MERGE statements'),
(18, 3, 'Implement aggregate queries', 'Implement aggregate queries'),
(19, 3, 'Combine datasets', 'Combine datasets'),
(20, 3, 'Apply built-in scalar functions', 'Apply built-in scalar functions'),
(21, 4, 'Implement subqueries', 'Implement subqueries'),
(22, 4, 'Implement CTE (common table expression) queries', 'Implement CTE (common table expression) queries'),
(23, 4, 'Apply ranking functions', 'Apply ranking functions'),
(24, 4, 'Control execution plans', 'Control execution plans'),
(25, 4, 'Manage international considerations', 'Manage international considerations'),
(26, 5, 'Integrate Database Mail', 'Integrate Database Mail'),
(27, 5, 'Implement full-text search', 'Implement full-text search'),
(28, 5, 'Implement Service Broker solutions', 'Implement Service Broker solutions'),
(29, 5, 'Track data changes', 'Track data changes'),
(30, 6, 'Capture execution plans', 'Capture execution plans'),
(31, 6, 'Gather trace information by using the SQL Server Profiler', 'Gather trace information by using the SQL Server Profiler'),
(32, 6, 'Collect output from the Database Engine Tuning Advisor', 'Collect output from the Database Engine Tuning Advisor'),
(33, 6, 'Collect information from system metadata', 'Collect information from system metadata');

-- --------------------------------------------------------

--
-- Table structure for table `skill_group`
--

CREATE TABLE `skill_group` (
  `group_id` int(6) NOT NULL,
  `core_id` int(6) DEFAULT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `percentage` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_group`
--

INSERT INTO `skill_group` (`group_id`, `core_id`, `group_name`, `percentage`) VALUES
(1, 1, 'Implementing Tables and Views', 20),
(2, 1, 'Implementing Programming Objects', 20),
(3, 1, 'Working with Query Fundamentals', 15),
(4, 1, 'Applying Additional Query Techniques', 15),
(5, 1, 'Working with Additional SQL Server Components ', 15),
(6, 1, 'Gathering Performance Information', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competency_records`
--
ALTER TABLE `competency_records`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `core_competencies`
--
ALTER TABLE `core_competencies`
  ADD PRIMARY KEY (`core_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `skill_group`
--
ALTER TABLE `skill_group`
  ADD PRIMARY KEY (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competency_records`
--
ALTER TABLE `competency_records`
  MODIFY `rec_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `emp_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_competencies`
--
ALTER TABLE `core_competencies`
  MODIFY `core_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `skill_group`
--
ALTER TABLE `skill_group`
  MODIFY `group_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
