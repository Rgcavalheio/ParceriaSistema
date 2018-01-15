<?php
require_once('functions.php');



include(HEADER_TEMPLATE); 

?>


<header>


	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">





	<div class="row">
		<div class="col-sm-6">
			<h2>Capturador</h2>
		</div>
		
	</div>
</header>







<hr>
<div id="alert"></div>

<form action="capturador_ilocal2.php" method="post">
	<div class="row">
		<div class="col-lg-6">
			<h3>ILocal</h3>
			<b>Link:</b>
			<input name="link" type="text" style="width:800px" value=""/>
			 <input type="hidden" name="status" value="1">
			<button type="submit" class="btn btn-default">Capturar</button>
		</div>
	</div>
</form>

<form action="capturador_guiamais3.php" method="post">
	<div class="row">
		<div class="col-lg-6">
			<h3>GuiaMais</h3>
			<b>Link:</b>
			<input name="link" type="text" style="width:800px" value=""/>
				 <input type="hidden" name="status" value="1">
			<button type="submit" class="btn btn-default">Capturar</button>
		</div>
	</div>
</form>

<?php








include(FOOTER_TEMPLATE); ?>



