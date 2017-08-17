<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap/3.3.7/css/bootstrap.min.css"><!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-rtl/3.3.4/css/bootstrap-rtl.min.css"><!-- rtl-bootstrap -->
    <link rel="stylesheet" href="css/jquery-pDatePicker/persian-datepicker-0.4.5.min.css">
    <link rel="stylesheet" href="css/mdb/mdb.min.css">
    <link rel="stylesheet" href="css/custom/home/style.css">
    @yield('head-css')
    <script type="text/javascript" src="js/jquery/3.2.1/jquery.min.js"></script><!-- jquery -->
    <script type="text/javascript" src="js/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="js/jquery-pDatePicker/persian-datepicker-0.4.5.js"></script>
    <script src="js/jquery-pDatePicker/persian-date.js"></script>
    <script type="text/javascript" src="js/custom/partials/imgToSvg.js"></script>
    <script type="text/javascript" src="js/custom/home/main.js"></script>
    @yield('head-js')
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="sidenav text-center">
      <!-- <a href="javascript:void(0)" class="closebtn">&times;</a> -->
      <a href="/" class="home">
        <div class="img"><img class="svg menu-item-image" src="assets/home/home.svg" alt="menu-item" /></div>
        <div class="text">خانه</div>
      </a>
      <a href="/cash" class="cash">
        <div class="img"><img class="svg menu-item-image" src="assets/home/cash.svg" alt="menu-item" /></div>
        <div class="text">صندوق</div>
      </a>
      <a href="/warehouse" class="warehouse">
        <div class="img"><img class="svg menu-item-image" src="assets/home/warehouse.svg" alt="menu-item" /></div>
        <div class="text">انبار</div>
      </a>
      <a href="/abacus" class="abacus">
        <div class="img"><img class="svg menu-item-image" src="assets/home/abacus.svg" alt="menu-item" /></div>
        <div class="text">حسابداری</div>
      </a>
      <a href="/report" class="report">
        <div class="img"><img class="svg menu-item-image" src="assets/home/line-chart.svg" alt="menu-item" /></div>
        <div class="text">گزارشات</div>
      </a>
      <a href="/manage" class="manage">
        <div class="img"><img class="svg menu-item-image" src="assets/home/clerk.svg" alt="menu-item" /></div>
        <div class="text">مدیریت</div>
      </a>
      <a href="/customer" class="customer">
        <div class="img"><img class="svg menu-item-image" src="assets/home/group.svg" alt="menu-item" /></div>
        <div class="text">مشتری</div>
      </a>
      <a href="/settings" class="settings">
        <div class="img"><img class="svg menu-item-image" src="assets/home/settings.svg" alt="menu-item" /></div>
        <div class="text">تنظیمات</div>
      </a>
    </div>

   <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
    <div class="container-fluid main">
      @yield('body')
   </div>
   <script type="text/javascript" src="js/mdb/mdb.min.js"></script>
  </body>
</html>
