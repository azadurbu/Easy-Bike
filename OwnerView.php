<?php 

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_ViewOnwerNew.php';
include 'Include/Footer.php';
?>
<script>
    $(document).ready(function(){
        OwnerView('<?php echo $_GET['user'];?>');
    });
</script>