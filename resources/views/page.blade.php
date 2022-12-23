@extends('frontend.layouts.app')

@section('content')
<section>
      <div class="w-full bg-blue-300">
            <div class="max-w-6xl mx-auto justify-center p-10">
                  <div class="mx-auto text-white flex items-center justify-between">
                        <div>
                              <span class="font-semibold">Profil</span>
                              <h1 class="font-bold text-2xl">{{ $page->title }}</h1>
                        </div>
                        <div class="flex items-center text-sm">
                              <a href="{{ route('/')}}">Beranda</a>
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"></path>
                              </svg>
                              <p>Page</p>
                        </div>
                  </div>
            </div>
      </div>
</section>
<section class="my-10">
      <div class="max-w-6xl mx-auto p-10">
            <div class="mx-auto flex flex-col md:flex-row justify-between ">
                  <div class="w-full md:w-3/4 mr-0 md:mr-8">
                        <div class="py-10">
                              <h1 class="font-bold text-4xl">{{ $page->title }}</h1>
                              <div>
                                    {!! $page->body !!}
                              </div>
                        </div>
                        <div class="border-t">
                              <div class="bg-gray-300 p-6 mt-10">
                                    <p class="font-bold text-md">Terima kasih telah berpartisipasi merespon kuis ini..
                                    </p>
                              </div>
                        </div>
                        <div class="">
                              <div class="flex gap-8 py-4">
                                    <div class="flex items-center space-x-2">
                                          <p>
                                                {{ \Carbon\Carbon::parse($page->created_at)->isoFormat('D MMM YYYY')}}
                                          </p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                          </svg>
                                          <p>99999</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                </path>
                                          </svg>
                                          <p>9999</p>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                                                </path>
                                          </svg>
                                          <p>Print</p>
                                    </div>
                              </div>
                        </div>
                        <div class="space-y-2">
                              <h2 class="font-bold text-2xl">Biro Komunikasi Publik Kementerian PUPR</h2>
                              <div class="flex font-semibold text-xl">
                                    <label for="">Favebook : </label>
                                    <a class="text-blue-800" href="{{ setting('site.facebook_stie') }}">KemenPU</a>
                              </div>
                              <div class="flex font-semibold text-xl">
                                    <label for="">Twitter : </label>
                                    <a class="text-blue-800" href="{{ setting('site.twitter_stie') }}">KemenPU</a>
                              </div>
                              <div class="flex font-semibold text-xl">
                                    <label for="">Instagram : </label>
                                    <a class="text-blue-800" href="{{ setting('site.instagram_stie') }}">KemenPU</a>
                              </div>
                              <div class="flex font-semibold text-xl">
                                    <label for="">Youtube : </label>
                                    <a class="text-blue-800" href="{{ setting('site.youtube_stie') }}">KemenPU</a>
                              </div>
                              <h2 class="font-bold text-2xl">#SigapMembangunNegeri</h2>
                        </div>
                  </div>
                  <div class="w-full md:w-1/3 relative">
                        <div class="sticky top-0">
                              <div class="border border-t-0">
                                    <div class="w-full p-10">
                                          @include('menus.profil')

                                    </div>
                              </div>
                              <div class="border border-t-0">
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