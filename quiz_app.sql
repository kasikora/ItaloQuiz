-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Wrz 2023, 12:30
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `quiz_app`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quiz_time_mins` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `category`, `quiz_time_mins`) VALUES
(3, 'php', '30'),
(4, 'haha', '43'),
(8, 'test', '20'),
(10, 'wqe', '20'),
(11, 'Quiz for beginners', '30'),
(12, 'Quiz2', '25');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `id` int(5) NOT NULL,
  `question_no` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `opt5` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `opt5`, `answer`, `category`) VALUES
(1, '1', '5+3=?', '61', '7', '8', '5', '', '8', 'php'),
(2, '2', '2+2 is eq to', '1', '2', '3', '4', '', '4', 'php'),
(7, '3', '49 is?', '5', '5', '3', '59', '', '59', 'php'),
(8, '1', '2', '1', '2', '3', '4', '', '2', 'PROPER'),
(9, '2', '3', '1', '2', '3', '4', '', '3', 'PROPER'),
(10, '3', '4', '1', '2', '3', '4', '', '4', 'PROPER'),
(14, '4', 'gg is ', '', '', '', '', '', 'good game :)', 'PROPER'),
(15, '4', 'haha?', '1', '2', '3', '4', '5', '5', 'php'),
(16, '1', 'hery', '1', '2', '', '', '', '2', 'haha'),
(17, '2', 'hihi', '', '', '', '', '', '444', 'haha'),
(18, '3', '124', '1243', '124', '14', '', '14', '14', 'haha'),
(19, '4', '23', '', '', '', '', '', '23', 'haha'),
(20, '1', 'sdf', 'asf', 'dds', 'ds', '', '', 'asf', 'test'),
(21, '2', '1112', '22', '32', '12', '', '', '12', 'test'),
(22, '1', 'How do you say \"Good morning\"?', 'Arrivederci', 'Buona sera', 'Buongiorno', 'Buon pomeriggio', '', 'Buongiorno', 'Quiz for beginners'),
(23, '2', 'How do you say \"Good afternoon\"?', 'Buon pomeriggio', 'Buona sera', 'Buongiorno', 'Arrivederci', '', 'Buon pomeriggio', 'Quiz for beginners'),
(24, '3', 'How do you say \"Good evening\"?', 'Grazie mille', 'Buona sera', 'le chiavi', 'Arrivederci', '', 'Buona sera', 'Quiz for beginners'),
(25, '4', 'What is the correct translation for \"Please\"?', 'Salve', 'sinistra', 'Mi dispiace', 'Per favore', '', 'Per favore', 'Quiz for beginners'),
(26, '5', 'How do you say \"Thank You\"?', 'Arrivederci', 'destra', 'Grazie', 'Mi dispiace', '', 'Grazie', 'Quiz for beginners'),
(27, '6', 'What is the correct translation for \"Thank you very much\"?', 'Non so.', 'Cin cin!', 'Grazie mille', 'Mi scusi', '', 'Grazie mille', 'Quiz for beginners'),
(28, '7', 'How do you say \"Sorry\"?', 'Grazie', 'Mi dispiace', 'Non so.', 'Per favore', '', 'Mi dispiace', 'Quiz for beginners'),
(29, '8', 'How do you say \"Hello\"?', 'Grazie', 'Per favore', 'Salve', 'Non so.', '', 'Salve', 'Quiz for beginners'),
(30, '9', 'What is the correct translation for \"right\"?', 'tre', 'il treno', 'destra', 'sinistra', '', 'destra', 'Quiz for beginners'),
(32, '10', 'What is the correct translation for \"credit card\"?', 'la carta di credito', 'il libro', 'il giornale', 'la busta', '', 'la carta di credito', 'Quiz for beginners'),
(33, '11', 'How do you say \"car\"?', 'la nave', 'il coltello', 'il treno', 'la macchina', '', 'la macchina', 'Quiz for beginners'),
(34, '12', 'What is the correct translation for \"ship\"?', 'la nave', 'la bicicletta', 'il treno', 'aereo', '', 'la nave', 'Quiz for beginners'),
(35, '13', 'How do you say \"beach\"?', 'il pesce', 'la casa', 'la spiaggia', 'il passaporto', '', 'la spiaggia', 'Quiz for beginners'),
(36, '14', 'What is the correct translation for \"house\"?', 'il bagno', 'ospedale', 'albergo', 'la casa', '', 'la casa', 'Quiz for beginners'),
(37, '15', 'What is the correct translation for \"hotel\"?', 'albergo', 'la sedia', 'la casa', 'la spiaggia', '', 'albergo', 'Quiz for beginners'),
(38, '1', '\"Buongiorno, come stai?\" is a greeting you\'ll hear very often in Italian. What does it mean?', '', '', '', '', '', 'Good morning, how are you?', 'Quiz2'),
(39, '2', '\"I giorni della settimana\" means \"the days of the week\". How do you say \"Wednesday\" in Italian?', 'Martedi', 'Miercoles', 'Mercoledi', 'Lunedi', '', 'Mercoledi', 'Quiz2'),
(40, '3', 'Let\'s have a quick look at colours in Italian - or \"i colori\" . Which of the following is the Italian word for the colour red?', '', '', '', '', '', 'Rosso', 'Quiz2'),
(41, '4', '\"Rosa\" is the colour \"pink\" in Italian. But how would you say \"the strawberry is pink\" in Italian?', 'La mela è rosa', 'La fragola è rosa', 'La prugna è rosa', 'La pera è rosa', '', 'La fragola è rosa', 'Quiz2'),
(42, '5', 'My neighbours are Italian. One day, the younger boy told me \"la mia sorella è cattiva\". I know he was talking about his sister but what exactly did he say?', 'My sister is beautiful', 'My sister is bad', 'My sister is kind', '', '', 'My sister is bad', 'Quiz2'),
(43, '6', 'The first Italian verb most students learn is the verb \"to be\", which is \"essere\" in Italian. \"I am\" is \"io sono\", so how do you say \"you are\"?', '', '', '', '', '', 'Tu sei', 'Quiz2'),
(44, '7', 'The second verb most students of Italian learn is \"to have\", which in Italian is \"avere\". How will you say \"we have\"?', 'Lei ha', 'Voi avete', 'Noi abbiamo', 'Noi siamo', '', 'Noi abbiamo', 'Quiz2'),
(45, '8', 'Personal names are pronounced differently in Italian - for example, the English \"Henry\" becomes \"Enrico\". How is \"Andrew\" written in Italian?', '', '', '', '', '', 'Andrea', 'Quiz2'),
(46, '9', 'Which of the following is a common word for \"thank you\" in Italian?', 'Gracias', 'Grazie', 'Per favore', 'Scusa', '', 'Grazie', 'Quiz2'),
(47, '16', 'how you rate our quiz? :)', '1', '2', '3', '4', '5', '5', 'Quiz for beginners'),
(48, '17', 'How is \"private toilet\" in italian?', '', '', '', '', '', 'bagno privato', 'Quiz for beginners');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `total_question` varchar(100) NOT NULL,
  `correct_answer` varchar(100) NOT NULL,
  `wrong_answer` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `email`, `type`, `total_question`, `correct_answer`, `wrong_answer`, `time`) VALUES
(1, 'michal', 'php', '1', '1', '0', '2023-08-14'),
(2, 'michal', 'php', '1', '1', '0', '2023-08-14'),
(3, 'michal', 'php', '1', '1', '0', '2023-08-14'),
(4, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(5, 'michal', 'php', '1', '0', '1', '2023-08-14'),
(6, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(7, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(8, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(9, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(10, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(11, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(12, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(13, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(14, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(15, 'michal', 'php', '1', '2', '-1', '2023-08-14'),
(16, 'michal', 'PROPER', '1', '2', '-1', '2023-08-14'),
(17, 'michal', 'PROPER', '1', '2', '-1', '2023-08-14'),
(18, 'michal', 'PROPER', '0', '3', '-3', '2023-08-14'),
(19, 'michal', 'PROPER', '0', '1', '-1', '2023-08-14'),
(20, 'michal', 'PROPER', '0', '3', '-3', '2023-08-14'),
(21, 'michal', 'PROPER', '3', '3', '0', '2023-08-14'),
(22, 'michal', 'PROPER', '3', '1', '2', '2023-08-14'),
(23, 'michal', 'PROPER', '3', '1', '2', '2023-08-14'),
(24, 'michal', 'php', '3', '3', '0', '2023-08-14'),
(25, 'michal', 'haha', '0', '0', '0', '2023-08-15'),
(26, 'michal', 'haha', '0', '0', '0', '2023-08-15'),
(27, 'michal', 'haha', '0', '0', '0', '2023-08-15'),
(28, 'michal', 'PROPER', '3', '0', '3', '2023-08-15'),
(29, 'michal', 'PROPER', '3', '0', '3', '2023-08-15'),
(30, 'michal', 'haha', '0', '1', '-1', '2023-08-15'),
(31, 'michal', 'haha', '0', '1', '-1', '2023-08-15'),
(32, 'michal', 'haha', '0', '0', '0', '2023-08-17'),
(33, 'michal', 'php', '4', '3', '1', '2023-08-17'),
(34, 'michal', 'php', '4', '3', '1', '2023-08-17'),
(35, 'michal', 'php', '4', '4', '0', '2023-08-17'),
(36, 'michal', 'php', '4', '4', '0', '2023-08-17'),
(37, 'michal', 'php', '4', '3', '1', '2023-08-17'),
(38, 'michal', 'php', '4', '3', '1', '2023-08-17'),
(39, 'michal', 'haha', '0', '1', '-1', '2023-08-17'),
(40, 'michal', 'php', '4', '3', '1', '2023-08-17'),
(41, 'michal', 'php', '4', '4', '0', '2023-08-17'),
(42, 'michal', 'php', '4', '4', '0', '2023-08-17'),
(43, 'michal', 'haha', '0', '0', '0', '2023-08-17'),
(44, 'michal', 'haha', '3', '2', '1', '2023-08-17'),
(45, 'michal', 'haha', '3', '2', '1', '2023-08-17'),
(46, 'michal', 'php', '4', '4', '0', '2023-08-17'),
(47, 'michal', 'haha', '4', '2', '2', '2023-08-17'),
(48, 'michal', 'haha', '4', '2', '2', '2023-08-17'),
(49, 'michal', 'haha', '4', '2', '2', '2023-08-17'),
(50, 'michal', 'haha', '4', '4', '0', '2023-08-17'),
(51, 'michal', 'haha', '4', '2', '2', '2023-08-17'),
(52, 'michal', 'haha', '4', '4', '0', '2023-08-17'),
(53, 'michal', 'haha', '4', '4', '0', '2023-08-17'),
(54, 'michal', 'haha', '4', '2', '2', '2023-08-17'),
(55, 'michal', 'haha', '4', '3', '1', '2023-08-17'),
(56, 'michal', 'php', '4', '0', '4', '2023-08-17'),
(57, 'michal', 'haha', '4', '3', '1', '2023-08-17'),
(58, 'michal', 'haha', '4', '4', '0', '2023-08-17'),
(59, 'michal', 'haha', '4', '4', '0', '2023-08-17'),
(60, 'test2', 'php', '4', '0', '4', '2023-09-03'),
(61, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(62, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(63, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(64, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(65, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(66, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(67, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(68, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(69, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(70, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(71, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(72, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(73, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(74, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(75, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(76, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(77, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(78, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(79, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(80, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(81, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(82, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(83, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(84, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(85, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(86, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(87, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(88, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(89, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(90, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(91, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(92, 'ksikora', 'test', '2', '0', '2', '2023-09-03'),
(93, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(94, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(95, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(96, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(97, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(98, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(99, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(100, 'ksikora', 'test', '2', '1', '1', '2023-09-03'),
(101, 'ksikora', 'test', '2', '1', '1', '2023-09-04'),
(102, 'ksikora', 'test', '2', '1', '1', '2023-09-04'),
(103, 'ksikora', 'test', '2', '1', '1', '2023-09-04'),
(104, 'ksikora', 'test', '2', '1', '1', '2023-09-04'),
(105, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(106, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(107, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(108, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(109, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(110, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(111, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(112, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(113, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(114, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(115, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(116, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(117, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(118, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(119, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(120, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(121, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(122, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(123, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(124, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(125, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(126, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(127, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(128, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(129, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(130, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(131, 'ksikora', 'test', '2', '0', '2', '2023-09-04'),
(132, 'ksikora', 'test', '2', '1', '1', '2023-09-04'),
(133, 'ksikora', 'wqe', '0', '0', '0', '2023-09-04'),
(134, 'ksikora', 'haha', '4', '1', '3', '2023-09-04'),
(135, 'ksikora', 'haha', '4', '1', '3', '2023-09-04'),
(136, 'ksikora', 'Quiz for beginners', '15', '15', '0', '2023-09-04'),
(137, 'mi', 'Quiz for beginners', '15', '6', '9', '2023-09-05'),
(138, 'mi', 'Quiz for beginners', '15', '6', '9', '2023-09-05'),
(139, 'mi', 'Quiz for beginners', '16', '7', '9', '2023-09-05'),
(140, 'mi', 'Quiz for beginners', '17', '8', '9', '2023-09-05'),
(141, 'mi', 'Quiz2', '9', '1', '8', '2023-09-05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `registration`
--

INSERT INTO `registration` (`id`, `firstname`, `email`, `password`) VALUES
(1, 'michal', 'michal.w@gmail.com', 'haha'),
(2, 'michalww', 'mcsa', 'dsadsa'),
(3, 'okej', 'okej', 'okej'),
(4, 'Mich', 'michal', 'wasilewski'),
(5, '', '', ''),
(6, '123', '123', '123'),
(7, '123', '22', '3'),
(8, '123', '33', '33'),
(9, '123', '222', '555'),
(10, '2222', '3333', '555555'),
(11, 'karol', 'karol', 'karol'),
(13, 'karol1', 'karol1', 'karol1'),
(14, 'kkk', 'kkk', '$2y$10$2l1QwPckE/fCOWs0kHGjgufrwOxfqkwYLopJJI6mnqu'),
(15, 'karol123', 'karol123', '$2y$10$/h76Kl/YxEEz.u4FfyvEieh3vRQGt5Ff./LlL2MqGYt'),
(16, 'test', 'test', '$2y$10$P6VlNWfDIs9cKkcY1YtDuOj1nLNREtuMouYfN5cjMDB'),
(17, 'kkkk', 'kkkk', '$2y$10$l6YONTWYuN8MfDo7KdWfCeJ/JJgyydmZZd5rl4GvrqN'),
(18, 'test1', 'test1', '$2y$10$DRHEdwoalz3u5ZTFm.iIFOgPZAAg9uaVPtQOPQnn.d2'),
(19, 'test2', 'test2', '$2y$10$Cq39iNBUAXwjtdf3q/u55OcScU5Am7bzxgk9gwxFadT6LZW98RBj2'),
(20, 'ksikora', 'ksikora', '$2y$10$wlPo7hjj20tOZsKR05v.IObx9iLIgetkUmg3WyOfKGfoGViGsgthO'),
(21, 'michalek', 'mi', '$2y$10$xBesMumsGI9hXJGWwNEO9.mhSdDSG5jYZXk.CEyIUN.lOWTLsq/JK');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT dla tabeli `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
