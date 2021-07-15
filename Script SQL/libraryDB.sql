-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 03:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryDb`
--
CREATE DATABASE libraryDb character set UTF8 collate utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1-male 2-female',
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci DEFAULT 'avatar.jpg',
  `role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-khachhang 2-admin \r\n3-superadmin',
  `active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-hoatdong 2-khoa',
  `dept` float NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `fullname`, `email`, `password`, `gender`, `address`, `birthday`, `phone`, `image`, `role`, `active`, `dept`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Sang(admin)', 'sangtrancong171196@gmail.com', '$2y$10$lKqcn14X3MQynWsNUITened4Fd0qbghnrYPEBFyrsI4xP5RKBPvVK', 1, '70 BHTQ, Vo Thi Sau, Q3', '1996-11-17', '0946963045', '60e99420b63casang.jpg', 3, 1, 0, '2021-06-10 04:10:27', '2021-06-28 02:43:30', NULL),
(2, 'Sang Tran Cong', 'trancongsang.a1.vd.2014@gmail.com', '$2y$10$K0TNfgCAu5HGcsBGZkpTqOoPaOqSIRYiOjTGMjwkNIq4TzB7N7RUC', 1, '781 Au Co, Tan Thanh, Tan Phu, HCM', '1996-11-17', '0946963045', '60e99420b63casang.jpg', 1, 1, 0, '2021-06-25 03:58:32', '2021-07-10 12:35:44', NULL),
(3, 'Tran Cong Sang', 'trancongsang.demo@gmail.com', '$2y$10$GPImBOvkmyc97cmEYsrI5OXNywAQ9SB03z7V0DN9H5qsxr6bypYEG', 1, '09 Truong Cong Dinh, Tan Binh', '1993-12-07', '0915234526', '60e99bc958135sang1.jpg', 1, 2, 0, '2021-07-10 13:06:12', '2021-07-10 13:26:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `isbn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `no_Pages` smallint(6) DEFAULT NULL,
  `no_Copies_Actual` int(11) NOT NULL,
  `no_Copies_Current` int(11) NOT NULL,
  `category_Id` int(11) NOT NULL,
  `publication_Year` int(11) NOT NULL,
  `publisher` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalstar` int(11) NOT NULL DEFAULT 0,
  `totalreview` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`isbn`, `title`, `author`, `no_Pages`, `no_Copies_Actual`, `no_Copies_Current`, `category_Id`, `publication_Year`, `publisher`, `price`, `image`, `content`, `position`, `created_at`, `updated_at`) VALUES
('9780060883287', 'One Hundred Years of Solitude (P.S.) (Modern Classics)', 'Gabriel Garcia Marquez', 448, 200, 200, 8, 2006, 'Harper Perennial Modern Classics', 10.09, 'books/one_hundred.jpg', '<p style=\"margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><strong>\"<em>One Hundred Years of Solitude</em>&nbsp;is the first piece of literature since the Book of Genesis that should be required reading for the entire human race. . . . Mr. Garcia Marquez has done nothing less than to create in the reader a sense of all that is profound, meaningful, and meaningless in life.\" —William Kennedy,&nbsp;<em>New York Times Book</em>&nbsp;Review&nbsp;</strong></p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">One of the most influential literary works of our time,&nbsp;<em>One Hundred Years of Solitude</em>&nbsp;remains a dazzling and original achievement by the masterful Gabriel Garcia Marquez, winner of the Nobel Prize in Literature.</p><p style=\"margin-top: -4px; margin-bottom: 0px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><em>One Hundred Years of Solitude</em>&nbsp;tells the story of the rise and fall, birth and death of the mythical town of Macondo through the history of the Buendiá&nbsp;family. Inventive, amusing, magnetic, sad and alive with unforgettable men and women—brimming with truth, compassion, and a lyrical magic that strikes the soul—this novel is a masterpiece in the art of fiction.</p>', 'B', '2021-06-18 08:39:57', '2021-07-08 09:05:09'),
('9780060935467', 'To Kill a Mockingbird', 'Harper Lee', 336, 25, 25, 1, 2002, 'Harper Perennial', 15.99, 'books/to_kill_mockingbird.jpg', '<p style=\"margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><strong>Voted America\'s Best-Loved Novel in PBS\'s&nbsp;<em>The Great American Read</em></strong></p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><strong>Harper Lee\'s Pulitzer Prize-winning masterwork of honor and injustice in the deep South—and the heroism of one man in the face of blind and violent hatred</strong></p><p style=\"margin-top: -4px; margin-bottom: 0px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">One of the&nbsp;most cherished&nbsp;stories of all time,&nbsp;<em>To Kill a Mockingbird</em>&nbsp;has been translated into more than forty languages, sold more than forty million copies worldwide, served as the basis for an enormously popular motion picture, and was voted one of the best novels of the twentieth century by librarians across the country. A gripping, heart-wrenching, and wholly remarkable tale of coming-of-age in a South poisoned by virulent prejudice, it views a world of great beauty and savage inequities through the eyes of a young girl, as her father—a crusading local lawyer—risks everything to defend a black man unjustly accused of a terrible crime.</p>', 'A', '2021-06-18 08:03:54', '2021-06-18 08:03:54'),
('9780062259660', 'Bird Box: A Novel', 'Malerman, Josh', 125, 60, 60, 9, 2015, 'Ecco', 6.99, 'books/birth_box.jpg', '<p style=\"margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><strong>Now a Netflix film starring Sandra Bullock, Trevante Rhodes, John Malkovich, Sarah Paulson, and Rosa Salazar!</strong><br></p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Written with the narrative tension of&nbsp;<em>The Road</em>&nbsp;and the exquisite terror of classic Stephen King,&nbsp;<em>Bird Box</em>&nbsp;is a propulsive, edge-of-your-seat horror thriller, set in an apocalyptic near-future world—a masterpiece of suspense from the brilliantly imaginative Josh Malerman.</p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><em>Something is out there . . .</em></p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Something terrifying that must not be seen. One glimpse and a person is driven to deadly violence. No one knows what it is or where it came from.</p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Five years after it began, a handful of scattered survivors remain, including Malorie and her two young children. Living in an abandoned house near the river, she has dreamed of fleeing to a place where they might be safe. Now, that the boy and girl are four, it is time to go. But the journey ahead will be terrifying: twenty miles downriver in a rowboat—blindfolded—with nothing to rely on but her wits and the children’s trained ears. One wrong choice and they will die. And something is following them. But is it man, animal, or monster?</p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Engulfed in darkness, surrounded by sounds both familiar and frightening, Malorie embarks on a harrowing odyssey—a trip that takes her into an unseen world and back into the past, to the companions who once saved her. Under the guidance of the stalwart Tom, a motely group of strangers banded together against the unseen terror, creating order from the chaos. But when supplies ran low, they were forced to venture outside—and confront the ultimate question: in a world gone mad, who can really be trusted?</p><p style=\"margin-top: -4px; margin-bottom: 0px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Interweaving past and present, Josh Malerman’s breathtaking debut is a horrific and gripping snapshot of a world unraveled that will have you racing to the final page.</p>', 'C', '2021-06-18 08:50:15', '2021-07-10 03:29:44'),
('9780062976581', 'The Boy, the Mole, the Fox and the Horse', 'Charlie Mackesy; Margery Williams', 128, 75, 75, 7, 2020, 'Ebury Press / Egmont', 14.03, 'books/the_boy.jpg', '<p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><strong>“</strong><em><strong>The Boy, the Mole, the Fox and the Horse</strong></em><strong>&nbsp;is not only a thought-provoking, discussion-worthy story, the book itself is an object of art.”- Elizabeth Egan,&nbsp;</strong><em><strong>The New York Times</strong></em></p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">From British illustrator, artist, and author Charlie Mackesy comes a journey for all ages that explores life’s universal lessons, featuring 100 color and black-and-white drawings.<br><br><em>“What do you want to be when you grow up?” asked the mole.</em></p><p style=\"margin-top: -4px; margin-bottom: 14px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><em>“Kind,” said the boy.</em></p><p style=\"margin-top: -4px; margin-bottom: 0px; padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Charlie Mackesy offers inspiration and hope in uncertain times in this beautiful book,&nbsp;following the tale of a curious boy, a greedy mole, a wary fox and a wise horse who find themselves together in sometimes difficult terrain, sharing their greatest fears and biggest discoveries about vulnerability, kindness, hope, friendship and love. The shared adventures and important conversations between the four friends are full of life lessons that have connected with readers of all ages.&nbsp;</p>', 'B', '2021-06-18 08:34:04', '2021-07-08 08:55:16'),
('9780143039983', 'The Haunting of Hill House (Penguin Classics)', 'Jackson, Shirley', 182, 40, 40, 9, 2006, 'Penguin Classics', 7.54, 'books/house.jpg', '<b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The greatest haunted house story ever written, the inspiration for a 10-part Netflix series directed by Mike Flanagan and starring Michiel Huisman, Carla Gugino, and Timothy Hutton</b><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">First published in 1959, Shirley Jackson\'s&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The Haunting of Hill House</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;has been hailed as a perfect work of unnerving terror. It is the story of four seekers who arrive at a notoriously unfriendly pile called Hill House: Dr. Montague, an occult scholar looking for solid evidence of a \"haunting\"; Theodora, his lighthearted assistant; Eleanor, a friendless, fragile young woman well acquainted with poltergeists; and Luke, the future heir of Hill House. At first, their stay seems destined to be merely a spooky encounter with inexplicable phenomena. But Hill House is gathering its powers—and soon it will choose one of them to make its own.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">For more than seventy years, Penguin has been the leading publisher of classic literature in the English-speaking world. With more than 1,700&nbsp;titles, Penguin Classics represents a global bookshelf of the best works throughout history and across genres and disciplines. Readers trust the&nbsp;series to provide authoritative texts enhanced by introductions and notes by distinguished scholars and contemporary authors, as well as up-to-date&nbsp;translations by award-winning translators.</span>', 'C', '2021-06-18 08:47:10', '2021-06-18 08:47:10'),
('9780156027328', 'Life of Pi', 'Martel, Yann', 326, 30, 30, 6, 2003, 'Mariner Books', 14.36, 'books/life_of_pi.jpg', '<span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The son of a zookeeper, Pi Patel has an encyclopedic knowledge of animal behavior and a fervent love of stories. When Pi is sixteen, his family emigrates from India to North America aboard a Japanese cargo ship, along with their zoo animals bound for new homes.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The ship sinks. Pi finds himself alone in a lifeboat, his only companions a hyena, an orangutan, a wounded zebra, and Richard Parker, a 450-pound Bengal tiger. Soon the tiger has dispatched all but Pi, whose fear, knowledge, and cunning allow him to coexist with Richard Parker for 227 days while lost at sea. When they finally reach the coast of Mexico, Richard Parker flees to the jungle, never to be seen again. The Japanese authorities who interrogate Pi refuse to believe his story and press him to tell them \"the truth.\" After hours of coercion, Pi tells a second story, a story much less fantastical, much more conventional--but is it more true?</span>', 'A', '2021-06-18 07:57:54', '2021-06-18 07:57:54'),
('9780307743664', 'Carrie', 'King, Stephen', 304, 100, 100, 9, 2011, 'Anchor', 2.4, 'books/carrie.jpg', '<span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Stephen King\'s legendary debut, about a teenage outcast and the revenge she enacts on her classmates.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Carrie White may be picked on by her classmates, but she has a gift. She can move things with her mind. Doors lock. Candles fall. This is her power and her problem. Then, an act of kindness, as spontaneous as the vicious taunts of her classmates, offers Carrie a chance to be a normal...until an unexpected cruelty turns her gift into a weapon of horror and destruction that no one will ever forget.</span>', 'C', '2021-06-18 08:45:09', '2021-06-18 08:45:09'),
('9780316489270', 'Little Women: 150th Anniversary Edition', 'Alcott, Louisa May', 528, 60, 60, 1, 2018, 'Little, Brown and Company', 12.74, 'books/little_women.jpg', '<b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The beautiful 150th anniversary edition of Louisa May Alcott\'s classic tale of the four March sisters, featuring new illustrations and an introduction by&nbsp;<i>New York Times</i>&nbsp;bestselling author J. Courtney Sullivan<br><br></b><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">For generations, children around the world have come of age with Louisa May Alcott\'s March girls: hardworking eldest sister Meg, headstrong, impulsive Jo, timid Beth, and precocious Amy. With their father away at war, and their loving mother Marmee working to support the family, the four sisters have to rely on one another for support as they endure the hardships of wartime and poverty. We witness the sisters growing up and figuring out what role each wants to play in the world, and, along the way, join them on countless unforgettable adventures.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Readers young and old will fall in love with this beloved classic, at once a lively portrait of nineteenth-century family life and a feminist novel about young women defying society\'s expectations.</span>', 'B', '2021-06-18 08:07:41', '2021-06-18 08:07:41'),
('9780425232200', 'The Help', 'Stockett, Kathryn', 544, 50, 50, 8, 2011, 'Berkley', 11.97, 'books/the_help.jpg', '<b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The #1&nbsp;<i>New York Times&nbsp;</i>bestselling novel and basis for the Academy Award-winning film—a timeless and universal story about the lines we abide by, and the ones we don’t—n<b>ominated as one of America’s best-loved novels by PBS’s&nbsp;<i>The Great American Read</i>.<br><br></b></b><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Aibileen is a black maid in 1962 Jackson, Mississippi, who’s always taken orders quietly, but lately she’s unable to hold her bitterness back. Her friend Minny has never held her tongue but now must somehow keep secrets about her employer that leave her speechless. White socialite Skeeter just graduated college. She’s full of ambition, but without a husband, she’s considered a failure.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Together, these seemingly different women join together to write a tell-all book about work as a black maid in the South, that could forever alter their destinies and the life of a small town...</span>', 'B', '2021-06-18 08:36:48', '2021-07-08 09:12:22'),
('9780525562627', 'The Testaments: The Sequel to The Handmaid\'s Tale', 'Atwood, Margaret', 448, 25, 25, 10, 2020, 'Anchor', 11.99, 'books/the_testaments.jpg', '<b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><i>The Testaments</i>&nbsp;is a modern masterpiece, a powerful novel that can be read on its own or as a companion to Margaret Atwood’s classic,&nbsp;<i>The Handmaid’s Tale</i>.</b><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">More than fifteen years after the events of&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The Handmaid\'s Tale,</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;the theocratic regime of the Republic of Gilead maintains its grip on power, but there are signs it is beginning to rot from within. At this crucial moment, the lives of three radically different women converge, with potentially explosive results.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Two have grown up as part of the first generation to come of age in the new order. The testimonies of these two young women are joined by a third: Aunt Lydia.&nbsp; Her complex past and uncertain future unfold in surprising and pivotal ways.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">With&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The Testaments,</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;Margaret Atwood opens up the innermost workings of Gilead, as each woman is forced to come to terms with who she is, and how far she will go for what she believes.</span>', 'D', '2021-06-18 08:52:26', '2021-06-18 08:52:26'),
('9780679781585', 'Memoirs of a Geisha: A Novel', 'Golden, Arthur', 227, 25, 25, 8, 1999, 'Vintage', 9.81, 'books/memoirs_geisha.jpg', '<b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">A literary sensation and runaway bestseller, this brilliant debut novel tells with seamless authenticity and exquisite lyricism the true confessions of one of Japan\'s most celebrated geisha.</b><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Nominated as one of America’s best-loved novels by PBS’s&nbsp;<i>The Great American Read</i></b><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Speaking to us with the wisdom of age and in a voice at once haunting and startlingly immediate, Nitta Sayuri tells the story of her life as a geisha. It begins in a poor fishing village in 1929, when, as a nine-year-old girl with unusual blue-gray eyes, she is taken from her home and sold into slavery to a renowned geisha house. We witness her transformation as she learns the rigorous arts of the geisha: dance and music; wearing kimono, elaborate makeup, and hair; pouring sake to reveal just a touch of inner wrist; competing with a jealous rival for men\'s solicitude and the money that goes with it.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">In&nbsp;</span><b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Memoirs of a Geisha</b><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">, we enter a world where appearances are paramount; where a girl\'s virginity is auctioned to the highest bidder; where women are trained to beguile the most powerful men; and where love is scorned as illusion. It is a unique and triumphant work of fiction—at once romantic, erotic, suspenseful—and completely unforgettable.</span>', 'B', '2021-06-18 08:43:15', '2021-07-08 12:45:03'),
('9781400033416', 'Beloved', 'Toni Morrison', 321, 100, 100, 1, 2004, 'Vintage', 5.35, 'books/beloved.jpg', '<b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Staring unflinchingly into the abyss of slavery, this spellbinding&nbsp;<b><i>New York Times&nbsp;</i>bestseller</b>&nbsp;transforms history into a story as powerful as Exodus and as intimate as a lullaby.</b><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Sethe, its protagonist, was born a slave and escaped to Ohio, but eighteen years later she is still not free. She has too many memories of Sweet Home, the beautiful farm where so many hideous things happened. And Sethe’s new home is haunted by the ghost of her baby, who died nameless and whose tombstone is engraved with a single word: Beloved. Filled with bitter poetry and suspense as taut as a rope,&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Beloved&nbsp;</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">is a towering achievement.</span>', 'B', '2021-06-18 08:10:24', '2021-06-18 08:10:24'),
('9781512395822', 'The Call of the Wild (Gold Classics)', 'London, Jack', 55, 50, 50, 6, 2020, 'CreateSpace Independent Publishing Platform', 5.99, 'books/the_call_of_the_wild.jpg', '<span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The Call of the Wild is a novel by Jack London published in 1903. The story is set in the Yukon during the 1890s Klondike Gold Rush—a period in which strong sled dogs were in high demand. The novel\'s central character is a dog named Buck, a domesticated dog living at a ranch in the Santa Clara Valley of California as the story opens. Stolen from his home and sold into service as sled dog in Alaska, he reverts to a wild state. Buck is forced to fight in order to dominate other dogs in a harsh climate. Eventually he sheds the veneer of civilization, relying on primordial instincts and learned experience to emerge as a leader in the wild.London lived for most of a year in the Yukon collecting material for the book. The story was serialized in the Saturday Evening Post in the summer of 1903; a month later it was released in book form. The novel’s great popularity and success made a reputation for London. Much of its appeal derives from the simplicity of this tale of survival. As early as 1908 the story was adapted to film and it has since seen several more cinematic adaptations.</span>', 'A', '2021-06-18 08:00:14', '2021-06-18 08:00:14'),
('9781688034563', 'The Three Musketeers', 'Dumas, Alexandre', 466, 100, 100, 6, 2019, 'Independently published', 14.99, 'books/the_three_musketeers.jpg', '<span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The Three Musketeers is a novel by Alexandre Dumas. Set in the 17th century, it recounts the adventures of a young man named d\'Artagnan after he leaves home to travel to Paris, to join the Musketeers of the Guard. D\'Artagnan is not one of the musketeers of the title; those being his friends Athos, Porthos and Aramis, inseparable friends who live by the motto \"all for one, one for all\", a motto which is first put forth by d\'Artagnan. In genre, The Three Musketeers is primarily a historical novel and adventure. However Dumas also frequently works into the plot various injustices, abuses and absurdities of the ancien regime, giving the novel an additional political aspect at a time when the debate in France between republicans and monarchists was still fierce. The story was first serialized from March to July 1844, during the July monarchy, four years before the French Revolution of 1848 violently established the second Republic. The author\'s father, Thomas-Alexandre Dumas had been a well-known general in France\'s Republican army during the French revolutionary wars. Although adaptations tend to portray d\'Artagnan and the three musketeers as heroes, the novel portrays less appealing characters, who are willing to commit violence over slight insults and through unquestioning loyalty to the king and queen, and treat their servants and supposed social inferiors with contempt and violence.</span>', 'C', '2021-06-18 01:38:26', '2021-06-18 01:38:26'),
('9781779501127', 'Watchmen (2019 Edition)', 'Moore, Alan', NULL, 75, 75, 7, 2019, 'DC Comics', 7.38, 'books/watchmen.jpg', '<b style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">A hit HBO original series,&nbsp;<i>Watchmen</i>, the groundbreaking series from award-winning author Alan Moore, presents a world where the mere presence of American superheroes changed history--the U.S. won the Vietnam War, Nixon is still president, and the Cold War is in full effect.</b><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Considered the greatest graphic novel in the history of the medium, the Hugo Award-winning story chronicles the fall from grace of a group of superheroes plagued by all-too-human failings. Along the way, the concept of the superhero is dissected as an unknown assassin stalks the erstwhile heroes.</span><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><br style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\"><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">This edition of&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Watchmen</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">, the groundbreaking series from Alan Moore, the award-winning author of&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">V For Vendetta</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;and&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Batman: The Killing Joke</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">, features art from industry legend Dave Gibbons, with high-quality, recolored pages found in&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Watchmen: Absolute Edition</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">.</span>', 'B', '2021-06-18 08:12:48', '2021-06-18 08:13:50'),
('9788888435541', 'Compendium. The walking dead vol. 1', 'A Toscani', 208, 150, 150, 7, 2012, 'SaldaPress', 7.22, 'books/walking_dead.jpg', '<span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Introducing the first eight volumes of the fan-favorite, New York Times Best Seller series collected into one massive paperback collection! Collects The Walking Dead #1-48. This is the perfect collection for any fan of the Emmy Award-winning television series on AMC: over one thousand pages chronicling the beginning of Robert Kirkman\'s Eisner Award-winning continuing story of survival horror- from Rick Grimes\' waking up alone in a hospital, to him and his family seeking solace on Hershel\'s farm, and the controversial introduction of Woodbury despot: The Governor. In a world ruled by the dead, we are finally forced to finally start living.</span>', 'B', '2021-06-18 08:31:48', '2021-06-18 08:31:48'),
('9789124119751', 'The Hunger Games Trilogy', 'SUZANNE COLLINS', NULL, 35, 35, 10, 2021, 'SCHOLASTIC ING (MARCH 2020)', 24.45, 'books/hunger_game.jpg', '<span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The stunning Hunger Games trilogy is complete! The extraordinary, ground breaking&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">New York Times</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;bestsellers&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">The Hunger Games</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">&nbsp;and&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Catching Fire</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">, along with the third book in The Hunger Games trilogy by Suzanne Collins,&nbsp;</span><i style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">Mockingjay</i><span style=\"font-family: &quot;Amazon Ember&quot;, Arial, sans-serif;\">, are available for the first time ever in e-book. Stunning, gripping, and powerful.</span>', 'A', '2021-06-18 08:55:41', '2021-07-02 08:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-cho duyet 2-da duyet 3-da tra sach 4-het han',
  `book_isbn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `issued_by` int(11) DEFAULT NULL,
  `borrowed_From` datetime DEFAULT NULL,
  `expiration_Date` datetime DEFAULT NULL,
  `return_Date` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `customer_id`, `status`, `book_isbn`, `issued_by`, `borrowed_From`, `expiration_Date`, `return_Date`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '9780060883287', 1, '2021-07-04 19:53:44', '2021-07-11 19:53:13', NULL, NULL, '2021-07-04 19:48:05', '2021-07-10 12:49:14'),
