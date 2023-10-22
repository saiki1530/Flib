@extends('layouts.layoutUser-2')


@section('noidung')
    <!-- ======= Breadcrumbs ======= -->
    <x-breadcrumbs />
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <x-review.group-card :data="$listReview" />
        </div>
    </section>
@endsection
