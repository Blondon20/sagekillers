<template>
    <div>
        <div class="register-logo">
            <a href="#"><b>Sage</b>Killer</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Nouveau utilisateur</p>

                <form class="user" @submit.prevent="signup">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Full name"
                            v-model="form.name"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <span class="text-danger" v-if="errors.name">{{
                            errors.name[0]
                        }}</span>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="email"
                            class="form-control"
                            placeholder="Email"
                            v-model="form.email"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <span class="text-danger" v-if="errors.email">{{
                            errors.email[0]
                        }}</span>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="Password"
                            v-model="form.password"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            class="form-control"
                            placeholder="Retype password"
                            v-model="password_confirmation"
                        />
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input
                                    type="checkbox"
                                    id="agreeTerms"
                                    name="terms"
                                    value="agree"
                                />
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button
                                type="submit"
                                class="btn btn-primary btn-block"
                            >
                                Register
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <router-link to="/" class="text-center"
                    >J'ai déjà un compte !</router-link
                >
            </div>
            <!-- /.form-box -->
        </div>
        <!-- /.card -->
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
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },

            errors: {},
        };
    },

    methods: {
        signup() {
            axios
                .post("/api/auth/signup", this.form)
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
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style type="text/css"></style>
