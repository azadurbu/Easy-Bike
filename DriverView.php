<?php 
include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/_ViewDriverNew.php';
include 'Include/Footer.php';
?>

<script>
    DriverView('<?php echo $_GET['user'];?>');
</script>