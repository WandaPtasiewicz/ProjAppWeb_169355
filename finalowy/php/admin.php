<?php
session_start();

require_once 'cfg.php';
    //sprawdza czy dane logowania są poprawne
             if(isset($_POST['x1_submit'])){
                 
                $userLogin = $_POST['login_email'];
                $userPass = $_POST['login_pass'];
                
                if($userLogin == $login && $userPass == $pass){
                    $_SESSION['logged'] = true;
                    echo "<p>Zalogowano</p>";
                }else{
                    echo FormularzLogowania();
                    echo "<p>Bledne dane logowania, sprobuj ponownie</p>";
                    exit;
                }
             
             }
             if(!isset($_SESSION['logged']) || $_SESSION['logged'] !=true ){
                 
                echo FormularzLogowania(); 
                echo "<p>Zaloguj sie</p>";
                exit;
             }
             

function FormularzLogowania()
{
    $wynik = "
    <div class='logowanie'>
        <h1 class='heading'>Panel CMS:</h1>
        <div class='logowanie'>
            <form method='post' name='LoginForm' enctype='multipart/form-data' action='" . $_SERVER['REQUEST_URI'] . "'>
                <table class='logowanie'>
                    <tr>
                        <td class='log4_t'>[email]</td>
                        <td><input type='text' name='login_email' class='logowanie' /></td>
                    </tr>
                    <tr>
                        <td class='log4_t'>[hasło]</td>
                        <td><input type='password' name='login_pass' class='logowanie' /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type='submit' name='x1_submit' class='logowanie' value='zaloguj' /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    ";
    return $wynik;
}

function ListaPodstron()
{
    global $link;

    $query = "SELECT id, page_title FROM page_list LIMIT 100";
    $result = mysqli_query($link, $query);

    echo '<table border="1">
            <tr>
                <th>id</th>
                <th>Tytuł strony</th>
                <th>Czynności</th>
            </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['page_title'] . '</td>';
        echo '<td>
                <form method="get" action="' . $_SERVER['PHP_SELF'] . '">
                    <input type="hidden" name="edit_page_id" value="' . $row['id'] . '">
                    <input type="hidden" name="idp" value="panelCMS.php">
                    <button type="submit">Edytuj</button>
                </form>
                <form method="post">
                    <input type="hidden" name="delete_subpage_id" value="' . $row['id'] . '">
                    <button type="submit" name="delete">Usuń</button>
                </form>
              </td>';
        echo '</tr>';
    }

    echo '</table>';
}


function EdytujPodstrone($id)
{
    global $link;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tytul'])) {
        $tytul = mysqli_real_escape_string($link, $_POST['tytul']);
        $tresc = mysqli_real_escape_string($link, $_POST['tresc']);
        $status = isset($_POST['aktywny']) ? 1 : 0;

        $query = "UPDATE page_list SET page_title = '$tytul', page_content = '$tresc', status = $status WHERE id = $id LIMIT 1";
        if (mysqli_query($link, $query)) {
            echo '<p>Podstrona została zaktualizowana!</p>';
        } else {
            echo '<p>Wystąpił błąd ' . mysqli_error($link) . '</p>';
        }
    } else {
        $query = "SELECT page_title, page_content, status FROM page_list WHERE id = $id LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        echo '<form method="post">
                <label for="tytul">Tytuł:</label><br>
                <input type="text" id="tytul" name="tytul" value="' . htmlspecialchars($row['page_title']) . '" required><br><br>

                <label for="tresc">Treść:</label><br>
                <textarea id="tresc" name="tresc" required>' . htmlspecialchars($row['page_content']) . '</textarea><br><br>

                <label for="aktywny">Aktywny:</label>
                <input type="checkbox" id="aktywny" name="aktywny" ' . ($row['status'] ? 'checked' : '') . '><br><br>

                <input type="submit" value="Zapisz">
              </form>';
    }
}

function DodajNowaPodstrone()
{
    global $link;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tytul'])) {
        $tytul = mysqli_real_escape_string($link, $_POST['tytul']);
        $tresc = mysqli_real_escape_string($link, $_POST['tresc']);
        $status = isset($_POST['aktywny']) ? 1 : 0;

        $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$tytul', '$tresc', $status)";
        if (mysqli_query($link, $query)) {
            echo '<p>podstrona została dodana!</p>';
        } else {
            echo '<p>Wystąpił błąd ' . mysqli_error($link) . '</p>';
        }
    } else {
        echo '<form method="post">
                <label for="tytul">Tytuł:</label><br>
                <input type="text" id="tytul" name="tytul" required><br><br>

                <label for="tresc">Treść:</label><br>
                <textarea id="tresc" name="tresc" required></textarea><br><br>
                <input type="submit" value="Dodaj">
              </form>';
    }
}
function UsunPodstrone()
{
    global $link;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_subpage_id'])) {
        
        $id = (int)$_POST['delete_subpage_id'];
        $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
    
        if (mysqli_query($link, $query)) {
            echo '<p>Podstrona została usunięta!</p>';
        } else {
            echo '<p>Wystąpił błąd  ' . mysqli_error($link) . '</p>';
        }
    }
}



