@extends('frontend.layouts.app')

@section('content')
<section class="slide_section">
  <div class="images glide">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides flex">
        @foreach ($slides as $slide)
        <li class="glide__slide">
          <img class="w-full" src="{{ asset('storage/'. $slide->image) }}" alt="">
        </li>
        @endforeach

      </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
      <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
        <i class="fas fa-arrow-left"></i>
      </button>
      <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>
  </div>
</section>
<section class="index-berita">

  <div class="relative bg-yellow-300 justify-center p-4 md:items-center text-md md:text-lg font-semibold">
    <div class="max-w-xl md:max-w-5xl mx-auto flex flex-col md:flex-row">
      <span class="mr-4">Pengumuman:</span>
      <div><a href="#"><span class="text-gray-600 hover:text-black">Lorem ipsum dolor sit, amet
            consectetur adipisicing elit. Corporis, quidem.</span></a></div>
    </div>
  </div>

</section>
<section>
</section>
<section class="index-berita mt-10 mb-20">
  <div class="beritas glide">
    <div class="glide__track" data-glide-el="track">
      <ul class="glide__slides berita flex">
        @foreach ($posts as $post)
        <li class="glide__slide berita">
          <div class="justify-items-center rounded-sm bg-white rounded-md shadow-xl w-auto">
            <a href="{{ route('detailberita', [$post->category->slug, $post->slug]) }}">
              <div class=" bg-yellow-400 rounded-br-full top-0 pb-2 ">
                <img class="rounded-br-full h-[200px] w-full" src="{{ asset('storage/'. $post->image) }}" alt="">
              </div>
            </a>

            <div class=" p-10 text-start mx-auto  bottom-0 flex flex-col">
              <a href="{{ route('detailberita', [$post->category->slug, $post->slug]) }}">
                <h3 class="font-bold text-xl leading-tight hover:text-blue-800">{{$post->title}}</h3>
              </a>

              <p class="block flex items-center pt-2"><i><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg></i> {{ \Carbon\Carbon::parse($post->created_at)->isoFormat('D MMM YYYY')}}</p>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="glide__arrows" data-glide-el="controls">
      <button class="absolute left-0 top-1/2 glide__arrow glide__arrow--left" data-glide-dir="<">
        <i><svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg></i>
      </button>
      <button class="absolute right-0 top-1/2 glide__arrow glide__arrow--right" data-glide-dir=">">
        <i><svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg></i>
      </button>
    </div>
  </div>
  <div class="arrow mt-10">
    <div class="w-full">
      <div class="mx-auto justify-center flex mt-4">
        <a class="bg-blue-800 hover:bg-blue-500 px-8 py-3 rounded-full text-white text-sm font-semibold"
          href="/berita/kanal">Indeks
          Berita</a>
      </div>
    </div>
  </div>
</section>
<section class="link my-10">
  <div class="container mx-auto w-full justify-center items-center">
    <div class="links glide">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides flex">
          @foreach ($links as $link)
          <li class="glide__slide">
            <div class="text-center text-sm font-semibold">
              <a href="">
                <img src="{{ asset('storage/'. $link->image) }}" alt="">
                <p class="hover:text-blue-800">{{ $link->name }}</p>
              </a>
            </div>
          </li>
          @endforeach

          
        </ul>
      </div>
      <div class="glide__arrows w-full" data-glide-el="controls">
        <button class="absolute left-0 top-1/2 -ml-5 glide__arrow glide__arrow--left" data-glide-dir="<">
          <i><svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg></i>
        </button>
        <button class="absolute right-0 top-1/2 -mr-5 glide__arrow glide__arrow--right" data-glide-dir=">">
          <i><svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg></i>
        </button>
      </div>
    </div>

  </div>
</section>
<script>
  new Glide(".images", {
    type: 'carousel',
    perView: 1,
    autoplay: 3000,
  }).mount();
</script>
<script>
  new Glide(".beritas", {
    type: 'carousel',
    perView: 3,
    gap: 40,
    focusAt: 'center',
    autoplay: 3000,
    breakpoints: {
      1200:{
        perView:3
      },
      800:{
        perView:1
      },

    }
  }).mount();
</script>
<script>
  new Glide(".links", {
    type: 'carousel',
    perView: 7,
    gap: 40,
    breakpoints: {
      1200:{
        perView:5
      },
      800:{
        perView:3
      },

    }
  }).mount();
</script>
<style>
  .slide_section {
    justify-content: center;
  }

  .glide_slide img {
    width: 100%;
  }

  .glide__slide.berita {
    filter: blur(2px);
    opacity: .7;
    transition: .1s linear;
  }

  .glide__slide--active.berita {
    opacity: 1;
    filter: none;
    transform: scale(1.1);
  }

  .glide_slides.berita {
    overflow: visible;
  }
</style>

@stop