
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <ol class="carousel-indicators">
                    @if(isset($imageGalleries))
                    @foreach($imageGalleries as $key => $image)
                        <li data-target="#lightbox" data-slide-to="{{ $key }}"
                            class="{{ $key ==0 ? 'active': null }}"></li>

                    @endforeach
                        @endif
                </ol>

                <div id="lightbox" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">

                        @if(isset($imageGalleries))
                            @foreach($imageGalleries as $key => $value)
                                <div class="carousel-item {{ $key ==0 ? 'active' : null }}">
                                    <img class="d-block w-100"
                                         src="{{ asset('image/galleries/'.$image->gallery_image) }}">
                                </div>

                            @endforeach
                        @endif


                    </div>
                    <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
