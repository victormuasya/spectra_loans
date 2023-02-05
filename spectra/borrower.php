<?php require_once'spectraheader.php'; ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Borrower</h1>
                    </div>
					<button class="mb-2 btn btn-lg btn-success" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Add  Borrower</button>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Middlename</th>
                                            <th>Lastname</th>
                                            <th>Contact No</th>
                                            <th>Payment date</th>
                                            <th>Email</th>
                                            <th>ID no</th>
											<th>REG no</th>
                                            <th>Security Item</th>
                                            <th>Hostel/House</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$tbl_borrower=$db->display_borrower();
											
											while($fetch=$tbl_borrower->fetch_array()){
										?>
										
                                        <tr>
                                            <td><?php echo $fetch['firstname']?></td>
                                            <td><?php echo $fetch['middlename']?></td>
                                            <td><?php echo $fetch['lastname']?></td>
                                            <td><?php echo $fetch['contact_no']?></td>
                                            <td><?php echo $fetch['payment']?></td>
                                            <td><?php echo $fetch['email']?></td>
                                            <td><?php echo $fetch['idno']?></td>
											<td><?php echo $fetch['regno']?></td>
                                            <td><?php echo $fetch['security']?></td>
                                            <td><?php echo $fetch['hostel']?></td>

                                            <td>
												<div class="dropdown">
													<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Action
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item bg-warning text-white" href="#" data-toggle="modal" data-target="#updateborrower<?php echo $fetch['borrower_id']?>">Edit</a>
														<a class="dropdown-item bg-danger text-white" href="#" data-toggle="modal" data-target="#deleteborrower<?php echo $fetch['borrower_id']?>">Delete</a>
													</div>
												</div>
											</td>
                                        </tr>
										
										
										<!-- Update User Modal -->
										<div class="modal fade" id="updateborrower<?php echo $fetch['borrower_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<form method="POST" action="updateBorrower.php">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<h5 class="modal-title text-white">Edit Borrower</h5>
															<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Firstname</label>
																<input type="text" name="firstname" value="<?php echo $fetch['firstname']?>" class="form-control" required="required" />
																<input type="hidden" name="borrower_id" value="<?php echo $fetch['borrower_id']?>"/>
															</div>
															<div class="form-group">
																<label>Middlename</label>
																<input type="text" name="middlename" value="<?php echo $fetch['middlename']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label>Lastname</label>
																<input type="text" name="lastname" value="<?php echo $fetch['lastname']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label>Phone</label>
																<input type="tel" name="contact_no" value="<?php echo $fetch['contact_no']?>" class="form-control" placeholder="Eg.[0728334543]"   required="required" />
															</div>
															<div class="form-group">
																<label>Payment date:</label>
																<input type="text" name="payment" value="<?php echo $fetch['payment']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label>Email</label>
																<input type="email" name="email" value="<?php echo $fetch['email']?>" class="form-control" required="required" maxlength="30"/>
															</div>
															<div class="form-group">
																<label> ID no</label>
																<input type="number" name="idno" min="0" value="<?php echo $fetch['idno']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label> REG no (college admin number)</label>
																<input type="text" name="regno" min="0" value="<?php echo $fetch['regno']?>" class="form-control" required="required" />
															</div><div class="form-group">
																<label> Security Item</label>
																<input type="text" name="security" min="" value="<?php echo $fetch['security']?>" class="form-control" required="required" />
															</div><div class="form-group">
																<label> House/Hostel</label>
																<input type="text" name="hostel" min="" value="<?php echo $fetch['hostel']?>" class="form-control" required="required" />
															</div>
															<div class="form-group">
																<label> Mpesa Ref.no</label>
																<input type="text" name="mpesa" min="" value="<?php echo $fetch['mpesa']?>" class="form-control" required="required" />
															</div>

															<div class="form-group">
																<label> Place of issue</label>
																<input type="text" name="place" min="" value="<?php echo $fetch['place']?>" class="form-control" required="required" />
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
										
										<div class="modal fade" id="deleteborrower<?php echo $fetch['borrower_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header bg-danger">
														<h5 class="modal-title text-white">System Information</h5>
														<button class="close" type="button" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">Are you sure you want to delete this record?</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
														<a class="btn btn-danger" href="deleteBorrower.php?borrower_id=<?php echo $fetch['borrower_id']?>">Delete</a>
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
			<form method="POST" action="save_borrower.php">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Add Borrower</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Firstname</label>
							<input type="text" name="firstname" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Middlename</label>
							<input type="text" name="middlename" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="lastname" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" name="contact_no" class="form-control" placeholder="Eg.[0728334543]" patten="[0-9]{4} [0-9]{3} [0-9]{4}"  required="required" />
						</div>
						<div class="form-group">
							<label>Date to pay:</label>
							<input type="text" name="payment" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required="required" maxlength="30"/>
						</div>
						<div class="form-group">
							<label>ID no</label>
							<input type="number" name="idno" min="0" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>REG no</label>
							<input type="text" name="regno" min="0" class="form-control" required="required" />
						</div>						<div class="form-group">
							<label>Security</label>
							<input type="text" name="security" min="0" class="form-control" required="required" />
						</div>						<div class="form-group">
							<label>Hostel/House</label>
							<input type="text" name="hostel" min="0" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Mpesa Ref.no</label>
							<input type="text" name="mpesa" min="0" class="form-control" required="required" />
						</div>

						<div class="form-group">
							<label>Place of issue</label>
							<input type="text" name="place" min="0" class="form-control" required="required" />
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