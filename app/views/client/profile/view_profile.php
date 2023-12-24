<aside class="sidebar-candidates mb-4">
    <div class="d-flex">
        <?php  
        $this->render('block/sidebar_candidate', [], 'client');
    ?>
        <?php if (!empty($profileInformation)): ?>
        <div style="width: 80%; height: auto;" class="mx-4">
            <div class="mt-2 w-100 text-start">
                <h4>Hồ sơ của bạn</h4>
                <div>
                    <p class="text-secondary fs-6 fw-semibold">Hồ sơ đính kèm</p>
                    <div class="shadow rounded-2 p-2">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="d-flex align-items-center justify-content-around">
                                    <?php 
                                $fileType = checkFileType($profileInformation['cv_file']);
                                if (!empty($fileType)):
                                    if ($fileType == 'pdf'):
                            ?>
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/pdf-file-type.svg"
                                        style="width: 60px; height: 60px;" alt="">
                                    <?php elseif ($fileType == 'doc'): ?>
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/doc-icon.png"
                                        style="width: 60px; height: 60px;" alt="">
                                    <?php elseif ($fileType == 'docx'): ?>
                                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/docx-icon.png"
                                        style="width: 60px; height: 60px;" alt="">
                                    <?php endif; endif; ?>
                                    <h6 class="m-0 p-0 special-content-1 w-50">
                                        <?php echo $profileInformation['job_desired'] ?></h6>
                                    <?php 
                                    if ($profileInformation['status'] === 0) :
                                ?>
                                    <button type="button" class="btn btn-warning p-0 px-3">Chờ duyệt</button>
                                    <?php elseif ($profileInformation['status'] === 1) :?>
                                    <button type="button" class="btn btn-success p-0 px-3">Đã duyệt</button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-danger p-0 px-3">Bị loại</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 ms-lg-auto">
                                <div class="d-flex align-items-center justify-content-around">
                                    <p class="text-secondary px-3 m-0 fw-normal fs-6 border-end border-start border-2">
                                        Lượt xem: <span
                                            class="text-dark"><?php echo $profileInformation['view_count'] ?></span></p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label text-secondary border-2 border-end pe-4"
                                            for="flexSwitchCheckChecked">Cho phép tìm kiếm</label>
                                    </div>
                                    <a type="button"
                                        href="<?php echo _WEB_ROOT; ?>/quan-ly-ho-so/sua-ho-so?id=<?php echo $profileInformation['id']; ?>"
                                        class="btn border-primary text-primary px-4 py-2"><i class="bi bi-pencil"></i>
                                        Cập nhật hồ sơ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</aside>