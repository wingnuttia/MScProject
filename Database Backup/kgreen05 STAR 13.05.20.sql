-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2020 at 06:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kgreen05`
--

-- --------------------------------------------------------

--
-- Table structure for table `AppAvail`
--

CREATE TABLE `AppAvail` (
  `ID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `AvailID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AppAvail`
--

INSERT INTO `AppAvail` (`ID`, `AppID`, `AvailID`) VALUES
(1, 2, 1),
(2, 100008, 3),
(3, 100009, 1),
(4, 100011, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ApplicantDetails`
--

CREATE TABLE `ApplicantDetails` (
  `AppID` int(11) NOT NULL,
  `ApplicantID` int(11) NOT NULL,
  `TitleID` int(11) DEFAULT NULL,
  `Forename` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Preferred` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `Mobile` varchar(17) DEFAULT NULL,
  `SexID` int(11) DEFAULT NULL,
  `NationID` int(11) DEFAULT NULL,
  `Street` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `pcode` varchar(11) DEFAULT NULL,
  `hrsTypeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ApplicantDetails`
--

INSERT INTO `ApplicantDetails` (`AppID`, `ApplicantID`, `TitleID`, `Forename`, `Surname`, `Preferred`, `dob`, `Mobile`, `SexID`, `NationID`, `Street`, `City`, `pcode`, `hrsTypeID`) VALUES
(1001, 1, 4, 'Karen', 'Green', 'Karen', '1982-02-24', '07712345686', 1, 1, '6 Iniscarn Crescent', 'Derry', 'BT48 9PY', 1),
(1003, 2, 3, 'Karen', 'Green', NULL, '1996-06-04', '07798907795', 1, 5, '6 Inis Crescent', 'LONDONDERRY', 'bt8 9py', 3),
(1004, 100005, 1, 'Simon', 'Murray', NULL, '1976-12-19', NULL, 2, 1, NULL, NULL, NULL, 1),
(1005, 100024, 1, 'Gavin', 'Stacey', '', '1960-06-06', '07795905548', 2, 3, 'this is a test', 'Belfast', 'bt7 4qr', 1),
(1006, 100025, 1, 'Kevin', 'Smith', '', '1978-04-08', '0779856411235', 2, 6, 'this is a test', 'Belfast', 'bt56gt', 1),
(1007, 100026, 1, 'Simon', 'Cowell', '', '1952-05-22', '0779850213', 2, 1, 'xfactor street', 'Belfast', 'bt5 rrr', 1),
(1008, 100027, 1, 'Jack', 'Daniels', 'JD', '1955-06-02', '07741625864', 2, 1, 'Happy Street', 'belfast', 'bt6 4xy', 1),
(1010, 100004, 2, 'Kalie', 'McDermott', NULL, '1982-05-04', NULL, 1, 1, NULL, NULL, NULL, 3),
(1011, 100028, 6, 'Naomi', 'Boyd', 'Naomi', '1978-05-26', 'contact', 1, 1, '83 Larkfield Road', 'Belfast', 'BT4 1QF', 1),
(1012, 100016, 3, 'Colette', 'Mattheews', NULL, '1972-08-29', '07894561235', 1, 3, '6 Windermere', 'Belfast', 'BT6 8TR', 1),
(1013, 100029, 3, 'Fia', 'Mackel', 'Fia', '1980-05-03', '07785845632', 1, 5, '14 Wheatfield', 'Belfast', 'BT76TH', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ApplicantLogin`
--

CREATE TABLE `ApplicantLogin` (
  `ApplicantID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `userTypeID` int(11) NOT NULL,
  `FirstLoginDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ApplicantLogin`
--

INSERT INTO `ApplicantLogin` (`ApplicantID`, `userName`, `email`, `pw`, `userTypeID`, `FirstLoginDate`) VALUES
(1, 'Karen', 'karen.green82@gmail.com', 'pass1234', 4, '2020-05-12 22:11:40'),
(2, 'KarenG', 'k.green@qub.ac.uk', 'b4af804009cb036a4ccdc33431ef9ac9', 5, '2020-05-13 14:20:46'),
(100004, 'Sam', 'S.mcloskey@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 4, '2020-02-16 08:50:15'),
(100005, 'Karen22', 'Karen@emailtext.com', '81dc9bdb52d04dc20036dbd8313ed055', 5, '2020-05-06 10:45:31'),
(100008, 'tester', 'test@tst.com', '1a1dc91c907325c69271ddf0c944bc72', 4, '2020-04-01 08:34:34'),
(100009, 'testet22', 'kgreen05@qub.ac.uk', '5f4dcc3b5aa765d61d8327deb882cf99', 5, '2020-05-04 11:18:56'),
(100027, 'jd1856', 'jack.dan@test.com', '1a1dc91c907325c69271ddf0c944bc72', 4, '2020-05-02 11:42:00'),
(100028, 'naomib', 'n.boyd@qub.ac.uk', '879599d4177543d1f0d835d1b0526116', 4, '2020-05-04 10:27:47'),
(100029, 'Fia_2020', 'fia@testmail.com', 'b4af804009cb036a4ccdc33431ef9ac9', 4, '2020-05-10 07:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `Application`
--

CREATE TABLE `Application` (
  `applicationID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `appStage` int(11) NOT NULL,
  `DateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Application`
--

INSERT INTO `Application` (`applicationID`, `AppID`, `roleID`, `appStage`, `DateCreated`) VALUES
(100001, 1, 1, 1, '2020-05-03'),
(100003, 100028, 1, 1, '2020-05-04'),
(100004, 1, 2, 1, '2020-05-05'),
(100005, 2, 3, 1, '2020-05-06'),
(100006, 2, 1, 3, '2020-05-08'),
(100007, 1, 3, 1, '2020-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `ApplicationExperience`
--

CREATE TABLE `ApplicationExperience` (
  `EmploymentID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `EmployerName` varchar(255) NOT NULL,
  `JobTitle` varchar(255) NOT NULL,
  `JobSectorID` int(11) NOT NULL,
  `current` varchar(10) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date DEFAULT NULL,
  `Duties` text NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ApplicationExperience`
--

INSERT INTO `ApplicationExperience` (`EmploymentID`, `AppID`, `EmployerName`, `JobTitle`, `JobSectorID`, `current`, `StartDate`, `EndDate`, `Duties`, `created`) VALUES
(1, 1, 'Disney', 'Park attendant', 30, NULL, '2018-02-22', '2018-12-12', 'Disney was originally founded on October 16, 1923, by brothers Walt and Roy O. Disney as the Disney Brothers Cartoon Studio; it also operated under the names The Walt Disney Studio and Walt Disney Productions before officially changing its name to The Walt Disney Company in 1986. The company established itself as a leader in the American animation industry before diversifying into live-action film production, television, and theme parks.', '2020-02-15'),
(2, 100004, 'Queens', 'Clerical', 25, '', '2020-02-15', '2020-02-15', 'test update', '2020-02-15'),
(3, 1, 'Queens', 'Clerical', 31, '', '2010-02-24', '2011-02-22', 'Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. It contains CSS- and (optionally) JavaScript-based design templates for typography, forms, buttons, navigation, and other interface components.\r\n\r\nBootstrap is the sixth-most-starred project on GitHub, with more than 135,000 stars, behind freeCodeCamp (almost 307,000 stars) and marginally behind Vue.js framework.[2] According to Alexa Rank, Bootstrap getbootstrap.com is in the top-2000 in US while vuejs.org is in top-7000 in US.[3]', '2020-02-15'),
(4, 100009, 'Queens', 'Clerical', 6, '', '2015-02-16', '2017-02-25', 'This dateshjk', '2020-02-16'),
(5, 100008, 'West', 'ttt', 7, '', '1998-08-02', '2000-09-22', 'Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph. A paragraph is defined as “a group of sentences or a single sentence that forms a unit” (Lunsford and Connors 116). Length and appearance do not determine whether a section in a paper is a paragraph.', '2020-02-16'),
(6, 1, 'Marvel', 'Cartoonist', 21, '', '2001-02-28', '2009-09-18', 'The Marvel Cinematic Universe is an American media franchise and shared universe centered on a series of superhero films, independently produced by Marvel Studios and based on characters that appear in American comic books published by Marvel Comics.', '2020-03-08'),
(7, 100004, 'WHSCT', 'Clerical', 25, '', '2020-03-22', NULL, 'Updating hospital records for child health department', '2020-03-08'),
(8, 100027, 'Queens University', 'job toto', 5, '', '2019-09-05', '2020-01-02', 'Get your 3-Day weather forecast for Belfast, Belfast, United Kingdom. Hi/Low, RealFeel, precip, radar, & everything you need to be ready for the day, commute,', '2020-03-11'),
(9, 1, 'Centra', 'Shop assistant', 23, '', '2002-02-22', '2003-02-21', 'Test centra leading NI', '2020-04-28'),
(10, 100028, 'Karen Green', 'Executive Assistant', 14, '', '2019-09-01', '2020-05-04', 'Being an excellent assistant to Karen Green Inc. I brought her friday buns and coffee and managed her diary and set up meetings', '2020-05-04'),
(11, 100028, 'Neil Harrison', 'Executive Assistant', 24, '', '2018-01-01', '2018-08-30', 'I laughed at all his dad jokes and beat him at chair races', '2020-05-04'),
(12, 100016, 'St Mary\'s College', 'Secretary ', 25, NULL, '1999-10-22', '2018-08-16', 'Test', '2020-05-06'),
(13, 2, 'LB PLC', 'Salary Clerk', 25, '', '2016-10-02', '2019-02-02', 'Creating and logging invoices\r\nLiaising with suppliers\r\nAssisting with management accounts production', '2020-05-09'),
(14, 2, 'Olia', 'Personal Assistant', 25, '', '2003-02-02', '2005-12-19', 'Maintaining dairies and office of Senior executives', '2020-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `ApplicationExpJobSector`
--

CREATE TABLE `ApplicationExpJobSector` (
  `JobSectorID` int(11) NOT NULL,
  `JobSector` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ApplicationExpJobSector`
--

INSERT INTO `ApplicationExpJobSector` (`JobSectorID`, `JobSector`, `active`) VALUES
(1, 'Accountancy & Finance', 1),
(2, 'Banking, Financial services & Insurance', 1),
(3, 'Beauty, Hair Care, Leisure & Sport', 1),
(4, 'Big Data & Analytics', 1),
(5, 'Construction, Architecture & Property', 1),
(6, 'Cust. Service, Call Centres & Languages', 1),
(7, 'Education, Childcare & Training', 1),
(8, 'Engineering', 1),
(9, 'Environmental, Health & Safety', 1),
(10, 'General Management & Consulting', 1),
(12, 'Hospitality', 0),
(13, 'HR', 1),
(14, 'IT', 1),
(15, 'Legal', 1),
(16, 'Marketing', 1),
(17, 'Motoring', 1),
(18, 'Nursing, Healthcare & Medical', 1),
(19, 'Production, Manufacturing & Materials', 1),
(20, 'Public Sector & Policing', 1),
(21, 'Publishing, Media & Creative Arts', 1),
(22, 'Retailing, Wholesaling & Purchasing', 1),
(23, 'Sales', 1),
(24, 'Science, Agriculture, Pharmaceutical & Food', 1),
(25, 'Secretarial & Admin', 1),
(26, 'Security, Trades & General Services', 1),
(27, 'Senior Executive', 0),
(28, 'Social, Charity & Not for Profit', 0),
(29, 'Telecoms', 0),
(30, 'Tourism, Travel & Airlines', 0),
(31, 'Transport, Logistics & Warehousing', 0);

-- --------------------------------------------------------

--
-- Table structure for table `applicationStageRec`
--

CREATE TABLE `applicationStageRec` (
  `id` int(11) NOT NULL,
  `application` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `stageDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicationStageRec`
--

INSERT INTO `applicationStageRec` (`id`, `application`, `stage`, `stageDate`) VALUES
(2, 100001, 1, '2020-05-03'),
(4, 100005, 1, '2020-05-06'),
(5, 100003, 1, '2020-05-06'),
(6, 100004, 1, '2020-05-06'),
(7, 100006, 1, '2020-05-08'),
(8, 100007, 1, '2020-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `countryID` int(11) NOT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`countryID`, `Country`) VALUES
(1, 'United Kingdom'),
(5, 'Ireland'),
(6, 'Denmark '),
(7, 'Finland '),
(8, 'Norway'),
(9, 'Sweden '),
(10, 'Switzerland'),
(11, 'Estonia '),
(12, 'Latvia'),
(13, 'Lithuania'),
(14, 'Austria'),
(15, 'Belgium'),
(16, 'France'),
(17, 'Germany'),
(18, 'Italy'),
(19, 'Netherlands'),
(20, 'United States'),
(21, 'Canada'),
(22, 'Mexico'),
(23, 'Australia'),
(24, 'New Zealand'),
(25, 'China'),
(30, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `DID` int(11) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `SID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`DID`, `Department`, `SID`) VALUES
(1, 'Bryden Centre', 6),
(2, 'Resourcing', 19),
(3, 'ECIT', 7),
(4, 'CSIT', 7),
(5, 'Payments', 18),
(6, 'Public Health Agency', 12),
(7, 'IGFS', 12),
(8, 'Centre for Public Health', 12),
(9, 'Drama', 1),
(10, 'English', 1),
(11, 'Music', 1),
(12, 'N/A', 24);

-- --------------------------------------------------------

--
-- Table structure for table `DocCheckType`
--

CREATE TABLE `DocCheckType` (
  `CheckTypeID` int(11) NOT NULL,
  `CheckType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DocCheckType`
--

INSERT INTO `DocCheckType` (`CheckTypeID`, `CheckType`) VALUES
(1, 'Qualification Check'),
(2, 'Right to Work Check');

-- --------------------------------------------------------

--
-- Table structure for table `DocumentCheck`
--

CREATE TABLE `DocumentCheck` (
  `DocCheckID` int(11) NOT NULL,
  `ApplicantID` int(11) NOT NULL,
  `CheckType` int(11) NOT NULL,
  `DocUploadId` int(11) NOT NULL,
  `PassedCheck` tinyint(1) NOT NULL,
  `DateofCheck` date NOT NULL,
  `CheckBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DocumentType`
--

CREATE TABLE `DocumentType` (
  `DoctypeID` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DocumentType`
--

INSERT INTO `DocumentType` (`DoctypeID`, `Type`) VALUES
(1, 'Qualification Certificate'),
(2, 'Passport'),
(3, 'Right To Work Form');

-- --------------------------------------------------------

--
-- Table structure for table `DocumentUpload`
--

CREATE TABLE `DocumentUpload` (
  `UploadID` int(11) NOT NULL,
  `CheckID` int(11) NOT NULL,
  `Upload` varchar(255) NOT NULL,
  `DoctypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EmpReference`
--

CREATE TABLE `EmpReference` (
  `ReferenceID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Forename` varchar(255) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `RelID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmpReference`
--

INSERT INTO `EmpReference` (`ReferenceID`, `AppID`, `Surname`, `Forename`, `Company`, `Position`, `RelID`, `email`, `id`) VALUES
(1, 1, 'Boyd', 'Naomi', 'Bryden Centre', 'Finance Manger', 2, 'n.boyd@qub.ac', 2),
(2, 100028, 'Harrison', 'Neil', 'Bryden Centre', 'Operations Manager', 2, 'this.email@test.com', 2),
(3, 2, 'Blair', 'Selma', 'LB PLC', 'Senior Salary Clerk', 1, 'test@testemail.com', 2),
(4, 1, 'Mendes', 'Sofia', 'Olia', 'Manager', 2, 'manager@test.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE `Faculty` (
  `FacultyID` int(11) NOT NULL,
  `Faculty` varchar(255) NOT NULL,
  `Acronym` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`FacultyID`, `Faculty`, `Acronym`) VALUES
(1, 'Professional Services', 'PS'),
(2, 'Arts, Humanities and Social Science', 'AHSS'),
(3, 'Engineering and Physical Sciences', 'EPS'),
(4, 'Medicine, Health and Life Sciences', 'MHLS');

-- --------------------------------------------------------

--
-- Table structure for table `HoursType`
--

CREATE TABLE `HoursType` (
  `TypeID` int(11) NOT NULL,
  `HoursType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HoursType`
--

INSERT INTO `HoursType` (`TypeID`, `HoursType`) VALUES
(1, 'Full Time Hours'),
(2, 'Part Time Hours'),
(3, 'Either - Both Full and Part time Hours');

-- --------------------------------------------------------

--
-- Table structure for table `HRShortlistOutcome`
--

CREATE TABLE `HRShortlistOutcome` (
  `OutcomeID` int(11) NOT NULL,
  `outcome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HRShortlistOutcome`
--

INSERT INTO `HRShortlistOutcome` (`OutcomeID`, `outcome`) VALUES
(1, 'Shortlisted'),
(2, 'Reject after shortlist');

-- --------------------------------------------------------

--
-- Table structure for table `HRShortlistRecord`
--

CREATE TABLE `HRShortlistRecord` (
  `ShortlistID` int(11) NOT NULL,
  `ApplicationID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `ShortlistDate` date NOT NULL,
  `Note` text NOT NULL,
  `OutcomeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jsCriteria`
--

CREATE TABLE `jsCriteria` (
  `CriteriaID` int(11) NOT NULL,
  `Criteria` text NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jsCriteria`
--

INSERT INTO `jsCriteria` (`CriteriaID`, `Criteria`, `RoleID`) VALUES
(1, 'A minimum of 5 GCSEs or equivalent Grades A-C, including English Language and Maths with EITHER a recognised IT/Word Processing qualification, e.g. CLAIT, ECDL, OCR/RSA OR 6 months’ experience of data inputting/word processing.\r\n', 1),
(2, 'EITHER a minimum of 1 year’s experience of working in an office environment within the last 5 years with duties similar to those outlined above or have a minimum of 6 months’experience of working in an office environment within the last 5 years with duties similar to those outlined above and a recognised IT/ word processing qualification, e.g. CLAIT, ECDL, OCR/RSA.', 1),
(3, 'Evidence of good oral and written communication skills', 1),
(4, 'Location of the post will be subject to the requirements of the University.', 1),
(5, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level3 in relevant subject (or\r\nequivalent) OR 2 years relevant work experience', 2),
(6, 'Specialist skills and knowledge relevant to the job.', 2),
(7, 'Comprehensive knowledge of relevant systems, equipment and processes', 2),
(8, 'Good awareness of safe manual handling', 2),
(9, 'Good understanding of relevant regulations and procedures including Health and Safety\r\nrequirements.', 2),
(10, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level3 in relevant subject (or\r\nequivalent) OR 2 years relevant work experience', 3),
(11, 'Specialist skills and knowledge relevant to the job.', 3),
(12, 'Comprehensive knowledge of relevant systems, equipment and processes', 3),
(13, 'Ability to work to close tolerances in various metals\r\n', 3),
(14, 'Good awareness of safe manual handling', 3),
(15, 'Good understanding of relevant regulations and procedures including Health and Safety\r\nrequirements.', 3),
(16, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level3 in relevant\r\nsubject (or equivalent) OR 2 years relevant work experience', 5),
(17, 'Proficient in the use of hand and small power tools.', 5),
(18, 'Good awareness of safe manual handling', 5),
(19, 'Good understanding of relevant regulations and procedures including Health and Safety\r\nrequirements', 5),
(20, 'Current valid drivers licence. ', 5),
(21, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level3 in relevant subject (or\r\nequivalent) OR 2 years relevant work experience', 4),
(22, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level3 in relevant subject (or\r\nequivalent) OR 2 years relevant work experience', 4),
(23, 'Comprehensive knowledge of relevant systems, equipment and processes.\r\n', 4),
(24, 'Good awareness of safe manual handling.', 4),
(25, 'Good understanding of relevant regulations and procedures including Health and Safety\r\nrequirements.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jsduties`
--

CREATE TABLE `jsduties` (
  `SummaryID` int(11) NOT NULL,
  `Summary` text NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jsduties`
--

INSERT INTO `jsduties` (`SummaryID`, `Summary`, `RoleID`) VALUES
(1, 'Accepting and re-routing telephones calls and operating switchboard as necessary.', 1),
(2, 'Answering enquiries and assisting staff, students and the public.', 1),
(3, 'Carrying out photocopying duties as required.', 1),
(4, 'Faxing documents.', 1),
(5, 'Word processing of documents, maintaining and creating spreadsheets and databases.', 1),
(6, 'Inputting data on computer packages.', 1),
(7, 'Filing of documents', 1),
(8, 'Payment processing.', 1),
(9, 'Monitor and replenish levels of stocks/stores of equipment and supplies.', 1),
(10, 'The above list of duties is neither comprehensive nor exhaustive but outlines the general requirements of the post. Other duties may arise of a more general nature which is consistentwith the job title and hourly rate attached to this post', 1),
(11, 'Location of the post will be subject to the requirements of the University', 1),
(12, 'The above list of duties is neither comprehensive nor exhaustive but outlines the general requirements of the post. Other duties may arise of a more general nature which is consistent\r\nwith the job title and hourly rate attached to this post', 1),
(13, 'Location of the post will be subject to the requirements of the University.', 1),
(21, 'Basic fault finding and repair of electrical and electronic research equipment and laboratory apparatus.', 2),
(22, 'Contribute to the development, construction and modification of components/apparatus using full range of techniques for teaching/research/project work purposes.', 2),
(23, 'Interpretation of electrical and electronic circuit diagrams.\r\n', 2),
(24, 'Simple circuit design and manufacture.', 2),
(25, 'Maintain, test, fault finding and repair equipment/apparatus to ensure it is safe to use and complies with relevant statutory safety regulations. Ensure general workshop/laboratory services tidiness.', 2),
(26, 'Basic knowledge of computer interfacing', 2),
(27, 'Comply with Health and Safety procedures affecting self and others. \r\n', 2),
(34, 'Take delegated responsibility for the maintenance and repair of workshop equipment', 2),
(35, 'Support student learning through the development and demonstration of standard equipment and\r\ntechniques', 2),
(36, 'May provide standard guidance and advice to colleagues/students through on the job training.', 2),
(37, 'Carry out any other duties which are appropriate to the post as may be reasonably requested by\r\nSupervisor.', 2),
(38, 'The above list of duties is neither comprehensive nor exhaustive but outlines the general requirements of\r\nthe post. Other duties may arise of a more general nature which is consistent with the job title and hourly\r\nrate attached to this post.', 2),
(39, 'Location of the post will be subject to the requirements of the University.', 2),
(40, 'Operate manual workshop machinery including lathes, milling, drilling and grinding machines.', 3),
(41, 'Operation of CNC machinery.', 3),
(42, 'Fabrication using MIG and TIG welding techniques.', 3),
(43, 'Contribute to the development, construction and modification of components/apparatus using full\r\nrange of techniques for teaching/research/project work purposes', 3),
(44, 'Fitting/assembly work using hand/power tools as required.\r\n', 3),
(45, 'Ensure general workshop/laboratory services tidiness.', 3),
(46, 'Comply with Health and Safety procedures affecting self and others.', 3),
(47, 'Take delegated responsibility for the maintenance and repair of workshop equipment', 3),
(48, 'Have responsibility for the security and maintenance of equipment in the laboratory/workshop/department if required.', 3),
(49, 'Support student learning through the development and demonstration of standard equipment and\r\ntechniques', 3),
(50, 'May provide standard guidance and advice to colleagues/students through on the job training.', 3),
(51, 'Carry out any other duties which are appropriate to the post as may be reasonably requested by\r\nSupervisor.', 3),
(52, 'The above list of duties is neither comprehensive nor exhaustive but outlines the general requirements of\r\nthe post. Other duties may arise of a more general nature which is consistent with the job title and hourly\r\nrate attached to this post.', 3),
(53, 'Location of the post will be subject to the requirements of the University.', 3),
(54, 'Construct and modify equipment and components to a specification agreed with others', 5),
(55, 'Modify, clean, repair and test equipment ensuring general workshop/laboratory tidiness.', 5),
(56, 'Ensure the general security of tools and equipment and of laboratory/workshop areas.', 5),
(57, 'Set up equipment for teaching and research experiments following clear guidelines and/or procedures', 5),
(58, 'Comply with Health and Safety procedures affecting self and others', 5),
(59, 'Have responsibility for the security and maintenance of equipment in the laboratory/workshop/department if required.', 5),
(60, 'Support student learning through the development and demonstration of standard equipment and techniques.', 5),
(61, 'May provide standard guidance and advice to colleagues/students through on the job training', 5),
(62, 'Carry out any other duties which are appropriate to the post as may be reasonably requested by Supervisor.\r\n', 5),
(63, 'The above list of duties is neither comprehensive nor exhaustive but outlines the general requirements of the post. Other duties may arise of a more general nature which is consistent\r\nwith the job title and hourly rate attached to this post.\r\n', 5),
(64, 'Location of the post will be subject to the requirements of the University.', 5),
(65, 'Handling IT queries from staff and students, resolving if possible and escalating as appropriate;\r\nproviding IT advice as required to staff and students.', 4),
(66, 'Assisting with the deployment of new computers or the updating of existing computers to include installing operating systems, applications and patches as required. Helping migrate user data.', 4),
(67, 'Diagnosing hardware faults in IT equipment including desktops, laptops and printers, carrying out\r\nbasic maintenance and ensuring appropriate repair arrangements are in place where necessary.', 4),
(68, 'Updating and assisting with management of hardware and software inventories; maintaining software licensing compliance', 4),
(69, 'Assisting with ongoing operation and ensuring validity of data backups', 4),
(70, 'Assisting with ongoing operation of printers and multi-function devices', 4),
(71, 'Monitoring stocks of IT equipment and consumables and initiating orders as required', 4),
(72, 'Support student learning through the development and demonstration of standard equipment and\r\ntechniques', 4),
(73, 'May provide standard guidance and advice to junior colleagues/students through on-the-job training/coaching in the use of equipment and techniques.', 4),
(74, 'Comply with Health and Safety procedures affecting self and others', 4),
(75, 'Carry out any other duties which are appropriate to the post as may be reasonably requested by\r\nSupervisor.', 4),
(76, 'The above list of duties is neither comprehensive nor exhaustive but outlines the general requirements of\r\nthe post. Other duties may arise of a more general nature which is consistent with the job title and hourly\r\nrate attached to this post', 4),
(77, 'Location of the post will be subject to the requirements of the University', 4);

-- --------------------------------------------------------

--
-- Table structure for table `js_purpose`
--

CREATE TABLE `js_purpose` (
  `purposeID` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_purpose`
--

INSERT INTO `js_purpose` (`purposeID`, `purpose`, `RoleID`) VALUES
(1, 'To assist in the provision of a general clerical service to the University to ensure the efficient completion of general administration.', 1),
(2, 'To provide electrical and electronic technical services to support research and teaching projects.', 2),
(3, 'To use programmable and manual machinery and equipment to provide support for research and teaching projects', 3),
(4, 'To provide an IT service to a School with the Faculty of Engineering and Physical Sciences.', 4),
(5, 'To provide general technical support services to academic and research staff and students so that experiments and research are completed in an efficient way.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ManagerSTARFeedback`
--

CREATE TABLE `ManagerSTARFeedback` (
  `ManagerFeedID` int(11) NOT NULL,
  `PostRecordID` int(11) NOT NULL,
  `Feedback` text NOT NULL,
  `StaffID` int(11) NOT NULL,
  `appID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Nationality`
--

CREATE TABLE `Nationality` (
  `NationalityID` int(11) NOT NULL,
  `Nationality` varchar(255) DEFAULT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Nationality`
--

INSERT INTO `Nationality` (`NationalityID`, `Nationality`, `Country`) VALUES
(1, 'British', 'United Kingdom '),
(2, 'Scottish', 'Scotland '),
(3, 'Northern Irish', 'Northern Ireland '),
(4, 'Welsh', 'Wales '),
(5, 'Irish', 'Ireland'),
(6, 'Danish', 'Denmark '),
(7, 'Finnish', 'Finland '),
(8, 'Norwegian', 'Norway'),
(9, 'Swedish', 'Sweden '),
(10, 'Swiss', 'Switzerland'),
(11, 'Estonian', 'Estonia '),
(12, 'Latvian', 'Latvia'),
(13, 'Lithuanian', 'Lithuania'),
(14, 'Austrian', 'Austria'),
(15, 'Belgian', 'Belgium'),
(16, 'French', 'France'),
(17, 'German', 'Germany'),
(18, 'Italian', 'Italy'),
(19, 'Dutch', 'Netherlands'),
(20, 'American', 'United States'),
(21, 'Canadian', 'Canada'),
(22, 'Mexican', 'Mexico'),
(23, 'Ukrainian', 'Ukraine'),
(24, 'Russian', 'Russia'),
(25, 'Belarusian', 'Belarus'),
(26, 'Polish', 'Poland'),
(27, 'Czech', 'Czech Republic'),
(28, 'Slovak / Slovakian', 'Slovakia'),
(29, 'Hungarian', 'Hungary'),
(30, 'Romanian', 'Romania'),
(31, 'Bulgarian', 'Bulgaria'),
(32, 'Greek', 'Greece'),
(33, 'Spanish', 'Spain'),
(34, 'Brazilian', 'Brazil'),
(35, 'Portuguese', 'Portugal'),
(36, 'Australian', 'Australia'),
(37, 'New Sealander', 'New Zealand'),
(38, 'Georgian', 'Georgia'),
(39, 'Israeli', 'Israel'),
(40, 'Egyptian', 'Egypt'),
(41, 'Turkish', 'Turkey'),
(42, 'Chinese', 'China'),
(43, 'Korean', 'Korea'),
(44, 'Japanese', 'Japan'),
(45, 'Indian', 'India'),
(46, 'South African', 'South Africa');

-- --------------------------------------------------------

--
-- Table structure for table `NSPNumber`
--

CREATE TABLE `NSPNumber` (
  `ID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `NSP_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `id` int(11) NOT NULL,
  `period` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `period`) VALUES
(1, 'Year(s)'),
(2, 'Month(s)'),
(3, 'Day(s)');

-- --------------------------------------------------------

--
-- Table structure for table `Positions`
--

CREATE TABLE `Positions` (
  `PostID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `PostTitle` varchar(255) NOT NULL,
  `SchoolID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL,
  `HoursTypeID` int(11) NOT NULL,
  `EstStartDate` date NOT NULL,
  `EstEndDate` date NOT NULL,
  `Description` text NOT NULL,
  `live` tinyint(4) NOT NULL,
  `assigned` tinyint(4) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Positions`
--

INSERT INTO `Positions` (`PostID`, `StaffID`, `RoleID`, `PostTitle`, `SchoolID`, `DepartmentID`, `HoursTypeID`, `EstStartDate`, `EstEndDate`, `Description`, `live`, `assigned`, `CreatedDate`) VALUES
(1, 1, 1, 'Receptionist', 7, 12, 1, '2020-03-31', '2020-04-30', 'Provide Reception Duties to cover Illness', 1, 0, '2020-05-02 19:30:06'),
(2, 2, 1, 'Clerical Support', 1, 12, 2, '2020-03-31', '2020-04-16', 'Clerical support to Short Term Research Project', 1, 1, '2020-05-02 19:30:09'),
(3, 1, 1, 'clerical', 1, 12, 1, '2020-05-02', '2020-08-02', 'test', 0, 0, '2020-05-02 19:30:12'),
(4, 1, 1, 'hhh', 4, 12, 1, '1822-02-22', '2223-02-22', 'hhh5hh5h5h5', 0, 0, '2020-05-01 05:06:43'),
(5, 1, 1, 'Centre Attendant', 1, 9, 1, '2022-02-22', '1326-02-02', 'kjlhlkjlk', 0, 0, '2020-05-01 05:07:15');

-- --------------------------------------------------------

--
-- Table structure for table `PostAssigned`
--

CREATE TABLE `PostAssigned` (
  `ID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `AppID` int(11) DEFAULT NULL,
  `Assigned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PostOtherSkill`
--

CREATE TABLE `PostOtherSkill` (
  `PostOtherID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `OSkill` varchar(255) NOT NULL,
  `CatID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PostSkills`
--

CREATE TABLE `PostSkills` (
  `postSKillID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `SkillID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PostSkills`
--

INSERT INTO `PostSkills` (`postSKillID`, `PostID`, `SkillID`) VALUES
(1, 1, 2),
(2, 1, 6),
(3, 2, 21),
(4, 2, 24),
(17, 4, 2),
(18, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `QualDate`
--

CREATE TABLE `QualDate` (
  `DID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `QualID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QualDate`
--

INSERT INTO `QualDate` (`DID`, `Date`, `QualID`) VALUES
(1, '2018-05-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `QualGrade`
--

CREATE TABLE `QualGrade` (
  `GID` int(11) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `LID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QualGrade`
--

INSERT INTO `QualGrade` (`GID`, `Grade`, `active`, `LID`) VALUES
(45, 'A*', 1, 1),
(46, 'A', 1, 1),
(47, 'B', 1, 1),
(48, 'C', 1, 1),
(49, 'D', 1, 1),
(50, 'E', 1, 1),
(52, 'A*', 1, 2),
(53, 'A', 1, 2),
(54, 'B', 1, 2),
(55, 'C', 1, 2),
(56, 'D', 1, 2),
(57, 'E', 1, 2),
(90, 'Pass', 1, 3),
(93, 'Pass', 1, 4),
(94, 'Distinction', 1, 5),
(95, 'Pass', 1, 5),
(98, 'Pass', 1, 6),
(121, 'Pass', 1, 7),
(142, 'Other', 1, 8),
(143, 'Pass', 1, 8),
(144, 'Other', 1, 9),
(145, 'Pass', 1, 9),
(146, 'First', 1, 10),
(147, '2:1', 1, 10),
(148, '2:2', 1, 10),
(149, '3rd', 1, 10),
(150, 'Pass', 1, 10),
(153, 'H1', 1, 11),
(154, 'H2', 1, 11),
(155, 'H3', 1, 11),
(156, 'H4', 1, 11),
(157, 'H5', 1, 11),
(158, 'H6', 1, 11),
(159, 'O1', 1, 12),
(160, 'O2', 1, 12),
(161, 'O3', 1, 12),
(162, 'O4', 1, 12),
(163, 'Other', 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `QualGradeMatch`
--

CREATE TABLE `QualGradeMatch` (
  `ID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `qualID` int(11) DEFAULT NULL,
  `otherQ` int(11) DEFAULT NULL,
  `gradematch` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QualGradeMatch`
--

INSERT INTO `QualGradeMatch` (`ID`, `AppID`, `qualID`, `otherQ`, `gradematch`) VALUES
(1, 1, 1, NULL, 1),
(2, 1, 2, NULL, 1),
(3, 1, 3, NULL, 1),
(4, 1, 4, NULL, 0),
(5, 1, 5, NULL, 1),
(6, 1, 6, NULL, 1),
(7, 100028, 7, NULL, 1),
(8, 100028, 8, NULL, 0),
(11, 100016, 9, NULL, 1),
(17, 1, 10, NULL, 1),
(18, 1, 1, NULL, 1),
(20, 1, NULL, 1, 0),
(21, 2, 11, NULL, 1),
(24, 2, 12, NULL, 1),
(25, 100029, 13, NULL, 1),
(26, 100029, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Qualification`
--

CREATE TABLE `Qualification` (
  `QualID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `SubjectID` int(11) DEFAULT NULL,
  `QualLevelID` int(11) DEFAULT NULL,
  `GradeID` int(11) DEFAULT NULL,
  `CountyID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `OtherLevel` varchar(255) DEFAULT NULL,
  `OtherSubject` varchar(255) DEFAULT NULL,
  `OtherGrade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Qualification`
--

INSERT INTO `Qualification` (`QualID`, `AppID`, `SubjectID`, `QualLevelID`, `GradeID`, `CountyID`, `Date`, `OtherLevel`, `OtherSubject`, `OtherGrade`) VALUES
(1, 1, 1, 1, 48, 1, '1999-02-22', NULL, NULL, NULL),
(2, 1, 1, 1, 48, 1, '2002-10-01', NULL, NULL, NULL),
(3, 1, 3, 1, 47, 1, '2002-02-22', NULL, NULL, NULL),
(4, 1, 5, 1, 49, 1, '2002-02-01', NULL, NULL, NULL),
(5, 1, 4, 1, 47, 1, '1998-02-22', NULL, NULL, NULL),
(6, 1, 11, 1, 47, 1, '2000-06-22', NULL, NULL, NULL),
(7, 100028, 1, 1, 47, 1, '1994-06-30', NULL, NULL, NULL),
(8, 100028, 30, 2, 56, 1, '1996-06-30', NULL, NULL, NULL),
(9, 100016, 1, 1, 47, 1, '1991-10-20', NULL, NULL, NULL),
(10, 1, 5, 1, 48, 1, '2002-02-22', NULL, NULL, NULL),
(11, 2, 1, 1, 47, 1, '1982-02-22', NULL, NULL, NULL),
(12, 2, 3, 1, 47, 1, '1999-02-22', NULL, NULL, NULL),
(13, 100029, 3, 1, 48, 1, '2002-06-15', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `QualLevel`
--

CREATE TABLE `QualLevel` (
  `LID` int(11) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `EdID` int(11) NOT NULL,
  `countryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QualLevel`
--

INSERT INTO `QualLevel` (`LID`, `Level`, `active`, `EdID`, `countryID`) VALUES
(1, 'GCSE', 1, 3, 1),
(2, 'A Level', 1, 4, 1),
(3, 'NVQ Level 1', 1, 2, 1),
(4, 'NVQ Level 2', 1, 3, 1),
(5, 'NVQ Level 3', 1, 5, 1),
(6, 'NVQ Level 4', 1, 5, 1),
(7, 'NVQ Level 5', 1, 6, 1),
(8, 'NVQ Level 6', 1, 6, 1),
(9, 'NVQ Level 7', 1, 7, 1),
(10, 'Bachelor Degree', 1, 8, 1),
(11, 'Leaving Certificate - Higher Level', 1, 5, 5),
(12, 'Leaving Certificate - Ordinary Level', 1, 4, 5),
(13, 'Other', 1, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `quallevelmatch`
--

CREATE TABLE `quallevelmatch` (
  `ID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `qualID` int(11) DEFAULT NULL,
  `otherQ` int(11) DEFAULT NULL,
  `lvlmatch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quallevelmatch`
--

INSERT INTO `quallevelmatch` (`ID`, `AppID`, `qualID`, `otherQ`, `lvlmatch`) VALUES
(1, 1, 1, NULL, 1),
(2, 1, 2, NULL, 1),
(3, 1, 3, NULL, 1),
(4, 1, 4, NULL, 1),
(5, 1, 5, NULL, 1),
(6, 1, 6, NULL, 1),
(7, 100028, 7, NULL, 1),
(8, 100028, 8, NULL, 0),
(11, 100016, 9, NULL, 1),
(17, 1, 10, NULL, 1),
(20, 1, NULL, 1, 0),
(21, 2, 11, NULL, 1),
(24, 2, 12, NULL, 1),
(25, 100029, 13, NULL, 1),
(26, 100029, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `QualOther`
--

CREATE TABLE `QualOther` (
  `ID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `Qual` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Grade` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QualOther`
--

INSERT INTO `QualOther` (`ID`, `AppID`, `Qual`, `Subject`, `Grade`, `date`, `country`) VALUES
(1, 1, 'EDCL', 'Typing', 'Pass', '2015-10-01', 1),
(2, 100029, 'EDCL', 'Typing', 'Pass', '2015-10-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `QualSubject`
--

CREATE TABLE `QualSubject` (
  `SubID` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `LID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QualSubject`
--

INSERT INTO `QualSubject` (`SubID`, `subject`, `active`, `LID`) VALUES
(1, 'English Language', 1, 1),
(2, 'English Literature', 1, 1),
(3, 'Mathematics', 1, 1),
(4, 'Biology', 1, 1),
(5, 'Chemistry', 1, 1),
(6, 'Physics', 1, 1),
(7, 'Computer Science', 1, 1),
(8, 'Arabic', 1, 1),
(9, 'Bengali ', 1, 1),
(10, 'Chinese Mandarin ', 1, 1),
(11, 'French ', 1, 1),
(12, 'German ', 1, 1),
(13, 'Accounting', 1, 1),
(14, 'Business Studies', 1, 1),
(15, 'Economics', 1, 1),
(16, 'Marketing', 1, 1),
(17, 'Retailing', 1, 1),
(18, 'Financing', 1, 1),
(19, 'Entrepreneurship', 1, 1),
(20, 'Design and Technology', 1, 1),
(21, 'Electronics', 1, 1),
(22, 'Engineering', 1, 1),
(23, 'Food Preparation & Nutrition', 1, 1),
(24, 'Art and Design', 1, 1),
(25, 'Dance', 1, 1),
(26, 'Drama', 1, 1),
(27, 'Film Studies', 1, 1),
(28, 'Media Studies', 1, 1),
(29, 'Music', 1, 1),
(30, 'other', 1, 13),
(31, 'Engineering Maintenance - Mechanical', 1, 5),
(32, 'Engineering Maintenance - Electrical', 1, 5),
(33, 'Engineering Maintenance - Electronic', 1, 5),
(34, 'Engineering Maintenance - Engineered Systems', 1, 5),
(35, 'Electrical Qualification', 1, 5),
(36, 'Electrical Installation (Buildings and Structures)', 1, 5),
(37, 'English', 1, 2),
(38, 'Computer Science', 1, 10),
(39, 'Art', 1, 2),
(40, 'Biology', 1, 2),
(41, 'Business', 1, 2),
(42, 'Chemistry', 1, 2),
(43, 'Classical Civilisation', 1, 2),
(44, 'Computer science', 1, 2),
(45, 'Drama and Theatre', 1, 2),
(46, 'Economics', 1, 2),
(47, 'English Language and Literature', 1, 2),
(48, 'English Literature', 1, 2),
(49, 'Film Studies', 1, 2),
(50, 'Geography', 1, 2),
(51, 'History', 1, 2),
(52, 'History of Art', 1, 2),
(53, 'Law', 1, 2),
(54, 'Maths', 1, 2),
(55, 'Media Studies', 1, 2),
(56, 'Modern Languages', 1, 2),
(57, 'Music', 1, 2),
(58, 'Philosophy', 1, 2),
(59, 'Physics', 1, 2),
(60, 'Politics', 1, 2),
(61, 'Psychology', 1, 2),
(62, 'Religious Studies', 1, 2),
(63, 'Sociology', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `QualSubMatch`
--

CREATE TABLE `QualSubMatch` (
  `ID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `qualID` int(11) DEFAULT NULL,
  `otherQ` int(11) DEFAULT NULL,
  `submatch` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QualSubMatch`
--

INSERT INTO `QualSubMatch` (`ID`, `AppID`, `qualID`, `otherQ`, `submatch`) VALUES
(1, 1, 1, NULL, 1),
(2, 1, 2, NULL, 1),
(3, 1, 3, NULL, 1),
(4, 1, 4, NULL, 0),
(5, 1, 5, NULL, 0),
(6, 1, 6, NULL, 0),
(7, 100028, 7, NULL, 1),
(8, 100028, 8, NULL, 0),
(11, 100016, 9, NULL, 1),
(17, 1, 10, NULL, 0),
(18, 1, NULL, 1, 0),
(19, 2, 11, NULL, 1),
(22, 2, 12, NULL, 1),
(23, 100029, 13, NULL, 1),
(24, 100029, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Qualuklevel`
--

CREATE TABLE `Qualuklevel` (
  `EDID` int(11) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Qualuklevel`
--

INSERT INTO `Qualuklevel` (`EDID`, `Level`, `info`, `active`) VALUES
(1, 'Entry Level', '', 0),
(2, 'Level 1', 'e.g. GCSE Grades D,E,F,G', 1),
(3, 'Level 2', 'e.g. GCSE A*,A,B,C', 1),
(4, 'Level 3', 'e.g. A Level', 1),
(5, 'Level 4', 'e.g. higher national certificate (HNC)', 1),
(6, 'Level 5', 'e.g. higher national diploma (HND)', 1),
(7, 'Level 6', 'e.g. Bachelor\'s Degree', 1),
(8, 'Level 7', 'e.g. Masters Degree', 1),
(9, 'Level 8', 'e.g. PhD', 1),
(10, 'Other', 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `RefRelation`
--

CREATE TABLE `RefRelation` (
  `ID` int(11) NOT NULL,
  `Relationship` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RefRelation`
--

INSERT INTO `RefRelation` (`ID`, `Relationship`, `active`) VALUES
(1, 'Line Manager/Supervisor', 1),
(2, 'Work Colleague', 1),
(3, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relevantJobSector`
--

CREATE TABLE `relevantJobSector` (
  `catID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `secID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relevantJobSector`
--

INSERT INTO `relevantJobSector` (`catID`, `roleID`, `secID`) VALUES
(1, 1, 1),
(2, 1, 25),
(3, 2, 5),
(4, 5, 24),
(5, 2, 26),
(6, 4, 14),
(7, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `id` int(11) NOT NULL,
  `response` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

INSERT INTO `response` (`id`, `response`, `active`) VALUES
(1, 'Yes', 1),
(2, 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `RoleID` int(11) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`RoleID`, `Role`, `active`) VALUES
(1, 'Casual Clerical', 1),
(2, 'Technician - Electrical', 1),
(3, 'Technician - Mechanical', 1),
(4, 'Technician - IT', 1),
(5, 'Technician - General Lab', 1);

-- --------------------------------------------------------

--
-- Table structure for table `RoleExpLength`
--

CREATE TABLE `RoleExpLength` (
  `ID` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RoleExpLength`
--

INSERT INTO `RoleExpLength` (`ID`, `length`, `period`, `RoleID`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 2, 1, 3),
(4, 2, 1, 5),
(5, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `RoleNewMap`
--

CREATE TABLE `RoleNewMap` (
  `ID` int(11) NOT NULL,
  `OldRole` int(11) NOT NULL,
  `NewRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RoleQualMin`
--

CREATE TABLE `RoleQualMin` (
  `ID` int(11) NOT NULL,
  `TotalQual` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `qtype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RoleQualMin`
--

INSERT INTO `RoleQualMin` (`ID`, `TotalQual`, `RoleID`, `qtype`) VALUES
(1, 5, 1, 1),
(2, 1, 2, 5),
(3, 1, 3, 5),
(4, 1, 4, 5),
(5, 1, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `RoleReqGrade`
--

CREATE TABLE `RoleReqGrade` (
  `ID` int(11) NOT NULL,
  `Grade` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RoleReqGrade`
--

INSERT INTO `RoleReqGrade` (`ID`, `Grade`, `RoleID`, `active`) VALUES
(1, 45, 1, 1),
(2, 46, 1, 1),
(3, 47, 1, 1),
(4, 48, 1, 1),
(5, 94, 2, 1),
(6, 94, 5, 1),
(7, 94, 4, 1),
(8, 94, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RoleReqQual`
--

CREATE TABLE `RoleReqQual` (
  `ID` int(11) NOT NULL,
  `QualID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RoleReqQual`
--

INSERT INTO `RoleReqQual` (`ID`, `QualID`, `RoleID`, `active`) VALUES
(1, 1, 1, 1),
(2, 5, 2, 1),
(3, 5, 5, 1),
(4, 5, 4, 1),
(5, 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RoleReqSubject`
--

CREATE TABLE `RoleReqSubject` (
  `ID` int(11) NOT NULL,
  `SubJectID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RoleReqSubject`
--

INSERT INTO `RoleReqSubject` (`ID`, `SubJectID`, `RoleID`, `active`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 1),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RoleRequiredExp`
--

CREATE TABLE `RoleRequiredExp` (
  `ID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `sectorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RoleRequiredExp`
--

INSERT INTO `RoleRequiredExp` (`ID`, `roleID`, `sectorID`) VALUES
(1, 1, 1),
(2, 1, 13),
(3, 2, 5),
(4, 4, 14),
(5, 1, 25),
(6, 1, 21),
(7, 5, 24),
(8, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `School`
--

CREATE TABLE `School` (
  `SID` int(11) NOT NULL,
  `School` varchar(255) NOT NULL,
  `Acronym` varchar(10) DEFAULT NULL,
  `FacultyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `School`
--

INSERT INTO `School` (`SID`, `School`, `Acronym`, `FacultyID`) VALUES
(1, 'Arts, English and Languages', 'AEL', 2),
(2, 'History, Anthropology, Philosophy and Politics', 'HAPP', 2),
(3, 'Law', NULL, 2),
(4, 'Social Sciences, Education and Social Work', 'SSESW', 2),
(5, 'Queen\'s Management School', 'QMS', 2),
(6, 'Chemistry and Chemical Engineering', 'CCE', 3),
(7, 'Electronics, Electrical Engineering and Computer Sciences', NULL, 3),
(8, 'Mechanical and Aerospace Engineering', 'MAE', 3),
(9, 'Natural and Built Environment', 'NBE', 3),
(10, 'Psychology', NULL, 3),
(11, 'Biological Sciences', NULL, 4),
(12, 'Medicine, Dentistry and Biomedical Sciences', 'MDBS', 4),
(13, 'Nursing and Midwifery', NULL, 4),
(14, 'Pharmacy', NULL, 4),
(15, 'Academic and Student Affairs', 'DASA', 1),
(16, 'Development and Alumni Relations', 'DARO', 1),
(17, 'Estates', NULL, 1),
(18, 'Finance', NULL, 1),
(19, 'Human Resources', 'HR', 1),
(20, 'Information Services', 'IS', 1),
(21, 'Research and Enterprise', 'R&E', 1),
(22, 'Student Plus', NULL, 1),
(23, 'Marketing, Recruitment, Communications And Internationalisation', 'MRCI', 1),
(24, 'N/A', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Sex`
--

CREATE TABLE `Sex` (
  `SexID` int(11) NOT NULL,
  `Sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sex`
--

INSERT INTO `Sex` (`SexID`, `Sex`) VALUES
(1, 'Female'),
(2, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `Skill`
--

CREATE TABLE `Skill` (
  `SkillID` int(11) NOT NULL,
  `Skill` varchar(255) NOT NULL,
  `SkillCatID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Skill`
--

INSERT INTO `Skill` (`SkillID`, `Skill`, `SkillCatID`, `active`) VALUES
(1, 'Other', 9, 1),
(2, 'Answering Phone', 1, 1),
(3, 'Billing', 1, 1),
(4, 'Scheduling', 1, 1),
(5, 'MS Office', 10, 1),
(6, 'Calendar Management', 1, 1),
(7, 'Programming Languages', 4, 1),
(8, 'Web Development', 4, 1),
(9, 'Help desk', 4, 1),
(11, 'CAD', 5, 1),
(14, 'Troubleshooting', 4, 1),
(15, 'Research', 8, 1),
(16, 'Forecasting', 8, 1),
(17, 'Problem Solving', 8, 1),
(18, 'Data Mining', 8, 1),
(19, 'Creativity', 8, 1),
(20, 'Diagnostics', 8, 1),
(21, 'Data Entry', 1, 1),
(24, 'Email', 10, 1),
(26, 'Database Management', 10, 1),
(28, 'Graphics', 10, 1),
(29, 'Java', 11, 1),
(30, 'MySQL', 11, 1),
(31, 'SQL', 11, 1),
(33, 'C++', 11, 1),
(34, 'Python', 11, 1),
(35, 'System Administration', 12, 1),
(36, 'Network Configuration', 12, 1),
(37, 'Software Installation', 12, 1),
(38, 'Tech Support', 12, 1),
(39, 'Windows', 12, 1),
(40, 'Web Development', 13, 1),
(41, 'Open Source', 13, 1),
(42, 'Data Structures', 13, 1),
(43, 'Coding', 13, 1),
(44, 'Security ', 13, 1),
(46, 'Debugging', 13, 1),
(47, 'qfis', 14, 1),
(48, 'qsis', 14, 1),
(49, 'PlanOn', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `SkillCategory`
--

CREATE TABLE `SkillCategory` (
  `SkillCatID` int(11) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SkillCategory`
--

INSERT INTO `SkillCategory` (`SkillCatID`, `Category`, `active`) VALUES
(1, 'Office and Administration', 1),
(2, 'Sales, Retail and Customer Service', 1),
(3, 'Healthcare and Nursing', 1),
(4, 'IT', 1),
(5, 'Engineering and Technical', 1),
(6, 'Advertising and Marketing', 1),
(7, 'Management and Project Management', 1),
(8, 'Analytical Skills', 1),
(9, 'Other', 1),
(10, 'Computer Skill', 1),
(11, 'Software Skills', 1),
(12, 'Computer Hardware Skill', 1),
(13, 'Advanced Computer Skills', 1),
(14, 'QUB Skill', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skillOtherMem`
--

CREATE TABLE `skillOtherMem` (
  `OtherSkillID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `OtherSkill` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skillOtherMem`
--

INSERT INTO `skillOtherMem` (`OtherSkillID`, `AppID`, `OtherSkill`, `catID`) VALUES
(1, 1, 'Typing', 1),
(3, 1, 'Customer Service', 2),
(5, 2, 'Photoshop', 11),
(6, 2, 'Money Handling', 2),
(7, 1, 'Photoshop', 11);

-- --------------------------------------------------------

--
-- Table structure for table `SkillSetMem`
--

CREATE TABLE `SkillSetMem` (
  `ID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `SkillID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SkillSetMem`
--

INSERT INTO `SkillSetMem` (`ID`, `AppID`, `SkillID`) VALUES
(7, 1, 6),
(10, 1, 21),
(12, 100028, 3),
(13, 100028, 7),
(14, 100028, 35),
(15, 100028, 49),
(16, 100028, 3),
(17, 1, 2),
(18, 2, 4),
(19, 2, 21),
(20, 2, 8),
(21, 2, 7),
(22, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sllist`
--

CREATE TABLE `sllist` (
  `ID` int(11) NOT NULL,
  `Outcome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sllist`
--

INSERT INTO `sllist` (`ID`, `Outcome`) VALUES
(1, 'Reject'),
(2, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `StaffDetails`
--

CREATE TABLE `StaffDetails` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TitleID` int(11) NOT NULL,
  `Forename` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `ContactNo` varchar(255) DEFAULT NULL,
  `SchoolID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StaffDetails`
--

INSERT INTO `StaffDetails` (`ID`, `UserID`, `TitleID`, `Forename`, `Surname`, `ContactNo`, `SchoolID`, `DepartmentID`) VALUES
(1, 1, 3, 'Karen', 'Green', '5220', 20, 12),
(2, 100000, 3, 'Kara', 'McBride', NULL, 20, 1),
(3, 100001, 5, 'Simon', 'Fuller', NULL, 1, 2),
(4, 100004, 2, 'Sian', 'Millar', '1236', 8, 12),
(10, 100010, 1, 'Kevin', 'Smith', '4629', 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `StaffLoginTime`
--

CREATE TABLE `StaffLoginTime` (
  `LoginTimeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `StaffNotification`
--

CREATE TABLE `StaffNotification` (
  `NotificaitonID` int(11) NOT NULL,
  `emailID` int(11) NOT NULL,
  `StaffID` int(11) NOT NULL,
  `NotificationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `StaffUser`
--

CREATE TABLE `StaffUser` (
  `UserID` int(11) NOT NULL,
  `StaffNo` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `Defusertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StaffUser`
--

INSERT INTO `StaffUser` (`UserID`, `StaffNo`, `email`, `pw`, `Defusertype`) VALUES
(1, 1234567, 'karen.green82@gmail.com', 'b4af804009cb036a4ccdc33431ef9ac9', 1),
(100000, 3047407, 'k.green@qub.com', 'b4af804009cb036a4ccdc33431ef9ac9', 2),
(100001, 3052016, 'test@testemail.com', 'b4af804009cb036a4ccdc33431ef9ac9', 3),
(100002, 1, 'tester@email.com', '1234', 3),
(100003, 9876543, 'k.green05@test.com', '1a1dc91c907325c69271ddf0c944bc72', 3),
(100004, 78954239, 'kareng@textt.com', '1a1dc91c907325c69271ddf0c944bc72', 3),
(100010, 852346, 'gg@email.com', '1a1dc91c907325c69271ddf0c944bc72', 3);

-- --------------------------------------------------------

--
-- Table structure for table `StaffUserType`
--

CREATE TABLE `StaffUserType` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `defaultType` tinyint(4) DEFAULT NULL,
  `active` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StaffUserType`
--

INSERT INTO `StaffUserType` (`ID`, `UserID`, `UserTypeID`, `defaultType`, `active`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 0, 1),
(3, 1, 3, 0, 1),
(12, 100010, 3, 1, 1),
(13, 100000, 2, 1, 1),
(14, 100001, 3, 1, 1),
(15, 100002, 3, 1, 1),
(16, 100003, 3, 1, 1),
(17, 100004, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Stage`
--

CREATE TABLE `Stage` (
  `StageID` int(11) NOT NULL,
  `Stage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Stage`
--

INSERT INTO `Stage` (`StageID`, `Stage`) VALUES
(1, 'Submitted'),
(2, 'Rejected'),
(3, 'Document Check'),
(4, 'Reject at Document Check'),
(5, 'Approved for STAR ');

-- --------------------------------------------------------

--
-- Table structure for table `STARExperience`
--

CREATE TABLE `STARExperience` (
  `ExperienceID` int(11) NOT NULL,
  `PostRecordID` int(11) NOT NULL,
  `ExperienceGained` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STARHoursAvailable`
--

CREATE TABLE `STARHoursAvailable` (
  `HrsID` int(11) NOT NULL,
  `appID` int(11) NOT NULL,
  `MonAm` tinyint(1) NOT NULL,
  `MonPM` tinyint(1) NOT NULL,
  `TuesAm` tinyint(1) NOT NULL,
  `TuesPM` tinyint(1) NOT NULL,
  `WedAM` tinyint(1) NOT NULL,
  `WedPM` tinyint(1) NOT NULL,
  `ThursAM` tinyint(1) NOT NULL,
  `ThursPM` tinyint(1) NOT NULL,
  `FriAM` tinyint(1) NOT NULL,
  `FriPM` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STARMember`
--

CREATE TABLE `STARMember` (
  `ID` int(11) NOT NULL,
  `NSPNo` int(11) DEFAULT NULL,
  `ApplicantID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STARMember`
--

INSERT INTO `STARMember` (`ID`, `NSPNo`, `ApplicantID`, `StatusID`) VALUES
(1, NULL, 2, 1),
(2, 2058469, 100016, 2);

-- --------------------------------------------------------

--
-- Table structure for table `STARPositionRecord`
--

CREATE TABLE `STARPositionRecord` (
  `PostRecordID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `CurrentPositiion` tinyint(1) NOT NULL,
  `DateAssigned` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STARPostDates`
--

CREATE TABLE `STARPostDates` (
  `PostDateID` int(11) NOT NULL,
  `PostRecordID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `RequiredBreak` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statement`
--

CREATE TABLE `statement` (
  `statementID` int(11) NOT NULL,
  `statement` text NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statement`
--

INSERT INTO `statement` (`statementID`, `statement`, `RoleID`) VALUES
(1, 'A minimum of 5 GCSEs or equivalent Grades A-C, including English Language and Maths with either a recognised IT/Word Processing qualification e.g. CLAIT, ECDL, OCR/RSA or 6 months’ experience inputting data/word processing ', 1),
(2, 'Either a minimum of 1 year’s experience of working in an office environment within the last 5 years with duties similar to those outlined in the Job Summary or have a minimum of 6 months’ experience of working in an office environment within the last 5 years with duties similar to those outlined in the Job Summary and a recognised IT/ word processing qualification, e.g. CLAIT, ECDL, OCR/RSA ', 1),
(3, 'Please provide any other details / experience that is relevant to the post ', 1),
(4, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level 3 in relevant subject (or equivalent) OR 2 years relevant work experience ', 2),
(5, 'Please provide any other details / experience that is relevant to the post ', 2),
(6, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level 3 in relevant subject (or equivalent) OR 2 years relevant work experience ', 5),
(7, 'Please provide any other details / experience that is relevant to the post ', 5),
(8, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level 3 in relevant subject (or equivalent) OR 2 years relevant work experience ', 4),
(9, 'Please provide any other details / experience that is relevant to the post ', 4),
(10, 'Academic and/or vocational qualifications ie OND/ONC and/or NVQ level 3 in relevant subject (or equivalent) OR 2 years relevant work experience ', 3),
(11, 'Please provide any other details / experience that is relevant to the post', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `StatusID` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`StatusID`, `Status`) VALUES
(1, 'Available for position'),
(2, 'Inactive'),
(3, 'In Post'),
(4, 'Archived');

-- --------------------------------------------------------

--
-- Table structure for table `Title`
--

CREATE TABLE `Title` (
  `TitleID` int(11) NOT NULL,
  `Title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Title`
--

INSERT INTO `Title` (`TitleID`, `Title`) VALUES
(1, 'Mr'),
(2, 'Mrs'),
(3, 'Miss'),
(4, 'Ms'),
(5, 'Dr'),
(6, 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `UserType`
--

CREATE TABLE `UserType` (
  `UserTypeID` int(11) NOT NULL,
  `UserType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserType`
--

INSERT INTO `UserType` (`UserTypeID`, `UserType`) VALUES
(1, 'Administrator'),
(2, 'HR User'),
(3, 'Manager User'),
(4, 'STAR Applicant'),
(5, 'STAR Member');

-- --------------------------------------------------------

--
-- Table structure for table `zAppEquivalent`
--

CREATE TABLE `zAppEquivalent` (
  `EquivID` int(11) NOT NULL,
  `qualID` int(11) NOT NULL,
  `UKLevel` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `CheckRequired` varchar(10) DEFAULT NULL,
  `nonukSub` varchar(255) NOT NULL,
  `nonukGrade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zApplicationNotificaiton`
--

CREATE TABLE `zApplicationNotificaiton` (
  `NotificationID` int(11) NOT NULL,
  `AppID` int(11) NOT NULL,
  `emailID` int(11) NOT NULL,
  `NotificaitonDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zApplicationPersDetails`
--

CREATE TABLE `zApplicationPersDetails` (
  `id` int(11) NOT NULL,
  `detailscorrect` varchar(10) NOT NULL,
  `applicationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zApplicationPersDetails`
--

INSERT INTO `zApplicationPersDetails` (`id`, `detailscorrect`, `applicationID`) VALUES
(1, 'Correct', 11);

-- --------------------------------------------------------

--
-- Table structure for table `zApplicationSubject`
--

CREATE TABLE `zApplicationSubject` (
  `subid` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zApplicationSubject`
--

INSERT INTO `zApplicationSubject` (`subid`, `Subject`, `active`) VALUES
(12, 'English Language', 1),
(13, 'English Literature', 1),
(14, 'Mathematics', 1),
(15, 'Biology', 1),
(16, 'Chemistry', 1),
(17, 'Physics', 1),
(18, 'Computer Science', 1),
(19, 'Arabic', 1),
(20, 'Bengali ', 1),
(21, 'Chinese Mandarin ', 1),
(22, 'French ', 1),
(23, 'German ', 1),
(24, 'Greek ', 1),
(25, 'Gujarati ', 1),
(26, 'Modern Hebrew ', 1),
(27, 'Italian ', 1),
(28, 'Japanese ', 1),
(29, 'Panjabi ', 1),
(30, 'Persian ', 1),
(31, 'Polish ', 1),
(32, 'Portuguese ', 1),
(33, 'Russian ', 1),
(34, 'Spanish ', 1),
(35, 'Turkish ', 1),
(36, 'Urdu ', 1),
(37, 'Biblical Hebrew', 1),
(38, 'Latin ', 1),
(39, 'Classical Greek', 1),
(40, 'History', 1),
(41, 'Geography', 1),
(42, 'Astronomy', 1),
(43, 'Geology', 1),
(44, 'Psychology', 1),
(45, 'Statistics', 1),
(46, 'Ancient History', 1),
(47, 'Citizenship Studies', 1),
(48, 'Classical Civilisation', 1),
(49, 'Religious Studies', 1),
(50, 'Sociology', 1),
(51, 'Philosophy', 1),
(52, 'Accounting', 1),
(53, 'Business Studies', 1),
(54, 'Economics', 1),
(55, 'Marketing', 1),
(56, 'Retailing', 1),
(57, 'Financing', 1),
(58, 'Entrepreneurship', 1),
(59, 'Design and Technology', 1),
(60, 'Electronics', 1),
(61, 'Engineering', 1),
(62, 'Food Preparation & Nutrition', 1),
(63, 'Art and Design', 1),
(64, 'Dance', 1),
(65, 'Drama', 1),
(66, 'Film Studies', 1),
(67, 'Media Studies', 1),
(68, 'Music', 1),
(69, 'Physical Education', 1),
(70, 'Agriculture and Land Use', 1),
(71, 'Applied ICT', 1),
(72, 'Business and Communication Systems', 1),
(73, 'Child Development', 1),
(74, 'Construction and the Built Environment', 1),
(75, 'Contemporary Crafts', 1),
(76, 'Digital Technology', 1),
(77, 'Further Mathematics', 1),
(78, 'Government and Politics', 1),
(79, 'Health and Social Care', 1),
(80, 'Home Economics', 1),
(81, 'Hospitality', 1),
(82, 'Irish', 1),
(83, 'Gaeilge', 1),
(84, 'Journalism in the Media and Communications Industry', 1),
(85, 'Learning for Life and Work', 1),
(86, 'Leisure, Travel and Tourism', 1),
(87, 'Motor Vehicle and Road User Studies', 1),
(88, 'Moving Image Arts', 1),
(89, 'Short Course Religious Studies', 1),
(90, 'Information and Communication Technology', 1),
(91, 'Welsh Language -first language', 1),
(92, 'Welsh Literature - first language', 1),
(93, 'Welsh Second Language', 1),
(94, 'other', 1),
(95, 'Art', 1),
(96, 'Biology', 1),
(97, 'Business', 1),
(98, 'Chemistry', 1),
(99, 'Classical Civilisation', 1),
(100, 'Computer science', 1),
(101, 'Drama and Theatre', 1),
(102, 'Economics', 1),
(103, 'English Language and Literature', 1),
(104, 'English Literature', 1),
(105, 'Film Studies', 1),
(106, 'Geography', 1),
(107, 'History', 1),
(108, 'History of Art', 1),
(109, 'Law', 1),
(110, 'Maths', 1),
(111, 'Media Studies', 1),
(112, 'Modern Languages', 1),
(113, 'Music', 1),
(114, 'Philosophy', 1),
(115, 'Physics', 1),
(116, 'Politics', 1),
(117, 'Psychology', 1),
(118, 'Religious Studies', 1),
(119, 'Sociology', 1),
(120, 'NVQ Certificate in Design Support - QCF', 1),
(121, 'Financing', 1),
(122, 'Other', 1),
(123, 'NVQ Diploma In Professional Competence for Crane Technicians QCF', 1),
(124, 'NVQ Diploma In Professional Competence for Grips QCF', 1),
(125, 'NVQ Diploma in Professional Competence for Stagehands QCF', 1),
(126, 'NVQ Diploma in Design QCF', 1),
(127, 'NVQ Diploma in Professional Competence for Advanced Grips QCF', 1),
(128, 'NVQ Diploma in Professional Competence for Supervisory Stagehands QCF', 1),
(129, 'NVQ Diploma in Design Management QCF', 1),
(130, 'NVQ Award in Sport and Active Leisure', 1),
(131, 'NVQ Award in Sport and Active Leisure QCF', 1),
(132, 'NVQ Award in Mechanical Ride Operation QCF', 1),
(133, 'NVQ Certificate in Active Leisure, Learning and Well-being Operational Services', 1),
(134, 'NVQ Certificate in Active Leisure, Learning and Wellbeing Operational Services QCF', 1),
(135, 'NVQ Certificate in Active Leisure, Learning and Well-being Operational Services QCF', 1),
(136, 'NVQ Certificate in Activity Leadership QCF', 1),
(137, 'NVQ Certificate in Spectator Safety QCF', 1),
(138, 'NVQ Certificate in Sport and Play Surfaces QCF', 1),
(139, 'NVQ Certificate in Tourism Services QCF', 1),
(140, 'NVQ Diploma in Gambling Operations QCF', 1),
(141, 'NVQ Diploma in Instructing Exercise & Fitness QCF', 1),
(142, 'NVQ Diploma in Instructing Exercise and Fitness QCF', 1),
(143, 'NVQ Diploma in Travel Services', 1),
(144, 'NVQ Diploma in Travel Services QCF', 1),
(145, 'NVQ in Sport, Recreation and Allied Occupations: Coaching, Teaching, Instructing', 1),
(146, 'NVQ Certificate in Spectator Safety QCF', 1),
(147, 'NVQ Diploma in Achieving Excellence in Sports Performance QCF', 1),
(148, 'NVQ Diploma in Gambling Operations QCF', 1),
(149, 'NVQ Diploma in Leisure Management QCF', 1),
(150, 'NVQ Diploma in Outdoor Programmes QCF', 1),
(151, 'NVQ Diploma in Personal Training QCF', 1),
(152, 'NVQ Diploma in Sports Development', 1),
(153, 'NVQ Diploma in Sports Development QCF', 1),
(154, 'NVQ Diploma in Travel Services QCF', 1),
(155, 'NVQ in Coaching', 1),
(156, 'NVQ Diploma in Spectator Safety Management QCF', 1),
(157, 'NVQ Certificate in Accommodation Services QCF', 1),
(158, 'NVQ Certificate in Beauty Therapy QCF', 1),
(159, 'NVQ Certificate in Food and beverage service QCF', 1),
(160, 'NVQ Certificate in Food preparation and Cooking QCF', 1),
(161, 'NVQ Certificate in Hairdressing African Type Hair QCF', 1),
(162, 'NVQ Certificate in Hairdressing and Barbering QCF', 1),
(163, 'NVQ Certificate in Hospitality Services QCF', 1),
(164, 'NVQ Diploma in Hairdressing African Type Hair and Beauty Therapy QCF', 1),
(165, 'NVQ Diploma in Hairdressing and Beauty Therapy QCF', 1),
(166, 'NVQ Award in Advise and Consult With Clients QCF', 1),
(167, 'NVQ Award in Applying Skin Camouflage QCF', 1),
(168, 'NVQ Award in Assist with Spa Therapy QCF', 1),
(169, 'NVQ Award in Attaching Hair to Enhance a Style QCF', 1),
(170, 'NVQ Award in Change Men’s Hair Colour QCF', 1),
(171, 'NVQ Award in Changing Hair Colour QCF', 1),
(172, 'NVQ Award in Changing Men’s Hair Colour QCF', 1),
(173, 'NVQ Award in Colouring African Type Hair QCF', 1),
(174, 'NVQ Award in Create Basic Patterns in Hair QCF', 1),
(175, 'NVQ Award in Creating Basic Patterns in Hair QCF', 1),
(176, 'NVQ Award In Cut Facial Hair Using Basic Techniques QCF', 1),
(177, 'NVQ Award in Cut Hair Using Basic Techniques QCF', 1),
(178, 'NVQ Award in Cutting African Type Hair QCF', 1),
(179, 'NVQ Award in Cutting Facial Hair QCF', 1),
(180, 'NVQ Award in Cutting Hair QCF', 1),
(181, 'NVQ Award in Cutting Men’s Hair QCF', 1),
(182, 'NVQ Award in Develop and Maintain Effectiveness at Work QCF', 1),
(183, 'NVQ Award in Dry and Finish Men’s Hair QCF', 1),
(184, 'NVQ Award in Ear Piercing QCF', 1),
(185, 'NVQ Award in Eyebrow and Eyelash Treatments QCF', 1),
(186, 'NVQ Award in Facial Skin Care QCF', 1),
(187, 'NVQ Award in Instruct Clients in the Use and Application of Skin Care Products and Make-up QCF', 1),
(188, 'NVQ Award in Lash and Eyebrow Treatments QCF', 1),
(189, 'NVQ Award in Make-Up QCF', 1),
(190, 'NVQ Award in Make-up Services QCF', 1),
(191, 'NVQ Award in Manicure Services QCF', 1),
(192, 'NVQ Award in Nail Art Services QCF', 1),
(193, 'NVQ Award in Nail Enhancements QCF', 1),
(194, 'NVQ Award in Pedicure Services QCF', 1),
(195, 'NVQ Award in Perm African Type Hair QCF', 1),
(196, 'NVQ Award in Perm and Neutralise Hair QCF', 1),
(197, 'NVQ Award in Perming and Neutralising Hair QCF', 1),
(198, 'NVQ Award in Plait and Twist Hair QCF', 1),
(199, 'NVQ Award in Plaiting and Twisting Hair QCF', 1),
(200, 'NVQ Award in Providing Manicure Services QCF', 1),
(201, 'NVQ Award in Providing Pedicure Services QCF', 1),
(202, 'NVQ Award in Relax Hair QCF', 1),
(203, 'NVQ Award in Relaxing Hair QCF', 1),
(204, 'NVQ Award in Salon Reception QCF', 1),
(205, 'NVQ Award in Scalp Massage Services QCF', 1),
(206, 'NVQ Award in Set and Dress Hair QCF', 1),
(207, 'NVQ Award in Setting and Dressing African Type Hair QCF', 1),
(208, 'NVQ Award in Setting and Dressing Hair QCF', 1),
(209, 'NVQ Award in Shampoo, Condition and Treat the Hair and Scalp QCF', 1),
(210, 'NVQ Award in Shampooing, Conditioning and Treating the Hair and Scalp QCF', 1),
(211, 'NVQ Award in Style and Finish African Type Hair QCF', 1),
(212, 'NVQ Award In Style and Finish Hair QCF', 1),
(213, 'NVQ Award in Styling and Finishing African Type Hair QCF', 1),
(214, 'NVQ Award in Styling and Finishing Hair QCF', 1),
(215, 'NVQ Award in Styling Hair Using Twisting Techniques QCF', 1),
(216, 'NVQ Award in Support Client Service Improvements QCF', 1),
(217, 'NVQ Award in Threading Services QCF', 1),
(218, 'NVQ Award in Waxing Services QCF', 1),
(219, 'NVQ Certificate in Drinks Dispense Systems QCF', 1),
(220, 'NVQ Diploma in Barbering QCF', 1),
(221, 'NVQ Diploma in Barbering African Type Hair QCF', 1),
(222, 'NVQ Diploma in Beauty Therapy – General QCF', 1),
(223, 'NVQ Diploma in Beauty Therapy – make up QCF', 1),
(224, 'NVQ Diploma in Beauty Therapy – Make-up QCF', 1),
(225, 'NVQ Diploma in Beauty Therapy QCF', 1),
(226, 'NVQ Diploma in Beauty Therapy General QCF', 1),
(227, 'NVQ Diploma in Beauty Therapy Make-up QCF', 1),
(228, 'NVQ Diploma in Beverage Service QCF', 1),
(229, 'NVQ Diploma in Chemically Treated African Type Hair QCF', 1),
(230, 'NVQ Diploma in Craft Cuisine QCF', 1),
(231, 'NVQ Diploma in Food and Beverage Service QCF', 1),
(232, 'NVQ Diploma in Food Production and Cooking QCF', 1),
(233, 'NVQ Diploma in Food Service QCF', 1),
(234, 'NVQ Diploma in Front of House Reception QCF', 1),
(235, 'NVQ Diploma in Gambling Operations QCF', 1),
(236, 'NVQ Diploma in Hairdressing (Combined Hair Types) QCF', 1),
(237, 'NVQ Diploma in Hairdressing QCF', 1),
(238, 'NVQ Diploma in Hospitality Services QCF', 1),
(239, 'NVQ Diploma in Housekeeping QCF', 1),
(240, 'NVQ Diploma in Kitchen Services QCF', 1),
(241, 'NVQ Diploma in Nail Services QCF', 1),
(242, 'NVQ Diploma in Professional Cookery (Bangladeshi Cuisine) QCF', 1),
(243, 'NVQ Diploma in Professional Cookery (Chinese Cuisine) QCF', 1),
(244, 'NVQ Diploma in Professional Cookery (Indian Cuisine) QCF', 1),
(245, 'NVQ Diploma in Professional Cookery (Preparation and Cooking) QCF', 1),
(246, 'NVQ Diploma in Professional Cookery QCF', 1),
(247, 'NVQ Diploma in Professional Cookery (Thai Cuisine) QCF', 1),
(248, 'NVQ Diploma in Treating Natural African Type Hair QCF', 1),
(249, 'NVQ Award in Airbrush Designs for Nails QCF', 1),
(250, 'NVQ Award in Airbrush Make-Up QCF', 1),
(251, 'NVQ Award in Body Electrical Treatments QCF', 1),
(252, 'NVQ Award in Body Massage Treatments QCF', 1),
(253, 'NVQ Award in Developing and Enhancing your Creative Hairdressing Skills QCF', 1),
(254, 'NVQ Award in Enhance and Maintain Nail Using Liquid and Powder QCF', 1),
(255, 'NVQ Diploma in Hospitality Supervision and Leadership QCF', 1),
(256, 'NVQ Diploma in Hospitality, Supervision and Leadership QCF', 1),
(257, 'NVQ Diploma in Housing QCF', 1),
(258, 'NVQ Diploma in Nail Services QCF', 1),
(259, 'NVQ Certificate in Custodial Care QCF', 1),
(260, 'NVQ Certificate in Housing QCF', 1),
(261, 'NVQ Certificate in Pharmacy Service Skills QCF', 1),
(262, 'NVQ Certificate In Removing Non-hazardous Wastes - Construction QCF', 1),
(263, 'NVQ Diploma in Court/Tribunal Administration QCF', 1),
(264, 'NVQ Diploma in Court/Tribunal Operations QCF', 1),
(265, 'NVQ Diploma in Public Services – Operational Delivery (Uniformed)', 1),
(266, 'NVQ Diploma in Removal of Hazardous Waste (construction) QCF', 1),
(267, 'NVQ in Contribute to the Search and/or Disposal Function', 1),
(268, 'Other', 1),
(269, 'Diploma in Playwork NVQ QCF', 1),
(270, 'NVQ Certificate in Advice and Guidance QCF', 1),
(271, 'NVQ Certificate in Housing QCF', 1),
(272, 'NVQ Certificate in Occupational Health and Safety QCF', 1),
(273, 'NVQ Certificate in Witness Care QCF', 1),
(274, 'NVQ Diploma in Court/Tribunal Operations QCF', 1),
(275, 'NVQ Diploma in Custodial Care QCF', 1),
(276, 'NVQ Diploma in Emergency Fire Services Operations in the Community QCF', 1),
(277, 'NVQ Diploma in Housing QCF', 1),
(278, 'NVQ Diploma in Pharmacy Service Skills QCF', 1),
(279, 'NVQ in Community Justice: Community Safety and Crime Reduction', 1),
(280, 'NVQ in Community Justice: Work with Offending Behaviour', 1),
(281, 'NVQ in Community Justice: Work with Victims, Survivors and Witnesses', 1),
(282, 'NVQ in Emergency Fire Services – Watch Management', 1),
(283, 'NVQ in Fire and Rescue Sector Control Operations', 1),
(284, 'NVQ in Search for and Disposal of Munitions', 1),
(285, 'NVQ in Supervisory Management of Munition Clearance and/or Specified Targets', 1),
(286, 'NVQ in Youth Justice Services', 1),
(287, 'Other', 1),
(288, 'NVQ Diploma in Advice and Guidance QCF', 1),
(289, 'NVQ in Children’s Care, Learning and Development', 1),
(290, 'NVQ in Community Justice: Community Safety and Crime Reduction', 1),
(291, 'NVQ in Community Justice: Work with Offending Behaviour', 1),
(292, 'NVQ in Community Justice: Work with Victims, Survivors and Witnesses', 1),
(293, 'NVQ in Planning and Management of Munition Clearance Operations', 1),
(294, 'NVQ in Youth Justice Services', 1),
(295, 'Other', 1),
(296, 'Diploma in Playwork NVQ QCF', 1),
(297, 'NVQ Diploma in Occupational Health and Safety Practice QCF', 1),
(298, 'NVQ in Management of Health and Safety', 1),
(299, 'Other', 1),
(300, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `zAppLoginTime`
--

CREATE TABLE `zAppLoginTime` (
  `LoginTimeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zAppLoginTime`
--

INSERT INTO `zAppLoginTime` (`LoginTimeID`, `UserID`, `loginTime`) VALUES
(1, 1, '2020-03-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `zEmail`
--

CREATE TABLE `zEmail` (
  `emailID` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Body` text NOT NULL,
  `AttachementID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zNVQCategory`
--

CREATE TABLE `zNVQCategory` (
  `NVQCAtID` int(11) NOT NULL,
  `Cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zNVQCategory`
--

INSERT INTO `zNVQCategory` (`NVQCAtID`, `Cat`) VALUES
(1, 'NVQ Courses in Crafts, Creative Arts and Design & Media and Communication'),
(2, 'NVQ Courses in Sport, Leisure and Recreation & Travel and Tourism\r\n'),
(3, 'NVQ Courses in Service Enterprises & Hospitality and Catering\r\n'),
(4, 'NVQ Courses in Building and Construction & Warehousing and Distribution\r\n'),
(5, 'NVQ Courses in Engineering, Manufacturing Technologies and Transportation Operations and Maintenance\r\n'),
(6, 'NVQ Courses in Science, Horticulture, Animal Care and Veterinary Science\r\n'),
(7, 'NVQ Courses in Marketing and Sales, Administration and Business Management\r\n'),
(8, 'NVQ Courses in Direct Training and Support\r\n'),
(9, 'NVQ Courses in Languages, Literature and Culture\r\n'),
(10, 'NVQ Courses in Health and Social Care, Public Services and Child Development\r\n'),
(11, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `zPostContactList`
--

CREATE TABLE `zPostContactList` (
  `ContactID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `STARNoID` int(11) NOT NULL,
  `Notes` text NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AppAvail`
--
ALTER TABLE `AppAvail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkapplicant` (`AppID`),
  ADD KEY `fkstatus` (`AvailID`);

--
-- Indexes for table `ApplicantDetails`
--
ALTER TABLE `ApplicantDetails`
  ADD PRIMARY KEY (`AppID`),
  ADD UNIQUE KEY `ApplicantID` (`ApplicantID`),
  ADD KEY `FK_AppTitle` (`TitleID`),
  ADD KEY `FK_PreferredHrsType` (`hrsTypeID`),
  ADD KEY `FK_Sex` (`SexID`),
  ADD KEY `FK_Nationality` (`NationID`);

--
-- Indexes for table `ApplicantLogin`
--
ALTER TABLE `ApplicantLogin`
  ADD PRIMARY KEY (`ApplicantID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD KEY `FKAppUserType` (`userTypeID`);

--
-- Indexes for table `Application`
--
ALTER TABLE `Application`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `FK_RoleApplied` (`roleID`),
  ADD KEY `FK_Applicant` (`AppID`),
  ADD KEY `appstage_FK` (`appStage`);

--
-- Indexes for table `ApplicationExperience`
--
ALTER TABLE `ApplicationExperience`
  ADD PRIMARY KEY (`EmploymentID`),
  ADD KEY `FKJobSector` (`JobSectorID`),
  ADD KEY `FKApplicaitonExperience` (`AppID`);

--
-- Indexes for table `ApplicationExpJobSector`
--
ALTER TABLE `ApplicationExpJobSector`
  ADD PRIMARY KEY (`JobSectorID`);

--
-- Indexes for table `applicationStageRec`
--
ALTER TABLE `applicationStageRec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stage` (`stage`),
  ADD KEY `application` (`application`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`DID`),
  ADD KEY `fkschools` (`SID`);

--
-- Indexes for table `DocCheckType`
--
ALTER TABLE `DocCheckType`
  ADD PRIMARY KEY (`CheckTypeID`);

--
-- Indexes for table `DocumentCheck`
--
ALTER TABLE `DocumentCheck`
  ADD PRIMARY KEY (`DocCheckID`),
  ADD KEY `FK_CheckApplicant` (`ApplicantID`),
  ADD KEY `FK_CheckType` (`CheckType`),
  ADD KEY `FK_CheckedBy` (`CheckBy`);

--
-- Indexes for table `DocumentType`
--
ALTER TABLE `DocumentType`
  ADD PRIMARY KEY (`DoctypeID`);

--
-- Indexes for table `DocumentUpload`
--
ALTER TABLE `DocumentUpload`
  ADD PRIMARY KEY (`UploadID`),
  ADD KEY `FK_UploadDocCheck` (`CheckID`),
  ADD KEY `FK_DocType` (`DoctypeID`);

--
-- Indexes for table `EmpReference`
--
ALTER TABLE `EmpReference`
  ADD PRIMARY KEY (`ReferenceID`),
  ADD KEY `FK_ApplicationReference` (`AppID`),
  ADD KEY `FK_Response` (`id`),
  ADD KEY `FK_Relation` (`RelID`);

--
-- Indexes for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD PRIMARY KEY (`FacultyID`);

--
-- Indexes for table `HoursType`
--
ALTER TABLE `HoursType`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `HRShortlistOutcome`
--
ALTER TABLE `HRShortlistOutcome`
  ADD PRIMARY KEY (`OutcomeID`);

--
-- Indexes for table `HRShortlistRecord`
--
ALTER TABLE `HRShortlistRecord`
  ADD PRIMARY KEY (`ShortlistID`),
  ADD KEY `FK_ShortlistedBy` (`StaffID`),
  ADD KEY `FK_ShortApplication` (`ApplicationID`),
  ADD KEY `FK_SLoutcome` (`OutcomeID`);

--
-- Indexes for table `jsCriteria`
--
ALTER TABLE `jsCriteria`
  ADD PRIMARY KEY (`CriteriaID`),
  ADD KEY `FK_RoleCriteria` (`RoleID`);

--
-- Indexes for table `jsduties`
--
ALTER TABLE `jsduties`
  ADD PRIMARY KEY (`SummaryID`),
  ADD KEY `FK_RoleJobSummary` (`RoleID`);

--
-- Indexes for table `js_purpose`
--
ALTER TABLE `js_purpose`
  ADD PRIMARY KEY (`purposeID`);

--
-- Indexes for table `ManagerSTARFeedback`
--
ALTER TABLE `ManagerSTARFeedback`
  ADD PRIMARY KEY (`ManagerFeedID`),
  ADD KEY `FK_Feedback` (`PostRecordID`),
  ADD KEY `FK_Manager` (`StaffID`),
  ADD KEY `appID` (`appID`);

--
-- Indexes for table `Nationality`
--
ALTER TABLE `Nationality`
  ADD PRIMARY KEY (`NationalityID`);

--
-- Indexes for table `NSPNumber`
--
ALTER TABLE `NSPNumber`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_NSPapp` (`AppID`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Positions`
--
ALTER TABLE `Positions`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `FK_PostRole` (`RoleID`),
  ADD KEY `FK_PostSchool` (`SchoolID`),
  ADD KEY `FK_PostDepartment` (`DepartmentID`),
  ADD KEY `FK_StaffCreated` (`StaffID`),
  ADD KEY `FK_ht` (`HoursTypeID`);

--
-- Indexes for table `PostAssigned`
--
ALTER TABLE `PostAssigned`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkpost` (`PostID`),
  ADD KEY `fkapplicat` (`AppID`);

--
-- Indexes for table `PostOtherSkill`
--
ALTER TABLE `PostOtherSkill`
  ADD PRIMARY KEY (`PostOtherID`),
  ADD KEY `fkcategs` (`CatID`),
  ADD KEY `postfk` (`PostID`);

--
-- Indexes for table `PostSkills`
--
ALTER TABLE `PostSkills`
  ADD PRIMARY KEY (`postSKillID`),
  ADD KEY `FK_PostSkilll` (`PostID`),
  ADD KEY `FK_SkillReqPost` (`SkillID`);

--
-- Indexes for table `QualDate`
--
ALTER TABLE `QualDate`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `QualGrade`
--
ALTER TABLE `QualGrade`
  ADD PRIMARY KEY (`GID`),
  ADD KEY `gradelevel` (`LID`);

--
-- Indexes for table `QualGradeMatch`
--
ALTER TABLE `QualGradeMatch`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkqgrade` (`qualID`),
  ADD KEY `fkapp` (`AppID`),
  ADD KEY `othersq` (`otherQ`);

--
-- Indexes for table `Qualification`
--
ALTER TABLE `Qualification`
  ADD PRIMARY KEY (`QualID`),
  ADD KEY `FK_level` (`QualLevelID`),
  ADD KEY `FK_Grade` (`GradeID`),
  ADD KEY `FK_subject` (`SubjectID`),
  ADD KEY `FK_AppID` (`AppID`),
  ADD KEY `FK-Country` (`CountyID`);

--
-- Indexes for table `QualLevel`
--
ALTER TABLE `QualLevel`
  ADD PRIMARY KEY (`LID`),
  ADD KEY `FK_EdLevel` (`EdID`),
  ADD KEY `FK_CountryO` (`countryID`);

--
-- Indexes for table `quallevelmatch`
--
ALTER TABLE `quallevelmatch`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ffkq` (`qualID`),
  ADD KEY `fklapp` (`AppID`),
  ADD KEY `otherQ` (`otherQ`);

--
-- Indexes for table `QualOther`
--
ALTER TABLE `QualOther`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `QualSubject`
--
ALTER TABLE `QualSubject`
  ADD PRIMARY KEY (`SubID`),
  ADD KEY `FK_SubLevel` (`LID`);

--
-- Indexes for table `QualSubMatch`
--
ALTER TABLE `QualSubMatch`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fksubq` (`qualID`),
  ADD KEY `fkPPQ` (`AppID`),
  ADD KEY `otherQ` (`otherQ`);

--
-- Indexes for table `Qualuklevel`
--
ALTER TABLE `Qualuklevel`
  ADD PRIMARY KEY (`EDID`);

--
-- Indexes for table `RefRelation`
--
ALTER TABLE `RefRelation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `relevantJobSector`
--
ALTER TABLE `relevantJobSector`
  ADD PRIMARY KEY (`catID`),
  ADD KEY `FK_SectorRole` (`secID`),
  ADD KEY `FK_RelRole` (`roleID`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `RoleExpLength`
--
ALTER TABLE `RoleExpLength`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_per` (`period`),
  ADD KEY `Rolefk` (`RoleID`);

--
-- Indexes for table `RoleNewMap`
--
ALTER TABLE `RoleNewMap`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_OldRole` (`OldRole`),
  ADD KEY `FK_NewRole` (`NewRole`);

--
-- Indexes for table `RoleQualMin`
--
ALTER TABLE `RoleQualMin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkRoles` (`RoleID`),
  ADD KEY `fkqtype` (`qtype`);

--
-- Indexes for table `RoleReqGrade`
--
ALTER TABLE `RoleReqGrade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_MinGrade` (`Grade`),
  ADD KEY `FK_MinGradeRole` (`RoleID`);

--
-- Indexes for table `RoleReqQual`
--
ALTER TABLE `RoleReqQual`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_MinQual` (`QualID`),
  ADD KEY `Fk_RoleReq` (`RoleID`);

--
-- Indexes for table `RoleReqSubject`
--
ALTER TABLE `RoleReqSubject`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ReqRole` (`RoleID`),
  ADD KEY `FK_ReqSub` (`SubJectID`);

--
-- Indexes for table `RoleRequiredExp`
--
ALTER TABLE `RoleRequiredExp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RoleOD` (`roleID`),
  ADD KEY `FK_RoleSect` (`sectorID`);

--
-- Indexes for table `School`
--
ALTER TABLE `School`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `FK_Faculty` (`FacultyID`);

--
-- Indexes for table `Sex`
--
ALTER TABLE `Sex`
  ADD PRIMARY KEY (`SexID`);

--
-- Indexes for table `Skill`
--
ALTER TABLE `Skill`
  ADD PRIMARY KEY (`SkillID`),
  ADD KEY `FK_SkillCategory` (`SkillCatID`);

--
-- Indexes for table `SkillCategory`
--
ALTER TABLE `SkillCategory`
  ADD PRIMARY KEY (`SkillCatID`);

--
-- Indexes for table `skillOtherMem`
--
ALTER TABLE `skillOtherMem`
  ADD PRIMARY KEY (`OtherSkillID`),
  ADD KEY `fk_apps` (`AppID`),
  ADD KEY `fk_catid` (`catID`);

--
-- Indexes for table `SkillSetMem`
--
ALTER TABLE `SkillSetMem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_skillls` (`SkillID`),
  ADD KEY `fk_appdets` (`AppID`);

--
-- Indexes for table `sllist`
--
ALTER TABLE `sllist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `StaffDetails`
--
ALTER TABLE `StaffDetails`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `StaffNo` (`UserID`),
  ADD KEY `FK_StaffTitle` (`TitleID`),
  ADD KEY `FK_StaffSchool` (`SchoolID`),
  ADD KEY `FK_StaffDepartment` (`DepartmentID`);

--
-- Indexes for table `StaffLoginTime`
--
ALTER TABLE `StaffLoginTime`
  ADD PRIMARY KEY (`LoginTimeID`);

--
-- Indexes for table `StaffNotification`
--
ALTER TABLE `StaffNotification`
  ADD PRIMARY KEY (`NotificaitonID`),
  ADD KEY `FK_StaffEmail` (`emailID`),
  ADD KEY `FK_StaffNotification` (`StaffID`);

--
-- Indexes for table `StaffUser`
--
ALTER TABLE `StaffUser`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `StaffID` (`StaffNo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_StaffTypeU` (`Defusertype`);

--
-- Indexes for table `StaffUserType`
--
ALTER TABLE `StaffUserType`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_StaffType` (`UserTypeID`);

--
-- Indexes for table `Stage`
--
ALTER TABLE `Stage`
  ADD PRIMARY KEY (`StageID`);

--
-- Indexes for table `STARExperience`
--
ALTER TABLE `STARExperience`
  ADD PRIMARY KEY (`ExperienceID`),
  ADD KEY `FK_PostExperience` (`PostRecordID`);

--
-- Indexes for table `STARHoursAvailable`
--
ALTER TABLE `STARHoursAvailable`
  ADD PRIMARY KEY (`HrsID`),
  ADD KEY `FK_appHrs` (`appID`);

--
-- Indexes for table `STARMember`
--
ALTER TABLE `STARMember`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_MemberStatus` (`StatusID`),
  ADD KEY `FK_STARApplicant` (`ApplicantID`);

--
-- Indexes for table `STARPositionRecord`
--
ALTER TABLE `STARPositionRecord`
  ADD PRIMARY KEY (`PostRecordID`),
  ADD KEY `FK_Memappid` (`AppID`),
  ADD KEY `FK_MemPosition` (`PostID`);

--
-- Indexes for table `STARPostDates`
--
ALTER TABLE `STARPostDates`
  ADD PRIMARY KEY (`PostDateID`),
  ADD KEY `Fk_DateAssignPost` (`PostRecordID`);

--
-- Indexes for table `statement`
--
ALTER TABLE `statement`
  ADD PRIMARY KEY (`statementID`),
  ADD KEY `FK_StatementRole` (`RoleID`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `Title`
--
ALTER TABLE `Title`
  ADD PRIMARY KEY (`TitleID`);

--
-- Indexes for table `UserType`
--
ALTER TABLE `UserType`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- Indexes for table `zAppEquivalent`
--
ALTER TABLE `zAppEquivalent`
  ADD PRIMARY KEY (`EquivID`),
  ADD KEY `FK_QualCountry` (`CountryID`),
  ADD KEY `FK_UKLevel` (`UKLevel`);

--
-- Indexes for table `zApplicationNotificaiton`
--
ALTER TABLE `zApplicationNotificaiton`
  ADD PRIMARY KEY (`NotificationID`),
  ADD KEY `FK_AppicationNotification` (`AppID`);

--
-- Indexes for table `zApplicationPersDetails`
--
ALTER TABLE `zApplicationPersDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DetailsApplication` (`applicationID`);

--
-- Indexes for table `zApplicationSubject`
--
ALTER TABLE `zApplicationSubject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `zAppLoginTime`
--
ALTER TABLE `zAppLoginTime`
  ADD PRIMARY KEY (`LoginTimeID`),
  ADD KEY `FKLoginTime` (`UserID`);

--
-- Indexes for table `zEmail`
--
ALTER TABLE `zEmail`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `zNVQCategory`
--
ALTER TABLE `zNVQCategory`
  ADD PRIMARY KEY (`NVQCAtID`);

--
-- Indexes for table `zPostContactList`
--
ALTER TABLE `zPostContactList`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `FK_PostASsginMem` (`STARNoID`),
  ADD KEY `FK_PostList` (`PostID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AppAvail`
--
ALTER TABLE `AppAvail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ApplicantDetails`
--
ALTER TABLE `ApplicantDetails`
  MODIFY `AppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `ApplicantLogin`
--
ALTER TABLE `ApplicantLogin`
  MODIFY `ApplicantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100030;

--
-- AUTO_INCREMENT for table `Application`
--
ALTER TABLE `Application`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100008;

--
-- AUTO_INCREMENT for table `ApplicationExperience`
--
ALTER TABLE `ApplicationExperience`
  MODIFY `EmploymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ApplicationExpJobSector`
--
ALTER TABLE `ApplicationExpJobSector`
  MODIFY `JobSectorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `applicationStageRec`
--
ALTER TABLE `applicationStageRec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Country`
--
ALTER TABLE `Country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Department`
--
ALTER TABLE `Department`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `DocCheckType`
--
ALTER TABLE `DocCheckType`
  MODIFY `CheckTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `DocumentCheck`
--
ALTER TABLE `DocumentCheck`
  MODIFY `DocCheckID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DocumentType`
--
ALTER TABLE `DocumentType`
  MODIFY `DoctypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `DocumentUpload`
--
ALTER TABLE `DocumentUpload`
  MODIFY `UploadID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `EmpReference`
--
ALTER TABLE `EmpReference`
  MODIFY `ReferenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Faculty`
--
ALTER TABLE `Faculty`
  MODIFY `FacultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `HoursType`
--
ALTER TABLE `HoursType`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `HRShortlistOutcome`
--
ALTER TABLE `HRShortlistOutcome`
  MODIFY `OutcomeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `HRShortlistRecord`
--
ALTER TABLE `HRShortlistRecord`
  MODIFY `ShortlistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jsCriteria`
--
ALTER TABLE `jsCriteria`
  MODIFY `CriteriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jsduties`
--
ALTER TABLE `jsduties`
  MODIFY `SummaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `js_purpose`
--
ALTER TABLE `js_purpose`
  MODIFY `purposeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ManagerSTARFeedback`
--
ALTER TABLE `ManagerSTARFeedback`
  MODIFY `ManagerFeedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Nationality`
--
ALTER TABLE `Nationality`
  MODIFY `NationalityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `NSPNumber`
--
ALTER TABLE `NSPNumber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Positions`
--
ALTER TABLE `Positions`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `PostAssigned`
--
ALTER TABLE `PostAssigned`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PostOtherSkill`
--
ALTER TABLE `PostOtherSkill`
  MODIFY `PostOtherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `PostSkills`
--
ALTER TABLE `PostSkills`
  MODIFY `postSKillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `QualDate`
--
ALTER TABLE `QualDate`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `QualGrade`
--
ALTER TABLE `QualGrade`
  MODIFY `GID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `QualGradeMatch`
--
ALTER TABLE `QualGradeMatch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Qualification`
--
ALTER TABLE `Qualification`
  MODIFY `QualID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `QualLevel`
--
ALTER TABLE `QualLevel`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `quallevelmatch`
--
ALTER TABLE `quallevelmatch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `QualOther`
--
ALTER TABLE `QualOther`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `QualSubject`
--
ALTER TABLE `QualSubject`
  MODIFY `SubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `QualSubMatch`
--
ALTER TABLE `QualSubMatch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Qualuklevel`
--
ALTER TABLE `Qualuklevel`
  MODIFY `EDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `RefRelation`
--
ALTER TABLE `RefRelation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `relevantJobSector`
--
ALTER TABLE `relevantJobSector`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RoleExpLength`
--
ALTER TABLE `RoleExpLength`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RoleNewMap`
--
ALTER TABLE `RoleNewMap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RoleQualMin`
--
ALTER TABLE `RoleQualMin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RoleReqGrade`
--
ALTER TABLE `RoleReqGrade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `RoleReqQual`
--
ALTER TABLE `RoleReqQual`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RoleReqSubject`
--
ALTER TABLE `RoleReqSubject`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `RoleRequiredExp`
--
ALTER TABLE `RoleRequiredExp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `School`
--
ALTER TABLE `School`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Sex`
--
ALTER TABLE `Sex`
  MODIFY `SexID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Skill`
--
ALTER TABLE `Skill`
  MODIFY `SkillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `SkillCategory`
--
ALTER TABLE `SkillCategory`
  MODIFY `SkillCatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `skillOtherMem`
--
ALTER TABLE `skillOtherMem`
  MODIFY `OtherSkillID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `SkillSetMem`
--
ALTER TABLE `SkillSetMem`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sllist`
--
ALTER TABLE `sllist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `StaffDetails`
--
ALTER TABLE `StaffDetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `StaffLoginTime`
--
ALTER TABLE `StaffLoginTime`
  MODIFY `LoginTimeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `StaffNotification`
--
ALTER TABLE `StaffNotification`
  MODIFY `NotificaitonID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `StaffUser`
--
ALTER TABLE `StaffUser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100011;

--
-- AUTO_INCREMENT for table `StaffUserType`
--
ALTER TABLE `StaffUserType`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Stage`
--
ALTER TABLE `Stage`
  MODIFY `StageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `STARExperience`
--
ALTER TABLE `STARExperience`
  MODIFY `ExperienceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `STARHoursAvailable`
--
ALTER TABLE `STARHoursAvailable`
  MODIFY `HrsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `STARMember`
--
ALTER TABLE `STARMember`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `STARPositionRecord`
--
ALTER TABLE `STARPositionRecord`
  MODIFY `PostRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `STARPostDates`
--
ALTER TABLE `STARPostDates`
  MODIFY `PostDateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statement`
--
ALTER TABLE `statement`
  MODIFY `statementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Status`
--
ALTER TABLE `Status`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Title`
--
ALTER TABLE `Title`
  MODIFY `TitleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `UserType`
--
ALTER TABLE `UserType`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zAppEquivalent`
--
ALTER TABLE `zAppEquivalent`
  MODIFY `EquivID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zApplicationNotificaiton`
--
ALTER TABLE `zApplicationNotificaiton`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zApplicationPersDetails`
--
ALTER TABLE `zApplicationPersDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zApplicationSubject`
--
ALTER TABLE `zApplicationSubject`
  MODIFY `subid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `zAppLoginTime`
--
ALTER TABLE `zAppLoginTime`
  MODIFY `LoginTimeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zEmail`
--
ALTER TABLE `zEmail`
  MODIFY `emailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zNVQCategory`
--
ALTER TABLE `zNVQCategory`
  MODIFY `NVQCAtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `zPostContactList`
--
ALTER TABLE `zPostContactList`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AppAvail`
--
ALTER TABLE `AppAvail`
  ADD CONSTRAINT `fkapplicant` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `fkstatus` FOREIGN KEY (`AvailID`) REFERENCES `Status` (`StatusID`);

--
-- Constraints for table `ApplicantDetails`
--
ALTER TABLE `ApplicantDetails`
  ADD CONSTRAINT `FK_AppLogin` FOREIGN KEY (`ApplicantID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `FK_AppTitle` FOREIGN KEY (`TitleID`) REFERENCES `Title` (`TitleID`),
  ADD CONSTRAINT `FK_Nationality` FOREIGN KEY (`NationID`) REFERENCES `Nationality` (`NationalityID`),
  ADD CONSTRAINT `FK_PreferredHrsType` FOREIGN KEY (`hrsTypeID`) REFERENCES `HoursType` (`TypeID`),
  ADD CONSTRAINT `FK_Sex` FOREIGN KEY (`SexID`) REFERENCES `Sex` (`SexID`);

--
-- Constraints for table `ApplicantLogin`
--
ALTER TABLE `ApplicantLogin`
  ADD CONSTRAINT `FKAppUserType` FOREIGN KEY (`userTypeID`) REFERENCES `UserType` (`UserTypeID`);

--
-- Constraints for table `Application`
--
ALTER TABLE `Application`
  ADD CONSTRAINT `FK_Applicant` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `FK_RoleApplied` FOREIGN KEY (`roleID`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `appstage_FK` FOREIGN KEY (`appStage`) REFERENCES `Stage` (`StageID`);

--
-- Constraints for table `ApplicationExperience`
--
ALTER TABLE `ApplicationExperience`
  ADD CONSTRAINT `FKApplicaitonExperience` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `FKJobSector` FOREIGN KEY (`JobSectorID`) REFERENCES `ApplicationExpJobSector` (`JobSectorID`);

--
-- Constraints for table `applicationStageRec`
--
ALTER TABLE `applicationStageRec`
  ADD CONSTRAINT `application` FOREIGN KEY (`application`) REFERENCES `Application` (`applicationID`),
  ADD CONSTRAINT `stage` FOREIGN KEY (`stage`) REFERENCES `Stage` (`StageID`);

--
-- Constraints for table `Department`
--
ALTER TABLE `Department`
  ADD CONSTRAINT `fkschools` FOREIGN KEY (`SID`) REFERENCES `School` (`SID`);

--
-- Constraints for table `DocumentCheck`
--
ALTER TABLE `DocumentCheck`
  ADD CONSTRAINT `FK_CheckApplicant` FOREIGN KEY (`ApplicantID`) REFERENCES `ApplicantDetails` (`AppID`),
  ADD CONSTRAINT `FK_CheckType` FOREIGN KEY (`CheckType`) REFERENCES `DocCheckType` (`CheckTypeID`),
  ADD CONSTRAINT `FK_CheckedBy` FOREIGN KEY (`CheckBy`) REFERENCES `StaffDetails` (`ID`);

--
-- Constraints for table `DocumentUpload`
--
ALTER TABLE `DocumentUpload`
  ADD CONSTRAINT `FK_DocType` FOREIGN KEY (`DoctypeID`) REFERENCES `DocumentType` (`DoctypeID`),
  ADD CONSTRAINT `FK_UploadDocCheck` FOREIGN KEY (`CheckID`) REFERENCES `DocumentCheck` (`DocCheckID`);

--
-- Constraints for table `EmpReference`
--
ALTER TABLE `EmpReference`
  ADD CONSTRAINT `FK_ApplicationReference` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `FK_Relation` FOREIGN KEY (`RelID`) REFERENCES `RefRelation` (`ID`),
  ADD CONSTRAINT `FK_Response` FOREIGN KEY (`id`) REFERENCES `response` (`id`);

--
-- Constraints for table `HRShortlistRecord`
--
ALTER TABLE `HRShortlistRecord`
  ADD CONSTRAINT `FK_SLoutcome` FOREIGN KEY (`OutcomeID`) REFERENCES `HRShortlistOutcome` (`OutcomeID`),
  ADD CONSTRAINT `FK_ShortApplication` FOREIGN KEY (`ApplicationID`) REFERENCES `Application` (`applicationID`),
  ADD CONSTRAINT `FK_ShortlistedBy` FOREIGN KEY (`StaffID`) REFERENCES `StaffDetails` (`ID`);

--
-- Constraints for table `jsCriteria`
--
ALTER TABLE `jsCriteria`
  ADD CONSTRAINT `FK_RoleCriteria` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`);

--
-- Constraints for table `jsduties`
--
ALTER TABLE `jsduties`
  ADD CONSTRAINT `FK_RoleJobSummary` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`);

--
-- Constraints for table `ManagerSTARFeedback`
--
ALTER TABLE `ManagerSTARFeedback`
  ADD CONSTRAINT `FK_Feedback` FOREIGN KEY (`PostRecordID`) REFERENCES `STARPositionRecord` (`PostRecordID`),
  ADD CONSTRAINT `FK_Manager` FOREIGN KEY (`StaffID`) REFERENCES `StaffDetails` (`ID`),
  ADD CONSTRAINT `appID` FOREIGN KEY (`appID`) REFERENCES `ApplicantLogin` (`ApplicantID`);

--
-- Constraints for table `NSPNumber`
--
ALTER TABLE `NSPNumber`
  ADD CONSTRAINT `FK_NSPapp` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`);

--
-- Constraints for table `Positions`
--
ALTER TABLE `Positions`
  ADD CONSTRAINT `FK_PostDepartment` FOREIGN KEY (`DepartmentID`) REFERENCES `Department` (`DID`),
  ADD CONSTRAINT `FK_PostRole` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `FK_PostSchool` FOREIGN KEY (`SchoolID`) REFERENCES `School` (`SID`),
  ADD CONSTRAINT `FK_StaffCreated` FOREIGN KEY (`StaffID`) REFERENCES `StaffDetails` (`ID`),
  ADD CONSTRAINT `FK_ht` FOREIGN KEY (`HoursTypeID`) REFERENCES `HoursType` (`TypeID`);

--
-- Constraints for table `PostAssigned`
--
ALTER TABLE `PostAssigned`
  ADD CONSTRAINT `fkapplicat` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `fkpost` FOREIGN KEY (`PostID`) REFERENCES `Positions` (`PostID`);

--
-- Constraints for table `PostOtherSkill`
--
ALTER TABLE `PostOtherSkill`
  ADD CONSTRAINT `fkcategs` FOREIGN KEY (`CatID`) REFERENCES `SkillCategory` (`SkillCatID`),
  ADD CONSTRAINT `postfk` FOREIGN KEY (`PostID`) REFERENCES `Positions` (`PostID`);

--
-- Constraints for table `PostSkills`
--
ALTER TABLE `PostSkills`
  ADD CONSTRAINT `FK_PostSkilll` FOREIGN KEY (`PostID`) REFERENCES `Positions` (`PostID`),
  ADD CONSTRAINT `FK_SkillReqPost` FOREIGN KEY (`SkillID`) REFERENCES `Skill` (`SkillID`);

--
-- Constraints for table `QualGrade`
--
ALTER TABLE `QualGrade`
  ADD CONSTRAINT `gradelevel` FOREIGN KEY (`LID`) REFERENCES `QualLevel` (`LID`);

--
-- Constraints for table `QualGradeMatch`
--
ALTER TABLE `QualGradeMatch`
  ADD CONSTRAINT `fkapp` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `fkqgrade` FOREIGN KEY (`qualID`) REFERENCES `Qualification` (`QualID`),
  ADD CONSTRAINT `othersq` FOREIGN KEY (`otherQ`) REFERENCES `QualOther` (`ID`);

--
-- Constraints for table `Qualification`
--
ALTER TABLE `Qualification`
  ADD CONSTRAINT `FK-Country` FOREIGN KEY (`CountyID`) REFERENCES `Country` (`countryID`),
  ADD CONSTRAINT `FK_AppID` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `FK_Grade` FOREIGN KEY (`GradeID`) REFERENCES `QualGrade` (`GID`),
  ADD CONSTRAINT `FK_level` FOREIGN KEY (`QualLevelID`) REFERENCES `QualLevel` (`LID`),
  ADD CONSTRAINT `FK_subject` FOREIGN KEY (`SubjectID`) REFERENCES `QualSubject` (`SubID`);

--
-- Constraints for table `QualLevel`
--
ALTER TABLE `QualLevel`
  ADD CONSTRAINT `FK_CountryO` FOREIGN KEY (`countryID`) REFERENCES `Country` (`countryID`),
  ADD CONSTRAINT `FK_EdLevel` FOREIGN KEY (`EdID`) REFERENCES `Qualuklevel` (`EDID`);

--
-- Constraints for table `quallevelmatch`
--
ALTER TABLE `quallevelmatch`
  ADD CONSTRAINT `ffkq` FOREIGN KEY (`qualID`) REFERENCES `Qualification` (`QualID`),
  ADD CONSTRAINT `fklapp` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `quallevelmatch_ibfk_1` FOREIGN KEY (`otherQ`) REFERENCES `QualOther` (`ID`);

--
-- Constraints for table `QualSubject`
--
ALTER TABLE `QualSubject`
  ADD CONSTRAINT `FK_SubLevel` FOREIGN KEY (`LID`) REFERENCES `QualLevel` (`LID`);

--
-- Constraints for table `QualSubMatch`
--
ALTER TABLE `QualSubMatch`
  ADD CONSTRAINT `QualSubMatch_ibfk_1` FOREIGN KEY (`otherQ`) REFERENCES `QualOther` (`ID`),
  ADD CONSTRAINT `fkPPQ` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `fksubq` FOREIGN KEY (`qualID`) REFERENCES `Qualification` (`QualID`);

--
-- Constraints for table `relevantJobSector`
--
ALTER TABLE `relevantJobSector`
  ADD CONSTRAINT `FK_RelRole` FOREIGN KEY (`roleID`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `FK_SectorRole` FOREIGN KEY (`secID`) REFERENCES `ApplicationExpJobSector` (`JobSectorID`);

--
-- Constraints for table `RoleExpLength`
--
ALTER TABLE `RoleExpLength`
  ADD CONSTRAINT `Rolefk` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `fk_per` FOREIGN KEY (`period`) REFERENCES `period` (`id`);

--
-- Constraints for table `RoleNewMap`
--
ALTER TABLE `RoleNewMap`
  ADD CONSTRAINT `FK_NewRole` FOREIGN KEY (`NewRole`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `FK_OldRole` FOREIGN KEY (`OldRole`) REFERENCES `Role` (`RoleID`);

--
-- Constraints for table `RoleQualMin`
--
ALTER TABLE `RoleQualMin`
  ADD CONSTRAINT `fkRoles` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `fkqtype` FOREIGN KEY (`qtype`) REFERENCES `QualLevel` (`LID`);

--
-- Constraints for table `RoleReqGrade`
--
ALTER TABLE `RoleReqGrade`
  ADD CONSTRAINT `FK_MinGrade` FOREIGN KEY (`Grade`) REFERENCES `QualGrade` (`GID`),
  ADD CONSTRAINT `FK_MinGradeRole` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`);

--
-- Constraints for table `RoleReqQual`
--
ALTER TABLE `RoleReqQual`
  ADD CONSTRAINT `FK_MinQual` FOREIGN KEY (`QualID`) REFERENCES `QualLevel` (`LID`),
  ADD CONSTRAINT `Fk_RoleReq` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`);

--
-- Constraints for table `RoleReqSubject`
--
ALTER TABLE `RoleReqSubject`
  ADD CONSTRAINT `FK_ReqRole` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `FK_ReqSub` FOREIGN KEY (`SubJectID`) REFERENCES `QualSubject` (`SubID`);

--
-- Constraints for table `RoleRequiredExp`
--
ALTER TABLE `RoleRequiredExp`
  ADD CONSTRAINT `FK_RoleOD` FOREIGN KEY (`roleID`) REFERENCES `Role` (`RoleID`),
  ADD CONSTRAINT `FK_RoleSect` FOREIGN KEY (`sectorID`) REFERENCES `ApplicationExpJobSector` (`JobSectorID`);

--
-- Constraints for table `School`
--
ALTER TABLE `School`
  ADD CONSTRAINT `FK_Faculty` FOREIGN KEY (`FacultyID`) REFERENCES `Faculty` (`FacultyID`);

--
-- Constraints for table `Skill`
--
ALTER TABLE `Skill`
  ADD CONSTRAINT `FK_SkillCategory` FOREIGN KEY (`SkillCatID`) REFERENCES `SkillCategory` (`SkillCatID`);

--
-- Constraints for table `skillOtherMem`
--
ALTER TABLE `skillOtherMem`
  ADD CONSTRAINT `fk_apps` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `fk_catid` FOREIGN KEY (`catID`) REFERENCES `SkillCategory` (`SkillCatID`);

--
-- Constraints for table `SkillSetMem`
--
ALTER TABLE `SkillSetMem`
  ADD CONSTRAINT `fk_appdets` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `fk_skillls` FOREIGN KEY (`SkillID`) REFERENCES `Skill` (`SkillID`);

--
-- Constraints for table `StaffDetails`
--
ALTER TABLE `StaffDetails`
  ADD CONSTRAINT `FK_StaffDepartment` FOREIGN KEY (`DepartmentID`) REFERENCES `Department` (`DID`),
  ADD CONSTRAINT `FK_StaffSchool` FOREIGN KEY (`SchoolID`) REFERENCES `School` (`SID`),
  ADD CONSTRAINT `FK_StaffTitle` FOREIGN KEY (`TitleID`) REFERENCES `Title` (`TitleID`),
  ADD CONSTRAINT `Fk_StaffNo` FOREIGN KEY (`UserID`) REFERENCES `StaffUser` (`UserID`);

--
-- Constraints for table `StaffNotification`
--
ALTER TABLE `StaffNotification`
  ADD CONSTRAINT `FK_StaffEmail` FOREIGN KEY (`emailID`) REFERENCES `zEmail` (`emailID`),
  ADD CONSTRAINT `FK_StaffNotification` FOREIGN KEY (`StaffID`) REFERENCES `StaffDetails` (`ID`);

--
-- Constraints for table `StaffUser`
--
ALTER TABLE `StaffUser`
  ADD CONSTRAINT `FK_StaffTypeU` FOREIGN KEY (`Defusertype`) REFERENCES `UserType` (`UserTypeID`);

--
-- Constraints for table `StaffUserType`
--
ALTER TABLE `StaffUserType`
  ADD CONSTRAINT `FK_StaffType` FOREIGN KEY (`UserTypeID`) REFERENCES `UserType` (`UserTypeID`) ON UPDATE NO ACTION;

--
-- Constraints for table `STARExperience`
--
ALTER TABLE `STARExperience`
  ADD CONSTRAINT `FK_PostExperience` FOREIGN KEY (`PostRecordID`) REFERENCES `STARPositionRecord` (`PostRecordID`);

--
-- Constraints for table `STARHoursAvailable`
--
ALTER TABLE `STARHoursAvailable`
  ADD CONSTRAINT `FK_appHrs` FOREIGN KEY (`appID`) REFERENCES `ApplicantLogin` (`ApplicantID`);

--
-- Constraints for table `STARMember`
--
ALTER TABLE `STARMember`
  ADD CONSTRAINT `FK_MemberStatus` FOREIGN KEY (`StatusID`) REFERENCES `Status` (`StatusID`),
  ADD CONSTRAINT `FK_STARApplicant` FOREIGN KEY (`ApplicantID`) REFERENCES `ApplicantLogin` (`ApplicantID`);

--
-- Constraints for table `STARPositionRecord`
--
ALTER TABLE `STARPositionRecord`
  ADD CONSTRAINT `FK_MemPosition` FOREIGN KEY (`PostID`) REFERENCES `Positions` (`PostID`),
  ADD CONSTRAINT `FK_Memappid` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`);

--
-- Constraints for table `STARPostDates`
--
ALTER TABLE `STARPostDates`
  ADD CONSTRAINT `Fk_DateAssignPost` FOREIGN KEY (`PostRecordID`) REFERENCES `STARPositionRecord` (`PostRecordID`);

--
-- Constraints for table `statement`
--
ALTER TABLE `statement`
  ADD CONSTRAINT `FK_StatementRole` FOREIGN KEY (`RoleID`) REFERENCES `Role` (`RoleID`);

--
-- Constraints for table `zAppEquivalent`
--
ALTER TABLE `zAppEquivalent`
  ADD CONSTRAINT `FK_QualCountry` FOREIGN KEY (`CountryID`) REFERENCES `Nationality` (`NationalityID`),
  ADD CONSTRAINT `FK_UKLevel` FOREIGN KEY (`UKLevel`) REFERENCES `Qualuklevel` (`EDID`);

--
-- Constraints for table `zApplicationNotificaiton`
--
ALTER TABLE `zApplicationNotificaiton`
  ADD CONSTRAINT `FK_AppicationNotification` FOREIGN KEY (`AppID`) REFERENCES `ApplicantLogin` (`ApplicantID`),
  ADD CONSTRAINT `FK_Notification` FOREIGN KEY (`NotificationID`) REFERENCES `zEmail` (`emailID`);

--
-- Constraints for table `zApplicationPersDetails`
--
ALTER TABLE `zApplicationPersDetails`
  ADD CONSTRAINT `FK_DetailsApplication` FOREIGN KEY (`applicationID`) REFERENCES `Application` (`applicationID`);

--
-- Constraints for table `zAppLoginTime`
--
ALTER TABLE `zAppLoginTime`
  ADD CONSTRAINT `FKLoginTime` FOREIGN KEY (`UserID`) REFERENCES `ApplicantLogin` (`ApplicantID`);

--
-- Constraints for table `zPostContactList`
--
ALTER TABLE `zPostContactList`
  ADD CONSTRAINT `FK_PostASsginMem` FOREIGN KEY (`STARNoID`) REFERENCES `STARMember` (`ID`),
  ADD CONSTRAINT `FK_PostList` FOREIGN KEY (`PostID`) REFERENCES `Positions` (`PostID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
