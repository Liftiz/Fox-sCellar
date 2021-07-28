if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('service-worker.js')
    .then((reg) => {
      // ok
      console.log('Enregistrement réussi');
    }).catch((error) => {
      // erreur
      console.log('Erreur : ' + error);
    });
  }

  