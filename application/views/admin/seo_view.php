<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Настройка SEO</h1>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if (sizeof($data)>0) {?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                <tr>
                                    <th>url страницы</th>
                                    <th>Заголовок</th>
                                    <th>Описание</th>
                                    <th>Ключевые слова</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data as $d) { ?>
                                    <tr>
                                        <th><?php if ($d['url']=="") {echo 'Главная';} else echo $d['url']; ?></th>
                                        <th><?php echo $d['title'] ?></th>
                                        <th><?php echo $d['description'] ?></th>
                                        <th><?php echo $d['keywords'] ?></th>
                                        <th><a href="/admin/ctrl_seo/edit_seo/<?php echo $d['id_seo'] ?>">Редактировать</a>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php }  ?>
                </div>
            </div>
        </div>
    </div>
</div>
