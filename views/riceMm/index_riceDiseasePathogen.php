<script>
    document.querySelector('input[list]').addEventListener('input', function(e) {
    var input = e.target,
        list = input.getAttribute('list'),
        options = document.querySelectorAll('#' + list + ' option'),
        hiddenInput = document.getElementById(input.id + '-hidden'),
        inputValue = input.value;

    hiddenInput.value = inputValue;

    for(var i = 0; i < options.length; i++) {
        var option = options[i];

        if(option.innerText === inputValue) {
            hiddenInput.value = option.getAttribute('data-value');
            break;
        }
    }
    });
</script>
<h1 class="page-header">จัดการคู่โรคและเชื้อสาเหตุ</h1>
<form>
    <label>โรคข้าว
    <input type="text"  list="disease" class="form-control">
        <datalist id="disease">
        <?php
            foreach($disease_list as $disease)
            {
                echo "<option data-value=$disease->diseaseID>$disease->name</option>";
            }
        ?>
    </datalist>
    </label>
    <input type="hidden" name="answer" id="answerInput-hidden">
    จับคู่
    <label>เชื้อโรค <input type="text" class="form-control"></label>
    
    <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
</form>