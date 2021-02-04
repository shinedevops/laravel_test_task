@extends('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('customer.add')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Customer</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
					<div class="flash-message">
						@if(session()->has('status'))
							@if(session()->get('status') == 'error')
								<div class="alert alert-danger  alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									{{ session()->get('message') }}
								</div>
							@endif
							@if(session()->get('status') == 'success')
								<div class="alert alert-success  alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									{{ session()->get('message') }}
								</div>
							@endif
						@endif
					</div> <!-- end .flash-message -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3>View Customer</h3>
              </div>
              
              <form role="form" id="quickForm" method="post" action="">
              <!-- /.card-header -->
                <div class="card-body">
                   @csrf
                  <div class="form-group">
                    <label for="exampleInputNAme">Name: </label>
                    {{$record->name}}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputMobile">Mobile: </label>
                    
                    {{$record->mobile}}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact Person: </label>
                    
                    {{$record->contact_person}}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address: </label>
                    
                    {{$record->email}}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsites">Number of sites: </label>
                    
                    {{$record->number_of_site}}
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status: </label>
                    
                    {{$record->status == 0 ? 'Pending' : 'Installed'}}
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="{{route('customer.list')}}" class="btn btn-danger">Cancel</a>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection