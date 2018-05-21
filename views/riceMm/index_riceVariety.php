<script>
    $(document).ready(function(){
        $('.edit_spec').click(function(){
        // get data from edit btn
        var commonName = $(this).attr('data-commonName');
        var scientificName = $(this).attr('data-scientificName');     
        var varietyName = $(this).attr('data-varietyName');
        var history = $(this).attr('data-history');
        var characteristic = $(this).attr('data-characteristic');
        var productRate = $(this).attr('data-productRate');
        var feature = $(this).attr('data-feature');
        var notice = $(this).attr('data-notice');
        var recommendArea = $(this).attr('data-recommendArea');
        // set value to modal
        document.getElementById("commonName").innerHTML = commonName;
        document.getElementById("scientificName").innerHTML = scientificName;
        document.getElementById("varietyName").innerHTML = varietyName;
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
        var VarietyID2 = $(this).attr('data-VarietyID2');
        var commonName2 = $(this).attr('data-commonName2');
        var scientificName2 = $(this).attr('data-scientificName2');
        var varietyName2 = $(this).attr('data-varietyName2');
        var history2 = $(this).attr('data-history2');
        var characteristic2 = $(this).attr('data-characteristic2');
        var productRate2 = $(this).attr('data-productRate2');
        var feature2 = $(this).attr('data-feature2');
        var notice2 = $(this).attr('data-notice2');
        var recommendArea2 = $(this).attr('data-recommendArea2');
        console.log(varietyName);
        // set value to modal
        $("#VarietyID2").val(VarietyID2);
        $("#commonName2").val(commonName2);
        $("#scientificName2").val(scientificName2);
        $("#varietyName2").val(varietyName2);
        $("#history2").val(history2);
        $("#characteristic2").val(characteristic2);
        $("#productRate2").val(productRate2);
        $("#feature2").val(feature2);
        $("#notice2").val(notice2);
        $("#recommendArea2").val(recommendArea2);
        $(".history").charCounter({limit:200});
        $(".characteristic").charCounter({limit:200});
        $(".feature").charCounter({limit:200});
        $(".recommendArea").charCounter({limit:200});
        $("#edit_spec_modal2").modal('show');
        });
    });
</script>



<h1 class="page-header">จัดการพันธุ์ข้าว</h1>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> เพิ่มพันธุ์ข้าว </button>

 <form>
 <br/>
<label> ค้นหา <input type="text" class = "form-control"  name="key" id ="key"></label>
<input type="hidden" name="controller" value="rice">
        <button type="submit" class="btn btn-success"   name="action" value="search_spec">ค้นหา</button>

</form>
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
        <div class="col-md-6">
            <label>ชื่อสามัญ </label><input type="text" class="form-control" maxlength="70" name="commonName">
            <label>ชื่อวิทยาศาสตร์ </label><input type="text" class="form-control" maxlength="70" name="scientificName">
            <label>พันธุ์ข้าว </label><input type="text" class="form-control" maxlength="50" name="varietyName">
            <label>ผลผลิต(กก)/ไร่ </label><input type="number" class="form-control" name="productRate">
            <label>ประวัติพันธุ์ข้าว </label><br/><textarea rows="5" cols="50" class="history form-control" maxlength="200" name="history"></textarea>
            <label>ลักษณะประจำพันธุ์ </label><br/><textarea rows="5" cols="50" class="characteristic form-control" maxlength="200" name="characteristic"></textarea>
        </div>
        <div class="col-md-6">
            <label>ลักษณะเด่น </label><br/><textarea rows="5" cols="50" class="feature form-control" maxlength="200" name="feature"></textarea>
            <label>ข้อควรระวัง </label><br/><textarea rows="5" cols="50" class="notice form-control" maxlength="200" name="notice"></textarea>
            <label>พื้นที่แนะนำ </label><br/><textarea rows="5" cols="110" class="recommendArea form-control"  maxlength="200" name="recommendArea"></textarea>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
   	      <input type="hidden" name="controller" value="rice">
        <button type="submit" class="btn btn-success btn-block"  name="action" value="addVariety">เพิ่มข้อมูล</button>
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
    <th>ชื่อพันธุ์ข้าว</th>

    <th></th>
  </tr>

    <?php 

