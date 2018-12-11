@extends('layouts.layout')

@section('content')

<!-- Grid -->
<div class="content">
	<div class="row">	
		<div class="col-sm-3">
			<!-- Detached sidebar -->
			<div class="sidebar-detached">
				<div class="sidebar sidebar-default">
					<div class="sidebar-content">

						<!-- Sidebar -->
						<div class="sidebar-category">
							<div class="category-title">
								<h5><i class="icon-filter4"></i> SARING FILTER</h5>
								<h6><b>Berdasarkan Kategori</b></h6>
							</div>

							<div class="category-content no-padding">
								<ul class="navigation navigation-alt navigation-accordion">
									<li><a href="/home/barang" class="text-info">Barang</a></li>
									<li><a href="/home/ruangan" class="text-info">Ruangan</a></li>
								</ul>
							</div>
						</div>
						<!-- /sidebar -->
					</div>
				</div>
			</div>
	        <!-- /detached sidebar -->
		</div>

		<div class="col-sm-9">
			@foreach($barangs as $product)
			<a href="/barang/{{ $product->id }}" class="panel-produk">
				<div class="panel-img">
					<img src="/uploads/{{ $product->pict }}" style="padding: 5px">
				</div>
				<div class="body-panel-produk">
					<p class="p-produk">{{ $product->name }} </p>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>
@endsection