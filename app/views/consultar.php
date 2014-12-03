	<div class="tabla">
		<form id="form1" name="form1" method="post" action="index.php?action=consultar">
			<table>
				<tr>
					<th colspan="3">CONSULTA DE ENVÍOS</th>
				</tr>
				<tr>
					<td>Destinatario: 
						<input type="text" name="destinatario" value="<?php echo $this->Valor_Post('destinatario')?>"/>
					</td>
					<td>Población: 
						<input type="text" name="poblacion" value="<?php echo $this->Valor_Post('poblacion')?>"/>
					</td>
					<td>Estado:  
						<select name="estado">
							<option value=""></option>
  							<option value="P">Pendiente</option>
 							<option value="E">Entregado</option>
  							<option value="D">Devuelto</option>
						</select> 
					</td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" value="Buscar"/></td>
				</tr>
			</table>
		</form>
		<p align="center"><a href="index.php">Inicio</a></p>
	</div>

