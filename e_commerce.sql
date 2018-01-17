-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 03:11 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `bill_total` int(11) NOT NULL,
  `bill_user_name` varchar(255) NOT NULL,
  `bill_contact_no` varchar(20) NOT NULL,
  `bill_shipping_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `bill_total`, `bill_user_name`, `bill_contact_no`, `bill_shipping_address`) VALUES
(7, 54138, 'parth_patel', '11111111111111111111', 'ddddddddddd'),
(8, 2553, 'parth_patel', '11111212212', 'dadada'),
(9, 2275720, 'parth_patel', '1234567890', 'aasdf'),
(10, 32750, 'parth_patel', '1234567890', '1245ffjg');

-- --------------------------------------------------------

--
-- Table structure for table `carthis`
--

CREATE TABLE `carthis` (
  `username` varchar(30) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_discount` tinyint(4) NOT NULL,
  `item_stock` int(11) NOT NULL,
  `item_EMI` varchar(255) NOT NULL,
  `item_description` varchar(5000) NOT NULL,
  `item_picture_url` varchar(1024) NOT NULL,
  `item_rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_type`, `item_price`, `item_discount`, `item_stock`, `item_EMI`, `item_description`, `item_picture_url`, `item_rating`) VALUES
(1, 'Xiomi Redmi Mi A1 (Black, 64 GB)  (4 GB RAM)', 'Mobiles', 16000, 5, 20, 'No Cost EMIs from ?1,667/month. Other EMIs from ?728/month', 'In The Box : Handset, USB Cable, Adapter, SIM Tray Remover Pin, User Guide, Warranty Card\r\nModel Number : MZB5645IN/MZB5717IN\r\nColor : Black\r\nBrowse Type : Smartphones\r\nSIM Type : Dual Sim\r\nHybrid Sim Slot : Yes\r\nTouchscreen : Yes\r\nOTG Compatible : Yes\r\nSound Enhancements : Speaker : One (Bottom Opening), Active Noise Cancellation\r\nDisplay Size: 5.5 inch IPS Display\r\nResolution : 1920 x 1080 Pixels\r\nGPU :Adreno 506\r\nStorage : 64GB\r\nRAM : 4GB', '1.jpg', 4.4),
(2, 'Apple iPhone 7 (Black, 128 GB)', 'mobiles', 55499, 17, 0, 'No Cost EMIs from ?6,167/month. Other EMIs from ?1,897/month', 'In The Box : Handset, EarPods with Lightning Connector, Lightning to 3.5 mm Headphone Jack Adapter, Lightning to USB Cable, USB Power Adapter, Documentation\r\nModel Number : MN922HN/A\r\nColor : Black\r\nBrowse Type : Smartphones\r\nSIM Type : Dual Sim\r\nHybrid Sim Slot : No\r\nTouchscreen : Yes\r\nOTG Compatible : No\r\nDisplay Size: 4.7 inch LED-backlit  IPS Display\r\nResolution : 334 x 750 Pixels Retina HD Display\r\nSensors : Touch ID Fingerprint Sensor, Barometer, Three-axis Gyro Sensor, Accelerometer, Proximity Sensor, Ambient Light Sensor, Backside Illumination Sensor, Digital Compass\r\nGPU : 326 PPI\r\nProcessor Type : Apple A10 Fusion 64-bit processor and Embedded M10 Motion Co-processor\r\nStorage : 128 GB\r\nPrimary Camera: 12 MP', '2.jpg', 4.7),
(3, 'Tripr Printed Men V-neck Multicolor T-Shirt', 'Clothing', 314, 65, 0, '0', 'Style Code : TGYRDGANESH\r\nNeck Cut : V-neck\r\nFabric type : Yes\r\nRegular Machine Type: Yes', '3.jpg', 3.7),
(4, 'Philips HL7510/00 550 W Mixer Grinder(White, Red, 3 Jars)', 'Home & kitchens', 2599, 6, 59, 'No Extra Cost EMI on HDFC Bank Credit Card.', 'Model : HL7510/00\r\nPower Required : 230, 50 Hz\r\nAuto Switch Off : Yes\r\nMaterial : Stainless steel,Robust ABS Body\r\nDry Grinder : Yes\r\nChutney Jar: Yes\r\nChutney Jar Capacity : 0.3 L\r\nWeight : 3.9 Kg\r\nOther Features : Long Lasting Motor, Compact Body, Ergonomically Designed Handles, Strong Suction Feet for Stability, Powerful Mixing and Grinding Performance, 0.75 Dry Grinding, 2 Jars with Handles, 4 Speed Configuration\r\nWarranty : 2 Years Manufacturer Warranty', '4.jpg', 4),
(5, 'IFB 20 L Convection Microwave Oven  (20SC2, Silver)', 'Home & kitchens', 8499, 5, 0, 'No Cost EMIs from ?945/month. Other EMIs from ?413/month', 'Brand : IFB\r\nModel Name : 20SC2\r\nType : Convection\r\nCapacity : 20L\r\nColor : Silver\r\nShade : Silver\r\nControl Type : Touch Key Pad(Membrane)\r\nFrequency : 2450 MHz\r\nDisplay : LED\r\n\r\nPower Required : 230V, 50 Hz\r\nPower Output : 800W\r\nPower Consumption : 1200 W:Grill,2200 W:Convection,1200 W:Microwave\r\nAuto Switch Off : Yes\r\nMaterial : Stainless steel Cavity\r\nTimer : Yes\r\nDefrost : Yes\r\nTemperature Range Levels : 10\r\nWeight : 14.3 Kg\r\nAuto Cook Menu Available: Yes\r\nOther Features : Child lock, Quick Start: Express Cooking, Multi - Stage Cooking, Combi - Tec (Grill+Microwave): 2, Combi - Tec (Convection + Microwave): 4, Keep Warm\r\nWarranty : 1 Year Product Warranty & 3 Years on Magnetron from IFB', '5.jpg', 4.2),
(6, 'Sony Bravia 101.6cm (40 inch) Full HD LED TV  (KLV-40R352D)', 'Home Entertainment', 40999, 10, 10, 'No Cost EMIs from ?4,556/month. Other EMIs from ?1,402/month', 'Brand:Sony\r\nModel Name:KLV-40R352D\r\nSeries:Bravia\r\nIn The Box:  \r\n1 TV Unit\r\n1 Warranty Card\r\n1 AC Adapter\r\n1 AC Power Cord\r\n1 Remote Control: RMT-TX111P\r\n2 R03 Batteries\r\n1 Table Top Stand\r\nInstruction Manual\r\n\r\nScreen Type:Led\r\nDisplay Size:101.6 cm (40)\r\nHD Technology & Resolution:Full HD, 1920 x 1080\r\nSmart Type:No\r\nCurve TV:No\r\nTouchscreen:No\r\nMotion Sensor:No\r\nHDMI:2\r\nUSB:1\r\nOther Connectivity:  \r\nSuper Multi Format USB Play\r\nUSB Play - Supported File System: FAT16 / FAT 32 / NTFS\r\nHDCP 1.4\r\nAC Power Input: AC Adapter\r\nHDMI PC Input Format: 640 x 480 at 60 Hz, 800 x 600 at 60 Hz, 1280 x 768 at 60 Hz - R, 1280 x 768 at 60 Hz, 1360 x 768 at 60 Hz, 1024 x 768 at 60 Hz, 1280 x 1024 at 60 Hz, 1920 x 1080 at 60 Hz\r\n\r\nBuild in Wi-Fi:No\r\nPower Required:DC 19.5 V\r\nPower Consumption:51 W, 0.4 W (Standby)\r\n3G Dongle Plug and Play:No\r\nRefresh Rate:100 Hz\r\nOther Video Feature:  \r\nX-protection PRO for Dust, Lighting, Surge and Humidity Proof\r\nMotionflow XR 100 Hz Keeps the Action Smooth\r\nAdvanced Contrast Enhancer (ACE)\r\n24p True Cinema\r\nLive Color Technology\r\nCine Motion / Film Mode / Cinema Drive\r\nDynamic Backlight Control\r\n\r\nNo of Speaker:2\r\nSound Technology:Dolby Digital\r\nSpeaker Output RMS:10 W\r\nWeight:6.9 kg(with stand)\r\nOther Features:  \r\nChild lock\r\nMulti Indian Languages for More Convenience\r\nChannel Coverage (Analog): 45.25 MHz - 863.25 MHz\r\nBRAVIA Sync (Including HDMI - CEC)\r\nVESA Hole Spacing Compatible\r\nAC Power Cord Spec: Intel C7\r\n\r\nWarranty:1 year sony Domestic Warranty', '6.jpg', 4.3),
(7, 'Dell Inspiron 7560 7thGen Corei7,8GB RAM,1TB+128GB SSD,4GB Graphics,15.6\" Windows 10', 'Computers', 81690, 0, 0, 'EMI starts at ?3,884 per month', 'Brand : Dell\r\nItem model number: 15-7560\r\nColor : Grey\r\nPackage Dimensions :	51.1 x 34.2 x 7.8 cm\r\nProcessor Brand : Intel\r\nProcessor Type :Core i7\r\nProcessor Speed : 2.70 GHz\r\nRAM Size : 8 GB\r\nComputer Memory Type : SDRAM\r\nHard Drive Size : 1 TB\r\nHard Drive Interface : eSATA\r\nGraphics Card Description : NVIDIA GeForce GTX 940MX\r\nGraphics Card Ram Size : 4 GB\r\nHardware Platform : Windows 10 Home\r\n\r\nWeight : 3.1 Kg\r\nWarranty : 1 year sony Domestic Warranty', '7.jpg', 4.5),
(8, 'Yamaha F310, 6-Strings Acoustic Guitar, Natural', 'Musical Instruments', 8499, 10, 50, 'EMI starts at ? 404 per month', 'String : Steel\r\nTop: Spruce\r\nBack/sides: Meranti\r\nNeck: Nato\r\nFingerboard: Rosewood\r\nBridge: Rosewood\r\nFinish: Gloss\r\nColour : Grey', '8.jpg', 4.5),
(9, 'Stanford Autograph English Willow Cricket Bat', 'Fitness & Outdoors', 2599, 0, 110, 'No', 'Willow: English willow\r\nPlaying Level : Advanced\r\nAge Group : 18 - 25 Years\r\nWeight : 1300 g', '9.jpg', 3.5),
(10, 'Fila Men\'s Malvalio 2 Black and Neon Green Football Boots - 8 UK/India (42 EU)', 'Sports, Fitness & Outdoors', 1200, 60, 0, 'No', 'Material Type: Rubber\r\nLifestyle: Casual\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions: Allow your pair of shoes to air and de-odorize at a regular basis, this also helps them retain their natural shape; use shoe bags to prevent any stains or mildew; dust any dry dirt from the surface using a clean cloth, do not use polish or shiner', '10.jpg', 3.3),
(11, 'Crompton Light Linea 20-Watt LED Tube Light (Cool Day Light)', 'Home & Kitchen', 399, 34, 300, 'No', 'Brand	: Crompton\r\nPart Number : LDLL 20-CDL\r\nHeight : 38 Millimeters\r\nLength :116.5 Centimeters\r\nWidth :48 Millimeters\r\nWeight : 290 Grams\r\nNumber of Items :1\r\nColour: Cool Day Light\r\nMaterial : Polycarbonate\r\nIncluded Components : 1 LED Batten\r\nPower and Plug Description : Electric\r\nBatteries Included : No\r\nBatteries Required :No\r\nType of Bulb :LED\r\nCap Type : B22\r\nLuminous Flux : 2000 Lumens\r\nWattage : 20 Watts\r\nColour Temperature :6500 Kelvin', '11.jpg', 3.9),
(12, 'Tiffy & Toffee Baby Stroller Pram Maxtrem (Royal Purple) ', 'Baby', 2573, 36, 60, 'No', 'Features: 3 position reclining seat (sleeping, rest and sitting), Canopy with mosquito net and peek a boo window, Reversible handle with soft rubber grip, 3 point safety harness, rear brakes and front wheel lock, Back pocket and large storage bucket, Musical toys and adjustable footrest included\r\nMaximum Weight Recommendation : 15 Kilograms\r\nStyle : Maxtrem\r\nBatteries required : No\r\nDishwasher safe : No\r\nIs portable: No\r\nNumber of reclining positions : 3\r\nItem Weight : 8 Kg\r\nPackage Dimensions : 85 x 65 x 25 cm\r\nItem part number : 1064\r\nManufacturer\'s Minimum Suggested Age(months) : 36', '12.jpg', 3.8),
(13, 'Janasya Women\'s Multi Digital Printed Crepe Kurti ', 'Clothing & accessories', 549, 65, 150, 'No', 'Material : Polyester Crepe, \r\nSleeve Type : Cap Sleeves, \r\nKurti Style : Straight, \r\nWash Care : Hand Wash Or Dry Clean, \r\nColour Declaration : There might be slight variation in the actual color of the product due to different screen resolutions.', '13.jpg', 3.8),
(14, 'Franklin D. Roosevelt: A Life From Beginning to End by Hourly History', 'Books', 1072, 1, 150, 'No', 'Sold by:Amazon Asia-Pacific Holdings Private Limited\r\nLanguage : English\r\nChapters: The Roosevelt Household- Son, Mother, Wife, Politics and Infidelity, Roosevelt, the Paraplegic Eleanor, FDR\'s Cousin and First Lady , The United States Enters War , The Death of the Longest Serving President\r\nFormat : Kindle Edition, \r\nFile Size : 1412 KB, \r\nPrint Length : 56 pages, \r\nSimultaneous Device Usage : Unlimited', '14.jpg', 4),
(15, 'The Immortals of Meluha (Shiva Trilogy) Paperback – 24 Jul 2017 by Amish', 'Books', 166, 2, 400, 'No', 'Author :	Amish Tripathi\r\nCover artist :	Rashmi Pusalkar\r\nCountry :	India\r\nLanguage :  	English\r\nSeries :	Shiva trilogy\r\nSubject: 	Shiva, Myth, Fantasy\r\nPublisher : 	Westland Press\r\nPublication date :	February 2010\r\nMedia type: 	Print (Paperback)\r\nPages : 	390\r\nISBN : 	978-93-80658-74-2\r\nFollowed by :	The Secret of the Nagas', '15.jpg', 4.6);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_items`
--

CREATE TABLE `purchased_items` (
  `purchased_item_id` int(11) NOT NULL,
  `purchased_item_source_id` int(11) NOT NULL,
  `purchased_item_quantity` int(11) NOT NULL,
  `purchased_item_bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchased_items`
--

INSERT INTO `purchased_items` (`purchased_item_id`, `purchased_item_source_id`, `purchased_item_quantity`, `purchased_item_bill_id`) VALUES
(7, 5, 29, 9),
(8, 2, 39, 9),
(9, 7, 3, 9),
(10, 3, 298, 10);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_item_id` int(11) NOT NULL,
  `review_text` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_item_id`, `review_text`) VALUES
(1, 1, 'Awesome phone!!\r\nBeautifully crafted!!\r\nGreat audio quality...\r\nGreat stock android experience!!!\r\nLow light camera performance s not upto mark.\r\nBokeh mode. manual mode and 2x optical zooming are great!!\r\nGood for daylight photography...\r\nPerfect phone for android lovers..\r\n'),
(2, 1, 'Writing this review after 7 days of intense use of the mobile ...\r\nI bought a black colour variant\r\n?*-:Very important note:-\r\nbody of the mobile is little bit curved from the side of volume keys and power keys don\'t get panic if you see it and it is done for keeping the bulging camera lens in the body shape. Very few users notice this.*'),
(3, 1, 'Pros:-\r\n*There are no heating issues\r\n*Best camera in the price range but it\'s up to u that whose camera quality u like the most (Moto or Mi)\r\n*I did not face any heating issue.\r\n*Device does not support quick charging but believe me it will not take more than 1hr 15min from 0% to 100%.(this is the max to max time).\r\n*I can get a battery life of a full typical working day.\r\n*It\'s most awesome feature is it\'s stock Android experience it is really awesome believe me unless u r not a UI layering fan. (Personally I like stock Android)\r\n*U get an IR blaster in the device.\r\n*Xiaomi has said that they r giving 3 mi apps inbuilt - camera app, IR blaster app,Xiaomi feedback app . However I got only 2 . I didn\'t get IR blaster app.\r\n*There is no lagginess in the mobile and u can run heavy apps in the mobile without any problem. 4gb of RAM is more than sufficient.\r\n*You will be getting updates atleast for 2 years as Google has promised.(you may receive updates after 2 years too.)\r\n*Mobile has all the basic sensors.\r\n*It has the best audio output I all terms whether you are using its speaker or very high capacity headphones.\r\n*It\'s design is very premium.\r\n*It has a usb port of 3.0.\r\n\r\nCons:- \r\n*Mobile is little bit slippery.\r\n*Does not support quick charging.\r\n\r\nAt last if I liked the review please give a thumbs up to it if you don\'t then you know what to do.....\r\nI\'ll be posting the points if I have missed any.\r\n'),
(4, 2, 'A WOW EFFECT.....A first time iphone üser feel d change bet android and ios.....\r\nTs xceptionally brilliant....and flipkart gave a good deal and delivery much b4 d xpected date....juz d thing lingering around is how to get d beast insured.....'),
(5, 2, 'This is a master piece of the inventions from Apple. While you compare the previous versions of Iphone 6 and 6s, this is way ahead in terms of memory, speed and multitasking. The biometric thumb scanner is fast but does not beat the top of end Androids but is the best in Apple\'s own world. Display is HD Retina and best at 326 ppi as compared to any other. Battery juice is 2 to 3 hrs more and the Camera clarity is the best of all. You get the best of shots like a 21 mp digicam. Overall it is a premium phone and the niche who owns it will feel the edge over others.'),
(6, 3, 'Very nice soft cotton material..luv it'),
(7, 3, 'fantastic products'),
(8, 4, 'Does\'t look good as its in PiC . So please don\'t go by look . '),
(9, 4, '- Some smell coming while using.\r\n- Wire is Short. \r\n- Not easy to clean.'),
(10, 4, 'Phillips sense of simplicity- True in every sense and no doubt about its quality . phillips products are the one which you can buy blindfolded!!!!@'),
(11, 4, 'i bought this product after analysing from flipkart\'s reviews and product details very clearly stated and of course its from Phillips. The brand Phillips is itself enough to buy blindfolded. this mixer works really well easy to use and wash and really powerful motor . its a value for money product. Flipkart is really quick in processing and delivering products i had ordered on 13th sep 2014 and received on 15th sep , really cool!!! good packing great product worth buying if your mixer at home is almost done working for past 20-30 years as i had one which lasted for 30 years.(sumit mixi)!!!!!!\r\ngo for this mixer @@@@'),
(12, 5, 'I am fully satisfied with IFB microwave oven and Flipcart timely delivery. I will give them 5 stars.I am using this oven since last 3 days. Extremely perfect for small family.\r\nAnd starter kit also very useful. Really nice oven.'),
(13, 5, 'Oven is Brand new & Untouched.\r\nBuild Quality is Fabulous & Looks Strong. Finishing is Top notch. Everything is fine.\r\n'),
(14, 5, 'Microwave is awesome.. working perfect.\r\nGot grill set & Microwave safe utensils too. \r\nDemo was done as per my convenience. \r\nOverall a good experience. Thanks Flipkart. Your efforts making India great.'),
(15, 6, 'Very good product, Bought 4 months back from a local retailer for 41k in kerala. Picture quality is very good. Sound is also loud, am using this tv in a long hall. No cons found till now. Highly Recommended TV. Can play any videos from usb or external hdd, it even supports my WD Elements 2TB external HDD. Amazing picture quality too.'),
(16, 6, 'Thanks to Flipkart who made possible this tv @?35000 by applying al the offers......\r\nI didn\'t required any smart or 3d tv so i choose to buy this basic led model..& it fulfill all my requirements related to resolution & sound purpose....\r\nBelieve me guys its feel really pleasure feeling to attached with SONY raterthn go for non value brands...\r\nSony the name is enough.....go for it if you\'r requirement are such like me....\r\n'),
(17, 7, 'Its a great laptop its you almost 9 months I m using and i was the first buyer in Gujarat i awaited for this model for a month and the wait was worthwhile performance is superb very fast.... the design is best it looks better than the MacBook and many people are showing issues regarding the battery life but in the beginning i use to browse and use photoshop and other soctwares still it ran for 5 or more hours... now I am also getting the battery problem but overall its a great product!!!\r\n'),
(18, 7, 'I have been using this laptop for the past 1 and half months. Pros - SSD makes the laptop boot up superfast. Premium feel with the metal body and good build quality. The picture clarity is fantastic. My internal speakers stopped working after a month but Dell had them replaced at no extra cost. The speaker volumes are ok, not great. Battery is definitely an issue. Not more than 4 hours with heavy browsing. That is one area where they could have improved on.\r\n'),
(19, 7, 'Overall given the cost, this is the best Dell laptop in the price range. I got it at a Dell store for 80k but the pricing is lower online now. I haven\'t checked for gaming but all reviews point out to it being average. If you are working class looking for a good laptop, this would be a good fit\r\n'),
(20, 8, 'Okay, so started learning guitar on this.\r\nPros\r\n- Sounds really, really good. The sound resonates nicely, even with stock strings.\r\n- The finish of the product is really nice. Its far more robust than it looks.\r\n\r\nCons\r\n- High action is going to hurt you really bad when you start learning this guitar. Take it to a luthier to get the action lowered if you are new to guitar.\r\n'),
(21, 8, 'Other infor\r\nD\'addario .12 - .53 strings work well with this guitar if you happen to break strings or you want to replace them.\r\n\r\n\r\n\r\nf a beginner starts learning with this guitar, he/she has more things to learn from the natural sound it has beyond the basic musical theory.\r\nI bought it a month back and its so good to play in it than the other low ranges guitar of price around 2000-3000.\r\nIt deserves a five star rating.\r\nYamaha can call it as an evergreen acoustic product which has no limits of the market.\r\nAmazon is good as always.'),
(22, 10, 'The product looks great and feel comfy\r\nDurable to play also\r\nThe boots are great for this price\r\n'),
(23, 10, 'In good condition .. Looks good and feels comfy....'),
(24, 11, 'Good light and light weight, so it\'s easy to install with provided clips. But I observed the difference between 20 watts and 18 watts lights are not much.'),
(25, 11, 'Extremely happy with the quality. I purchased 3 tube-lights. Recommended product.\r\n20Watts are enough for 10ft x 11ft room.'),
(26, 12, 'Really gud product and built.. Just a day over using.. Best for price.. But I think the bag size should be more width.. Bcoz baby needs to sit free.. But overly all look and quality gud.. Just go for this best in market\r\n'),
(27, 12, 'I have bought this for my 6 months old Kid, also keeping in mind my 3 yr old elder one as well. No matter what, they always try the new ones bought for the younger ones. This stroller served the purpose, well. It is strong and could hold upto 25kg, as specified.\r\n'),
(28, 12, 'RAL team is very cooperating in helping how to assemble the pram... though I returned it and bought cradle for my small baby.\r\n'),
(29, 12, 'At starting I found difficulty to change it in sleeping position. Customer care helped me out to get it resolved. Product quality is good. Customer care staff was good in support. Overall nice experience with this product. Thanks to amazon.\r\n'),
(30, 13, 'The material is very good..fitting is perfect..stitching is nice..color is little bit lite as shown in image.\r\nOne more thing i want to share that.. amazon team management is very very good, its not like other online shopping website..i would not mention here those website names..but believe me my amazon shopping experience with amazon is Excellent.\r\nReally thanks to amazon team..\r\nkeep it up..\r\n'),
(31, 13, 'A good Kurti at five Hundred,\r\nGood quality crap fabric.\r\nVery light very pleasant feel\r\n'),
(32, 13, 'Good product..it fits to your size just as seen in the pic..\r\n'),
(33, 14, 'Roosevelt was unique in his own way and his role in history is a bit mixed. On the one hand he seemed to genuinely love his Country but then he also is responsible for the major advancement of the liberal progressive.movement in the United States. Unique in that he doesn\'t fit today\'s Democratic mantra of Socialism. He actually led a very long[6:30] Prayer for the troops during World War II on live radio on D-Day! I give the book 4&1/2 stars!\r\n'),
(34, 14, 'Excellent book that gives you just enough information to peak your interest to learn more about this great man. So many things can be said about his powerful wag he commanded a room to his affair, to his creating a retreat in warm springs.\r\n'),
(35, 14, 'I enjoyed this book but I thought the author got a bit too in depth on aspects of WWII and a bit too far away from FDR. I realize some background information is necessary but I might have preferred shorter background info and gotten to what decisions he made using the information quicker.\r\n'),
(36, 14, 'This is one of the better offerings from Hourly History. The author includes a small introduction, but doesn’t waste a lot of time with it and gets right into the story. Although it is evident the author is a fan of the former president, Franklin Delano Roosevelt is presented in a fair and mostly balanced way.\r\n'),
(37, 14, 'As promised, Hourly History gives a reporting of the life of FDR, and accomplishes this in about an hour. Most of the heralded legislation that FDR proposed is listed but not explained, leaving readers to explore other options for greater detail. While I understand this is meant to be a short book, some of the negative comments about his mother and wife could possibly have been cut out, which would have left a little room to talk about the reasons the author considered Roosevelt to be “…one of (the) country’s most highly regarded presidents.”\r\n'),
(38, 14, 'Concerning the balanced reporting in this book: While Hourly History does include the high points of Roosevelt’s life, some of his failings and faults are also included. When talking about the spending programs instituted to battle the Great Depression, the arguments from his detractors are also included, as well as the admission “By 1935, the results were showing some admittedly little progress.” Roosevelt’s efforts to increase the Supreme Court from 9 to 15 judges was noted as “…his battle to pack the court.” The author also includes some of the reasons why the American public liked him, explaining what drove them to elect Roosevelt to four terms.\r\n'),
(39, 14, 'Bottom Line: Fair, balanced report of the life of Franklin Delano Roosevelt. While it could have more detailed explanations at times, enough clues are left for readers to go elsewhere for additional knowledge. Four stars.'),
(40, 15, 'Today, Shiva is a god. But four thousand years ago, he was just a man. 1900 BC: the once-proud Suryavanshi rulers of the Meluha Empire are in dire peril. The empire\'s primary river, the Saraswati, is slowly drying up. There are devastating terrorist attacks from the east, the land of the Chandravanshis - and to make matters worse, the Chandravanshis appears to have allied with the Nagas, an ostracised race of deformed humans with astonishing martial skills. The only hope for the Suryavanshis is an ancient prophecy: when evil reaches epic proportions and all seems lost, a hero will emerge...'),
(41, 15, 'This book was always in my wish list but never got to read it due to some or other reasons but finally downloaded the kindle app and started reading the sample for this book. And so bought the actual kindle copy at ?49.00 online. It was worth buying it. The book itself is so much interesting that the person like me, who has no interest in reading books, got so engrossed that the book was completed in just three days though had the same tiresome schedule. It’s anyways a best seller so nothing much left to tell about it. It is awesome.'),
(42, 15, 'I am still reading this book and have not finished it as yet. But so far i am enjoying every bit of it. All the characters and the story are are based on Hindu Mythology, and are engaged in a manner that brings around the contemporary style of work, that\'s making me read more and keep going with it.\r\nThe language is crystal clear and can be understood well by all the readers.\r\nIt is a good read.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(30) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Email`, `Name`) VALUES
('parth_patel', '$2y$12$Y.NPokkTTKdqUewMae1E/ey1pVbr/LREvwUV8d71uwaMfodltRfDq', 'parthp474@gmail.com', 'Parth'),
('test_user', '$2y$12$GZefRuTI4JVoAChx29c8gOQ4/i5aggeCtb7Fkk6ZAZYKQs2f.a99W', 'parthp47@gmail.com', 'Test Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `purchased_items`
--
ALTER TABLE `purchased_items`
  ADD PRIMARY KEY (`purchased_item_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `purchased_items`
--
ALTER TABLE `purchased_items`
  MODIFY `purchased_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
