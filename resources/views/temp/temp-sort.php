              <div class="view-options__divider"></div>
              <div class="view-options__control">
                <label for="actions">Сортировать:</label>
                <div>
                  <select class="form-control form-control-sm" id="actions">
                    @foreach(trans('data.sort') as $key => $value)
                      <option value="{{ $key }}" <?php if($key == session('action')) echo 'selected'; ?>>{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>