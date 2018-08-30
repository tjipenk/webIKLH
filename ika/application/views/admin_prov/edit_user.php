<div class="container" id="pagecontent">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-md-offset-3">
                    <div class="account-wall">                        
                        
                        <h3>Edit petugas</h3>
                        <br />

                     
                        <i class="user-img icons-faces-users-03"></i>
                        <?php echo form_open(base_url()."/admin_prov/edit_userdata",array("method"=>"POST"));?>
                    <input type="hidden" name="id_user" value="<?php echo $petugas['user_id'];?>" />
                            <div class="row" style="margin-top:10px;">
                                <div class="col-sm-6">
                                    <div class="append-icon">
                                        <input type="text" name="name" value="<?php echo $petugas['user_name'];?>" class="form-control form-white" placeholder="Nama depan" required="" autofocus="">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="append-icon">
                                        <input type="text" value="<?php echo $petugas['user_lastname'];?>" name="lastname" class="form-control form-white lastname" placeholder="Nama belakang" >
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="append-icon" style="margin-top:10px;">
                                <input type="slug" name="slug" id="slug" class="form-control form-white email" placeholder="<?php echo $this->lang->line('input_slug'); ?>" value="<?php echo $petugas['user_slug'];?>"  required="">                           
                            </div>
                            

                            <div class="append-icon" style="margin-top:10px;">
                                <p>Provinsi tempat bertugas</p>
                                <select name="provinsi"  class="form-control form-white password">
                                   <?php

                                   foreach ($provinsi as $key => $value) {
                                        if($value['id_prov']==$petugas['provinsi'] ){
                                            ?>
                                            <option selected="selected" value="<?php echo $value['id_prov'];?>"><?php echo $value['prov'];?></option>

                                    <?php
                                        } else {
                                    ?>
                                         <option value="<?php echo $value['id_prov'];?>"><?php echo $value['prov'];?></option>
                                    <?php } ?>
                                       
                                    <?php
                                       # code...
                                   }
                                   ?>
                                </select>
                             
                            </div>
                            <div class="append-icon" style="margin-top:10px;">
                                <p>Level Petugas
                                <select name="level"  class="form-control">
                                <?php
                                 if($petugas['user_level']==4 ){
                                    ?>
                                    <option selected="selected" value="<?php echo 4;?>">Petugas Input</option>

                            <?php
                                } else { ?>
                                    <option selected="selected" value="<?php echo 3?>">Administrator</option>

                                <?php } ?>
                                        <option value="4">Petugas Input</option>
                                        <option value="3">Administrator</option>
                                    
                                </select>
                             
                            </div>

                            <hr/>

 <p>Kosongkan jika tidak ingin mengubah password</p>
                            <div class="append-icon" style="margin-top:10px;">
                                <input type="password" name="password" class="form-control form-white password" placeholder="<?php echo $this->lang->line('input_password'); ?>" >
                                <i class="icon-lock"></i>
                            </div>
                             <p>Kosongkan jika tidak ingin mengubah password</p>
                            <div class="append-icon" style="margin-top:10px;">
                                <input type="password" name="password2" class="form-control form-white password2" placeholder="Konfirmasi password" >
                                <i class="icon-lock"></i>
                            </div>
                            

                           
                          

                            <div class="clearfix" style="margin-top: 40px">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                <p class="pull-left m-t-20">

                                    <button type="submit" id="submit-form" class="button btn m-t-20 button-green">Edit petugas</button></p>
                                <p class="pull-right m-t-20"><a href="<?php echo base_url() ?>"><?php echo $this->lang->line('cancel_button'); ?></a></p>
                            </div>

                           

                        </form>
                    </div>
                </div>
            </div>
            
        </div>
