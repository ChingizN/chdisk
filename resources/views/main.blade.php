
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
      @if (Auth::user()->permission == 'user')
        <a class="navbar-brand" href="/create_ticket">Создать тикет</a>
      @endif
      <a id="navbarDropdown" class="nav-link navbar-brand pull-xs-right" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

    </nav>

    <div class="container center">
      <div class="starter-template"><br><br><br><br>
        <h1>Просмотр всех тикетов</h1>
      </div>
    </div>

    <div class="list-group pull-xs-right">
      @if (Auth::user()->permission == 'moderator')
      <form action="/tickets/filter" method="get">
        <div class="form-group">
          <label for="sel1">Выберите отдел:</label>
          <select class="form-control-xs" name="department_id" id="sel1">
            <option value="" selected disabled hidden>Выбор</option>
            <option value="1" {{request()->department_id == 1 ? 'selected' : ''}}>IT отдел</option>
            <option value="2" {{request()->department_id == 2 ? 'selected' : ''}}>Отдел продаж</option>
            <option value="3" {{request()->department_id == 3 ? 'selected' : ''}}>Финансовый отдел</option>
          </select>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="status" value="1" id="check" {{request()->status == 1 ? 'checked' : ''}}>Показывать закрытые тикеты</label>
          <button class="btn btn-primary btn-sm" type="submit">Фильтр</button>
        </div>
      </form>
      @else
      <form action="/tickets/filter" method="get">
        <div class="checkbox">
          <label><input type="checkbox" name="status" value="1" id="check" {{request()->status == 1 ? 'checked' : ''}}>Показывать закрытые тикеты</label>
          <button class="btn btn-primary btn-sm" type="submit">Фильтр</button>
        </div>
      </form>
      @endif
    </div>
   
    @foreach($tickets as $ticket)

      <br><br><br><br>
   
    <div class="jumbotron" id="ticket.{{$ticket->id}}" value="{{$ticket->id}}">
    
      <a class="-sm-4">Ticket # {{$ticket->id}}</a>
      <a class="col-sm-1">{{$ticket->author}}</a>
      <a class="col-sm-2   pull-xs-right">{{$ticket->created_at}}</a>
      <a class="pull-xs-right">Отдел: {{$ticket->department->name}}</a><hr>
      <p class="font-weight-bold"><h3><strong>{{$ticket->theme}}</strong></h3></p>
      <p>{{$ticket->description}}</p><hr>
      <a class="-sm-4"><strong>Последний ответ</strong></a>

      @foreach($messages as $message)

      @if ($message->ticket_id == $ticket->id)

      <div class="jumbotron jumbotron bg-warning">
        <a class="col-sm-1">{{$message->author}}</a>
        <a class="col-sm-2 pull-xs-right">{{$message->created_at}}</a><hr>
        <p>{{$message->message}}</p><hr>
      </div>

      @endif

      @endforeach

      <p>
        <a class="btn" href="/ticket/{{$ticket->id}}">Просмотр тикета &raquo;</a>
        @if ($ticket->status == 0)
          @if (Auth::user()->permission == 'moderator')
          <a class="btn btn-primary pull-xs-right status" value="{{$ticket->id}}" id="status.{{$ticket->id}}">Закрыть тикет &raquo;</a>
          @else
          <a class="btn-info pull-xs-right text-danger">Тикет открыт</a>
          @endif
        @else
        <a class="pull-xs-right text-success">Тикет закрыт</a>
        @endif
      </p>
    </div>

    @endforeach
    {{ $tickets->appends(request()->query())->links() }}
    <script src="/js/main/main.js"></script>
  </body>
</html>
