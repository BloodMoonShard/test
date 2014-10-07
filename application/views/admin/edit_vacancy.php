<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Добавить вакансию</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-briefcase"></i> Вакансии</li>
                <li class=""> Добавить Вакансию</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Название вакансии</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>">
                </div>
                <p class="help-block">
                    <span class="text-danger"><strong>ВАЖНО:</strong></span> каждый пункт обязанностей/требований/условий
                    <strong>необходимо</strong> начинать с новой строки
                </p>
                <div class="form-group">
                    <label for="responsibility">Обязанности</label>
                    <textarea class="form-control" id="responsibility" name="responsibility"><?php echo $data['responsibility']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="requirements">Требования</label>
                    <textarea class="form-control" id="requirements" name="requirements"><?php echo $data['requirements']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="conditions">Условия</label>
                    <textarea class="form-control" id="conditions" name="conditions"><?php echo $data['conditions']; ?></textarea>
                </div>

                <?php
                    $checked = '';
                    if ($data['display'] == 1) {
                        $checked = "checked";
                    }
                ?>

                <div class="form-group">
                    <label for="display">Показывать вакансию: </label>
                    <input type="checkbox" id="display" name="display" value="1" <?php echo $checked; ?>>
                </div>

                <button type="submit" class="btn btn-success">Готово</button>
            </form>
        </div>
    </div>
    <hr class="divider">
    <a class="btn btn-default" href="/admin/ctrl_vacancy">Обратно</a>
</div>