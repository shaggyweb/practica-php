<div id="encabezado" class="encabezado" align="center">
<p>GESTIÓN DE ENVÍOS</p>
</div>
	<div class="tabla">
		<form id="form1" name="menu" method="post" action="controlador_mostrar.php">
			<table>
				<tr>
					<td><a href="index.php?action=nuevo">Añadir Envío</a></td>
					<td><a href="index.php?action=listar">Listar Envíos</a></td>
					<td><a href="index.php?action=consultar">Consultar Envíos</a></td>
					<td><a href="index.php?action=borrar">Eliminar Envío</a></td>
					<td><a href="index.php?action=modificar">Modificar Envío</a></td>
					<td><a href="index.php?action=recepcion">Anotar Recepción</a></td>
					<td><a href="index.php?action=gestion_usuarios">Gestión Usuarios</a></td>
					<td><a href="index.php?action=cerrar">Cerrar Sesión</a></td>
					<td><?php echo ("Hora de inicio de sesión: ".$_SESSION['tiempo'])?></td>
				</tr>
			</table>
		</form>
	</div>


