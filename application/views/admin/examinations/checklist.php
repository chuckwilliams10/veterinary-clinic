<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <style type="text/css">
        .table
        {
            border-collapse: collapse;
            width: 100%;
        }
        .table td, .table th
        {
            border: 1px solid #000;
            font-size: 12px;
            vertical-align: top;
        }
        .table th#comment
        {
            width: 300px;
        }

        .header
        {
            margin-bottom: 20px;
        }
        .center
        {
            text-align: center;
        }
        body
        {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div class="header">
        <div style="float: left; width: 100%; text-align: center">
            <img src="<?php echo res_url("site/images/logos.png") ?>" style="width: 250px">
        </div> 
        <div class="center"  style="font-size: 12px;">
            <strong>Blessed Veterinary Clinic</strong> - <span>281 C Roosevelt Ave, Brgy San Antonio Quezon City, Philippines</span>
        </div>
        <div style="clear: both;"></div>
    </div>
    <table class="table" cellpadding="10" cellspacing="0">
        <tr>
            <th style="width: 15%;">Owner Name: </th>
            <td style="width: 60%;"></td>
            <th style="width: 10%;">Date</th>
            <td style="width: 15%;"></td>
        </tr>
    </table>
    <table class="table" cellpadding="10" cellspacing="0">
        <tr>
            <th style="width: 15%">Address </th>
            <td style="width: 45%"></td>
            <th style="width: 15%">Contact</th>
            <td style="width: 45%"></td>
        </tr> 
    </table>
    <table class="table" cellpadding="10" cellspacing="0">
        <tr>
            <th style="width: 5%">ID</th>
            <td style="width: 10%"></td>
            <th style="width: 5%;">Pet Name: </th>
            <td style="width: 20%;"></td>
            <th style="width: 5%;">Species</th>
            <th style="width: 20%;"></th>
            <th style="width: 5%;">Breed</th>
            <th style="width: 30%;"></th> 
        </tr>
    </table>
    <br>
    <table class="table" cellpadding="10" cellspacing="0">
        <tr>
            <th style="width: 100px">Height</th>
            <td></td>
        </tr> 
        <tr>
            <th>Weight</th>
            <td></td>
        </tr> 
        <tr>
            <th>Temperature</th>
            <td></td>
        </tr> 
        <tr>
            <th>Heartrate</th>
            <td></td>
        </tr>
        <tr>
            <th>Nose</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Skin</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Anus</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Throat</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Fecal</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Mouth</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Lower Abdomen</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Upper Abdomen</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Limbs</th>
            <td style="height: 50px"></td>
        </tr>
        <tr>
            <th>Other Remarks</th>
            <td style="height: 50px"></td>
        </tr> 
    </table>
    <br><br>


    <table class="table" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <td colspan="6" style="height: 40px">
                    <strong>Laboratory </strong>
                </td>
            </tr>
            <tr>  
                <th></th> 
                <th>Code</th>   
                <th>Name</th>   
                <th>Range</th>  
                <th>Value</th>
                <th id="comment">Comment</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($laboratory_tests->result() as $laboratory_test)
        {
            ?>
            <tr>  
                <td class="center"><?php echo number_format($laboratory_test->lat_sequence); ?></td> 
                <td class="center"><?php echo $laboratory_test->lat_code; ?></td> 
                <td class="center"><?php echo $laboratory_test->lat_name; ?></td> 
                <td class="center"><?php echo $laboratory_test->lat_normal_value_start."-".$laboratory_test->lat_normal_value_end. " ".$laboratory_test->lat_unit; ?></td> 
                <td></td>
                <td></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <h4>Remarks</h4>
    <div style="height: 300px"></div>
    Signed by:
    <div style="height: 300px"></div>

</body>
</html>