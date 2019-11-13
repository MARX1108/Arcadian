-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2019 at 05:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Arcadian`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `user_1_id` int(11) NOT NULL,
  `user_2_id` int(11) DEFAULT NULL,
  `story_1_id` int(11) UNSIGNED DEFAULT NULL,
  `story_2_id` int(11) UNSIGNED DEFAULT NULL,
  `data_type` varchar(200) DEFAULT NULL,
  `data_value` varchar(10000) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_type`, `user_1_id`, `user_2_id`, `story_1_id`, `story_2_id`, `data_type`, `data_value`, `date_created`) VALUES
(2, 201, 17, NULL, 79, NULL, NULL, NULL, '2019-11-11 01:05:54'),
(3, 201, 17, NULL, 80, NULL, NULL, NULL, '2019-11-11 01:47:47'),
(4, 201, 17, NULL, 81, NULL, NULL, NULL, '2019-11-11 01:48:22'),
(5, 201, 17, NULL, 82, NULL, NULL, NULL, '2019-11-11 01:49:25'),
(6, 201, 17, NULL, 83, NULL, NULL, NULL, '2019-11-11 01:50:04'),
(7, 201, 17, NULL, 84, NULL, NULL, NULL, '2019-11-11 01:53:10'),
(9, 201, 17, NULL, 85, NULL, NULL, NULL, '2019-11-11 01:57:41'),
(11, 201, 17, NULL, 86, NULL, NULL, NULL, '2019-11-11 01:58:20'),
(12, 202, 17, NULL, 86, NULL, NULL, NULL, '2019-11-11 01:58:23'),
(14, 203, 17, NULL, 56, NULL, NULL, NULL, '2019-11-11 02:02:20'),
(15, 203, 17, NULL, 56, NULL, NULL, NULL, '2019-11-11 02:04:44'),
(16, 204, 17, NULL, NULL, NULL, NULL, NULL, '2019-11-11 02:05:27'),
(17, 204, 17, NULL, NULL, NULL, NULL, NULL, '2019-11-11 02:09:58'),
(20, 206, 14, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:16:48'),
(21, 207, 14, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:16:48'),
(22, 206, 8, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:23:24'),
(23, 207, 8, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:23:24'),
(24, 206, 8, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:24:36'),
(25, 207, 8, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:24:36'),
(26, 206, 8, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:24:56'),
(27, 207, 8, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:24:56'),
(28, 206, 14, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:26:08'),
(29, 207, 14, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:26:08'),
(30, 206, 5, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:28:19'),
(31, 207, 5, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:28:19'),
(32, 206, 15, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:28:30'),
(33, 207, 15, NULL, NULL, NULL, NULL, NULL, '2019-11-12 14:28:30'),
(34, 201, 17, NULL, 87, NULL, NULL, NULL, '2019-11-12 14:32:59'),
(35, 201, 3, NULL, 88, NULL, NULL, NULL, '2019-11-12 15:16:27'),
(36, 206, 5, NULL, NULL, NULL, NULL, NULL, '2019-11-12 15:18:44'),
(37, 207, 5, NULL, NULL, NULL, NULL, NULL, '2019-11-12 15:18:44'),
(38, 201, 16, NULL, 89, NULL, NULL, NULL, '2019-11-12 15:25:09'),
(39, 204, 16, NULL, NULL, NULL, NULL, NULL, '2019-11-12 16:00:59'),
(40, 201, 13, NULL, 90, NULL, NULL, NULL, '2019-11-12 16:06:36'),
(41, 202, 13, NULL, 9, NULL, NULL, NULL, '2019-11-12 16:06:56'),
(42, 202, 13, NULL, 9, NULL, NULL, NULL, '2019-11-12 16:07:12'),
(43, 203, 13, NULL, 90, NULL, NULL, NULL, '2019-11-12 16:08:42'),
(44, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:15:35'),
(45, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:16:08'),
(46, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:16:35'),
(47, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:17:24'),
(48, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:17:56'),
(49, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:18:49'),
(50, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:19:35'),
(51, 204, 13, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:19:54'),
(52, 204, 17, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:21:34'),
(53, 206, 3, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:21:57'),
(54, 207, 3, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:21:57'),
(55, 206, 14, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:22:10'),
(56, 207, 14, NULL, NULL, NULL, NULL, NULL, '2019-11-13 15:22:10'),
(57, 201, 7, NULL, 91, NULL, NULL, NULL, '2019-11-13 15:23:50'),
(58, 203, 7, NULL, 6, NULL, NULL, NULL, '2019-11-13 15:25:19'),
(59, 201, 1, NULL, 92, NULL, NULL, NULL, '2019-11-13 15:26:46'),
(60, 202, 17, NULL, 87, NULL, NULL, NULL, '2019-11-13 15:29:08'),
(61, 202, 17, NULL, 87, NULL, NULL, NULL, '2019-11-13 15:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `news_list`
--

CREATE TABLE `news_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `author` varchar(200) NOT NULL,
  `title` varchar(500) NOT NULL,
  `img_url` varchar(500) NOT NULL,
  `url` varchar(500) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `donate` int(11) NOT NULL DEFAULT 0,
  `description` varchar(10000) NOT NULL DEFAULT '''\\�''�He/She doesn\\�\\��\\�''��t leave description :|\\�''�''',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `news_list`
--

INSERT INTO `news_list` (`id`, `creator_id`, `author`, `title`, `img_url`, `url`, `views`, `tags`, `likes`, `donate`, `description`, `date_created`) VALUES
(1, 1, 'Zahidul', 'Show & Go l 433 l Lit', 'https://cdn.dribbble.com/users/43342/screenshots/7905778/media/f75df49289883c6f5651f6de27100040.jpg', 'https://dribbble.com/shots/7905778-Show-Go-l-433-l-Lit', 0, '', 0, 0, 'Show & Go l 433 l Lit\r\n\r\nPhoto\'s from unsplash.', '2019-10-27 15:11:10'),
(2, 3, 'Semas', 'Social App • Profiles', 'https://cdn.dribbble.com/users/719258/screenshots/7834997/media/47fe065281255fdfe130c99e908e2165.png', 'https://dribbble.com/shots/7834997-Social-App-Profiles?utm_source=Clipboard_Shot&utm_campaign=semasben&utm_content=Social%20App%20%20%E2%80%A2%20Profiles&utm_medium=Social_Share', 0, '#app #card #clean #contact #design #feed #friends #home #ios #modern #profile #social #tag #ui #ux', 0, 0, 'Social App • Profiles', '2019-10-27 15:14:50'),
(3, 6, 'JT', 'Debut Shot - Book Store App\r\n', 'https://cdn.dribbble.com/users/4193425/screenshots/7831562/media/3aa59762b5ebc86f50f2b1ba81101eaa.png', 'https://dribbble.com/shots/7831562-Debut-Shot-Book-Store-App', 0, '#UI', 0, 0, 'Debut Shot - Book Store App\r\n', '2019-10-27 15:54:26'),
(4, 4, 'Dalibor Hajdinjak ', 'Cubii Fitness App v2', 'https://cdn.dribbble.com/users/426214/screenshots/7821138/media/8a1138f1a868fc959a10bcadc902164e.png', 'https://dribbble.com/shots/7821138-Cubii-Fitness-App-v2', 0, '#app #cubii #digital #fitness #app #mobile #uiux', 0, 0, 'Hi folks,\r\n\r\nA couple weeks ago we were approached by Cubii - the ONLY bluetooth enabled under desk elliptical on the market. It tracks your workouts and progress over time, lets you compete against other users and share your activities.\r\n\r\nI\'m sharing one of the latest screens we designed for their fitness app. While the instructions were pretty strict, we\'ve created several versions to choose from, and here\'s one of them. Will share more shortly.\r\n\r\nHope you like it !?\r\n♥ Happy to hear your thoughts.', '2019-10-27 16:43:59'),
(5, 5, 'Md Rasel', 'Frinobit - Brand Identity', 'https://cdn.dribbble.com/users/2621335/screenshots/7836873/media/1e47a4004ed77da2e272940c5e2f2a8f.jpg', 'https://dribbble.com/shots/7836873-Frinobit-Brand-Identity', 0, '#abstract #app #app icon', 0, 0, 'Frinobit branding project\r\n----\r\nFollow me on\r\nbehance', '2019-10-27 16:46:22'),
(6, 7, 'Kit8', 'Roli', 'https://cdn.dribbble.com/users/76454/screenshots/8190968/media/34ef8f1f1b3ca5d22f1bf65218cad817.png', 'https://cdn.dribbble.com/users/76454/screenshots/8190968/media/34ef8f1f1b3ca5d22f1bf65218cad817.png', 0, '#c4d', 0, 0, 'First of almost 50 illustrations I did for Roli.', '2019-10-27 16:47:12'),
(7, 8, 'Gleb Kuznetsov✈', 'quantum computer art', 'https://cdn.dribbble.com/users/32512/screenshots/7701476/media/7896f20d280164017ce0e2e07aca20fa.png', 'https://dribbble.com/shots/7701476-quantum-computer-art', 0, '#3d #abstract #art #c4d', 0, 0, 'He/She doesn\'t leave description :|', '2019-10-27 16:49:13'),
(8, 9, 'Sarkhan Rzazadeh', 'HLR', 'https://cdn.dribbble.com/users/1587791/screenshots/7836890/media/91ebd79d4ce8a8da74462edffe7c38d4.png', 'https://dribbble.com/shots/7836890-HLR', 0, '#branding #creative #design #icon #icons #logo #mark #minimal #symbol #type', 0, 0, 'He/She doesn\'t leave description :|', '2019-10-27 16:50:13'),
(10, 14, 'Humayra Kabir Anamika', 'Music App UI', 'https://cdn.dribbble.com/users/2301995/screenshots/7829891/media/541c61174e80ef2c354d7290b3250057.png', 'https://dribbble.com/shots/7829891-Music-App-UI', 0, '#2020 #animation # ui #typography #ui', 0, 0, 'Music App UI\r\nMusic App UI\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nBicyle\r\nBicyle\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nFull Screen Scrolling Agency Demo - Saasland\r\nFull Screen Scrolling Agency Demo - Saasland\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nCrosses 3/3\r\nCrosses 3/3\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nIcon backtotop\r\ndribbble\r\nShow and tell for designers\r\n\r\nWhat are you working on? Dribbble is a community of designers sharing screenshots of their work, process, and projects.\r\n\r\nIcon team dribbble Icon team twitter Icon team facebook Icon team instagram Icon team blog\r\n\r\nDribbble\r\nAbout\r\nHelp\r\nContact\r\nCareers\r\nTerms\r\nGuidelines\r\nPrivacy\r\nPlayoffs\r\nShop\r\nTestimonials\r\nMedia Kit\r\nAdvertise\r\nAPI\r\nApps\r\nPlaces\r\nHiring at Dribbble\r\nPost a job\r\nSearch designers\r\nAdd your team\r\nDirectories\r\nJobs\r\nTags\r\nJobs for Designers\r\nB002499cf66face5ef256f33ff64a5c9\r\nKlarna\r\nSenior Product Designer\r\nA5c8624192237fb095788390fdf56c4a\r\nLiferay\r\nProduct Designer\r\n8e26493a8dc9589947de21ba6f24821b\r\nSnapdocs\r\nVisual Designer\r\n7,847,991\r\nshots dribbbled\r\n© 2019 Dribbble. All rights reserved.\r\n\r\nMade with ♥ remotely fromSalem, MAWalnut Creek, CAVictoria, BCCentennial, COBournemouth, UKVancouver, BCMontreal, QCRoseville, MNRome, GAPeterborough, NHOakland, CAAustin, TXMystic, CTSaint Charles, MODes Moines, IASalt Lake City, UTLander, WYCote St Luc, QCWomelsdorf, PAMinneapolis, MNHighlands Ranch, COSan Francisco, CASilver Spring, MDLondon, ONPottstown, PAPhoenix, AZSacramento, CAFarmers Branch, TXMarina del Rey, CAMurray, UTOrlando, FLParis, FranceBrookline, MALos Angeles, CASan Rafael, CASan Luis Obispo, CAAtlanta, GATucson, AZ\r\nIcon shot x light\r\nIronSketchHumayra Kabir Anamika\r\nMusic App UI\r\nby Humayra Kabir Anamika for IronSketch | Follow\r\nSave  Like\r\nHey! Music lovers ❤️\r\n\r\nToday I\'m showing you My recent Music App concept. Hope you guys will like it.\r\n\r\nPlease let me know what do you think about.\r\n\r\n-------------------------------\r\nDon\'t forget to add ❤️ and follow me and our team!\r\n-------------------------------\r\nWe are available for taking your project\r\nEstimate your project at getironsketch@gmail.com\r\nOr you can directly contact me :\r\nanamikacse20@gmail.com\r\n\r\nFollow me on:\r\nBehance\r\nFlickr\r\nLinkedIn', '2019-10-27 16:52:11'),
(11, 15, 'Md. Shahadat Hussain', 'Full Screen Scrolling Agency Demo - Saasland', 'https://cdn.dribbble.com/users/183729/screenshots/7835174/media/f1edd8ec099c37872390dc160fa54d44.jpg', 'https://dribbble.com/shots/7835174-Full-Screen-Scrolling-Agency-Demo-Saasland', 0, '#wordpress theme', 0, 0, 'HI Guys!\r\nWe have released a new Home page demo in our Saasland MultiPurposeWordPress Theme. We are really excited about this demo because it is totally unique than the other demos.\r\n\r\nIt\'s design is very colorful and fun. It\'s navigation is unique than all other demos except one - it\'s a full screen scrolling navigation system. All pages have colored background and white texts on them.\r\n\r\nSaasland is a creative WordPress theme for saas, software, startup, mobile app, agency and related products & services. Saasland is loaded with tons of features, elements & blocks, options that give its users real flexibility to create a dynamic, professional website in no time.', '2019-10-27 16:53:13'),
(12, 16, 'Mansoor ', 'Illustrations Pack Kit\r\n', 'https://cdn.dribbble.com/users/254977/screenshots/7836460/media/88b6ffdf7d6bdff4627cc7de8a514505.png', 'https://dribbble.com/shots/7836460-Illustrations-Pack-Kit', 0, '#Illustration', 0, 0, 'Room Gym Exersice\r\n\r\nAvailable To Get Full Kit\r\n\r\nGet the Kit\r\n\r\nAvailable for Hire\r\nFull-time position (Remote), Contract, Project basis\r\nmansoorwave@gmail.com Skype : just.mansoor\r\n\r\nFollow me on :- Behance | Twitter| Instagram| Facebook|', '2019-10-27 16:55:47'),
(56, 17, 'Mr.Thanos', 'Bermuda Triangle', 'https://cdn.dribbble.com/users/43342/screenshots/8083251/media/1e198234a578fed46d0ea591088b08c8.jpg', 'https://cdn.dribbble.com/users/43342/screenshots/8083251/media/1e198234a578fed46d0ea591088b08c8.jpg', 0, '#heaven-door', 0, 0, '', '2019-10-28 22:19:58'),
(75, 14, 'Humayra', 'Bermuda Triangle', 'https://cdn.dribbble.com/users/43342/screenshots/7915038/media/b635530ceab6b6c0698254a0d7e0b6d4.jpg', 'https://dribbble.com/shots/7915038--Astro-The-Universe-The-Bermuda-Triangle', 0, '#Bermuda', 0, 0, 'https://dribbble.com/shots/7915038--Astro-The-Universe-The-Bermuda-Triangle', '2019-11-10 22:59:13'),
(76, 1, 'Zahidul', 'Tales unused version', 'https://cdn.dribbble.com/users/646147/screenshots/7840320/media/06151285f3810156ce6f10f76f8c56e9.png', 'https://dribbble.com/shots/7840320-Tales-unused-version', 0, '#art #branding', 0, 0, 'Icon unused version for Tales.\r\n\r\nYou can download the application HERE\r\n\r\nPress \"L\" if you like â¤ï¸\r\nHave a great weekend )', '2019-11-10 23:01:53'),
(88, 3, 'Semas3', 'fantasizing', 'https://cdn.dribbble.com/users/3281732/screenshots/8159457/media/9e7bfb83b0bd704e941baa7a44282b22.jpg', 'https://dribbble.com/shots/8159457-fantasizing', 0, '#fantasizing', 0, 0, 'Semas3', '2019-11-12 15:16:27'),
(89, 16, 'Mansoor', 'Interface Elements 3', 'https://cdn.dribbble.com/users/1259559/screenshots/8129912/media/ab532e1847c6ebe91232eab488b5ab28.jpg', 'https://cdn.dribbble.com/users/1259559/screenshots/8129912/media/ab532e1847c6ebe91232eab488b5ab28.jpg', 0, '#This-is-no-tag tag', 0, 0, 'Mansoor', '2019-11-12 15:25:09'),
(90, 13, 'DizGalt', 'Travel App', 'https://cdn.dribbble.com/users/3975359/screenshots/8157039/media/0ce352124382812c3de3ddaf677a2589.jpg', 'https://cdn.dribbble.com/users/3975359/screenshots/8157039/media/0ce352124382812c3de3ddaf677a2589.jpg', 0, '#New description', 0, 0, 'New description', '2019-11-12 16:06:36'),
(91, 7, 'Kit8', 'Blueprint - landing page', 'https://cdn.dribbble.com/users/225019/screenshots/8172256/media/3c8b735515548c080fbbe914dc93cd5a.png', 'https://cdn.dribbble.com/users/225019/screenshots/8172256/media/3c8b735515548c080fbbe914dc93cd5a.png', 0, '#c4d', 0, 0, 'Kit8', '2019-11-13 15:23:50'),
(92, 1, 'Zahidul', 'Budget Planning Dashboard', 'https://cdn.dribbble.com/users/6234/screenshots/8168686/media/44f4fe854d724da31b165ed2629e3320.png', 'https://cdn.dribbble.com/users/6234/screenshots/8168686/media/44f4fe854d724da31b165ed2629e3320.png', 0, '#UI #dashboard', 0, 0, 'Zahidul', '2019-11-13 15:26:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `class_standing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `date_registered`, `firstname`, `lastname`, `email`, `class_standing`) VALUES
(1, 'Zahidul', 'Zahidul', 0, '2019-11-10 22:16:28', 'Zahidul', 'T', 'zahidul@vt.edu', 0),
(3, 'Semas2', 'Semas', 0, '2019-11-20 22:31:25', 'Semas', 'Stackhouse', 'semas@vt.edu', 2),
(4, 'Dalibor', 'Dalibor', 0, '2019-11-05 22:17:56', 'Dalibor', 'Hajdinjak', 'dalibor99@vt.edu', 1),
(5, 'MdRasel', 'MdRasel', 1, '2019-11-13 15:17:56', 'Md', 'Rasel', 'rasel@vt.edu', 3),
(6, 'Mr.Jarvis', 'Mr.Jarvis', 1, '2019-11-14 15:30:29', 'Jarvis', 'Stark', 'stark@vt.edu', 4),
(7, 'Kit8', 'Kit8', 0, '2019-11-10 22:19:41', 'Kit', 'Potter', 'kpotter@vt.edu', 3),
(8, 'Gleb10', 'Gleb', 0, '2019-11-10 22:21:58', 'Gleb', 'Kuznetsov', 'gleb118@vt.edu', 3),
(9, 'Sarkhan', 'Sarkhan', 0, '2019-10-16 22:14:46', 'Sarkhan', 'Razazadeh', 'razazaza@vt.edu', 3),
(13, 'DizGalt', 'DizGala', 0, '2019-11-04 22:22:20', 'Diz', 'Galt', 'gali2020202@vt.edu', 0),
(14, 'Humaya', 'Humayra', 1, '2019-11-13 22:22:20', 'Humayra', 'Anamika', 'anamika2@vt.edu', 2),
(15, 'Shahad', 'Shahadat', 0, '2019-11-06 22:22:20', 'Shahadat', 'Hussain', 'hussain@vt.edu', 3),
(16, 'Mansoor', 'Mansoor', 0, '2019-11-08 11:31:20', 'Mans', 'Hussain', 'hussain@vt.edu', 0),
(17, 'Mr.Thanos', 'Mr.Thanos', 1, '2019-11-20 22:22:20', 'Thanos', 'King', 'Thanos@vt.edu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_2_id` (`user_2_id`),
  ADD KEY `user_1_id` (`user_1_id`),
  ADD KEY `story_2_id` (`story_2_id`);

--
-- Indexes for table `news_list`
--
ALTER TABLE `news_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `news_list`
--
ALTER TABLE `news_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_1_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`user_2_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`story_1_id`) REFERENCES `news_list` (`id`),
  ADD CONSTRAINT `event_ibfk_4` FOREIGN KEY (`story_2_id`) REFERENCES `news_list` (`id`);

--
-- Constraints for table `news_list`
--
ALTER TABLE `news_list`
  ADD CONSTRAINT `news_list_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
