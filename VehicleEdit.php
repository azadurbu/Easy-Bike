<?php 

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_EditVehicleNew.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        VehicleEdit('<?php echo $_GET['user'];?>');
        GetAllOwner();
    });
</script>