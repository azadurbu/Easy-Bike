<?php 

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_EditDriverNew.php';
include 'Include/Footer.php';

?>

<script>
    $(document).ready(function(){
        DriverEdit('<?php echo $_GET['user'];?>');
    });
</script>

