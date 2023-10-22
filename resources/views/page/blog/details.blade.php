@extends('layouts.layoutUser-2')

@section('noidung')
    <x-breadcrumbs />
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col-lg-8">
                    <x-review.details-content />
                    <x-review.author />
                    <x-review.comments />
                </div>

                <div class="col-lg-4">
                    <x-review.sidebar />
                </div>
            </div>

        </div>
    </section><!-- End Blog Details Section -->
@endsection
