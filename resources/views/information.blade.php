@extends('layouts.template')

@section('layout_content')

<div class="w-full md:w-96 md:max-w-full mx-auto">
    <div class="p-6 border border-gray-300 sm:rounded-md">
        <form
            method="POST"
            enctype="multipart/form-data"
            class="grid grid-cols-1 md:grid-cols-2 gap-x-4"
        >
           
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">City</span>
                    <input
                        name="city"
                        type="text"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder=""
                    />
                </label>
            </div>
            <div class="mb-6">
                <label class="block">
                    <span class="text-gray-700">Zip Code</span>
                    <input
                        name="zip_code"
                        type="text"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder=""
                    />
                </label>
            </div>
            <!-- Repeat similar div structures for other form fields -->

            <div class="col-span-2 mb-6">
              <label class="block">
                  <span class="text-gray-700">Address Details</span>
                  <textarea
                      name="address_details"
                      class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                      rows="3"
                      placeholder="floor/door lock code/etc."
                  ></textarea>
              </label>
          </div>

            <div class="col-span-2 mb-6">
                <button
                    type="submit"
                    class="h-10 px-5 text-indigo-100 bg-indigo-700 rounded-lg transition-colors duration-150 focus:shadow-outline hover:bg-indigo-800"
                >
                    Save
                </button>
            </div>
        </form>
        <div class="text-gray-700 text-right text-xs mt-2">
        </div>
    </div>
</div>
@endsection
