<form action="" method="post" class="mt-3">
    <div class="form-group">
        <label for="email">Email</label>
        <div class="input-group mb-4 w-100">
            <span class="input-group-text p-0 border border-end-0"><i class="bi bi-envelope p-2 px-3 text-primary"></i></span>
            <input type="email" class="form-control border-start-0" name="email" placeholder="Địa chỉ email">
        </div>
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <div class="input-group mb-2 w-100">
            <span class="input-group-text p-0 border border-end-0"><i class="bi bi-shield-lock p-2 px-3 text-primary"></i></span>
            <input type="password" class="form-control border-start-0" name="password" placeholder="Nhập mật khẩu">
        </div>
    </div>
    <div class="form-group text-end">
        <a href="<?php echo _WEB_ROOT; ?>/forgot">Quên mật khẩu</a>
    </div>
    <button type="submit" class="btn btn-primary btn-lg w-100 mt-2">Đăng nhập</button>
    <p class="m-0 text-center fs-6 mt-3">Hoặc đăng nhập bằng</p>
    <a href="#" class="link-block btn border border-2 rounded-5 w-100 mt-4"><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <path d="m17.007 0h-16.014a.993.993 0 0 0 -.993.993v16.014a.993.993 0 0 0 .993.993h8.628v-6.961h-2.343v-2.725h2.343v-2a3.274 3.274 0 0 1 3.494-3.591 19.925 19.925 0 0 1 2.092.106v2.43h-1.428c-1.13 0-1.35.534-1.35 1.322v1.73h2.7l-.351 2.725h-2.364v6.964h4.593a.993.993 0 0 0 .993-.993v-16.014a.993.993 0 0 0 -.993-.993z" fill="#4267b2" />
            <path d="m28.586 24.041v-6.961h2.349l.351-2.725h-2.7v-1.734c0-.788.22-1.322 1.35-1.322h1.443v-2.434a19.924 19.924 0 0 0 -2.095-.106 3.27 3.27 0 0 0 -3.491 3.591v2h-2.343v2.73h2.343v6.961z" fill="#fff" transform="translate(-16.172 -6.041)" />
        </svg> Tiếp tục với Facebook</a>
    <a href="#" class="link-block btn border border-2 rounded-5 w-100 mt-4"><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
            <g transform="">
                <g fill-rule="evenodd">
                    <path d="m17.64 9.2a10.341 10.341 0 0 0 -.164-1.841h-8.476v3.481h4.844a4.14 4.14 0 0 1 -1.8 2.716v2.264h2.909a8.777 8.777 0 0 0 2.687-6.62z" fill="#4285f4" />
                    <path d="m9 18a8.592 8.592 0 0 0 5.956-2.18l-2.909-2.258a5.43 5.43 0 0 1 -8.083-2.852h-3.007v2.332a9 9 0 0 0 8.043 4.958z" fill="#34a853" />
                    <path d="m3.964 10.71a5.321 5.321 0 0 1 0-3.42v-2.332h-3.007a9.011 9.011 0 0 0 0 8.084z" fill="#fbbc05" />
                    <path d="m9 3.58a4.862 4.862 0 0 1 3.44 1.346l2.581-2.581a8.649 8.649 0 0 0 -6.021-2.345 9 9 0 0 0 -8.043 4.958l3.007 2.332a5.364 5.364 0 0 1 5.036-3.71z" fill="#ea4335" />
                </g>
                <path d="m0 0h18v18h-18z" fill="none" />
            </g>
        </svg> Tiếp tục với Google</a>
    <a href="#" class="link-block btn border border-2 rounded-5 w-100 mt-4"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 0C4.476 0 0 4.477 0 10c0 4.418 2.865 8.166 6.84 9.49.5.09.68-.218.68-.483 0-.237-.007-.866-.012-1.7-2.782.603-3.37-1.34-3.37-1.34-.454-1.157-1.11-1.464-1.11-1.464-.907-.62.07-.608.07-.608 1.003.07 1.53 1.03 1.53 1.03.893 1.53 2.342 1.087 2.912.83.09-.645.35-1.085.634-1.335-2.22-.253-4.555-1.11-4.555-4.943 0-1.09.39-1.984 1.03-2.683-.105-.253-.448-1.27.096-2.647 0 0 .84-.268 2.75 1.026A9.555 9.555 0 0110 4.836a9.59 9.59 0 012.504.337c1.91-1.294 2.747-1.026 2.747-1.026.548 1.377.204 2.394.1 2.647.64.7 1.03 1.592 1.03 2.683 0 3.842-2.34 4.687-4.566 4.935.36.308.678.92.678 1.852 0 1.336-.01 2.415-.01 2.743 0 .267.18.578.687.48A10 10 0 0020 10c0-5.522-4.478-10-10-10" fill="#191717" fill-rule="evenodd"></path>
        </svg> Tiếp tục với Github</a>
    <p class="text-center mt-3 text-dark">Bạn chưa có tài khoản? <a href="<?php echo _WEB_ROOT; ?>/dang-ky">Đăng ký
            ngay</a></p>
</form>