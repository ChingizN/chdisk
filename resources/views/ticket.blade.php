<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <title>Ticket Form</title>
</head>
<style>
    .center {
    text-align: center;
    }
    .left {
    text-align: left;
    }
    .right {
    text-align: right;
    }
    .border {
      outline: 2px solid #000;
    }
</style>
<body>
    <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
        <a class="navbar-brand" href="/">Главная</a>
        <a class="navbar-brand" href="/create_ticket">Создать тикет</a>
        
        <ul class="navbar-brand pull-xs-right">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link navbar-brand" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Выход') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <div class="container center">
      <div class="starter-template"><br><br><br><br>
        <h1>Создание нового тикета</h1>
      </div>
    </div>

    <form action="/ticket/add/" method="post">
    @csrf
    <div class="jumbotron">
      <a class="col-sm-1">{{ Auth::user()->name }}</a>
      <input type="hidden" name="author" value="{{ Auth::user()->name }}">
      <a class="form-group pull-xs-right">
        <label for="sel1">Выберите отдел:</label>
        <select class="form-control-xs" id="sel1" name="department" onchange="value=value">
          <option>Выберите отдел</option>
          <option value="Finance">Finance</option>
          <option value="Sales">Sales</option>
          <option value="IT">IT</option>
        </select>
      </a><hr>
      <p class="head"><h4><strong>Заголовок</strong></h4></p>
      <a class="row"><input type="text" name="theme" style="width:100%;"></a><br>
      <p class="head"><h5><strong>Описание</strong></h5></p>
      <a><textarea name="description" rows="5" style="width:100%;"></textarea></a><hr>
      
      <p>
            <a>
                <button class="btn btn-primary pull-xs-right" type="submit">Создать тикет</button>
            </a>
      </p>
    </div>
    </form>

</body>
</html>