(2, 2, 2, '9780425232200', 1, '2021-07-04 12:49:14', '2021-07-11 12:49:14', NULL, NULL, '2021-07-04 19:48:13', '2021-07-10 12:49:14'),
(3, 2, 1, '9780062259660', NULL, '2021-07-10 00:00:00', NULL, NULL, NULL, '2021-07-10 19:48:27', '2021-07-10 19:48:27'),
(40, 3, 4, '9780525562627', 1, '2021-07-01 13:20:41', '2021-07-08 13:20:41', NULL, NULL, '2021-07-10 20:18:37', '2021-07-10 13:21:49'),
(41, 2, 2, '9780143039983', 1, '2021-07-06 19:53:44', '2021-07-13 19:53:13', NULL, NULL, '2021-07-06 19:48:05', '2021-07-10 12:49:14'),
(42, 2, 2, '9781400033416', 1, '2021-07-06 19:53:44', '2021-07-13 19:53:13', NULL, NULL, '2021-07-06 19:48:05', '2021-07-10 12:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Classic Book', '60bee5bf666b8classic.jpg', '2021-06-08 03:36:31', '2021-06-09 03:09:54'),
(6, 'Action and Adventure', '60c02f307ced6ActionAdventure.jpg', '2021-06-09 02:46:52', '2021-06-09 03:02:08'),
(7, 'Comic Book or Graphic Novel', '60c0300b6e66fComicBookGraphicNovel.jpg', '2021-06-09 03:05:47', '2021-06-09 03:05:47'),
(8, 'Historical Fiction', '60c0305df193fHistoricalFiction.jpg', '2021-06-09 03:07:09', '2021-06-09 03:07:09'),
(9, 'Horror', '60c0bcac8c54bHorror.jpg', '2021-06-09 13:05:48', '2021-06-09 13:05:48'),
(10, 'Science Fiction', '60c0bceabf786ScienceFiction.jpg', '2021-06-09 13:06:50', '2021-06-09 13:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Message` text COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Name`, `Email`, `Phone`, `Subject`, `Message`, `create_at`, `update_at`) VALUES
(1, 'sang', 'sang123@gmail.com', '0946963045', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis aspernatur quasi repellat verit', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis aspernatur quasi repellat veritatis distinctio molestias sint, ad sunt eos molestiae labore tempora laborum aliquam quisquam illum porro voluptates, nihil vero.\r\n', '2021-06-24 07:58:27', '2021-06-24 07:58:27'),
(2, 'sang', 'sang@gmail.com', '0946963045', 'asdas', 'massage22', '2021-06-24 07:59:06', '2021-06-24 07:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `expiration_Date` datetime DEFAULT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1-cho thanh toan 2-kich hoat 3-het han',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `customer_id`, `start_date`, `expiration_Date`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, 25, 1, '2021-07-10 12:50:23', '2021-07-10 12:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `membership_fee`
--

CREATE TABLE `membership_fee` (
  `id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalty_fee`
--

CREATE TABLE `penalty_fee` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratingbooks`
--

CREATE TABLE `ratingbooks` (
  `id` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `isbn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `category_Id` (`category_Id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_isbn` (`book_isbn`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `membership_fee`
--
ALTER TABLE `membership_fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_id` (`membership_id`);

--
-- Indexes for table `penalty_fee`
--
ALTER TABLE `penalty_fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `ratingbooks`
--
ALTER TABLE `ratingbooks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `membership_fee`
--
ALTER TABLE `membership_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penalty_fee`
--
ALTER TABLE `penalty_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratingbooks`
--
ALTER TABLE `ratingbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_Id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_ibfk_1` FOREIGN KEY (`book_isbn`) REFERENCES `books` (`isbn`),
  ADD CONSTRAINT `borrows_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `membership_fee`
--
ALTER TABLE `membership_fee`
  ADD CONSTRAINT `membership_fee_ibfk_1` FOREIGN KEY (`membership_id`) REFERENCES `membership` (`id`),
  ADD CONSTRAINT `membership_fee_ibfk_2` FOREIGN KEY (`membership_id`) REFERENCES `membership` (`id`),
  ADD CONSTRAINT `membership_fee_ibfk_3` FOREIGN KEY (`membership_id`) REFERENCES `membership` (`id`);

--
-- Constraints for table `penalty_fee`
--
ALTER TABLE `penalty_fee`
  ADD CONSTRAINT `penalty_fee_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
