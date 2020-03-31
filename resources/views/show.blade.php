@extends('layouts.main')

@section('content')

    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="parasite" class="w-64 lg:w-96 ">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">
                    {{$movie['title']}}
                </h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <i class="far fa-star fill-current text-orange-500 w-4"></i>
                    <span class="ml-1">{{$movie['vote_average'] *10 .'%' }}</span>
                    <span class="mx-2">|</span>
                    <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span> @foreach($movie['genres'] as $genre)
                            {{$genre['name']}}
                        @endforeach</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-whit font-semibold">
                        Featured Cast
                    </h4>
                    <div class="mt-4 flex">
                        @foreach($movie['credits']['crew'] as $crew)
                            @if($loop->index <3)
                                <div class="mr-8">
                                    <div>{{$crew['name']}}</div>
                                    <div class="text-sm text-gray-400">{{$crew['department']}}</div>
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
                @if(count($movie['videos']['results']) >0)
                    <div class="mt-12">
                        <a target="_blank" href="https://youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}"
                           class=" flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <i class="fas fa-play"></i>
                            <span class="ml-2"> Play Transition</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">
                Cast
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach($movie['credits']['cast'] as $cast)
                    @if($loop->index <5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" alt="profile"
                                     class="hover:opacity-75transition ease-in-out duration-150 ">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                                <div class="flex items-center text-gray-400 text-sm mt-1">
                                    <span>"{{$cast['character']}}"</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="movie-images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">
                Images
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-9 gap-8">
                @foreach($movie['images']['backdrops'] as $image)
                    @if($loop->index <10)
                        <div class="mt-8">
{{--                            <a href="#">--}}
                                <img src="{{'https://image.tmdb.org/t/p/w300/'.$image['file_path']}}" alt="backdrop" class="hover:opacity-75
                        transition ease-in-out duration-150 ">
{{--                            </a>--}}
                        </div>
                    @endif
                @endforeach
            </div>

        </div>

@endsection()
