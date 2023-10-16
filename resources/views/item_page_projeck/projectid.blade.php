<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        }
        li{
            list-style: none;
        }
        a{
            text-decoration: none;
        }
        .favourite-button-love{
          background-color: rgb(255, 105, 105);
          color: #fff;
          border: none;
          border-radius: 50px;
          width: 120px;
          height: 40px;
          font-size: 14px;
          font-weight: 500;
        }
        .favourite-button{
          background-color: rgb(252, 252, 252);
          color: #fff;
          border: 3px solid rgb(255, 105, 105);
          border-radius: 50px;
          width: 120px;
          height: 40px;
          font-size: 14px;
          font-weight: 500;
        }
        .item-icon-heart{
          color: rgb(255, 105, 105);
          font-size: 20px;
        }
        .item-icon-check{
          font-size: 20px
        }
        .report-button{
          background-color: rgb(210, 21, 21);
          color: #fff;
          border: none;
          border-radius: 50px;
          width: 120px;
          height: 40px;
          font-size: 15px;
          font-weight: 500;
        }
        .project-item-report{
            margin: 20px 0 0 0 ;
        }
        .item-report{
          display: none;
          position: relative;
          width: 100vw;
          height: 100vh;
          position: fixed;
          z-index: 99;
          top: 0;
          left: 0;
        }
        @keyframes fadeIn {
            from {
              opacity: 0;
              transform: translateZ(-10%);
            }
            to {
              opacity: 1;
              transform: translateZ(0);
            }
          }
        .item-report-click{
          animation: fadeIn 0.3s ease-in-out;
          position: relative;
          width: 100vw;
          height: 100vh;
          position: fixed;
          z-index: 99;
          top: 0;
          left: 0;
        }
        .background-report{
          background-color: #565656;
          opacity: 0.4;
          width: 100%;
          height: 100%;
          
        }
        .content-report
        {
          position: absolute;
          top: 50px;
          left: 25%;
          width: 50%;
          height: 80%;
          background-color:#fff ;
          text-align: center;
          border-radius: 15px;
          
          
        }
        .content-report-text{
          width: 90%;
          margin-top: 20px;
          min-height: 70%;
          border-radius: 10px;
          padding: 15px 15px 15px 15px;
          font-size: 15px;
          border: 2px solid #e1e1e1;
        }
        .content-report-button{
          width: 90%;
          margin: 0 auto;
          text-align: right;
        }
      </style>
</head>
<body>
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
    {{-- Phần js của nút Report --}}
    <script>
        function myFunction() {
          const elementBodySelec = document.getElementById('item-report-id');
          elementBodySelec.classList.remove("item-report"); // Xóa lớp CSS hiện tại
          elementBodySelec.classList.add("item-report-click");
          console.log(elementBodySelec);
        }
        const elementButtonSelectOut = document.querySelector(".background-report");
        elementButtonSelectOut.addEventListener("click",function(){
            const elementBodySelec = document.getElementById('item-report-id');
            elementBodySelec.classList.remove("item-report-click"); // Xóa lớp CSS hiện tại
            elementBodySelec.classList.add("item-report");
        })
      </script>
</body>
</html>