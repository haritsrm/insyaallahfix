@extends('layouts.admin-layout')

@section('content')
<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <a href="/admina/showbarang">
      <div class="w3-container w3-orange w3-padding-16">
        <div class="w3-left"><img src="/images/dbarang.png" style="width: 80px;height: 80px"></div>
        <div class="w3-right">
          <h3>{{ count(App\Barang::all()->where('type', 'barang')) }}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Data Barang </h4>
      </div>
    </div>
    </a>
    
    <div class="w3-quarter">
      <a href="/admina/showruangan">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><img src="/images/dtruangan.PNG" style="width: 80px;height: 80px"></div>
        <div class="w3-right">
          <h3>{{ count(App\Barang::all()->where('type', 'ruangan')) }}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Data Ruangan</h4>
      </div>
    </div>
    </a>
    <div class="w3-quarter">
      <a href="/admina/showadmin">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><img src="/images/admins.png" style="width: 80px;height: 80px"></div>
        <div class="w3-right">
          <h3>{{ count(App\Admin::all()->where('super', 0)) }}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Data Admin</h4>
      </div>
      </a>
    </div>
    
    <div class="w3-quarter">
      <a href="/admina/showuser">
      <div class="w3-container w3-red w3-text-white w3-padding-16">
        <div class="w3-left"><img src="/images/Users.png" style="width: 80px;height: 80px"></div>
        <div class="w3-right">
        <h3>{{ count(\App\User::all()) }}</h3>
        </div>
        <div class="w3-clear"></div>
        <h4> Data Users</h4>
      </div>
      </a>
    </div>
  </div>
  <hr>
<!--   <div class="w3-container">
    <h5>General Stats</h5>
    <p>New Visitors</p>
    <div class="w3-grey">
      <div class="w3-ontainer w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>New Users</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Bounce Rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div> -->
@endsection