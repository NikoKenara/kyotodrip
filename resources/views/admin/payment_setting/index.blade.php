@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Payment Gateway</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Gateways</h4>
            </div>
            <div class="card-body">
                <div class="row">

                    {{-- SECTION --}}
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#general-setting"
                                    role="tab" aria-controls="home" aria-selected="true">Paypal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                    aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                                    aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                    </div>

                    {{-- CONTENT --}}
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            @include('admin.payment_setting.sections.paypal')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
