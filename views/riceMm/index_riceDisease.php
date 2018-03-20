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
        $("#diseaseLocation").charCounter({limit:200});
        $("#diseaseSymptom").charCounter({limit:200});
        $("#diseaseDispersed").charCounter({limit:200});
        $("#diseasePrevention").charCounter({limit:200});
        $("#edit_disease_modal").modal('show');
        });
    });
</script>
<h1 class="page-header">จัดการโรคข้าว</h1>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">เพิ่มโรคข้าว</button>

 <form>
 <br/>
<label> ค้นหา <input type="text" class = "form-control"  name="key1" id ="key1"></label>
<input type="hidden" name="controller" value="rice">
        <button type="submit" class="btn btn-success "   name="action" value="search_dis">ค้นหา</button>

</form>



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
            <div class="row">
              <div class="col-md-6">
                <label>* ชื่อ </label><input type="text" class="form-control" name="name" maxlength="70"><br/>
                <label>* พื้นที่ที่พบ </label><br/><textarea rows="5" cols="50" class="location form-control" name="location" maxlength="200"></textarea><br/>
                <label>* ลักษณะอาการ </label><br/><textarea rows="5" cols="50" class="symptom form-control" name="symptom" maxlength="200"></textarea><br/>
              </div>
              <div class="col-md-6">
                <label>* การแพร่ระบาด </label><br/><textarea rows="5" cols="50" class="dispersed form-control" name="dispersed" maxlength="200"></textarea><br/>
                <label>* การป้องกัน </label><br/><textarea rows="5" cols="50" class="prevention form-control" name="prevention" maxlength="200"></textarea>
              </div>     
            </div>
      </div>
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
            if($diseaseList != null)
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
    <?php      }
            } ?>
</table>

<?php  include('views/pagination/pagination.php');?>
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
            <div class="row">
              <div class="col-md-6">
                <input type="hidden" id="diseaseID" name="diseaseID">
                <label>* ชื่อ </label><input  id="diseaseName" name="name" type="text" class="form-control"  maxlength="70" required><br/>
                <label>* พื้นที่ที่พบ </label><br/><textarea id="diseaseLocation" name="location" rows="5" cols="50" maxlength="200" class="form-control"  required></textarea><br/>
                <label>* ลักษณะอาการ </label><br/><textarea id="diseaseSymptom" name="symptom" rows="5" cols="50" maxlength="200" class="form-control"  required></textarea><br/>
              </div>
              <div class="col-md-6">
                <label>* การแพร่ระบาด </label><br/><textarea id="diseaseDispersed" name="dispersed" rows="5" cols="50" maxlength="200" class="form-control"  required></textarea><br/>
                <label>* การป้องกัน </label><textarea id="diseasePrevention" name="prevention" rows="5" cols="50"  maxlength="200" class="form-control"  required></textarea>
              </div>
          </div>
      </div>
      <div class="modal-footer">
          <input type="hidden" name="controller" value="rice">
          <button type="submit" name="action" value="updateDisease" class="btn btn-success btn-block">ยืนยันการแก้ไข</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="js/charcounter.js"></script>
<script>
$(".location").charCounter({limit:200});
$(".symptom").charCounter({limit:200});
$(".dispersed").charCounter({limit:200});
$(".prevention").charCounter({limit:200});
</script>