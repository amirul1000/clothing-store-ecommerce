-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 09:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_information`
--

CREATE TABLE `billing_information` (
  `id` int(10) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `country` varchar(127) NOT NULL,
  `adress1` varchar(127) NOT NULL,
  `adress2` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip_code` varchar(127) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_information`
--

INSERT INTO `billing_information` (`id`, `first_name`, `last_name`, `country`, `adress1`, `adress2`, `city`, `state`, `zip_code`) VALUES
(1, 'gfdgfdg', 'gfdgfdg', 'US', 'fgfgfdg', 'dgfdgfdgfd', 'fdgfdgf', 'fdgfgfd', 'fdgfdgfdg'),
(2, 'gfdgfdg', 'gfdgfdg', 'US', 'fgfgfdg', 'dgfdgfdgfd', 'fdgfdgf', 'fdgfgfd', 'fdgfdgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) NOT NULL,
  `brand_name` varchar(127) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `status`) VALUES
(1, 'Mega', 'active'),
(2, 'Fashion', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(127) NOT NULL,
  `order_no` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `order_no`) VALUES
(17, 'Fall', 1),
(18, 'Summer', 2),
(19, 'Winter ', 3),
(20, 'Spring ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) NOT NULL,
  `name` varchar(127) NOT NULL,
  `content` text NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `content`, `status`) VALUES
(11, 'About us', '<p><strong><span style=\\"text-decoration: underline;\\">About Us:</span></strong></p>\r\n<p>Out of Box Deals is located in upstate New York and has been a trusted eBay seller since 2008. We offer a wide variety of Major Home Appliances, Electronics, Cosmetics, and Miscellaneous Wholesale items at unbeatable prices. We believe that you have the right to purchase quality products without having to pay a premium price. We don&rsquo;t have a brick and mortar store or showroom, which means we have less overhead to pass on to our customers. We do carry inventory though and everything we have listed is in stock allowing us to quickly prepare your order for shipment</p>\r\n<p><strong><span style=\\"text-decoration: underline;\\">The Manufacturer&rsquo;s Misfortune is YOUR opportunity!</span></strong></p>\r\n<p>We offer deeply discounted prices on a variety of select Appliances that we<br /> purchase as Overstock, Obsolete, Scratch/Dent, and Distressed Packaging.<br /> Despite any packaging or aesthetic flaws, all of our appliances are Brand New<br /> and come with the original Manufacturer&rsquo;s Warranty.</p>\r\n<p>We are always looking for ways to offer the best products to our customers for<br /> the lowest possible prices. Our inventory is always changing so check our store<br /> frequently!</p>', 'active'),
(12, 'Payment', '<p><strong><span style=\\"text-decoration: underline;\\">Payment:</span></strong><span style=\\"text-decoration: underline;\\"></span></p>\r\n<p>We WILL NOT collect any passwords or credit card information from you! Our checkout process is designed to communicate with your merchant provider only to confirm that the payment has been made and that it has cleared. Other methods of payment are outlined through<br /> our online checkout process.</p>\r\n<p><strong>YOU DO NOT NEED A PAYPAL ACCOUNT TO MAKE A PAYMENT!</strong> We use<br /> PayPal to process your transaction. Credit cards are accepted without having to sign-<br /> up for a PayPal Account. We gladly accept PayPal, All Major Credit Cards, and Money<br /> Orders.</p>\r\n<p><strong>TAXES AND FEES:</strong>Since Out of Box Deals.com &nbsp;is a New York State based company we<br /> are obligated to collect sales tax on all orders who\\''s buyers reside in New York State.</p>', 'active'),
(13, 'Shipping', '<p><strong><span style=\\"text-decoration: underline;\\">SHIPPPING:</span></strong></p>\r\n<p>Shipping is a priority and we know that delivery speed is important to every customer!</p>\r\n<p><strong>FREIGHT SHIPPING:</strong></p>\r\n<p>Freight shipping applies to the majority of our Large Appliances<br /> (gas cooktops and range hoods below 50 lbs are excluded) and most items<br /> where the shipping weight exceeds 75lbs or size limits.</p>\r\n<p>PLEASE NOTE!:UNWRAP AND INSPECT YOUR ITEM WHEN IT ARRIVES, WHILE THE TRUCK DRIVER IS STILL THERE! DAMAGE CLAIMS MUST BE FILED IMMEDIATELY!</p>\r\n<p><strong>GROUND:</strong> We will ship most items under the weight of 50lbs via FedEx.<br /> We will attempt to ship your item within 24 business hours after payment has<br /> been received. This item is subject to a FIXED SHIPPING price. This means that the<br /> shipping fee will be the displayed amount for all ship-to destinations shown.</p>\r\n<p><strong>FIXED SHIPPING COSTS:</strong> Unfortunately, our system DOES NOT allow us offer combined shipping charges on NON-freight orders.</p>\r\n<p>Our Freight Shipments are shipped via FedEx Freight.The carrier will contact you when your package has arrived to their local facility and schedule delivery with you.</p>\r\n<p><strong>SHIPPING DESTINATIONS:</strong> Out Of Box Deals.com only ships within the 48<br /> Contiguous United States (excluding Alaska, Hawaii and any US Territories), and<br /> Canada (see auction details for Canada). Canadian Customers are responsible for Brokerage Fees.</p>\r\n<p><strong>LOCAL PICK UP:</strong> All of our items are eligible for pickup unless otherwise stated. You<br /> still need to checkout using our checkout process for payment, just choose local pick-<br /> up. When picking up merchandise from our facility we would appreciate it if you would<br /> please contact us to confirm an exact day and time, this will make your transaction quick<br /> and easy when you arrive.</p>', 'active'),
(14, 'FAQ', '<p><strong><span style=\\"text-decoration: underline;\\">FAQ</span></strong></p>\r\n<p>Q: What Forms of Payment Do you Accept?<br /> A: We Accept all Major Credit Cards, Checks, Money Orders, and PayPal</p>\r\n<p>Q: Do your appliances come with a warranty?<br /> A: Only our MAJOR appliances come with the Manufacturer&rsquo;s Factory Warranty.<br /> \\"MAJOR\\" Appliances are defined as appliances that are fixed in place and require<br /> professional installation. Items such as Refrigerators, Ranges, Range Hoods, Washers/Dryers, etc.</p>\r\n<p>Q: When I checkout, why do you ask for my phone #?<br /> A: We only request a phone number because most of our Freight Carriers<br /> require a phone number to contact the customer prior to delivery.</p>\r\n<p>Q: Do you charge State Sales Tax?<br /> A: New York residents will be charged 8.75% sales tax on items purchased and<br /> shipping charges.</p>\r\n<p>Q: When Can I expect my item to ship?<br /> A: We will try to ship orders as soon as possible after payment approval unless<br /> otherwise stated in description. All of our items are IN STOCK and take up to<br /> two(2) business days to process.</p>\r\n<p>Q: How Long will it take to receive my item once shipped?<br /> A: Generally, all Freight orders are in transit for 3-4 Days, though we have no<br /> control over this. Our experience has shown sometimes delays occur when the<br /> Freight Carrier is unable to contact the customer to confirm delivery.</p>\r\n<p>Q: Can I do a Local Pick-up to save on shipping cost? <br /> A: Yes! We now offer Local Pick-up.</p>', 'active'),
(15, 'Returns', '<p><strong><span style=\\"text-decoration: underline;\\">RETURNS:</span></strong></p>\r\n<p><strong>3-Step Return Policy:</strong><br /> All purchases may be returned for a refund within 30 days of the original delivery date</p>\r\n<p><strong>Step 1:</strong>You will either be issued a return shipping label through e-mail or an RMA number via e-mail within 3 business days of submitting a request.</p>\r\n<p><strong>Step 3:</strong> Package and return the item to the address provided in our e-mail.*</p>\r\n<p>*Once your RMA has been received and verified for authenticity, a refund will be issued<br /> or a replacement will be shipped within 5 to 7 business days.</p>\r\n<p><strong>Return Details: </strong></p>\r\n<p>You may return most unopened items purchased at Out Of Box Deals within<br /> 30 days of the original delivery. We will pay the return shipping costs if the product is<br /> defective or the return is a result of OUR error. If the item is returned for any other reason you are responsible for the return shipping costs and may be charged a 20% restocking fee.</p>\r\n<p><br /> No returned merchandise will be accepted without a Return Merchandise Authorization.<br /> Please wait for our response before proceeding with the return.</p>\r\n<p>The following items may not be returned:</p>\r\n<p>1.) Cosmetics that are sold as NEW cannot be returned if used/opened by the<br /> customer.</p>\r\n<p>2.) Electronics/Appliances that are sold &ldquo;AS IS&rdquo; (per the description)</p>', 'active'),
(16, 'Contact Us', '<p><strong>Contact Us</strong></p>\r\n<p><strong>Live Chat:</strong></p>\r\n<p><strong>We will do our best to answer your questions or concerns by clicking on our &ldquo;Live Chat&rdquo; link.If instant gratification is your thing, our live chat is for you. But we&rsquo;ve also got a few more options up your alley. </strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>By phone</strong></p>\r\n<p>Toll Free at: 1.888.696.6620</p>\r\n<p>Unfortunately, sometimes our reps have to sleep, so the hours for these may vary - but<br /> are usually Mon-Fri 10am-4pm EST. If you\\''re not getting any luck catching us through<br /> these two channels, feel free to shoot us an e-mail.</p>\r\n<p><strong>E-mail</strong></p>\r\n<p><a href=\\"mailto:Service@outofboxdeals.com\\">Service@outofboxdeals.com</a></p>\r\n<p>We strive to respond to questions within 24 hours on business days. Please feel free to contact us via e-mail. This would be the best way to get in touch with one of our reps and allow for documentation.</p>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'Afghanistan'),
(2, 'Åland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Republic of the'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Côte D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territories'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island and McDonald Islands'),
(96, 'Holy See (Vatican City State)'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People''s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yugoslav Republic of'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthélemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts and Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre and Miquelon'),
(190, 'Saint Vincent and the Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia and the South Sandwich Islands'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard and Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan, Province Of China'),
(216, 'Tajikistan'),
(217, 'Tanzania, United Republic of'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad and Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks and Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `dealoftheday`
--

CREATE TABLE `dealoftheday` (
  `id` int(10) NOT NULL,
  `products_id` int(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealoftheday`
