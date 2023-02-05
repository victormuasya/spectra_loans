

<?php require_once'spectraheader.php'; ?>    

                
				<?php require_once'spectraheader.php'; ?>    


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Loan List</h1>
                    </div>
					<button class="mb-2 btn btn-lg btn-success" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Create new Loan Application</button>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Borrower</th>
                                            <th>Loan Detail</th>
                                            <th>Payment Detail</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$tbl_loan=$db->display_loan();
											$i=1;
											while($fetch=$tbl_loan->fetch_array()){
										?>
										
                                        <tr>
											<td><?php echo $i++;?></td>
											<td>
												<p><small>Name: <strong><?php echo $fetch['lastname'].", ".$fetch['firstname']." ".substr($fetch['middlename'], 0, 1)."."?></strong></small></p>
												<p><small>Phone no: <strong><?php echo $fetch['contact_no']?></strong></small></p>
												<p><small>To pay on: <strong><?php echo $fetch['payment']?></strong></small></p>
												<p><small>REG no: <strong><?php echo $fetch['regno']?></strong></small></p>
												<p><small>Hostel/House: <strong><?php echo $fetch['hostel']?></strong></small></p>
												<p><small>Security Item: <strong><?php echo $fetch['security']?></strong></small></p>
												<p><small>Mpesa Ref.no : <strong><?php echo $fetch ['mpesa']?></strong></small></p>
												<p><small>Place of issue: <strong><?php echo $fetch['place']?></strong></small></p>

											</td>
											<td>
												<p><small>Reference no: <strong><?php echo $fetch['ref_no']?></strong></small></p>
												<p><small>Loan Type: <strong><?php echo $fetch['ltype_name']?></strong></small></p>
												<p><small>Loan Plan: <strong><?php echo $fetch['lplan_month']." months[".$fetch['lplan_interest']."%, ".$fetch['lplan_penalty']."%]"?></strong> interest, penalty</small></p>
												<?php
													$monthly =($fetch['amount'] * ($fetch['lplan_interest'] /100)) ;//($fetch['amount'] + )
				
													$penalty= ($fetch['amount']*($fetch['lplan_penalty'] + $fetch['lplan_interest'])*7/100);
													$totalAmount=$fetch['amount']+$monthly;
												?>
												<p><small>Amount: <strong><?php echo "Kshs. ".number_format($fetch['amount'], 2)?></strong></small></p>
												<p><small>  Daily interest: <strong><?php echo "Kshs. ".number_format($monthly, 2)?></strong></small></p>
												<p><small>penalty daily interest: <strong><?php echo "Kshs. ".number_format($penalty/7, 2)?></strong></small></p>
												<?php
													if (preg_match('/[1-9]/', $fetch['date_released'])){ 
														echo '<p><small>Date Released: <strong>'.date("M d, Y", strtotime($fetch['date_released'])).'</strong></small></p>';
													}
												?>
												
											</td>
											<td>
												<?php
													//$payment=$db->conn->query("SELECT * FROM `payment` WHERE `loan_id`='$fetch[loan_id]'") or die($this->conn->error);
													//$paid = $payment->num_rows;
													//$offset = $paid > 0 ? " offset $paid ": "";
													//ASC limit 1 $offset - to insert next to due_date
													
													if($fetch['status'] == 2){
														$next = $db->conn->query("SELECT * FROM `loan_schedule` WHERE `loan_id`='$fetch[loan_id]' ORDER BY date(due_date)  ")->fetch_assoc()['due_date'];
														//$add = (date('Ymd',strtotime($next)) < date("Ymd") ) ?  $penalty : 0;
														echo "<p><small>Borrower Agreed to pay before: <br /><strong>21 days</strong></small></p>";
														echo "<p><small> The Total interest in 21 days will be: <br /><strong>Kshs. ".number_format(($monthly )*21 , 2)."</strong></small></p>";
														echo "<p><small>Penalty(7days after grace period) will be: <br /><strong>Kshs. ".$penalty."</strong></small></p>";
														echo "<p><small>Total payable Amount with defaulting : <br /><strong>Kshs. ".number_format($penalty+ (($monthly )*21 + $fetch['amount']), 2)."</strong></small></p>";
														echo "<p><small>Total payable Amount without defaulting : <br /><strong>Kshs. ".number_format ((($monthly )*21 + $fetch['amount']), 2)."</strong></small></p>";

													}
												?>
											</td>
											<td>
												<?php 
													if($fetch['status']==0){
														echo '<span class="badge badge-warning">Waiting Approval</span>';
													}else if($fetch['status']==1){
														echo '<span class="badge badge-info">Approved</span>';
													}else if($fetch['status']==2){
														echo '<span class="badge badge-primary">Released</span>';
													}else if($fetch['status']==3){
														echo '<span class="badge badge-success">Completed</span>';
													}else if($fetch['status']==4){
														echo '<span class="badge badge-danger">Denied</span>';
													}
													
												?>
											</td>
                                            <td>
												<?php 
													if($fetch['status']==2){
												?>
													<button class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#viewSchedule<?php echo $fetch['loan_id']?>">View </button>
												<?php
													}else if($fetch['status']==3){
												?>
													<button class="btn btn-lg btn-success" readonly="readonly">COMPLETED</button>
												<?php
													}else{
												?>
													<div class="dropdown">
														<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															Action
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item bg-warning text-white" href="#" data-toggle="modal" data-target="#updateloan<?php echo $fetch['loan_id']?>">Edit</a>
															<a class="dropdown-item bg-danger text-white" href="#" data-toggle="modal" data-target="#deleteborrower<?php echo $fetch['loan_id']?>">Delete</a>
														</div>
													</div>
												<?php
													}
												?>
											</td>
                                        </tr>
										
										
										<!-- Update User Modal -->
										<div class="modal fade" id="updateloan<?php echo $fetch['loan_id']?>" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<form method="POST" action="updateLoan.php">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<h5 class="modal-title text-white">Edit Loan (release loan)</h5>
															<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="form-row">
																<div class="form-group col-xl-6 col-md-6">
																	<label>Borrower</label>
																	<br />
																	<input type="hidden" value="<?php echo $fetch['loan_id']?>" name="loan_id"/>
																	<select name="borrower" class="borrow" required="required" style="width:100%;">
																		<?php
																			$tbl_borrower=$db->display_borrower();
																			while($row=$tbl_borrower->fetch_array()){
																		?>
																			<option value="<?php echo $row['borrower_id']?>" <?php echo ($fetch['borrower_id']==$row['borrower_id'])?'selected':''?>><?php echo $row['lastname'].", ".$row['firstname']." ".substr($row['middlename'], 0, 1)?>.</option>
																		<?php
																			}
																		?>
																	</select>
																</div>
																<div class="form-group col-xl-6 col-md-6">
																	<label>Loan type</label>
																	<br />
																	<select name="ltype" class="loan" required="required" style="width:100%;">
																		<?php
																			$tbl_ltype=$db->display_ltype();
																			while($row=$tbl_ltype->fetch_array()){
																		?>
																			<option value="<?php echo $row['ltype_id']?>" <?php echo ($fetch['ltype_id']==$row['ltype_id'])?'selected':''?>><?php echo $row['ltype_name']?></option>
																		<?php
																			}
																		?>
																	</select>
																</div>
															</div>
															<div class="form-row">
																<div class="form-group col-xl-6 col-md-6">
																	<label>Loan Plan</label>
																	<select name="lplan" class="form-control" required="required" id="ulplan">
																		<?php
																			$tbl_lplan=$db->display_lplan();
																			while($row=$tbl_lplan->fetch_array()){
																		?>
																			<option value="<?php echo $row['lplan_id']?>" <?php echo ($fetch['lplan_id']==$row['lplan_id'])?'selected':''?>><?php echo $row['lplan_month']." Days[".$row['lplan_interest']."%, ".$row['lplan_penalty']."%]"?></option>
																		<?php
																			}
																		?>
																	</select>
																	<label>Days[Interest%, Penalty%]</label>
																</div>
																<div class="form-group col-xl-6 col-md-6" class="i-group">
																	<label>Loan Amount</label>
																	<!--<div class="input-group">
													
										<select name="loan_amount"  id="uamount" value="<?php echo $fetch['share']?>" required="required" style="width:100%;color:red;" placeholder="">
									<option value="">Choose amount again!</option>	
									<option value="1000" name="" style="color:blue;">1000 - 5%</option>
									<option value="1500" name="" style="color:blue;">1500 - 4.625%</option>
									<option value="2000" name="" style="color:blue;">2000 - 4.25%</option>
									<option value="2500" name="" style="color:blue;">2500 - 3.875%</option>
									<option value="3000" name="" style="color:blue;">3000 - 3.5%</option>
									<option value="3500" name="" style="color:blue;">3500 - 3.125%</option>
									<option value="4000" name="" style="color:blue;">4000 - 2.75%</option>
									<option value="4500" name="" style="color:blue;">4500 - 2.375%</option>
									<option value="5000" name="" style="color:blue;">5000 - 2%</option>

			                     </select>-->
																	<input type="number" name="loan_amount" class="form-control" id="uamount" value="<?php echo $fetch['amount']?>" required="required" >
																
																</div>

															</div>
															<div class="form-row">
																<div class="form-group col-xl-6 col-md-6">
																	<label>Purpose</label>
																	<textarea name="purpose" class="form-control" style="resize:none; height:200px;" required="required"><?php echo $fetch['purpose']?></textarea>
																</div>
																<div class="form-group col-xl-6 col-md-6">
																	<button type="button" class="btn btn-primary btn-block" id="updateCalculate">Calculate Amount</button>
																</div>
															</div>
															<hr>
															<div class="row" >
																<div class="col-xl-4 col-md-4">
																	<center><span>Total Payable Amount (21days)</span></center>
																	<center><span id="utpa"><?php echo "Ksh. ".number_format((($totalAmount -$fetch['amount'])*21)+$fetch['amount'], 2)?></span></center>
																</div>
																<div class="col-xl-4 col-md-4">
																	<center><span>Daily Payable Amount</span></center>
																	<center><span id="umpa"><?php echo "Ksh. ".number_format($monthly, 2)?></span></center>
																</div>
																<div class="col-xl-4 col-md-4">
																	<center><span>Daily Penalty Amount(after 21 days)</span></center>
																	<center><span id="upa"><?php echo "Ksh. ".number_format($penalty/7, 2)?></span></center>
																</div>
															</div>
															<hr>
															<div class="form-row">
																<div class="form-group col-xl-6 col-md-6">
																	<label>Status</label>
																	<select class="form-control" name="status">
																		<?php
																			if($fetch['status']==4){
																		?>
																			<option value="0" <?php echo ($fetch['status']==0)?'selected':''?>>For Approval</option>
																			<option value="1" <?php echo ($fetch['status']==1)?'selected':''?>>Approved</option>
																			<option value="4" <?php echo ($fetch['status']==4)?'selected':''?>>Denied</option>
																		<?php
																			}else if($fetch['status']==2){
																		?>
																			<option value="2" readonly="readonly">Released</option>
																		<?php
																			}else{
																		?>
																			<option value="0" <?php echo ($fetch['status']==0)?'selected':''?>>For Approval</option>
																			<option value="1" <?php echo ($fetch['status']==1)?'selected':''?>>Approved</option>
																			<option value="2" <?php echo ($fetch['status']==2)?'selected':''?>>Released</option>
																			<option value="4" <?php echo ($fetch['status']==4)?'selected':''?>>Denied</option>
																		<?php
																			}
																		?>
																	</select>
																</div>
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
										
										
										
										<!-- Delete Loan Modal -->
										
										<div class="modal fade" id="deleteborrower<?php echo $fetch['loan_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header bg-danger">
														<h5 class="modal-title text-white">Warning!</h5>
														<button class="close" type="button" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">Are you sure you want to delete this record?</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
														<a class="btn btn-danger" href="deleteLoan.php?loan_id=<?php echo $fetch['loan_id']?>">Delete</a>
													</div>
												</div>
											</div>
										</div>
										
										<!-- View Payment Schedule 
										<div class="modal fade" id="viewSchedule<?php echo $fetch['loan_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header bg-info">
														<h5 class="modal-title text-white">Payment Schedule</h5>
														<button class="close" type="button" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-md-5 col-xl-5">
																<p>Reference No:</p>
																<p><strong><?php echo $fetch['ref_no']?></strong></p>
															</div>
															<div class="col-md-7 col-xl-7">
																<p>Name:</p>
																<p><strong><?php echo $fetch['firstname']." ".substr($fetch['middlename'], 0, 1).". ".$fetch['lastname']?></strong></p>
															</div>
														</div>
														<hr />
														
														<div class="container">
															<div class="row">
																<div class="col-sm-6"><center>Days</center></div>
																<div class="col-sm-6"><center>Daily Payment</center></div>
															</div>
															<hr />
															<?php 
																$tbl_schedule=$db->conn->query("SELECT * FROM `loan_schedule` WHERE `loan_id`='".$fetch['loan_id']."'");
																
																while($row=$tbl_schedule->fetch_array()){
															?>
															<div class="row">
																<div class="col-sm-6 p-2 pl-5" style="border-right: 1px solid black; border-bottom: 1px solid black;"><strong><?php echo date("F d, Y" ,strtotime($row['due_date']));?></strong></div>
																<div class="col-sm-6 p-2 pl-5" style="border-bottom: 1px solid black;"><strong><?php echo "Kshs. ".number_format($monthly, 2); ?></strong></div>
															</div>
																<?php
																}
															?>
														
														</div>	
													</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										
										
										
										-->
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
                        <span>Copyright &copy; 
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
		<div class="modal-dialog modal-lg">
			<form method="POST" action="save_loan.php">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Loan Application (start with amount)</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-row">
							<div class="form-group col-xl-6 col-md-6">
								<label>Borrower</label>
								<br />
								<select name="borrower" class="borrow" required="required" style="width:100%;">
									<option value=""></option>
									<?php
										$tbl_borrower=$db->display_borrower();
										while($fetch=$tbl_borrower->fetch_array()){
									?>
										<option value="<?php echo $fetch['borrower_id']?>"><?php echo $fetch['lastname'].", ".$fetch['firstname']." ".substr($fetch['middlename'], 0, 1)?>.</option>
									<?php
										}
									?>
								</select>
							</div>
							<div class="form-group col-xl-6 col-md-6">
								<label>Loan type</label>
								<br />
								<select name="ltype" class="loan" required="required" style="width:100%;">
										<option value=""></option>
									<?php
										$tbl_ltype=$db->display_ltype();
										while($fetch=$tbl_ltype->fetch_array()){
									?>
										<option value="<?php echo $fetch['ltype_id']?>"><?php echo $fetch['ltype_name']?></option>
									<?php
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-xl-6 col-md-6">
								<label>Loan Plan</label>
								<select name="lplan" class="form-control" required="required" id="lplan">
										<option value="">Please select an option</option>
									<?php
										$tbl_lplan=$db->display_lplan();
										while($fetch=$tbl_lplan->fetch_array()){
									?>
										<option value="<?php echo $fetch['lplan_id']?>"><?php echo $fetch['lplan_month']." Days[".$fetch['lplan_interest']."%, ".$fetch['lplan_penalty']."%]"?></option>
									<?php
										}
									?>
								</select>
								<label>Days[Interest%, Penalty%]</label>
							</div>
							<div class="form-group col-xl-6 col-md-6">
							<label>Loan Amount</label>
																	<div class="input-group">
													
										<select name="loan_amount"  required="required" style="width:100%;color:green;" placeholder="">
									<option value="">Choose Amount</option>	
									<option value="1000" name="loan_amount" style="color:blue;">1000 - 5%</option>
									<option value="1500" name="loan_amount" style="color:blue;">1500 - 4.625%</option>
									<option value="2000" name="loan_amount" style="color:blue;">2000 - 4.25%</option>
									<option value="2500" name="loan_amount" style="color:blue;">2500 - 3.875%</option>
									<option value="3000" name="loan_amount" style="color:blue;">3000 - 3.5%</option>
									<option value="3500" name="loan_amount" style="color:blue;">3500 - 3.125%</option>
									<option value="4000" name="loan_amount" style="color:blue;">4000 - 2.75%</option>
									<option value="4500" name="loan_amount" style="color:blue;">4500 - 2.375%</option>
									<option value="5000" name="loan_amount" style="color:blue;">5000 - 2%</option>

			                     </select>
																</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-xl-6 col-md-6">
								<label>Why they applied for the loan?</label>
								<textarea name="purpose" class="form-control" style="resize:none; height:200px;" required="required"></textarea>
							</div>
							<div class="form-group col-xl-6 col-md-6">
								<button type="button" class="btn btn-primary btn-block" id="calculate">Calculate Amount</button>
							</div>
						</div>
						<hr>
						<div class="row" id="calcTable">
							<div class="col-xl-4 col-md-4">
								<center><span>Total Payable Amount On the approximated date of payment:</span></center>
								<center><span id="tpa"></span></center>
							</div>
							<div class="col-xl-4 col-md-4">
								<center><span>  Daily Interest will be:</span></center>
								<center><span id="mpa"></span></center>
							</div>
							<div class="col-xl-4 col-md-4">
								<center><span> Daily Penalty Amount will be:</span></center>
								<center><span id="pa"></span></center>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button type="submit" name="apply" class="btn btn-primary">Save</a>
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
			$("#calcTable").hide();
			
			
			$('.borrow').select2({
				placeholder: 'Select an option'
			});
			
			$('.loan').select2({
				placeholder: 'Select an option'
			});
			
			
			
			$("#calculate").click(function(){
				if($("#lplan").val() == "" || $("#amount").val() == ""){
					alert("Please enter a Loan Plan or Amount to Calculate")
				}else{
					var lplan=$("#lplan option:selected").text();
					var months=parseFloat(lplan.split('months')[0]);
					var splitter=lplan.split('months')[1];
					var findinterest=splitter.split('%')[0];
					var interest=parseFloat(findinterest.replace(/[^0-9.]/g, ""));
					var findpenalty=splitter.split('%')[1];
					var penalty=parseFloat(findpenalty.replace(/[^0-9.]/g, ""));
					
					var amount=parseFloat($("#amount").val());
					
					var monthly =(amount + (amount * (interest/100))) / months;
					var penalty=monthly * (penalty/100);
					var totalAmount=amount+monthly;
					
					
					
					$("#tpa").text("\Kshs."+totalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#mpa").text("\Kshs. "+monthly.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#pa").text("\Kshs."+penalty.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					
					$("#calcTable").show();
				}
				
			});
			
			
			$("#updateCalculate").click(function(){
				if($("#ulplan").val() == "" || $("#uamount").val() == ""){
					alert("Please enter a Loan Plan or Amount to Calculate")
				}else{
					var lplan=$("#ulplan option:selected").text();
					var months=parseFloat(lplan.split('months')[0]);
					var splitter=lplan.split('months')[1];
					var findinterest=splitter.split('%')[0];
					var interest=parseFloat(findinterest.replace(/[^0-9.]/g, ""));
					var findpenalty=splitter.split('%')[1];
					var penalty=parseFloat(findpenalty.replace(/[^0-9.]/g, ""));
					
					var amount=parseFloat($("#uamount").val());
					
					var monthly =(amount + (amount * (interest/100))) / months;
					var penalty=monthly * (penalty/100);
					var totalAmount=amount+monthly;
					
					
					
					$("#utpa").text("\Kshs. "+totalAmount.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#umpa").text("\Kshs. "+monthly.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					$("#upa").text("\Kshs. "+penalty.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2}));
					

				}
				
			});
			
			$('#dataTable').DataTable();
		});
	</script>

</body>

</html>