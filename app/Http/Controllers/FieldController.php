<?php
namespace App\Http\Controllers;



use App\Models\field;
use Illuminate\Http\Request;

class fieldController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Middleware đảm bảo người dùng đã đăng nhập
    }
    function allfd(Request $request)
    {


        $field = field::paginate(10);

        return view('admin.field.allField', compact('field'));
    }

    public function restore_fd()
    {
        return Redirect()->route('admin.allfd');
    }
    public function deletefd($id)
    {
        // $pro = field::withTrashed()->find($id);
        // $pro->forceDelete();
        field::where('id', $id)->delete();
        return response()->json(['success' => 'Sản phẩm xóa thành công'], 200);
    }


    function editfd(Request $request, $id)
    {
        $field = field::find($id);
        if ($field == null) return Redirect('/thongbao');
        return view('admin/field/editfd', ['field' => $field]);
    }
    public function updatefd(Request $request, $id)
    {
        $field = field::find($id);

        if ($field == null) return redirect('/thongbao');

        $field->name = $request->input('name');
        $field->amount = $request->input('amount');




        $field->save();

        return Redirect()->route('admin.allfd');
    }

    public function createfield()
    {
        return view('admin.field.addacc');
    }

    public function addfd(Request $request)
    {


        field::create([
            'name' => $request->name,

            'amount'=> $request->amount,


        ]);


        return redirect()->route('admin.allfd')->with('message', 'Bạn đã tạo tài khoản mới thành công');
    }

}
