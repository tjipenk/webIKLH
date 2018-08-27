<?php
	$default = $this->option_model->get_value('appusernophoto');
	$size = 30;
?>
<table class="table">
                                        <thead>
                                            <tr>
                                                <th class="hidden hidden-sd hidden-xs" colspan="2" align="right">Option</th>
                                                
                                                <th>Lokasi</th>
                                                <th>Tanggal</th>
                                                <th>TSS</th>
												<th>DO</th>
												<th>BOD</th>
												<th>COD</th>
												<th>T-F</th>
												<th>Fecal Coli</th>
												<th>Total Coli</th>
												<th>IKA</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                                        <?php if (count($sungai)>0): ?>

                                                        

                                                        <?php foreach($sungai as $pub): ?>


                                                        <tr data-id="<?php echo $pub['id_udara']; ?>">
                                                            <th class="hidden hidden-sd hidden-xs"><a style="cursor:pointer;" class="removerutilizador"><span class="label label-danger">Hapus</span></a></th>
                                                            <th class="hidden hidden-sd hidden-xs"><a style="cursor:pointer;" class="editstory" href="<?php echo base_url(); ?>input/editsungai/<?php echo $pub['id_udara']; ?>"><span class="label label-warning">Edit</span></a></th>
                                                            <td><?php echo $pub['lokasi']; ?></td>
                                                            <td><?php echo $pub['tanggal']; ?></td>
                                                            <td><?php echo $pub['so2'];?></td>
                                                            <td><?php echo $pub['no2'];?></td>																				
                                                            <td><?php echo $pub['bod'];?></td>																				
                                                            <td><?php echo $pub['cod'];?></td>																				
                                                            <td><?php echo $pub['tf'];?></td>																				
                                                            <td><?php echo $pub['fcoli'];?></td>
                                                            <td><?php echo $pub['tcoli'];?></td>																				
                                                            																				
                                                            <td><?php echo ($this->admin_model->hitung_iku($pub['id_udara'])['iku'] ); ?></td>															
                                                        </tr>                                                        
                                                        
                                                        <?php endforeach; ?>
                                                        

                                                    <?php else: ?>

                                                    No Data Udara.

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
				
				
				$.post("<?php echo base_url(); ?>admin/removeParUdara", {
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