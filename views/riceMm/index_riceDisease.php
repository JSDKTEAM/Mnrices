<h1 class="page-header">จัดการโรคข้าว</h1>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
  เพิ่มโรคข้าว
</button>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog" style="width:980px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">เพิ่มโรคข้าว</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
            <label>ชื่อ <input type="text" class="form-control" name="name"></label><br/>
            <label>พื้นที่ที่พบ <textarea rows="5" cols="50" class="form-control" name="location"></textarea></label>
            <label>ลักษณะอาการ <textarea rows="5" cols="50" class="form-control" name="symptom"></textarea></label>
            <label>การแพร่ระบาด <textarea rows="5" cols="50" class="form-control" name="dispersed"></textarea></label>
            <label>การป้องกัน <textarea rows="5" cols="50" class="form-control" name="prevention"></textarea></label>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-block" data-dismiss="modal">เพิ่มข้อมูล</button>
      </div>

    </div>
  </div>
</div>
<br/><br/>
<table class="table table-bordered">
  <tr>
    <th>ชื่อ</th>
    <th>พื้นที่ที่พบ</th>
    <th>ลักษณะอาการ</th>
    <th>การแพร่ระบาด</th>
    <th>การป้องกัน</th>
  </tr>
  <tr>
    <?php ?>
  </tr>
</table>
