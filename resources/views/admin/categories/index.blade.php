@extends('admin.layouts.app_admin')

@section('content')

  @component('admin.components.breadcrumb')
    @slot('title') Список категорий @endslot
    @slot('parent') Главная @endslot
    @slot('active') Категории @endslot
  @endcomponent

  <hr>
<div class="container">
  <a href="{{route('admin.category.create')}}" class="btn btn-primary right ananov-dark"><i class="left material-icons">add</i> Создать категорию</a>

  <table class="table">
    <thead>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($categories as $category)
        <tr>
          <td>{{$category->title}}</td>
          <td>{{$category->published}}</td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.category.destroy', $category)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}
              <a class="waves-effect waves-ananov-dark btn ananov-dark ananov-light-text" href="{{route('admin.category.edit',$category)}}"> <i class="material-icons">edit</i></a>
              <button type="submit"  class="waves-effect waves-ananov-dark btn ananov-dark ananov-light-text" > <i class="material-icons">delete</i> </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3" class="text-center"> <h2>Данные отсутствуют</h2> </td>
        </tr>
      @endforelse
      <tfoot>
        <tr>
          <td colspan="3">
            <ul class="pagination pull-right">
              {{$categories->links()}}
            </ul>
          </td>
        </tr>
      </tfoot>
    </tbody>
  </table>
</div>
@endsection
