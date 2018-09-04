-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 11:51 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms-fatur`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'admin', '2018-07-18 17:58:06', 'Add Subject AD'),
(2, 'admin', '2018-07-18 18:18:51', 'Add School Year 2018'),
(3, 'admin', '2018-07-23 22:18:21', 'Edit Subject Algoritma'),
(4, '', '2018-07-23 22:34:06', 'Add Subject MTK'),
(5, 'admin', '2018-07-25 00:03:30', 'Add School Year 2017'),
(6, 'admin', '2018-07-25 20:21:49', 'Add School Year 2016'),
(7, '', '2018-07-29 02:41:01', 'Add Subject IPA: Biologi'),
(8, '', '2018-07-29 02:41:30', 'Add Subject aaaa'),
(9, '', '2018-07-29 02:44:59', 'Add Subject jnajna'),
(10, 'admin', '2018-09-04 16:48:02', 'Add User '),
(11, 'admin', '2018-09-04 16:49:14', 'Add User admin'),
(12, 'admin', '2018-09-04 16:49:22', 'Add User reza');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL,
  `correct` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`, `correct`) VALUES
(33, 4, 'Saya', 'A', ''),
(34, 4, 'ewf', 'B', ''),
(35, 4, 'fweofoewj', 'C', ''),
(36, 4, 'jeofj', 'D', ''),
(37, 5, '111111111111111111', 'A', ''),
(38, 5, '2222222222222222', 'B', ''),
(39, 5, '333333333333333333', 'C', ''),
(40, 5, '4444444444444444', 'D', ''),
(41, 6, 'tiga', 'A', ''),
(42, 6, 'empat', 'B', ''),
(43, 6, 'dua', 'C', ''),
(44, 6, 'satu', 'D', ''),
(45, 7, 'satu', 'A', ''),
(46, 7, 'dua', 'B', ''),
(47, 7, 'tiga', 'C', ''),
(48, 7, 'empat', 'D', '');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(1, 'admin/uploads/6435_File_Cover.docx', '2018-07-23 22:10:18', 'deef', 2, 2, 'dwd'),
(2, 'admin/uploads/8983_File_Epilog.docx', '2018-07-25 21:30:57', 'ewfwe', 3, 3, 'efwf');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(1, 'X. TKJ 1'),
(2, 'X. TKJ 2'),
(10, 'X. AK 1'),
(11, 'X. AK 2');

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_time`, `quiz_id`) VALUES
(1, 1, 3600, 1),
(2, 3, 3600, 2),
(3, 8, 3600, 3);

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_subject_overview`
--

