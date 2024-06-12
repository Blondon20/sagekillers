<template>
    <div>
        <div class="login-logo">
            <a href="#"><b>Sage</b>Killer</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Mot de passe oublier</p>

                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Entrer l'adresse mail"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="form-group">
                            <button
                                type="submit"
                                class="btn btn-primary btn-block"
                            >
                                Connexion
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <hr />
                </form>
                

                <div class="text-center">
                    <p class="mb-0">
                        <router-link to="/" class="text-center"
                            >Retourner au login!</router-link
                        >
                    </p>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</template>

<script type="text/javascript">
export default {};
</script>

<style type="text/css"></style>
