-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 02 2018 г., 02:26
-- Версия сервера: 5.7.23-0ubuntu0.16.04.1-log
-- Версия PHP: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u1768775`
--

-- --------------------------------------------------------

--
-- Структура таблицы `allergen`
--

CREATE TABLE `allergen` (
  `id` int(11) NOT NULL,
  `product` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `allergen`
--

INSERT INTO `allergen` (`id`, `product`) VALUES
(1, 'Soya'),
(2, 'Egg'),
(3, 'Milk'),
(4, 'Celery'),
(5, 'Mustard');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Breakfast'),
(2, 'Burgers'),
(3, 'Chicken Selects'),
(4, 'Wraps & Salads'),
(5, 'Fries & Sides'),
(6, 'Saver Menu'),
(7, 'Vegetarian'),
(8, 'Desserts'),
(9, 'Milkshakes & Cold Drinks'),
(10, 'McCafe');

-- --------------------------------------------------------

--
-- Структура таблицы `contains`
--

CREATE TABLE `contains` (
  `item_id` int(11) NOT NULL,
  `allergen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contains`
--

INSERT INTO `contains` (`item_id`, `allergen_id`) VALUES
(7, 1),
(9, 1),
(26, 1),
(27, 1),
(28, 1),
(2, 2),
(3, 2),
(5, 2),
(6, 2),
(14, 2),
(28, 2),
(2, 3),
(3, 3),
(5, 3),
(6, 3),
(7, 3),
(26, 3),
(27, 3),
(29, 3),
(32, 3),
(15, 4),
(16, 4),
(17, 5),
(18, 5),
(24, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `energy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `energy`) VALUES
(1, 'Breakfast Wrap', 'Choose a pork sausage patty with free-range egg, bacon, a hash brown and cheese, in a soft tortilla wrap, with your choice of brown sauce or ketchup.', 605),
(2, 'Sausage, Egg & Cheese Bagel', 'A pork sausage patty, lightly seasoned with herbs, folded egg and two slices of cheese, in a bagel. Now, that\'s a delicious breakfast.', 562),
(3, 'Bacon, Egg & Cheese Bagel', 'Delicious bacon with folded egg and two slices of cheese, in a perfectly toasted bagel. Delicious every time.', 480),
(4, 'Tropicana Orange Juice', 'A bottle of real orange juice that\'s great with your meal.', 108),
(5, 'Sausage & Egg McMuffin', 'A pork sausage patty, lightly seasoned with herbs, a free-range egg and a slice of cheese, in a hot, toasted English muffin. Perfect.', 430),
(6, 'Bacon & Egg McMuffin', 'Delicious bacon with a free-range egg, a slice of cheese and one of our toasted English muffins. Delicious every time.', 348),
(7, 'Toffee Latte', 'A large shot of delicious Arabica bean espresso, with rich toffee syrup and steamed organic milk from UK dairies. Topped with a swirl of cream and a toffee drizzle.', 183),
(8, 'Black Coffee', 'Our coffee is made with freshly ground Arabica beans from Rainforest Alliance Certified Farms™ and blended with hot water for a rich taste.', 6),
(9, 'Quaker Oat So Simple', 'Delicious oats prepared with organic semi-skimmed milk from UK dairies and topped with your choice of syrup or jam. Nutrition values and allergen information do not include jam or syrup.', 194),
(10, 'Hot Chocolate', 'Deliciously warming, this is a silky smooth blend of chocolatey syrup and water.', 173),
(11, 'Cheeseburger', 'Sometimes you just want to reach for a classic. A classic 100% beef patty, and cheese; with onions, pickles, mustard and a dollop of tomato ketchup, in a soft bun. Delicious.', 301),
(12, 'Hamburger', '100% beef patty with onions, pickles, mustard and a dollop of tomato ketchup, all in a soft bun. A classic, every time.', 250),
(13, 'McChicken Sandwich', 'Crispy coated chicken with lettuce and our sandwich sauce, in a soft, sesame-topped bun. A true classic.', 388),
(14, 'The Brazilian Stack', 'Two succulent beef patties topped with smoky bacon and a generous dash of chilli & lime sauce.', 679),
(15, 'Chicken Selects', 'Strips of tender chicken breast in a seasoned, crispy coating. Nutrition and allergen information do not include dips.', 359),
(16, 'Chicken McNuggets', '00% chicken breast meat in a deliciously crispy coating, just waiting to be dipped. A firm favourite with everyone.', 259),
(17, 'The Garlic Mayo Chicken One - Grilled', 'Try succulent grilled chicken breast pieces with garlic mayo, tomato, crisp lettuce and cucumber in a soft, toasted tortilla wrap. Wrap of the Day every Wednesday!', 345),
(18, 'The Garlic Mayo Chicken One - Crispy', 'Bite into irresistible crispy chicken breast strips with garlic mayo, tomato, lettuce and cucumber in a soft, toasted tortilla wrap. Wrap of the Day every Wednesday!', 479),
(19, 'Crispy Chicken Salad', 'Chicken breast in a crispy coating, on top of seasonal salad leaves with cucumber and cherry tomatoes. Will you add fajita-style or balsamic dressing?', 265),
(20, 'Shaker Side Salad', 'Seasonal salad leaves, cucumber and cherry tomatoes. It\'s the perfect side salad to enjoy with your meal!\r\n ', 18),
(21, 'McDonald\'s Fries', 'Fluffy on the inside and crispy on the outside, our fries are cut from whole potatoes. That\'s why they\'re so delicious.', 337),
(22, 'Apple & Grape Fruit Bag', 'For a tasty snack on the go, try our Apple and Grape Fruit Bag. Sweet grapes and delicious apple that are one of your five-a-day and you can even swap it into a Happy Meal® instead of Fries.', 46),
(23, 'Spicy Nacho Cheese Wedges', 'A portion of 5 nacho cheese wedges with jalapenos, in a crispy nacho coating. Served with a sour cream & chive dip.', 228),
(24, 'Double Cheeseburger', 'Love our Cheeseburger? Double it! Think two 100% beef patties with cheese, onions, pickles, mustard and a dollop of tomato ketchup, all in a perfectly soft bun.', 445),
(25, 'Spicy Chicken Snack Wrap', 'A piece of crispy coated chicken with spicy mayo, lettuce and cheese, in a warm tortilla wrap. A delicious snack, every time.', 322),
(26, 'Oreo McFlurry', 'Take two great things and put them together. Like our soft ice cream made with milk from UK dairies, and crumbled-up Oreo cookies. Who could resist?', 267),
(27, 'Ice Cream Cone', 'Deliciously soft ice cream made with milk from UK dairies, sitting in a perfectly crisp cone.', 145),
(28, 'Sugar Donut', 'It’s a classic. A soft ring donut, dusted in sugar and totally delicious.', 189),
(29, 'Strawberry Milkshake', 'Made with milk from UK dairies, our deliciously thick strawberry milkshake is a treat whatever the time of day.', 331),
(30, 'Fanta Orange', 'Unlock the taste of delicious Fanta Orange. Perfect with your meal or on its own.', 76),
(31, 'Coca-Cola Classic', 'A classic, since 1886. Enjoy it with a meal or on its own as a refreshing drink.', 170),
(32, 'Caramel Iced Frappe', 'A hint of delicious coffee is blended with ice, then topped with cream and our smooth caramel sauce. Just the thing to cool down with on a hot day.', 313),
(33, 'Double Espresso', 'A double shot of coffee made from freshly ground 100% Arabica beans.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `item_category`
--

CREATE TABLE `item_category` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `item_category`
--

INSERT INTO `item_category` (`item_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(22, 1),
(28, 1),
(33, 1),
(2, 2),
(3, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(24, 2),
(15, 3),
(16, 3),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(11, 6),
(12, 6),
(13, 6),
(20, 6),
(21, 6),
(24, 6),
(26, 6),
(4, 7),
(9, 7),
(10, 7),
(20, 7),
(22, 7),
(26, 7),
(28, 7),
(29, 7),
(30, 7),
(31, 7),
(33, 7),
(22, 8),
(26, 8),
(27, 8),
(28, 8),
(4, 9),
(29, 9),
(30, 9),
(31, 9),
(32, 9),
(7, 10),
(8, 10),
(10, 10),
(33, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `item_meal`
--

CREATE TABLE `item_meal` (
  `item_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `item_meal`
--

INSERT INTO `item_meal` (`item_id`, `meal_id`) VALUES
(6, 1),
(8, 1),
(22, 1),
(4, 2),
(17, 2),
(22, 2),
(16, 3),
(20, 3),
(30, 3),
(19, 4),
(21, 4),
(31, 4),
(13, 5),
(20, 5),
(29, 5),
(3, 6),
(7, 6),
(22, 6),
(21, 7),
(24, 7),
(26, 7),
(31, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `meal`
--

CREATE TABLE `meal` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `meal`
--

INSERT INTO `meal` (`id`, `name`) VALUES
(1, 'Breakfast-McMuffin'),
(2, 'Main-Chicken Wrap'),
(3, 'Main-Chicken nuggets'),
(4, 'Grilled chicken & bacon salad'),
(5, 'McChicken Meal'),
(6, 'Breakfast-Cheese Bagel'),
(7, 'Double Cheesburger Meal');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `fname` tinytext,
  `lname` tinytext,
  `postcode` tinytext,
  `phone` tinytext,
  `userType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`, `fname`, `lname`, `postcode`, `phone`, `userType`) VALUES
(6, 'herexo', 'victor.meriacri@mail.ru', '$2y$10$oxENKxmcsn4ilm6nUEhE6evxtj3jAhFM6gfJZdoB.5egnmQkA9Opu', 'Victor', 'Meriacri', 'IG1 3DQ', '1231', 3),
(7, 'Phil', 'phil@gmail.com', '$2y$10$qFeoCKjSPjMrMUKJzy6DPOU.D78vMggYSBYn7bWkzXzXh8aka5y9e', 'Phil', 'Dane', '222', '243254', 3),
(8, 'gg', 'jane123@gmal.com', '$2y$10$a2wjkExwDiY/BXNYMDkWJOXzWs1CE/YyQfuFd.i0bVVyM4Z0XJBNq', 'aLEX', 'Cosnean', 'HD1 3hbas', '123124', 3),
(9, 'Lai', 'lai@gmail.com', '$2y$10$ESs1rrQrSTvPwWDbeoeD5.PJx8eqbiAbABoBxgaQuAd81A4jBGtI.', 'lai', 'JY', 'hd1 2jf', '045123641233', 3),
(10, 'victorm', 'victormeradasd@asdasas', '$2y$10$pJfam7FvF/pGUpTgBfTYgeEoioAyCEyrG/kMU3EXZs4F2SxX6dUC.', 'Victor', 'Meriacri', 'HD8 0WL', '09123123', 1),
(11, 'John', 'johnp@', '$2y$10$vOn24DHtSdcPyuu1m2nHoePl.pFAFlbZtMLghuLJKUuEK2rZqbN5i', 'john', 'phil', 'h43g5', '23453', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `allergen`
--
ALTER TABLE `allergen`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`item_id`,`allergen_id`),
  ADD KEY `fk_allergen` (`allergen_id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`item_id`,`category_id`),
  ADD KEY `FK_item_category_category` (`category_id`);

--
-- Индексы таблицы `item_meal`
--
ALTER TABLE `item_meal`
  ADD PRIMARY KEY (`item_id`,`meal_id`),
  ADD KEY `fk_meal` (`meal_id`);

--
-- Индексы таблицы `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `allergen`
--
ALTER TABLE `allergen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`allergen_id`) REFERENCES `allergen` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contains_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `item_category`
--
ALTER TABLE `item_category`
  ADD CONSTRAINT `FK_item_category_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_item_category_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `item_meal`
--
ALTER TABLE `item_meal`
  ADD CONSTRAINT `fk_item` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `item_meal_ibfk_2` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
