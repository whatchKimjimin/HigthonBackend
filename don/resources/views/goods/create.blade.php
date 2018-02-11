{{--<form action="/goods" method="post" enctype="multipart/form-data">--}}
    {{--{{ csrf_field() }}--}}
    {{--<label for="">title : </label><input type="text" name="title">--}}
    {{--<label for="">content : </label>--}}
    {{--<textarea name="content" cols="30" rows="10"></textarea>--}}
    {{--<label for="">price : </label> <input type="number" name="price">--}}
    {{--<input type="file" name="file[]" multiple>--}}
    {{--<select name="category">--}}
        {{--<option value="1">의류</option>--}}
        {{--<option value="2">도서</option>--}}
        {{--<option value="3">생활/가전</option>--}}
        {{--<option value="4">학용품</option>--}}
        {{--<option value="5">음식</option>--}}
        {{--<option value="6">전자</option>--}}
        {{--<option value="7">기타</option>--}}
    {{--</select>--}}
    {{--<button>submit</button>--}}
{{--</form>--}}

@extends('layouts.app')

@section('content')

    <!-- upload -->
    <div id="upload">
        <form action="/goods" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="container">
            <div class="col-5">
                <div class="drag_box">
                    <div class="drag_text">
                        <div class="plus">+</div>
                        <div class="select_text">사진을 선택하여 주세요</div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="col-12">
                    <input type="file" name="file[]" id="file" style="display: none;" multiple accept="image/*">
                    <input type="text" id="title" name="title" placeholder="제품의 제목을 입력하여 주세요.">
                </div>
                <div class="col-12">
                    <input type="number" id="price" name="price" placeholder="제품의 가격을 입력하여 주세요.">
                </div>
                <div class="col-12">
                    <select name="category">
                        <option value="1">의류</option>
                        <option value="2">도서</option>
                        <option value="3">생활/가전</option>
                        <option value="4">학용품</option>
                        <option value="5">음식</option>
                        <option value="6">전자</option>
                        <option value="7">기타</option>
                    </select>
                </div>
                <div class="col-12">
                    <span class="input_text">드래그하여 사진의 순서를 선택하여주세요</span>
                    <div class="col-12 img_sort">
                        <div class="h sortable">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <textarea name="content" id="content" class="content_text" placeholder="글을 입력하세요 글을"></textarea>
        </div>
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
        <div class="container">
            <button id="submit_btn" type="submit">제품 올리기</button>
        </div>
        </form>
    </div>
@push('scripts')
    <script>
        console.log('start');
        // var formData = new FormData();
        var imageArr = [];
        var fileArr = [];
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".menu_btn").on("click",function(){
                $(".drop_menu").hasClass("clicked") ? $(".drop_menu").addClass("clicked").fadeOut() : $(".drop_menu").addClass("clicked").fadeIn();
            });

            $(".sortable").sortable();

            $(".drag_box").on("drop",function(e){
                e.preventDefault();
                if(fileArr.length >=5 ) {
                    alert("이미지는 5개까지만");
                    return false;
                }
                var files = e.originalEvent.dataTransfer.files;
                for(var i = 0; i < files.length; i++) {
                    fileArr.push(files[i]);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(".sortable").append("<div class='img_sort_wrap h'><img src='"+ (e.target.result) +"' alt='img'></div>")
                    }
                    reader.readAsDataURL(files[i]);
                }
            }).on("dragover",function(e){
                e.preventDefault();
            }).on("click",function(){
                $("#file").click();
            });

            $("#file").on("change",function(){
                if(fileArr.length >=5 ) {
                    alert("이미지는 5개까지만");
                    return false;
                }
                var files = $( this )[ 0 ].files;
                for(var i = 0; i < files.length; i++) {
                    fileArr.push(files[i]);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(".sortable").append("<div class='img_sort_wrap h'><img src='"+ (e.target.result) +"' alt='img'></div>")
                    }
                    reader.readAsDataURL(files[i]);
                }
            })



            // $.ajax({
            //     type: 'post',
            //     url: '/goods',
            //     data: formData,
            // },function(data){
            //     console.log(data);
            // });
        });
    </script>
@endpush
@endsection