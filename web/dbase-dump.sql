-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2010 at 02:33 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6
--I need this script to work. Please see the script at [url removed, login to view]
--Users can be able to place bets and buy credit in the front-end.
--In the backend the admin can be able to
-- * add matches
-- * edit matches
-- * add live scores
-- * add news
-- * manage members
-- * can create the odds
-- * can create Match with match date and time
-- * can input the final score
-- can amend all information, edit ,delete or suspend user
-- can see all total bet
-- can send message to all users with promotions to email boxes
-- can setup the max. and min. betting value

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `shapla`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `doc_id` int(8) NOT NULL auto_increment,
  `doc_name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY  (`doc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `doc_name`, `file`) VALUES
(1, 'SFL Rules 2009/10', 'sfl_rules_2009_10.pdf'),
(2, 'SFL Team Application Form 2009/10', 'sfl_team_application_form_2009_10.pdf'),
(3, 'Player Registration Form', 'player_registration_form.doc'),
(4, 'Match Report Form', 'match_report_form.xls');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE IF NOT EXISTS `fines` (
  `fine_id` int(8) NOT NULL auto_increment,
  `fine_date` date default NULL,
  `due_date` date default NULL,
  `team_id` int(8) NOT NULL,
  `details` mediumtext,
  `amount` varchar(10) NOT NULL,
  `paid_date` date NOT NULL,
  `display` varchar(10) NOT NULL,
  PRIMARY KEY  (`fine_id`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`fine_id`, `fine_date`, `due_date`, `team_id`, `details`, `amount`, `paid_date`, `display`) VALUES
(1, '2010-08-13', '2010-08-18', 1, 'this is a fine for not attending', '16.00', '0000-00-00', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `history_id` int(1) NOT NULL auto_increment,
  `text` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`history_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `text`, `image`) VALUES
(2, 'The Shapla Football League was established in January of 1993 by a handful of football enthusiasts who had the vision of bringing together the best footballing talent within the ethnic minorities (principally Bangladeshis) from across the West Midlands.\r\n<br><br>\r\n\r\nThe primary aim of the league was to provide a platform for young Bangladeshi footballers to showcase their talents and use the league as a platform into the mainstream arena.\r\n<br><br>\r\n\r\nThe initial conception of the league was assisted by funds raised from various promotions and included just six teams; Aston Rangers, Lozells Strikers, Smethwick Jonota, Aston Strikers, Bengal Tigers and Walsall Bengal Stars.\r\n<br><br>\r\n\r\nThe teams participating were all made up of players from the West Midland ''s Bangladeshi community. Given that a high proportion of Bangladeshis worked in the catering sector, the games needed to be played during Sunday afternoons. The structure of the league also met the needs of the Bangladeshi players who were predominantly Muslims as it had to fit around their work patterns, cultural and religious needs as well as having a short break for the month of Ramadan and Eid celebrations.\r\n<br><br>\r\n\r\nGames were originally played on pitches in the borough of Smethwick but in recent years have been staged at Saltley Leisure Centre, situated approximately three miles east from the centre of Birmingham .\r\n<br><br>\r\n\r\nDue to the success of the competition, the league attracted considerable national interest and within a couple of seasons had to be expanded to two divisions, with eight teams in each division.\r\n<br><br>\r\n\r\nTeams from towns such as Kidderminster, Dudley, Northampton and as far as Milton Keynes entered the league.\r\nNon-Bangladeshi players and teams were welcomed into the league and it is now currently operating as a non-exclusive Community League affiliated to the Birmingham Football Association, but still retaining it''s core promise of providing culturally and religiously acceptable football.\r\nCurrently, four games are played every Sunday alternating between the two divisions at Saltley Leisure Centre. The league begins in late August or early September and ends with the Cup Final in late May or early June.\r\n<br><br>\r\n\r\nThe league operates a two-up, two-down format with two teams being relegated from Division One and two teams promoted from Division Two.\r\n<br><br>\r\n\r\nA play-off scenario is also currently being evaluated to try and keep all teams interested right to the end of the season.\r\n<br><br>\r\n\r\nAs with all successful leagues, The Shapla Football League also operates a League Cup competition where teams from both divisions play in a knock-out contest to ultimately try and reach the Cup Final.\r\n<br><br>\r\n\r\nSince 1999, the Cup Final has been staged at the prestigious Villa Park stadium, home of FA Premier League club Aston Villa and supported by West Midlands Police. The game is marketed throughout the West Midlands via the local press, radio, leaflets and posters as a family event with free admission. Cup Final Day has always attracted thousands of fans, from all communities including women, children and important dignitaries.\r\n<br><br>\r\n\r\nThe league also founded the Shapla Eka-Dosh football team, made up of a select group of talented players from within the Shapla Football League. Shapla Eka-Dosh was created with the sole purpose of raising the profile of both the Shapla Football League but more importantly the players within the league who needed further exposure. The team participated in successful competitions on a national level. ', 'shaplalogo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(8) NOT NULL auto_increment,
  `link_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `caption` varchar(255) default NULL,
  PRIMARY KEY  (`link_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_id`, `link_name`, `link`, `caption`) VALUES
(1, 'Birmingham County FA', 'http://www.birminghamfa.com', 'Birmingham County Football Association Website.');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `match_id` int(8) NOT NULL auto_increment,
  `date` date default NULL,
  `time` varchar(5) default NULL,
  `team1` int(8) NOT NULL,
  `team2` int(8) NOT NULL,
  `score1` varchar(10) default NULL,
  `score2` varchar(10) default NULL,
  `report` longtext,
  `referee_id` int(8) NOT NULL,
  `season_id` int(8) NOT NULL,
  PRIMARY KEY  (`match_id`),
  KEY `team1` (`team1`,`team2`),
  KEY `referee_id` (`referee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `date`, `time`, `team1`, `team2`, `score1`, `score2`, `report`, `referee_id`, `season_id`) VALUES
(1, '2010-08-02', '15:00', 1, 2, '2', '0', 'N/A', 1, 2010),
(2, '2010-08-10', '15:00', 1, 2, '3', '1', 'n/a', 1, 2010);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(8) NOT NULL auto_increment,
  `news_title` varchar(255) NOT NULL,
  `byline` text,
  `news_body` longtext NOT NULL,
  `pic` varchar(255) default NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `byline`, `news_body`, `pic`, `date`) VALUES
(1, 'Adebayor ready for tough competition ', 'Emmanuel Adebayor is determined to establish himself as Manchester City''s leading striker this season.', 'Adebayor scored 14 goals in 25 league starts during his first season at City after his big-money move from Arsenal but was overshadowed by fellow summer signing Carlos Tevez.\r\n<br>\r\nThe Argentina international led City''s unsuccessful challenge for a Champions League place with 23 league goals.\r\n<br>\r\nThey are both set to face stiff competition this term with City still targeting Inter Milan striker Mario Balotelli along with Liverpool star Fernando Torres.', 'gary.jpg', '2010-07-27'),
(2, 'This is a test', 'Another test to see the new news section', '<p>\r\n	The news section of a website can be very important to a visitor. Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah</p>\r\n<p>\r\n	Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah</p>', 'shutterstock_11954542.jpg', '2010-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE IF NOT EXISTS `officers` (
  `officer_id` int(8) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) default NULL,
  `biography` longtext,
  `telephone` varchar(15) default NULL,
  `mobile` varchar(15) default NULL,
  `email` varchar(255) default NULL,
  `photo` varchar(255) default NULL,
  PRIMARY KEY  (`officer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`officer_id`, `name`, `position`, `biography`, `telephone`, `mobile`, `email`, `photo`) VALUES
(1, 'Habib Ullah', 'Chairman', '<p>\r\n	This is some text about the chairman of Shapla League</p>', NULL, '07834 360514', 'habib.ullah@birmingham.gov.uk', 'habib-thumb-9598.jpg'),
(2, 'Robiul Hussain', 'Vice Chair', NULL, NULL, '07956 825644', 'robisheikh@hotmail.co.uk', 'habib-thumb-9599.jpg'),
(3, 'Monjur Choudhury', 'General Secretary', '<p>\r\n	Monjor Choudhury is the Leagues secretary</p>', NULL, '07966 414 727', 'monjur.choudhury@thermo.com', 'habib-thumb-9595.jpg'),
(4, 'Abdul Hoq', 'Disciplinary Secretary', NULL, NULL, '07792886610', 'hoq@peppers-uk.co.uk', 'habib-thumb-9602.jpg'),
(5, 'Ahmed Salem', 'Fixture Secretary', NULL, NULL, '07790 665283', 'ahmedmsalem@hotmail.com', 'habib-thumb-9604.jpg'),
(6, 'Dr Sahangir Ali', 'Player Registration Secretary', NULL, NULL, '07880685730', 'sahangir@googlemail.com', 'habib-thumb-9600.jpg'),
(7, 'Imran Majid', 'Manager''s Representative', NULL, NULL, '07773 898881', 'majeed_imran@yahoo.co.uk', 'habib-thumb-9603.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL auto_increment,
  `ques_id` int(11) NOT NULL,
  `value` varchar(300) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `ques_id`, `value`) VALUES
(1, 1, 'Excellent'),
(2, 1, 'Good'),
(3, 1, 'Poor');

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE IF NOT EXISTS `photo_gallery` (
  `gallery_id` int(8) NOT NULL auto_increment,
  `gallery_image` varchar(255) NOT NULL,
  `caption` varchar(255) default NULL,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`gallery_id`, `gallery_image`, `caption`, `category_name`) VALUES
(1, '1.jpg', '2009 Champions Sparkhill Rangers', 'Teams'),
(2, '2.jpg', '2009 Runners Up Al Ansar FC', 'Teams'),
(3, '3.jpg', '2009 Man of the Match', 'Matches'),
(4, '4.jpg', '2009 Winning Captain', 'Other'),
(5, '5.jpg', '2009 Match Officials', 'Other'),
(6, '6.jpg', '2009 Presentation to Aston Villa', 'Events');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `player_id` int(8) NOT NULL auto_increment,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `gender` varchar(10) default 'Male',
  `nationality` varchar(50) default NULL,
  `email` varchar(255) default NULL,
  `dob` date default NULL,
  `place_birth` varchar(255) default NULL,
  `height` varchar(20) default NULL,
  `weight` varchar(10) default NULL,
  `photo` varchar(255) default NULL,
  `comments` text,
  `position` varchar(255) NOT NULL,
  `team_id` int(8) NOT NULL,
  `Goals` int(5) default '0',
  `YC` int(5) default '0',
  `RC` int(5) default '0',
  `MOM` int(5) default '0',
  PRIMARY KEY  (`player_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`player_id`, `fname`, `sname`, `gender`, `nationality`, `email`, `dob`, `place_birth`, `height`, `weight`, `photo`, `comments`, `position`, `team_id`, `Goals`, `YC`, `RC`, `MOM`) VALUES
(1, 'James', 'Bond', 'Male', 'British', 'j.bond@mi5.com', '1981-08-11', 'Birmingham', '5ft 8"', '10 St', 'man1.jpg', '<p>\r\n	Good Player.</p>', 'GS', 1, 0, 0, 0, 0),
(2, 'Bongo', 'Jango', 'Male', 'British', 'j.eeed@mi5.com', '1986-08-25', 'Birmingham', '5ft 9"', '12 St', '27.jpg', '<p>\r\n	Good Cook</p>', 'GK', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL auto_increment,
  `ques` text NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `ques`, `created_on`) VALUES
(1, 'How would you rate this site?', '2009-10-13 07:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `referee`
--

CREATE TABLE IF NOT EXISTS `referee` (
  `ref_id` int(8) NOT NULL,
  `fname` varchar(255) default NULL,
  `sname` varchar(255) default NULL,
  `gender` varchar(10) default NULL,
  `nationality` varchar(50) default NULL,
  `email` varchar(255) default NULL,
  `dob` date default NULL,
  `place_birth` varchar(50) default NULL,
  `photo` varchar(255) default NULL,
  `ref_level` varchar(50) default NULL,
  PRIMARY KEY  (`ref_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referee`
--

INSERT INTO `referee` (`ref_id`, `fname`, `sname`, `gender`, `nationality`, `email`, `dob`, `place_birth`, `photo`, `ref_level`) VALUES
(1, 'Mr', 'Joyrul', 'Male', 'British', 'mr.j@ref.com', '1977-08-09', 'Birmingham', 'joyrul.jpg', 'Intermediate');

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE IF NOT EXISTS `season` (
  `season_id` int(8) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY  (`season_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`season_id`, `start_date`, `end_date`) VALUES
(2010, '2010-09-10', '2011-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
  `sponsor_id` int(8) NOT NULL auto_increment,
  `sponsor_name` varchar(255) NOT NULL,
  `logo` varchar(255) default NULL,
  `link` varchar(255) default NULL,
  `featured` varchar(10) NOT NULL default 'No',
  PRIMARY KEY  (`sponsor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `logo`, `link`, `featured`) VALUES
(1, 'SKN Chartered Accountants', 'sponsor1.jpg', 'http://www.sknservices.co.uk', 'Yes'),
(2, 'First Accident Group', 'sponsor2.jpg', 'http://www.firstaccidentgroup.com', 'Yes'),
(3, 'Aston Villa FC', 'sponsor3.jpg', 'http://www.avfc.co.uk', 'Yes'),
(4, 'Bia Lounge', 'sponsor4.jpg', 'http://www.bialounge.com', 'Yes'),
(5, 'FB Supermarket', 'sponsor5.jpg', 'http://www.fbsupermarket.com', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `table_id` int(8) NOT NULL auto_increment,
  `team_id` int(8) NOT NULL,
  `P` int(6) NOT NULL,
  `W` int(6) NOT NULL,
  `D` int(6) NOT NULL,
  `L` int(6) NOT NULL,
  `F` int(6) NOT NULL,
  `A` int(6) NOT NULL,
  `GD` int(6) NOT NULL,
  `Pts` int(6) NOT NULL,
  PRIMARY KEY  (`table_id`),
  KEY `team_id` (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tables`
--


-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(8) NOT NULL auto_increment,
  `team_name` varchar(255) NOT NULL,
  `team_address` text,
  `team_phone` varchar(25) default NULL,
  `team_email` varchar(255) default NULL,
  `team_web` varchar(255) default NULL,
  `colours_home` varchar(50) default NULL,
  `colours_away` varchar(50) default NULL,
  `manager` varchar(255) default NULL,
  `assistant` varchar(255) default NULL,
  `club_rep` varchar(255) default NULL,
  `division` varchar(255) default NULL,
  `team_pic` varchar(255) default NULL,
  `team_logo` varchar(255) default NULL,
  `profile` mediumtext,
  `honours` mediumtext,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY  (`team_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_address`, `team_phone`, `team_email`, `team_web`, `colours_home`, `colours_away`, `manager`, `assistant`, `club_rep`, `division`, `team_pic`, `team_logo`, `profile`, `honours`, `password`) VALUES
(1, 'Al Ansar', NULL, '07854996361', 'majeed_imran@yahoo.co.uk', 'www.alansarfc.co.uk', 'White', 'Green', 'Fayyaz Razzaq', NULL, NULL, 'Pr', 'habib-gallery-13510.jpg', 'ferrari-logo1_100.png', '', NULL, ''),
(2, 'Aston Rangers', NULL, '07899 757 990', 'zarsul1973@yahoo.co.uk', NULL, 'Orange', NULL, 'Shahid Hussain', NULL, NULL, 'Pr', NULL, NULL, '', NULL, ''),
(3, 'Aston XI', NULL, '07961 180 464', 'ahmedali_8@yahoo.co.uk', NULL, 'Red / White', NULL, 'Ahmed Ali', NULL, NULL, 'D1', NULL, NULL, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE IF NOT EXISTS `video_gallery` (
  `video_id` int(8) NOT NULL auto_increment,
  `video_code` text NOT NULL,
  `caption` varchar(255) default NULL,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`video_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `video_gallery`
--

INSERT INTO `video_gallery` (`video_id`, `video_code`, `caption`, `category_name`) VALUES
(1, 'http://www.youtube.com/watch?v=8uAPkVpSgk4', '2010 Awards Ceremony', 'Other'),
(2, 'http://www.youtube.com/watch?v=tEEiH22BTLA', 'Shapla League Final 1st Half', 'Matches');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL auto_increment,
  `option_id` int(11) NOT NULL,
  `voted_on` datetime NOT NULL,
  `ip` varchar(16) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `option_id`, `voted_on`, `ip`) VALUES
(1, 2, '2009-10-14 14:00:55', ''),
(2, 1, '2009-10-14 14:01:27', '127.0.0.1'),
(3, 1, '2009-10-14 14:02:04', '127.0.0.1'),
(4, 1, '2009-10-14 14:02:13', '127.0.0.1'),
(5, 3, '2009-10-14 14:02:16', '127.0.0.1'),
(6, 4, '2009-10-14 14:02:21', '127.0.0.1'),
(7, 3, '2009-10-14 14:02:24', '127.0.0.1'),
(8, 1, '2009-10-14 14:02:27', '127.0.0.1'),
(9, 2, '2009-10-14 14:02:31', '127.0.0.1'),
(10, 5, '2009-10-14 14:02:35', '127.0.0.1'),
(11, 1, '2009-10-14 14:02:38', '127.0.0.1'),
(12, 2, '2009-10-14 14:02:43', '127.0.0.1'),
(13, 1, '2009-10-14 14:02:46', '127.0.0.1'),
(14, 1, '2009-10-14 14:02:50', '127.0.0.1'),
(15, 1, '2009-10-14 14:05:26', '127.0.0.1'),
(16, 1, '2009-10-14 14:05:29', '127.0.0.1'),
(17, 4, '2009-10-14 14:05:33', '127.0.0.1'),
(18, 2, '2009-10-14 14:05:36', '127.0.0.1'),
(19, 1, '2009-10-14 14:05:40', '127.0.0.1'),
(20, 3, '2009-10-14 14:05:46', '127.0.0.1'),
(21, 2, '2009-10-14 14:05:49', '127.0.0.1'),
(22, 2, '2009-10-14 14:21:37', '127.0.0.1'),
(23, 1, '2009-10-14 14:21:53', '127.0.0.1'),
(24, 5, '2009-10-14 14:21:59', '127.0.0.1'),
(25, 1, '2009-10-14 14:35:27', '127.0.0.1'),
(26, 1, '2009-10-15 00:42:05', '127.0.0.1'),
(27, 3, '2009-10-15 00:49:42', '127.0.0.1'),
(28, 2, '2009-10-15 01:22:00', '127.0.0.1'),
(29, 2, '2009-10-15 01:24:51', '127.0.0.1'),
(30, 1, '2009-10-15 01:37:21', '127.0.0.1'),
(31, 1, '2009-10-15 01:38:48', '127.0.0.1'),
(32, 1, '2009-10-15 01:41:30', '127.0.0.1'),
(33, 1, '2009-10-15 01:42:21', '127.0.0.1'),
(34, 1, '2009-10-15 04:53:42', '127.0.0.1'),
(35, 3, '2009-10-15 05:09:14', '127.0.0.1'),
(36, 2, '2009-10-15 05:10:01', '127.0.0.1'),
(37, 3, '2010-08-02 09:45:16', '127.0.0.1'),
(38, 2, '2010-08-02 09:54:25', '127.0.0.1');