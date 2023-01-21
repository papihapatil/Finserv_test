<div >
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="screen-title">
                    	<small class="screen-title-txt">Admin Dashboard </small>
                    </div>
                </div>            	
            </div>
        </div>
</div>

<div class="rate-table">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <a href="<?php echo base_url()?>index.php/dsa/customers">
                        <div class="rate-counter-block">
                            <div class="icon rate-icon  "> <i class="fa fa-user-circle-o" style="font-size:50px;color:#c5d5db"></i></div>
                            <div class="rate-box">
                                <h1 class="loan-rate"><?php echo $dashboard_data['cust_count']?></h1>
                                <small class="rate-title">Total Customers</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <i class="fa fa-id-badge" style="font-size:50px;color:#c5d5db"></i></div>
                        <div class="rate-box">
                            <h1 class="loan-rate"><?php echo $dashboard_data['manager_count']?></h1>
                            <small class="rate-title">Managers</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <i class="fa fa-id-badge" style="font-size:50px;color:#c5d5db"></i></div>
                        <div class="rate-box">
                            <h1 class="loan-rate"><?php echo $dashboard_data['csr_count']?></h1>
                            <small class="rate-title">CSR</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <i class="fa fa-id-badge" style="font-size:50px;color:#c5d5db"></i></div>
                        <div class="rate-box">
                            <h1 class="loan-rate"><?php echo $dashboard_data['dsa_count']?></h1>
                            <small class="rate-title">DSA</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rate-table">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <i class="fa fa-money" style="font-size:50px;color:#c5d5db"></i></div>
                        <div class="rate-box">
                            <h1 class="loan-rate"><?php echo $dashboard_data['applied_loan_count']?></h1>
                            <small class="rate-title">Applied for loan</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <i class="fa fa-thumbtack" style="font-size:50px;color:#c5d5db"></i></div>
                        <div class="rate-box">
                            <h1 class="loan-rate"><?php echo $dashboard_data['pending_profile_count']?></h1>
                            <small class="rate-title">Pending Customers Profiles</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <i class="fa fa-bookmark" style="font-size:50px;color:#c5d5db"></i></div>
                        <div class="rate-box">
                            <h1 class="loan-rate">0</h1>
                            <small class="rate-title">Approved Loans</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="rate-counter-block">
                        <div class="icon rate-icon  "> <i class="fa fa-credit-card" style="font-size:50px;color:#c5d5db"></i></div>
                        <div class="rate-box">
                            <h1 class="loan-rate">0</h1>
                            <small class="rate-title">Due Payment</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>