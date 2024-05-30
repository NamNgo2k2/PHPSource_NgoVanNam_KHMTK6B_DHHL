<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    function getProduct() {
        $products = ProductModel::all();
        return view('admin.product.getProducts', ['products' => $products]);
    }

    function getProductsbyBand(Request $request) {
        $band = $request->input('selectBand');
        $products = ProductModel::where('band', $band)->get();
        return view('admin.product.getProductsbyBand', ['products' => $products]);
    }

    function getProductsbyYear(Request $request) {
        $year = $request->input('selectYear');
        $products = ProductModel::where('year', $year)->get();
        return view('admin.product.getProductsbyYear', ['products' => $products]);
    }

    function getProductsbyYearandCompany(Request $request) {

        // Khởi tạo query builder
        $query = ProductModel::query();

        // Kiểm tra checkbox năm và năm đã được chọn
        if ($request->has('checkYear') && $request->filled('selectYear')) {
            $query->where('year', $request->input('selectYear'));
        }

        // Kiểm tra checkbox công ty và công ty đã được chọn
        if ($request->has('checkCompany') && $request->filled('selectCompany')) {
            $query->where('company', $request->input('selectCompany'));
        }

        // Thực hiện truy vấn và lấy kết quả
        $products = $query->get();

        return view('admin.product.getProductsbyYearandCompany', ['products' => $products]);
    }

    function forminsertProduct() {
        return view('admin.product.insertProduct');
    }

    function insertProduct(Request $request) {
        $product = new ProductModel;
        $product->pid = $request->id;
        $product->pname = $request->pname;
        $product->company = $request->company;
        $product->band = $request->selectBand;
        $product->year = $request->selectYear;
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $pimage = 'data: image/png;base64,'
            . base64_encode(file_get_contents($_FILES['img']["tmp_name"]));
            $product->pimage = $pimage;
        }
        $product->save();
        return redirect('admin/product/insertProduct')
        ->with("Note", "Thêm thành công.");
    }
}
