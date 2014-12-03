	<div class="tabla">
		<table>
			<tr><th colspan="5">ELIMINAR ENVÍOS</th></tr>
			<tr>
				<th>Destinatario</th><th>Teléfono</th><th>Dirección</th><th>Población</th><th>Borrar</th>
			</tr>
			<?php foreach ($envios as $envio): ?>
  			<tr>
    			<td><?php echo $envio['destinatario'] ?></td>
    			<td><?php echo $envio['telefono'] ?></td>
    			<td><?php echo $envio['direccion'] ?></td>
    			<td><?php echo $envio['poblacion'] ?></td>
    			<td><a href=index.php?action=confirmar&id=<?php echo $envio['cod_envio']; ?>><img src="Assets/img/borrar.png"/></a></td>
  			</tr>
			<?php endforeach; ?>
		</table>
		<p align="center"><?php $this->MuestraPaginador($numPag, $totalPaginas, $fichero); ?></p>
		<p align="center"><a href="index.php">Inicio</a></p>
	</div>