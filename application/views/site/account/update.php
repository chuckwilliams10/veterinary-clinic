<div class="container">
    <br>
    <div class="section">
        <div class="row">
            <div class="col s12 m12">
                <h4>
                    Profile  <i class="tiny material-icons">mode_edit</i>
                    <!-- <a href="<?php echo site_url("account/update/".$account->acc_id) ?>" class="small-text anchor">Edit</a> -->
                </h4>
           
                <form method="post">
                    <table class="bordered">
                        <tr>
                            <th><i class="tiny material-icons">person_pin</i> Name: </th>
                            <td><?php echo $account->acc_first_name." ".$account->acc_last_name; ?></td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td><input type="text" required name="acc_first_name" class="browser-default" value="<?php echo $account->acc_first_name; ?>"></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><input type="text" required name="acc_last_name" class="browser-default" value="<?php echo $account->acc_last_name; ?>"></td>
                        </tr>

                        <tr>
                            <th>Gender</th>
                            <td>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <select name="acc_gender" required class="">
                                            <option></option>
                                            <option <?php echo ($account->acc_gender == "male") ? "selected" : "" ; ?> value="male">Male</option>
                                            <option <?php echo ($account->acc_gender == "female") ? "selected" : "" ; ?> value="female">Female</option>
                                        </select>  
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td>            
                                <input type="number" name="acc_contact" class="browser-default" maxlength="11" value="<?php echo $account->acc_contact; ?>" required> 
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th> 
                            <td>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="acc_address" id="textarea" required ><?php echo $account->acc_address; ?></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th></th>
                            <td class="right">
                                <input type="submit" name="submit" value="Update" class="btn"> 
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function() {
        $('select').material_select();
        $('#textarea').val("<?php echo $account->acc_address; ?>");
        $('#textarea').trigger('autoresize');

        $('#textarea').keypress(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
            }
        });
    });
</script>