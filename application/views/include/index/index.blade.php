<?= $widget->index_slider() ?>
<?= $widget->index_eat() ?>
<section class="bg-image-5" style="padding:200px;">
</section>
<?= $widget->index_cook() ?>
<section>
    <div id="map"></div>
    <script>
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: new google.maps.LatLng(13.109038, 109.297326),
                zoom: 14
            });

            setMarkers(map, [
                ["Simba", 13.109038, 109.297326]
            ]);
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkAZ0DefFFh1083avX5XSAu0AwzNyQ4tI&callback=initMap" async defer></script>

</section>