INSERT INTO `class_subject_overview` (`class_subject_overview_id`, `teacher_class_id`, `content`) VALUES
(1, 2, 'Ini Susah'),
(2, 3, '<p>Ini Suram</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `title`, `content`) VALUES
(1, 'Misi', '<pre>\r\n<span style=\"font-size:16px\"><strong>MISI</strong></span></pre>\r\n\r\n<p style=\"text-align:left\"><span style=\"font-family:arial,helvetica,sans-serif; font-size:medium\"><span style=\"font-size:large\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span>&nbsp; &nbsp;<span style=\"font-size:18px\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; A leading institution in higher and continuing education commited to engage in quality instruction, development-oriented research sustinable lucrative economic enterprise, and responsive extension and training services through relevant academic programs to empower a human resource that responds effectively to challenges in life and acts as catalyst in the holistoic development of a humane society.&nbsp;</span></p>\r\n\r\n<p style=\"text-align:left\">&nbsp;</p>\r\n'),
(2, 'Visi', '<pre>\r\n<span style=\"font-size:large\"><strong>VISI</strong></span></pre>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size:large\">&nbsp; Driven by its passion for continous improvement, the State College has to vigorously pursue distinction and proficieny in delivering its statutory functions to the Filipino people in the fields of education, business, agro-fishery, industrial, science and technology, through committed and competent human resource, guided by the beacon of innovation and productivity towards the heights of elevated status. </span><br />\r\n&nbsp;</p>\r\n'),
(3, 'Sejarah', '<pre>\r\n<span style=\"font-size:large\">SEJARAH &nbsp;</span> </pre>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Carlos Hilado Memorial State College, formerly Paglaum State College, is a public educational institution that aims to provide higher technological, professional and vocational instruction and training in science, agriculture and industrial fields as well as short term or vocational courses. It was Batas Pambansa Bilang 477 which integrated these three institutions of learning: the Negros Occidental College of Arts and Trades (NOCAT) in the Municipality of Talisay, Bacolod City National Trade School (BCNTS) in Alijis, Bacolod City, and the Negros Occidental Provincial Community College (NOPCC) in Bacolod City, into a tertiary state educational institution to be called Paglaum State College. Approved in 1983, the College Charter was implemented effective January 1, 1984, with Mr. Sulpicio P. Cartera as its President. The administrative seat of the first state college in Negros Occidental is located at the Talisay Campus which was originally established as Negros Occidental School of Arts and Trades (NOSAT) under R.A. 848, authored and sponsored by Hon. Carlos Hilado. It occupies a five-hectare land donated by the provincial government under Provincial Board Resolution No. 1163. The renaming of the college to Carlos Hilado Memorial State College was effected by virtue of House Bill No. 7707 authored by then Congressman Jose Carlos V. Lacson of the 3rd Congressional District, Province of Negros Occidental, and which finally became a law on May 5, 1994</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp; Talisay Campus. July 1, 1954 marked the formal opening of NOSAT with Mr. Francisco Apilado as its first Superintendent and Mr. Gil H. Tenefrancia as Principal. There were five (5) full time teachers, with an initial enrolment of eighty-nine (89) secondary and trade technical students. The shop courses were General Metal Works, Practical Electricity and Woodworking. The first classes were held temporarily at Talisay Elementary School while the shop buildings and classrooms were under construction. NOSAT was a recipient of FOA-PHILCUA aid in terms of technical books, equipment, tools and machinery. Alijis Campus. The Alijis Campus of the Carlos Hilado Memorial State College is situated in a 5-hectare lot located at Barangay Alijis, Bacolod City. The lot was a donation of the late Dr. Antonio Lizares. The school was formerly established as the Bacolod City National Trade School. The establishment of this trade technical institution is pursuant to R.A. 3886 in 1968, authored by the late Congressman Inocencio V. Ferrer of the second congressional district of the Province of Negros Occidental. Fortune Towne. The Fortune Towne Campus of the Carlos Hilado Memorial State College was originally situated in Negros Occidental High School (NOHS), Bacolod City on a lot owned by the Provincial Government under Provincial Board Resolution No. 91 series of 1970. The school was formerly established as the Negros Occidental Provincial Community College and formally opened on July 13, 1970 with the following course offerings: Bachelor of Arts, Technical Education and Bachelor of Commerce. The initial operation of the school started in July 13, 1970, with an initial enrolment of 209 students. Classes were first housed at the Negros Occidental High School while the first building was constructed. Then Governor Alfredo L. Montelibano spearheaded the first operation of the NOPCC along with the members of the Board of Trustees. In June 1995, the campus transferred to its new site in Fortune Towne, Bacolod City. Binalbagan Campus. On Nov. 24, 2000, the Negros Occidental School of Fisheries (NOSOF) in Binalbagan, Negros Occidental was integrated to the Carlos Hilado Memorial State College system as an external campus by virtue of Resolution No. 46 series of 2000.</p>\r\n'),
(4, 'Footer', '<p style=\"text-align:center\">CHMSC Online Learning Managenment System</p>\r\n\r\n<p style=\"text-align:center\">All Rights Reserved &reg;2013</p>\r\n'),
(5, 'Upcoming Events', '<pre>\r\nUP COMING EVENTS</pre>\r\n\r\n<p><strong>&gt;</strong> EXAM</p>\r\n\r\n<p><strong>&gt;</strong> INTERCAMPUS MEET</p>\r\n\r\n<p><strong>&gt;</strong> DEFENSE</p>\r\n\r\n<p><strong>&gt;</strong> ENROLLMENT</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, 'Title', '<p><span style=\"font-family:trebuchet ms,geneva\">CHMSC Online Learning Management System</span></p>\r\n'),
(7, 'News', '<pre>\r\n<span style=\"font-size:medium\"><em><strong>Recent News\r\n</strong></em></span></pre>\r\n\r\n<h2><span style=\"font-size:small\">Extension and Community Services</span></h2>\r\n\r\n<p style=\"text-align:justify\">This technology package was promoted by the College of Industrial Technology Unit is an index to offer Practical Skills and Livelihood Training Program particularly to the Ina ngTahanan of Tayabas, Barangay Zone 15, Talisay City, Negros Occidental</p>\r\n\r\n<p style=\"text-align:justify\">The respondent of this technology package were mostly &ldquo;ina&rdquo; or mothers in PurokTayabas. There were twenty mothers who responded to the call of training and enhancing their sewing skills. The beginners projects include an apron, elastics waist skirts, pillow-cover and t-shirt style top. Short sleeve blouses with buttonholes or contoured seaming are also some of the many projects introduced to the mothers. Based on the interview conducted after the culmination activity, the projects done contributed as a means of earning to the respondents.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; In support to the thrust of the government to improve the health status of neighboring barangays, the Faculty and Staff of CHMSC ECS Fortune Towne, Bacolod City, launched its Medical Mission in Patag, Silay City. It was conducted last March 2010, to address the health needs of the people. A medical consultation is given to the residents of SitioPatag to attend to their health related problems that may need medical treatment. Medical tablets for headache, flu, fever, antibiotics and others were availed by the residents.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;The BAYAN-ANIHAN is a Food Production Program with a battle cry of &ldquo;GOODBYE GUTOM&rdquo;, advocating its legacy &ldquo;Food on the Table for every Filipino Family&rdquo; through backyard gardening. NGO&rsquo;s, governmental organizations, private and public sectors, business sectors are the cooperating agencies that support and facilitate this project and Carlos Hilado Memorial State College (CHMSC) is one of the identified partner school. Being a member institution in advocating its thrust, the school through its Extension and Community Services had conducted capability training workshop along this program identifying two deputy coordinators and trainers last November 26,27 and 28, 2009, with the end in view of implementing the project all throughout the neighboring towns, provinces and regions to help address poverty in the country. Program beneficiaries were the selected families of GawadKalinga (GK) in Hope Village, Brgy. Cabatangan, Talisay City, with 120 families beneficiaries; GK FIAT Village in Silay City with 30 beneficiaries; Bonbon Dream Village brgy. E. Lopez, Silay City with 60 beneficiaries; and respectively Had. Teresita and Had. Carmen in Talisay City, Negros Occidental both with 60 member beneficiaries. This program was introduced to 30 household members with the end in view of alleviating the quality standards of their living.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">The extension &amp; Community Services of the College conducted a series of consultations and meetings with the different local government units to assess technology needs to determines potential products to be developed considering the abundance of raw materials in their respective areas and their product marketability. The project was released in November 2009 in six cities in the province of Negros Occidental, namely San Carlos, Sagay, Silay, Bago, Himamaylan and Sipalay and the Municipality of E. B Magalona</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The City of San Carlos focused on peanut and fish processing. Sagay and bago focused on meat processing, while Silay City on fish processing. The City of Himamaylan is on sardines, and in Sipalay focused on fish processing specially on their famous BARONGAY product. The municipality of E.B Magalona focused on bangus deboning.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; The food technology instructors are tasked to provide the needed skills along with the TLDC Livelihood project that each City is embarking on while the local government units provide the training venue for the project and the training equipment and machine were provided by the Department of Science and Technology.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n'),
(8, 'Announcements', '<pre>\r\n<span style=\"font-size:medium\"><em><strong>Announcements</strong></em></span></pre>\r\n\r\n<p>Examination Period: October 9-11, 2013</p>\r\n\r\n<p>Semestrial Break: October 12- November 3, 2013</p>\r\n\r\n<p>FASKFJASKFAFASFMFAS</p>\r\n\r\n<p>GASGA</p>\r\n'),
(9, 'Calendar', '<pre style=\"text-align:center\">\r\n<span style=\"font-size:medium\"><strong>&nbsp;CALENDAR OF EVENT</strong></span></pre>\r\n\r\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">\r\n <tbody>\r\n <tr>\r\n <td>\r\n <p>First Semester &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n </td>\r\n <td>\r\n <p>June 10, 2013 to October 11, 2013&nbsp;</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>Semestral Break</p>\r\n </td>\r\n <td>\r\n <p>Oct. 12, 2013 to November 3, 2013</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>Second Semester</p>\r\n </td>\r\n <td>\r\n <p>Nov. 5, 2013 to March 27, 2014</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>Summer Break</p>\r\n </td>\r\n <td>\r\n <p>March 27, 2014 to April 8, 2014</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>Summer</p>\r\n </td>\r\n <td>\r\n <p>April 8 , 2014 to May 24, 2014</p>\r\n </td>\r\n </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">\r\n <tbody>\r\n <tr>\r\n <td colspan=\"4\">\r\n <p><strong>June 5, 2013 to October 11, 2013 &ndash; First Semester AY 2013-2014</strong></p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 4, 2013 &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n </td>\r\n <td>\r\n <p>Orientation with the Parents of the College&nbsp;Freshmen</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 5</p>\r\n </td>\r\n <td>\r\n <p>First Day of Service</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 5</p>\r\n </td>\r\n <td>\r\n <p>College Personnel General Assembly</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 6,7</p>\r\n </td>\r\n <td>\r\n <p>In-Service Training (Departmental)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 10</p>\r\n </td>\r\n <td>\r\n <p>First Day of Classes</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 14</p>\r\n </td>\r\n <td>\r\n <p>Orientation with Students by College/Campus/Department</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 19,20,21</p>\r\n </td>\r\n <td>\r\n <p>Branch/Campus Visit for Administrative / Academic/Accreditation/ Concerns</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td rowspan=\"2\">\r\n <p>June</p>\r\n </td>\r\n <td>\r\n <p>Club Organizations (By Discipline/Programs)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>Student Affiliation/Induction Programs</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>July</p>\r\n </td>\r\n <td>\r\n <p>Nutrition Month (Sponsor: Laboratory School)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>July 11, 12</p>\r\n </td>\r\n <td>\r\n <p>Long Tests</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>August&nbsp; 8, 9</p>\r\n </td>\r\n <td>\r\n <p>Midterm Examinations</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>August 19</p>\r\n </td>\r\n <td>\r\n <p>ArawngLahi</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>August 23</p>\r\n </td>\r\n <td>\r\n <p>Submission of Grade Sheets for Midterm</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>August</p>\r\n </td>\r\n <td>\r\n <p>Recognition Program (Dean&rsquo;s List)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>August 26</p>\r\n </td>\r\n <td>\r\n <p>National Heroes Day (Regular Holiday)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>August 28, 29, 30</p>\r\n </td>\r\n <td>\r\n <p>Sports and Cultural Meet</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>September 19,20</p>\r\n </td>\r\n <td>\r\n <p>Long Tests</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>October 5</p>\r\n </td>\r\n <td>\r\n <p>Teachers&rsquo; Day / World Teachers&rsquo; Day</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>October 10, 11</p>\r\n </td>\r\n <td>\r\n <p>Final Examination</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>October 12</p>\r\n </td>\r\n <td>\r\n <p>Semestral Break</p>\r\n </td>\r\n </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<table cellpadding=\"0\" cellspacing=\"0\" style=\"margin-left:auto; margin-right:auto\">\r\n <tbody>\r\n <tr>\r\n <td colspan=\"4\">\r\n <p><strong>Nov. 4, 2013 to March 27, 2014 &ndash; Second Semester AY 2013-2014</strong></p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>November 4 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n </td>\r\n <td>\r\n <p>Start of Classes</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>November 19, 20, 21, 22</p>\r\n </td>\r\n <td>\r\n <p>Intercampus Sports and Cultural Fest/College Week</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>December 5, 6</p>\r\n </td>\r\n <td>\r\n <p>Long Tests</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>December 19,20</p>\r\n </td>\r\n <td>\r\n <p>Thanksgiving Celebrations</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>December 21</p>\r\n </td>\r\n <td>\r\n <p>Start of Christmas Vacation</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>December 25</p>\r\n </td>\r\n <td>\r\n <p>Christmas Day (Regular Holiday)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>December 30</p>\r\n </td>\r\n <td>\r\n <p>Rizal Day (Regular Holiday)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>January 6, 2014</p>\r\n </td>\r\n <td>\r\n <p>Classes Resume</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>January 9, 10</p>\r\n </td>\r\n <td>\r\n <p>Midterm Examinations</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>January 29</p>\r\n </td>\r\n <td>\r\n <p>Submission of Grades Sheets for Midterm</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>February 13, 14</p>\r\n </td>\r\n <td>\r\n <p>Long Tests</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>March 6, 7</p>\r\n </td>\r\n <td>\r\n <p>Final Examinations (Graduating)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>March 13, 14</p>\r\n </td>\r\n <td>\r\n <p>Final Examinations (Non-Graduating)</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>March 17, 18, 19, 20, 21</p>\r\n </td>\r\n <td>\r\n <p>Recognition / Graduation Rites</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>March 27</p>\r\n </td>\r\n <td>\r\n <p>Last Day of Service for Faculty</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June 5, 2014</p>\r\n </td>\r\n <td>\r\n <p>First Day of Service for SY 2014-2015</p>\r\n </td>\r\n </tr>\r\n </tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin-left:auto; margin-right:auto\">\r\n <tbody>\r\n <tr>\r\n <td colspan=\"2\">\r\n <p><strong>FLAG RAISING CEREMONY-TALISAY CAMPUS</strong></p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>MONTHS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n </td>\r\n <td>\r\n <p>UNIT-IN-CHARGE</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>June, Sept. and Dec. 2013, March 2014</p>\r\n </td>\r\n <td>\r\n <p>COE</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>July and October 2013, Jan. 2014</p>\r\n </td>\r\n <td>\r\n <p>SAS</p>\r\n </td>\r\n </tr>\r\n <tr>\r\n <td>\r\n <p>August and November 2013, Feb. 2014</p>\r\n\r\n <p>April and May 2014</p>\r\n </td>\r\n <td>\r\n <p>CIT</p>\r\n\r\n <p>GASS</p>\r\n </td>\r\n </tr>\r\n </tbody>\r\n</table>\r\n'),
(10, 'Directories', '<div class=\"jsn-article-content\" style=\"text-align: left;\">\r\n<pre>\r\n<span style=\"font-size:medium\"><em><strong>DIRECTORIES</strong></em></span></pre>\r\n\r\n<ul>\r\n <li>Lab School - 712-0848</li>\r\n <li>Accounting - 495-5560</li>\r\n <li>Presidents Office - 495-4064(telefax)</li>\r\n <li>VPA/PME - 495-1635</li>\r\n <li>Registrar Office - 495-4657(telefax)</li>\r\n <li>Cashier - 712-7272</li>\r\n <li>CIT - 712-0670</li>\r\n <li>SAS/COE - 495-6017</li>\r\n <li>BAC - 712-8404(telefax)</li>\r\n <li>Records - 495-3470</li>\r\n <li>Supply - 495-3767</li>\r\n <li>Internet Lab - 712-6144/712-6459</li>\r\n <li>COA - 495-5748</li>\r\n <li>Guard House - 476-1600</li>\r\n <li>HRM - 495-4996</li>\r\n <li>Extension - 457-2819</li>\r\n <li>Canteen - 495-5396</li>\r\n <li>Research - 712-8464</li>\r\n <li>Library - 495-5143</li>\r\n <li>OSA - 495-1152</li>\r\n</ul>\r\n</div>\r\n'),
(11, 'president', '<p>It is my great pleasure and privilege to welcome you to CHMSC&rsquo;s official website. Accept my deep appreciation for continuously taking interest in CHMSC and its programs and activities.<br /> Recently, the challenges of the knowledge era of the 21st Century led me to think very deeply how educational institutions of higher learning must vigorously pursue relevant e<img style=\"float: left;\" src=\"images/president.jpg\" alt=\"\" />ducation to compete with and respond to the challenges of globalization. As an international fellow, I realized that in the face of this globalization and technological advancement, educational institutions are compelled to work extraordinary in educating the youths and enhancing their potentials for gainful employment and realization of their dreams to become effective citizens.<br /><br /> Honored and humbled to be given the opportunity for stewardship of this good College, I am fully aware that the goal is to make CHMSC as the center of excellence or development in various fields. The vision, CHMSC ExCELS: Excellence, Competence and Educational Leadership in Science and Technology is a profound battle cry for each member of CHMSC Community. A CHMSCian must be technologically and academically competent, socially mature, safety conscious with care for the environment, a good citizen and possesses high moral values. The way the College is being managed, the internal and the external culture of all stockholders, and the efforts for quality and excellence will result to the establishment of the good corporate image of the College. The hallmark is reflected as the image of the good institution.<br /><br /> The tasks at hand call for our full cooperation, support and active participation. Therefore, I urge everyone to help me in the crusade to <br /><br /></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">Provide wider access to CHMSC programs;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Harness the potentials of students thru effective teaching and learning methodologies and techniques;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Enable CHMSC Environment for All through secure green campus;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Advocate green movement, protect intellectual property and stimulate innovation;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Promote lifelong learning;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Conduct Research and Development for community and poverty alleviation;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Share and disseminate knowledge through publication and extension outreach to communities; and</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*Strengthen Institute-industry linkages and public-private partnership for mutual interest.</span></p>\r\n<p style=\"text-align: justify;\"><br /><span style=\"line-height: 1.3em; text-align: justify;\">Together, WE can make CHMSC</span></p>\r\n<p style=\"text-align: justify;\"><br /><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*A model green institution for Human Resources Development, a builder of human resources in the knowledge era of the 21st Century;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *A center for curricular innovations and research especially in education, technology, engineering, ICT and entrepreneurship; and</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *A Provider of quality graduates in professional and technological programs for industry and community.</span></p>\r\n<p style=\"text-align: justify;\"><br /><br /> Dear readers and guests, these are the challenges for every CHMSCian to hurdle and the dreams to realize. This website will be one of the connections with you as we ardently take each step. Feel free to visit often and be kept posted as we continue to work for discoveries and advancement that will bring benefits to the lives of the students, the community, and the world, as a whole.<br /><br /> Warmest welcome and I wish you well!</p>\r\n<p style=\"text-align: justify;\"><br /><br /></p>\r\n<p style=\"text-align: justify;\">RENATO M. SOROLLA, Ph.D.<br />SUC President II</p>'),
(12, 'motto', '<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">CHMSC EXCELS:</span></span></strong></p>\r\n\r\n<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Excellence, Competence and Educational</span></span></strong></p>\r\n\r\n<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Leadership in Science and Technology</span></span></strong></p>\r\n'),
(13, 'Lokasi', '<pre>\r\n<span style=\"font-size:16px\"><strong>Lokasi</strong></span></pre>\r\n\r\n<ul>\r\n	<li>Sekolah Sakura Putih Indonesia</li>\r\n	<li>Sekolah Sakura Putih Jepang</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`) VALUES
(1, 'TKJ', ''),
(2, 'A123B', 'Mr. 123S'),
(3, 'AK', 'Annastasia Yuri');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `teacher_class_id`, `date_start`, `date_end`) VALUES
(1, 'Uji Coba', 0, '07/26/2018', '07/26/2018');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(1, 'admin/uploads/2000_File_Cover.docx', '2018-07-25 21:11:35', 'jdowjod', 1, 1, 'Test', 'YunaRadisti'),
(2, 'admin/uploads/2621_File_Epilog.docx', '2018-07-25 21:14:36', 'kjgkbj', 3, 3, 'nknk', 'guruguru'),
(3, 'admin/uploads/5576_File_[SKRIPSI] PERANCANGAN APLIKASI E-LEARNING BERBASIS WEB by Kusumawati Heri Susanti_stmikelrahma.pdf', '2018-08-02 02:55:54', 'Skripsi', 3, 3, 'Perancangan', 'guruguru'),
(4, 'admin/uploads/6517_File_Aplikasi E-Learning Berbasis Web Dengan Menggunakan Atutor by YM Arianti, K Yogisa.pdf', '2018-08-02 03:21:08', 'web', 3, 3, 'Web', 'guruguru'),
(5, 'admin/uploads/6517_File_Aplikasi E-Learning Berbasis Web Dengan Menggunakan Atutor by YM Arianti, K Yogisa.pdf', '2018-08-02 03:21:08', 'web', 3, 5, 'Web', 'guruguru'),
(6, 'admin/uploads/9127_File_Penjelasan Outline Skripsi Prodi TI Nuri (Rev Okt 2016).doc', '2018-08-02 03:24:39', 'note', 3, 3, 'Panduan', 'guruguru'),
(7, 'admin/uploads/7900_File_Panduan Lap Skripsi STMIK Nusa Mandiri Jakarta-Revisi.pdf', '2018-08-02 15:03:08', 'panduan', 3, 3, 'Lap', 'guruguru'),
(8, 'admin/uploads/9782_File_Skripsi 11135932 Ahmad Susanto.pdf', '2018-08-02 15:11:04', 'coba', 3, 3, 'anto', 'guruguru'),
(9, 'admin/uploads/6770_File_c-api.pdf', '2018-08-25 00:04:11', 'API bahasa C', 5, 16, 'C-API', 'AkatsukiMiyu');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(1, 3, 'tes', '2018-08-06 15:35:23', 3, 'guru guru', 'murid murid', 'read'),
(2, 3, 'oke', '2018-08-06 15:36:38', 3, 'murid murid', 'guru guru', '');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(1, 3, 'tes', '2018-08-06 15:35:23', 3, 'guru guru', 'murid murid'),
(2, 3, 'oke', '2018-08-06 15:36:38', 3, 'murid murid', 'guru guru');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(1, 1, 'Add Practice Quiz file', '2018-07-18 18:23:18', 'student_quiz_list.php'),
(2, 2, 'Add Assignment file name <b>dwd</b>', '2018-07-23 22:10:18', 'assignment_student.php'),
(3, 1, 'Add Downloadable Materials file name <b>Test</b>', '2018-07-25 21:11:35', 'downloadable_student.php'),
(4, 3, 'Add Annoucements', '2018-07-25 21:14:09', 'announcements_student.php'),
(5, 3, 'Add Downloadable Materials file name <b>nknk</b>', '2018-07-25 21:14:36', 'downloadable_student.php'),
(6, 3, 'Add Practice Quiz file', '2018-07-25 21:18:07', 'student_quiz_list.php'),
(7, 3, 'Add Assignment file name <b>efwf</b>', '2018-07-25 21:30:57', 'assignment_student.php'),
(8, 3, 'Add Downloadable Materials file name <b>Perancangan</b>', '2018-08-02 02:55:54', 'downloadable_student.php'),
(9, 3, 'Add Downloadable Materials file name <b>Web</b>', '2018-08-02 03:21:08', 'downloadable_student.php'),
(10, 5, 'Add Downloadable Materials file name <b>Web</b>', '2018-08-02 03:21:08', 'downloadable_student.php'),
(11, 3, 'Add Downloadable Materials file name <b>Panduan</b>', '2018-08-02 03:24:39', 'downloadable_student.php'),
(12, 3, 'Add Downloadable Materials file name <b>Lap</b>', '2018-08-02 15:03:08', 'downloadable_student.php'),
(13, 3, 'Add Downloadable Materials file name <b>anto</b>', '2018-08-02 15:11:04', 'downloadable_student.php'),
(14, 8, 'Add Annoucements', '2018-08-13 01:17:07', 'announcements_student.php'),
(15, 11, 'Add Annoucements', '2018-08-13 01:17:07', 'announcements_student.php'),
(16, 11, 'Add Annoucements', '2018-08-14 15:56:54', 'announcements_student.php'),
(17, 0, 'Add Annoucements', '2018-08-14 23:37:36', 'announcements_student.php'),
(18, 0, 'Add Annoucements', '2018-08-18 00:19:38', 'announcements_student.php'),
(19, 8, 'Add Annoucements', '2018-08-18 00:46:50', 'announcements_student.php'),
(20, 8, 'Add Annoucements', '2018-08-20 10:21:45', 'announcements_student.php'),
(21, 16, 'Add Downloadable Materials file name <b>C-API</b>', '2018-08-25 00:04:11', 'downloadable_student.php'),
(22, 8, 'Tambah Pengumuman', '2018-08-28 04:30:05', 'announcements_student.php'),
(23, 8, 'Tambah Pengumuman', '2018-08-28 04:31:26', 'announcements_student.php'),
(24, 8, 'Tambah Ujian Quiz file', '2018-08-30 01:55:54', 'student_quiz_list.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_read`
--

INSERT INTO `notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
(1, 3, 'yes', 4),
(2, 3, 'yes', 3),
(3, 3, 'yes', 5),
(4, 3, 'yes', 7),
(5, 3, 'yes', 6),
(6, 3, 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_read_teacher`
--

INSERT INTO `notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(1, 3, 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Pilihan Ganda'),
(2, 'Benar atau Salah');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(1, 'Latihan Harian 1 AD', 'Latihan harian 1 pelajaran algoritma dasar', '2018-07-18 18:22:49', 1),
(2, '1. Kalkulus ', 'pqkqskqopkskqdoqd', '2018-07-25 21:17:42', 3),
(3, 'Uji coba', 'nyoba dulu', '2018-08-30 01:50:14', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(3, 1, '<p>3. 10 + 10 =</p>\r\n', 1, 1, '2018-07-23 14:55:20', 'A'),
(4, 2, '<p>Siapa Nama Bapanya?</p>\r\n', 1, 1, '2018-07-25 21:19:15', 'A'),
(5, 2, '<p>jojdwowjodjwodjo</p>\r\n', 1, 1, '2018-07-25 21:23:38', 'C'),
(7, 4, '<p>1. Satu tambah satu sama dengan ?</p>\r\n', 1, 1, '2018-08-30 03:22:50', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(1, '2018'),
(2, '2017'),
(3, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `email`, `name`, `class_id`, `username`, `password`, `token`, `location`, `status`) VALUES
(1, 'dika345gmail.com', 'handika', 3, 'anjing', 'anjing', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(2, 'dika345@gmail.com', 'reza', 3, '', '', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(3, 'dika345@gmail.com', 'fatur', 3, '', '', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(4, 'dika345@gmail.com', 'bustomi', 3, '', '', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(5, 'dika345@gmail.com', 'maul', 3, '', '', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(6, 'dika345@gmail.com', 'daus', 3, '', '', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(7, 'faturjihu@gmail.com', 'jovandi', 1, '', '', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered'),
(8, '', '', 0, 'fatur', '$2y$10$XjXL907njoKpHERQV9DCIu4RzgNaIHy2bKODdZ3MAVKs1TbH4rKxy', 'abcdefg', '', 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `assignment_id`, `floc`, `assignment_fdatein`, `fdesc`, `fname`, `student_id`, `grade`) VALUES
(1, 2, 'admin/uploads/1106_File_Epilog.docx', '2018-07-25 21:31:16', 'fewf', 'wefwe', 3, 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `student_backpack`
--

CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class_quiz`
--

INSERT INTO `student_class_quiz` (`student_class_quiz_id`, `class_quiz_id`, `student_id`, `student_quiz_time`, `grade`) VALUES
(1, 2, 3, '3600', '1 out of 2');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(1, 'Algoritma', 'Algoritma Dasar', '', '<p>Mata pelajaran algoritma dasar semester 1</p>\r\n', 0, '', '1st'),
(2, 'MTK', 'MTK', '', '<p>hihik</p>\r\n', 0, '', '2nd'),
(3, 'IPA: Biologi', 'Biologi', '', '<p>Mata pelajaran ipa: biologi.</p>\r\n', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `token` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backpack`
--

CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(1, 1, 1, 1, 'admin/uploads/thumbnails.jpg', '2018'),
(2, 2, 2, 1, 'admin/uploads/thumbnails.jpg', '2018'),
(3, 3, 1, 1, 'admin/uploads/thumbnails.jpg', '2018'),
(4, 3, 1, 2, 'admin/uploads/thumbnails.jpg', '2017'),
(6, 1, 10, 2, 'admin/uploads/thumbnails.jpg', ''),
(8, 4, 10, 2, 'admin/uploads/thumbnails.jpg', ''),
(11, 4, 10, 1, 'admin/uploads/thumbnails.jpg', ''),
(14, 4, 10, 3, 'admin/uploads/thumbnails.jpg', ''),
(15, 3, 1, 3, 'admin/uploads/thumbnails.jpg', ''),
(16, 5, 11, 2, 'admin/uploads/thumbnails.jpg', ''),
(17, 5, 11, 3, 'admin/uploads/thumbnails.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class_announcements`
--

INSERT INTO `teacher_class_announcements` (`teacher_class_announcements_id`, `content`, `teacher_id`, `teacher_class_id`, `date`) VALUES
(1, '<p>besok libur</p>\r\n', '3', 3, '2018-07-25 21:14:09'),
(2, '<p>tes tes!</p>\r\n', '4', 8, '2018-08-13 01:17:07'),
(3, '<p>tes tes!</p>\r\n', '4', 11, '2018-08-13 01:17:07'),
(4, '<p>tes pengumuman</p>\r\n', '4', 11, '2018-08-14 15:56:53'),
(6, '<p>tes tes</p>\r\n', '4', 8, '2018-08-18 00:46:50'),
(7, '<p>cobain dulu!!!</p>\r\n', '4', 8, '2018-08-20 10:21:44'),
(8, '<p>coba lagi</p>\r\n', '4', 8, '2018-08-28 04:30:05'),
(9, '<p>libur lagi</p>\r\n', '4', 8, '2018-08-28 04:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_notification`
--

INSERT INTO `teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `assignment_id`) VALUES
(1, 3, 'Submit Assignment file name <b>wefwe</b>', '2018-07-25 21:31:16', 'view_submit_assignment.php', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Handika', '', 'admin'),
(3, 'handika', 'admin', 'admin'),
(4, 'reza', 'reza', 'reza');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2018-07-18 17:04:21', '2018-09-03 21:37:16', 1),
(2, 'admin', '2018-07-18 17:43:35', '2018-09-03 21:37:16', 1),
(3, 'admin', '2018-07-18 17:44:37', '2018-09-03 21:37:16', 1),
(4, 'admin', '2018-07-19 02:19:51', '2018-09-03 21:37:16', 1),
(5, 'admin', '2018-07-23 21:47:09', '2018-09-03 21:37:16', 1),
(6, 'admin', '2018-07-23 22:10:54', '2018-09-03 21:37:16', 1),
(7, 'admin', '2018-07-23 22:17:44', '2018-09-03 21:37:16', 1),
(8, 'admin', '2018-07-24 13:38:29', '2018-09-03 21:37:16', 1),
(9, 'admin', '2018-07-24 23:42:43', '2018-09-03 21:37:16', 1),
(10, 'admin', '2018-07-24 23:43:35', '2018-09-03 21:37:16', 1),
(11, 'admin', '2018-07-30 20:49:40', '2018-09-03 21:37:16', 1),
(12, 'admin', '2018-07-30 22:38:39', '2018-09-03 21:37:16', 1),
(13, 'admin', '2018-08-10 13:21:19', '2018-09-03 21:37:16', 1),
(14, 'admin', '2018-08-10 13:22:00', '2018-09-03 21:37:16', 1),
(15, 'admin', '2018-08-20 09:08:51', '2018-09-03 21:37:16', 1),
(16, 'admin', '2018-08-22 00:06:14', '2018-09-03 21:37:16', 1),
(17, 'admin', '2018-08-23 11:52:33', '2018-09-03 21:37:16', 1),
(18, 'admin', '2018-08-23 17:10:01', '2018-09-03 21:37:16', 1),
(19, 'admin', '2018-08-30 14:33:09', '2018-09-03 21:37:16', 1),
(20, 'admin', '2018-08-30 14:46:52', '2018-09-03 21:37:16', 1),
(21, 'admin', '2018-08-30 15:40:43', '2018-09-03 21:37:16', 1),
(22, 'admin', '2018-08-30 15:42:09', '2018-09-03 21:37:16', 1),
(23, 'admin', '2018-08-30 16:20:35', '2018-09-03 21:37:16', 1),
(24, 'admin', '2018-08-30 17:44:59', '2018-09-03 21:37:16', 1),
(25, 'admin', '2018-08-30 18:51:30', '2018-09-03 21:37:16', 1),
(26, 'admin', '2018-08-30 19:23:12', '2018-09-03 21:37:16', 1),
(27, 'admin', '2018-09-01 11:08:52', '2018-09-03 21:37:16', 1),
(28, 'admin', '2018-09-01 11:08:56', '2018-09-03 21:37:16', 1),
(29, 'admin', '2018-09-01 11:08:58', '2018-09-03 21:37:16', 1),
(30, 'admin', '2018-09-01 11:08:59', '2018-09-03 21:37:16', 1),
(31, 'admin', '2018-09-01 11:08:59', '2018-09-03 21:37:16', 1),
(32, 'admin', '2018-09-01 11:09:00', '2018-09-03 21:37:16', 1),
(33, 'admin', '2018-09-01 11:10:09', '2018-09-03 21:37:16', 1),
(34, 'admin', '2018-09-01 14:04:06', '2018-09-03 21:37:16', 1),
(35, 'admin', '2018-09-03 19:39:17', '2018-09-03 21:37:16', 1),
(36, 'admin', '2018-09-04 15:46:25', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `student_backpack`
--
ALTER TABLE `student_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_backpack`
--
ALTER TABLE `student_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
