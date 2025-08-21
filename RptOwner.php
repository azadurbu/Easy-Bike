<?php

include 'Include/Header.php';
include 'Include/SideMenu.php';
include 'Views/ReportView/_OwnerReport.php';
include 'Include/Footer.php';
?>
<script>
    cGetDivision();
    $( "select[name='cDivision']" ).change(function ()
    {
        cDivID = $(this).val();

        $('select[name="cSubDivision"]').empty();
        $('select[name="cSubDivision"]').append('<option value="">'+ "---- পৌরসভা ----" +'</option>');

        $('select[name="cWardNo"]').empty();
        $('select[name="cWardNo"]').append('<option value="">'+ "---- ওয়ার্ড নং ----" +'</option>');

        $('select[name="cArea"]').empty();
        $('select[name="cArea"]').append('<option value="">'+ "---- গ্রাম/মহল্লা ----" +'</option>');

        if(cDivID)
        {
            cGetSubDivisionByDivID(cDivID);
        }
    });
</script>