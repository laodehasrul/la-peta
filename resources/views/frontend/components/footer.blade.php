@php
$footer = menu('footer','_json');
@endphp
<footer class="">
  <div class="w-full bg-blue-800 p-10 text-md text-white font-semibold">
    <div class="container max-w-lg md:max-w-5xl mx-auto w-full flex flex-col md:flex-row justify-between gap-4">
      <div class="flex flex-col space-y-2">
        <h3>Tautan</h3>
        @foreach ($footer as $item)
        <a href="#" class="items-center">
          <i class="fa-solid fa-chevron-right"></i>
          {{  $item->title }}</a>
        @endforeach
        
       
      </div>
      <div>
        <h3>{{ setting('site.tag_site') }}</h3>
      </div>
      <div class="flex flex-col space-y-2">
        <a href=""><h3>Kontak Kami</h3></a>
        <div>
          <h3>{{ setting('site.description') }}</h3>
        </div>
        <div class="w-[320px] font-normal">
          <h3>{{ setting('site.address_site') }}</h3>
        </div>
        <div class="w-[320px] font-normal flex flex-col">
          <a href="#">{{ setting('site.contact_site') }}</a>
          <a href="#">{{ setting('site.email_site') }}</a>
        </div>
        <div class="w-[320px] font-normal flex flex-col">
          <p>Anda juga dapat menghubungi kami dengan <a href="#" class="border-b">klik link ini</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-yellow-400 p-5">
    <div class="max-w-lg md:max-w-5xl mx-auto">
      <p class="text-center pb-0 mb-0 text-blue-800" style="font-size: 1em !important;">{{ setting('admin.description') }}</p>
    </div>
  </div>


</footer>