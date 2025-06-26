<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>" id="topnav-dashboard">
                            <i class="fe-airplay mr-1"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-master" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe-folder-plus mr-1"></i> Master Data <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-master">
                            <a href="<?= base_url('kelas') ?>" class="dropdown-item"><i class="fe-clipboard mr-1"></i>
                                Data Kelas</a>
                            <a href="<?= base_url('siswa') ?>" class="dropdown-item"><i class="fe-users mr-1"></i> Data
                                Siswa</a>
                            <a href="<?= base_url('user') ?>" class="dropdown-item"><i class="fe-user mr-1"></i> Data
                                User</a>
                            <a href="<?= base_url('tahun-ajaran') ?>" class="dropdown-item"><i
                                    class="fe-calendar mr-1"></i> Tahun Ajaran</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-akuntansi" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe-dollar-sign mr-1"></i> Akuntansi <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-akuntansi">
                            <a href="<?= base_url('tipe-akun') ?>" class="dropdown-item"><i class="fe-tag mr-1"></i>
                                Jenis Akun</a>
                            <a href="<?= base_url('akun') ?>" class="dropdown-item"><i class="fe-list mr-1"></i> Data
                                Akun</a>
                            <a href="<?= base_url('akuntansi/jurnal') ?>" class="dropdown-item"><i
                                    class="fe-book-open mr-1"></i> Jurnal</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-spp" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe-credit-card mr-1"></i> SPP <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-spp">
                            <a href="<?= base_url('spp/tagihan') ?>" class="dropdown-item"><i
                                    class="fe-file-text mr-1"></i> Tagihan SPP</a>
                            <a href="<?= base_url('spp/pembayaran') ?>" class="dropdown-item"><i
                                    class="fe-dollar-sign mr-1"></i> Pembayaran</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-laporan" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe-bar-chart-2 mr-1"></i> Laporan <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-laporan">
                            <a href="<?= base_url('laporan/pembayaran') ?>" class="dropdown-item"><i
                                    class="fe-file-text mr-1"></i> Laporan Pembayaran</a>
                            <a href="<?= base_url('laporan/tunggakan') ?>" class="dropdown-item"><i
                                    class="fe-alert-circle mr-1"></i> Laporan Tunggakan</a>
                            <a href="<?= base_url('laporan/keuangan') ?>" class="dropdown-item"><i
                                    class="fe-trending-up mr-1"></i> Laporan Keuangan</a>
                            <a href="<?= base_url('laporan/jurnal') ?>" class="dropdown-item"><i
                                    class="fe-book mr-1"></i> Laporan Jurnal</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe-grid mr-1"></i> Apps <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">

                            <a href="apps-calendar.html" class="dropdown-item"><i class="fe-calendar mr-1"></i>
                                Calendar</a>
                            <a href="apps-chat.html" class="dropdown-item"><i class="fe-message-square mr-1"></i>
                                Chat</a>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-shopping-cart mr-1"></i> Ecommerce <div class="arrow-down">
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="ecommerce-dashboard.html" class="dropdown-item">Dashboard</a>
                                    <a href="ecommerce-products.html" class="dropdown-item">Products</a>
                                    <a href="ecommerce-product-detail.html" class="dropdown-item">Product
                                        Detail</a>
                                    <a href="ecommerce-product-edit.html" class="dropdown-item">Add
                                        Product</a>
                                    <a href="ecommerce-customers.html" class="dropdown-item">Customers</a>
                                    <a href="ecommerce-orders.html" class="dropdown-item">Orders</a>
                                    <a href="ecommerce-order-detail.html" class="dropdown-item">Order
                                        Detail</a>
                                    <a href="ecommerce-sellers.html" class="dropdown-item">Sellers</a>
                                    <a href="ecommerce-cart.html" class="dropdown-item">Shopping Cart</a>
                                    <a href="ecommerce-checkout.html" class="dropdown-item">Checkout</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-mail mr-1"></i> Email <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="email-inbox.html" class="dropdown-item">Inbox</a>
                                    <a href="email-read.html" class="dropdown-item">Read Email</a>
                                    <a href="email-compose.html" class="dropdown-item">Compose Email</a>
                                    <a href="email-templates.html" class="dropdown-item">Email Templates</a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-crm"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-users mr-1"></i> CRM <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-crm">
                                    <a href="crm-dashboard.html" class="dropdown-item">Dashboard</a>
                                    <a href="crm-contacts.html" class="dropdown-item">Contacts</a>
                                    <a href="crm-opportunities.html" class="dropdown-item">Opportunities</a>
                                    <a href="crm-leads.html" class="dropdown-item">Leads</a>
                                    <a href="crm-customers.html" class="dropdown-item">Customers</a>
                                </div>
                            </div>

                            <a href="apps-social-feed.html" class="dropdown-item"><i class="fe-rss mr-1"></i> Social
                                Feed</a>
                            <a href="apps-companies.html" class="dropdown-item"><i class="fe-activity mr-1"></i>
                                Companies</a>

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-project"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-briefcase mr-1"></i> Projects <div class="arrow-down">
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-project">
                                    <a href="project-list.html" class="dropdown-item">List</a>
                                    <a href="project-detail.html" class="dropdown-item">Detail</a>
                                    <a href="project-create.html" class="dropdown-item">Create Project</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-task"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-clipboard mr-1"></i> Tasks <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-task">
                                    <a href="task-list.html" class="dropdown-item">List</a>
                                    <a href="task-details.html" class="dropdown-item">Details</a>
                                    <a href="task-kanban-board.html" class="dropdown-item">Kanban
                                        Board</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-contact"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-book mr-1"></i> Contacts <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-contact">
                                    <a href="contacts-list.html" class="dropdown-item">Members List</a>
                                    <a href="contacts-profile.html" class="dropdown-item">Profile</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-tickets"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fe-aperture mr-1"></i> Tickets <div class="arrow-down">
                                    </div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-tickets">
                                    <a href="tickets-list.html" class="dropdown-item">List</a>
                                    <a href="tickets-detail.html" class="dropdown-item">Detail</a>
                                </div>
                            </div>
                            <a href="apps-file-manager.html" class="dropdown-item"><i class="fe-folder-plus mr-1"></i>
                                File Manager</a>
                        </div>
                    </li>

                </ul> <!-- end navbar-->
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div>