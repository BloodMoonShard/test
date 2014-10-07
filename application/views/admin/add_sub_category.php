<div id="page-wrapper" style="min-height: 704px;">
    <div class="row">
        <script type="text/javascript">
            $(document).ready(function(){
                <?php if(isset($format)){?>$('option[value=<?=$format?>]').attr('selected', true); <?php }?>
            })
        </script>
        <div class="col-lg-12">
            <h1>Добавление дополнительного раздела объекта</h1>
            <?php if(strlen($status_notif) > 0){?>
                <!-- /.panel-heading -->
                <div class="alert alert-<?=$status_notif?>">
                    <?=$msg_notif?>
                </div>
                <!-- .panel-body -->
                <!-- /.panel -->
            <?php }?>
            <div class="col-lg-6">
                <form role="form" action="<?php if(isset($id_subcategory)){ echo $id_subcategory;}?>" method="post">
                    <div class="form-group">
                        <label>Имя раздела</label>
                        <input class="form-control" name="name" value="<?php if(isset($name)){ echo $name;}?>">
                        <label>Укажите родительский раздел</label>
                        <select class="form-control" name="parent">
                            <?php foreach($list as $l){ ?>
                                <option <?php if(isset($parent['id_category'])){if($l['id_category'] == $parent['id_category']){echo 'selected=selected';}}?> value="<?=$l['id_category']?>"><?=$l['name']?></option>
                            <?php }?>
                        </select>
                        <label>Формат данных</label>
                        <select class="form-control" name="format">
                            <option value="input" selected="selected">Текстовое поле</option>
                            <option value="select">Выпадающий список</option>
                            <option value="checkbox">CheckBox</option>
                            <option value="radio">Radio</option>
                            <option value="textarea">Текстовая область</option>
                        </select>
                    </div>
                    <a href="/admin/sub_category" type="button" class="btn btn-info">Вернуться</a>
                    <button type="submit" class="btn btn-primary">Готово</button>
                </form>
            </div>

        </div>
    </div>
</div>