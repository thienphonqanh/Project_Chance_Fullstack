<!-- Main content -->
<section class="content">
    <div class="container-fluid">
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
                    <th class="text-center">Họ và tên</th>
                    <th class="text-center">Chức vụ</th>
                    <th class="text-center" width="8%">Xem</th>
                    <th class="text-center" width="8%">Sửa</th>
                    <th class="text-center" width="8%">Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (!empty($listPersonnel)): 
                        $count = 0;
                        foreach ($listPersonnel as $item):
                            $count++;
                ?>
                <tr>
                    <td class="text-center"><?php echo $count; ?></td>
                    <td class="text-center"><?php echo $item['fullname'] ?></td>
                    <td class="text-center"><?php echo $item['name'] ?></td>
                    <td class="text-center"><a href="#" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Xem</a></td>
                    <td class="text-center"><a
                            href=""
                            class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Sửa</a></td>
                    <td class="text-center"><a
                            href=""
                            class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xoá?')"><i
                                class="fa fa-trash"></i> Xoá</a></td>
                </tr>
                <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" class="text-center bg-danger"><?php echo $emptyValue; ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div><!-- /.container-fluid -->
</section>