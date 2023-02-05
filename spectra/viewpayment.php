<?php require_once'spectraheader.php'; ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">CUSTOMER PAYMNETS</h1> <h style="color:purple;">ATTEND THIS PAGE IMMEDIATELY THE CUSTOMER PAYS:</h>
                    </div>
					<button class="mb-2 btn btn-lg btn-success" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Add  Payment</button> 
                    <!-- DataTales Example --><h style="color:brown;"><b>TOTAL CASH:</b></h>
					<?php
											//$tbl_payment=$db->display_payment();
											
											//while($fetch=$tbl_payment->fetch_array()){ 
										//echo $fetch['spectra']; }?> 

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Loan refno</th>
                                            <th> Total Amount paid</th>
                                            <th>Mpesa Code</th>
                                            <th style="color:violet;">Place of payment</th>
                                            <th>Did they Default(yes/no)</th>
                                            <th>Served by:</th>
											<th>Loan Item</th>

											
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$tbl_payment=$db->display_payment();
											
											while($fetch=$tbl_payment->fetch_array()){
										?>
										
                                        <tr>
                                            <td><?php echo $fetch['name']?></td>
                                            <td><?php echo $fetch['refno']?></td>
                                            <td><?php echo $fetch['amountpaid']?></td>
                                            <td><?php echo $fetch['mpesacode']?></td>
                                            <td><?php echo $fetch['place']?></td>
                                            <td><?php echo $fetch['default']?></td>
                                            <td><?php echo $fetch['item']?></td>
											<td><?php echo $fetch['servant']?></td>

                                            <td>
												<div class="dropdown">
													<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Action
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item bg-warning text-white" href="#" data-toggle="modal" data-target="#updatepayment<?php echo $fetch['payment_id']?>">Edit</a>
														<a class="dropdown-item bg-danger text-white" href="#" data-toggle="modal" data-target="#deletepayment<?php echo $fetch['payment_id']?>">Delete</a>
													</div>
												</div>
											</td>
                                        </tr>
										
										
										<!-- Update User Modal -->
										<div class="modal fade" id="updatepayment<?php echo $fetch['payment_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<form method="POST" action="updatepayment.php">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<h5 class="modal-title text-white">Edit payee</h5>
															<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Name</label>
																<input type="text" name="name" value="<?php echo $fetch['name']?>" class="form-control" required="required" />
																<input type="hidden" name="payment_id" value="<?php echo $fetch['payment_id']?>"/>
															</div>
															<div class="form-group">
																<label>Amount</label>
																<input type="text" name="amountpaid" value="<?php echo $fetch['amountpaid']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label>refno</label>
																<input type="text" name="refno" value="<?php echo $fetch['refno']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label>mpesa code</label>
																<input type="text" name="mpesacode" value="<?php echo $fetch['mpesacode']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label>Place of payment</label>
																<input type="text" name="place" value="<?php echo $fetch['place']?>" class="form-control" placeholder="room,hotel,pub,etc"   required="required" />
															</div>
															<div class="form-group">
																<label>default(yey/no)</label>
																<input type="text" name="default" value="<?php echo $fetch['default']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label> Security Item</label>
																<input type="text" name="item" value="<?php echo $fetch['item']?>" class="form-control" required="required" maxlength="50"/>
															</div>
															<div class="form-group">
																<label> Who served</label>
																<input type="text" name="servant"  value="<?php echo $fetch['servant']?>" class="form-control" required="required" />
															</div>
															

											
														
														<div class="modal-footer">
															<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
															<button type="submit" name="update" class="btn btn-warning">Update</a>
														</div>
													</div>
												</form>
											</div>
										</div>
										
										
										
										<!-- Delete User Modal -->
										
                                        <div class="modal fade" id="deletepayment<?php echo $fetch['payment_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header bg-danger">
														<h5 class="modal-title text-white">System Information</h5>
														<button class="close" type="button" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">Are you sure you want to delete payment?</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
														<a class="btn btn-danger" href="deletepayment.php?payment_id=<?php echo $fetch['payment_id']?>">Delete</a>
													</div>
												</div>
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
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="stocky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
					<span>Copyright &copy; Spectraloans @
<a  href =" portfolio/web/index.html" style="color:purple;"><b>victormuasya</b></a> <?php echo date("Y")?></span>

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
	
	
	<!-- Add User Modal-->
	<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<form method="POST" action="save_payment.php">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Add payment</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>payee name</label>
							<input type="text" name="name" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Amount</label>
							<input type="text" name="amountpaid" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Loan refno</label>
							<input type="text" name="refno" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Mpesa codes</label>
							<input type="text" name="mpesacode" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Place of payment</label>
							<input type="text" name="place" class="form-control" placeholder="mwangaza, peacock,hostel,my room,etc"   required="required" />
						</div>
						<div class="form-group">
							<label>Did they default? (yes/no)</label>
							<input type="text" name="default" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Security item</label>
							<input type="item" name="item"  class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Served by:</label>
							<input type="text" name="servant" class="form-control" required="required" maxlength="30"/>
						</div>
						
						

					
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button type="submit" name="save" class="btn btn-primary">Save</a>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white">Warning</h5>
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


	<!-- Page level plugins -->
	<script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
	

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>
	
	<script>
		$(document).ready(function() {
			$('#dataTable').DataTable({
				"order": [[2 , "asc" ]]
			});
		});
	</script>

</body>

</html>