
									<table class="" id="datatable">
                                        <thead>
                                            <tr>
                                                <th align="right">Option</th>
                                                <th>Provinsi</th>
                                                <th>Kab/Kota</th>
                                                <th>Peruntukan</th>
                                                <th>Tanggal</th>
                                                <th>SO<sup>2</sup></th>
												<th>NO<sup>2</sup></th>
			
												<th>IKU</th>
                                                

                                            </tr>
                                        </thead>
                                        <tbody>
                                            
										<?php if (count($sungai)>0): ?>
                                            <?php foreach($sungai as $pub): ?>
                                                <tr data-id="<?php echo $pub['id_udara']; ?>">
													<?php
														if($pub['validated'] == 0){
													?>
                                                            <td class=""><a style="cursor:pointer;" class="removerutilizador" onclick="reject(<?=$pub['id_udara']?>)"><span class="label label-danger">Tolak</span></a> | <a style="cursor:pointer;" class="editstory" onclick="validate(<?=$pub['id_udara']?>)"><span class="label label-warning">Validasi</span></a></td>
                                                            
													<?php
														}
														else{
													?>
															<td><i>Tervalidasi</i></td>
													<?php
														}
													?>
                                                            <td><?php echo $this->admin_model->get_nama_wilayah($pub['id_prov'])[0]['nama']; ?></td>
                                                            <td><?php echo $this->admin_model->get_nama_wilayah($pub['id_kab'])[0]['nama']; ?></td>
                                                            <td><?php echo $this->admin_model->get_peruntukan($pub['peruntukan']); ?></td>
                                                            <td><?php echo $pub['tanggal']; ?></td>
                                                            <td><?php echo $pub['so2'];?></td>
                                                            <td><?php echo $pub['no2'];?></td>																				
                                 																			
                                                            																				
                                                            <td><?php echo ($this->admin_model->hitung_iku($pub['id_udara'])['iku'] ); ?></td>															
                                                        </tr>        
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
	