
	<div class="tabla">
		<form name="form_nuevo" method="post" action="index.php?action=nuevo">
			<table>
  				<tr>
    				<th colspan="2">AÑADIR ENVIO</th>
  				</tr>
  				<tr>
    				<td>Destinatario:</td>
   					<td>
   						<input type="text" name="destinatario" id="destinatario" value="<?php echo $this->Valor_Post('destinatario')?>"/>
   							<?php if (isset($lista_errores['destinatario']))?>
   							<?php echo '<span style="color:red">'.$this->Mostrar_Error('destinatario').'</span>';?>
   					</td>
   				</tr>
  				<tr>
    				<td>Teléfono:</td>
    				<td>
    					<input type="text" name="telefono" id="telefono" value="<?php echo $this->Valor_Post('telefono')?>"/>
    						<?php if (isset($lista_errores['telefono']))?>
    						<?php echo '<span style="color:red">'.$this->Mostrar_Error('telefono').'</span>';?>
    				</td>
  				</tr>
  				<tr>
    				<td>Dirección:</td>
    				<td>
    					<input type="text" name="direccion" id="direccion" value="<?php echo $this->Valor_Post('direccion')?>"/>
    						<?php if (isset($lista_errores['direccion']))?>
    						<?php echo '<span style="color:red">'.$this->Mostrar_Error('direccion').'</span>';?>
    				</td>
  				</tr>
  				<tr>
    				<td>Población:</td>
    				<td>
    					<input type="text" name="poblacion" id="poblacion" value="<?php echo $this->Valor_Post('poblacion')?>"/>
    						<?php if (isset($lista_errores['direccion']))?>
    						<?php echo '<span style="color:red">'.$this->Mostrar_Error('poblacion').'</span>';?>
    				</td>
  				</tr>
  				<tr>
    				<td>Código Postal:</td>
   				 	<td>
   				 		<input name="postal" type="text" id="postal" maxlength="5" value="<?php echo $this->Valor_Post('postal')?>"/>
   				 			<?php if (isset($lista_errores['postal']))?>
   				 			<?php echo '<span style="color:red">'.$this->Mostrar_Error('postal').'</span>';?>
   				 	</td>
  				</tr>
  				<tr>
    				<td>Provincia:</td>
    				<td>
    					<SELECT NAME="provincias" selected="<?php echo($this->Valor_Post('provincias')) ?>">
    						<?php foreach ($provincias as $provincia)
    						{
    							$selected= ($this->Valor_Post('provincias') == $provincia['Cod'])  ? ' selected ' : '';?>
   								<OPTION VALUE="<?php echo $provincia['Cod']?>"<?php echo $selected;?>><?php echo $provincia['Nombre']?></OPTION>
   							<?php }?>
						</SELECT>
					</td>
 		 		</tr>
  				<tr>
    				<td>E-Mail:</td>
    				<td>
    					<input name="web" type="text" id="web" value="<?php echo $this->Valor_Post('web')?>"/>
    						<?php if (isset($lista_errores['web']))?>
    						<?php echo '<span style="color:red">'.$this->Mostrar_Error('web').'</span>';?>
    				</td>
  				</tr>
  					<tr>
  						<td>Estado:</td>
  						<td>
  							<input type="radio" name="estado" value="P" checked/><label>Pendiente</label>
  							<input type="radio" name="estado" value="E"/><label>Entregado</label>
  							<input type="radio" name="estado" value="D"/><label>Devuelto</label>
  						</td>
 		 			</tr>
 			 		<tr>
    					<td>Fecha Creación:</td>
    					<td>
    						<input name="creacion" type="text" id="creacion" value="<?php echo $this->FechaCreacion()?>" disabled/>
    							<?php echo '<span style="color:red">'.$this->Mostrar_Error('creacion').'</span>';?>
    					</td>
  					</tr>
  					<tr>
    					<td>Fecha Entrega:</td>
    					<td>
    						<input name="entrega" type="text" id="entrega" disabled />
    					</td>
  					</tr>
  					<tr>
  						<td>Observaciones:</td>
  						<td>
  							<textarea name="observaciones" rows="10" cols="40"></textarea>
  						</td>
  					</tr>
  					<tr>
  						<td colspan="2">
  							<input name="bot_nuevo" type="submit" id="nuevo" value="Añadir"/>
  						</td>
  					</tr>
			</table>

		</form>
	<p align="center"><a href="index.php">Inicio</a></p>
	</div>

