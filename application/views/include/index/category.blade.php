<section class="section-50 section-sm-100">
    <div class="container isotope-wrap">
        <div class="row justify-content-sm-center">
            <div class="col-12">
                <div class="col-box text-center">
                    <ul class="isotope-filters-responsive">
                        <li>
                            <p>Choose your category:</p>
                        </li>
                        <li class="block-top-level">
                            <!-- Isotope Filters-->
                            <button class="isotope-filters-toggle btn btn-primary-lighter btn-shape-circle" data-custom-toggle="#isotope-1" data-custom-toggle-disable-on-blur="true">Filter<span class="caret"></span></button>
                            <div class="isotope-filters isotope-filters-buttons" id="isotope-1">
                                <ul class="inline-list">
                                    <li><a class="btn-shape-circle btn active" data-isotope-filter="Category 1" data-isotope-group="gallery" href="#">Burgers</a></li>
                                    <li><a class="btn-shape-circle btn" data-isotope-filter="Category 2" data-isotope-group="gallery" href="#">TOASTS</a></li>
                                    <li><a class="btn-shape-circle btn" data-isotope-filter="Category 3" data-isotope-group="gallery" href="#">Pizzas</a></li>
                                    <li><a class="btn-shape-circle btn" data-isotope-filter="Category 4" data-isotope-group="gallery" href="#">Salads</a></li>
                                    <li><a class="btn-shape-circle btn" data-isotope-filter="Category 5" data-isotope-group="gallery" href="#">Drinks</a></li>
                                    <li><a class="btn-shape-circle btn" data-isotope-filter="Category 6" data-isotope-group="gallery" href="#">desserts</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 offset-top-40">
                <!-- Isotope Content-->
                <div class="row isotope isotope-menu" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 998.4px;">
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 1" style="position: absolute; left: 0px; top: 0px;">
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

                    
                    <!--toasts-->
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 2" style="position: absolute; left: 0px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/toast-1-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Tomato Toast</a></h5>
                                <p class="text-italic">Enjoy this amazing combination of cheese and tomato with a little bit of salad and cucumbers on the freshly baked bread.</p>
                                <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 2" style="position: absolute; left: 399px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/toast-2-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Cheese Toast</a></h5>
                                <p class="text-italic">This toast is one of the most popular in our menu, and it’s no wonder why – it’s as tasty as it’s original and easy to make.</p>
                                <p class="price">10.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 2" style="position: absolute; left: 799px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/toast-3-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Beef Toast</a></h5>
                                <p class="text-italic">Tender, flavorful and perfectly seasoned roast beef, sliced thin, topped with smoked Gouda cheese and served on a baguette.</p>
                                <p class="price">13.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 2" style="position: absolute; left: 0px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/toast-4-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Italian Toast</a></h5>
                                <p class="text-italic">Experience the flavor of true Italian cuisine with this toast, which includes Provolone Cheese, fresh tomatoes, and freshly baked bread.</p>
                                <p class="price">17.97</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 2" style="position: absolute; left: 399px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/toast-5-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Mediterranean Toast</a></h5>
                                <p class="text-italic">Warm, toasty and hearty, this toast will satisfy your appetite with Zippy Hummus, Roasted Red Peppers, and Fried Bacon.</p>
                                <p class="price">25.00</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <!--pizza-->
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 3" style="position: absolute; left: 0px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/pizzas-1-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Hawaiian</a></h5>
                                <p class="text-italic">Fresh pineapple, applewood smoked ham and slivered scallions make this pizza #1 among our youngest visitors.</p>
                                <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 3" style="position: absolute; left: 399px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/pizzas-2-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Sicilian</a></h5>
                                <p class="text-italic">Rustic meets refined in this flavorful pizza with spicy marinara, Italian sausage, spicy Capicola ham, salami, and Mozzarella.</p>
                                <p class="price">10.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 3" style="position: absolute; left: 799px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/pizzas-3-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Classic Cheese</a></h5>
                                <p class="text-italic">Large round pizza from QuickFood topped with 100% Mozzarella and Muenster cheeses, hot out of the oven and ready when you are.</p>
                                <p class="price">13.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 3" style="position: absolute; left: 0px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/pizzas-4-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Margherita</a></h5>
                                <p class="text-italic">The classic that everyone loves. Try our Margherita with Italian tomatoes, fresh Mozzarella, fresh basil and Parmesan.</p>
                                <p class="price">17.97</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 3" style="position: absolute; left: 399px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/pizzas-5-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Neapolitan</a></h5>
                                <p class="text-italic">One of our most popular dishes, this pizza includes fresh tomatoes, cheese, oil, and garlic and is served with numerous toppings.</p>
                                <p class="price">25.00</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <!--salads-->
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 4" style="position: absolute; left: 0px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/salads-1-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Buffalo Bleu</a></h5>
                                <p class="text-italic">Chopped romaine &amp; iceberg blend, all-natural chicken, original buffalo new york spicy sauce, grape tomatoes, and banana peppers.</p>
                                <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 4" style="position: absolute; left: 399px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/salads-2-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Greek Salad</a></h5>
                                <p class="text-italic">Cucumbers, grape tomatoes, red onions, banana peppers, black olives, and feta cheese with balsamic vinaigrette dressing.</p>
                                <p class="price">10.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 4" style="position: absolute; left: 799px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/salads-3-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Turkey Salad</a></h5>
                                <p class="text-italic">Chopped romaine &amp; iceberg blend, radiatorre pasta, roasted turkey, crispy bacon, tomatoes, and buttermilk ranch dressing</p>
                                <p class="price">13.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 4" style="position: absolute; left: 0px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/salads-4-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Mediterranean</a></h5>
                                <p class="text-italic">Spring mix, all-natural chicken, quinoa, black olives, marinated tomatoes, sunflower seeds, feta cheese, and balsamic vinaigrette.</p>
                                <p class="price">17.97</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 4" style="position: absolute; left: 399px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/salads-5-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Farmhouse salad</a></h5>
                                <p class="text-italic">Baby kale, spring mix, roasted turkey, roasted butternut squash, roasted brussels sprouts, glazed pecans, and goat cheese.</p>
                                <p class="price">25.00</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <!--drinks-->
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 5" style="position: absolute; left: 0px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/drinks-1-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Diet Coke</a></h5>
                                <p class="text-italic">Try a crisp and refreshing no-calorie Diet Coke, refreshing classics that compliments any dish of our menu.</p>
                                <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 5" style="position: absolute; left: 399px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/drinks-2-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Blue Moon</a></h5>
                                <p class="text-italic">Blue Moon cocktail is a fun, frozen martini featuring blue curaçao, vanilla syrup, fresh orange juice, and whipped cream.</p>
                                <p class="price">10.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 5" style="position: absolute; left: 799px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/drinks-3-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Sparkling Water</a></h5>
                                <p class="text-italic">A perfect choice for those who want a refreshing drink in hot weather. A wide range of flavors is available!</p>
                                <p class="price">13.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 5" style="position: absolute; left: 0px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/drinks-4-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Red Dawn</a></h5>
                                <p class="text-italic">The Red Dawn- a strong and flavorful cocktail comprised of Southern Comfort, lemon-lime soda &amp; cranberry juice.</p>
                                <p class="price">17.97</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 5" style="position: absolute; left: 399px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/drinks-5-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Pina Colada</a></h5>
                                <p class="text-italic">Our specialty frozen Pina Colada made with Don Q Rum, pineapple juice, and Coco Lopez, topped with toasted coconut.</p>
                                <p class="price">25.00</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <!--deserts-->
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 6" style="position: absolute; left: 0px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/deserts-1-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">French macaroons</a></h5>
                                <p class="text-italic">French macaroons are thin, flavorful meringue cookies that are sandwiched together with some kind of filling.</p>
                                <p class="price">12.50</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 6" style="position: absolute; left: 399px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/deserts-2-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Blueberry muffins</a></h5>
                                <p class="text-italic">Big Blueberry muffins with a crusty sugar topping. The blueberries and the sweet batter are fabulous and taste amazing.</p>
                                <p class="price">10.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 6" style="position: absolute; left: 799px; top: 0px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/deserts-3-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Donuts</a></h5>
                                <p class="text-italic">Homemade and filled with a delightful vanilla cream pudding and topped with sweet white icing, these donuts will delight you.</p>
                                <p class="price">13.90</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 6" style="position: absolute; left: 0px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/deserts-4-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Ice Cream</a></h5>
                                <p class="text-italic">Our premium sweet-cream, classic vanilla ice cream is pure pleasure. Perfect for sundaes, with a slice of cake, or just heavenly when flying solo.</p>
                                <p class="price">17.97</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category 6" style="position: absolute; left: 399px; top: 499px; display: none;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="images/deserts-5-310x260.png" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="menu-single.html">Pancakes</a></h5>
                                <p class="text-italic">Get the deliciousness of this all-American dish—in half the time. Enjoy the unforgettable taste of our pancakes!</p>
                                <p class="price">25.00</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html">Order Online</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>