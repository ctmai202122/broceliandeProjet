<div class="navAdmin gestion-nav">
   <ul class="nav nav-tabs navbar-dark">
      <li class="nav-item <?= $action === 'commentaire' ? 'active' : ''; ?>">
         <a class="nav-link <?= $action === 'commentaire' ? 'active' : ''; ?>" href="?action=commentaire">Modération commentaires <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?= $action === 'gestionContree' ? 'active' : ''; ?>">
         <a class="nav-link <?= $action === 'gestionContree' ? 'active' : ''; ?>" href="?action=gestionContree">Gestion contrées</a>
      </li>
      <li class="nav-item <?= $action === 'gestionLegende' ? 'active' : ''; ?>">
         <a class="nav-link <?= $action === 'gestionLegende' ? 'active' : ''; ?>" href="?action=gestionLegende">Gestion légendes</a>
      </li>
   </ul>
</div>

