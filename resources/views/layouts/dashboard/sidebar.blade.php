            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">القائمة الرئيسية</li>
                            <li class="mm-active">
                                <a href="{{ route('home') }}" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span>الرئيسية</span>
                                </a>
                            </li>

                            <li class="menu-title">لوحة التحكم</li>
                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-gear"></i>

                                    <span>الادارة</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('user.create') }}"><i class="dripicons-plus"></i>أضف مستخدم</a></li>
                                    <li><a href="{{ route('user.index') }}"><i class="dripicons-user-group"></i>المستخدمين</a></li>
                                    <li><a href="{{ route('system.setting') }}"><i class="dripicons-gear"></i>اعدادات عامة</a></li>
                                    <li><a href="{{ route('menu-mail') }}"><i class="dripicons-gear"></i>القائمة البريدية</a></li>
                                </ul>
                            </li>


                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    <span>السلايدر</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('slider.create') }}"><i class="dripicons-plus"></i>اضافة</a></li>
                                    <li><a href="{{ route('slider.index') }}"><i class="fa fa-eye"></i>عرض</a></li>
                                </ul>
                            </li>

                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="dripicons-list"></i>

                                    <span>الاقسام</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('section.create') }}"><i class="dripicons-plus"></i>اضافة قسم</a></li>
                                    <li><a href="{{ route('section.index') }}"><i class="fa fa-eye"></i>عرض الاقسام</a></li>
                                </ul>
                            </li>

                            <li class="mm-active">
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fa fa-fish"></i>

                                    <span>الوجبات</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('meal.create') }}"><i class="dripicons-plus"></i>اضافة وجبة</a></li>
                                    <li><a href="{{ route('meal.index') }}"><i class="fa fa-eye"></i>عرض الوجبات</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
