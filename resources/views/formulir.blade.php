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
                        Formulir
                  </h1>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-4">
                  <div class="pb-4 bg-white">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 " aria-hidden="true"
                                          fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                    </svg>
                              </div>
                              <input type="text" id="table-search"
                                    class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search for items">
                        </div>
                  </div>
                  <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                              <tr>
                                    
                                    <th scope="col" class="py-3 px-6">
                                          Formulir
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                          Download
                                    </th>
                              </tr>
                        </thead>
                        <tbody>
                              @foreach ($formulir as $form)
                              <tr
                              class="bg-white border-b hover:bg-gray-50">

                              <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $form->nama_form }}
                              </th>
                              <td class="py-4 px-6">
                                    <a href="{{Storage::url((json_decode($form->file_form))[0]->download_link)}}"
                                          class="font-medium text-blue-600 hover:underline">Download</a>
                              </td>
                        </tr>
                              @endforeach
                              
                        </tbody>
                  </table>
                  <div>
                        {{ $formulir->links() }}
                  </div>
            </div>

      </div>
</section>




@stop