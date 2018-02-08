<script>
/*document.querySelector('input[list]').addEventListener('input', function(e) {
    var input = e.target,
        list = input.getAttribute('list'),
        options = document.querySelectorAll('#' + list + ' option'),
        hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
        label = input.value;

    hiddenInput.value = label;

    for(var i = 0; i < options.length; i++) {
        var option = options[i];

        if(option.innerText === label) {
            hiddenInput.value = option.getAttribute('data-value');
            break;
        }
    }
});

// For debugging purposes
document.getElementById("myForm").addEventListener('submit', function(e) {
    var value = document.getElementById('answer-hidden').value;
    document.getElementById('result').innerHTML = value;
    e.preventDefault();
});* bug/ 
</script>
<h1 class="page-header">จัดการคู่โรคและเชื้อสาเหตุ</h1>
<form>
    <label>โรคข้าว
    <input type="text"  list="disease" class="diseaseID form-control">
        <datalist id="disease">
        <?php
            foreach($disease_list as $disease)
            {
                echo "<option data-diseaseI[$disease->name]=$disease->diseaseID>$disease->name</option>";
            }
        ?>
    </datalist>
    </label>
    <input type="hidden" id="diseaseID">
    จับคู่
    <label>เชื้อโรค
    <input type="text"  list="pathogen" class="pathogenID form-control">
        <datalist id="pathogen">
        <?php
            foreach($pathogen_list as $pathogen)
            {
                echo "<option data-pathogenID_$pathogen->commonName>$pathogen->commonName</option>";
            }
        ?>
    </datalist>
    </label>
    
    <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
</form>