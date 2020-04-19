<?= $widget->post_header("Post") ?>

<section class="section-50 section-sm-100">
    <div class="container-wide">
        <div class="row justify-content-xs-center">
            <div class="col-md-9">
                <div class="row">
                    <?php for ($i = 1; $i <= 20; $i++) : ?>
                        <div class="col-md-4 offset-top-30">
                            <article class="post post-modern">
                                <!-- Post media-->
                                <header class="post-media">
                                    <img class="img-responsive img-cover" width="570" height="321" src="{{base_url()}}public/image/{{$i}}.png" alt="">
                                </header>
                                <!-- Post content-->
                                <section class="post-content text-left">
                                    <div class="post-meta pull-sm-right"><span class="text-middle icon-xxs mdi mdi-clock text-accent"></span>
                                        <time class="text-italic text-middle" datetime="2019-01-01">2 days ago</time>
                                    </div>
                                    <ul class="list-inline offset-top-14 offset-sm-top-0">
                                        <li>
                                            <div class="post-tags group-xs"><a class="label-custom label-sm-custom label-rounded-custom label-primary text-normal" href="#">Toasts</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon icon-sm text-gray-light mdi mdi-video"></div>
                                        </li>
                                    </ul>
                                    <!-- Post Title-->
                                    <div class="post-title">
                                        <h6 class="offset-top-25"><a class="link-default" href="{{base_url()}}index/post">The History of Sandwiches</a></h6>
                                    </div>
                                    <!-- Post Body-->
                                    <div class="post-body offset-top-20">
                                        <p>At the very least, everyone has probably heard the name of the fourth Earl of Sandwich (born John Montagu), the British statesman whose name is forever affixed to our favorite lunchtime staple.</p>
                                    </div>
                                </section>
                            </article>
                            
                        </div>
                    <?php endfor ?>
                </div>
            </div>
            <div class="col-md-3 offset-top-60 offset-md-top-0">
                <?= $widget->right() ?>
            </div>
        </div>
    </div>
</section>