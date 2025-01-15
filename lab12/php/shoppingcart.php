<?php
session_start();
require_once 'cfg.php';
    echo '<h3>Dodawanie do koszyka</h3>';
    echo '<form method="post"">
        <label for="idProduct">Podaj id produktu</label>
        <input type="number" name="idProduct"><br>
        <label for="count">Podaj ilosc</label>
        <input type="number" name="count"><br>
        <button type="submit" name="addToCart" >Dodaj do Koszyka</button>
        </form>';

    echo '<h3>Usuwanie z koszyka</h3>';
        echo '<form method="post"">
            <label for="idProduct">Podaj id produktu</label>
            <input type="number" name="idProduct"><br>
            <button type="submit" name="removeFromCart" >Usuń z Koszyka</button>
            </form>';


    function addToCart($idProduct, $count){
        global $link;

        $query = "SELECT * FROM produkty WHERE id=$idProduct";
        $result = mysqli_query($link,$query);
        $product = mysqli_fetch_assoc($result);

        if($product==null){
            echo"nie ma takiego produktu";
        }else{

        if(isset($_SESSION['cart'][$idProduct])){
            $_SESSION['cart'][$idProduct]['ilosc'] += $count;
        }else{
            $_SESSION['cart'][$idProduct] = [
                'tytul' => $product['tytul'],
                'cena_netto' => $product['cena_netto'],
                'podatek_vat' => $product['podatek_vat'],
                'ilosc' => $count,
                ];
            }
        }
    }

    function removeFromCart($idProduct, $count){
            if(isset($_SESSION['cart'][$idProduct])){
                unset($_SESSION['cart'][$idProduct]);
                echo"produkt został usuniety";
            }else{
                echo"produktu nie ma w koszyku";
                }
        }

    function showCart(){
        echo'<table><tr>
            <td> Nazwa Produktu </td>
            <td> Cena netto</td>
            <td> podatek vat</td>
            <td> ilosc </td>
            </tr>';
        if(isset($_SESSION['cart'])){
            $countProducts=0;
            $countVat=0;
            foreach ($_SESSION['cart'] as $idproduct => $item){
                        $countProducts+=$item['ilosc'];
                        $countVat+= ($item['podatek_vat'] *$item['ilosc']);
                        echo"<tr>
                                    <td> {$item['tytul']}</td>
                                    <td> {$item['cena_netto']}</td>
                                    <td> {$item['podatek_vat']}</td>
                                    <td> {$item['ilosc']} </td>
                                    </tr>";
                    }
        }

        echo"</table>";
        echo"Suma wszystkich produktów: ". $countProducts."<br>  suma podatku Vat: ". $countVat. "<br>";

    }

    if(isset($_POST['addToCart'])){
        addToCart($_POST['idProduct'], $_POST['count']);
    }

    if(isset($_POST['removeFromCart'])){
            RemoveFromCart($_POST['idProduct'], $_POST['count']);
        }

    showCart();

?>