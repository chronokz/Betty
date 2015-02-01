<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @for ($i = 0; $i < Modules\Slider\Database\Models\Slider::count(); $i++)
      <li data-target="#myCarousel" data-slide-to="{{ $i }}" {{ ($i==0) ? 'class="active"':'' }}></li>
    @endfor
  </ol>
  <div class="carousel-inner" role="listbox">
    <?php $i = 0; ?>
    @foreach (Modules\Slider\Database\Models\Slider::all() as $item)
    <div class="item {{ ($i==0) ? 'active':'' }}">
      {{ HTML::image('uploads/slider/image/'.$item->image, $item->title) }}
      <div class="container">
        <div class="carousel-caption">
          <h1>{{ $item->title }}</h1>
          <p>{{ $item->description }}</p>
          @if ($item->link)
            <p>
              <a class="btn btn-lg btn-default" href="{{ $item->link }}" role="button" target="_blank">Learn more</a>
            </p>
          @endif
        </div>
      </div>
    </div>
    <?php $i++; ?>
    @endforeach

  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->