<?= $widget->post_header("Post") ?>

<section class="section-50 section-sm-100">
    <div class="container-wide">
        <div class="row justify-content-xs-center">
            <div class="col-md-9">
                <div class="row">
                    @foreach($list as $row)
                    <div class="col-md-4 offset-top-30">
                        <article class="post post-modern">
                            <!-- Post media-->
                            <div class="post-media text-center">
                                <img class="img-fluid" src="@if(empty($row->image)){{base_url()}}public/image/temp.png @else{{base_url()}}{{$row->image->src}}@endif" alt="">
                            </div>
                            <!-- Post content-->
                            <section class="post-content text-left">
                                <div class="post-meta pull-sm-right"><span class="text-middle icon-xxs mdi mdi-clock text-accent"></span>
                                    <time class="text-italic text-middle">{{time_elapsed_string($row->date)}}</time>
                                </div>
                                <ul class="list-inline offset-top-14 offset-sm-top-0">
                                    <li>
                                        <div class="post-tags group-xs"><a class="label-custom label-sm-custom label-rounded-custom label-primary text-normal" href="#">{{$row->user->last_name}}</a>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="icon icon-sm text-gray-light mdi mdi-video"></div>
                                    </li> -->
                                </ul>
                                <!-- Post Title-->
                                <div class="post-title">
                                    <h6 class="offset-top-25"><a class="link-default" href="{{base_url()}}index/post/{{$row->id}}">{{ $row->{pick_language($row,'title_')} }}</a></h6>
                                </div>
                                <!-- Post Body-->
                                <div class="post-body offset-top-20">
                                    <p>{{split_string($row->{pick_language($row,'content_')},50)}}</p>
                                </div>
                            </section>
                        </article>

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3 offset-top-20 offset-md-top-0">
                <?= $widget->right() ?>
            </div>
        </div>
    </div>
</section>