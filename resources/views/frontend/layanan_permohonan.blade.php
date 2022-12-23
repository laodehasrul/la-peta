@extends('frontend.layouts.app')

@section('content')
<section>
      <div class="w-full bg-blue-300">
            <div class="max-w-6xl mx-auto justify-center p-10">
                  <div class="mx-auto text-white flex items-center justify-between">
                        <div>
                              <span class="font-semibold">Formulir</span>
                              <h1 class="font-bold text-2xl">Layanan Online</h1>
                        </div>
                        <div class="flex items-center text-sm">
                              <a href="{{ route('/')}}">Beranda</a>
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"></path>
                              </svg>
                              <p>Layanan Online</p>
                        </div>
                  </div>
            </div>
      </div>
</section>
<section>
      <div class="max-w-5xl justify-center mx-auto my-12">
            <div class="text-center w-full pb-10">
                  <h1 class="text-3xl font-bold">
                        Layanan Permohonan Online Rakyat
                  </h1>
                  <h2 class="text-xl">
                        Sampaikan Permohonan Anda langsung kepada instansi pemerintah berwenang
                  </h2>
            </div>
            <form action="{{ route('form.post') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="relative z-0 mb-3 w-full group">
                        <a class="font-bold px-3 py-2 bg-blue-400 hover:bg-blue-500 rounded-sm text-white"
                              href="{{ route('formulir') }}" target="_blank">Download Formulir</a>
                  </div>
                  <div x-data="{selectedCategory: '0' }">
                        <div class="relative z-0 mb-6 w-full group">

                              <label for="" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                                    Jenis Layanan</label>
                              <select x-model="selectedCategory" id="jenis_layanan" name="jenis_layanan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected>Pilih Jenis Layanan</option>
                                    @foreach($jenis_layanan as $layanan)
                                    <option x-bind:value="{{ $layanan->id }}">{{ $layanan->nama_layanan}}</option>
                                    @endforeach
                              </select>
                        </div>
                        <div>
                              <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                                          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                          placeholder=" " required value="{{ old('nama_lengkap') }}" />
                                    <label for="nama_lengkap"
                                          class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                                          Nama Lengkap</label>
                              </div>
                              <div class="relative z-0 mb-6 w-full group">
                                    <input type="text" name="nik_ktp" id="nik_ktp"
                                          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                          placeholder=" " required value="{{ old('nik_ktp') }}" />
                                    <label for="nik_ktp"
                                          class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                                          NIK</label>
                              </div>
                              <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 mb-6 w-full group">
                                          <input type="email" name="email_cust" id="email_cust"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required value="{{ old('email_cust') }}" />
                                          <label for="email_cust"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Email
                                          </label>
                                    </div>
                                    <div class="relative z-0 mb-6 w-full group">
                                          <input type="tel" pattern="[0-9]{12}" name="nomor_hp" id="nomor_hp"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " required value="{{ old('nomor_hp') }}" />
                                          <label for="nomor_hp"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Nomor
                                                HP (0812-****-****)</label>
                                    </div>
                              </div>
                              <div class="relative z-0 mb-6 w-full group">
                                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_ktp">Upload
                                          KTP</label>
                                    <input class="@error('file_ktp[]') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                          id="file_ktp" name="file_ktp[]" type="file" multiple>
                                    <p class="mt-1 text-sm text-gray-500" id="file_ktp_help">
                                          (MAX-2MB | JPG/JPEG/PNG/PDF).
                                          @error('file_ktp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </p>
                              </div>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">

                              <label for="" class="block mb-2 text-sm font-medium text-gray-900">Informasi</label>
                                    <div class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2" :class="{'active' : selectedCategory > 0}"
                                          x-show.transition.in.opacity.duration.600="selectedCategory > 0">
                                          @foreach($jenis_layanan as $layanan)
                                          <div x-show="selectedCategory === '{{ $layanan->id }}'">
                                                <p>{{ $layanan->info_layanan }}</p>
                                          </div>
                                          @endforeach
                                    </div>
                        </div>
                  </div>
                  

                  <div class="relative z-0 mb-6 w-full group">
                        


                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_berkas">Upload
                              Berkas</label>
                        <input class="@error('file_berkas[]') is-invalid @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                              id="file_berkas" name="file_berkas[]" type="file" multiple>
                        <p class="mt-1 text-sm text-gray-500" id="file_berkas_help">
                              (MAX-5MB | JPG/JPEG/PNG/PDF).
                              @error('file_berkas')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </p>
                  </div>



                  <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Kirim</button>
            </form>
      </div>
</section>




@stop