-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2023 at 02:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movielense`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL,
  `actor_name` varchar(40) NOT NULL,
  `actor_lastname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `actor_name`, `actor_lastname`) VALUES
(1, 'Brad', 'Pitt'),
(2, 'Edward', 'Norton'),
(3, 'Tom', 'Hanks'),
(4, 'Morgan', 'Freeman'),
(5, 'Christian', 'Bale'),
(6, 'Heath', 'Ledger'),
(7, 'Chris', 'Pratt'),
(8, 'Zoe', 'Saldana'),
(9, 'Hugh', 'Jackman'),
(10, 'Leonardo', 'Dicaprio'),
(11, 'Joaquin', 'Phoenix'),
(12, 'Matt', 'Damon'),
(13, 'Keanu', 'Reeves'),
(14, 'Christoph', 'Waltz'),
(15, 'Tom', 'Hardy'),
(16, 'Laurence', 'Fishburne'),
(17, 'Cillian', 'Murphy'),
(18, 'Matthew', 'Mcconaughey'),
(19, 'Bruce', 'Willis');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Action'),
(3, 'Comedy'),
(6, 'Crime'),
(1, 'Drama'),
(5, 'Mystery'),
(4, 'Sci-fi');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `movie_description` varchar(1024) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_description`, `date`, `picture_id`) VALUES
(1, 'Batman Begins', 'When his parents are killed, billionaire playboy Bruce Wayne relocates to Asia, where he is mentored by Henri Ducard and Ra\'s Al Ghul in how to fight evil. When learning about the plan to wipe out evil in Gotham City by Ducard, Bruce prevents this plan from getting any further and heads back to his home. Back in his original surroundings, Bruce adopts the image of a bat to strike fear into the criminals and the corrupt as the icon known as \"Batman\". But it doesn\'t stay quiet for long.', '2005-06-15 16:47:18', 1),
(2, 'Bullet train', '\"Bullet Train\" is a high-stakes thriller set on a Tokyo bullet train. Five assassins, each with a mission, cross paths onboard. As tensions rise, they discover their targets are connected, leading to a deadly race against time. With unexpected obstacles and a gripping cat-and-mouse game, this action-packed film delivers suspense and twists at every turn.', '2022-12-15 00:00:00', 2),
(3, 'The Dark Knight Rises', 'The Dark Knight Rises\" is a superhero movie where Batman faces his toughest adversary yet in the form of Bane, a mercenary who seeks to destroy Gotham City. As Batman tries to stop Bane and save the city, he faces numerous challenges, including physical and emotional injuries, the loss of allies, and the revelation of long-held secrets. With the help of Catwoman, Batman must use all his skills and resources to overcome these obstacles and save Gotham from destruction.', '2012-05-17 00:00:00', 3),
(4, 'The Departed', '\"The Departed\" is a crime thriller directed by Martin Scorsese and based on the Hong Kong movie \"Infernal Affairs.\" The film follows the story of two young men on opposite sides of the law: Billy Costigan, a police officer who goes undercover to infiltrate a powerful criminal organization, and Colin Sullivan, a member of the organization who has infiltrated the police force. As both men try to maintain their covers and uncover the other\'s identity, tensions rise and the stakes get higher.', '2006-05-10 00:00:00', 4),
(5, 'Django Unchained', 'In Tarantino\'s \"Django Unchained,\" a former slave named Django transforms into a bounty hunter, aiming to save his wife from a cruel plantation owner. Joined by Dr. King Schultz, a German bounty hunter, they navigate the perilous antebellum South. Facing ruthless slave owners, violent outlaws, and the KKK, Django\'s journey becomes a gripping tale of resilience and retribution.', '2012-05-21 00:00:00', 5),
(6, 'Fight Club', 'Fight Club,\" directed by David Fincher, delves into the dark realm of a disillusioned narrator. He creates an underground fight club with charismatic Tyler Durden, sparking a descent into chaos and blurred realities. This gripping psychological thriller explores identity, rebellion, and the consequences of unbridled power.', '1999-05-16 00:00:00', 6),
(7, 'Forrest Gump', '\"Forrest Gump,\" directed by Robert Zemeckis, is a heartwarming tale of an extraordinary man. Despite his low IQ, Forrest embarks on a remarkable journey filled with life-altering moments. From overcoming bullying and physical obstacles to finding love, he defies all odds. Forrest excels as a football player, a war hero, a thriving entrepreneur, and a loyal companion. This uplifting film celebrates resilience, determination, and the power of unwavering optimism.', '1994-05-01 00:00:00', 7),
(8, 'Guardians of the galaxy 1', 'In \"Guardians of the Galaxy Vol. 1,\" directed by James Gunn, charismatic adventurer Peter Quill, a.k.a. Star-Lord, acquires a powerful orb, making him a target for ruthless villain Ronan the Accuser. To save the galaxy, Quill forms an unconventional team: tough Gamora, rough Drax, genetically-engineered Rocket, and lovable Groot. Get ready for an epic Marvel superhero film packed with action and a band of unlikely heroes.', '2014-05-06 00:00:00', 8),
(9, 'Guardians of the galaxy 2', '\"Guardians of the Galaxy Vol. 2,\" directed by James Gunn, continues the thrilling saga of the guardians. Tasked with protecting valuable batteries from a monstrous threat by the Sovereign, the team encounters Ego, claiming to be Peter Quill\'s father. Alongside this revelation, they confront Nebula, Gamora\'s vengeful sister, seeking retribution against their shared father, Thanos. Prepare for more interstellar adventures in this action-packed Marvel sequel.', '2017-05-09 00:00:00', 9),
(10, 'Guardians of the galaxy 3', 'Still reeling from the loss of Gamora, Peter Quill rallies his team to defend the universe and one of their own - a mission that could mean the end of the Guardians if not successful.', '2023-05-05 19:53:58', 10),
(11, 'Inception', 'Christopher Nolan\'s \"Inception\" is a mind-bending sci-fi film. Skilled thief Dom Cobb performs extraction and is now tasked with \"inception\"—planting an idea in a rival\'s mind. Cobb assembles a team, entering a treacherous dream world. As they navigate dreams and confront Cobb\'s own demons, prepare for a captivating exploration of the human mind.', '2010-05-03 00:00:00', 11),
(12, 'Inglorious Basterds', 'Quentin Tarantino\'s \"Inglourious Basterds\" is a World War II film that weaves together the stories of the Basterds, a group of Jewish-American soldiers targeting Nazis, and Shosanna Dreyfus, seeking revenge against her would-be executioner. Their paths intersect at a pivotal Nazi-attended film premiere. Brace yourself for a captivating tale of vengeance and resistance in this gripping war movie.', '2009-05-03 00:00:00', 12),
(13, 'Interstellar', 'Christopher Nolan\'s \"Interstellar\" is a gripping sci-fi epic. Earth faces imminent collapse, prompting a team of astronauts, led by Cooper, to search for a new habitable planet. Through a wormhole near Saturn, they explore potentially viable worlds. Their interstellar voyage unveils mind-bending challenges and profound truths, testing their beliefs and pushing the boundaries of science and humanity. Brace yourself for a captivating journey of love, sacrifice, and the vast unknown.', '2014-05-11 00:00:00', 13),
(14, 'John Wick: Chapter 4', 'John Wick uncovers a path to defeating The High Table. But before he can earn his freedom, Wick must face off against a new enemy with powerful alliances across the globe and forces that turn old friends into foes.', '2023-03-24 19:53:58', 14),
(15, 'Joker', 'Todd Phillips\' \"Joker\" is a gripping psychological thriller. Arthur Fleck, a failed comedian in Gotham City, spirals into madness and becomes the notorious criminal mastermind known as the Joker. This captivating film explores Arthur\'s descent into chaos and the ripple effect of his actions on Gotham City. Brace yourself for a dark and intense exploration of one man\'s transformation and the haunting consequences that follow.', '2019-05-05 00:00:00', 15),
(16, 'Logan', 'James Mangold\'s \"Logan\" is a gripping superhero film set in a near-future world. Wolverine, living in isolation and caring for a sick Charles Xavier, encounters Gabriela, who seeks help transporting young mutant Laura to safety. Pursued by cybernetic mercenaries, they embark on a perilous journey to protect Laura and find sanctuary. As they confront their demons, this road trip tests their resilience and redefines their legacies. Brace yourself for a captivating exploration of sacrifice, redemption, and the enduring spirit of heroes.', '2017-05-24 00:00:00', 16),
(17, 'Oppenheimer', 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.', '2023-07-21 19:53:58', 17),
(18, 'The Prestige', '\"The Prestige\" is a mystery thriller directed by Christopher Nolan. The film takes place in Victorian-era London and follows two rival magicians, Robert Angier and Alfred Borden, who become obsessed with creating the ultimate illusion. As their rivalry intensifies, their personal and professional lives become increasingly entwined, leading to a dangerous and deadly game of one-upmanship. The movie explores themes of sacrifice, obsession, and the lengths people will go to achieve their goals.', '2006-05-26 00:00:00', 18),
(19, 'The Revenant', '\"The Revenant,\" directed by Alejandro G. Iñárritu, is a gripping survival drama set in the 1820s. Hugh Glass, a skilled frontiersman, is left for dead after a brutal bear attack. In a harsh winter, he battles nature\'s fury and seeks vengeance against his betrayers, particularly the treacherous John Fitzgerald. This film delves into themes of survival, revenge, and the indomitable human spirit amidst insurmountable challenges. Prepare for wilderness.', '2014-05-09 00:00:00', 19),
(20, 'Saving Private Ryan', 'Steven Spielberg\'s \"Saving Private Ryan\" is a riveting war drama. Captain John H. Miller and his squad embark on a dangerous mission to rescue Private James Ryan, whose brothers have died in WWII. Amidst enemy territory, they grapple with the moral dilemma of risking lives for one man. This film depicts the brutal realities of war and explores themes of sacrifice and duty. Brace yourself for a gripping exploration of heroism and the profound costs of conflict.', '1998-11-18 00:00:00', 20),
(21, 'Seven', 'David Fincher\'s \"Seven\" is a chilling psychological thriller. Detectives Mills and Somerset chase a sadistic serial killer who targets victims based on the seven deadly sins. As the investigation unfolds, they confront their own beliefs and face a pivotal decision. This film delves into justice, morality, and the darkest corners of the human soul. Brace yourself for a suspenseful exploration of the human psyche\'s unsettling depths.', '1995-05-25 00:00:00', 21),
(22, 'Shutter Island', '\"Shutter Island\" is a psychological thriller directed by Martin Scorsese. The film follows two US Marshals, Teddy Daniels and Chuck Aule, as they investigate the disappearance of a patient from a remote island asylum for the criminally insane. The investigation quickly turns into a dark and disturbing journey for Teddy, who is haunted by his past and becomes increasingly convinced that something sinister is happening on the island.', '2010-05-25 20:23:05', 22),
(23, 'The Dark Knight', '\"The Dark Knight\" is a superhero film directed by Christopher Nolan. The movie follows Batman as he faces his arch-nemesis, the Joker, who seeks to create chaos and destruction in Gotham City. The Joker\'s violent and unpredictable nature challenges Batman\'s sense of justice and morality, as well as the loyalty of his allies, including Commissioner Gordon and Harvey Dent. The film explores themes of heroism, villainy, and the consequences of vigilantism.', '2008-05-20 20:23:05', 23),
(24, 'The Matrix', '\"The Matrix\" is a science-fiction action film directed by the Wachowskis. The movie follows Thomas Anderson, a computer programmer who discovers that his entire reality is a simulated construct created by a race of machines that have enslaved humanity. He is then recruited by a group of rebels who have been fighting the machines for years and given the name \"Neo\". Together, they set out to destroy the Matrix and free humanity from its captivity.', '1999-05-26 20:23:05', 24),
(25, 'The Wolf of Wall Street', '\"The Wolf of Wall Street\" is a biographical black comedy directed by Martin Scorsese. The film follows the rise and fall of Jordan Belfort, a stockbroker who made millions of dollars through securities fraud and corruption in the late 80s and early 90s. The movie depicts Belfort\'s extravagant and debaucherous lifestyle, as well as his eventual downfall and legal troubles.', '2013-05-08 20:23:05', 25);

-- --------------------------------------------------------

--
-- Table structure for table `movies_pictures`
--

CREATE TABLE `movies_pictures` (
  `picture_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies_pictures`
--

INSERT INTO `movies_pictures` (`picture_id`, `url`) VALUES
(1, 'batmanbegins.jpg'),
(2, 'bullettrain.jpg'),
(3, 'darknightrises.jpg'),
(4, 'departed.jpg'),
(5, 'django.jpg'),
(6, 'fightclub.jpg'),
(7, 'forestgump.jpg'),
(8, 'guardiansofthegalaxy1.jpg'),
(9, 'guardiansofthegalaxy2.jpg'),
(10, 'guardiansofthegalaxy3.jpg'),
(11, 'inception.jpg'),
(12, 'ingloriousbastards.jpg'),
(13, 'interstellar.jpg'),
(14, 'johnwick4.jpg'),
(15, 'joker.jpg'),
(16, 'logan.jpg'),
(17, 'opernheimer.jpg'),
(18, 'prestige.jpg'),
(19, 'revenant.jpg'),
(20, 'savingprivateryan.jpg'),
(21, 'seven.jpg'),
(22, 'shutterisland.jpg'),
(23, 'thedarknight.jpg'),
(24, 'thematrix.jpg'),
(25, 'wolfofwallstreet.jpg'),
(26, 'test.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actor`
--

