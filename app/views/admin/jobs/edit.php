<div class="p-1">
    <?php 
    if (!empty($dataJob)) :
        foreach ($dataJob as $item) :
    ?>
            <form method="post" class="text-center shadow-lg p-4 rounded-3">
                <div class="row">
                    <div class="col-6">
                        <h4 class="text-start fw-bold">Thông tin việc làm</h4>
                    </div>
                    <div class="col-6 text-end mb-2">
                        <a href="<?php echo _WEB_ROOT; ?>/chi-tiet-viec-lam/<?php echo ($item['slug'].'-'.$item['id']); ?>" type="button" class="btn btn-primary px-4">Xem trang</a>
                    </div>
                    <?php
                    if (!empty($msg)) :
                        echo '<div class="alert alert-' . $msgType . '">';
                        echo $msg;
                        echo '</div>';
                    endif;
                    ?>
                    <div class="col-12 mt-3">
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control slug" id="floatingInput" name="title" placeholder="name@example.com" value="<?php echo $item['title'] ?>" />
                            <label for="floatingInput">Tiêu đề <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('title', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" name="company_name" placeholder="name@example.com" value="<?php echo $item['name'] ?>" />
                            <label for="floatingInput">Công ty <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('company_name', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control render-slug" id="floatingInput" name="slug" placeholder="name@example.com" value="<?php echo $item['slug'] ?>" />
                            <label for="floatingInput">Đường dẫn <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('slug', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-floating mb-3 text-start">
                            <select class="form-select" id="floatingSelect" name="job_field" aria-label="Floating label select example">
                                <option selected>Chọn lĩnh vực</option>
                                <option value="1" <?php echo $item['jobField'] === 'Bán hàng' ? 'selected' : false; ?>>Bán hàng</option>
                                <option value="2" <?php echo $item['jobField'] === 'Kế toán' ? 'selected' : false; ?>>Kế toán</option>
                            </select>
                            <label for="floatingSelect">Lĩnh vực <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('job_field', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" name="salary" placeholder="name@example.com" value="<?php echo $item['salary'] ?>" />
                            <label for="floatingInput">Lương <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('salary', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" name="rank" placeholder="name@example.com" value="<?php echo $item['rank'] ?>" />
                            <label for="floatingInput">Cấp bậc <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('rank', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" name="number_recruits" placeholder="name@example.com" value="<?php echo $item['number_recruits'] ?>" />
                            <label for="floatingInput">Số lượng tuyển<span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('number_recruits', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="form_work" value="<?php echo $item['form_work'] ?>" />
                            <label for="floatingInput">Hình thức làm việc<span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('form_work', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="location" value="<?php echo $item['location'] ?>" />
                            <label for="floatingInput">Địa điểm <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('location', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-floating mb-3 text-start">
                            <input type="date" class="form-control" id="floatingInput" placeholder="name@example.com" name="deadline" value="<?php echo $item['deadline'] ?>" />
                            <label for="floatingInput">Hạn nộp <span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('deadline', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="degree_required" value="<?php echo $item['degree_required'] ?>" />
                            <label for="floatingInput">Yêu cầu bằng cấp<span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('degree_required', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        
                        <div class="form-floating mb-3 text-start">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="exp_required" value="<?php echo $item['exp_required'] ?>" />
                            <label for="floatingInput">Yêu cầu kinh nghiệm<span class="text-danger fw-bold">*</span></label>
                            <?php echo form_error('exp_required', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3 text-start">
                            <textarea class="form-control editor" placeholder="Leave a comment here" name="requirement" id="floatingTextarea2" style="height: 200px"><?php echo $item['requirement'] ?></textarea>
                            <label for="floatingTextarea2">Yêu cầu công việc</label>
                            <?php echo form_error('requirement', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3 text-start">
                            <textarea class="form-control editor" placeholder="Leave a comment here" name="welfare" id="floatingTextarea2" style="height: 200px"><?php echo $item['welfare'] ?></textarea>
                            <label for="floatingTextarea2">Phúc lợi</label>
                            <?php echo form_error('welfare', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3 text-start">
                            <textarea class="form-control editor" placeholder="Leave a comment here" id="floatingTextarea2" name="description" style="height: 200px"><?php echo $item['description'] ?></textarea>
                            <label for="floatingTextarea2">Mô tả công việc</label>
                            <?php echo form_error('description', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-3 text-start">
                            <textarea class="form-control editor" placeholder="Leave a comment here" id="floatingTextarea2" name="other_info" style="height: 200px"><?php echo $item['other_info'] ?></textarea>
                            <label for="floatingTextarea2">Thông tin khác</label>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary btn-md px-3">Lưu thay đổi</button>
                        <a href="<?php echo _WEB_ROOT; ?>/jobs/danh-sach" class="btn btn-md px-4 btn-danger">Quay lại</a>
                    </div>
                </div>
            </form>
    <?php endforeach;
    endif; ?>
</div>