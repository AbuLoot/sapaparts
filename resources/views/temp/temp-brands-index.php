
    <!-- Brands -->
    <div class="block block-brands">
      <div class="container">
        <div class="block-brands__slider">
          <div class="owl-carousel">
            @foreach ($companies as $company)
              <div class="block-brands__item">
                <a href="/brand/{{ $company->slug }}">
                  <img src="/img/companies/{{ $company->logo }}" alt="{{ $company->title }}">
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
