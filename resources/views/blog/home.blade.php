@extends('layouts.app')

@section('content')

  <div class="">

  @forelse ($categories as $category)
    <div class="row" style="margin-bottom:0px;">
      <div class="col l12 m12 s12">
     <div class="card ananov-light" style="padding:10px;">
       <a href="{{url("/blog/category/$category->slug")}}" class="ananov-dark-text">
         <h4>{{mb_strtoupper($category->title)}}</h4>
       </a>
     </div>
     </div>
     </div>

  @empty
    <div class="">
        <h2> Cайт пока пуст </h2>
    </div>
  @endforelse

</div>
@endsection
