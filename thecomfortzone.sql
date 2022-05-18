-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 18, 2022 at 06:49 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecomfortzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstName`, `lastName`, `password`) VALUES
(83564, 'nnnn', 'nnn', 'n', '7b8b965ad4bca0e41ab51de7b31363a1');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `comment` varchar(21000) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `website_id`, `comment`, `image`, `title`) VALUES
(1, 1, 'Fast delivery. Item is in great condition. Not my first or last order for sure.', NULL, 'delivery'),
(2, 1, 'Reliable, fast delivery, you get what you saw online. Very satisfied.', NULL, 'like'),
(3, 1, 'Terrible service. Just copy and paste messages on the WhatsApp. Always apologizing and no action on email. No genuine explanation or empathy in the phone. No responsibility taken when things go wrong, they just blame it on the boutique. I’m now waiting for a refund of sandals that never arrived and I still don’t know why. Let’s see how long I have to wait for them to return my money. So disappointed. They are just not experienced enough yet to offer the correct level of service.', NULL, 'Terrible service'),
(4, 1, 'The shopping experience and the delivery is also smooth as ever! I just enjoy my customer experience shopping at Farfetch.', NULL, 'shopping experience '),
(5, 1, 'This has been a terrible experience although very unusual for Farfetch. Have been waiting for over a month for my boots to be shipped and despite 3 phone calls and several emails no one can seem to make this happen.\r\n', NULL, 'Terrible'),
(6, 2, '\r\nI placed order #689527735 on 3/25. Order immediately confirmed and went to \"seller packaging\". After 3 days I contacted GOAT as the status had not changed, I was told my case would be escalated to a \"specialist\". Per their terms I requested a new seller, after 5 days with no change I requested a refund. I stated that I still wanted the sneakers but I wished to order \"pre-verified\" for next day delivery. I also suggested just updating the current order and charging me the difference. I received auto generated responses telling me this was not possible. After 9 days the seller shipped and GOAT sent me an email blaming the seller. The product was verified and a tracking number was assigned as visible on the app. After 24 hours I contacted GOAT because it was still listed as \"shipment has not yet been handed over to DHL\" I was told to be patient. After 3 days with no updates to the tracking, I contacted GOAT again and they confirm there is a problem and they would assign to a \"specialist\" and need another 5 days to investigate. At this point I have received responses from 5 different GOAT agents but all appear auto generated and speak of an escalation that has not happened. I have no idea if I have spoken to a real person. I have provided a solution that would work for all parties, at this point the pre-verified are less expensive than what I paid for the lost/delayed shoes. I am not willing to wait additional weeks, I have no idea how to get this solved. This is one of the worst customer service experiences of my life.', NULL, ' worst customer service'),
(7, 2, 'My order supposed to arrive today but they said y\'all put address in wrong can yall either call me are put my money back and I will never order from you again have my bank to disbute and get my money back but I need my shoes', NULL, 'My order supposed to arrive today'),
(8, 2, 'I almost thought I wasn’t going to get a pair of Jordan’s I ordered from goat. I was upset at the moment because my package was marked delivered but the package was nowhere to be found. I checked around the mailroom and with my building manager and my package wasn’t found. I contacted goat support immediately after. I received a quick response. The goat support rep explained to me carriers sometimes mark packages delivered ahead of time. This gave me hope! Within a few a hours my package was actually delivered! I appreciate goat support for getting back to me quickly with valuable information.', NULL, 'good support service'),
(9, 2, 'I didn’t receive the shoes I had orendered and now I have tried for two week to return the shoes. There is no phone number or email address on their webpage. The replies I receive are written by a bot. The site is most certainly a scam. Don’t buy anything from them.', NULL, 'I didn’t receive the shoes'),
(10, 3, 'Really good delivery, although I needed a different size, so I returned the item with the relative paperwork and that has taken a week with no communication!', NULL, 'good delivery'),
(11, 3, 'The whole experience was atrocious. Try contacting customer service…. Good luck! Will never shop there again online!', NULL, ' experience was atrocious'),
(12, 3, 'The trainers which I ordered for my son were incorrect on arrival. I paid £7.99 for next day delivery as he needed them for school...they did arrive on time the next day, but they were not the trainers I ordered - they were a different make altogether and also a different size. I ordered a pair of adaidas size 7, but had delivered a pair of slazenger size 8. I had to go to my local Sports Direct store to buy him a pair as he needed them for school the next day.I intend to send the wrong pair back to get the money back on them. I\'ve never had any problems in the past when I\'ve ordered online from Sports Direct, so I\'m hoping that this will be a one off.', NULL, 'wrong order'),
(13, 3, 'Products faultless, service faultless, delivery faultless', NULL, 'everything is faultless'),
(14, 3, 'I’ve not yet received all of my items. 2 items have come in 2 different deliveries & I am still awaiting 2 items.', NULL, ' didn\'t receive all of my items'),
(15, 2, 'bad experievce', NULL, 'bad service');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `website_name` varchar(35) NOT NULL,
  `description` varchar(2500) NOT NULL,
  `website_image` varchar(256) DEFAULT NULL,
  `Brand` varchar(50) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `website_name`, `description`, `website_image`, `Brand`, `admin_id`) VALUES
(1, 'FARFETCH', 'FarFetch is an e-commerce platform that aims to connect creators, boutiques, and customers from all around the world. Made for fashion lovers, this platform is all about luxury fashion items, which can get pretty pricey', 'logo-Farfetch.png', 'Adidas', 83564),
(2, 'GOAT', 'GOAT is the global platform for style. Founded in 2015 to bring trust to the sneaker community, the technology platform has since expanded to offer apparel and accessories from the world’s leading contemporary, avant garde and luxury brands. Through its unique positioning between the primary and resale markets, the company is able to surface styles from the past, present and future, delivering authentic product to over 20M members across 164 countries.', 'goat-logo-.png', 'Adidas', 83564),
(3, 'SPORTS DIRECT', 'Established in 1990 by Mike Ashley, the company is the United Kingdom\'s largest sports-goods retailer and operates roughly 670 stores worldwide. The company\'s business model is one that operates under low margins. Mike Ashley has continued to hold a majority stake in the business, and his holding has been 61.7 percent since October 2013. It is listed on the London Stock Exchange and it is a constituent of the FTSE 250 Index.', 'SportsDirect.jpeg', 'Nike', 83564);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `website_id` (`website_id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `website`
--
ALTER TABLE `website`
  ADD CONSTRAINT `website_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