--

INSERT INTO `dealoftheday` (`id`, `products_id`, `status`) VALUES
(1, 11, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `email_us`
--

CREATE TABLE `email_us` (
  `id` int(10) NOT NULL,
  `from_email` varchar(127) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` text NOT NULL,
  `created_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_us`
--

INSERT INTO `email_us` (`id`, `from_email`, `subject`, `message`, `created_date_time`) VALUES
(1, 'rerrer@ttert.com', 'trtrtrtretret', 'rtrtrtet', '2013-08-31 23:36:24'),
(2, 'rerrer@ttert.com', 'trtrtrtretret', 'rtrtrtet', '2013-08-31 23:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `orders_id` int(10) NOT NULL,
  `os0` varchar(127) NOT NULL,
  `item_name` varchar(127) NOT NULL,
  `item_number` varchar(127) NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `orders_id`, `os0`, `item_name`, `item_number`, `quantity`, `amount`) VALUES
(9, 3, 'AKC Self Warming Thermal Pet Bed, Brown, $40 Value!', 'Home / Garden', '65696', 1, '2.99'),
(6, 3, 'Fino FT64 T.V. Tilt Mount with HDMI Cable $148.00 Value!', 'Furniture', '88001', 1, '5.29'),
(7, 3, 'FJORDS SCANSIT 110 LEATHER RECLINER AND OTTOMAN  LARGE $2595 value', 'Furniture', '67981', 1, '29.99'),
(8, 3, 'Tike Tech Double Stroller Car Seat Adapter, $70 Value!', 'Home / Garden', '57959', 1, '2.99'),
(10, 4, 'Juno Lighting Trac-Master Quick Jack Low Profile 12V Electronic Transformer', 'Home / Garden', '57629', 1, '2.99');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `products_id` int(10) DEFAULT NULL,
  `users_id` int(10) NOT NULL,
  `shipping_address_id` int(10) NOT NULL,
  `billing_information_id` int(10) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `date_created` datetime NOT NULL,
  `delivery_status` enum('pending','completed','return') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `products_id`, `users_id`, `shipping_address_id`, `billing_information_id`, `shipping_cost`, `total_amount`, `date_created`, `delivery_status`) VALUES
(3, NULL, 9, 1, 1, '0.00', '41.26', '2013-08-29 02:08:37', 'completed'),
(4, NULL, 9, 2, 2, '0.00', '2.99', '2013-08-29 02:45:28', 'return');

-- --------------------------------------------------------

--
-- Table structure for table `popular_products`
--

CREATE TABLE `popular_products` (
  `id` int(10) NOT NULL,
  `products_id` int(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `popular_products`
--

INSERT INTO `popular_products` (`id`, `products_id`, `status`) VALUES
(2, 11, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sub_category_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `title` varchar(127) NOT NULL,
  `product_condition` enum('new','used') NOT NULL,
  `sale_type` enum('retail','wholesale') NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(127) NOT NULL,
  `weight` varchar(127) NOT NULL,
  `color` varchar(127) NOT NULL,
  `shipping_desc` text NOT NULL,
  `delivery_desc` text NOT NULL,
  `payment_desc` text NOT NULL,
  `return_desc` text NOT NULL,
  `file_image1` varchar(127) NOT NULL,
  `file_image2` varchar(127) NOT NULL,
  `file_image3` varchar(127) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `title`, `product_condition`, `sale_type`, `quantity`, `price`, `discount`, `shipping_cost`, `description`, `size`, `weight`, `color`, `shipping_desc`, `delivery_desc`, `payment_desc`, `return_desc`, `file_image1`, `file_image2`, `file_image3`) VALUES
(3, 17, 24, 2, '11', 'new', 'retail', 11, '66.00', '11.00', '11.00', '11', '', '', '', '', '', '', '', '', '', ''),
(4, 17, 24, 2, '434', 'new', 'retail', 3434, '34343.00', '434.00', '34343.00', '343434', '4343', '43434343', '43434', '3434343', '43434', '43434', '343434', '', '', '34343'),
(5, 17, 24, 1, '22', 'new', 'retail', 22, '22.00', '22.00', '22.00', '22', '22', '22', '22', '22', '22', '22', '22', '', '', '22'),
(8, 17, 24, 2, '5', 'new', 'retail', 545, '545.00', '54.00', '45.00', '545', '454', '5454', '54545', '545', '4545', '4545', '4545', '', '', ''),
(9, 17, 24, 1, '5656', 'new', 'retail', 56, '65656.00', '5656.00', '656.00', '5656', '656', '656565', '6565', '65656', '565656', '5656', '65656', '', '', '65656'),
(10, 17, 24, 1, '5656', 'new', 'retail', 6565, '6565.00', '6565.00', '5656.00', '6565656', '656565', '6565', '656565656', '5656', '5656', '565656', '5656656', '', '', '5656'),
(11, 20, 24, 2, 'bb', 'used', 'retail', 1212, '121212.00', '12121.00', '21212.00', '12121', '121212', '121212', '2121', '212121', '212121', '212121', '21212', 'products_images/11_hl_building_sip_int_edited-2-org.jpg', 'products_images/11_hl_building_sip_int_edited-3.jpg', 'products_images/11_hl_building_sip_int_edited-4.jpg'),
(12, 20, 24, 2, '233123', 'new', 'retail', 123123123, '2323.00', '2323.00', '2323.00', '123131233232', '2323', '232', '32323', '332133', '23232', '3232', '3233', 'products_images/12_hl_building_sip_int_edited-2(1).jpg', 'products_images/12_hl_building_sip_int_edited-2.jpg', 'products_images/12_elephant_load_edited-6.jpg'),
(13, 20, 24, 2, '233123', 'new', 'retail', 123123123, '2323.00', '2323.00', '2323.00', '123131233232', '2323', '232', '32323', '332133', '23232', '3232', '3233', 'products_images/13_hl_building_sip_int_edited-2(1).jpg', 'products_images/13_hl_building_sip_int_edited-2.jpg', 'products_images/13_elephant_load_edited-6.jpg'),
(14, 20, 24, 2, '233123', 'new', 'retail', 123123123, '2323.00', '2323.00', '2323.00', '123131233232', '2323', '232', '32323', '332133', '23232', '3232', '3233', 'products_images/14_images.jpg', 'products_images/14_maxresdefault.jpg', 'products_images/14_maxresdefault.jpg'),
(15, 20, 24, 2, '233123', 'new', 'retail', 123123123, '2323.00', '2323.00', '2323.00', '123131233232', '2323', '232', '32323', '332133', '23232', '3232', '3233', 'products_images/15_shop-clothing-clothes-shop-hanger-modern-shop-boutique_1150-8886.jpg', 'products_images/15_shop-clothing-clothes-shop-hanger-modern-shop-boutique_1150-8886.jpg', 'products_images/15_shop-clothing-clothes-shop-hanger-modern-shop-boutique_1150-8886.jpg'),
(16, 20, 24, 2, '233123', 'new', 'retail', 123123123, '2323.00', '2323.00', '2323.00', '123131233232', '2323', '232', '32323', '332133', '23232', '3232', '3233', 'products_images/16_maxresdefault.jpg', 'products_images/16_maxresdefault.jpg', 'products_images/16_maxresdefault.jpg'),
(17, 20, 24, 2, '233123', 'new', 'retail', 123123123, '2323.00', '2323.00', '2323.00', '123131233232', '2323', '232', '32323', '332133', '23232', '3232', '3233', 'products_images/17_images.jpg', 'products_images/17_images.jpg', 'products_images/17_images.jpg'),
(18, 20, 24, 2, '233123', 'new', 'retail', 123123123, '2323.00', '2323.00', '2323.00', '123131233232', '2323', '232', '32323', '332133', '23232', '3232', '3233', 'products_images/18_images_(2).jpg', 'products_images/18_images_(2).jpg', 'products_images/18_images_(2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(10) NOT NULL,
  `ship_first_name` varchar(127) NOT NULL,
  `ship_last_name` varchar(127) NOT NULL,
  `ship_adress1` varchar(127) NOT NULL,
  `ship_adress2` varchar(127) NOT NULL,
  `ship_zip_code` varchar(127) NOT NULL,
  `ship_city` varchar(127) NOT NULL,
  `ship_state` varchar(127) NOT NULL,
  `ship_country` varchar(127) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `ship_first_name`, `ship_last_name`, `ship_adress1`, `ship_adress2`, `ship_zip_code`, `ship_city`, `ship_state`, `ship_country`) VALUES
(1, 'gffdgfd', 'gfgfdgfdgfdg', 'dfgdgdgdf', 'gdfgdfgdg', 'dgdgdfg', 'fdgfdgdfgdg', 'dfgdfgdfg', 'gdfgfdg'),
(2, 'gffdgfd', 'gfgfdgfdgfdg', 'dfgdgdgdf', 'gdfgdfgdg', 'dgdgdfg', 'fdgfdgdfgdg', 'dfgdfgdfg', 'gdfgfdg');

-- --------------------------------------------------------

--
-- Table structure for table `slide_images`
--

CREATE TABLE `slide_images` (
  `id` int(10) NOT NULL,
  `order_no` int(10) NOT NULL,
  `title` varchar(127) NOT NULL,
  `file_images` varchar(127) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide_images`
--

INSERT INTO `slide_images` (`id`, `order_no`, `title`, `file_images`, `status`) VALUES
(25, 1, '3323', 'slide_images_images/1_slid1.jpg', 'active'),
(26, 2, '', 'slide_images_images/26_fast-delivery.png', 'active'),
(27, 3, '', 'slide_images_images/27_shipping.png', 'active'),
(28, 1, 'Fantasy baseball', 'slide_images_images/28_hl_building_sip_int_edited-3.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(10) NOT NULL,
  `email` varchar(127) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `status`) VALUES
(2, '', 'active'),
(3, 'ggdfg@fdssf.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sub_cat_name` varchar(127) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_cat_name`) VALUES
(21, 17, 'long sleeve tops'),
(20, 17, 'short sleeve tops'),
(19, 17, 'dresses'),
(18, 17, 'Skirts'),
(17, 17, 'Pants'),
(22, 20, 'Pants'),
(23, 20, 'Skirts'),
(24, 20, 'dresses'),
(25, 20, 'short sleeve tops'),
(26, 20, 'long sleeve tops'),
(27, 18, 'Pants'),
(28, 18, 'Skirts'),
(29, 18, 'dresses'),
(30, 18, 'short sleeve tops'),
(31, 18, 'long sleeve tops'),
(32, 19, 'Pants'),
(33, 19, 'Skirts'),
(34, 19, 'dresses'),
(35, 19, 'short sleeve tops '),
(36, 19, 'long sleeve tops');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `title` varchar(127) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `company` varchar(127) NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(127) NOT NULL,
  `state` varchar(127) NOT NULL,
  `zip` varchar(127) NOT NULL,
  `country_id` varchar(127) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `type` enum('super','staff','client','visitor') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `title`, `first_name`, `last_name`, `company`, `address`, `city`, `state`, `zip`, `country_id`, `created_at`, `updated_at`, `type`, `status`) VALUES
(9, 'xx', 'xx', 'Mr.', 'Anil', 'kumar', '', '', '', '', '', '231', '2011-10-19 00:00:00', '2011-10-19 00:00:00', 'super', 'active'),
(10, 'ggfdgfdg@ddsad.com', '312213', 'ewqewqe', 'rrewrew', '', 'eeqweee', '', '', '', '', '230', '2013-08-28 12:01:32', '2013-08-28 12:01:32', 'client', 'active'),
(11, 'gfggdfg@wadsad.com', 'fdsfdsfdf', 'dsfdfdsf', '', '', '', '', '', '', '', '', '2013-08-28 12:28:30', '2013-08-28 12:28:30', 'client', 'active'),
(12, 'fgfgggfg@afdsfsd.com', 'tertertret', 'tretret', 'retretrtrt', 'rtrtrtrt', 'rtrtr', 'trtrt', 'rtrtrtr', 'trtrtr', 'trtrt', '229', '2013-08-28 12:32:09', '2013-08-28 12:32:09', 'client', 'active'),
(13, 'gfhfghgg@fdfdf.com', 'rtrtet', 'tertret', 'rtretrett', 'ttrtretret', 'retretret', 'retrtret', 'rtertretr', 'trtrtrtr', 'trtret', '229', '2013-08-28 12:37:50', '2013-08-28 12:37:50', 'client', 'active'),
(14, 'trtrettret@fdfdfdf.com', '123456', '4545454545454545', '545435435', '45454', '', '', '', '', '', '240', '2013-08-28 12:39:04', '2013-08-28 12:39:04', 'client', 'active'),
(15, 'dfdssdfdsf@dsd.com', '123456g', 'fdgfdgfdgf', 'gfgdfgfdg', 'fdgfdgfdg', '', '', '', '', '', '', '2013-08-28 12:41:53', '2013-08-28 12:41:53', 'client', 'active'),
(16, 'hgfhfhgfh@sfddsfds.com', '123456', '', '', '', '', '', '', '', '', '', '2013-08-28 12:42:38', '2013-08-28 12:42:38', 'client', 'active'),
(17, 'test@test.com', '123456', '6456456', '65646', '456546', '65465465464', '6456546546', '546546546', '45645654', '45656', '229', '2013-08-29 03:20:42', '2013-08-29 03:20:42', 'client', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_information`
--
ALTER TABLE `billing_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealoftheday`
--
ALTER TABLE `dealoftheday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_us`
--
ALTER TABLE `email_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_products`
--
ALTER TABLE `popular_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_images`
--
ALTER TABLE `slide_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_information`
--
ALTER TABLE `billing_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `dealoftheday`
--
ALTER TABLE `dealoftheday`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_us`
--
ALTER TABLE `email_us`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `popular_products`
--
ALTER TABLE `popular_products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slide_images`
--
ALTER TABLE `slide_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
