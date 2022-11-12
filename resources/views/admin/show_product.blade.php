<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }

        .dataTables_length select {
            background-color: white !important;
        }

        .dataTables_info {
            color: black !important;
        }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
                    x-init="setTimeout(() => show=false, 3000)" x-show="show">
                    {{session('message')}}
                </div>
                @endif

                <h2 class="h2_font">Xem sản phẩm</h2>
                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <table id="example" class="table is-striped" style="width:100%" style="background-color: white">
                        <thead>
                            <tr>

                                <th>Mã Sản Phẩm</th>
                                <th>Tên</th>
                                <th>Mô Tả</th>
                                <th>Giá</th>
                                <th>Loại</th>
                                <th>Hình Ảnh</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)

                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->description}}</td>
                                <td>{{$value->price}}</td>

                                <td>{{$value->category}}</td>
                                <td><img src="{{asset('storage/'.$value->image)}}" alt=""></td>

                                <td>
                                    <a href="{{url('update_product', $value->id)}}"
                                        class="btn btn-inverse-warning">Edit</a>
                                    <a onclick="return confirm('Are you sure to delete this')"
                                        href="{{url('delete_product', $value->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.js')
        <!-- End custom js for this page -->
</body>

</html>