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
        <option <?php if($selected == 10){ echo 'selected=selected';}?>>10</option>
        <option <?php if($selected == 20){ echo 'selected=selected';}?>>20</option>
        <option <?php if($selected == 30){ echo 'selected=selected';}?>>30</option>
    </select>
</form>