<template>
  <div>

      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Gestion des employées </h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Liste employées</a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card card-default">
          <div class="card-header">
           
           <button class="btn btn-primary"><router-link to="/creer-employee">Nouveau</router-link></button>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <div class="box-body">
              <table class="table table-bordered table-striped table">
              <thead>
              <tr>
              <th>#</th>
              <th>Nom employée</th>
              <th>Numéro CNI</th>
              <th>Date naissance</th>
              <th>Téléphone</th>
              <th>Salaire</th>
              <th>Adresse</th>
              <th>Photo</th>
              <th>Actions</th>
              </tr>
              </thead>
                
                <tbody>
                  <tr>
                  <td>1</td>
                  <td>Goudjou Blondon</td>
                  <td>000664309</td>
                  <td>02/04/1998</td>
                  <td>690 841 751</td>
                  <td>50.000 fcfa</td>
                  <td>Carrefour TPO</td>
                  <td><img src="" class="img-thumbnail" width="40px"></td>
                  <td>
                  <div class="btn-group">
                  <router-link to="/"><i class="fa fa-pencil"></i></router-link>
                  
                  <router-link to="/"><i class="fa fa-times"></i></router-link>
                    
                  </div>
                  </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Les boutons
          </div>
        </div>
  </div>
</template>


<script type="text/javascript">
  
export default {
  mounted() {
    $('.table').DataTable();
  },
}
</script>


<style type="text/css">

</style>