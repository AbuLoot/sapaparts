@extends('joystick-admin.layout')

@section('content')
  <h2 class="page-header">Добавление</h2>

  @include('joystick-admin.partials.alerts')

  <p class="text-right">
    <a href="/admin/products" class="btn btn-primary btn-sm">Назад</a>
  </p>
  <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="panel panel-default">
      <div class="panel-heading">Основная информация</div>
      <div class="panel-body">
        <div class="form-group">
          <label for="title">Название</label>
          <input type="text" class="form-control" id="title" name="title" minlength="5" maxlength="80" value="{{ (old('title')) ? old('title') : '' }}" required>
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" id="slug" name="slug" minlength="2" maxlength="80" value="{{ (old('slug')) ? old('slug') : '' }}">
        </div>
        <div class="form-group">
          <label for="meta_title">Мета заголовок</label>
          <input type="text" class="form-control" id="meta_title" name="meta_title" maxlength="255" value="{{ (old('meta_title')) ? old('meta_title') : '' }}">
        </div>
        <div class="form-group">
          <label for="meta_description">Мета описание</label>
          <input type="text" class="form-control" id="meta_description" name="meta_description" maxlength="255" value="{{ (old('meta_description')) ? old('meta_description') : '' }}">
        </div>
        <div class="form-group">
          <label for="characteristic">Характеристика</label>
          <textarea class="form-control" id="summernote" name="characteristic" rows="6" maxlength="2000">{{ (old('characteristic')) ? old('characteristic') : '' }}</textarea>
        </div>
        <div class="form-group">
          <label for="description">Описание</label>
          <textarea class="form-control" id="summernote2" name="description" rows="6" maxlength="2000">{{ (old('description')) ? old('description') : '' }}</textarea>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="price">Цена</label>
              <div class="input-group">
                <input type="text" class="form-control" id="price" name="price" maxlength="10" value="{{ (old('price')) ? old('price') : '' }}">
                <div class="input-group-addon">〒</div>
              </div>
            </div>
            <div class="form-group">
              <label for="lang">Язык</label>
              <select id="lang" name="lang" class="form-control" required>
                @foreach($languages as $language)
                  @if (old('lang') == $language->slug)
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
            <label for="company_id">Компания</label>
            <select id="company_id" name="company_id" class="form-control">
              <option value=""></option>
              @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <p><b>Категории</b></p>
            <div class="panel panel-default">
              <div class="panel-body" style="max-height: 250px; overflow-y: auto;">
                <?php $traverse = function ($nodes, $prefix = null) use (&$traverse) { ?>
                  <?php foreach ($nodes as $node) : ?>
                    <div class="radio">
                      <label>
                        <input type="radio" name="category_id" value="{{ $node->id }}"> {{ PHP_EOL.$prefix.' '.$node->title }}
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
            <p><b>Опции</b></p>
            <div class="panel panel-default">
              <div class="panel-body" style="max-height: 250px; overflow-y: auto;">
                @forelse ($grouped as $data => $group)
                  <p><b>{{ $data }}</b></p>
                  @foreach ($group as $option)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="options_id[]" value="{{ $option->id }}"> {{ $option->title }}
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
                <input type="text" class="form-control" id="days" name="days" maxlength="10" value="{{ (old('days')) ? old('days') : 7 }}">
                <div class="input-group-addon">дней</div>
              </div>
            </div>
            <div class="form-group">
              <label for="count">Количество</label>
              <input type="number" class="form-control" id="count" name="count" minlength="5" maxlength="80" value="{{ (old('count')) ? old('count') : 1 }}">
            </div>
            <div class="form-group">
              <label for="condition">Условие</label><br>
              <label class="radio-inline">
                <input type="radio" name="condition" value="1" checked> Продажа
              </label>
              <label class="radio-inline">
                <input type="radio" name="condition" value="2"> Аренда
              </label>
            </div>
          </div>
        </div>
        <div class="row" id="gallery">
          <div class="col-md-12">
            <label>Галерея</label><br>
          </div>
          @for ($i = 0; $i < 6; $i++)
            <div class="col-md-4 col-sm-4 col-xs-12 fileinput fileinput-new" data-provides="fileinput">
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
          @endfor
        </div>
        <div>
          <button type="button" class="btn btn-success" onclick="addFileinput(this);">Добавить загрузчик</button>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <p><b>Режимы</b></p>
            <div class="panel panel-default">
              <div class="panel-body" style="max-height: 150px; overflow-y: auto;">
                @foreach($modes as $mode)
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="modes_id[]" value="{{ $mode->id }}"> {{ $mode->title }}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="form-group">
              <label for="sort_id">Порядковый номер</label>
              <input type="text" class="form-control" id="sort_id" name="sort_id" maxlength="5" value="{{ (old('sort_id')) ? old('sort_id') : NULL }}">
            </div>
            <div class="form-group">
              <label for="status">Статус:</label>
              <select id="status" name="status" class="form-control" required>
                @foreach(trans('statuses.data') as $num => $status)
                  @if ($num == 1)
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
      <button type="submit" class="btn btn-primary">Создать</button>
    </div>
  </form>

@endsection

@section('head')
  <link href="/joystick/css/jasny-bootstrap.min.css" rel="stylesheet">
  <script src='https://cdn.tiny.cloud/1/s9hqkvt9a9gdfym5yyaz2pgllizccjq8p71rxv2s5gp714p4/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      height: 300,
      plugins: [
        'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
        'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
        'save table directionality emoticons template paste'
      ],
      content_css: ['/css/style.css', '/css/custom.css'],
      menubar: 'file edit view insert format tools table help',
      toolbar: 'insertfile undo redo | formatselect fontselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor removeformat | link image media | code',
      font_formats: 'Playfair Display; Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva;'

    });
  </script>
@endsection

@section('scripts')
  <script src="/joystick/js/jasny-bootstrap.js"></script>
  <script>
    function addFileinput(i) {
      var fileinput =
        '<div class="col-md-4 col-sm-4 col-xs-12 fileinput fileinput-new" data-provides="fileinput">' +
            '<div class="fileinput-preview thumbnail" style="width:100%;height:200px;" data-trigger="fileinput"></div>' +
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
