<?php 
session_start();
ob_start();
?>
<?php 

    $codice = $_POST['codice']; 
    $codiceColorato = highlight_string(stripslashes($codice)); 
     
    if(empty($codice)) 
        echo ""; 
    else 
        return $codiceColorato; 
 

?><html> 
<body> 

<form name="form1" method="post" action="vista_codigo.php">
<label for="codice" title="Inserisci codice"><strong>Inserisci codice PHP da colorare:</strong></label>
  <br><br>
  <textarea name="codice" id="codice" cols="100" rows="20"><?php echo stripslashes($str); ?></textarea>
  <br><br>
  <input type="submit" name="Submit" value="Genera codice colorato"> 
</form>
</body> 
</html>