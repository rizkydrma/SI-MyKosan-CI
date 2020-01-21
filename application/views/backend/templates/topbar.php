<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/backend/') ?>img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url('assets/backend/') ?>img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?= $title ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/basic.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>frontend/css/font-awesome/css/all.min.css">
    <!-- CSS Files -->
    <link href="<?= base_url('assets/backend/') ?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/backend/') ?>css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url('assets/backend/') ?>demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/js/dataTables/') ?>DataTables-1.10.20\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/backend/css/jquery.tagsinput.css') ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/backend/css/style.css') ?>">
</head>

<div class="flashdata" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>