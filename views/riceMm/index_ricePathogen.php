<h1 class="page-header">จัดการเชื้อโรคข้าว</h1>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
  เพิ่มเชื้อโรคข้าว
</button>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog" >
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">เพิ่มเชื้อโรคข้าว</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="">
            <label>ชื่อสามัญ <input type="text" class="form-control" name="commonName"></label><br/>
            <label>ชื่อวิทยาศาสตร์ <input type="text" class="form-control" name="scientificName"></label><br/>
            <label>ชนิด <input type="text" class="form-control" name="type"></label><br/>
            <label>รายละเอียด <textarea rows="5" cols="50" class="form-control" name="description"></textarea></label>
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
    <th>ชนิด</th>
    <th>รายละเอียด</th>
  </tr>
  <tr>
    <?php
    if($pathogen_list)
    { 
      foreach($pathogen_list as $pathogen)
      {
          echo "<tr>
                  <td>$pathogen->commonName</td>
                  <td>$pathogen->scientificName</td>
                  <td>$pathogen->type</td>
                  <td>$pathogen->description</td>
                </tr>";
      }
   } ?>
  </tr>
</table>