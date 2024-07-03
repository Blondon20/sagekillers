<template>
<div>
    <div class="login-box">
              <div class="login-logo">
            <a href="#"><b>Sage</b>Killer</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Ouverture d'un nouveau fichier</p>

                <form class="user" @submit.prevent="login">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Nom d'utilisateur"
                                v-model="form.email"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-danger" v-if="errors.email">{{
                            errors.email[0]
                        }}</span>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                class="form-control"
                                placeholder="Mot de passe"
                                v-model="form.password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <span class="text-danger" v-if="errors.password">{{
                            errors.password[0]
                        }}</span>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" />
                                <label for="remember">
                                    Afficher mot de passe
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button
                                type="submit"
                                class="btn btn-primary btn-block"
                            >
                                Valider
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <router-link to="/forgot"
                        >Mot de passe oublier ?</router-link
                    >
                </p>
                <p class="mb-0">
                    <router-link to="/register" class="text-center"
                        >S'inscrire ici !</router-link
                    >
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</div>
</template>

<script type="text/javascript">
export default {
    created() {
        // Si l'user est déjà connecter, impossible de retourner au login
        if (User.loggedIn()) {
            this.$router.push({ name: "home" });
        }
    },

    data() {
        return {
            form: {
                email: null,
                password: null,
            },

            errors: {},
        };
    },

    methods: {
        login() {
            axios
                .post("/api/auth/login", this.form)
                .then((res) => {
                    User.responseAfterLogin(res);

                    // Afficher le message de succes
                    Toast.fire({
                        icon: "success",
                        title: "Vous êtes connecté avec succès !",
                    });

                    //Ouverture page d'accueil après authentification
                    this.$router.push({ name: "home" });
                })
                .catch((error) => (this.errors = error.response.data.errors))
                .catch(
                    Toast.fire({
                        icon: "warning",
                        title: "Adresse mail ou mot de passe incorrecte",
                    })
                );
        },
    },
};
</script>

<style type="text/css"></style>
