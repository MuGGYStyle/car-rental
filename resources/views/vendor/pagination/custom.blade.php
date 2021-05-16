@if ($paginator->hasPages())
    @foreach ($elements as $element)
        
        @if (is_string($element))
            <span class="disabled p-3">{{ $element }}</span>
        @endif


        
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="p-3">{{ $page }}</span>
                @else
                    <a class="p-3" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
@endif 