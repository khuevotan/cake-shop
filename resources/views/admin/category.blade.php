<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: black;
        }

        .dataTables_length select {
            background-color: white !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                <div class="alert alert-success" style="text-align: center" x-data="{show:true}"
                    x-init="setTimeout(() => show=false, 3000)" x-show="show">
                    {{session('message')}}
                </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font">Thêm Danh Mục Bánh</h2>

                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input type="text" class="input_color" name="category_name"
                            placeholder="Viết tên...">
                        <input type="submit" class="btn btn-primary" value="Thêm" name="submit">
                        @error('category_name')
                        <p class="mt-3 list-disc list-inside text-sm text-red-600">
                            {{$message}}
                        </p>
                        @enderror
                    </form>
                </div>
                <br>
                <div class="w-full px-6 py-4 my-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

                    <table id="example" class="table is-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tên danh mục</th>
                                <th>Thời gian tạo</th>
                                <th>Thời gian cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)

                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->category_name}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->updated_at}}</td>
                                <td>
                                <a href="{{url('update_category', $value->id)}}"
                                        class="btn btn-inverse-warning">Sửa</a>    
                                
                                <a onclick="return confirm('Are you sure to delete this')"
                                        href="{{url('delete_category', $value->id)}}" class="btn btn-danger">Xóa</a>
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