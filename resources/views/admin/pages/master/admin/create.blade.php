@extends('admin.layouts.app_dashboard')
@section("nav-master1", 'active')
@section("nav-master", 'block')
@section("nav-user", 'active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master</h3>
                <p class="text-subtitle text-muted">Admin</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section id="basic-vertical-layouts">
        <div class="row match-height">
          <div class="col-md-10 col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tambah Data</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                  <form class="form form-vertical" action="{{ route('admin.post') }}" method="POST">
                    @csrf
                    <div class="form-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="name"
                              >Name</label
                            >
                            <input
                              type="text"
                              id="name"
                              class="form-control"
                              name="name"
                              placeholder="Name"
                              value="{{ old('name') }}"
                              data-parsley-required="true"
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input
                              type="email"
                              id="email"
                              class="form-control"
                              name="email"
                              placeholder="Email"
                              value="{{ old('email') }}"
                              data-parsley-required="true"
                            />
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="password_text">Password</label>
                            <input
                              type="password"
                              id="password_text"
                              class="form-control"
                              name="password_text"
                              placeholder="Password"
                              value="{{ old('password') }}"
                              data-parsley-required="true"  
                            />
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                          <a href="{{ route('admin.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                          
                          <button
                            type="reset"
                            class="btn btn-danger me-1 mb-1"
                          >
                            Reset
                          </button>
                          <button
                            type="submit"
                            class="btn btn-primary me-1 mb-1"
                          >
                            Submit
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection