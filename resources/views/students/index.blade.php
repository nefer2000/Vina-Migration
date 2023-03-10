@extends('templates.default2')
<?php 
    $arr = array('title' => 'Test');
?>
@section('section')
    <x-navigation :arr="$arr" />
    <x-messages />
    <header class="max-w-lg mx-auto mt-5">
        <a href="">
            <h1 class="text-4xl text-white text-center">Student List</h1>
        </a>
    </header>

    <section class="mt10">
        <div class="overflow--auto relative">
            <table class="w-96 mx-auto text-sm text-left text-gray-500">
                <thead class="text-xs text-gra-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            first Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            last Name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            age
                        </th>
                        <th scope="col" class="py-3 px-6">
                            sex
                        </th>
                        <th scope="col" class="py-3 px-6">
                            email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $student)
                        <tr class="bg-gray-800 border-b">
                            <td class="py-3 px-6">
                                {{$student -> first_name}}
                            </td>
                            <td class="py-3 px-6">
                                {{$student -> last_name}}
                            </td>
                            <td class="py-3 px-6">
                                {{$student -> age}}
                            </td>
                            <td class="py-3 px-6">
                                {{$student -> sex}}
                            </td>
                            <td class="py-3 px-6">
                                {{$student -> email}}
                            </td>
                            <td class="py-3 px-6">
                                <a href="/student/{{$student->id}}" class="bg-blue-600 text-white px-4 py-1">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

{{-- @foreach ($data as $student)
<li>{{$student -> first_name}}</li>
@endforeach --}}