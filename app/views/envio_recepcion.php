
<div class="tabla">
<form name="form_recepcion" method="post" action="index.php?action=nueva_recepcion">
<table>
<tr><th colspan="4">Confirmar Entrega de Envío</th></tr>
<tr><td>Destinatario</td>
<?php foreach ($envios as $envio): ?>
	<input type="hidden" name="cod_envio" value="<?php echo $envio['cod_envio'] ?>">
  <td><input type="text" value="<?php echo $envio['destinatario'] ?>" disabled/></td>
  </tr>
  <tr>
	<td>Fecha Entrega:</td>
    <td><input type="text" value="<?php echo $this->FechaCreacion()?>" disabled/></td>
  </tr>
  <tr>
  <td>Estado:</td>
  <td>
  <input type="radio" name="estado" value="P" disabled/><label>Pendiente</label>
  <input type="radio" name="estado" value="E" checked disabled/><label>Entregado</label>
  <input type="radio" name="estado" value="D" disabled/><label>Devuelto</label>
  </td>
  </tr>
  <tr><td>Observaciones:</td>
  <td><textarea name="observaciones" rows="10" cols="40"><?php echo $envio['observaciones'] ?></textarea></td>
  </tr>
<?php endforeach; ?>
<tr>
  	<td colspan="2"><input name="bot_recepcion" type="submit" id="recepcion" value="Confirmar Entrega"/></td>
  </tr>
</table>
</form>
<p align="center"><a href="index.php">Inicio</a></p>
</div>

