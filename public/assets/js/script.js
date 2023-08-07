console.log('hello')
// Fonction pour afficher la vidéo dans une fenêtre modale
function afficherVideo(url,title, description) {
    // Créer une balise vidéo pour afficher la vidéo
    const videoElement = document.createElement("video");
    videoElement.src = url;
    videoElement.controls = true;
    // Créer des éléments pour le titre et la description
    const titleElement = document.createElement("h2");
    titleElement.textContent = title;
    const descriptionElement = document.createElement("p");
    descriptionElement.textContent = description;
    // Créer une balise div pour contenir la vidéo
    const modalContent = document.createElement("div");
    modalContent.appendChild(videoElement);
    modalContent.appendChild(titleElement);
    modalContent.appendChild(descriptionElement);
    // Afficher la fenêtre modale avec la vidéo
    const modal = document.createElement("div");
    modal.classList.add("modal");
    modal.appendChild(modalContent);
    document.body.appendChild(modal);
    // Gérer la fermeture de la fenêtre modale lorsque l'utilisateur clique en dehors de la vidéo
    modal.addEventListener("click", function(event) {
        if (event.target === modal) {
            document.body.removeChild(modal);
        }
        });
}
// Attacher un gestionnaire d'événements de clic à la carte
const cartes = document.querySelectorAll(".carte");
cartes.forEach(function(carte) {
    carte.addEventListener("click", function() {
      const videoUrl = carte.getAttribute("data-video");
      const title = carte.getAttribute("data-title");
      const description = carte.getAttribute("data-description");
      afficherVideo(videoUrl,title,description);
    });
  });