<script>
    $(document).ready(function(){
        $('.edit_district').click(function(){
        // get data from edit btn
        var sel = document.getElementById('sel');
        var districtID = $(this).attr('data-districtID');
        var districtName = $(this).attr('data-districtName');
        var provinceID = $(this).attr('data-provinceID');
        var provinceName = $(this).attr('data-provinceName');
        var opts = sel.options;
        for (var opt, j = 0; opt = opts[j]; j++) {
            if (opt.value == provinceID) {
            sel.selectedIndex = j;
            break;
            }
        }
        // set value to modal
        console.log(districtName);
        $("#districtID").val(districtID);
        $("#districtName").val(districtName);
        $("#provinceID").val(provinceID);
        $("#provinceName").val(provinceName);
        $("#edit_district_modal").modal('show');
        });
    });
</script>
<h1>จัดการอำเภอ</h1>
<form>
    <label>จังหวัด <select name="provinceID" class="form-control" required>
        <option value="">--เลือกจังหวัด--</option>
        <?php
            foreach($province_list as $province)
            {
                echo "<option value='$province->provinceID'>$province->provinceName</option>";
            }
        ?>
    </select></label>
    <label>อำเภอ <input type="text" name="districtName" class="form-control" required></label>
    <button type="submit" class="btn btn-success">เพิ่มอำเภอ</button>
</form>
<br/><br/>

	
            <table class="table table-bordered tabledata">
                <thead>
                <tr>
                    <th>อำเภอ</th>
                    <th>จังหวัด</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($district_list as $district)
                    {
                        echo "<tr>
                                <td>$district->districtName</td>
                                <td>$district->provinceName</td>
                            ";?>
                    <td align="center">
                        <a  class="btn btn-success edit_district"
                        data-districtID="<?php echo $district->districtID ?>"
                        data-districtName="<?php echo $district->districtName ?>"
                        data-provinceID="<?php echo $district->provinceID ?>"
                        data-provinceName="<?php echo $district->provinceName ?>"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
                    </td>
                    </tr>
            <?php   } ?>
                </tbody>
            </table>


<!-- The Modal -->
<div class="modal fade" id="edit_district_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">แก้ไขข้อมูล</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form >
          <input type="hidden" id="districtID" name="districtID">
          <label>* ชื่ออำเภอ<input id="districtName" type="text" name="districtName" class="form-control" required></label>
          <br/>
          <label>* ชื่อจังหวัด <select name="provinceID" class="form-control" id="sel" required>
          <option value="">--เลือกจังหวัด--</option>
            <?php
                foreach($province_list as $province)
                {
                    echo "<option value='$province->provinceID'>$province->provinceName</option>";
                }
            ?>
          </select></label>
          <br/>
          <hr>
          <input type="hidden" name="controller" value="district">
          <button type="submit" name="action" value="updateDistrict" class="btn btn-success btn-block">ยืนยันการแก้ไข</button>

        </form>
      </div>

    </div>
  </div>
</div>