var menuItem = document.querySelectorAll(".item-menu");

function selectLink(){
  menuItem.forEach((item) =>
    item.classList.remove('ativo')
  )
  this.classList.add('ativo')
}

menuItem.forEach((item) =>
  item.addEventListener('click', selectLink)
)

// expandir menu
var btnExp = document.querySelector('#btn-exp')
var menuSide = document.querySelector('.menu-lateral')

btnExp.addEventListener('click', function(){
  menuSide.classList.toggle('expandir')
  var mainElement = document.querySelector('main');
  mainElement.classList.toggle('expandido');
})
/* EQUIPE MODAL */

// Obter elementos do DOM
var openBtns = document.querySelectorAll('.openModal');
var closeBtn = document.querySelector('.closeModal');
var modals = document.querySelectorAll('.modal');
var closeModalButtons = document.querySelectorAll('.closeModal, .closeModalConsultarProduto');

closeModalButtons.forEach(function(closeBtn) {
  closeBtn.onclick = function() {
    modals.forEach(function(modal) {
      modal.style.opacity = 0;
      setTimeout(function () {
          modal.style.display = 'none';
      }, 300);
    });
  };
});

openBtns.forEach(function(openBtn) {
  openBtn.onclick = function() {
    var targetModalId = openBtn.getAttribute('data-modal-target');
    var targetModal = document.getElementById(targetModalId);

    if (targetModal) {
      targetModal.style.display = 'flex';
      setTimeout(function () {
          targetModal.style.opacity = 1;
      }, 10);
    }
  };
});

closeBtn.onclick = function () {
  modals.forEach(function(modal) {
    modal.style.opacity = 0;
    setTimeout(function () {
        modal.style.display = 'none';
    }, 300);
  });
};

modals.forEach(function(modal) {
  modal.onclick = function (event) {
      if (event.target === modal) {
          modal.style.opacity = 0;
          setTimeout(function () {
              modal.style.display = 'none';
          }, 300);
      }
  };
});


/*EM BREVE*/
function mostrarAlerta() {
  alert('Em breve. Mais dúvida : contato@atual.tech - 8198975-4522');
}