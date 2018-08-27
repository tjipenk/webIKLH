
<table class="table datatable table-striped" id="datatable">
                                        <thead>
                                            <tr>
                                                <th colspan="2" align="right">Option</th>
                                                <th></th>
                                                <th>Lokasi</th>
                                                <th>Tanggal</th>
                                                <th>TSS</th>
												<th>DO</th>
												<th>BOD</th>
												<th>COD</th>
												<th>T-F</th>
												<th>Fecal Coli</th>
												<th>Total Coli</th>
                                                <th>File</th>
												<th>IKA</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                        <?php if (count($sungai)>0): ?>

                                                        

                                                        <?php foreach($sungai as $pub): ?>


                                                        <tr data-id="<?php echo $pub['id_sungai']; ?>">
                                                            <?php if($pub['validated']==0) { ?>
															<th><a style="cursor:pointer;" class="removerutilizador"><span class="label label-danger">Hapus</span></a></th>
															<th><a style="cursor:pointer;" class="editstory" href="<?php echo base_url(); ?>lap_prov/editsungai/<?php echo $pub['id_sungai']; ?>"><span class="label label-warning">Edit</span></a></th>
                                                            <?php }
                                                            else { ?>
                                                                <th colspan="2"><strong>Verified</strong></th>
                                                            <?php }?>
                                                            <td><?php echo $pub['id_sungai']; ?></td>
															<td><?php echo $pub['kode_sungai'].'; '.$pub['lokasi']; ?></td>
                                                            <td><?php echo $pub['tanggal']; ?></td>
                                                            <td><?php echo $pub['tss'];?></td>
                                                            <td><?php echo $pub['do'];?></td>																				
                                                            <td><?php echo $pub['bod'];?></td>																				
                                                            <td><?php echo $pub['cod'];?></td>																				
                                                            <td><?php echo $pub['tf'];?></td>																				
                                                            <td><?php echo $pub['fcoli'];?></td>
                                                            <td><?php echo $pub['tcoli'];?></td>
                                                            <td align='center'><?php if($pub['file']=='kosong') { ?>
                                                                <strong>No File</strong>
                                                                <?php } else { ?>
                                                                <a href="<?php echo base_url(); ?>upload/<?php echo $pub['file']; ?>" target="_blank"><img src="<?php echo base_url(); ?>images/file-icon.png" height="30px" width="30px" alt="View Data" title="View Data"  /></a>
                                                                <?php } ?></td>																				
                                                            																				
                                                            <td align='center'><?php if($pub['validated']==0) {
                                                                echo "diverifikasi";
                                                            }
                                                            else {
                                                                echo ($this->lap_prov_model->hitung_ika($pub['id_sungai'])['ika']); 
                                                            }
                                                            ?></td>															
                                                        </tr>                                                        
                                                        
                                                        <?php endforeach; ?>
                                                        

                                                    <?php else: ?>

                                                    No Data Sungai.

                                                    <?php endif; ?>


                                        </tbody>
                                    </table>
									
<script type='text/javascript'>
jQuery(document).ready(function($){								

	jQuery('a.removerutilizador').click(function() 
	{
			if (confirm('Are you sure do you want delete?')) {
				var i = $(this).parent().parent().attr('data-id');
				$(this).parent().parent().remove();
				//alert (i);
				
				
				$.post("<?php echo base_url(); ?>lap_prov/removesungaidata", {
                i:i,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
                },
                function(data){
				});
				return false;			
			}			
	});
                                                        
});
</script>