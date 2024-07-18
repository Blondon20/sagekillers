<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Famille d'article</h4>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Gestion articles</a>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/liste-famille" href="#"
                                    >Liste de famille</router-link
                                >
                            </li>
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
                <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#addFamille"
                >
                    <i class="fas fa-plus"></i> Nouveau
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="box-body">
                    <table
                        class="table table-bordered table-striped"
                        ref="tables"
                    >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code famille</th>
                                <th>Intitulé famille</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Takougueu Geovanie</td>
                                <td>000664309</td>
                                <td>
                                    <router-link
                                        to=""
                                        class="btn btn-sm btn-primary"
                                        >Modifier</router-link
                                    >
                                    <router-link
                                        to=""
                                        class="btn btn-sm btn-danger"
                                        >Supprimer</router-link
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
        </div>

        <!-- Fenêtre modal pour ajouter la famille -->
        <div class="modal fade" id="addFamille" ref="addFamilleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Nouvelle famille :</h4>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                        >
                            &times;
                        </button>
                    </div>

                    <form class="famille" @submit.prevent="ajouterFamille">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Code famille :</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.code_categorie"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.code_categorie"
                                        >{{ errors.code_categorie }}</small
                                    >
                                </div>
                                <div class="form-group">
                                    <label>Intitué famille :</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.intitule_categorie"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.intitule_categorie"
                                        >{{
                                            errors.intitule_categorie[0]
                                        }}</small
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer text-right">
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Valider
                            </button>

                            <button type="reset" class="btn btn-danger" data-dismiss="modal">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    mounted() {
        // Initialiser DataTables
        $(this.$refs.tables).DataTable(DataTablesConfig);
    },

    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },

    data() {
        return {
            form: {
                code_categorie: "",
                intitule_categorie: "",
            },

            errors: {},
        };
    },
    methods: {
        ajouterFamille() {
            axios
                .post("/api/famille", this.form)
                .then(() => {
                    // Réinitialiser le formulaire
                    this.form.code_categorie = "";
                    this.form.intitule_categorie = "";
                    
                    // Fermer le modal
                    $(this.$refs.addFamilleModal).modal('hide');

                    // Afficher la notification de succès
                    Notification.Succes();
                    
                    // Rediriger vers la liste
                    this.$router.push({ name: "liste-famille" });
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>

<style scope></style>
