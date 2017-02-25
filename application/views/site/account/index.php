<div class="container">
    <br>
    <div class="section">
        <div class="row">
            <div class="col s12 m5">
                <h4>
                    Profile  
                   <a href="<?php echo site_url("account/update/".$account->acc_id) ?>" class="small-text anchor">Edit</a>
                </h4>
           
                <table class="bordered">
                    <tr>
                        <th><i class="tiny material-icons">person_pin</i> Name: </th>
                        <td><?php echo $account->acc_first_name." ".$account->acc_first_name; ?></td>
                    </tr>
                    <tr>
                        <th><i class="tiny material-icons">person</i> Gender: </th>
                        <td><?php echo $account->acc_gender; ?></td>
                    </tr>
                    <tr>
                        <th><i class="tiny material-icons">email</i> Email: </th>
                        <td><?php echo $account->acc_username; ?></td>
                    </tr>
                    <tr>
                        <th><i class="tiny material-icons">perm_phone_msg</i> Contact: </th>
                        <td><?php echo $account->acc_contact; ?></td>
                    </tr>
                    <tr>
                        <th><i class="tiny material-icons">location_on</i> Address: </th>
                        <td><?php echo $account->acc_address; ?></td>
                    </tr> 
                    <tr>
                        <th></th>
                        <td class="right">
                            <a href="<?php echo site_url("account/update/".$account->acc_id); ?>" class="btn waves-effect waves-light red">Edit</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col s12 m7">
                <h4>Pets</h4> 
                <hr>
                <div class="row">
                    <?php $counter = 1; ?>
                    <?php foreach ($pets->result() as $pet): ?>
                        <div class="col s12 m6">
                            <div class="card">
                                <div class="card-image">
                                    <a href="<?php echo site_url("account/pet/".$pet->pet_id); ?>">
                                        <img src="<?php echo base_url("uploads/pets/".$pet->pet_image); ?> " class="responsive-img"/> 
                                    </a>
                                    <a href="<?php echo site_url("account/pet/".$pet->pet_id); ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">open_in_browser</i></a>
                                </div>
                                <div class="card-content">
                                    <a href="<?php echo site_url("account/pet/".$pet->pet_id); ?>">
                                        <span class="card-title anchor"><?php echo ucwords($pet->pet_name); ?></span>
                                    </a>
                                    <table class="bordered smaller-font">
                                        <tr>
                                            <th style="width: 65px;" class="orange center">GENDER : </th>
                                            <th style="width: 65px;" class="orange center">STATUS : </th>
                                        </tr>
                                        <tr>
                                            <td class="center"><?php echo $pet->pet_gender; ?></td>
                                            <td class="center"><?php echo ucwords($pet->pet_status); ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 65px;" class="orange center">SPECIES : </th>
                                            <th style="width: 65px;" class="orange center">BREED : </th>
                                        </tr>
                                        <tr>
                                            <td class="center"><?php echo $pet->spe_name; ?></td>
                                            <td class="center"><?php echo $pet->bre_name; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php if ( ($counter % 2) == 0): ?>
                            <div class="col s12 m12"><hr></div>
                        <?php endif ?>
                        <?php $counter = $counter + 1; ?>
                    <?php endforeach ?>
                </div>      
                <hr>
                <?php echo $pets_pagination; ?>
            </div>  
        </div>
    </div>
</div>

