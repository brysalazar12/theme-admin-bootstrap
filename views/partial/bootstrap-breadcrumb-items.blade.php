@foreach($items as $item)
  <li@lm-attrs($item) @if($item->hasChildren())class ="dropdown"@endif @lm-endattrs>
    @if($item->link)
		@if(isset($item->attributes['class']) && strpos($item->attributes['class'], 'active') !== false)
			{!! $item->title !!}
		@else
		<a@lm-attrs($item->link) @if($item->hasChildren()) class="dropdown-toggle" data-toggle="collapse" @endif @lm-endattrs href="{!! $item->url() !!}">
		  {!! $item->title !!}
		  @if($item->hasChildren()) <b class="caret"></b> @endif
		</a>
		@endif

    @else
      {!! $item->title !!}
    @endif
    @if($item->hasChildren())
      <ul class="collapse @if(isset($item->attributes['class']) && strpos($item->attributes['class'], 'active') !== false) in @endif" aria-expanded="false" id="{{ $item->data('target') }}">
        @include(config('laravel-menu.views.bootstrap-items'),
array('items' => $item->children()))
      </ul>
    @endif
  </li>
  @if($item->divider)
  	<li{!! Lavary\Menu\Builder::attributes($item->divider) !!}></li>
  @endif
@endforeach