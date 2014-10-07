<div id="page-wrapper" style="min-height: 704px;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Добавление основного раздела объекта</h1>
            <?php if(strlen($status_notif) > 0){?>
                    <!-- /.panel-heading -->
                        <div class="alert alert-<?=$status_notif?>">
                            <?=$msg_notif?>
                        </div>
                    <!-- .panel-body -->
                <!-- /.panel -->
            <?php }?>
            <div class="col-lg-6">
                <form role="form" action="<?php if(isset($id_category)){ echo $id_category;}?>" method="post">
                    <div class="form-group">
                        <label>Имя раздела</label>
                        <input class="form-control" name="name" value="<?php if(isset($name)){ echo $name;}?>">
                        <p class="help-block">Это новый раздел описания объекта недвижимости (Основной, Дополнитльно и т.д)</p>
                    </div>
                    <a href="/admin/category" type="button" class="btn btn-info">Вернуться</a>
                    <button type="submit" class="btn btn-primary">Готово</button>
                </form>
            </div>

        </div>
    </div>
</div>