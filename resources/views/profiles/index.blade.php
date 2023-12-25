@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user->username }}</div>

                            @cannot('update', $user->profile)
                                <follow-button style="margin-left: 10px" user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                            @endcannot

                    </div>
                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">
                        <img style="max-width: 30px" src= "https://shorturl.at/lvGX5" alt="">
                    </a>
                    <a style="margin-left: 10px" href="/p/create">
                        <img style="max-width: 30px" src= "https://shorturl.at/bcsR0" alt="">
                    </a>
                @endcan

                <div style="margin-top: 15px" class="d-flex">
                    <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                    <div style="margin-left: 10px" class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                    <div style="margin-left: 10px" class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
                </div>
                <div style="margin-top: -17px" class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
                <div style="margin-top: 5px">{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{ $post->id }}">
                        <img style="border: 1px solid #e6e6e6;" src="/storage/{{ $post->image }}" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
