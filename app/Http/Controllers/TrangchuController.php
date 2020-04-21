<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TrangchuController extends Controller
{

    public function index()
    {
        $sanphammoi = DB::table('sanpham')->where('sp_trangthai','=',1)->orderBy('created_at','desc')->paginate(5);
        $flashsale = DB::table('sanpham')->where('sp_trangthai','=',1)->where('sp_giakhuyenmai','>',0)->get();
        return view('client.index',compact(['sanphammoi','flashsale']));
    }

    public function getCategory ($idCategory)
    {

        //Lấy ra loại sản phẩm
        $category = DB::table('loai')
                    ->where('l_id', $idCategory)
                    ->first();
        //Đếm số sản phẩm trong loại đó
        $countProduct = DB::table('sanpham')
                        ->where('l_id',$idCategory)->where('sp_trangthai',1)->where('sp_giaban','>',0)
                        ->count();

        //Lấy thông tin sản phẩm trong loại
        $product = DB::table('sanpham')
                    ->where('l_id',$idCategory)->where('sp_trangthai',1)->where('sp_giaban','>',0)
                    ->paginate(5);
        $sanphamKM = DB::table('sanpham')->where('l_id',$idCategory)->where('sp_giakhuyenmai','>','0')->paginate(3);

        $productPopular = DB::table('sanpham')
                    ->where('l_id',$idCategory)->where('sp_danhgia','>=',4)
                    ->where('sp_trangthai',1)
                    ->paginate(3);
        //Lấy hình ảnh của sản phẩm đã được phân loại
        $productImage = DB::table('sanpham')->join('hinhanh','hinhanh.sp_id','=','sanpham.sp_id')->where('l_id',$idCategory)->first();
        
        // return dd($productPopular);
        //Truyền tất cả ra view cho nó ok
        return view('client.category', compact(['category', 'countProduct', 'product', 'productImage','productPopular','sanphamKM']));
    }

    public function getProduct ($idProduct)
    {
        $product = DB::table('sanpham')->where('sp_id', $idProduct)->first();
        $category = DB::table('loai')->where('l_id','=',$product->l_id)->first();
        $productImage = DB::table('hinhanh')->where('sp_id', $idProduct)->get();

        $productCate = DB::table('sanpham')->join('loai','loai.l_id', '=' , 'sanpham.l_id')->get();

        // dd($productCate);
        return view('client.product-detail',compact(['product', 'productImage','productCate','category']));
    }

    public function getAllProduct (){
        //Lẫy ngẫu nhiên sản phẩm
        $allProduct = DB::table('sanpham')->where('sp_trangthai','=',1)->orderBy('sp_id','desc')->paginate(5);
        $productPopular = DB::table('sanpham')->where('sp_danhgia','>=', 3)->paginate(2);
        $allCategory = DB::table('loai')->get();
        $countProduct = DB::table('sanpham')->where('sp_trangthai','=',1)->count();
        return view('client.product',compact(['allProduct','allCategory','countProduct']));
    }

    public function getAllProduct2 (){
        //Lẫy ngẫu nhiên sản phẩm
        $allProduct = DB::table('sanpham')->where('sp_trangthai','=',1)->orderBy('sp_id','desc')->paginate(5);
        $allCategory = DB::table('loai')->get();
        $countProduct = DB::table('sanpham')->where('sp_trangthai','=',1)->count();
        return view('client.product-2',compact(['allProduct','allCategory','countProduct']));
    }

}
