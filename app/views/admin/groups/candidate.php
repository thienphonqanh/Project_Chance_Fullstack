<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="" method="GET">
            <div class="row">
                <div class="col-4">
                    <select class="form-select" name="status">
                        <option value="all">--- Tất cả trạng thái ---</option>
                        <option value="inactive" <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'inactive' ? 'selected' : '' ?>>Chưa kích hoạt</option>
                        <option value="active" <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'active' ? 'selected' : '' ?>>Đã kích hoạt</option>
                    </select>
                </div>
                <div class="col-5">
                    <input type="search" name="keyword" class="form-control" placeholder="Nhập từ khoá..."
                        value="<?php isset($request->getFields()['keyword']) ?? '' ?>">
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
                    <th class="text-center" width="5%"><input type="checkbox" class="checkbox-select-all"></th>
                    <th class="text-center" width="28%">Họ và tên</th>
                    <th class="text-center" width="28%">Email</th>
                    <th class="text-center">Trạng thái</th>
                    <th class="text-center" width="12%">Thời gian</th>
                    <th class="text-center" width="8%">Xem</th>
                    <th class="text-center" width="8%">Sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (!empty($listCandidate)): 
                        foreach ($listCandidate as $item):
                ?>
                <tr>
                    <td class="text-center"><input type="checkbox" class="checkbox-item"></td>
                    <td class="text-center"><?php echo $item['fullname'] ?></td>
                    <td class="text-center"><?php echo $item['email'] ?></td>
                    <td class="text-center">
                        <?php 
                            echo ($item['status'] === 1) ? 
                                '<a href="#" class="btn btn-success btn-sm">Đã kích hoạt</a>' : 
                                '<a href="#" class="btn btn-danger btn-sm">Chưa kích hoạt</a>';
                        ?>
                    </td>
                    <td class="text-center">
                        <?php 
                            echo getDateTimeFormat($item['create_at'], 'd-m-Y');
                        ?>
                    </td>
                    <td class="text-center"><a href="<?php echo _WEB_ROOT; ?>/groups/ung-vien/thong-tin?id=<?php echo $item['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Xem</a></td>
                    <td class="text-center"><a href="<?php echo _WEB_ROOT; ?>/groups/ung-vien/chinh-sua?id=<?php echo $item['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Sửa</a></td>
                </tr>
                <?php endforeach; else: ?>
                    <tr>
                        <td colspan="7" class="text-center bg-danger"><?php echo $emptyValue; ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-6">
                <button class="btn btn-danger delete-button" disabled>Xoá đã chọn (0)</button>
            </div>
            <div class="col-6">
                <nav class="d-flex justify-content-end"><?php echo $links;  ?></nav>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>