CREATE TABLE `movie_actor` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_actor`
--

INSERT INTO `movie_actor` (`movie_id`, `actor_id`) VALUES
(1, 4),
(1, 5),
(2, 1),
(3, 4),
(3, 5),
(3, 15),
(4, 10),
(4, 12),
(5, 10),
(5, 14),
(6, 1),
(6, 2),
(7, 3),
(8, 7),
(8, 8),
(9, 7),
(9, 8),
(10, 7),
(10, 8),
(11, 10),
(11, 15),
(11, 17),
(12, 1),
(12, 14),
(13, 12),
(13, 18),
(14, 13),
(14, 16),
(15, 11),
(16, 9),
(17, 12),
(17, 17),
(18, 5),
(18, 9),
(19, 10),
(19, 15),
(20, 3),
(20, 12),
(21, 1),
(21, 4),
(22, 10),
(23, 4),
(23, 5),
(23, 6),
(24, 13),
(24, 16),
(25, 10);

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`movie_id`, `category_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(4, 6),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 5),
(7, 3),
(8, 2),
(8, 3),
(8, 4),
(9, 2),
(9, 3),
(9, 4),
(10, 2),
(10, 3),
(10, 4),
(11, 2),
(11, 4),
(11, 5),
(12, 1),
(12, 2),
(13, 1),
(13, 4),
(13, 5),
(14, 2),
(15, 1),
(16, 1),
(16, 2),
(16, 4),
(17, 1),
(18, 1),
(18, 5),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 5),
(21, 6),
(22, 1),
(22, 5),
(23, 1),
(23, 2),
(23, 6),
(24, 2),
(24, 4),
(25, 1),
(25, 6);

