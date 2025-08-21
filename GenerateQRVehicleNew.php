<?php 
include 'Views/_GenerateQRVehicleIndividual.php';
?>
<script>
   GenerateVehicleIndividualQR('<?php echo $_GET['user'];?>');
   print();
</script>