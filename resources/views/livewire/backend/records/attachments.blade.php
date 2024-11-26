  <div class="p-6 bg-white rounded-lg">
      <h1 class="text-3xl font-bold mb-4">Attachments</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div class="flex items-center justify-center w-full">
              <label for="dropzone-file"
                  class="flex flex-col items-center justify-center w-full @error('form.images') border-red-500 @enderror h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-100 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-200 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                      </svg>
                      <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                              upload</span> or drag and drop</p>
                      <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                  </div>
                  <input id="dropzone-file" type="file" class="hidden" multiple wire:model="form.images" />

                  @error('form.images')
                      <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                  @enderror
              </label>
          </div>
          <div class="flex flex-wrap items-center justify-center w-full">
              @if (!empty($form->images))
                  @foreach ($form->images as $image)
                      <img src="{{ $image->temporaryUrl() }}" height="120" width="150" class="m-1 ">
                  @endforeach
              @else
                  <div
                      class="border border-gray-400 border-2 p-8 rounded text-sm text-normal border-dashed h-full w-full">
                      No
                      Photo
                      Selected
                  </div>
              @endif
          </div>

      </div>

  </div>
