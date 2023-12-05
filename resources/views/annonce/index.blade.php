@include('header.header')
@include('header.header5')
@include('header.header6')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <div class="wrapper">
        @include('navBar.navbar')
            @include('sideBar.sidebar')
            <div class="content-wrapper">
                @include('content-header.content-header')
                    <section class="content">
                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h3 class="card-title">Les annonces</h3>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{route('annonce.create')}}" class="btn btn-block btn-success pull-right">  Ajouter  </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>Id</th>
                                            <th>Titre</th>
                                            <th>Premier text</th>
                                            <th>Premiere image</th>
                                            <th>Deuxieme text</th>
                                            <th>Deuxieme image</th>
                                            <th>Troisieme texte</th>
                                            <th>Vidéos</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($annonces as $annonce)
                                                    <tr>
                                                        <td>{{ $annonce->id }}</td>
                                                        <td>{{ $annonce->titre }}</td>
                                                        <td>{{ $annonce->text1 }}</td>
                                                        <td><img src="https://www.showroomafrica.com/assets/images/advertorial/{{$annonce->image1}}" width="60"></td>
                                                        <td>{{ $annonce->text2 }}</td>
                                                        <td><img src="https://www.showroomafrica.com/assets/images/advertorial/{{$annonce->image2}}" width="60"></td>
                                                        <td>{{ $annonce->text3 }}</td>
                                                        <td><video src="https://www.showroomafrica.com/assets/videos/{{$annonce->image3}}" width="200" height="100" autoplay muted type="video/mp4"></video></td>
                                                        <td>{{ $annonce->created_at }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{route('annonce.edit',$annonce->id)}}" class="btn btn-default">
                                                                    <i class="fas fa-edit"></i> Modifier
                                                                </a>
                                                            </div>

                                                            <button class="btn btn-default" onclick="deleteData({{ $annonce->id }})" data-id="{{ $annonce->id }}" data-target="#default{{ $annonce->id }}">
                                                                <i class="fas fa-trash"></i> Supprimer
                                                            </button>

                                                            {{-- <form method="POST" action="{{ route('annonce.destroy',$annonce->id) }}" class="btn-group">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" href="" class="btn btn-default">
                                                                    <i class="fas fa-trash"></i> Supprimer
                                                                </button>
                                                            </form> --}}
        
                                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                            <script>

                                                            function deleteData(id) {

                                                                let table = $('#example1');

                                                                Swal.fire({
                                                                title: 'Etes-vous sûr?',
                                                                text: "Vous ne pourrez pas revenir en arrière!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Oui, supprimez!'
                                                                }).then((result) => {
                                                                if (result.isConfirmed) {

                                                                    //let url = "{{ route('annonce.destroy',['annonce' => $annonce->id]) }}"
                                                                    let url = "{{url('annonce')}}/" + id
                                                                    window.location.reload();

                                                                    console.log(url);
                                                                    $.ajax({
                                                                        type: 'POST',
                                                                        url: url,
                                                                        data: {
                                                                        _method: 'DELETE',
                                                                        _token: "{{ csrf_token() }}",
                                                                        annonce: id                                                                  
                                                                        },
                                                                        
                                                                        success: function () {
                                                                        Swal.fire(
                                                                            'Supprimé!',
                                                                            'La présentation a été supprimée.',
                                                                            'success'
                                                                        )
                                                                        table.dataTable({ ajax: "data.json"}).ajax.reload();
                                                                        
                                                                    },

                                                                        error: function(){
                                                                            alert('error');
                                                                        },
                                                                    })
                                                                }

                                                            });

                                                            }
                                                            
                                                            </script>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Titre</th>
                                                <th>Premier text</th>
                                                <th>Premiere image</th>
                                                <th>Deuxieme text</th>
                                                <th>Deuxieme image</th>
                                                <th>Troisieme texte</th>
                                                <th>Vidéos</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>
            </div>
        @include('footer.footer')
    </div>
    @include('footer.footer3')
    @include('footer.footer6')
    @include('footer.footer10') 
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
@include('footer.footer17')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@include('footer.footer2')