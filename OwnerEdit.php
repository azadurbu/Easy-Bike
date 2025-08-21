<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_EditOwnerNew.php';
include 'Include/Footer.php';
?>
<script>
    $(document).ready(function(){
        OwnerEdit('<?php echo $_GET['user'];?>');
        GetAllDivisionEdit();
    });
</script>