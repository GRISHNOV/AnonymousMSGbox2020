-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 13 2020 г., 00:41
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_test_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `msg_box`
--

CREATE TABLE `msg_box` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT 1,
  `receiver_id` int(11) DEFAULT 1,
  `msg` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `msg_box`
--

INSERT INTO `msg_box` (`msg_id`, `sender_id`, `receiver_id`, `msg`, `creation_date`) VALUES
(1, 102, 1, 'Test message', '2020-01-30 15:15:08'),
(2, 102, 103, 'Hello world', '2020-01-30 15:15:32'),
(3, 102, 1, 'testing', '2020-01-30 16:08:18'),
(4, 1, 1, 'THIS IS TEST MSG', '2020-02-12 11:10:57'),
(8, 1, 102, 'hi', '2020-02-12 12:48:34'),
(9, 1, 1, 'hello', '2020-02-12 12:49:12');

-- --------------------------------------------------------

--
-- Структура таблицы `user_list`
--

CREATE TABLE `user_list` (
  `user_id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_time_to_destroy` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alias` int(11) NOT NULL,
  `open_RSA_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_list`
--

INSERT INTO `user_list` (`user_id`, `login`, `password`, `user_time_to_destroy`, `time_stamp`, `alias`, `open_RSA_key`) VALUES
(1, 'fe5dc1d8abc4cf95c2a1cb875946f82a219f63f3f3409ab61c2b23830eec8b9f43e0fb83b430e6d3eae5fa3d9cb70febb1e4334f771ded46ba83adb606ed254d', 'bd4b39b37c13a3eca646d9bac11e7d3a3d167e0e3b8f7a88a467ab55032ea52bbe626844bfbb2e9cecb9e00483dd6d9216042ef19e620f121fe6d6fc6e17889f', 0, '2020-02-12 11:14:06', 999999, ''),
(102, '5ee6088379b22d11eb3dae23e5acdc919b448b385a235150a5fbeae30549355f436229d327001a2cb3598c0cdaa61e3c87c7f8dcbd158f91e8b0c039a2a94e37', '77e9c451423ed3ced2bc63276c24f9e9c2856b7f21205178fd97bd5229e98a6fc296e7b431f4b84df9869b3eb49c6637d6917f965a968c5f98512d261863c7ce', 2, '2020-02-07 15:15:47', 363861, 'fC8wfzPhf5COrKaqh4LoK3ljlcWufdb0fNjyHtFeuxlNzUZgj87jvBRfjUs8UT4Dx5hsc5hjfBcJxscFDpgYLWQ0doJcTHKpXQkNutNsLZdkUf00YgLWFjW6OgBD6laLIDw2fS49J9+tfR+fvUNioCM8l2rTzs9ddiutZvW+T4HdJrQtCdXbDVL5gm2Zenyta+fWZ23LeKfmpf0wit5c9f3YaWtz4TGh3TU4ntHh4G6JAMIfGozz4ubjtAxoosKVMMPYA+GNQqt/4AzpBY92AMV8aRGXpdi/t3e53CtwsYSuaaJhtZI8Jl4nJztMP3sySNHYEJKajqVt5wvdYCAWFQ=='),
(103, '6db958be823ced1c885a6771d93e194ed54ae29849265dcffb40620386d8a6818b432ca62ad7e105be6321188604340ad02031ad9914e8072d53b0d7df420a12', '682d4153aea0e99e27233c0b6869f51bbcc0bdb6a899b1e233c71a2bc50c4c76b7a946293b3a0ccc14ab724ac45c10a1602da8a9ce2a25f94e52758c10bcf040', 2, '2020-02-07 15:15:57', 319505, 'hXdYFoAYim9R1lEHzj3+36IW80Ex+pX3g+pAyQ0+8QzZBvbAil5KUNZTIo8PCagMgOdOxDQR12osY9n4j4CMcTdl+voHGRiweNgEO4RCDNHhCR/wFMXYbuitQhB3yewV3F65yG/9BCgJ2YMhXrcWBCpuQGaLsiHjjCRaFDiShqvj7v7cM/rr55TVpcKREZ+2epRGx1QBtCJxCyGHCpKMF/gbeV6Q4PnPEaUXooNPd0AoyYt8+bXwP9VRXOPzpSNz8bNzmCle3Pgx2LnFsvrz2JNJUP5vl/aiF1w05Twrh9Hcd6hJuWBgBj4gAQOtb3ziB0RNNOOreEgRSaNCyiNTbQ=='),
(104, '053fc557e8c1f8032f0af4f8bbfaea65537556ed01f938c4819ae89f13879966eb6e45af27536742b82b25d8448f71a60341407b059aac3300010dd379285f42', '48d93442acb02f40b0ddcdc585098197f7d893ef481542604e41916e13bb9b17e7058536bb003df4bead3dd166a92ae1c0c3b211066316c0b70c7dc045c5f9f7', 2, '2020-02-07 16:12:46', 858005, 'jgOG4EGQXPD/ywDxWOGb//tjqUf3K44mkobyK6TFI56j6Gln0xR7uVxhZZv8ZWV73w68ldpB731PMazsmjj9YUV0wvA0WhdbCKdJLNJiLkTt4GaanKfWPIyzZd1BGcioopZYldP0djILB5C55urq8sXTpT/VDXhD/MEhjJihYyxgMhuEAVLuWBqXG8ZD2p3H4U11jAN8RhGpRS4CoyLh0mtGzePRulJhPu9ntvgSgTlhXUCg/alL4Ju+AOUEjli5wbcX5QhQR/+0/b+SL12mU9Xh7Jk1xTs59fbUsc8NH391C6vkYU5axe/A22V7X9cmlK0psDOoGoB6aV8BA9gnnw=='),
(105, 'fddc7577a92769d6852547b38d15ff3acd4fff5c44f51c667616914a0adb72b145fa243ca6ef28504c22ba785ef185f2d91255d4ef1f9ccec3cc4e2d23d357a0', '97c102376df3dca967e6c7cf6217130329af436129371903976a5b1c9dea8f65401aedc9c9774c60620bd71c856ba2410cd1c93d2bb5693a7364d8bf04f8e3bd', 2, '2020-02-07 16:13:23', 811193, 'nA1SO5jfWJsu8hCtCKvdcGjLtmopFzSG8DIfwUGDXBFtUFt/o33Kcwzluw32dcjMtdyCeQ9FWIzo4ZNd59HsStCWMuhwKJCTDmgyS90xy8kDGC961R0vJQiYPo8U199bNTNqcsKtQUYcuChe7lNeJKRT1Jbiprkq+PInjiHj56/O1fuonG5zbe4hBifLDb8rRFW3MzCxMKu1QlyjW1uWR3iD0vA2mfiV/1jdZAW81/ASpuvmQh9DnTwFw8P1ZBX7kjD2oRFyVzmyIoibAi0TsZ+wKlzxtb+TV5k5CFhQIWq8+iwm7uVHNFuuJjVHVdi+KG0sRT1xjAHh866wp+JYPQ=='),
(106, 'c6964246de9bb5f596067d945689beafda20ca60c6ad533ed02d04d695a85087f0e99b9ebc745bef7c1d3a14ed7c6120c35492e7d6dd6e5c3130b6633c95d7fe', '56e73e2b166f114336d66f063e5de2a958960085a4ec1b07e7413471307847fed817c5fa1dd863b8344ecea740aafc63a28b9f1dfd0a57a2bf10805aee189c5b', 2, '2020-02-07 16:14:14', 583074, 'qkOz+xqBjY/ZZKOZUM3w2uDp2+/UIbh4cHO3cI71yyvIHe+YTQVsZbq9xXv4cd+F5Kf4YYHX89j7PyZsYYGeKskaNd0z2cjWdhftzzgXsujdm/Z1BDcVax5rdko0BoNyOocb3UN6YSIwn0X7StMhYy4xFgDnjCJUFu76sEHn72EXJ5afy84WVpGlzEIKcyI5Sa7rZk5Bpnk9YRd82WOhakVtoEBgnniJ4ZYeyMjETNtIZDoqHipbrrhRh2DwZLNU0WQnKt6nWECL0UFBvp3ewPvho6TFKrOQ+neMIH3srizwlnwQBgLXsVM6eZBNUnthCdzG5KA7ovYLsopYYCKD7w=='),
(107, '4d32c8dbc9a28dc1a7cb5fbee26f0cd57fedd2847ec398437bb567b9a27f940a7d262c6042f36b242f24088fc8f3ae38fa4775c911639884b0b9060d01608636', '70149d0394bc6449323983446e575ffa904dc49febf0befeee4ccc92466d64c0de146effef392502c09f731a1cab382575f61f4ec0becb5085abb2ba8954aa9f', 2, '2020-02-07 16:14:37', 837653, 'vwiSDvgWkgFXBtR22TDEQy9oOEpDnha6T6jODnQYz1uliffpsRTpxNNscXAnA8s34e9EiDmAdAb9MR7ndmJQPkl016huB8HpLpIXrU+lZ/qZ5dYm5O9C+tsSAtYiKeGHyOfe0Yojuwg2e6F6LgibQP3bAIRSX+2bjhGEMtqq2Dagp4VJ42bfSzyGhv82M5+viQnJScId0bBCOsNJ+FxGbgiSi94AOEr7ktIS7heQ3RFLU5YjACKdZz+WcRewsU5G8QAG7T3OMFl3PyvVLhkXyA7K6xKjGKCg9O2sp5FCBO02GKDxD/bhoT1Zbn8D3Am4nkf+fHimRyO7sRV27CUSDQ=='),
(108, '69b2fd3b3176bfa9e8e37a6aff41a3c3ee1531bd4ec5af8888bde3d927ed156055961d545973510bb989259b56b707d8c3af1576b71d968be6f896cea6b41cf7', '658d017885e6f4ded9e9c4964381052e2e6ba3312ec21a5193870a8932e909d53eea490e461aedfc9db2813f54ced2dc1b0bc54096d6e81d46cac6217af0ed9b', 2, '2020-02-07 16:41:36', 768614, 'sjpXelPBNGwCaQI50+7TvCkAoevasLnpV3pSHlr596p4bl4jWR/7VUKuryfMEpdt/ve3Ik0sygjgpDDyk8aTSUh6a2/s3lW/ay5j5vZBlsmCPaf0GMne7V8dS24Y6NP6PhcyPrCCiWU4mrZZEvhOECYP4SzuoXfwrz3do6w96MtcxldxJB54bAxdjoVuNXG8ciUI2xzdKVsjpbFqPm5hDxvfd2bBmvyCLTqXoKyK84AkImyuSyjaGs2UbsfZYte6rm+9m3hJI8z3ULuZ1oLHDdJfkZczMBKV8N1h/Pv0dgbVdstsCsAIeeFCDuJXJthEleQARWMEoob5WVGSkTWkVQ=='),
(109, '90f35baf371d8dd0da4fb3b1f1b099ad6e8e74817ebf004fbe5a561127dd042510b2022dc29dc9ca816c91497e2e58b137da02dd377641fb8f1b22fc8676df49', 'f4d51153612e792d9f297c4e9ec4be02263758085a5000f0dc1dee7a4b18b1e8774fa4e508c2433c6a51dc681d9df45b4dd95ab3ad292a8e74e50701d6184af0', 2, '2020-02-07 16:41:59', 106107, 'dJCPxVtypLjnGT8xWTLFb+y1BaPb3WhkrjZ+k1F/GfUJQn0IeGXh5MPNAbys1VzJJI4iO1IomN97cSgTFGXVJpm5KE4csvGNZ90H8r0IwxXXwFAxwk5XAZj/rKbnlGXDSECPDRGNR6wBKQQV8pDgHbNWfmrzNKWoP0g/w1FSdPzjISeSldWBkkm1V03eAf5UY9cdZx353QTbRlBw4inLkbIFRBX1fc07flSwwgtof2I2jXlafIvxkOZV8Tgt8n6Xk3vK3dkj4C6Wfkumd6ZvlC+9ubfrB3HQ3bZqAaS9yQ/BmLgEUWQRmUp/aH6jdvkI2Z6iNExJo2r9cyy2jKI3Qw==');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `msg_box`
--
ALTER TABLE `msg_box`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Индексы таблицы `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `msg_box`
--
ALTER TABLE `msg_box`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user_list`
--
ALTER TABLE `user_list`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `msg_box`
--
ALTER TABLE `msg_box`
  ADD CONSTRAINT `msg_box_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `user_list` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `msg_box_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `user_list` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
