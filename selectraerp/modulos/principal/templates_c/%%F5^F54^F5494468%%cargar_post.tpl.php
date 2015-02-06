<?php /* Smarty version 2.6.21, created on 2013-07-31 18:43:25
         compiled from cargar_post.tpl */ ?>
<br>
<br>
<br>
<br>
<br>
<center>
Seleccione el Archivo POST a importar
<form action='?opt_menu=<?php echo $_GET['opt_menu']; ?>
&opt_seccion=<?php echo $_GET['opt_seccion']; ?>
' enctype="multipart/form-data" method='POST' >

<input name='archivo' type='file'>

</input> <br> <br><br>
<input type='submit' name='boton' value='Enviar Archivo'>

</input>
</form>
<br>
<br>
<?php echo $this->_tpl_vars['info']; ?>

</center>
</br>
