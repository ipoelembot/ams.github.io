<!-- BEGIN USER LOGIN DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-user">
	<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
		<img alt="" class="img-circle" src="<?php echo base_url();?>ams_components/assets/layout/img/avatar.png"/>
		<span class="username username-hide-on-mobile">Assalamualaikum, <?php echo $this->session->userdata('ses_nama');?></span>
		<i class="fa fa-angle-down"></i>
	</a>
	<ul class="dropdown-menu dropdown-menu-default">
		<li>
			<a href="#">
			<i class="icon-user"></i> My Profile </a>
		</li>
		<li>
			<a href="#">
			<i class="icon-calendar"></i> My Calendar </a>
		</li>
		<li>
			<a href="<?php echo base_url('mytask')?>">
			<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
			0 </span>
			</a>
		</li>
		<li class="divider">
		</li>
		<li>
			<a href="<?php echo base_url('login/logout')?>">
			<i class="icon-key"></i> Log Out </a>
		</li>
	</ul>
</li>
<!-- END USER LOGIN DROPDOWN -->