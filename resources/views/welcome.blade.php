{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SC</title>

    </head>
    <body >
        <h1 style="color: cyan"> Welcome back from laravel</h1>
        <h2>...............</h2>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Js Slider</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="main.js"></script> -->

</head>

<body>
    <h1 style="color: cyan"> Welcome back from laravel and kamel al-fwdeey</h1>
<h2>Welcome to from laravel </h2>
    <div class="slider-container">
        <div id="slide-number" class="slide-number"></div>
        <img src="image/p1.jpg" alt="">
        <img src="image/p2.jpg" alt="">
        <img src="image/p3.jpg" alt="">
        <img src="image/p4.jpg" alt="">
        <img src="image/p5.jpg" alt="">
    </div>
    <div class="slider-controls">
        <span id="prev" class="prev" onclick="ProvtSlide()">Previous</span>

        <span id="indicators" class="indicators" onclick="cli()">

        </span>
        <span id="next" class="next" onclick="nextSlide()">Next</span>

    </div>
    <style>
        * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    /* background-color: aqua; */
}

.slider-container {
    margin: 30px auto;
    width: 800;
    height: 250px;
    position: relative;
    justify-content: center;
    border: #333;
}

.slider-container img {
    position: absolute;
    opacity: 0;
    margin: 5px;
    border-radius: 7px;
    border: #333;
    /* transform:translateY(-100%)  ; */
    transition: opacity 1s;
    z-index: 1;
}

.slider-container img.active {
    opacity: 1;
}

.slider-container .slide-number {
    position: absolute;
    left: 10px;
    top: 10px;
    background-color: rgb(0 0 0 0.6);
    clear: #fff;
    padding: 5px 10px;
    font-size: 20px;
    z-index: 2;
    border-radius: 6px;
}

.slider-controls {
    width: 800px;
    margin: auto;
    overflow: hidden;
}

.slider-controls .prev,
.slider-controls .next {
    background-color: #009688;
    color: #fff;
    font-size: 16px;
    width: 80px;
    text-align: center;
    cursor: pointer;
    border-radius: 6px;
    border-bottom: #333;
    padding: 5px;
    user-select: none;
    width: 60px;
}

.slider-controls .prev {
    float: left;
    /* width: 70px;  */
}

.slider-controls .prev:hover {
    background: rgb(141, 54, 190);
}

.slider-controls .next:hover {
    background: rgb(141, 54, 190);
}

.slider-controls .next {
    float: right;
}

.slider-controls .prev.disabled,
.slider-controls .next.disabled {
    background-color: rgb(0, 150, 136, 0.5);
    cursor: no-drop;
}

.slider-controls .indicators {
    width: 60px;
    float: left;
}

.slider-controls .indicators ul {
    list-style: none;
    margin: 0;
    text-align: center;
}

.slider-controls .indicators ul li {
    display: inline-block;
    background-color: #f6f6f6;
    color: #333;
    font-weight: bold;
    height: 28px;
    width: 28px;
    border-radius: 4px;
    margin: 0 2px;
    line-height: 28px;
    cursor: pointer;
}

.slider-controls .indicators ul li.active {
    background-color: #009688;
    color: #f6f6f6;
}

    </style>
</body>
<script>
    // document.getElementById("demo").innerHTML = "Hello JavaScript";

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
</script>

{{-- <script src="main.js"></script> --}}
</html>

</html>