if($VarietyList != null)
{
    foreach($VarietyList as $Variety)
    {

        echo "<tr>
                <td>$Variety->commonName</td>
                <td>$Variety->scientificName</td> 
                <td>$Variety->varietyName</td>";
                ?>

                <td align="center">
                <a  class="btn btn-primary edit_spec"
                data-commonName="<?php echo $Variety->commonName ?>"
                data-scientificName="<?php echo $Variety->scientificName ?>"
                data-varietyName="<?php echo $Variety->varietyName ?>"
                data-history="<?php echo $Variety->history ?>"
                data-characteristic="<?php echo $Variety->characteristic ?>"
                data-productRate="<?php echo $Variety->productRate ?>"
                data-feature="<?php echo $Variety->feature ?>"
                data-notice="<?php echo $Variety->notice ?>"
                data-recommendArea="<?php echo $Variety->recommendArea ?>" ><i class="fa fa-eye" aria-hidden="true"></i> ดูเพิ่มเติม</a> 

                <a  class="btn btn-success edit_spec2"
                data-VarietyID2="<?php echo $Variety->varietyID ?>"
                data-commonName2="<?php echo $Variety->commonName ?>"
                data-scientificName2="<?php echo $Variety->scientificName ?>"    
                data-varietyName2="<?php echo $Variety->varietyName ?>"
                data-history2="<?php echo $Variety->history ?>"
                data-characteristic2="<?php echo $Variety->characteristic ?>"
                data-productRate2="<?php echo $Variety->productRate ?>"
                data-feature2="<?php echo $Variety->feature ?>"
                data-notice2="<?php echo $Variety->notice ?>"
                data-recommendArea2="<?php echo $Variety->recommendArea ?>" ><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a> 
                
                </td>
            </tr>

  <?php  }} ?>
</table>
<?php  include('views/pagination/pagination.php');?>

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
        <p>พันธุ์ข้าว : <span id="varietyName"></span></p>
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
        <div class="col-md-6">
          <input type="hidden" id="VarietyID2" name="VarietyID2">
          <label>ชื่อสามัญ </label><input id="commonName2" type="text" name="commonName2" maxlength="70" class="commonName form-control" required >
          <label>ชื่อวิทยาศาสตร์ </label><input id="scientificName2" type="text" name="scientificName2" maxlength="70" class="scientificName form-control" required >         
          <label>พันธุ์ข้าว </label><input id="varietyName2" type="text" name="varietyName2" maxlength="50" class="varietyName form-control" required >
          <label>ผลผลิต(กก)/ไร่ </label><input id="productRate2" type="number" name="productRate2" class="productRate form-control" required >
          <label>ประวัติพันธุ์ข้าว </label><br/><textarea rows="5" cols="50" class="history form-control" maxlength="200" id="history2" type="text" name="history2" required ></textarea>
          <label>ลักษณะประจำพันธุ์ </label><br/><textarea rows="5" cols="50" class="characteristic form-control" maxlength="200" id="characteristic2" type="text" name="characteristic2" ></textarea>
        </div>
        <div class="col-md-6">
            <label>ลักษณะเด่น </label><br/><textarea rows="5" cols="50" class="feature form-control" maxlength="200" id="feature2" type="text" name="feature2" required ></textarea><br/>
            <label>ข้อควรระวัง </label><br/><textarea rows="5" cols="50" class="notice form-control" maxlength="200" id="notice2" type="text" name="notice2" required ></textarea><br/>
            <label>พื้นที่แนะนำ </label><br/><textarea rows="5" cols="110" class="recommendArea form-control"  maxlength="200" id="recommendArea2" type="text" name="recommendArea2" required ></textarea><br/>
        </div>   
            <input type="hidden" name="controller" value="rice">
            <button type="submit" name="action" value="updateVariety" class="btn btn-success btn-block">ยืนยันการแก้ไข</button>
        </form>
      </div>

    </div>
  </div>
</div>
<script src="js/charcounter.js"></script>
<script>
$(".history").charCounter({limit:200});
$(".characteristic").charCounter({limit:200});
$(".feature").charCounter({limit:200});
$(".recommendArea").charCounter({limit:200});
</script>