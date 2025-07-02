@extends('layouts.master')

  @section('content')
<style>
body, .container, .row {
  margin-top: 0 !important;
  padding-top: 0 !important;
}
  /* Conteneur principal */
  .content-header h2 {
    color: #011745;
    font-weight: 700;
  }

  /* Carte avec ombre et arrondi */
  .card-body {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgb(1 23 69 / 0.15);
    padding: 2rem;
    margin-top: 0rem;
  }

  /* Labels du formulaire */
  label {
    font-weight: 600;
    color: #011745;
  }

  /* Bouton filtre */
  .btn-a {
    background-color: #011745;
    border: none;
    font-weight: 600;
    border-radius: 0.5rem;
    transition: background-color 0.3s ease;
  }
  .btn-a:hover, .btn-a:focus {
    background-color: #004080;
  }

  /* Tableau styling */
  table.table {
    border-radius: 12px;
    overflow: hidden;
  }
  table thead {
    background-color: #011745;
    color: white;
  }
  table thead th {
    font-weight: 700;
    text-align: center;
  }
  table tbody td, table tbody th {
    vertical-align: middle !important;
    text-align: center;
  }

  /* Boutons d'action */
  .btn-a, .btn.text-white {
    transition: background-color 0.3s ease;
  }
  .btn-a:hover {
    background-color: #004080;
  }
  .btn.text-white:hover {
    background-color: #004080 !important;
  }

  /* Pagination centré */
  .pagination {
    justify-content: center;
  }
</style>
    <div class="row ">
        <div class="col-md-12 ">

            <div class="card border-info">

            <div class=" justify-content-between  align-items-center text-dark border-bottom pb-1">
            <div class="row">
					<div class="col-sm-3 text-center my-2 "  style="color: #011745;">
                        <h3><strong> Offres de Formation</strong></h3>
                    </div>
                    <div class="col-sm-9">
                         <div class="text-right mx-5 my-2 font-weight-bold ">



                   <a href="/recrutementFormation/create" class="btn btn-a  text-white"    ><b>Ajouter une offre de formation</b></a>

                         </div>
                    </div>
            </div>

        </div>

            <div class="card-body">
            <table id="myTable" class="table table-bordered table-striped table-hover">
            <thead>
                        <tr>

                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Compétences</th>
                            <th>Ville</th>
                            <th>Crée le</th>
                            <th>Date Limite</th>
                            <th >Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recrutementFormations as $recrutementFormation )
                        <tr>
                             <td> <b>{{Str::limit($recrutementFormation->titre,15)}}</b></td>
                             <td>  {{Str::limit($recrutementFormation->description,15)}}</td>
                             <td>  {{ $recrutementFormation->competence}}</td>
                              <td>  {{ $recrutementFormation->lieu}}</td>

                              <td>  {{ $recrutementFormation->created_at}}</td>

                             <td>  {{ $recrutementFormation->date_limite}}</td>

                            <td  class="text-center">







                                 <form  id='deleteForm' action="" method="DELETE">


                                     @method('DELETE')
                                     @csrf
                                     <a  onclick="deleteRecrutement()" href="{{route('recrutementFormation.delete',$recrutementFormation->id)}}" style=" background-color: #011745;" class="btn text-white"><i class="fas fa-trash-alt"></i></a>
                                     <a href=" {{route('recrutementFormation.indexcand',$recrutementFormation->id)}}" class="btn btn-secondary"><i class="fas fa-users"></i></a>


<a href="{{route('recrutementFormation.edit',$recrutementFormation->id)}}" class="btn btn-primary"  ><i class="fas fa-edit"></i></a>

                                 </form>






                            </td>
                        </tr>
                        @endforeach
                    </tbody>

            </table>

</div>
<div class="d-flex justify-content-center">
    {{ $recrutementFormations->links() }}
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
