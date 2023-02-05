<?php require_once'spectraheader.php'; ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">INVESTORS</h1> <h style="color:red;">Fill the  Spectra Treasurer details as the first investor</h>
                    </div>
					<button class="mb-2 btn btn-lg btn-success" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Add  Investor</button> 
                    <!-- DataTales Example --><h style="color:brown;"><b>TOTAL CASH:</b></h>
					<?php
											//$tbl_investor=$db->display_investor();
											
											//while($fetch=$tbl_investor->fetch_array()){ 
										//echo $fetch['spectra']; }?> 

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>Profession</th>
                                            <th>Lastname</th>
                                            <th>Contact No</th>
                                            <th style="color:green;">Amount Shared</th>
                                            <th>Email</th>
                                            <th>Date shared</th>
											<th>ID no</th>
                                            <th>MPESA REF.</th>
											<th style="color:red;">% SHARE</th>
                                            <th>WITNESS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$tbl_investor=$db->display_investor();
											
											while($fetch=$tbl_investor->fetch_array()){
										?>
										
                                        <tr>
                                            <td><?php echo $fetch['firstname']?></td>
                                            <td><?php echo $fetch['profession']?></td>
                                            <td><?php echo $fetch['lastname']?></td>
                                            <td><?php echo $fetch['contact_no']?></td>
                                            <td><?php echo $fetch['share']?></td>
                                            <td><?php echo $fetch['email']?></td>
                                            <td><?php echo $fetch['date']?></td>
											<td><?php echo $fetch['idno']?></td>
                                            <td><?php echo $fetch['mpesa']?></td>
											<td><?php echo number_format (($fetch['share'] / $fetch['spectra'])*100, 2)?></td>
                                            <td><?php echo $fetch['witness']?></td>

                                            <td>
												<div class="dropdown">
													<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Action
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item bg-warning text-white" href="#" data-toggle="modal" data-target="#updateinvestor<?php echo $fetch['investor_id']?>">Edit</a>
														<a class="dropdown-item bg-danger text-white" href="#" data-toggle="modal" data-target="#deleteinvestor<?php echo $fetch['investor_id']?>">Delete</a>
													</div>
												</div>
											</td>
                                        </tr>
										
										
										<!-- Update User Modal -->
										<div class="modal fade" id="updateinvestor<?php echo $fetch['investor_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<form method="POST" action="updateinvestor.php">
													<div class="modal-content">
														<div class="modal-header bg-warning">
															<h5 class="modal-title text-white">Edit Investor</h5>
															<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">×</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="form-group">
																<label>Firstname</label>
																<input type="text" name="firstname" value="<?php echo $fetch['firstname']?>" class="form-control" required="required" />
																<input type="hidden" name="investor_id" value="<?php echo $fetch['investor_id']?>"/>
															</div>
															<div class="form-group">
																<label>Profession</label>
																<input type="text" name="profession" value="<?php echo $fetch['profession']?>" class="form-control" required="required" />
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
																<label>Amount</label>
																<input type="text" name="share" value="<?php echo $fetch['share']?>" class="form-control" required="required" />
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
																<label> Witness</label>
																<input type="text" name="witness" min="0" value="<?php echo $fetch['witness']?>" class="form-control" required="required" />
															</div><div class="form-group">
																<label> Date</label>
																<input type="text" name="date" min="" value="<?php echo $fetch['date']?>" class="form-control" required="required" />
															
															<div class="form-group">
																<label> Mpesa Ref.no</label>
																<input type="text" name="mpesa" min="" value="<?php echo $fetch['mpesa']?>" class="form-control" required="required" />
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
										
                                        <div class="modal fade" id="deleteinvestor<?php echo $fetch['investor_id']?>" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header bg-danger">
														<h5 class="modal-title text-white">System Information</h5>
														<button class="close" type="button" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">×</span>
														</button>
													</div>
													<div class="modal-body">Are you sure you want to delete investor?</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
														<a class="btn btn-danger" href="deleteinvestor.php?investor_id=<?php echo $fetch['investor_id']?>">Delete</a>
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
			<form method="POST" action="saveinvestor.php">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Add Investor</h5>
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
							<label>Profession</label>
							<input type="text" name="profession" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" name="lastname" class="form-control" required="required" />
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" name="contact_no" class="form-control" placeholder="Eg.[0728334543]"   required="required" />
						</div>
						<div class="form-group">
							<label>Amount</label>
							<input type="number" name="share" class="form-control" required="required" />
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
							<label>Date</label>
							<input type="text" name="date" min="0" class="form-control" required="required" />
						</div>						<div class="form-group">
							<label>Witness</label>
							<input type="text" name="witness" min="0" class="form-control" required="required" />
						
						<div class="form-group">
							<label>Mpesa Ref.no</label>
							<input type="text" name="mpesa" min="0" class="form-control" required="required" />
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