-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 12 2019 г., 14:16
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `v50425oh_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--
-- Создание: Янв 09 2019 г., 18:48
-- Последнее обновление: Фев 10 2019 г., 17:45
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `alias` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `is_published` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `id_category` smallint(25) NOT NULL,
  `image` varchar(250) NOT NULL,
  `cnt_visit` int(250) NOT NULL,
  `price` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `alias`, `title`, `content`, `is_published`, `id_category`, `image`, `cnt_visit`, `price`) VALUES
(142, 'lyvіvsykі-plyacki,-sirniki,-medіvniki', 'Львівські пляцки, сирники, медівники', '\r\nХудожественные\r\n347 книг\r\nСовременные авторы\r\nРоманы о любви\r\nИсторико-приключенческие\r\nДетективы\r\nФантастика, фэнтези\r\nТриллеры, ужасы\r\nКлассика\r\nКниги для подростков\r\nПрикладные\r\n502 книги\r\nКулинария\r\nСоветы\r\nЗдоровье и красота\r\nУмелые руки\r\nПсихология\r\nБизнес и саморазвитие\r\nЭзотерика\r\nМир увлечений\r\nДуховная литература\r\nИстория и факты\r\nМир тайн и загадок\r\nУчебная литература\r\nДетские\r\n198 книг\r\nДетям до 4-х лет\r\nДетям 4-6 лет\r\nДетям 7-12 лет\r\nДетям от 12 лет\r\nНаверх\r\nЛьвівські пляцки, сирники, медівники	\r\nУвеличить\r\nУзнать размер\r\nЛистать\r\nЛьвівські пляцки, сирники, медівники\r\nЛеся Кравецкая	\r\n\r\n5 оценок\r\nпереплет, 96 c., 170x245 мм, цветные ил. Подробнее\r\nКлубная цена\r\n85.00 грн\r\nДобавить в корзину\r\nРозничная цена:\r\n106.30 грн\r\nСпеццена:\r\n(при заказе 2-х и более книг Л. Кравецької)\r\n76.50 грн\r\nЗакажите также:\r\nПраздничные салаты. Подробная информация, цены, характеристики, описание.\r\n99.90\r\n	79.90	грн\r\nПодробнее››\r\nЛьвівські пляцки і торти. Подробная информация, цены, характеристики, описание.\r\n106.30\r\n	85.00	грн\r\nПодробнее››\r\nСучасна українська кухня з Лесею Кравецькою. Подробная информация, цены, характеристики, описание.\r\n187.40\r\n	149.90	грн\r\nПодробнее››\r\nСалаты для ленивых и не очень. Подробная информация, цены, характеристики, описание.\r\n118.80\r\n	95.00	грн\r\nПодробнее››\r\nСмачно з Лесею Кравецькою. Подробная информация, цены, характеристики, описание.\r\n106.30\r\n	85.00	грн\r\nПодробнее››\r\nЛетние блюда. Подробная информация, цены, характеристики, описание.\r\n106.30\r\n	85.00	грн\r\nПодробнее››\r\nУкраїна від свята до свята. Подробная информация, цены, характеристики, описание.\r\n118.80\r\n	95.00	грн\r\nПодробнее››\r\nКнига о вкусной и здоровой пище. Подробная информация, цены, характеристики, описание.\r\n125.00\r\n	100.00	грн\r\nПодробнее››\r\nСвяткові страви Західної України. Подробная информация, цены, характеристики, описание.\r\n99.90\r\n	79.90	грн\r\nПодробнее››\r\nЛидеры продаж | Книжные новинки | Книги КСД | Книги на украинском языке | Книги на русском языке | Комплекты и спецпредложения	\r\nС этим товаром также часто покупают\r\nОписание книги\r\nШоколадні, з маком, глазур’ю, вишнями та горіхами, на халвових та кокосових коржах, пляцки — правдиві витвори мистецтва! Сирники, медівники, перекладанці — перед цими смаколиками неможливо встояти. Спробувавши одного разу такі ласощі, ви забажаєте навчитися готувати фантастичні десерти власноруч. Популярна українська блогерка та вправна господиня Леся Кравецька зібрала найкращі традиційні й авторські рецепти пляцків. Процес готування та випікання розписаний покроково, також авторка ділиться корисними порадами й секретами ідеальної домашньої випічки. Готуйте незабутні галицькі десерти і смакуйте ними всією родиною! ', 1, 15, '49124_81990_k.jpg', 72, 85),
(143, 'kuryachiy-bulyyon-dlya-dushі.', 'Курячий бульйон для душі.', 'Теплі історії про кохання, романтику та побачення.\r\nЄ в цьому світі дещо, про що однаково сильно мріють лікарі та водії, багаті і бідні, високі й низькі, брюнетки і блондинки, молоді та літні люди. І це омріяне щось — кохання. Пам’ятаєте, як у дитинстві ми із захопленням слухали казки про прекрасних принців та принцес, які знаходять вічне кохання, оте саме, де «жили вони довго й щасливо і померли в один день». Справжнє, щире, несподіване, непідвладне часу — чарівне кохання. І, може, хтось скаже, що любові не існує, але герої 101 історії про кохання переконають вас у протилежному.', 1, 14, '49127_81993_k.jpg', 82, 100),
(144, 'mesіya-dyuni-', 'Месія Дюни ', 'Після війни, прозваної джигадом Муад’Діба, Пол Атрід посідає імператорський трон і запроваджує новий, фрименський, лад. Здавалось би, нарешті як на Дюні, так і в Галактиці повинні запанувати мир і спокій. Проте колись могутні, а тепер позбавлені влади династії жадають реваншу. Їм відомі слабкі сторони Імператора — його дар передбачати майбутнє, яке, на жаль, він не може змінити. Месії Дюни зостається тільки одне — бути Месією до кінця. ', 1, 12, '49329_82455.jpg', 31, 200),
(145, '48-zakonіv-vladi', '48 законів влади', 'Як навчитися долати перешкоди й перетворювати їх на успіх? Де черпати енергію та натхнення для сильних вчинків? Як подолати страх і змусити долю грати за вашими правилами? Книжка навчить вас розставляти пріоритети, вивчати й розуміти людей, опановувати власні емоції й не говорити більше, ніж потрібно. Практичні поради, що ґрунтуються на 48 законах Гріна, допоможуть усім, хто жадає успіху, прагне впевнено йти до мети й завойовувати світ.', 1, 12, '45790_70354.jpg', 47, 150),
(146, 'opasnaya-nahodka', 'Опасная находка', 'Опасная находка', 1, 13, '48771_80842_k.jpg', 10, 150),
(150, 'kerri', 'Керри', 'Керри', 1, 12, '48510_79662_k.jpg', 1, 50),
(151, 'kristina', 'Кристина', 'Кристина', 1, 12, '44341_66651_k.jpg', 3, 54),
(152, 'istochnik', 'Источник', 'Источник', 1, 14, '47537_75441_k.jpg', 2, 60),
(153, 'mazurevichi', 'Мазуревичи', 'Мазуревичи', 1, 14, '47731_76417_k.jpg', 3, 50);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--
-- Создание: Янв 09 2019 г., 18:48
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id_category` tinyint(25) NOT NULL,
  `name_category` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(12, 'Фантастика'),
