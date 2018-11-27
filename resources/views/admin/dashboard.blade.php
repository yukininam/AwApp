@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="{{ url('/admin/dashboard')}}"> <i class="icon-dashboard"></i> <span class="label label-important"></span> My Dashboard </a> </li>
        <li class="bg_dg span3"> <a href="{{ url('/admin/view-categories')}}"> <i class=" icon-tags"></i><span class="label label-success"></span> categories </a> </li>
        <li class="bg_lo span3"> <a href="{{ url('/admin/view-products')}}"> <i class=" icon-th-list"></i> Products</a> </li>
      </ul>
    </div>
<!--End-Action boxes-->    


@endsection