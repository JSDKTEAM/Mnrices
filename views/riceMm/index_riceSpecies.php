<script>
    $(document).ready(function(){
        $('.edit_spec').click(function(){
        // get data from edit btn
        var commonName = $(this).attr('data-commonName');
        var scientificName = $(this).attr('data-scientificName');
        var speciesName = $(this).attr('data-speciesName');
        var type = $(this).attr('data-type');
        var history = $(this).attr('data-history');
        var characteristic = $(this).attr('data-characteristic');
        var productRate = $(this).attr('data-productRate');
        var feature = $(this).attr('data-feature');
        var notice = $(this).attr('data-notice');
        var recommendArea = $(this).attr('data-recommendArea');
        // set value to modal
        document.getElementById("commonName").innerHTML = commonName;
        document.getElementById("scientificName").innerHTML = scientificName;
        document.getElementById("speciesName").innerHTML = speciesName;
        document.getElementById("type").innerHTML = type;
        document.getElementById("history").innerHTML = history;
        document.getElementById("characteristic").innerHTML = characteristic;
        document.getElementById("productRate").innerHTML = productRate;
        document.getElementById("feature").innerHTML = feature;
        document.getElementById("notice").innerHTML = notice;
        document.getElementById("recommendArea").innerHTML = recommendArea; 
        $("#edit_spec_modal").modal('show');
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('.edit_spec2').click(function(){
        // get data from edit btn
        var speciesID2 = $(this).attr('data-speciesID2');
        var commonName2 = $(this).attr('data-commonName2');
        var scientificName2 = $(this).attr('data-scientificName2');
        var speciesName2 = $(this).attr('data-speciesName2');
        var type2 = $(this).attr('data-type2');
        var history2 = $(this).attr('data-history2');
        var characteristic2 = $(this).attr('data-characteristic2');
        var productRate2 = $(this).attr('data-productRate2');
        var feature2 = $(this).attr('data-feature2');
        var notice2 = $(this).attr('data-notice2');
        var recommendArea2 = $(this).attr('data-recommendArea2');
        console.log(type);
        // set value to modal
        $("#speciesID2").val(speciesID2);
        $("#commonName2").val(commonName2);
        $("#scientificName2").val(scientificName2);
        $("#speciesName2").val(speciesName2);
        $("#type2").val(type2);
        $("#history2").val(history2);
        $("#characteristic2").val(characteristic2);
        $("#productRate2").val(productRate2);
        $("#feature2").val(feature2);
        $("#notice2").val(notice2);
        $("#recommendArea2").val(recommendArea2);
        $("#edit_spec_modal2").modal('show');
        });
    });
</script>



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
        <form>
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

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
   	 <input type="hidden" name="controller" value="rice">
        <button type="submit" class="btn btn-success btn-block"  name="action" value="insert">เพิ่มข้อมูล</button>
	</form>
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

    <?php 
    foreach($speciesList as $species)
    {

        echo "<tr>
                <td>$species->commonName</td>
                <td>$species->scientificName</td>
                <td>$species->speciesName</td>
                <td>$species->type</td>";
                ?>

                <td align="center">
                <a  class="btn btn-primary edit_spec"
                data-commonName="<?php echo $species->commonName ?>"
                data-scientificName="<?php echo $species->scientificName ?>"
                data-speciesName="<?php echo $species->speciesName ?>"
                data-type="<?php echo $species->type ?>"
                data-history="<?php echo $species->history ?>"
                data-characteristic="<?php echo $species->characteristic ?>"
                data-productRate="<?php echo $species->productRate ?>"
                data-feature="<?php echo $species->feature ?>"
                data-notice="<?php echo $species->notice ?>"
                data-recommendArea="<?php echo $species->recommendArea ?>" ><i class="fa fa-eye" aria-hidden="true"></i> ดูเพิ่มเติม</a> 

                <a  class="btn btn-success edit_spec2"
                data-speciesID2="<?php echo $species->speciesID ?>"
                data-commonName2="<?php echo $species->commonName ?>"
                data-scientificName2="<?php echo $species->scientificName ?>"
                data-speciesName2="<?php echo $species->speciesName ?>"
                data-type2="<?php echo $species->type ?>"
                data-history2="<?php echo $species->history ?>"
                data-characteristic2="<?php echo $species->characteristic ?>"
                data-productRate2="<?php echo $species->productRate ?>"
                data-feature2="<?php echo $species->feature ?>"
                data-notice2="<?php echo $species->notice ?>"
                data-recommendArea2="<?php echo $species->recommendArea ?>" ><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a> 
                
                </td>
            </tr>

  <?php  } ?>
</table>


<div class="modal fade" id="edit_spec_modal">
  <div class="modal-dialog" style="width:980px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">ข้อมูลพันธุ์ข้าว</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>ชื่อสามัญ : <span id="commonName"></span></p>
        <p>ชื่อวิทยาศาสตร์ : <span id="scientificName"></span></p>
        <p>ชื่อพันธุ์ : <span id="speciesName"></span></p>
        <p>ชนิดข้าว : <span id="type"></span></p>
        <p>ประวัติพันธุ์ข้าว : <span id="history"></span></p>
        <p>ลักษณะประจำพันธุ์ : <span id="characteristic"></span></p>
        <p>ผลผลิต(กก)/ไร่ : <span id="productRate"></span></p>
        <p>ลักษณะเด่น : <span id="feature"></span></p>
        <p>ข้อควรระวัง : <span id="notice"></span></p>
        <p>พื้นที่แนะนำ : <span id="recommendArea"></span></p>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="edit_spec_modal2">
  <div class="modal-dialog" style="width:980px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">ข้อมูลพันธุ์ข้าว</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form >
        <input type="hidden" id="speciesID2" name="speciesID2">
        <label>ชื่อสามัญ<input id="commonName2" type="text" name="commonName2" class="form-control" required ></label>
            <label>ชื่อวิทยาศาสตร์ <input id="scientificName2" type="text" name="scientificName2" class="form-control" required ></label>
            <label>ชื่อพันธุ์ <input id="speciesName2" type="text" name="speciesName2" class="form-control" required ></label>
            <label>ชนิดข้าว <input id="type2" type="text" name="type2" class="form-control" required ></label><br/>
            <label>ประวัติพันธุ์ข้าว <textarea rows="5" cols="50" class="form-control" id="history2" type="text" name="history2" required ></textarea></label>
            <label>ลักษณะประจำพันธุ์ <textarea rows="5" cols="50" class="form-control" id="characteristic2" type="text" name="characteristic2" ></textarea></label>
            <label>ผลผลิต(กก)/ไร่ <input id="productRate2" type="text" name="productRate2" class="form-control" required ></label><br/>
            <label>ลักษณะเด่น <textarea rows="5" cols="50" class="form-control" id="feature2" type="text" name="feature2" required ></textarea></label>
            <label>ข้อควรระวัง <textarea rows="5" cols="50" class="form-control" id="notice2" type="text" name="notice2" required ></textarea></label>
            <label>พื้นที่แนะนำ <textarea rows="5" cols="110" class="form-control"  id="recommendArea2" type="text" name="recommendArea2" required ></textarea></label>
           
            <input type="hidden" name="controller" value="rice">
          <button type="submit" name="action" value="update" class="btn btn-success btn-block">ยืนยันการแก้ไข</button>
       
        </form>
      </div>

    </div>
  </div>
</div>
