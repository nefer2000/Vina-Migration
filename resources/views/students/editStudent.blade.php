@extends('templates.default2')

@section('section')
    <header class="max-w-lg mx-auto">
        <a href="#">
            <h1 class="text-4xl text-white text-center">Edit Student</h1>
        </a>
    </header>
    <br>
    <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
        <section class="mt-10">
            <form action="/editStudent/{{$data->id}}" method="POST" class="flex flex-col">
                @method('PUT')
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">First Name</label>
                    <input type="text" name="first_name" value="{{$data -> first_name}}" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-00 px-3 py-1">
                    <p class="text-red-500 px-2 text-sm mt-2">
                        @error('first_name')
                            {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Last Name</label>
                    <input type="text" name="last_name" value="{{$data -> last_name}}" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-00 px-3 py-1">
                    <p class="text-red-500 px-2 text-sm mt-2">
                        @error('last_name')
                            {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Sex</label>
                    @if ($data->sex == 'Male' || $data->sex == 'male')
                        <label class="radio-inline px-3"><input type="radio" name="sex" value="Male" checked> Male</label>
                        <label class="radio-inline px-3"><input type="radio" name="sex" value="Female"> Female</label>
                    @else
                    <label class="radio-inline px-3"><input type="radio" name="sex" value="Male"> Male</label>
                    <label class="radio-inline px-3"><input type="radio" name="sex" value="Female" checked> Female</label>
                    @endif
                    <p class="text-red-500 px-2 text-sm mt-2">
                        @error('sex')
                            {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Age</label>
                    <input type="number" name="age" value="{{$data -> age}}" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-00 px-3 py-1">
                    <p class="text-red-500 px-2 text-sm mt-2">
                        @error('age')
                            {{$message}}
                        @enderror
                    </p>
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Email</label>
                    <input type="email" name="email" value="{{$data -> email}}" class="bg-gray-100 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-00 px-3 py-1">
                    <p class="text-red-500 px-2 text-sm mt-2">
                        @error('email')
                            {{$message}}
                        @enderror
                    </p>
                </div>
                <button class="bg-gray-400 hover:bg-gray-600 text-with font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Save Edits</button>
            </form>
            <form action="/studentDelete/{{$data->id}}" method="POST">
                @method('delete')
                @csrf
                <button class="bg-red-400 text-white px-4 py-1 hover:bg-red-800 rounded shadow-lg hover:shadow-x1 transition duration-200 w-full font-bold" type="submit">Delete</button>
            </form>
        </section>
    </main>
@endsection