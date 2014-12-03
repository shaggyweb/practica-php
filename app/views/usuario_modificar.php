<div class="tabla">
	<form name="form_nuevo" method="post" action="index.php?action=usuario_modificar">
		<table>
			<?php foreach ($usuarios as $usuario): ?>
			<input type="hidden" name="cod_usuario" value="<?php echo $usuario['codigo'] ?>">
  			<tr>
    			<th colspan="4">MODIFICAR USUARIO</th>
  			</tr>
  			<tr>
    			<td>Nombre:</td>
    			<td>
    				<input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre'] ?>"/>
    			</td>
  			<tr>
    			<td>Clave:</td>
    			<td>
    				<input type="text" name="clave" id="clave" value="<?php echo $usuario['clave'] ?>"/>
    			</td>
  			</tr>
  			<?php endforeach; ?>
  			<tr>
  				<td colspan="2"><input name="bot_modificar" type="submit" id="modificar" value="Modificar Usuario"/></td>
  			</tr>	
  		
	</table>
	</form>
	<p align="center"><a href="index.php">Inicio</a></p>
	</div>


