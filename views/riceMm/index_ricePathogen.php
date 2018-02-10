<style>
  .character-counter {
    font-size: 12px;
    color: #a2a2a2;
}
</style>
<script>
  $(document).ready(function(){
    $(".close").click(function(){
        $(".character-counter").remove();
    });
});
</script>
<script>
  $(document).ready(function(){
    $(".add_p").click(function(){
      var $counter = $('<div class="character-counter">'),
            limit = 200;
 
        // Get the textarea field
        $('.descriptionADD')
 
        // Add the counter after it
        .after($counter)
 
        // Bind the counter function on keyup and blur events
        .bind('keyup blur', function () {
            var length = $(this).val().length;
 
            if (length > limit) {
                // The value exceeds the limit, contain it
                $(this).val($(this).val().substring(0, limit));
            } else {
                // Set the counter text
                $counter.text(length + '/' + limit + ' characters');
            }
        })
 
        // Trigger the counter on first load
        .blur();
    });
});
</script>
<script>
    $(document).ready(function(){
        $('.edit_pathogen').click(function(){
        // get data from edit btn
        var pathogenID = $(this).attr('data-pathogenID');
        var commonName = $(this).attr('data-commonName');
        var scientificName = $(this).attr('data-scientificName');
        var type = $(this).attr('data-type');
        var description = $(this).attr('data-description');
        // set value to modal
        $("#pathogenID").val(pathogenID);
        $("#commonName").val(commonName);
        $("#scientificName").val(scientificName);
        $("#type").val(type);
        $("#description").val(description);
        $("#edit_pathogen_modal").modal('show');

        var $counter = $('<div class="character-counter">'),
            limit = 200;
 
        // Get the textarea field
        $('.description')
 
        // Add the counter after it
        .after($counter)
 
        // Bind the counter function on keyup and blur events
        .bind('keyup blur', function () {
            var length = $(this).val().length;
 
            if (length > limit) {
                // The value exceeds the limit, contain it
                $(this).val($(this).val().substring(0, limit));
            } else {
                // Set the counter text
                $counter.text(length + '/' + limit + ' characters');
            }
        })
 
        // Trigger the counter on first load
        .blur();
        });
    });
</script>
<h1 class="page-header">จัดการเชื้อโรคข้าว</h1>
<!-- Button to Open the Modal -->
<button type="button" class="add_p btn btn-success"  data-toggle="modal" data-target="#myModal">
  เพิ่มเชื้อโรคข้าว
</button>
<br><br>
<form method="GET">
    <label for="">ค้นหา<input type="text" name="key" class="form-control" required></label>
    <input type="hidden" name="controller" value="rice">
    <button type="submit" name= "action" value="searchPathogen" class="btn btn-success">ค้นหา</button>
</form>
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
        <form action="" method="POST">
            <label>ชื่อสามัญ <input type="text" class="form-control" maxlength="70" name="commonName"></label><br/>
            <label>ชื่อวิทยาศาสตร์ <input type="text" class="form-control" maxlength="70" name="scientificName"></label><br/>
            <label>ชนิด <input type="text" class="form-control" maxlength="50" name="type"></label><br/>
            <label>รายละเอียด <textarea rows="5" cols="50" class="descriptionADD form-control" maxlength="200" name="description"></textarea></label>
            <input type="hidden" name="controller" value="rice">
            <hr>
            <button type="submit" name= "action" value="addPathogen" class="btn btn-success btn-block">เพิ่มข้อมูล</button>
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
    <th>ชนิด</th>
    <th>รายละเอียด</th>
    <th></th>
  </tr>
    <?php
      if($pathogen_list!=null)
      {
      foreach($pathogen_list as $pathogen)
      {
          echo "<tr>
                  <td>$pathogen->commonName</td>
                  <td>$pathogen->scientificName</td>
                  <td>$pathogen->type</td>
                  <td>$pathogen->description</td>
                ";
      ?>
        <td>
          <a class="btn btn-success edit_pathogen"
          data-pathogenID = <?php echo $pathogen->pathogenID ?>
          data-commonName = <?php echo $pathogen->commonName ?>
          data-scientificName = <?php echo $pathogen->scientificName ?>
          data-type = <?php echo $pathogen->type?>
          data-description = <?php echo $pathogen->description ?>>
          <i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>
        </td>
       </tr>         
     <?php 
      } 
    }
   ?>
</table>
<?php  include('views/pagination/pagination.php');?>
<!-- The Modal -->
<div class="modal fade" id="edit_pathogen_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">แก้ไขข้อมูล</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="POST">
        <input type="hidden" id="pathogenID" name="pathogenID">
        <label>ชื่อสามัญ <input type="text" id="commonName" class="form-control" maxlength="70" name="commonName"></label><br/>
        <label>ชื่อวิทยาศาสตร์ <input type="text" id= "scientificName" class="form-control" maxlength="70" name="scientificName"></label><br/>
        <label>ชนิด <input type="text" id= "type" class="form-control" maxlength="50" name="type"></label><br/>
        <label>รายละเอียด <textarea id="description" rows="5" cols="50" class="description form-control" maxlength="200" name="description"></textarea></label>
        <input type="hidden" name="controller" value="rice">
        <hr>
          <button type="submit" name="action" value="updatePathogen" class="btn btn-success btn-block">ยืนยันการแก้ไข</button>
        </form>
      </div>

    </div>
  </div>
</div>
