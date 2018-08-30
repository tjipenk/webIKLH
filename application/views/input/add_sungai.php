<style type="text/css">
.kabupaten{
display:none!important;}

</style> 
			<div class="container header">
				<div class="col-sm-6 col-sm-offset-3 " style="padding: 0px">
					<h1 class="page_title_text">Tambah Lokasi Pengamatan</h1>
				</div>
			</div>
            <!-- START Template Container -->
            <div id="" class="container">
                <!-- Page Header -->                
                <!-- Page Header -->

                <!-- START row -->
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3" style="padding: 0px">
                        <!-- START panel -->
                        <div class="panel panel-default" style="border: 0px!important">
                            <!-- panel heading/header -->
                           
                            <!--/ panel heading/header -->
                            <!-- panel body -->
                            <div class="panel-body">
                                <form id="editdata" class="form-horizontal form-bordered">
                                    
                                    
                                   <div class="form-group">
                                        <label class="col-sm-3 control-label">Nama Sungai</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Titik Sampling</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="titik" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kategori Stasiun</label>
                                        <div class="col-sm-9">
                                            <select name="kategori" id="kategori" class="form-control">
                                            <option value="1">Preoritas</option>
                                            <option value="0">Non-Preoritas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tanggal" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Provinsi</label>
                                        <div class="col-sm-9">
                                            <select name="provinsi" id="provinsi" class="form-control" disabled>
												<option>Semua</option>
												<?php foreach($provinsi as $prov){
														$sel = "";
														if($prov['id_prov'] == $sel_provinsi){$sel = "selected";}
												?>
													<option class="provinsi" target="<?php echo $prov['id_prov'];?>" value="<?php echo $prov['id_prov'];?>" <?=$sel?>><?php echo $prov['prov'];?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kabupaten</label>
                                        <div class="col-sm-9">
											<select name="kabupaten" class="form-control" >
												<option>Semua</option>
												
												<?php foreach($kabupaten as $camat){?>
													<option  class="kab <?php echo $camat['id_prov'];?>" value="<?php echo $camat['id_kab'];?>"><?php echo $camat['kab'];?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lintang</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="lintang" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    
                                        <label class="col-sm-3 control-label">Bujur</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="bujur" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>                              
                                    </div>
									<div class="form-group">
                                        <label class="col-sm-3 control-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                        
                                            <textarea class="form-control" name="deskripsi"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group no-border">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                <button type="submit" class="btn btn-primary pull-right">Tambah</button>
                                                <a href="<?php echo site_url('admin_prov/daftar_sungai'); ?>">
												<button type="button" class="btn btn-danger">Batal</button>
                                                <br /><br /><span class="erro" style="color:red;"></span><br />
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
	// $("#provinsi").change(function(e){
		// var provinsi =  $(this).val();
		// $(".kabupaten").hide();
		// $("."+provinsi).show();
	// });

    $( document ).ready(function () {
      
        
        
        $('.btn-primary').click(function() {

			$.ajax({
				url: "<?php echo site_url('admin_prov/add_sungai_data'); ?>",
				type: 'POST',
				async : false,
				data: $('#editdata').serialize(),
				success: function(msg) {
					// if (msg = "edit") { window.location.replace("<?php echo site_url('admin_prov/daftar_sungai'); ?>"); }
					// alert(msg);
					if(msg= "add"){alert("Data Berhasil Disimpan.");window.location.replace("<?php echo site_url('admin_prov/daftar_sungai'); ?>");}
				}
			});
			return false;
		});
    
    });
</script> 

                

            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->