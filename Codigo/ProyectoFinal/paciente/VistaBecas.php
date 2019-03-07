<?php
include 'DAOBecas.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.js">

	<link rel="stylesheet" href="boostrap/css/bootstrap.min.css">

	<script type="text/javascript">
		function cargar(carnet, nombres, apellidos, edad,correo, monto_beca, id_patrocinador){
			document.frm.txtCarnet.value=carnet;
			document.frm.txtNombres.value=nombres;
			document.frm.txtApellidos.value=apellidos;
			document.frm.txtEdad.value=edad;
			document.frm.txtCorreo.value=correo;
			document.frm.txtMonto.value=monto_beca;
			document.frm.txtIdPa.value=id_patrocinador;
		}


	</script>

	<style type="text/css">

	body{
		background: url(imagenes/fondo.png) no-repeat fixed center center;
		background-size: cover;

	}
		

	</style>


		<title></title>
	</head>
	<body>
		<center>
		
		<h3><font color="blue">Formulario de registro</font></h3>
		<hr>
		
			
		<form action="#" method="POST" name="frm">
	<div class="container">
		<div class="row">
			<div class="form-column col-md-3 col-sm-3 col-xs-3">
			Carnet:<br><input type="text" name="txtCarnet" placeholder="Numero de Carnet" class="form-control"><br><br>
			</div>
			<div class="form-column col-md-3 col-sm-3 col-xs-3">
			Nombres:<br><input type="text" name="txtNombres" placeholder="Nombres" class="form-control"><br><br>
			</div>
			<div class="form-column col-md-3 col-sm-3 col-xs-3">
			Apellidos:<br><input type="text" name="txtApellidos" placeholder="Apellidos" class="form-control"><br><br>
		</div>
		<div class="form-column col-md-3 col-sm-3 col-xs-3">
			Edad:<br><input type="number" min="0" max="100" name="txtEdad" placeholder="Edad" class="form-control"><br><br>
		</div>
			<div class="form-column col-md-3 col-sm-3 col-xs-3">
			Correo:<br><input type="text" name="txtCorreo" placeholder="Correo" class="form-control"><br><br>
		</div>
		<div class="form-column col-md-3 col-sm-3 col-xs-3">
			Monto de beca:<br><input type="text" name="txtMonto" placeholder="Monto de beca" class="form-control"><br><br>
		</div>
		<div class="form-column col-md-3 col-sm-3 col-xs-3">
			Codigo de Patrocinador:<br><input type="text" name="txtIdPa" placeholder="Codigo de patrocinador" class="form-control"><br>
		</div>
		

		
			<input type="submit" name="btnInsertar" value="Insertar" class="btn btn-danger">
			<input type="submit" name="btnEliminar" value="Eliminar" class="btn btn-danger"><br><br>
			<input type="submit" name="btnModificar" value="Modificar" class="btn btn-danger">
			<input type="submit" name="btnReiniciar" value="Reiniciar" class="btn btn-danger">
		</div>
	</div>
		</form>
		<hr>
	
		<form action="#" method="POST">
			
			Buscar:&nbsp;<label><input type="text" name="txtCriterio" placeholder="Criterio de busqueda" class="form-control">
		</label>
			En base a:&nbsp;<label><select name="campos" class="form-control">
				<option value="carnet" >Carnet</option>
				<option value="nombres">Nombre</option>
				<option value="apellidos">Apellido</option>
				<option value="edad">Edad</option>
				<option value="correo">Correo</option>
				<option value="monto_beca">Monto de Beca</option>
				<option value="id_patrocinador">Codigo de Patrocinador</option>
			</select></label>
			&nbsp;<input type="submit" name="btnFiltro" value="Filtrar" class="btn btn-danger">
			&nbsp;<input type="submit" name="btnRE" value="Reiniciar" class="btn btn-danger">
			&nbsp;<a href="Reporte.php"><input type="button" name="btnRep" value="Reporte" class="btn btn-danger"></a>
			
		</form>

		<hr>




		<?php

		$dao= new DAOBecas();
		$e= new becas();

		

		if (isset($_REQUEST["btnInsertar"])) {
			$e->setCarnet($_REQUEST["txtCarnet"]);
			$e->setNombre($_REQUEST["txtNombres"]);
			$e->setApellido($_REQUEST["txtApellidos"]);
			$e->setEdad($_REQUEST["txtEdad"]);
			$e->setCorreo($_REQUEST["txtCorreo"]);
			$e->setMonto_beca($_REQUEST["txtMonto"]);
			$e->setId_patrocinador($_REQUEST["txtIdPa"]);

			if ($dao->insertar($e)) {
				echo "<script>alert('Ingresado correctamente');</script>";
				echo $dao->seleccionar();
				}else{
					echo "<script>alert('Error');</script>";
				}

		}else if(isset($_REQUEST["btnEliminar"])){
			$id=$_REQUEST["txtCarnet"];

			if ($dao->eliminar($id)) {
			echo "<script>alert('Eliminado correctamente');</script>";
				echo $dao->seleccionar();		
			}else{
					echo "<script>alert('Error');</script>";
				}
		}
		else if(isset($_REQUEST["btnModificar"])){
			$e->setCarnet($_REQUEST["txtCarnet"]);
			$e->setNombre($_REQUEST["txtNombres"]);
			$e->setApellido($_REQUEST["txtApellidos"]);
			$e->setEdad($_REQUEST["txtEdad"]);
			$e->setCorreo($_REQUEST["txtCorreo"]);
			$e->setMonto_beca($_REQUEST["txtMonto"]);
			$e->setId_patrocinador($_REQUEST["txtIdPa"]);
			
			if ($dao->modificar($e)) {
				echo "<script>alert('Modificado correctamente');</script>";
				echo $dao->seleccionar();
				}else{
					echo "<script>alert('Error');</script>";
				}

		}
		else if (isset($_REQUEST["btnFiltro"])) {
				$criterio = $_REQUEST["txtCriterio"];
				$campo= $_REQUEST["campos"];

				echo $dao->filtrar($criterio,$campo);

			}
			
			
		
		else{
			echo $dao->seleccionar();	
		}




		?>

	</body>
	</html>