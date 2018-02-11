@extends('layouts.app')

@section('content')

    <?php $imgs = json_decode($goodsData->images_ids) ?>
    <!-- product_info -->
    <div id="product_info">
        <div class="container product_info_wrap" style="border-bottom: #eee solid 1px;">
            <div class="col-12 h">
                <div class="col-5 h">
                    <div class="col-12 col-clear product_info_img h" style="width: 470px;float: right;">
                        <img src="http://don.whatch.co.kr/image/{{$imgs[0]}}" alt="img">
                    </div>
                </div>
                <div class="col-7 h">
                    <div class="col-12 col-clear product_info_text">
                        <div class="col-12">
                            {{ $goodsData->name }}님
                        </div>
                        <div class="col-12">
                            <div>{{ $goodsData->title }}</div>
                            <div>
                                <span>{{ number_format($goodsData->price) }}원</span>
                                <span><img src="" alt=""></span>
                                <span><img src="" alt=""></span>
                            </div>
                            <div class="col-12">
                                <div class="buttons">
                                    <button class="info_btn1" type="button">찜하기</button>
                                    @if (Auth::id() == $goodsData->users_id)
                                    <button class="info_btn2" type="button" onclick="document.getElementById('deleteBtn').click()">삭제</button>
                                        <form action="/goods/{{$goodsData->id}}" method="post" style="display: none">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button id="deleteBtn" type="submit"></button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="container">--}}
            {{--<div class="myPage_tab">--}}
                {{--<div class="col-4 col-clear">제품 상세</div>--}}
                {{--<div class="col-4 col-clear">상품 문의</div>--}}
                {{--<div class="col-4 col-clear">제품 교환 / 환불 안내</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="container">--}}
            {{--<table class="col-12 upload_table">--}}
                {{--<tr>--}}
                    {{--<td>제품 소재</td>--}}
                    {{--<td><input type="text" id="table1"></td>--}}
                    {{--<td>색상</td>--}}
                    {{--<td><input type="text" id="table2"></td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>치수</td>--}}
                    {{--<td><input type="text" id="table3"></td>--}}
                    {{--<td>브랜드</td>--}}
                    {{--<td><input type="text" id="table4"></td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>제조국</td>--}}
                    {{--<td><input type="text" id="table5"></td>--}}
                    {{--<td>취급주의 사항</td>--}}
                    {{--<td><input type="text" id="table6"></td>--}}
                {{--</tr>--}}
            {{--</table>--}}

        {{--</div>--}}

    </div>

    <div class="container product">
        @foreach($imgs as $img)
        <div class="col-12 product_img">
            <img src="http://don.whatch.co.kr/image/{{$img}}" alt="img">
        </div>
        @endforeach

        <div class="col-12 product_text">
            <pre>
            {{ $goodsData->content }}
            </pre>
        </div>
    </div>
    <div class="container comments">
        <div class="col-2"></div>
        <div class="col-8 col-md-offset-4">
            <div class="comments_title">
                댓글 (2)
            </div>
            @guest
            @else
            <div class="col-12 col-clear comments_input">
                <form action="/comment" method="post">
                    {{ csrf_field() }}
                    <div class="col-11 col-clear h">
                        <textarea name="content"></textarea>
                        <input type="hidden" value="{{ $goodsData->id }}" name="goods_id">
                    </div>
                    <button class="col-1 col-clear h" style="border:none;height: 80px;line-height: 20px;">등록하기</button>
                </form>
            </div>
            @endguest
        </div>
        <div class="comment_list">
            @foreach($commentData as $comment)
            <div class="col-12">
                <div>
                    <span>{{$comment->name}} 님</span> | <span>{{ $comment->created_at }}</span>
                </div>
                <div>
                    {{ $comment->content }}
                </div>
            </div>
            @endforeach

        </div>
    </div>
    {{--<div class="container product_info_wrap">--}}
        {{--<div class="col-12 h">--}}
            {{--<div class="col-5 h">--}}
                {{--<div class="col-12 col-clear product_info_img h">--}}
                    {{--<img src="img/product2.jpg" alt="">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-7 h">--}}
                {{--<div class="col-12 col-clear product_info_text">--}}
                    {{--<div class="col-12">--}}
                        {{--김**님--}}
                    {{--</div>--}}
                    {{--<div class="col-12">--}}
                        {{--<div>스웨터 팝니다 ~ (17)</div>--}}
                        {{--<div>--}}
                            {{--<span>17,500원</span>--}}
                            {{--<span><img src="" alt=""></span>--}}
                            {{--<span><img src="" alt=""></span>--}}
                        {{--</div>--}}
                        {{--<div class="col-12">--}}
                            {{--<div class="buttons">--}}
                                {{--<button class="info_btn1" type="button">찜하기</button>--}}
                                {{--<button class="info_btn2" type="button">문의하기</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection