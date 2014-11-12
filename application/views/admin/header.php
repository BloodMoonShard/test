<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/a/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/a/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/assets/a/css/plugins/timeline.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="/assets/jquery.kladr.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/a/css/sb-admin-2.css" rel="stylesheet">

    <link href="/assets/a/css/datepicker.css" rel="stylesheet">
    <link href="/assets/a/css/datepicker3.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/assets/a/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/a/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="/assets/w/js/jquery-1.11.1.min.js"></script>
    <script src="/assets/a/js/datepicker/bootstrap-datepicker.js"></script>
    <script src="/assets/a/js/datepicker/locales/bootstrap-datepicker.ru.js"></script>

    <script src="/assets/jquery.kladr.min.js" type="text/javascript"></script>
    <script src="/assets/all.js" type="text/javascript"></script>
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="/assets/a/js/custom.js" type="text/javascript"></script>
    <?php
        if(isset($styles)){
            foreach($styles as $s){
                echo '<link href="/assets/a/css/'.$s.'" rel="stylesheet" type="text/css"';
            }
        }

    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<script>
    $( document ).ready(function() {
        $('.input-group.date').datepicker({
            language: "ru",
            format: "dd-mm-yyyy"
        });
    });
</script>
<div id="wrapper">
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/" target="_blank">Авантелт</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <li>Здравствуйте, <?php echo $this->auth->get_username(); ?></li>
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
<!--        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>-->
<!--        </li>-->
<!--        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>-->
<!--        </li>-->
<!--        <li class="divider"></li>-->
        <li><a href="/login/logout"><i class="fa fa-sign-out fa-fw"></i> Выйти</a>
        </li>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->
    <?php
        $role = $this->auth->get_user_role();
    ?>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
<!--            <li>-->
<!--                <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Главная</a>-->
<!--            </li>-->
            <?php if($role != 3) { ?>
            <li>
                <a href="/admin/ctrl_users" <?php $flag=$this->uri->segment(2); if ($flag=='ctrl_users') {
                    echo 'class="active"';
                }?>><i class="fa fa-cogs"></i> Контроль пользователей</a>
            </li>
            <?php } ?>
            <li>
                <a href="#"><i class="fa fa-university"></i> Объекты<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse <?php
                    $flag=$this->uri->segment(2); if (in_array($flag, array('category','sub_category', 'sub_category_value', 'objects'))   ) {
                    echo 'in';
                }?>">
                    <?php if($role != 3) { ?>
                    <li>
                        <a <?php $flag=$this->uri->segment(2); if ($flag=='category') {
                            echo 'class="active"';
                        }?> href="/admin/category">Главные категории объекта</a>
                    </li>
                    <li>
                        <a <?php $flag=$this->uri->segment(2); if ($flag=='sub_category') {
                            echo 'class="active"';
                        }?> href="/admin/sub_category">Подкатегории объекта</a>
                    </li>
                    <li>
                        <a <?php $flag=$this->uri->segment(2); if ($flag=='sub_category_value') {
                            echo 'class="active"';
                        }?> href="/admin/sub_category_value">Значение подкатегории объекта</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a <?php $flag=$this->uri->segment(2); if ($flag=='objects') {
                            echo 'class="active"';
                        }?> href="/admin/objects">Список объектов недвижимости</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="/admin/orders" <?php $flag=$this->uri->segment(2); if ($flag=='orders') {
                    echo 'class="active"';
                }?>><i class="fa fa-credit-card"></i> Заказы</a>
            </li>
            <?php if($role == 1) { ?>
            <li>
                <a href="/admin/ctrl_building" <?php $flag=$this->uri->segment(2); if ($flag=='ctrl_building') {
                    echo 'class="active"';
                }?>><i class="fa fa-building"></i> Строительство</a>
            </li>
            <li>
                <a href="/admin/ctrl_partners" <?php $flag=$this->uri->segment(2); if ($flag=='ctrl_partners') {
                    echo 'class="active"';
                }?>><i class="fa fa-users"></i> Партнеры</a>
            </li>
            <li>
                <a href="/admin/ctrl_callback" <?php $flag=$this->uri->segment(2); if ($flag=='ctrl_callback') {
                    echo 'class="active"';
                }?>><i class="fa fa-phone"></i> Обратные звонки</a>
            </li>
            <li>
                <a href="/admin/ctrl_vacancy" <?php $flag=$this->uri->segment(2); if ($flag=='ctrl_vacancy') {
                    echo 'class="active"';
                }?>><i class="fa fa-briefcase"></i> Вакансии</a>
            </li>
            <li>
                <a href="/admin/ctrl_resume" <?php $flag=$this->uri->segment(2); if ($flag=='ctrl_resume') {
                    echo 'class="active"';
                }?>><i class="fa fa-envelope-o"></i> Резюме</a>
            </li>
            <li>
                <a href="/admin/ctrl_seo" <?php $flag=$this->uri->segment(2); if ($flag=='ctrl_seo') {
                    echo 'class="active"';
                }?>><i class="fa fa-globe"></i> SEO</a>
            </li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

