  <section class="ftco-menu">
      <div class="container-fluid">
          <div class="row d-md-flex">
              <div class="col-lg-4 ftco-animate img f-menu-img mb-5 mb-md-0"
                  style="background-image: url({{ asset('siteasset/images/about.jpg') }});">
              </div>
              <div class="col-lg-8 ftco-animate p-md-5">
                  <div class="row">
                      <div class="col-md-12 nav-link-wrap mb-5">
                          <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist"
                              aria-orientation="vertical">
                              @foreach ($categories as $category)
                                  <a class="nav-link {{ $loop->index == 0 ? 'active' : '' }}"
                                      id="v-pills-{{ $loop->index + 1 }}-tab" data-toggle="pill"
                                      href="#v-pills-{{ $loop->index + 1 }}" role="tab"
                                      aria-controls="v-pills-{{ $loop->index + 1 }}"
                                      aria-selected="{{ $loop->index == 0 ? 'true' : 'false' }}">
                                      {{ $category->name }}
                                  </a>
                              @endforeach

                          </div>
                      </div>
                      <div class="col-md-12 d-flex align-items-center">

                          <div class="tab-content ftco-animate" id="v-pills-tabContent">

                              @foreach ($categories as $category)
                                  <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}"
                                      id="v-pills-{{ $loop->index + 1 }}" role="tabpanel"
                                      aria-labelledby="v-pills-{{ $loop->index + 1 }}-tab">
                                      <div class="row">
                                          @foreach ($category->meals as $meal)
                                              <div class="col-md-4 text-center">
                                                  <div class="menu-wrap">
                                                      <a href="#" class="menu-img img mb-4"
                                                          style="background-image: url({{ asset('uploads/meals/' . $meal->image) }});"></a>
                                                      <div class="text">
                                                          <h3><a href="#">{{ $meal->name }}</a></h3>
                                                          <p>{{ $meal->description }}</p>
                                                          <p class="price">
                                                              <span>${{ number_format($meal->price, 2) }}</span>
                                                          </p>
                                                          <p>
                                                              <a href="#"
                                                                  class="btn btn-white btn-outline-white">Add to
                                                                  cart</a>
                                                          </p>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endforeach
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
