<?php

if(Session::getUID()!=""){
		print "<script>window.location='index.php?view=home';</script>";
}

?>
<div class="row">
		<div class="col-md-8">
		<h1>Bienvenido a Xoolar Lite</h1>
		<p class="lead"><b>Xoolar Lite</b> es una herramienta para profesores en la cual pueden gestionar sus grupos de clases, llevar el control de asistencia, control de comportamiento y las calificaciones de sus alumnos.</p>
		<div class="row">
		<div class="col-md-6">
		<h3>Alumnos</h3>
		<p>Gestion de alumnos individuales, datos personales, datos del tutor.</p>
		</div>
		<div class="col-md-6">
		<h3>Grupos</h3>
		<p>Gestion de grupos, un mismo alumno puede estar en varios grupos.</p>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<h3>Asistencia</h3>
		<p>Registra la asistencia de los alumnos: asistencias, faltas, retardos, justificaciones.</p>
		</div>
		<div class="col-md-6">
		<h3>Comportamiento</h3>
		<p>Registra el comportamiento o conducta de los alumnos: buena, muy buena, mala, muy mala.</p>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<h3>Calificaciones</h3>
		<p>Registra los bloques de calificaciones por grupos.</p>
		</div>
		<div class="col-md-6">
		<h3>Reportes</h3>
		<p>Genra reportes listos para imprimir en formato Word.</p>
		</div>
		</div>
		</div>
    	<div class="col-md-4">
    	<?php if(isset($_COOKIE['password_updated'])):?>
    		<div class="alert alert-success">
    		<p><i class='glyphicon glyphicon-off'></i> Se ha cambiado la contraseña exitosamente !!</p>
    		<p>Pruebe iniciar sesion con su nueva contraseña.</p>

    		</div>
    	<?php setcookie("password_updated","",time()-18600);
    	 endif; ?>
    		<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Iniciar Sesion</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?view=processlogin">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Usuario" required name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" required name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-primary btn-block" type="submit" value="Iniciar Sesion">
			    	</fieldset>
			      	</form>
			    </div>
			</div>

			    		<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Registro</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="post" action="index.php?action=processregister">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Nombre" required name="name" type="text">
			    		</div>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Apellidos" required name="lastname" type="text">
			    		</div>

			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Usuario" required name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" required name="password" type="password" value="">
			    		</div>
			    		<input class="btn btn-primary btn-block" type="submit" value="Registrarme">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
<br><br><br>