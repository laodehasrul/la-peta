@extends('frontend.layouts.app')

@section('content')
<section>
      <div class="w-full bg-blue-300">
            <div class="max-w-6xl mx-auto justify-center p-10">
                  <div class="mx-auto text-white flex items-center justify-between">
                        <div>
                              <span class="font-semibold">Profil</span>
                              <h1 class="font-bold text-2xl">{{ $organisasi->title }}</h1>
                        </div>
                        <div class="flex items-center text-sm">
                              <a href="{{ route('/')}}">Beranda</a>
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"></path>
                              </svg>
                              <p>Struktur Organisasi</p>
                        </div>
                  </div>
            </div>
      </div>
</section>
<section class="">
      <div class="max-w-6xl mx-auto p-10">
            <div class="mx-auto flex flex-col md:flex-row justify-between ">
                  <div class="w-full">
                        <div class="py-10 w-full text-center">
                              <h1 class="font-bold text-4xl">{{ $organisasi->title }}</h1>
                        </div>
                        <div class="" x-data="{ activeTab:  0 }">
                              <div class="flex text-lg text-center justify-center space-x-10 border-b">
                                    <div class="pb-2 cursor-pointer text-gray-600 font-semibold hover:text-gray-900"
                                          @click="activeTab = 0"
                                          :class="{ 'font-bold border-b-2 border-blue-800 px-4 text-black': activeTab === 0 }">
                                          Tugas
                                          & Fungsi</div>
                                    <div class="pb-2 cursor-pointer text-gray-600 font-semibold hover:text-gray-900"
                                          @click="activeTab = 1"
                                          :class="{ 'font-bold border-b-2 border-blue-800 px-4 text-black': activeTab === 1 }">
                                          Program</div>
                                    <div class="pb-2 cursor-pointer text-gray-600 font-semibold hover:text-gray-900"
                                          @click="activeTab = 2"
                                          :class="{ 'font-bold border-b-2 border-blue-800 px-4 text-black': activeTab === 2 }">
                                          Struktur</div>
                                    <div class="pb-2 cursor-pointer text-gray-600 font-semibold hover:text-gray-900"
                                          @click="activeTab = 3"
                                          :class="{ 'font-bold border-b-2 border-blue-800 px-4 text-black': activeTab === 3 }">
                                          Kontak & Lokasi</div>
                              </div>
                              <div class="tab-panel py-10" :class="{ 'active': activeTab === 0 }"
                                    x-show.transition.in.opacity.duration.600="activeTab === 0">
                                    <p>{!! $organisasi->tugas_fungsi !!}</p>
                              </div>
                              <div class="tab-panel py-10" :class="{ 'active': activeTab === 1 }"
                                    x-show.transition.in.opacity.duration.600="activeTab === 1">
                                    <p>{!! $organisasi->program !!}</p>
                              </div>
                              <div class="tab-panel py-10" :class="{ 'active': activeTab === 2 }"
                                    x-show.transition.in.opacity.duration.600="activeTab === 2">
                                    <p>{!! $organisasi->struktur !!}</p>
                              </div>
                              <div class="tab-panel py-10" :class="{ 'active': activeTab === 3 }"
                                    x-show.transition.in.opacity.duration.600="activeTab === 3">
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                          <div class="flex">
                                                <div class="mr-3">
                                                      <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z">
                                                            </path>
                                                      </svg>
                                                </div>
                                                <div class="flex flex-col">
                                                      <label class="font-bold text-xl" for="">Alamat Kantor</label>
                                                      <a class="font-semibold hover:text-blue-800"
                                                            href="{{ $organisasi->website }}">{{ $organisasi->alamat
                                                            }}</a>
                                                      <a class="mt-4 font-semibold hover:text-blue-800"
                                                            href="{{ $organisasi->website }}">Website : {{
                                                            $organisasi->email }}</a>
                                                </div>
                                          </div>
                                          <div class="flex">
                                                <div class="mr-3">
                                                      <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                            </path>
                                                      </svg>
                                                </div>
                                                <div class="flex flex-col">
                                                      <label class="font-bold text-xl" for="">Surat Elektronik</label>
                                                      <a class="font-semibold hover:text-blue-800" href="#">{{
                                                            $organisasi->email }}</a>

                                                </div>
                                          </div>
                                          <div class="flex">
                                                <div class="mr-3">
                                                      <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                            </path>
                                                      </svg>
                                                </div>
                                                <div class="flex flex-col">
                                                      <label class="font-bold text-xl" for="">Nomor Telepon</label>
                                                      <a class="font-semibold hover:text-blue-800" href="#">{{
                                                            $organisasi->contact }}</a>
                                                </div>
                                          </div>
                                    </div>
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
            </div>
      </div>
</section>



@stop