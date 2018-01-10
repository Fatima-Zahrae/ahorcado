<?php
$incognita = htmlspecialchars($_POST['incognita']);
$letra = isset($_POST['letra']) ? htmlspecialchars($_POST['letra']): '';

?>

<h1>
    
<?php
    for( $i=0 ; $i<= strlen($incognita)-1; $i++){
        if($incognita[$i] === $letra){
            echo $letra=$letra."";
        }else{
            echo " _ ";
        }
    };
?>
     
</h1>

    <form action="" method="post">
        <input type="hidden" name="incognita" value="<?php echo $incognita?>"/>
        <!--<input type="text" name="letra" value="<?php echo $letra?>"/> -->
        <label for="incognita"> Escribe una letra</label>
        <input type="text" maxlenght="1" size="1" name="letra" pattern="[A-Za-z]{1}"/>
        <input type="submit" value="Enviar" />
    </form>

