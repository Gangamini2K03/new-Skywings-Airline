@extends('layouts.app')

@section('content')
<section id="about" class="about">
    <div class="container">
        <div class="section-title">
            <h2>About Sky Wings</h2>
            <p>Your journey begins with us</p>
        </div>

        <div class="about-content">
            <div class="about-img" style="background: url('{{ asset('images/about.jpg') }}') center/cover; height:400px; border-radius:10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); flex: 1;"></div>
            <div class="about-text" style="flex: 1; padding-left: 30px;">
                <h3>We Make Air Travel Exceptional</h3>
                <p>Founded in 2005, Sky Wings Airlines has grown to become one of the world's leading airlines, renowned for our commitment to safety, comfort, and exceptional service.</p>
                <p>With a modern fleet of over 120 aircraft and more than 15,000 dedicated professionals, we connect passengers to over 150 destinations across six continents.</p>
                <p>Our mission is to redefine air travel by providing seamless experiences that begin long before you board and continue long after you land.</p>

                <div class="stats" style="display: flex; gap: 30px; margin-top: 20px;">
                    <div class="stat-box">
                        <h4>18+</h4>
                        <p>Years of Excellence</p>
                    </div>
                    <div class="stat-box">
                        <h4>150+</h4>
                        <p>Destinations</p>
                    </div>
                    <div class="stat-box">
                        <h4>10M+</h4>
                        <p>Passengers Annually</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Image Row -->

</section>
@endsection
