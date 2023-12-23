<section class="section-main profile-user pb-3">
    <div class="container-lg">
        <div class="row">
            <?php 
                if (!empty($information)):
            ?>
            <div class="col-lg-3 col-md-11 col-sm-11 col-11 m-auto bg-white shadow-lg rounded-3 mt-4 p-3 h-auto">
                <div class="text-center">
                    <div class="avatar-profile-edit text-center p-3 mt-3">
                        <img src="<?php echo _WEB_ROOT.'/'.$information['thumbnail']; ?>" height="100px" width="100px"
                            class="avatar" alt="">
                    </div>
                    <h6><?php echo $information['fullname']; ?></h6>
                    <hr class="m-auto mt-4">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-6 text-start px-3">
                                <i class="text-info mx-1 bi bi-facebook"></i> Facebook
                            </div>
                            <div class="col-6 text-secondary">
                                <?php echo $information['contact_facebook']; ?>
                            </div>
                        </div>
                    </div>
                    <hr class="m-auto">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-6 text-start px-3">
                                <i class="text-info mx-1 bi bi-twitter-x"></i> Twitter
                            </div>
                            <div class="col-6 text-secondary">
                                <?php echo $information['contact_twitter']; ?>
                            </div>
                        </div>
                    </div>
                    <hr class="m-auto">
                    <div class="p-2">
                        <div class="row">
                            <div class="col-6 text-start px-3">
                                <i class="text-info mx-1 bi bi-linkedin"></i> Linkedin
                            </div>
                            <div class="col-6 text-secondary">
                                <?php echo $information['contact_linkedin']; ?>
                            </div>
                        </div>
                    </div>
                    <a type="button"
                        href="<?php echo _WEB_ROOT; ?>/thong-tin-ca-nhan/chinh-sua?id=<?php echo $information['id']; ?>"
                        class="btn btn-primary mt-3 px-3">Chỉnh sửa</a>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-lg-8 col-md-11 col-sm-11 col-11 m-auto bg-white ms-lg-auto shadow-lg rounded-3 mt-4 p-3 h-auto">
                <div class="row">
                    <div class="col-12">
                        <form action="">
                            <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column 
                                flex-column align-items-lg-center align-items-md-center mt-2">
                                <label for="fullname" class="text-start px-lg-3 px-md-3 px-sm-1 px-1 w-50">Họ và tên</label>
                                <input type="text" class="form-control" value="<?php echo $information['fullname']; ?>"
                                    disabled>
                            </div>
                            <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column 
                                flex-column align-items-lg-center align-items-md-center mt-2">
                                <label for="email" class="text-start px-3 px-lg-3 px-md-3 px-sm-1 px-1 w-50">Email</label>
                                <input type="email" class="form-control" value="<?php echo $information['email']; ?>"
                                    disabled>
                            </div>
                            <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column 
                                flex-column align-items-lg-center align-items-md-center mt-2">
                                <label for="phone" class="text-start px-3 px-lg-3 px-md-3 px-sm-1 px-1 w-50">Số điện thoại</label>
                                <input type="text" class="form-control" value="<?php echo $information['phone']; ?>"
                                    disabled>
                            </div>
                            <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column 
                                flex-column align-items-lg-center align-items-md-center mt-2">
                                <label for="dob" class="text-start px-3 px-lg-3 px-md-3 px-sm-1 px-1 w-50">Ngày sinh</label>
                                <input type="date" class="form-control" value="<?php echo $information['dob']; ?>"
                                    disabled>
                            </div>
                            <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column 
                                flex-column align-items-lg-center align-items-md-center mt-2">
                                <label for="fullname" class="text-start px-3 px-lg-3 px-md-3 px-sm-1 px-1 w-50">Giới tính</label>
                                <select name="" class="form-control" disabled>
                                    <option value="1" <?php echo ($information['gender'] == '1') ? 'selected' : ''; ?>>
                                        Nam</option>
                                    <option value="2" <?php echo ($information['gender'] == '2') ? 'selected' : ''; ?>>
                                        Nữ</option>
                                    <option value="3" <?php echo ($information['gender'] == '3') ? 'selected' : ''; ?>>
                                        Khác</option>
                                </select>
                            </div>
                            <div class="form-group d-flex flex-lg-row flex-md-row flex-sm-column 
                                flex-column align-items-lg-center align-items-md-center mt-2">
                                <label for="dob" class="text-start px-3 px-lg-3 px-md-3 px-sm-1 px-1 w-50">Giới thiệu bản thân</label>
                                <textarea name="" rows="7" class="form-control"
                                    disabled><?php echo $information['about_content']; ?></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-11 col-sm-11 col-11 m-auto bg-white ms-lg-auto shadow-lg rounded-3 mt-4 p-3 h-auto">
            <?php 
                if (!empty($listJobApplied)):
            ?>
                <h4 class="text-center">Việc làm đã ứng tuyển</h4>

                <table class="table table-striped mt-2">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Việc làm</th>
                            <th>Công ty</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                <?php 
                    $count = 0;
                    foreach ($listJobApplied as $item):
                        $count++;
                ?>
                    <tbody>
                        <tr>
                            <th><?php echo $count; ?></th>
                            <td><?php echo $item['title']; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <?php  
                                if ($item['status'] === 1):
                                    echo '<td><button class="btn btn-success btn-sm">Đã duyệt</button></td>';
                                elseif($item['status'] == 2):
                                    echo '<td><button class="btn btn-danger btn-sm">Bị loại</button></td>';
                                else:
                                    echo '<td><button class="btn btn-warning btn-sm">Chờ duyệt</button></td>';
                                endif;
                            ?>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
                </table>
            <?php else: ?>
                <div class="m-auto text-center w-50 p-2">
                    <img src="<?php echo _WEB_ROOT; ?>/public/client/assets/images/empty.webp" class="mt-3" alt="Ảnh">
                    <h5 class="mt-3 text-secondary">Bạn chưa ứng tuyển việc làm nào</h5>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>