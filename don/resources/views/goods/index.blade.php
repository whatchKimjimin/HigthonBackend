@extends('layouts.app')

@section('content')


    <!-- main -->
    <div id="main">
        <div class="container h">
            <div class="main_box">
                <div>졸업을</div>
                <div>축하합</div>
                <div>니다!!</div>
            </div>
        </div>
    </div>

    <!-- end of main -->
    <div id="list">
        <div class="container" id="today">
            <div class="title list_box_title_border">
                <span>오늘의 상품</span>
                <span>2월 11일</span>
            </div>
            <div class="col-12 list_box">
                <div class="col-12">
                    @foreach($todayGoods as $data)
                    <?php $imgs = json_decode($data->images_ids) ?>
                    <div class="col-6">
                        <div class="col-12 col-clear">
                            <div class="col-6 col-clear">
                                <div class="list_box_cate">{{ $controller->categoryChange($data->category) }}</div>
                                <div class="list_box_title">{{ mb_substr($data->title,0,12) }}</div>
                                <div class="list_box_price">{{ number_format($data->price) }}원</div>
                                <button class="list_box_button" onclick="location.href = '/goods/{{$data->id}}'">&gt;</button>
                            </div>
                            <div class="col-6 col-clear pr h">
                                <div class="list_box_img">
                                    <img width="100%" height="100%" src="http://don.whatch.co.kr/image/{{ $imgs[0] }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="container" id="clothes">
            <div class="title title_border1">
                <span id="title1">의류</span>
            </div>
            <div class="col-12">
                @foreach($categoryData1 as $data)
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
        <div class="container" id="books">
            <div class="title title_border2">
                <span id="title2">도서</span>
            </div>
            <div class="col-12">
                @foreach($categoryData2 as $data)
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
        <div class="container" id="life">
            <div class="title title_border3">
                <span id="title3">생활/가전</span>
            </div>
            <div class="col-12">
                @foreach($categoryData3 as $data)
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
        <div class="container" id="pens">
            <div class="title title_border4">
                <span id="title4">학용품</span>
            </div>
            <div class="col-12">
                @foreach($categoryData4 as $data)
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
        <div class="container" id="foods">
            <div class="title title_border5">
                <span id="title5">음식</span>
            </div>
            <div class="col-12">
                @foreach($categoryData5 as $data)
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
        <div class="container" id="electronics">
            <div class="title title_border6">
                <span id="title6">전자</span>
            </div>
            <div class="col-12">
                @foreach($categoryData6 as $data)
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
        <div class="container" id="etc">
            <div class="title title_border7">
                <span id="title7">기타</span>
            </div>
            <div class="col-12">
                @foreach($categoryData7 as $data)
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