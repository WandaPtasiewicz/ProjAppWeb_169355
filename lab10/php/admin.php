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
                    <button type="submit">Edytuj</button>
                </form>
                <form method="post">
                    <input type="hidden" name="delete_id" value="' . $row['id'] . '">
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

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
        
        $id = (int)$_POST['delete_id'];
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {

            $id = (int)$_POST['delete_id'];
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
                        <button type="submit">Edytuj</button>
                    </form>
                    <form method="post">
                        <input type="hidden" name="delete_id" value="' . $row['id'] . '">
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
    echo '<br><a href="?add_page=1">Dodaj nowa podstronę</a>';

}




if (isset($_GET['edit_category_id'])) {

    EdytujKategorie((int)$_GET['edit_category_id']);

} elseif (isset($_GET['add_category'])) {

     DodajKategorie();

} else {

    PokazKategorie();
    UsunKategorie();
   echo '<br><a href="?add_category=1">Dodaj nowa kategorie</a>';

}



?>