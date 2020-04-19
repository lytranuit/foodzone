<section class="section-50 section-sm-100">
    <div class="container">
        <div class="row">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="thumbnail-menu-modern">
                        <figure><img class="img-responsive" src="{{base_url()}}public/image/{{$i}}.png" alt="" width="310" height="260">
                        </figure>
                        <div class="caption">
                            <h5><a class="link link-default" href="menu-single.html">Mexican Burger</a></h5>
                            <p class="text-italic">These Mexican-style burger is pumped up with flavor from chili powder, cilantro, and jalapeno pepper. Served on buns topped with lettuce.</p>
                            <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                        </div>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    </div>
</section>