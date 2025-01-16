<?php
session_start();

require_once 'cfg.php';

function PokazProdukty(){
    global $link;

        $query = "SELECT id, tytul,data_utworzenia,data_modyfikacji,data_wygasniecia, cena_netto,podatek_vat, ilosc, kategoria FROM produkty LIMIT 100";
        $result = mysqli_query($link, $query);

        echo '<table border="1">
                <tr>
                    <th>id</th>
                    <th>tytul</th>
                    <th>data_utworzenia</th>
                    <th>data_modyfikacji</th>
                    <th>data_wygasniecia</th>
                    <th>cena_netto</th>
                    <th>podatek_vat</th>
                    <th>ilosc</th>
                    <th>kategoria</th>

                </tr>';

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['tytul'] . '</td>';
            echo '<td>' . $row['data_utworzenia'] . '</td>';
            echo '<td>' . $row['data_modyfikacji'] . '</td>';
            echo '<td>' . $row['data_wygasniecia'] . '</td>';
            echo '<td>' . $row['cena_netto'] . '</td>';
            echo '<td>' . $row['podatek_vat'] . '</td>';
            echo '<td>' . $row['ilosc'] . '</td>';
            echo '<td>' . $row['kategoria'] . '</td>';

            echo '</tr>';
        }

        echo '</table>';
}





?>