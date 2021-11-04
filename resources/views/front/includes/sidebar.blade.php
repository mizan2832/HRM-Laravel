<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>
                <li class="submenu">
                    <a class="active" href="index.html">
                        <i class="fas fa-bars"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-table"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('add-user') }}"> <i class="fas fa-user-plus"></i>Add User</a>

                        </li>
                        <li>
                            <a href="#"> <i class="far fa-calendar-alt"></i>Manage User</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="mail-all.html">
                        <span class="label radius-circle bg-danger float-right">18</span>
                        <i class="fas fa-envelope"></i>
                        <span> Messages </span>
                    </a>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-table"></i>
                        <span> Attendance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('daily-attendance.index') }}"> <i class="far fa-file-powerpoint"></i>Daily Attendance</a>

                        </li>
                        <li>
                            <a href="#"> <i class="far fa-calendar-alt"></i>Monthly Attendance</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-user-tie"></i>
                        <span> Employee </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('employee.create') }}"><i class="fas fa-user-plus"></i> Add Employee</a>

                        </li>
                        <li>
                            <a href="{{ route('employee.index') }}"> <i class="fas fa-th-list"></i>Employee List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="{{ route('department.index') }}">
                        <i class="fas fa-building"></i>
                        <span> Departments </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('section.index')}}">
                        <i class="fas fa-cut"></i>
                        <span> Sections </span>
                    </a>
                </li>
                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-strikethrough"></i>
                        <span> Shift </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#"> <i class="fas fa-th-list"></i>Shift List</a>

                        </li>
                        <li>
                            <a href="#"> <i class="fas fa-user-clock"></i>Shift Wise Employee</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="users.html">
                        <i class="fab fa-uniregistry"></i>
                        <span> Units </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="users.html">
                        <i class="fas fa-adjust"></i>
                        <span> Holidays </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="users.html">
                        <i class="fas fa-poll-h"></i>
                        <span> Reports </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="users.html">
                        <i class="fas fa-cog"></i>
                        <span> Setting</span>
                    </a>
                </li>

         

            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>