-- --------------------------------------------------------

--
-- Table structure for table `navigation_items`
--

CREATE TABLE `navigation_items` (
  `item_id` int(11) NOT NULL,
  `item_text` varchar(255) NOT NULL,
  `item_url` varchar(255) NOT NULL,
  `item_type` varchar(2) DEFAULT NULL,
  `item_ico` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navigation_items`
--

INSERT INTO `navigation_items` (`item_id`, `item_text`, `item_url`, `item_type`, `item_ico`) VALUES
(1, 'Home', 'index.php?page=main', NULL, NULL),
(2, 'Movies', 'index.php?page=movies', NULL, 'fa-solid fa-film ico'),
(3, 'Log in', 'index.php?page=login', 'h', 'fa-solid fa-right-to-bracket ico'),
(4, 'Register', 'index.php?page=register', NULL, 'fa-solid fa-user-plus ico'),
(5, 'Documentation', 'Dokumentacija.pdf', 'f', NULL),
(6, 'Author', 'index.php?page=author', 'f', NULL),
(7, 'Contact', 'index.php?page=contact', 'f', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `picture_id`) VALUES
(1, 'Joker: Folie a Deux has oficially finished filming.', 1),
(2, 'We are opening new cinemas in Serbia.', 2),
(3, 'The Boys season 5 is officially confirmed.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news_pictures`
--

CREATE TABLE `news_pictures` (
  `picture_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_pictures`
--

INSERT INTO `news_pictures` (`picture_id`, `url`) VALUES
(1, 'jokerfilming.jpg'),
(2, 'cinemas.jpg'),
(3, 'theboys.jpg'),
(4, 'newnew.jpg'),
(5, 'test.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `text` varchar(1024) NOT NULL,
  `grade` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `text`, `grade`, `date`, `user_id`, `movie_id`) VALUES
(1, 'Batman Begins\" is a fantastic superhero movie that captures the essence of the Dark Knight. With excellent performances, intense action, and a realistic interpretation of Gotham City, this film is a thrilling and thought-provoking adventure. As a fan of the character, I consider \"Batman Begins\" to be one of the best superhero movies ever made.', 10, '2023-05-16 23:38:20', 1, 1),
(2, 'Bullet Train\" is an adrenaline-fueled action movie that kept me on the edge of my seat from start to finish. With a star-studded cast including Brad Pitt, Sandra Bullock, and Lady Gaga, this film is a wild ride filled with intense fight scenes and unexpected twists. The setting of a high-speed train adds to the tension, creating a claustrophobic atmosphere that adds to the excitement. While it may not be a deep or complex film, \"Bullet Train\" is an entertaining and thrilling experience that is sure to satisfy action movie fans.', 9, '2023-05-21 23:38:20', 1, 2),
(3, 'Django Unchained\" is a masterpiece of modern filmmaking that combines Quentin Tarantino\'s signature style with an unforgettable story and an outstanding cast. With Jamie Foxx in the titular role and Christoph Waltz delivering an Oscar-winning performance as Dr. King Schultz, the film is a thrilling and emotionally charged adventure that takes the viewer on a journey through the brutal realities of slavery in the American South. The action sequences are explosive, the dialogue is sharp and memorable, and the themes of revenge, justice, and love are explored with depth and complexity. As a fan of Tarantino\'s work, I consider \"Django Unchained\" to be one of his best films and a true masterpiece of cinema.', 10, '2023-05-01 23:42:14', 1, 5),
(4, 'Fight Club\" is a cinematic masterpiece that tackles complex themes with daring style and intensity. With outstanding performances from Brad Pitt and Edward Norton, the film explores the human desire for meaning, identity, and rebellion against societal norms. The iconic twist ending is just one of the many reasons why this movie is a classic that continues to be revered by audiences and critics alike. The film\'s cinematography, soundtrack, and script are all top-notch, creating a visual and emotional experience that stays with you long after the credits roll. As a fan of this film, I consider \"Fight Club\" to be a true work of art that defies conventions and challenges our perceptions of reality.', 10, '2023-05-08 23:46:36', 1, 6),
(5, 'Forrest Gump\" is a heartwarming and inspiring film that tells the story of an unlikely hero and his extraordinary journey through life. Tom Hanks delivers an outstanding performance as the titular character, capturing his innocence, kindness, and perseverance in a way that is both moving and unforgettable. The film\'s soundtrack, which features classic songs from the \'60s and \'70s, perfectly complements the story and adds to the emotional impact of the film. From the Vietnam War to the Watergate scandal, \"Forrest Gump\" is a powerful reminder of the historic events that shaped America in the latter half of the 20th century. As a fan of this film, I consider \"Forrest Gump\" to be a timeless classic that celebrates the power of love, friendship, and the human spirit.', 10, '2023-05-07 23:46:36', 1, 7),
(6, 'Guardians of the Galaxy Vol. 1\" is a fun and exhilarating ride that blends humor, action, and heart in a way that only the Marvel Cinematic Universe can. The ensemble cast, led by Chris Pratt as the charmingly roguish Star-Lord, is one of the film\'s biggest strengths, each member bringing a unique personality and backstory to the team. The soundtrack, filled with classic \'70s hits, perfectly complements the film\'s tone and adds to the overall enjoyment of the movie. Director James Gunn\'s vision is realized with stunning visual effects and a colorful, otherworldly setting that sets this film apart from other superhero movies. As a fan of this film, I consider \"Guardians of the Galaxy Vol. 1\" to be a standout addition to the Marvel Cinematic Universe that leaves you wanting more.', 9, '2023-05-04 23:46:36', 1, 8),
(7, 'Guardians of the Galaxy Vol. 2\" is a fantastic sequel that delivers more of what made the first film great. The film deepens the characters\' stories and relationships while also introducing new additions to the team. Director James Gunn takes risks with the film\'s narrative and style, resulting in a visually stunning and emotionally satisfying movie. Overall, \"Guardians of the Galaxy Vol. 2\" is a worthy addition to the Marvel Cinematic Universe that builds upon the foundation laid by the first film and sets up exciting possibilities for the future.', 9, '2023-05-06 23:46:36', 1, 9),
(8, 'Guardians of the Galaxy Vol. 3\" is a thrilling and emotional conclusion to the beloved space adventure franchise. The film sees the Guardians facing their biggest challenge yet as they confront a new enemy threatening the galaxy. Along the way, they must also come to terms with their own pasts and relationships, leading to powerful character moments and unexpected twists. The humor and action are as entertaining as ever, but it\'s the heartfelt moments that truly shine, leaving audiences with a satisfying and emotional conclusion to the series.', 9, '2023-05-06 23:48:22', 1, 10),
(9, 'Inception is a visually stunning masterpiece that takes the audience on a mind-bending journey through the subconscious. Director Christopher Nolan\'s intricate and layered story, coupled with a phenomenal cast led by Leonardo DiCaprio, keeps you on the edge of your seat from start to finish. The film\'s intricate dreamscapes and stunning visuals are matched only by its thought-provoking themes of guilt, redemption, and the power of the human mind. Inception is a true cinematic triumph that will leave you both exhilarated and intellectually stimulated.', 10, '2023-05-14 23:51:31', 1, 11),
(10, 'Inglourious Basterds is a thrilling and masterful work of cinema that brings a unique perspective to the well-worn genre of World War II movies. Quentin Tarantino\'s signature style is on full display, with sharp dialogue, clever editing, and memorable characters. The ensemble cast is outstanding, with standout performances from Christoph Waltz and Brad Pitt. The film is equal parts suspenseful and hilarious, with moments of heart-pounding tension interwoven with dark comedy. Tarantino\'s bold reimagining of history adds an extra layer of intrigue to the story, and the film\'s final act is a cathartic and satisfying conclusion. Inglourious Basterds is a must-watch for anyone who loves great filmmaking and a thrilling ride.', 10, '2023-05-04 23:55:20', 1, 12),
(11, 'Interstellar is a visually stunning and emotionally charged sci-fi film that explores the human desire to explore the unknown. Christopher Nolan\'s direction is top-notch, as is the ensemble cast\'s performance, particularly Matthew McConaughey. The film\'s themes of love, time, and sacrifice will leave you pondering long after the credits roll.', 10, '2023-05-14 23:55:20', 1, 13),
(12, 'As a fan of the John Wick franchise, I am eagerly anticipating the release of John Wick Chapter 4. The previous films have set a high standard of intense action and thrilling fight scenes, and I have no doubt that Chapter 4 will continue to deliver in that regard. With Keanu Reeves reprising his role as the legendary assassin, I am excited to see where the story goes and how John Wick will face his latest adversaries. The addition of new cast members such as Donnie Yen and Hiroyuki Sanada only adds to my anticipation for the film. Overall, I have high expectations for John Wick Chapter 4 and I can\'t wait to see it.', 9, '2023-05-08 23:56:58', 1, 14),
(13, '\"Joker\" is a haunting and deeply impactful film that takes a unique and insightful look into the character\'s origin story. Joaquin Phoenix delivers a mesmerizing performance, bringing a sense of vulnerability and madness to the character that is both unsettling and captivating. The cinematography and score create an intense and moody atmosphere, drawing the viewer into the gritty world of Gotham City. As a fan of the comics and films, I was thoroughly impressed with this fresh and innovative take on the Joker\'s character, and the film\'s powerful message about society\'s treatment of those with mental illness.', 10, '2023-05-09 23:57:41', 1, 15),
(14, 'As a fan of Logan, I have to say it is an incredibly emotional and fitting end to Hugh Jackman\'s portrayal of Wolverine. The film is a dark and gritty western-style drama that explores themes of family, mortality, and sacrifice. Jackman gives a powerful performance, as does Patrick Stewart in his role as Professor X. The action scenes are intense and thrilling, but it\'s the quieter, more character-driven moments that really make this movie stand out. Overall, Logan is a masterful piece of storytelling and a worthy sendoff to one of the most iconic characters in comic book history.', 10, '2023-05-05 23:58:49', 1, 16),
(15, 'Oppenheimer\" is a cinematic masterpiece that left me speechless. Director Christopher Nolan\'s brilliant storytelling combined with the stellar performances of the cast made for an unforgettable experience. The film takes us on a journey through the life of J. Robert Oppenheimer, the father of the atomic bomb, and explores the moral implications of his work. It\'s a thought-provoking and emotionally charged film that doesn\'t shy away from the difficult questions. The stunning visuals and epic score only add to the already mesmerizing experience. I can\'t recommend this film enough - it\'s a must-see for anyone who appreciates exceptional cinema.', 10, '2023-05-08 23:59:30', 1, 17),
(16, 'As a person who loves Saving Private Ryan, I can confidently say that it is a masterpiece of war films. The opening scene alone is enough to leave you in awe and remind you of the horrors of war. The acting, especially by Tom Hanks, is superb and draws you in to the story. The film is a perfect blend of action, drama, and emotion, as we follow a group of soldiers on a mission to save one man during World War II. The battle scenes are intense and realistic, leaving you on the edge of your seat. Overall, Saving Private Ryan is a must-watch for anyone who enjoys war films or just appreciates great cinema', 9, '2023-05-14 00:02:07', 1, 20),
(17, 'As a fan of thrilling crime dramas, I absolutely loved Seven. The movie is a dark and haunting exploration of the human psyche, with incredible performances from its talented cast. Brad Pitt and Morgan Freeman shine as two detectives investigating a series of gruesome murders, while Kevin Spacey delivers an unforgettable performance as the twisted and manipulative killer. Overall, Seven is a must-watch for fans of the genre, and remains one of the most iconic and influential crime thrillers of all time.', 9, '2023-05-09 00:02:46', 1, 21),
(18, 'Shutter Island\" is a masterpiece that kept me on the edge of my seat from start to finish. The performances by Leonardo DiCaprio and Mark Ruffalo are outstanding, and the film\'s eerie atmosphere is palpable. The twists and turns throughout the story keep you guessing until the very end, leaving you shocked and questioning everything you thought you knew. This psychological thriller is a must-watch for anyone who loves a good mystery and appreciates brilliant filmmaking', 10, '2023-05-03 00:03:41', 1, 22),
(19, '\"The Dark Knight\" is a thrilling masterpiece that exceeds expectations on all levels. Christopher Nolan\'s direction, combined with the incredible performances from Christian Bale and Heath Ledger, make for a dark and unforgettable cinematic experience. The tension is palpable throughout the film, leaving the audience on the edge of their seats until the very end. The writing is sharp, the action is intense, and the overall atmosphere is absolutely gripping. This film truly solidified Batman as a legendary character in cinema, and it is one that I will continue to watch and admire for years to come.', 9, '2023-05-08 00:05:22', 1, 23),
(20, 'The Dark Knight Rises is a thrilling conclusion to the epic Christopher Nolan Batman trilogy. The film is intense and action-packed, with stunning visuals and exceptional performances by Christian Bale, Tom Hardy, and Anne Hathaway. The storyline is well-crafted and provides a fitting end to the trilogy, leaving audiences feeling satisfied and exhilarated. Overall, The Dark Knight Rises is a must-see for fans of the superhero genre and those who appreciate great filmmaking.', 10, '2023-05-09 00:06:14', 1, 3),
(21, 'Scorsese at his best! The Departed is a gritty and intense crime drama that kept me on the edge of my seat from start to finish. The all-star cast delivers phenomenal performances and the plot is full of twists and turns that leave you guessing until the very end. This is a must-see for any fan of the genre.', 9, '2023-05-05 00:08:35', 1, 4),
(22, 'The Matrix is a true masterpiece of cinema. The film\'s groundbreaking visuals, intense action sequences, and thought-provoking themes make it a must-see for any fan of science fiction or action movies. Keanu Reeves delivers a standout performance as Neo, a computer programmer who discovers that the world as he knows it is actually a computer-generated simulation. The film\'s exploration of identity, free will, and the nature of reality is both fascinating and engaging. The Matrix is a timeless classic that continues to captivate audiences with its thrilling action and mind-bending concepts.', 10, '2023-05-06 00:09:37', 1, 24),
(23, '\"Christopher Nolan\'s \'The Prestige\' is a masterful film that will leave you spellbound. With its intricate plot, outstanding performances from Christian Bale and Hugh Jackman, and stunning visuals, this movie is a must-watch for anyone who loves a good mystery. The film explores themes of obsession, sacrifice, and the lengths people will go to achieve greatness. It will keep you on the edge of your seat until the very end, and leave you thinking about it long after the credits roll.', 9, '2023-05-01 00:10:19', 1, 18),
(24, 'As a fan of survival and adventure movies, \"The Revenant\" was an absolute masterpiece. The film takes you on a gripping journey of one man\'s will to survive against all odds in the harsh wilderness. The cinematography and direction are top-notch, immersing you into the bleak, desolate landscape of the American frontier. Leonardo DiCaprio\'s performance as the lead character, Hugh Glass, is remarkable, conveying a range of emotions with minimal dialogue. Overall, \"The Revenant\" is a stunning achievement in filmmaking, showcasing the triumph of human spirit and the raw power of nature', 9, '2023-05-09 00:11:23', 1, 19),
(25, 'Leonardo DiCaprio\'s powerful performance and Martin Scorsese\'s masterful direction make \"The Wolf of Wall Street\" an instant classic. The film tells the story of Jordan Belfort\'s rise and fall as a stockbroker, with an unflinching look at the excess and corruption of Wall Street. The pacing is frenetic, the humor is dark, and the message is clear: greed and excess ultimately lead to ruin. The cast, including Jonah Hill and Margot Robbie, give outstanding performances that make this film unforgettable.', 10, '2023-05-07 00:12:00', 1, 25),
(26, 'A decent origin story for the Dark Knight, but lacks the edge and excitement of its sequels. While I appreciated the darker tone and gritty realism, the story felt slow at times and some of the dialogue was clunky.', 8, '2023-05-05 00:21:29', 2, 1),
(27, 'A fast-paced action flick with a star-studded cast, but lacks a strong plot or character development', 7, '2023-05-11 00:35:21', 2, 2),
(28, 'A well-made spaghetti western with some standout performances, but ultimately feels like Tarantino treading familiar ground.', 8, '2023-05-02 00:22:50', 2, 5),
(29, 'A cult classic with some iconic scenes and memorable performances, but the story can feel disjointed and the message can be heavy-handed.', 8, '2023-05-15 00:23:34', 2, 6),
(30, 'A heartwarming story with some great performances, but can feel overly sentimental and manipulative at times.', 8, '2023-05-04 00:24:03', 2, 7),
(31, ' fun and entertaining space adventure with a great soundtrack, but lacks the depth and complexity of other Marvel movies.', 7, '2023-05-02 00:24:28', 2, 8),
(32, 'More of the same from the first film, with some additional character development, but still feels like a lightweight entry in the Marvel Cinematic Universe.', 7, '2023-05-03 00:24:58', 2, 9),
(33, 'A mind-bending and visually stunning film with some great performances, but can feel overly convoluted and lacking in emotional resonance.', 8, '2023-05-06 00:25:31', 2, 11),
(34, 'An ambitious sci-fi epic with some stunning visuals and impressive ideas, but can feel bloated and meandering at times.', 8, '2023-05-13 00:27:02', 2, 13),
(35, 'More of the same from the previous films, with some impressive action sequences and a charismatic lead, but lacks the freshness and novelty of the original.', 7, '2023-05-15 00:27:43', 2, 14),
(36, 'A dark and disturbing character study with a phenomenal performance from Joaquin Phoenix, but can feel like a superficial exploration of complex issues.', 8, '2023-05-14 00:28:05', 2, 15),
(37, 'A fitting end to Hugh Jackman\'s tenure as Wolverine, with some great action scenes and emotional moments, but can feel like a retread of other superhero movies.', 8, '2023-05-03 00:28:36', 2, 16),
(38, 'A powerful and visceral war movie with some stunning action sequences and a great ensemble cast, but can feel overly sentimental and manipulative.', 7, '2023-05-11 00:35:21', 2, 20),
(39, 'A gritty and intense thriller with a memorable ending and great performances, but can feel gratuitous in its depiction of violence.', 7, '2023-05-09 00:29:47', 2, 21),
(40, 'A well-made thriller with some interesting ideas and good performances, but can feel derivative and predictable.', 8, '2023-05-28 00:30:16', 2, 22),
(41, 'A groundbreaking superhero movie with a phenomenal performance from Heath Ledger as the Joker, but can feel overly long and bloated.', 8, '2023-05-03 00:30:47', 2, 23),
(42, 'A decent conclusion to Christopher Nolan\'s Dark Knight trilogy, with some impressive action scenes and strong performances, but lacks the edge and innovation of its predecessors.', 7, '2023-05-03 00:31:13', 2, 3),
(43, 'A solid crime thriller with some great performances and a compelling story, but can feel overly convoluted and lacking in subtlety.', 7, '2023-05-07 00:31:36', 2, 4),
(44, 'A groundbreaking sci-fi action movie with some memorable moments and a great concept, but can feel dated and overly reliant on special effects.', 8, '2023-05-15 00:33:16', 2, 24),
(45, 'A well-made period piece with some great performances and an intriguing story, but can feel overly convoluted and lacking in emotional depth.', 8, '2023-05-05 00:33:46', 2, 18),
(46, 'A visually stunning and intense survival movie with a great performance from Leonardo DiCaprio, but can feel overly long and lacking in narrative drive.', 7, '2023-05-06 00:34:11', 2, 19),
(47, 'A raunchy and entertaining biopic with a charismatic performance from Leonardo DiCaprio, but can feel overly indulgent and lacking in moral complexity.', 7, '2023-05-05 00:34:38', 2, 25),
(48, 'While it had its moments, the film felt overly familiar and formulaic, lacking the emotional depth and complexity of later Nolan films.', 6, '2023-05-06 00:38:00', 3, 1),
(49, 'Despite the impressive ensemble cast and thrilling action sequences, the film suffers from a lack of character development and a convoluted plot.', 5, '2023-05-06 00:38:00', 3, 2),
(50, 'Although it had some standout performances and moments of stylish violence, the film ultimately felt bloated and self-indulgent, with a lack of nuance in its exploration of slavery and revenge.', 6, '2023-05-10 00:39:09', 3, 5),
(51, 'While the film\'s commentary on consumerism and masculinity remains relevant, its twist ending feels overplayed and the characters often come across as one-dimensional.', 6, '2023-05-13 00:39:37', 3, 6),
(52, 'While the film\'s charming performances and nostalgic soundtrack have their appeal, its portrayal of history and disability has been criticized for being overly simplistic and sentimental.', 6, '2023-05-06 00:40:37', 3, 7),
(53, 'Despite its fun and irreverent tone, the film\'s reliance on familiar superhero tropes and underdeveloped villains make it feel somewhat forgettable.', 5, '2023-05-06 00:41:31', 3, 8),
(54, 'While the film\'s character interactions remain charming, its convoluted plot and inconsistent pacing make it feel less cohesive than its predecessor.', 5, '2023-05-06 00:42:01', 3, 9),
(55, 'While the film\'s visual effects and complex storytelling are impressive, its emotionally distant characters and confusing narrative can make it difficult to fully engage with.', 6, '2023-05-10 00:42:25', 3, 11),
(57, 'Despite some stunning visuals and an ambitious scope, the film\'s heavy-handed exposition and uneven pacing make it a frustrating experience at times.', 6, '2023-05-06 00:42:48', 3, 13),
(58, 'While the franchise\'s action scenes remain thrilling, the increasingly convoluted plot and lack of character development can make the films feel repetitive.', 4, '2023-05-05 00:43:19', 3, 14),
(59, 'While Joaquin Phoenix\'s performance is impressive, the film\'s reliance on violence and a one-dimensional portrayal of mental illness can feel exploitative and insensitive.', 5, '2023-05-06 00:43:50', 3, 15),
(60, 'While the film\'s somber tone and excellent performances add a layer of depth to the superhero genre, its predictable plot and lack of exploration of certain themes can make it feel underwhelming.', 6, '2023-05-06 00:44:18', 3, 16),
(61, 'While the film\'s visceral battle scenes are impressive, its thin characterizations and predictable plot can make it feel like a run-of-the-mill war movie.', 6, '2023-05-06 00:44:45', 3, 20),
(62, 'While the film\'s dark tone and twist ending are certainly memorable, its gratuitous violence and heavy-handed symbolism can feel off-putting.', 5, '2023-05-10 00:45:46', 3, 21),
(63, 'While the film\'s ominous atmosphere and twists are effective at times, its predictable plot and heavy reliance on genre tropes can make it feel like a lesser Hitchcock film.', 4, '2023-05-12 00:46:12', 3, 22),
(64, 'While the film\'s excellent performances and gritty tone are certainly impressive, its plot can feel overly convoluted and its portrayal of the Joker can come across as one-dimensional.', 6, '2023-05-06 00:47:12', 3, 23),
(65, 'While the film\'s action scenes and Hans Zimmer\'s score are impressive, its convoluted plot and underdeveloped villains can make it feel like a lesser entry in the Nolan Batman trilogy.', 5, '2023-05-15 00:47:12', 3, 3),
(66, 'While the film\'s impressive cast and tense plot keep things engaging, its heavy-handed themes and reliance on over-the-top violence can make it feel like a lesser Scorsese film.', 5, '2023-05-14 00:48:12', 3, 4),
(67, 'While the film\'s visual effects and unique concept are certainly influential, its wooden performances and heavy-handed philosophy can make it feel dated and pretentious.', 6, '2023-05-14 00:48:39', 3, 24),
(68, '\"The Prestige\" is a visually stunning film with great performances, but its convoluted plot and lack of emotional depth left me feeling underwhelmed.', 4, '2023-05-02 00:49:53', 3, 18),
(69, '\"The Revenant\" is a technically impressive film with beautiful cinematography and a committed performance by DiCaprio, but its thin characters and slow pace made it difficult for me to fully engage with.', 6, '2023-05-13 00:50:19', 3, 19),
(70, '\"The Wolf of Wall Street\" features strong performances by DiCaprio and Hill, but its excessive length and lack of a clear message left me feeling indifferent towards it.', 5, '2023-05-16 00:51:07', 3, 25),
(71, 'I liked it.', 9, '2023-05-13 06:13:21', 5, 1),
(72, 'Dobar film, svaka cast', 9, '2023-05-14 02:40:57', 5, 17),
(73, 'It is too complicated.', 7, '2023-05-14 04:28:51', 5, 11),
(74, 'Good movie.', 9, '2023-05-14 07:11:30', 5, 14),
(75, 'Wow.', 10, '2023-05-14 08:33:16', 5, 6),
(76, 'Good', 10, '2023-05-16 01:28:34', 5, 10),
(77, 'This one is awesome.', 10, '2023-05-17 01:22:01', 5, 12),
(78, 'Heath Ledger performance was stunning.', 9, '2023-05-18 04:24:03', 5, 23),
(79, 'This is one of my favorite Marvel movies!', 9, '2023-06-05 11:34:53', 5, 9),
(80, 'Di Caprio really deserved Oscar award for this one!', 8, '2023-06-05 11:36:21', 5, 19),
(81, 'Great movie.', 9, '2023-06-06 10:28:18', 5, 21),
(82, 'What a good way to tell a story.', 9, '2023-06-06 10:33:54', 5, 25),
(83, 'One of my favorites!', 10, '2023-06-06 10:42:30', 5, 13),
(84, 'Loved it!', 9, '2023-06-07 12:08:10', 5, 5),
(85, 'Classic.', 9, '2023-06-07 12:11:59', 5, 24),
(86, 'O', 9, '2023-06-07 12:22:11', 5, 16),
(87, 'Wow.', 9, '2023-06-07 12:23:46', 5, 22),
(88, 'Love this one.', 8, '2023-06-07 12:24:36', 5, 7),
(89, 'Okay,', 8, '2023-06-07 12:32:04', 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `username`, `password`, `role_id`) VALUES
(1, 'user1@gmail.com', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 2),
(2, 'user2@gmail.com', 'user2', '7e58d63b60197ceb55a1c487989a3720', 2),
(3, 'user3@gmail.com', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 2),
(4, 'admin@gmail.com', 'adminformovielense', 'a43c27c2babefd68df8a694900f30a1c', 1),
(5, 'stefanja2012@hotmail.rs', 'stefan12', '3e2ab778d83b958ed121464c14f4343c', 2),
(6, 'marko@gmail.com', 'marecar', '2e6c740729c44c12663c973965cbf698', 2),
(7, 'pera@gmail.rs', 'pera123456', 'b0f621f8d88df17d298831bb28ce5bff', 2);

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`),
  ADD UNIQUE KEY `movie_name` (`movie_name`),
  ADD KEY `picture` (`picture_id`);

--
-- Indexes for table `movies_pictures`
--
ALTER TABLE `movies_pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `actor` (`actor_id`);

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`movie_id`,`category_id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `navigation_items`
--
ALTER TABLE `navigation_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `picturenews` (`picture_id`);

--
-- Indexes for table `news_pictures`
--
ALTER TABLE `news_pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `userreview` (`user_id`),
  ADD KEY `moviereview` (`movie_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `userrole` (`role_id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`movie_id`,`user_id`),
  ADD KEY `watchlist_user` (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `picture` FOREIGN KEY (`picture_id`) REFERENCES `movies_pictures` (`picture_id`);

--
-- Constraints for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `actor` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`),
  ADD CONSTRAINT `movieactor` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `movie` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `picturenews` FOREIGN KEY (`picture_id`) REFERENCES `news_pictures` (`picture_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `moviereview` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `userreview` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `userrole` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `wachlist_movie` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`),
  ADD CONSTRAINT `watchlist_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