function DodajKategorie(){
    global $link;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nazwa'])) {
            $matka = mysqli_real_escape_string($link, $_POST['matka']);
            $nazwa = mysqli_real_escape_string($link, $_POST['nazwa']);

            $query = "INSERT INTO kategorie (matka, nazwa) VALUES ('$matka', '$nazwa')";
            if (mysqli_query($link, $query)) {
                echo '<p>kategoria została dodana!</p>';
            } else {
                echo '<p>Wystąpił błąd ' . mysqli_error($link) . '</p>';
            }
        } else {
            echo '<form method="post">
                    <label for="matka">matka:</label><br>
                    <input type="int" id="matka" name="matka" ><br><br>

                    <label for="nazwa">nazwa:</label><br>
                    <textarea id="nazwa" name="nazwa" required></textarea><br><br>
                    <input type="submit" value="Dodaj">
                  </form>';
        }
}

function UsunKategorie(){
    global $link;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_category_id'])) {

            $id = (int)$_POST['delete_category_id'];
            $query = "DELETE FROM kategorie WHERE id = $id LIMIT 1";

            if (mysqli_query($link, $query)) {
                echo '<p>kategoria została usunięta!</p>';
            } else {
                echo '<p>Wystąpił błąd  ' . mysqli_error($link) . '</p>';
            }
        }
}

function EdytujKategorie($id){
    global $link;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nazwa'])) {
            $matka = mysqli_real_escape_string($link, $_POST['matka']);
            $nazwa = mysqli_real_escape_string($link, $_POST['nazwa']);

            $query = "UPDATE kategorie SET matka = '$matka', nazwa = '$nazwa' WHERE id = $id LIMIT 1";
            if (mysqli_query($link, $query)) {
                echo '<p>kategoria została zaktualizowana!</p>';
            } else {
                echo '<p>Wystąpił błąd ' . mysqli_error($link) . '</p>';
            }
        } else {
            $query = "SELECT matka, nazwa FROM kategorie WHERE id = $id LIMIT 1";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);

            echo '<form method="post">
                    <label for="matka">matka </label><br>
                    <input type="int" id="matka" name="matka" value="' . htmlspecialchars($row['matka']) . '" required><br><br>

                    <label for="nazwa">nazwa </label><br>
                    <textarea id="nazwa" name="nazwa" required>' . htmlspecialchars($row['nazwa']) . '</textarea><br><br>
                    <input type="submit" value="Zapisz">
                  </form>';
        }
}

function PokazKategorie(){
    global $link;

        $query = "SELECT id, nazwa, matka FROM kategorie LIMIT 100";
        $result = mysqli_query($link, $query);

        echo '<table border="1">
                <tr>
                    <th>id</th>
                    <th>nazwa</th>
                    <th>matka</th>
                    <th>czynnosci</th>
                </tr>';

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nazwa'] . '</td>';
            echo '<td>' . $row['matka'] . '</td>';
            echo '<td>
                    <form method="get" action="' . $_SERVER['PHP_SELF'] . '">
                        <input type="hidden" name="edit_category_id" value="' . $row['id'] . '">
                        <input type="hidden" name="idp" value="panelCMS.php">
                        <button type="submit">Edytuj</button>
                    </form>
                    <form method="post">
                        <input type="hidden" name="delete_category_id" value="' . $row['id'] . '">
                        <button type="submit" name="delete">Usuń</button>
                    </form>
                  </td>';
            echo '</tr>';
        }

        echo '</table>';
}



