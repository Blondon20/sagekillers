<template>
  <div>
     <div class="login-logo">
    <a href="#"><b>Sage</b>Killer</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ouverture d'un nouveau fichier</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Nom d'utilisateur">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Afficher mot de passe
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <router-link to="/forgot">Mot de passe oublier ?</router-link>
      </p>
      <p class="mb-0">
        <router-link to="/register" class="text-center">S'inscrire ici !</router-link>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
</template>

<script type="text/javascript">
export default {
  
}
</script>

<style type="text/css">

</style>