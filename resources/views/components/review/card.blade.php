<div class="post-item border rounded-lg overflow-hidden position-relative h-100 hover:shadow-xl cursor-pointer">
    <a href="{{ route('reviews.detail', ['slug' => $reviewItem->slug]) }}" class="hover:text-[#435863]">
        <div class="post-img position-relative overflow-hidden">
            <img src="{{ $reviewItem->avt }}" class="img-fluid" alt="">
        </div>
        <div class="post-content py-2  d-flex flex-column">
            <div class="meta px-2 d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2 text-xs line-clamp-1 max-w-[100px]">{{ $reviewItem->user->name }}</span>
                </div>
                <span class="px-1 text-black-50">/</span>
                <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2 text-xs">Politics</span>
                </div>
            </div>

            <p class="text-sm px-2 mt-1 line-clamp-3">
                {{ $reviewItem->introduction }}
            </p>
        </div>
    </a>
</div>
