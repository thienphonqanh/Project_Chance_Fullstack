<div class="p-2">
    <form method="" class="text-center shadow-lg p-4 rounded-3">
        <h4 class="text-start">Thông tin cá nhân</h4>
        <div class="row">
            <?php if (!empty($dataProfile)): ?>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" disabled id="floatingInput" name="fullname" placeholder="name@example.com"
                        value="<?php echo $dataProfile['fullname']; ?>">
                    <label for="floatingInput">Họ và tên <span class="text-danger fw-bold">*</span></label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" disabled id="floatingInput" name="email" placeholder="name@example.com"
                        value="<?php echo $dataProfile['email']; ?>">
                    <label for="floatingInput">Địa chỉ email <span class="text-danger fw-bold">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" disabled id="floatingInput" name="dob" placeholder="name@example.com"
                        value="<?php echo $dataProfile['dob']; ?>">
                    <label for="floatingInput">Ngày sinh <span class="text-danger fw-bold">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" disabled id="floatingInput" name="location" placeholder="name@example.com"
                        value="<?php echo $dataProfile['location']; ?>">
                    <label for="floatingInput">Tỉnh/Thành phố hiện tại <span class="text-danger fw-bold">*</span></label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" disabled id="floatingInput" name="phone" placeholder="name@example.com"
                        value="<?php echo $dataProfile['phone']; ?>">
                    <label for="floatingInput">Số điện thoại <span class="text-danger fw-bold">*</span></label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="gender" id="floatingSelect" disabled>
                        <option selected>Chọn giới tính</option>
                        <option value="1" <?php echo $dataProfile['gender'] === 1 ? 'selected' : false; ?>>Nam</option>
                        <option value="2" <?php echo $dataProfile['gender'] === 2 ? 'selected' : false; ?>>Nữ</option>
                        <option value="3" <?php echo $dataProfile['gender'] === 3 ? 'selected' : false; ?>>Khác</option>
                    </select>
                    <label for="floatingSelect">Giới tính</label>
                    </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" disabled name="address" id="floatingInput" placeholder="name@example.com"
                        value="<?php echo $dataProfile['address']; ?>">
                    <label for="floatingInput">Địa chỉ (Tên đường, quận/huyện,...)</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" disabled name="contact_facebook" id="floatingInput" placeholder="name@example.com"
                        value="<?php echo $dataProfile['contact_facebook']; ?>">
                    <label for="floatingInput">Link Facebook</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" disabled name="contact_twitter" id="floatingInput" placeholder="name@example.com"
                        value="<?php echo $dataProfile['contact_twitter']; ?>">
                    <label for="floatingInput">Link Twitter</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" disabled name="contact_linkedin" id="floatingInput" placeholder="name@example.com"
                        value="<?php echo $dataProfile['contact_linkedin']; ?>">
                    <label for="floatingInput">Link LinkedIn</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control" placeholder="Giới thiệu bản thân" disabled name="about_content" rows="8"><?php echo $dataProfile['about_content']; ?></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="mt-5 text-start">
                    <h4>Hồ sơ cá nhân</h4>
                    <input class="form-control form-control-md" name="cv" id="cv" type="file">
                    <p class="fw-semibold fs-6 fst-italic p-1">Sử dụng tệp .doc, .docx hoặc .pdf, không chứa mật khẩu bảo vệ và dưới 3MB</p>
                </div>
            </div>
            <div class="col-12 text-end">
                <a href="<?php echo _WEB_ROOT; ?>/groups/ung-vien" class="btn btn-md btn-danger">Quay lại</a>
            </div>
            <?php endif; ?>
        </div>
    </form>
</div>
