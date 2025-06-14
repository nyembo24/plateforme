let autoScroll = true; // scroll activé par défaut

// Détection du scroll manuel vers le haut
$('#chatBox').on('scroll', function() {
  let chatBox = $(this);
  let scrollTop = chatBox.scrollTop();
  let maxScroll = chatBox[0].scrollHeight - chatBox.outerHeight();

  // Si l'utilisateur scrolle vers le haut de plus de 50px, on désactive le scroll auto
  autoScroll = (scrollTop >= maxScroll - 50);
});

function loardexe() {
  $('#chatBox').load("message_jquery.php", function() {
    if (autoScroll) {
      let chatBox = $('#chatBox');
      chatBox.scrollTop(chatBox[0].scrollHeight);
    }
  });
}

// Chargement toutes les 500 ms
setInterval(loardexe, 500);