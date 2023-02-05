
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Payment </h1>
                    </div>
					<div class="row">
						<button class="ml-3 mb-3 btn btn-lg btn-primary" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Add Payment</button>
					</div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Loan Reference No.</th>
                                            <th>Payee</th>
                                            <th>Amount</th>
                                            <th>Penalty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$tbl_payment=$db->conn->query("SELECT * FROM `payment` INNER JOIN `loan` ON payment.loan_id=loan.loan_id");
											$i=1;
											while($fetch=$tbl_payment->fetch_array()){
										?>
											<tr>
												<td><?php echo $i++?></td>
												<td><?php echo $fetch['ref_no']?></td>
												<td><?php echo $fetch['payee']?></td>
												<td><?php echo "Ksh.".number_format($fetch['pay_amount'], 2)?></td>
												<td><?php echo "Ksh. ".number_format($fetch['penalty'], 2)?></td>
											</tr>
										
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
	
	
	<!-- Add Loan Modal-->
	<div class="modal fade" id="addModal" aria-hidden="true">
		<div class="modal-dialog">
			<form method="POST" action="save_payment.php">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Payment Form</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-xl-5 col-md-5">
								<label>Reference no</label>
								<br />
								<select name="loan_id" class="ref_no" id="ref_no" required="required" style="width:100%;">
									<option value=""></option>
									<?php
										$tbl_loan=$db->display_loan();
										while($fetch=$tbl_loan->fetch_array()){
											if($fetch['status'] == 2){
									?>
										<option value="<?php echo $fetch['loan_id']?>"><?php echo $fetch['ref_no']?></option>
									<?php
											}
										}
									?>
								</select>
							</div>
						</div>
						<div id="formField"></div>
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
                    <h5 class="modal-title text-white">Warning!</h5>
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
    <script src="js/select2.js"></script>


	<!-- Page level plugins -->
	<script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
	

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>
	
	<script>
		
		$(document).ready(function() {
			
			$('#dataTable').DataTable();
			
			$('.ref_no').select2({
				placeholder: 'Select an option'
			});
			
			$('#ref_no').on('change', function(){
				if($('#ref_no').val()== ""){
					$('#formField').empty();
				}else{
					$('#formField').empty();
					$('#formField').load("get_field.php?loan_id="+$(this).val());
				}
			});
		});
	</script>

</body>

</html>