<aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Menu Untuk User 1 atau Admin -->
        <?php if($this->session->userdata('akses') == '1'):?>
        <li><a href="#"><i class="fa fa-cogs"></i><span>Content Management</span></a></li>
        <li><a href="#"><i class="fa fa-user-plus"></i><span>User Management</span></a></li>
        <li><a href="#"><i class="fa fa-desktop"></i><span>Application Management</span></a></li>
        <li><a href="#"><i class="fa fa-window-restore"></i><span>Documment Management</span></a></li>
        <li><a href="#"><i class="fa fa-print"></i><span>Report</span></a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

        <!-- Menu Untuk User 2 atau RA/AM -->
        <?php elseif($this->session->userdata('akses') == '2'):?>
        <li><a href="<?php echo base_url(''); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url('mds/mytask') ;?>"><i class="fa fa-list"></i><span>My Task</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-edit"></i><span>Forms</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
            <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i>Corporate<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('form'); ?>?new=corporate&idx=01"><i class="fa fa-circle-o"></i> New</a></li>
                  <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Existing
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?php echo base_url('Restru/caricorp'); ?>"><i class="fa fa-circle-o"></i> Restrukturisasi</a></li>
                      <li><a href="<?php echo base_url('Restru/cari'); ?>"><i class="fa fa-circle-o"></i> LCU</a></li>
                    </ul>
                  </li>
                </ul>
            </li>

            <!-- Menu Commercial -->
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Commercial
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('form'); ?>?new=commercial&idx=02"><i class="fa fa-circle-o"></i> New</a></li>
                  <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> Existing
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?php echo base_url('Restru/cari'); ?>"><i class="fa fa-circle-o"></i> Restrukturisasi</a></li>
                      <li><a href="<?php echo base_url('Restru/cari'); ?>"><i class="fa fa-circle-o"></i> LCU</a></li>
                    </ul>
                  </li>
                </ul>
            </li>

            <!-- Menu SMM -->
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> SMM
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('form'); ?>?new=smm&idx=03"><i class="fa fa-circle-o"></i> New</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Existing
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('Restru/cari'); ?>"><i class="fa fa-circle-o"></i> Restrukturisasi</a></li>
                        <li><a href="<?php echo base_url('Restru/cari'); ?>"><i class="fa fa-circle-o"></i> LCU</a></li>
                      </ul>
                    </li>
                  </ul>
              </li>

              <!-- Menu Consumer -->
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Consumer
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('form'); ?>?new=consumer&idx=04"><i class="fa fa-circle-o"></i> New</a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-circle-o"></i> Existing
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('Restru/cari'); ?>"><i class="fa fa-circle-o"></i> Restrukturisasi</a></li>
                        <li><a href="<?php echo base_url('Restru/cari'); ?>"><i class="fa fa-circle-o"></i> LCU</a></li>
                      </ul>
                    </li>
                  </ul>
              </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>

        <?php else:?>
        <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>  
        <li><a href="#"><i class="fa fa-list"></i> <span>Task</span></a></li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        <?php endif;?>
      </ul>
    </section>
  </aside>