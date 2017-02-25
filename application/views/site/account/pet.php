<div class="container">
    <br>
    <div class="section">
        <div class="row">
            <div class="col s12 m3">
                <h4>
                    Pet Profile  <i class="small material-icons">pets</i>                     
                </h4>
           
                <table class="bordered pet-table">
                    <tr>
                        <td class="center" colspan="2">
                             <img src="<?php echo base_url("uploads/pets/".$pet->pet_image); ?> " class="responsive-img"/> 
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" class="anchor">Pet Information</th>
                    </tr>
                    <tr>
                        <th>Name: </th>
                        <td><?php echo $pet->pet_name; ?></td>
                    </tr>
                    <tr>
                        <th>Gender: </th>
                        <td><?php echo $pet->pet_gender; ?></td>
                    </tr>
                    <tr>
                        <th>Species: </th>
                        <td><?php echo $pet->spe_name; ?></td>
                    </tr>
                    <tr>
                        <th>Breed: </th>
                        <td><?php echo $pet->bre_name; ?></td>
                    </tr>
                    <tr>
                        <th>Birthday: </th>
                        <td><?php echo format_date($pet->pet_date_of_birth, "F, Y"); ?></td>
                    </tr> 
                    <tr>
                        <th>Color: </th>
                        <td><?php echo $pet->pet_color; ?></td>
                    </tr>
                    <tr>
                        <th>Added: </th>
                        <td><?php echo $pet->pet_date_added; ?></td>
                    </tr>
                    <tr>
                        <th>Status: </th>
                        <td><?php echo ucwords($pet->pet_status); ?></td>
                    </tr>
                </table>
                <table class="bordered pet-table">
                    <?php if ($pet->pet_status == "dead"): ?>
                    <tr>
                        <th colspan="2" class="anchor">Death Information</th>
                    </tr>
                    <tr>
                        <th>Date: </th>
                        <td><?php echo format_date($pet->pet_death_datetime, "F, Y"); ?></td>
                    </tr>
                    <tr>
                        <th style="vertical-align: top;">Cause: </th>
                        <td><?php echo $pet->pet_cause_of_death; ?></td>
                    </tr>
                    <?php endif ?>
                </table>
            </div>
            <div class="col s12 m9">
                <h4>Pets</h4> 
                <hr>
                <h5 class="anchor">Remarks: </h5>
                <p><?php echo $pet->pet_remarks; ?></p>
                <hr>
                <h5 class="anchor">Images:</h5>
                <div>
                    <ul class="bxslider" id="pet_images">
                        <?php foreach ($images->result() as $image): ?>
                            <li><img src="<?php echo base_url("uploads/laboratory_results/".$image->lri_image); ?>" title="<?php echo $image->exm_name; ?>" style="width: 100%"></li>
                        <?php endforeach ?> 
                    </ul>
                </div>
                <hr>
                <h5 class="anchor">Examination Results</h5>
                <?php $total = 0; ?>
                <?php foreach ($line_items as $key => $value): ?>

                    <div class="box">
                        <b class=""><?php echo $value->exm_name; ?></b>
                    </div>
                    <p><?php echo $value->lab_remark; ?></p>
                    
                    <table class="striped"> 
                        <thead>
                            <tr>
                                <th style="width: 25%" class="left">Test Name</th>
                                <th style="width: 25%" class="left">Normal Value</th> 
                                <th style="width: 25%" class="left">Test Result</th>
                                <th style="width: 25%" class="left">Test Remark</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php foreach ($value->line_item as $ikey => $ivalue): ?>
                            <tr>
                                <td style="width: 25%" class="left"><?php echo $ivalue->lat_name ?></td>
                                <td style="width: 25%" class="left"><?php echo $ivalue->lat_normal_value." ".$ivalue->lat_unit; ?></td> 
                                <td style="width: 25%" class="left"><?php echo $ivalue->ltr_result." ".$ivalue->lat_unit;  ?></td>
                                <td style="width: 25%" class="left"><?php echo $ivalue->ltr_remark; ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="right" colspan="4">
                                    <div class="control-group">
                                        <label class="control-label" for="inputWarning" style="display: inline-block;"><strong>Total: </strong></label>
                                        <div class="controls" style="display: inline-block; margin-top: 10px;"> 
                                            <input class="span1" type="text" readonly value="Php: <?php echo number_format($value->exm_rate,2); ?>" name="rvl_value[<?php echo $value->exm_id; ?>]" style="top: 1px; position: relative;">
                                            <span class="help-inline"></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <?php $total = $total + $value->exm_rate; ?>
                <?php endforeach; ?> 
            </div>  
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#pet_images').bxSlider({
            captions: true,
            adaptiveHeight: true,
            captions: true
        });
    });
</script>
