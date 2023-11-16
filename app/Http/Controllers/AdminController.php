<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Middleware đảm bảo người dùng đã đăng nhập
    }
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Xử lý thông tin đăng nhập


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.login')->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Nếu role là admin, chuyển hướng đến trang admin dashboard
                return redirect('/admin/dashboard');
            } else {
                // Nếu role không phải là admin, đăng xuất và thông báo lỗi
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Bạn không có quyền truy cập vào trang quản trị.');
            }
        } else {
            // Đăng nhập thất bại, chuyển hướng với thông báo lỗi
            return redirect()->route('admin.login')->with('error', 'Email hoặc mật khẩu không chính xác.');
        }
    }
    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {


        $tongsp = DB::table('project')->count();
        // tổng lượt xem
        $tonglx = DB::table('project')->sum('like');
        // tổng đơn hàng
        $tong_order = DB::table('project')->sum('download');
        // tổng user
        $tong_user = DB::table('users')->count();



        return view('admin.dashboard', compact('tongsp', 'tong_order', 'tonglx', 'tong_user'));
    }
    function allsp()
    {

        $product = Project::orderBy('created_at', 'desc');


        $cxn = clone $product;
        $xn = clone $product;

        $cxn = $cxn->where('project.status', 1)->paginate(10);
        $xn = $xn->where('project.status', 2)->paginate(10);

        $field  = Field::all();

        return view('admin.product.allsp', [
            'field' => $field,
            'cxn' => $cxn,
            'xn' => $xn,


        ]);
    }

    public function createPro()
    {
        $fields = Field::all();
        return view('admin.product.form', compact('fields'));
    }
    function slug_pro($str)
    {
        $slug = DB::table('project')->where("product_slug", "=", "$str")->first();
        if ($slug) {
            $str .= uniqid('-');
        }
        return $str;
    }
    public function addPro(Request $request, $id = null)
    {
        $slug = $this->slug_pro($request->slug);

        // Xử lý upload hình ảnh sản phẩm
        $validatedData =$request->validate([
            'name' => '',
            'product_slug' => [],
            'avt' => '',
            'img_project' => '',
            'id_field' => '',
            'id_users' => '',
            'introduction' => '',
            'video' => '',
            'source' => '',
            'ppt' => '',
            'assess' => '',
            'like' => '',
            'download' => '',
            'technical' => '',
        ]);

        $files2 = [];
        if($request->hasFile('filenames2'))
		{
			foreach($request->file('filenames2') as $file)
			{
			    $name = (date('Y-m-d',time())).'_'.time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('upload/images/project'), $name);
			    $files2[] = $name;
			}
            $validatedData["avt"] = json_encode($files2);
		}

        $files = [];
        if($request->hasFile('filenames'))
		{
			foreach($request->file('filenames') as $file)
			{
			    $name = (date('Y-m-d',time())).'_'.time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('upload/images/project'), $name);
			    $files[] = $name;
			}
            $validatedData["img_project"] = json_encode($files);
		}
        Project::create($validatedData);

        return redirect()->route('admin.allsp')->with('success', 'Sản phẩm đã được thêm thành công.');
    }
    public function deletesp($id)
    {
        // $pro = User::withTrashed()->find($id);
        // $pro->forceDelete();
        Project::where('id', $id)->delete();
        return response()->json(['success' => 'Sản phẩm xóa thành công'], 200);
    }
    public function editPro(string $slug)
    {

        $product = project::where('product_slug', $slug)->first();



        return view('admin.product.form', ['product' => $product]);
    }

    public function updatePro(Request $request, $id)
    {
        // Kiểm tra xem sản phẩm có tồn tại không
        $product = project::find($id);

        if (!$product) {
            return redirect()->route('admin.allsp')->with('error', 'Sản phẩm không tồn tại.');
        }

        // Xử lý upload hình ảnh sản phẩm
        $imagePath = $product->product_image;

        if ($request->hasFile('product_image')) {
            // Lưu hình ảnh mới và cập nhật đường dẫn
            $imagePath = $request->product_image->store('upload/img', 'public');
        }

        // Cập nhật trường slug
        $product->product_slug = $request->slug;

        // Cập nhật thông tin sản phẩm
        $product->product_name = $request->name;
        $product->author = $request->author;
        $product->price = $request->price;
        $product->product_image = $imagePath;
        $product->isVisible = $request->isVisible;
        $product->isHot = $request->isHot;
        $product->remaining = $request->remaining;

        // Xử lý các thuộc tính sản phẩm (tương tự như trong phương thức addPro)
        $attributes = [
            'Định dạng' => $request->bia,
            'Trang' => $request->trang,
            'Kích thước' => $request->kichthuoc,
            'Ngày xuất bản' => $request->ngayxb,
            'Nhà xuất bản' => $request->nhaxb,
            'Ngôn ngữ' => $request->nn,
            'Ghi chú minh họa' => $request->ghichu,
        ];
        $attributesJson = json_encode($attributes);

        $product->attributes = $attributesJson;
        $product->product_description = $request->description;
        $product->seller_id = $request->seller;

        $product->save();

        return redirect()->route('admin.allsp')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    function deletePro(int $id)
    {
        project::where('id', $id)->delete();
        // return response()->json(['success' => 'Sản phẩm xóa thành công'], 200);
    }

    public function thayDoiTrangThai(Request $request)
    {
        $Project_id = $request->input('id');
        $newStatus = 0;

        $Project = Project::findOrFail($Project_id);

        if ($Project) {
            if ($Project->status == 1) {
                $newStatus = 2;
            }

            $Project->status = $newStatus;
            $Project->save();

            return redirect()->back();
        }
    }
}
