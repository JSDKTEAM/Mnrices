<script>
$(document).ready(function(){
$('input[list]').change('input', function(e) {
    var $input = $(e.target),
        $options = $('#' + $input.attr('list') + ' option'),
        $hiddenInput = $('#' + $input.attr('id') + '-hidden'),
        label = $input.val();

    $hiddenInput.val(label);

    for(var i = 0; i < $options.length; i++) {
        var $option = $options.eq(i);

        if($option.text() === label) {
            $hiddenInput.val( $option.attr('data-value') );
            break;
        }
    }
});
});
</script>
<h1 class="page-header">จัดการคู่โรคและเชื้อสาเหตุ</h1>
    <!--<form id="myForm">
        <label>โรคข้าว
        <input type="text"  list="diseasesID"  id="diseaseID" class="form-control" autocomplete="off">
            <datalist id="diseasesID">
            <?php
                foreach($disease_list as $disease)
                {
                    echo "<option data-value=$disease->diseaseID>$disease->name</option>";
                }
            ?>
        </datalist>
        </label>
        <input type="hidden" name="diseaseID" id="diseaseID-hidden">
        จับคู่
        <label>เชื้อโรค
        <input type="text"  list="pathogensID" id="pathogenID" class="form-control" autocomplete="off">
            <datalist id="pathogensID">
            <?php
                foreach($pathogen_list as $pathogen)
                {
                    echo "<option data-value=$pathogen->pathogenID>$pathogen->commonName</option>";
                }
            ?>
        </datalist>
        </label>
        <input type="hidden" name="pathogenID" id="pathogenID-hidden">
        <input type="hidden" name="controller" value="rice">
        <button type="submit" class="btn btn-success" name="action" value="addDiseasePathogen">เพิ่มข้อมูล</button>
    </form>-->
<br/>
<script>
    $(document).ready(function(){
        $('.detail').click(function(){
        // get data from edit btn
        var name = $(this).attr('data-name');
        var location = $(this).attr('data-location');
        var symptom = $(this).attr('data-symptom');
        var dispersed = $(this).attr('data-dispersed');
        var prevention = $(this).attr('data-prevention');

        var commonName = $(this).attr('data-commonName');
        var scientificName = $(this).attr('data-scientificName');
        var type = $(this).attr('data-type');
        var description = $(this).attr('data-description');
        // set value to modal
        document.getElementById("name").innerHTML = name;
        document.getElementById("location").innerHTML = location;
        document.getElementById("symptom").innerHTML = symptom;
        document.getElementById("dispersed").innerHTML = dispersed;
        document.getElementById("prevention").innerHTML = prevention;

        document.getElementById("commonName").innerHTML = commonName;
        document.getElementById("scientificName").innerHTML = scientificName;
        document.getElementById("type").innerHTML = type;
        document.getElementById("description").innerHTML = description;
        $("#detail_modal").modal('show');
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.edit').click(function(){
        // get data from edit btn
        var diseaseID = $(this).attr('data-diseaseID');
        var name = $(this).attr('data-name');  
        var pathogenID = $(this).attr('data-pathogenID');
        var commonName = $(this).attr('data-commonName');
        
        // set value to modal
        $(".name").val(name);
        $(".commonName").val(commonName);
        $("#diseaseID2-hidden").val(diseaseID);
        $("#pathogenID2-hidden").val(pathogenID);
        $("#edit_modal").modal('show');
        });
    });
