-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 06:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one_cause`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NAME` varchar(255) NOT NULL,
  `ADMIN_EMAIL` varchar(255) NOT NULL,
  `ADMIN_PASS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_EMAIL`, `ADMIN_PASS`) VALUES
(1, 'immad', 'immad@gmail.com', 'i1');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `b_date` date NOT NULL DEFAULT current_timestamp(),
  `b_title` varchar(255) NOT NULL,
  `b_img` varchar(255) NOT NULL,
  `b_content` text NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `b_date`, `b_title`, `b_img`, `b_content`, `id`) VALUES
(8, '2023-03-22', 'Iftaar Drive', '../image/blog/iftaar.jpg', '<p><i><strong>Alhumdulillah, On the occasion of the birth anniversary of Hazrat Imam Hasan (AS)</strong></i>  we served more than 400 people in our fifth Iftaar drive at Malir halt.Imam Hassan (AS) &nbsp;was known for his generosity. He believed that money was only a means to clothe the naked, help the destitute, and pay the debts of the indebted. May Allah increase our love for the Master of Youth of Paradise Imam Hassan ibn Ali. Ameen.</strong></i></p>', 1),
(9, '2023-05-30', 'Environment Day', '../image/blog/envo.jpg', '<p><i><strong>The 30th of May marks World Environment Day to recall people</strong></i> to value and respect the environment and not to take nature for granted. On this World Environment Day let us pledge to promote innovation and ideas toward building a healthy environment. With this pledge team, Al-Hadi Foundation rooted small plants in Karachi in collaboration with SKY organisation. May Allah protect our Earth and make it a better and healthy place to live.</p>', 1),
(10, '2023-05-30', 'Eid-Ul-Adha', '../image/blog/eiduladha.jpg', '<p><i><strong>Eid-ul-Adha is all</strong></i> about giving, sharing and sacrificing your most valuable possessions.Like previous year Team AHF distributed your Qurbani meat to the most impoverished families during the days of Eid ul Adha. May Allah shower us with peace and prosperity in this life and hereafter.AlHadi team wishes all the Muslims around the globe a happy Eid. May your sacrifices are accepted and your prayers are answered by the Almighty. May the teachings of Allah SWT and His Prophet Muhammad (PBUH) be our companion throughout our life and the eternal peace from heaven embrace our life on this Eid ul Adha and fill it with uncountable blessings</p>', 1),
(11, '2023-05-10', 'Educational Session', '../image/blog/p4.jpeg', '<p><i><strong>In solidarity with the people of the land that belongs to Pakistan,</strong></i> Al-Hadi Foundation hosted an educational session with Al-Mustafa Educational Academy students. We appreciate the volunteers for organizing such an interacting and energetic session with the kids on Kashmir day. Let\'s pray for peace and humanity to prevail in Kashmir.</p>', 1),
(12, '2023-05-25', 'Orphanage', '../image/blog/ORPHANAGE.jpg', '<p><i><strong>The messenger of Allah Prophet Muhammad (PBUH) said</strong></i> “ Paradise has a door which is called joy only those who bring joy to children will pass through it.”It is always a pleasure meeting Fixit kids they have some extra energy to be more involved with our team. We pay appreciation to our young volunteers who take out some time from their busy schedules to be a part of the Team AlHadi Foundation because together we can</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(255) NOT NULL,
  `replies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hello|hi|hey', 'Hello! Welcome to One Cause. How can I assist you today?'),
(2, 'What is One Cause?|What is One Cause|introduce yourself|who are you', 'One Cause is a donation eCommerce website that connects non-profit organizations, NGOs, and welfare organizations with potential donors. Our mission is to facilitate and empower the social sector by providing a transparent and accountable platform for org'),
(3, 'How can I donate to a cause?|How can I donate to a cause', 'That\'s great to hear! To donate, you can browse through the organizations and causes listed on our website. Once you find a cause that resonates with you, you can click on the donation button and follow the instructions to make your contribution securely.'),
(4, 'How can organizations register on the website?', 'Organizations can register on our website by clicking on the \"login / signup\" button and providing their basic information, including their mission, vision, and objectives. They can also share details about their current projects and funding requirements.'),
(5, 'Can I get a tax receipt for my donation?', 'Absolutely! We provide tax receipts for all donations made through our platform. After you make a donation, you will receive a receipt via email that you can use for tax purposes. It\'s our way of helping you claim any eligible tax benefits. If you have an'),
(6, 'Bye|good bye', 'Thank you for visiting One Cause! If you have any more questions in the future, feel free to come back. Have a great day and take care!\r\n'),
(7, 'What types of organizations are listed on your website?|no of organizations', 'Our website features a diverse range of non-profit organizations, NGOs, and welfare organizations in Pakistan. You can find causes related to education, healthcare, environmental conservation, poverty alleviation, and much more. Is there a specific cause '),
(8, 'How can I search for a specific organization or cause?|how to search?', 'You can use the search bar on our website to look for a specific organization or cause. Simply enter keywords related to the cause you\'re interested in, and the search results will display relevant organizations. If you need assistance with a specific sea'),
(9, 'Can I volunteer with an organization through your platform?', 'Absolutely! Many organizations listed on our website offer volunteer opportunities. Once you navigate to an organization\'s profile, you can find information about their volunteer programs and how to get involved. If you\'re interested in volunteering for a'),
(10, 'How can I get updates on the projects I\'ve donated to?', 'We provide regular updates on the progress of the projects funded through our platform. After making a donation, you will have the option to subscribe to project updates. You will receive notifications via email or through our website regarding the impact'),
(11, 'Are there any upcoming events or campaigns?|new events?', 'Yes, we regularly organize events and campaigns to support various causes. You can check our website\'s events section or the organization profiles for information about upcoming events, campaigns, or fundraising drives. If you\'re specifically interested i'),
(12, 'How can I contact a specific organization?|How can I contact a specific organization|How can I contact  specific organization?How can I contact  specific organization', 'On each organization\'s profile, you will find their contact information, including email addresses and phone numbers. You can use this information to get in touch with the organization directly. If you need assistance or have trouble reaching out to an or'),
(13, 'Can I donate anonymously?', 'yes, you have the option to make an anonymous donation if you prefer. During the donation process, you can choose to hide your personal information and donate anonymously. Rest assured, your privacy is important to us.');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `d_id` int(11) NOT NULL,
  `d_date` date NOT NULL DEFAULT current_timestamp(),
  `d_deadline` varchar(255) NOT NULL,
  `d_title` varchar(255) NOT NULL,
  `d_desc` text NOT NULL,
  `d_goal` int(255) NOT NULL,
  `d_raised` int(255) NOT NULL,
  `d_img` text NOT NULL,
  `d_status` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`d_id`, `d_date`, `d_deadline`, `d_title`, `d_desc`, `d_goal`, `d_raised`, `d_img`, `d_status`, `id`) VALUES
(1, '2023-05-30', '2023-06-11', 'clothes', 'Your generous contributions will help us purchase new clothes. Our goal is to ensure that everyone, regardless of their financial situation, has access to clean, comfortable clothing', 100000, 52000, '../image/donation/clothes.jpg', 'in progress', 1),
(2, '2023-06-01', '2023-06-15', 'Toys', 'toys to children hospitals, orphanages, or local organizations that collect toys for children in need, particularly during holidays.', 50000, 11150, '../image/donation/toys.jpg', 'in progress', 4),
(17, '2023-05-30', '2023-06-21', 'Environmental Causes', 'Donate to protect and preserve natural resources, promote sustainable practices, or engage in conservation efforts.', 300000, 10000, '../image/donation/enviroment.jpg', 'in progress', 2),
(18, '2023-05-30', '2023-06-24', 'Education', 'We are raising funds to bring education to underprivileged individuals who lack access to quality learning opportunities. Your generous contributions will help us provide educational resources, support, and  break the cycle of poverty through education', 200000, 80000, '../image/donation/EDUCATION.jpg', 'in progress', 3),
(20, '2023-05-30', '2023-06-18', 'Medical Supplies', 'Raising funds donate unexpired, unused medications, medical supplies, or equipment to organizations that distribute them to clinics or individuals who lack access to proper healthcare', 100000, 0, '../image/donation/donation-medicine.jpg', 'in progress', 6),
(21, '2023-05-30', '2023-06-27', 'Support AIDS Patients', 'We are reaching out to you with a heartfelt appeal to support individuals living with AIDS (Acquired Immunodeficiency Syndrome). By donating to our cause, you can help us provide much-needed assistance, care, and hope to those affected by this life-altering condition.', 2000000, 100000, '../image/donation/aids.jpeg', 'in progress', 1),
(22, '2023-05-30', '2023-07-15', 'Disaster relief', 'Assist  to providing relief and support during natural disasters or emergencies by donating money, supplies, or volunteering your time.', 1000000, 0, '../image/donation/disaster.jpg', 'in progress', 5),
(23, '2023-05-30', '2023-06-10', 'Shelter', 'Support homeless shelters or organizations that provide housing and assistance to individuals or families experiencing homelessness.', 250000, 0, '../image/donation/shelter.jpg', 'in progress', 1),
(24, '2023-05-30', '2023-06-28', 'Support Cancer Patients', 'We are reaching out to you today to request your support for individuals battling cancer. By making a donation to our cause, you can help us provide critical assistance, care, and hope to those affected by this formidable disease', 1000000, 0, '../image/donation/cancer.png', 'in progress', 1),
(25, '2023-05-30', '2023-05-25', 'Furniture', ' Donate to provide furniture, appliances, and other household items to organizations that support individuals or families in need of these items', 1000000, 1000000, '../image/donation/furniture.jpg', 'Accomplished', 1),
(26, '2023-05-30', '2023-05-30', 'Eid drives', 'done so that every one can enjoy Eid festival', 100000, 100000, '../image/donation/eid.jpg', 'Accomplished', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_feed` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_feed`, `id`) VALUES
(3, 'I appreciated the website comprehensive NGO profiles, as they helped me choose causes aligned with my values. The platform secure payment options added an extra layer of confidence.', 6),
(4, 'The transparency in showcasing how donations are utilized by each NGO was impressive. It gave me peace of mind knowing my contribution was making a tangible impact.', 2),
(5, 'The  excellent communication and updates kept me engaged and connected to the NGOs I supported. Its reassuring to know that my donations are making a meaningful difference.', 8),
(6, 'The website could improve by providing more information on the administrative costs of NGOs. Transparency in this area would further build trust with donors and I had a question regarding tax deductions for my donation, and the website support team was re', 9),
(8, 'I found the donation process on this website incredibly easy and straightforward. The user-friendly interface and clear instructions made it a seamless experience to contribute to the cause I care about.', 13);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gal_id` int(11) NOT NULL,
  `gal_img` text NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gal_id`, `gal_img`, `id`) VALUES
(1, '../image/gallery/p4.jpeg', 1),
(2, '../image/gallery/p3.jpeg', 1),
(3, '../image/gallery/p2.jpeg', 1),
(4, '../image/gallery/p1.jpeg', 1),
(5, '../image/gallery/p12.jpeg', 1),
(6, '../image/gallery/p11.jpeg', 1),
(7, '../image/gallery/p10.jpeg', 1),
(8, '../image/gallery/p9.jpeg', 1),
(9, '../image/gallery/p8.jpeg', 1),
(10, '../image/gallery/p7.jpeg', 1),
(11, '../image/gallery/p6.jpeg', 1),
(12, '../image/gallery/p5.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngotable`
--

CREATE TABLE `ngotable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngotable`
--

INSERT INTO `ngotable` (`id`, `name`, `email`, `password`, `code`, `status`, `bio`, `image`, `web`, `fb`, `ig`, `num`, `mail`) VALUES
(1, ' Al Hadi Foundation', 'shahshan871@gmail.com', '$2y$10$fKPVHbd7hwFKx8QhwtDfguUhf/r3OBQdQnozn0P/xjFeelhjnxetS', 0, 'verified', 'We are committed as an organization to protect the interest of the public by practicing social work and encouraging skills, education, optimal health, equal human rights and just society. Our mission is to strive for the enhancement of human well-being with particular attention to the skills, education, health, needs and empowerment of people who are underprivileged and living in poverty. We regulate our work by promoting social services.', '../image/ngo/al.jpeg', 'alhadifoundation.com', 'alhadi', 'hadi', '03008925315', 'hadi.com'),
(2, ' Fixit Welfare', 'maha_aamir@live.com', '$2y$10$hwBOmmxIzI1GujJsmSOIZOjJlQo6bt/22yd/oSCCCIQggg.DuG9wS', 0, 'verified', ' ', '../image/ngo/f.jpeg', '', '', '', '', ''),
(3, ' Shahid Afridi Foundation', 'muhammadshahmir318@gmail.com', '$2y$10$NkVuAXBJImV7rb6ZP2bxgu4zg2t4hkeSudqYHs1hYdW.RciIf7K2i', 0, 'verified', ' ', '../image/ngo/s.png', '', '', '', '', ''),
(4, 'Chhipa Welfare', 'sahamahmed70@gmail.com', '$2y$10$or3OlmvzEPcaHtY6cR7zM.S0TZhsHYv16gDPV22adnYvxidNnVKnq', 0, 'verified', ' ', '../image/ngo/ch.png', '', '', '', '', ''),
(5, ' Edhi Welfare', 'shanmuhammadshah7@gmail.com', '$2y$10$dYoNR.pBfw/Qgs1ujA6BeegapPpR00Qog5gATdhtH54yCMt6s7.0C', 0, 'verified', ' ', '../image/ngo/e.jpeg', '', '', '', '', ''),
(6, ' JDC Foundation', 'muhammadshahshan@gmail.com', '$2y$10$Yww6kOdF0MqnKYWz/qEzmuE4.T/qQR/CxOQp9rRdbL2WTN5bBEcz2', 0, 'verified', ' ', '../image/ngo/j.jpeg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) NOT NULL,
  `t_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `t_amount` int(255) NOT NULL,
  `id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `t_date`, `t_amount`, `id`, `d_id`) VALUES
(1, '2023-06-09 12:37:06', 150, 6, 2),
(2, '2023-06-09 12:48:33', 500, 6, 1),
(3, '2023-06-09 12:49:18', 1000, 6, 1),
(4, '2023-06-09 12:51:12', 150, 6, 1),
(5, '2023-06-09 12:53:42', 1000, 6, 1),
(6, '2023-06-09 13:43:06', 1000, 6, 1),
(7, '2023-06-09 13:59:36', 1000, 6, 1),
(8, '2023-06-09 14:00:12', 48000, 6, 1),
(9, '2023-06-10 09:40:33', 1000, 6, 2),
(10, '2023-06-10 10:22:49', 1000, 6, 1),
(11, '2023-06-10 10:23:14', 1000, 6, 1),
(12, '2023-06-10 10:29:18', 150, 2, 2),
(13, '2023-06-14 15:47:41', 10000, 13, 17);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(2, 'Shah shan', 'immadsiddiqui52@gmail.com', '$2y$10$hDDM/HiVg72Bdn.iWzBYNePEgmC2mPSHxVIfEsRKYhtvDtCyJO2Pa', 0, 'verified'),
(6, 'Immad Siddiqui', 'immadsiddiqui@hotmail.com', '$2y$10$H5VtHKdOn73EdMeVb.Tx6OzvkRj0fnO6xNTtm1Qp.MFKCB3DX9ww.', 0, 'verified'),
(8, 'Shahmir Sajid', 'shahshan871@gmail.com', '$2y$10$OK/Yiw.y.Rt.OYvlfQdq3ueeSrJlI2e1Du7xrMj27zvMZYYRlqA6e', 0, 'verified'),
(9, 'Hamza Khan', 'muhammadshahshan@gmail.com', '$2y$10$VVIaL4.QLx5eKB0FZZX0S.hivCCm3U5CK4kAGkPXGii.2O8WfGy.i', 0, 'verified'),
(13, 'Maryam Sajid', 'muhammadshahmir318@gmail.com', '$2y$10$79rOI1jXOOQCM2Cye6.KYu9Wg3yL5qep8IFwd5XNQrx74vp3MGIFu', 0, 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gal_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ngotable`
--
ALTER TABLE `ngotable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `id` (`id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ngotable`
--
ALTER TABLE `ngotable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ngotable` (`id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ngotable` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usertable` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ngotable` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usertable` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `donation` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
