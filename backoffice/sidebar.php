        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="<?php echo $urlweb; ?>/dashboard/" class="app-brand-link">
              <img src="<?php echo $urlwebs; ?>/upload/<?php echo $s0['image']; ?>" alt="logo icon" style="display: block; margin: 0 auto; width: 100%;">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>

          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active">
              <a href="<?php echo $urlweb; ?>/dashboard/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboard</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlwebs; ?>/" class="menu-link" target="_blank">
                <i class="menu-icon tf-icons ti ti-globe"></i>
                <div data-i18n="Lihat Toko">Lihat Toko</div>
              </a>
            </li>

            <!-- Information -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Informasi</span>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/page/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                <div data-i18n="Halaman Konten">Halaman Konten</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/slide/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-album"></i>
                <div data-i18n="Tayangan Slide">Tayangan Slide</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/social/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-share"></i>
                <div data-i18n="Sosial Media">Sosial Media</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/member/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Basik Member">Basik Member</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/reseller/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Reseller Member">Reseller Member</div>
              </a>
            </li>
            <?php if ($u['level'] == 'superadmin') { ?>
              <li class="menu-item">
                <a href="<?php echo $urlweb; ?>/user/" class="menu-link">
                  <i class="menu-icon tf-icons ti ti-user-plus"></i>
                  <div data-i18n="Tambah Akun Pengguna">Tambah Akun Pengguna</div>
                </a>
              </li>
            <?php } ?>
            <!-- Product -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Produk</span>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/category/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-list"></i>
                <div data-i18n="Kategori">Kategori</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/product/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-gamepad"></i>
                <div data-i18n="Produk Game">Produk Game</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/prepaid/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-mobile"></i>
                <div data-i18n="Produk Prabayar">Produk Prabayar</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/social_media/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-brand-instagram"></i>
                <div data-i18n="Produk Sosial">Produk Sosial</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/product_apigames/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-gamepad"></i>
                <div data-i18n="Produk Apigames">Produk Apigames</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/product_manual/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-ticket"></i>
                <div data-i18n="Tambah Produk Manual">Tambah Produk Manual</div>
              </a>
            </li>

            <!-- Transaction -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Transaksi</span>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/order/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Daftar Pesanan">Daftar Pesanan</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/topup/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-currency-dollar"></i>
                <div data-i18n="Permintaan Isi Ulang Saldo">Permintaan Isi Ulang Saldo</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/payment/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Riwayat Pembayaran">Riwayat Pembayaran</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="<?php echo $urlweb; ?>/balance/" class="menu-link">
                <i class="menu-icon tf-icons ti ti-wallet"></i>
                <div data-i18n="Saldo Member">Saldo Member</div>
              </a>
            </li>

            <!-- SYSTEM -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Sistem</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-api-app"></i>
                <div data-i18n="Kelola API">Kelola API</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/provider/" class="menu-link">
                    <div data-i18n="Layanan/Provider">Layanan/Provider</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/payment_gateway/" class="menu-link">
                    <div data-i18n="Payment Gateway">Payment Gateway</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/cekmutasi/" class="menu-link">
                    <div data-i18n="Cekmutasi">Cekmutasi</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/whatsapp/" class="menu-link">
                    <div data-i18n="Whatsapp API">Whatsapp API</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Pengaturan">Pengaturan</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/setting/" class="menu-link">
                    <div data-i18n="SEO Website & Logo">SEO Website & Logo</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/template/" class="menu-link">
                    <div data-i18n="Templat">Templat</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/jenis/" class="menu-link">
                    <div data-i18n="Tab Produk Halaman Utama">Tab Produk Halaman Utama</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/admin/" class="menu-link">
                    <div data-i18n="Penjualan Denan Markup">Penjualan Denan Markup</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/service/" class="menu-link">
                    <div data-i18n="Ambil Produk API">Ambil Produk API</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/voucher/" class="menu-link">
                    <div data-i18n="Tambah Voucher">Tambah Voucher</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/banner/" class="menu-link">
                    <div data-i18n="Pop Up Halaman Utama">Pop Up Halaman Utama</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="<?php echo $urlweb; ?>/popup_product/" class="menu-link">
                    <div data-i18n="Pop Up Produk">Pop Up Produk</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>