<aside>
    <div class="offcanvas offcanvas-end w-75 p-md-2 p-sm-2 p-1" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header sidebar-candidates-header w-100 rounded-2 mb-3">
            <h5 class="offcanvas-title fw-normal" id="offcanvasWithBothOptionsLabel"><i class="text-primary bi bi-person-circle fs-4 me-1"></i> <?php echo getNameUserLogin(); ?></h5>
        </div>
        <div class="offcanvas-body w-100 p-0">
            <ul class="p-0 m-0">
                <li>
                    <div class="d-inline-flex gap-1 p-0">
                        <a class="btn border border-0 p-md-0 m-md-0 px-md-3 py-md-2 p-sm-0 m-sm-0 px-sm-3 py-sm-2 p-0 m-0 px-2 py-1 fw-bold text-dark" data-bs-toggle="collapse" href="#collapseExample-1" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-chevron-down"></i> Quản lý tài khoản
                        </a>
                        </div>
                    <div class="collapse show" id="collapseExample-1">
                        <ul class="p-0 m-0 mx-4 px-1">
                            <li class="py-1">
                                <a href="<?php echo _WEB_ROOT; ?>/quan-ly-tai-khoan/tai-khoan" class="text-dark fw-normal fs-6">
                                    <i class="bi bi-people-fill text-primary"></i> Tài khoản của bạn
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="d-inline-flex gap-1 p-0">
                        <a class="btn border border-0 p-md-0 m-md-0 px-md-3 py-md-2 p-sm-0 m-sm-0 px-sm-3 py-sm-2 p-0 m-0 px-2 py-1 fw-bold text-dark" data-bs-toggle="collapse" href="#collapseExample-2" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-chevron-down"></i> Quản lý hồ sơ
                        </a>
                        </div>
                    <div class="collapse show" id="collapseExample-2">
                        <ul class="p-0 m-0 mx-4 px-1">
                            <li class="py-1">
                                <a href="<?php echo _WEB_ROOT; ?>/quan-ly-ho-so/ho-so" class="text-dark fw-normal fs-6">
                                    <i class="bi bi-people-fill text-primary"></i> Hồ sơ của bạn
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="d-inline-flex gap-1 p-0">
                        <a class="btn border border-0 p-md-0 m-md-0 px-md-3 py-md-2 p-sm-0 m-sm-0 px-sm-3 py-sm-2 p-0 m-0 px-2 py-1 fw-bold text-dark" data-bs-toggle="collapse" href="#collapseExample-3" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-chevron-down"></i> Quản lý việc làm
                        </a>
                        </div>
                    <div class="collapse show" id="collapseExample-3">
                        <ul class="p-0 m-0 mx-4 px-1">
                            <li class="py-1">
                                <a href="#" class="text-dark fw-normal fs-6">
                                    <i class="bi bi-people-fill text-primary"></i> Việc làm đã ứng tuyển
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="text-dark fw-normal fs-6">
                                    <i class="bi bi-people-fill text-primary"></i> Việc làm đã lưu
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="d-inline-flex gap-1 p-0">
                        <a class="btn border border-0 p-md-0 m-md-0 px-md-3 py-md-2 p-sm-0 m-sm-0 px-sm-3 py-sm-2 p-0 m-0 px-2 py-1 fw-bold text-dark" data-bs-toggle="collapse" href="#collapseExample-4" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-chevron-down"></i> Nhà tuyển dụng bạn quan tâm
                        </a>
                        </div>
                    <div class="collapse show" id="collapseExample-4">
                        <ul class="p-0 m-0 mx-4 px-1">
                            <li class="py-1">
                                <a href="#" class="text-dark fw-normal fs-6">
                                    <i class="bi bi-people-fill text-primary"></i> Nhà tuyển dụng đã xem hồ sơ bạn
                                </a>
                            </li>
                            <li class="py-1">
                                <a href="#" class="text-dark fw-normal fs-6">
                                    <i class="bi bi-people-fill text-primary"></i> Nhà tuyển dụng đang theo dõi bạn
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>