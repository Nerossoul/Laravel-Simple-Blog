<label for="">Статус</label>
<select class="form-control" name="published">
  @if (isset($article->id))
    <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
  @else
    <option value="1" >Опубликовать</option>
    <option value="0" >Не публиковать</option>

  @endif
</select>

<label for="">Заголовок текста</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок статьи" value="{{$article->title or ""}}" required>

<!--label for="">Slug (уникальное значение)</label-->
<input type="hidden" class="form-control" name="slug" placeholder="Автоматическая генерация" value="{{$article->slug or ""}}" readonly="">
<label for="">Выберите категорию</label>
<select class="form-control" name="categories[]"> <!-- multiple=""-->
  @include('admin.articles.partials.categories', ['categories' => $categories])
</select>
<!--label for="">Укажите порядковый номер статьи в категории</label>
<input type="number" class="form-control" name="order" placeholder="0" value="{{$article->order or ""}}"-->
<!--label for="">Краткое описание</label-->
<!--textarea name="description_short" id="description-short" class="form-control">{{$article->description_short or ""}}</textarea-->

<label for="">Введите текст статьи</label>
<textarea name="description" id="description" class="form-control">{{$article->description or ""}}</textarea>
<!--
<label for="">Мета заголовок</label>
<input type="text" class="form-control" name="meta_title" placeholder="Meta заголовок" value="{{$article->meta_title or ""}}">
<label for="">Мета описание</label>
<input type="text" class="form-control" name="meta_description" placeholder="Meta описание" value="{{$article->meta_description or ""}}">
<label for="">Ключевые слова</label>
<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова, через запятую" value="{{$article->meta_keyword or ""}}">
-->
<hr />
<input class="btn btn-primary ananov-main-color" type="submit" value="Сохранить">
<hr />
