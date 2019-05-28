<?php  
$role 	= $this->session->userdata('ses_role');
	if ($role <> 'RM') {$display = 'none';} else {$display = '';}
?>
<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler"></div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="nav-item start">
					<a href="<?php echo base_url('mds');?>" class="nav-link nav-toggle">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('mytask')?>" class="nav-link">
					<i class="icon-list"></i>
					<span class="title">My Task</span>
					</a>
				</li>
				<li class="nav-item " style="display: <?php echo $display;?> ;">
					<a href="javascript:;" class="nav-link nav-toggle">
					<i class="icon-note"></i>
					<span class="title">Form</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">Corporate<span class="arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="<?php echo base_url();?>form?type=1&idseg=1">New</a></li>
								<li><a href="javascript:;">Existing<span class="arrow"></span></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url();?>cari?type=2&idseg=01&idtype=00">LCU</a></li>
										<li><a href="<?php echo base_url();?>cari?type=3&idseg=01&idtype=00">Restructure</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">Commercial<span class="arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="javascript:;">New<span class="arrow"></span></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url();?>form?type=0&idseg=02&idtype=01">Funded</a></li>
										<li><a href="javascript:;">Non Funded<span class="arrow"></span></a>
											<ul class="sub-menu">
												<li><a href="<?php echo base_url();?>form?type=0&idseg=02&idtype=02">L/C</a></li>
												<li><a href="<?php echo base_url();?>form?type=0&idseg=02&idtype=03">B/G</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="javascript:;">Existing<span class="arrow"></span></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url('form/new/cari');?>form?type=1&idseg=02&idtype=00">LCU</a></li>
										<li><a href="<?php echo base_url('form/new/cari');?>form?type=2&idseg=02&idtype=00">Restructure</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">SMM<span class="arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="<?php echo base_url();?>form?type=0&idseg=03&idtype=0">New</a></li>
								<li><a href="javascript:;">Existing<span class="arrow"></span></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url('form/new/cari');?>form?type=1&idseg=03&idtype=00">LCU</a></li>
										<li><a href="<?php echo base_url('form/new/cari');?>form?type=2&idseg=03&idtype=00">Restructure</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;">Consumer<span class="arrow"></span></a>
							<ul class="sub-menu">
								<li><a href="<?php echo base_url();?>form?type=0&idseg=04&idtype=0">New</a></li>
								<li><a href="javascript:;">Existing<span class="arrow"></span></a>
									<ul class="sub-menu">
										<li><a href="<?php echo base_url('form/new/cari');?>form?type=1&idseg=04&idtype=00">LCU</a></li>
										<li><a href="<?php echo base_url('form/new/cari');?>form?type=2&idseg=04&idtype=00">Restructure</a></li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="start">
					<a href="#">
					<i class="icon-notebook"></i>
					<span class="title">Documentation</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->