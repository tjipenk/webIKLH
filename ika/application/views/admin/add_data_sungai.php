<style type="text/css">
       <style>
.lokasi{
display:none!important;}
</style>
<?php //echo $map['js']; ?>

   </style> <div class="container header">
<div class="col-sm-6 col-sm-offset-3 " style="padding: 0px">
<h1 class="page_title_text">Tambah Data Pengamatan Air</h1>
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
							<form id="editdata" class="form-horizontal form-bordered" action="<?php echo site_url('admin/add_data_sungaidata'); ?>" method="post" enctype="multipart/form-data">
                                <!--<form id="editdata" class="form-horizontal form-bordered">
									-->
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Provinsi</label>
                                        <div class="col-sm-9">
                                            <select name="provinsi" id="provinsi" class="form-control">
<option>Semua</option>
<?php foreach($provinsi as $prov){?>
<option class="provinsi" target="<?php echo $prov['id_prov'];?>" value="<?php echo $prov['id_prov'];?>"><?php echo $prov['prov'];?></option>
<?php } ?>
</select>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Lokasi</label>
                                        <div class="col-sm-9">
             <select name="lokasi" class="form-control" >
<option>Semua</option>

<?php foreach($lokasi as $lok){?>
<option  class="lokasi <?php echo $lok['id_prov'];?>" value="<?php echo $lok['id'];?>"><?php echo $lok['sungai'].': '.$lok['lokasi'];?></option>
<?php } ?>
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
                                        <label class="col-sm-3 control-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select name="kategori" id="kategori" class="form-control">
                                            <option value="1">Preoritas</option>
                                            <option value="0">Non-Preoritas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">TSS</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="tss" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                    
                                        <label class="col-sm-3 control-label">DO</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="do" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>

                                        <label class="col-sm-3 control-label">BOD</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="bod" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                        <label class="col-sm-3 control-label">COD</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="cod" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>

                                        <label class="col-sm-3 control-label">Total Fosfat</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="tp" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>

                                        <label class="col-sm-3 control-label">Fecal Coli</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="fcoli" class="form-control" value="">
                                            <span class="help-block"></span>
                                        </div>
                                        <label class="col-sm-3 control-label">Total Coli</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="tcoli" class="form-control" value="">
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
									<div id="uploadfile" class="form-group">
										<label for="filename" class="col-sm-3 control-label">Attach File</label>
										<div class="col-sm-9">
											<div id="uploadfile" class="form-group" style="margin-left: 0px !important;">
												<input type="file" id="filename" name="filename" class="form-control" readonly />
												<span class="help-block"><strong>Allowed File Type</strong> : png, jpg, jpeg, pdf with </br><strong>Allowed File Size</strong> : 1 MB</span>
												<span id="errorFile"></span>
											</div>
										</div>
									</div>
                                    <div class="">
                                        <div class="form-group no-border">
                                            <label class="col-sm-3 control-label"></label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                <button id="btnTambah" type="submit" class="btn btn-primary pull-right">Tambah</button>
                                                <a href="<?php echo site_url('admin/data_sungai'); ?>">
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


    $("#provinsi").change(function(e){
                  var provinsi =  $(this).val();
                    $(".lokasi").hide();
                    $("."+provinsi).show();
                    });




   /*
    $( document ).ready(function () {
      
        
        
        $('.btn-primary').click(function() {

$.ajax({
url: "<?php echo site_url('admin/add_data_sungaidata'); ?>",
type: 'POST',
async : false,
data: $('#editdata').serialize(),
success: function(msg) {
if (msg = "edit") { window.location.replace("<?php echo site_url('admin/data_sungai'); ?>"); }
}
});
return false;
});
    
    });
	*/
	$(function(){
		$('#filename').change(function(){
			var f=this.files[0]
			var ext = $('#filename').val().split('.').pop().toLowerCase();
			if ((f.size>1024000) || (f.fileSize>1024000 ) || ($.inArray(ext, ['png','jpg','jpeg','pdf'])  < 0))
			{
				document.getElementById("uploadfile").className = "form-group has-error";
				document.getElementById("errorFile").innerHTML = '<label class="help-block" generated="true" for="filename">WARNING! File size or File type is not Allowed.</label>';
				document.getElementById("btnTambah").disabled = true;
			}
			else
			{
				document.getElementById("uploadfile").className = "form-group";
				document.getElementById("errorFile").innerHTML = '';
				document.getElementById("btnTambah").disabled = false;
			}
		})
		
	})	
  </script> 

                

            </div>
            <!--/ END Template Container -->

            <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->