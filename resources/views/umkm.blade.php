@extends('partials.main')

@section('main_content')
		<!-- ======= Breadcrumbs ======= -->
		<section class="breadcrumbs">
				<div class="container">
					<ol>
							<li><a href="/">Beranda</a></li>
							<li>{{ $parent }}</li>
					</ol>
					<h2>{{ $parent }}</h2>
				</div>
		</section><!-- End Breadcrumbs -->

		<section>
				<div class="container" data-aos="fade-up">
						<div class="row">
							<div class="col-lg-8 entries">

								@foreach ($data as $item)
										<article class="entry">
											<div class="entry-img">
												@if (blank($item->image))
													<img src="{{ url('assets/img/no-image-available.png') }}" alt="" class="img-fluid">
												@else
													<img src="{{ url($item->image) }}" alt="{{$item->name}}" class="img-fluid">
												@endif
											</div>
											<h2 class="entry-title">
												<a href="{{ route("fe.umkm.detail", $item->slug) }}">{{ ucfirst($item->name) }}</a>
											</h2>
											<div class="entry-meta">
													<ul>
															<li class="d-flex align-items-center"><i class="bi bi-pencil"></i> <a
																			href="{{ route("fe.umkm.detail", $item->slug) }}">{{ ucfirst($item->user->name) }}</a></li>
															<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
																			href="{{ route("fe.umkm.detail", $item->slug) }}"><time datetime="2020-01-01">{{ $item->updated_at->diffForHumans() }}</time></a></li>
															<li class="d-flex align-items-center"><i class="bi bi-tag"></i> <a
																			href="{{ route("fe.umkm.detail", $item->slug) }}"> {{ ucfirst($item->business_type) }}</a></li>
													</ul>
											</div>

											<div class="entry-content">
													<p> {{$item->short_desc}}</p>
													<div class="read-more">
														<a href="{{ route("fe.umkm.detail", $item->slug) }}">Selengkapnya...</a>
													</div>
											</div>

									</article><!-- End blog entry -->
								@endforeach

									<div class="blog-pagination">
											{{ $data->links() }}
									</div>

							</div><!-- End blog entries list -->

							<div class="col-lg-4">

									<div class="sidebar">

											<h3 class="sidebar-title">Search</h3>
											<div class="sidebar-item search-form">
													<form action="">
															<input type="text">
															<button type="submit"><i class="bi bi-search"></i></button>
													</form>
											</div><!-- End sidebar search formn-->

									</div><!-- End sidebar -->

							</div><!-- End blog sidebar -->
						</div>

				</div>
		</section><!-- End Blog Section -->
@endsection
