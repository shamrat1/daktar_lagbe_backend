<!-- Brand Logo -->
<a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar nano">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="#" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview {{ isActive(['/','dashboard*']) }}">
                <a href="#" class="nav-link {{ isActive(['dashboard*','/']) }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview {{ isActive(['permissions*','roles*','users*']) }}">
                <a href="#" class="nav-link {{ isActive(['permissions*','roles*','users*']) }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        User Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                        <a href="{{ route('admin.user.index')}}" class="nav-link {{ isActive('users/all*') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.role.index') }}" class="nav-link {{ isActive('users/roles*') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.permission.index') }}" class="nav-link {{ isActive('users/permissions*') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Permissions</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['departments*','expertises*','designations*','visiting_hours*','visiting_fees*']) }}">
                <a href="#" class="nav-link {{ isActive(['departments*','expertises*','designations*','visiting_hours*','visiting_fees*']) }}">
                    <i class="nav-icon fas fa-user-md"></i>
                    <p>
                        Doctors Setup
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                        <a href="{{ route('admin.department.index')}}" class="nav-link {{ isActive('departments') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Departments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.designation.index') }}" class="nav-link {{ isActive('designations') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Designations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.expertise.index') }}" class="nav-link {{ isActive('expertises') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Expertize</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.visitingHour.index') }}" class="nav-link {{ isActive('visiting_hours') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Visiting Hours</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.visitingFee.index') }}" class="nav-link {{ isActive('visiting_fees') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Visiting Fees</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview {{ isActive(['hospitals*','services*','surgeries*','test*']) }}">
                <a href="#" class="nav-link {{ isActive(['hospitals*','services*','surgeries*','test*']) }}">
                    <i class="nav-icon fas fa-hospital"></i>
                    <p>
                        Hospitals/Clinic Setup
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.services.index') }}" class="nav-link {{ isActive('services') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Services</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.surgeries.index') }}" class="nav-link {{ isActive('surgeries') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Surgeries</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.test_facilities.index') }}" class="nav-link {{ isActive('test*') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Test Facilities</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item has-treeview {{ isActive(['clinic*']) }}">
                <a href="#" class="nav-link {{ isActive(['clinic*']) }}">
                    <i class="nav-icon fas fa-bed"></i>
                    <p>
                        Clinic Setup
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('departments') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Departments</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('designations') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Designations</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('visiting_hours') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Visiting Hours</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ isActive('visiting_hours') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Visiting Fees</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="nav-item {{ isActive(['address*']) }}">
                <a href="{{ route('admin.address.index') }}" class="nav-link {{ isActive(['address*']) }}">
                    <i class="nav-icon fas fa-map"></i>
                    <p>
                        Address Setup
                    </p>
                </a>
            </li>
            <li class="nav-item {{ isActive(['hospital*']) }}">
                <a href="{{ route('admin.hospital.index') }}" class="nav-link {{ isActive(['address*']) }}">
                    <i class="nav-icon fas fa-hospital-alt"></i>
                    <p>
                        Hospitals
                    </p>
                </a>
            </li>
            <li class="nav-item {{ isActive(['clinic*']) }}">
                <a href="{{ route('admin.clinic.index') }}" class="nav-link {{ isActive(['address*']) }}">
                    <i class="nav-icon fas fa-file-medical"></i>
                    <p>
                        Clinics
                    </p>
                </a>
            </li>
            <li class="nav-item {{ isActive(['doctor*']) }}">
                <a href="{{ route('admin.doctor.index') }}" class="nav-link {{ isActive(['address*']) }}">
                    <i class="nav-icon fas fa-briefcase-medical"></i>
                    <p>
                        Doctors
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
