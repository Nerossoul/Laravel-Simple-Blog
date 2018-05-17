@extends('admin.layouts.app_admin')

@section('content')

  @component('admin.components.breadcrumb')
    @slot('title') Список статей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Статьи @endslot
  @endcomponent

  <hr>

  <a href="{{route('admin.article.create')}}" class="btn btn-primary pull-right anonov-main-color"><i class="fa fa-plus-square-o"></i> Создать статью</a>

  <table class="table">
    <thead>
      <th>Наименование</th>
      <th>Публикация</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($articles as $article)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->published}}</td>
          <td class="text-right">
            <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
              <input type="hidden" name="_method" value="DELETE">
              {{ csrf_field() }}
              <a class="btn btn-default" href="{{route('admin.article.edit',$article)}}"> <i class="fa fa-edit"></i></a>
              <button type="submit"  class="btn" > <i class="fa fa-trash-o"></i> </button>
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
              {{$articles->links()}}
            </ul>
          </td>
        </tr>
      </tfoot>
    </tbody>
  </table>
@endsection
