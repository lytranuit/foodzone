<section>
    <div class="carousel slide" id="introCarousel">
        <ol class="carousel-indicators">
        </ol>
        <div class="carousel-inner" role="listbox" >
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="carousel-item <?= $i == 1 ? "active" : "" ?>">
                    <div class="carousel-background">
                        <img alt="" src="{{base_url()}}public/image/slider/{{$i}}.jpg" width="100%"/>
                    </div>
                    <div class="carousel-container" >

                    </div>
                </div>
            <?php endfor ?>
        </div>
    </div>
</section>
<section class="section-50 section-sm-top-80 section-sm-bottom-100 bg-gray-lighter text-center">
    <h3>Ready to Eat</h3>
    <div class="responsive-tabs responsive-tabs-button responsive-tabs-horizontal responsive-tabs-carousel offset-top-40">
        <ul class="resp-tabs-list">
            <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Burgers</li>
            <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">Toasts</li>
        </ul>
        <div class="resp-tabs-container text-left">
            <!--hamburger-->
            <div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0">
                <!-- Slick Carousel-->
                <div class="slick-tab-centered slick-slider" data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="2" data-md-items="3" data-lg-items="3" data-xl-items="5" data-center-mode="true" data-center-padding="10">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div class="item">
                            <div class="thumbnail-menu-modern">
                                <figure><img class="img-responsive" src="{{base_url()}}public/image/{{$i}}.png" alt="">
                                </figure>
                                <div class="caption">
                                    <h5><a class="link link-default" href="menu-single.html" tabindex="-1">Mexican Burger</a></h5>
                                    <p class="text-italic">This Mexican-style burger is pumped up with flavor from chili powder, cilantro, and jalapeno pepper.  Served on buns topped with lettuce.</p>
                                    <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html" tabindex="-1">Order Online</a>
                                </div>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>
            <!--Toasts-->
            <div class="resp-tab-content" aria-labelledby="tab_item-1">
                <!-- Slick Carousel-->
                <div class="slick-tab-centered slick-slider" data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="2" data-md-items="3" data-lg-items="3" data-xl-items="5" data-center-mode="true" data-center-padding="10">
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <div class="item">
                            <div class="thumbnail-menu-modern">
                                <figure><img class="img-responsive" src="{{base_url()}}public/image/{{$i}}.png" alt="">
                                </figure>
                                <div class="caption">
                                    <h5><a class="link link-default" href="menu-single.html" tabindex="-1">Mexican Burger</a></h5>
                                    <p class="text-italic">This Mexican-style burger is pumped up with flavor from chili powder, cilantro, and jalapeno pepper.  Served on buns topped with lettuce.</p>
                                    <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html" tabindex="-1">Order Online</a>
                                </div>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="bg-image-5" style="padding:200px;">

</section>
<section class="section-50 section-sm-top-80 section-sm-bottom-100 bg-gray-lighter text-center">
    <h3>Ready to Cook</h3>
    <div class="responsive-tabs responsive-tabs-button responsive-tabs-horizontal responsive-tabs-carousel offset-top-40">
        <ul class="resp-tabs-list">
            <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Burgers</li>
            <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">Toasts</li>
        </ul>
        <div class="resp-tabs-container text-left">
            <!--hamburger-->
            <div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0">
                <!-- Slick Carousel-->
                <div class="slick-tab-centered slick-slider" data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="2" data-md-items="3" data-lg-items="3" data-xl-items="5" data-center-mode="true" data-center-padding="10">
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <div class="item">
                            <div class="thumbnail-menu-modern">
                                <figure><img class="img-responsive" src="{{base_url()}}public/image/{{$i}}.png" alt="">
                                </figure>
                                <div class="caption">
                                    <h5><a class="link link-default" href="menu-single.html" tabindex="-1">Mexican Burger</a></h5>
                                    <p class="text-italic">This Mexican-style burger is pumped up with flavor from chili powder, cilantro, and jalapeno pepper.  Served on buns topped with lettuce.</p>
                                    <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html" tabindex="-1">Order Online</a>
                                </div>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>
            <!--Toasts-->
            <div class="resp-tab-content" aria-labelledby="tab_item-1">
                <!-- Slick Carousel-->
                <div class="slick-tab-centered slick-slider" data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="2" data-md-items="3" data-lg-items="3" data-xl-items="5" data-center-mode="true" data-center-padding="10">
                    <?php for ($i = 1; $i <= 7; $i++): ?>
                        <div class="item">
                            <div class="thumbnail-menu-modern">
                                <figure><img class="img-responsive" src="{{base_url()}}public/image/{{$i}}.png" alt="">
                                </figure>
                                <div class="caption">
                                    <h5><a class="link link-default" href="menu-single.html" tabindex="-1">Mexican Burger</a></h5>
                                    <p class="text-italic">This Mexican-style burger is pumped up with flavor from chili powder, cilantro, and jalapeno pepper.  Served on buns topped with lettuce.</p>
                                    <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html" tabindex="-1">Order Online</a>
                                </div>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
            </div>

        </div>
    </div>
</section>

<section>
    <div id="map"></div>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(13.109038, 109.297326),
                zoom: 14
            });

            setMarkers(map, [["Simba", 13.109038, 109.297326]]);
        }
        /*show map*/
        /*var positions = [
         ['Sườn Cây Hồ Biểu Chánh',  10.749744, 106.699453, 15],
         ['Sườn Cây Cộng Hòa',  10.704714, 106.733620, 2],
         ['Sườn Cây Phan Đăng Lưu',  10.738458, 106.713445, 3],
         ['Sườn Cây Kinh Dương Vương',  10.737704, 106.727647, 4],
         ['Sườn Cây Quang Trung',  10.730004, 106.700103, 5],
         ['Sườn Cây Vũng Tàu',  10.738871, 106.719464, 6],
         ];
         */
        function setMarkers(map, locations) {
            var image = {
                url: path + "public/image/icon_googlemarker.png",
                size: new google.maps.Size(100, 73),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(0, 32)
            };
            var shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: 'poly'
            };
            for (var i = 0; i < locations.length; i++) {
                var loc = locations[i];
                var myLatLng = new google.maps.LatLng(loc[1], loc[2]);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    icon: image,
                    shape: shape,
                    title: loc[0],
                    infoWindowText: loc[0],
                    zIndex: 12
                });
            }
        }

        function showpostion(pos) {
            var positions = [pos];
            var mapOptions = {
                zoom: 17,
                center: new google.maps.LatLng(pos[1], pos[2])
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            setMarkers(map, positions);
        }
    </script>
    <style>
        #map {
            height: 400px
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkAZ0DefFFh1083avX5XSAu0AwzNyQ4tI&callback=initMap"
    async defer></script>

</section>