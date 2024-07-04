class Notification {

      Succes(){
        new Noty({
          type: 'success',
          layout: 'topRight',
          text: 'Enregistrer avec succes !',
          timeout: 1000,
        }).show();
      }

      alert(){
        new Noty({
          type: 'alert',
          layout: 'topRight',
          text: 'Etes vous sûr?',
          timeout: 1000,
        }).show();
      }

      Erreur(){
        new Noty({
          type: 'alert',
          layout: 'topRight',
          text: 'Quelque chose s\'est mal passé !',
          timeout: 1000,
        }).show();
      }

      Warning(){
        new Noty({
          type: 'warning',
          layout: 'topRight',
          text: 'Oopps echouer !',
          timeout: 1000,
        }).show();
      }


}

export default Notification = new Notification();