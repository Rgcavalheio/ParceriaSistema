</main> <!-- /container -->

<hr>
<footer class="panel-footer navbar-inverse navbar-fixed-bottom">
  <p>Rafael Cavalheiro &copy;2017,2018 </p>
</footer>

<?php include('addlembrete.php');
include('lembreteaviso.php'); ?>


<script src="<?php echo BASEURL; ?>js/jquery.min.js"></script>
<script src="<?php echo BASEURL; ?>js/jquery-ui.min.js"></script>

<script src="<?php echo BASEURL; ?>js/bootstrap.min.js"></script>
<script src="<?php echo BASEURL; ?>js/main.js"></script>


<script src="<?php echo BASEURL; ?>js/copytoclipboard.js"></script>

<script src="<?php echo BASEURL; ?>js/jquery.hideseek.min.js"></script>

<script src="<?php echo BASEURL; ?>js/mask.js"></script>

<script type="text/javascript" src="<?php echo BASEURL; ?>js/jquery.mask.min.js"/></script>

	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		




<script type="text/javascript">
  $(document).ready(function() {
    $('#search').hideseek({
     nodata: '',
     highlight: true,
     hidden_mode: false
   });
  });




</script>

<script type="text/javascript">
  $('#datepicker').datepicker({
    format: 'dd/mm/yyyy'

  });

</script>





</body>
</html>