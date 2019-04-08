<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
#slider {
    width: 720px;
    height: 400px;
    overflow: hidden;
}

#slider .slides {
    display: block;
    width: 6000px;
    height: 400px;
    margin: 0;
    padding: 0;
}

#slider .slide {
    float: left;
    list-style-type: none;
    width: 720px;
    height: 400px;
}

/* helper css, since we don't have images */
.slide1 {background: red;}
.slide2 {background: blue;}
.slide3 {background: green;}
.slide4 {background: purple;}
.slide5 {background: pink;}

</style>
</head>
<body>
<div class="container">
            <div class="header">
                <h1 class="text-muted">jQuery Basic Slider</h1>
            </div>

            <div id="slider">
                <ul class="slides">
                    <li class="slide slide1">slide1</li>
                    <li class="slide slide2">slide2</li>
                    <li class="slide slide3">slide3</li>
                    <li class="slide slide4">slide4</li>
                    <li class="slide slide5">slide5</li>
                    <li class="slide slide1">slide1</li>
                </ul>
            </div>

        </div>
    </body>

    <script>
    //slide configuration
    var width = 720;
    var speed = 1000;
    var pause = 3000;
    var currentSlide = 1;
        //cash DOM 
        var $slider = $('#slider');
        var $sliderContainor = $slider.find('.slides');
        var $slides = $sliderContainor.find('.slide');

        var interval;
        function startSlider() {
        interval = setInterval(function(){
            $sliderContainor.animate('.slides').animate({'margin-left': '-='+width+'px'}, speed, function(){
                currentSlide++;
                if (currentSlide === $slides.length) {
                    currentSlide = 1;
                    $sliderContainor.css('margin-left', 0);
                }

            });
        }, pause);
        }

        function stopSlider() {

            clearInterval(interval);
        }

        $slider.on('mouseenter', stopSlider).on('mouseleave', startSlider);
                // setInterval(function(){
        //     console.log(new Date());
        // }, 1000);

    </script>

    </html>