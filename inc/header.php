<?php   include(DBLOGIN);  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Sistema - PARCERIA CONSÓRCIO</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo BASEURL; ?>imagens/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }

  </style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#testNavBar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a href="
        <?php 
        if (isset($_SESSION['UsuarioID'])){
          echo BASEURL.'menu.php';
        }else{
          echo BASEURL;    
        }      
        ?>" 
        class="navbar-brand"><font size="5"><b>Parceria<b></font></a>
      </div>
      <div class="collapse navbar-collapse" id="testNavBar">
        <ul class="nav navbar-nav">




         <?php if (isset($_SESSION['UsuarioID'])){





          ?>       


          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Clientes <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">               
              <li><a href="<?php echo BASEURL; ?>clientes/index.php">Clientes</a></li>     
              <li><a href="<?php echo BASEURL; ?>clientes/add.php">Novo Cliente</a></li> 
               <li><a href="<?php echo BASEURL; ?>capturador"><b style="margin-left:5px;">Capturador</b></a></li>

            </ul>

          </li>
 <li><a href="<?php echo BASEURL; ?>email"><b style="margin-left:5px;">Email</b></a></li>
          <?php
          
          if ($_SESSION['UsuarioNivel'] > 1){  
            ?>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Propostas <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo BASEURL; ?>propostas/index.php">Propostas</a></li>
                <li><a href="<?php echo BASEURL; ?>propostas/add.php">Nova Proposta</a></li>                    
              </ul>
            </li>

            <li><a href="<?php echo BASEURL; ?>usuarios"><b style="margin-left:5px;">Usuários</b></a></li>

            <li><a href="<?php echo BASEURL; ?>historico"><b style="margin-left:5px;">Histórico</b></a></li>
            <li><a href="<?php echo BASEURL; ?>estatisticas"><b style="margin-left:5px;">Estatísticas</b></a></li>
              <li><a href="<?php echo BASEURL; ?>graficos"><b style="margin-left:5px;">Gráficos</b></a></li>
              
               



            <?php
          }

          ?>





        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li ><a href="#" style="color:green;" data-toggle="modal" data-target="#lembrete-modal" data-customer="<?php echo $_SESSION['UsuarioID']; ?>" ><span class="glyphicon glyphicon-plus-sign"></span><b style="margin-left:5px;"><font size="4">Adicionar Lembrete</font></b></a></li>
          <li><a href="<?php echo BASEURL; ?>perfil"><span class="glyphicon glyphicon-user"></span><b style="margin-left:5px;"><font size="4"><?php echo $_SESSION['UsuarioNome'] ?></font></b></a></li>
          <li><a href="<?php echo BASEURL; ?>login/logout.php"><span class="glyphicon glyphicon-log-out"></span><b style="margin-left:5px;"><font size="4">Sair</font></b></a></li>
        </ul>
        <?php }?>

      </div>
    </div>
  </nav>


</head>
<body>




  <main class="container">


   <?php if (isset($_SESSION['UsuarioID'])){

    get_lembretes($_SESSION['UsuarioID']);

    if($lembretes){
      $now = date('Y-m-d');
      $ok = 0;
      $total = count($lembretes);   
       $data = array();

      foreach ($lembretes as $key => $lembrete) {


      
       

       if(strtotime($lembrete['data']) <= strtotime($now)){



        array_push($data, $lembrete['id']);

        $ok++;




         // echo "<script>alert('Lembrete:');location.href=\"../clientes/\"</script>";   



      }



    }

   
    if($ok > 0){
      $_SESSION['data'] = json_encode($data);
      
      ?>
      <br>
      <a href="#">
        <div class="alert alert-danger" role="alert" data-toggle="modal" data-target="#lembreteaviso-modal">

          <?php 
          if ($ok == 1){
            echo 'Você possui um novo lembrete!';    
          }elseif($ok >= 2){
            echo 'Você possui novos lembretes! ('.$total.')';
          }
          ?>
        </div>
      </a>



      <?php 


    }


  }
}


?>