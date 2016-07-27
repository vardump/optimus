<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('/images/admin-lte/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Username</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li><a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a></li>
            <li><a href="/write"><i class="fa fa-edit"></i> <span>Write</span> <small class="label pull-right bg-blue-gradient">Pro</small></a></li>
            <li><a href="/allpost"><i class="fa fa-copy"></i> <span>All posts</span></a></li>
            <li><a href="/chatbot"><i class="fa fa-comment"></i> <span>FB Chat Bot</span><small class="label pull-right bg-green">Exclusive</small></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-skype"></i>
                    <span>Skype</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none">
                    <li><a href="/skype"><i class="fa fa-home"></i> <span>Skype</span></a></li>
                    <li><a href="/skype/phone/list"><i class="fa fa-phone"></i> Collected Phone numbers</a></li>
                </ul>

            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-facebook"></i>
                    <span>Facebook</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/facebook"><i class="fa fa-file"></i> Facebook Pages</a></li>
                    <li><a href="/fbgroups"><i class="fa fa-users"></i> Facebook Groups</a></li>
                    <li><a href="/conversations"><i class="fa fa-comments"></i> Conversations</a></li>
                    <li><a href="/fbreport"><i class="fa fa-pie-chart"></i> Facebook Report</a></li>
                    <li><a href="/fbmassgrouppost"><i class="fa fa-bolt"></i> Facebook Mass Group Post</a></li>
                    <li><a href="/masssend"><i class="fa fa-send"></i> Facebook Mass Send</a></li>
                    <li><a href="/scraper"><i class="fa fa-magnet"></i> Facebook Scraper</a></li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-twitter"></i>
                    <span>Twitter</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none">
                    <li><a href="/twitter"><i class="fa fa-twitter"></i> <span>My account</span></a></li>
                    <li><a href="/tw/scraper"><i class="fa fa-magnet"></i> Twitter Scraper</a></li>
                </ul>

            </li>
            <li><a href="/tumblr"><i class="fa fa-tumblr"></i> <span>Tumblr</span></a></li>
            <li><a href="/wordpress"><i class="fa fa-wordpress"></i> <span>Wordpress</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>Schedule</span> <small class="badge pull-right bg-aqua">Special <i class="fa fa-angle-left pull-right"></i></small>

                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/schedules"><i class="fa fa-list"></i> Schedules List</a></li>
                    <li><a href="/scheduleslog"><i class="fa fa-sticky-note"></i> Schedules Log</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Reports</span><i class="fa fa-angle-left pull-right"></i>

                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/report/all"><i class="fa fa-files-o"></i> <span>All reports</span></a></li>
                    <li><a href="/fbreport"><i class="fa fa-files-o"></i> <span>Facebook reports</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span>Notifications</span><i class="fa fa-angle-left pull-right"></i>

                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/notify"><i class="fa fa-bell-o"></i> <span>All Notifications</span></a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>Settings</span><i class="fa fa-angle-left pull-right"></i>

                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/settings"><i class="fa fa-gear"></i> <span>Social</span></a></li>
                    <li><a href="/settings/notifications"><i class="fa fa-bell"></i> <span>Notifications</span></a></li>
                    <li><a href="/settings/config"><i class="fa fa-gears"></i> <span>Configurations</span></a></li>
                    <li><a href="/profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>


                </ul>
            </li>


            <li><a href="/followers"><i class="fa fa-users"></i> <span>Likes & Followers</span></a></li>

            <li><a href="/profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <li><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>