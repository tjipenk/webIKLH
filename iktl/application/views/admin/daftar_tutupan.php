<div class="container header">
<div class="pull-left row">
<h1 class="page_title_text">Data tutupan lahan</h1>
</div>
<a href="<?php echo site_url('admin/add_tutupan'); ?>" style="float:right;">
	<br />
    <button type="button" class="btn btn-primary  hidden-sd hidden-xs style="margin-bottom:5px;">Tambah baru</button>
</a>
</div>
    
<div id="maincontent" class="container">
	<div class="row content">
	
			<form id="usersform" action="" method="post">

			<div class="col-lg-6 pull-right" style="padding:20px 20px;  text-align: right;"><input class="form-control"type="hidden" value="" name="pubpesquisar" placeholder="Search" /></div>
			
			<div id="usersarea" class="panel-body">
										
			</div>
										
			</form>


									<table class="table datatable table-striped" id="datatable">
                                        <thead>
                                            <tr>
                                                <th align="right" style="width:11%">Option</th>
												<th>Tahun data</th>
												<th>Lokasi</th>												
                                                <th class="hidden-sd hidden-xs">Tanggal Peta</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
										<?php if (count($tutupan)>0): ?>
                                            <?php foreach($tutupan as $pub): ?>
                                                <tr data-id="<?php echo $pub['id']; ?>">
													<?php
														if($pub['validated'] == 0){
													?>
                                                            <td class=""><a style="cursor:pointer;" class="removerutilizador" onclick="reject(<?=$pub['id']?>)"><span class="label label-danger">Tolak</span></a>|  <a style="cursor:pointer;" class="editstory" onclick="validate(<?=$pub['id']?>)"><span class="label label-warning">Validasi</span></a></td>
                                                            
													<?php
														}
														else{
													?>
															<td><a style="cursor:pointer;" class="removerutilizador"><span class="label label-danger">Hapus</span></a> <i>Tervalidasi</i></td>
													<?php
														}
													?>
                                                
													<td><?php echo $pub['tahun']; ?></td>
													<td><?php echo $pub['lokasi']; ?></td>											
                                                    <td class="hidden-sd hidden-xs"><?php echo $pub['tanggal']; ?></td>															
                                                </tr>       
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>



	</div>			
</div>

<script type='text/javascript'>
jQuery(document).ready(function($){
        
							$('#datatable').DataTable({
								
								dom: 'Bfrtip',
								buttons: [
									'csv','pdf'
								]
								
							}); // ini yang buat datatables nya ya   <<<--------
});
function reject(id){
		var result = confirm("Yakin ditolak?");
		if (result) {
			//Logic to delete the item
			// var p = $(this).find('input[name=pubpesquisar]').val();
						
			$.post("<?php echo base_url(); ?>admin/removedatatutupan", {
			i:id,
			<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'				
			},
			function(data){
				alert("Data Berhasil Ditolak.");
				location.reload();
			});
		}
}
function validate(id){
		var result = confirm("Data Sudah Valid??");
		if (result) {
			//Logic to delete the item
			// var p = $(this).find('input[name=pubpesquisar]').val();
						
			$.post("<?php echo base_url(); ?>admin/validatedatatutupan", {
			i:id,
			<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'				
			},
			function(data){
				alert("Data Berhasil Divalidasi.");
				location.reload();
			});
		}
}
</script>	

