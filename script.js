function markSelected(button) {
    // Remova a classe "selecionada" de todos os elementos da galeria
    const galleryElements = document.getElementsByClassName('gallery');
    for (let i = 0; i < galleryElements.length; i++) {
      galleryElements[i].classList.remove('selected');
    }
  
    // Adicione a classe "selecionada" ao elemento da galeria pai do botão clicado
    const form = button.form;
    const gallery = form.closest('.gallery');
    gallery.classList.add('selected');
}
/*document.getElementById('giftForm').addEventListener('submit', function(event) {
    var gift = document.getElementById('gift');
    gift.selected = true;
    window.location.href = "./pages/agradecer.html";
});
function marcarComoEscolhido(element) {
    element.classList.add('escolhido');
    element.removeEventListener('click', marcarComoEscolhido);
    window.location.href = "./pages/agradecer.html";
}*/
