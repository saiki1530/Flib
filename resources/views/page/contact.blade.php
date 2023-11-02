@extends('layouts\layoutUser-2')

@section('title')
Home CFF
@endsection


@section('noidung')

<head>
  <style>
    .contact-form {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
    }

    .contact-form label {
      font-weight: bold;
    }

    .contact-form .input-box {
      margin-bottom: 20px;
    }

    .contact-form .input-box .info {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .contact-form .input-box .area-tex {
      width: 100%;
      height: 100px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .contact-form .sbumit-btn {
      width: 100%;
      padding: 10px;
      border: none;
      background-color: #337ab7;
      color: #fff;
      cursor: pointer;
    }

    .contact-form .text-danger {
      color: red;
    }
  </style>
</head>

<div class="container">
  <div class="row justify-content-center">
    <div class="contact-form">
      <div class="col-lg">
        <h2 class="mb-2"><span>Thông tin liên hệ Flib</span></h2><br>
        <div class="media-list">
          <div class="media">
            <div class="media-body"> <strong>Địa chỉ:</strong> Tân Chánh Hiệp, Quận 12, Tp.HCM </div><br>
          </div>
          <div class="media">
            <div class="media-body"> <strong>Điện thoại:</strong> 0868.444.644 </div><br>
          </div>
          <div class="media">
            <div class="media-body"> <strong>Email:</strong> haupdps23858@fpt.edu.vn </div><br>
          </div>
          <div class="media">
            <div class="media-body"> <strong>Website:</strong> flib.com </div><br>
          </div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.2220813959939!2d106.6247693449259!3d10.853782858768128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b6c59ba4c97%3A0x535e784068f1558b!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1698903903140!5m2!1svi!2s" width="420" height="270" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="contact-form">
        <h2 class="mb-2">Gửi liên hệ qua Email</h2>
        <h6 class="mb-4">Hệ thống sẽ phản hồi lại trong 24h. Xin cám ơn!</h6>

        <form id="contact-form" action="/contact" method="post">


          <div class="col-md-12">
            <div class="input-box mb-20">
              <input name="name" class="info" placeholder="Họ tên" type="text" value="{{ old('name') }}">
              @error('name')
              <i class="text-danger">{{ $message }}</i>
              @enderror
            </div>
          </div>

          <div class="col-md-12">
            <div class="input-box mb-20">
              <input name="email" class="info" placeholder="Email" type="email" value="{{ old('email') }}">
              @error('email')
              <i class="text-danger">{{ $message }}</i>
              @enderror
            </div>
          </div>
          <div class="col-md-12">
            <div class="input-box mb-20">
            <textarea name="text_support" class="area-tex" placeholder="Tin nhắn muốn gửi*">{{ old('text_support') }}</textarea>

              @error('text_support')
              <i class="text-danger">{{ $message }}</i>
              @enderror
            </div>
          </div>
          <p class="form-messege"></p>
          <div class="col-xs-12">

            <div class="input-box">
              <input name="submit" class="sbumit-btn" value="Gửi" type="submit">
            </div>
          </div>
          @csrf
        </form>

      </div>
    </div>
  </div>
</div>

@endsection