-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 12:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'India', 1),
(2, 'WORLD', 1),
(3, 'BUSINESS', 1),
(4, 'TECH', 1),
(5, 'MOVIES', 1),
(6, 'SPORTS', 1),
(7, 'SCIENCE', 1),
(8, 'International News', 0),
(9, 'Lifestyle ', 0),
(10, 'Art ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'Mamata Banerjee questions UPA, Congress says her remarks help BJP | Top points', ' West Bengal Chief Minister and Trinamool Congress (TMC) chief Mamata Banerjee sent shockwaves across the Congress camp on Wednesday by saying the United Progressive Alliance (UPA) does not exist anymore.\r\nThorat said Congress had fought fearlessly against the BJP government in the last seven years under the leadership of Rahul Gandhi.\r\n\r\n\"He and his entire family were subjected to personal attacks by BJP and other parties. Defamatory campaigns were carried out against him, but Rahul Gandhi did not back down.\r\n\r\n\"Becoming the voice of the poor people, he continued to fight with all his strength against the Modi government and the people of the country have accepted his stand today,\" the former Maharashtra Congress chief said.\r\n\r\n\r\n\r\nMamata Banerjee, who is on a visit to Maharashtra, met Nationalist Congress Party (NCP) chief Sharad Pawar on Wednesday. Asked if Pawar should be declared as the UPA chairperson, Mamata Banerjee said, “What UPA? There is no UPA now. What is UPA? What will he do sitting there?”\r\n\r\nThe TMC supremo also took a dig at the Congress leadership and called for unity of regional parties to take on the BJP at the national level.                ', '1', '02 Dec,2021', 3, '1638422892-firstjpeg.jpeg'),
(2, 'Michigan teen charged with murder, terrorism in Oxford High School shooting', 'A15-year-old boy was charged with murder and terrorism for a shooting that killed four fellow students and injured more at a Michigan high school, authorities said Wednesday as they revealed additional details, including a meeting between troubled officials and his parents just a few hours before the bloodshed.\r\n\r\n\r\nNo motive was offered by Oakland County authorities, a day after violence at Oxford High School, roughly 30 miles (50 kilometers) north of Detroit. But prosecutor Karen McDonald said the shooting was premeditated, based on a “mountain of digital evidence” against Ethan Crumbley.\r\n\r\nNOT AN IMPULSIVE ACT\r\n“This was not just an impulsive act,” McDonald said.\r\n\r\nIndeed, sheriff’s Lt. Tim Willis told a judge that Crumbley recorded a video the night before the violence in which he discussed killing students.\r\n\r\nCrumbley was charged as an adult with two dozen crimes, including murder, attempted murder and terrorism causing death. During his arraignment, he replied, “Yes, I do,” when asked if he understood the charges. Defense attorney Scott Kozak entered a plea of not guilty.\r\n\r\n“He deliberately brought the handgun that day with the intent to murder as many students as he could,” assistant prosecutor Marc Keast said in successfully arguing for no bail for Crumbley and a transfer to jail from a juvenile facility.\r\n\r\nADVERTISEMENT\r\n', '2', '02 Dec,2021', 3, '1638423027-third.webp'),
(3, 'Petrol, Diesel prices today: Fuel rates remain unchanged on December 2| Check latest rates here', 'The state-run oil marketing companies (OMCs) have kept the prices of petrol and diesel unchanged on Thursday, December 2, 2021.\r\nHowever, yesterday, the Delhi government reduced VAT on petrol from 30 per cent to 19.40 per cent, leading to a sharp reduction in petrol prices in the national capital from Rs 103.97 to Rs 95.97 per litre.\r\n\r\nIt may be noted that before this, petrol and diesel prices were last revised on November 3, when the Centre announced a cut in excise duty on fuels, providing relief to the consumers from all-time high fuel rates.\r\n\r\nWith the fresh reduction in petrol prices in Delhi, petrol now costs Rs 95.41 per litre in the national capital. However, diesel remains unchanged at Rs. 86.67 per litre.\r\n\r\nOn the other hand, there has been no change in the prices of petrol and diesel across other key cities. In India\'s financial hub, Mumbai, petrol is retailing at Rs 109.98 per litre and people have to shell out Rs 94.14 for one litre of diesel, which is still the highest among four metro cities.\r\n\r\nSimilarly, the prices of petrol and diesel remained unaltered in Chennai and stood at Rs 101.40 and Rs 91.43 per litre, respectively', '3', '02 Dec,2021', 3, '1638423388-Petrol,_diesel_prices_2122021_0.webp'),
(4, 'Elon Musk warns SpaceX employees of potential bankruptcy, suggests them to work over the weekends', 'SpaceX is spending money fast on its Starship launch vehicle, and the Raptor engines meant for its take-off from Earth are fast becoming the biggest bottleneck in its production. Musk has now warned the company employees that they need to work out a solution quickly.\r\nElon Musk has sounded the alarm for a potential bankruptcy of his space exploration firm SpaceX. The technology entrepreneur has warned SpaceX employees in a recent mail that the company is facing a major crisis with its production efforts for the new Raptor engine. The engine is supposed to power its Starship launch vehicle, which Musk hails as a game-changer in the rocket industry.\r\nStarship is a fully reusable spacecraft that will empower SpaceX\'s future missions to Mars and the Moon. For this, Musk tweeted that the launch vehicle will have to carry \"1000 times more payload than all current Earth rockets combined.\" Raptor engines will be used to fire this spacecraft for its mission.\r\n\r\n\r\n\r\n\r\n', '4', '02 Dec,2021', 2, '1638423474-elon-musk-reuters.webp'),
(5, 'Why blame only Akshay Kumar for romancing a younger actress?', 'If Bollywood were Gurukul, its parampara, pratishthan, anushasan would be older men romancing younger women on screen. But why only criticise the men when we\'re not willing to change the inner workings?\r\nDid you watch Sooryavanshi? Scratch that, obviously you did. The world has, it seems, going by the mammoth numbers, that is. On the heels of this stupendous success, Akshay Kumar and Yash Raj Films just dropped the teaser of another Akki film - Prithviraj. Of course, based on the life and valour of Prithviraj Chauhan. There\'s sword-fighting, there\'s sloganeering, and then there is Manushi Chhillar, winner of the Miss World 2017 pageant. She plays Akshay\'s love interest in the film. Not that Prithviraj, the film needed more controversies, but here\'s another one. Akshay Kumar is now being trolled for the age difference between him and Manushi. Really?\r\nNow, this isn\'t a new phenomenon. Both the trolling and the older male actors working with younger female actors, we mean. Each time we have a Salman Khan dance Slow Motion Mein with Disha Patani, or an Ajay Devgn say De De Pyaar De to Rakul Preet Singh, this debate is resurrected. And goes on indefinitely until the argumentative Indians on Twitter move on to greener pastures. Or softer targets.\r\n\r\n\r\n', '5', '02 Dec,2021', 2, '1638423526-Akshay_Kumar__Prithviraj_1200x768.webp'),
(6, 'India defeat Belgium 1-0 as defending champions progress to semi-final of Junior Hockey World Cup', 'Shardanand Tiwari converted a penalty corner as defending champions India fought past European giants Belgium to book a place in the semi-final at the Junior Hockey World Cup in Bhubaneswar.\r\nDefending champions India registered a grueling 1-0 win over Belgium in the quarter-finals and booked its place in the semis. Shardanand Tiwari converted the penalty corner awarded to India in the 21 minutes of the match.\r\nAlthough Belgium had their chances, and earned three penalty corners, the Indian defence stood tall and denied Belgium any chance of equalizer. India will play Germany in the semi-Final on Friday, December 3. Vishnukant Singh was adjudged Player of the pulsating quarter-final match.\r\nIndia kept growing in confidence as the match progressed and six minutes into the second quarter, secured their first penalty corner, which was converted by Tiwari.\r\n\r\n\r\n\r\n', '6', '02 Dec,2021', 4, '1638423598-indiajuniorhockeywc_1200x768.jpeg'),
(7, 'How did mountains like Everest, Kangchenjunga form? Study finds answer in oceans', 'A study reveals that while the formation of mountains is usually associated with the collision of tectonic plates, the movement was triggered by an abundance of nutrients in the oceans two billion years ago.\r\nThe highest peak in the world, Mount Everest, is 8,849 metres in height, the highest in India is the Kangchenjunga, standing at a staggering 8,586 metres tall. But, how did it all begin and what led to the creation of these tall structures across the world? Scientists have unearthed the source of these structures in nutrients found in the ocean.\r\n\r\n\r\nA new study reveals that while the formation of mountains is usually associated with the collision of tectonic plates, the movement was triggered by an abundance of nutrients in the oceans two billion years ago which caused an explosion in planktonic life.\r\n\r\nPublished in the journal Nature Communications Earth & Environment, the study states that the Great Oxidation Event holds evidence for high carbon burial and the emergence of widespread mountain building. When the plankton died, they fell to the ocean floor, eventually forming graphite which played a crucial role in lubricating the breakage of rocks into slabs, enabling them to stack on top of each other to make mountains.\r\n\r\nResearchers found that the amount of planktonic life was unusually high in this period, which led to the creation of necessary conditions that were crucial to the emergence of mountains over millions of years. Led by Professor John Parnell, from the University’s School of Geosciences, researchers state that the geological record, for this period includes evidence of an abundance of organic matter in the oceans, which when they died was preserved as graphite in shale.', '7', '02 Dec,2021', 4, '1638423653-Mount_Everest.webp');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(200) NOT NULL,
  `websitename` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `footerdes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `websitename`, `logo`, `footerdes`) VALUES
(1, 'News-Website', '1638422251-news.jpg', '© Copyright 2022 News | Powered by vayuananda ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'vipin', 'negi', 'vipin', 'b71deba4acf0998a8eb5ab1f9c92446a', 0),
(2, 'vayo', 'k', 'vayo', 'd6877d56f4944f18f87b9aafb32fa2f5', 0),
(3, 'vayu', 'ananda', 'vayuananda', '64919d86de0e6634e1da4c35658a17a7', 1),
(4, 'toofan', 'singh', 'toofan', '39e0ceb9b466d7fd708b552bfca0b6e2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
