@extends('admin.appadmin')

@section('content')
<form action="/admin/inserthasil_macth" method="POST" enctype="multipart/form-data" class="overflow-y-auto h-32">
  <div class="space-y-12">
@csrf
    <div class="border-b border-gray-900/10 pb-12">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium leading-6 text-gray-600">type_pertandingan</label>
          <div class="mt-2">
            <input type="text" name="type_pertandingan"   class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-600">skor</label>
          <div class="mt-2">
            <input type="text" name="skor"   class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-600">nm_team1</label>
          <div class="mt-2">
            <input  type="text" name="nm_team1" class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>


        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">nm_team1</label>
          <div class="mt-2">
            <input type="text" name="nm_team2"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">img_1</label>
          <div class="mt-2">
            <input type="file" name="img_1"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">img_2</label>
          <div class="mt-2">
            <input type="file" name="img_2"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="sm:col-span-2 sm:col-start-1">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-600">stadium'</label>
          <div class="mt-2">
            <input type="text" name="stadium"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
           <div class="sm:col-span-2 sm:col-start-1">
          <div class="mt-2">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-600">pencetakgol1'</label>
            <input type="text" name="pencetakgol1"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-600">pencetakgo2'</label>
            <input type="text" name="pencetakgol2"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-600">pencetakgol3'</label>
            <input type="text" name="pencetakgol3"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-600">pencetakgol4</label>
            <input type="text" name="pencetakgol4"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="mt-2">
          <label for="city" class="block text-sm font-medium leading-6 text-gray-600">pencetakgol5</label>
            <input type="text" name="pencetakgol5"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    <a href="/admin/dashboard" class="text-sm font-semibold leading-6 text-indigo-00">Cancel</a>

  </div>
</form>
               
@endsection