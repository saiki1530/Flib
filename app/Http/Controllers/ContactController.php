<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator class

class ContactController extends Controller
{

    public function contact()
    {
        return view('page.contact');
    }


    public function store(Request $request)
    {
        
        // Quy tắc xác thực
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'text_support' => 'required'
        ];

        // Thông báo lỗi xác thực
        $messages = [
            'name.required' => 'Vui lòng điền họ tên.',
            'email.required' => 'Vui lòng điền email.',
            'email.email' => 'Email không hợp lệ.',
            'text_support.required' => 'Vui lòng điền nội dung tin nhắn.'
        ];

        // Thực hiện xác nhận
    $validator = Validator::make($request->all(), $rules, $messages);

    // Nếu xác thực không thành công, trả về thông báo lỗi
    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }

        // Lấy dữ liệu từ request của người dùng
        $name = $request->input('name');
        $email = $request->input('email');
        $textSupport = $request->input('text_support');

        // Tạo một bản ghi mới trong bảng "contacts"
        $contact = new Contact();
        $contact->name = $name;
        $contact->email = $email;
        $contact->text_support = $textSupport;
        $contact->save();

        // Lưu thông báo thành công 
        echo "<script>alert('Gửi liên hệ thành công!'); window.location.href='/contact';</script>";
    }
}
