<?php

if (isset($_SESSION['cis-admin-islogin'])) {
    header('location:' . URL . 'admin');
}

// if (!isset($_SESSION['cis-admin-exist'])) {
//     header('location:' . URL . 'wizard');
// }

if (isset($_SESSION['cis-patient-islogin'])) {
    header('location:' . URL . 'patient');
}


?>

<section>
    <div id="jssor_1" class="slider ">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin slider-loader">
            <img style="margin-top:-19px;position:relative;top:40%;width:38px;height:38px;" src="<?= URL ?>public/img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1600px;height:560px;overflow:hidden;">
            <div class="d-none" style="background-color:#000000;">
                <img class="image-carousel" data-u="image" style="opacity:0.8;" data-src="<?= URL ?>public/img/slider/clinic.jpg" />

                <div data-ts="flat" data-p="320" style="left:144px;top:80px;width:550px;height:90px;position:absolute;overflow:hidden;">
                    <div data-to="50% 50%" data-ts="preserve-3d" data-t="0" style="left:550px;top:0px;width:550px;height:90px;position:absolute;overflow:hidden;">
                        <div data-to="50% 50%" data-ts="preserve-3d" data-arr="1" style="left:20px;top:18px;width:200px;height:20px;position:absolute;color:#edf1f2;font-size:16px;font-weight:700;line-height:1.2;letter-spacing:0.1em;">Fast and furious</div>
                        <div data-to="50% 50%" data-ts="preserve-3d" data-arr="2" style="left:19px;top:36px;width:600px;height:30px;position:absolute;color:#edf1f2;font-size:24px;line-height:1.2;letter-spacing:0.05em;"><span style="font-weight:900;color:#e04338;">DON'T JUST</span> CHASE YOUR DREAMS...</div>
                    </div>
                </div>
            </div>


            <div style="background-color:#000000;">
                <img class="image-carousel" data-u="image" style="opacity:0.7;" src="<?= URL ?>public/img/slider/clinic.jpg" />
                <div data-ts="flat" data-p="1800" data-po="50% -100%" style="left:120px;top:90px;width:600px;height:300px;position:absolute;">
                    <svg viewbox="0 0 200 200" width="200" height="200" data-t="10" style="left:206px;top:101px;display:block;position:absolute;opacity:0.6;overflow:visible;">
                        <path stroke-dasharray="0,700" fill="none" stroke="#ffffff" d="M0,100C0,44.77152 44.77152,0 100,0C155.22848,0 200,44.77152 200,100C200,155.22848 155.22848,200 100,200C44.77152,200 0,155.22848 0,100Z" data-t="9"></path>
                    </svg>
                    <svg viewbox="0 0 80 80" width="80" height="80" data-t="12" style="left:300px;top:264px;display:block;position:absolute;opacity:0.6;overflow:visible;">
                        <path stroke-dasharray="0,400" fill="none" stroke="#ffffff" shape-rendering="crispEdges" d="M80,80L0,80L0,0L80,0Z" data-t="11"></path>
                    </svg>
                    <svg viewbox="0 0 500 200" data-to="50% 50%" width="500" height="200" data-t="13" style="left:50px;top:50px;display:block;position:absolute;opacity:0;overflow:visible;">
                        <g>
                            <text fill="#006658" x="450" y="60" class="frame frame-1">CSUCC
                            </text>
                            <text fill="#006658" x="105" y="120" class=" frame frame-2">CLINIC INFORMATION SYSTEM
                            </text>
                            <text fill="#F8CD1E" x="300" y="150" style="position:absolute;font-family:Montserrat,sans-serif;font-size:16px;font-weight:900;letter-spacing:0.1em;overflow:visible;">CABADBARAN CITY,
                            </text>
                            <text fill="#F8CD1E" x="520" y="150" style="position:absolute;opacity:0.8;font-family:Montserrat,sans-serif;font-size:16px;font-weight:900;letter-spacing:0.1em;overflow:visible;">AGUSAN DEL NORTE
                            </text>
                        </g>
                    </svg>
                </div>
            </div>


        </div><a data-scale="0" href="https://www.jssor.com" style="display:none;position:absolute;">slider html</a>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb132 d-none" style="position:absolute;bottom:24px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:12px;height:12px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051 " style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>

    <div class="page-header">
        <div class="container-flud">

        </div>
    </div>
</section>