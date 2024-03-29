<div class="left main-sidebar">

    <div class="sidebar-inner leftscroll">

        <div id="sidebar-menu">

            <ul>


                @if (Auth::user()->role->name == 'Admin')
                <li class="submenu">
                    <a class="active" href="index.html">
                        <i class="fas fa-bars"></i>
                        <span> Dashboard </span>
                    </a>
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
                        </li>
                        <li>
                            <a href="{{ route('attendance.type') }}"> <i class="far fa-calendar-alt"></i>Attendance Type</a>
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
                        <span> Leave </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('departure.emp')}}"> <i class="fas fa-user-clock"></i>Leave Employee</a>
                        </li>
                        <li>
                            <a href="{{route('leave.index')}}"> <i class="fas fa-th-list"></i>Leave Type</a>
                        </li>
                    </ul>
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
                    <a href="{{ route('unit.index') }}">
                        <i class="fab fa-uniregistry"></i>
                        <span> Units </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('role.index')}}">
                        <i class="fas fa-cut"></i>
                        <span> Role </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('holiday')}}">
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

                @elseif(Auth::user()->role->name == 'Staff')
                <li class="submenu">
                    <a class="active" href="index.html">
                        <i class="fas fa-bars"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="mail-all.html">
                        <span class="label radius-circle bg-danger float-right">18</span>
                        <i class="fas fa-envelope"></i>
                        <span> Messages </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{ route('staff.attendance') }}">
                        <i class="fas fa-cut"></i>
                        <span> Your Attendance </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{ route('staff.profile') }}">
                        <i class="fas fa-cut"></i>
                        <span> My Profile </span>
                    </a>
                </li>

                <li class="submenu">
                    <a href="{{ route('staff.leave') }}">
                        <i class="fas fa-cut"></i>
                        <span>My Leave </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="{{route('holiday')}}">
                        <i class="fas fa-adjust"></i>
                        <span> Holidays </span>
                    </a>
                </li>
                @endif
            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
@push('name')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
@endpush
users::wherebetween('crated_at',[$firstdate,$last_date])
