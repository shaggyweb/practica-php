
	<div class="tabla">
		<table>
			<tr><th colspan="5">MODIFICACIÓN DE ENVÍOS</th></tr>
			<tr><th>Destinatario</th><th>Teléfono</th><th>Dirección</th><th>Población</th><th>Modificar</th></tr>
			<?php foreach ($envios as $envio): ?>
  			<tr>
    			<td><?php echo $envio['destinatario'] ?></td>
    			<td><?php echo $envio['telefono'] ?></td>
    			<td><?php echo $envio['direccion'] ?></td>
    			<td><?php echo $envio['poblacion'] ?></td>
    			<td><a href="index.php?action=envio_modificar&id=<?php echo $envio['cod_envio']; ?>"><img src="Assets/img/modificar.png"/></a></td>
  			</tr>
			<?php endforeach; ?>
		</table>
		<p align="center"><?php $this->MuestraPaginador($numPag, $totalPaginas, $fichero); ?></p>
		<p align="center"><a href="index.php">Inicio</a></p>
	</div>

