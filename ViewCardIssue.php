<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_ViewCardIssue.php';
include 'Include/Footer.php';

?>
<script>
    $(document).ready(function(){
        VehicleView('<?php echo $_GET['user'];?>');
    });
</script>