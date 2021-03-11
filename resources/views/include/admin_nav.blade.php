<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            {{-- <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Dashboard</span>
                    <span class="icon-angle-down ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu1' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed ml-4">Users</span>
                </a>
            </div> --}}
            <a href="/admin" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="icon-users mr-3"></span>
                    <span class="menu-collapsed">Admins</span>
                </div>
            </a>
            <a href="/admin-tuition" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="icon-money mr-3"></span>
                    <span class="menu-collapsed">Tuition Fee Details</span>
                </div>
            </a>
            <a href="/admin-students" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="icon-user mr-3"></span>
                    <span class="menu-collapsed">Students</span>
                </div>
            </a>
            <a href="/admin-enrollees" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="icon-user mr-3"></span>
                    <span class="menu-collapsed">Enrollees</span>
                </div>
            </a>
            
            <!-- Submenu content -->
            {{-- <div id='submenu2' class="collapse sidebar-submenu">
                <a href="/admin-tuition" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed ml-4">View Tuition Details</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">Password</span>
                </a>
            </div> --}}
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>WEBSITE</small>
            </li>
            <!-- /END Separator -->
            <a href="/admin-announcement" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="icon-bullhorn mr-3"></span>
                    <span class="menu-collapsed">Announcements</span>
                </div>
            </a>
            {{-- <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="icon-calendar mr-3"></span>
                    <span class="menu-collapsed">Calendar</span>
                </div>
            </a> --}}
            <a href="/admin-contact" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="icon-mail mr-3"></span>
                    <span class="menu-collapsed">Messages</span>
                </div>
            </a>
             {{-- <span class="badge badge-pill badge-primary ml-2">5</span> --}}
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>
            <!-- /END Separator -->
            <a href="#" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    {{-- <span class="fa fa-question fa-fw mr-3"></span> --}}
                    <i class="icon-help-circled mr-3"></i>
                    <span class="menu-collapsed">Help</span>
                </div>
            </a>
            <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    {{-- <span id="collapse-icon" class="angle-double-left"></span> --}}
                    <i class="icon-angle-double-left mr-3"></i>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->