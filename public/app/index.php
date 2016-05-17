<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/app/common.css">
    <script src="/assets/js/common.bundle.js"></script>

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SampleUploader</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Github</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div id="myapp">
    <div class="container">

        <div class="page-header">
            <h1>Upload<small>&nbsp;with File API</small></h1>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">UploadForm</h2>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label >title</label>
                    <input type="text" class="form-control" v-model="info.title">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <a class="btn btn-primary fileApiBtn">OPEN</a>
                <input type="file" name="file" class="fileApiUploadForm">
            </div>
        </div>

        <ul class="placeholder row">
<!--            <li v-for="item in list">{{item.key}}</li>-->
            <image-item v-for="item in list" :item="item"></image-item>
        </ul>

        <template id="imageTemplate">

        </template>

    </div>
</div>



<template id="itemTemplate">
    <li class="col-xs-6 col-sm-3">
        <div class="imageBtn" class="thumbnail">
            <div class="imageWrapper">
                <div class="image" :style="{backgroundImage: 'url(/img/' + item.key + ')'}"></div>
            </div>
            <div class="caption text-right">
                <h3>{{item.info.title}}</h3>
                <p><a class="btn btn-xs btn-danger" @click="delete(item.key)">delete</a></p>
            </div>
        </div>
    </li>
</template>

<template id="listTemplate">

</template>

</body>
</html>