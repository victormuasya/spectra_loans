
                     
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Active Loans</div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">
												<?php 
													$tbl_loan=$db->conn->query("SELECT * FROM `loan` WHERE `status`='2'");
													echo $tbl_loan->num_rows > 0 ? $tbl_loan->num_rows : "0";
												?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                        <img src="image/activeloans.png" alt="image" style="height:80px;width:80px;border-radius:20%;" />

                                        </div>
                                    </div>
                                </div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small stretched-link" href="loan.php">View Loan List</a>
									<div class="small">
										<i class="fa fa-angle-right"></i>
									</div>
								</div>
                            </div>
                        </div>