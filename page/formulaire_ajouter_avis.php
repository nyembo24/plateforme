            <div class="ajouter-commentaire mt-4 col-lg-5">
                <h5 class="text-center">Laisser un avis</h5>
                <form id="form-avis" method="POST" action="../models/controleur/controleur_profil_public.php">
                    <div class="mb-3">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($_GET["id"]) ?>">
                    <textarea 
                        name="commentaire" 
                        id="commentaire" 
                        class="form-control" 
                        rows="3" 
                        placeholder="Écrivez votre avis ici..." 
                        required
                    ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>