
<div id="page-wrapper" style="min-height: 704px;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Добавление недвижимости</h1>
            <?php if(strlen($status_notif) > 0){?>
                <!-- /.panel-heading -->
                <div class="alert alert-<?=$status_notif?>">
                    <?=$msg_notif?>
                </div>
                <!-- .panel-body -->
                <!-- /.panel -->
            <?php }?>
            <div class="col-lg-6">
                <form role="form" class="js-form-address" action="<?php if(isset($id_category)){ echo $id_category;}?>" method="post" onkeypress="if(event.keyCode == 13) return false;">
                    <div class="form-group">
                        <label>Имя раздела</label>
                        <input class="form-control" name="name_object" value="<?php if(isset($name_object)){ echo $name_object;}?>">
                        <p class="help-block">Это новый раздел описания объекта недвижимости (Основной, Дополнитльно и т.д)</p>
                    </div>
                    <div class="form-group">
                        <label>Область</label>
                        <input class="form-control" type="text" name="region" value="<?php if(isset($region)){ echo $region;}?>" id="region">
                    </div>
                    <div class="form-group">
                        <label>Район</label>
                        <input class="form-control" type="text" name="district" value="<?php if(isset($district)){ echo $district;}?>" id="district">
                    </div>

                    <div class="form-group">
                        <label>Город</label>
                        <input class="form-control" type="text" name="city" value="<?php if(isset($city)){ echo $city;}?>" id="id_city">
                        <input class="form-control" type="hidden" name="city_id" value="<?php if(isset($city_id)){ echo $city_id;}?>" id="id_city_hidden">
                    </div>
                    <?= $region_list;?>


                    <?= $highway;?>
                    <div class="form-group">
                        <label>Улица</label>
                        <input class="form-control" type="text" value="<?php if(isset($street)){ echo $street;}?>" name="street">
                    </div>
                    <div class="form-group">
                        <label>Дом</label>
                        <input class="form-control" type="text" value="<?php if(isset($building)){ echo $building;}?>" name="building">
                    </div>
                    <div class="tooltip" style="display: none;"><b></b><span></span></div>
                    <div class="form-group">
                        <label>Тип недвижимости</label>
                        <select class="form-control" name="type" value="<?php if(isset($type)){ echo $type;}?>">
                            <?php foreach($type_estate as $te){?>
                            <option <?php if(isset($type) && ($type == $te['id_objects_type'])){ echo 'selected="selected"';}?> value="<?= $te['id_objects_type']?>"><?= $te['name']?></option>

                            <?php }?>
                        </select>
                        <p class="help-block">Это новый раздел описания объекта недвижимости (Основной, Дополнитльно и т.д)</p>
                    </div>
                    <?=$content;?>

                    <a href="/admin/category" type="button" class="btn btn-info">Вернуться</a>
                    <button type="submit" class="btn btn-primary">Готово</button>
                </form>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Форма добавления округа</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="for_create_region_city">
                                <div class="form-group">
                                    <label>Имя округа</label>
                                    <input class="form-control" type="text" name="name" id="name_add_region">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-primary" id="btn_create_region_city">Создать</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Форма добавления шоссе</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="for_create_highway">
                                <div class="form-group">
                                    <label>Имя шоссе</label>
                                    <input class="form-control" type="text" name="name" id="name_add_highway">
                                </div>
                                <?=$highway_direction;?>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-primary" id="btn_create_highway">Создать</button>
                            <a class="btn btn-primary right" id="add_highway" data-toggle="modal" data-target="#myModal3">Добавить направление</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Форма добавления направления</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" id="for_create_highway_direction">
                                <div class="form-group">
                                    <label>Имя направления</label>
                                    <input class="form-control" type="text" name="name" id="name_add_highway_direction">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-primary" id="btn_create_highway_direction">Создать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>