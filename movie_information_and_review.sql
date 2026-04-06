-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2026 at 10:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_information_and_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `gender`, `DOB`, `bio`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Shah Rukh Khan', 'Male', '1965-11-02', 'King of Bollywood, famous for romantic and action films.', 'actors/QkP8SrXFdIcgr7U3ISJXTlkYr7ZqzXhASamVWFR9.jpg', '2026-01-07 09:09:15', '2026-01-07 03:52:34'),
(2, 'Amitabh Bachchan', 'Male', '1942-10-11', 'Legendary actor with decades of iconic roles.', 'actors/ivejiK2d0LiDKYUsN1lzgfRMOD5d9zQSgy6blNlS.jpg', '2026-01-07 09:09:15', '2026-01-07 03:52:44'),
(3, 'Salman Khan', 'Male', '1965-12-27', 'Superstar known for action and family films.', 'actors/tlZM0So8EvOl4RVRrpKuX3EUWGC9pncOXMZnHxHv.jpg', '2026-01-07 09:09:15', '2026-01-07 03:55:37'),
(4, 'Aamir Khan', 'Male', '1965-03-14', 'Actor and filmmaker, known for meaningful cinema.', 'actors/KdUpoVrJOS9KnucXx1qBWmCCI9ok41gc0SCjp5SA.jpg', '2026-01-07 09:09:15', '2026-01-07 03:55:47'),
(5, 'Ranveer Singh', 'Male', '1985-07-06', 'Known for energetic performances and versatility.', 'actors/J1WTqrN8oacUtkMK3SeVnQ9bXAj6VajeqEnHEszR.jpg', '2026-01-07 09:09:15', '2026-01-07 03:59:09'),
(6, 'Ranbir Kapoor', 'Male', '1982-09-28', 'Popular actor from the Kapoor family.', 'actors/JfBuMmdPyT3pEn7VnEhhrrz8C9Vv1Sn9xxWGZXTN.jpg', '2026-01-07 09:09:15', '2026-01-07 04:13:37'),
(7, 'Hrithik Roshan', 'Male', '1974-01-10', 'Famous for dancing skills and action roles.', 'actors/5mii2q6PtpLav5VzHfHHNAoHr23hugg4CXdtN8eC.jpg', '2026-01-07 09:09:15', '2026-01-07 04:01:17'),
(8, 'Deepika Padukone', 'Female', '1986-01-05', 'Top actress known for romantic and dramatic roles.', 'actors/MaGaKrJUbPE8ulKkIVKdRGk7zMjRWm96LcFraKBg.jpg', '2026-01-07 09:09:15', '2026-01-07 04:02:49'),
(9, 'Priyanka Chopra', 'Female', '1982-07-18', 'Actress and international celebrity.', 'actors/cYvXBYc8DVsj0GvvoGBDMVNSeX1RXVUtDMY4U4UI.jpg', '2026-01-07 09:09:15', '2026-01-07 04:01:40'),
(10, 'Kareena Kapoor Khan', 'Female', '1980-09-21', 'Popular actress from the Kapoor family.', 'actors/3JIBm5yLVQjp1UrSl7pRM0jpkimKSJYaH0V4ARdi.jpg', '2026-01-07 09:09:15', '2026-01-29 04:19:35'),
(11, 'Alia Bhatt', 'Female', '1993-03-15', 'Young actress known for versatile roles.', 'actors/WLvFiIkSPLNChA0tRvb6XfDf6CmWTgljO4Mqynz9.jpg', '2026-01-07 09:09:15', '2026-01-07 04:17:09'),
(12, 'Katrina Kaif', 'Female', '1983-07-16', 'Popular Bollywood actress and dancer.', 'actors/f5eptmiCIKg817rQtJUkFRUnCd6mg76MaCSUjyir.jpg', '2026-01-07 09:09:15', '2026-01-07 04:05:24'),
(13, 'Akshay Kumar', 'Male', '1967-09-09', 'Known for action films and comedy roles.', 'actors/2PxcSF1H5ais1xi51eJEo0C0epjirM1BXQ1T5pE3.jpg', '2026-01-07 09:09:15', '2026-01-07 04:05:39'),
(14, 'Anushka Sharma', 'Female', '1988-05-01', 'Bollywood actress and producer known for versatile roles.', 'actors/JkdroPangHF2y5BYHvqCB5HIY8HZw5d7wwqvPG1k.jpg', '2026-01-07 09:09:15', '2026-01-07 04:07:36'),
(15, 'Madhuri Dixit', 'Female', '1967-05-15', 'Legendary actress and iconic dancer.', 'actors/cpS5RXKpoOlaD1k25G56RpAOj2kcJK4Rd4BFAabv.jpg', '2026-01-07 09:09:15', '2026-01-07 04:06:08'),
(16, 'Kajol Devgan', 'Female', '1974-08-05', 'Popular Bollywood actress, known for romance and family films.', 'actors/iMIOPh1SoJ6wMOgKRMvxjrUdREmDColTf4rXYRrt.jpg', '2026-01-08 11:28:12', '2026-01-16 06:39:34'),
(17, 'Sushant Singh Rajput', 'Male', '1986-01-21', 'Known for versatile roles in Bollywood.', 'actors/0iW33tIOUN6b79htDnnsWVhhxOrwQd5P1citZYDH.jpg', '2026-01-08 11:28:12', '2026-01-08 06:00:49'),
(18, 'Shraddha Kapoor', 'Female', '1987-03-03', 'Famous actress and singer in Bollywood.', 'actors/v2Pb0Dh7vlPuo4sj4oqRFPIVFFIVRLAPk1HxZVoK.jpg', '2026-01-08 11:28:12', '2026-01-08 06:25:54'),
(19, 'Shahid Kapoor', 'Male', '1981-02-25', 'Known for romantic and action roles.', 'actors/kh6Q5wXOB1u4s4GrozS5VJHssIAFharnCbI09LgT.jpg', '2026-01-08 11:28:12', '2026-01-08 06:27:19'),
(20, 'Kiara Advani', 'Female', '1992-07-31', 'Bollywood actress known for versatility.', 'actors/g7K4H6jdkQ4ZZBBwvgyIUEieV1TAY6pHTjn4wRjA.jpg', '2026-01-08 11:28:12', '2026-01-08 06:27:39'),
(21, 'Abhay Deol', 'Male', '1976-03-15', 'Bollywood actor known for unconventional roles.', 'actors/7Ybp9mW2qNoWd04N6PIt7UsahVYP5u1wbIrlh2iX.jpg', '2026-01-08 11:28:12', '2026-01-08 06:29:05'),
(22, 'Aishwarya Rai', 'Female', '1973-11-01', 'Internationally acclaimed Bollywood actress.', 'actors/D6d5ZrJ1konYL5cuqJCvM1qJW1mjaUTBkPsEu308.jpg', '2026-01-08 11:28:12', '2026-01-08 06:32:20'),
(23, 'Sakshi Tanwar', 'Female', '1973-07-27', 'Famous TV and Bollywood actress.', 'actors/mGGBd0ahGa4H3ca5X4isljGgG44npeaTDYTACgg4.jpg', '2026-01-08 11:28:12', '2026-01-08 06:31:31'),
(24, 'R. Madhavan', 'Male', '1970-06-01', 'Popular Bollywood and Tamil actor, known for versatile roles.', 'actors/cBXw1gzMFMugVgZaFJHvBgx2EiepUWQrj7ihapqx.jpg', '2026-01-08 12:05:54', '2026-01-08 06:36:56'),
(25, 'Kangana Ranaut', 'Female', '1987-03-23', 'Renowned Bollywood actress, known for strong and bold characters.', 'actors/9BxNwWQ3ZllmjZjrooFuqJyiIYp47hZfLbssQNkU.jpg', '2026-01-08 12:05:54', '2026-01-08 06:37:24'),
(26, 'Ahaan Panday', 'Male', '1995-01-02', 'Lead actor of Saiyaara (2025).', 'actors/ovaFZwlIh9fdhBIJd7ByvaI7rKb8MiaM9ZZdMqj9.jpg', '2026-01-08 12:09:47', '2026-01-08 06:41:17'),
(27, 'Aneet Padda', 'Male', '1998-01-01', 'Lead actor of Saiyaara (2025).', 'actors/iwFEBWozsKTyDI8Mcjq2MwTAA0vDCy866qK7wRBM.jpg', '2026-01-08 12:09:47', '2026-01-08 06:41:41'),
(28, 'Vicky Kaushal', 'Male', '1988-05-16', 'His powerful and realistic performances.', 'actors/CREqwOi46PNHBTTwaI7oueJUEsJR1VBlFY1ixUky.jpg', '2026-01-12 04:55:36', '2026-01-12 04:55:59'),
(29, 'Ajay Devgn', 'Male', '1969-04-02', 'Bollywood actor and filmmaker', 'actors/cbcue9a5jrFcxtofvKQPObY5dGsJQScXDX27EbIM.jpg', '2026-01-29 04:16:07', '2026-01-29 04:16:38'),
(30, 'Prabhas', 'Male', '1979-10-23', 'King of South movies, famous for action films.', 'actors/I7YwGKx2hqro2hlYAgahxjsON2LqCHSo1M8M5dC7.jpg', '2026-01-30 07:04:30', '2026-01-30 07:04:30'),
(36, 'Varun Dhawan', 'Male', '1987-04-24', 'He is Indian actor, known for his energetic performances in Bollywood', 'actors/6hG3g99U1t2ziOw5aO3kyfCZDlZyL5ix7qcO2qOL.jpg', '2026-04-03 07:14:54', '2026-04-03 07:14:54'),
(37, 'Sidharth Malhotra', 'Male', '1985-01-16', 'He is an Indian actor and former model.', 'actors/lI45cnlZ2lRg75UiuoIeOe0V5FIkQhQp700Tt24z.jpg', '2026-04-03 07:17:49', '2026-04-03 07:18:32'),
(38, 'Tabassum Fatima Hashmi (Tabu)', 'Female', '1971-11-04', 'She is a critically acclaimed Indian actress.', 'actors/CelRKRQvksFcmm3LZqTG0bwYXNIiPrDwJN2DQBIR.jpg', '2026-04-03 07:46:08', '2026-04-03 07:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `DOB` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `gender`, `DOB`, `bio`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Rajkumar Hirani', 'Male', '1962-11-20', 'Famous for movies like 3 Idiots and PK.', 'directors/10EA1eKFDhWNDgkBfyLjid6hVsVVBX9pqSHot5MV.jpg', '2026-01-07 09:09:54', '2026-01-07 04:10:01'),
(2, 'Karan Johar', 'Male', '1972-05-25', 'Known for romantic and family dramas.', 'directors/y5RUnxgHVBEikGIFFemSAtGMWiyv5PaG7DIqWuzS.jpg', '2026-01-07 09:09:54', '2026-01-07 04:10:10'),
(3, 'Sanjay Leela Bhansali', 'Male', '1963-02-24', 'Known for visually grand and dramatic films.', 'directors/MAAAG7lce2quNlnQYkpJC4hjwFd6qQpQ9yVFKDzj.jpg', '2026-01-07 09:09:54', '2026-01-07 04:12:09'),
(4, 'Anurag Kashyap', 'Male', '1972-09-10', 'Known for dark, realistic cinema.', 'directors/B02j3cwbjKlHHAe2MeA516MLrfjvw0Opv8y0u9A4.jpg', '2026-01-07 09:09:54', '2026-01-07 04:11:28'),
(5, 'Rohit Shetty', 'Male', '1973-03-14', 'Famous for action and comedy franchises.', 'directors/5TeOCAS4KeupugG3P7X2dLMdMWhQThbMk86ZAGx0.jpg', '2026-01-07 09:09:54', '2026-01-07 04:19:07'),
(6, 'Imtiaz Ali', 'Male', '1971-06-16', 'Known for romantic films like Jab We Met.', 'directors/o9JcBfGE9HfWPlGxSpkBdlO91cIevnt8gtfHb7OT.jpg', '2026-01-07 09:09:54', '2026-01-07 04:19:21'),
(7, 'Farah Khan', 'Female', '1965-01-09', 'Choreographer and director, famous for Bollywood musicals.', 'directors/2Akk7IWsOAaxyZ6DIDR4eHcz9ZJSyrG22WMGPT9Q.jpg', '2026-01-07 09:09:54', '2026-01-07 04:19:58'),
(8, 'Zoya Akhtar', 'Female', '1972-10-14', 'Known for contemporary, realistic cinema.', 'directors/n9tfjEHxUshQtvUsIDQDcBb51e6eJ4fqwBwv8DIe.jpg', '2026-01-07 09:09:54', '2026-01-07 04:20:37'),
(9, 'Vishal Bhardwaj', 'Male', '1965-08-24', 'Known for adapting Shakespeare plays into films.', 'directors/92I1660Tt6A8Pvu2pVn6vEL3Q9Ygcv7IpjQ9lwSQ.jpg', '2026-01-07 09:09:54', '2026-01-07 04:21:15'),
(10, 'Madhur Bhandarkar', 'Male', '1968-08-26', 'Famous for realistic social drama films.', 'directors/9qazuxAEvcS09Sphl5aEZb023Ex1IUcEeNbd4znz.jpg', '2026-01-07 09:09:54', '2026-01-07 04:21:48'),
(11, 'Ashutosh Gowariker', 'Male', '1964-02-15', 'Known for historical and epic films.', 'directors/pZue7NLOucrX108zxt56s2BrpgbO1KKcqS6hzwxB.jpg', '2026-01-07 09:09:54', '2026-01-07 04:24:57'),
(12, 'Abhishek Kapoor', 'Male', '1971-08-06', 'Director of films like Kai Po Che and Rock On!!', 'directors/PYQUYUIiuJ3M2d7Zt2w4panvtp3umHTC47QZ4zGm.jpg', '2026-01-07 09:09:54', '2026-01-07 04:26:07'),
(13, 'Kundan Shah', 'Male', '1955-12-18', 'Legendary director of comedy classics like Jaane Bhi Do Yaaro.', 'directors/yQ6za90thjy3fjamYVGtyRcAH0CxilcWvQkGw6xk.jpg', '2026-01-07 09:09:54', '2026-01-07 04:26:25'),
(14, 'Rakesh Roshan', 'Male', '1949-09-06', 'Director of hit films like Krrish and Kaho Naa... Pyaar Hai.', 'directors/7OdvNl4bmbrOs6MXAokPcjYBT7119UcEw50Xvzeh.jpg', '2026-01-07 09:09:54', '2026-01-07 04:28:51'),
(15, 'Gauri Shinde', 'Female', '1973-07-06', 'Director of contemporary films like English Vinglish.', 'directors/Wc8cgpZArmsZsWQulOFWiyct4qRjvwvqvxo51MJs.jpg', '2026-01-07 09:09:54', '2026-01-07 04:27:47'),
(16, 'Aditya Chopra', 'Male', '1971-05-21', 'Bollywood director and head of Yash Raj Films, famous for DDLJ.', 'directors/JKsEKP5LZ4dwLPY0FFKkVbGeGmdIilhUOc36Mg8P.jpg', '2026-01-30 05:05:33', '2026-01-30 05:10:29'),
(17, 'Kabir Khan', 'Male', '1968-09-14', 'Bollywood director known for action and patriotic films.', 'directors/FyqqEZuyM088rhNVm4IUb54yn1m4zC387hMITjuu.jpg', '2026-01-30 05:10:07', '2026-01-30 05:10:39'),
(18, 'Nitesh Tiwari', 'Male', '1973-05-22', 'Bollywood director and screenwriter.', 'directors/XiPpTU61ij0YbGBDypPuH0AezGzXJwRb5SLw3X9x.jpg', '2026-01-30 05:16:41', '2026-01-30 05:16:41'),
(19, 'Sandeep Reddy Vanga', 'Male', '1981-12-25', 'Known for films like Arjun Reddy and Kabir Singh.', 'directors/jOOgcmE4nvGq7rMwn9gEqoSCXh1YpExePoUiwVBD.jpg', '2026-01-30 05:36:22', '2026-01-30 05:36:22'),
(20, 'Anurag Basu', 'Male', '1970-05-08', 'Director known for films like Barfi! and Life in a… Metro.', 'directors/f5uzizzNCUqz1QgZg8rRmu2ueKwJ1Now204EqGQx.jpg', '2026-01-30 05:43:50', '2026-01-30 05:43:50'),
(21, 'Aanand L. Rai', 'Male', '1971-06-28', 'Director known for films like Tanu Weds Manu and Zero.', 'directors/f6SHe51AKBl3STu9h6Vw7ocZMmcCfHwiq9RYVxyy.jpg', '2026-01-30 05:49:12', '2026-01-30 05:49:12'),
(22, 'Rahul Dholakia', 'Male', '1980-06-08', 'Director known for films like Parzania and Raees.', 'directors/tlvwRoEx8R27WSSOC0Razp0hiSEJ7sQDC3eHnS1j.jpg', '2026-01-30 06:34:26', '2026-01-30 06:34:26'),
(23, 'Ayan Mukerji', 'Male', '1983-08-15', 'Known for comedy and epic films.', 'directors/g5EZ07yKs14lrxCt9qPjmrKFxV9HxTvdmHVDv8Pc.jpg', '2026-01-30 06:38:08', '2026-01-30 06:38:08'),
(24, 'Mohit Suri', 'Male', '1981-04-11', 'Known for romantic films like Aashiqui 2.', 'directors/YgCoFynHnA4IWi0W4U31cVDzPyfvlFq3SiIoBebU.jpg', '2026-01-30 06:41:56', '2026-01-30 06:41:56'),
(25, 'Siddharth Anand', 'Male', '1978-07-31', 'Known for realistic action drama.', 'directors/w2cQ8X3evB5h1fQCztPxuz4kgYCJwL5DCEmCjQaD.jpg', '2026-01-30 06:45:06', '2026-01-30 06:45:06'),
(26, 'Ali Abbas Zafar', 'Male', '1982-01-17', 'Director known for films like Sultan and Tiger Zinda Hai.', 'directors/5dRxIXm9qyb5G6VQi3G7OpbBvINgGby5NIP2TcTA.jpg', '2026-01-30 06:48:16', '2026-01-30 06:48:16'),
(27, 'Ramesh Sippy', 'Male', '1947-01-23', 'Director known for films like Sholay.', 'directors/kDbjGQZR2q5yeEMokYF3wPa06a83gye6GjP391VN.jpg', '2026-01-30 06:57:43', '2026-01-30 06:57:43'),
(28, 'S. S. Rajamouli', 'Male', '1973-10-10', 'Director known for films like Baahubali and RRR.', 'directors/cDsuEKIt4XDNugRWZxwKZ2idw41cRata4cu1LeG1.jpg', '2026-01-30 07:02:27', '2026-01-30 07:02:27'),
(29, 'Meghna Gulzar', 'Female', '1973-12-13', 'Famous for thriller films.', 'directors/kjPxIEUlPN6WkVixuNKNRqeamHQfVvegC63ZyffY.jpg', '2026-01-30 07:12:19', '2026-01-30 07:12:19'),
(30, 'Aamir Khan', 'Male', '1965-03-14', 'Actor and filmmaker, known for meaningful cinema.', 'directors/9aifQDE2g23PApgXqUKfJAh297QMYGQfkVeW3jLh.jpg', '2026-02-03 03:41:15', '2026-02-03 03:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Action', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(2, 'Adventure', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(3, 'Comedy', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(4, 'Drama', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(5, 'Horror', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(6, 'Romance', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(7, 'Thriller', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(8, 'Sci-Fi', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(9, 'Fantasy', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(10, 'Animation', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(11, 'Documentary', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(12, 'Mystery', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(13, 'Crime', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(14, 'Musical', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(15, 'Family', '2026-01-07 09:07:03', '2026-01-07 09:07:03'),
(17, 'Sports', '2026-02-03 00:54:47', '2026-02-03 00:54:47'),
(18, 'Biopic', '2026-02-03 01:02:56', '2026-02-03 01:02:56'),
(19, 'Spy', '2026-02-03 01:06:27', '2026-02-03 01:06:27'),
(23, 'War', '2026-02-18 04:57:52', '2026-02-18 04:57:52'),
(24, 'History', '2026-02-18 04:58:59', '2026-02-18 04:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(2, 'Hindi', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(3, 'Spanish', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(4, 'French', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(5, 'German', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(6, 'Chinese', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(7, 'Japanese', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(8, 'Korean', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(9, 'Italian', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(10, 'Portuguese', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(11, 'Russian', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(12, 'Arabic', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(13, 'Bengali', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(14, 'Gujarati', '2026-01-07 09:07:44', '2026-01-07 09:07:44'),
(15, 'Tamil', '2026-01-07 09:07:44', '2026-01-07 09:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '0001_01_01_000001_create_cache_table', 1),
(14, '0001_01_01_000002_create_jobs_table', 1),
(15, '2025_12_24_101916_create_genres_table', 1),
(16, '2025_12_24_102225_create_actors_table', 1),
(17, '2025_12_24_102256_create_directors_table', 1),
(18, '2025_12_24_102328_create_languages_table', 1),
(19, '2025_12_24_102350_create_roles_table', 1),
(20, '2025_12_24_102934_create_movies_table', 1),
(21, '2025_12_24_103050_create_movie_genres_table', 1),
(22, '2025_12_24_110755_create_sessions_table', 1),
(23, '2025_12_30_110437_create_users_table', 1),
(24, '2025_12_30_110507_create_reviews_table', 1),
(25, '2026_01_08_112335_create_movie_actors_table', 2),
(26, '2026_01_08_122010_create_movie_actors_table', 3),
(27, '2026_01_09_055558_remove_actor_id_from_movies_table', 4),
(28, '2026_01_12_051459_create_movie_actors_table', 5),
(29, '2026_01_12_054103_create_watchlists_table', 6),
(30, '2026_01_15_050943_add_settings_columns_to_users_table', 7),
(31, '2026_01_22_053749_make_rating_comment_nullable_in_watchlists', 8),
(32, '2026_02_03_054959_drop_genre_id_from_movies_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `director_id` bigint(20) UNSIGNED NOT NULL,
  `duration` text NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `release_year` year(4) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `trailer_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `slug`, `director_id`, `duration`, `language_id`, `release_year`, `description`, `image`, `trailer_link`, `created_at`, `updated_at`) VALUES
(1, '3 Idiots', '3-idiots', 1, '170', 2, '2009', 'A story about friendship and pressure of engineering colleges.', 'movies/E5Ab4cBvRDRe1xsUxvamlEhOVa5VmowZyazeABZh.jpg', 'https://youtu.be/K0eDlFX9GMc?si=K3h87G4ZLemTlA4Y', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(2, 'Dilwale Dulhania Le Jayenge', 'dilwale-dulhania-le-jayenge', 16, '190', 2, '1995', 'Classic romance of Raj and Simran.', 'movies/z40pKxP8jBpa5NqFoBVbNggnyXeXzVMsVrjcO4Io.jpg', 'https://youtu.be/cmax1C1p660?si=hE58maA5bfUZluZ5', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(3, 'Bajrangi Bhaijaan', 'bajrangi-bhaijaan', 17, '159', 2, '2015', 'A man helps a lost Pakistani girl reunite with her family.', 'movies/1d3A8U3rsce47zcQHUWTp9pzhpunCPBm7kYqGKi5.jpg', 'https://youtu.be/4nwAra0mz_Q?si=-3uTX3_CbyZoQBvS', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(4, 'Padmaavat', 'padmaavat', 3, '164', 2, '2018', 'Epic tale of Queen Padmavati.', 'movies/GBYvrnGEUuYxLVNL0hvCQgTBCyHvQtjHCQhNZZD6.jpg', 'https://youtu.be/X_5_BLt76c0?si=N03xGL_V2eMIh3e-', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(5, 'Chhichhore', 'chhichhore', 18, '143', 2, '2019', 'A story about college life and dealing with failure.', 'movies/2KmlsNK53S3cGLNuEckB62Nf8PP7v0WGCOIVHzIB.jpg', 'https://youtu.be/t56jPOpGFts?si=KysiOyzkpvzc18p_', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(6, 'Dangal', 'dangal', 18, '161', 2, '2016', 'A father trains his daughters to become wrestling champions.', 'movies/wuo9TDUNYYuIOjhTZyeC2cQ2VVCihh6xbzHx19oN.jpg', 'https://youtu.be/x_7YlGv9u1g', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(7, 'Kabir Singh', 'kabir-singh', 19, '172', 2, '2019', 'A passionate surgeon falls into self-destruction after heartbreak.', 'movies/T4apwpYjcXIdXyl4x9BWNmTERHc5LJYPRtyJ8oLJ.jpg', 'https://youtu.be/RiANSSgCuJk?si=-5xRF9hIqfbYFGtP', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(8, 'Zindagi Na Milegi Dobara', 'zindagi-na-milegi-dobara', 8, '155', 2, '2011', 'Three friends experience life-changing adventures in Spain.', 'movies/42xmOiLqaFFT5N6jcSF7OPcMYbDUZF85tmFLlqVF.jpg', 'https://youtu.be/FJrpcDgC3zU?si=e_NRjQ9aIr3g6vdZ', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(9, 'Barfi!', 'barfi', 20, '151', 2, '2012', 'A touching story of love and disabilities.', 'movies/ZqIHmPDW6rpMQMeY2nsMJbZB3nkjUF151leCf3HV.jpg', 'https://youtu.be/nQ3FYUgSjC8?si=HX-smWq02mvzjOpu', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(10, 'Tanu Weds Manu', 'tanu-weds-manu', 21, '119', 2, '2011', 'A quirky love story with comical situations.', 'movies/XvcxMMgasWpq0lkfM3QyhGICYUer4BlrAcFu7GzT.jpg', 'https://youtu.be/hq0RMAuQGWA?si=PWhr53DqdxuxpUp8', '2026-01-07 09:11:00', '2026-02-19 03:54:35'),
(11, 'Bajirao Mastani', 'bajirao-mastani', 3, '158', 2, '2015', 'Epic romance of Peshwa Bajirao and Mastani.', 'movies/EjOh1S0Bx6UDwRUYJCPeZ8iGtI98x5nvHvfvdEJS.jpg', 'https://youtu.be/eHOc-4D7MjY?si=FSkTHRfmWnECSMee', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(12, 'Raees', 'raees', 22, '143', 2, '2017', 'A bootlegger rises in Gujarat, India.', 'movies/9AVa8XaGFXnDLeoRH5AHxhfrEBaa69PwFA4YjaDz.jpg', 'https://youtu.be/8iv3ksZs0hk?si=S-ZqcSEthVXvqOb3', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(13, 'Ae Dil Hai Mushkil', 'ae-dil-hai-mushkil', 2, '157', 2, '2016', 'A story of unrequited love and friendship.', 'movies/8JUtJXTh9GHAVOCh6Ro2yrBIKXwpkn0qA5MfOPZK.jpg', 'https://youtu.be/Z_PODraXg4E?si=VkRuGXSu8BpGbYhn', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(14, 'Yeh Jawaani Hai Deewani', 'yeh-jawaani-hai-deewani', 23, '160', 2, '2013', 'A story about friendship, love, and chasing dreams.', 'movies/5j985oQtxwGcsfvUY97nbjZl7wOxKXfyVG77cBQy.jpg', 'https://youtu.be/Rbp2XUSeUNE?si=XfHTQgL12tKJmeZM', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(15, 'My Name is Khan', 'my-name-is-khan', 2, '161', 2, '2010', 'A man with Asperger’s syndrome travels across the U.S. to meet the president.', 'movies/QjtMrHRsVIpgOn6Z61NQudo0A4ODpQUEsEOwQ3pN.jpg', 'https://youtu.be/nqxgYT3TYzY?si=OmrMFrbv86YrJraV', '2026-01-07 09:11:00', '2026-02-17 07:02:51'),
(16, 'Saiyaara', 'saiyaara', 24, '156', 2, '2025', 'A musical love story of a singer and a lyricist.', 'movies/WeQWZNRcZIM146DIPlMovYqJU46DNmQIwWLleEpY.jpg', 'https://youtu.be/9r-tT5IN0vg?si=wdFKThJSENeL01Ex', '2026-01-07 07:38:51', '2026-02-17 07:02:51'),
(18, 'Pathaan', 'pathaan', 25, '146', 2, '2023', 'An action-packed thriller movie.', 'movies/zeQ1PeXdzKtUg4iQn8ra6029KEnKS4fWq4I69SyW.jpg', 'https://youtu.be/vqu4z34wENw?si=8kItF7KDRrSxA8zt', '2026-01-09 00:11:30', '2026-02-17 07:02:51'),
(19, 'Tiger Zinda Hai', 'tiger-zinda-hai', 26, '162', 2, '2017', 'Two spies team up to save hostages.', 'movies/WQWjXzqgymveHC5xgwhu7zWDUnAEwKHsxCgSD3z8.jpg', 'https://youtu.be/ePO5M5DE01I?si=COijA4VT3T94_Cyp', '2026-01-09 00:31:34', '2026-02-17 07:02:51'),
(22, 'Sultan', 'sultan', 26, '170', 2, '2016', 'A wrestler’s journey of love, loss, and comeback.', 'movies/gxAC8Z4mXgc0fGjWWpjUJlWHDsXZKwaGZrUFTHlW.jpg', 'https://youtu.be/wPxqcq6Byq0?si=wfSKCGEGMFb9ZUKK', '2026-01-12 04:31:23', '2026-02-17 07:02:51'),
(23, 'Gangubai Kathiawadi', 'gangubai-kathiawadi', 3, '154', 2, '2022', 'A young woman rises from hardship to become a powerful and respected figure in Mumbai’s red-light district.', 'movies/UloR1LTRVR81ZquOyqMCq7TJvREVIz9RJyNpvXpS.jpg', 'https://youtu.be/N1ZwRv3vJJY?si=EsRaajHm-ZZ5_vdM', '2026-01-29 04:10:21', '2026-02-17 07:02:51'),
(24, 'Lagaan', 'lagaan', 11, '224', 2, '2001', 'Villagers challenge British officers to a cricket match.', 'movies/J8OCK8JK2Z1NSlcBEVvdcfW6tpgzD9UGXuoIkr0B.jpg', 'https://youtu.be/pZuowUaZEqA?si=O5lrKOmaV8ZZWt51', '2026-01-30 10:20:30', '2026-02-17 07:02:51'),
(25, 'Kabhi Khushi Kabhie Gham', 'kabhi-khushi-kabhie-gham', 2, '210', 2, '2001', 'Family drama about love and relationships.', 'movies/W97H6DYkchm48Ol1mi0RgkG8XLCzP7kr8BZv0KkQ.jpg', 'https://youtu.be/WAuft9tqWzc?si=bsDZWRdaSprApnle', '2026-01-30 10:20:30', '2026-02-17 07:02:51'),
(26, 'Sholay', 'sholay', 27, '204', 2, '1975', 'Classic tale of friendship and revenge.', 'movies/1bmVGJMDpWIugxxPUMlgXTeEje7ANBsFT8EfSWz3.jpg', 'https://youtu.be/qbdX6vFbXPw?si=OLVQuoLKxK1aUZ0g', '2026-01-30 10:20:30', '2026-02-17 07:02:51'),
(27, 'Baahubali: The Beginning', 'baahubali-the-beginning', 28, '158', 2, '2015', 'Epic story of power, betrayal, and destiny.', 'movies/Zowy1sZgqJXnhK3fuOswff1oE8MLUhvb9NOSJHMO.jpg', 'https://youtu.be/q2aENKR59w4?si=Hzk-KT9KJV02Fpga', '2026-01-30 10:20:30', '2026-02-17 07:02:51'),
(28, 'PK', 'pk', 1, '152', 2, '2014', 'An alien questions human beliefs and society.', 'movies/CNdv3glNrnd4s6h7fx20azs9227dpvh6IMf9V8dG.jpg', 'https://youtu.be/SOXWc32k4zA?si=bMWu06x1Fv7N25qN', '2026-01-30 10:20:30', '2026-02-17 07:02:51'),
(29, 'Raazi', 'raazi', 29, '140', 2, '2018', 'A young woman becomes a spy during the India-Pakistan war.', 'movies/GEQUp4BEdkigs6soiv0kVSgwVxHPzqeTu7vMCFkG.jpg', 'https://youtu.be/nDbjJVmGV98?si=vzI-T1AMg9SfWF5A', '2026-01-30 10:20:30', '2026-02-17 07:02:51'),
(32, 'Ram-leela', 'ram-leela', 3, '155', 2, '2013', 'Two lovers from rival families fall into a passionate romance that sparks a violent feud in their village.', 'movies/TsyK344bMsJdyr5Qeq9AVLrVti4TeLAvHgHLx9Dz.jpg', 'https://youtu.be/YQPfeinXxcA?si=503h4wuNW_52IjxK', '2026-02-01 23:21:53', '2026-02-17 07:02:51'),
(33, 'Gully Boy', 'gully-boy', 8, '156', 2, '2019', 'An underdog rapper rises from the streets of Mumbai.', 'movies/bTh0riRSYInQw9JC1L3lfKnibUi7WmgQntTzaUwh.jpg', 'https://youtu.be/JfbxcD6biOk?si=jA4jcahjj0cVcPrk', '2026-02-02 00:18:03', '2026-02-17 07:02:51'),
(34, 'Dhoom 3', 'dhoom-3', 5, '160', 2, '2013', 'A thrilling action-packed heist movie.', 'movies/UPgcfGHzd8tMN3v2JdZIdZoAMBRpYDdruAYVNcJf.jpg', 'https://youtu.be/yeF_b8EQcK0?si=7bkvz8hEEYo4vs1f', '2026-02-03 01:19:06', '2026-02-17 07:02:51'),
(35, 'Taare Zameen Par', 'taare-zameen-par', 30, '165', 2, '2007', 'A teacher helps a dyslexic child discover his hidden potential through art.', 'movies/W3fZDZgyGtzVs0wKQu1tQag9Ezv2mX5331sDRlH5.jpg', 'https://youtu.be/YH6k5weqwy8?si=6gmY1dw5Uwo8KKI7', '2026-02-03 03:38:25', '2026-02-17 07:02:51'),
(48, 'Student of the Year', 'student-of-the-year', 2, '146', 2, '2012', 'A story of friendship, love, and competition in college.', 'movies/al95HEfjRkXYHZSfOU2tQ2RCCzEkufpX8lq49pJD.jpg', 'https://youtu.be/fivOhPjX9YM?si=J-toEniSXxGdA9xm', '2026-04-03 07:12:15', '2026-04-03 07:12:15'),
(49, 'Kabhi Alvida Naa Kehna', 'kabhi-alvida-naa-kehna', 2, '192', 2, '2006', 'A story of complex relationships and love after marriage.', 'movies/HS3AApMQIhlrTg5lqfB5FSaO4omfAiTlHHlK6mOf.jpg', 'https://youtu.be/h9fIHRGZKM0?si=cFgo1R84Y2MQYf-p', '2026-04-03 07:22:00', '2026-04-03 07:22:00'),
(50, 'Golmaal Again', 'golmaal-again', 5, '152', 2, '2017', 'A comedy horror film full of fun and madness.', 'movies/yMiC3WQeND1s1HKZWFX6WyZiqVYwHrBWtRC4VLl4.jpg', 'https://youtu.be/VgQUwsUHdqc?si=4T34WovCnC1ToqF-', '2026-04-03 07:25:12', '2026-04-03 07:25:12'),
(51, 'Chennai Express', 'chennai-express', 5, '141', 2, '2013', 'A man’s journey turns into a romantic adventure.', 'movies/u1zX8bixjtgYLw4FDqCvMRdPgOARw1SCE1Q9l2Du.jpg', 'https://youtu.be/hZGR5Sj1Bfo?si=Lhs68QdEb6gyS5oR', '2026-04-03 07:27:33', '2026-04-03 07:27:33'),
(52, 'Singham', 'singham', 5, '143', 2, '2011', 'A fearless cop fights corruption.', 'movies/l0cktIShY2JIidneMIgewDk6zeSTYYDxdDCKEKKd.jpg', 'https://youtu.be/mp-XqCrCi6I?si=z0yo6F5DKJ4r78gC', '2026-04-03 07:30:25', '2026-04-03 07:30:25'),
(53, 'Tamasha', 'tamasha', 6, '139', 2, '2015', 'A journey of self-discovery and love.', 'movies/S4FIkCRxZIDyu9TXeJWwM3UeADZNFA3LxQcyfcUk.jpg', 'https://youtu.be/SyoPN9l86QI?si=rlo_qoXAmo-n4tY8', '2026-04-03 07:32:44', '2026-04-03 07:32:44'),
(54, 'Om Shanti Om', 'om-shanti-om', 7, '171', 2, '2007', 'A reincarnation love story in Bollywood.', 'movies/RE2GvWFXZXpaiPpg1jMpebblRGpxmODTbgLgXlsa.jpg', 'https://youtu.be/9oeGoQGt7Ao?si=2j4NOdtMl8O4xzKW', '2026-04-03 07:36:29', '2026-04-03 07:36:29'),
(55, 'Dil Dhadakne Do', 'dil-dhadakne-do', 8, '171', 2, '2015', 'A dysfunctional family goes on a cruise trip.', 'movies/BC3goWT4Sl5R5xSzDDz3pIBmZPV7YIFkRHwP3pEJ.jpg', 'https://youtu.be/qfnJCv4_1Ts?si=pErnpF7LIhtmhV4U', '2026-04-03 07:39:54', '2026-04-03 07:39:54'),
(56, 'Haider', 'haider', 9, '160', 2, '2014', 'A modern adaptation of Shakespeare’s Hamlet.', 'movies/nZxYhb7gIe6yj0Mns7XWWkqVxg2izWmQIZFe58Vw.jpg', 'https://youtu.be/kxY32xM3VHY?si=WfRAFe2vMrLuDkmQ', '2026-04-03 07:43:07', '2026-04-03 07:43:07'),
(57, 'Omkara', 'omkara', 9, '155', 2, '2006', 'A political crime drama based on Othello.', 'movies/2MEX2QibqNKasOnEJF0BXsRuLi1Rc9WsARtMHtI0.jpg', 'https://youtu.be/OXm25a2qSs0?si=Q3tPBJS-hnTUb2rI', '2026-04-03 07:50:29', '2026-04-03 07:50:29'),
(58, 'Fashion', 'fashion', 10, '165', 2, '2008', 'A story about the rise and fall in fashion industry.', 'movies/tjUrqz1p0LfEeaCraMRoZoxS0DvKv0aRC7y89fJu.jpg', 'https://youtu.be/wD181ALqHmw?si=hxJ7CqF357E4MW_h', '2026-04-03 07:53:11', '2026-04-03 07:53:11'),
(59, 'Heroine', 'heroine', 10, '149', 2, '2012', 'A superstar’s life behind the glamour.', 'movies/VPdDCYbnRHGWLhIyXTlcbSMfd93wm6NVZCr8D5O3.jpg', 'https://youtu.be/lonG_351xgg?si=fBEj6G7x9_LJTgF0', '2026-04-03 07:55:39', '2026-04-03 07:55:39'),
(60, 'Jodhaa Akbar', 'jodhaa-akbar', 1, '213', 2, '2008', 'A historical romance between Akbar and Jodhaa.', 'movies/54ldaKOvLjR1bQ8iNa4RzqdaPYNLA4fR2FPyEVQK.jpg', 'https://youtu.be/vYvl3CIX0zQ?si=oz_fNVJG7q4Ba0ZC', '2026-04-03 13:29:22', '2026-04-03 09:20:49'),
(61, 'Brahmastra', 'rock-on', 23, '167', 2, '2022', 'A fantasy adventure about a powerful weapon.', 'movies/8SzvJGWMJHQHvsuOHZAD6wnd82gOPnyFKlXo3HMa.jpg', 'https://youtu.be/BUjXzrgntcY?si=RFQPcSm2uwu-vBb3', '2026-04-03 13:29:22', '2026-04-03 09:34:55'),
(62, 'Krrish', 'krrish', 1, '175', 2, '2006', 'A superhero story of a man with special powers.', 'movies/W6CHraPnkEcW19wjMqHkaffEn8y5xCglWCxqgh2n.jpg', 'https://youtu.be/3qa3L9rTEG0?si=8yXPCJ7bQmRBCzac', '2026-04-03 13:29:22', '2026-04-03 09:26:31'),
(63, 'English Vinglish', 'english-vinglish', 1, '134', 2, '2012', 'A housewife learns English and gains confidence.', 'movies/BAr4J4jwyBtltUqKL9OKwKKKhvGGCrOTdnzyCYGS.jpg', 'https://youtu.be/wmGVY4T88dc?si=UKJU_15O6k3Ep11G', '2026-04-03 13:29:22', '2026-04-03 09:28:51'),
(64, 'Befikre', 'befikre', 16, '130', 2, '2016', 'A carefree love story set in Paris.', 'movies/JcrgX2L9TD6Lw7A6bWtIupRvT876n1VQpJritN8A.jpg', 'https://youtu.be/p7X7mwcEJ-w?si=_EvKYMFyha4T4nN0', '2026-04-03 13:29:22', '2026-04-03 09:30:44'),
(65, 'Ek Villain', 'ek-villain', 24, '129', 2, '2014', 'A criminal’s life changes after falling in love.', 'movies/ctgGBGxmLO75FaZ8AJfmYJTWQohxw6Ip4mHRvRPz.jpg', 'https://youtu.be/ruO0VrqOkdE?si=lIpMSyItSVH6aoDD', '2026-04-03 15:09:27', '2026-04-03 09:41:44'),
(66, 'Zero', 'malang', 21, '164', 2, '2018', 'A unique love story of a man with a rare condition.', 'movies/ZUasz0aH56XvfHZWpvLfiGO2bHW3E0IU7eO32xBq.jpg', 'https://youtu.be/Ru4lEmhHTF4?si=QcnMYhL3zs-S3UgO', '2026-04-03 15:09:27', '2026-04-03 09:50:16'),
(67, 'Bang Bang', 'bang-bang', 25, '153', 2, '2014', 'An action-packed adventure with romance.', 'movies/5iPBMzmQBQW5xtRLMeJAtENXSDLM9JhBJ1L4zScr.jpg', 'https://youtu.be/MGXQ8bE6lW4?si=sIbTtfpK8MGOHCwV', '2026-04-03 15:09:27', '2026-04-03 09:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actors`
--

CREATE TABLE `movie_actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_actors`
--

INSERT INTO `movie_actors` (`id`, `movie_id`, `actor_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(3, 2, 1, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(4, 2, 16, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(5, 3, 3, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(7, 4, 5, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(8, 4, 8, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(11, 6, 4, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(12, 6, 20, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(13, 7, 19, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(14, 7, 20, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(17, 8, 7, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(18, 9, 6, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(23, 11, 5, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(24, 11, 8, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(25, 12, 1, '2026-01-12 05:16:16', '2026-01-12 05:16:16'),
(26, 18, 1, '2026-01-11 23:58:40', '2026-01-11 23:59:01'),
(27, 13, 6, NULL, NULL),
(28, 13, 14, NULL, NULL),
(29, 14, 6, NULL, NULL),
(30, 14, 8, NULL, NULL),
(31, 15, 1, NULL, NULL),
(32, 16, 26, NULL, NULL),
(33, 16, 27, NULL, NULL),
(34, 19, 3, NULL, NULL),
(35, 19, 12, NULL, NULL),
(36, 22, 3, NULL, NULL),
(37, 22, 14, NULL, '2026-01-12 05:01:53'),
(40, 23, 11, NULL, NULL),
(41, 23, 29, NULL, NULL),
(42, 24, 4, NULL, NULL),
(43, 25, 1, NULL, NULL),
(44, 25, 2, NULL, NULL),
(45, 25, 7, NULL, NULL),
(46, 25, 10, NULL, NULL),
(47, 25, 16, NULL, NULL),
(48, 1, 10, NULL, NULL),
(49, 3, 10, NULL, NULL),
(50, 4, 19, NULL, NULL),
(51, 5, 17, NULL, NULL),
(52, 5, 18, NULL, NULL),
(53, 8, 12, NULL, NULL),
(54, 9, 9, NULL, NULL),
(55, 10, 24, NULL, NULL),
(56, 10, 25, NULL, NULL),
(57, 11, 9, NULL, NULL),
(58, 18, 8, NULL, NULL),
(59, 26, 2, NULL, NULL),
(60, 27, 30, NULL, NULL),
(61, 28, 4, NULL, NULL),
(62, 28, 14, NULL, NULL),
(63, 28, 17, NULL, NULL),
(64, 29, 11, NULL, NULL),
(65, 29, 28, NULL, NULL),
(66, 32, 5, NULL, NULL),
(67, 32, 8, NULL, NULL),
(68, 33, 5, NULL, NULL),
(69, 33, 11, NULL, NULL),
(70, 34, 4, NULL, NULL),
(71, 34, 12, NULL, NULL),
(72, 35, 4, NULL, NULL),
(93, 48, 11, NULL, NULL),
(94, 48, 36, NULL, NULL),
(95, 48, 37, NULL, NULL),
(96, 49, 1, NULL, NULL),
(97, 49, 2, NULL, NULL),
(99, 50, 29, NULL, NULL),
(100, 51, 1, NULL, NULL),
(101, 51, 8, NULL, NULL),
(102, 52, 29, NULL, NULL),
(103, 53, 6, NULL, NULL),
(104, 53, 8, NULL, NULL),
(105, 54, 1, NULL, NULL),
(106, 54, 8, NULL, NULL),
(107, 55, 5, NULL, NULL),
(108, 55, 9, NULL, NULL),
(109, 55, 14, NULL, NULL),
(113, 56, 38, NULL, NULL),
(114, 56, 18, NULL, NULL),
(115, 56, 19, NULL, NULL),
(116, 52, 38, NULL, NULL),
(117, 57, 10, NULL, NULL),
(118, 57, 29, NULL, NULL),
(119, 58, 9, NULL, NULL),
(120, 58, 25, NULL, NULL),
(121, 59, 10, NULL, NULL),
(122, 60, 7, NULL, NULL),
(123, 62, 7, NULL, NULL),
(124, 62, 9, NULL, NULL),
(125, 63, 2, NULL, NULL),
(126, 64, 5, NULL, NULL),
(127, 61, 2, NULL, NULL),
(128, 61, 6, NULL, NULL),
(129, 61, 11, NULL, NULL),
(130, 65, 18, NULL, NULL),
(131, 65, 37, NULL, NULL),
(132, 67, 7, NULL, NULL),
(133, 67, 12, NULL, NULL),
(134, 66, 1, NULL, NULL),
(135, 66, 12, NULL, NULL),
(136, 66, 14, NULL, NULL),
(137, 66, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `movie_id`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(2, 1, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(3, 2, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(4, 2, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(5, 3, 2, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(6, 3, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(7, 3, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(8, 4, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(9, 4, 23, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(10, 4, 24, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(11, 5, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(12, 5, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(13, 5, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(14, 6, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(15, 6, 17, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(16, 7, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(17, 7, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(18, 8, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(19, 8, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(20, 8, 14, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(21, 9, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(22, 9, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(23, 9, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(24, 10, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(25, 10, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(26, 11, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(27, 11, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(28, 11, 24, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(29, 12, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(30, 12, 7, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(31, 12, 13, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(32, 13, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(33, 13, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(34, 13, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(35, 14, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(36, 14, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(37, 15, 2, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(38, 15, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(39, 16, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(40, 16, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(41, 16, 14, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(42, 18, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(43, 18, 7, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(44, 18, 19, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(45, 19, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(46, 19, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(47, 19, 19, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(48, 22, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(49, 22, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(50, 22, 17, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(51, 23, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(52, 23, 13, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(53, 24, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(54, 24, 17, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(55, 24, 24, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(56, 25, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(57, 25, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(58, 25, 14, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(59, 25, 15, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(60, 26, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(61, 26, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(62, 27, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(63, 27, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(64, 27, 23, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(65, 28, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(66, 28, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(67, 29, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(68, 29, 7, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(69, 29, 19, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(70, 32, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(71, 32, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(72, 32, 14, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(73, 33, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(74, 33, 6, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(75, 33, 14, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(76, 34, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(77, 34, 3, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(78, 34, 5, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(79, 34, 13, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(80, 35, 1, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(81, 35, 4, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(82, 35, 14, '2026-02-18 13:12:23', '2026-02-18 13:12:23'),
(91, 48, 3, NULL, NULL),
(92, 48, 4, NULL, NULL),
(93, 48, 6, NULL, NULL),
(94, 49, 4, NULL, NULL),
(95, 49, 6, NULL, NULL),
(96, 49, 14, NULL, NULL),
(97, 50, 3, NULL, NULL),
(98, 50, 5, NULL, NULL),
(99, 51, 1, NULL, NULL),
(100, 51, 3, NULL, NULL),
(101, 51, 6, NULL, NULL),
(102, 52, 1, NULL, NULL),
(103, 52, 13, NULL, NULL),
(104, 53, 3, NULL, NULL),
(105, 53, 4, NULL, NULL),
(106, 53, 6, NULL, NULL),
(107, 54, 6, NULL, NULL),
(108, 54, 14, NULL, NULL),
(109, 55, 3, NULL, NULL),
(110, 55, 4, NULL, NULL),
(111, 56, 4, NULL, NULL),
(112, 56, 13, NULL, NULL),
(113, 57, 4, NULL, NULL),
(114, 57, 7, NULL, NULL),
(115, 57, 13, NULL, NULL),
(116, 58, 4, NULL, NULL),
(117, 59, 4, NULL, NULL),
(118, 59, 6, NULL, NULL),
(119, 60, 6, NULL, NULL),
(120, 60, 24, NULL, NULL),
(121, 62, 1, NULL, NULL),
(122, 62, 8, NULL, NULL),
(123, 63, 3, NULL, NULL),
(124, 63, 4, NULL, NULL),
(125, 64, 3, NULL, NULL),
(126, 64, 4, NULL, NULL),
(127, 64, 6, NULL, NULL),
(128, 61, 1, NULL, NULL),
(129, 61, 2, NULL, NULL),
(130, 65, 1, NULL, NULL),
(131, 65, 6, NULL, NULL),
(132, 67, 1, NULL, NULL),
(133, 67, 3, NULL, NULL),
(134, 67, 7, NULL, NULL),
(135, 66, 3, NULL, NULL),
(136, 66, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `movie_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 5.00, 'Inspiring and emotional masterpiece.', '2026-01-30 05:44:26', '2026-02-18 07:31:49'),
(2, 2, 1, 5.00, 'Every student should watch this film.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(3, 3, 1, 4.00, 'Funny, touching and meaningful.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(4, 4, 1, 5.00, 'Brilliant performances and story.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(5, 5, 1, 4.00, 'A perfect mix of comedy and emotion.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(6, 6, 2, 5.00, 'Timeless romantic classic.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(7, 7, 2, 4.00, 'Songs and love story are unforgettable.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(8, 8, 2, 5.00, 'SRK and Kajol chemistry is iconic.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(9, 9, 2, 4.00, 'Pure Bollywood romance.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(10, 10, 2, 5.00, 'Still feels fresh after so many years.', '2026-01-30 05:44:26', '2026-02-12 04:45:55'),
(11, 11, 3, 5.00, 'Heart touching and beautifully acted.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(12, 12, 3, 4.00, 'Emotional journey across borders.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(13, 13, 3, 5.00, 'Salman’s best performance.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(14, 14, 3, 4.00, 'Feel-good and meaningful.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(15, 15, 3, 5.00, 'Loved the story and innocence.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(16, 7, 4, 4.00, 'Grand visuals and powerful performances.', '2026-01-30 05:44:26', '2026-01-30 00:20:23'),
(17, 2, 4, 5.00, 'Epic historical drama.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(18, 3, 4, 4.00, 'Ranveer Singh stole the show.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(19, 4, 4, 5.00, 'Visually stunning movie.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(20, 5, 4, 4.00, 'Strong direction and music.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(21, 6, 5, 5.00, 'Relatable and motivational.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(22, 7, 5, 4.00, 'Great message about life and failure.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(23, 8, 5, 5.00, 'College memories refreshed!', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(24, 9, 5, 4.00, 'Fun and emotional ride.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(25, 10, 5, 5.00, 'Beautiful storytelling.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(26, 11, 6, 5.00, 'Inspiring sports drama.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(27, 12, 6, 5.00, 'Aamir Khan nailed it.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(28, 13, 6, 4.00, 'Strong emotional connect.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(29, 14, 6, 5.00, 'Powerful and motivating.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(30, 15, 6, 5.00, 'One of the best biopics.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(31, 15, 7, 3.00, 'Intense but controversial.', '2026-01-30 05:44:26', '2026-01-30 00:20:49'),
(32, 2, 7, 4.00, 'Shahid Kapoor performance was strong.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(33, 3, 7, 3.00, 'Music was the highlight.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(34, 4, 7, 2.00, 'Story felt problematic.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(35, 5, 7, 4.00, 'Emotional but flawed.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(36, 6, 8, 5.00, 'Feel-good travel movie.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(37, 7, 8, 4.00, 'Friendship goals.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(38, 8, 8, 5.00, 'Spain trip looked amazing.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(39, 9, 8, 4.00, 'Light, fun and deep.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(40, 10, 8, 5.00, 'One of my comfort movies.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(41, 11, 9, 5.00, 'Pure cinematic art.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(42, 12, 9, 4.00, 'Sweet and emotional.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(43, 13, 9, 5.00, 'Ranbir Kapoor was brilliant.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(44, 14, 9, 4.00, 'Unique storytelling.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(45, 15, 9, 5.00, 'Heartwarming love story.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(46, 9, 10, 4.00, 'Fun and entertaining.', '2026-01-30 05:44:26', '2026-01-30 00:21:01'),
(47, 2, 10, 3.00, 'Light-hearted romantic comedy.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(48, 3, 10, 4.00, 'Kangana was fantastic.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(49, 4, 10, 3.00, 'Good time-pass movie.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(50, 5, 10, 4.00, 'Enjoyable performances.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(51, 6, 11, 5.00, 'Epic love story.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(52, 7, 11, 5.00, 'Stunning visuals and music.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(53, 8, 11, 4.00, 'Ranveer and Deepika were amazing.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(54, 9, 11, 5.00, 'Grand and emotional.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(55, 10, 11, 5.00, 'Historical romance done right.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(56, 11, 12, 4.00, 'SRK in a powerful role.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(57, 12, 12, 3.00, 'Good action drama.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(58, 13, 12, 4.00, 'Dialogues were impactful.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(59, 14, 12, 3.00, 'Decent storyline.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(60, 15, 12, 4.00, 'Mass entertainer.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(61, 12, 13, 4.00, 'Emotional love story.', '2026-01-30 05:44:26', '2026-01-30 00:21:32'),
(62, 2, 13, 3.00, 'Music was beautiful.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(63, 3, 13, 4.00, 'Heartbreak portrayed well.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(64, 4, 13, 3.00, 'Slow but touching.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(65, 5, 13, 4.00, 'Good performances.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(66, 6, 14, 5.00, 'Youthful and energetic.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(67, 7, 14, 4.00, 'Friendship and love blend perfectly.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(68, 8, 14, 5.00, 'Songs are evergreen.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(69, 9, 14, 4.00, 'Feel-good vibes.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(70, 10, 14, 5.00, 'One of my favorites.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(71, 11, 15, 5.00, 'Powerful emotional journey.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(72, 12, 15, 4.00, 'SRK gave a brilliant performance.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(73, 13, 15, 5.00, 'Very touching story.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(74, 14, 15, 4.00, 'Strong social message.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(75, 15, 15, 5.00, 'Memorable movie.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(77, 2, 16, 5.00, 'Songs were magical.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(78, 3, 16, 4.00, 'Fresh and emotional.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(79, 4, 16, 5.00, 'Loved the chemistry.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(80, 5, 16, 4.00, 'Very soothing film.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(81, 6, 18, 4.00, 'High octane action.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(82, 7, 18, 5.00, 'SRK comeback in style.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(83, 8, 18, 4.00, 'Stylish action thriller.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(84, 9, 18, 5.00, 'Entertaining from start to end.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(85, 10, 18, 4.00, 'Mass action movie.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(86, 11, 19, 4.00, 'Full-on action entertainer.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(87, 12, 19, 5.00, 'Salman in action mode!', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(88, 13, 19, 4.00, 'Thrilling and fast paced.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(89, 14, 19, 5.00, 'Great action sequences.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(90, 15, 19, 4.00, 'Very entertaining.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(91, 2, 22, 5.00, 'Inspiring wrestling drama.', '2026-01-30 05:44:26', '2026-01-30 00:21:42'),
(92, 2, 22, 4.00, 'Emotional sports film.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(93, 3, 22, 5.00, 'Salman’s transformation was great.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(94, 4, 22, 4.00, 'Strong performances.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(95, 5, 22, 5.00, 'Motivating story.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(96, 6, 23, 5.00, 'Alia Bhatt was outstanding.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(97, 7, 23, 4.00, 'Powerful female-led story.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(98, 8, 23, 5.00, 'Strong direction and acting.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(99, 9, 23, 4.00, 'Emotional and impactful.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(100, 10, 23, 5.00, 'One of the best recent films.', '2026-01-30 05:44:26', '2026-01-30 05:44:26'),
(101, 16, 16, 5.00, 'Beautiful love story!', '2026-01-30 00:16:49', '2026-01-30 00:55:06'),
(102, 16, 1, 5.00, '3 Idiots: Friendship, fun, and dreams', '2026-01-30 00:59:22', '2026-01-30 00:59:35'),
(103, 16, 27, 5.00, 'Epic action and visuals with a gripping story of power, betrayal, and destiny.', '2026-01-30 07:17:54', '2026-01-30 07:17:54'),
(104, 12, 24, 5.00, 'Lagaan is a masterpiece that mixes sports, history, and patriotism beautifully.', '2026-02-03 08:58:50', '2026-02-03 03:29:29'),
(105, 2, 24, 4.00, 'Aamir Khan delivers a powerful performance in this inspiring underdog story.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(106, 3, 24, 5.00, 'The cricket match climax is still one of the most thrilling moments in Indian cinema.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(107, 4, 24, 4.00, 'Great music, strong emotions, and unforgettable characters.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(108, 5, 24, 4.00, 'A bit long, but totally worth the watch.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(109, 11, 25, 4.00, 'A grand family drama filled with emotions, love, and unforgettable songs.', '2026-02-03 08:58:50', '2026-02-03 03:29:42'),
(110, 2, 25, 5.00, 'SRK and Kajol’s chemistry is magical as always.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(111, 3, 25, 4.00, 'Over-the-top but extremely entertaining Bollywood style.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(112, 4, 25, 4.00, 'Amitabh Bachchan’s performance as the strict father stands out.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(113, 5, 25, 5.00, 'Perfect movie for family movie night.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(114, 9, 26, 5.00, 'An all-time classic that defined Indian action cinema.', '2026-02-03 08:58:50', '2026-02-03 03:29:53'),
(115, 2, 26, 5.00, 'Gabbar Singh is one of the most iconic villains ever.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(116, 3, 26, 5.00, 'Friendship between Jai and Veeru is legendary.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(117, 4, 26, 4.00, 'Dialogues are still quoted decades later.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(118, 5, 26, 5.00, 'A timeless film that never gets old.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(119, 14, 27, 5.00, 'Visually stunning with epic storytelling.', '2026-02-03 08:58:50', '2026-02-03 03:30:04'),
(120, 2, 27, 4.00, 'Prabhas perfectly fits the role of Baahubali.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(121, 3, 27, 5.00, 'The waterfall scene and war sequences are breathtaking.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(122, 4, 27, 4.00, 'A grand cinematic experience on a massive scale.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(123, 5, 27, 5.00, 'Leaves you excited for the sequel.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(124, 10, 28, 4.00, 'A funny yet thought-provoking take on religion and society.', '2026-02-03 08:58:50', '2026-02-03 03:30:20'),
(125, 2, 28, 5.00, 'Aamir Khan’s innocent alien act is brilliant.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(126, 3, 28, 4.00, 'Comedy with a strong social message.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(127, 4, 28, 4.00, 'Entertaining from start to finish.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(128, 5, 28, 5.00, 'Simple story but powerful impact.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(130, 2, 29, 4.00, 'A gripping spy thriller based on real events.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(131, 3, 29, 5.00, 'Emotional and patriotic without being overdramatic.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(132, 4, 29, 4.00, 'Keeps you tense throughout the film.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(133, 5, 29, 5.00, 'A beautifully made film with strong storytelling.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(134, 7, 32, 4.00, 'A visually rich love story with stunning sets and music.', '2026-02-03 08:58:50', '2026-02-03 03:30:41'),
(135, 2, 32, 5.00, 'Ranveer and Deepika’s chemistry is electric.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(136, 3, 32, 4.00, 'Classic Romeo-Juliet style with a Bollywood twist.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(137, 4, 32, 4.00, 'Dramatic, colorful, and full of passion.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(138, 5, 32, 5.00, 'Songs and cinematography are top-notch.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(139, 15, 33, 5.00, 'An inspiring story of dreams rising from the streets.', '2026-02-03 08:58:50', '2026-02-03 03:30:54'),
(140, 2, 33, 5.00, 'Ranveer Singh absolutely owns the role of Murad.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(141, 3, 33, 4.00, 'Music and rap battles are pure fire.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(142, 4, 33, 4.00, 'Realistic, emotional, and motivating.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(143, 5, 33, 5.00, 'A powerful film about finding your voice.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(144, 6, 34, 4.00, 'High-speed action and stylish stunts throughout.', '2026-02-03 08:58:50', '2026-02-03 03:31:08'),
(145, 2, 34, 4.00, 'Aamir Khan shines in a double role.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(146, 3, 34, 3.00, 'Circus theme adds a unique touch.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(147, 4, 34, 3.00, 'Visually impressive but story could be stronger.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(148, 5, 34, 4.00, 'Great for action lovers.', '2026-02-03 08:58:50', '2026-02-03 08:58:50'),
(152, 17, 28, 5.00, 'Comedy', '2026-02-10 06:02:27', '2026-02-10 06:02:39'),
(159, 16, 35, 4.00, 'Inspiration movie!!', '2026-02-12 04:38:14', '2026-02-12 04:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2026-01-07 09:15:38', '2026-01-07 09:15:38'),
(2, 'User', '2026-01-07 09:15:38', '2026-01-07 09:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aLiSbVSDsxEFr1Fig7xxZ4lKUKceWnwLdRuFwrUc', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUYyVDk4WmZYUlVTTElMSHZ2NWNJQ2NaQVJiZTU1WTBzT1o0R2ZXVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1775229643),
('oJ1vCwI9NDMhVdH6WrcpUH9sTP11kpyOhPJdMj18', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoickx6RDVndllMNHlWR3NyUGVpMjZwbmV2SHc5WnA0RVN3UkxUUXAxdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hY3RvcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1775465575);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `email_notifications` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`, `dark_mode`, `email_notifications`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$Qyi431SrIWOM8yJRU5jUgO739fHxEYZFBVizQg36dlk4XNFMuDjH2', 1, NULL, '2026-01-07 03:44:35', '2026-02-11 04:05:22', 0, 1),
(2, 'Aarav Sharma', 'aarav.sharma@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(3, 'Ananya Patel', 'ananya.patel@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(4, 'Rohan Mehta', 'rohan.mehta@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(5, 'Priya Singh', 'priya.singh@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(6, 'Karan Kapoor', 'karan.kapoor@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(7, 'Sneha Desai', 'sneha.desai@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(8, 'Aditya Verma', 'aditya.verma@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(9, 'Ishita Joshi', 'ishita.joshi@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(10, 'Vikram Choudhary', 'vikram.choudhary@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(11, 'Tanya Rathi', 'tanya.rathi@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(12, 'Arjun Nair', 'arjun.nair@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(13, 'Meera Iyer', 'meera.iyer@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(14, 'Sameer Malhotra', 'sameer.malhotra@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(15, 'Pooja Gupta', 'pooja.gupta@example.com', NULL, '$2y$10$abcdefghijklmnopqrstuv', 2, NULL, '2026-01-07 09:18:06', '2026-01-07 09:18:06', 0, 1),
(16, 'Hensi', 'hensidoshi711@gmail.com', NULL, '$2y$12$lsHkCT99HmXvDZupOpNYH.CjllFxLF7WcCPB2oLu2ck6ZHoxivb3W', 2, NULL, '2026-01-07 04:42:53', '2026-02-17 04:13:31', 1, 0),
(17, 'Hensi Doshi', 'doshihensiv07@gmail.com', NULL, '$2y$12$rJD6WwbQELEuUQmGmc7wKOybOtt3.tm/5RxStshksRpMhwl6lWrau', 2, NULL, '2026-01-07 07:53:47', '2026-01-07 07:53:47', 0, 1),
(28, 'Admin', 'admin123@example.com', NULL, '$2y$12$9EB4mGPfQDoqxJh.fq4uMebT6gpXHFSdQZSjTK9c0R77xv7FiGvSS', 2, NULL, '2026-03-04 11:25:08', '2026-03-04 11:25:08', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `watchlists`
--

CREATE TABLE `watchlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `rating_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watchlists`
--

INSERT INTO `watchlists` (`id`, `user_id`, `movie_id`, `rating_id`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 'watching', 'Great start!', '2026-01-12 05:45:17', '2026-01-30 00:18:14'),
(2, 10, 2, 3, 'completed', 'Very interesting movie.', '2026-01-12 05:45:17', '2026-01-30 00:18:22'),
(3, 15, 3, 3, 'planned', 'Will watch later.', '2026-01-12 05:45:17', '2026-01-30 00:18:04'),
(4, 2, 1, 4, 'completed', 'Nice storyline.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(5, 2, 4, 5, 'watching', 'Loved the visuals.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(6, 2, 5, 2, 'dropped', 'Not my type.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(7, 3, 2, 5, 'completed', 'Masterpiece.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(8, 3, 6, 4, 'watching', 'Very engaging.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(10, 4, 3, 1, 'completed', 'Outstanding!', '2026-01-12 05:45:17', '2026-01-12 01:04:47'),
(11, 4, 8, 4, 'watching', 'Good till now.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(12, 4, 9, 3, 'planned', 'On my list.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(13, 5, 4, 5, 'completed', 'Best movie ever.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(14, 5, 10, 4, 'watching', 'Enjoying it.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(15, 5, 11, 2, 'dropped', 'Did not like it.', '2026-01-12 05:45:17', '2026-01-12 05:45:17'),
(17, 16, 13, 2, 'watched', 'Nice Movie!', '2026-01-12 01:11:41', '2026-01-12 03:27:28'),
(18, 16, 16, 1, 'watched', 'Nice Movie!', '2026-01-12 03:20:56', '2026-01-12 06:26:00'),
(33, 17, 28, 3, 'completed', 'Hensi', '2026-02-10 07:08:32', '2026-02-10 07:23:04'),
(37, 9, 25, 4, 'on-hold', 'Hensi', '2026-02-12 00:11:03', '2026-02-12 00:26:04'),
(60, 16, 27, NULL, 'pending', NULL, '2026-04-03 06:40:38', '2026-04-03 06:40:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_director_id_foreign` (`director_id`),
  ADD KEY `movies_language_id_foreign` (`language_id`);

--
-- Indexes for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_actors_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_actors_actor_id_foreign` (`actor_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_genres_movie_id_foreign` (`movie_id`),
  ADD KEY `movie_genres_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_movie_id_foreign` (`movie_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watchlists_user_id_foreign` (`user_id`),
  ADD KEY `watchlists_movie_id_foreign` (`movie_id`),
  ADD KEY `watchlists_rating_id_foreign` (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `movie_actors`
--
ALTER TABLE `movie_actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_director_id_foreign` FOREIGN KEY (`director_id`) REFERENCES `directors` (`id`),
  ADD CONSTRAINT `movies_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD CONSTRAINT `movie_actors_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `movie_actors_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `movie_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `movie_genres_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `watchlists`
--
ALTER TABLE `watchlists`
  ADD CONSTRAINT `watchlists_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `watchlists_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `reviews` (`id`),
  ADD CONSTRAINT `watchlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
