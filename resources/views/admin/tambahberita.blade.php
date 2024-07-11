@extends('admin.appadmin')

@section('content')
<form action="/admin/insertberita" method="POST" enctype="multipart/form-data" class="overflow-y-auto h-32">
  <div class="space-y-12">
@csrf
    <div class="border-b border-gray-900/10 pb-12">

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="first-name" class="block text-sm font-medium leading-6 text-gray-600">img bg</label>
          <div class="mt-2">
            <input type="file" name="img_bg"   class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="last-name" class="block text-sm font-medium leading-6 text-gray-600">title</label>
          <div class="mt-2">
            <input type="text" name="title"   class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-4">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-600">type umur</label>
          <div class="mt-2">
            <input  type="text" name="type_umur" class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>


        <div class="col-span-full">
          
          <div class="mt-2">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">par1</label>
            <input type="text" name="par1"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">par2</label>
            <input type="text" name="par2"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">par3</label>
            <input type="text" name="par3"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">par4</label>
            <input type="text" name="par4"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">par5</label>
          <div class="mt-2">
            <input type="text" name="par5"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">foto_1</label>
          <div class="mt-2">
            <input type="file" name="foto_1"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">foto2</label>
          <div class="mt-2">
            <input type="file" name="foto_2"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div class="col-span-full">
          <label for="street-address" class="block text-sm font-medium leading-6 text-gray-600">foto3</label>
          <div class="mt-2">
            <input type="file" name="foto_3"  class="block w-full rounded-md border-0 py-1.5 text-gray-600 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    <a href="/admin/tambahberita" class="text-sm font-semibold leading-6 text-indigo-00">Cancel</a>

  </div>
</form>
               
@endsection