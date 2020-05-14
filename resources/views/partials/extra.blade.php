<section class="s-extra">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <div class="col-full tags">
                <h3>Catégories</h3>
                <div class="tagcloud">
                    @foreach($categories as $category)
                        <a href="{{route('blog.category', $category->id)}}">{{$category->name}}</a>
                    @endforeach
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->

            <div class="col-full tags">
                <h3>Tags</h3>

                <div class="tagcloud">
                    @foreach($tags as $tag)
                        <a href="{{route('blog.tag', $tag->id)}}">{{$tag->name}}</a>
                    @endforeach
                </div> <!-- end tagcloud -->
            </div> <!-- end tags -->

        </div> <!-- end popular -->

        <div class="col-four md-six tab-full about">
            <h3>A propos de Blogify</h3>

            <p>
                Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
            </p>

            <ul class="about__social">
                <li>
                    <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                </li>
            </ul> <!-- end header__social -->
        </div> <!-- end about -->

    </div> <!-- end row -->

</section> <!-- end s-extra -->
