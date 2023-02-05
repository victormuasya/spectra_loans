<?php require_once'spectraheader.php'; ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Loan Type <h style="color:purple;font-size:15px;">I guess we only have one loan type, currently</h></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
									<form method="POST" action="save_ltype.php">
										<div class="form-group">
											<label>Loan Name</label>
											<input type="text" class="form-control" name="ltype_name" required="required"/>
										</div>
										<div class="form-group">
											<label>Loan Description</label>
											<textarea style="resize:none;" class="form-control" name="ltype_desc" required="required"></textarea>
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
												<th>Loan Name</th>
												<th>Loan Description</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$tbl_ltype=$db->display_ltype();
												while($fetch=$tbl_ltype->fetch_array()){
											?>
											<tr>
												<td><?php echo $fetch['ltype_name']?></td>
												<td><?php echo $fetch['ltype_desc']?></td>
												<td>
													<div class="dropdown">
														<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															Action
														</button>
														<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
															<a class="dropdown-item bg-warning text-white" href="#" data-toggle="modal" data-target="#updateltype<?php echo $fetch['ltype_id']?>">Edit</a>
															<a class="dropdown-item bg-danger text-white" href="#" data-toggle="modal" data-target="#deleteltype<?php echo $fetch['ltype_id']?>">Delete</a>
														</div>
													</div>
												</td>
											</tr>
											
											
											<!-- Delete Loan Type Modal -->
										
											<div class="modal fade" id="deleteltype<?php echo $fetch['ltype_id']?>" tabindex="-1" aria-hidden="true">
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
															<a class="btn btn-danger" href="delete_ltype.php?ltype_id=<?php echo $fetch['ltype_id']?>">Delete</a>
														</div>
													</div>
												</div>
											</div>
											
											<!-- Update Loan Type Modal -->
											
											<div class="modal fade" id="updateltype<?php echo $fetch['ltype_id']?>" tabindex="-1" aria-hidden="true">
												<div class="modal-dialog">
													<form method="POST" action="update_ltype.php">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title text-white">Edit Loan Type</h5>
																<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="form-group">
																	<label>Loan Name</label>
																	<input type="text" class="form-control" value="<?php echo $fetch['ltype_name']?>" name="ltype_name" required="required"/>
																	<input type="hidden" class="form-control" value="<?php echo $fetch['ltype_id']?>" name="ltype_id"/>
																</div>
																<div class="form-group">
																	<label>Loan Description</label>
																	<textarea style="resize:none;" class="form-control" name="ltype_desc" required="required"><?php echo $fetch['ltype_desc']?></textarea>
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

                    <span>Copyright &copy; <a  href =" portfolio/web/index.html" style="color:purple;"><b>victormuasya</b></a> <?php echo date("Y")?></span><?php echo date("Y")?></span>


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
				"order": [[ 1, "asc" ]]
			});
			
		});
	</script>

</body>

</html>