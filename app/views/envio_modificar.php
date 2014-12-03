	<div class="tabla">
	<form name="form_nuevo" method="post" action="index.php?action=envio_modificar">
		<table>
			<?php foreach ($envios as $envio): ?>
			<input type="hidden" name="cod_envio" value="<?php echo $envio['cod_envio'] ?>">
  			<tr>
    			<th colspan="4">MODIFICAR ENVIO</th>
  			</tr>
  			<tr>
    			<td>Destinatario:</td>
    			<td>
    				<input type="text" name="destinatario" id="destinatario" value="<?php echo $envio['destinatario'] ?>"/>
    			</td>
  			<tr>
    			<td>Teléfono:</td>
    			<td>
    				<input type="text" name="telefono" id="telefono" value="<?php echo $envio['telefono'] ?>"/>
    			</td>
  			</tr>
  			<tr>
    			<td>Dirección:</td>
    			<td>
    				<input type="text" name="direccion" id="direccion" value="<?php echo $envio['direccion'] ?>"/>
    			</td>
  			</tr>
  			<tr>
    			<td>Población:</td>
    			<td>
    				<input type="text" name="poblacion" id="poblacion" value="<?php echo $envio['poblacion'] ?>"/>
    			</td>
  			</tr>
  			<tr>
    			<td>Código Postal:</td>
    			<td>
    				<input name="postal" type="text" id="postal" maxlength="5" value="<?php echo $envio['postal'] ?>"/>
    			</td>
  			</tr>
  			<tr>
    			<td>Provincia:</td>
    			<td><SELECT NAME="provincias" selected="<?php echo $envio['provincia'] ?>">
    			<?php foreach ($provincias as $provincia)
    			{
    			$selected= ($envio['provincia'] == $provincia['Cod'])  ? ' selected ' : '';?>
   				<OPTION VALUE="<?php echo $provincia['Cod']?>"<?php echo $selected;?>><?php echo $provincia['Nombre']?></OPTION>
   				<?php }?>
				</SELECT>
				</td>
  			</tr>
  			<tr>
    			<td>E-Mail:</td>
    			<td>
    				<input name="web" type="text" id="web" value="<?php echo $envio['email'] ?>"/>
    			</td>
  			</tr>
  			<tr>
  				<td>Estado:</td>
  				<td>
  					<input type="radio" name="estado" value="P" 
  						<?php if ($envio['estado']=="P")
						{
							?> checked <?php
						}?>/><label>Pendiente</label>
  					<input type="radio" name="estado" value="E"
  						<?php if ($envio['estado']=="E")
						{
							?> checked <?php
						}?>/><label>Entregado</label>
  					<input type="radio" name="estado" value="D"
  						<?php if ($envio['estado']=="D")
						{
							?> checked <?php
						}?>/><label>Devuelto</label>
				</td>
  			</tr>
  			<tr>
    			<td>Fecha Creación:(año-mes-día)</td>
    			<td>
    				<input name="creacion" type="text" id="creacion" value="<?php echo $envio['creacion'] ?>"/>
    			</td>
   			</tr>
   			<tr>
    			<td>Fecha Entrega:(año-mes-día)</td>
    			<td>
    				<input name="entrega" type="text" id="entrega" value="<?php echo $envio['entrega'] ?>"/>
    			</td>
  			</tr>
 	 		<tr>
  				<td>Observaciones:</td>
  				<td><textarea name="observaciones" rows="10" cols="40"><?php echo $envio['observaciones'] ?></textarea></td>
  			</tr>
  			<?php endforeach; ?>
  			<tr>
  				<td colspan="2"><input name="bot_nuevo" type="submit" id="nuevo" value="Modificar"/></td>
  			</tr>	
  		
	</table>
	</form>
	<p align="center"><a href="index.php">Inicio</a></p>
	</div>

