<div class="container header">
<div class="pull-left row">
<h1 class="page_title_text">Data Indeks Kualitas Tutupan Lingkungan Hidup</h1>
<h1 class="page_title_text">Tahun <?php echo $this->uri->segment('3'); ?></h1>
</div>
<?php /*
<a href="<?php echo site_url('admin/add_data_sungai'); ?>" style="float:right;">
	<br />
    <button type="button" class="btn btn-primary  hidden-sd hidden-xs style="margin-bottom:5px;">Tambah Data Stasiun</button>
</a>
*/ ?>
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
                                                <th>Provinsi</th>
                                                <th>IKA</th>
                                                <th>IKU</th>
                                                <th>IKTL</th>
                                                <th>IKLH</th>

                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php if (count($sungai)>0): ?>

                                                       

                                                        <?php foreach($sungai as $pub): ?>
														

                                                        <tr data-id="<?php echo $pub['id']; ?>">
                                                            <td><?php echo $this->admin_model->get_nama_wilayah($pub['id_prov'])[0]['nama'];?></td>
                                                            <td><?php echo $pub['ika'];?></td>																											
                                                            <td><?php echo $pub['iku'];?></td>																											
                                                            <td><?php echo $pub['iktl'];?></td>																											
                                                            <td><?php echo $pub['iklh'];?></td>																																																				
                                                        </tr>                                                        
                                                        
                                                        <?php endforeach; ?>
                                                        

                                                    <?php else: ?>

                                                    No Data Sungai.

                                                <?php endif; ?>
                                                       <tr data-id="<?php echo 0; ?>">
                                                            <td><?php echo $this->admin_model->get_nama_wilayah(0)[0]['nama'];?></td>
                                                            <td><?php echo number_format($nasional['ika'], 2); ?></td>																						
                                                            <td><?php echo number_format($nasional['iku'], 2); ?></td>																						
                                                            <td><?php echo number_format($nasional['iktl'], 2); ?></td>																										
                                                            <td><?php echo number_format($nasional['iklh'], 2); ?></td>																										
                                                        </tr>      


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
</script>

