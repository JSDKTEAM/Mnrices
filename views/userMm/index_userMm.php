
<h1>จัดการผู้ใช้</h1>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal">
  เพิ่มผู้ใช้
</button>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog" style="width:800px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">เพิ่มผู้ใช้</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="GET">
        <div class="col-md-6">
          <div class="form-group">
            <label>* Username</label><input type="text" name="userName" class="form-control css-require" data-validation="required">
          </div>
          <div class="form-group">
            <label>* Password </label><input type="password"  name="pass_confirmation" class="form-control" data-validation="strength" data-validation-strength="2">
          </div>
          <div class="form-group">
            <label>* Confirm Password </label><input type="password"  name="pass" class="form-control" data-validation="confirmation">
          </div>  
          <div class="form-group">
            <label>* ชื่อ </label><input type="text" class="form-control" data-validation="required">
          </div>  
          <div class="form-group">
            <label>* นามสุกล </label><input type="text" class="form-control" data-validation="required">
          </div>  
          <br/>
        </div>
        <div class="col-md-6">
          <label>* เบอร์โทรศัพท์ </label><input type="text" class="form-control">
          <label>* Email </label><input type="email" class="form-control" data-validation="email">
          <label>หน่วยงาน </label><select name=""  class="form-control">
            <option value="">--เลือกหน่วยงาน--</option>
            <?php
              foreach($department_list as $department)
              {
                echo "<option value='$department->depID'>$department->depName</option>";
              } 
            ?>
          </select>
          <h3>* Permission</h3>
          <label class="checkbox-inline">
            <input type="checkbox" value="">Staff
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="">Expert
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="">Dep
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" value="">Admin
          </label>
   
          </div>
          <br/>
          <hr>
          <button type="submit" class="btn btn-success btn-block">เพิ่มข้อมูล</button>
        </form>
      </div>

    </div>
  </div>
</div>
<br/><br/>
<form action="">
    <label for="">ค้นหา<input type="text" name="key" class="form-control"></label>
</form>
<br/>
<div class="panel panel-default">
	<div class="panel-heading">ผู้ใช้</div>
		<div class="panel-body">
      <table class="table table-bordered">
        <tr>
          <th>Username</th>
          <th>ชื่อ</th>
          <th>เบอร์</th>
          <th>อีเมล์</th>
          <th>สถานะ</th>
          <th>สิทธิ์การขอดาวน์โหลดภาพ</th>
          <th>Permission</th>
          <th>หน่วยงาน</th>
        </tr>
        <tr>
          <?php ?>
        </tr>
      </table>
    </div>
  </div>
</div>

<script>
 $.validate({
 modules: 'security, file',
 onModulesLoaded: function () {
 $('input[name="pass_confirmation"]').displayPasswordStrength();
 }
 });
 </script>