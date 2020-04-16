<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TrangchuController extends Controller
{

    public function index()
    {
        return view('client.index');
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
        $product = DB::table('sanpham')
        ->join('congdung','congdung.cd_id','=','sanpham.cd_id')
        ->join('loai','loai.l_id','=','sanpham.l_id')
        ->where('sp_id', $idProduct)->first();

        $productImage = DB::table('hinhanh')->where('sp_id', $idProduct)->get();

        $productCate = DB::table('sanpham')->join('loai','loai.l_id', '=' , 'sanpham.l_id')->paginate(4);

        // dd($productCate);
        return view('client.product',compact(['product', 'productImage','productCate']));
    }

    public function getAllProduct (){
        //Lẫy ngẫu nhiên sản phẩm
        $allProduct = DB::table('sanpham')->inRandomOrder()->get();
        dd($allProduct);
    }
}
