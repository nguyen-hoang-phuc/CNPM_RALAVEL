<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\products;
use App\type_products;
use App\Cart;
use Session;
use App\customer;
use App\bills;
use App\bill_detail;
use App\User;
use Hash;
use Auth;

class MyController extends Controller
{
    public function getIndex() {
		$slide = slide::all();
		$new_product = products::where('new',1)->paginate(4,['*'],'pag');
		$promotion_product = products::where('promotion_price','<>',0)->paginate(8,['*'],'page');
		return view('page.home',compact('slide','new_product','promotion_product'));
	}
	public function getProductType($id_type) {
		$sp_theo_loai = products::where('id_type',$id_type)->paginate(12,['*'],'pag');
		$loai = type_products::all();
		$loai_theo_id = type_products::where('id',$id_type)->first();
		$sp_khac = products::where('id','<>',$id_type)->paginate(3,['*'],'page');
		return view('page.danh_muc_san_pham',compact('sp_theo_loai','loai','loai_theo_id','sp_khac'));
	}
	public function getProduct($id_sanpham) {
		$products = products::where('id',$id_sanpham)->first();
		$related_products = products::where('id_type',$products->id_type)->paginate(6,['*'],'pag');
		$best_sale = products::join('bill_detail','products.id','=','bill_detail.id_product')->paginate(4);
		return view('page.san_pham',compact('products','related_products','best_sale'));
	}
	public function getLogin() {
		return view('page.login');
	}
	public function getSignup() {
		return view('page.signup');
	}
	public function getCheckout() {
		return view('page.checkout');
	}
	public function getCart() {
		return view('page.cart');
	}
	public function getAddCart(Request $request,$id_sanpham) {
		$product = products::find($id_sanpham);
		$oldCart = Session('cart')?Session::get('cart'):null;
		$cart = new Cart($oldCart);
		$cart->add($product,$id_sanpham);
		$request->session()->put('cart',$cart);
		return redirect()->back();
	}
	public function deleteCart($id_sanpham) {
		$oldCart = Session::has('cart')?Session::get('cart'):null;
		$cart = new Cart($oldCart);
		$cart->removeItem($id_sanpham);
		if(count($cart->items)>0)
		{
			Session::put('cart',$cart);
		}
		else {
			Session::forget('cart');
		}
		return redirect()->back();
	}
	public function postCheckout(Request $req) {
		$cart = Session::get('cart');
		$customer = new customer;
		$customer->name = $req->name;
		$customer->gender = $req->gender;
		$customer->email = $req->email;
		$customer->address = $req->address;
		$customer->phone_number = $req->SDT;
		$customer->note = $req->notes;
		$customer->save();
		
		$bills = new bills;
		$bills->id_customer = $customer->id;
		$bills->date_order = date('y-m-d');
		$bills->total = $cart->totalPrice;
		$bills->payment = $req->payment_method;
		$bills->note = $req->notes;
		$bills->save();
		
		foreach($cart->items as $key=>$value) {
			$bill_detail = new bill_detail;
			$bill_detail->id_bill = $bills->id;
			$bill_detail->id_product = $key;
			$bill_detail->quantity = $value['qty'];
			$bill_detail->unit_price = $value['price']/$value['qty'];
			$bill_detail->save();
		}
		Session::forget('cart');
		return redirect()->back()->with('thongbao','Đặt hàng thành công!');
	}
	public function postSignup(Request $req) {
		$this->validate($req,
            [
            	'email'=>'required|email|unique:users,email',
				'password'=>'required|min:6|max:20',
				'repassword'=>'required|same:password',
				'name' =>'required'
            ],
            [
            	'email.required'=>'Bạn chưa nhập email!',
				'email.unique'=>'Email đã được sử dụng. Vui lòng sử dụng email khác!',
				'password.required'=>'Bạn chưa nhập mật khẩu!',
				'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự!',
				'password.max'=>'Mật khẩu phải có tối đa 20 kí tự!',
				'repassword.required'=>'Bạn chưa nhập lại mật khẩu!',
				'repassword.same'=>'Mật khẩu không khớp!',
				'name.required'=>'Bạn chưa nhập họ tên!'
            ]);
		
	$user = new User;
	$user->full_name = $req->name;
	$user->email = $req->email;
	$user->password = Hash::make($req->password);
	$user->save();
	return redirect()->back()->with('dangki','Đã đăng ký tài khoản!');
	}
	public function postLogin(Request $req) {
		$this->validate($req, 
			[
				'email'=>'required|email',
				'password'=>'required'
			],
			[
			'email.required'=>'Bạn chưa nhập email!',
			'password.required'=>'Bạn chưa nhập mật khẩu!'
		]);
		$author = array('email'=>$req->email,'password'=>$req->password);
		if(Auth::attempt($author)) {
			return redirect()->route('home');
		}
		else {
			return redirect()->back()->with(['flag'=>'danger','message'=>'Thông tin bạn cung cấp không đúng!']);
		} 
		
	}
	public function getLogout() {
		Auth::logout();
		return redirect()->route('home');
	}
	public function getSearch(Request $req) {
		$product = products::where('name','like','%'.$req->search.'%')->get();
		return view('page.search',compact('product'));
	}
}
