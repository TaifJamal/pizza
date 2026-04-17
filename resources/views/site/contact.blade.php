@extends('site.master')
@section('titel', 'Contact | ' . env('APP_NAME'))
@section('content')

    <section class="ftco-section contact-section">
        <div class="container mt-5">
            <div class="row block-9">
                <div class="col-md-4 contact-info ftco-animate">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h2 class="h4">Contact Information</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p><span>Website:</span> <a href="#">yoursite.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('site.contact_data') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Your Email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                placeholder="Subject" value="{{ old('subject') }}">
                            @error('subject')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="msg" cols="30" rows="7" class="form-control @error('msg') is-invalid @enderror"
                                placeholder="Message">{{ old('msg') }}</textarea>
                            @error('msg')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div id="map"></div>


@stop
