<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Gestion des employées</h4>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Liste employées</a>
                            </li>
                            <li class="breadcrumb-item active">Nouveau</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="card card-default">
            <div class="card-header">
                <h4 class="card-title">Nouveau employee : <strong>{{ form.nom_complet }}</strong></h4>

                <div class="card-tools">
                    <button
                        type="button"
                        class="btn btn-tool"
                        data-card-widget="collapse"
                    >
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <form
                class="employee"
                @submit.prevent="enregistreremployee"
                enctype="multipart/form-data"
            >
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="full_name">Nom complet</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Entrez le nom complet"
                                    v-model="form.nom_complet"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.nom_complet"
                                    >{{ errors.nom_complet[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="cni_number">Numéro CNI</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Entrez le numéro CNI"
                                    v-model="form.num_cni"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.num_cni"
                                    >{{ errors.num_cni[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="birth_date"
                                    >Date de naissance</label
                                >
                                <input
                                    type="date"
                                    class="form-control"
                                    v-model="form.date_naissance"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.date_naissance"
                                    >{{ errors.date_naissance[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="phone1">Téléphone 1</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Entrez le téléphone 1"
                                    v-model="form.telephone1"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.telephone1"
                                    >{{ errors.telephone1[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="phone2">Téléphone 2</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Entrez le téléphone 2"
                                    v-model="form.telephone2"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.telephone2"
                                    >{{ errors.telephone2[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="base_salary">Salaire de base</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Entrez le salaire de base"
                                    v-model="form.salaire"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.salaire"
                                    >{{ errors.salaire[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Adresse email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Entrez l'adresse email"
                                    v-model="form.email"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.email"
                                    >{{ errors.email[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Entrez l'adresse"
                                    v-model="form.adresse"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.adresse"
                                    >{{ errors.adresse[0] }}</small
                                >
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="photo">Photo employé</label>
                                <div class="input-group">
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="image"
                                        @change="onFileChange"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.photo"
                                        >{{ errors.photo[0] }}</small
                                    >
                                    <div class="input-group-append">
                                        <img
                                            id="photo_preview"
                                            :src="form.photo"
                                            style="
                                                display: block;
                                                width: 40px;
                                                height: 40px;
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="function">Fonction</label>
                                <select
                                    class="form-control select2"
                                    style="width: 100%"
                                    v-model="form.fonction"
                                >
                                    <option selected="selected">
                                        Sélectionnez une fonction
                                    </option>
                                    <!-- Ajouter les options de fonction ici -->
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="service">Service</label>
                                <select
                                    class="form-control select2"
                                    style="width: 100%"
                                    v-model="form.service"
                                >
                                    <option selected="selected">
                                        Sélectionnez un service
                                    </option>
                                    <!-- Ajouter les options de service ici -->
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="agency">Agence affectée</label>
                                <select
                                    class="form-control select2"
                                    id="agency"
                                    name="agency"
                                    style="width: 100%"
                                >
                                    <option selected="selected">
                                        Sélectionnez une agence
                                    </option>
                                    <!-- Ajouter les options d'agence ici -->
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        Valider
                    </button>
                    <button type="button" class="btn btn-secondary">
                        Retour
                    </button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },

    data() {
        return {
            form: {
                nom_complet: "",
                email: "",
                num_cni: "",
                adresse: "",
                date_naissance: "",
                photo: "",
                telephone1: "",
                telephone2: "",
                salaire: "",
            },

            errors: {},
        };
    },

    methods: {
        onFileChange(event) {
            let file = event.target.files[0];

            if (file.size > 1048770) {
                Notification.image_validation();
            } else {
                let reader = new FileReader();
                reader.onload = (event) => {
                    this.form.photo = event.target.result;
                    console.log(this.form.photo);
                };
                reader.readAsDataURL(file);
            }
        },
        enregistreremployee() {
            axios
                .post("/api/employee", this.form)
                .then(() => {
                    this.$router.push({ name: "liste-employee" });
                    Notification.Succes();
                })
                .catch((error) => (this.errors = error.response.data.errors));
        },
    },
};
</script>

<style type="text/css"></style>
