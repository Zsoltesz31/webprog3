-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Jún 14. 13:18
-- Kiszolgáló verziója: 10.4.16-MariaDB
-- PHP verzió: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szallitmanyozas`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `munkasok`
--

CREATE TABLE `munkasok` (
  `id` int(11) NOT NULL,
  `szallitoceg_id` int(11) NOT NULL,
  `vezeteknev` varchar(250) DEFAULT NULL,
  `keresztnev` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `munkasok`
--

INSERT INTO `munkasok` (`id`, `szallitoceg_id`, `vezeteknev`, `keresztnev`) VALUES
(1, 4, 'Teszt', 'Elek'),
(2, 1, 'Csaba', 'Zoltán'),
(3, 1, 'István', 'Roland');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `raktarok`
--

CREATE TABLE `raktarok` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `szallitoceg_id` int(11) NOT NULL,
  `nev` varchar(250) DEFAULT NULL,
  `orszag` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `raktarok`
--

INSERT INTO `raktarok` (`id`, `termek_id`, `szallitoceg_id`, `nev`, `orszag`) VALUES
(10, 1, 1, 'EurópaiRaktár1', 'Németország');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `regiok`
--

CREATE TABLE `regiok` (
  `id` int(11) NOT NULL,
  `nev` varchar(250) NOT NULL,
  `ország` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `regiok`
--

INSERT INTO `regiok` (`id`, `nev`, `ország`) VALUES
(1, 'Északi', 'Svédország'),
(2, 'Déli', 'Spanyolország');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `szallitoceg`
--

CREATE TABLE `szallitoceg` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `nev` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `szallitoceg`
--

INSERT INTO `szallitoceg` (`id`, `termek_id`, `nev`) VALUES
(1, 1, 'DHL'),
(4, 1, 'GLS');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `id` int(11) NOT NULL,
  `nev` varchar(250) DEFAULT NULL,
  `anyag` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`id`, `nev`, `anyag`) VALUES
(1, 'Televízió', 'Vas'),
(6, 'Műanyag', 'Tál');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$9a0XKEmXwbR7cEk54IeV0e4vDg7OZxnPu0FcQlkrLu4xI2G.3rGBO', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1623669434, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', NULL, '$2y$10$IOWxWbc.2zkPa6loNZO.5Or8EUfNfVGHQlt.T2oD86G4Pe./h1Mq.', 'zsoltiberkes2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1623617992, 1623666875, 1, 'Berkes', 'Zsolt', '', ''),
(3, '::1', NULL, '$2y$10$sQJg5XU9yfL8YYX7ZqXGq.Eu7pkdUCq78mY89AY8Ft08oYVMObStu', 'teszt@teszt.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1623666904, 1623666935, 1, 'teszt', 'teszt', '', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `munkasok`
--
ALTER TABLE `munkasok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_szallitoceg_id` (`szallitoceg_id`);

--
-- A tábla indexei `raktarok`
--
ALTER TABLE `raktarok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_raktarok_termek_id` (`termek_id`),
  ADD KEY `FK_raktarok_szallitoceg_id` (`szallitoceg_id`);

--
-- A tábla indexei `regiok`
--
ALTER TABLE `regiok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `szallitoceg`
--
ALTER TABLE `szallitoceg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_szallitoceg_termek_id` (`termek_id`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- A tábla indexei `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `munkasok`
--
ALTER TABLE `munkasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `raktarok`
--
ALTER TABLE `raktarok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `regiok`
--
ALTER TABLE `regiok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `szallitoceg`
--
ALTER TABLE `szallitoceg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `munkasok`
--
ALTER TABLE `munkasok`
  ADD CONSTRAINT `FK_szallitoceg_id` FOREIGN KEY (`szallitoceg_id`) REFERENCES `szallitoceg` (`id`);

--
-- Megkötések a táblához `raktarok`
--
ALTER TABLE `raktarok`
  ADD CONSTRAINT `FK_raktarok_szallitoceg_id` FOREIGN KEY (`szallitoceg_id`) REFERENCES `szallitoceg` (`id`),
  ADD CONSTRAINT `FK_raktarok_termek_id` FOREIGN KEY (`termek_id`) REFERENCES `termek` (`id`);

--
-- Megkötések a táblához `szallitoceg`
--
ALTER TABLE `szallitoceg`
  ADD CONSTRAINT `FK_szallitoceg_termek_id` FOREIGN KEY (`termek_id`) REFERENCES `termek` (`id`);

--
-- Megkötések a táblához `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
