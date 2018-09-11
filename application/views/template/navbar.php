<!-- Classic -->
<!--
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <?php if ($this->session->userdata('isLogin')){ ?>
            <a class="navbar-brand" title="Swinburne Biosafety and Biosecurity Online System Homepage"
			href="<?php echo base_url();?>index.php/home/index">Swinburne BBOS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if($readnotif[0] ==0) { ?>
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/notification/index">
                                <span class="fa-layers fa-fw">
                                    <i class="fas fa-bell fa-lg" style="color:#F65C26;"></i>
                                    <span class="fa-layers-counter" style="color:#F65C26;"><?php echo $readnotif[1] ?> Notifications</span>
                                </span>
                            </a>
                        <?php } else { ?>
                            <a class="nav-link" href="<?php echo base_url(); ?>index.php/notification/index"><i class="fa fa-bell fa-lg fa-fw"></i> Notifications</a>
                        <?php } ?>
                    </li>
                    <?php if($this->session->userdata('account_type') == 2 || $this->session->userdata('account_type') == 3 || $this->session->userdata('account_type') == 4 || $this->session->userdata('account_type') == 5 || $this->session->userdata('account_type') == 6 ) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/adminpage/index"><i class="fa fa-tv fa-lg fa-fw"></i> Administrator Panel</a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/settings/index"><i class="fa fa-user fa-lg fa-fw"></i> My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/landing/logout"><i class="fa fa-sign-out-alt fa-lg fa-fw"></i> Log Out</a>
                    </li>
                </ul>
            </div>
        <?php } else { ?>
            <a class="navbar-brand" title="Swinburne Biosafety and Biosecurity Online System Homepage" href="<?php echo base_url(); ?>index.php/landing/index">Swinburne BBOS</a>
        <?php } ?>
    </div>
</nav>
-->

<!-- Sidebar -->
    <?php if ($this->session->userdata('isLogin')){ ?>
    <!--
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" title="Swinburne Biosafety and Biosecurity Online System Homepage" href="<?php echo base_url(); ?>index.php/landing/index">Swinburne BBOS</a>
            </nav>
        </div>
    -->
        <div class="container">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Swinburne Sarawak</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>BBOS</p>
                    <li>
                        <?php if($readnotif[0] ==0) { ?>
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/notification/index">
                            <span class="fa-layers fa-fw">
                                <i class="fas fa-bell fa-lg" style="color:#F65C26;"></i>
                                <span class="fa-layers-counter" style="color:#F65C26;"><?php echo $readnotif[1] ?> Notifications</span>
                            </span>
                        </a>
                        <?php } else { ?>
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/notification/index"><i class="fa fa-bell fa-lg fa-fw"></i> Notifications</a>
                        <?php } ?>
                    </li>

                    <?php if($this->session->userdata('account_type') == 2 || $this->session->userdata('account_type') == 3 || $this->session->userdata('account_type') == 4 || $this->session->userdata('account_type') == 5 || $this->session->userdata('account_type') == 6 ) { ?>
                    <li>
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/adminpage/index"><i class="fa fa-tv fa-lg fa-fw"></i> Administrator Panel</a>
                    </li>

                    <?php } ?>
                    <li>
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/settings/index"><i class="fa fa-user fa-lg fa-fw"></i> My Account</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/landing/logout"><i class="fa fa-sign-out-alt fa-lg fa-fw"></i> Log Out</a>
                    </li>
                </ul>
            </nav>
        </div>
    <?php } else { ?>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" title="Swinburne Biosafety and Biosecurity Online System Homepage" href="<?php echo base_url(); ?>index.php/landing/index">Swinburne BBOS</a>
            </nav>
        </div>
    <?php } ?>