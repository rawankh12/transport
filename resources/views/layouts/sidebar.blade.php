
        <aside id="sidebar">
            <div class="d-flex">
                <button id="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Admin</a>
                </div>
            </div>
            {{-- <!-- إضافة الشعار هنا -->
            <div class="sidebar-logo">
                <a href="#">
                    <img src="{{ asset('images/bus.jpg') }}" alt="Logo" class="img-fluid" />
                </a>
            </div> --}}
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('supervisors.index') }}" class="sidebar-link {{ request()->routeIs('supervisors.index') ? 'active' : '' }}">
                        <i class="lni lni-users"></i>
                        <span>المشرفين</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-item">
                            <a href="{{ route('supervisors.create') }}" class="sidebar-link {{ request()->routeIs('supervisors.create') ? 'active' : '' }}">
                                {{-- <i class="lni lni-plus" ></i> --}}
                                <span>اضافة مشرف</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('sections.index') }}" class="sidebar-link {{ request()->routeIs('sections.*') ? 'active' : '' }}">
                        <i class="lni lni-travel"></i>
                        <span>الافرع</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-item">
                            <a href="{{ route('sections.create') }}" class="sidebar-link {{ request()->routeIs('sections.create') ? 'active' : '' }}">
                                {{-- <i class="lni lni-plus" ></i> --}}
                                <span>اضافة فرع</span>
                            </a>
                        </li>
                    </ul>
                </li>                
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link {{ request()->is('requests*') ? 'active' : '' }}" data-bs-toggle="collapse" data-bs-target="#requerment" aria-expanded="false" aria-controls="requerment">
                        <i class="lni lni-text-align-justify"></i>
                        <span class="sidebar-text">الطلبات</span>
                    </a>
                    <ul id="requerment" class="sidebar-submenu collapse {{ request()->is('requests*') ? 'show' : '' }}" >
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link {{ request()->is('requests/employment') ? 'active' : '' }}">
                                {{-- <i class="lni lni-chevron-right"></i> --}}
                                <span class="sidebar-text">طلبات التوظيف</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link {{ request()->is('requests/add-trip') ? 'active' : '' }}">
                                {{-- <i class="lni lni-chevron-right"></i> --}}
                                <span class="sidebar-text">طلبات اضافة رحلة</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link {{ request()->is('requests/edit-trip') ? 'active' : '' }}">
                                {{-- <i class="lni lni-chevron-right"></i> --}}
                                <span class="sidebar-text">طلبات تعديل رحلة</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link {{ request()->is('requests/offers-discounts') ? 'active' : '' }}">
                                {{-- <i class="lni lni-chevron-right"></i> --}}
                                <span class="sidebar-text">طلبات العروض والحسومات</span>
                            </a>
                        </li>
                    </ul>
                </li>                              
                              
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link {{ request()->is('records') ? 'active' : '' }}">
                        <i class="lni lni-files"></i>
                        <span>السجلات</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link {{ request()->is('logout') ? 'active' : '' }}">
                        <i class="lni lni-exit"></i>
                        <span>تسجيل خروج</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link {{ request()->is('notifications') ? 'active' : '' }}">
                        <i class="lni lni-popup"></i>
                        <span>اشعارات</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <span>-------</span>
                </a>
            </div>
        </aside>