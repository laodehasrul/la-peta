@extends('frontend.layouts.app')

@section('content')
<section>
      <div class="w-full bg-blue-300">
            <div class="max-w-6xl mx-auto justify-center p-10">
                  <div class="mx-auto text-white flex items-center justify-between">
                        <div>
                              <span class="font-semibold">Profil</span>
                              <h1 class="font-bold text-2xl">Gallery</h1>
                        </div>
                        <div class="flex items-center text-sm">
                              <a href="{{ route('/')}}">Beranda</a>
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"></path>
                              </svg>
                              <p>Gallery</p>
                        </div>
                  </div>
            </div>
      </div>
</section>
<section class="my-10">
      <div class="max-w-6xl mx-auto p-10">
            <div class="mx-auto flex flex-col md:flex-row justify-between ">
                  <div class="w-full md:w-3/4 mr-0 md:mr-8">
                        <div class="py-10 grid grid-cols-1 md:grid-cols-2 gap-4">
                              @foreach($galeries as $galery)
                              <div class="space-y-4 border-b py-4 flex flex-col">
                                    <a href="{{ route('detailgalery', $galery->id) }}">
                                          <h2 class="font-bold text-md leading-none">{{ $galery->title }}</h2>
                                    </a>
                                    <div>
                                          <img src="{{ asset('storage/'. $galery->featured_image) }} " alt="">
                                          <span class="block">
                                                {{ \Carbon\Carbon::parse($galery->created_at)->isoFormat('D MMM YYYY')}}
                                          </span>
                                    </div>

                              </div>
                              @endforeach
                        </div>
                        <div class="border-t">
                              <div class="bg-gray-300 p-6 mt-10">
                                    {{ $galeries->links() }}
                              </div>
                        </div>
                        <div class="border-t">
                              <div class="bg-gray-300 p-6 mt-10">
                                    <p class="font-bold text-md">Terima kasih telah berpartisipasi...
                                    </p>
                              </div>
                        </div>
                  </div>
                  <div class="w-full md:w-1/3 relative">
                        <div class="sticky top-0">

                              <div class="border">
                                    <div class="p-10" x-data="{dropdownMenu: true}">
                                          <div @click="dropdownMenu = ! dropdownMenu"
                                                class="items-center justify-between flex">
                                                <label for="">Berita Terkini</label>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                      <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                          </div>
                                          <div x-show="dropdownMenu" class="mt-6 space-y-4">
                                                @foreach ($newpost as $newp)
                                                <div class="flex">
                                                      <a class="flex"
                                                            href="{{ route('detailberita', [$newp->category->slug, $newp->slug]) }}">
                                                            <img class="w-20 mr-2"
                                                                  src="{{ asset('storage/'. $newp->image) }}" alt="">
                                                            <p class="text-sm">
                                                                  {{\Illuminate\Support\Str::words(html_entity_decode(strip_tags($newp->title)),
                                                                  5)}}</p>
                                                      </a>
                                                </div>
                                                @endforeach

                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</section>



@stop