<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoodsService;
use App\Services\CommentService;
use Illuminate\Support\Facades\DB;
use Auth;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GoodsService $goodsService)
    {


        // TODAY
        $todayGoods = $goodsService->goodsToday();

        // 의류
        $categoryData1 = $goodsService->selectCategory(1);
        // 도서
        $categoryData2 = $goodsService->selectCategory(2);
        // 생활
        $categoryData3 = $goodsService->selectCategory(3);
        // 학용품
        $categoryData4 = $goodsService->selectCategory(4);
        // 음식
        $categoryData5 = $goodsService->selectCategory(5);
        // 전자
        $categoryData6 = $goodsService->selectCategory(6);
        // 기타
        $categoryData7 = $goodsService->selectCategory(7);
        return view('goods.index',[
            'categoryData1' => $categoryData1 ,
            'categoryData2' => $categoryData2 ,
            'categoryData3' => $categoryData3,
            'categoryData4' => $categoryData4,
            'categoryData5' => $categoryData5,
            'categoryData6' => $categoryData6,
            'categoryData7' => $categoryData7,
            'todayGoods' => $todayGoods,
            'controller' => $this
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , GoodsService $goodsService)
    {
        $goodsService->insertGoods($request);

        return redirect()->route('goods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , GoodsService $goodsService , CommentService $commentService)
    {
        // GET GOODS DATA
        $goodsData = $goodsService->selectGoods($id);
        // GET GOODS COMMENT DATA
        $commentData = $commentService->selectCommentList($id);

        return view('goods.view',['goodsData' => $goodsData[0] , 'commentData' => $commentData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , GoodsService $goodsService)
    {
        $goodsService->deleteGoods($id);

        return redirect()->route('goods.index');
    }


    public function searchGoods(Request $request , GoodsService $goodsService) {
        $searchDatas = $goodsService->goodsSearch($request->input('keyword'));

        return view('goods.search',['searchDatas' => $searchDatas , 'keyword' => $request->input('keyword')]);
    }

    public function goodsCategory($category , Request $request , GoodsService $goodsService) {
        $categoryDatas = $goodsService->goodsCategory($category);

        switch($category) {
            case 1:
                $category = '의류';
                break;
            case 2:
                $category = '도서';
                break;
            case 3:
                $category = '생활/가전';
                break;
            case 4:
                $category = '학용';
                break;
            case 5:
                $category = '음식';
                break;
            case 6:
                $category = '전자';
                break;
            case 7:
                $category = '기타';
                break;

        }


        return view('goods.category',['categoryDatas' => $categoryDatas , 'category' => $category]);
    }

    public function categoryChange($cate_id) {
        switch($cate_id) {
            case 1:
                $category = '의류';
                break;
            case 2:
                $category = '도서';
                break;
            case 3:
                $category = '생활/가전';
                break;
            case 4:
                $category = '학용';
                break;
            case 5:
                $category = '음식';
                break;
            case 6:
                $category = '전자';
                break;
            case 7:
                $category = '기타';
                break;
        }

        return $category;
    }
}
