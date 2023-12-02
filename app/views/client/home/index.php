        <!-- Mở đầu -->
        <section class="hero-section d-flex justify-content-center align-items-center">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="hero-section-text mt-5">
                            <h6 class="text-white">Bạn đang tìm kiếm công việc mơ ước?</h6>

                            <h1 class="hero-title text-white mt-4 mb-4">Việc làm trực tuyến. <br> <span class="text-info">WEBSITE</span> tuyển dụng hàng đầu</h1>

                            <a href="#categories-section" class="custom-btn custom-border-btn btn">Duyệt danh mục</a>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <form class="custom-form hero-form" action="#" method="get" role="form">
                            <h3 class="text-white mb-3">Tìm kiếm công việc mơ ước</h3>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>

                                        <input type="text" name="job-title" id="job-title" class="form-control" placeholder="Tiêu đề" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2"><i class="bi-geo-alt custom-icon"></i></span>

                                        <input type="text" name="job-location" id="job-location" class="form-control" placeholder="Vị trí" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                    <button type="submit" class="form-control">
                                        Tìm việc
                                    </button>
                                </div>

                                <div class="col-12">
                                    <div class="d-flex flex-wrap align-items-center mt-4 mt-lg-0">
                                        <span class="text-white mb-lg-0 mb-md-0 me-2">Từ khoá phổ biến:</span>

                                        <div>
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="badge">Web design</a>

                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="badge">Marketing</a>

                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="badge">Customer support</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
 
        <!-- Giới thiệu công cụ -->
        <section class="section-introducing" id="section-introducing">
            <h3 class="text-center">Công cụ tốt nhất cho hành trang ứng tuyển của bạn</h3>
            <p class="text-center">Khẳng định bản thân qua hồ sơ "chất" với công cụ và kiến thức bổ ích từ Chance.</p>
            <div class="d-lg-flex mt-5">
                <div class="d-flex flex-column align-items-center rounded p-lg-4 py-lg-5 p-md-4 py-md-5 p-sm-4 py-sm-5 p-5">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/site-header/job_search.png" width="100px" alt="">
                    <div>
                        <h4 class="text-center">Tìm kiếm việc làm</h4>
                        <p class="text-center fw-normal text-dark">Danh sách việc làm "chất" liên tục cập nhật các lựa chọn mới nhất theo thị trường và xu hướng tìm kiếm.</p>
                        <a href="#" type="button" class="discover-1 border border-primary text-primary d-block w-50 p-2 text-center m-auto  rounded fw-bold fs-5">Khám phá</a>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center shadow-lg rounded p-lg-4 py-lg-5 p-md-4 py-md-5 p-sm-4 py-sm-5 p-5">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/site-header/user_profile.png" width="100px" alt="">
                    <div>
                        <h4 class="text-center">Hồ sơ cá nhân</h4>
                        <p class="text-center fw-normal text-dark">Kiến tạo hồ sơ với bố cục chuẩn mực, chuyên nghiệp cho các ngành nghề, được nhiều nhà tuyển dụng đề xuất.</p>
                        <a href="#" type="button" class="discover-2 border border-primary btn btn-primary text-white d-block w-50 p-2 text-center m-auto rounded fw-bold fs-5">Khám phá</a>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center rounded p-lg-4 py-lg-5 p-md-4 py-md-5 p-sm-4 py-sm-5 p-5">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/site-header/blog.png" width="100px" alt="">
                    <div>
                        <h4 class="text-center">Blog về việc làm</h4>
                        <p class="text-center fw-normal text-dark">Đừng bỏ lỡ cơ hội cập nhật thông tin lương thưởng, chế độ làm việc, nghề nghiệp và kiến thức các ngành nghề.</p>
                        <a href="#" type="button" class="discover-3 border border-primary text-primary d-block w-50 p-2 text-center m-auto rounded fw-bold fs-5">Khám phá</a>
                    </div>
                </div>
            </div>

        </section>

        <!-- Ngành nghề trọng điểm -->
        <section class="section-key-industries" id="section-key-industries">
            <h2 class="text-center">Ngành Nghề Trọng Điểm</h2>
            <div class="industries-block">
                <div class="industries">
                    <?php 
                        if (!empty($jobCategory)):
                            foreach ($jobCategory as $item):
                    ?>
                    <a href="#" class="item">
                        <img src="<?php echo _WEB_ROOT.'/'.$item['icon']; ?>" alt="">
                        <p class="text-uppercase"><?php echo $item['name']; ?></p>
                    </a>
                    <?php endforeach; endif; ?>
                </div>
            </div>

            <div class="direction">
                <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
                <button id="next"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </section>

        <!-- Việc làm nổi bật -->
        <section class="job-section job-featured-section section-padding" id="section-job">
            <div class="container-lg">
                <div class="row">
                    <div class="col-lg-6 col-12 text-center mx-auto mb-4">
                        <h2>Việc làm nổi bật</h2>

                        <p><strong>Hơn 10k công việc đang chờ đón bạn</strong> Cơ hội việc làm đang rộng mở, còn chần chừ gì nữa mà không ứng tuyển ngay bây giờ.</p>
                    </div>

                    <div class="col-lg-12 col-12">
                        <ul class="list-job">
                        <?php 
                            if (!empty($outstandingJob)):
                                foreach ($outstandingJob as $item):
                        ?>
                            <li class="job-thumb">
                                <a href="<?php echo _WEB_ROOT; ?>/chi-tiet-viec-lam/<?php echo $item['slug'].'-'.$item['id']; ?>">
                                    <div class="job-image-wrap bg-white shadow-lg">
                                        <img src="<?php echo _WEB_ROOT.'/'.$item['thumbnail']; ?>" class="job-image img-fluid" alt="">
                                    </div>
                                    
                                    <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                        <div class="mb-3">
                                            <h5 class="job-title mb-lg-0 pb-2">
                                                <?php echo $item['title']; ?>
                                            </h5>
                                    
                                            <div class="d-flex flex-wrap align-items-center">
                                                <p class="job-location mb-0">
                                                    <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                    <?php echo $item['name']; ?><br>
                                                    <strong class="text-info mx-1"><?php echo $item['location']; ?></strong>
                                                </p>
                                    
                                                <p class="job-date mb-0">
                                                    <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                    10 giờ trước
                                                </p>
                                    
                                                <p class="job-price mb-0">
                                                    <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                    <?php echo $item['salary']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    
                                        <div class="job-section-btn-wrap">
                                            <a href="<?php echo _WEB_ROOT; ?>/chi-tiet-viec-lam/<?php echo $item['slug'].'-'.$item['id']; ?>" class="btn-details">Ứng tuyển</a>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; endif; ?>
                            <!-- <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-2.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Giáo Viên Mẫu Giáo (Dạy trẻ 3-5 tuổi)</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary text-primary-emphasis"></i>
                                                Công ty TNHH Giáo Dục Duy Thịnh<br>
                                                <strong class="text-info mx-1">TP.HCM</strong>

                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                1 ngày trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                9 - 12 triệu
                                            </p>

                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-3.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Nhân Viên Kinh Doanh (Lương cứng tốt - Hoa Hồng)</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty Cổ Phần Phát Triển Địa Ốc Á Châu<br>
                                                <strong class="text-info mx-1">Bình Dương</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                22 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                18 - 50 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-4.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Giám Sát Kinh Doanh (Kênh Đại Lý)</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Minh Hương P.N.D<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                40 phút trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                15 - 50 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-5.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Trưởng Phòng Kinh Doanh Ưu Tiên Nữ</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty Cổ Phần Hưng Thịnh Land<br>
                                                <strong class="text-info mx-1">Hà Nội, TP.HCM</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                2 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                15 - 50 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-6.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Nhân Viên Kinh Doanh BĐS Thổ Cư</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Cen Land-Công ty Cổ Phần BĐS Thế Kỷ<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                2 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                15 - 30 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-7.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Nhân Viên Chăm Sóc Khách Hàng</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty Cổ Phần In Hoa Long<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                2 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                7 - 30 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>
                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-8.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Chuyên Viên Tư Vấn Tài Chính</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Bảo Hiểm Nhân Thọ AIA<br>
                                                <strong class="text-info mx-1">TP.HCM</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                20 phút trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                15 - 30 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-9.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Nhân Viên Content</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Gia Anh Hưng Yên<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                16 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                8 - 10 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-10.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Kế Toán Bán Hàng</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty Cổ Phần Inox Tân Đạt<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                8 phút trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                12 - 15 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-11.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Nhân Viên Kỹ Thuật Spa - Hệ Thống Care With Love</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty Cổ Phần Phát Triển Thương Mại Hoa Linh<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                8 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                7 - 15 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-12.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Nhân Viên Kỹ Thuật (Thang Máy Cibes)</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Cibes Lift Việt Nam (Cibes Lift Vietnam Co., Ltd)<br>
                                                <strong class="text-info mx-1">Hà Nội, TP.HCM, Quảng Ninh</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                2 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                7 - 9 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>
                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-13.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Kênh Ngân Hàng Viettinbank - Chuyên Viên Tư Vấn Bảo Hiểm</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Manulife (Việt Nam)<br>
                                                <strong class="text-info mx-1">Phú Yên, Bến Tre, +5</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                2 phút trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                10 - 20 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-14.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Lái Xe Biết Ngoại Ngữ</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Dịch Vụ Logitem Việt Nam Miền Bắc<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                1 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                8 - 12 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-15.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Kỹ Thuật Viên Nail/Spa</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Iveé Nail Spa & Beauty<br>
                                                <strong class="text-info mx-1">TP.HCM</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                8 phút trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                6 - 20 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-16.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Thư Ký/ Trợ Lý Văn Phòng (Biết Tiếng Trung)</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Novaland Group<br>
                                                <strong class="text-info mx-1">TP.HCM</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                4 giây trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                Từ 12 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-17.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Java Developer Upto 35M</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty Cổ Phần Hệ Thống Công Nghệ ETC<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                2 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                Tới 35 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>
                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-18.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Sale Manager</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty TNHH Tiếp Vận Dịch Vụ Hàng Hoá Đặc Biệt<br>
                                                <strong class="text-info mx-1">Phú Yên, TP.HCM</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                2 phút trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                25 - 35 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-19.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Nhân Viên Vận Hành Game</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Công ty Cổ Phần OneSoft-Falcon Game Studio<br>
                                                <strong class="text-info mx-1">Hà Nội</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                1 giờ trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                Thương lượng
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li>

                            <li class="job-thumb">
                                <div class="job-image-wrap bg-white shadow-lg">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/jobs/j-20.png" class="job-image img-fluid" alt="">
                                </div>

                                <div class="job-body d-flex flex-wrap flex-auto align-items-center ms-4">
                                    <div class="mb-3">
                                        <h5 class="job-title mb-lg-0 pb-2">
                                            <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="job-title-link">Thực Tập Sinh Ngân Hàng</a>
                                        </h5>

                                        <div class="d-flex flex-wrap align-items-center">
                                            <p class="job-location mb-0">
                                                <i class="fa-solid fa-location-dot text-primary-emphasis"></i>
                                                Ngân Hàng TMCP Quân Đội-MBBank<br>
                                                <strong class="text-info mx-1">TP.HCM</strong>
                                            </p>

                                            <p class="job-date mb-0">
                                                <i class="fa-regular fa-clock text-primary-emphasis"></i>
                                                8 phút trước
                                            </p>

                                            <p class="job-price mb-0">
                                                <i class="fa-regular fa-money-bill-1 text-primary-emphasis"></i>
                                                1.5 - 2 triệu
                                            </p>
                                        </div>
                                    </div>

                                    <div class="job-section-btn-wrap">
                                        <a href="<?php echo _WEB_ROOT; ?>/tim-viec-lam" class="btn-details">Ứng tuyển</a>
                                    </div>
                                </div>
                            </li> -->
                        </ul>

                        <div class="paging">
                            <ul class="list-page">
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Cẩm nang nghề nghiệp -->
        <section class="section-handbook">
            <h3 class="text-center">Cẩm Nang Nghề Nghiệp</h3>
            <p class="text-center">Những kinh nghiệm bạn có thể cần trong quá trình tìm kiếm và làm việc</p>
            <div class="handbook-block">
                <a href="<?php echo _WEB_ROOT; ?>/cam-nang" class="handbook">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/h-1.jpg" class="img-fluid" alt="">
                    <p class="text-dark">Vì sao nhiều người trẻ bỏ việc văn phòng, ước mơ làm việc tự do thu nhập trăm củ?</p>
                    <span class="text-dark">Người trẻ chán việc văn phòng không phải chỉ vì lý do lương thấp. Kỳ thực, chỉ cần bạn có năng lực tốt, dù làm việc ở văn phòng hay làm việc tự do, bạn đều có thể đạt...</span>
                </a>

                <a href="<?php echo _WEB_ROOT; ?>/cam-nang" class="handbook">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/h-2.jpg" class="img-fluid" alt="">
                    <p class="text-dark">6 điều cần chuẩn bị trước khi nghỉ việc mà người lao động cần biết</p>
                    <span class="text-dark">Xin nghỉ việc bao giờ cũng là một quyết định quan trọng, mang ý nghĩa “sống còn” trong sự nghiệp của mỗi người. Nhưng khoan hãy nóng vội, dù là chuyện gì cũng cần có...</span>
                </a>

                <a href="<?php echo _WEB_ROOT; ?>/cam-nang" class="handbook">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/h-3.jpg" class="img-fluid" alt="">
                    <p class="text-dark">Các khoản thu nhập không phải đóng BHXH mà người lao động cần biết</p>
                    <span class="text-dark">Khi tham gia lao động tại bất kỳ công ty hay doanh nghiệp nào, bảo hiểm xã hội (BHXH) đã trở thành phúc lợi quan trọng trong việc đảm bảo cuộc sống ổn định cho...</span>
                </a>

            </div>
            <!-- <button type="button" class="btn-loadHandBook">Xem thêm cẩm nang nghề nghiệp</button> -->
            <a href="<?php echo _WEB_ROOT; ?>/cam-nang" class="more-handbook d-block p-2 m-auto mt-3 text-center rounded">Xem thêm cẩm nang nghề nghiệp</a>
        </section>