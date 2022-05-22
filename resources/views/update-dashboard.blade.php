<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Readerstacks laravel 8 Custom login and registration </title>


<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
  <script type="text/javascript" src="index.js"></script>

<!-- Data table script -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

  <script>
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );</script>
<!-- Data table script end -->

  <style>
    /* button center style strt*/
.flex-parent {
  display: flex;
}

.jc-center {
  justify-content: center;
}
/* button center style end*/
    .error {
      color: red !important
    }
    .dash{
      height: 400px;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
      display: flex;
      color:green;
      flex-direction: column;

    }
  </style>
</head>

<body class="antialiased">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fixed Assets Ledger</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      
      <form class="d-flex">
          
          <div class="nav-item dropdown flex-row-reverse">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               @if(\Auth::check())
               {{\Auth::user()->email}}
              </a>
             <ul class="dropdown-menu me-2" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="#">Action</a></li>
               <li><a class="dropdown-item" href="#">Another action</a></li>
               <li><hr class="dropdown-divider"></li>
               <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li>
               @endif
             </ul>
        </div>
      </form>
    </div>
  </div>
</nav>

  <div class="container">
    <!-- main app container -->
    <div class="readersack">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            
            
               <!-- Show any success message -->
            <!--
              @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif -->
           <!-- Show any success message -->

            <!-- Check user is logged in -->
            @if(\Auth::check())
              
            @else
            <div class='dash '>
                 <div class='error'> You are not logged in  </div>
                 <div>  <a href="{{url('login')}}">Login</a> | <a href="{{url('register')}}">Register</a> </div>
            </div>
             
            @endif
           <!-- Check user is logged in --> 
          </div>
        </div>
      </div>
    </div>
    


<br>
                        
<!-- crd 1 srrt -->
 <div class="card bg-light mb-3" style="max-width: 70rem;"> 
   <div class="card-header">

    <!-- form strt -->
    
    @foreach($fixeddata as $data)
      <form action="{{url('/update',$data->id)}}" method="POST" enctype="multipart/form-data">
      @endforeach

          @csrf
                    
          <div class="container-fluid">
            <div class="row">

              <!-- 1st col strt --> 
                <div class="col-sm-4">                   
                  <div class="form-group row col-md-12">                 
                    <label for="input" class="col-sm-6 col-form-label">Accounts type</label>
                       <div class="col-sm-6">
                         <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="account_type">
                           <option selected>@foreach($fixeddata as $data){{$data->account_type}}@endforeach</option> 
                            @foreach($acc_type as $data) <option >{{$data->name}}</option>  @endforeach
                          </select>
                        </div>
                   </div>
 
                    <div class="form-group row col-md-12">
                       <label for="input" class="col-sm-6 col-form-label">Category name</label>
                        <div class="col-sm-6">
                          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category_name">
                           <option selected>@foreach($fixeddata as $data){{$data->category_name}}@endforeach</option>
                            @foreach($categ_name as $data) <option >{{$data->name}}</option>  @endforeach
                          </select>
                        </div>
                    </div>

                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Main accounts name </label>
                      <div class="col-sm-6">
                         <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="main_accouns_name">
                           <option selected>@foreach($fixeddata as $data){{$data->main_account_name}}@endforeach</option>
                            @foreach($control_account as $data) <option >{{$data->name}}</option>  @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Ledger accounts name</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="formGroupExampleInput" value="@foreach($fixeddata as $data){{$data->ledger_account_name}}@endforeach" name="legger_accouns_name">
                      </div>
                  </div>
                </div>
              <!-- 1st col end--> 

              <!-- 2nd col strt --> 
                 <div class="col-sm-4">
                   <div class="form-group row col-md-12">
                     <label for="input" class="col-sm-6 col-form-label">Active</label>
                       <div class="col-sm-6">
                         <input style="margin-left:auto; margin-right:auto;" class="form-check-input" type="checkbox" id="autoSizingCheck"  name="active">
                       </div>
                    </div>


                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Category code</label>
                      <div class="col-sm-6">
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category_code">
                        <option selected>@foreach($fixeddata as $data){{$data->category_code}}@endforeach</option>
                           @foreach($categ_name as $data) <option >{{$data->code}}</option>  @endforeach
                        </select>
                      </div>
                  </div> 

                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Main accounts code</label>
                      <div class="col-sm-6">
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="main_accouns_code">
                        <option selected>@foreach($fixeddata as $data){{$data->main_account_code}}@endforeach</option>
                           @foreach($control_account as $data) <option >{{$data->code}}</option>  @endforeach   
                        </select>
                       </div>
                  </div>

                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Ledger accounts code</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="formGroupExampleInput1" value="@foreach($fixeddata as $data){{$data->ledger_account_code}}@endforeach" name="Legger_accouns_code">
                      </div>
                  </div>
                </div>
              <!-- 2nd col end --> 

              <!-- 3rd col strt --> 

                <div class="col-sm-4">
                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Cost</label>
                     <div class="col-sm-6">
                      <input type="text" class="form-control" id="formGroupExampleInput1" value="@foreach($fixeddata as $data){{$data->cost}}@endforeach" name="cost">
                     </div>
                  </div>

                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Life time</label>
                      <div class="col-sm-6">
                         <input type="text" class="form-control" id="formGroupExampleInput1" value="@foreach($fixeddata as $data){{$data->life_time}}@endforeach" name="life_time">
                      </div>
                  </div>

                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Depreciation rate (%)</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="formGroupExampleInput1" value="@foreach($fixeddata as $data){{$data->depreciation_rate}}@endforeach" name="depreciation_rate">
                      </div>
                  </div>
     
                  <div class="form-group row col-md-12">
                   <label for="input" class="col-sm-6 col-form-label">Depreciation method </label>
                     <div class="col-sm-6">
                       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="depreciation_method">
                       <option selected>@foreach($fixeddata as $data){{$data->depreciation_method}}@endforeach</option>
                         @foreach($depre_methods as $data) <option value="1">{{$data->name}}</option>  @endforeach
                       </select>
                      </div>
                  </div>
  
                  <div class="form-group row col-md-12">
                    <label for="input" class="col-sm-6 col-form-label">Date of depreciation</label>
                      <div class="col-sm-6">
                        <input type="date" class="form-control" id="formGroupExampleInput" value="@foreach($fixeddata as $data){{$data->date_of_depreciation}}@endforeach" name="date_of_depreciation">
                      </div>
                  </div>

                   <div class="flex-parent jc-center">
                     <button type="submit" class="btn btn-primary btn-sm" >Update</button>
                   </div> 
                </div>
              <!-- 3nd col end --> 
            </div>
          </div>
        </div>
      </form>
     <!-- form end -->
   </div>
   <!-- card 1 end -->   

   </div>
 </div>
   
  </body>
</html>