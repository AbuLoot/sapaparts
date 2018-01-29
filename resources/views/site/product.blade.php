@extends('layout')

@section('title_description', $product->title_description)

@section('meta_description', $product->meta_description)

@section('content')

  <main class="container main">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li><a href="/catalog/{{ $product->category->slug }}">{{ $product->category->title }}</a></li>
      <li class="active">{{ $product->title }}</li>
    </ol>

    <div class="row">
      <section class="col-sm-1 col-md-1">
        @if ($product->images != '')
          <?php $c = 0; ?>
          <?php $images = unserialize($product->images); ?>
          <ol class="list-unstyled list-inline">
            @foreach ($images as $k => $image)
              <li data-target="#carousel-goods" data-slide-to="{{ $c }}" @if ($c == 0) class="active" @endif><?php $c++; ?> 
                <a href="#" class="thumbnail">
                  <img src="/img/products/{{ $product->path.'/'.$images[$k]['mini_image'] }}" class="img-responsive">
                </a>
              </li>
            @endforeach
          </ol>
        @else
          <ol class="list-unstyled">
            <li data-target="#carousel-goods" data-slide-to="0" class="active">
              <a href="#" class="thumbnail">
                <img src="/img/no-image-mini.png" class="img-responsive">
              </a>
            </li>
          </ol>
        @endif
      </section>
      <section class="col-sm-6 col-md-6">
        <div id="carousel-goods" class="carousel" data-ride="carousel" data-interval="false">
          <section class="my-gallery carousel-inner" role="listbox" itemscope itemtype="http://schema.org/ImageGallery">
            @if ($product->images != '')
              <?php $c = 0; ?>
              @foreach ($images as $k => $image)
                <figure class="item @if ($c == 0) active @endif" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject"><?php $c++; ?>
                  <a href="/img/products/{{ $product->path.'/'.$images[$k]['image'] }}" itemprop="contentUrl" data-size="1024x768" class="thumbnail">
                    <img src="/img/products/{{ $product->path.'/'.$images[$k]['image'] }}" class="img-responsive" itemprop="thumbnail" alt="{{ $product->title }}">
                  </a>
                </figure>
              @endforeach
            @else
              <div class="item active">
                <div class="thumbnail">
                  <img src="/img/no-image-big.png" class="img-responsive">
                </div>
              </div>
            @endif
          </section>

          <!-- Root element of PhotoSwipe. Must have class pswp. -->
          <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

            <!-- Background of PhotoSwipe. 
                 It's a separate element, as animating opacity is faster than rgba(). -->
            <div class="pswp__bg"></div>

            <!-- Slides wrapper with overflow:hidden. -->
            <div class="pswp__scroll-wrap">
              <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
              <!-- don't modify these 3 pswp__item elements, data is added later on. -->
              <div class="pswp__container">
                  <div class="pswp__item"></div>
                  <div class="pswp__item"></div>
                  <div class="pswp__item"></div>
              </div>

              <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
              <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                  <!--  Controls are self-explanatory. Order can be changed. -->
                  <div class="pswp__counter"></div>

                  <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                  <button class="pswp__button pswp__button--share" title="Share"></button>
                  <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                  <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                  <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                  <!-- element will get class pswp__preloader--active when preloader is running -->
                  <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                  <div class="pswp__caption__center"></div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="col-sm-5 col-md-5">
        <h1>{{ $product->title }}</h1>
        <table class="table">
          <tbody>
            <tr>
              <td>Код товара:</td>
              <td>{{ $product->barcode }}</td>
            </tr>
            <tr>
              <td>OEM:</td>
              <td>{{ $product->oem }}</td>
            </tr>
            <tr>
              <td>Применение:</td>
              <td></td>
            </tr>
            <tr>
              <td>Объем:</td>
              <td>{{ $product->capacity }}</td>
            </tr>
            <tr>
              <td>Вес:</td>
              <td>{{ $product->weight }}</td>
            </tr>
            <tr>
              <td>Доступность:</td>
              <td>Предзаказ</td>
            </tr>
          </tbody>
        </table>

        <h2>{{ $product->price }} 〒</h2>

        <?php $items = session('items'); ?>

        @if(is_array($items) AND in_array($product->id, $items['products_id']))
          <a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>
        @else
          <button class="btn btn-basket btn-danger" id="add-to-basket" data-id="{{ $product->id }}"><span class="glyphicon glyphicon-shopping-cart"></span> В корзину</button>
        @endif
      </section>

      <section class="col-md-12">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Описание</a></li>
          <li><a href="#characteristic" aria-controls="characteristic" role="tab" data-toggle="tab">Характеристика</a></li>
          <li><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Отзывы</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="description">
            {!! $product->description !!}
          </div>
          <div class="tab-pane" id="characteristic">
            {!! $product->characteristic !!}
          </div>
          <div class="tab-pane" id="reviews">
            <div class="media"><hr>
              <div class="media-body">
                <div>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-muted"></span>
                </div>
                <h4 class="media-heading">Middle aligned media</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
            <div class="media"><hr>
              <div class="media-body">
                <div>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                  <span class="glyphicon glyphicon-star text-warning"></span>
                </div>
                <h4 class="media-heading">Middle aligned media</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>

            <form>
              <h3>Добавьте отзыв о товаре</h3>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Введите имя">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Введите email">
              </div>
              <div class="form-group">
                <select class="form-control">
                  <option>1 звезда</option>
                  <option>2 звезды</option>
                  <option>3 звезды</option>
                  <option>4 звезды</option>
                  <option>5 звезд</option>
                </select>
              </div>
              <div class="form-group">
                <textarea class="form-control" rows="3" placeholder="Комментарий"></textarea>
              </div>
              <button type="submit" class="btn btn-default">Добавить</button>
            </form>
          </div>
        </div>

      </section>

    </div>
  </main>

