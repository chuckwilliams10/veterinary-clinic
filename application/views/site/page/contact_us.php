<div class="container">
    <br>
    <div class="section">
        <div class="row">
            <div class="row">
                <div class="col s12 m6">
                    <form class="contact-form" method="post"> 
                        <div class="row">
                            <div class="col s12">
                                <label for="first_name">Name</label>
                                <input name="name" id="name" type="text" value="<?php echo $this->input->post("name") ?>" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="email">Email</label>
                                <input name="email" id="email" type="email" value="<?php echo $this->input->post("email") ?>" placeholder="email@domain.com">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col s12">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="materialize-textarea" placeholder="message"><?php echo $this->input->post("message") ?></textarea>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 center">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Send
                                    <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col s12 m6">
                    <p><i class="tiny material-icons">location_on</i>
                        281 C Roosevelt Ave, Brgy San Antonio Quezon City, Philippines 
                    </p> 
                    <p><i class="tiny material-icons">perm_phone_msg</i> 0927 340 3861</p>
                    <div class="video-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.104319204375!2d121.0166961991991!3d14.650019279263772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6f6c6613f17%3A0xe4fe76f5652a6a81!2sBlessed+Veterinary+Clinic!5e0!3m2!1sen!2sph!4v1487781763855" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>