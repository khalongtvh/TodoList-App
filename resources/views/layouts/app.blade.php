<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="https://cdn.icon-icons.com/icons2/3041/PNG/512/trello_logo_icon_189227.png" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    .form-search .search-ajax-result {
      padding: 10px;
      width: 15%;
      position: absolute;
      background-color: white;
    }

    /* .form-search .search-item-card :hover{
      background-color: red;
    } */
  </style>
</head>

<body>
  <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background:#233137a6; border-bottom: 1px solid #ffffff4a;">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">KanBan</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0 form-search">
      <div class="input-group">
        <input name="search" class="form-control input-search-ajax" type="text" placeholder="Search for card..." aria-label="Search for card..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>

      </div>
      <div class="search-ajax-result">
        <div class="search-item-card">
          <div class="media-body">
          </div>
        </div>
      </div>
    </form>

    <!-- Navbar-->
    <div class="navbar_right">
      <div class="notifications">
        <div class="icon_wrap"><i class="far fa-bell"></i></div>
        <div class="notification_dd">
          <ul class="notification_ul">

          </ul>
        </div>
      </div>
      <div class="profile">
        <div class="icon_wrap">
          <img src="https://www.babelio.com/users/AVT_John-Barrowman_3866.jpg" alt="profile_pic">
          <span class="name">John Alex</span>
          <i class="fas fa-chevron-down"></i>
        </div>
        <div class="profile_dd">
          <ul class="profile_ul">
            <li><a class="profile" href="#"><span class="picon"><i class="fas fa-user-alt"></i></span>address</a></li>
            <li><a class="settings" href="#"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li>
            <li><a class="logout" href="{{route('logout')}}"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
        <div class="sb-sidenav-menu" style="background:#233137a6; border-right: 1px solid #ffffff4a;">
          <div class="nav">
            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
            <a class="nav-link" href="#">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Workspaces
            </a>
            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Recent
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">

              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
              Pages
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
              </nav>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid py-4">
          @yield('content')
        </div>
      </main>
    </div>
  </div>












  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


  <script>
    $(document).ready(function() {
      $('.search-ajax-result').hide();

      $('.input-search-ajax').keyup(function() {
        var value = $(this).val();
        if (value == '') {
          $('.search-ajax-result').hide();
        } else {
          $.ajax({
            url: "/ajax-search-task",
            type: "GET",
            data: {
              'search': value
            },
            success: function(data) {
              $('.search-item-card').html(data);
              $('.search-ajax-result').show();
            }
          });
        }

      });
    })
  </script>

  @yield('scripts')
