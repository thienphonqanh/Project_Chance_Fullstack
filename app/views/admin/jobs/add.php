<div class="p-1">
    <form method="post" enctype="multipart/form-data">
        <div class="text-center shadow-lg p-4 rounded-3">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-start fw-bold text-uppercase">Thông tin việc làm</h4>
                </div>
                <?php
                if (!empty($msg)) :
                    echo '<div class="alert alert-' . $msgType . '">';
                    echo $msg;
                    echo '</div>';
                endif;
                ?>
                <div class="col-12">
                    <div id="avatar-preview" class="avatar mb-3">
                        <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/default_image.jpg" style="width: 130px; height: 130px;" id="avatar-default" alt="Avatar">
                    </div>
                    <input type="file" name="avatar-input" id="avatar-input" accept="image/*" onchange="previewImage()" class="d-none">
                    <label for="avatar-input" class="text-info">Tải ảnh lên<i class="bi bi-arrow-up-short"></i></label>
                    <label onclick="deleteImage()" for="delete-image" class="text-danger px-3">Xoá</label>
                    <input style="display: none;" id="delete-image">
                </div>
                <div class="col-12 mt-3">
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control slug" id="floatingInput" name="title" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Tiêu đề <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('title', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" name="company_name" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Công ty <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('company_name', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control render-slug" id="floatingInput" name="slug" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Đường dẫn <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('slug', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <select class="form-select" id="floatingSelect" name="job_field" aria-label="Floating label select example">
                            <option value="0">Chọn lĩnh vực</option>
                            <option value="1">Bán hàng</option>
                            <option value="2">Kế toán</option>
                        </select>
                        <label for="floatingSelect">Lĩnh vực <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('job_field', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" name="salary" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Lương <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('salary', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" name="rank" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Cấp bậc <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('rank', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" name="number_recruits" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Số lượng tuyển<span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('number_recruits', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="form_work" value="" />
                        <label for="floatingInput">Hình thức làm việc<span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('form_work', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="location" value="" />
                        <label for="floatingInput">Địa điểm <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('location', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com" name="deadline" value="" />
                        <label for="floatingInput">Hạn nộp <span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('deadline', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="degree_required" value="" />
                        <label for="floatingInput">Yêu cầu bằng cấp<span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('degree_required', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                    <div class="form-floating mb-3 text-start">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="exp_required" value="" />
                        <label for="floatingInput">Yêu cầu kinh nghiệm<span class="text-danger fw-bold">*</span></label>
                        <?php echo form_error('exp_required', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-start">
                        <label for="requirement">Yêu cầu công việc <span class="text-danger fw-bold">*</span></label>
                        <textarea name="requirement" rows="10" class="form-control editor"></textarea>
                        <?php echo form_error('requirement', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-start">
                        <label for="welfare">Phúc lợi <span class="text-danger fw-bold">*</span></label>
                        <textarea name="welfare" rows="10" class="form-control editor"></textarea>
                        <?php echo form_error('welfare', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-start">
                        <label for="description">Mô tả công việc <span class="text-danger fw-bold">*</span></label>
                        <textarea name="description" rows="10" class="form-control editor"></textarea>
                        <?php echo form_error('description', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group text-start">
                        <label for="other_info">Thông tin khác <span class="text-danger fw-bold">*</span></label>
                        <textarea name="other_info" rows="10" class="form-control editor"></textarea>
                        <?php echo form_error('other_info', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center shadow-lg p-4 rounded-3 mt-3">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-start fw-bold text-uppercase">Thông tin công ty</h4>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-2 mt-2">
                        <input type="text" class="form-control" id="floatingInput" name="company_location" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Địa điểm</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-2 mt-2">
                        <input type="text" class="form-control" id="floatingInput" name="scales" placeholder="name@example.com" value="" />
                        <label for="floatingInput">Quy mô</label>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="form-group text-start">
                        <label for="company_description">Giới thiệu công ty</label>
                        <textarea name="company_description" rows="10" class="form-control editor"></textarea>
                    </div>
                </div>
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-primary btn-md px-3">Lưu thay đổi</button>
                    <a href="<?php echo _WEB_ROOT; ?>/jobs/danh-sach" class="btn btn-md px-4 btn-danger">Quay lại</a>
                </div>
            </div>
        </div>
</div>
</form>
</div>