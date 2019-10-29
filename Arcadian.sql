-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2019 at 11:54 PM
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
-- Table structure for table `news_list`
--

CREATE TABLE `news_list` (
  `id` int(11) UNSIGNED NOT NULL,
  `author` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `donate` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL DEFAULT 'He/She doesn\ '
) ;

--
-- Dumping data for table `news_list`
--

INSERT INTO `news_list` (`id`, `author`, `title`, `img_url`, `url`, `views`, `tags`, `likes`, `donate`, `description`, `date_created`) VALUES
(1, 'Zahidul', 'Wildpress app illustration vol. 2\r\n', 'https://cdn.dribbble.com/users/1171505/screenshots/7846153/media/4666506c7041378acac13728b802c80c.png', 'https://dribbble.com/shots/7846153-Wildpress-app-illustration-vol-2', 0, '#animals #app #illustration #digital artwork #icon illustration #illustrator ', 0, 0, 'illustration designed for Wildpress app', '2019-10-27 15:11:10'),
(2, 'Semas', 'Social App • Profiles', 'https://cdn.dribbble.com/users/719258/screenshots/7834997/media/47fe065281255fdfe130c99e908e2165.png', 'https://dribbble.com/shots/7834997-Social-App-Profiles?utm_source=Clipboard_Shot&utm_campaign=semasben&utm_content=Social%20App%20%20%E2%80%A2%20Profiles&utm_medium=Social_Share', 0, '#app #card #clean #contact #design #feed #friends #home #ios #modern #profile #social #tag #ui #ux', 0, 0, 'Social App • Profiles', '2019-10-27 15:14:50'),
(3, 'JT', 'Debut Shot - Book Store App\r\n', 'https://cdn.dribbble.com/users/4193425/screenshots/7831562/media/3aa59762b5ebc86f50f2b1ba81101eaa.png', 'https://dribbble.com/shots/7831562-Debut-Shot-Book-Store-App', 0, '#UI', 0, 0, 'Debut Shot - Book Store App\r\n', '2019-10-27 15:54:26'),
(4, 'Dalibor Hajdinjak ', 'Cubii Fitness App v2', 'https://cdn.dribbble.com/users/426214/screenshots/7821138/media/8a1138f1a868fc959a10bcadc902164e.png', 'https://dribbble.com/shots/7821138-Cubii-Fitness-App-v2', 0, '#app #cubii #digital #fitness #app #mobile #uiux', 0, 0, 'Hi folks,\r\n\r\nA couple weeks ago we were approached by Cubii - the ONLY bluetooth enabled under desk elliptical on the market. It tracks your workouts and progress over time, lets you compete against other users and share your activities.\r\n\r\nI\'m sharing one of the latest screens we designed for their fitness app. While the instructions were pretty strict, we\'ve created several versions to choose from, and here\'s one of them. Will share more shortly.\r\n\r\nHope you like it !?\r\n♥ Happy to hear your thoughts.', '2019-10-27 16:43:59'),
(5, 'Md Rasel', 'Frinobit - Brand Identity', 'https://cdn.dribbble.com/users/2621335/screenshots/7836873/media/1e47a4004ed77da2e272940c5e2f2a8f.jpg', 'https://dribbble.com/shots/7836873-Frinobit-Brand-Identity', 0, '#abstract #app #app icon', 0, 0, 'Frinobit branding project\r\n----\r\nFollow me on\r\nbehance', '2019-10-27 16:46:22'),
(6, 'Kit8', 'Home interior with furniture\r\n', 'https://cdn.dribbble.com/users/992274/screenshots/7842536/media/38c8372c5275e85ea580f93f0bbfe482.png', 'https://dribbble.com/shots/7842536-Home-interior-with-furniture', 0, '#comfortable #flat #home #homely', 0, 0, 'Illustration by Anna Deynek for @kit8\r\nBuy at Kit8.net', '2019-10-27 16:47:12'),
(7, 'Gleb Kuznetsov✈', 'quantum computer art', 'https://cdn.dribbble.com/users/32512/screenshots/7701476/media/7896f20d280164017ce0e2e07aca20fa.png', 'https://dribbble.com/shots/7701476-quantum-computer-art', 0, '#3d #abstract #art #c4d', 0, 0, 'He/She doesn\'t leave description :|', '2019-10-27 16:49:13'),
(8, 'Sarkhan Rzazadeh', 'HLR', 'https://cdn.dribbble.com/users/1587791/screenshots/7836890/media/91ebd79d4ce8a8da74462edffe7c38d4.png', 'https://dribbble.com/shots/7836890-HLR', 0, '#branding #creative #design #icon #icons #logo #mark #minimal #symbol #type', 0, 0, 'He/She doesn\'t leave description :|', '2019-10-27 16:50:13'),
(9, 'Diz Galt', 'Kissin\' Swans', 'https://cdn.dribbble.com/users/3604839/screenshots/7842623/media/4aaf18f1adb7775450ee480d7adad7ec.jpg', 'https://dribbble.com/shots/7842623-Kissin-Swans', 0, '#design #flat #illustration', 0, 0, 'Kissin\' swans in heart-shaped form. I\'ve seen a pic of kissin\' birds and inspired by it, then I made this minimalistic idea on my work. Enjoy it, folks!\r\n\r\n', '2019-10-27 16:51:16'),
(10, 'Humayra Kabir Anamika', 'Music App UI', 'https://cdn.dribbble.com/users/2301995/screenshots/7829891/media/541c61174e80ef2c354d7290b3250057.png', 'https://dribbble.com/shots/7829891-Music-App-UI', 0, '#2020 #animation # ui #typography #ui', 0, 0, 'Music App UI\r\nMusic App UI\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nBicyle\r\nBicyle\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nFull Screen Scrolling Agency Demo - Saasland\r\nFull Screen Scrolling Agency Demo - Saasland\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nCrosses 3/3\r\nCrosses 3/3\r\n\r\nOctober 26, 2019\r\n\r\nSave\r\n Like\r\nIcon backtotop\r\ndribbble\r\nShow and tell for designers\r\n\r\nWhat are you working on? Dribbble is a community of designers sharing screenshots of their work, process, and projects.\r\n\r\nIcon team dribbble Icon team twitter Icon team facebook Icon team instagram Icon team blog\r\n\r\nDribbble\r\nAbout\r\nHelp\r\nContact\r\nCareers\r\nTerms\r\nGuidelines\r\nPrivacy\r\nPlayoffs\r\nShop\r\nTestimonials\r\nMedia Kit\r\nAdvertise\r\nAPI\r\nApps\r\nPlaces\r\nHiring at Dribbble\r\nPost a job\r\nSearch designers\r\nAdd your team\r\nDirectories\r\nJobs\r\nTags\r\nJobs for Designers\r\nB002499cf66face5ef256f33ff64a5c9\r\nKlarna\r\nSenior Product Designer\r\nA5c8624192237fb095788390fdf56c4a\r\nLiferay\r\nProduct Designer\r\n8e26493a8dc9589947de21ba6f24821b\r\nSnapdocs\r\nVisual Designer\r\n7,847,991\r\nshots dribbbled\r\n© 2019 Dribbble. All rights reserved.\r\n\r\nMade with ♥ remotely fromSalem, MAWalnut Creek, CAVictoria, BCCentennial, COBournemouth, UKVancouver, BCMontreal, QCRoseville, MNRome, GAPeterborough, NHOakland, CAAustin, TXMystic, CTSaint Charles, MODes Moines, IASalt Lake City, UTLander, WYCote St Luc, QCWomelsdorf, PAMinneapolis, MNHighlands Ranch, COSan Francisco, CASilver Spring, MDLondon, ONPottstown, PAPhoenix, AZSacramento, CAFarmers Branch, TXMarina del Rey, CAMurray, UTOrlando, FLParis, FranceBrookline, MALos Angeles, CASan Rafael, CASan Luis Obispo, CAAtlanta, GATucson, AZ\r\nIcon shot x light\r\nIronSketchHumayra Kabir Anamika\r\nMusic App UI\r\nby Humayra Kabir Anamika for IronSketch | Follow\r\nSave  Like\r\nHey! Music lovers ❤️\r\n\r\nToday I\'m showing you My recent Music App concept. Hope you guys will like it.\r\n\r\nPlease let me know what do you think about.\r\n\r\n-------------------------------\r\nDon\'t forget to add ❤️ and follow me and our team!\r\n-------------------------------\r\nWe are available for taking your project\r\nEstimate your project at getironsketch@gmail.com\r\nOr you can directly contact me :\r\nanamikacse20@gmail.com\r\n\r\nFollow me on:\r\nBehance\r\nFlickr\r\nLinkedIn', '2019-10-27 16:52:11'),
(11, 'Md. Shahadat Hussain', 'Full Screen Scrolling Agency Demo - Saasland', 'https://cdn.dribbble.com/users/183729/screenshots/7835174/media/f1edd8ec099c37872390dc160fa54d44.jpg', 'https://dribbble.com/shots/7835174-Full-Screen-Scrolling-Agency-Demo-Saasland', 0, '#wordpress theme', 0, 0, 'HI Guys!\r\nWe have released a new Home page demo in our Saasland MultiPurposeWordPress Theme. We are really excited about this demo because it is totally unique than the other demos.\r\n\r\nIt\'s design is very colorful and fun. It\'s navigation is unique than all other demos except one - it\'s a full screen scrolling navigation system. All pages have colored background and white texts on them.\r\n\r\nSaasland is a creative WordPress theme for saas, software, startup, mobile app, agency and related products & services. Saasland is loaded with tons of features, elements & blocks, options that give its users real flexibility to create a dynamic, professional website in no time.', '2019-10-27 16:53:13'),
(12, 'Mansoor ', 'Illustrations Pack Kit\r\n', 'https://cdn.dribbble.com/users/254977/screenshots/7836460/media/88b6ffdf7d6bdff4627cc7de8a514505.png', 'https://dribbble.com/shots/7836460-Illustrations-Pack-Kit', 0, '#Illustration', 0, 0, 'Room Gym Exersice\r\n\r\nAvailable To Get Full Kit\r\n\r\nGet the Kit\r\n\r\nAvailable for Hire\r\nFull-time position (Remote), Contract, Project basis\r\nmansoorwave@gmail.com Skype : just.mansoor\r\n\r\nFollow me on :- Behance | Twitter| Instagram| Facebook|', '2019-10-27 16:55:47'),
(13, 'Mohammad Reza Haghani', 'icon project TextNegar light...\r\n', 'https://cdn.dribbble.com/users/3994038/screenshots/7841906/media/2ddd50b0f1475638452d6c347f381ed5.jpg', 'https://dribbble.com/shots/7841906-icon-project-TextNegar-light', 0, '#app #design #flat #graphic #icon', 0, 0, 'He/She doesn\'t leave description :|', '2019-10-27 16:56:48'),
(14, 'Alaina Johnson', 'Vectober 26 - Dark\r\n', 'https://cdn.dribbble.com/users/185738/screenshots/7699634/media/836a421390720fb30d676aac5309c993.jpg', 'https://dribbble.com/shots/7699634-Vectober-26-Dark', 0, '#flat #geometric #halloween #house', 0, 0, 'Polly Pocket went dark.\r\n\r\n', '2019-10-27 16:57:34'),
(15, ' Monika Suchodolska', 'Pieces - personal work\r\n', 'https://cdn.dribbble.com/users/3970035/screenshots/7840467/media/d86a5adebe4673cd43dc750a09ba62ed.jpg', 'https://dribbble.com/shots/7840467-Pieces-personal-work', 0, '#design #illustrator #people', 0, 0, 'This is a personal project of an illustration made in Procreate.\r\n\r\n', '2019-10-27 16:58:33'),
(16, 'Alex Kunchevsky', 'Mark Catckerberg\r\n', 'https://cdn.dribbble.com/users/1162077/screenshots/7495197/media/92507bdcf4b5edfa12d5e9cc4f01b301.png', 'https://dribbble.com/shots/7495197-Mark-Catckerberg', 0, '#animal #cat #character', 0, 0, 'The second character in my new stickers series is Mark Catckerberg! 🐱\r\n⠀\r\nMark is a talented programmer who\'s working hard on creating the first social network for cats ever! 🤓\r\n\r\nI\'ve made this illustration in #procreate app on #ipadpro 12.9\" ✍️\r\n\r\nIf you want to see how I made this illustration check out my speedpaint in Instagram!', '2019-10-27 17:05:23'),
(21, 'SpaceShip', 'Chimp', 'https://cdn.dribbble.com/users/43342/screenshots/7807092/media/6253f8992507f5f55871de158b2f2bf0.jpg', 'https://www.amazon.com/LOUQE-Ghost-S1-Limestone/dp/B07GNNXW4Z/ref=sr_1_1?keywords=ghost+s1&qid=1565057909&s=gateway&sr=8-1', 0, 'test', 0, 0, 'lalala', '2019-10-27 19:07:26'),
(55, 'Mr.Thanos', 'This guy forgot a title', 'https://cdn.dribbble.com/users/43342/screenshots/7358659/media/8a80f822d885bdf9599f2007fc17edf5.jpg', 'https://dribbble.com/shots/7358659--Astro-Falls', 0, '#This-is-no-tag tag', 0, 0, 'This author forgot to leave a description', '2019-10-28 22:14:05'),
(56, 'Mr.Thanos', 'This guy forgot a title', 'https://cdn.dribbble.com/users/43342/screenshots/7358659/media/8a80f822d885bdf9599f2007fc17edf5.jpg', 'https://dribbble.com/shots/7358659--Astro-Falls', 0, '#This-is-no-tag tag', 0, 0, 'This author forgot to leave a description', '2019-10-28 22:19:58');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_list`
--
ALTER TABLE `news_list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
