<div class="container">
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
        <form role="form" method="POST">
        <div class="col-md-6">
          <div class="form-group">
            <label>* Username</label><input type="text" name="userName" class="form-control" required>
          </div>
          <div class="form-group">
            <label>* Password </label><input type="password"  name="pass_confirmation" class="form-control" required>
          </div>
          <div class="form-group">
            <label>* Confirm Password </label><input type="password"  name="pass" class="form-control" required>
          </div>  
          <div class="form-group">
            <label>* ชื่อ </label><input type="text" name="fname" class="form-control" required>
          </div>  
          <div class="form-group">
            <label>* นามสุกล </label><input type="text" name="lname" class="form-control" required>
          </div>  
          <br/>
        </div>
        <div class="col-md-6">
          <label> เบอร์โทรศัพท์ </label><input type="text" name="phone" class="form-control" >
          <label> Email </label><input type="email" name="email" class="form-control">
          <label>หน่วยงาน </label>
            <input list="deps" name="dep"  class='form-control' id="list-dep">
            <datalist id="deps">
            <?php
              foreach($department_list as $department)
              {
                echo "<option value='$department->depName' data-id='$department->depID'>";
              } 
            ?>
            </datalist>
          <h3>* Permission</h3>
          <label class="checkbox-inline">
            <input type="checkbox" name="status[]" value="Staff">Staff
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="status[]" value="Expert">Expert
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="status[]" value="researcher">researcher 
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="status[]" value="researcher IP">researcher IP  
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="status[]" value="Admin">Admin
          </label>
   
          </div>
          <br/>
          <hr>
          <input type="hidden" name="controller" value="user">
          <button type="submit" class="btn btn-success btn-block" name="action" value="addUserByAdmin">เพิ่มข้อมูล</button>
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
      <table class="table table-bordered tabledata">
        <tr>
          <th>Username</th>
          <th>ชื่อ</th>
          <th>นามสุกล</th>
          <th>เบอร์</th>
          <th>อีเมล์</th>
          <th>หน่วยงาน</th>
        </tr>
        <tr>
          <?php //print_r($user_list);
          foreach($user_list as $key=>$value)
          {
              echo "<tr>
                      <td>$value->userName</td>
                      <td>$value->firstName</td>
                      <td>$value->lastname</td>
                      <td>$value->phone</td>
                      <td>$value->email</td>";
              if($value->depID == '')
              {
                echo "<td>$value->depName_user</td>";
              }
              else
              {
                echo "<td>$value->depName</td>";
              }
          ?>
          <td>
          </td>
          </tr>
          <?php
          }?>
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