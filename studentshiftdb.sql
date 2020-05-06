-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2020 at 03:58 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentshift`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentshiftdb`
--

DROP TABLE IF EXISTS `studentshiftdb`;
CREATE TABLE IF NOT EXISTS `studentshiftdb` (
  `StudentID` int(5) UNSIGNED NOT NULL DEFAULT 0,
  `Graduation_Date` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `Employment` date DEFAULT NULL,
  `School_Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Company_Name` varchar(50) DEFAULT NULL,
  `Job_Title_Area_of_Study` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Job_Type` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Major` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Minor` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `GPA` decimal(2,1) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentshiftdb`
--

INSERT INTO `studentshiftdb` (`StudentID`, `Graduation_Date`, `Employment`, `School_Name`, `Company_Name`, `Job_Title_Area_of_Study`, `Job_Type`, `Major`, `Minor`, `GPA`, `Salary`) VALUES
(0, 'May, 1996', '1996-06-01', 'Deloitte', '', 'Content editor', 'Corporate', 'Marketing', 'Management', '3.6', 45000),
(1, 'May, 2016', '2016-08-01', 'Conagra', '', 'Machinist ', 'Corporate', 'Mechanical Engineering', NULL, '3.0', 42000),
(2, 'May, 2005', '2006-02-01', 'TruGreen', '', 'Placement director', 'Corporate', 'Management ', NULL, '2.7', 38000),
(3, 'December, 2013', '2013-03-01', 'DraftKings', '', 'App Development', 'Corporate', 'Computer Science', NULL, '3.2', 55000),
(4, 'May, 2003', '2003-05-01', 'Merril Lynch', '', 'Credit investigator', 'Corporate', 'Economics/Finance', NULL, '3.8', 50000),
(5, 'May, 1985', '1985-08-01', 'Herr Foods', '', 'Machinist', 'Corporate', 'Mechanical Engineering', NULL, '2.9', 55000),
(6, 'May, 2014', '2014-08-01', 'Georgia Tech', '', 'Electrical Engineering', 'Grad School', 'Computer Science', 'Mathematics', '4.0', NULL),
(7, 'May, 2013', '2014-01-01', 'Lehigh Univeristy ', '', 'MBA', 'Grad School', 'Economics/Finance', NULL, '3.9', NULL),
(8, 'May, 2009', '2009-08-01', 'Stanford', '', 'Computer Science', 'Grad School', 'Electrical Engineering', 'Mathematics', '4.0', NULL),
(9, 'May, 2011', '2011-09-01', 'ACLU', '', 'Paralegal', 'Non-Profit', 'Philosophy', 'English', '3.7', 44000),
(10, 'December, 2007', '2007-01-01', 'American Red Cross', '', 'Nurse', 'Non-Profit', 'Nursing', NULL, '3.8', 40000),
(11, 'May, 2017', '2017-06-01', 'Meritus Medical Center', '', 'trauma nurse', 'Corporate', 'Nursing', NULL, '3.4', 55000),
(12, ' May, 2013', '2013-05-01', 'Tesla', '', 'Robotics Engineer', 'Corporate', 'Electrical Engineering/Computer Science', NULL, '4.0', 65000),
(13, 'May, 2019', '2019-08-01', 'Robert Morris University', '', 'Mathematics', 'Grad School', 'Computer Science', NULL, '4.0', NULL),
(14, 'May, 2007', '2017-07-01', 'US Government', '', 'Secret Service Agent', 'Government', 'Criminal Justice', NULL, '4.0', 48000),
(15, 'May, 2010', '2010-05-01', 'Omnicon Group', '', 'Multi-media Marketing', 'Corporate', 'Marketing', 'Media Arts & Design', '3.2', 44000),
(16, 'May, 2019', '2019-08-01', 'Sheppard Pratt', '', 'Pschiatric Nursing assistant', 'Corporate', 'Nursing', 'Psychology', '3.4', 48000),
(17, 'May, 2005', '2005-09-01', 'RoosterBio', '', 'Assurance Technician', 'Corporate', 'Management ', 'Biology', '3.5', 50000),
(18, 'December, 2006', '2008-01-01', 'VTech', '', 'Purchasing Director', 'Corporate', 'English', NULL, '3.0', 35000),
(19, 'May, 2003', '2003-09-01', 'Atlantic Real Estate', '', 'Market and Survey Researcher', 'Corporate', 'Finance', NULL, '3.2', 40000),
(20, 'May, 2014', '2014-05-01', 'US Army', '', 'Public Health Engineering', 'Government', 'Biology', 'ROTC', '3.5', 45000),
(21, 'May, 2007', '2007-09-01', 'Charles County Public Schools', '', 'Guidance Counselor', 'Government', 'Secondary Education', NULL, '3.3', 38000),
(22, 'May, 2014', '2014-10-01', 'Ruppert Landscaping', '', 'Office Coordinator', 'Corporate', 'Management ', NULL, '2.8', 35000),
(23, 'May, 2011', '2011-10-01', 'US Postal Service', '', 'Linux System Admin', 'Government', 'Computer Science', NULL, '3.2', 55000),
(24, 'May, 2009', '2009-05-01', 'US Army', '', 'Cyber Command', 'Government', 'Computer Science', 'Mathematics', '3.9', 55000),
(25, 'May, 2005', '2005-07-01', 'JP Morgan', '', 'Junior Financial Officer', 'Corporate', 'Finance', 'Economics', '3.8', 60000),
(26, 'May, 2006', '2006-08-01', 'Penn State Law', '', 'Law', 'Grad School', 'History', 'English ', '4.0', NULL),
(27, 'May, 2016', '2016-09-01', 'Allergan', '', 'Chemist ', 'Corporate', 'Chemistry', 'Biology', '3.5', 55000),
(28, 'December, 2004', '2004-04-01', 'United Healthcare', '', 'Actuary ', 'Corporate', 'Finance', NULL, '3.4', 50000),
(29, 'December, 2007', '2007-05-01', 'Wells Fargo', '', 'Human Resources', 'Corporate', 'English', NULL, '3.4', 43000),
(30, 'May, 2005', '2005-08-01', 'University Of Virginia', '', 'MBA', 'Grad School', 'Economics', 'Management', '4.0', NULL),
(32, 'May, 2013', '2013-05-01', 'NSA', '', 'Encryption Analyst', 'Government', 'Computer Science', NULL, '4.0', 65000),
(33, 'December, 2004', '2004-02-01', 'NASA', '', 'Mission Control Analyst', 'Corporate', 'Physics', 'Computer Science', '4.0', 60000),
(34, 'May, 2006', '2006-09-01', 'Booz Allen Hamilton', '', 'Cyber Security Analyst', 'Corporate', 'Computer Science', 'Cyber Security', '3.7', 60000),
(35, 'December, 2005', '2005-01-01', 'Cal Berkeley University', '', 'Physics', 'Grad School', 'Mathematics', 'Computer Science', '4.0', NULL),
(36, 'May, 2014', '2014-08-01', 'Enviroscience', '', 'Inspection Agent', 'Corporate', 'Environmental Science', NULL, '3.5', 50000),
(37, 'May, 2016', '2016-07-01', 'Lockheed Martin', '', 'Aerospace Engineer', 'Corporate', 'Mechanical Engineering/Physics', NULL, '3.7', 70000),
(38, 'May, 2006', '2006-06-01', 'AOPA', '', 'Risk Analyst', 'Corporate', 'Mathematics/Computer Science', NULL, '3.6', 55000),
(39, 'December, 2016', '2016-05-01', 'Vertex Pharmaceuticals ', '', 'Chemical Engineer', 'Corporate', 'Chemistry', NULL, '3.2', 48000),
(40, 'May, 2017', '2017-10-01', 'Amazon Web Services', '', 'Cloud Engineer', 'Corporate', 'Computer Science', NULL, '3.8', 60000),
(41, 'May, 2016', '2016-06-01', 'Habitat For Humanity ', '', 'Project Manager', 'Non-Profit', 'Management', 'Finance', '3.6', 55000),
(42, 'May, 2010', '2010-05-01', 'US Army', '', 'EOD', 'Government', 'Mechanical Engineering', NULL, '3.5', 50000),
(43, 'December, 2010', '2010-02-01', 'Boeing', '', 'Aerospace Engineer', 'Corporate', 'Mechanical Engineering', 'Physics ', '3.9', 75000),
(44, 'May, 2005', '2005-08-01', 'Boston College', '', 'Political Science and Government', 'Grad School', 'Political Science', 'Philosophy', '4.0', NULL),
(45, 'May, 2010', '2010-05-01', 'R Adams Cowley Shock Trauma Center', '', 'Nurse', 'Corporate', 'Nursing', NULL, '3.6', 50000),
(46, 'May, 2013', '2013-06-01', 'Accenture ', '', 'Technology Consultant', 'Corporate', 'Management', 'Computer Science', '3.0', 48000),
(47, 'May, 2019', '2019-11-01', 'Deloitte', '', 'Junior Staff Consultant', 'Corporate', 'Economics', NULL, '3.3', 44000),
(48, 'December, 2007', '2007-12-01', 'PricewaterhouseCoopers', '', 'Management Consulting', 'Corporate', 'Management ', 'Finance', '3.4', 52500),
(49, 'May, 2015', '2015-08-25', 'Yale University', '', 'Political Science ', 'Grad School', 'Political Science ', NULL, '4.0', NULL),
(50, 'May, 2012', '2012-08-25', 'Harvard University', '', 'Mechanical Engineering', 'Grad School', 'Mechanical Engineering', NULL, '4.0', NULL),
(51, 'May, 2015', '2015-08-25', 'Hood College', '', 'Marketing', 'Grad School', 'Marketing', NULL, '3.7', NULL),
(52, 'May, 2001', '2002-08-25', 'University of Maryland', '', 'Management', 'Grad School', 'Management', NULL, '3.6', NULL),
(53, 'May, 2005', '2005-08-25', 'Northwestern University', '', 'Computer Science', 'Grad School', 'Computer Science', NULL, '3.7', NULL),
(54, 'May, 2006', '2006-08-25', 'John Hopkins University', '', 'Economics', 'Grad School', 'Economics', NULL, '3.8', NULL),
(55, 'May, 2007', '2007-08-25', 'John Hopkins University', '', 'Finance', 'Grad School', 'Finance', NULL, '3.9', NULL),
(56, 'May, 2003', '2003-08-25', 'University of Pennsylvania', '', 'Electrical Engineering', 'Grad School', 'Electrical Engineering', NULL, '3.5', NULL),
(57, 'May, 2012', '2012-08-25', 'Marymount University', '', 'Philosophy', 'Grad School', 'Philosophy', NULL, '3.4', NULL),
(58, 'May, 2013', '2013-08-25', 'Hood College', '', 'Nursing', 'Grad School', 'Nursing', NULL, '3.4', NULL),
(59, 'December, 2015', '2016-08-25', 'Massachusetts Institute of Technology', '', 'Criminal Justice', 'Grad School', 'Criminal Justice', NULL, '3.9', NULL),
(60, 'May, 2005', '2005-08-25', 'Duke University', '', 'English', 'Grad School', 'English', NULL, '4.0', NULL),
(61, 'May, 2009', '2009-08-25', 'Harvard University', '', 'Biology', 'Grad School', 'Biology', NULL, '3.5', NULL),
(62, 'December, 2016', '2017-08-25', 'Chicago State University', '', 'Secondary Education', 'Grad School', 'Secondary Education', NULL, '4.0', NULL),
(63, 'May, 2006', '2006-08-25', 'Touro College', '', 'History', 'Grad School', 'History', NULL, '3.5', NULL),
(64, 'May, 2003', '2003-08-25', 'Hampton University', '', 'Chemistry', 'Grad School', 'Chemistry', NULL, '3.5', NULL),
(65, 'May, 2009', '2009-08-25', 'Liberty University', '', 'Physics', 'Grad School', 'Physics', NULL, '3.5', NULL),
(66, 'May. 2010', '2010-08-25', 'Grand Canyon University', '', 'Environmental Science', 'Grad School', 'Environmental Science', NULL, '3.5', NULL),
(67, 'May, 2013', '2013-08-25', 'California Institute of Technology', '', 'Mathematics', 'Grad School', 'Mathematics', NULL, '3.7', NULL),
(68, 'May, 2014', '2015-08-25', 'Boston College', '', 'Marketing', 'Grad School', 'Marketing', NULL, '3.8', NULL),
(69, 'May, 2015', '2015-08-25', 'Hood College ', '', 'Mechanical Engineering', 'Grad School', 'Mechanical Engineering', NULL, '3.9', NULL),
(70, 'May, 2016', '2017-08-25', 'Marymount University', '', 'Management', 'Grad School', 'Management', NULL, '4.0', NULL),
(71, 'May, 2017', '2018-08-25', 'Princeton University', '', 'Computer Science', 'Grad School', 'Computer Science', NULL, '4.0', NULL),
(72, 'May, 2018', '2018-08-25', 'Dartmouth College', '', 'Economics', 'Grad School', 'Economics', NULL, '3.9', NULL),
(73, 'May, 2019', '2019-08-25', 'Duke University', '', 'Finance', 'Grad School', 'Finance', NULL, '3.6', NULL),
(74, 'May, 2005', '2005-08-25', 'Emory University', '', 'Electrical Engineering', 'Grad School', 'Electrical Engineering', NULL, '3.5', NULL),
(75, 'May, 2006', '2007-08-25', 'Georgetown University', '', 'Philosophy', 'Grad School', 'Philosophy', NULL, '3.9', NULL),
(76, 'May, 2007', '2007-08-25', 'University of California', '', 'Criminal Justice', 'Grad School', 'Criminal Justice', NULL, '3.7', NULL),
(77, 'May, 2008', '2008-08-25', 'John Hopkins University', '', 'Nursing', 'Grad School', 'Nursing', NULL, '4.0', NULL),
(78, 'May, 2004', '2004-08-25', 'Vanderbilt University', '', 'English', 'Grad School', 'English', NULL, '4.0', NULL),
(79, 'May, 2005', '2005-08-25', 'Columbia University', '', 'Biology', 'Grad School', 'Biology', NULL, '4.0', NULL),
(80, 'May, 2006', '2007-08-25', 'Salisbury University', '', 'Secondary Education', 'Grad School', 'Secondary Education', NULL, '3.8', NULL),
(81, 'May, 2006', '2006-08-25', 'Frostburg State University', '', 'History', 'Grad School', 'History', NULL, '3.5', NULL),
(82, 'May, 2006', '2006-08-25', 'Colgate University', '', 'Chemistry', 'Grad School', 'Chemistry', NULL, '3.5', NULL),
(83, 'December, 2007', '2009-08-25', 'Smith College', '', 'Physics', 'Grad School', 'Physics', NULL, '3.7', NULL),
(84, 'May, 2007', '2007-08-25', 'St. John\'s College', '', 'Environmental Science', 'Grad School', 'Environmental Science', NULL, '3.8', NULL),
(85, 'May, 2007', '2007-08-03', 'Loyola University', '', 'Mathematics', 'Grad School', 'Mathematics', NULL, '3.9', NULL),
(86, 'May, 2008', '2009-08-25', 'Loyola University', '', 'Political Science', 'Grad School', 'Political Science', NULL, '4.0', NULL),
(87, 'May, 2008', '2009-08-25', 'St. Mary\'s College', '', 'Marketing', 'Grad School', 'Marketing', NULL, '3.8', NULL),
(88, 'May, 2010', '2011-08-25', 'Dikinson College', '', 'Mechanical Engineering', 'Grad School', 'Mechanical Engineering', NULL, '3.6', NULL),
(89, 'December, 2009', '2010-08-25', 'Stevenson University', '', 'Management', 'Grad School', 'Management', NULL, '3.6', NULL),
(90, 'May, 2012', '2012-08-25', 'Smith College', '', 'Computer Science', 'Grad School', 'Computer Science', NULL, '3.5', NULL),
(91, 'May, 2012', '2013-08-25', 'Marymount University', '', 'Economics', 'Grad School', 'Economics', NULL, '4.0', NULL),
(92, 'May, 2012', '2013-05-03', 'University of Baltimore', '', 'Finance', 'Grad School', 'Finance', NULL, '4.0', NULL),
(93, 'May, 2013', '2015-03-02', NULL, 'Walmart', 'Greeter', 'Corporate', 'Political Science ', NULL, '2.6', 28000),
(94, 'May, 2013', '2013-09-07', NULL, 'UPS', 'Machinist ', 'Corporate', 'Mechanical Engineering', NULL, '3.3', 35000),
(95, 'May, 2013', '2013-12-14', NULL, 'General Dynamics', 'Marketing Assistant', 'Corporate', 'Marketing', NULL, '2.8', 42000),
(96, 'May, 2014', '2014-08-07', NULL, 'Amazon', 'Project Manager', 'Corporate', 'Management', NULL, '3.5', 46000),
(97, 'May, 2014', '2015-06-21', NULL, 'Booz Allen', 'Security Analyst', 'Corporate', 'Computer Science', NULL, '4.0', 75000),
(98, 'May, 2014', '2014-10-12', NULL, 'FedEx', 'Shipping Logistics', 'Corporate', 'Economics', NULL, '3.4', 50000),
(99, 'May, 2011', '2012-01-08', NULL, 'PWC', 'Fund Manager', 'Corporate', 'Finance', NULL, '3.4', 55000),
(100, 'December, 2011', '2012-02-09', NULL, 'Tesla', 'Designer', 'Corporate', 'Electrical Engineering', NULL, '4.0', 65000),
(101, 'May, 2013', '2013-06-12', NULL, 'Homeland Security', 'Analyst', 'Government', 'Criminal Justice', NULL, '3.7', 40000),
(102, 'May, 2011', '2011-08-03', NULL, 'Meritus Medical Center', 'ER Nurse', 'Corporate', 'Nursing', NULL, '3.7', 50000),
(103, 'May, 2012', '2012-11-20', NULL, 'American Red Cross', 'Outreach Coordinator ', 'Non-Profit', 'Philosophy', NULL, '3.4', 43000),
(104, 'May, 2012', '2013-05-12', NULL, 'The Maryland Zoo', 'ZooKeeper', 'Corporate', 'English', NULL, '2.6', 33000),
(105, 'May, 2012', '2013-08-09', NULL, 'TEKsystems', 'Quality Assurance', 'Corporate', 'Biology', NULL, '3.2', 35000),
(106, 'May, 2011', '2011-07-13', NULL, 'Liberty Mutual', 'Office Manager', 'Corporate', 'Secondary Education', NULL, '3.3', 38000),
(107, 'May, 2016', '2016-09-02', NULL, 'AT&T', 'Sales', 'Corporate', 'History', NULL, '3.3', 35000),
(108, 'May, 2016', '2017-01-09', NULL, 'Haggerstown Community College', 'Professor', 'Government', 'Chemistry', NULL, '3.5', 40000),
(109, 'May, 2017', '2018-09-16', NULL, 'Bechtel', 'Engineering', 'Corporate', 'Physics', NULL, '3.6', 52000),
(110, 'May, 2017', '2017-06-20', NULL, 'Care.com', 'Area Coordinator', 'Corporate', 'Environmental Science', NULL, '3.4', 45000),
(111, 'May, 2017', '2017-08-14', NULL, 'Johnson Devices', 'Medical Device Designer', 'Corporate', 'Mathematics', NULL, '3.6', 52000),
(112, 'May, 2018', '2018-10-18', NULL, 'Massage Envy', 'Masseuse ', 'Corporate', 'Marketing', NULL, '2.3', 26000),
(113, 'May, 2018', '2018-12-01', NULL, 'Wells Fargo', 'Bank Manager', 'Corporate', 'Management', NULL, '3.4', 44500),
(114, 'May, 2010', '2010-08-15', NULL, 'Navy Federal', 'Insurance Agent', 'Corporate', 'History', NULL, '3.4', 42000),
(115, 'May, 2010', '2011-05-15', NULL, 'Amazon', 'Cloud Services Engineer', 'Corporate', 'Computer Science', NULL, '4.0', 70000),
(116, 'May, 2011', '2012-11-03', NULL, 'American Red Cross', 'Financial Planning', 'Non-Profit', 'Economics', NULL, '3.6', 48000),
(117, 'May, 2011', '2013-04-15', NULL, 'Sprint', 'Regional Sales Manager', 'Corporate', 'Finance', NULL, '3.3', 38000),
(118, 'December, 2011', '2011-09-12', NULL, 'GrubHub', 'Web Dev Team', 'Corporate', 'Management', NULL, '3.3', 45000),
(119, 'May, 2011', '2011-03-03', NULL, 'TEKsystems', 'Quality Assurance', 'Corporate', 'Philosophy', NULL, '3.6', 50000),
(120, 'May, 2012', '2013-01-13', NULL, 'Target', 'Regional Security Director', 'Corporate', 'Criminal Justice', NULL, '3.4', 48000),
(121, 'May, 2012', '2012-10-10', NULL, 'Urgent Care', 'Clinical Nurse', 'Corporate', 'Nursing', NULL, '3.7', 55000),
(122, 'May, 2012', '2012-11-11', NULL, 'Petco', 'Groomer', 'Corporate', 'English', NULL, '2.2', 25000),
(123, 'May, 2012', '2012-08-15', NULL, 'MedStar', 'Medical Device Designer', 'Corporate', 'Biology', NULL, '4.0', 70000),
(124, 'May, 2013', '2015-04-12', NULL, 'Walmart', 'Manager', 'Corporate', 'English', NULL, '3.0', 30000),
(125, 'May, 2013', '2014-08-02', NULL, 'Goddard Space Flight Center', 'Human Resources', 'Corporate', 'History', NULL, '3.5', 48000),
(126, 'May, 2014', '2015-05-05', NULL, 'General Dynamics', 'Chemical Engineer', 'Corporate', 'Chemistry', NULL, '3.9', 60000),
(127, 'May, 2014', '2014-08-12', NULL, 'Booz Allen', 'Research and Development', 'Corporate', 'Physics', NULL, '3.5', 58000),
(128, 'May, 2017', '2017-09-28', NULL, 'Emergent BioSolutions', 'Clinical Researcher', 'Corporate', 'Environmental Science', NULL, '3.5', 55000),
(129, 'May, 2017', '2017-11-12', NULL, 'Chesapeake Bay Foundation', 'Policy Coordinator', 'Non-Profit', 'Environmental Science', NULL, '3.4', 50000),
(130, 'May, 2016', '2016-02-15', NULL, 'UPS', 'Warehouse Manager', 'Corporate', 'Political Science', NULL, '2.7', 32000),
(131, 'May, 2016', '2016-05-25', NULL, 'General Dynamics', 'Instrumentation', 'Corporate', 'Mechanical Engineering', NULL, '3.8', 65000),
(132, 'December 9. 20', '2016-03-03', NULL, 'Amazon', 'Marketing Team', 'Corporate', 'Marketing', NULL, '3.7', 50000),
(133, 'May, 2015', '2015-06-15', NULL, 'FedEx', 'Logistics Research', 'Corporate', 'Management', NULL, '3.0', 38000),
(134, 'May, 2010', '2010-07-02', NULL, 'NASA', 'Satellite Deployment Team', 'Government', 'Electrical Engineering', NULL, '4.0', 70000),
(135, 'May, 2010', '2010-08-15', NULL, 'Microsoft', 'OS Design Junior Developer', 'Corporate', 'Computer Science', NULL, '3.9', 60000),
(136, 'May, 2004', '2004-09-02', NULL, 'Areotek', 'Actuary ', 'Corporate', 'Mathematics', NULL, '3.8', 50000),
(137, 'May, 2008', '2009-04-03', NULL, 'McDonalds', 'Manager', 'Corporate', 'Political Science ', NULL, '2.4', 24000),
(138, 'May, 2015', '2015-09-25', NULL, 'Baltimore Ravens', 'Front Office', 'Corporate', 'Finance', NULL, '3.0', 45000),
(139, 'May, 2010', '2011-04-12', NULL, 'Washington Nationals', 'Front Office', 'Corporate', 'Marketing', NULL, '4.0', 48000),
(140, 'May, 2009', '2009-06-01', NULL, 'Disable Sports USA', 'Physical Therapy Assistant ', 'Corporate', 'Kinesiology ', NULL, '3.8', 45000),
(141, 'May, 2007', '2007-09-05', NULL, 'Howard County Public School System', 'English Teacher', 'Corporate', 'Secondary Education', NULL, '3.7', 36000),
(142, 'May, 2003', '2003-06-10', NULL, 'U.S. Capitol Police', 'Patrol Officer', 'Government', 'Criminal Justice', NULL, '3.5', 45000),
(143, 'December, 2006', '2007-09-09', NULL, 'Lifetime Fitness', 'Manager', 'Corporate', 'Finance', NULL, '3.3', 38000),
(144, 'May, 2003', '2003-08-03', NULL, 'Frederick Country Public School System', 'Social Studies Teacher', 'Government', 'Economics', NULL, '3.3', 42000),
(145, 'December, 2007', '2007-09-09', NULL, 'University of Maryland', 'Student Services Assistant ', 'Corporate', 'Philosophy', NULL, '3.6', 35000),
(147, 'May, 2020', '2020-05-25', 'West School', 'Yahoo', 'Scientist', 'Non-Profit', 'Science', 'New', '3.0', 1),
(148, 'May, 2020', '2020-05-27', 'West School', 'Yahoo', 'Scientist', 'Corporate', 'Science', 'New', '3.0', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
