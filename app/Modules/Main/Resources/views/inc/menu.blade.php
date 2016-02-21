<nav class="navbar navbar-inverse">
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand visible-xs-block" href="/">Yelikbayev</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @foreach($menu as $item)
          <li @if(Request::is($item->link)) class="active" @endif><a href="{{ url($item->link) }}">{{ $item->text }}</a></li>
        @endforeach
      </ul>
      <ul class="nav navbar-nav navbar-right right-widgets hidden-xs">
        @foreach($links as $item)
          <li><a href="{{ $item->link }}" target="_blank" class="socicon-{{ $item->icon }}"></a></li>
        @endforeach
        <li class="search-parent">
          {{ Form::open(['url' => route('search'), 'method' => 'get' ]) }}
              <input type="text" class="search-input" name="q" value="{{ Input::get('q') }}">
              <a href="" class="fa fa-search js_form_submit"></a>
          {{ Form::close() }}
        </li>
      </ul>
    </div>
  </div>
</nav>