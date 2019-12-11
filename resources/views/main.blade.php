
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <title>Start</title>
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
        <h1>Просмотр всех тикетов</h1>
      </div>
    </div>

    <div class="list-group pull-xs-right">
      <div class="form-group">
        <label for="sel1">Выберите отдел:</label>
        <select class="form-control-xs" id="sel1">
          <option>IT</option>
          <option>Finance</option>
          <option>Sales</option>
          <option>All</option>
        </select>
      </div>
      
      <form>
        <div class="checkbox">
          <label><input type="checkbox" value="">Показывать закрытые тикеты</label>
        </div>
      </form>
    </div>

      <br><br><br><br>
    <div class="jumbotron">
      <a class="-sm-4">Ticket # 777</a>
      <a class="col-sm-1">Author</a>
      <a class="col-sm-1 pull-xs-right">timestamp</a>
      <a class="pull-xs-right">Department</a><hr>
      <p>This example is a quick exercise to illustrate how the default responsive navbar works. It's placed within a <code>.container</code> to limit its width and will scroll with the rest of the page's content.</p><hr>
      <a class="-sm-4">Последний ответ</a>
      <div class="jumbotron jumbotron bg-warning">
        <a class="-sm-4">Ticket # 777</a>
        <a class="col-sm-1">Author</a>
        <a class="col-sm-1 pull-xs-right">timestamp</a>
        <a class="pull-xs-right">Department</a><hr>
        <p>At the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.LoremAt the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.LoremAt the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.LoremAt the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.LoremAt the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.LoremAt the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.LoremAt the smallest breakpoint, the collapse plugin is used to hide the links and show a menu button to toggle the collapsed content.Lorem</p><hr>
      </div>
      <p>
        <a class="btn btn-primary pull-xs-right" href="#" role="button">Закрыть тикет &raquo;</a>
      </p>
    </div>
  </body>
</html>
