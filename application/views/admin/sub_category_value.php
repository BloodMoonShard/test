<div id="page-wrapper" style="min-height: 704px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Значения подкатегорий объекта</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Значения подкатегорий объекта
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Значение</th>
                                <th>Имя подкатегории</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(sizeof($data) > 0){
                                foreach($data as $d){?>
                                    <tr>
                                        <td><?= $d['id_subcategory_value']?></td>
                                        <td><?= $d['value']?></td>
                                        <td><?= $d['name']?></td>
                                        <td>
                                            <a href="/admin/sub_category_value/add_category/<?= $d['id_subcategory_value']?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="/admin/sub_category_value/rm_category/<?= $d['id_subcategory_value']?>"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <a href="/admin/sub_category_value/add_category" class="btn btn-primary">Добавить</a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>