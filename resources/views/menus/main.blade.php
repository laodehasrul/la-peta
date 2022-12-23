<ul class="flex justify-center space-x-6 items-center bg-white w-full fixed z-10 top-0">
      <div class="">
            <a href="/"><img class="h-[60px]" src="https://pu.go.id/assets/front/img/logo.svg" alt=""></a>

      </div>
      <li class="">
            <a href="/" target="_self" style="">
                  <i class="fa fa-home"></i>
            </a>
      </li>
      <!-- 1 -->

      <li x-data="{ isOpen: false, timeout: null }" x-on:mouseenter="isOpen = true; clearTimeout(timeout)"
            x-on:mouseleave="timeout = setTimeout(() => { isOpen = false }, 300)">

            <a href="" target="_self" style="">
                  <span class="font-semibold"></span>
            </a>


            <ul x-show="isOpen" class="z-10 mt-4 absolute rounded-lg flex max-w-6xl w-full left-0 right-0 mx-auto">
                  <div class="bg-blue-800 opacity-80 relative w-1/3 p-10 text-white">
                        <h3 class="font-bold text-xl mb-2">Lebih dekat dengan Kementrian PUPR</h3>
                        <p>Anda bisa mendapatkan informasi mengenai profil dan sejarah Kementerian PUPR</p>
                  </div>
                  <div class=" bg-white w-full flex text-xs p-10">
                        <!-- 2 -->

                        <li class="flex-1">
                              <a class="hover:ml-2 font-semibold" href="" target="">

                                    <p class="font-bold"></p>

                                    <p class=""></p>

                              </a>

                              <ul class="space-y-4 pt-4">

                                    <li class="flex relative w-full" x-data="{ isOpen: false, timeout: null }"
                                          x-on:mouseenter="isOpen = true; clearTimeout(timeout)"
                                          x-on:mouseleave="timeout = setTimeout(() => { isOpen = false }, 300)">
                                          <a class="hover:ml-2 items-center flex w-full" href="#" target="_self"
                                                style="">
                                                <span class="mr-10"></span>

                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>

                                          </a>

                                          <ul x-show="isOpen"
                                                class="left-1/2 p-8 w-max rounded-md absolute  space-y-4 bg-white shadow-md">

                                                <li class="">
                                                      <a class="hover:ml-2" href="#" target="_self" style="">
                                                            <span></span>
                                                      </a>
                                                </li>

                                          </ul>

                                    </li>

                              </ul>

                        </li>

                  </div>

            </ul>


      </li>

</ul>