-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 22, 2025 at 12:40 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_page`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `matka` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `matka`, `nazwa`) VALUES
(1, 0, 'jedzenie'),
(3, 0, 'ubrania'),
(4, 1, 'ciastka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'kontakt', '         <div class = \"mainmenu\"> <h1>Moje hobby to pieczenie słodkości</h1> </div>\r\n         <div class = \"lewy\"> \r\n               <h2>Moje ulubione przepisy: </h2> \r\n               <a href=\"index.php?idp=podstrona1.html\">ciasto czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona2.html\">chlebek bananowy</a><br><br>\r\n               <a href=\"index.php?idp=podstrona3.html\">ciasteczka z czekoladą</a><br><br>\r\n               <a href=\"index.php?idp=podstrona4.html\">babeczki czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona5.html\">szarlotka</a><br><br><br>\r\n                  <a href=\"index.php?idp=kontakt.html\">Kontakt</a><br><br>\r\n             <a href=\"index.php?idp=glowna.html\">powrót do menu</a><br><br>\r\n         </div>\r\n         <div class = \"prawy\">\r\n             <img src=\"zdj/czapka.jpg\" width=\"50px\" height=\"45px\" ALIGN=\"LEFT\" /><p>Hej z tej strony Wanda jestem początkującą kucharka.<br> Jeśli chcesz mi dać porady, ciekawy przepis albo z masz<br> do mnie inną sprawe to wyślij maila.</p>\r\n             <br>\r\n             <h2>Formularz</h2>\r\n                <form method=\"post\" action=\"mailto:169355@student.uwm.edu.pl \" id=\"contact_form\"> \r\n                    <div><label type=\"name\" >Imie i Nazwisko</label></div>\r\n                    <div><input type=\"text\" id=\"name\" name=\"name\" required></div>\r\n                    <div><label type=\"email\" >email</label></div>\r\n                    <div><input type=\"email\" id=\"email\" name=\"email\" required></div>\r\n                    <div><label >Treść</label></div>\r\n                        <div><textarea name=\"message\" id=\"message\" class=\"formField\" ></textarea></div>\r\n                        <div><button type=\"submit\" >Wyślij</button></div>\r\n                </form>\r\n         </div>\r\n    ', 1),
(2, 'podstrona1', '<div class = \"mainmenu\"> <h1>Chlebek bananowy</h1> </div>\r\n<div class = \"lewy\"> \r\n    <a href=\"index.php?idp=podstrona1.html\">ciasto czekoladowe</a><br><br>\r\n    <a href=\"index.php?idp=podstrona2.html\">chlebek bananowy</a><br><br>\r\n    <a href=\"index.php?idp=podstrona3.html\">ciasteczka z czekoladą</a><br><br>\r\n    <a href=\"index.php?idp=podstrona4.html\">babeczki czekoladowe</a><br><br>\r\n    <a href=\"index.php?idp=podstrona5.html\">szarlotka</a><br><br><br>\r\n       <a href=\"index.php?idp=kontakt.html\">Kontakt</a><br><br>\r\n  <a href=\"index.php?idp=glowna.html\">powrót do menu</a><br><br>\r\n</div>\r\n<div class = \"prawy\"><div class=\"l\">\r\n      <h3>Składniki:</h3>\r\n                 <ul>\r\n                     <li>80 g masła </li>\r\n                     <li>100 g czekolady  deserowej  </li>\r\n                     <li>1/2 szklanki (125 ml) mleka </li>\r\n                     <li>2 jajka </li>\r\n                     <li>150 g (3/4 szklanki) cukru </li>                     \r\n                     <li>150 g (1 szklanka) mąki </li>\r\n                     <li>1 łyżeczka proszku do pieczenia </li>\r\n                     <h4>Polewa</h4>\r\n                     <li>100 g czekolady  deserowej  </li>\r\n                     <li>25g masła </li>\r\n                 </ul>\r\n    </div>\r\n    <div class=\"p\">\r\n        <h3>Przygotowanie</h3>\r\n        <ol>\r\n                     <li>Jajka ogrzać np. w misce z ciepłą wodą. Dno małej tortownicy o średnicy 21 cm wyłożyć papierem do pieczenia, zapiąć obręcz. Piekarnik nagrzać do 175 stopni C. </li>\r\n                     <li>W rondelku umieścić pokrojone masło oraz połamaną na kosteczki czekoladę, podgrzewać na minimalnym ogniu ciągle mieszając aż składniki się roztopią i otrzymamy gładką masę czekoladową. Odstawić z ognia, dodać mleko i wymieszać.  </li>\r\n                     <li>W misce ubić jajka z cukrem (ok. 4 minuty) na puszystą masę. </li>\r\n                     <li>Do drugiej miski przesiać mąkę, dodać proszek do pieczenia i dokładnie wymieszać. </li>\r\n                     <li>Do mąki dodać ubite jajka oraz masę czekoladową i zmiksować na minimalnych obrotach miksera lub wymieszać rózgą tylko do połączenia się składników w jednolite ciasto. </li>                     \r\n                     <li>Przelać je do tortownicy, wstawić do piekarnika i piec przez ok. 43 minuty do suchego patyczka</li>\r\n                     <li>Polać polewą: do garnka włożyć połamaną na kosteczki czekoladę i pokrojone masło, cały czas mieszając podgrzewać na małym ogniu aż czekolada się roztopi (lub rozpuścić w mikrofali).</li>\r\n                 </ol>\r\n        <img src=\"zdj/czekoladowe1.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n        <img src=\"zdj/czekoladowe2.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n        <img src=\"zdj/czekoladowe3.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n    </div> </div>\r\n', 1),
(3, 'podstrona2', '<div class = \"mainmenu\"> <h1>Chlebek bananowy</h1> </div>\r\n<div class = \"lewy\"> \r\n    <a href=\"index.php?idp=podstrona1.html\">ciasto czekoladowe</a><br><br>\r\n    <a href=\"index.php?idp=podstrona2.html\">chlebek bananowy</a><br><br>\r\n    <a href=\"index.php?idp=podstrona3.html\">ciasteczka z czekoladą</a><br><br>\r\n    <a href=\"index.php?idp=podstrona4.html\">babeczki czekoladowe</a><br><br>\r\n    <a href=\"index.php?idp=podstrona5.html\">szarlotka</a><br><br><br>\r\n       <a href=\"index.php?idp=kontakt.html\">Kontakt</a><br><br>\r\n  <a href=\"index.php?idp=glowna.html\">powrót do menu</a><br><br>\r\n</div>\r\n<div class = \"prawy\"><div class=\"l\">\r\n        <h3>Składniki:</h3>\r\n        <ul>\r\n            <li>4 jajka </li>\r\n            <li>1 szklanka cukru  </li>\r\n            <li>200 ml oleju roślinnego lub 200 g masła </li>\r\n            <li>4 banany </li>\r\n            <li>2 i 1/2 szklanki mąki pszennej </li>                     \r\n            <li>2 i 1/2 łyżeczki proszku do pieczenia </li>\r\n            <li>1 łyżeczka sody oczyszczonej </li>\r\n            <li>szczypta soli</li>\r\n            <li>1 szklanka posiekanych orzechów </li>\r\n            <li>1 szklanka wiórków kokosowych </li>\r\n        </ul>\r\n    </div>\r\n    <div class=\"p\">\r\n        <h3>Przygotowanie</h3>\r\n        <ol>\r\n            <li>Piekarnik nagrzać do 180 stopni C. Jajka wbić do miski i rozmiksować lub roztrzepać. Miksując dodawać cukier, olej roślinny lub roztopione masło, a na końcu rozgniecione lub zmiksowane blenderem banany. </li>\r\n            <li>W drugiej misce wymieszać mąkę z proszkiem do pieczenia, sodą i solą. Dodać masę bananową i wymieszać. </li>\r\n            <li>Dodać drobno posiekane orzechy oraz wiórki kokosowe jeśli je używamy i połączyć składniki.</li>\r\n            <li>Ciasto wyłożyć do wyścielonej papierem do pieczenia dużej podłużnej formy keksowej i piec przez ok. 1 godzinę lub do suchego patyczka.</li>\r\n            \r\n        </ol>\r\n        <img src=\"zdj/banan1.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n        <img src=\"zdj/banan2.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n        <img src=\"zdj/banan3.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n    </div> </div>\r\n', 1),
(4, 'podstrona3', '\r\n         <div class = \"mainmenu\"> <h1>Ciasteczka z czekoladą</h1> </div>\r\n         <div class = \"lewy\"> \r\n            <a href=\"index.php?idp=podstrona1.html\">ciasto czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona2.html\">chlebek bananowy</a><br><br>\r\n               <a href=\"index.php?idp=podstrona3.html\">ciasteczka z czekoladą</a><br><br>\r\n               <a href=\"index.php?idp=podstrona4.html\">babeczki czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona5.html\">szarlotka</a><br><br><br>\r\n                  <a href=\"index.php?idp=kontakt.html\">Kontakt</a><br><br>\r\n             <a href=\"index.php?idp=glowna.html\">powrót do menu</a><br><br>\r\n         </div>\r\n         <div class = \"prawy\"> <div class=\"l\">\r\n                 <h3>Składniki:</h3>\r\n                 <ul>\r\n                     <li>1 pełna szklanka (160 g) mąki pszennej </li>\r\n                     <li>1/3 łyżeczki soli  </li>\r\n                     <li>1/3 łyżeczki sody oczyszczonej lub proszku do pieczenia </li>\r\n                     <li>2 łyżki cukru wanilinowego (lub 1 łyżeczka ekstraktu) </li>\r\n                     <li>100 g masła </li>                     \r\n                     <li>2 i 1/2 łyżeczki proszku do pieczenia </li>\r\n                     <li>80 g cukru trzcinowego </li>\r\n                     <li>80 g cukru białego</li>\r\n                     <li>1 jajko </li>\r\n                     <li>300 g czekolady (po 100 g białej, mlecznej i gorzkiej) </li>\r\n                 </ul>\r\n             </div>\r\n             <div class=\"p\">\r\n                 <h3>Przygotowanie</h3>\r\n                 <ol>\r\n                     <li>Piekarnik nagrzać do 160 stopni C. Przygotować 2 duże blaszki do pieczenia i wyłożyć je papierem do pieczenia (ewentualnie można użyć 1 blaszki i piec jedną porcję po drugiej). </li>\r\n                     <li>Mąkę przesiać do miski, dodać sól, sodę lub proszek, cukier wanilinowy i wymieszać.</li>\r\n                     <li>W drugiej misce ubijać masło z dodatkiem cukru białego i trzcinowego przez około 5 minut. Dodać jajko i ubijać jeszcze przez około 5 minut.</li>\r\n                     <li>Dodać sypkie składniki i zmiksować lub wymieszać.</li>\r\n                     <li>Dodać posiekaną czekoladę (każdą kosteczkę pokroić na 4 kawałeczki) i wymieszać łyżką.</li>\r\n                     <li>Nabierać po około 2 łyżki masy, uformować 18 kulek i ułożyć je na 2 blaszkach do pieczenia. Odrobinę spłaszczyć palcami wierzch każdej kulki.</li>\r\n                     <li>Pierwszą blaszkę z ciastkami wstawić do piekarnika i piec przez 15 minut (aż brzegi ciastek zaczną się rumienić). Ciastka wyjmujemy z piekarnika gdy są jeszcze miękkie, a zastygają po ostudzeniu. Upiec drugą partię ciastek.</li>\r\n                     \r\n                 </ol>\r\n                 <img src=\"zdj/ciastko1.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n                 <img src=\"zdj/ciastko2.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n                 <img src=\"zdj/ciastko3.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n             </div> </div>\r\n', 1),
(5, 'podstrona4', '\r\n         <div class = \"mainmenu\"> <h1>Babeczki czekoladowe</h1> </div>\r\n         <div class = \"lewy\"> \r\n            <a href=\"index.php?idp=podstrona1.html\">ciasto czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona2.html\">chlebek bananowy</a><br><br>\r\n               <a href=\"index.php?idp=podstrona3.html\">ciasteczka z czekoladą</a><br><br>\r\n               <a href=\"index.php?idp=podstrona4.html\">babeczki czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona5.html\">szarlotka</a><br><br><br>\r\n                  <a href=\"index.php?idp=kontakt.html\">Kontakt</a><br><br>\r\n             <a href=\"index.php?idp=glowna.html\">powrót do menu</a><br><br>\r\n         </div>\r\n         <div class = \"prawy\">  <div class=\"l\">\r\n                 <h3>Składniki:</h3>\r\n                 <ul>\r\n                     <li>150 g masła </li>\r\n                     <li>150 g czekolady  </li>\r\n                     <li>300 g mąki </li>\r\n                     <li>2 łyżeczki proszku do pieczenia </li>\r\n                     <li>1/2 łyżeczki sody oczyszczonej </li>                     \r\n                     <li>3 łyżki kakao </li>\r\n                     <li>1 szklanka (200 g) cukru </li>\r\n                     <li>1 łyżka cukru wanilinowego</li>\r\n                     <li>2 jajka </li>\r\n                     <li>170 ml mleka </li>\r\n                 </ul>\r\n             </div>\r\n             <div class=\"p\">\r\n                 <h3>Przygotowanie</h3>\r\n                 <ol>\r\n                     <li>Piekarnik nagrzać do 180 stopni C. Masło roztopić i ostudzić. Czekoladę pokroić na kawałeczki. </li>\r\n                     <li>Mąkę przesiać do miski razem z proszkiem do pieczenia, sodą, kakao, kawą zbożową, dokładnie wymieszać. Dodać cukier oraz cukier wanilinowy, ponownie wymieszać, odstawić.</li>\r\n                     <li>W drugiej misce rozmiksować jajka z mlekiem (rózgą lub mikserem).</li>\r\n                     <li>Do sypkich składników dodać masę jajeczną i kilkakrotnie delikatnie wymieszać łyżką. Dodać roztopione masło, wymieszać, pod koniec dodać posiekaną czekoladę. Mieszamy krótko (3 - 4 ruchy łyżką), ciasto ma być lekko grudkowate, ale surowa mąka nie powinna być widoczna.</li>\r\n                     <li>Masę wyłożyć do papilotek umieszczonych w formie na muffiny i wstawić do piekarnika (można piec na raty, w 2 partiach).</li>\r\n                     <li>Piec przez około 20 - 23 minuty, do czasu aż muffiny urosną, na wierzchu utworzy się skorupka a wetknięty patyczek nie będzie obklejony ciastem.</li>\r\n                     \r\n                 </ol>\r\n                 <img src=\"zdj/babeczki1.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n                 <img src=\"zdj/babeczki2.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n                 <img src=\"zdj/babeczki3.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n             </div> </div>\r\n  ', 1),
(6, 'podstrona5', '\r\n         <div class = \"mainmenu\"> <h1>Szarlotka</h1> </div>\r\n         <div class = \"lewy\"> \r\n            <a href=\"index.php?idp=podstrona1.html\">ciasto czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona2.html\">chlebek bananowy</a><br><br>\r\n               <a href=\"index.php?idp=podstrona3.html\">ciasteczka z czekoladą</a><br><br>\r\n               <a href=\"index.php?idp=podstrona4.html\">babeczki czekoladowe</a><br><br>\r\n               <a href=\"index.php?idp=podstrona5.html\">szarlotka</a><br><br><br>\r\n                  <a href=\"index.php?idp=kontakt.html\">Kontakt</a><br><br>\r\n             <a href=\"index.php?idp=glowna.html\">powrót do menu</a><br><br>\r\n         </div>\r\n         <div class = \"prawy\">  <div class=\"l\">\r\n                 <h3>Składniki:</h3>\r\n                 <ul>\r\n                     <h4>Jabłka</h4>\r\n                     <li>1,5 kg jabłek </li>\r\n                     <li>5 łyżek cukru  </li>\r\n                     <li>1/2 łyżeczki cynamonu</li>\r\n                     <h4>Ciasto</h4>\r\n                     <li>320 g mąki (2 szklanki) </li>\r\n                     <li>250 g zimnego masła </li>                     \r\n                     <li>1,5 łyżeczki proszku do pieczenia</li>\r\n                     <li>5 łyżek cukru </li>\r\n                     <li>1 łyżka cukru wanilinowego</li>\r\n                     <li>1 jajko </li>\r\n                     <li>Do posypania cukier puder </li>\r\n                 </ul>\r\n             </div>\r\n             <div class=\"p\">\r\n                 <h3>Przygotowanie</h3>\r\n                 <ol>\r\n                     <li>Jabłka obrać, pokroić na ćwiartki i wyciąć gniazda nasienne. Pokroić na mniejsze kawałki i włożyć do szerokiego garnka lub na głęboką patelnię.</li>\r\n                     <li>Dodać cukier i cynamon i smażyć przez ok. 20 minut co chwilę mieszając, aż jabłka zmiękną i zaczną się rozpadać.</li>\r\n                     <li>Do mąki dodać pokrojone w kostkę zimne masło, proszek do pieczenia, cukier i cukier wanilinowy.</li>\r\n                     <li>Składniki połączyć w jednolite ciasto (mikserem lub ręcznie), pod koniec dodać jajko (ciasto będzie dość miękkie).</li>\r\n                     <li>Podzielić je na pół i włożyć obie połówki do zamrażarki na ok. 15 minut.</li>\r\n                     <li>Piekarnik nagrzać do 180 st C. Przygotować formę(np tortownica średnica 26 cm).</li>\r\n                     <li>Wyjąć jedną połówkę ciasta z zamrażarki, pokroić nożem na plasterki i wylepić nimi spód formy. Następnie wyłożyć na to jabłka.</li>\r\n                     <li>Pozostałe ciasto zetrzeć na tarce bezpośrednio na jabłka (lub pokroić ciasto na plasterki i ułożyć na wierzchu).</li>\r\n                     <li>Wstawić do piekarnika i piec przez ok. 50 minut lub na złoty kolor. Upieczoną szarlotkę przestudzić i posypać cukrem pudrem.</li>\r\n                     \r\n                 </ol>\r\n                 <img src=\"zdj/szarlotka1.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n                 <img src=\"zdj/szarlotka2.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n                 <img src=\"zdj/szarlotka3.jpg\" alt=\"pyszne ciasto\" width=\"200px\" height=\"200px\">\r\n             </div> </div>\r\n', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `tytul` text NOT NULL,
  `opis` text NOT NULL,
  `data_utworzenia` date NOT NULL DEFAULT current_timestamp(),
  `data_modyfikacji` date NOT NULL,
  `data_wygasniecia` date NOT NULL,
  `cena_netto` float NOT NULL,
  `podatek_vat` float NOT NULL,
  `ilosc` int(11) NOT NULL,
  `status_dostepnosci` int(11) NOT NULL DEFAULT 1,
  `kategoria` int(11) NOT NULL,
  `gabaryt` text NOT NULL,
  `zdjecie` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc`, `status_dostepnosci`, `kategoria`, `gabaryt`, `zdjecie`) VALUES
(1, 'ciastko czekolakowe', 'pyszniutkie ciastko', '2025-01-12', '2025-01-12', '0000-00-00', 5.5, 1.33, 100, 1, 4, 'mały', ''),
(2, 'śmietana', '', '2025-01-12', '2025-01-12', '2025-01-12', 0, 0, 0, 0, 0, '', ''),
(3, 'garnek', 'fioletowy', '2025-01-12', '2025-01-12', '0000-00-00', 15.5, 2.3, 23, 0, 2, 'mały', ''),
(4, 'kubek', 'fioletowy', '2025-01-12', '2025-01-12', '0000-00-00', 15.5, 2.3, 23, 1, 2, 'mały', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
