<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Редактирование страницы "<?php if ($data['url']=="") {echo 'Главная';} else echo $data['url']; ?>"</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-globe"></i> SEO</li>
                <li class=""> Редактирование страницы </li>
            </ol>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="<?php echo $data['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $data['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="keywords">Ключевые слова</label>
                    <p class="help-block">Перечислять ключевые слова через запятую</p>
                    <input type="text" class="form-control" id="keywords" name="keywords"
                           value="<?php echo $data['keywords']; ?>">
                </div>

                <button type="submit" class="btn btn-success">Готово</button>
            </form>
        </div>
    </div>
    <hr class="divider">
    <a class="btn btn-default" href="/admin/ctrl_seo">Обратно</a>
</div>