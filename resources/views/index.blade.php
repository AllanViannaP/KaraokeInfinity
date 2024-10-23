@extends('template.master')

@section('title')
<title>Karaoke Infinity</title>
@endsection

@section('content')
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0  text-lg-start">
                            <h1 class="display-1 lh-1 mb-3">Karaoke Infinity.</h1>
                            <p class="lead fw-normal text-muted mb-5">Sing without limits, play your favorite songs, and enjoy endless fun with Karaoke Infinit!</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Masthead device mockup feature-->
                        <div class="masthead-device-mockup">
                            <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                        <stop class="gradient-start-color" offset="0%"></stop>
                                        <stop class="gradient-end-color" offset="100%"></stop>
                                    </linearGradient>
                                </defs>
                                <circle cx="50" cy="50" r="50"></circle></svg>
                                <svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83" xmlns="http://www.w3.org/2000/svg">
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(120.42 -49.88) rotate(45)"></rect>
                                <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03" transform="translate(-49.88 120.42) rotate(-45)"></rect></svg>
                                <svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="50"></circle></svg>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Quote/testimonial aside-->
        <aside class="text-center bg-gradient-primary-to-secondary">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                        <div class="h2 fs-1 text-white mb-4">"sample!"</div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- App features section-->
        <section id="features">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-youtube icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Play from youtube</h3>
                                    <p class="text-muted mb-0">sample</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-mic-fill icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Sing</h3>
                                    <p class="text-muted mb-0">sample!</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-github icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">More projects</h3>
                                    <p class="text-muted mb-0">Inserir Link</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Feature item-->
                                <div class="text-center">
                                <i class="bi bi-file-earmark-fill icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Documentation</h3>
                                    <p class="text-muted mb-0">Inserir Link</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection