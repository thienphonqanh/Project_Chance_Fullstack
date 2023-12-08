<!-- Section main -->
<section class="section-main">
    <?php 
        if (!empty($dataDetail)):
            foreach ($dataDetail as $item):
    ?>
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-8 px-4">
                <div class="d-flex mt-2">
                    <a href="">
                        <p class="text-uppercase"><?php echo $item['main_category_name']; ?></p>
                    </a>
                    <p class="text-uppercase ms-4"><?php echo $item['sub_category_name']; ?></p>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="fw-bold"><?php echo $item['title']; ?></h3>
                    </div>
                    <div class="col-lg-12">
                        <div class="d-flex">
                            <p class="fs-6">By <span class="fs-6 fw-bold text-dark"> <?php echo $item['author']; ?></span></p>
                            <p class="fs-6 ms-3"><?php echo getDateTimeFormat($item['create_at'], 'd-m-Y'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <img src="<?php echo _WEB_ROOT.'/'.$item['thumbnail']; ?>" width="100%" class="rounded-3" alt="Ảnh">
                    <p class="text-dark">
                        <?php echo $item['descr']; ?>
                    </p>
                    <p class="text-dark">
                        <?php echo $item['content']; ?>
                    </p>
                </div>
                <div>
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div style="height: 180px;"></div>
                <div class="ms-3 mt-3">
                    <p class="fs-4 fw-normal text-dark">Top công việc mới nhất</p>
                    <div class="d-flex p-2 rounded border border-1 mt-3 text-dark">
                        <div>
                            <img width="35px" height="32px" class="border rounded" src="http://localhost:8082/project_chance/app/uploads/job/167098261139.png" alt="">
                        </div>
                        <div class="special-span ms-2">
                            <span class="fs-6 fw-semibold special-content-1">Nhân Viên Kinh Doanh Ô Tô (Làm Tại Bình Định)</span>
                            <span class="fs-6 special-content-1">Công Ty TNHH Kinh Bố</span>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-geo-alt"></i>
                            <p class="fs-6 fw-semibold ms-2 m-0 special-content-1">Bình Định, Phú Yên, Gia Lai, Quảng Ngãi, Kon Tum, Đắk Lắk</p>
                            </div>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-currency-dollar"></i>
                                <p class="fs-6 fw-semibold ms-2 m-0">15 - 30 triệu</p>
                            </div>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-suitcase-lg"></i>
                                <p class="fs-6 fw-semibold ms-2 m-0">1 năm</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 rounded border border-1 mt-3 text-dark">
                        <div>
                            <img width="35px" height="32px" class="border rounded" src="http://localhost:8082/project_chance/app/uploads/job/167098261139.png" alt="">
                        </div>
                        <div class="special-span ms-2">
                            <span class="fs-6 fw-semibold special-content-1">Nhân Viên Kinh Doanh Ô Tô (Làm Tại Bình Định)</span>
                            <span class="fs-6 special-content-1">Công Ty TNHH Kinh Bố</span>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-geo-alt"></i>
                            <p class="fs-6 fw-semibold ms-2 m-0 special-content-1">Bình Định, Phú Yên, Gia Lai, Quảng Ngãi, Kon Tum, Đắk Lắk</p>
                            </div>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-currency-dollar"></i>
                                <p class="fs-6 fw-semibold ms-2 m-0">15 - 30 triệu</p>
                            </div>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-suitcase-lg"></i>
                                <p class="fs-6 fw-semibold ms-2 m-0">1 năm</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex p-2 rounded border border-1 mt-3 text-dark">
                        <div>
                            <img width="35px" height="32px" class="border rounded" src="http://localhost:8082/project_chance/app/uploads/job/167098261139.png" alt="">
                        </div>
                        <div class="special-span ms-2">
                            <span class="fs-6 fw-semibold special-content-1">Nhân Viên Kinh Doanh Ô Tô (Làm Tại Bình Định)</span>
                            <span class="fs-6 special-content-1">Công Ty TNHH Kinh Bố</span>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-geo-alt"></i>
                            <p class="fs-6 fw-semibold ms-2 m-0 special-content-1">Bình Định, Phú Yên, Gia Lai, Quảng Ngãi, Kon Tum, Đắk Lắk</p>
                            </div>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-currency-dollar"></i>
                                <p class="fs-6 fw-semibold ms-2 m-0">15 - 30 triệu</p>
                            </div>
                            <div class="d-flex mt-1">
                                <i class="text-primary bi bi-suitcase-lg"></i>
                                <p class="fs-6 fw-semibold ms-2 m-0">1 năm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; endif; ?>
    <div class="same-category p-4">
        <div class="container-lg">
            <h4>Cùng chuyên mục</h4>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <a href="#" class="handbook-item d-block">
                        <img src="http://localhost:8082/project_chance/public/client/assets/images/handbook/tram-sac-ky-nang/don-khieu-nai-1-1.jpg" class="img-fluid rounded-3" alt="">
                        <div class="mt-2 w-100 px-3 py-2 d-flex flex-column">
                            <p class="text-uppercase fw-normal fs-6 text-dark m-0">Kiến thức văn phòng</p>
                            <h5 class="tilte-handbook">Đơn khiếu nại là gì? Cách viết đơn khiếu nại đúng chuẩn cần
                                biết</h5>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="#" class="handbook-item d-block">
                        <img src="http://localhost:8082/project_chance/public/client/assets/images/handbook/tram-sac-ky-nang/mau-thu-ngo.jpg" class="img-fluid rounded-3" alt="">
                        <div class="mt-2 w-100 px-3 py-2 d-flex flex-column">
                            <p class="text-uppercase fw-normal fs-6 text-dark m-0">Kiến thức văn phòng</p>
                            <h5 class="tilte-handbook">Không rời mắt trước các mẫu thư ngỏ ấn tượng, chuyên nghiệp
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="#" class="handbook-item d-block">
                        <img src="http://localhost:8082/project_chance/public/client/assets/images/handbook/tram-sac-ky-nang/thu-chao-hang.jpg" class="img-fluid rounded-3" alt="">
                        <div class="mt-2 w-100 px-3 py-2 d-flex flex-column">
                            <p class="text-uppercase fw-normal fs-6 text-dark m-0">Kiến thức văn phòng</p>
                            <h5 class="tilte-handbook">Tăng doanh thu hiệu quả với các mẫu thư chào hàng hay, ấn
                                tượng</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>