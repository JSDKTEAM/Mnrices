<script>
    $(document).ready(function(){
        $('.edit_disease').click(function(){
        // get data from edit btn
        var diseaseID = $(this).attr('data-diseaseID');
        var diseaseName = $(this).attr('data-diseaseName');
        var diseaseLocation = $(this).attr('data-diseaseLocation');
        var diseaseSymptom = $(this).attr('data-diseaseSymptom');
        var diseaseDispersed = $(this).attr('data-diseaseDispersed');
        var diseasePrevention = $(this).attr('data-diseasePrevention');
        console.log("diseaseName");
        // set value to modal
        $("#diseaseID").val(diseaseID);
        $("#diseaseName").val(diseaseName);
        $("#diseaseLocation").val(diseaseLocation);
        $("#diseaseSymptom").val(diseaseSymptom);
        $("#diseaseDispersed").val(diseaseDispersed);
        $("#diseasePrevention").val(diseasePrevention);
        $("#edit_disease_modal").modal('show');
        });
    });
</script>
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
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="hidden" name="controller" value="rice">
      <button type="submit" name="action" value="addDisease" class="btn btn-success btn-block">เพิ่มข้อมูล</button>
      </form>
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
  <?php
            if(isset($diseaseList))
            {
                foreach($diseaseList as $disease)
                {
                    echo "<tr>
                            <td>$disease->name</td>
                            <td>$disease->location</td>
                            <td>$disease->symptom</td>
                            <td>$disease->dispersed</td>
                            <td>$disease->prevention</td>
                        ";
                ?>
                
            
        
        <td align="center">
            <a  class="btn btn-success edit_disease"
             data-diseaseID="<?php echo $disease->diseaseID ?>"
             data-diseaseName="<?php echo $disease->name ?>"
             data-diseaseLocation="<?php echo $disease->location ?>"
             data-diseaseSymptom="<?php echo $disease->symptom ?>"
             data-diseaseDispersed="<?php echo $disease->dispersed ?>"
             data-diseasePrevention="<?php echo $disease->prevention ?>"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
            <a class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a>
        </td>
        </tr>
    <?php     }
            } ?>
</table>
<!-- The Modal -->
<div class="modal fade" id="edit_disease_modal">
  <div class="modal-dialog" style="width:980px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">แก้ไขข้อมูล</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form >
            <input type="hidden" id="diseaseID" name="diseaseID">
            <label>* ชื่อ <input  id="diseaseName" name="name" type="text" class="form-control"  required></label><br/>
            <label>* พื้นที่ที่พบ <textarea id="diseaseLocation" name="location" rows="5" cols="50" class="form-control"  required></textarea></label>
            <label>* ลักษณะอาการ <textarea id="diseaseSymptom" name="symptom" rows="5" cols="50" class="form-control"  required></textarea></label>
            <label>* การแพร่ระบาด <textarea id="diseaseDispersed" name="dispersed" rows="5" cols="50" class="form-control"  required></textarea></label>
            <label>* การป้องกัน <textarea id="diseasePrevention" name="prevention" rows="5" cols="50" class="form-control"  required></textarea></label>
         
          <hr>
          <input type="hidden" name="controller" value="rice">
          <button type="submit" name="action" value="updateDisease" class="btn btn-success btn-block">ยืนยันการแก้ไข</button>

        </form>
      </div>

    </div>
  </div>
</div>