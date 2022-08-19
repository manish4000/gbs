@if ($paginator->hasPages())

<style>
    .page-item.active .page-link{
        z-index: 3;
        color: #fff !important  ;
        background-color: ##ffc107 !important;
        border-color: #ffc107 !important;
        
        padding: 6px 12px;
    }
    .page-link{
        z-index: 3;
        color: #ffc107 !important;
        background-color: #fff;
        border-color: #ffc107;
  
        padding: 6px 12px !important;
    }
    .page-item:first-child .page-link{
 
    }
    .page-item:last-child .page-link{
           
    }
    .pagination li{
        padding: 3px;
    }
    .disabled .page-link{
        color: #212529 !important;
        opacity: 0.5 !important;
    }
</style>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-start">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
        @endif
      
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
        @endif
    </ul>
@endif