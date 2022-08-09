-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: warkaordercom_cafeteria2
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `warkaordercom_cafeteria2`
--


--
-- Table structure for table `activation_requests`
--

DROP TABLE IF EXISTS `activation_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activation_requests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activation_requests_user_id_foreign` (`user_id`),
  CONSTRAINT `activation_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activation_requests`
--

LOCK TABLES `activation_requests` WRITE;
/*!40000 ALTER TABLE `activation_requests` DISABLE KEYS */;
INSERT INTO `activation_requests` (`id`, `name`, `user_id`, `phone`, `email`, `bank`, `target`, `txn`, `created_at`, `updated_at`) VALUES (5,'Mare',3,'09345678','mare@gmail.com','cbe','cafe','FHJ48UJF8FJ','2020-11-27 01:48:00','2020-11-27 01:51:14'),(6,'bloger',2,'09657575','bloger@gmail.com','dashen','blog','565TRTYF6FY','2020-11-28 01:20:12','2020-11-28 01:20:49'),(7,'Nesru',6,'0939676714','nesru@gmail.com','dashen','cafe','7U7Y6T7HHJOD','2020-11-29 08:39:01','2020-12-02 19:55:59'),(8,'Esmael',8,'0967170569','esamalwinz@gmail.com','other','blog','I say ok','2020-12-01 18:00:15','2020-12-02 17:11:09'),(9,'Esmael',9,'0967170569','esamalwinz1@gmail.com','cbe','blog',NULL,'2020-12-02 17:10:37','2020-12-02 17:10:37'),(10,'Hayu',10,'0939676714','hayat@gmail.com','dashen','cafe',NULL,'2020-12-02 19:55:21','2020-12-02 19:55:21'),(11,'some one',12,'0940678714','jeo@warka.com','cbe','cafe','AYFCJ65TTHUG','2020-12-13 10:23:13','2020-12-13 10:25:43'),(14,'ነዲር',18,'0939394040','nedir@gmail.com','cbe','cafe','TT57JG8TY8UT','2020-12-18 16:52:02','2020-12-18 16:53:05'),(15,'New',19,'0920094064','new@gmail.com','cbe','cafe','THFGH7Y6TT5',NULL,'2021-01-09 16:06:39'),(16,'Marta',20,'0911700637','marta@gmail.com','cbe','cafe','RTYUIO567TG56',NULL,'2021-02-10 11:09:19');
/*!40000 ALTER TABLE `activation_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agent_user`
--

DROP TABLE IF EXISTS `agent_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `agent_id` bigint(20) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_user_user_id_foreign` (`user_id`),
  KEY `agent_user_agent_id_foreign` (`agent_id`),
  CONSTRAINT `agent_user_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `agent_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent_user`
--

LOCK TABLES `agent_user` WRITE;
/*!40000 ALTER TABLE `agent_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `agent_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` (`id`, `name`, `email`, `telephone`, `bank_account`, `bank_name`, `address`, `qualification`, `created_at`, `updated_at`) VALUES (3,'New agent','new@gmail.com','0939676714','10009876543456','Commercial bank of ethiopia','Adama ethiopia','qualified one  qualified one','2020-12-26 05:01:19','2020-12-26 05:01:19'),(5,'olyad','olyad@gmail.com','0912345678','10009876545','cbe','adsis abeba','ECE','2020-12-27 18:57:57','2020-12-27 18:57:57'),(6,'Nesru saduk','nesru@gmail.com','09406787625','1000200906881','CBE','Addama ethiopia','ECE Engneer','2021-01-09 11:46:55','2021-01-09 11:46:55'),(7,'Nesru','nesrusadik@gmail.com','0912125656','1000200906881','cbe','Addis Abeba adsi ketema','ECE','2021-02-10 10:57:42','2021-02-10 10:57:42');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `email`, `name`, `phone`, `subject`, `body`, `created_at`, `updated_at`) VALUES (1,'abcd@gmail.com',NULL,NULL,'ስለ ካፌያችን አሰራር ይመለከታል','ሰዎች በስልካቸው አማካኝነት ካሉበት ቦታ ሆነው ይህን ዌብሳይት(የስልክ መተግበርያ) በመክፈት ካፌውን ይመርጣሉ። በመቀጠልም ሲስተሙ በመረጡት ካፌ ውስጥ ያሉ ነገሮችን ዝርዝር ከነ ሂሳቡ ያሳያቸዋል። የፈለጉትን በመምረጥ ማዘዣው ላይ ካጠራቀሙ በኋላ ወደ ካፌው ትዕዛዝ ይልካሉ።','2020-11-25 08:56:43','2020-11-25 08:56:43'),(2,'ericjonesonline@outlook.com','Eric Jones','555-555-1212','Cool website!','Cool website!\r\n\r\nMy name’s Eric, and I just found your site - warkaorder.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – ','2021-01-12 09:21:13','2021-01-12 09:21:13'),(3,'no-replyundown@gmail.com','DonaldDic','88338669134','Want more customers for your business?','Good day!  warkaorder.com \r\n \r\nDid you know that it is possible to send appeal entirely legal? \r\nWe put a new unique way of sending business offer through contact forms. Such forms are located on many sites. \r\nWhen such requests are sent, no personal data','2021-01-20 21:00:50','2021-01-20 21:00:50'),(4,'fazility@mail2world.com','Sandy Grivson','81566297396','£15K credit line - no documents!','Hope you are well. We\'ve just luanched our flexible, fazility working capital credit line for small businesses. A few features: \r\n \r\n- Decision and funds in two hours \r\n- No documents required (except ID) \r\n- No hard credit search \r\n- £15,000 maximum limi','2021-01-29 06:04:49','2021-01-29 06:04:49'),(5,'no-reply@google.com','Mike Ford','88925633347','cheap monthly SEO plans','Howdy \r\n \r\nI have just verified your SEO on  warkaorder.com for the ranking keywords and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing month','2021-01-30 20:39:20','2021-01-30 20:39:20'),(6,'biclaimsmail@gmail.com','NormanElomy','84467862386','Business Interruption Insurance Claims Free Policy','Please Check your policy for FREE \r\nCheck if you are due a payout for Business Interruption Insurance \r\nWe have the list of 700 policies from the 60 insurance companies that are due to pay out following the Supreme Court Judgement \r\nGo to our website at \r','2021-02-02 18:11:00','2021-02-02 18:11:00'),(7,'claimsbi195@gmail.com','Jamesthymn','88375666763','Business Interruption Insurance Instant  Free Poli','Business Interruption Insurance \r\nFree Policy Check \r\n*700 Policies from 60 Insurance Companies are due a payout* \r\nFollowing the latest Supreme Court Judgement, businesses that have cover for Businesses Interruption Insurance with 60 companies are due a ','2021-02-08 15:32:23','2021-02-08 15:32:23'),(8,'see-email-in-message@monkeydig','Mike Donovan','87446343674','Increase sales for warkaorder.com','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your warkaorder.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your warkaorder.com to have DA between 40 and 50 points in Moz DA with us today and rip the benefits of such a grea','2021-02-10 04:32:46','2021-02-10 04:32:46'),(9,'agent.riquezveronika@email.com','Pedro  Lucas','85331321957','EURO JACKPOT LOTTERY AWARD, MADRID Espana.','Reference number: EJ6675. Your winning number: 02 03 16 33 46 + 02. \r\n \r\n(TRANSLATED COPY) \r\n \r\nOFFICIAL WINNING NOTIFICATION \r\nWe are glad to inform you about the release of the EURO JACKPOT lottery draw held on 05-02-2021. Your email address has become ','2021-02-12 22:00:17','2021-02-12 22:00:17'),(10,'eric.jones.z.mail@gmail.com','Eric Jones','555-555-1212','how to turn eyeballs into phone calls','Hi, Eric here with a quick thought about your website warkaorder.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engag','2021-02-13 15:30:48','2021-02-13 15:30:48'),(11,'abe.m@explainervideoguys.com','Abe Mendolwitz','87668249422','Meet Abe, Meet Mike, Meet Tim.','Meet Abe, Meet Mike, Meet Tim. \r\n \r\nWe used to be commissioned salesmen - but grew frustrated with lengthy pitch meetings which wouldn’t convert, we needed an automated elevator pitch to get our foot in the door… then we fell in love with production. \r\n \r','2021-02-13 21:31:36','2021-02-13 21:31:36'),(12,'no-replyGed@gmail.com','Mike Tracey','86396326828','Local SEO for more business','Hello \r\n \r\nI have just took an in depth look on your  warkaorder.com for  the current Local search visibility and seen that your website could use an upgrade. \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while','2021-02-19 16:49:04','2021-02-19 16:49:04'),(13,'artofnegotiations@theonlinepub','Williamtoisk','81473197757','How negotiations work! A must read book','LISTENEVERYHOW – How Negotiations Work, is an easy-to-read book and pragmatic approach to get the best results from a negotiation. It is adaptable in content and style – as a story book for leisure readers, life skills manual for entrepreneurs and profess','2021-02-24 06:11:13','2021-02-24 06:11:13'),(14,'no-reply@google.com','Mike Johnson','85823533731','whitehat monthly SEO plans','Howdy \r\n \r\nI have just verified your SEO on  warkaorder.com for the ranking keywords and saw that your website could use a boost. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly','2021-02-24 06:14:35','2021-02-24 06:14:35'),(15,'biclaims546@gmail.com','John Brown','87277766258','Business Interruption Insurance Free Policy Check','*700 Policies from 60 Insurance Companies are due a payout* \r\nFollowing the latest Supreme Court Judgement, businesses that have cover for Businesses Interruption Insurance with 60 companies are due a payout. \r\nVisit http://www.businessinterruptioninsuran','2021-02-26 05:39:33','2021-02-26 05:39:33'),(16,'missoldcar@gmail.com','Daniel Davies','85849576814','Mis-sold PCP Now being paid out!','Have you bought a car on PCP in the last 6 years? You may have been mis-sold! \r\nIt is estimated that over 10 Million people in the UK have been Mis-Sold Car Finance! \r\nCommon Areas of Mis Selling are: \r\nPCP Commissions, Putting Customers Under Pressure, L','2021-02-26 14:40:12','2021-02-26 14:40:12'),(17,'cmissold@gmail.com','James Hardl','85558794584','Mis-sold PCP Now being paid out!','Have you bought a car on PCP in the last 6 years? You may have been mis-sold! \r\nIt is estimated that over 10 Million people in the UK have been Mis-Sold Car Finance! \r\nCommon Areas of Mis Selling are: \r\nPCP Commissions, Putting Customers Under Pressure, L','2021-02-27 15:41:39','2021-02-27 15:41:39'),(18,'biclaims7@gmail.com','William Bay','81635255611','*Notice to all UK Companies with Business Interrup','Following the latest Supreme Court Judgement, businesses that have cover for Businesses Interruption Insurance with 60 companies are due a payout. We have the list of over 700 policies that fall under this category, just visit http://www.businessinterrupt','2021-02-27 19:05:56','2021-02-27 19:05:56'),(19,'chitchatchannel01@gmail.com','Hanna Brown','89795247773','Your business after Covid19','The world after COVID19 is shaping up. Businesses that had virtual platforms performed best. The future will be more of the same. https://ChitChatChannel.com fills that gap by providing you with a Social Business Page— like Facebook, but which plugs into ','2021-03-06 21:01:00','2021-03-06 21:01:00'),(20,'wmrcapital@mail2world.com','David Polson','88782235422','Small Business Loan','Good morning, \r\n \r\nI hope you are well. We\'re currently proving low cost unsecured working capital facilities for UK small businesses. \r\n \r\nIf your business would benefit from a flexible line of credit, please do not hesitate to contact us today. \r\n \r\nA f','2021-03-10 22:22:53','2021-03-10 22:22:53'),(21,'missoldcar462@gmail.com','Mis-Sold Car Finance','86179668961','Mis-Sold Car Finance Claims Now Paying Out','If you have a car that costs £20k or above, please note that we are now achieving successful claims on Mis-sold Car Finance in relation to hidden commissions with payouts ranging from £5k to £50k. Also, if you have been making monthly payments for the las','2021-03-10 23:17:04','2021-03-10 23:17:04'),(22,'see-email-in-message@monkeydig','Mike Clapton','81668241145','Increase sales for warkaorder.com','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your warkaorder.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your warkaorder.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great ','2021-03-14 00:44:14','2021-03-14 00:44:14'),(23,'aacccconts12pppriiic@gmail.com','Barrie Ingram','88915172581','Taxi App trials needed','TAXI APP - Automation  Now you can afford a taxi app start free right now \r\n(you may qualify as a small user to use for free for ever) \r\n \r\n“Let me explain. \r\nThe software I have developed has three entry panels. \r\nThe company and customer Panel where boo','2021-03-14 11:47:50','2021-03-14 11:47:50'),(24,'no-replyGed@gmail.com','Mike Edwards','86314119345','Local SEO for more business','Howdy \r\n \r\nI have just took an in depth look on your  warkaorder.com for the Local ranking keywords and seen that your website could use a push. \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Go','2021-03-22 05:25:31','2021-03-22 05:25:31'),(25,'wmrcapital@mail2world.com','David Hope','83126499558','Small Business Loan','Good morning \r\n \r\nI hope you are well. We\'re currently proving low cost unsecured working capital facilities for UK small businesses. \r\n \r\nIf your business would benefit from a flexible line of credit, please do not hesitate to contact us today. \r\n \r\nA fe','2021-03-25 20:13:19','2021-03-25 20:13:19'),(26,'no-reply@google.com','Mike Quincy','88176774465','affordable monthly SEO plans','Howdy \r\n \r\nI have just took a look on your SEO for  warkaorder.com for the ranking keywords and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providin','2021-03-26 05:16:33','2021-03-26 05:16:33'),(27,'missoldfinance@hotmail.com','Mis-Sold Car Finance','86118638697','Over 85% of Car Finance Deals are Missold!','Our average claim amount is £10,000 and the most common area of Misselling is hidden commissions and we are achieving payouts now. \r\n \r\nFor a Free check or to fast track a 5-minute Application visit our website http://www.missoldcarfinance.com \r\nas you co','2021-04-01 04:45:20','2021-04-01 04:45:20'),(28,'biclaims1@outlook.com','BI Claims','83836636752','Notice to UK Companies that were rejected for Busi','Companies with Business Interruption Insurance who were previously rejected are now being paid out thanks to our expert legal team. Visit https://www.businessinterruptioninsuranceclaims.co.uk/policy-checker/index.html and fill out our simple form for a fr','2021-04-01 23:37:13','2021-04-01 23:37:13'),(29,'lindamillerleads@gmail.com','Linda Miller','555-555-1212','How To Master Internet Lead Conversion?','How To Master Internet Lead Conversion?\r\n\r\nI spent the last 10+ years generating, calling and closing Internet leads. I will be sharing my decade long conversion code for you to copy during this new, free webinar!\r\nDuring the webinar, I will show you:\r\n\r\n','2021-04-06 05:56:56','2021-04-06 05:56:56'),(30,'writingbyb@gmail.com','Benjamin Ehinger','81198839828','SEO Content Writing Team','Hi! \r\n \r\nDo you struggle to find time to write articles? \r\n \r\nHire the best team of writers online today! \r\n \r\nWe do all the research and provide well-written, unique SEO content perfect for higher search engine ranking and better visitor engagement. \r\n \r','2021-04-08 02:00:00','2021-04-08 02:00:00'),(31,'faceleads@outlook.com','Mike Sharp','82511976849','Facebook Leads','Hey, \r\nAre you interested in having your competitor customer database? We can pull Facebook profiles data that like their Facebook Page. \r\nSince these people follow the page, they have an interest in the products and services they offer. \r\nWe provide thei','2021-04-08 05:47:32','2021-04-08 05:47:32'),(32,'no-replyGed@gmail.com','Mike Roger','81183752284','Local SEO for more business','Hi \r\n \r\nI have just checked  warkaorder.com for  the current Local search visibility and seen that your website could use a boost. \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and ','2021-04-14 06:45:45','2021-04-14 06:45:45'),(33,'no-reply@google.com','Mike Harris','86988253829','cheap monthly SEO plans','Good Day \r\n \r\nI have just verified your SEO on  warkaorder.com for its SEO metrics and saw that your website could use a push. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly rep','2021-04-25 02:40:02','2021-04-25 02:40:02'),(34,'noreply@googlemail.com','John Wang','89187253758','TREAT AS CONFIDENTIAL','Hello, \r\nI am contacting you regarding a transaction of mutual benefit, I am an Auditor who managed a client\'s account that passed away many years ago with same last name as yours, he passed away without any known relative. \r\nWe can work together mutually','2021-04-28 11:32:42','2021-04-28 11:32:42'),(35,'agency7imarketing@gmail.com','Jack Jones','84535344246','Statistically, 94% of Crypto investors lose their ','Start profitable crypto trading today - http://crpt.sndforbz.email \r\n \r\nStatistically, 94% of Crypto investors lose their money. \r\nWe are offering a chance to be among those 6% who actually grow their investments. \r\nThe biggest mistake of each investor is','2021-04-29 14:16:55','2021-04-29 14:16:55'),(36,'lambertj283@gmail.com','James Lambert','87484776664','Partnership','Good day \r\n \r\nI`m seeking a reputable company/ individual to partner with in a manner that would benefit both parties. The project is worth $24 Million so if interested, kindly contact me through this email jameslambert@lambert-james.com for clarification','2021-05-06 23:06:15','2021-05-06 23:06:15'),(37,'see-email-in-message@monkeydig','Mike Holiday','85511593983','Increase Domain Strength for warkaorder.com','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your warkaorder.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your warkaorder.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great ','2021-05-07 02:47:05','2021-05-07 02:47:05'),(38,'no-replyundown@gmail.com','Jamescream','82259117851','Delivery of your email messages.','Hello!  warkaorder.com \r\n \r\nDo you know the easiest way to mention your merchandise or services? Sending messages exploitation feedback forms can allow you to easily enter the markets of any country (full geographical coverage for all countries of the wor','2021-05-12 09:14:30','2021-05-12 09:14:30'),(39,'no-replyGed@gmail.com','Mike Gilson','81823581415','Local SEO for more business','Good Day \r\n \r\nI have just took an in depth look on your  warkaorder.com for its Local SEO Trend and seen that your website could use an upgrade. \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Goo','2021-05-12 14:38:27','2021-05-12 14:38:27'),(40,'g.a.76.5.2.7.1.9@gmail.com','Gabriel Angelo','87758617868','Business financing','Dear Entrepreneur, \r\n \r\nI\'m Gabriel Angelo, My Company can bridge fund for your new or ongoing Business. Do let me know when you receive this message for further procedure. \r\n \r\nYou can reach me using this email address: gabriel_angelo@nestalconsultants.c','2021-05-13 14:36:56','2021-05-13 14:36:56'),(41,'press@yahoo.com','Yahoo','87499549657','Most profitable cryptocurrency miners released','Most profitable cryptocurrency miners has been released : \r\nDBT Miner: $7,500 (Bitcoin), $13,000 (Litecoin), $13,000 (Ethereum), and $15,000 (Monero) \r\n \r\nGBT Miner: $22,500 (Bitcoin), $39,000 (Litecoin), $37,000 (Ethereum), and $45,000 (Monero) \r\nRead mo','2021-05-19 16:13:24','2021-05-19 16:13:24'),(42,'businessloans2021@outlook.com','Carroll Porton','87776881568','Private Business Funding 2021','Is your business in need of a loan? \r\nFind the best finance rates in the UK with Business Grants & Loans. \r\nCompare Loans Now https://www.weraiseanyfinance.co.uk/loans \r\n \r\n• Receive the funds within 7 days \r\n \r\n• Raise up to ?100 million for your busines','2021-05-19 18:28:21','2021-05-19 18:28:21'),(43,'biclaims20@outlook.com','Commerce Consultants','86316754145','Business Interruption Insurance Payouts','Companies with Business Interruption Insurance who were previously rejected are now being paid out thanks to our expert legal team. Visit https://commerce-consultants.co.uk  and fill out our simple form for a free policy check and instant advice. \r\nWe now','2021-05-21 02:13:24','2021-05-21 02:13:24'),(44,'no-reply@google.com','Mike Miller','87187491323','whitehat monthly SEO plans','Howdy \r\n \r\nI have just checked  warkaorder.com for its SEO Trend and saw that your website could use an upgrade. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outst','2021-05-23 12:51:58','2021-05-23 12:51:58'),(45,'biclaims2@outlook.com','Commerce','82728263542','Business Interruption Insurance Payouts','Companies with Business Interruption Insurance who were previously rejected are now being paid out thanks to our expert legal team. Visit https://commerce-consultants.co.uk and fill out our simple form for a free policy check and instant advice. \r\n \r\n \r\nW','2021-05-26 17:46:42','2021-05-26 17:46:42'),(46,'luke@bitconsystem.io','Luke Tucker','86182872526','The Golden Opportunity','Hey is Luke here, \r\nBitcoinProfit is a group reserved exclusively for people who have jumped at the chance to generate phenomenal returns from Bitcoin and have made a small fortune in the process. \r\nBitcoinProfit members spend their peaceful retirement in','2021-06-04 15:44:02','2021-06-04 15:44:02'),(47,'no-replyGed@gmail.com','Mike Archibald','81822819373','Local SEO for more business','Hello \r\n \r\nWe will increase your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://spe','2021-06-10 20:41:28','2021-06-10 20:41:28'),(48,'no-reply@google.com','Mike Thornton','87946279992','whitehat monthly SEO plans','Hello \r\n \r\nI have just took a look on your SEO for  warkaorder.com for its SEO metrics and saw that your website could use a push. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly','2021-06-16 14:08:48','2021-06-16 14:08:48'),(49,'ashlayhazalton36145@gmail.com','Ashlay Hazalton','88822529411','How to win casino by free bonus','Hi, this is Chris. \r\nWho win all online casinos by using FREE BONUS. \r\n \r\nWitch mean, I don’t really spend money in online casinos. \r\n \r\nBut I win every time, and actually, everybody can win by following my directions. \r\n \r\neven you can win! \r\n \r\nSo, if y','2021-06-26 15:19:56','2021-06-26 15:19:56'),(50,'grayceschiro32@gmail.com','SEO X Press Digital Agency','84592314929','Ultimate SEO Solutions for warkaorder.com','Hi \r\n \r\n \r\nI have just checked  warkaorder.com for its SEO Trend and saw that your website could use a push. \r\n \r\n \r\nWe will enhance your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please email us \r\n \r\nsupport@digita','2021-07-02 23:01:54','2021-07-02 23:01:54'),(51,'karlenebro32@gmail.com','Mike Gilmore','89834446133','Local SEO for more business','Howdy \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://spee','2021-07-05 10:40:15','2021-07-05 10:40:15'),(52,'no-replyjeone@gmail.com','MARIA LOPEZ','86489534249','Please respond urgently','THE WEB PROMOTION PROGRAM \r\nAttn: Beneficiary \r\nWe are pleased to inform you of the release of the results of our ES.INTERNATIONAL WEBSITE PROMOTION PROGRAM. The result was released on the 5th of November 2021. Your e-Website was attached to ticket number','2021-07-07 05:44:22','2021-07-07 05:44:22'),(53,'geneva.friese46@gmail.com','Geneva Friese','06021 59 49 69','A secret weapon for anyone who needs content','Hi , \r\n\r\nI don’t need to tell you how important it is to optimize every step in your SEO pipeline. \r\n\r\nBut unfortunately, it’s nearly impossible to cut out time or money when it comes to getting good content.\r\n\r\nAt least that’s what I thought until I came','2021-07-09 00:31:01','2021-07-09 00:31:01'),(54,'gironlisabe32@gmail.com','Mike Thomas','89592493485','affordable monthly SEO plans','Good Day \r\n \r\nI have just took an in depth look on your  warkaorder.com for its SEO metrics and saw that your website could use a push. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing m','2021-07-14 05:20:07','2021-07-14 05:20:07'),(55,'eric.jones.z.mail@gmail.com','Eric Jones','555-555-1212','Cool website!','Cool website!\r\n\r\nMy name’s Eric, and I just found your site - warkaorder.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – ','2021-07-18 08:11:35','2021-07-18 08:11:35'),(56,'no-replyundown@gmail.com','Jamescream','83623761994','The best advertising of your products and services','Hi!  warkaorder.com \r\n \r\nDo you know the easiest way to mention your products or services? Sending messages using contact forms can permit you to easily enter the markets of any country (full geographical coverage for all countries of the world).  The adv','2021-07-20 22:21:00','2021-07-20 22:21:00'),(57,'winston@gomail777.com','Winston','708-320-3171','I like your site, quick question...','Hey guys, Winston here from Iowa.  I just wanted to see if you need anything in the way of site editing/code fixing/programming, unique blog post material, extra traffic by getting others to start sharing your site across their own social media accounts, ','2021-07-28 05:50:57','2021-07-28 05:50:57'),(58,'francisanderson7162@gmail.com','SEO X Press Digital Agency','89491672264','Ultimate SEO Solutions for warkaorder.com','Hi there \r\n \r\n \r\nI have just analyzed  warkaorder.com for  the current search visibility and saw that your website could use a push. \r\n \r\n \r\nWe will improve your Ranks organically and safely, using only whitehat methods, \r\n \r\n \r\nIf interested, please emai','2021-07-29 11:33:33','2021-07-29 11:33:33'),(59,'eric.jones.z.mail@gmail.com','Eric Jones','555-555-1212','Strike when the iron’s hot','Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found warkaorder.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question ','2021-07-31 12:09:08','2021-07-31 12:09:08'),(60,'christinefloyd7162@gmail.com','Mike Alsopp','88294568673','Local SEO for more business','Hi there \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps://s','2021-08-04 04:28:54','2021-08-04 04:28:54'),(61,'adrianagoodall3262@gmail.com','Mike Turner','88649973191','cheap monthly SEO plans','Hi there \r\n \r\nI have just checked  warkaorder.com for its SEO Trend and saw that your website could use a boost. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outs','2021-08-10 17:08:59','2021-08-10 17:08:59'),(62,'officeline8400@gmail.com','Tommy Abels','89482623647','Opportunity','Hello, I am a Senior Financial Strategist. I have a client who has an interest in Investing in your country into a Joint Venture / Partnership. He has funds available meant for investment. \r\n \r\nPlease contact me if you are interested. \r\n \r\nRegards, \r\nTomm','2021-08-15 05:37:08','2021-08-15 05:37:08'),(63,'hrhmbambi@gmail.com','Thomaspinue','84278889623','Bulk Supply to Cameroon','Dear Director, \r\nWe are interested in your products. If your company can handle a bulk supply of your products to Cameroon, please contact us. \r\nPlease forward copy of your reply to hrhbahmbi3@oepd.org    Regards HRM Bah Mbi','2021-08-16 20:30:49','2021-08-16 20:30:49'),(64,'walshjames330@gmail.com','Ruggiero Larsen','87416762631','investment opportunity','Nice to connect with you, do you know about bitcoin investment and how it works? Have you ever imagined why billionaires are investing in bitcoin? \r\n \r\nits because they know something you don\'t know, with just  $1000 investment you can make profit of $500','2021-08-17 20:31:55','2021-08-17 20:31:55'),(65,'kathlene.shippee@googlemail.co','Kathlene Shippee','070 4007 3826','JOIN OUR COMMUNITY OF 69937 PUBLISHERS','JOIN OUR COMMUNITY OF 69937 PUBLISHERS\r\n\r\nThe Moneytizer maximizes your website\'s advertising revenue. Our Header Bidding technology allows the world\'s largest advertisers to compete for each of your ad spaces. Always get the best CPM with The Moneytizer!','2021-08-24 13:53:18','2021-08-24 13:53:18'),(66,'no-replyundown@gmail.com','SEO X Press Digital Agency','89952799546','Get more dofollow backlinks for warkaorder.com','Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ran','2021-08-26 08:17:20','2021-08-26 08:17:20'),(67,'marshabethel7162@gmail.com','Mike Clapton','83457774689','Increase sales for warkaorder.com','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your warkaorder.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your warkaorder.com to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a great ','2021-08-26 19:36:08','2021-08-26 19:36:08'),(68,'radecki.dan@gmail.com','Dan Radecki','0398 4551292','Banks Us $862/Day ClickBank Commissions!','NEW: We Make $862/Day In August 2021 - With...\r\nWorld\'s 1st \"Done-For-You\" Affiliate App That \r\nBanks Us $862/Day ClickBank Commissions!\r\n\r\nNo Tech Skills | No Knowledge | No Experience | No Hidden Costs\r\n\r\n=>> https://get-maximus.blogspot.com/\r\n\r\n\r\n.\r\n..','2021-08-29 11:38:03','2021-08-29 11:38:03'),(69,'no-replyTaf@gmail.com','Mike Nelson','81321252247','Local SEO for more business','Howdy \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://spee','2021-09-02 19:46:33','2021-09-02 19:46:33'),(70,'no-replyTaf@gmail.com','Mike Ryder','83496721452','cheap monthly SEO plans','Greetings \r\n \r\nI have just verified your SEO on  warkaorder.com for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will enhance your SEO metrics and ranks organically and safely, using only whitehat methods, while prov','2021-09-08 12:58:50','2021-09-08 12:58:50'),(71,'raynor.stephany@gmail.com','Stephany Raynor','09931 41 80 03','Top 10 Online Earning Site Options to Follow','Top 10 Online Earning Site Options to Follow\r\n\r\nIn the 21st century where everything is changing, upgrading, in which the information travels around the globe in seconds. In this internet age why to still follow the traditional ways of doing business when','2021-09-22 03:23:06','2021-09-22 03:23:06'),(72,'no-replyTaf@gmail.com','Mike Owen','82787956348','Increase sales for warkaorder.com','Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your warkaorder.com website? \r\nHaving a high DA score, always helps \r\n \r\nGet your warkaorder.com to have a DA between 50 to 60 points in Moz with us today and reap the benefits of such a great','2021-09-23 05:14:29','2021-09-23 05:14:29'),(73,'no-replyTaf@gmail.com','Mike Holiday','86866417574','Local SEO for more business','Hi there \r\n \r\nWe will improve your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://s','2021-09-28 12:13:54','2021-09-28 12:13:54'),(74,'allthejobsites@job4u.com','David Jackson','82927976487','Recruitment Candidate','Hello, \r\n \r\nI hope you are well. Apologies for contacting through the form, I couldn\'t locate a direct email. \r\n \r\nWe provide a very simple, yet highly effective service for employers in the UK. \r\n \r\nWith our service, you can advertise any UK job across a','2021-10-05 10:29:05','2021-10-05 10:29:05'),(75,'no-replyTaf@gmail.com','Mike MacAlister','85165478684','whitehat monthly SEO plans','Hello \r\n \r\nI have just verified your SEO on  warkaorder.com for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providin','2021-10-06 13:03:36','2021-10-06 13:03:36'),(76,'no-replyundown@gmail.com','Jamescream','82319797878','The best advertising of your products and services','Hello!  warkaorder.com \r\n \r\nDo you know the best way to mention your merchandise or services? Sending messages through contact forms can enable you to easily enter the markets of any country (full geographical coverage for all countries of the world).  Th','2021-10-07 10:26:59','2021-10-07 10:26:59'),(77,'no-replyTaf@gmail.com','Mike Miln','89612697178','Get more dofollow backlinks for warkaorder.com','Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact your ran','2021-10-09 16:02:48','2021-10-09 16:02:48'),(78,'cuningham.tom@msn.com','Tom Cuningham','0393 8813143','website HOSTING (unlimited with NO monthly fee)','Get LIFETIME web hosting (no monthly fee)\r\n\r\nthis is a revolution in web hosting that gives you:\r\n[+] Faster loading websites than ever before\r\n[+] 100% uptime with free SSL encryption built-in\r\n[+] Unlimited sites, email accounts & more\r\n[+] Next-Generat','2021-10-11 00:52:23','2021-10-11 00:52:23'),(79,'toby_knows@yahoo.com','Toby Knows','88942213745','We didn’t buy from you because of your reviews','Wouldn’t it be great if people told you the reason that they did NOT buy? \r\n \r\n \r\nOf course, that doesn’t happen in the real world. \r\n \r\n \r\nThey just buy from your competitors instead (the ones that have better reviews). \r\n \r\n \r\nUnless you have a perfect ','2021-10-13 04:45:06','2021-10-13 04:45:06'),(80,'kerenthelma@gmail.com','Jack Taylor','86978756735','Authentic UK Driving License','Stand a chance to obtain a Full UK driving license. Registered and Authentic UK Driving License. \r\nContact us on WhatsApp +44 7445 544993 or Contact us on Email address authenticdvlalicense@gmail.com','2021-10-16 08:45:46','2021-10-16 08:45:46'),(81,'cryptofriend811@gmail.com','Crypto Friend','87649884144','You’re Missing Out On The Crypto Opportunities','Hello, \r\nBy now you must have surely heard of the term ‘crypto’ once in your lifetime. All of it yet sounds scary, while also making you feel like you are missing out on something. \r\nSafety? Security? Knowledge? Trust? These are many other doubts that may','2021-10-17 23:38:46','2021-10-17 23:38:46'),(82,'jeannganso0@gmail.com','Jean Ngangso','82928825633','Product interest','Attn. Director, \r\n \r\nI am interested in your products and line of business. \r\n \r\nPlease do not hesitate to contact me if you will need a financial partner and investor. \r\n \r\nKindly send reply to jeangangso@adminoiedc.org \r\n \r\n \r\n \r\nRegards, \r\n \r\nJean Ngan','2021-10-20 19:33:25','2021-10-20 19:33:25');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_places`
--

DROP TABLE IF EXISTS `customer_places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_places` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exact_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cafe_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_places`
--

LOCK TABLES `customer_places` WRITE;
/*!40000 ALTER TABLE `customer_places` DISABLE KEYS */;
INSERT INTO `customer_places` (`id`, `exact_location`, `telephone`, `code`, `cafe_id`, `created_at`, `updated_at`) VALUES (1,'የሙከራ ሱቅ 4545','09 86 555 342','0',3,'2020-11-22 17:28:35','2020-11-22 17:28:35'),(2,'ሱቅ 1234','12345678','0',1,'2020-11-22 17:54:41','2020-11-22 17:54:41'),(3,'x ሞባይል ሴንተር 1ኛ ፎቅ ሱቅ 0-4322','09 39 67 67 14','0',3,'2020-11-23 14:38:04','2020-11-23 14:38:04'),(7,'ማሜ ሞባይል፣ 4ኛ ፎቅ ሱቅ ቁጥር 3299','0922136522','0',4,'2020-11-14 03:57:45','2020-11-14 03:57:45'),(8,'ሱቅ 6855','09 56 52 5433','0',7,'2020-11-15 05:09:22','2020-11-15 05:09:22'),(9,'ቢሮ 5568','011 465 68 78','0',7,'2020-11-17 04:30:09','2020-11-17 04:30:09'),(10,'ሱቅ 0989','09 23 44 11 21','0',7,'2020-11-20 11:23:46','2020-11-20 11:23:46'),(11,'ሌላ ሱቅ 4356','08 57 46 24 75','0',7,'2020-11-23 07:19:36','2020-11-23 07:19:36'),(14,'default','6543456','0',3,NULL,NULL),(15,'default','0939676714','0',6,'2020-11-29 08:37:42','2020-11-29 08:37:42'),(16,'ወንበር 1234','0939676714','6714',3,'2020-11-30 13:58:52','2020-11-30 13:58:52'),(17,'1004','0945357685','7685',1,'2020-12-01 04:13:40','2020-12-01 04:13:40'),(18,'4006','0945357685','1223',1,'2020-12-01 04:14:28','2020-12-01 04:14:28'),(19,'default','0911694389',NULL,7,'2020-12-01 10:00:39','2020-12-01 10:00:39'),(20,'default','0967170569',NULL,8,'2020-12-01 17:58:28','2020-12-01 17:58:28'),(21,'default','0967170569',NULL,9,'2020-12-02 17:09:10','2020-12-02 17:09:10'),(22,'default','09686665',NULL,10,'2020-12-02 19:53:02','2020-12-02 19:53:02'),(23,'ወንበር 3344','456783344','3344',3,'2020-12-03 04:08:09','2020-12-03 04:08:09'),(24,'default','0960972949',NULL,11,'2020-12-05 13:45:54','2020-12-05 13:45:54'),(25,'ወንበር 1234','0944563567','1122',8,'2020-12-08 10:46:13','2020-12-08 10:46:13'),(26,'ወንበር 1235','0944563567','1122',8,'2020-12-08 10:46:44','2020-12-08 10:46:44'),(27,'ወንበር 1236','0944563567','1134',8,'2020-12-08 10:47:37','2020-12-08 10:47:37'),(28,'ሱቅ 1332','0967175677','1234',8,'2020-12-08 10:48:41','2020-12-08 10:48:41'),(29,'ቢሮ','0967170569','0569',8,'2020-12-08 10:49:54','2020-12-08 10:49:54'),(30,'ወንበር 1009','4667737375','7765',7,'2020-12-09 10:01:23','2020-12-09 10:01:23'),(31,'ወንበር 1013','7475846264','6184',7,'2020-12-09 10:02:00','2020-12-09 10:02:00'),(32,'ወንበር 1010','0957755788','6078',7,'2020-12-09 10:11:22','2020-12-09 10:11:22'),(33,'ወንበር 1014','09465555','6762',7,'2020-12-09 10:15:25','2020-12-09 10:15:25'),(34,'ወንበር 1000','5194','5194',7,'2020-12-09 10:16:06','2020-12-09 10:16:06'),(35,'ወንበር 1007','3937','3937',7,'2020-12-09 10:17:05','2020-12-09 10:17:05'),(36,'ወንበር 1004','09463575','2651',7,'2020-12-09 10:20:24','2020-12-09 10:20:24'),(37,'default','66777',NULL,12,'2020-12-13 10:07:43','2020-12-13 10:07:43'),(38,'default','1111','1111',1,'2020-12-14 17:20:27','2020-12-14 17:20:27'),(39,'inside seat 1022',NULL,'1022',1,'2020-12-15 06:19:15','2020-12-15 06:19:15'),(40,'ሱቅ 0011 ከX ህንፃ ወረድ ብሎ','094967755','7755',3,'2020-12-15 17:11:20','2020-12-15 17:11:20'),(41,'default','09345666777',NULL,13,'2020-12-16 11:02:14','2020-12-16 11:02:14'),(42,'default','0988155377',NULL,14,'2020-12-17 11:49:49','2020-12-17 11:49:49'),(43,'default','0956666667','6667',15,'2020-12-17 23:33:40','2020-12-17 23:33:40'),(44,'default','09333323','3323',16,'2020-12-18 15:13:40','2020-12-18 15:13:40'),(45,'default','0940678725','8725',17,'2020-12-18 16:23:21','2020-12-18 16:23:21'),(46,'default','0911700633','0633',18,'2020-12-18 16:49:06','2020-12-18 16:49:06'),(47,'ወንበር 1003',NULL,'1003',18,'2020-12-18 18:15:49','2020-12-18 18:15:49'),(48,'ወንበር 1004',NULL,'2344',18,'2020-12-18 18:16:18','2020-12-18 18:16:18'),(49,'ወንበር 1005',NULL,'2342',18,'2020-12-18 18:16:35','2020-12-18 18:16:35'),(50,'ወንበር 1005',NULL,'2345',18,'2020-12-18 18:17:07','2020-12-18 18:17:07'),(51,'ማሜ ሞባይል ሱቅ ቁጥር 1122','0911745643','5643',18,'2020-12-18 18:18:48','2020-12-18 18:18:48'),(52,'ማሜ ሞባይል ሱቅ ቁጥር 1122','0911745647','1122',18,'2020-12-18 18:19:30','2020-12-18 18:19:30'),(53,'ወንበር 2001',NULL,'2001',3,'2020-12-19 16:47:16','2020-12-19 16:47:16'),(54,'ወንበር 2002',NULL,'1234',3,'2020-12-19 16:47:31','2020-12-19 16:47:31'),(55,'ወንበር 2003',NULL,'1233',3,'2020-12-19 16:47:55','2020-12-19 16:47:55'),(56,'ማሜ ሞባይል መሸጫ ሱቅ ቁጥር 8899','0911741200','1200',3,'2020-12-19 16:49:24','2020-12-19 16:49:24'),(57,'የጠብቆች ቢሮ 4ኛ ፎቅ ቢሮ ቁጥር 2341','0911749800','2341',3,'2020-12-19 16:50:59','2020-12-19 16:50:59'),(58,'default','097665443','5443',19,'2021-01-09 16:03:56','2021-01-09 16:03:56'),(59,'1212',NULL,'1212',1,'2021-02-06 13:18:49','2021-02-06 13:18:49'),(60,'default','0911700637','0637',20,'2021-02-10 11:01:31','2021-02-10 11:01:31');
/*!40000 ALTER TABLE `customer_places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
INSERT INTO `downloads` (`id`, `name`, `detail`, `size`, `url`, `created_at`, `updated_at`) VALUES (9,'sample name.mp4','here is detail abot the file','3277938','public/todownload/wQ3LARMmyVCmsLOA7GRhIKPSXZEoj9aUxe8KVjBb.mp4','2020-12-17 17:52:34','2020-12-17 17:52:34'),(10,'Warka order.zip','using Android application of warkaorder','1709496','public/todownload/sESsefPhIYNEVkGNFnOnrb6s2QRBfHDXzuElZnA1.zip','2021-01-13 10:20:10','2021-01-13 10:20:10'),(11,'Warka order.zip','use Android application of warkaorder and easy your day','1709496','public/todownload/txwvD7Gi6osfvHS67g7Pjpn6TiV3Nax6AGSJH1MX.zip','2021-01-13 10:20:38','2021-01-13 10:20:38'),(12,'Warka order App.apk.zip',NULL,'1709496','public/todownload/dyiRNxn0RBPdcs4jIYXy7244wOeVWYdySc4wzomu.zip','2021-01-13 10:28:34','2021-01-13 10:28:34');
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incomes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_user_id` bigint(20) unsigned NOT NULL,
  `quantity` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_places_id` bigint(20) unsigned NOT NULL,
  `total` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cafe_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `incomes_product_user_id_foreign` (`product_user_id`),
  KEY `incomes_cafe_id_foreign` (`cafe_id`),
  KEY `incomes_customer_places_id_foreign` (`customer_places_id`),
  CONSTRAINT `incomes_cafe_id_foreign` FOREIGN KEY (`cafe_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `incomes_customer_places_id_foreign` FOREIGN KEY (`customer_places_id`) REFERENCES `customer_places` (`id`),
  CONSTRAINT `incomes_product_user_id_foreign` FOREIGN KEY (`product_user_id`) REFERENCES `product_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incomes`
--

LOCK TABLES `incomes` WRITE;
/*!40000 ALTER TABLE `incomes` DISABLE KEYS */;
INSERT INTO `incomes` (`id`, `product_user_id`, `quantity`, `customer_places_id`, `total`, `created_at`, `updated_at`, `cafe_id`) VALUES (1,45,'3',23,'63','2020-12-06 14:35:50','2020-12-06 14:35:50',3),(2,56,'2',23,'290','2020-12-06 14:36:20','2020-12-06 14:36:20',3),(3,37,'1',23,'142','2020-12-06 14:36:20','2020-12-06 14:36:20',3),(4,62,'2',29,'190','2020-12-08 10:56:48','2020-12-08 10:56:48',8),(5,33,'1',23,'100','2020-12-13 09:10:27','2020-12-13 09:10:27',3),(6,40,'1',39,'120','2020-12-15 06:30:00','2020-12-15 06:30:00',1),(7,64,'3',39,'366','2020-12-15 06:30:12','2020-12-15 06:30:12',1),(8,42,'1',18,'84','2020-12-15 06:30:25','2020-12-15 06:30:25',1),(9,41,'1',18,'110','2020-12-15 06:30:25','2020-12-15 06:30:25',1),(10,40,'3',18,'360','2020-12-15 06:30:25','2020-12-15 06:30:25',1),(11,48,'1',23,'42','2020-12-15 16:58:09','2020-12-15 16:58:09',3),(12,56,'1',16,'145','2020-12-15 16:58:56','2020-12-15 16:58:56',3),(13,35,'1',16,'153','2020-12-15 16:58:56','2020-12-15 16:58:56',3),(14,41,'1',38,'110','2020-12-17 16:26:15','2020-12-17 16:26:15',1),(15,33,'1',23,'100','2020-12-17 17:01:47','2020-12-17 17:01:47',3),(16,32,'3',14,'435','2020-12-17 17:02:17','2020-12-17 17:02:17',3),(17,42,'2',38,'168','2020-12-18 07:16:28','2020-12-18 07:16:28',1),(18,99,'2',46,'24','2020-12-18 17:14:37','2020-12-18 17:14:37',18),(19,97,'1',47,'65','2020-12-19 11:38:04','2020-12-19 11:38:04',18),(20,101,'3',47,'420','2020-12-19 11:38:04','2020-12-19 11:38:04',18),(21,98,'1',51,'122','2020-12-19 11:41:13','2020-12-19 11:41:13',18),(22,100,'1',51,'110','2020-12-19 11:45:02','2020-12-19 11:45:02',18),(23,105,'1',46,'54','2020-12-19 11:47:49','2020-12-19 11:47:49',18),(24,104,'3',46,'150','2020-12-19 11:48:52','2020-12-19 11:48:52',18),(25,45,'2',23,'42','2020-12-19 16:52:11','2020-12-19 16:52:11',3),(26,53,'2',14,'24','2020-12-19 16:54:09','2020-12-19 16:54:09',3),(27,48,'1',40,'42','2021-01-09 12:59:07','2021-01-09 12:59:07',3),(28,33,'1',40,'100','2021-01-09 12:59:19','2021-01-09 12:59:19',3),(29,35,'1',56,'153','2021-02-06 10:22:46','2021-02-06 10:22:46',3),(30,52,'2',40,'108','2021-02-06 10:23:13','2021-02-06 10:23:13',3),(31,49,'2',14,'20','2021-02-06 10:52:40','2021-02-06 10:52:40',3),(32,36,'2',14,'246','2021-02-06 10:55:26','2021-02-06 10:55:26',3),(33,46,'2',16,'86','2021-02-06 11:01:40','2021-02-06 11:01:40',3),(34,33,'1',16,'100','2021-02-06 11:01:40','2021-02-06 11:01:40',3),(35,53,'1',23,'12','2021-02-06 11:01:47','2021-02-06 11:01:47',3),(36,52,'3',56,'162','2021-02-06 11:03:20','2021-02-06 11:03:20',3),(37,32,'1',23,'145','2021-02-06 11:09:52','2021-02-06 11:09:52',3),(38,45,'2',23,'42','2021-02-06 11:12:26','2021-02-06 11:12:26',3),(39,41,'1',59,'110','2021-02-06 13:20:25','2021-02-06 13:20:25',1),(42,41,'1',59,'110','2021-02-06 13:23:23','2021-02-06 13:23:23',1),(44,41,'1',59,'110','2021-02-06 13:26:46','2021-02-06 13:26:46',1),(46,48,'1',23,'42','2021-02-11 11:01:16','2021-02-11 11:01:16',3),(47,50,'1',23,'11','2021-02-11 11:01:16','2021-02-11 11:01:16',3),(48,41,'1',38,'132','2021-02-15 22:13:40','2021-02-15 22:13:40',1),(49,32,'2',56,'290','2021-03-19 12:08:28','2021-03-19 12:08:28',3),(50,58,'1',56,'75','2021-03-19 12:08:28','2021-03-19 12:08:28',3),(51,41,'2',38,'264','2021-03-21 18:17:40','2021-03-21 18:17:40',1),(52,32,'2',56,'290','2021-06-26 11:02:10','2021-06-26 11:02:10',3);
/*!40000 ALTER TABLE `incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_10_15_085800_create_products_table',1),(5,'2020_10_31_193229_create_special_users_table',1),(6,'2020_10_31_195936_create_customer_places_table',1),(7,'2020_10_31_200309_create_real_customers_table',1),(8,'2020_10_31_200920_create_roles_table',1),(9,'2020_10_31_201206_create_role_user_table',1),(13,'2020_11_03_080010_create_profiles_table',1),(14,'2020_11_03_204203_create_types_table',1),(15,'2020_11_04_095756_create_product_types_table',1),(16,'2020_11_09_110327_create_tests_table',1),(17,'2020_11_11_201721_create_settings_table',1),(18,'2020_11_12_131520_create_setting_user_table',1),(19,'2020_11_18_130151_create_contacts_table',1),(20,'2020_11_19_102208_create_activation_requests_table',1),(23,'2020_11_22_122645_create_products_user_table',2),(24,'2020_11_22_133947_create_product_user_table',3),(25,'2020_11_02_133644_create_orders_table',4),(26,'2020_11_02_154634_create_incomes_table',4),(27,'2020_11_02_070040_create_special_products_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `open_close_times`
--

DROP TABLE IF EXISTS `open_close_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `open_close_times` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `open_at` time NOT NULL,
  `close_at` time NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `open_close_times_user_id_foreign` (`user_id`),
  CONSTRAINT `open_close_times_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `open_close_times`
--

LOCK TABLES `open_close_times` WRITE;
/*!40000 ALTER TABLE `open_close_times` DISABLE KEYS */;
INSERT INTO `open_close_times` (`id`, `user_id`, `open_at`, `close_at`, `status`, `created_at`, `updated_at`) VALUES (4,3,'08:23:00','18:35:00',1,NULL,'2020-12-20 15:25:08'),(5,1,'08:19:00','19:42:00',1,NULL,'2020-12-14 18:00:04'),(6,9,'03:53:14','21:53:14',1,NULL,NULL),(7,10,'03:53:14','21:53:14',1,NULL,NULL),(8,7,'03:53:14','21:53:14',1,NULL,NULL),(9,8,'03:53:14','21:53:14',1,NULL,NULL),(11,12,'03:53:14','21:53:14',1,NULL,NULL),(12,14,'03:53:14','21:53:14',1,NULL,NULL),(13,6,'03:53:14','21:53:14',1,NULL,NULL),(14,15,'07:00:00','19:11:00',1,'2020-12-17 23:33:40','2020-12-17 23:45:31'),(17,18,'09:00:00','22:10:00',1,'2020-12-18 16:49:06','2020-12-18 18:21:58'),(18,19,'09:00:00','21:00:00',0,'2021-01-09 16:03:56','2021-01-09 16:03:56'),(19,20,'09:00:00','21:00:00',0,'2021-02-10 11:01:31','2021-02-10 11:01:31');
/*!40000 ALTER TABLE `open_close_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_user_id` bigint(20) unsigned NOT NULL,
  `cafe_id` bigint(20) unsigned NOT NULL,
  `item` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_places_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_product_user_id_foreign` (`product_user_id`),
  CONSTRAINT `orders_product_user_id_foreign` FOREIGN KEY (`product_user_id`) REFERENCES `product_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_ip`, `product_user_id`, `cafe_id`, `item`, `total`, `quantity`, `customer_places_id`, `created_at`, `updated_at`) VALUES (41,'196.190.154.215',59,8,'ወተት','15','1',29,'2020-12-08 10:55:27','2020-12-08 10:55:27'),(42,'196.190.154.215',59,8,'ወተት','15','1',28,'2020-12-08 11:08:20','2020-12-08 11:08:20'),(43,'196.190.154.215',63,8,'ጥብስ','270','1',28,'2020-12-08 11:08:20','2020-12-08 11:08:20'),(44,'196.190.154.199',63,8,'ጥብስ','540','2',29,'2020-12-08 12:40:36','2020-12-08 12:40:36'),(45,'196.190.154.199',62,8,'በየአይነት','95','1',29,'2020-12-08 12:40:36','2020-12-08 12:40:36'),(46,'197.156.103.14',67,7,'ቺክን ፒዛ','240','2',30,'2020-12-09 10:03:58','2020-12-09 10:03:58'),(47,'197.156.103.14',69,7,'በርገር special','130','1',30,'2020-12-09 10:03:58','2020-12-09 10:03:58'),(66,'197.156.95.103',104,18,'እንቁላል ሳንዱች','100','2',49,'2020-12-19 11:43:48','2020-12-19 11:43:48'),(67,'197.156.95.103',100,18,'ቺዝ በርገር/cheese burger','115','1',49,'2020-12-19 11:43:48','2020-12-19 11:43:48'),(85,'196.189.240.53',32,3,'በየአይነት','145','1',57,'2021-02-11 11:00:40','2021-02-11 11:00:40'),(86,'196.189.240.53',48,3,'አቮካዶ ጭማቂ/Avocado juce','42','1',57,'2021-02-11 11:00:40','2021-02-11 11:00:40'),(87,'196.189.240.53',48,3,'አቮካዶ ጭማቂ/Avocado juce','84','2',23,'2021-02-11 11:10:08','2021-02-11 11:10:08'),(88,'196.189.240.53',58,3,'አትክልት በየአይነት','75','1',23,'2021-02-11 11:10:08','2021-02-11 11:10:08'),(89,'196.189.240.53',58,3,'አትክልት በየአይነት','75','1',23,'2021-02-11 11:10:08','2021-02-11 11:10:08'),(92,'197.156.86.167',36,3,'በርገር special','246','2',16,'2021-06-26 11:05:26','2021-06-26 11:05:26'),(93,'197.156.86.167',48,3,'አቮካዶ ጭማቂ/Avocado juce','42','1',16,'2021-06-26 11:05:26','2021-06-26 11:05:26'),(94,'197.156.86.167',107,3,'ፓስታ ስልስ','43','1',16,'2021-06-26 11:05:26','2021-06-26 11:05:26'),(95,'196.189.238.64',32,3,'በየአይነት','145','1',16,'2021-08-22 11:06:03','2021-08-22 11:06:03'),(96,'196.189.238.64',58,3,'አትክልት በየአይነት','75','1',16,'2021-08-22 11:06:03','2021-08-22 11:06:03'),(97,'196.189.238.64',48,3,'አቮካዶ ጭማቂ/Avocado juce','84','2',16,'2021-08-22 11:06:03','2021-08-22 11:06:03'),(98,'196.189.238.64',33,3,'ጥብስ','339','3',16,'2021-08-22 11:06:03','2021-08-22 11:06:03');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES ('esamalwinz1@gmail.com','$2y$10$SgtrVWtefHo3nV9xr64f6.36QLtkhyLZwH4z6pIJTWMmb1arzmfvy','2020-12-02 17:51:09');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printers`
--

DROP TABLE IF EXISTS `printers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `printers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `connector_port` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '9100',
  PRIMARY KEY (`id`),
  KEY `printers_user_id_foreign` (`user_id`),
  CONSTRAINT `printers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printers`
--

LOCK TABLES `printers` WRITE;
/*!40000 ALTER TABLE `printers` DISABLE KEYS */;
INSERT INTO `printers` (`id`, `user_id`, `name`, `operator`, `purpose`, `status`, `created_at`, `updated_at`, `connector_port`) VALUES (9,3,'Epson l38series','windows','real_receit',1,NULL,NULL,'9100');
/*!40000 ALTER TABLE `printers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_types`
--

DROP TABLE IF EXISTS `product_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_types` (
  `product_id` bigint(20) unsigned NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `product_types_product_id_foreign` (`product_id`),
  KEY `product_types_type_id_foreign` (`type_id`),
  CONSTRAINT `product_types_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_types_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_types`
--

LOCK TABLES `product_types` WRITE;
/*!40000 ALTER TABLE `product_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_user`
--

DROP TABLE IF EXISTS `product_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `price` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descreption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_user_user_id_foreign` (`user_id`),
  KEY `product_user_product_id_foreign` (`product_id`),
  CONSTRAINT `product_user_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_user`
--

LOCK TABLES `product_user` WRITE;
/*!40000 ALTER TABLE `product_user` DISABLE KEYS */;
INSERT INTO `product_user` (`id`, `user_id`, `product_id`, `price`, `descreption`, `vat`, `type`, `status`, `created_at`, `updated_at`) VALUES (32,3,4,'145',NULL,'21.75','ምሳ',1,NULL,'2020-11-28 10:51:42'),(33,3,5,'113','ምርጥ የጠቦት ጥብስ','16.95','ቁርስ',1,NULL,'2021-03-19 12:06:41'),(35,3,7,'153','ዶሮooooooo','22.95','እራት',1,NULL,'2020-11-30 14:07:17'),(36,3,11,'123',NULL,'18.45','እራት',1,NULL,'2020-12-20 15:26:21'),(37,3,8,'142',NULL,'21.3','እራት',1,NULL,NULL),(40,1,8,'120',NULL,'18','እራት',1,NULL,'2021-02-15 22:12:18'),(41,1,11,'132','blabla','19.8','እራት',1,NULL,'2021-02-15 22:11:44'),(42,1,20,'84',NULL,'12.6','ምሳ',0,NULL,'2020-12-17 16:25:54'),(43,6,2,'43',NULL,'6.45','እራት',1,NULL,NULL),(44,6,4,'100',NULL,'15','ምሳ',1,NULL,NULL),(45,3,1,'21',NULL,'3.15','ትኩስ ነገር',1,NULL,'2020-12-03 04:33:25'),(46,3,2,'43','best avocado','6.45','አትክልት',0,NULL,'2021-01-09 12:56:51'),(47,3,14,'50',NULL,'7.5','ለጅማሮ',0,NULL,'2020-12-17 17:30:30'),(48,3,22,'42',NULL,'6.3','አትክልት',1,NULL,'2020-12-03 04:33:01'),(49,3,26,'10',NULL,'1.5','ትኩስ ነገር',1,NULL,NULL),(50,3,27,'11',NULL,'1.65','ትኩስ ነገር',1,NULL,NULL),(51,7,27,'15',NULL,'2.25','ትኩስ ነገር',1,NULL,'2020-12-09 08:44:42'),(52,3,6,'54',NULL,'8.1','አትክልት',1,NULL,NULL),(53,3,13,'12',NULL,'1.8','ትኩስ ነገር',0,NULL,'2020-12-19 17:49:14'),(56,3,16,'145',NULL,'21.75','እራት',1,NULL,NULL),(58,3,20,'75',NULL,'11.25','ምሳ',1,NULL,'2020-12-13 09:07:33'),(59,8,1,'15',NULL,'2.25','ትኩስ ነገር',1,NULL,NULL),(60,8,2,'35',NULL,'5.25','ማቆያ',1,NULL,NULL),(61,8,3,'250',NULL,'37.5','ቁርስ',1,NULL,NULL),(62,8,4,'95','ምርጥ ያገር ቤት በየአይነት','14.25','ምሳ',1,NULL,'2020-12-08 10:35:41'),(63,8,5,'270',NULL,'40.5','እራት',1,NULL,NULL),(64,1,34,'131','አሪፍ ፒዛ','19.65','ምሳ',0,NULL,'2021-01-09 11:54:19'),(67,7,36,'120',NULL,'18','እራት',1,NULL,'2020-12-09 09:08:50'),(69,7,11,'130',NULL,'19.5','እራት',1,NULL,'2020-12-09 09:07:51'),(70,7,37,'100',NULL,'15','እራት',1,NULL,NULL),(71,7,38,'90','Hot chili sauce, Beef, Butter, Enjera','13.5','ቁርስ',1,NULL,NULL),(72,7,1,'20',NULL,'3','ትኩስ ነገር',1,NULL,'2020-12-09 10:47:22'),(73,7,13,'15','Tea with lemon','2.25','ትኩስ ነገር',1,NULL,NULL),(74,7,39,'55',NULL,'8.25','አትክልት',1,NULL,'2020-12-09 09:07:40'),(75,7,40,'120','Based of Tomato sauce, vegetable, olive, mushroom , Oregano','18','ምሳ',1,NULL,'2020-12-09 09:08:20'),(76,7,41,'70','ጨጨብሳ በእንቁላ በማር','10.5','ቁርስ',1,NULL,NULL),(77,7,42,'20',NULL,'3','ትኩስ ነገር',1,NULL,NULL),(78,7,43,'55',NULL,'8.25','ቁርስ',1,NULL,NULL),(81,7,12,'15','ካራሜል ማክያቶ','2.25','ትኩስ ነገር',1,NULL,NULL),(82,7,45,'25',NULL,'3.75','ለጅማሮ',1,NULL,NULL),(86,12,3,'324',NULL,'48.6','ቁርስ',1,NULL,NULL),(87,12,5,'132',NULL,'19.8','ቁርስ',1,NULL,NULL),(88,12,15,'153',NULL,'22.95','ምሳ',1,NULL,NULL),(89,12,32,'564',NULL,'84.6','እራት',1,NULL,NULL),(94,3,46,'34',NULL,'5.1','ማቆያ',1,NULL,NULL),(97,18,39,'65','ይህ ሳላድ ይርትርሰራው ...','9.75','ለጅማሮ',1,NULL,NULL),(98,18,36,'122','descreption','18.3','እራት',1,NULL,'2020-12-18 17:08:32'),(99,18,42,'12',NULL,'1.8','ትኩስ ነገር',1,NULL,NULL),(100,18,37,'115',NULL,'17.25','እራት',1,NULL,'2020-12-19 11:40:26'),(101,18,9,'140',NULL,'21','ምሳ',1,NULL,'2020-12-18 18:26:19'),(102,18,11,'148',NULL,'22.2','ሌላ',0,NULL,'2020-12-18 18:25:20'),(103,18,3,'156',NULL,'23.4','ቁርስ',1,NULL,NULL),(104,18,43,'50',NULL,'7.5','ቁርስ',1,NULL,'2020-12-18 18:26:02'),(105,18,38,'54',NULL,'8.1','ቁርስ',1,NULL,'2020-12-18 18:25:17'),(107,3,18,'43','አሪፍ ፓስታ','6.45','ምሳ',1,NULL,NULL),(109,3,25,'50','descreption about the juice','7.5','አትክልት',0,NULL,'2020-12-19 16:45:42'),(110,3,43,'23',NULL,'3.45','ምሳ',1,NULL,NULL),(111,1,34,'32',NULL,'4.8','ቁርስ',1,NULL,NULL),(112,1,34,'32',NULL,'4.8','ቁርስ',1,NULL,NULL);
/*!40000 ALTER TABLE `product_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `item_name`, `photo`, `incase`, `created_at`, `updated_at`) VALUES (1,'ወተት','public/uploads/UQ28OfdbFR9xPxesA9jHZdKKhyzSiedEv2xYyVEr.jpeg',NULL,NULL,NULL),(2,'Avocado ጭማቂ','public/uploads/Classical-Veggie-Pizza.jpg2021-02-06-09-47-15.jpeg',NULL,NULL,'2021-02-06 09:47:15'),(3,'አሳ','public/uploads/7ejCpaMjQ233M7yG0lku2yXix3969dC3nbU8KCIe.jpeg',NULL,NULL,NULL),(4,'በየአይነት','public/uploads/8iufYe6kFW8oc1IZC3feLLngGWG6OtcpMrvAKlU5.jpeg',NULL,NULL,NULL),(5,'ጥብስ','public/uploads/DPTw3lFtbLnQI4QeRiRVTzk7yjdIfVk1RWhWDsau.jpeg',NULL,NULL,NULL),(6,'ብርቱካን ጭማቂ','public/uploads/Z1GRPhgjzfmU5na7V7iDNdBrTR7WzR7BQXEC8kbc.jpeg',NULL,NULL,NULL),(7,'ዶሮ ወጥ','public/uploads/ZGiL0mGEjK0HJrOyfibQ2OH1KET7VzJjcJPQSvNi.jpeg',NULL,NULL,NULL),(8,'ክትፎ','public/uploads/Ng1x0idjieyk0Vh8LnKawQjXy1tvs7583Sc6HIIR.jpeg','ምርጥ ክትፎ',NULL,NULL),(9,'ፒዛ','public/uploads/z3QAjgprRw4QZEd3lmZJZRHKrKOU12bIbVrQJIau.jpeg',NULL,NULL,NULL),(10,'እብቁላል','public/uploads/xYAgNld5PnuY6zWM8sey8LShMt89b1MqmRgqU53U.jpeg',NULL,NULL,NULL),(11,'በርገር special','public/uploads/cheese-burger2.jpg2020-12-17-05-45-49.jpeg',NULL,NULL,'2020-12-17 17:45:49'),(12,'ማክያቶ','public/uploads/r0F6YTdvVv8dlLbxqZYZJOOD297coXAGeWSZxa0U.jpeg',NULL,NULL,NULL),(13,'ሻይ በሎሚ','public/uploads/qOdnvaE143kZVkUZDM3gy8IWrAYtOAIrznsco7Kd.jpeg',NULL,NULL,NULL),(14,'ኬክ','public/uploads/PB93goyrl4mzPd0Qo5TqUjIOXuXKTnmoz9LertVx.jpeg',NULL,NULL,NULL),(15,'ክትፎ ፍንታፍንቶ','public/uploads/nKRT0r942WlRSVkmeneLv9z8307Q625bG3XhcgWn.jpeg',NULL,NULL,NULL),(16,'ቀይ ወጥ','public/uploads/D1ThjiZJnD5V4aEiY1ykaEDGhWfZwLzpUSL1on3p.jpeg',NULL,'2020-11-29 04:03:17','2020-11-29 04:03:17'),(17,'ፒዛ ስፔሻል','public/uploads/fk878LYiP3DsA0GB43jjqT00mYxINK9L4FR4mldT.jpeg',NULL,'2020-11-29 04:05:06','2020-11-29 04:05:06'),(18,'ፓስታ ስልስ','public/uploads/hlaq3Lkp7kJpEn7vIPwtz0AyUpy0np6ndPcVPb50.jpeg',NULL,'2020-11-29 04:07:10','2020-11-29 04:07:10'),(19,'ማር','public/uploads/PXxxQz9veUgkfno010FSGXaQJVzII8E698KYikXa.jpeg',NULL,'2020-11-29 04:07:57','2020-11-29 04:07:57'),(20,'አትክልት በየአይነት','public/uploads/7sdbsy81xiT7CWA69h1acWrzrC8LrNIfPK1iRYGh.jpeg',NULL,'2020-11-29 04:09:08','2020-11-29 04:09:08'),(21,'እንቁላል ፍርፍር','public/uploads/NbwmFkacfNzhdOheL9ZTA3odDyQ1RYhUdBDWdZJU.jpeg',NULL,'2020-11-29 04:10:35','2020-11-29 04:10:35'),(22,'አቮካዶ ጭማቂ/Avocado juce','public/uploads/6AXLPkJuozKcLcjpIFTQvq4asi9jdE4DQgi3pVis.jpeg',NULL,'2020-11-29 04:13:09','2020-11-29 04:13:09'),(23,'ዓሳ/Fish','public/uploads/SLv0wW1av7EU20KIKlmn12vQTMunMruehaB2sbab.jpeg',NULL,'2020-11-29 04:20:24','2020-11-29 04:20:24'),(24,'የካሮት ጭማቂ /Carrot juice','public/uploads/q74ThdSClmKMRjSiULwTRSM5xheGCbG5S2n1tnjL.jpeg',NULL,'2020-11-29 04:22:39','2020-11-29 04:22:39'),(25,'የፓም  ጭማቂ /Apple juice','public/uploads/qphIqHPnOSktONeaY7crtWli6Ezo2qSfpC2c4xj9.jpeg',NULL,'2020-11-29 04:24:16','2020-11-29 04:24:16'),(26,'ሻይ','public/uploads/lWYeJYCMA1QV88Z4K0dIjxt1JgM9cPAKGDcu9GYo.jpeg',NULL,'2020-11-30 06:02:46','2020-11-30 06:02:46'),(27,'የጀበና ቡና/Cofee','public/uploads/ib8lBGYW1WiyvWA2kpekzpCFN1ePwuOOdEMxaAwQ.jpeg',NULL,'2020-11-30 06:03:42','2020-11-30 06:03:42'),(28,'ማክያቶ ጠቆር ያለ/milk with cofee','public/uploads/eH3Djj8RAZlirtzh0rsYkZTmniiGZuh7BCuI5dhn.jpeg',NULL,'2020-11-30 06:05:40','2020-11-30 06:05:40'),(29,'ካሮት ጭማቂ/Carrot juice','public/uploads/7PWStxc0SRrLR2eUiC9kSboPA2ESYVvi98Q1alqB.jpeg',NULL,'2020-12-09 07:44:39','2020-12-09 07:44:39'),(30,'ቀሽር','public/uploads/fi4I55SC2oi547TFIjKKbA5R2S9DE2xsA1a6Qf8j.jpeg',NULL,'2020-12-09 07:46:12','2020-12-09 07:46:12'),(31,'ሸክላ ጥብስ','public/uploads/EWJmv9Hj41pmMCVK7fpDnO9dtivE943qq2R8KNCh.jpeg',NULL,'2020-12-09 07:47:02','2020-12-09 07:47:02'),(32,'አሮስቶ','public/uploads/SiaHjnUp3X5SgI2Yv0HpGS7JqXg2qul1UtaIT6h0.jpeg',NULL,'2020-12-09 07:48:05','2020-12-09 07:48:05'),(33,'የሸንኮራ ጭማቂ/shuger cane juice','public/uploads/2WO00FFq5wtPuKWaBAeBMDQJ90N8A729ocwJoaos.jpeg',NULL,'2020-12-09 07:49:07','2020-12-09 07:49:07'),(34,'ፒዛ/Pizza','public/uploads/44qg8RyPWaNL0o1m1XF8dq9ZFWXYfy38pMjtWWt3.jpeg',NULL,'2020-12-09 07:50:21','2020-12-09 07:52:33'),(35,'ፈጢራ በዕንቁላል በማር','public/uploads/hI7FpHtxkV01dApYUPGRJzdhfFjqSSokV1Qj8I04.jpeg',NULL,'2020-12-09 08:19:14','2020-12-09 08:19:14'),(36,'ኪችን ፒዛ/chicken pizza','public/uploads/maxresdefault(5).jpg2020-12-19-11-11-20.jpeg',NULL,'2020-12-09 08:22:32','2020-12-19 11:11:20'),(37,'ቺዝ በርገር/cheese burger','public/uploads/ydhXDainDAg67nu1MbSgOr6ECqCTPL1hGGkZ2EBK.png',NULL,'2020-12-09 08:26:22','2020-12-09 08:26:22'),(38,'ቋንጣ ፍርፍር','public/uploads/gmN7T1y7sql7VSm2oQGDBO3UQ2FgF4JLobou3ahv.jpeg',NULL,'2020-12-09 08:29:27','2020-12-09 08:29:27'),(39,'ሳላድ ስፔሻል','public/uploads/apXldOFV3Rkrf1XXCFIDLRt3ljQoMI4O9GdOYaPh.jpeg',NULL,'2020-12-09 08:38:18','2020-12-09 08:38:18'),(40,'አትክልት ፒዛ','public/uploads/Y4b4TpUlpCVfDqDcPUqLyPTkKkJk8k2HdQYTRff3.jpeg',NULL,'2020-12-09 08:50:47','2020-12-09 08:50:47'),(41,'ጨጨብሳ','public/uploads/12RKDp3NhYCN4W7GtcDWQxOu1PAUOm38pOPavEws.jpeg',NULL,'2020-12-09 09:05:12','2020-12-09 09:05:12'),(42,'ናና ሻይ','public/uploads/V5oeyYXTJk4USdnAkoocEr0LYh4p9QFQrw9jRiCo.jpeg',NULL,'2020-12-09 10:24:59','2020-12-09 10:24:59'),(43,'እንቁላል ሳንዱች','public/uploads/jOhOPfGEO3JfK0eFWbAL0eGUhUDiapw6fLswmln6.jpeg',NULL,'2020-12-09 10:27:58','2020-12-09 10:27:58'),(44,'ፍርፍር','public/uploads/JxVrCa9kyjXxmwbUkBUO3IWIaaek6jrmMQ3UoU0q.jpeg',NULL,'2020-12-09 10:31:24','2020-12-09 10:31:24'),(45,'ዶናት','public/uploads/Ao38vAoYjT11vngPhXJZrKKkbpRgkwBnlCgOn2ph.jpeg',NULL,'2020-12-09 10:38:56','2020-12-09 10:38:56'),(46,'ፍርፍር','public/uploads/CYAK35lA2s1RiUkZZcbe4rFrMxBiVALXXpILcG0m.jpeg',NULL,'2020-12-15 06:35:28','2020-12-15 06:35:28');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `user_id`, `url`, `created_at`, `updated_at`) VALUES (1,3,'public/profile/269815829.jpg2020-12-17-05-59-24.jpeg','2020-11-22 15:49:56','2020-12-17 17:59:24'),(2,1,'public/profile/images(2).jpg2021-02-10-12-41-10.jpeg','2020-11-22 17:52:55','2021-02-10 12:41:10'),(3,2,'public/profile/pNtiBNiYLHEaFPK3Iu2wwok69L7Jz50dycscfjEM.jpeg','2020-11-28 01:23:21','2020-11-28 01:23:21'),(4,6,'public/profile/cre0QCwy0QICvEmOJSQhiBShnpNd9w7JNbMPJ1kg.jpeg','2020-11-29 08:43:51','2020-11-29 08:43:51'),(5,7,'public/profile/XB8hYe4Y2GkjMl2LVaFY8HYuBkRiMM21qIPlTHci.jpeg','2020-12-01 10:15:26','2020-12-01 10:15:26'),(6,8,'public/profile/8FxVPTucUGEAGiU6ZSQuE7FgWPjQYPWW0l7pzRrZ.jpeg','2020-12-08 10:38:49','2020-12-08 10:38:49'),(7,12,'public/profile/bPAktrY6HLXflX25EYLXaazXgZMxSUPUGxv9clAQ.jpeg','2020-12-13 10:22:29','2020-12-15 06:38:58'),(9,15,'public/profile/11-2.jpg2020-12-17-11-38-09.jpeg','2020-12-17 23:38:09','2020-12-17 23:38:09'),(11,18,'public/profile/OIPKCISM4GW.jpg2020-12-18-04-54-53.jpeg','2020-12-18 16:54:53','2020-12-18 16:54:53'),(12,20,'public/profile/images(18).jpg2021-02-10-12-16-45.jpeg','2021-02-10 12:16:45','2021-02-10 12:16:45');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `real_customers`
--

DROP TABLE IF EXISTS `real_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `real_customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userable_id` bigint(20) unsigned NOT NULL,
  `customer_for` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `real_customers`
--

LOCK TABLES `real_customers` WRITE;
/*!40000 ALTER TABLE `real_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `real_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES (1,1,1,NULL,NULL),(4,2,2,NULL,NULL),(6,3,4,NULL,NULL),(7,3,3,NULL,NULL),(12,6,1,NULL,NULL),(13,6,4,NULL,NULL),(14,1,3,NULL,NULL),(16,7,3,NULL,NULL),(17,7,4,NULL,NULL),(18,8,4,NULL,NULL),(19,8,3,NULL,NULL),(21,9,4,NULL,NULL),(22,9,3,NULL,NULL),(23,10,4,NULL,NULL),(24,10,3,NULL,NULL),(25,11,4,NULL,NULL),(26,11,3,NULL,NULL),(27,12,4,NULL,NULL),(28,12,3,NULL,NULL),(31,14,4,NULL,NULL),(32,15,4,NULL,NULL),(33,15,3,NULL,NULL),(37,18,4,NULL,NULL),(38,18,3,NULL,NULL),(40,2,3,NULL,NULL),(41,19,4,NULL,NULL),(42,20,4,NULL,NULL),(43,20,3,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1,'app_admin','2020-11-22 06:04:41','2020-11-22 06:04:41'),(2,'bloger','2020-11-22 06:04:41','2020-11-22 06:04:41'),(3,'cafe_admin','2020-11-22 06:04:41','2020-11-22 06:04:41'),(4,'user','2020-11-22 06:04:41','2020-11-22 06:04:41');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sensor_datas`
--

DROP TABLE IF EXISTS `sensor_datas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sensor_datas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `device_id` int(10) unsigned NOT NULL,
  `flame` int(10) NOT NULL DEFAULT -1,
  `obstacle` int(10) NOT NULL DEFAULT -1,
  `smoke` int(10) NOT NULL DEFAULT -1,
  `time` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensor_datas`
--

LOCK TABLES `sensor_datas` WRITE;
/*!40000 ALTER TABLE `sensor_datas` DISABLE KEYS */;
INSERT INTO `sensor_datas` (`id`, `device_id`, `flame`, `obstacle`, `smoke`, `time`) VALUES (1,655,56,65,55,'2021-08-01 16:16:03.590275'),(2,76,7,67,65,'2021-08-01 16:17:31.460590'),(3,10001,0,0,0,'2021-08-01 19:01:37.638590'),(4,10001,0,0,0,'2021-08-01 19:01:44.984772'),(5,10001,0,0,0,'2021-08-01 19:01:51.779028'),(6,10001,0,0,0,'2021-08-01 19:02:00.442404'),(7,10001,0,0,0,'2021-08-01 19:02:07.779779'),(8,10001,0,0,0,'2021-08-01 19:02:16.616140'),(9,10001,1,0,1,'2021-08-01 19:03:47.510161'),(10,10001,1,0,1,'2021-08-01 19:06:22.809988'),(11,10001,0,108,1,'2021-08-01 19:15:10.789502'),(12,10001,1,19,1,'2021-08-01 19:16:52.353728'),(13,10001,0,186,1,'2021-08-01 19:18:48.719618');
/*!40000 ALTER TABLE `sensor_datas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting_user`
--

DROP TABLE IF EXISTS `setting_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `setting_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `setting_user_user_id_foreign` (`user_id`),
  KEY `setting_user_setting_id_foreign` (`setting_id`),
  CONSTRAINT `setting_user_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `setting_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting_user`
--

LOCK TABLES `setting_user` WRITE;
/*!40000 ALTER TABLE `setting_user` DISABLE KEYS */;
INSERT INTO `setting_user` (`id`, `user_id`, `setting_id`, `created_at`, `updated_at`) VALUES (1,3,3,NULL,NULL),(2,10,3,NULL,NULL),(4,15,2,NULL,NULL),(5,15,3,NULL,NULL),(7,1,2,NULL,NULL);
/*!40000 ALTER TABLE `setting_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descreption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `descreption`, `created_at`, `updated_at`) VALUES (1,'Strict','ይህ ከበራ በድርጅትዎ ያልተመዘገበ ሰው ምንም ማዘዝ አይችልም','2020-11-22 06:05:57','2020-11-22 06:05:57'),(2,'Flexiblity','ይህ ከበራ ደንበኞች ራሳቸውን መመዝገብ ያስችላል','2020-11-22 06:05:57','2020-11-22 06:05:57'),(3,'Free-trial mode','ይህን አብርተው በነጻ አሰራሩን እና ጥቅሙን ይሞክሩ።','2020-11-22 06:05:57','2020-11-22 06:05:57'),(4,'Auto Bono','ትዕዛዝ በሚመጣ ጊዜ አውቶማቲክ ቦኖ ይቆርጣል።',NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `special_products`
--

DROP TABLE IF EXISTS `special_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_user_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `special_products_user_id_foreign` (`user_id`),
  KEY `special_products_product_user_id_foreign` (`product_user_id`),
  CONSTRAINT `special_products_product_user_id_foreign` FOREIGN KEY (`product_user_id`) REFERENCES `product_user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `special_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_products`
--

LOCK TABLES `special_products` WRITE;
/*!40000 ALTER TABLE `special_products` DISABLE KEYS */;
INSERT INTO `special_products` (`id`, `product_user_id`, `user_id`, `created_at`, `updated_at`) VALUES (8,33,3,'2020-11-28 10:36:50','2020-11-28 10:36:50'),(10,36,3,'2020-11-28 10:51:32','2020-11-28 10:51:32'),(11,32,3,'2020-11-28 10:51:42','2020-11-28 10:51:42'),(12,35,3,'2020-11-30 14:07:17','2020-11-30 14:07:17'),(13,48,3,'2020-12-03 04:33:01','2020-12-03 04:33:01'),(14,45,3,'2020-12-03 04:33:25','2020-12-03 04:33:25'),(15,46,3,'2020-12-03 04:33:41','2020-12-03 04:33:41'),(16,62,8,'2020-12-08 10:35:41','2020-12-08 10:35:41'),(17,74,7,'2020-12-09 09:07:40','2020-12-09 09:07:40'),(18,69,7,'2020-12-09 09:07:51','2020-12-09 09:07:51'),(19,75,7,'2020-12-09 09:08:20','2020-12-09 09:08:20'),(20,67,7,'2020-12-09 09:08:50','2020-12-09 09:08:50'),(21,72,7,'2020-12-09 10:47:22','2020-12-09 10:47:22'),(22,58,3,'2020-12-13 09:07:33','2020-12-13 09:07:33'),(23,64,1,'2020-12-15 06:16:34','2020-12-15 06:16:34'),(26,98,18,'2020-12-18 17:08:32','2020-12-18 17:08:32'),(27,102,18,'2020-12-18 17:11:50','2020-12-18 17:11:50'),(28,100,18,'2020-12-18 18:25:42','2020-12-18 18:25:42'),(29,104,18,'2020-12-18 18:26:02','2020-12-18 18:26:02'),(30,101,18,'2020-12-18 18:26:19','2020-12-18 18:26:19'),(31,109,3,'2020-12-19 16:45:21','2020-12-19 16:45:21'),(32,41,1,'2021-01-01 14:01:55','2021-01-01 14:01:55'),(33,40,1,'2021-02-15 22:12:18','2021-02-15 22:12:18');
/*!40000 ALTER TABLE `special_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `special_users`
--

DROP TABLE IF EXISTS `special_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `special_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userable_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `special_users`
--

LOCK TABLES `special_users` WRITE;
/*!40000 ALTER TABLE `special_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `special_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES (1,'ትኩስ ነገር','2020-11-22 06:04:43','2020-11-22 06:04:43'),(2,'ቁርስ','2020-11-22 06:04:43','2020-11-22 06:04:43'),(3,'ምሳ','2020-11-22 06:04:43','2020-11-22 06:04:43'),(4,'እራት','2020-11-22 06:04:43','2020-11-22 06:04:43'),(5,'ለስላሳና ውሃ','2020-11-22 06:04:43','2020-11-22 06:04:43'),(6,'አትክልት','2020-11-22 06:04:43','2020-11-22 06:04:43'),(7,'ማቆያ','2020-11-22 06:04:43','2020-11-22 06:04:43'),(8,'ለጅማሮ','2020-11-22 06:04:43','2020-11-22 06:04:43'),(9,'ሌላ','2020-11-22 06:04:43','2020-11-22 06:04:43');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Fname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_place` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `Fname`, `Lname`, `work_place`, `telephone`, `org`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'App','Admin','መርካቶ ኑስራ ህንፃ 3ኛ ፎቅ','0954325423','ማራኪ ምግብ ቤት Maraki Restaurant','admin@admin.com',NULL,'$2y$10$U56SA5qRSWECzOGLUT9Xq.pISLWydh80PDJyP4yB.Czx5T5o.1Jw6','I1sOvO6T59EAd7WYgpifsNx9VCF0YRKOFDB8gD50ZEgZ1ghGk4uEtiIO2N5O','2020-11-22 06:04:42','2021-02-10 12:44:27'),(2,'Bloger','Bloger','Atena tera','0954325424','ate','blog@cafe.com',NULL,'$2y$10$Ch1maBKuhJoHnifgrPuFJeqgZd0y1H2EqP4aRCfxOeV.njOpuDFVu',NULL,'2020-11-22 06:04:42','2020-11-28 01:23:21'),(3,'Cafe','Admin','ቦሌ ከሚሊኒየም አዳራሽ 50ሜ ገባ ብሎ','0954325424','ማሳያ/Sample cafe and restaurant','cafe@cafe.com',NULL,'$2y$10$qrICwUbGOsSfmq/vXnrfVOv4LAhrLFrXJqtNZiRsaBMg5D5gPljHK','VrIUPMAtEiuY1czpW4ZUOUCRiALosg4uXkjuaz1DDRxKlC6By7I6Wj1xd2UX','2020-11-22 06:04:42','2020-12-18 15:34:10'),(6,'Nesru','Sadik','Bole','0939676714','web development','nesrusadik0@gmail.com',NULL,'$2y$10$0U6MoBI43Tf9A7FvacmSgeIt71Rz.v5xYVlPifhGuTynv0uyTn9w2','v7p7wbwYi7rJl7cXFNLYnP2P0IV3HSrG0ttM0inAqsNJZ2m54UIpwj20QiNX','2020-11-29 08:37:42','2021-09-27 19:46:44'),(7,'Usman','Mr coffee','ቤተል ፋሚሊ ታወር-ህንፃ 4ኛ ፎቅ','0911694389','Mr. Coffee plus','mrcoffee@warka.com',NULL,'$2y$10$ubmiKRO9kRUM6.BoBRc4bOc9WN1jpU2dD.rheQ.Qx7CkaCFX6cAIq',NULL,'2020-12-01 10:00:38','2020-12-01 10:00:38'),(8,'Esmael','munteka','betele','0967170569','Esam cafe and restorant','esamalwinz@gmail.com',NULL,'$2y$10$ubmiKRO9kRUM6.BoBRc4bOc9WN1jpU2dD.rheQ.Qx7CkaCFX6cAIq',NULL,'2020-12-01 17:58:28','2020-12-08 10:38:49'),(9,'Esmael','Munteka','ቤተል/Betele','0967170569','Esam tube','esamalwinz1@gmail.com',NULL,'$2y$10$ubmiKRO9kRUM6.BoBRc4bOc9WN1jpU2dD.rheQ.Qx7CkaCFX6cAIq',NULL,'2020-12-02 17:09:10','2020-12-02 17:09:10'),(10,'Hayat','Hayat','Adama','09686665','Mmmmm','hayat@gmail.com',NULL,'$2y$10$3s3360dY8RZLpRJagxY6P.nKRL6/vHmj79PRx0u1t/qmDieXYqFuC',NULL,'2020-12-02 19:53:02','2020-12-02 19:53:02'),(11,'hayat','shukure','0960972946','0960972949','Zebib','shukurehayat@gmail.com',NULL,'$2y$10$B1iosNw5ZhVkpy5ZLoylq.k0byjEaAVgV6nhraoxdM/jUp.pC29Ha',NULL,'2020-12-05 13:45:54','2020-12-05 13:45:54'),(12,'nuur','Nuur','ቦሌ   ከስካካይ ልይት  50  ሜትር ገባ ንሎ','0946357743','JEO Frame Cafe And Restaurant','jeo@warka.com',NULL,'$2y$10$rWLuatlxO7meAirTFGKiCuBV5teu0IxkOsu2gIdajNEozYjgdw1KW',NULL,'2020-12-13 10:07:43','2020-12-13 10:39:16'),(14,'malcolm','malcolm','sheger','0988155377','global hotel','bahirudendir@gmail.com',NULL,'$2y$10$hy2AHFa3AEFVnZhi1TWAJu0BfACM2RVefKTpZMAbxeMaLvgbyDeWu',NULL,'2020-12-17 11:49:49','2020-12-17 11:49:49'),(15,'Neim','Neim','bole mikael','0956666667','Macafe burger','macafe@gmail.com',NULL,'$2y$10$uEJhluc.XKyJvVcRULi1t.4CJ1w7/oxqL.EBE33WJ5ORFD05d5GdG',NULL,'2020-12-17 23:33:40','2020-12-17 23:33:40'),(18,'Zeki','Zeki','ቤተል ከአደባብዩ 30ሜ ከፍ ብሎ','0911700633','ቼምባ ፒዛና በርገር/Chemba','zeki@gmail.com',NULL,'$2y$10$S4VGYbhel6YlXJS/rHDfOeh2ZPUWWX8hxujjv7b.4BkVrfQazAhvW',NULL,'2020-12-18 16:49:06','2020-12-18 16:49:06'),(19,'New','User','New building','097665443','New user','new@gmail.com',NULL,'$2y$10$YEc/VAHrIh9KovzWqcXdgOJLWJBYzOxUj4Lhfuo64LdkdcYcfXxNW',NULL,'2021-01-09 16:03:56','2021-01-09 16:03:56'),(20,'Marta','Amha','Bole X-Tower 3rd floor','0911700637','Marta cafe and restourant','marta@gmail.com',NULL,'$2y$10$hLf0zdZc62JJFEc/39NeteXtKBfy3GQQIFJiRx3y1nhuuMqRyDoim',NULL,'2021-02-10 11:01:31','2021-02-10 12:14:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'warkaordercom_cafeteria2'
--

--
-- Dumping routines for database 'warkaordercom_cafeteria2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-21  6:56:24
