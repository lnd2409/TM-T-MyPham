 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('trangchu') }}" class="brand-link">
      <img src="{{asset('front-end')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Trang chủ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('front-end')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Xin chào 
{{-- {{ \Auth::guard('nhanvien')->user()->nv_id}} --}}
            @if (Auth::guard('nhanvien')->user()->q_id == 1)
                ADMIN
            @else
              Nhân viên
            @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{-- Cái sidebar sửa ở đây là được --}}
          <li class="nav-item ">
            <a href="{{ route('admin') }}" class="nav-link  {{ Request::path() == 'admin' ? 'active' : '' }}">
              <i class="nav-icon fa fa-tachometer"></i>
              <p>
                Bảng điều khiển
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{ route('danhsachloai') }}" class="nav-link  {{ Request::path() == 'admin/loai' ? 'active' : '' }}">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Loại sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('danhsachxuatxu') }}" class="nav-link {{ Request::path() == 'admin/xuatxu' ? 'active' : '' }}">
              <i class="nav-icon fa fa-language"></i>
              <p>
                Xuất xứ sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('danhsachlo') }}" class="nav-link {{ Request::path() == 'admin/lo' ? 'active' : '' }}">
              <i class="nav-icon fa fa-archive"></i>
              <p>
                Lô hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('danhsachsanpham', ['sort'=> 'danh-sach']) }}" class="nav-link
              @if (
                Request::path() == 'admin/san-pham/danh-sach' || 
                Request::path() == 'admin/san-pham/gia-tang' ||
                Request::path() == 'admin/san-pham/gia-giam'
                )
                active
              @endif
              ">
              <i class="nav-icon far fa-heart"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview 
            @if (Request::path() == 'admin/congdung' || Request::path() == 'admin/congdungphu')
              menu-open
            @endif
          ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tác dụng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('danhsachcongdung') }}" class="nav-link {{ Request::path() == 'admin/congdung' ? 'active' : '' }}" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tác dụng chính</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('danhsachcongdungphu') }}" class="nav-link {{ Request::path() == 'admin/congdungphu' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tác dụng phụ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview
            @if (Request::path() == 'admin/khuyenmai/voucher')
              menu-open
            @endif 
            ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Khuyến mãi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item ">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Theo loại sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link 
                {{-- @if (Request::path() == 'admin/khuyenmai/voucher')
                  active
                @endif --}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Theo khách hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('voucher') }}" class="nav-link
                  @if (Request::path() == 'admin/khuyenmai/voucher')
                    active
                  @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo voucher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link 
                {{-- @if (Request::path() == 'admin/khuyenmai/voucher')
                  active
                @endif --}}
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flash Sale</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('banner') }}" class="nav-link ">
              <i class="nav-icon far fa fa-picture-o"></i>
              <p>
                Banner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('danhsachhinhthucthanhtoan') }}" class="nav-link ">
              <i class="nav-icon fa fa fa-money"></i>
              <p>
                Hình thức thanh toán
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('danhsachhinhthucvanchuyen') }}" class="nav-link ">
              <i class="nav-icon fa fa-fighter-jet"></i>
              <p>
                Hình thức vận chuyển
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>