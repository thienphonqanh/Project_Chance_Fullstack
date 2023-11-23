// Chuyển đổi title -> slug
function toSlug(title){
    let slug = title.toLowerCase(); //Chuyển thành chữ thường

    slug = slug.trim(); //Xoá khoảng trắng 2 đầu

    //lọc dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'u');
    slug = slug.replace(/đ/gi, 'd');

    //chuyển dấu cách (khoảng trắng) thành gạch ngang
    slug = slug.replace(/ /gi, '-');

    //Xoá tất cả các ký tự đặc biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');

    return slug;
}


let sourceTitle = document.querySelector('.slug');
let slugRender = document.querySelector('.render-slug');


if (sourceTitle !== null && slugRender !== null) {
    sourceTitle.addEventListener('keyup', (e)=>{

        if (!sessionStorage.getItem('save_slug')) {
            let title = e.target.value;

            if (title !== null) {
                let slug = toSlug(title);

                slugRender.value = slug;
            }
        }

    });

    sourceTitle.addEventListener('change', ()=>{
        sessionStorage.setItem('save_slug', 1);
    });

    slugRender.addEventListener('change', (e)=>{
         let slugValue = e.target.value;
         if (slugValue.trim() == '') {
            sessionStorage.removeItem('save_slug');
            let slug = toSlug(sourceTitle.value);
            e.target.value = slug;
         }
    });

    if (slugRender.value.trim() == ''){
        sessionStorage.removeItem('save_slug');
    }
}



// Xử lý ckeditor với class
let classTextArea = document.querySelectorAll('.editor')

if (classTextArea !== null) {
    classTextArea.forEach((item, index) => {
        item.id = 'editor_' + (index + 1)
        CKEDITOR.replace(item.id);
    }) 
}