<body>

<section x-data="toggleSidebar" class="bg-info">


    <section x-cloak class="sidebar bg-light" :class="open || 'inactive'">
        <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
            <h4 class="fw-bold">codeyad blog</h4>
            <i @click="toggle" class="d-lg-none fs-1 bi bi-x"></i>
        </div>
        <div class="mt-4">
            <ul class="list-unstyled">
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="index.php">
                        <i class="me-2 bi bi-grid-fill"></i>
                        <span>داشبورد</span>
                    </a>
                </li>

                <li x-data="dropdown" class="sidebar-item">
                    <div @click="toggle" class="sidebar-link">
                        <i class="me-2 bi bi-shop"></i>
                        <span>وبلاگ</span>
                        <i class="ms-auto bi bi-chevron-down"></i>
                    </div>
                    <ul x-show="open" x-transition class="submenu">
                        <li class="submenu-item">
                            <a href="#">لیست پست ها</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./new_post.php">ایجاد پست</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./search.php">ویرایش پست</a>
                        </li>
                    </ul>
                </li>

                <li x-data="dropdown" class="sidebar-item">
                    <div @click="toggle" class="sidebar-link">
                        <i class="me-2 bi bi-box-seam"></i>
                        <span>محصولات</span>
                        <i class="ms-auto bi bi-chevron-down"></i>
                    </div>
                    <ul x-show="open" x-transition class="submenu">
                        <li class="submenu-item">
                            <a href="./products_index.html">لیست محصولات</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#">ایجاد محصول</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#">ویرایش محصول</a>
                        </li>
                    </ul>
                </li>

                <li x-data="dropdown" class="sidebar-item">
                    <div @click="toggle" class="sidebar-link">
                        <i class="me-2 bi bi-basket-fill"></i>
                        <span>سفارشات</span>
                        <i class="ms-auto bi bi-chevron-down"></i>
                    </div>
                    <ul x-show="open" x-transition class="submenu">
                        <li class="submenu-item">
                            <a href="#">لیست سفارشات</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#">سفارشات تایید شده</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#">سفارشات تایید نشده</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="me-2 bi bi-percent"></i>
                        <span>تخفیف ها</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="me-2 bi bi-chat-right-dots-fill"></i>
                        <span>تیکت</span>
                    </a>
                </li>

                <li x-data="dropdown" class="sidebar-item">
                    <div @click="toggle" class="sidebar-link">
                        <i class="me-2 bi bi-people-fill"></i>
                        <span>کاربران</span>
                        <i class="ms-auto bi bi-chevron-down"></i>
                    </div>
                    <ul x-show="open" x-transition class="submenu">
                        <li class="submenu-item">
                            <a href="./users_list.php">لیست کاربران</a>
                        </li>
                        <li class="submenu-item">
                            <a href="#">ایجاد کاربران</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./search_users.php">جستجوی کاربران</a>
                        </li>
                        <li class="submenu-item">
                            <a href="./modify_users.php">ویرایش کاربران</a>
                        </li>
                    </ul>
                </li>

                <!--                x-data="dropdown"-->
                <!--                @click="toggle"-->
                <li class="sidebar-item">
                        <a class="text-decoration-none text-dark" href="../logout.php">
                    <div class="sidebar-link">
                            <div class="mb-3">

                                <i class="me-2 bi bi-power"></i>
                                <span> خروج</span>
                            </div>
                    </div>
                        </a>


                    <!--                    <ul x-show="open" x-transition class="submenu">-->
                    <!---->
                    <!--                    </ul>-->
                </li>
            </ul>
        </div>
    </section>





