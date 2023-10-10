@extends('layouts.layoutUser-2')


@section('noidung')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

            <h2>Projects</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Projects</li>
            </ol>

        </div>
    </div>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <x-review.group-card />
        </div>
    </section>
@endsection
