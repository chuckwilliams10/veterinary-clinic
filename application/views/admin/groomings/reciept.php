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
            <td style="width: 60%;"><?php echo ucwords($pet->acc_first_name." ".$pet->acc_last_name); ?></td>
            <th style="width: 10%;">Date</th>
            <td style="width: 15%;"><?php echo date("F d, Y"); ?></td>
        </tr>
    </table>
    <table class="table" cellpadding="10" cellspacing="0">
        <tr>
            <th style="width: 15%">Address </th>
            <td style="width: 45%"><?php echo $pet->acc_address; ?></td>
            <th style="width: 15%">Contact</th>
            <td style="width: 45%"></td>
        </tr> 
    </table>
    <table class="table" cellpadding="10" cellspacing="0">
        <tr>
            <th style="width: 5%">ID</th>
            <td style="width: 10%"><?php echo str_pad($pet->pet_id, 7, "0",STR_PAD_LEFT); ?></td>
            <th style="width: 5%;">Pet Name: </th>
            <td style="width: 20%;"><?php echo $pet->pet_name; ?></td>
            <th style="width: 5%;">Species</th>
            <td style="width: 20%;"><?php echo $pet->spe_name; ?></td>
            <th style="width: 5%;">Breed</th>
            <td style="width: 30%;"><?php echo $pet->bre_name; ?></td> 
        </tr>
    </table>
    <hr>
    <h4> OR Number: <span style="font-weight:normal"><?php echo random_string('numeric', 16); ?></span></h4>
    <hr>
    <table class="table" cellpadding="10" cellspacing="0">
        <tr>
            <th>Datetime</th>
            <td><?php echo format_datetime($grooming->gro_datetime); ?></td>
        </tr>  
        <tr>
            <th>Description</th>
            <td><?php echo nl2br($grooming->gro_description); ?></td>
        </tr>
        <tr>
            <th>Cost</th>
            <td><?php echo "Php ".number_format($grooming->gro_cost, 2); ?></td>
        </tr>
        <tr>
            <th>Total Paid</th>
            <td></td>
        </tr>
        <tr>
            <th>Change</th>
            <td></td>
        </tr>
    </table>

    <br>
</body>
</html>