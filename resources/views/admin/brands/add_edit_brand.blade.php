@extends('admin.layout.layout')
@section('content')
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Gestion de catalogue</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
          </ol>
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row g-4">
        <!--begin::Col-->
        <div class="col-md-8">
          <!--begin::Quick Example-->
          <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header"><div class="card-title">{{$title}}</div></div>
            <!--end::Header-->
              @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                  <strong>Error: </strong> {{ Session::get('error_message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                @if(Session::has('success_message'))
              <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                  <strong>Success: </strong> {{ Session::get('success_message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                @foreach($errors->all() as $error)
              <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                  <strong>Error!</strong> {!! $error !!}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endforeach
            <!--begin::Form-->
                  <form name="brandForm" id="brandForm" action="{{ isset($brand) ? route('brands.update', $brand->id) : route('brands.store') }}" method="post" enctype="multipart/form-data">@csrf
                  @if(isset($brand)) @method('PUT') @endif
                  <div class="card-body">
                      <div class="mb-3">
                          <label class="form-label" for="name">Nom de marque*</label>
                          <input type="text" class="form-control" id="name" name="name"
                                 placeholder="Enter Brand Name"
                                 value="{{ old('name', $brand->name ?? '') }}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="image">Image de marque</label>
                          <input type="file" class="form-control" id="image" name="image" accept="image/*">
                          @if(!empty($brand->image))
                              <div class="mt-2">
                                  <img src="{{ asset('front/images/brands/' . $brand->image) }}" width="50" alt="Brand Image">
                              </div>
                          @endif
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="logo">Logo de marque</label>
                          <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                          @if(!empty($brand->logo))
                              <div class="mt-2">
                                  <img src="{{ asset('front/images/logos/' . $brand->logo) }}" width="50" alt="Logo">
                              </div>
                          @endif
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="brand_discount">Remise de Marque</label>
                          <input type="text" class="form-control" id="brand_discount" placeholder="Entrer Remise de Marque"
                                 name="brand_discount" value="{{ old('brand_discount', $brand->discount ?? '') }}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="url">URL de la marque*</label>
                          <input type="text" class="form-control" id="url" name="url" placeholder="Enter Brand URL"
                                 value="{{ old('url', $brand->url ?? '') }}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="description">Description de la marque*</label>
                          <textarea class="form-control" rows="3" id="description" name="description"
                                    placeholder="Enter Description">{{ old('description', $brand->description ?? '') }}</textarea>
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="meta_title">Titre Méta</label>
                          <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title"
                                 value="{{ old('meta_title', $brand->meta_title ?? '') }}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="meta_description">Description Méta</label>
                          <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description"
                                 value="{{ old('meta_description', $brand->meta_description ?? '') }}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="meta_keywords">Mots-clés Meta</label>
                          <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords"
                                 value="{{ old('meta_keywords', $brand->meta_keywords ?? '') }}">
                      </div>
                      <div class="mb-3 d-flex align-items-center">
                          <label for="menu_status" class="me-2 mb-0">Afficher dans le menu principal</label>
                          <input type="checkbox" name="menu_status" value="1" {{ !empty($brand->menu_status) ? 'checked' : '' }}>
                      </div>
  
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Soumettre</button>
                  </div>
              </form>

            <!--end::Form-->
          </div>
          <!--end::Quick Example-->
          
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        
        <!--end::Col-->
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>
@endsection