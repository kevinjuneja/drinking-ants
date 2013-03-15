-- MySQL dump 10.13  Distrib 5.5.27, for Win32 (x86)
--
-- Host: localhost    Database: pub2
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alcohol`
--

DROP TABLE IF EXISTS `alcohol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alcohol` (
  `alc_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `maker` varchar(30) DEFAULT NULL,
  `alcohol_content` decimal(4,2) DEFAULT NULL,
  `type_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`alc_id`),
  KEY `type_code` (`type_code`),
  CONSTRAINT `alcohol_ibfk_1` FOREIGN KEY (`type_code`) REFERENCES `type` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alcohol`
--

LOCK TABLES `alcohol` WRITE;
/*!40000 ALTER TABLE `alcohol` DISABLE KEYS */;
INSERT INTO `alcohol` VALUES (1,'Racer Five IPA','Bear Republic',7.30,1),(2,'West Coast IPA','Green Flash',7.50,1),(3,'No. 38 Stout','North Coast',6.50,1),(4,'Hop Rod Rye','Bear Republic',6.50,1),(5,'Black Butte Porter','Deschutes',5.20,1),(6,'Hefeweizen','Mission',5.00,1),(7,'Czech Style Pilsner','Lagunitas',4.50,1),(8,'Wits End','Ritual',5.00,1),(9,'Pale Ale','Stone',6.00,1),(10,'Mirror Pond','Deschutes',7.00,1),(11,'Columbus IPA','Noble',8.00,1),(12,'Red Rocket','Bear Republic',7.00,1),(13,'Pale Ale','Noble',6.00,1),(14,'Apple Cider','Angry Orchard',5.00,1),(15,'Raspberry Cider','Wyder\'s',4.00,1),(16,'ESB','Noble',8.00,1),(17,'IPA','Noble',7.00,1),(18,'Double Bastard','Stone',9.00,1),(19,'Pils','Lagunitas',4.50,1),(20,'Golden Chaos','Bootlegger\'s',6.00,1),(21,'Arrogant Bastard','Stone',7.20,1),(22,'Barley Wine','Port Brewery',13.00,1),(23,'Brother David\'s','Anderson Valley',6.00,1),(24,'Windansea Wheat Hefeweizen','Karl Strauss',4.50,1),(25,'Victory at Sea','Ballast Point',10.00,1),(26,'Steamboat','Ballast Point',8.00,1),(27,'Sea Monster','Ballast Point',10.00,1),(28,'Empty Tap',NULL,NULL,1),(29,'Empty Tap',NULL,NULL,1),(30,'Empty Tap',NULL,NULL,1),(31,'Three Philosophers','Ommegang',9.80,2),(32,'Pinot Noir','Cup Cake',11.00,3),(33,'Duchesse','Verhaeghe',6.00,2),(34,'Suplication','Russian River',7.00,2),(35,'Sanctification','Russian River',6.80,2),(36,'Salvation','Russian River',9.00,2),(38,'Merlot','Barefoot',10.00,3),(39,'Chianti','Barefoot',11.00,3),(40,'Pinot Grigio','LMAO',13.00,3);
/*!40000 ALTER TABLE `alcohol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'St. Patricks Day','Get a head start in celebrating St. Patricks day in your pajamas at the Anthill Pub. Irish food specials available starting 3/15.','2013-03-17','0000-00-00','8:00am - 10:00pm');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` decimal(2,2) DEFAULT NULL,
  `type_code` int(11) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `type_code` (`type_code`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`type_code`) REFERENCES `type` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Hummus and Pita','hummus w/ warmed pita wedges and celery sticks',NULL,4),(2,'Tortilla Chips','Seasoned house tortilla chips and salsa',NULL,4),(3,'French Fries',NULL,NULL,4),(4,'Tater Tots',NULL,NULL,4),(5,'Curly Fries','Includes ranch dipping sauce',NULL,4),(6,'Sweet Potato Fries','Includes our house salsa',NULL,4),(7,'Cheese Quesadilla','Includes our house salsa',NULL,4),(8,'Chicken Quesadilla','Includes our house salsa',NULL,4),(9,'Fire Ants','8oz. breaded popcorn chicken, deep fried and tossed in our own chipotle-habanero hot sauce, served w',NULL,4),(10,'Chili Fries','French fries w/ chili and cheddar cheese',NULL,4),(11,'Salad of the Week','Add chicken option',NULL,5),(12,'Salad of the Day','Add cornbread option',NULL,5),(13,'Vegetarian Chili','8 oz. bowl served w/ cornbread',NULL,5),(14,'Fountain Drinks','24oz. w/ one refill; Pepsi, Diet Pepsi, Sierra Mist, Root Beer, Orange, or Lemonade)',NULL,10),(15,'Aquafina Water','20 oz.',NULL,10),(16,'Lipton Iced Tea','Unsweetened, sweetened, or sweetened w/ lemon',NULL,10),(17,'Sobe Green Tea',NULL,NULL,10),(18,'Sobe No Fear Energy Drink',NULL,NULL,10),(19,'1/4 lb. Angus Beef Burger',NULL,NULL,7),(20,'1/4 lb. Garden Burger',NULL,NULL,7),(21,'1/4 lb. Grilled Chicken Breast',NULL,NULL,7),(22,'1/3 lb. Turkey Breast',NULL,NULL,7),(23,'1/3 lb. Hand-pressed Beef Burger',NULL,NULL,7),(24,'Cheese','Cheddar, pepper jack, provolone,swiss',NULL,8),(25,'Blue Cheese Crumbles',NULL,NULL,8),(26,'Grilled Peppers &amp; Onions',NULL,NULL,8),(27,'Guacamole',NULL,NULL,8),(28,'Avocado',NULL,NULL,8),(29,'Bacon',NULL,NULL,8),(30,'Chili',NULL,NULL,8),(31,'Thousand Island',NULL,NULL,8),(32,'Sausage of the Week','Mad Mike\'s and Jody Maroni sausages',NULL,6),(33,'Stree Tacos','Two tri-tip tacos with chopped onions, cilantro, and spicy jalape&ntilde;o salsa on corn tortillas',NULL,6),(34,'Pesto Chicken Sandwich','With provolone on a kaiser roll',NULL,6),(35,'Spicy Barbecue Chicken Sandwich','Grilled chicken w/ cheddar, bacon, chipotle barbecue sauce, and guacamole',NULL,6),(36,'Philly','Grilled steak on hoagie roll w/ provolone and grilled peppers &amp; onions',NULL,6),(37,'Salmon BLT','w/ smoked bacon &amp; lemon caper aioli',NULL,6),(38,'Grilled Cheese','on sourdough',NULL,9),(39,'BLT','on wheat',NULL,9),(40,'BBQ Pulled Pork Sandwich','on kaiser roll',NULL,9),(41,'Patty Melt','on rye w/ cheddar, grilled onions, and thousand island',NULL,9),(42,'Smoked Turkey Breast','w/ lettuce, tomato, mayo, and mustard; bread options: sourdough, rye, or wheat; cheese options: cheddar, pepper jack, provolone, or swiss',NULL,9),(43,'BBQ Tri Tip Sandwich','Grilled sliced tri tip on a hoagie roll w/ barbecue sauce',NULL,9);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `press`
--

DROP TABLE IF EXISTS `press`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `press` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) DEFAULT NULL,
  `publication` varchar(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `picture_location` varchar(100) DEFAULT NULL,
  `article_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `press`
--

LOCK TABLES `press` WRITE;
/*!40000 ALTER TABLE `press` DISABLE KEYS */;
INSERT INTO `press` VALUES (1,'Pliny the Younger Madness','OC Weekly','?It\'s Pliny the Younger madness! Anthill Pub & Grille tapped a 5-gallon keg of the rare Russian River ale this past Saturday, and beer geeks flocked to the UC Irvine bar in the hope of getting a taste. (And just a taste--the pours were only 5 ounces.) People started lining up about two hours before \nthe bar opened, and about 130 got golden tickets.','plinyMad.png','http://blogs.ocweekly.com/stickaforkinit/2012/02/pliny_the_younger_madness_at_a.php'),(2,'10 Weeks of Drinking: Quarter Club at th','OC Weekly','Hung inconspicuously on the wall leading to the bathroom, it\'s easy to miss the series of plaques honoring the members of the Quarter Club amongst the rust-colored lamps and chaotic din that defines the Anthill Pub on the UC Irvine campus.','quarterClub.png','http://blogs.ocweekly.com/stickaforkinit/2012/02/quarter_club_anthill_pub.php'),(3,'Hopped Up: The Quarter Club','New University','Finding reasons to drink is an unwritten obligation of being a college student. From bar-hopping in Newport on Saturday, to â€œWastey Wednesdayâ€ and â€œ12-Pack Tuesdayâ€ themed drinking during the week, thereâ€™s no shortage of opportunities to get your drink on. Therefore, the popularity of The Anthill Pub and Grilleâ€™s infamous Quarter Club comes as no surprise.','newUhoppedUp.png','http://www.newuniversity.org/2012/04/features/hopped-up-the-quarter-club/');
/*!40000 ALTER TABLE `press` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'Taps'),(2,'Bottled Beers'),(3,'Bottled Wines'),(4,'Appetizers'),(5,'Soups &amp; Salads'),(6,'From the Grille'),(7,'Build Your Own Burger'),(8,'Burger Add-ons'),(9,'Sandwiches'),(10,'Drinks');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'beergods','bb806fda4a45fd6c7a0a094a8d61b1a19e7e9cf3bf2a686b862c591b2d26fc59d364100b562c792918b41e6377cc6686e98a29bc2ffb16ea48a5ae3f767e07f7');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-14 22:16:14
