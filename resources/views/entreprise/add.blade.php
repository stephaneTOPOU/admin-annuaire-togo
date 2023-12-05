@include('header.header')
@include('header.header6')
@include('header.header7')
@include('header.header3')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@include('header.header2')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@include('header.header5')
<div class="wrapper">
    @include('navBar.navbar')
        @include('sideBar.sidebar')
        <div class="content-wrapper">
            @include('content-header.content-header')
                <section class="content">
                    <div class="container-fluid">
                        <div class="">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Enrégistrer une entreprise</h3>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">{{Session::get('success') }}</div>
                                @endif
                                <form role="form" method="POST" action="{{ route('entreprise.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nom du sous-catégorie</label>
                                                    <select class="form-control select2" style="width: 100%;" name="souscategorie_id">
                                                        <option selected="selected">sous-catégorie ici</option>
                                                        @foreach ($souscategories as $souscategorie)
                                                            <option value="{{ $souscategorie->id }}">{{ $souscategorie->libelle }} - {{ $souscategorie->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Nom de l'entreprise</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le nom" name="nom" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email de l'entreprise</label>
                                                    <input type="email" class="form-control"  id="exampleInputEmail1" placeholder="Entrez le mail" name="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Adresse de l'entreprise</label>
                                                        <input type="text" class="form-control"  placeholder="Entrez l'adresse" name="adresse" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Téléphone 1 de l'entreprise</label>
                                                    <input type="tel" class="form-control"  placeholder="Entrez le numéro" name="telephone1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Téléphone 2 de l'entreprise</label>
                                                        <input type="tel" class="form-control"  placeholder="Entrez un 2ème numéro" name="telephone2" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Statu de l'entreprise</label>
                                                    <input type="text" class="form-control"  placeholder="Entrez le statu" name="statu">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Téléphone 3 de l'entreprise</label>
                                                    <input type="tel" class="form-control"  placeholder="Entrez un 3ème numéro" name="telephone3">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Téléphone 4 de l'entreprise</label>
                                                    <input type="tel" class="form-control"  placeholder="Entrez un 4ème numéro" name="telephone4">
                                                </div>
                                            </div>
                                        </div> --}}
                                        
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Itinéraire de l'entreprise</label>
                                                        <input type="text" class="form-control"  placeholder="Entrez l'itinéraire" name="itineraire">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Siteweb de l'entreprise</label>
                                                    <input type="text" class="form-control"  placeholder="Entrez le siteweb" name="siteweb">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Géoloaclisation de l'entreprise</label>
                                                    <input type="text" class="form-control"  placeholder="Entrez la géolocalisation" name="geolocalisation">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Description courte de l'entreprise</label>
                                                        <textarea class="form-control" rows="5" placeholder="Enter ..." name="descriptionCourte"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description longue de l'entreprise</label>
                                                    <textarea class="form-control" rows="5" placeholder="Enter ..." name="descriptionLonge"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck100" name="premium" value="1">
                                                    <label class="form-check-label" for="exampleCheck100">estPremium</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck101" name="basic" value="1">
                                                    <label class="form-check-label" for="exampleCheck101">estBasic</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck101" name="partenaire" value="1">
                                                    <label class="form-check-label" for="exampleCheck101">A des partenaire</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" name="honneur" value="1">
                                                    <label class="form-check-label" for="exampleCheck2">sélection d'entrprise</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Logo</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir le logo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image pharmacie </label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="photo1">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir l'image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image Couverture(Profil)</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="photo2">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir l'image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Autre image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="photo3">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir l'image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">sélection d'entreprise</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="photo4">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir l'image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="est_souscrit" value="1">
                                                    <label class="form-check-label" for="exampleCheck1">estSouscrit</label>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-2">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" name="elus" value="1">
                                                    <label class="form-check-label" for="exampleCheck3">elus</label>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck4" name="est_pharmacie" value="1">
                                                    <label class="form-check-label" for="exampleCheck4">estPharmacie</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck5" name="pharmacie_de_garde" value="1">
                                                    <label class="form-check-label" for="exampleCheck5">estDeGarde</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck6" name="a_publireportage" value="1">
                                                    <label class="form-check-label" for="exampleCheck6">apublireportage</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck7" name="a_magazine" value="1">
                                                    <label class="form-check-label" for="exampleCheck7">amagazine</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image du publireportage</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="publireportage1">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir l'image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image du magazine</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="magazineimage1">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir l'image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Vidéo</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="video">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir une vidéo </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">publireportage image 2</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="publireportage2">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir image 2</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">publireportage image 3</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="publireportage3">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir image 3</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">publireportage image 4</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="publireportage4">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir image 4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">magazine image 2</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="magazineimage2">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir image 2</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">magazine image 3</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="magazineimage3">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir image 3</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        
                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ville de l'entreprise</label>
                                                    <select class="form-control select2" style="width: 100%;" name="ville">
                                                        <option selected="selected">Ville ici</option>
                                                        @foreach ($villes as $ville)
                                                            <option value="{{ $ville->libelle }}">{{ $ville->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pays de l'entreprise</label>
                                                    <select class="form-control select2" style="width: 100%;" name="pays">
                                                        <option selected="selected">Pays ici</option>
                                                        @foreach ($pays as $pay)
                                                            <option value="{{ $pay->libelle }}">{{ $pay->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
        @include('footer.footer')
</div>
@include('footer.footer3')
@include('footer.footer6')
<script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
@include('footer.footer12')
<script src="{{ asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
@include('footer.footer13')
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
@include('footer.footer17')

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
    </script>

    <script>
        $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()
    
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
            format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
            ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
            },
            function (start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
    
        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
        
        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
    
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
    
        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
    
        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    
        })
    </script>
@include('footer.footer2')