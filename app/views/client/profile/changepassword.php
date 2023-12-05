<section class="section-main p-3">
    <div class="container-lg">
        <div class="row">
            <div class="col-7 mx-5">
                <p class="fw-bold">Thay đổi mật khẩu đăng nhập</p>
                <div class="shadow-lg rounded-3 p-4">
                    <?php 
                    if (!empty($msg)) :
                        echo '<div class="alert alert-' . $msgType . '">';
                        echo $msg;
                        echo '</div>';
                    endif;
                    ?>
                    <form action="" method="post" class="text-end">
                        <div class="form-group py-2">
                            <div class="row align-items-center">
                                <div class="col-4 text-end">
                                    <label for="email">Email đăng nhập</label>
                                </div>
                                <div class="col-8">
                                    <input type="email" name="email" class="form-control"
                                        value="<?php echo getEmailUserLogin(); ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="row align-items-center">
                                <div class="col-4 text-end">
                                    <label for="old_password">Mật khẩu hiện tại</label>
                                </div>
                                <div class="col-8 text-start">
                                    <input type="password" name="old_password" class="form-control">
                                    <?php echo form_error('old_password', $errors, '<span class="error">', '</span>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="row align-items-center">
                                <div class="col-4 text-end">
                                    <label for="new_password">Mật khẩu mới</label>
                                </div>
                                <div class="col-8 text-start">
                                    <input type="password" name="new_password" class="form-control">
                                    <?php echo form_error('new_password', $errors, '<span class="error">', '</span>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="row align-items-center">
                                <div class="col-4 text-end">
                                    <label for="confirm_new_password">Nhập lại mật khẩu mới</label>
                                </div>
                                <div class="col-8 text-start">
                                    <input type="password" name="confirm_new_password" class="form-control">
                                    <?php echo form_error('confirm_new_password', $errors, '<span class="error">', '</span>') ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-5 mt-2">Lưu</button>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="shadow-lg text-center rounded-3">
                    <div class="avatar-profile-edit text-center p-3">
                        <img src="<?php echo _WEB_ROOT.'/'.getAvatarUserLogin(); ?>" height="100px" width="100px"
                            class="avatar" alt="">
                    </div>
                    <p class="bg-secondary w-50 m-auto text-white rounded-5">Tài khoản đã xác thực</p>
                    <h6 class="py-3"><?php echo getNameUserLogin(); ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>