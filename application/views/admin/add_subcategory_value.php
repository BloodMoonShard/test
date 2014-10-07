<div id="page-wrapper" style="min-height: 704px;">
    <div class="row">
        <script type="text/javascript">
            $(document).ready(function(){
                <?php if(isset($format_value)){?>$('option[value=<?=$format_value?>]').attr('selected', true); <?php }?>
            })
        </script>
        <div class="col-lg-12">
            <h1>Изменение значений дополнительного раздела объекта</h1>
            <?php if(strlen($status_notif) > 0){?>
                <!-- /.panel-heading -->
                <div class="alert alert-<?=$status_notif?>">
                    <?=$msg_notif?>
                </div>
                <!-- .panel-body -->
                <!-- /.panel -->
            <?php }?>
            <div class="col-lg-6">
                <form role="form" action="<?php if(isset($id_subcategory_value)){ echo $id_subcategory_value;}?>" method="post">
                    <div class="form-group">
                        <label>Значение переменной</label>
                        <input class="form-control" name="value" value="<?php if(isset($value)){ echo $value;}?>">
                        <label>Укажите раздел</label>
                        <select class="form-control" name="id_subcategory">
                            <?php foreach($list as $l){ ?>
                                <option <?php if(isset($parent['id_subcategory'])){if($l['id_subcategory'] == $parent['id_subcategory']){echo 'selected=selected';}}?> value="<?=$l['id_subcategory']?>"><?=$l['name']?></option>
                            <?php }?>
                        </select>

                        <p class="help-block">Это новый раздел описания объекта недвижимости (Коммуникации и т.д)</p>
                    </div>
                    <a href="/admin/sub_category_value" type="button" class="btn btn-info">Вернуться</a>
                    <button type="submit" class="btn btn-primary">Готово</button>
                </form>
            </div>

        </div>
    </div>
</div>