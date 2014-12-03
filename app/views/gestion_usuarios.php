	<div class="tabla">
		<table>
			<tr>
				<th>Añadir Usuario</th>
				<td><a href="index.php?action=nuevo_usuario"><img src="Assets/img/anadir_usuario.png"/></a></td>
			</tr>
			<tr><th colspan="4">LISTA DE USUARIOS</th></tr>
			<tr>
				<th>Nombre</th>
				<th>Password</th>
				<th>Modificar</th>
				<th>Borrar</th>
			</tr>
				<?php foreach ($usuarios as $usuario): ?>
				<tr>
    				<td><?php echo $usuario['nombre'] ?></td>
    				<td><?php echo $usuario['clave'] ?></td>
    				<td><a href="index.php?action=usuario_modificar&id=<?php echo $usuario['codigo']; ?>"><img src="Assets/img/modificar_usuario.png"/></a></td>
    				<td><a href="index.php?action=confirmar_borrado_usu&id=<?php echo $usuario['codigo']; ?>"><img src="Assets/img/borrar_usuario.png"/></a></td>
    			</tr>
    			<?php endforeach; ?>
		</table>
		<p align="center"><a href="index.php">Inicio</a></p>
	</div>