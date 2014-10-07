<div id="page-wrapper" style="min-height: 704px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Подкатегории объекта</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Подкатегории описания объекта
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Имя подкатегории</th>
                                <th>Имя родительской категории</th>
                                <th>Формат</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(sizeof($data) > 0){
                                foreach($data as $d){?>
                                    <tr>
                                        <td><?= $d['id_subcategory']?></td>
                                        <td><?= $d['subcatname']?></td>
                                        <td><?= $d['name']?></td>
                                        <td><?= parse_format($d['format'])?></td>
                                        <td>
                                            <a href="/admin/sub_category/add_category/<?= $d['id_subcategory']?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="/admin/sub_category/rm_category/<?= $d['id_subcategory']?>"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <a href="/admin/sub_category/add_category" class="btn btn-primary">Добавить</a>
                    <a href="/admin/sub_category/position_category" class="btn btn-primary">Изменить порядок</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>