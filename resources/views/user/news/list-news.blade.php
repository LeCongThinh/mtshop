<div class="bg-white p-4 rounded shadow-sm mb-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Tin công nghệ</h4><a href="#" class="text-primary fst-italic text-decoration-none">Xem tất cả →</a>
    </div>
    <div class="product-scroll d-flex">
        @foreach ($posts as $post)
            <div class="product-item">
                <div class="card product-card border">
                    <a href="{{ route("home.news-detail", $post->slug) }}">
                        <div class="position-relative">
                            <img class="card-img-top p-2"
                                src="{{ $post->thumbnail ? asset("storage/" . $post->thumbnail) : asset("assets/images/avatar/undefined.png") }}"
                                style="height:180px; object-fit:cover;" alt="">
                        </div>
                        <div class="card-body p-3 text-start">
                            <h6 class="mb-2">
                                <a href="#" class="mb-2 text-decoration-none text-black">{{ $post->title }}</a>
                            </h6>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>