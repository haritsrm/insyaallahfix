@extends('layouts.layout')

@section('content')
<div class="container">
	<div class="bg-detail">
		<!-- foto detail produk -->
		<div class="detail-gambar">
			<div class="gambar-utama">
				<img src="/uploads/{{ $product->pict }}" id="myImg">
			</div>
		</div>
		<!-- foto detail produk -->
		<!-- form action produk -->
		<div class="form-action-produk">
			<h4>{{ $product->name }}</h4>
			<div class="clear"></div>

			<!-- <div class="actgroup">
				<h6 class="text-muted">Pilihan warna :</h6>
				@for($i=1;$i<=3;$i++)
				<div class="radio">
					<label>
						<input type="radio" name="warna" class="styled">
						Warna&nbsp;{{$i}}
					</label>
				</div>
				@endfor
			</div>
			<div class="clear"></div>
		
			<div class="actgroup">
				<h6 class="text-muted">Ukuran :</h6>
				@for($i=1;$i<=3;$i++)
				<div class="radio">
					<label>
						<input type="radio" name="ukuran" class="styled">
						Ukuran&nbsp;{{$i}}
					</label>
				</div>
				@endfor
			</div> -->
			
			<div class="clear"></div>
			<form action="/cart" method="post" style="float: left; margin-right: -40px">
			@csrf
				<div style="margin-top: 20px;">
					<h6 class="text-muted" style="float: left;">Kuantitas : </h6>
					<div class="btnGroup">
						<button type="button" onclick="btKurang()" class="btJum"><i class="icon-minus3"></i></button>
						<input type="text" autocomplete="off" onkeyup="limit()" id="jumlah" class="inJum" value="1" name="quantity">
						<button type="button" onclick="btTambah()" class="btJum"><i class="icon-plus3"></i></button>
						<p class="text-muted">Tersisa {{ $product->stock }} buah</p>
					</div>
					<script>
						@if($product->stock==0)
						document.getElementById('jumlah').value = 0;
						@endif
						function btKurang() {
							n = 0;
							n1 = eval(document.getElementById('jumlah').value);
							if (n1>1) {
								n = n1-1;
								document.getElementById('jumlah').value = n;
								document.getElementById('jumlahN').value = n;
							}
						}

						function limit(){
							n2 = parseInt({{ $product->stock }});
							n1 = eval(document.getElementById('jumlah').value);
							if ( n1 > n2 )
							{
								document.getElementById('jumlah').value = n2;
								document.getElementById('jumlahN').value = n2;
							}
							if ( n1 == 0 )
							{
								document.getElementById('jumlah').value = 1;
								document.getElementById('jumlahN').value = 1;
							}

						}

						function btTambah() {
							n = 0;
							n2 = parseInt({{ $product->stock }});
							n1 = eval(document.getElementById('jumlah').value);
							if ( n1 < n2 )
							{
								n = n1+1;
								document.getElementById('jumlah').value = n;
								document.getElementById('jumlahN').value = n;
							}
						}
					</script>
				</div>

				<input type="hidden" name="product" value="{{ $product->id }}">

				<div class="clear"></div>
				@if($product->stock > 0)
				<button type="submit" class="btnCart"><i class="icon-cart-add" style="font-size: 18px"></i> Masukkan Keranjang</button>
				@else
				<a class="btnCart"><i class="icon-cart-add" style="font-size: 18px"></i> Masukkan Keranjang</a>
				@endif
			</form>

			@if($product->stock > 0)
			<form action="/buy now" method="POST" style="float: left;margin-top: 97px">
				@csrf
				<input type="hidden" name="product" value="{{ $product->id }}">
				<input type="hidden" autocomplete="off" onkeyup="limit()" id="jumlahN" class="inJum" value="1" name="quantity">
				<input type="submit" class="btnBuy" value="Beli Sekarang">
			</form>
			@else
			<div style="float: left;margin-top: 98px">
				<a type="submit" class="btnBuy">Beli Sekarang</a>
			</div>
			@endif

			<div class="clear"></div>
				<hr>
				<div style="">
					<h6 class="text-muted">Deskripsi Produk : </h6>
					<p>{!! $product->description !!}</p>
				</div>
			</div>
		<!-- deskripsi produk -->
		<div class="clear"></div>
	</div>
</div>
@endsection