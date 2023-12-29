<div class="d-flex">
    <div class="ntd-form-register" style="padding: 90px; height: 100vh; width: 70%; overflow: auto;">
        <h5 class="text-primary">Đăng ký tài khoản Nhà tuyển dụng</h5>
        <p class="m-0 fs-5">Cùng tạo dựng lợi thế cho doanh nghiệp bằng trải nghiệm công nghệ tuyển dụng ứng dụng sâu AI & Hiring Funnel.</p>
        
        <form action="" method="post" class="mt-4">
            <h5 class="border-start border-5 border-primary px-2">Tài khoản</h5>
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group mb-3 w-100">
                    <span class="input-group-text p-0 border border-end-0"><i class="bi bi-envelope p-2 px-3 text-primary"></i></span>
                    <input type="email" class="form-control border-start-0" name="email" placeholder="Địa chỉ email">
                </div>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <div class="input-group mb-3 w-100">
                    <span class="input-group-text p-0 border border-end-0"><i class="bi bi-shield-lock p-2 px-3 text-primary"></i></span>
                    <input type="password" class="form-control border-start-0" name="password" placeholder="Nhập mật khẩu">
                </div>
            </div>
            <div class="form-group">
                <label for="re_password">Nhập lại mật khẩu</label>
                <div class="input-group mb-3 w-100">
                    <span class="input-group-text p-0 border border-end-0"><i class="bi bi-shield-lock p-2 px-3 text-primary"></i></span>
                    <input type="password" class="form-control border-start-0" name="re_password" placeholder="Nhập lại mật khẩu">
                </div>
            </div>
            <h5 class="border-start border-5 border-primary px-2 mt-5">Thông tin nhà tuyển dụng</h5>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fullname">Họ và tên</label>
                        <div class="input-group mb-3 w-100">
                            <span class="input-group-text p-0 border border-end-0"><i class="bi bi-person-lines-fill p-2 px-3 text-primary"></i></span>
                            <input type="text" class="form-control border-start-0" name="fullname" placeholder="Họ và tên">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <div class="input-group mb-3 w-100">
                            <span class="input-group-text p-0 border border-end-0"><i class="bi bi-telephone p-2 px-3 text-primary"></i></span>
                            <input type="text" class="form-control border-start-0" name="phone" placeholder="Số điện thoại">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="company_name">Tên công ty</label>
                        <div class="input-group mb-3 w-100">
                            <span class="input-group-text p-0 border border-end-0"><i class="bi bi-buildings p-2 px-3 text-primary"></i></span>
                            <input type="text" class="form-control border-start-0" name="company_name" placeholder="Tên công ty theo giấy phép kinh doanh">
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="address">Địa chỉ công ty</label>
                        <div class="input-group mb-3 w-100">
                            <span class="input-group-text p-0 border border-end-0"><i class="bi bi-geo p-2 px-3 text-primary"></i></i></span>
                            <input type="text" class="form-control border-start-0" name="address" placeholder="Địa chỉ công ty">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="scales">Quy mô công ty</label>
                        <select class="form-select" name="scales">
                        <option selected>Chọn quy mô</option>
                        <option value="1">Dưới 10 người</option>
                        <option value="2">10 - 150 người</option>
                        <option value="3">150 - 300 người</option>
                        <option value="3">Trên 300 người</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group mb-4">
                        <label for="job_field">Lĩnh vực hoạt động</label>
                        <select class="form-select" name="job_field">
                        <option selected>Chọn lĩnh vực</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Xác nhận</button>
            <p class="text-center mt-3 text-dark">Bạn đã có tài khoản? <a href="<?php echo _WEB_ROOT; ?>/ntd/dang-nhap">Đăng nhập</a></p>
        </form>
    </div>
    <div class="p-0 d-lg-block d-sm-none d-md-none d-none" style="width: 30%;">
        <img src="https://tuyendung.topcv.vn/app/_nuxt/img/banner-01.d2c28c7.png" class="img-fluid" style="height: 100vh; overflow: hidden;" alt="">
    </div>
</div>