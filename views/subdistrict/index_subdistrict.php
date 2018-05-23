<script>
    $(document).ready(function(){
        $('.edit_sub').click(function(){
        // get data from edit btn
        var provinceID = $(this).attr('data-provinceID');
        var provinceName = $(this).attr('data-provinceName');
        var districtID = $(this).attr('data-districtID');
        var districtName = $(this).attr('data-districtName');
        var subdistrictID = $(this).attr('data-subdistrictID');
        var subdistrictName = $(this).attr('data-subdistrictName');
        
        // set value to modal
        $("#provinceName").val(provinceName);
        $("#districtName").val(districtName);
        $("#subdistrictID").val(subdistrictID);
        $("#subdistrictName").val(subdistrictName);
        $("#edit_sub_modal").modal('show');
        });
    });
</script>
<script type="text/javascript">
    jQuery(function($) {
        jQuery('body').on('change','#province',function(){
            $("#district").empty();
            jQuery.ajax({
                'type':'GET',
                'url':'index.php?controller=rice&action=getAjaxProvince',
                'cache':false,
                'data':{provinceID:jQuery(this).val()},
                'success':function(data){
                    for(var i  in data)
                    {
                        $("#district").append("<option value='"+data[i].provinceID+"'>"+data[i].districtName+"</option")
                    }
                    //jQuery("#district").html(html);
                },
                'error':function(data)
                {
                    console.log(data);
                }
            });
            return false;
        });
        /* jQuery('body').on('change','#district',function(){
            jQuery.ajax({
                'type':'POST',
                'url':'views/subdistrict/subdistrict.php',
                'cache':false,
                'data':{district:jQuery(this).val()},
            });
            return false;
        });*/
    });
</script>
    <h1>จัดการตำบล</h1>
    <form >
        <label>จังหวัด <select id="province" name="province" class="form-control">
            <option value="">--กรุณาเลือกจังหวัด--</option>
            <?php
            foreach($province_list as $province)
            {
                echo "<option value='$province->provinceID'>$province->provinceName</option>";
            }
            ?>
        </select>
        </label>
        <label>อำเภอ <select id="district" name="district" class="form-control">
            <option value="">--กรุณาเลือกอำเภอ--</option>
        </select>
        </label>
        <label >ตำบล <input type="text" name="subdistrict" class="form-control"></label>
        <input type="submit" value="เพิ่มตำบล" class="btn btn-success">
    </form>
    <br/><br/>
    <table class="table table-bordered tabledata">
            <thead>
            <tr>
                <th>อำเภอ</th>
                <th>ตำบล</th>
                <th>จังหวัด</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($subdistrict_list as $subdistrict)
                {
                    echo "<tr>
                            <td>$subdistrict->districtName</td>
                            <td>$subdistrict->subdistrictName</td>
                            <td>$subdistrict->provinceName</td>
                          ";
                ?>
                <td align="center">
                <a  class="btn btn-success edit_sub"
                    data-provinceID="<?php echo $subdistrict->provinceID ?>"
                    data-provinceName="<?php echo $subdistrict->provinceName ?>"
                    data-districtID="<?php echo $subdistrict->districtID ?>"
                    data-districtName="<?php echo $subdistrict->districtName ?>"
                    data-subdistrictID="<?php echo $subdistrict->subdistrictID ?>"
                    data-subdistrictName="<?php echo $subdistrict->subdistrictName ?>"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
                </td>
                </tr>
        <?php   } ?>
            </tbody>
    </table>

<!-- The Modal -->
<div class="modal fade" id="edit_sub_modal">
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
            <input type="hidden" id="subdistrictID">
            <label>ตำบล <input id="subdistrictName" type="text" class="form-control" required></label>
            <hr>
            <button type="submit" name="action" class="btn btn-success btn-block">ยืนยัน</button>
        </form>
      </div>

    </div>
  </div>
</div>