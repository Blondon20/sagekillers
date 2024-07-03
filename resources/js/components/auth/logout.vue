<template>

</template>

<script type="text/javascript">
export default {
  created() {
    // Détruire le token de l'utilisateur lorsqu'il se deconnecte
    localStorage.removeItem('token');
    localStorage.removeItem('user');
    Toast.fire({
      icon: 'success',
      title: 'Vous êtes actuellement déconnecté !'
      });
      //Renvoyer l'utilisateur à la page de login
      this.$router.push({name: '/'});
  },
};
</script>

<style type="text/css"></style>
