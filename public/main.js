var sliderImage = Array.from(document.querySelectorAll('.slider-container img'));
console.table(sliderImage);
var sliderCount = sliderImage.length;
console.log(sliderCount);

var currentSlide = 1;

var slideNumberElement = document.getElementById('slide-number');

var nextButton = document.getElementById('next');

var prevtButton = document.getElementById('prev');

let sse = [1, 2, 3, 'four', true];

console.log(sse.length);

// console.log("Version of V8 Engine:", window.v8);
console.log(typeof Array.from === 'function');
console.log(typeof Array.length === 'function');
console.log(typeof createElement === 'function');
console.log(typeof on === 'function');


// إنشاء عنصر div جديد
// var newDiv = document.createElement('div');

// // تعيين نص للعنصر
// newDiv.innerText = 'Hello, I am a new div!';

// // إضافة العنصر إلى الوثيقة (DOM)
// document.body.appendChild(newDiv);


// nextButton.onclick = nextSlide;

// prevButton.onclick = nextSlide;




// nextButton.onclick = nextSlide;
// prevtButton.onclick = ProvtSlide;

var paginationElement = document.createElement('ul');
//

paginationElement.setAttribute('id', 'pagination-ul');


for (var i = 1; i <= sliderCount; i++) {

    var paginationItem = document.createElement('li');

    paginationItem.setAttribute('data-index', i);

    paginationItem.appendChild(document.createTextNode(i));

    paginationElement.appendChild(paginationItem);

    document.getElementById('indicators').appendChild(paginationElement);



};
var paginationcCreatedUl = document.getElementById('pagination-ul');
var paginationBullets = Array.from(document.querySelectorAll('#pagination-ul li'));


function nextSlide() {
    console.log("Next");



    if (nextButton.classList.contains('disabled')) {

        return new Error('تم إيقاف التنفيذ بواسطة throw');
    } else {
        currentSlide++;
        thechecker();

    }

}

function ProvtSlide() {
    console.log("prev");


    if (prevtButton.classList.contains('disabled')) {
        return false;
    } else {
        currentSlide--;
        thechecker();
    }
}




function thechecker() {
    slideNumberElement.textContent = ' Slide # ' + (currentSlide) + ' of ' + (sliderImage.length);
    removeAllActive();
    sliderImage[currentSlide - 1].classList.add('active');

    paginationcCreatedUl.children[currentSlide - 1].classList.add('active');

    paginationcCreatedUl.children[currentSlide - 1].classList.add('active');
    if (currentSlide == 1) {
        prevtButton.classList.add('disabled');
    } else {
        prevtButton.classList.remove('disabled');

    }
    if (currentSlide == sliderCount) {
        nextButton.classList.add('disabled');
    } else {
        nextButton.classList.remove('disabled');

    }
}

function cli() {



}


function removeAllActive() {
    sliderImage.forEach(function(img) {
        img.classList.remove('active');
    });
    paginationBullets.forEach(function(bullets) {

        bullets.classList.remove('active');
    })
}
document.querySelector("h2").style.color = "red";
document.querySelector("h2").style.textAlign = "center";