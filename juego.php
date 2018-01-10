<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$incognita = htmlspecialchars($_POST['incognita']);

?>

<h1>
<?php
//echo $incognita;

    for( $i=1 ; $i<= strlen($incognita); $i++){
        echo " _ ";
    };
?>
<h1>

    <form action="" method="post">
        <input type="hidden" name="incognita" value="<?php echo $incognita?>"/>
        <label for="incognita"> Escribe una letra</label>
        <input type="text" maxlenght="1" size="1" name="letra" />
        <input type="submit" value="Enviar" />
    </form>

