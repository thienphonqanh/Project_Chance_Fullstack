<aside class="sidebar-candidates mb-4">
    <div class="d-flex">
    <?php  
        $this->render('block/sidebar_candidate', [], 'client');
    ?>
    <?php if (!empty($information)): ?>
        <form method="post" style="width: 80%; height: auto;" class="mx-4" enctype="multipart/form-data">
            <div class="w-100 text-start">
                <h5 class="text-secondary">Tạo hồ sơ đính kèm</h5>
            </div>
            <?php
            if (!empty($msg)) :
                echo '<div class="alert alert-' . $msgType . '">';
                echo $msg;
                echo '</div>';
            endif;
            ?>
            <div class="shadow p-2 rounded-2">
                <h5 class="p-0 m-0 py-2 px-4">Tải CV đính kèm</h5>
                <hr class="p-0 m-0">
                <div class="form-group mx-4">
                    <div class="d-flex align-items-center mt-2">
                        <p id="file-name" class="m-0 p-0 text-success rounded-2 py-1 px-5"></p>
                        <button id="delete-button-cv" type="button" onclick="deleteFile()" style="display: none;" class="btn text-danger fs-5"><i class="bi bi-trash p-2 pb-1 rounded-2" style="background-color: rgb(236, 218, 225);"></i></button>
                    </div>
                    <p id="error-message" class="text-danger"></p>
                    <label for="upload-cv" class="text-primary border border-1 px-4 py-2 border-primary rounded-2 btn-upload-avatar"><i class="bi bi-upload"></i> Tải file</label>
                    <p class="fs-6 fw-normal p-0 m-0 mt-2">Hỗ trợ định dạng .doc, .docx, .pdf có kích thước dưới 5MB</p>
                    <input type="file" id="upload-cv" name="upload-cv" accept=".pdf, .doc, .docx" onchange="validateFile()" class="d-none">
                </div>
            </div>

            <div class="shadow p-2 rounded-2 mt-3">
                <h5 class="p-0 m-0 py-2 px-4">Thông tin cá nhân</h5>
                <hr class="p-0 m-0">
                <div class="form-group text-center mt-3">
                    <div id="avatar-preview" class="avatar px-3">
                        <?php 
                        $root = _WEB_ROOT;
                        echo (!empty($information['thumbnail'])) ? 
                        '<img src="'.$root.'/'.$information['thumbnail'].'" style="width: 130px; height: 130px;" id="avatar-default" alt="Avatar">' 
                        : 
                        '<img src="'.$root.'/public/client/assets/images/4259794-200.png" style="width: 130px; height: 130px;" id="avatar-default" alt="Avatar">';
                    ?>
                    </div>
                </div>
                <p class="fw-semibold text-dark fs-6 p-0 mt-2 text-center">Ảnh đại diện</p>

                <hr width="95%" class="m-auto mt-3">
                <div class="row p-4">
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="fullname" class="fw-semibold mb-2">Họ và tên</label>
                            <input type="text" class="form-control" name="fullname" value="<?php echo $information['fullname']; ?>" disabled>
                            <?php echo form_error('fullname', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location" class="fw-semibold mb-2">Tỉnh/Thành phố</label>
                            <input type="text" class="form-control" name="location" value="<?php echo $information['location']; ?>" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender" class="fw-semibold mb-2">Giới tính</label>
                            <select name="gender" class="form-control" disabled>
                                <option value="1" <?php echo ($information['gender'] == '1') ? 'selected' : ''; ?>>
                                    Nam</option>
                                <option value="2" <?php echo ($information['gender'] == '2') ? 'selected' : ''; ?>>
                                    Nữ</option>
                                <option value="3" <?php echo ($information['gender'] == '3') ? 'selected' : ''; ?>>
                                    Khác</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="dob" class="fw-semibold mb-2">Ngày sinh</label>
                            <input type="date" class="form-control" name="dob" value="<?php echo $information['dob']; ?>" disabled>
                            <?php echo form_error('dob', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="fw-semibold mb-2">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $information['address']; ?>" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="fw-semibold mb-2">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $information['phone']; ?>" disabled>
                            <?php echo form_error('phone', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="contact_facebook" class="fw-semibold mb-2">Link Facebook</label>
                        <input type="text" class="form-control" name="contact_facebook" disabled value="<?php echo $information['contact_facebook']; ?>">
                    </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="contact_twitter" class="fw-semibold mb-2">Link Twitter</label>
                            <input type="text" class="form-control" name="contact_twitter" disabled value="<?php echo $information['contact_twitter']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="contact_linkedin" class="fw-semibold mb-2">Link LinkedIn</label>
                            <input type="text" class="form-control" name="contact_linkedin" disabled value="<?php echo $information['contact_linkedin']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="about_content" class="fw-semibold mb-2">Giới thiệu bản thân</label>
                            <textarea name="about_content" rows="6" class="form-control" disabled><?php echo $information['about_content']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 text-end mt-3">
                        <a type="button" href="<?php echo _WEB_ROOT; ?>/quan-ly-tai-khoan/tai-khoan" class="btn border border-1 border-primary py-2 px-5 text-primary btn-save-info">Chỉnh sửa</a>
                    </div>
                </div>
            </div>

            <div class="shadow p-2 rounded-2 mt-3">
                <h5 class="p-0 m-0 py-2 px-4">Thông tin chung</h5>
                <hr class="p-0 m-0">
                <div class="row p-4">
                <?php if (!empty($profileInformation)): ?>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="job_desired" class="fw-semibold mb-2">Vị trí mong muốn</label>
                            <input type="text" class="form-control" name="job_desired" placeholder="E.g. Nhân viên kinh doanh"
                                value="<?php echo $profileInformation['job_desired'] ?>">
                            <?php echo form_error('job_desired', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="job_field" class="fw-semibold mb-2">Nghề nghiệp</label>
                            <select class="form-select" name="job_field">
                                <option value="0">Chọn</option>
                                <?php
                                if (!empty($jobField)) :
                                    foreach ($jobField as $item) :
                                ?>
                                <option value="<?php echo $item['id']; ?>" 
                                    <?php echo ($profileInformation['job_category_id'] === $item['id']) ? 'selected' : false; ?>>
                                        <?php echo $item['name']; ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                            <?php echo form_error('job_field', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="current_rank" class="fw-semibold mb-2">Cấp bậc hiện tại</label>
                            <select class="form-select" name="current_rank">
                                <option value="0">Chọn</option>
                                <?php
                                if (!empty($rank)) :
                                    foreach ($rank as $item) :
                                ?>
                                <option value="<?php echo $item['id']; ?>"
                                    <?php echo ($profileInformation['current_rank'] === $item['id']) ? 'selected' : false; ?>>
                                        <?php echo $item['name']; ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                            <?php echo form_error('current_rank', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="academic_level" class="fw-semibold mb-2">Trình độ học vấn</label>
                            <select class="form-select" name="academic_level">
                                <option value="0">Chọn</option>
                                <?php
                                if (!empty($education)) :
                                    foreach ($education as $item) :
                                ?>
                                <option value="<?php echo $item['id']; ?>"
                                    <?php echo ($profileInformation['academic_level'] === $item['id']) ? 'selected' : false; ?>>
                                        <?php echo $item['name']; ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                            <?php echo form_error('academic_level', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mb-3">
                            <label for="form_work" class="fw-semibold mb-2">Hình thức làm việc</label>
                            <select class="form-select" name="form_work">
                                <option value="0">Chọn</option>
                                <?php
                                if (!empty($formWork)) :
                                    foreach ($formWork as $item) :
                                ?>
                                <option value="<?php echo $item['id']; ?>"
                                    <?php echo ($profileInformation['form_work'] === $item['id']) ? 'selected' : false; ?>>
                                        <?php echo $item['name']; ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                            <?php echo form_error('form_work', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="rank_desired" class="fw-semibold mb-2">Cấp bậc mong muốn</label>
                            <select class="form-select" name="rank_desired">
                                <option value="0">Chọn</option>
                                <?php
                                if (!empty($rank)) :
                                    foreach ($rank as $item) :
                                ?>
                                <option value="<?php echo $item['id']; ?>"
                                    <?php echo ($profileInformation['rank_desired'] === $item['id']) ? 'selected' : false; ?>>
                                        <?php echo $item['name']; ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                            <?php echo form_error('rank_desired', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="year_experience" class="fw-semibold mb-2">Số năm kinh nghiệm</label>
                            <select class="form-select" name="year_experience">
                                <option value="0">Chọn</option>
                                <?php
                                if (!empty($yearExp)) :
                                    foreach ($yearExp as $item) :
                                ?>
                                <option value="<?php echo $item['id']; ?>"
                                    <?php echo ($profileInformation['year_experience'] === $item['id']) ? 'selected' : false; ?>>
                                        <?php echo $item['name']; ?></option>
                                <?php endforeach;
                                endif; ?>
                            </select>
                            <?php echo form_error('year_experience', $errors, '<span class="fst-italic fs-6 text-danger px-2">', '</span>') ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mb-3">
                            <label for="skills" class="fw-semibold mb-2">Kỹ năng cứng & mềm <span class="text-secondary">(không bắt buộc)</span></label>
                            <input type="text" class="form-control" name="skills" placeholder="Nhập tên kỹ năng mềm hoặc cứng, (phân cách bởi dấu phẩy)"
                                value="<?php echo $profileInformation['skills'] ?>">
                        </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            
            <div class="sticky-bottom text-end ms-lg-auto mt-3 p-3" style="background-color: var(--section-color);">
                <button type="submit" href="<?php echo _WEB_ROOT; ?>/quan-ly-tai-khoan/tai-khoan" style="background-color: var(--primary-color);"
                     class="btn border border-1 px-5 py-2 rounded-3 text-white fw-semibold">Lưu và đăng hồ sơ</button>
            </div>
        </form>
    <?php endif; ?>
    </div>
</aside>