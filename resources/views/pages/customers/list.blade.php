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
                <div class="col-md-3 search-bar">
                  <form action="">
                  <input  name="search_keyword" class="form-control" id="exampleInputPassword1" placeholder="Search" onchange="this.form.submit()" value="{{$search_keyword}}">
                  </form>
                  
                </div>
                <div class="col-md-3 sorting-bar">
                  <form action="">
                  <select  name="sortby" class="form-control" id="exampleInputPassword1" onchange="this.form.submit()">
                      <option value="">Select Status</option>
                      <option value="0" {{($sort == '0') ? 'selected' : ''}}>Pending</option>
                      <option value="1" {{($sort == '1') ? 'selected' : ''}}>Installed</option>
                  </select>
                  </form>
                  
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
									    <th>@sortablelink('name', 'Customer name')</th>
									    <th>@sortablelink('contact_person', 'Contact person')</th>
									    <th>@sortablelink('mobile', 'Mobile phone number')</th>
									    <th>@sortablelink('email', 'Email address')</th>
									    <th>@sortablelink('number_of_sites', 'No. of sites')</th>
									    <th>@sortablelink('status', 'Status')</th>
									    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $row)
                    <tr>								
                      <td>{{$row->name ? ucfirst($row->name) : 'N/A' }}</td>
                      <td>{{$row->contact_person ? $row->contact_person : 'N/A' }}</td>
                      <td>{{$row->mobile ? $row->mobile : 'N/A' }}</td>
                      <td>{{$row->email ? $row->email : 'N/A' }}</td>
                      <td>{{$row->number_of_sites ? $row->number_of_sites : 'N/A' }}</td>
                      <td>
                      @if($row->status == 0)
                        <p class="text-danger"><i class="fas fa-circle"></i> Pending</p>
                      @else
                        <p class="text-success"><i class="fas fa-circle"></i> Installed</p>
                      @endif
                      </td>
                      <td>
                      <a class="anchorLess">
                        <a title="Click to Change Password" class="anchorLess" href="{{route('customer.view',[$row->id])}}" ><i class="fas fa-eye success" aria-hidden="true" ></i></a>
                        <a title="Click to Delete" class="anchorLess delete-confirm text-danger" href="{{route('customer.delete',$row->id)}}" ><i class="fas fa-trash danger" aria-hidden="true" ></i></a>
                      </a>    
                      </td>
                    </tr>
                    @endforeach
                    @if ($data->count() == 0)
                    <tr>
                      <td colspan="7" class="text-center text-dabger">No company to display.</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              <div class="clearfix mt-20">
                {{ $data->appends(request()->except('page'))->links() }}
              </div>
              </div>
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