(13, 'Приключения'),
(14, 'Романтика'),
(15, 'Проза'),
(17, 'История');

-- --------------------------------------------------------

--
-- Структура таблицы `commentary`
--
-- Создание: Янв 09 2019 г., 18:48
--

DROP TABLE IF EXISTS `commentary`;
CREATE TABLE `commentary` (
  `id_commentary` int(25) NOT NULL,
  `alias_book` varchar(250) CHARACTER SET utf8 NOT NULL,
  `login_user` varchar(250) CHARACTER SET utf8 NOT NULL,
  `commentary` text CHARACTER SET utf8 NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--
-- Создание: Янв 09 2019 г., 18:48
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `message`, `name`, `email`) VALUES
(1, 'test', 'vova', 'vova@gmail.com'),
(9, 'test', 'test', 'test@test.ru'),
(10, 'test', 'test', 'test@test.ru'),
(11, 'v', 'v', 'test@test.ru'),
(12, '', '', ''),
(13, '', '', ''),
(14, 'w', 'v', 'test@test.ru'),
(15, 'n', 'v', 'test@test.ru'),
(16, 'u', 'v', 'test@test.ru'),
(17, 'h', 'h', 'test@test.com');

-- --------------------------------------------------------

--
-- Структура таблицы `sell`
--
-- Создание: Янв 09 2019 г., 18:48
--

