<label for="" class="" class="ananov-dark-text">Статус</label>
<select class="form-control" name="published">
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="1" >Опубликовать</option>
    <option value="0" >Не опубликовать</option>

  @endif
</select>

<label for="" class="ananov-dark-text">Наименование</label>
<input type="text" class="form-control white" name="title" placeholder="Заголовок категории" value="{{$category->title or ""}}" required>

<label for="" class="ananov-dark-text">Родительская категория</label>
<select class="form-control" name="parent_id">
  <option value="0" >-- без родительской категории --</option>

  @include('admin.categories.partials.categories', ['categories' => $categories])

</select>
<!--label for="">Укажите порядковый номер категории</label>
<input type="number" class="form-control" name="order" placeholder="0" value="{{$category->order or ""}}"-->
<label for="" class="ananov-dark-text">Slug</label>
<input type="text" class="form-control white" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug or ""}}" readonly="">

<hr />

<input class="btn btn-primary ananov-dark" type="submit" value="Сохранить">
<hr />
