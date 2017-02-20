<table class="lab-form-table">
    <thead> 
        <th>Test</th>
        <th>Normal</th>
        <th>Range Values</th>
        <th style="width: 100px;">Result</th>
        <th>Remarks</th> 
    </thead>
    <tbody>
    <?php $counter = 0; ?>
    <?php foreach ($lab_tests->result() as $lab_result): ?>
        <tr> 
            <th>
                <span><?php echo $lab_result->lat_name; ?></span>
                
                <!-- <?php echo $lab_result->lat_sequence; ?> -->
                <input type="hidden" name="lat_id[<?php echo $counter; ?>]" value="<?php echo $lab_result->lat_id; ?>">
                <input type="hidden" name="ltr_status[<?php echo $counter; ?>]" value="done">        
            </th>
            <td class="text-center"><?php echo $lab_result->lat_normal_value; ?></td>
            <td class="text-center"><?php echo $lab_result->lat_normal_value_start."-".$lab_result->lat_normal_value_end." ".$lab_result->lat_unit; ?></td>
            <td class="text-center"><input type="text" name="ltr_result[<?php echo $counter; ?>]" required="required" style="width: 50px"></td>
            <td class="text-center"><input type="text" name="ltr_remark[<?php echo $counter; ?>]" required="required" style="width: 350px"></td>
        </tr>
        <?php $counter = $counter + 1; ?>
    <?php endforeach ?>
    </tbody>
</table>
<br>