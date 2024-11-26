  <div class="bg-white p-6 shadow rounded-md mb-6">
      <h3 class="text-xl font-semibold">Physical Exam</h3>
      <div class="flex flex-wrap">
          <!-- First half: Two images -->
          <div class=" flex">
              {{-- <div class=" p-2">
                  <img src="https://s3-alpha-sig.figma.com/img/0609/bcae/6290eab79938f992c054ca780a99fd83?Expires=1731888000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Cn0P48tjKXTuLhRtXZl3KJBCJk4DBodQJmHrtVT6JV4VulceolkNCw2j09MZoffZr1KCqBfO8xBiNsAQLlHQTEaXhNGpby0rZvg25NxzpSHtz0bhS7lAaV-uEJxB5MMnjlf9opNFl8YECHuPC3yDE5RSpXo9ocGBhBKr-gcZUrajXV-FnMQLyY6Jdm6dRR2wYFSDapcpeysnFQpSItK17S4DSy9RhRzbde~apR3KjvXbU9SrZDySRVjYCrLEylfEdAW3uZYVsNis0CcM0QpMGQZux7WwmLOTvClj-dF2fJm6MQcIhM3s9Kct-qq9qyXuucCteoelsl-TWhBQmOHMIA__"
                      alt="Exam Placeholder" class="w-full border rounded-md">
              </div>
              <div class=" p-2">
                  <img src="https://s3-alpha-sig.figma.com/img/ff0f/bb4b/6249dab4d7a79a6f5c1c23cc7f5e68bd?Expires=1731888000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ItdQovZ065PEAbzaQwnTKji87ULB4HmAHDzRG7WRbcWJDngyJDBUtVInbRj6x5SQ2snZx2FsIGoTirgvEy-V2Jupcu~6fIjOWl9Yu85XIHBWeLW7NNALkysWWS1BkX79bmhysuQE59iBZUlJNlru634gDqxM7UVNiG9gZNke2cT1NZg1McJXrcrlHBGwqaQhdGAfJOCPaYTdlbNBf8IeO6SWz3IEU6zM0vxbhfKf0vIKcPorYRvMKbRzEuwEBMTdes8J5MrXa7j81isghsjkr9XX0ei0zEyUn7HmjVuNVs-qpKGiTMxvRepXuTh7OtTqK8dT0JDcy6TlB1p-QJYjPA__"
                      alt="Exam Placeholder" class="w-full border rounded-md">
              </div> --}}
          </div>
      </div>
      <div class="p-6 bg-white rounded-lg">
          <h1 class="text-lg font-bold mb-4">Body Examination Comments</h1>

          <div class="grid grid-cols-3 gap-4 mb-6">
              <div class="col-span-3 text-center">
                  <h2 class="text-xl font-semibold mb-2">Head</h2>
              </div>
              <div>
                  <img src="https://s3-alpha-sig.figma.com/img/f408/3a35/076a3af141485aa0c8e914d5a9f62f63?Expires=1731888000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=NSybJkUf3mrywH4ft7CAm8PTtmNH9NWBSpQ6BMFEwJTvkLF9fwqDQ9k4-d1KCpBLPQgJGRzvAl2U7KJDJxLFwNLdkv1Xe2~HwtPcNzT1-DLC5mFzywsBQkXnbLJ4C699P3KnNx2oGLjR6hdh7wc6W-fRBhBytWgPBK4vrBN0v84y-z0dhgdAXwpTMBHJF6U3VKCy7YUH9CcE6xddAxJ3w6sFa3-cSjctemnOuF4tQLiAc89GWSukZOueErt3OPtLQaDr3HdgAF-iV9n5Rl4mhgrj2MSAJzMliOhloxuirT4pLZL7y5jPS1bge9PvJcU6eCrsGq3-hsEh1J0KyHENKg__"
                      alt="Front view of head" class="w-full mb-2">
                  <textarea placeholder="Comment"
                      class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      wire:model="form.head_front_comment"></textarea>
                  @error('form.head_front_comment')
                      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                  @enderror
              </div>
              <div>
                  <img src="https://s3-alpha-sig.figma.com/img/35b0/85cd/4b81c84aedf64e19c54d0cefa3b11774?Expires=1731888000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=pmWwM0S~uDl24NAyvOg99p4AYQ2tB3we0nyiWXuTFIfZ-3LvSlFVnm~23pJEKN7Wetjk43GxAq3LtbWJBWBvEB-GKlmBuslFYkqVrRmYXH6bKF8hHW5-YItJjmJTDHFqQjXeUPtgsm2L5FNBbSE9ZJSp3EMOLmSVuyz3K9uopyylB-G72HUXmBnDPNYhgvxwj-xRCSXiIOlTuXYNZ3mlx-Khooh95TMoOvS7Rrapf1HCpkdbvWTn-AAHUZQIXB3m-vpGkPMb1oDMqhkevtQ5ryQetGJJeNziw4KBjNZbjOraVlaZx4TXZ-gaXLQJ4SQ9iiLayrF8RgNupDQNvQOjCA__"
                      alt="Side view of head" class="w-full mb-2">
                  <textarea placeholder="Comment"
                      class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      wire:model="form.head_side_comment"></textarea>
                  @error('form.head_side_comment')
                      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                  @enderror
              </div>
              <div>
                  <img src="https://s3-alpha-sig.figma.com/img/0e23/2f42/4f886a12f2705bf3d330f22b0f406b82?Expires=1731888000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bXZgiJXbrFUAMoz9bDaUdGpaOWEOVcjN3xJYLzqb6esoZJl9ZFMl5vamjUZG5qA3CvF6uYVg76cKG9LpVTne5Hs1O-aFIHcWVLbtiJvg8pah7YXZbPmfPuP9XwiQzqrWJtmyIFtJWitn~7LHoGmu3e6dyc-Z5SRRYavGE7SuXD5g3gXyBzKD2SMj27cglKmal8zi1p1YpYg2CMemSY29y45IqguJqz3WjZ1szMWMEG~HRiTS6bhAvXkDLNoG3UTLOuHhNnHrJTNJJ0D4zv-TOn-wf51AX9ghANDyTdrR8afxqbvtDefOxjzE7d5eFjgqCz7ByybO8U3jiaixPu385g__"
                      alt="Back view of head" class="w-full mb-2">
                  <textarea placeholder="Comment"
                      class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      wire:model="form.head_back_comment"></textarea>
                  @error('form.head_back_comment')
                      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                  @enderror
              </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
              <div>
                  <h2 class="text-sm font-normal mb-2">Upper Limbs</h2>
                  <textarea placeholder="Comment"
                      class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      wire:model="form.upper_limbs"></textarea>
                  @error('form.upper_limbs')
                      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                  @enderror
              </div>
              <div>
                  <h2 class="text-sm font-normal mb-2">Torso and Abdomen</h2>
                  <textarea placeholder="Torso & Abdomen"
                      class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      wire:model="form.torso_abdomen"></textarea>
                  @error('form.torso_abdomen')
                      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                  @enderror
              </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
              <div>
                  <h2 class="text-sm font-normal mb-2">Lower Limbs</h2>
                  <textarea placeholder="Comment"
                      class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      wire:model="form.lower_limbs"></textarea>
                  @error('form.lower_limbs')
                      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                  @enderror
              </div>
              <div>
                  <h2 class="text-sm font-normal mb-2">Back and Glutes</h2>
                  <textarea placeholder="Back & Glutes"
                      class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      wire:model="form.back_glutes"></textarea>
                  @error('form.back_glutes')
                      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                  @enderror
              </div>
          </div>
      </div>

  </div>
