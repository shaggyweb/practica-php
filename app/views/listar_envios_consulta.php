
	<div class="tabla">
		<table>
			<tr>
				<th colspan="11">RESULTADO DE BÚSQUEDA</th>
			</tr>
			<tr>
				<th>Destinatario</th><th>Teléfono</th><th>Dirección</th>
				<th>Población</th><th>Código Postal</th><th>Provincia</th><th>E-mail</th>
				<th>Estado</th><th>Fecha Creación</th><th>Fecha Entrega</th>
				<th>Observaciones</th>
			</tr>
			<?php foreach ($envios as $envio): ?>
  			<tr>
    			<td><?php echo $envio['destinatario'] ?></td>
    			<td><?php echo $envio['telefono'] ?></td>
    			<td><?php echo $envio['direccion'] ?></td>
    			<td><?php echo $envio['poblacion'] ?></td>
    			<td><?php echo $envio['postal'] ?></td>
    			<td><?php echo $envio['prov'] ?></td>
    			<td><?php echo $envio['email'] ?></td>
    			<td><?php echo $this->MuestraEstado($envio['estado'])?></td>
    			<td><?php echo $this->FechaSql($envio['creacion']) ?></td>
    			<td><?php echo $this->FechaSql($envio['entrega']) ?></td>
    			<td><?php echo $envio['observaciones'] ?></td>
  			</tr>
			<?php endforeach; ?>
		</table>
		<p align="center"><a href="index.php">Inicio</a></p>
	</div>

