@extends('layouts.tabler') 
@section('content')
<div class="col-md-6">
    <div id="carousel-controls" class="carousel slide" data-ride="carousel">
        <div id="carousel-indicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-indicators" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-indicators" data-slide-to="1" class=""></li>
                <li data-target="#carousel-indicators" data-slide-to="2" class=""></li>
                <li data-target="#carousel-indicators" data-slide-to="3" class=""></li>
                <li data-target="#carousel-indicators" data-slide-to="4" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" alt="" src="./demo/photos/christian-joudrey-96208-1500.jpg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="" src="./demo/photos/christoph-bengtsson-lissalde-80291-1500.jpg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="" src="./demo/photos/clarisse-meyer-122804-1500.jpg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="" src="./demo/photos/cristina-gottardi-259243-1500.jpg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt="" src="./demo/photos/david-klaasen-54203-1500.jpg" data-holder-rendered="true">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-controls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
            <a class="carousel-control-next" href="#carousel-controls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
        </div>
    </div>
</div>
@endsection