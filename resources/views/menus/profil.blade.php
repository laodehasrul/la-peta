@php
$items = menu('Profil','_json');
@endphp

<ul>
      @foreach($items as $menu_item)
      <li x-data="{dropdownMenu: true}">
            <a @click="dropdownMenu = ! dropdownMenu" class="font-bold flex items-center"  href="{{ url($menu_item->url) }}">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                  {{ $menu_item->title }}</a>
            @if($menu_item->children->count())
            <ul class="ml-4" x-show="dropdownMenu">
                  @foreach($menu_item->children as $subItem)
                  <li>
                        <a class="flex items-center" href="{{ url($subItem->url) }}">
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                              {{ $subItem->title }}</a>
                        @if($subItem->children->count())
                        <ul class="ml-8">
                              @foreach($subItem->children as $hasChild)
                              <li><a class="flex items-center" href="{{ url($hasChild->url) }}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                    {{ $hasChild->title }}</a></li>
                              @endforeach
                        </ul>
                        @endif
                  </li>
                  @endforeach
            </ul>
            @endif
      </li>
      @endforeach
</ul>