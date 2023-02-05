
                        
                        <div class="col-xl-4 col-md-4 mb-4" >
                            <div class="card border-left-info shadow h-100 py-2"  >
                                <div class="card-body" >
                                    <div class="row no-gutters align-items-center" >
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1" > <h style="color:chocolate;font-size:20px;">INVESTORS</h>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h1 mb-0 mr-3 font-weight-bold text-gray-800">
														<?php 
															$tbl_investor=$db->conn->query("SELECT * FROM `investor`");
															echo $tbl_investor->num_rows > 0 ? $tbl_investor->num_rows : "0";
														?>
													</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <img src="image/investor.png" alt="image" style="height:80px;width:70px;border-radius:20%;" />
                                        </div>
                                    </div>
                                </div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<a class="small stretched-link" href="shareholder.php" style="color:chocolate;">View/Add Shareholders</a>
									<div class="small">
										<i class="fa fa-angle-right"></i>
									</div>
								</div>
                            </div>
                        </div>