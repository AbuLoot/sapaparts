@extends('joystick-admin.layout')

@section('content')
  <h2 class="page-header">Редактирование</h2>

  @include('joystick-admin.partials.alerts')

  <div class="row">
    <div class="col-md-6">
      <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#">Инфо</a></li>
        <li role="presentation"><a href="/admin/products/{{ $product->id }}/comments">Коментарии</a></li>
      </ul>
      <br>
    </div>
    <div class="col-md-6">
      <p class="text-right">
        <a href="/admin/products" class="btn btn-primary btn-sm">Назад</a>
      </p>
    </div>
  </div><br>

  <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {!! csrf_field() !!}

    <div class="panel panel-default">
      <div class="panel-heading">Основная информация</div>
      <div class="panel-body">
        <div class="form-group">
          <label for="title">Название</label>
          <input type="text" class="form-control" id="title" name="title" minlength="5" maxlength="80" value="{{ (old('title')) ? old('title') : $product->title }}" required>
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" id="slug" name="slug" minlength="2" maxlength="80" value="{{ (old('slug')) ? old('slug') : $product->slug }}">
        </div>
        <div class="form-group">
          <label for="meta_title">Мета заголовок</label>
          <input type="text" class="form-control" id="meta_title" name="meta_title" maxlength="255" value="{{ (old('meta_title')) ? old('meta_title') : $product->meta_title }}">
        </div>
        <div class="form-group">
          <label for="meta_description">Мета описание</label>
          <input type="text" class="form-control" id="meta_description" name="meta_description" maxlength="255" value="{{ (old('meta_description')) ? old('meta_description') : $product->meta_description }}">
        </div>
        <div class="form-group">
          <label for="characteristic">Характеристика</label>
          <textarea class="form-control" name="characteristic" id="summernote" rows="8" maxlength="2000">{{ (old('characteristic')) ? old('characteristic') : $product->characteristic }}</textarea>
        </div>
        <div class="form-group">
          <label for="description">Описание</label>
          <textarea class="form-control" name="description" id="summernote2" rows="8" maxlength="2000">{{ (old('description')) ? old('description') : $product->description }}</textarea>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="price">Цена</label>
              <div class="input-group">
                <input type="text" class="form-control" id="price" name="price" maxlength="10" value="{{ (old('price')) ? old('price') : $product->price }}">                <div class="input-group-addon">〒</div>
              </div>
            </div>
            <div class="form-group">
              <label for="lang"><i class="material-icons md-18">language</i> Язык</label>
              <select id="lang" name="lang" class="form-control" required>
                @foreach($languages as $language)
                  @if ($product->lang == $language->slug)
                    <option value="{{ $language->slug }}" selected>{{ $language->title }}</option>
                  @else
                    <option value="{{ $language->slug }}">{{ $language->title }}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">Параметры</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6 form-group">
            <label for="barcode">Артикул</label>
            <input type="text" class="form-control" id="barcode" name="barcode" value="{{ (old('barcode')) ? old('barcode') : NULL }}">
          </div>
          <div class="col-md-6 form-group">
            <label for="company_id"><i class="material-icons md-18">business</i> Компания</label>
            <select id="company_id" name="company_id" class="form-control">
              <option value="0"></option>
              @foreach($companies as $company)
                @if ($company->id == $product->company_id)
                  <option value="{{ $company->id }}" selected>{{ $company->title }}</option>
                @else
                  <option value="{{ $company->id }}">{{ $company->title }}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <p><i class="material-icons md-18">list</i> <b>Категории</b></p>
            <div class="panel panel-default">
              <div class="panel-body" style="max-height: 250px; overflow-y: auto;">
                <?php $traverse = function ($nodes, $prefix = null) use (&$traverse, $product) { ?>
                  <?php foreach ($nodes as $node) : ?>
                    <div class="radio">
                      <label>
                        <input type="radio" name="category_id" value="{{ $node->id }}" <?php if ($product->category_id == $node->id) echo "checked"; ?>> {{ PHP_EOL.$prefix.' '.$node->title }}
                      </label>
                    </div>
                  <?php $traverse($node->children, $prefix.'___'); ?>
                  <?php endforeach; ?>
                <?php }; ?>
                <?php $traverse($categories); ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <p><i class="material-icons md-18">label_outline</i> <b>Опции</b></p>
            <div class="panel panel-default">
              <div class="panel-body" style="max-height: 250px; overflow-y: auto;">
                @forelse ($grouped as $data => $group)
                  <p><b>{{ $data }}</b></p>
                  @foreach ($group as $option)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="options_id[]" value="{{ $option->id }}" @if ($product->options->contains($option->id)) checked @endif> {{ $option->title }}
                      </label>
                    </div>
                  @endforeach
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="days">Срок доставки</label>
              <div class="input-group">
                <input type="text" class="form-control" id="days" name="days" maxlength="10" value="{{ (old('days')) ? old('days') : $product->days}}">
                <div class="input-group-addon">дней</div>
              </div>
            </div>
            <div class="form-group">
              <label for="count">Количество</label>
              <input type="number" class="form-control" id="count" name="count" minlength="5" maxlength="80" value="{{ (old('count')) ? old('count') : $product->count }}">
            </div>
            <div class="form-group">
              <label for="condition">Условие</label><br>
              <label class="radio-inline">
                <input type="radio" name="condition" value="1" <?php if ($product->condition = 1) echo 'checked'; ?>> Продажа
              </label>
              <label class="radio-inline">
                <input type="radio" name="condition" value="2" <?php if ($product->condition = 1) echo 'checked'; ?>> Аренда
              </label>
            </div>
          </div>
        </div>

        <div class="row" id="gallery">
          <div class="col-md-12">
            <label>Галерея</label><br>
          </div>
          <?php $images = ($product->images == true) ? unserialize($product->images) : []; ?>
          <?php $key_last = array_key_last($images); ?>
          @for ($i = 0; $i <= (($key_last >= 6) ? $key_last : 5); $i++)
            @if(array_key_exists($i, $images))
              <div class="col-md-4 col-xs-12 fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width:100%;height:200px;">
                  <img src="/img/products/{{ $product->path.'/'.$images[$i]['image'] }}">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="width:100%;height:200px;" data-trigger="fileinput"></div>
                <div>
                  <span class="btn btn-default btn-sm btn-file">
                    <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Изменить</span>
                    <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                    <input type="file" name="images[]" accept="image/*">
                  </span>
                  <label>
                    <input type="checkbox" name="remove_images[]" value="{{ $i }}"> Удалить
                  </label>
                  <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                </div>
              </div>
            @else
              <div class="col-md-4 col-xs-12 fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" style="width:100%;height:200px;" data-trigger="fileinput"></div>
                <div>
                  <span class="btn btn-default btn-sm btn-file">
                    <span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>
                    <span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>
                    <input type="file" name="images[]" accept="image/*">
                  </span>
                  <a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>
                </div>
              </div>
            @endif
          @endfor
        </div>
        <div>
          <button type="button" class="btn btn-success" onclick="addFileinput(this);">Добавить загрузчик</button>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <p><i class="material-icons md-18">style</i> <b>Режимы</b></p>
            <div class="panel panel-default">
              <div class="panel-body" style="max-height: 150px; overflow-y: auto;">
                @foreach($modes as $mode)
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="modes_id[]" value="{{ $mode->id }}" <?php if ($product->modes->contains($mode->id)) echo "checked"; ?>> {{ $mode->title }}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="form-group">
              <label for="sort_id">Порядковый номер</label>
              <input type="text" class="form-control" id="sort_id" name="sort_id" maxlength="5" value="{{ (old('sort_id')) ? old('sort_id') : $product->sort_id }}">
            </div>
            <div class="form-group">
              <label for="status">Статус</label>
              <select id="status" name="status" class="form-control" required>
                @foreach(trans('statuses.data') as $num => $status)
                  @if ($num == $product->status)
                    <option value="{{ $num}}" selected>{{ $status }}</option>
                  @else
                    <option value="{{ $num}}">{{ $status }}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
  </form>
@endsection

@section('head')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link href="/joystick/css/jasny-bootstrap.min.css" rel="stylesheet">
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="/joystick/js/jasny-bootstrap.js"></script>
  <script>
    /* Summernote */
    $(document).ready(function() {
      $('#summernote').summernote({
        height: 150
      });
    });

    /* Adding input element for image */
    function addFileinput(i) {
      var fileinput = 
        '<div class="col-md-4 col-xs-12 fileinput fileinput-new" data-provides="fileinput">' +
          '<div class="fileinput-preview thumbnail" style="width:300px;height:200px;" data-trigger="fileinput"></div>' +
          '<div>' +
            '<span class="btn btn-default btn-sm btn-file">' +
              '<span class="fileinput-new"><i class="glyphicon glyphicon-folder-open"></i>&nbsp; Выбрать</span>' +
              '<span class="fileinput-exists"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;</span>' +
              '<input type="file" name="images[]" accept="image/*">' +
            '</span>' +
            '<a href="#" class="btn btn-default btn-sm fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-trash"></i> Удалить</a>' +
          '</div>' +
        '</div>';

      $('#gallery').append(fileinput);
    }
  </script>
@endsection