function DodajProdukt(){
    global $link;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tytul'])) {
            $tytul = mysqli_real_escape_string($link, $_POST['tytul']);
            $opis = mysqli_real_escape_string($link, $_POST['opis']);
            $data_utworzenia = date("Y-m-d");
            $cena_netto = mysqli_real_escape_string($link, $_POST['cena_netto']);
            $podatek_vat = mysqli_real_escape_string($link, $_POST['podatek_vat']);
            $ilosc = mysqli_real_escape_string($link, $_POST['ilosc']);
            $status_dostepnosci = mysqli_real_escape_string($link, $_POST['status_dostepnosci']);
            $kategoria = mysqli_real_escape_string($link, $_POST['kategoria']);
            $gabaryt = mysqli_real_escape_string($link, $_POST['gabaryt']);
            $zdjecie = mysqli_real_escape_string($link,file_get_contents($_FILES['zdjecie']['tmp_name']));

            $query = "INSERT INTO produkty (tytul, opis, data_utworzenia, cena_netto, podatek_vat, ilosc, status_dostepnosci, kategoria, gabaryt, zdjecie)
             VALUES ('$tytul', '$opis','$data_utworzenia', '$cena_netto', '$podatek_vat', '$ilosc', '$status_dostepnosci', '$kategoria', '$gabaryt', '$zdjecie')";
            if (mysqli_query($link, $query)) {
                echo '<p>produkt został dodany!</p>';
            } else {
                echo '<p>Wystąpił błąd ' . mysqli_error($link) . '</p>';
            }
        } else {
            echo '<form method="POST" enctype="multipart/form-data">
                    <label for="tytul">tytul:</label><br>
                    <input type="text" id="tytul" name="tytul" ><br><br>

                    <label for="opis">opis:</label><br>
                    <textarea id="opis" name="opis" ></textarea><br><br>

                    <label for="cena_netto">cena_netto:</label><br>
                    <textarea id="cena_netto" name="cena_netto" ></textarea><br><br>

                    <label for="podatek_vat">podatek_vat:</label><br>
                    <textarea id="podatek_vat" name="podatek_vat" ></textarea><br><br>

                    <label for="ilosc">ilosc:</label><br>
                    <textarea id="ilosc" name="ilosc" ></textarea><br><br>

                    <label for="status_dostepnosci">status_dostepnosci:</label><br>
                    <textarea id="status_dostepnosci" name="status_dostepnosci" ></textarea><br><br>

                    <label for="kategoria">kategoria:</label><br>
                    <textarea id="kategoria" name="kategoria" ></textarea><br><br>

                    <label for="gabaryt">gabaryt:</label><br>
                    <textarea id="gabaryt" name="gabaryt" ></textarea><br><br>

                    <label for="zdjecie">zdjecie:</label><br>
                    <input type="file" id="zdjecie" name="zdjecie" ><br><br>

                    <input type="submit" value="Dodaj">
                  </form>';
        }
}

function UsunProdukt(){
    global $link;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product_id'])) {

            $id = (int)$_POST['delete_product_id'];
            $query = "DELETE FROM produkty WHERE id = $id LIMIT 1";

            if (mysqli_query($link, $query)) {
                echo '<p>produkt została usunięta!</p>';
            } else {
                echo '<p>Wystąpił błąd  ' . mysqli_error($link) . '</p>';
            }
        }
}

