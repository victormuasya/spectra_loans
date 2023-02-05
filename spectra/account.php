<?php require_once'spectraheader.php'; ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Account</h1>
                    </div>
					<button class="mb-2 btn btn-lg btn-success" href="#" data-toggle="modal" data-target="#addModal"><span class="fa fa-pen"></span> DETAILS</button>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                            
                                            <th>Spectra profits</th>
                                            <th>Total Money in Account.</th>
                                            <th>working capital(small expenses)</th>
                                            <th>Security Item after default</th>
                                            <th>Defaults cash</th>
											<th>Other expenses</th>
                                            <th>Money Loaned</th>
                                            <th>Add tab....</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                          
                                        <tr>
                                        
                                            
                                            <td><?php echo number_format (2+2)?></td>
                                            <td><?php echo number_format (2+2)?></td>
                                            <td><?php echo number_format (2+2)?></td>
                                            <td><?php echo number_format (2+2)?></td>
                                            <td><?php echo number_format (2+2)?></td>
											<td><?php echo number_format (2+2)?></td>
                                            <td><?php echo number_format (2+2)?></td>
                                            <td><?php echo number_format (2+2)?></td>
                                           
                                        </tr>       

										
            <!-- Footer -->
            <footer class="stocky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
					<span>Copyright &copy; Spectraloans @
<a  href =" portfolio/web/index.html" style="color:purple;"><b>victormuasya</b></a> <?php echo date("Y")?></span>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	
	
	
	
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