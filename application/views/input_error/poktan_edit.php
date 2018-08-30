          <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datepicker3.min.css">
              <script src="<?php echo base_url();?>js/bootstrap-datepicker.min.js"></script>
                <script src="<?php echo base_url();?>js/locales/bootstrap-datepicker.id.min.js" charset="UTF-8"></script>
            <div class="container header">
<div class="pull-left ">
<h1 class="page_title_text hidden-xs">Edit Kelompok tani</h1>
</div>
</div>
            <!-- START Template Container -->
            <div id="" class="container">
                <!-- Page Header -->                
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-md-12" style="padding: 0px">
                        <!-- START panel -->
                        <div class="panel panel-default" style="border: 0px!important;padding: 0px!important">
                            <!-- panel heading/header -->
                            
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                           

                                    <?php echo form_open_multipart("gapoktan/proses_edit_poktan", array("method"=>"POST","id"=>'editdata','class'=>'form-horizontal form-bordered'));?>

                                    <input type="hidden" name="id" value="<?php echo $id;?>">

                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" value="<?php echo $nama;?>" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal didirikan</label>
                                        <div class="col-sm-9">
                                            <input autocomplete="off"type="text" id="tanggal"name="tanggal" value="<?php echo $tanggal;?>"class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Foto kelompok tani</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="foto" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                     <div class="form-group hide">
                                        <label class="col-sm-3 control-label">Luas lahan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="luas" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">Pola tanam 1</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $pola1;?>"  name="pola1" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Pola tanam 2</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $pola2;?>" name="pola2" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label">Pola tanam 3</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $pola3;?>" name="pola3" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Ketua</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ketua" value="<?php echo $ketua;?>" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Bendahara</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="bendahara" value="<?php echo $bendahara;?>"  class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Sekertaris</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="sekertaris" value="<?php echo $sekertaris;?>" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    


                                  
                     
                                    <div class="navbar navbar-default"style="position: ;bottom: 0;left: 0;right: 0;height: 50px;background: #388e3c;margin:0 -20px -60px">
                                        <div class="form-group no-border" style="margin-top: -23px">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                <button  style="border:0px!important;box-shadow: none!important"type="submit" class="btn btn-primary pull-right"><i class="glyph-icon flaticon-add" style="margin-right: 5px"></i> Edit </button>
                                                <a href="<?php echo site_url('gapoktan/kelompok_tani'); ?>" style="color: #fff;margin: 8px 10px 0 0px;font-size: 14px" class=" pull-left"><i class="glyph-icon flaticon-left-arrow"></i><p style="margin-left: 20px!important;margin-top: 5px!important;padding-top: 5px"> Batal</</p>
                                                
												</a>
                                            </div>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                            <!-- panel body -->
                        </div>
                        <!--/ END form panel -->
                    </div>
                </div>
                <!--/ END row -->

                <script>    

                $('#tanggal').datepicker({
    format: "yyyy-mm-dd",
    language: "id",
    daysOfWeekDisabled: "0",
    autoclose: true,
    toggleActive: true
});

/*
    $( document ).ready(function () {
      
        
        
        $('.btn-primary').click(function() {

$.ajax({
url: "<?php echo site_url('gapoktan/tambah_gapoktan'); ?>",
type: 'POST',
async : false,
data: $('#editdata').serialize(),
success: function(msg) {
if (msg = "edit") { window.location.replace("<?php echo site_url('kelompok_tani/hibah'); ?>"); }
}
});
return false;
});
    
    });*/
  </script> 

                

            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->