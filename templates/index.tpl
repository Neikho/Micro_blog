<!-- si utilisateur est connecté -->
{if isset($userConnecte) and $userConnecte==1}
  <p>
    <div class="row">
      <!-- Si aucune id pour modifier est dans l'url alors on envoi vers la page qui va inserer le message en BDD !-->
      <form method="post"
      {if isset($urlId) and $urlId=='false'}
        action="messages.php"
      {/if}>
          <div class="col-sm-10">
              <div class="form-group">
                  <textarea id="message" name="message" class="form-control" placeholder="Message">{if isset($tab)}{$tab}{/if}</textarea>
              </div>
          </div>
          <div class="col-sm-2">
              <button type="submit" class="btn btn-success btn-lg">
                  <!-- Si un id est passé en get on affiche le bouton modifier sinon envoyer !-->
                {if isset($urlId) and $urlId=='false'}
                  Envoyer
                {else}
                  Modifier
                {/if}
              </button>
          </div>
      </form>
    </div>
  </p>
  <p id="previsu"></p>
{/if}
{$compteur = 0}
{if isset($tabGlobal) and !empty($tabGlobal)}
  {foreach from=$tabGlobal item=liste }
        <!-- Affichage des infos et du message !-->
    <blockquote>
      {$tabGlobal[$compteur][1]} , message écrit par: {$tabGlobal[$compteur][2]} le: {$liste[2]|date_format:"%A, %B %e, %Y"}
      <!-- <span class="infostemps">
      <br/>
      <?php
          $crea = $data['creation'];
          echo "Crée le : ".date('d/m/Y', $crea)." par ".$data['pseudo'];
      ?>
      <br/>
      <?php
          echo " Modifié le : ".date('H:i:s', $crea);
      ?>
    </span> -->

      <!-- Si user connecte alors on afficher les boutons de suppression de modification !-->
      {if isset($userConnecte) and $userConnecte==1}
          <a href="index.php?idsupp={$tabGlobal[$compteur][0]}" class="bout"><button class="btn btn-danger btn-sm">Supprimer</button></a>
          <a href="index.php?id={$tabGlobal[$compteur][0]}" class="bout"><button class="btn btn-warning btn-sm">Modifier</button></a>
      {/if}
    </blockquote>
    {$compteur = $compteur + 1}
  {/foreach}
{else}
  Tableau vide
{/if}

<!-- pagination -->
<div id="pagination">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <li>
        <a href="index.php?p={$pagePrec}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      {for $page=1 to $pagination}
        <li><a href="index.php?p={$page}">{$page}</a></li>
      {/for}
      <li>
        <a href="index.php?p={$pageSuiv}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>