function EdytujProdukt($id){
    global $link;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tytul'])) {
                        $tytul = mysqli_real_escape_string($link, $_POST['tytul']);
                        $opis = mysqli_real_escape_string($link, $_POST['opis']);
                        $data_modyfikacji = date("Y-m-d");
                        $data_wygasniecia = null;
                        $cena_netto = mysqli_real_escape_string($link, $_POST['cena_netto']);
                        $podatek_vat = mysqli_real_escape_string($link, $_POST['podatek_vat']);
                        $ilosc = mysqli_real_escape_string($link, $_POST['ilosc']);
                        $status_dostepnosci = mysqli_real_escape_string($link, $_POST['status_dostepnosci']);
                        $kategoria = mysqli_real_escape_string($link, $_POST['kategoria']);
                        $gabaryt = mysqli_real_escape_string($link, $_POST['gabaryt']);
                        $zdjecie = mysqli_real_escape_string($link,file_get_contents($_FILES['zdjecie']['tmp_name']));

                        if($ilosc==0){
                            $status_dostepnosci=0;
                            $data_wygasniecia = date("Y-m-d");
                        }
                        if($ilosc > 0){
                           $status_dostepnosci=1;
                           }

            $query = "UPDATE produkty SET tytul = '$tytul', opis = '$opis', data_modyfikacji = '$data_modyfikacji',
            data_wygasniecia = '$data_wygasniecia', cena_netto = '$cena_netto',
             podatek_vat = '$podatek_vat', ilosc = '$ilosc', status_dostepnosci = '$status_dostepnosci', kategoria = '$kategoria',
              gabaryt = '$gabaryt', zdjecie = '$zdjecie' WHERE id = $id LIMIT 1";
            if (mysqli_query($link, $query)) {
                echo '<p>produkt został zaktualizowany!</p>';
            } else {
                echo '<p>Wystąpił błąd ' . mysqli_error($link) . '</p>';
            }
        } else {
            $query = "SELECT tytul, opis, cena_netto, podatek_vat, ilosc, status_dostepnosci, kategoria, gabaryt, zdjecie FROM produkty WHERE id = $id LIMIT 1";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_assoc($result);

            echo '<form method="post" enctype="multipart/form-data">
                                <label for="tytul">tytul:</label><br>
                                <input type="text" id="tytul" name="tytul" value="' . htmlspecialchars($row['tytul']). '"><br><br>

                                <label for="opis">opis:</label><br>
                                <textarea id="opis" name="opis" >' . htmlspecialchars($row['opis']). '</textarea><br><br>

                                <label for="cena_netto">cena_netto:</label><br>
                                <textarea id="cena_netto" name="cena_netto" >' . htmlspecialchars($row['cena_netto']). '</textarea><br><br>

                                <label for="podatek_vat">podatek_vat:</label><br>
                                <textarea id="podatek_vat" name="podatek_vat" >' . htmlspecialchars($row['podatek_vat']). '</textarea><br><br>

                                <label for="ilosc">ilosc:</label><br>
                                <textarea id="ilosc" name="ilosc" >' . htmlspecialchars($row['ilosc']). '</textarea><br><br>

                                <label for="status_dostepnosci">status_dostepnosci:</label><br>
                                <textarea id="status_dostepnosci" name="status_dostepnosci" >' . htmlspecialchars($row['status_dostepnosci']). '</textarea><br><br>

                                <label for="kategoria">kategoria:</label><br>
                                <textarea id="kategoria" name="kategoria" >' . htmlspecialchars($row['kategoria']). '</textarea><br><br>

                                <label for="gabaryt">gabaryt:</label><br>
                                <textarea id="gabaryt" name="gabaryt" >' . htmlspecialchars($row['gabaryt']). '</textarea><br><br>

                                <label for="zdjecie">zdjecie:</label><br>
                                <input type="file" id="zdjecie" name="zdjecie" ><br><br>

                                <input type="submit" value="Dodaj">
                              </form>';
        }
}

function PokazProdukty(){
    global $link;

        $query = "SELECT id, tytul,data_utworzenia,data_modyfikacji,data_wygasniecia, cena_netto,podatek_vat, ilosc, kategoria, zdjecie FROM produkty LIMIT 100";
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
                    <th>zdjecie</th>
                    <th>czynnosci</th>
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
            echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row["zdjecie"]) . '" width="50" height="50"></td>';
            echo '<td>
                    <form method="get" action="' . $_SERVER['PHP_SELF'] . '">
                        <input type="hidden" name="edit_product_id" value="' . $row['id'] . '">
                        <input type="hidden" name="idp" value="panelCMS.php">
                        <button type="submit">Edytuj</button>
                    </form>
                    <form method="post">
                        <input type="hidden" name="delete_product_id" value="' . $row['id'] . '">
                        <button type="submit" name="delete">Usuń</button>
                    </form>
                  </td>';
            echo '</tr>';
        }

        echo '</table>';
}




if (isset($_POST['x1_submit'])) {

    $userLogin = $_POST['login_email'];
    $userPass = $_POST['login_pass'];

    if ($userLogin == $login && $userPass == $pass) {

        $_SESSION['logged'] = true;
        echo "<p>Zalogowano</p>";

    } else {

        echo FormularzLogowania();
        echo "<p>Bledne dane logowania, spróbuj ponownie</p>";
        exit;

    }
}

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != true) {
    echo FormularzLogowania();
    echo "<p>Zaloguj się</p>";
    exit;
}

if (isset($_GET['edit_page_id'])) {

    EdytujPodstrone((int)$_GET['edit_page_id']);

} elseif (isset($_GET['add_page'])) {

    DodajNowaPodstrone();

} else {

    ListaPodstron();
    UsunPodstrone();
    echo '<br><a href="index.php?idp=panelCMS.php&add_page=1">Dodaj nowa podstronę</a>';

}




if (isset($_GET['edit_category_id'])) {

    EdytujKategorie((int)$_GET['edit_category_id']);

} elseif (isset($_GET['add_category'])) {

     DodajKategorie();

} else {

    PokazKategorie();
    UsunKategorie();
   echo '<br><a href="index.php?idp=panelCMS.php&add_category=1">Dodaj nowa kategorie</a>';

}


if (isset($_GET['edit_product_id'])) {

    EdytujProdukt((int)$_GET['edit_product_id']);

} elseif (isset($_GET['add_product'])) {

     DodajProdukt();

} else {

    PokazProdukty();
    UsunProdukt();
   echo '<br><a href="index.php?idp=panelCMS.php&add_product=1">Dodaj nowy produkt</a>';

}


?>