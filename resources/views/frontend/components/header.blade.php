@php
$items = menu('home','_json');
@endphp


<ul class="bg-white w-full fixed z-10 top-0 md:hidden" x-data="{
    open: false,
      toggle() {
          if (this.open) {
              return this.close()
          }
          this.$refs.button.focus()
          this.open = true
      },
      close(focusAfter) {
          if (! this.open) return
          this.open = false
          focusAfter && focusAfter.focus()
      }
    }" x-id="['dropdown-button-first']">
  <div class="flex max-w-xl justify-between space-x-6 items-center w-full mx-auto p-2">
    <div class="">
      <a href="/"><img class="h-[40px]" src="{{ Voyager::image(setting('site.logo')) }}" alt=""></a>
    </div>
    <div x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button-first')"
      class="cursor-pointer">
      <svg x-show="!open" class="w-10 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
      <svg x-show="open" class="w-10 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
      </svg>
    </div>
  </div>
  <div x-ref="panel" x-show="open" x-transition.origin.top x-on:click.outside="close($refs.button)"
    :id="$id('dropdown-button-first')" style="display: none;"
    class="absolute bg-white mt-2 w-full overflow-y-scroll h-80 p-4">
    <div class="max-w-lg space-y-3 w-full mx-auto py-5">
      <div class="border-b pb-3">
        <a class="text-gray-600 hover:text-blue-800" href="#"><svg class="w-5 h-5" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
            </path>
          </svg></a>
      </div>

      @foreach ($items as $menu_item)
      <div class="border-b pb-3" x-data="{
        open: false,
        toggle() {
            if (this.open) {
                return this.close()
            }
      
            this.$refs.button.focus()
      
            this.open = true
        },
        close(focusAfter) {
            if (! this.open) return
      
            this.open = false
      
            focusAfter && focusAfter.focus()
        }
        }" x-id="['dropdown-button-second']">

        <div class="flex w-full justify-between items-center text-gray-600 hover:text-blue-800 cursor-pointer"
          -ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button-second')">
          <p>{{ $menu_item->title }}</p>
          <svg :class="{'rotate-180': open}" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
          </svg>
        </div>
        @foreach ($menu_item->children as $subItem)
        @if ($subItem->children->count())
        <div class="ml-4 text-sm mt-2 space-y-3" x-ref="panel" x-show="open" x-transition.origin.top.left
          :id="$id('dropdown-button-second')" style="display: none;">

          <div class="border-b pb-3" x-data="{
              open: false,
              toggle() {
                  if (this.open) {
                      return this.close()
                  }
            
                  this.$refs.button.focus()
            
                  this.open = true
              },
              close(focusAfter) {
                  if (! this.open) return
            
                  this.open = false
            
                  focusAfter && focusAfter.focus()
              }
              }" x-id="['dropdown-button-last']">
            <div class="flex w-full justify-between items-center text-gray-600 hover:text-blue-800 cursor-pointer"
              -ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button-last')">
              <a class="text-gray-600 hover:text-blue-800" href="#" x>{{ $subItem->title }}</a>
              <svg :class="{'rotate-180': open}" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
            @foreach ($subItem->children as $child)
            @if ($child->children->count())
            <div class="ml-4 text-sm mt-2 space-y-3" x-ref="panel" x-show="open" x-transition.origin.top.left
              :id="$id('dropdown-button-second')" style="display: none;">

              <div class="border-b pb-3" x-data="{
              open: false,
              toggle() {
                  if (this.open) {
                      return this.close()
                  }
            
                  this.$refs.button.focus()
            
                  this.open = true
              },
              close(focusAfter) {
                  if (! this.open) return
            
                  this.open = false
            
                  focusAfter && focusAfter.focus()
              }
              }" x-id="['dropdown-button-last']">

                <div class="flex w-full justify-between items-center text-gray-600 hover:text-blue-800 cursor-pointer"
                  -ref="button" x-on:click="toggle()" :aria-expanded="open"
                  :aria-controls="$id('dropdown-button-last')">
                  <a class="text-gray-600 hover:text-blue-800" href="#" x>{{ $child->title }}</a>
                  <svg :class="{'rotate-180': open}" class="w-4 h-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </div>
                @foreach ($child->children as $subChild)
                <div class="ml-4 text-sm mt-2 space-y-3" x-ref="panel" x-show="open" x-transition.origin.top.left
                  :id="$id('dropdown-button-last')" style="display: none;">
                  <div class="border-b pb-3">
                    <a class="text-gray-600 hover:text-blue-800" href="#">{{ $subChild->title }}</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            @else
            <div class="ml-4 text-sm mt-2 space-y-3" x-ref="panel" x-show="open" x-transition.origin.top.left
              :id="$id('dropdown-button-last')" style="display: none;">
              <div class="border-b pb-3">
                <a class="text-gray-600 hover:text-blue-800" href="#">{{ $child->title }}</a>
              </div>
            </div>
            @endif
            @endforeach


          </div>

        </div>


        @else
        <div class="ml-4 text-sm mt-2 space-y-3" x-ref="panel" x-show="open" x-transition.origin.top.left
          :id="$id('dropdown-button-second')" style="display: none;">
          <div class="border-b pb-3">
            <div class="flex w-full justify-between items-center text-gray-600 hover:text-blue-800 cursor-pointer">
              <a class="text-gray-600 hover:text-blue-800" href="#" x>{{ $subItem->title }}</a>
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
      @endforeach
     
    </div>

  </div>

