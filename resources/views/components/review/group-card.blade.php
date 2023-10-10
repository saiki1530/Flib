<div class="flex items-center justify-center flex-col">
    <div class="grid grid-cols-5 gap-6">
        @foreach ($dataListReview as $review)
            <x-review.card :data="$review" />
        @endforeach

    </div><!-- End blog posts list -->

    <div class="blog-pagination">
        {{ $dataListReview->links() }}
    </div><!-- End blog pagination -->
</div>
