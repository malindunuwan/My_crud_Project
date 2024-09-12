<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="mb-0">Add Product</h2>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div> 
                    @endif
                    
                    <p><a href="{{route('admin/products')}}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{route('admin/products/save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="title" class="form-control" placeholder="Title">
                                @error('title')
                                    <samp class="text-danger">{{$message}}</samp>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="category" class="form-control" placeholder="Category">
                                @error('category')
                                    <samp class="text-danger">{{$message}}</samp>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="price" class="form-control" placeholder="Price">
                                @error('price')
                                    <samp class="text-danger">{{$message}}</samp>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                               <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>