</ul>

<!-- MD -->
<ul class="hidden md:flex justify-center space-x-6 items-center bg-white w-full fixed z-10 top-0 p-2">
  <div class="">
    <a href="/"><img class="h-[60px]" src="{{ Voyager::image(setting('site.logo')) }}" alt=""></a>

  </div>
  <li class="">
    <a href="/" target="_self" style="">
      <i class="fa fa-home"></i>
    </a>
  </li>
  <!-- 1 -->
  @foreach($items as $menu_item)
  <li x-data="{ isOpen: false, timeout: null }" x-on:mouseenter="isOpen = true; clearTimeout(timeout)"
    x-on:mouseleave="timeout = setTimeout(() => { isOpen = false }, 300)">

    <a href="{{ $menu_item->link()}}" target="_self" style="">
      <span class="font-semibold">{{ $menu_item->title }}</span>
    </a>
    @if($menu_item->children->count())

    <ul x-show="isOpen" class="z-10 mt-4 absolute rounded-lg flex max-w-6xl w-full left-0 right-0 mx-auto">
      <div class="bg-blue-800 opacity-80 relative w-1/3 p-10 text-white">
        <h3 class="font-bold text-xl mb-2">Lebih dekat dengan Kementrian PUPR</h3>
        <p>Anda bisa mendapatkan informasi mengenai profil dan sejarah Kementerian PUPR</p>
      </div>
      <div class=" bg-white w-full flex text-xs p-10">
        <!-- 2 -->
        @foreach($menu_item->children as $subItem)
        <li class="flex-1">
          <a class="hover:ml-2 font-semibold" href="{{ url($subItem->url) }}" target="{{ $subItem->target }}">
            @if($subItem->children->count())
            <p class="font-bold">{{ $subItem->title }}</p>
            @else
            <p class="">{{ $subItem->title }}</p>
            @endif
          </a>
          @if($subItem->children->count())
          <ul class="space-y-4 pt-4">
            @foreach($subItem->children as $child4)
            <li class="flex relative w-full" x-data="{ isOpen: false, timeout: null }"
              x-on:mouseenter="isOpen = true; clearTimeout(timeout)"
              x-on:mouseleave="timeout = setTimeout(() => { isOpen = false }, 300)">
              <a class="hover:ml-2 items-center flex w-full" href="{{ url($child4->url) }}"
                target="{{ $child4->target }}" style="">
                <span class="mr-10">{{ $child4->title }}</span>
                @if($child4->children->count())
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                @endif
              </a>
              @if($child4->children->count())
              <ul x-show="isOpen" class="left-1/2 p-8 w-max rounded-md absolute  space-y-4 bg-white shadow-md z-10">
                @foreach ($child4->children as $child5)
                <li class="">
                  <a class="hover:ml-2" href="{{ url($child5->url) }}" target="_self" style="">
                    <span>{{ $child5->title }}</span>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>
            @endforeach
          </ul>
          @endif
        </li>
        @endforeach
      </div>

    </ul>

    @endif
  </li>
  @endforeach
</ul>