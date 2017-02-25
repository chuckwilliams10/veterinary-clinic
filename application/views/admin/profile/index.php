<hr>

<div class="row">
	<div class="span10">
		<div id="ppm"></div>
		<div id="epm"></div>
		<div id="ppps"></div>
	</div>
</div>
<hr>
<table class="table-form table-bordered">
	<tr>
		<th>Name</th>
		<td><?php echo $account->acc_first_name . ' ' . $account->acc_last_name; ?></td>
	</tr>
	<tr>
		<th>Username</th>
		<td><?php echo $account->acc_username; ?></td>
	</tr>
	<tr>
		<th>Account Type</th>
		<td><?php echo $account->acc_type; ?></td>
	</tr>
	<tr>
		<th>Password</th>
		<td><a href="<?php echo site_url('admin/profile/change_password'); ?>">Change Password</a></td>
	</tr>
</table>
<hr>
<script type="text/javascript">
	var ppm_data = $.parseJSON('<?php echo json_encode($chart_data['ppm']['data'],true) ?>');
	var ppm_categories = $.parseJSON('<?php echo json_encode($chart_data['ppm']['month'],true) ?>');
	// ppm_data = $.parseJSON(ppm_data);  

    Highcharts.chart('ppm', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	       	text: '<?php echo $chart_data['ppm']['title'] ?>'
	    }, 
	    xAxis: {
	         categories: ppm_categories,
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Months'
	        },
	        minRange: 1,
            allowDecimals: false
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y} </b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Total',
	        data: ppm_data
	    }]
	});



	var epm_data = $.parseJSON('<?php echo json_encode($chart_data['epm']['data'],true) ?>');
	var epm_categories = $.parseJSON('<?php echo json_encode($chart_data['epm']['month'],true) ?>');
	// ppm_data = $.parseJSON(ppm_data);  

    Highcharts.chart('epm', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	       	text: '<?php echo $chart_data['epm']['title'] ?>'
	    }, 
	    xAxis: {
	         categories: ppm_categories,
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Months'
	        },
	        minRange: 1,
            allowDecimals: false
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y} </b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: [{
	        name: 'Total',
	        data: ppm_data
	    }]
	});


	var ppps_data = $.parseJSON('<?php echo json_encode($chart_data['ppps']['data'],true) ?>');
	var ppps_categories = $.parseJSON('<?php echo json_encode($chart_data['ppps']['month'],true) ?>');
	// ppm_data = $.parseJSON(ppm_data);  
	var new_data = new Array();
    
    for(x in ppps_data){
    	var obj = {
    		name: x,
    		data: ppps_data[x]
    	};
    	new_data.push(obj);
    }

    Highcharts.chart('ppps', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	       	text: '<?php echo $chart_data['ppps']['title'] ?>'
	    }, 
	    xAxis: {
	         categories: ppm_categories,
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Months'
	        },
	        minRange: 1,
            allowDecimals: false
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y} </b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },
	    series: new_data
	});
    // dd(new_data);
</script>