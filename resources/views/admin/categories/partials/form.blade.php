<label for="">Статус</label>
<select class="form-control" name="published">
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="1" >Опубликовать</option>
    <option value="0" >Не опубликовать</option>

  @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" value="{{$category->title or ""}}" required>

<label for="">Родительская категория</label>
<select class="form-control" name="parent_id">
  <option value="0" >-- без родительской категории --</option>

  @include('admin.categories.partials.categories', ['categories' => $categories])

</select>
<!--label for="">Укажите порядковый номер категории</label>
<input type="number" class="form-control" name="order" placeholder="0" value="{{$category->order or ""}}"-->
<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$category->slug or ""}}" readonly="">

<hr />

<input class="btn btn-primary ananov-main-color" type="submit" value="Сохранить">
<hr />
