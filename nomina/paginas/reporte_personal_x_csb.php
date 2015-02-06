<?php 
session_start();
ob_start();
?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<table align="center" width="1000">
  <tbody>
    <tr>
      <td align="right"><INPUT type="button" name="imp" value="Imprimir" onclick="javascript:imprimir('area_impresion');"></td>
    </tr>
 <tr>
      <td align="right"><hr></td>
    </tr>
  </tbody>
</table>

<div id="area_impresion">

<?php 
include("../lib/common.php");
include ("../header.php");
include ("func_bd.php");
include ("funciones_nomina.php");

$tipo=$_GET[tipo];

if ($tipo==1)
{$estado='Activo';}
elseif ($tipo==2)
{$estado='Inactivo';}
elseif ($tipo==3)
{$estado='Jubilado';}
elseif ($tipo==4)
{$estado='Nuevo';}
elseif ($tipo==5)
{$estado='Suspendido';}
elseif ($tipo==6)
{$estado='Vacaciones';}
elseif ($tipo==7)
{$estado='Egresado';}

$var_sql = "SELECT nom_emp, imagen_izq, imagen_der FROM nomempresa";
$rs = sql_ejecutar($var_sql);
$row_rs = mysql_fetch_array($rs);

$var_imagen_izq = '/../../imagenes/SiSalud.bmp';
$var_imagen_der = '/../../imagenes/dot.JPG';
$encabezado=encabezado('','','','','../imagenes/'.$var_imagen_izq,'../imagenes/'.$var_imagen_der);

$query="select * from nomempresa";
$result=sql_ejecutar($query);
$nompre_empresa=$row[nom_emp];
$pagina=1;

echo $encabezado;
$date1=date('d/m/Y');
    $date2=date('h:i a');   
    $datos="<TABLE width='1100' align='center' border='0'>
        <TR>
            <TD align='LEFT'>$row_rs[nom_emp]</TD>
            <TD align='right'>Fecha: $date1</TD>
        </TR>
        <TR>
            <TD align='LEFT'>GERENCIA GENERAL DE RECURSOS HUMANOS</TD>
            <TD align='right'>Hora: $date2</TD>
        </TR>
        <TR>
            <TD></TD>
            <TD align='right'>P&#225;g.: &nbsp;$pagina</TD>
        </TR>
    </TABLE>";
    echo $datos;    
?>

<table width="1100" border="0"  align="center">
<tr>
    <td align="center" style="font-size : 14px;">LISTADO GENERAL DE PERSONAL <?echo $_SESSION['nomina']?> AL <?echo date('d/m/Y')?></td>
</tr>
</table>


<table width="1100" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC" >
    <td width="50" height="21" align="right"><div align="left"><font  size="2" face="Arial, Helvetica, sans-serif">Ficha</font></div></td>
    <td width="70" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">Ced&uacute;la</font></div></td>
        <td width="330"><font size="2" face="Arial, Helvetica, sans-serif">Apellidos y Nombres</font></td>
        <td  align="center">F. ingreso</td>
        <td width="120"><div align="center">Sueldo</div></td>
<!--         <td width="12%"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"> Situaci&oacute;n </font></div></td> -->
        <td align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Comp.Sueldo </font></div></td>
        <td <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Cargo </font></div></td>
       <td <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Dirección </font></div></td>  
       <td <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Departamento </font></div></td>
    <td width=""><div align="center">
 <!--       <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif"> Tipo pers.</font></div>-->
           <!-- </div></td>-->
    <!-- Priemer Encabezado Final -->
          </tr>
<!-- Segundo Encabezado Principio 
    <!--<tr bgcolor="#CCCCCC" >
    <td width="50" height="21" align="right"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif">PRS</font></div></td>
    <td width="70" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">Pri. Esp.</font></div></td>-->
<!--    <td width="330"><font size="2" face="Arial, Helvetica, sans-serif">Pri. prof.</font></td>-->
    <!--    <td align="center">Pri. Jer</td>-->
<!--    <td width="120"><div align="center">Pri. Alt. Niv.</div></td>-->
        <td align="center">
<!--       <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Gas. Rep.</font></div>-->
            </div></td>
    <td width=""><div align="center">
<!--<div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Cargo</font></div>-->
        </div></td>
    <td width=""><div align="center">
        <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></div>
        </div></td>
        </tr>
       <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">direccion</font></div>      
 <!--     </div></td>       -->
    <td width=""><div align="center">
        <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></div>
        </div></td>
        </tr>



        <tr height="10"><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD></tr>
            <?php 
