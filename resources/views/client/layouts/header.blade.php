  <!-- Begin Body Wrapper -->
  <div class="body-wrapper">
      <!-- Begin Header Area -->
      <header>
          <!-- Begin Header Top Area -->
          <div class="header-top">
              <div class="container">
                  <div class="row">
                      <!-- Begin Header Top Left Area -->
                      <div class="col-lg-3 col-md-4">
                          <div class="header-top-left">
                              <ul class="phone-wrap">
                                  <li>
                                      <a href="{{route('client.seller')}}">
                                          <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                                          <span>Kênh người bán</span>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <!-- Header Top Left Area End Here -->
                      <!-- Begin Header Top Right Area -->
                      <div class="col-lg-9 col-md-8">
                          <div class="header-top-right">
                              <ul class="ht-menu">
                                  @if ((Auth::guard('customer')->check()) != null)
                                  <li>
                                  
                                  <span>Đăng nhập thành công</span>
                                    
                                  </li>
                                  <li>
                                    
                                      <div class="ht-setting-trigger is-active">
                                      <div class="avatar_pic">
                                        <img src="#" class="img_avatar_pic" alt="avatar">
                                        </div>
                                    </div>
                                      
                                      <div class="setting ht-setting" style="display: none;">
                                          <ul class="ht-setting-list">
                                              <li><a class="dropdown-item" href="#"> Profile</a></li>
                                              <li><a href="{{route('dang-xuat-client')}}">Đăng xuất</a></li>
                                          </ul>
                                      </div>
                                  </li>
                                  
                                  @else

                                  <!-- Begin Currency Area -->
                                  <li>
                                      <a href="{{route('dang-ky')}}" id="frm_register">
                                          <i class="fa fa-user-plus pr-1"></i>
                                          <span class="currency-selector-wrapper">Đăng ký</span>

                                          <!-- End  modal Register-->
                                      </a>
                                  </li>
                                  <!-- Currency Area End Here -->
                                  <!-- Begin Language Area -->

                                  <li>
                                      <a href="{{route('dang-nhap-client')}}">
                                          <i class="fa fa-user-circle pr-1"></i>
                                          <span class="language-selector-wrapper">Đăng nhập</span>
                                          <!-- Modal Login -->

                                          <!-- End  modal Login-->
                                      </a>
                                  </li>
                                  <!-- Language Area End Here -->

                                  @endif
                              </ul>
                          </div>
                      </div>
                      <!-- Header Top Right Area End Here -->
                  </div>
              </div>
          </div>
          <!-- Header Top Area End Here -->
          <!-- Begin Header Middle Area -->
          <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
              <div class="container">
                  <div class="row">
                      <!-- Begin Header Logo Area -->
                      <div class="col-lg-3">
                          <div class="logo pb-sm-30 pb-xs-30">
                              <a href="{{ route('client.index')}}">
                                  <img src="{{asset('assets/client/images/menu/logo/3.png')}}" alt="">
                              </a>
                          </div>
                      </div>
                      <!-- Header Logo Area End Here -->
                      <!-- Begin Header Middle Right Area -->
                      <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                          <!-- Begin Header Middle Searchbox Area -->
                          <form action="{{route('searchResult')}}" class="hm-searchbox">
                              <input type="text" name="key" placeholder="Nhập khóa tìm kiếm của bạn ...">
                              <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                          </form>
                          <!-- Header Middle Searchbox Area End Here -->
                          <!-- Begin Header Middle Right Area -->
                          @include('client.pages.mini-cart')
                          <!-- Header Middle Right Area End Here -->
                      </div>
                      <!-- Header Middle Right Area End Here -->
                  </div>
              </div>
          </div>
          <!-- Header Middle Area End Here -->

          <!-- Begin Mobile Menu Area -->
          <div class="mobile-menu-area d-lg-none d-xl-none col-12">
              <div class="container">
                  <div class="row">
                      <div class="mobile-menu">
                      </div>
                  </div>
              </div>
          </div>
          <!-- Mobile Menu Area End Here -->
      </header>