const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)


var thisPage = 1
var limitPage = 6
var listJobItem = $$('.list-job .job-thumb')


function loadJobItem() {
    let beginJobIndex = limitPage * (thisPage - 1)
    let endJobIndex = limitPage * thisPage - 1

    listJobItem.forEach((item, key) => {
        if (key >= beginJobIndex && key <= endJobIndex) {
            item.style.display = 'flex'
        } else {
            item.style.display = 'none'
        }
    })
    listPage()
}

loadJobItem()

function listPage() {
    let count = Math.ceil(listJobItem.length / limitPage)
    $('.list-page').innerHTML = ''
    
    
    if (thisPage != 1) {
        let prev = document.createElement('li')
        prev.innerText = 'Trước'
        prev.setAttribute('onclick', "changePage(" + (thisPage - 1) + ")")
        $('.list-page').appendChild(prev)

    }
    for (let i = 1; i <= count; i++) {
        let newPage = document.createElement('li')
        newPage.innerText = i
        if (i == thisPage) {
            newPage.classList.add('active')
        }
        newPage.setAttribute('onclick', "changePage(" + i + ")")
        $('.list-page').appendChild(newPage)
    }

    if (thisPage != count) {
        let next = document.createElement('li')
        next.innerText = 'Sau'
        next.setAttribute('onclick', "changePage(" + (thisPage + 1) + ")")
        $('.list-page').appendChild(next)

    }
}

function changePage(i) {
    thisPage = i
    loadJobItem()
}

var btnDetails = $$('.btn-details')
var contentPage = $$('.page-content')
var btnModalClose = $('.btn-close-modal')

btnDetails.forEach((btnDetail, index) => {
    btnDetail.onclick = function() {
        contentPage[index].classList.add('open')
        btnModalClose.onclick = function() {
            contentPage[index].classList.remove('open')
        }
    }
    
})


const btnNextIndustries = $('.section-key-industries .direction #next')
const btnPrevIndustries = $('.section-key-industries .direction #prev')

btnNextIndustries.onclick = function() {
    const widthItem = $('.industries .item').offsetWidth;
    $('.industries-block').scrollLeft += widthItem
}


btnPrevIndustries.onclick = function() {
    const widthItem = $('.industries .item').offsetWidth;
    $('.industries-block').scrollLeft -= widthItem
}

