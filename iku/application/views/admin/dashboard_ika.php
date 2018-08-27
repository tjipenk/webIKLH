<div class="container header">
<div class="pull-left row">
<h1 class="page_title_text">Dashboard Perhitungan Indeks Kualitas Udara</h1>
</div>
<?php /*
<a href="<?php echo site_url('admin/add_data_udara'); ?>" style="float:right;">
	<br />
    <button type="button" class="btn btn-primary  hidden-sd hidden-xs style="margin-bottom:5px;">Tambah Data Stasiun</button>
</a>
*/ ?>
</div>
    
<div id="maincontent" class="container">
	<div class="row content">
	
			<form id="usersform" action="" method="post">

			<!--<div class="col-lg-6 pull-right" style="padding:20px 20px;  text-align: right;"><input class="form-control"type="text" value="" name="pubpesquisar" placeholder="Search" /></div>
			-->
			<div id="usersarea" class="panel-body">
										
			</div>
									
			</form>
			

			<table class="table datatable table-striped" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>Provinsi</th>
												<th>IKA <?php echo date("Y",strtotime("-2 year")); ?></th>
												<th>IKA <?php echo date("Y",strtotime("-1 year")); ?></th>
												<th>IKA <?php echo date("Y"); ?></th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                        <?php if (count($sungai)>0): ?>
                                                        <?php foreach($sungai as $pub): ?>
                                                        <tr data-id="<?php echo $pub['id_prov']; ?>">
                                                            <td><?php echo $pub['provinsi'];?></td>
                                                            <td><?php echo number_format($pub['iku2'], 2); ?></td>																						
                                                            <td><?php echo number_format($pub['iku1'], 2); ?></td>																						
                                                            <td><?php echo number_format($pub['iku'], 2); ?></td>																						
                                                        </tr>                                                        
                                                        
                                                        <?php endforeach; ?>
                                                        

                                                    <?php else: ?>

                                                    No Data Udara.

                                                    <?php endif; ?>
                                        </tbody>
                                    </table>
	</div>			
</div>
<script type='text/javascript'>
jQuery(document).ready(function($){
        
							$('#datatable').DataTable({
								stateSave: true,
								dom: 'Bfrtip',
								buttons: [
									'csv','pdf'
								]
								
							}); // ini yang buat datatables nya ya   <<<--------
});
</script>


