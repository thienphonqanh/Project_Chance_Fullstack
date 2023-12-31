<aside class="sidebar-candidates mb-4">
    <div class="d-flex">
        <?php
        $this->render('block/sidebar_employer', [], 'client');
        ?>
        <div class="shadow p-4 rounded-3 mt-2 m-auto custom-form-profile">
            <div class="row">
                <?php 
                    if (isset($quantityJob)):
                ?>
                <div class="col-lg-7">
                    <h5>Tất cả tin đăng <span class="text-danger fw-bold">(<?php echo $quantityJob; ?> hồ sơ nộp)</span>
                    </h5>
                </div>
                <?php endif; ?>
                <div class="col-lg-5">
                    <p class="fs-6 ms-lg-auto text-start fw-normal"><i class="bi bi-info-circle-fill text-warning"></i>
                        Hồ sơ bị xóa hoặc ẩn bởi ứng viên sẽ không thể tải xuống. Danh sách hồ sơ sẽ bị xóa sau 6 tháng.
                    </p>
                </div>
            </div>
            <div class="row align-items-center m-0 p-0">
                <div class="col-lg-1 p-0">
                    <p class="fs-6 p-0 m-0 fw-semibold mx-1">Bộ lọc </p>
                </div>
                <div class="col-lg-11">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-5">
                                <input type="search" name="keyword" class="form-control" placeholder="Tất cả tin đăng"
                                    value="<?php isset($request->getFields()['keyword']) ?? '' ?>">
                            </div>
                            <div class="col-lg-4">
                                <select class="form-select" name="status">
                                    <option value="all">Tất cả trạng thái</option>
                                    <option value="inactive"
                                        <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'inactive' ? 'selected' : '' ?>>
                                        Chờ duyệt</option>
                                    <option value="active"
                                        <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'active' ? 'selected' : '' ?>>
                                        Đã duyệt</option>
                                    <option value="unactive"
                                        <?php isset($request->getFields()['status']) && $request->getFields()['status'] == 'unactive' ? 'selected' : '' ?>>
                                        Bị loại</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary w-100">Lọc</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Tên hồ sơ</th>
                        <th class="text-center">Vị trí ứng tuyển</th>
                        <th class="text-center" width="17%">Thời gian nộp</th>
                        <th class="text-center" width="17%">Trạng thái ứng tuyển</th>
                        <th class="text-center" width="10%">Liên hệ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                if (!empty($listJobApplied)):
                    foreach ($listJobApplied as $item):
                ?>
                    <tr>
                        <td><?php echo $item['fullname']; ?></td>
                        <td class="text-center"><?php echo $item['title']; ?></td>
                        <td class="text-center"><?php echo getDateTimeFormat($item['create_at'], 'd-m-Y') ?></td>
                        <td class="text-center">
                            <?php 
                            switch ($item['status']): 
                                case 0:
                                    echo '<div class="dropdown">
                                    <button data-bs-toggle="dropdown" aria-expanded="false" type="button" class="btn btn-sm rounded-5 border-0 px-3" style="background-color: rgb(246, 246, 161);">
                                    Chờ duyệt
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="' . _WEB_ROOT . '/ntd/quan-ly-ung-vien/ho-so-ung-tuyen/trang-thai?action=active&id=' . $item['id'] . '">Duyệt</a></li>
                                        <li><a class="dropdown-item" href="' . _WEB_ROOT . '/ntd/quan-ly-ung-vien/ho-so-ung-tuyen/trang-thai?action=unactive&id=' . $item['id'] . '">Từ chối</a></li>
                                    </ul>
                                    </div>';
                                    break;
                                case 1:
                                    echo '<div class="dropdown">
                                    <button data-bs-toggle="dropdown" aria-expanded="false" type="button" class="btn btn-sm rounded-5 border-0 px-3" style="background-color: rgb(211, 247, 158);">
                                    Đã duyệt
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="' . _WEB_ROOT . '/ntd/quan-ly-ung-vien/ho-so-ung-tuyen/trang-thai?action=inactive&id=' . $item['id'] . '">Chờ duyệt</a></li>
                                        <li><a class="dropdown-item" href="' . _WEB_ROOT . '/ntd/quan-ly-ung-vien/ho-so-ung-tuyen/trang-thai?action=unactive&id=' . $item['id'] . '">Từ chối</a></li>
                                    </ul>
                                    </div>';
                                    break;
                                case 2:
                                    echo '<div class="dropdown">
                                    <button data-bs-toggle="dropdown" aria-expanded="false" type="button" class="btn btn-sm rounded-5 border-0 px-3" style="background-color: rgb(255, 183, 183);">
                                    Bị loại 
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="' . _WEB_ROOT . '/ntd/quan-ly-ung-vien/ho-so-ung-tuyen/trang-thai?action=active&id=' . $item['id'] . '">Duyệt</a></li>
                                        <li><a class="dropdown-item" href="' . _WEB_ROOT . '/ntd/quan-ly-ung-vien/ho-so-ung-tuyen/trang-thai?action=inactive&id=' . $item['id'] . '">Chờ duyệt</a></li>
                                    </ul>
                                    </div>';
                                    break;
                            endswitch;
                        ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo _WEB_ROOT; ?>/ntd/quan-ly-ung-vien/ho-so-ung-tuyen/gui-email?id=<?php echo $item['id']; ?>"
                                class="btn btn-sm btn-primary text-white">Gửi email</a>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="7" class="text-center pt-5">
                            <svg width="104" height="84" viewBox="0 0 104 84" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_4557_26846)">
                                    <path
                                        d="M81.6563 65.3867C81.6356 65.3454 81.6011 65.3247 81.5529 65.3109C81.5115 65.2971 81.4633 65.304 81.4288 65.3316L80.8775 65.6555L80.5536 65.1042C80.5329 65.0628 80.4985 65.0422 80.4502 65.0284C80.4089 65.0146 80.3606 65.0215 80.3262 65.0491C80.2848 65.0697 80.2642 65.1042 80.2504 65.1524C80.2366 65.1938 80.2435 65.242 80.2711 65.2765L80.595 65.8278L80.0436 66.1517C80.0023 66.1724 79.9816 66.2068 79.9678 66.2551C79.954 66.3033 79.9609 66.3447 79.9885 66.3791C80.0092 66.4205 80.0436 66.4411 80.0919 66.4549C80.1332 66.4687 80.1815 66.4618 80.2159 66.4342L80.7672 66.1103L81.0911 66.6617C81.1256 66.7237 81.2014 66.7512 81.2634 66.7375C81.2841 66.7306 81.2979 66.7306 81.3186 66.7168C81.3944 66.6685 81.4219 66.5721 81.3737 66.4894L81.0498 65.9381L81.6011 65.6142C81.6769 65.5659 81.7045 65.4625 81.6563 65.3867Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M83.0478 69.018C82.6481 69.018 82.3242 68.6941 82.3242 68.2944C82.3242 67.8947 82.6481 67.5708 83.0478 67.5708C83.4475 67.5708 83.7714 67.8947 83.7714 68.2944C83.7645 68.6941 83.4406 69.018 83.0478 69.018ZM83.0478 67.9636C82.8617 67.9636 82.7101 68.1152 82.7101 68.3013C82.7101 68.4874 82.8617 68.639 83.0478 68.639C83.2339 68.639 83.3855 68.4874 83.3855 68.3013C83.3855 68.1152 83.2339 67.9636 83.0478 67.9636Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M24.2627 78.1083C23.863 78.1083 23.5391 77.7844 23.5391 77.3847C23.5391 76.985 23.863 76.6611 24.2627 76.6611C24.6624 76.6611 24.9863 76.985 24.9863 77.3847C24.9863 77.7844 24.6624 78.1083 24.2627 78.1083ZM24.2627 77.0539C24.0766 77.0539 23.925 77.2056 23.925 77.3916C23.925 77.5777 24.0766 77.7293 24.2627 77.7293C24.4487 77.7293 24.6003 77.5777 24.6003 77.3916C24.6003 77.2056 24.4487 77.0539 24.2627 77.0539Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M76.5556 10.1967C76.1559 10.1967 75.832 9.87282 75.832 9.47311C75.832 9.07341 76.1559 8.74951 76.5556 8.74951C76.9553 8.74951 77.2793 9.07341 77.2793 9.47311C77.2724 9.87282 76.9485 10.1967 76.5556 10.1967ZM76.5556 9.13543C76.3696 9.13543 76.218 9.28705 76.218 9.47311C76.218 9.65918 76.3696 9.8108 76.5556 9.8108C76.7417 9.8108 76.8933 9.65918 76.8933 9.47311C76.8933 9.28705 76.7417 9.13543 76.5556 9.13543Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M88.8912 28.4457C88.8498 28.4664 88.8222 28.5009 88.8085 28.5422C88.7947 28.5836 88.7947 28.6318 88.8154 28.6663L89.0979 29.2383L88.5259 29.5208C88.4845 29.5415 88.457 29.576 88.4432 29.6173C88.4294 29.6586 88.4294 29.7069 88.4501 29.7413C88.4708 29.7827 88.5052 29.8103 88.5466 29.824C88.5879 29.8378 88.6362 29.8378 88.6706 29.8172L89.2426 29.5346L89.5252 30.1066C89.5459 30.1479 89.5803 30.1755 89.6217 30.1893C89.663 30.2031 89.7113 30.2031 89.7457 30.1824C89.7871 30.1617 89.8147 30.1273 89.8284 30.0859C89.8422 30.0446 89.8422 29.9963 89.8215 29.9619L89.539 29.3899L90.111 29.1073C90.173 29.0729 90.2075 29.004 90.2006 28.9419C90.2006 28.9213 90.1937 28.9075 90.1868 28.8868C90.1455 28.8041 90.049 28.7696 89.9663 28.811L89.3943 29.0935L89.1117 28.5216C89.0703 28.4389 88.9739 28.4044 88.8912 28.4457Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M78.4736 42.1606C78.0739 42.1606 77.75 41.8367 77.75 41.437C77.75 41.0373 78.0739 40.7134 78.4736 40.7134C78.8733 40.7134 79.1972 41.0373 79.1972 41.437C79.1972 41.8367 78.8733 42.1606 78.4736 42.1606ZM78.4736 41.1062C78.2875 41.1062 78.1359 41.2578 78.1359 41.4439C78.1359 41.63 78.2875 41.7816 78.4736 41.7816C78.6597 41.7816 78.8113 41.63 78.8113 41.4439C78.8113 41.2578 78.6597 41.1062 78.4736 41.1062Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M14.0965 42.6255C14.062 42.6531 14.0482 42.6944 14.0413 42.7427C14.0413 42.784 14.0551 42.8323 14.0827 42.8598L14.5169 43.3216L14.0551 43.7557C14.0207 43.7833 14.0069 43.8247 14 43.8729C14 43.9143 14.0138 43.9625 14.0413 43.9901C14.0689 44.0245 14.1103 44.0383 14.1585 44.0452C14.1999 44.0452 14.2481 44.0314 14.2757 44.0038L14.7374 43.5697L15.1715 44.0314C15.1991 44.0659 15.2405 44.0796 15.2887 44.0865C15.3369 44.0934 15.3783 44.0728 15.4059 44.0452C15.4403 44.0176 15.4541 43.9763 15.461 43.928C15.461 43.8867 15.4472 43.8384 15.4196 43.8109L14.9855 43.3491L15.4472 42.915C15.5023 42.8667 15.5161 42.7909 15.4886 42.7289C15.4817 42.7151 15.4679 42.6944 15.461 42.6807C15.399 42.6117 15.2956 42.6117 15.2267 42.6738L14.765 43.101L14.3308 42.6393C14.2688 42.5704 14.1585 42.5635 14.0965 42.6255Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M21.1963 50.5497C20.7966 50.5497 20.4727 50.2258 20.4727 49.8261C20.4727 49.4264 20.7966 49.1025 21.1963 49.1025C21.596 49.1025 21.9199 49.4264 21.9199 49.8261C21.9199 50.2258 21.596 50.5497 21.1963 50.5497ZM21.1963 49.4954C21.0102 49.4954 20.8586 49.647 20.8586 49.833C20.8586 50.0191 21.0102 50.1707 21.1963 50.1707C21.3823 50.1707 21.5339 50.0191 21.5339 49.833C21.5339 49.647 21.3823 49.4954 21.1963 49.4954Z"
                                        fill="#C8C8C8"></path>
                                    <path
                                        d="M75.2191 18.236V68.6884H75.0882L71.2703 64.9739L67.4455 68.6884H67.0527L63.228 64.9739L59.4101 68.6884H59.0173L55.2063 64.9808L51.3884 68.6884H51.0025L47.1846 64.9808L43.3668 68.6884H42.9602L39.1423 64.9808L35.3244 68.6884H34.9316L31.1206 64.9877L27.3097 68.6884H27.0547V4.21191H61.2019L75.2191 18.236Z"
                                        fill="#E2E2E2"></path>
                                    <path d="M75.2204 18.236H61.2031V4.21191L75.2204 18.236Z" fill="#B7B7B7"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M42.203 63.1204C42.2788 63.5407 42.3201 63.968 42.3408 64.4022C42.3431 64.4504 42.3446 64.4986 42.3462 64.5469C42.3492 64.6434 42.3523 64.7398 42.3615 64.8363C42.3615 65.8149 42.2236 66.7659 41.9618 67.6687C41.6379 68.7989 41.121 69.8464 40.4594 70.7767C40.4557 70.782 40.4519 70.7873 40.4482 70.7925L48.059 78.4029C48.5372 78.8811 48.5372 79.6581 48.054 80.1413C47.5758 80.6194 46.7987 80.6194 46.3155 80.1413L38.8634 72.6847L38.7873 72.6085C38.5521 72.8104 38.3076 73.0017 38.0543 73.1818C36.3728 74.3809 34.326 75.0838 32.107 75.0838C30.1153 75.0838 28.2615 74.5187 26.6903 73.5402C26.4629 73.4023 26.2423 73.2507 26.0287 73.0922C24.7055 72.1205 23.6305 70.8387 22.9 69.3571C22.3969 68.3234 22.0523 67.1932 21.9214 66.001C21.88 65.6219 21.8594 65.236 21.8594 64.8432C21.8594 59.1854 26.4491 54.5957 32.107 54.5957C34.6775 54.5957 37.0275 55.5467 38.8262 57.1111C40.5697 58.6341 41.7964 60.7359 42.203 63.1204ZM27.1727 71.6657C28.5579 72.6718 30.267 73.2645 32.107 73.2645C32.8719 73.2645 33.6093 73.1611 34.3122 72.9682C34.9049 72.8097 35.4769 72.5891 36.0075 72.3066C36.2556 72.1757 36.4968 72.0309 36.7311 71.8793C37.6891 71.2453 38.5091 70.4252 39.1363 69.4742C39.6256 68.73 40.0046 67.903 40.2389 67.0209C40.3905 66.442 40.487 65.8425 40.5146 65.2222C40.5214 65.0913 40.5214 64.9673 40.5214 64.8364V64.8363C40.5214 62.321 39.4257 60.0675 37.6822 58.5238C36.4555 57.4419 34.9118 56.7045 33.2027 56.4839C32.8444 56.4357 32.4791 56.415 32.107 56.415C31.0801 56.415 30.0878 56.6011 29.1781 56.9388C26.3113 58.0001 24.1818 60.5843 23.7614 63.7061C23.7132 64.0783 23.6856 64.4504 23.6856 64.8363C23.6856 65.8562 23.8648 66.8348 24.1956 67.7376C24.7814 69.3295 25.8289 70.694 27.1727 71.6657Z"
                                        fill="#CCCCCC"></path>
                                    <path
                                        d="M25.727 65.7673C25.2929 65.7673 24.9414 65.4159 24.9414 64.9817C24.9414 63.0314 25.6995 61.1983 27.0777 59.8131C28.456 58.4348 30.2892 57.6768 32.2463 57.6768C32.6805 57.6768 33.0319 58.0282 33.0319 58.4624C33.0319 58.8965 32.6805 59.248 32.2463 59.248C30.7164 59.248 29.2761 59.8476 28.1942 60.9295C27.1122 62.0115 26.5127 63.4518 26.5127 64.9817C26.5127 65.4159 26.1612 65.7673 25.727 65.7673Z"
                                        fill="#E2E2E2"></path>
                                    <rect x="36.168" y="28" width="28" height="2.91667" fill="#CCCCCC"></rect>
                                    <rect x="36.168" y="34.4165" width="28" height="2.91667" fill="#CCCCCC"></rect>
                                    <rect x="36.168" y="40.8335" width="28" height="2.91667" fill="#CCCCCC"></rect>
                                </g>
                                <defs>
                                    <clipPath id="clip0_4557_26846">
                                        <rect width="103.71" height="84" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            <p class="mt-1 p-0 fs-6 fw-normal text-secondary">Chưa có ứng viên ứng tuyển</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</aside>