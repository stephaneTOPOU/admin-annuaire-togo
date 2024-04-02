@include('header.header')
@include('header.header2')
@include('header.header3')
@include('header.header4')
@include('header.header5')
@include('header.header6')
@include('header.header7')
@include('header.header8')
<div class="wrapper">
  @include('navBar.navbar')
  @include('sideBar.sidebar')
  <div class="content-wrapper">
    @include('content-header.content-header')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $nbre_cat }}</h3>
                <p>Catégories</p>
              </div>
              <div class="icon">
                <i class="fas fa-th-large"></i>
              </div>
              <a href="{{ route('category.index') }}" class="small-box-footer">Détail<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $nbre_sousCat }}</h3>

                <p>Sous - catégories</p>
              </div>
              <div class="icon">
                <i class="fas fa-city"></i>
              </div>
              <a href="{{ route('sub-category.index') }}" class="small-box-footer">Détail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $nbre_entreprise }}</h3>

                <p>Entreprises</p>
              </div>
              <div class="icon">
                <i class="far fa-building"></i>
              </div>
              <a href="{{ route('entreprise-valide.index') }}" class="small-box-footer">Détail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $nbre_phar }}</h3>

                <p>Pharmacies</p>
              </div>
              <div class="icon">
                <i class="fas fa-clinic-medical"></i>
              </div>
              <a href="{{ route('pharmacie-garde.index') }}" class="small-box-footer">Détail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
    </section>
    <!-- /.content -->

    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
            <a href="{{ route('parametre.index') }}">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Paramètres</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          {{-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> --}}
          <div class="col-12 col-sm-6 col-md-6">
            <a href="{{ route('admin.index') }}">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Admins</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
    </section>
  </div>
  @include('footer.footer')
</div>
@include('footer.footer3')
@include('footer.footer4')
@include('footer.footer5')
@include('footer.footer6')
@include('footer.footer7')
@include('footer.footer8')
@include('footer.footer9')
@include('footer.footer10')
@include('footer.footer11')
@include('footer.footer12')
@include('footer.footer13')
@include('footer.footer14')
@include('footer.footer15')
@include('footer.footer16')
@include('footer.footer17')
@include('footer.footer2')