</script>
<table class="table table-bordered">
            <tr>
                <th>ชื่อโรค</th>
                <th>ชื่อเชื้อ</th>
                <th></th>
            </tr>
            <?php
                $i = 0;
                foreach($dp_list as $dp)
                {
                        $disease = Disease::get($dp->diseaseID);
                        $pathogen = Pathogen::get($dp->pathogenID);
                        echo "<tr>
                                <td>$dp->name</td>
                                <td>$dp->commonName</td>
                              ";
            ?>       
                    <td align="left">
                        <form id="myForm" class="form-inline">
                            <label>เชื้อโรค
                            <input type="text"  list="pathogensID<?php echo $i ?>" id="pathogenID<?php echo $i ?>" class="form-control" autocomplete="off">
                                <datalist id="pathogensID<?php echo $i ?>">
                                <?php
                                    foreach($pathogen_list as $pathogen)
                                    {
                                        echo "<option data-value=$pathogen->pathogenID>$pathogen->commonName</option>";
                                    }
                                ?>
                            </datalist>
                            </label>
                            <input type="hidden" name="diseaseID" value="<?php echo $dp->diseaseID ?>">
                            <input type="hidden" name="pathogenID" id="pathogenID<?php echo $i ?>-hidden">
                            <input type="hidden" name="controller" value="rice">
                            <button type="submit" class="btn btn-success" name="action" value="addDiseasePathogen">เพิ่มเชื้อโรค</button>
                        </form>
                        <!--<a class="detail btn btn-primary"
                        data-name="<?php echo $dp->name ?>"
                        data-location="<?php echo $disease->location ?>"
                        data-symptom="<?php echo $disease->symptom ?>"
                        data-dispersed="<?php echo $disease->dispersed ?>"
                        data-prevention="<?php echo $disease->prevention ?>"

                        data-commonName="<?php echo $pathogen->commonName ?>"
                        data-scientificName="<?php echo $pathogen->scientificName ?>"
                        data-type="<?php echo $pathogen->type ?>"
                        data-description="<?php echo $pathogen->description ?>"
                        ><i class="fa fa-eye" aria-hidden="true"></i> ดูเพิ่มเติม</a>

                        <a  class="edit btn btn-success"
                        data-diseaseID="<?php echo $dp->diseaseID ?>";
                        data-name="<?php echo $dp->name ?>"
                        data-pathogenID="<?php echo $dp->pathogenID ?>";
                        data-commonName="<?php echo $pathogen->commonName ?>"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>-->
                    </td>
                    </tr>
        <?php  $i++; } ?> 
</table>

<!-- The Modal Detail -->
<div class="modal fade" id="detail_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">รายละเอียดเพิ่มเติม</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h3>โรค</h3>
        <p>ชื่อ : <span id="name"></span></p>
        <p>พื้นที่ที่พบโรค : <span id="location"></span></p>
        <p>ลักษณะอาการ : <span id="symptom"></span></p>
        <p>การแพร่ระบาด : <span id="dispersed"></span></p>
        <p>การป้องกัน : <span id="prevention"></span></p>
        <h3>เชื้อ</h3>
        <p>ชื่อสามัญ : <span id="commonName"></span></p>
        <p>ชื่อวิทยาศาสตร์ : <span id="scientificName"></span></p>
        <p>ชนิด : <span id="type"></span></p>
        <p>รายละเอียด : <span id="description"></span></p>
      </div>

    </div>
  </div>
</div>

<!-- The Modal edit -->
<div class="modal fade" id="edit_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">รายละเอียดเพิ่มเติม</h2>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="myForm">
            <label>โรคข้าว
            <input type="text"  list="diseasesID"  id="diseaseID" class="name form-control">
                <datalist id="diseasesID">
                <?php
                    foreach($disease_list as $disease)
                    {
                        echo "<option data-value=$disease->diseaseID>$disease->name</option>";
                    }
                ?>
            </datalist>
            </label>
            <input type="hidden" name="diseaseID" id="diseaseID2-hidden">
            จับคู่
            <label>เชื้อโรค
            <input type="text"  list="pathogensID" id="pathogenID" class="commonName form-control">
                <datalist id="pathogensID">
                <?php
                    foreach($pathogen_list as $pathogen)
                    {
                        echo "<option data-value=$pathogen->pathogenID>$pathogen->commonName</option>";
                    }
                ?>
            </datalist>
            </label>
            <input type="hidden" name="pathogenID" id="pathogenID2-hidden">
            <input type="hidden" name="controller" value="rice">
            <hr>
            <button type="submit" class="btn btn-success btn-block" name="action" value="">ยืนยันการแก้ไข</button>
        </form>
      </div>

    </div>
  </div>
</div>
