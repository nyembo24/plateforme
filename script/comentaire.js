const maxLength = 40; // Nombre de caractères affichés par défaut

// Au chargement, tronquer les commentaires longs et afficher "Voir plus"
document.querySelectorAll('.comment-text').forEach(p => {
    const fullText = p.textContent.trim();
    p.dataset.fullText = fullText;

    if(fullText.length > maxLength){
        p.textContent = fullText.slice(0, maxLength) + '...';
    } else {
        // Si le commentaire est court, cacher le bouton Voir plus
        const btn = p.nextElementSibling;
        if(btn && btn.classList.contains('btn-toggle-comment')){
            btn.style.display = 'none';
        }
    }
});

// Fonction pour basculer entre afficher plus ou moins
function toggleComment(id, btn){
    const p = document.getElementById(id);
    if(btn.textContent === 'Voir plus'){
        p.textContent = p.dataset.fullText;
        btn.textContent = 'Voir moins';
    } else {
        p.textContent = p.dataset.fullText.slice(0, maxLength) + '...';
        btn.textContent = 'Voir plus';
    }
}
