@extends('layouts.app')

@section('content')

  <div style="min-width:400px">
      <div class="w3-container w3-content">
  @forelse ($categories as $category)

     <div class="w3-panel w3-white w3-card w3-display-container">
       <a href="{{url("/blog/category/$category->slug")}}">
         <h3>{{$category->title}}</h3>
       </a>
     </div>

  @empty
    <div class="w3-panel w3-white w3-card w3-display-container">
        <h2> Cайт пока пуст </h2>
    </div>

  @endforelse
</div>






</div>
@endsection
