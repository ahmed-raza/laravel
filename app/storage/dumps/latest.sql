-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `audio`
--

DROP TABLE IF EXISTS `audio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orig_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audio`
--

LOCK TABLES `audio` WRITE;
/*!40000 ALTER TABLE `audio` DISABLE KEYS */;
INSERT INTO `audio` VALUES (1,2,'2_D-12_-_Shit_On_You.mp3','D-12 - Shit On You.mp3','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,2,'2_Eminem_-_6_In_The_Morning_(feat._D12).mp3','Eminem - 6 In The Morning (feat. D12).mp3','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `audio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Ahmed Raza','Vivamus congue porta felis eu dignissim. Nulla sed ornare ligula! Cras vel purus tincidunt, fringilla mi a, scelerisque dolor. Maecenas eu rutrum enim. Phasellus volutpat laoreet augue, nec sagittis est cursus ac. Morbi suscipit nisl in ligula porttitor accumsan. Sed luctus ex nec est dapibus condimentum? Nunc sem ex, facilisis porta consequat a, vehicula id justo. Aliquam posuere orci a magna iaculis; efficitur sodales odio lobortis. Praesent non diam tincidunt, elementum urna facilisis nullam.\r\n','Tue-01-2015 12:50:39 PM','');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `img_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (7,1,'1_342854,xcitefun-lamborghini-huracan-lp610-4-3.jpg','2015-01-08 02:29:13','2015-01-08 02:29:13'),(8,1,'1_342855,xcitefun-lamborghini-huracan-lp610-4-2.jpg','2015-01-08 02:46:29','2015-01-08 02:46:29'),(9,1,'1_342856,xcitefun-lamborghini-huracan-lp610-4-1.jpg','2015-01-08 02:53:37','2015-01-08 02:53:37'),(10,2,'2_further_afield_slider_logo.png','2015-01-08 03:18:50','2015-01-08 03:18:50'),(11,1,'1_Broken_Windows7.jpg','2015-01-27 01:50:29','2015-01-27 01:50:29'),(12,2,'2_10382311_10152582290058987_6674870770089566874_o.jpg','2015-01-27 02:22:07','2015-01-27 02:22:07');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_09_19_072623_create_users_table',1),('2014_09_23_044730_create_authors_table',1),('2015_01_07_052936_create_posts_table',2),('2015_01_08_063507_create_gallery_table',3),('2015_01_28_105134_create_audio_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `m_keyw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (6,'Main Slider','<p>This is just an example post of this laravel blog.</p>','','first post','main-slider',1,'2015-01-07 04:31:36','2015-01-07 04:31:36'),(8,'Example Post','<p>Heheheheeheheh hahahahaha</p><ol><li><strong><em>Yolo</em></strong></li><li><strong><em>Swag</em></strong></li></ol><ul><li><strong><em>Hahaha</em></strong></li></ul>','','','example-post',1,'2015-01-07 05:56:11','2015-01-07 05:56:11'),(9,'Maecenas mollis ipsum amet.','<p>Nunc interdum lacus sit amet orci. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Curabitur vestibulum aliquam leo. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Fusce neque.</p><p>Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Nunc nulla. Phasellus tempus. Ut id nisl quis enim dignissim sagittis. Curabitur at lacus ac velit ornare lobortis.</p><p>Quisque rutrum. Vivamus elementum semper nisi. Suspendisse feugiat. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Fusce fermentum.</p>','','Praesent iaculis purus sed.','maecenas-mollis-ipsum-amet',1,'2015-01-07 07:34:35','2015-01-07 07:34:35'),(10,'Duis vestibulum auctor sed.','<p>Nunc interdum lacus sit amet orci. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Curabitur vestibulum aliquam leo. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Fusce neque.</p><p>Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Nunc nulla. Phasellus tempus. Ut id nisl quis enim dignissim sagittis. Curabitur at lacus ac velit ornare lobortis.</p><p>Quisque rutrum. Vivamus elementum semper nisi. Suspendisse feugiat. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Fusce fermentum.</p>','','Vestibulum orci ex; nullam.','duis-vestibulum-auctor-sed',1,'2015-01-07 07:34:55','2015-01-07 07:34:55'),(11,'In hac habitasse cras amet.','<p>Nunc interdum lacus sit amet orci. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Curabitur vestibulum aliquam leo. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Fusce neque.</p><p>Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Nunc nulla. Phasellus tempus. Ut id nisl quis enim dignissim sagittis. Curabitur at lacus ac velit ornare lobortis.</p><p>Quisque rutrum. Vivamus elementum semper nisi. Suspendisse feugiat. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Fusce fermentum.</p>','','','in-hac-habitasse-cras-amet',1,'2015-01-07 07:35:02','2015-01-07 07:35:02'),(12,'Vestibulum ante ipsum amet.','<p>Nunc interdum lacus sit amet orci. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Curabitur vestibulum aliquam leo. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Fusce neque.</p><p>Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Nunc nulla. Phasellus tempus. Ut id nisl quis enim dignissim sagittis. Curabitur at lacus ac velit ornare lobortis.</p><p>Quisque rutrum. Vivamus elementum semper nisi. Suspendisse feugiat. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Fusce fermentum.</p>','','','vestibulum-ante-ipsum-amet',1,'2015-01-07 07:35:09','2015-01-07 07:35:09'),(13,'Quisque ut arcu in ex amet.','<p>Nunc interdum lacus sit amet orci. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Curabitur vestibulum aliquam leo. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Fusce neque.</p><p>Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Nunc nulla. Phasellus tempus. Ut id nisl quis enim dignissim sagittis. Curabitur at lacus ac velit ornare lobortis.</p><p>Quisque rutrum. Vivamus elementum semper nisi. Suspendisse feugiat. In dui magna, posuere eget, vestibulum et, tempor auctor, justo. Fusce fermentum.</p>','','','quisque-ut-arcu-in-ex-amet',1,'2015-01-07 07:35:16','2015-01-07 07:35:16');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_rank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','sadmin','ahmed.raza@square63.com','03244256607','Lahore','-1','Maecenas vestibulum eros sit amet eros pellentesque euismod? Integer sit amet ante sit amet nulla euismod bibendum. Nunc condimentum dignissim nunc vel consequat. Sed vitae condimentum odio; et hendrerit neque. Suspendisse et tempor risus. Cras eu sem in lacus luctus cursus consequat sit amet massa. Nam hendrerit venenatis nunc sed suscipit. Morbi auctor tempor diam ultricies viverra. Donec sagittis lectus eu malesuada mattis. Quisque libero elit, sagittis venenatis justo at, dignissim volutpat.\r\n','$2y$10$.wlZ7LZ4JAPHbsPLNevrvebhOG8Kit8FmYMKxxMYMGTU56C.SS50q','0000-00-00 00:00:00','2015-01-27 03:52:33','i9LogazEsdHK8Pvzp96hzSWJ8FhKz0cE9HPKgcbMTk9YkfLxNrwe6wvLPrNo'),(2,'Raza','user','raza1778@gmail.com','+92323456789','Lahore','-1','Vivamus euismod mauris. Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi. Vivamus quis mi. Mauris sollicitudin fermentum libero. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus.','$2y$10$DXNbJR8sK.aNEGY9EJAcy.JaMcuKDTZsS6V7U7W7oZf4Cm.CpH.BW','0000-00-00 00:00:00','2015-01-26 23:27:16','Wxr3JMo3Mtq0RMHoAbLwAEKRXgICrUzVWzbTsuXp1DT3bt9tbJByKAbzKZhf');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-28 16:42:11
