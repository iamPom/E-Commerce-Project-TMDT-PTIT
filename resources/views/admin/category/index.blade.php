@extends('admin.layouts.app')
@section('css')
    <style>
        .hidden {
            display: none;
        }

        input:focus {
            outline: none;
        }

        form input {
            width: 300px;
        }

        .cart-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .dataTable-top {
            padding: 0px 10px;
        }

        .icon {
            display: flex;
            justify-content: space-around;
        }
    </style>
@endsection
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách danh mục</h5>
                        @include('admin.layouts.includes.message')
                        <div class="cart-box">
                            <div class="dataTable-top">
                                <form>
                                    <div class="dataTable-search search" id="dataTables_filter">
                                        <label for="">Tìm kiếm</label>
                                        <input class="dataTable-input" type="search" id="searchInput" name="search">
                                    </div>
                                </form>
                            </div>
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">+ Thêm mới</a>
                        </div>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Mô tả cụ thể</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                            <td><img style="width:auto;height:100px;"
                                                src="{{ asset('storage/'.$item->image)}}"
                                                alt="There's no image"></td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <div class="icon">
                                                <button class="btn btn-warning">
                                                    <a href="{{ route('admin.category.edit',['id' => $item->id]) }}"><i class="bi bi-brush-fill"></i></a>
                                                </button>
                                                <button class="deleteButton btn btn-primary" data-id="{{$item->id}}">
                                                    <i class="bi bi-basket-fill"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="modal" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Bạn chắc chắn muốn xóa ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-yes btn-primary" data-id="">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable();
            $('.dataTables_length').addClass('hidden')
            $('.dataTables_filter').addClass('hidden')
            $('.dataTables_info').addClass('hidden')
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
            let deleteButtons = $('.deleteButton');
            let modalConfirmDelete = $('#basicModal');
            deleteButtons.on('click', function() {
                let id = $(this).attr('data-id');
                modalConfirmDelete.find('.btn-yes').attr('data-id', id);
                modalConfirmDelete.modal('toggle');
            })
            modalConfirmDelete.find('.btn-yes').on('click', function() {
                let id = $(this).attr('data-id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'delete/' +id ,
                    type: 'POST',
                    success: function(result) {
                        console.log(result)
                        modalConfirmDelete.modal('hide');
                        location.reload();
                    },
                    error: function(err) {
                        console.log(err)
                        // Xử lý lỗi nếu có
                    }
                });
            })
            table.on('draw.dt', function() {
                // cập nhật lại sự kiện click vào button xóa
                deleteButtons = $('.deleteButton');
                deleteButtons.on('click', function() {
                    let id = $(this).attr('data-id');
                    modalConfirmDelete.find('.btn-yes').attr('data-id', id);
                    // $('#exampleModal').show();
                    modalConfirmDelete.modal('toggle');
                })
            });
        });
    </script>
@endsection
