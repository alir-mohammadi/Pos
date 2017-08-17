@extends('layouts.sidenav')
@section('title', 'Pos')

@section('head-css')
<link rel="stylesheet" href="css/custom/components/radioButton.css">
<link rel="stylesheet" href="css/custom/customer/style.css">
@endsection

@section('head-js')
<script src="js/custom/customer/main.js"></script>
@endsection

@section('body')
    <form class="form-horizontal" method="post" action="/customer/search">
      {{csrf_field()}}
      <div class="row code-row">
        <div class="md-form col-sm-offset-1 col-sm-2">
            <input type="text" class="form-control" id="code" name="Code">
            <label for="code">کد</label>
        </div>
        <div class="col-sm-offset-7 col-sm-2">
          <div class="addCustomer svg-wrapper">
            <svg height="50" width="120" xmlns="http://www.w3.org/2000/svg">
              <rect class="shape" height="50" width="120"/>
            </svg>
             <div class="text">افزودن مشتری</div>
          </div>
        </div>
      </div>
      <div class="row kind-row">
        <div class="form-group">
          <label class="control-label col-sm-offset-1 col-sm-1" for="kind">نوع:</label>
          <div class="col-sm-10">
            <div class="radio">
              <input type="radio" name="Kind" id="legal" class="toggle toggle-left" value="0"><label for="legal" class="btn kind">حقوقی</label>
              <input type="radio" name="Kind" id="real" class="toggle toggle-right" value="1" checked><label for="real" class="btn kind">حقیقی</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row name-row">
        <div class="md-form col-sm-offset-1 col-sm-2">
            <input type="text" class="form-control" id="firstName" name="Name">
            <label for="firstName">نام</label>
        </div>
        <div class="md-form col-sm-offset-1 col-sm-3">
            <input type="text" class="form-control" id="lastName" name="Family">
            <label for="lastName">نام خانوادگی</label>
        </div>
        <div class="md-form col-sm-offset-1 col-sm-2">
            <input type="text" class="form-control" id="fatherName" name="FatherName">
            <label for="fatherName">نام پدر</label>
        </div>
      </div>
      <div class="row point-row">
        <div class="md-form col-sm-offset-1 col-sm-2">
            <input type="text" class="form-control" id="point" name="Point">
            <label for="point">امتیاز</label>
        </div>
      </div>
      <div class="row status-row">
        <div class="form-group">
          <label class="control-label col-sm-offset-1 col-sm-1" for="status">وضعیت:</label>
          <div class="col-sm-3">
            <div class="radio">
              <input type="radio" name="Status" id="inActive" class="toggle toggle-left" value="0"><label for="inActive" class="btn">غیرفعال</label>
              <input type="radio" name="Status" id="active" class="toggle toggle-right" value="1" checked><label for="active" class="btn">فعال</label>
            </div>
          </div>
          <label class="control-label col-sm-2">نوع پرداخت:</label>
          <div class="col-sm-5">
            <div class="checkbox">
              <input type="checkbox" name="Cash" id="cash" value="1"><label for="cash">نقد</label>
              <input type="checkbox" name="Check" id="check" value="1"><label for="check">چک</label>
              <input type="checkbox" name="Credit" id="credit" value="1"><label for="credit">نسیه</label>
            </div>
          </div>
        </div>
      </div>
      <div class="row button-row">
        <div class="col-sm-offset-10 col-sm-2">
          <div class="button svg-wrapper">
            <svg height="50" width="120" xmlns="http://www.w3.org/2000/svg">
              <rect class="shape" height="50" width="120" />
            </svg>
             <input type="submit">جستجو</input>
          </div>
        </div>
      </div>
    </form>

    <section class="tbl">
      <!--for demo wrap-->
      <h1 class="tbl-title">لیست مشتری ها</h1>
      <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>کد</th>
              <th>نام</th>
              <th>نام خانوادگی</th>
              <th>نام پدر</th>
              <th class="pp">امتیاز</th>
              <th>نوع پرداخت</th>
              <th>شماره موبایل</th>
              <th>شماره ثابت</th>
              <th>تاریخ تولد</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <tr>
              <td>13143242</td>
              <td>علی</td>
              <td>طباطبایی</td>
              <td>سعید</td>
              <td class="pp">250</td>
              <td>نقد</td>
              <td>09128251880</td>
              <td>02126151887</td>
              <td>1376/1/1</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <div class="modal">
      <div class="modal-background"></div>
      <div class="modal-card">
        <header class="modal-card-head">
          <div class="modal-card-title">
            <div class="img">
              <img class="svg" src="assets/home/group.svg">
            </div>
            <span>افزودن مشتری</span>
          </div>
        </header>
        <section class="modal-card-body">
          <div class="container-fluid">
            <form class="form-horizontal">
              <div class="row code-row">
                <div class="md-form col-sm-offset-1 col-sm-3">
                    <input type="text" class="form-control" id="code2" name="Code">
                    <label for="code2">کد</label>
                </div>
              </div>

              <div class="row kind-row">
                <div class="form-group">
                  <label class="control-label col-sm-offset-1 col-sm-1" for="kind">نوع:</label>
                  <div class="col-sm-4">
                    <div class="radio">
                      <input type="radio" name="Kind" id="legal2" class="toggle toggle-left" value="0"><label for="legal2" class="btn kind">حقوقی</label>
                      <input type="radio" name="Kind" id="real2" class="toggle toggle-right" value="1" checked><label for="real2" class="btn kind">حقیقی</label>
                    </div>
                  </div>
                  <label class="control-label col-sm-offset-1 col-sm-1" for="status">وضعیت:</label>
                  <div class="col-sm-4">
                    <div class="radio">
                      <input type="radio" name="Status" id="active2" class="toggle toggle-left" value="0"><label for="active2" class="btn">غیرفعال</label>
                      <input type="radio" name="Status" id="inActive2" class="toggle toggle-right" value="1" checked><label for="inActive2" class="btn">فعال</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row name-row">
                <div class="md-form col-sm-offset-1 col-sm-3">
                    <input type="text" class="form-control" id="firstName2" name="Name">
                    <label for="firstName2">نام</label>
                </div>
                <div class="md-form col-sm-offset-1 col-sm-4">
                    <input type="text" class="form-control" id="lastName2" name="Family">
                    <label for="familyName2">نام خانوادگی</label>
                </div>
              </div>

              <div class="row point-row">
                <div class="md-form col-sm-offset-1 col-sm-3">
                    <input type="text" class="form-control" id="fatherName2" name="FatherName">
                    <label for="fatherName2">نام پدر</label>
                </div>
                <div class="md-form col-sm-offset-1 col-sm-3">
                    <input type="text" class="form-control" id="point2" name="Point">
                    <label for="point2">امتیاز</label>
                </div>
              </div>
              <div class="row status-row">
                <div class="form-group">
                  <label class="control-label col-sm-offset-1 col-sm-2">نوع پرداخت:</label>
                  <div class="col-sm-9">
                    <div class="checkbox">
                      <input type="checkbox" name="PayKind[]" id="cash2" value="1"><label for="cash2">نقد</label>
                      <input type="checkbox" name="PayKind[]" id="check2" value="1"><label for="check2">چک</label>
                      <input type="checkbox" name="PayKind[]" id="credit2" value="1"><label for="credit2">نسیه</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row phone-row">
                <div class="md-form col-sm-offset-1 col-sm-4">
                    <input type="text" class="form-control" id="phoneNumber2" name="Phone">
                    <label for="phoneNumber2">تلفن ثابت</label>
                </div>
                <div class="md-form col-sm-offset-1 col-sm-4">
                    <input type="text" class="form-control" id="mobileNumber2" name="CellNo">
                    <label for="mobileNumber2">شماره موبایل</label>
                </div>
              </div>
              <div class="row">
                <div class="md-form col-sm-offset-1 col-sm-4">
                    <input type="text" class="form-control inModal" id="BDate2" name="BDate">
                    <label for="BDate2">تاریخ تولد</label>
                </div>
              </div>
              <div class="row">
                <div class="button svg-wrapper">
                  <svg height="50" width="120" xmlns="http://www.w3.org/2000/svg">
                    <rect class="shape" height="50" width="120"/>
                  </svg>
                   <div class="text">ذخیره</div>
                </div>
              </div>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