//<!-- Segundo Encabezado Final -->//
            
    //operaciones para paginaciones
    if($tipo==7)
    {
    $query="select * from
    nompersonal as per 
    inner join 
    nomtipos_nomina as nom on per.tipnom = nom.codtip
    inner join 
    nomcargos as car on per.codcargo = car.cod_car
    where (per.estado = '$estado' or per.estado = 'Egresado de nomina de pago ') and tipnom='".$_SESSION['codigo_nomina']."' 
    order by  per.apenom,car.des_car";      
    }
    else
    {
        $query="select * from
    nompersonal as per 
    inner join 
    nomtipos_nomina as nom on per.tipnom = nom.codtip
    inner join 
    nomcargos as car on per.codcargo = car.cod_car
    where per.estado = '$estado' and tipnom='".$_SESSION['codigo_nomina']."' 
    order by  per.codnivel4,per.apenom,car.des_car";
    }
//per.estado,per.apenom, per.tipnom, 
    $result=sql_ejecutar($query);   
    //$fila = mysql_fetch_array ($result);  

    $num_fila = 0;
    $in=1+(($pagina-1)*5);
    $k=1;
    //ciclo para mostrar los datos 
    //$i=0;
    $contador=1;
    //$total_suel=$total_prs=$total_pe=$total_pp=$total_pj=$total_pa=$total_gr=$total_cs=0;
    $ger="";
    $comp=0;
    $i=0;
    $i2=0;
    $suel=0;
    $hh=1;
    while ($fila = mysql_fetch_array($result))
    {
    if($fila['codnivel4']!=$ger)
    {
        $consulta="SELECT descrip FROM nomnivel4 WHERE codorg='$fila[codnivel4]'";
        $resultadoxx=sql_ejecutar($consulta);
        $fetchxx=fetch_array($resultadoxx);
        if($hh!=1)
        {
        ?>
        <tr><br>
        <TD height="30" colspan="3"><strong>Total trabajadores: <?echo $i2;?></strong></TD>
        <td colspan="3"><strong>Total Sueldo basico: <?echo number_format($suel,2,',','.');?></strong></td>
        <td colspan="2"><strong>Total Comp. de sueldo..: <?echo number_format($comp,2,',','.');?></strong></td>
    <!--<td>Total Prima por raz. serv.: <?//echo number_format($total_prs,2,',','.')?></td>-->
        <?
        }
        $hh=2;
        ?>
        </tr>
        <br>
        <tr><TD colspan="8" style="font-size : 12px;"><strong><?echo $fetchxx[descrip]?></strong></TD></tr>
        <?
        $ger=$fila['codnivel4'];
        $contador+=2;
    }
    //++$contador;
    if ($k==1)
    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=13 and tiponom=$_SESSION[codigo_nomina]";
    $resultado1=sql_ejecutar($consulta);
    $fetch1=fetch_array($resultado1);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=23 and tiponom=$_SESSION[codigo_nomina]";
    $resultado2=sql_ejecutar($consulta);
    $fetch2=fetch_array($resultado2);
    
    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=6 and tiponom=$_SESSION[codigo_nomina]";
    $resultado3=sql_ejecutar($consulta);
    $fetch3=fetch_array($resultado3);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=5 and tiponom=$_SESSION[codigo_nomina]";
    $resultado4=sql_ejecutar($consulta);
    $fetch4=fetch_array($resultado4);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=32 and tiponom=$_SESSION[codigo_nomina]";
    $resultado5=sql_ejecutar($consulta);
    $fetch5=fetch_array($resultado5);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=33 and tiponom=$_SESSION[codigo_nomina]";
    $resultado6=sql_ejecutar($consulta);
    $fetch6=fetch_array($resultado6);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=14 and tiponom=$_SESSION[codigo_nomina]";
    $resultado7=sql_ejecutar($consulta);
    $fetch7=fetch_array($resultado7);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=7 and tiponom=$_SESSION[codigo_nomina]";
    $resultado8=sql_ejecutar($consulta);
    $fetch8=fetch_array($resultado8);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=8 and tiponom=$_SESSION[codigo_nomina]";
    $resultado9=sql_ejecutar($consulta);
    $fetch9=fetch_array($resultado9);

    $consulta="SELECT valor FROM nomcampos_adic_personal WHERE ficha=$fila[ficha] and id=9 and tiponom=$_SESSION[codigo_nomina]";
    $resultado10=sql_ejecutar($consulta);
    $fetch10=fetch_array($resultado10);
    





    $contador+=1;
    if($k==1)
    {$nomina=$fila['des_car'];}
    $consulta4 = "SELECT descrip FROM nomprofesiones WHERE codorg = '".$fila['codpro']."' ";
    $resultado4 = sql_ejecutar($consulta4);
    $fetch4 = mysql_fetch_array($resultado4);   
    if(($k==1)||($nomina!=$fila['des_car']))
//  {
//  echo "<tr height='25' bgcolor='#EEEEEE'><td colspan='3'>$fila[des_car]</td><td></td><td></td><td></td><td></td></tr>";
    //  $nomina=$fila['des_car'];
        $k=2;
    //}
    ?>
    <tr>
        <td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
          echo $fila['ficha'];  // Ficha Codigo del Empleado
          ?>
            </font></div></td>
            <td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
          echo $fila[cedula];   // cedula de identidad
          ?>
            </font></div></td>
            <td ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
            echo $fila[apellidos].', '.$fila[nombres];      // apellidos y nombres
        ?>
            </font></td>
            <td align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
            $fecha6 = fecha($fila['fecing']);
            echo $fecha6;
            $fecha6 = fecha_sql($fecha6);//echo number_format($fila[suesal],2,',','.');     // Fecha de Ingreso 
        ?>
            </font></td>
            
        <td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
        $total_suel+=$fila['suesal'];
        $suel+=$fila['suesal'];
        echo number_format($fila['suesal'],2,',','.');//echo $fila[descrip]; Sueldo Mensual del Empelado
        ?>
            </font></div></td>      
            
<!--            <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
            //$sexo=$fila['sexo']; //Aqui solo me indica si tiene o no compensacion (SI/NO)
    //      echo $fetch7['valor'];
    //      $total_cs+=$fetch7['valor'];
        ?>
            </font></div></td> -->
            
<!--            <td ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> <!--
           <?php 
//      echo $fila['estado'];//      
        ?>
<!--             </font></div></td> -->

         <td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
            echo $fetch8['valor']; 
            $comp+=$fetch8['valor']; 
            $total_cs+=$fetch8['valor']; // Compensacion del Empelado
        ?>
            </font></div></td>
            
        <td ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
           <?php 
        echo $fila['des_car'];       
        ?>  
<td ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
           <?php 
            echo $fetch9['valor'];
         // echo $fila['direccion'];     
        ?>      
    
<td ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
           <?php 
            echo $fetch10['valor'];
         // echo $fila['direccion'];     
        ?>      


</font></div></td>
            
       <!-- <td ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
           <?php 
      //    echo $fila['codnivel4'];     
        ?>              
            
<!--    <td ><div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
//      $fecha7= date('Y/m/d');-->
        
//<!--      if($fila['codnivel7']!=111111)-->
//<!--          echo $fila['codnivel7'];-->
//<!--      elseif($fila['codnivel6']!=11111)-->
//<!--          echo $fila['codnivel6'];-->
//<!--      elseif($fila['codnivel4']!=1111)-->
//<!--          echo $fila['codnivel4'];-->
//<!--      elseif($fila['codnivel4']!=111)-->
//  <!--        echo $fila['codnivel4'];//.$fila['codnivel5'].$fila['codnivel6'].$fila['codnivel7'];
// antiguedad($fecha6,$fecha7,'A');//echo $fila[descrip];   --> 
    //      ?>
            </font></div></td>
    
          </tr>
<!-- Aqui Empieza la otra linea de datos -->

    <tr>
<!--        <td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
    //    echo $fetch1['valor'];
    //      $total_prs+=$fetch1['valor'];
          ?>
            </font></div></td>
            <td height="20" ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
    //    echo $fetch2['valor'];
    //      $total_pe+=$fetch2['valor'];
          ?>
            </font></div></td>
            <td ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
    //          echo $fetch3['valor'];
            //$total_pp+=$fetch3['valor'];
        ?>
            </font></td>
            <td align="center" ><font size="2" face="Arial, Helvetica, sans-serif">
              <?php 
            //$fecha6 = fecha($fila['fecing']);
    //      echo $fetch4['valor'];
    //      $total_pj+=$fetch4['valor'];
            //$fecha6 = fecha_sql($fecha6);//echo number_format($fila[suesal],2,',','.');       // apellidos y nombres
        ?>
            </font></td>
            <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
                <?php 
      //        echo $fetch5['valor'];
        //  $total_pa+=$fetch5['valor'];
        ?>
            </font></div></td>
            <td ><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
           <?php 
     //         echo $fetch6['valor'];
    //      $total_gr+=$fetch6['valor'];
        ?>
         </font></div></td> 
<!--        <td ><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"> -->
           <?php 
        //  echo $fila['des_car'];-->//
            
        ?>
         </font></div></td> 
           
<!--    <td ><div align="left" ><font size="2" face="Arial, Helvetica, sans-serif"> --> 
                <?php 
      //    $fecha7= date('Y/m/d');
    /*  
        if($fila['codnivel7']!=111111)
            echo $fila['codnivel7'];
        elseif($fila['codnivel6']!=11111)
            echo $fila['codnivel6'];
        elseif($fila['codnivel4']!=1111)
            echo $fila['codnivel4'];
        elseif($fila['codnivel4']!=111)
            echo $fila['codnivel4'];*///.$fila['codnivel5'].$fila['codnivel6'].$fila['codnivel7'];
 //antiguedad($fecha6,$fecha7,'A');//echo $fila[descrip];       
        ?>
            </font></div></td>
          </tr>
          <?php
        if($contador>=30)
        {
        echo "</table>";
        echo "<br class=\"saltopagina\">";
        //echo $encabezado;
        $date1=date('d/m/Y');
        $date2=date('h:i a');   
        $datos="<TABLE width='1100' align='center' border='0'>
        <TR>
            <TD align='right'>Fecha:$date1</TD>
        </TR>
        <TR>
            <TD align='right'>Hora: $date2</TD>
        </TR>
        <TR>
            <TD align='right'>P&#225;g.: &nbsp;".++$pagina."</TD>
        </TR>
        </TABLE>";
        echo $datos;    
        $contador=0;
        ?>
    
        <table width="1100" border="0"  align="center">
        <tr>
        <td align="center" style="font-size : 14px;">LISTADO GENERAL DE PERSONAL <?echo $_SESSION['nomina']?> AL <?echo date('d/m/Y')?></td>
        </tr>
        </table>
    <table width="1100" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
<tr bgcolor="#CCCCCC" >
    <td width="50" height="21" align="right"><div align="left"><font  size="2" face="Arial, Helvetica, sans-serif">Ficha</font></div></td>
    <td width="70" height="21" align="right"><div align="left" > <font size="2" face="Arial, Helvetica, sans-serif">Ced&uacute;la</font></div></td>
        <td width="330"><font size="2" face="Arial, Helvetica, sans-serif">Apellidos y Nombres</font></td>
        <td  align="center">F. ingreso</td>
        <td width="120"><div align="center">Sueldo</div></td>
<!--         <td width="12%"><div align="left"> <font size="2" face="Arial, Helvetica, sans-serif"> Situaci&oacute;n </font></div></td> -->
        <td align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Comp.Sueldo </font></div></td>
        <td <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Cargo </font></div></td>
       <td <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif">Direccion </font></div></td>    
       <td width=""><div align="center">    
        <div align="center" ><font size="2" face="Arial, Helvetica, sans-serif"> Tipo pers.</font></div>
            </div></td>
          </tr>

        <?
        //echo "<table width='1100'  align='center' border='0'>"; 
    }
    $i+=1;
    $i2+=1;
 
    }//fin del ciclo while
    //operaciones de paginacion
    $num_fila++;
    $in++;
    
    ?>
    
    <table width="1100" border="0"  id="lst"  align="center" cellspacing="0" cellpadding="0">
    <tr><br>
    <TD>Total trabajadores: <?echo $i;?></TD>
    <td>Total Sueldo basico: <?echo number_format($total_suel,2,',','.');?></td>
    <td>Total Comp. de sueldo..: <?echo number_format($total_cs,2,',','.');?></td>
    <!--<td>Total Prima por raz. serv.: <?//echo number_format($total_prs,2,',','.')?></td>-->
    </tr>
    <!--<tr>
    <td>Total Prima especial: <?//echo number_format($total_pe,2,',','.');?></td>
    <td>Total Prima profesi&oacuten;n: <?//echo number_format($total_pp,2,',','.');?></td>
    <td>Total Prima jerarquia: <?//echo number_format($total_pj,2,',','.');?></td>
    </tr>
    <tr>
    <td>Total Prima alto niv.: <?//echo number_format($total_pa,2,',','.');?></td>
    <td>Total Gasto de rep..: <?//echo number_format($total_gr,2,',','.');?></td>
    <td>Total Comp. de sueldo..: <?//echo number_format($total_cs,2,',','.');?></td>
    </tr>-->

          <input name="registro_id" type="hidden" value="">
          <input name="op" type="hidden" value="">
        </table>
      <p align="center"></p></td>
    </tr>
  </table>
  <font size="2" face="Arial, Helvetica, sans-serif">  </font>
</form>
<p>&nbsp;</p>
</div>
</body>
</html>