</body>
<style>
  * {
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
  }

  a {
    color: #7f8db0;
  }

  .wrapper {
    width: 100%;
    height: 100%;
  }

  .navbar {
    background: #fff;
    width: 100%;
    height: 60px;
    padding: 0 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
  }

  .navbar .navbar_left .logo a {
    font-family: 'Trade Winds';
    font-size: 20px;
  }

  .navbar .navbar_right {
    display: flex;
  }

  .navbar .navbar_right img {
    width: 35px;
  }

  .navbar .navbar_right .icon_wrap {
    cursor: pointer;
  }

  .navbar .navbar_right .notifications {
    margin-right: 25px;
  }

  .navbar .navbar_right .notifications .icon_wrap {
    font-size: 28px;
    color: white;
  }

  .navbar .navbar_right .profile,
  .navbar .navbar_right .notifications {
    position: relative;
  }

  .navbar .profile .profile_dd,
  .notification_dd {
    position: absolute;
    top: 48px;
    right: -15px;
    user-select: none;
    background: #fff;
    border: 1px solid #c7d8e2;
    width: 350px;
    height: auto;
    display: none;
    border-radius: 3px;
    box-shadow: 10px 10px 35px rgba(0, 0, 0, 0.125),
      -10px -10px 35px rgba(0, 0, 0, 0.125);
  }

  .navbar .profile .profile_dd:before,
  .notification_dd:before {
    content: "";
    position: absolute;
    top: -20px;
    right: 15px;
    border: 10px solid;
    border-color: transparent transparent #fff transparent;
  }

  .notification_dd li {
    border-bottom: 1px solid #f1f2f4;
    padding: 10px 20px;
    display: flex;
    align-items: center;
  }

  .notification_dd li .notify_icon {
    display: flex;
  }

  .notification_dd li .notify_icon .icon {
    display: inline-block;
    background: url('https://i.imgur.com/MVJNkqW.png') no-repeat 0 0;
    width: 40px;
    height: 42px;
  }

  .notification_dd li.baskin_robbins .notify_icon .icon {
    background-position: 0 -43px;
  }

  .notification_dd li.mcd .notify_icon .icon {
    background-position: 0 -86px;
  }

  .notification_dd li.pizzahut .notify_icon .icon {
    background-position: 0 -129px;
  }

  .notification_dd li.kfc .notify_icon .icon {
    background-position: 0 -178px;
  }

  .notification_dd li .notify_data {
    margin: 0 15px;
    width: 185px;
  }

  .notification_dd li .notify_data .title {
    color: #000;
    font-weight: 600;
  }

  .notification_dd li .notify_data .sub_title {
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-top: 5px;
  }

  .notification_dd li .notify_status p {
    font-size: 12px;
  }

  .notification_dd li.duesoon .notify_status p {


    color: #f3f3f3;
    background: #ff0000;
    padding: 0 5px;
  }

  .notification_dd li.overdue .notify_status p {
    color: #000000;
    background: #fff700;
    padding: 0 5px;
  }

  .notification_dd li.show_all {
    padding: 20px;
    display: flex;
    justify-content: center;
  }

  .notification_dd li.show_all p {
    font-weight: 700;
    color: #3b80f9;
    cursor: pointer;
  }

  .notification_dd li.show_all p:hover {
    text-decoration: underline;
  }

  .navbar .navbar_right .profile .icon_wrap {
    display: flex;
    align-items: center;
    color: white;
  }

  .navbar .navbar_right .profile .name {
    display: inline-block;
    margin: 0 10px;
  }

  .navbar .navbar_right .icon_wrap:hover,
  .navbar .navbar_right .profile.active .icon_wrap,
  .navbar .navbar_right .notifications.active .icon_wrap {
    color: #3b80f9;
  }

  .navbar .profile .profile_dd {
    width: 225px;
  }

  .navbar .profile .profile_dd:before {
    right: 10px;
  }

  .navbar .profile .profile_dd ul li {
    border-bottom: 1px solid #f1f2f4;
  }

  .navbar .profile .profile_dd ul li a {
    display: block;
    padding: 15px 35px;
    position: relative;
  }

  .navbar .profile .profile_dd ul li a .picon {
    display: inline-block;
    width: 30px;
  }

  .navbar .profile .profile_dd ul li a:hover {
    color: #3b80f9;
    background: #f0f5ff;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }

  .navbar .profile .profile_dd ul li.profile_li a:hover {
    background: transparent;
    cursor: default;
    color: #7f8db0;
  }

  .navbar .profile .profile_dd ul li .btn {
    height: 32px;
    padding: 7px 10px;
    color: #fff;
    border-radius: 3px;
    cursor: pointer;
    text-align: center;
    background: #3b80f9;
    width: 125px;
    margin: 5px auto 15px;
  }

  .navbar .profile .profile_dd ul li .btn:hover {
    background: #6593e4;
  }

  .navbar .profile.active .profile_dd,
  .navbar .notifications.active .notification_dd {
    display: block;
  }

  .popup {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: all 0.2s ease;
    display: none;
  }

  .popup .shadow {
    width: 100%;
    height: 100%;
    background: #000;
    opacity: 0.6;
  }

  .popup .inner_popup {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: auto;
  }

  .popup .notification_dd {
    display: block;
    position: static;
    margin: 0 auto;
    height: 357px;
    overflow: auto;
  }

  .popup .notification_dd:before {
    display: none;
  }

  .popup .notification_dd li.title {
    font-weight: 700;
    color: #3b80f9;
    display: flex;
    justify-content: center;
    position: relative;
  }

  .popup .notification_dd li.title .close {
    position: absolute;
    top: 2px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
  }

  .popup .notification_dd li.title .close:hover {
    opacity: 0.5;
  }
</style>

</html>