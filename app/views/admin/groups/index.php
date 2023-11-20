
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus">
                Thêm nhóm mới</i></a>
        <hr>
        <form action="" method="GET">
            <div class="row">
                <div class="col-9">
                    <input type="search" name="keyword" class="form-control" placeholder="Nhập từ khoá..."
                        value="">
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                </div>
            </div>
            <input type="hidden" name="module" value="groups">
        </form>
        <hr>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th class="text-center" width="5%">STT</th>
                    <th class="text-center">Tên nhóm</th>
                    <th class="text-center">Thời gian</th>
                    <th class="text-center" width="15%">Phân quyền</th>
                    <th class="text-center" width="8%">Sửa</th>
                    <th class="text-center" width="8%">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"></td>
                    <td><a
                            href=""></a>
                    </td>
                    <td></td>
                    <td class="text-center"><a href="#" class="btn btn-primary btn-sm"><i
                                class="fa fa-universal-access"> Phân quyền</i></a></td>
                    <td class="text-center"><a
                            href=""
                            class="btn btn-warning btn-sm"><i class="fa fa-edit"> Sửa</i></a></td>
                    <td class="text-center"><a
                            href=""
                            class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i
                                class="fa fa-trash"> Xoá</i></a></td>
                </tr>
            </tbody>
        </table>

    </div><!-- /.container-fluid -->
</section>