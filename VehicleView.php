<?php 
include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_ViewVehicleNew.php';
include 'Include/Footer.php';

?>
<script>
   VehicleView('<?php echo $_GET['user'];?>');
   justQRCode('<?php echo $_GET['user'];?>');
</script>