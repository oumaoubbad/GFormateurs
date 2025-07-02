@extends('layouts.master')

  @section('content')   

    <div class="row ">
        <div class="col-md-12 ">
        
            <div class="card border-info">
   
            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center  "  style="color: #011745;">
                    <h2><strong>Utilisateurs</strong></h2>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5  font-weight-bold ">
            
                            <a href="{{ route('user.create') }}" class="btn btn-primary  text-white"    ><b>Ajouter Utilisateur</b></a>

                         </div>
                    </div>
            </div>
            
        </div>
      
            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
            <thead >
                    <tr>
                        <th>Id</th>
                        <th>Sexe</th>
                        <th>Nom & Prenom</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($users as $key => $user)
                <tr>
                  <th scope="row">{{ $key+=1 }}</th>
                  <th>
                 
                 @if($user->sex == "0")
                     <img src="{{asset('/img/0000.png')}}" width="35"/>
                 @else
                     <img src="{{asset('/img/000.png')}}" width="35"/>
                 @endif
               
           </th>
                  <th>{{ $user->name }}</th>
                  <th>{{ $user->email }}</th>
                  <th>@if($user->role)
                                        <span class="badge badge-danger">
                                            Admin
                                        </span>
                                  @else
                                        <span class="badge badge-secondary">
                                           User
                                        </span>
                                @endif</th>
                
                  <th>
                      
                      
                  <form method="POST" action="{{ route('user.destroy', $user->id) }}">
     
                     
                   
                    <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}"> <i class="fas fa-edit "></i> </a>
     
                    @csrf
                    @method('DELETE')
        
                    <button onclick="return myFunction();" type="submit" style=" background-color: #011745;" class="btn text-white"> <i class="fas fa-trash"></i> </button>

                   </form>

                   
                  </th>
                  
                </tr>
                @endforeach
              </tbody>
              
            </table>
       
</div>
<div class="d-flex justify-content-center">
    {{ $users->links() }} 
</div>
</div>


    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"/>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>






<script>
     $(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print' 
        ]
    } );
} );
 </script>
 @if(Session()->has('success'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: "{{Session()->get('success')}}",
        showConfirmButton: false,
        timer: 2000
});
function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
    </script>
    @endif
   
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    @endsection