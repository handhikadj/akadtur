	      <!-- block -->
                        <div class="block" id="search_class">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><strong>Cari Kelas</strong></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" action="search_class.php">	
										<div class="control-group">
											<label>Tahun Ajaran:</label>
                                          <div class="controls">
                                            <select name="school_year"  class="span8" required>
                                             	<option></option>
											<?php
											$query = mysqli_query($db, "select * from school_year order by school_year DESC");
											while($row = mysqli_fetch_array($query)){
											
											?>
											<option><?php echo $row['school_year']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="search" class="btn btn-info"><i class="icon-search"></i> Cari</button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->