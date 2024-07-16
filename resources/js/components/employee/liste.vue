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
                            <li class="breadcrumb-item active"></li>
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
                <button class="btn btn-tool">
                    <router-link to="/creer-employee"
                        ><i class="fas fa-plus"></i> Nouveau</router-link
                    >
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
                            <tr
                                v-for="employee in employees"
                                :key="employee.id"
                            >
                                <td>{{ employee.id }}</td>
                                <td>{{ employee.nom_complet }}</td>
                                <td>{{ employee.email }}</td>
                                <td>{{ employee.date_naissance }}</td>
                                <td>{{ employee.telephone1 }}</td>
                                <td>{{ employee.salaire }}</td>
                                <td>{{ employee.adresse }}</td>
                                <td>
                                    <img :src="employee.photo" id="em_photo" />
                                </td>
                                <td>
                                    <!-- <div class="btn-group">
                                        <router-link to="/"
                                            class="mx-2"><i class="far fa-edit"></i
                                        class="mx-2"></router-link>
                                        <router-link to="/"
                                            ><i class="fas fa-eye"></i
                                        ></router-link>
                                        <a @click="supprimerEmployee(employee.id)"
                                            class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i
                                        ></a>
                                    </div> -->
                                    <router-link :to="{name: 'edit-employee', params:{id:employee.id} }" class="btn btn-sm btn-primary">Edit</router-link>
                                    <a
                                        @click="supprimerEmployee(employee.id)"
                                        class="btn btn-sm btn-danger"
                                        >Delete</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">   
            </div>
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
            employees: [],
            datatable: null,
        };
    },

    methods: {
        listeemployee() {
            axios
                .get("/api/employee/")
                .then(({ data }) => {
                    this.employees = data;
                    this.$nextTick(() => {
                        // Attendre que le DOM soit mis à jour
                        if (this.datatable) {
                            this.datatable.destroy(); // Détruire DataTables si elle est déjà initialisée
                        }
                        this.datatable = $(this.$refs.tables).DataTable(
                            DataTablesConfig
                        );
                    });
                })
                .catch();
        },

        supprimerEmployee(id) {
            Swal.fire({
                title: "Êtes-vous sûr de supprimer ?",
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, supprimer !",
                cancelButtonText: "Annuler",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(`/api/employee/${id}`)
                        .then(() => {
                            // Mettre à jour la liste des employés
                            this.employees = this.employees.filter(
                                (employee) => employee.id !== id
                            );
                            Swal.fire(
                                "Supprimé !",
                                "L'employé a été supprimé avec succès !",
                                "success"
                            );
                        })
                        .catch((error) => {
                            Swal.fire(
                                "Erreur !",
                                "Une erreur s'est produite lors de la suppression de l'employé.",
                                "error"
                            );
                            console.log(error.response.data.message);
                        });
                }
            });
        },
    },

    created() {
        this.listeemployee();
    },

    mounted() {
        // Ne rien faire ici pour DataTables
    },
};
</script>

<style scope>
#em_photo {
    height: 40px;
    width: 40px;
}
</style>
