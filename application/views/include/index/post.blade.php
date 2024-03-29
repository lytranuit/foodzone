<?= $widget->post_header($post->{pick_language($post, 'title_')}) ?>

<section class="section-50 section-sm-100">
    <div class="container">
        <div class="row justify-content-xs-center">
            <div class="col-md-9">
                <!-- Blog Default Single-->
                <div class="card">
                    <div class="card-body">
                        <article class="post post-classic">
                            <!-- Post media-->
                            <!-- <img class="img-responsive" src="images/post-01-870x412.jpg" alt="" width="870" height="412"> -->
                            <!-- Post content-->
                            <section class="post-content text-left offset-top-25">
                                <h5 class="text-uppercase">{{$post->{pick_language($post,'title_')} }}</h5>
                                <ul class="list-inline list-inline-md offset-top-5">
                                    <li>
                                        <div class="unit unit-horizontal unit-spacing-xxs">
                                            <div class="unit-left"><span class="text-base">{{lang("date")}}:</span></div>
                                            <div class="unit-body">
                                                <time>{{date('F j,Y',strtotime($post->date))}}</time>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit unit-horizontal unit-spacing-xxs">
                                            <div class="unit-left"><span class="text-base">{{lang("Posted_by")}}:</span></div>
                                            <div class="unit-body"><a class="link link-gray-light" href="blog-post.html">{{$post->user->last_name}}</a></div>
                                        </div>
                                    </li>
                                </ul>
                                <hr class="offset-top-15">
                                <div class="fr-view">
                                    <?= $post->{pick_language($post, 'content_')} ?>
                                </div>
                            </section>
                            <div class="offset-top-50 text-sm-left clearfix">
                                <div class="big text-bold text-base pull-sm-left">{{lang("share")}}:</div>
                                <ul class="list-inline pull-sm-right offset-top-0 text-sm-right">
                                    <li><a target="_blank" class="link-darkest icon icon-xxs-mod-1 fab fa-facebook" href="http://www.facebook.com/sharer/sharer.php?u={{current_url()}}"></a></li>
                                    <li><a target="_blank" class="link-darkest icon icon-xxs-mod-1 fab fa-twitter" href="https://twitter.com/intent/tweet?text=Link&url={{current_url()}}"></a></li>

                                    <li class="zalo-share-button" data-href="{{current_url()}}" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=true>
                                        <a href='#' class="link-darkest icon icon-xxs-mod-1 zalo">
                                            <i></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                        <hr class="offset-top-50">
                    </div>
                </div>
            </div>
            <div class="col-md-3 offset-top-60 offset-md-top-0">
                <?= $widget->right() ?>
            </div>
        </div>
    </div>
</section>