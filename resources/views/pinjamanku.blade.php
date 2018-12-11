@extends('layouts.layout')

@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="panel panel-flat">
			<div class="panel-body">
				<div class="tabbable">
					<ul class="nav nav-tabs nav-tabs-highlight nav-justified">
						<li class="active">
							<a href="#highlighted-justified-tab1" style="font-size: 16px;" data-toggle="tab">Pending <span class="pop-up"></span></a>
						</li>
						<li>
							<a href="#highlighted-justified-tab2" style="font-size: 16px;" data-toggle="tab">Sudah diverifikasi <span class="pop-up"></span></a>
						</li>
						<li>
							<a href="#highlighted-justified-tab3" style="font-size: 16px;" data-toggle="tab">Sedang dipinjam <span class="pop-up"></span></a>
						</li>
						<li>
							<a href="#highlighted-justified-tab4" style="font-size: 16px;" data-toggle="tab">Sudah dikembalikan <span class="pop-up"></span></a>
						</li>
						<li>
							<a href="#highlighted-justified-tab5" style="font-size: 16px;" data-toggle="tab">Diblokir <span class="pop-up"></span></a>
						</li>
					</ul>
					
					<div class="tab-content">			
						<!-- Belum Bayar -->
						<div class="tab-pane active" id="highlighted-justified-tab1">
                            <div style="display:none">
                            {{!! $i = 0 }}
                            {{! $pem = \App\Peminjaman::where('user_id', Auth::user()->id)->get() }}
							@foreach(\App\Acc::where('activate', 0)->get() as $k)
								@if($od = \App\Peminjaman::where([['kode',$k->kode],['user_id', Auth::user()->id]])->get())
                                    {{! $i++ }}
                                @endif
                            @endforeach
                            </div>
							@if($i == 0)
							<div class="panel-no-orders">
								<img src="/assets/images/icon_list.png" >
								<p class="text-muted">Belum ada pesanan</p>
							</div>
							@else
							@foreach(\App\Acc::where('activate', 0)->get() as $k)
                                @if($od = \App\Peminjaman::where([['kode',$k->kode],['user_id', Auth::user()->id]])->get())
								<table class="table">
                                    <h4 style="margin-left:20px">Kode peminjaman : {{ $k->kode }}</h4>
									<thead>
										<tr>
											<th><h6>Item</h6></th>
											<th class="text-muted">Jumlah</th>
										</tr>
									</thead>
									<tbody>
										@foreach($od as $o)
										{{! $product = \App\Barang::find($o->barang_id) }}
										<tr>
											<td style="width: 50%">
												<div class="detail-cart">
													<img src="/uploads/{{ $product->pict }}" style="width: 50px; height: 50px">
													<p>{{ $product->name }} <br></p>
													<div class="clear"></div>
												</div>
											</td>
											<td>
												<p>{{ $o->jumlah }}</p>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							<hr style="border:5px solid #cccccc">
							@endif
							@endforeach
                            @endif
						</div>
						<!-- /Belum Bayar -->
						
						<!-- Belum Dikirimkan -->
						<div class="tab-pane" id="highlighted-justified-tab2">
                            <div style="display:none">
                        {{!! $i = 0 }}
                            {{! $pem = \App\Peminjaman::where('user_id', Auth::user()->id)->get() }}
                            @foreach($pem as $p)
                                @if(\App\Acc::where('kode',$p->kode)->value('activate') == 1)
                                    {{!! $i++ }}
                                @endif
                            @endforeach
                            </div>
							@if($i == 0)
							<div class="panel-no-orders">
								<img src="/assets/images/icon_list.png" >
								<p class="text-muted">Belum ada pesanan</p>
							</div>
							@else
							@foreach(\App\Acc::where('activate', 1)->get() as $k)
                                @if($od = \App\Peminjaman::where([['kode',$k->kode],['user_id', Auth::user()->id]])->get())
                                    <h4 style="margin-left:20px">Kode peminjaman : {{ $k->kode }}</h4>
								<table class="table">
									<thead>
										<tr>
											<th><h6>Item</h6></th>
											<th class="text-muted">Jumlah</th>
										</tr>
									</thead>
									<tbody>
										@foreach($od as $o)
										{{! $product = \App\Barang::find($o->barang_id) }}
										<tr>
											<td style="width: 50%">
												<div class="detail-cart">
													<img src="/uploads/{{ $product->pict }}" style="width: 50px; height: 50px">
													<p>{{ $product->name }} <br></p>
													<div class="clear"></div>
												</div>
											</td>
											<td>
												<p>{{ $o->jumlah }}</p>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							<div class="foot-table">

									<div class="msg">
										<h6 class="text-muted">Pesan : </h6>
                    					@if($k->acc_by != null)
										<span>{{ \App\Admin::find($k->acc_by)->name }}</span>
										@endif
									</div>
									<div class="foot-action">
										<div class="clear"></div>

										<div class="footer-table">
											<form action="/pdf/{{ $k->id }}" method="post">
												@csrf
												<button style="margin:0px 3px" class="btn btn-default">Download</button>                
											</form>										
										</div>					
									</div>
									<div class="clear"></div>
							</div>
							<hr style="border:5px solid #cccccc">
							@endif
							@endforeach
                            @endif
						</div>
						<!-- /Belum Dikirimkan -->


						<!-- Belum Diterima -->
						<div class="tab-pane" id="highlighted-justified-tab3">
                            <div style="display:none">
                        
                            {{!! $i = 0 }}
                            {{! $pem = \App\Peminjaman::where('user_id', Auth::user()->id)->get() }}
                            @foreach($pem as $p)
                                @if(\App\Acc::where('kode',$p->kode)->value('activate') == 2)
                                    {{!! $i++ }}
                                @endif
                            @endforeach
                            </div>
							@if($i == 0)
							<div class="panel-no-orders">
								<img src="/assets/images/icon_list.png" >
								<p class="text-muted">Belum ada pesanan</p>
							</div>
							@else
							@foreach(\App\Acc::where('activate', 2)->get() as $k)
                                @if($od = \App\Peminjaman::where([['kode',$k->kode],['user_id', Auth::user()->id]])->get())
                                    <h4 style="margin-left:20px">Kode peminjaman : {{ $k->kode }}</h4>
								<table class="table">
									<thead>
										<tr>
											<th><h6>Item</h6></th>
											<th class="text-muted">Jumlah</th>
										</tr>
									</thead>
									<tbody>
										@foreach($od as $o)
										{{! $product = \App\Barang::find($o->barang_id) }}
										<tr>
											<td style="width: 50%">
												<div class="detail-cart">
													<img src="/uploads/{{ $product->pict }}" style="width: 50px; height: 50px">
													<p>{{ $product->name }} <br></p>
													<div class="clear"></div>
												</div>
											</td>
											<td>
												<p>{{ $o->jumlah }}</p>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							<hr style="border:5px solid #cccccc">
							@endif
							@endforeach
                            @endif
						</div>
						<!-- /Belum Diterima -->

						<!-- Selesai -->
						<div class="tab-pane" id="highlighted-justified-tab4">
                            <div style="display:none">
                        
                            {{!! $i = 0 }}
                            {{! $pem = \App\Peminjaman::where('user_id', Auth::user()->id)->get() }}
                            @foreach($pem as $p)
                                @if(\App\Acc::where('kode',$p->kode)->value('activate') == 3)
                                    {{!! $i++ }}
                                @endif
                            @endforeach
                            </div>
							@if($i == 0)
							<div class="panel-no-orders">
								<img src="/assets/images/icon_list.png" >
								<p class="text-muted">Belum ada pesanan</p>
							</div>
							@else
							@foreach(\App\Acc::where('activate', 3)->get() as $k)
                                @if($od = \App\Peminjaman::where([['kode',$k->kode],['user_id', Auth::user()->id]])->get())
                                    <h4 style="margin-left:20px">Kode peminjaman : {{ $k->kode }}</h4>
								<table class="table">
									<thead>
										<tr>
											<th><h6>Item</h6></th>
											<th class="text-muted">Jumlah</th>
										</tr>
									</thead>
									<tbody>
										@foreach($od as $o)
										{{! $product = \App\Barang::find($o->barang_id) }}
										<tr>
											<td style="width: 50%">
												<div class="detail-cart">
													<img src="/uploads/{{ $product->pict }}" style="width: 50px; height: 50px">
													<p>{{ $product->name }} <br></p>
													<div class="clear"></div>
												</div>
											</td>
											<td>
												<p>{{ $o->jumlah }}</p>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							<hr style="border:5px solid #cccccc">
							@endif
							@endforeach
                            @endif
						</div>
						<!-- /Selesai -->
						
						<!-- Batal -->
						<div class="tab-pane" id="highlighted-justified-tab5">
                            <div style="display:none">
                        
                            {{!! $i = 0 }}
                            {{! $pem = \App\Peminjaman::where('user_id', Auth::user()->id)->get() }}
                            @foreach($pem as $p)
                                @if(\App\Acc::where('kode',$p->kode)->value('activate') == 4)
                                    {{!! $i++ }}
                                @endif
                            @endforeach
                            </div>
							@if($i == 0)
							<div class="panel-no-orders">
								<img src="/assets/images/icon_list.png" >
								<p class="text-muted">Belum ada pesanan</p>
							</div>
							@else
							@foreach(\App\Acc::where('activate', 4)->get() as $k)
                                @if($od = \App\Peminjaman::where([['kode',$k->kode],['user_id', Auth::user()->id]])->get())
                                    <h4 style="margin-left:20px">Kode peminjaman : {{ $k->kode }}</h4>
								<table class="table">
									<thead>
										<tr>
											<th><h6>Item</h6></th>
											<th class="text-muted">Jumlah</th>
										</tr>
									</thead>
									<tbody>
										@foreach($od as $o)
										{{! $product = \App\Barang::find($o->barang_id) }}
										<tr>
											<td style="width: 50%">
												<div class="detail-cart">
													<img src="/uploads/{{ $product->pict }}" style="width: 50px; height: 50px">
													<p>{{ $product->name }} <br></p>
													<div class="clear"></div>
												</div>
											</td>
											<td>
												<p>{{ $o->jumlah }}</p>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							<hr style="border:5px solid #cccccc">
							@endif
							@endforeach
                            @endif
						</div>
						</div>
						<!-- Batal -->
					</div>
				</div>
			</div>
		</div>							
	</div>
</div>

<script>
    function ConfirmDelete() {
      var x = confirm("Yakin Akan Membatalkan?");
      if (x)
        return true;
      else
        return false;}
</script> 
@endsection