<div id="page-wrapper" style="min-height: 704px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Объекты недвижимости</h1>
        </div>
        <div class="col-lg-11">
            <a class="btn btn-info pull-right" href="/admin/objects/sampling_objects">Найти объекты</a>
            <Br/><Br/>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Объекты недвижимости
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя</th>
                                <th>Дата создания</th>
                                <th>Статус объекта</th>
                                <th>Цена</th>
                                <th>Разместил</th>
                                <th>Действия</th>
                                <th>Заказ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(sizeof($data) > 0){
                                foreach($data as $d){
                                    $color_tr = '';
                                    if ($d['status_obj'] == 'Показ') {$color_tr = 'class="success"';}
                                    if ($d['status_obj'] == 'Отклонено') {$color_tr = 'class="danger"';}
                                    if ($d['status_obj'] == 'На модерации') {$color_tr = 'class="warning"';}
                                    ?>
                                    <tr <?php echo $color_tr; ?>>
                                        <td><?= $d['id_objects']?></td>
                                        <td><?= $d['name_object']?></td>
                                        <td><?= $d['date_add']?></td>
                                        <td><?php if($d['status_obj'] != null){echo $d['status_obj'];}else{echo "-";}?></td>
                                        <td>
                                            <?php if($d['price']) {
                                                echo $d['price'].'  руб.';
                                            }else {
                                                echo '-';
                                            } ?>

                                        </td>
                                        <td><?= $d['username']?></td>
                                        <td class="text-center">
                                            <a href="/admin/objects/edit_object/<?= $d['id_objects']?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="/admin/objects/rm_object/<?= $d['id_objects']?>"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a class="<?php if($d['order_flag']!=0) {echo 'text-success';} ?>" href="/admin/objects/control_order/<?= $d['id_objects']?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                    <a href="/admin/objects/add_object" class="btn btn-primary">Добавить</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <?php echo $pagination; ?>
            <!-- /.panel -->
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>