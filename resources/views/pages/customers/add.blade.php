@extends('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('customer.list')}}" class="btn btn-primary">List</a></li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputNAme">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputNAme" placeholder="Enter name">
                    @if ($errors->has('name'))
											<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputMobile">Mobile</label>
                    <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control" id="exampleInputMobile" placeholder="Enter mobile">
                    @if ($errors->has('mobile'))
											<span class="text-danger">{{ $errors->first('mobile') }}</span>
										@endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputcontact">Contact Person</label>
                    <input type="text" name="contact_person" value="{{old('contact_person')}}" class="form-control" id="exampleInputcontact" placeholder="Enter contact person name">
                    @if ($errors->has('contact_person'))
											<span class="text-danger">{{ $errors->first('contact_person') }}</span>
										@endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    @if ($errors->has('email'))
											<span class="text-danger">{{ $errors->first('email') }}</span>
										@endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputsites">Number of sites</label>
                    <input type="number" name="number_of_sites" value="{{old('number_of_sites')}}" class="form-control" id="exampleInputsites" placeholder="Enter number of sites">
                    @if ($errors->has('number_of_sites'))
											<span class="text-danger">{{ $errors->first('number_of_sites') }}</span>
										@endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Status</label>
                    <select  name="status" class="form-control" id="exampleInputPassword1">
                      <option value="">Select Status</option>
                      <option value="0">Pending</option>
                      <option value="1">Installed</option>
                    </select>
                    @if ($errors->has('status'))
											<span class="text-danger">{{ $errors->first('status') }}</span>
										@endif
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button> <a href="{{route('customer.list')}}" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      form.submit();
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      name: {
        required: true
      },
      contact_person: {
        required: true
      },
      mobile: {
        required: true
      },
      number_of_sites: {
        required: true
      },
      status: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      name: {
        required: "Please provide a name",
      },
      contact_person: {
        required: "Please provide a contact person name",
      },
      mobile: {
        required: "Please provide a mobile",
      },
      number_of_sites: {
        required: "Please provide how many site this pearson have",
      },
      status: "Please select status"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@stop