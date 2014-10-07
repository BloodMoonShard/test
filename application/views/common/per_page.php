<script type="text/javascript">
    $(document).ready(function(){
        $('.count_on_page_select').change(function(){
            $.ajax({
                url: '/ajax/change_count',
                data: 'per_page='+$(this).val(),
                type: 'POST',
                dataType: 'json',
                success: function(response){
                    if(response.status){
                        window.location.reload();
                    }
                }
            })
        })

    })
</script>
<span>Показывать на странице:</span>
<form action="" method="POST">
    <select name="count_on_page" class="count_on_page_select">
        <option <?php if($selected == 2){ echo 'selected=selected';}?>>2</option>
        <option <?php if($selected == 3){ echo 'selected=selected';}?>>3</option>
        <option <?php if($selected == 4){ echo 'selected=selected';}?>>4</option>
    </select>
</form>