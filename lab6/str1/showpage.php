<?php

function PokazPodstrone($id)
{
    global $link;
    $id_clear = htmlspecialchars($id);
    $query ="SELECT page_content FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = mysqli_query($link, $query);

    if($result && $row =mysqli_fetch_assoc($result)) {
        return $row['page_content'];
    }
    return '[nie znaleziono strony]';
}



?>