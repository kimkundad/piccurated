@extends('admin.layouts.template')



<style>
.bg-quaternary {
    background: #734BA9;
    color: #FFF;
}
.widget-summary .summary-icon{
      padding-top: 22px;
}
</style>

@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="{{url('admin/dashboard')}}">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
                <div class="col-xs-12">






                  </div>
            </div>
        </div>
</section>
@stop



@section('scripts')



@stop('scripts')
