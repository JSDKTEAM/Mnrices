<?php
    if(isset($_GET['check']))
    {
        if($_GET['check'])
        {
            echo "<script>    
            swal({
                type: 'success',
                title: 'สำเร็จ',
                showConfirmButton: false,
                timer: 1500
            })</script>";
        }
        else
        {
            echo "<script>    
            swal({
                type: 'error',
                title: 'ไม่สำเร็จ',
                showConfirmButton: false,
                timer: 1500
            })</script>";
        }
    }
?>
<script>
    $(document).ready(function(){
        $('.edit_dep').click(function(){
        // get data from edit btn
        var depID = $(this).attr('data-depID');
        var depName = $(this).attr('data-depName');
        console.log("depName");
        // set value to modal
        $("#depID").val(depID);
        $("#depName").val(depName);
        $("#edit_dep_modal").modal('show');
        });
    });
</script>
<h1>จัดการหน่วยงาน</h1>
<form action="" method="POST">
    <label>ชื่อหน่วยงาน <input type="text" name="depName" class="form-control" required></label>
       <input type="hidden" name="controller" value="dep">
    <button type="submit" name="action" value="addDep" class="btn btn-success">เพิ่มหน่วยงาน</button>
</form>
<br/><br/>
<table class="table table-bordered">
    <tr>
        <th>ชื่อหน่วยงาน</th>
               <th></th>
    </tr>
        <?php
            if(isset($dep_list))
            {
                foreach($dep_list as $dep)
                {
                    echo "<tr>
                            <td>$dep->depName</td>
                        ";
                ?>
                
            
        
        <td align="center">
            <a  class="btn btn-success edit_dep"
             data-depID="<?php echo $dep->depID ?>"
             data-depName="<?php echo $dep->depName ?>"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
            <a class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> ลบ</a>
        </td>
        </tr>
    <?php     }
            } ?>
</table>

<!-- The Modal -->
<div class="modal fade" id="edit_dep_modal">
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
          <input type="hidden" id="depID" name="depID">
          <label>* ชื่อหน่วยงาน<input id="depName" type="text" name="depName" class="form-control" required></label>
          <br/>          
          <hr>
          <input type="hidden" name="controller" value="dep">
          <button type="submit" name="action" value="updateDep" class="btn btn-success btn-block">ยืนยันการแก้ไข</button>

        </form>
      </div>

    </div>
  </div>
</div>