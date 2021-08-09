<button class="reset anim-menu-btn bg-contrast-higher color-bg radius-50% js-anim-menu-btn js-tab-focus" style="--anim-menu-btn-icon-size: 24px;" aria-label="Toggle menu" aria-controls="drop-menu-id">
        <i class="anim-menu-btn__icon anim-menu-btn__icon--close" aria-hidden="true"></i>
      </button>
      
      <div class="drop-menu text-sm@md js-drop-menu js-autocomplete" id="drop-menu-id" data-autocomplete-dropdown-visible-class="drop-menu--searching">
        <div class="drop-menu__inner js-drop-menu__inner">
          <!-- menu -->
          <ul class="drop-menu__list js-drop-menu__list js-drop-menu__list--main">
          <li>
              <a href="accueil.php">
              <button class="reset drop-menu__btn js-drop-menu__btn--sublist-control">
                <span> Accueil </span>
              </button>
            </a>

            </li>

            <li>
              <a href="map.php">
              <button class="reset drop-menu__btn js-drop-menu__btn--sublist-control">
                <span>Carte Vignobles</span>
              </button>
            </a>

            </li>
        
            <li>
            <a href="filtre.php">
              <button class="reset drop-menu__btn js-drop-menu__btn--sublist-control">
                <span>Vins</span>
              </button>
            </a>
            </li>
          </ul>
      

        </div>
      
        <!-- close button - mobile only -->
        <button class="reset drop-menu__close-btn js-drop-menu__close-btn js-tab-focus">
          <svg class="icon icon--xs margin-right-xxxs" viewBox="0 0 16 16" aria-hidden="true"><g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"><line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line><line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line></g></svg>
      
          <span>Close Menu</span>
        </button>
      </div>