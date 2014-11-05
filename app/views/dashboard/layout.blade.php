<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/css/_bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="/packages/jquery-2.1.1.min.js"></script>
</head>
<body>
<div class="container">

    <div class="row" style="height: 10px">
        <div class="col-lg-12"></div>
    </div>

    <nav class="navbar navbar-default navbar-inverse" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">CRMка :}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Модули <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/sites">Анализ сайтов</a></li>
                <!--li><a href="/load-sites/whois">Проверить Whois</a></li-->
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li>
            <button class="btn btn-primary" type="button" style="margin-top: 8px">
              <span class="glyphicon glyphicon-envelope"></span> <span class="badge">4</span>
            </button>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">serovvitaly@gmail.com <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Профиль</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Выход</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div>
    {{ $content }}
    </div>

</div>

<script type="text/javascript" src="/packages/bootstrap/bootstrap.js"></script>

</body>
</html>