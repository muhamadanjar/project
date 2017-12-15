        <aside class="sidebar sidebar-left sidebar-menu">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <h5 class="heading">Main Menu</h5>
                <!-- START Template Navigation/Menu -->
                <ul class="topmenu topmenu-responsive" data-toggle="menu">
                    <li class="{{ (session('link_web') == 'dashboard')?'active':'' }} open">
                        <a href="{{ route('backend.dashboard.index') }}" data-parent=".topmenu">
                            <span class="figure"><i class="ico-dashboard2"></i></span>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ (session('link_web') == 'layer')?'active':'' }} open">
                        <a href="{{ route('backend.layer.index') }}" data-parent=".topmenu">
                            <span class="figure"><i class="ico-layer"></i></span>
                            <span class="text">Layer</span>
                        </a>
                    </li>

                    <li >
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#file" data-parent=".topmenu">
                            <span class="figure"><i class="ico-table22"></i></span>
                            <span class="text">File</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="file" class="submenu collapse ">
                            <li class="submenu-header ellipsis">File</li>
                            <li >
                                <a href="{{ route('backend.files.index')}}">
                                    <span class="text">File Manager</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('backend.dokumen.index') }}">
                                    <span class="text">Dokumen</span>
                                </a>
                            </li>
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    
                    <li class="{{ (session('link_web') == 'pengaturan')?'active':'' }}">
                        <a href="javascript:void(0);" data-toggle="submenu" data-target="#pengaturan" data-parent=".topmenu">
                            <span class="figure"><i class="ico-grid"></i></span>
                            <span class="text">Pengaturan</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- START 2nd Level Menu -->
                        <ul id="pengaturan" class="submenu collapse ">
                            <li class="submenu-header ellipsis">Pengaturan</li>
                            <li >
                                <a href="{{ url('backend/setting/index')}}">
                                    <span class="text">Setting</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.setting.profile')}}">
                                    <span class="text">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.log.index')}}">
                                    <span class="text">Log</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('backend.pengaturan.users')}}">
                                    <span class="text">User</span>
                                </a>
                            </li>
                            
                        </ul>
                        <!--/ END 2nd Level Menu -->
                    </li>
                    
                </ul>
                <!--/ END Template Navigation/Menu -->

                <!-- START Sidebar summary -->
                <!-- Summary -->
                <h5 class="heading">Summary</h5>
                <div class="wrapper">
                    <div class="table-layout">
                        <div class="col-xs-5 valign-middle">
                            <span class="sidebar-sparklines" sparkType="bar" sparkBarColor="#00B1E1">1,5,3,2,4,5,3,3,2,4,5,3</span>
                        </div>
                        <div class="col-xs-7 valign-middle">
                            <h5 class="semibold nm">Server uptime</h5>
                            <small class="semibold">1876 days</small>
                        </div>
                    </div>

                    <div class="table-layout">
                        <div class="col-xs-5 valign-middle">
                            <span class="sidebar-sparklines" sparkType="bar" sparkBarColor="#91C854">2,5,3,6,4,2,4,7,8,9,7,6</span>
                        </div>
                        <div class="col-xs-7 valign-middle">
                            <h5 class="semibold nm">Disk usage</h5>
                            <small class="semibold">83.1%</small>
                        </div>
                    </div>

                    <div class="table-layout">
                        <div class="col-xs-5 valign-middle">
                            <span class="sidebar-sparklines" sparkType="bar" sparkBarColor="#ED5466">5,1,3,7,4,3,7,8,6,5,3,2</span>
                        </div>
                        <div class="col-xs-7 valign-middle">
                            <h5 class="semibold nm">Daily visitors</h5>
                            <small class="semibold">56.5%</small>
                        </div>
                    </div>
                </div>
                <!--/ Summary -->
                <!--/ END Sidebar summary -->
            </section>
            <!--/ END Sidebar Container -->
        </aside>