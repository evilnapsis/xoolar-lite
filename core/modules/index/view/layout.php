<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>.: Xoolar Lite v1.0 :.</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>
<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
<link href='res/fullcalendar.min.css' rel='stylesheet' />
<link href='res/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='res/js/moment.min.js'></script>
<script src='res/fullcalendar.min.js'></script>
<?php endif; ?>

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Xoolar Lite <sup><small><span class="label label-success">v1.0</span></small></sup> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
         <ul class="nav navbar-nav">
          </ul>
<?php if(!isset($_SESSION["user_id"])):?>
          <li><a href="./"><i class="fa fa-home"></i> Inicio</a></li>
<?php endif;?>
<?php 
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
          <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li>
          <?php if(isset($_SESSION["selected_id"])):?>
          <li><a href="index.php?view=team&id=<?php echo $_SESSION["selected_id"];?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="index.php?view=assistance&team_id=<?php echo $_SESSION["selected_id"];?>"><i class="fa fa-check"></i> Asistencia</a></li>
          <li><a href="index.php?view=behavior&team_id=<?php echo $_SESSION["selected_id"];?>"><i class="fa fa-smile-o"></i> Comportamiento</a></li>
          <li>  <a href="index.php?view=califications&team_id=<?php echo $_SESSION["selected_id"]; ?>"><i class='fa fa-tasks'></i> Calificaciones</a></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Listas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?view=list&team_id=<?php echo $_SESSION["selected_id"]; ?>">Asistencia</a></li>
                <li><a href="index.php?view=behaviorlist&team_id=<?php echo $_SESSION["selected_id"]; ?>">Comportamiento</a></li>
                <li><a href="index.php?view=calificationlist&team_id=<?php echo $_SESSION["selected_id"]; ?>">Calificaciones</a></li>
              </ul>
            </li>
          <?php endif; ?>
          <li><a href="index.php?view=teams"><i class="fa fa-users"></i> Grupos</a></li>
          <?php if($u->is_admin):?>
<!--          <li><a href="index.php?view=changelog"><i class="fa fa-filter"></i> Log de cambios </a></li>
          <li><a href="index.php?view=users"><i class="fa fa-users"></i> Usuarios </a></li> -->
        <?php endif;?>





<?php endif;?>
          </ul>


<?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
<?php else:?>
<?php endif; ?>




        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("login");

?>

<hr>
<p>Evilnapsis &copy; 2015</p>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="res/bootstrap3/js/bootstrap.min.js"></script>

  </body>
</html>
