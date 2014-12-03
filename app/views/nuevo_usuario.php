
<div class="tabla">
		<form name="form_nuevo" method="post" action="index.php?action=nuevo_usuario">
			<table>
  				<tr>
    				<th colspan="2">AÑADIR USUARIO</th>
  				</tr>
  				<tr>
    				<td>Nombre:</td>
   					<td>
   						<input type="text" name="nombre" id="nombre" value="<?php echo $this->Valor_Post('nombre')?>"/>
   							<?php if (isset($lista_errores['nombre']))?>
   							<?php echo '<span style="color:red">'.$this->Mostrar_Error('nombre').'</span>';?>
   					</td>
   				</tr>
  				<tr>
    				<td>Clave:</td>
    				<td>
    					<input type="password" name="clave" id="clave" value="<?php echo $this->Valor_Post('clave')?>"/>
    						<?php if (isset($lista_errores['clave']))?>
    						<?php echo '<span style="color:red">'.$this->Mostrar_Error('clave').'</span>';?>
    				</td>
  				</tr>
  				<tr>
  					<td colspan="2">
  						<input name="bot_nuevo" type="submit" id="nuevo" value="Añadir Usuario"/>
  					</td>
  				</tr>
			</table>

		</form>
	<p align="center"><a href="index.php">Inicio</a></p>
	</div>