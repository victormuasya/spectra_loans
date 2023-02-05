<div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                PAYMENT DATA</div>
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">
												<?php 
													$tbl_payment=$db->conn->query("SELECT sum(amountpaid) as total FROM `payment` WHERE date(date_created)='".date("Y-m-d")."'");
													echo  $tbl_payment ->  num_rows > 0  ? "Received Payments so far ".number_format($tbl_payment->fetch_array()['total'],2) : "&#8369; 0.00";
 
                                                ?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                        <img src="image/profits.png" alt="image" style="height:80px;width:70px;border-radius:20%;" />

                                    </div>
                                    </div>
                                </div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small stretched-link" href="viewpayment.php">View Payments</a>
									<div class="small">
										<i class="fa fa-angle-right"></i>
									</div>
								</div>
                            </div>
                        </div>

                        
