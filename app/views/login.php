<html>
<head>
<meta charset="utf-8">
<LINK href='Assets/css/estilo2.css' type=text/css rel=stylesheet>
</head>
<body>
<div class="tabla">
<form action="index.php?action=validar" method="post">
	<table>
			<tr>
			<th colspan="2">LOGIN DE USUARIO</th>
			</tr>
    	
        	<tr>
        		<td><label>USUARIO: </label></td>
        		<td><input type="text" name="usuario" id="cajasTexto"/></td>
        	</tr>
            <tr>
                 <td><label>PASSWORD: </label></td>
            		<td><input type="password" name="password" id="cajasTexto"/></td>
            </tr>
            <tr>
        		<td colspan="2"><input type="submit" name="login" value="ENTRAR" id="botonLogin"/></td>
        	</tr>
    </table> 
</form>       
</div>
</body>
</html>