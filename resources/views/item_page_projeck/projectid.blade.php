  @extends('layouts.layoutUser-2')
  @push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/favourite.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cmt.css') }}">
  @endpush
  @section('noidung')
  <div>
    {{-- Phần hiện sản phẩm --}}
        <div>
            <p>{{$dataid->name}}</p>
            <p>{{$dataid->introduction}}</p>
        </div>
        {{-- Phần để lấy các nut bấm --}}
        <div>
            <div class="project-item-favourite">
                @if ($check != "")
                    <form action="{{route('delete-favourite')}}" method="post">
                        @csrf
                        @if(Auth::check())
                            <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="id_project" value="{{$dataid->id}}">
                        <button class="favourite-button-love" type="submit"> <i class="fa-solid fa-check item-icon-check"></i> </button>
                    </form>
                @else
                    <form action="{{route('new-favourite')}}" method="post">
                        @csrf
                        @if(Auth::check())
                            <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="id_project" value="{{$dataid->id}}">
                        <button class="favourite-button" type="submit"> <i class="fa-solid fa-heart item-icon-heart"></i> </button>
                    </form>
                @endif
                <div class="project-item-repost">
                    <div class="item-report">

                    </div>
                </div>
                
            </div>
        </div>
        {{-- Phần hiện thông báo report --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{-- phần để hiện nút report --}}

        <div class="project-item-report">
            <div id="item-report-id" class="item-report">
                <div class="background-report">
                </div>
                <form action="{{route('report')}}" method="post">
                    @csrf
                    <div class="content-report">
                        @if(Auth::check())
                            <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="id_project" value="{{$dataid->id}}">
                        <textarea class="content-report-text" name="your_text" rows="4" cols="50" placeholder="Nhập nội dung bạn muốn tố cáo"></textarea>
                        <div class="content-report-button">
                            <button class="report-button" type="submit">Report</button>
                        </div>
                    </div>
                </form>
            </div>
            <button id="report-button-id" class="report-button" onclick="myFunction()">Report</button>
          </div>
  </div>
  {{-- Phần cmt -------------------------------------------------------------------------------------------------------------------------------------------------------------------------}}
  <section>
      <div class="project-cmt">
          <div class="project-cmt-body">
            @foreach ($comment as $item)
                <div class="cmt">
                    <div class="cmt-item">
                        <p>{{$item->name}}</p>
                        <div class="cmt-item-content">
                            <span>{{$item->text_cmt}}</span>
                            <span id="reply-click">Trả lời</span>
                        </div>
                        <div id="reply" class="item-form-reply">
                            <form action="{{route('new-reply')}}" method="post">
                                @csrf
                                @if(Auth::check())
                                    <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                                @endif
                                @if(Auth::check())
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                @endif
                                <input type="hidden" name="id_cmt" value="{{$item->id}}">
                                <input type="hidden" name="id_project" value="{{$dataid->id}}">
                                <div class="cmt-item-send">
                                    <input class="reply-text" type="text" name="text_cmt" id="">
                                    <button class="cmt-button" type="submit"><i class="fa-regular fa-paper-plane cmt-button-item"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div class="cmt-reply-body">
                            <div class="cmt-reply">
                                    @foreach ($item->replys as $reply)
                                        <div class="cmt-reply-item">
                                            <p>{{$reply->name}}</p>
                                            <span>{{$reply->text_cmt}}</span>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                </div>
            @endforeach
              <form action="{{route('new-comment')}}" method="post">
                    @csrf
                    @if(Auth::check())
                        <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                    @endif
                    <input type="hidden" name="id_project" value="{{$dataid->id}}">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <div class="cmt-item-send">
                        <input class="cmt-text" type="text" name="text_cmt" id="" placeholder="Viếc bình luận">
                        <button class="cmt-button" type="submit"><i class="fa-regular fa-paper-plane cmt-button-item"></i></button>
                    </div>
              </form>
          </div>
      </div>
  </section> 
  @endsection
  @push('scripts')
    <script src="{{ asset('assets/js/favourite.js') }}"></script>
    <script src="{{ asset('assets/js/cmt.js') }}"></script>
  @endpush
  
