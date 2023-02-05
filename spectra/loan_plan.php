<?php require_once'spectraheader.php'; ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Loan Plan
						<h  style="font-size:20px;">We are having one loan type as for now</h> 

						</h1>              

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
									<form method="POST" action="save_lplan.php">
										<div class="form-group">
											<label>Plan(daily)</label>
											<select name="" class="" id="" required="required" style="width:100%;" placeholder="">
									<option value="">Choose plan</option>	
									<option value="" name="">21 days</option>
									<option value="" name="">other plans not available</option>
									<input type="hidden" value="21" name="lplan_month"/>	
										</select>
										</div>


										<div class="i-group">
											<label>Formula</label>
											<div class="input-group">
								<select name="formula"  required="required" style="width:100%;color:green;" placeholder="">
									<option value="">Choose formula</option>	
									<option value="i[%]= [–3P÷4000] + 5.75" name="formula" style="color:blue;">i[%]= [–3P÷4000] + 5.75</option>
									<option value="i[%]= [–3P÷4000] + 5.75" name="formula" style="color:blue;">i[%]= [–3P÷4000] + 5.75</option>
									<option value="" name="" style="color:red;">One formula available currently</option>										
			                     </select>
										</div> 
										</div>



										<div class="i-group">
											<label>Principal (P)</label>
											<div class="input-group">
											<select name="lplan_interest"  required="required" style="width:100%;" placeholder="">
									<option value="">Choose Principal</option>	
									<option value="5"  name="" >Ksh.1000 </option>
									<option value="4.625" name="">Ksh.1500</option>
									<option value="4.25" name="">Ksh.2000</option>
									<option value="3.875" name="">Ksh.2500</option>
									<option value="3.5" name="">Ksh.3000</option>
									<option value="3.125" name="">Ksh.3500</option>
									<option value="2.75" name="">Ksh.4000</option>
									<option value="2.375" name="">Ksh.4500</option>
									<option value="2" name="">Ksh.5000</option>
										</select>
										</div>
										</div>


										<div class="form-group">
											<label> Overdue Penalty (after 21 days) </label>
											<div class="input-group">
												<select name="lplan_penalty"  required="required" style="width:100%;" placeholder="">
									<option value="">Choose Penalty interest</option>	
									<option value="1" name="">1 %</option>
									<option value="" name="">No other penalty interest</option>
                                              </select>
										</div>
										</div>
										<button type="submit" class="btn btn-primary btn-block" name="save">Save</button>
									</form>
                                </div>
                            </div>
                        </div>

						<div class="col-xl-9  mb-4">
                            <div class="card">
                                <div class="card-body">
									 <div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Loan Plan (Days)</th>
												<th>Interest(%) per day</th>
												<th>When The Principal is:</th>
												<th>Overdue Penalty interest (after 21 days)(%)</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$tbl_lplan=$db->display_lplan();
												while($fetch=$tbl_lplan->fetch_array()){
											?>
											<tr>
												<td><?php echo $fetch['lplan_month']?> Days</td>
												<td> <b><?php echo $fetch['lplan_interest']?></b></td>
												<td> <b><?php echo ($fetch['lplan_interest'] -5.75)*4000/-3?></b></td>

												<td><?php echo $fetch['lplan_penalty']?> % extra on top of initial agreed rate.</td>
												<td>
													<div class="dropdown">
														<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															Action
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item bg-warning text-white" href="#" data-toggle="modal" data-target="#updatelplan<?php echo $fetch['lplan_id']?>">Edit</a>
															<a class="dropdown-item bg-danger text-white" href="#" data-toggle="modal" data-target="#deletelplan<?php echo $fetch['lplan_id']?>">Delete</a>
														</div>
													</div>
												</td>
											</tr>
											
											
											<!-- Delete Loan Plan Modal -->
										
											<div class="modal fade" id="deletelplan<?php echo $fetch['lplan_id']?>" tabindex="-1" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header bg-danger">
															<h5 class="modal-title text-white">Warning</h5>
															<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">Are you sure you want to delete this record?</div>
														<div class="modal-footer">
															<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
															<a class="btn btn-danger" href="delete_lplan.php?lplan_id=<?php echo $fetch['lplan_id']?>">Delete</a>
														</div>
													</div>
												</div>
											</div>
											
											<!-- Update Loan Type Modal -->
											<div class="modal fade" id="updatelplan<?php echo $fetch['lplan_id']?>" tabindex="-1" aria-hidden="true">
												<div class="modal-dialog">
													<form method="POST" action="update_lplan.php">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title text-white">Edit Loan Plan</h5>
																<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="form-group">
																	<label>loan plan</label>
																	<input type="hidden" value="<?php echo $fetch['lplan_id']?>" name="lplan_id"/>

																	<select name="lplan_month" class="" id="" required="required" style="width:100%;" placeholder="">
									<option value="">Choose plan</option>	
									<option value="21" name="lplan_month">21 days</option>
									<option value="" name="">other plans not available</option>
										</select>

																</div>
																<div class="i-group">
																	<label>Principal</label>
																	<div class="input-group">
																	<select name="lplan_interest"  required="required" style="width:100%;" placeholder="">
									<option value="">Choose Principal</option>	
									<option value="5"  name="" >Ksh.1000 </option>
									<option value="4.625" name="">Ksh.1500</option>
									<option value="4.25" name="">Ksh.2000</option>
									<option value="3.875" name="">Ksh.2500</option>
									<option value="3.5" name="">Ksh.3000</option>
									<option value="3.125" name="">Ksh.3500</option>
									<option value="2.75" name="">Ksh.4000</option>
									<option value="2.375" name="">Ksh.4500</option>
									<option value="2" name="">Ksh.5000</option>
										</select>
																	
																</div></div>
																<div class="form-group">
																	<label>Monthly Overdue Penalty</label>
																	<div class="input-group">
																	<select name="lplan_penalty"  required="required" style="width:100%;" placeholder="">
									<option value="">Choose Penalty interest</option>	
									<option value="1" name="">1 %</option>
									<option value="" name="">No other penalty interest</option>
												</select>																		
																	
																</div>
															</div>

															<div class="form-group">
																	<label>Formula</label>
																	<div class="input-group">
																	<select name="formula"  required="required" style="width:100%;" placeholder="">
									<option value="">Choose Formula</option>	
									<option value="i[%]= [–3P÷4000] + 5.75" name="">i[%]= [–3P÷4000] + 5.75</option>
									<option value="" name="">No other formula formulated</option>
												</select>																		
																	
																</div>
															</div>
															<div class="modal-footer">
																<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																<button type="submit" name="update" class="btn btn-warning">Update</a>
															</div>
														</div>
													</form>
												</div>
											</div>
											
											<?php
												}
											?>
										</tbody>
										</table>
									</div>
                            </div>
                        </div>        
                    </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="stocky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
					<span>Copyright &copy; <a  href =" portfolio/web/index.html" style="color:black;"><b>victormuasya</b></a> <?php echo date("Y")?></span>

                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">System Information</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
	
    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>
	
	<!-- Page level plugins -->
	<script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
	
	<script>
		$(document).ready(function() {
			$('#dataTable').DataTable({
				"order": [[1 , "asc" ]]
			});
		});
	</script>

</body>

</html>