DROP TABLE IF EXISTS `sell`;
CREATE TABLE `sell` (
  `id` tinyint(25) NOT NULL,
  `item_alias` varchar(250) CHARACTER SET utf8 NOT NULL,
  `quantity` int(250) NOT NULL,
  `login` varchar(250) CHARACTER SET utf8 NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `sell`
--

INSERT INTO `sell` (`id`, `item_alias`, `quantity`, `login`, `phone`) VALUES
(1, 'kuryachiy-bulyyon-dlya-dushі.', 1, 'admin', 934587922),
(2, 'mesіya-dyuni-', 1, 'admin', 931864532);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Янв 09 2019 г., 18:48
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 NOT NULL,
  `password` char(45) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'dd68d66e1e1a9c5a8cac6ce594cbb96a', 'admin'),
(2, 'test', 'test@test.ru', '5b4b5240bffc9f32d8846030c5fa4b42', ''),
(3, '', '', '51306d4008f6a3684e89254e78e09d9b', '');

-- --------------------------------------------------------

--
-- Структура таблицы `writer`
--
-- Создание: Янв 09 2019 г., 18:48
--

DROP TABLE IF EXISTS `writer`;
CREATE TABLE `writer` (
  `id_writer` int(11) NOT NULL,
  `writer` text CHARACTER SET utf8 NOT NULL,
  `alias_writer` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `writer`
--

INSERT INTO `writer` (`id_writer`, `writer`, `alias_writer`) VALUES
(19, 'Леся К.', 'lesya-k.'),
(20, 'Кенфілд Д.', 'kenfіld-d.'),
(21, 'Гансен М.В.', 'gansen-m.v.'),
(22, 'Ньюмарк Е.', 'nyyumark-e.'),
(23, 'Герберт Т.', 'gerbert-t.'),
(24, 'Ньюман К.', 'nyyuman-k.'),
(25, 'Грин Р.', 'grin-r.'),
(26, 'Кинг Стивен', 'king-stiven');

-- --------------------------------------------------------

--
-- Структура таблицы `writer_books`
--
-- Создание: Янв 09 2019 г., 18:48
-- Последнее обновление: Фев 10 2019 г., 17:39
--

DROP TABLE IF EXISTS `writer_books`;
CREATE TABLE `writer_books` (
  `id` int(11) NOT NULL,
  `id_writer` int(11) NOT NULL,
  `alias_book` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `writer_books`
--

INSERT INTO `writer_books` (`id`, `id_writer`, `alias_book`) VALUES
(60, 19, 'lyvіvsykі-plyacki,-sirniki,-medіvniki'),
(78, 19, 'mazurevichi'),
(71, 19, 'opasnaya-nahodka'),
(81, 19, 'test'),
(64, 20, 'kuryachiy-bulyyon-dlya-dushі'),
(61, 20, 'kuryachiy-bulyyon-dlya-dushі.'),
(79, 20, 'mazurevichi'),
(65, 21, 'kuryachiy-bulyyon-dlya-dushі'),
(62, 21, 'kuryachiy-bulyyon-dlya-dushі.'),
(80, 21, 'mazurevichi'),
(66, 22, 'kuryachiy-bulyyon-dlya-dushі'),
(63, 22, 'kuryachiy-bulyyon-dlya-dushі.'),
(67, 23, 'mesіya-dyuni-'),
(69, 24, '48-zakonіv-vladi'),
(76, 24, 'istochnik'),
(68, 24, 'mesіya-dyuni-'),
(70, 25, '48-zakonіv-vladi'),
(77, 25, 'istochnik'),
(72, 26, 'kerri'),
(74, 26, 'kerri'),
(73, 26, 'kristina'),
(75, 26, 'kristina');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id_commentary`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id_writer`);

--
-- Индексы таблицы `writer_books`
--
ALTER TABLE `writer_books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_writer` (`id_writer`,`alias_book`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` tinyint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id_commentary` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `sell`
--
ALTER TABLE `sell`
  MODIFY `id` tinyint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `writer`
--
ALTER TABLE `writer`
  MODIFY `id_writer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `writer_books`
--
ALTER TABLE `writer_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
