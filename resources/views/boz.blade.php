<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap/3.3.7/css/bootstrap.min.css"><!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-rtl/3.3.4/css/bootstrap-rtl.min.css"><!-- rtl-bootstrap -->
    <link rel="stylesheet" href="css/custom/boz/style.css">

    <script src="js/jquery/3.2.1/jquery.min.js"></script><!-- jquery -->
    <script src="js/bootstrap/3.3.7/js/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="js/jquery-validate/1.16.0/jquery.validate.min.js"></script><!-- jquery-validate -->
    <script src="js/custom/boz/main.js"></script>
    <title>کدینگ</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <form class="form-horizontal" id="codingForm">
           <h2 class="text-center">کدینگ</h2>
           <div class="form-group">
             <label class="control-label col-sm-2" for="email">کد اصلی:</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" name="mainCode" id="mainCode">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-2" for="pwd">کد فرعی:</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" name="secondCode" id="secondCode">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-2" for="pwd">شرح:</label>
             <div class="col-sm-10">
               <input type="text" class="form-control" name="describtion" id="describtion">
             </div>
           </div>
           <div class="form-group">
             <div class="text-center">
               <button type="submit" class="btn btn-default">ثبت</button>
             </div>
           </div>
         </form>
        </div>

        <!-- <div class="col-sm-offset-1 col-sm-4">
          <ul class="list-group">
              <li class="list-group-item clearfix">
                  <span>بان
                  <span class="pull-left button-group">
                      <button class="btn btn-default btn-edit"><span class="glyphicon glyphicon-edit"></span> تغییر</button>
                      <button type="button" class="btn btn-default btn-delete"><span class="glyphicon glyphicon-remove"></span> حذف</button>
                  </span>
              </li>
          </ul>
        </div> -->
        <div class="col-sm-offset-1 col-sm-4">
          <table class="table table-fixed">
              <thead>
                <tr>
                  <th class="col-sm-2">کد اصلی</th>
                  <th class="col-sm-2">کد فرعی</th>
                  <th class="col-sm-4">شرح</th>
                  <th class="col-sm-2"></th>
                  <th class="col-sm-2"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="col-sm-2">0</td>
                  <td class="col-sm-2">1</td>
                  <td class="col-sm-4">بانک</td>
                  <td class="col-sm-2"><button class="btn btn-default btn-edit"><span class="glyphicon glyphicon-edit"></span> تغییر</button></td>
                  <td class="col-sm-2"><button type="button" class="btn btn-default btn-delete"><span class="glyphicon glyphicon-remove"></span> حذف</button></td>
                </tr>
                <tr>
                  <td class="col-sm-2">1</td>
                  <td class="col-sm-2">1</td>
                  <td class="col-sm-4">بانک ملی</td>
                  <td class="col-sm-2"><button class="btn btn-default btn-edit"><span class="glyphicon glyphicon-edit"></span> تغییر</button></td>
                  <td class="col-sm-2"><button type="button" class="btn btn-default btn-delete"><span class="glyphicon glyphicon-remove"></span> حذف</button></td>
                </tr>
                <tr>
                  <td class="col-sm-2">1</td>
                  <td class="col-sm-2">2</td>
                  <td class="col-sm-4">بانک صادرات</td>
                  <td class="col-sm-2"><button class="btn btn-default btn-edit"><span class="glyphicon glyphicon-edit"></span> تغییر</button></td>
                  <td class="col-sm-2"><button type="button" class="btn btn-default btn-delete"><span class="glyphicon glyphicon-remove"></span> حذف</button></td>
                </tr>
                <tr>
                  <td class="col-sm-2">0</td>
                  <td class="col-sm-2">1</td>
                  <td class="col-sm-4">بانک</td>
                  <td class="col-sm-2"><button class="btn btn-default btn-edit"><span class="glyphicon glyphicon-edit"></span> تغییر</button></td>
                  <td class="col-sm-2"><button type="button" class="btn btn-default btn-delete"><span class="glyphicon glyphicon-remove"></span> حذف</button></td>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </body>
</html>
