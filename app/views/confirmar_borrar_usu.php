	<div class="tabla">
		<table>
			<tr>
				<td>¿Desea borrar el usuario <?=$usuarios[0][0] ?>?</td>
			</tr>
			<tr>
				<td><a href="index.php?action=confirmar_borrado_usu&respuesta=si&id=<?php echo $_GET['id']; ?>">SI</a>
				<br>
					<a href="index.php?action=confirmar_borrado_usu&respuesta=no&id=<?php echo $_GET['id']; ?>">NO</a>
				</td>
			</tr>
		</table>
	</div>
