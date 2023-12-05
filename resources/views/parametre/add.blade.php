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
                                    <h3 class="card-title">Ajouter un paramètres</h3>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">{{Session::get('success') }}</div>
                                @endif
                                <form role="form" method="POST" action="{{ route('parametre.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Trouver pays</label>
                                            <select class="form-control select2" style="width: 100%;" name="pays_id">
                                                <option selected="selected">Pays</option>
                                                @foreach ($pays as $pay)
                                                    <option value="{{ $pay->id }}">{{ $pay->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email </label>
                                                    <input type="email" class="form-control"  id="exampleInputEmail1" placeholder="Entrez l'email de showroomafrica" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Adresse</label>
                                                    <input type="text" class="form-control" placeholder="Entrez l'adresse de showroomafrica" name="adresse">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Géolocalisation</label>
                                                    <input type="text" class="form-control" placeholder="Entrez la géolocalisation de showroomafrica" name="geolocalisation">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Téléphone</label>
                                                    <input type="tel" class="form-control" placeholder="Entrez le numéro de showroomafrica" name="telephone1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Téléphone 2</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le numéro 2 de showroomafrica" name="telephone2">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Lien du Facebook</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le lien de Facebook showroomafrica" name="lienface">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Lien Instagram</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le lien insta de showroomafrica" name="lieninsta">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Lien de Twitter</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le lien Twitter de showroomafrica" name="lientwitter">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Lien Youtube</label>
                                                    <input type="text" class="form-control" placeholder="Entrez le lien Youtube de showroomafrica" name="lienyoutube" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Logo du header</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="logo_header">
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir le logo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Logo du footer </label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="logo_footer" >
                                                            <label class="custom-file-label" for="exampleInputFile">Choisir le logo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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