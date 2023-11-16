<?php
namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Middleware đảm bảo người dùng đã đăng nhập
    }
    function allus(Request $request)
    {

        $adminUsers = User::where('role', 'admin')->paginate(10);
        $activeTab = $request->input('tab', 'admin');
        $userUsers = User::where('role', 'user')->paginate(10);

        return view('admin.user.allus', compact('adminUsers', 'userUsers','activeTab'));
    }

    public function restore_us()
    {
        return Redirect()->route('admin.allus');
    }
    public function deleteus($id)
    {
        // $pro = User::withTrashed()->find($id);
        // $pro->forceDelete();
        User::where('id', $id)->delete();
        return response()->json(['success' => 'Sản phẩm xóa thành công'], 200);
    }


    function editus(Request $request, $id)
    {
        $user = user::find($id);
        if ($user == null) return Redirect('/thongbao');
        return view('admin/user/editus', ['user' => $user]);
    }
    public function updateus(Request $request, $id)
    {
        $user = User::find($id);

        if ($user == null) return redirect('/thongbao');

        $user->name = $request->input('name');
        $user->email = $request->input('email');
      



        $user->save();

        return Redirect()->route('admin.allus');
    }
    function editpq(Request $request, $id)
    {
        $user = user::find($id);
        if ($user == null) return Redirect('/thongbao');
        return view('admin/user/editus', ['user' => $user]);
    }
    function updatepq(Request $request, $id)
    {
        $user = User::find($id);
        if ($user == null) {
            return Redirect('/thongbao');
        }

        $user->role = $_POST['role']; // Giả sử giá trị role được gửi qua biểu mẫu là role mới
        $user->save();

        return Redirect()->route('admin.allus');
    }



    public function createacc()
    {
        return view('admin.user.addacc');
    }

    public function addus(Request $request)
    {

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('upload/img', 'public');
        }
        user::create([
            'name' => $request->name,

            'password'=> bcrypt($request->password),
            'email' => $request->email,
            'role' => $request->role,
        ]);


        return redirect()->route('admin.allus')->with('message', 'Bạn đã tạo tài khoản mới thành công');
    }

}