@endsection

@section('head')
  <link rel="stylesheet" href="/bower_components/photoswipe/dist/photoswipe.css">
  <!-- Skin CSS file (styling of UI - buttons, caption, etc.)
       In the folder of skin CSS file there are also:
       - .png and .svg icons sprite, 
       - preloader.gif (for browsers that do not support CSS animations) -->
  <link rel="stylesheet" href="/bower_components/photoswipe/dist/default-skin/default-skin.css">
@endsection

@section('scripts')
  <script>
    function addToBasket(i) {

      var productId = $(this).data("id");

      if (productId != '') {
        $.ajax({
          type: "get",
          url: '/add-to-basket/'+productId,
          dataType: "json",
          data: {},
          success: function(data) {
            console.log(data);
            $('*[data-id="'+productId+'"]').replaceWith('<a href="/basket" class="btn btn-basket btn-success" data-toggle="tooltip" data-placement="top" title="Перейти в корзину"><span class="glyphicon glyphicon-shopping-cart"></span> Оформить</a>');
            $('#count-items').text(data.countItems);
            alert('Товар добавлен в корзину');
          }
        });
      } else {
        alert("Ошибка сервера");
      }
    };

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <script src="/bower_components/photoswipe/dist/photoswipe.min.js"></script>
  <script src="/bower_components/photoswipe/dist/photoswipe-ui-default.min.js"></script>
  <script>
    var initPhotoSwipeFromDOM = function(gallerySelector) {

        // parse slide data (url, title, size ...) from DOM elements 
        // (children of gallerySelector)
        var parseThumbnailElements = function(el) {
            var thumbElements = el.childNodes,
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                size,
                item;

            for(var i = 0; i < numNodes; i++) {

                figureEl = thumbElements[i]; // <figure> element

                // include only element nodes 
                if(figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute('data-size').split('x');

                // create slide object
                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10)
                };


                if(figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML; 
                }

                if(linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute('src');
                } 

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };

        // find nearest parent element
        var closest = function closest(el, fn) {
            return el && ( fn(el) ? el : closest(el.parentNode, fn) );
        };

        // triggers when user clicks on thumbnail
        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if(!clickedListItem) {
                return;
            }

            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                childNodes = clickedListItem.parentNode.childNodes,
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;

            for (var i = 0; i < numChildNodes; i++) {
                if(childNodes[i].nodeType !== 1) { 
                    continue; 
                }

                if(childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }



            if(index >= 0) {
                // open PhotoSwipe if valid index found
                openPhotoSwipe( index, clickedGallery );
            }
            return false;
        };

        // parse picture index and gallery index from URL (#&pid=1&gid=2)
        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
            params = {};

            if(hash.length < 5) {
                return params;
            }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                if(!vars[i]) {
                    continue;
                }
                var pair = vars[i].split('=');  
                if(pair.length < 2) {
                    continue;
                }           
                params[pair[0]] = pair[1];
            }

            if(params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;

            items = parseThumbnailElements(galleryElement);

            // define options (if needed)
            options = {

                // define gallery index (for URL)
                galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                        rect = thumbnail.getBoundingClientRect(); 

                    return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                }

            };

            // PhotoSwipe opened from URL
            if(fromURL) {
                if(options.galleryPIDs) {
                    // parse real index when custom PIDs are used 
                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                    for(var j = 0; j < items.length; j++) {
                        if(items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            // exit if index not found
            if( isNaN(options.index) ) {
                return;
            }

            if(disableAnimation) {
                options.showAnimationDuration = 0;
            }

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };

        // loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll( gallerySelector );

        for(var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i+1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

        // Parse URL and open gallery if it contains #&pid=3&gid=1
        var hashData = photoswipeParseHash();
        if(hashData.pid && hashData.gid) {
            openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
        }
    };

    // execute above function
    initPhotoSwipeFromDOM('.my-gallery');
  </script>
@endsection
