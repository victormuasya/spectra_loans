                    
                <?php require_once'spectraheader.php'; ?>    

                <div class="container-fluid">
                    <div class="row">
                    <?php require_once'activeloans.php'; ?>    
                        <?php require_once'payments.php'; ?> 
                        <?php require_once'borrowers.php'; ?>      
                        <?php require_once'investors.php'; ?>    
                        <?php require_once'balance.php'; ?> 
                        <?php require_once'stafftab.php'; ?> 

 
                    </div>
                    </div>
            

<div class="container" style="background-color:pink;color:black;">
    <div class="row">
<div class="col-sm-12"> 
    <p> <h style="color:purple;"><b>Spectra Loans, Inc. </b></h><br>
    <h style="color:red;"> Terms of service </h><br>

Below is the formula we employ to calculate daily interest rate charged on the principal amount borrowed 👇:  <br>


 <h style="color:black;"><b>i[%]= [–3P÷4000] + 5.75 </b></h> <br>

 <h style="color:green;"><b>i</b></h> is the daily interest rates<br>
 <h style="color:green;"><b>P</b></h> is the principal amount requested.<br>
Eg, for a 1,000/= loan, from the formula above, the daily Interest rate for this amount will be 5%, equal to 50/= daily. A 5,000/= loan would bear a 2% daily interest rate. <br>

We lend starting from a minimum of 1,000/= up to a maximum of Kshs 5,000/= . <br>
Kindly note, it is our business policy that we demand for a security item before we issue out a loan. We are currently accepting only phones &/or laptops as the security items.<br>

You get a maximum of 21 days to repay your loan. In case of a default, you get an extra 7 days grace period, during which we charge an extra 1% on top of the initial agreed rate, as a penalty for late loan repayment. 
If the loan is not fully repaid after the total 28 days, you'll lose ownership of your item.<br>

<h style="color:green;"><b> Requirements: </b></h><br>
➡️A copy of your original ID<br>
➡️A security item.<br>
➡️A Valid Registration number. <br>


 <h style="color:red;font-size:15px;"><b>NB:</b> </h> <br>
📍 We only issue out loans to current students. A proof of your valid Registration number will be required (a confirmation of your student portal information) before you can qualify for a loan. <br>
📍We will need a temporary access to your security item's pin/password before the loan is repaid. <br>
📍Phones below 32GB ROM may not qualify to be considered security items. <br>
📍We DON'T accept MKOPA Phones! Any attempt to use an MKOPA based item that's not yet fully paid for will be considered a criminal offense and is THEREFORE punishable by law. <br>

 <h styel="color:blue;"><b><u>Important:</u></b></h> <br>
At Spectra Loans, Inc., we highly value the privacy, and data of our clients. <br>
We have made a commitment to protect your data in accordance with the prevailing data protection and consumer protection laws, unless required to disclose such information by law. <br>

 These are our terms of service. <h style="color:purplr;font-size:20px;"><b>Kindly note!</b></h>
</p>

<div class="container">


<div class="row">
<div class="col-sm-12" style="color:orange;font-size:30px;text-align:center;">  <b>Spectra Documents</b></div>
</div>

<div class="row">

<div class="col-sm-4"  style="text-align:center;font-size:20px;padding-bottom:20px;" ><b>1. Agreement form.</b><a href=
"/myprojects/spectraloans/spectra/pdf/agreement.pdf"> <h style="color:red;">pdf </h> </a></div>

<div class="col-sm-4"  style="text-align:center;font-size:20px;padding-bottom:20px;" ><b>2. Investment Contract2.</b><a href=
"/myprojects/spectraloans/spectra/pdf/investment.pdf"> <h style="color:red;">pdf </h> </a></div><br>

<div class="col-sm-4"  style="text-align:center;font-size:20px;padding-bottom:20px;" ><b>2. Company Description.</b><a href=
"/myprojects/spectraloans/spectra/pdf/company.pdf"> <h style="color:red;">pdf </h> </a></div><br>


</div>
</div>


            <!-- Footer -->
            <footer class="stocky-footer" >
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Spectraloans @
<a  href ="portfolio/web/index.html" style="color:purple;"><b>victormuasya</b></a> <?php echo date("Y")?></span>
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

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>


</body>

</html>