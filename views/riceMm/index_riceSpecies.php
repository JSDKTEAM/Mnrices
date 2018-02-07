<h1 class="page-header">จัดการพันธุ์ข้าว</h1>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
  เพิ่มพันธุ์ข้าว
</button>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog" style="width:980px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">เพิ่มพันธุ์ข้าว</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
            <label>ชื่อสามัญ <input type="text" class="form-control" name="commonName"></label>
            <label>ชื่อวิทยาศาสตร์ <input type="text" class="form-control" name="scientificName"></label>
            <label>ชื่อพันธุ์ <input type="text" class="form-control" name="speciesName"></label>
            <label>ชนิดข้าว <input type="text" class="form-control" name="type"></label><br/>
            <label>ประวัติพันธุ์ข้าว <textarea rows="5" cols="50" class="form-control" name="history"></textarea></label>
            <label>ลักษณะประจำพันธุ์ <textarea rows="5" cols="50" class="form-control" name="characteristic"></textarea></label>
            <label>ผลผลิต(กก)/ไร่ <input type="text" class="form-control" name="productRate"></label><br/>
            <label>ลักษณะเด่น <textarea rows="5" cols="50" class="form-control" name="feature"></textarea></label>
            <label>ข้อควรระวัง <textarea rows="5" cols="50" class="form-control" name="notice"></textarea></label>
            <label>พื้นที่แนะนำ <textarea rows="5" cols="110" class="form-control"  name="recommendArea"></textarea></label>
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
    <th>ชื่อสามัญ</th>
    <th>ชื่อวิทยาศาสตร์</th>
    <th>ชื่อพันธุ์</th>
    <th>ชนิดข้าว</th>
    <th></th>
  </tr>
  <tr>
    <?php ?>
  </tr>
</table>
