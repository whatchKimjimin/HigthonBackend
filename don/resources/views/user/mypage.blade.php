@extends('layouts.app')

@section('content')

    <!-- myPage info -->
    <div id="myPage_info">
        <div class="container">
            <div class="name">
                <span>{{ $userDatas->name }}</span><span>님</span>
            </div>
        </div>
        <div class="container">
            <div class="myPage_wrap">
                <div class="myPage_text1">판매목록</div>
                <div class="myPage_text2">
                    <span>{{ $userDatas->goodsCount }}</span><span>개</span>
                </div>
            </div>
            {{--<div class="myPage_wrap">--}}
                {{--<div class="myPage_text1">찜 목록</div>--}}
                {{--<div class="myPage_text2">--}}
                    {{--<span>12</span><span>개</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    <!-- end of myPage info -->

    <!-- myPage list -->
    <div id="myPage_list">
        <div class="container">
            <div class="myPage_tab">
                <div class="col-6 col-clear">판매목록</div>
                {{--<div class="col-6 col-clear">상품문의</div>--}}
            </div>
        </div>
        <div class="container">
            @foreach($goodsDatas as $data)
                <?php $imgs = json_decode($data->images_ids) ?>
            <div class="myPage_list_wrap">
                <div class="col-12 col-clear upload_date">
                    등록일 {{ date('Y-m-d', strtotime($data->created_at)) }}
                </div>
                <div class="col-12">
                    <div class="col-8 h">
                        <div class="col-12 col-clear">
                            <div class="col-6 col-clear">
                                <div class="list_box_cate">의류</div>
                                <div class="list_box_title">{{ $data->title }}</div>
                                <div class="list_box_price">{{ $data->price }}원</div>
                                <button class="list_box_button" onclick="location.href = '/goods/{{ $data->id }}'">&gt;</button>
                            </div>
                            <div class="col-6 col-clear pr h">
                                <div class="myPage_img">
                                    <img src="http://don.whatch.co.kr/image/{{$imgs[0]}}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 h">
                        판매중
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- end of myPage list -->
@endsection