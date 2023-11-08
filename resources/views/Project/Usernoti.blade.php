{{-- @foreach(auth()->user()->unreadNotifications as $notification)
<b>{{$notification->data['name']}}</b>đăng ký tài khoản!!
<a href="{{route('markasred',$notification->id)}}" class="p-2 bg-red-400 text-white rounded-lg">Đánh dấu là đã đọc</a>
@endforeach --}}

{{-- Đặt vào dasboad để thông báo user đăng nhập --}}
