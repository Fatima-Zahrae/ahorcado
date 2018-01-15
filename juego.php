<?php
var_dump($_POST);
$incognita = htmlspecialchars($_POST['incognita']);
$vidas = isset($_POST['vidas']) ? (int)($_POST['vidas']): 7;
$letra = isset($_POST['letra']) ? htmlspecialchars($_POST['letra']): '';
//echo "el valor es :".(preg_match("%[a-z]%", $letra).""); para saber si la letra introducida esta en el preg en el arrya si no esta no la mete

$arrayletras = isset($_POST['arrayletras']) ? $_POST['arrayletras']: array();
if(preg_match("%[a-z]%", $letra)  && !in_array($letra, $arrayletras)){
        $arrayletras[] = $letra;
    };
//$arrayletras[] = $letra;
?>

<h1>
    
<?php
    $aciertos = 0;
    $estaocacionhaacertado = false;
    for( $i=0 ; $i<= strlen($incognita)-1; $i++){
        $coincedencia =false;
        foreach ($arrayletras as $letra) {
            if($incognita[$i] === $letra){
                echo $letra." ";
                $coincedencia = true ;
                $aciertos++;
                if($letra == $arrayletras[count($arrayletras-1)]){
                $estaocacionhaacertado = true;
                //echo "numero de eciertos ".$aciertos;
                }
            }
        }
        if(!$coincedencia){
          echo ' _ ';
        }
    };
    if(!$estaocacionhaacertado){
        $vidas --;
    }

?>
     
</h1>
<?php
    if($aciertos === strlen($incognita)) ://{    
?>
<h2>Ganaste!!
    <a href="index.html">Otra palabra</a>
</h2>
<?php elseif($vidas === 0) ://{ ?>

<h2>Perdiste!!
    <a href="index.html">Otra palabra</a>
</h2>
<?php  else : ?>
    <form action="" method="post">
        <input type="hidden" name="incognita" value="<?php echo $incognita?>"/> 
        <input type="hidden" name="vidas" value="<?php echo $vidas?>"/> 
           <?php  
            for($j=0 ; $j < count($arrayletras) ; $j++) :
            ?>
            <input type="hidden" name="arrayletras[<?php echo $j; ?>]" value="<?php echo $arrayletras[$j];?>" /> 
            
             <?php echo $arrayletras[$j];?>
            <?php endfor;?>
            <br>
        <label for="incognita"> Escribe una letra</label>
        <select name="letra">
            <?php
                for($k=ord('a') ; $k <= ord('z')  ; $k++): 
            ?>
            <option value="<?php echo chr($k);?>"><?php echo chr($k);?></option>
            <?php endfor;?>
        </select>
        <!--<input type="text" maxlenght="1" size="1" name="letra" pattern="[A-Za-z]{1}"/>-->
        <input type="submit" value="Enviar" />
    </form>
<?php endif ; ?>
