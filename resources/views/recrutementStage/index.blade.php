@extends('layouts.master')

  @section('content')

    <div class="row ">
        <div class="col-md-12 ">

            <div class="card border-info">

            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 "  style="color: #011745;">
                        <h3><strong> Offres de Stage</strong></h3>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">



                   <a href="/recrutementStage/create" class="btn btn-primary  text-white"    ><b>Ajouter une offre de stage</b></a>

                         </div>
                    </div>
            </div>

        </div>

            <div class="card-body">
            <table id="myTable" class="table table-bordered table-stripped " >
            <thead>
                        <tr>

                            <th  style="color: #011745;">Titre</th>
                            <th  style="color: #011745;">Contenu</th>
                            <th  style="color: #011745;">Compétences</th>
                            <th  style="color: #011745;">Ville</th>
                            <th  style="color: #011745;">Crée le</th>
                            <th  style="color: #011745;">Date Limite</th>
                            <th   style="color: #011745;" >Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recrutementStages as $recrutementStage )
                        <tr>
                             <td> <b>{{Str::limit($recrutementStage->titre,15)}}</b></td>
                             <td>  {{Str::limit($recrutementStage->description,15)}}</td>
                             <td>  {{ $recrutementStage->competence}}</td>
                              <td>  {{ $recrutementStage->lieu}}</td>

                              <td>  {{ $recrutementStage->created_at}}</td>

                             <td>  {{ $recrutementStage->date_limite}}</td>

                            <td  class="text-center">







                                 <form  id='deleteForm' action="" method="DELETE">


                                     @method('DELETE')
                                     @csrf
                                     <a  onclick="deleteRecrutement()" href="{{route('recrutementStage.delete',$recrutementStage->id)}}" style=" background-color: #011745;" class="btn text-white"><i class="fas fa-trash-alt"></i></a>
                                     <a href=" {{route('recrutementStage.indexcand',$recrutementStage->id)}}" class="btn btn-secondary"><i class="fas fa-users"></i></a>

                                     <a href="{{route('recrutementStage.edit',$recrutementStage->id)}}" class="btn btn-primary"  ><i class="fas fa-edit"></i></a>

                                 </form>






                            </td>
                        </tr>
                        @endforeach
                    </tbody>

            </table>

</div>
<div class="d-flex justify-content-center">
{!! $recrutementStages->links('pagination::bootstrap-5') !!}
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
