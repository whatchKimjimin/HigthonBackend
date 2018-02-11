@extends('layouts.app')

@section('content')
    {{--{{ dd($searchDatas) }}--}}
    <div id="list">
        <div class="container" id="clothes">
            <div class="title title_border1">
                <span id="title1"> {{ $category }}</span>
            </div>
            <div class="col-12">
                @foreach( $categoryDatas as $data)
                    <?php $imgs = json_decode($data->images_ids) ?>
                    <div class="col-4">
                        <div class="col-12 col-clear list_img" onclick="location.href = '/goods/{{$data->id}}'">
                            <img width="100%" height="100%" src="http://don.whatch.co.kr/image/{{ $imgs[0] }}" alt="img">
                        </div>
                        <div class="col-12 col-clear">
                            <div class="list_title">{{ $data->title }}</div>
                            <div class="list_price">{{ number_format($data->price) }}원</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection