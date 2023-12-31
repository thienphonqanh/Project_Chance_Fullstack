<aside class="sidebar-candidates mb-4">
    <div class="d-flex">
        <?php
        $this->render('block/sidebar_employer', [], 'client');
        ?>
        <div class="shadow p-4 rounded-3 mt-2 m-auto custom-form-profile">
            <p class="fs-6 text-end fw-normal"><i class="bi bi-info-circle-fill text-warning"></i> Để đảm bảo tin đăng
                hợp lệ, tham khảo <a href="#">Quy định duyệt tin tuyển dụng</a> tại Chance</p>
            <div class="d-flex align-items-center">
                <h6>Thống kê tin: </h6>
                <div class="text-center p-2 rounded-2 mx-lg-3" style="background-color: var(--custom-section-color);">
                    <p class="p-0 m-0 text-dark fw-normal fs-6">Tổng số tin đăng</p>
                    <?php if (!empty($quantityJob)) : ?>
                        <span><?php echo $quantityJob; ?></span>
                    <?php else : ?>
                        <span>0</span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row align-items-center m-0 p-0 mt-4">
                <div class="col-lg-1 p-0">
                    <p class="fs-6 p-0 m-0 fw-semibold mx-1">Bộ lọc </p>
                </div>
                <div class="col-lg-11">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-5">
                                <input type="search" name="keyword" class="form-control" placeholder="Tất cả tin đăng" value="<?php isset($request->getFields()['keyword']) ?? '' ?>">
                            </div>
                            <div class="col-lg-4">
                                <select class="form-select" name="status">
                                    <option value="all">Tất cả trạng thái</option>
                                    <option value="inactive" <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'inactive' ? 'selected' : '' ?>>
                                        Chờ duyệt</option>
                                    <option value="active" <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'active' ? 'selected' : '' ?>>
                                        Đã duyệt</option>
                                    <option value="unactive" <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'unactive' ? 'selected' : '' ?>>
                                        Bị loại</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary w-100">Lọc</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Tên tin đăng</th>
                        <th class="text-center" width="17%">Ngày đăng</th>
                        <th class="text-center" width="17%">Thời hạn nộp</th>
                        <th class="text-center" width="10%">Lượt nộp</th>
                        <th class="text-center" width="10%">Lượt xem</th>
                        <th class="text-center" width="11%">Trạng thái</th>
                        <th class="text-center" width="1%">Khác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($listJob)) :
                        foreach ($listJob as $item) :
                    ?>
                            <tr>
                                <td><a class="text-dark" href="<?php echo _WEB_ROOT; ?>/chi-tiet-viec-lam/<?php echo $item['slug'] . '-' . $item['id'] . '.html'; ?>"><?php echo $item['title']; ?></a>
                                </td>
                                <td class="text-center"><?php echo getDateTimeFormat($item['create_at'], 'd-m-Y') ?></td>
                                <td class="text-center"><?php echo getDateTimeFormat($item['deadline'], 'd-m-Y') ?></td>
                                <td class="text-center"><?php echo $item['apply_count'] ?></td>
                                <td class="text-center"><?php echo $item['view_count']; ?></td>
                                <td class="text-center">
                                    <?php
                                    switch ($item['status']):
                                        case 0:
                                            echo '<button type="button" class="btn btn-sm rounded-5 border-0 px-3" style="background-color: rgb(246, 246, 161);">Chờ duyệt</button>';
                                            break;
                                        case 1:
                                            echo '<button type="button" class="btn btn-sm rounded-5 border-0 px-3" style="background-color: rgb(211, 247, 158);">Đã duyệt</button>';
                                            break;
                                        case 2:
                                            echo '<button type="button" class="btn btn-sm rounded-5 border-0 px-3" style="background-color: rgb(255, 183, 183);">Từ chối</button>';
                                            break;
                                    endswitch;
                                    ?>
                                </td>
                                <td class="text-center">
                                    <div>
                                        <button class="btn border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots p-2 rounded-5 text-primary" style="background-color: var(--section-bg-color);"></i>
                                        </button>
                                        <ul class="dropdown-menu text-center border-primary">
                                            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT; ?>/ntd/quan-ly-dang-tuyen/danh-sach/chinh-sua?id=<?php echo $item['id']; ?>">Sửa</a>
                                            </li>
                                            <li><a class="dropdown-item" href="<?php echo _WEB_ROOT; ?>/ntd/quan-ly-dang-tuyen/danh-sach/xoa?id=<?php echo $item['id']; ?>">Xoá</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;
                    else : ?>
                        <?php
                        if (isset($quantityJob) && $quantityJob === 0) :
                        ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h6 class="pt-5">Bạn chưa có tin tuyển dụng nào!</h6>
                                    <p>Tạo tin đăng tuyển để tìm kiếm nhân tài ngay</p>
                                    <a href="<?php echo _WEB_ROOT; ?>/ntd/quan-ly-dang-tuyen/tao-tin" class="btn text-white py-2 px-5 mb-5" style="background-color: var(--primary-color);">Đăng tin ngay</a>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="text-center mt-3">
                                        <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/empty.webp" alt="Ảnh" class="mb-3">
                                        <h5>Không tìm thấy kết quả nào</h5>
                                        <p class="fw-normal">Chưa tìm được việc làm phù hợp với tiêu chí của bạn</p>
                                    </div>
                                </td>
                            </tr>
                    <?php endif;
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</aside>