<div class="container header">
<div class="pull-left row">
<h1 class="page_title_text">Data Indeks Kualitas Tutupan Lahan</h1>
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
                                                <th>ITH</th>
                                                <th>IKT</th>
                                                <th>IPH</th>
                                                <th>IKH</th>
                                                <th>IKBA</th>
												<th>IKTL</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                <?php if (count($sungai)>0): ?>

                                                       

                                                        <?php foreach($sungai as $pub): ?>
														

                                                        <tr data-id="<?php echo $pub['id']; ?>">
                                                            <td><?php echo $this->admin_model->get_nama_wilayah($pub['id_prov'])[0]['nama'];?></td>
                                                            <td><?php echo $pub['ith'];?></td>																											
                                                            <td><?php echo $pub['ikt'];?></td>																											
                                                            <td><?php echo $pub['iph'];?></td>																											
                                                            <td><?php echo $pub['ikh'];?></td>																											
                                                            <td><?php echo $pub['ika'];?></td>																											
                                                            <td><?php echo $pub['iktl'];?></td>																											
                                                        </tr>                                                        
                                                        
                                                        <?php endforeach; ?>
                                                        

                                                    <?php else: ?>

                                                    No Data Sungai.

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
</script>

