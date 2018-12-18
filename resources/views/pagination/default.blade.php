@if ($paginator->lastPage() > 1)
<div class="course-pagination">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}"><i class="fas fa-angle-left"></i></a></li>
      @for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
    @endfor

    <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}"><i class="fas fa-angle-right"></i></a></li>
  </ul>
</div>
@endif

                        
