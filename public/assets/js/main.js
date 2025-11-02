const app = (() => {
  const AUTH_KEY = 'boardzone-auth';
  let isLogged = false;
  let activeModal = null;
  let lastFocusedElement = null;

  const focusableSelectors = [
    'a[href]',
    'button:not([disabled])',
    'textarea:not([disabled])',
    'input:not([disabled])',
    'select:not([disabled])',
    '[tabindex]:not([tabindex="-1"])'
  ];

  const qs = (selector, scope = document) => scope.querySelector(selector);
  const qsa = (selector, scope = document) => Array.from(scope.querySelectorAll(selector));

  function init() {
    isLogged = window.localStorage.getItem(AUTH_KEY) === '1';
    renderAuthSlots();
    bindGlobalEvents();
    initMobileNav();
    initMenuTabs();
    initMenuSearch();
    initTableFilters();
    updateTableButtons();
  }

  function bindGlobalEvents() {
    document.addEventListener('click', handleClickDelegation);
    document.addEventListener('keydown', handleKeydown);
    document.addEventListener('submit', handleFormSubmit, true);
  }

  function handleClickDelegation(event) {
    const loginTrigger = event.target.closest('[data-js="open-login"]');
    if (loginTrigger) {
      event.preventDefault();
      openModal('login-modal');
      return;
    }

    const registerTrigger = event.target.closest('[data-js="open-register"]');
    if (registerTrigger) {
      event.preventDefault();
      openModal('register-modal');
      return;
    }

    const closeTrigger = event.target.closest('[data-js="close-modal"]');
    if (closeTrigger && closeTrigger.closest('.modal')) {
      event.preventDefault();
      closeModal(closeTrigger.closest('.modal'));
      return;
    }

    const overlay = event.target.closest('[data-js="modal-overlay"]');
    if (overlay && overlay.closest('.modal')) {
      closeModal(overlay.closest('.modal'));
      return;
    }

    const logoutBtn = event.target.closest('[data-js="logout"]');
    if (logoutBtn) {
      event.preventDefault();
      simulateLogout();
      return;
    }
  }

  function handleKeydown(event) {
    if (event.key === 'Escape' && activeModal) {
      closeModal(activeModal);
    }

    if (event.key === 'Tab' && activeModal) {
      trapFocus(event);
    }
  }

  function handleFormSubmit(event) {
    const submitBtn = event.submitter;
    if (!submitBtn) {
      return;
    }

    if (submitBtn.matches('[data-js="simulate-login"]')) {
      event.preventDefault();
      simulateLogin();
    }

    if (submitBtn.matches('[data-js="simulate-register"]')) {
      event.preventDefault();
      simulateLogin();
    }
  }

  function simulateLogin() {
    window.localStorage.setItem(AUTH_KEY, '1');
    isLogged = true;
    renderAuthSlots();
    updateTableButtons();
    closeModal(activeModal);
  }

  function simulateLogout() {
    window.localStorage.removeItem(AUTH_KEY);
    isLogged = false;
    renderAuthSlots();
    updateTableButtons();
  }

  function renderAuthSlots() {
    const slots = qsa('[data-js="auth-slot"], [data-js="auth-slot-mobile"]');
    slots.forEach((slot) => {
      slot.innerHTML = '';
      if (isLogged) {
        const profile = document.createElement('a');
        profile.href = '#';
        profile.className = 'btn btn--ghost';
        profile.textContent = 'Profil';
        profile.setAttribute('data-js', 'profile-link');

        const logout = document.createElement('button');
        logout.type = 'button';
        logout.className = 'btn btn--primary';
        logout.textContent = 'Odhlásit';
        logout.setAttribute('data-js', 'logout');

        slot.append(profile, logout);
      } else {
        const login = document.createElement('button');
        login.type = 'button';
        login.className = 'btn btn--ghost';
        login.textContent = 'Přihlásit';
        login.setAttribute('data-js', 'open-login');

        const register = document.createElement('button');
        register.type = 'button';
        register.className = 'btn btn--primary';
        register.textContent = 'Registrovat';
        register.setAttribute('data-js', 'open-register');

        slot.append(login, register);
      }
    });
  }

  function openModal(id) {
    const modal = document.getElementById(id);
    if (!modal) {
      return;
    }
    if (activeModal && activeModal !== modal) {
      closeModal(activeModal, { restoreFocus: false });
    }
    modal.hidden = false;
    activeModal = modal;
    lastFocusedElement = document.activeElement;
    focusFirstElement(modal);
  }

  function closeModal(modal, options = { restoreFocus: true }) {
    if (!modal) {
      return;
    }
    modal.hidden = true;
    if (activeModal === modal) {
      activeModal = null;
    }
    if (options.restoreFocus && lastFocusedElement) {
      lastFocusedElement.focus({ preventScroll: true });
    }
  }

  function focusFirstElement(modal) {
    const focusable = getFocusable(modal);
    if (focusable.length > 0) {
      focusable[0].focus();
    } else {
      modal.focus();
    }
  }

  function getFocusable(container) {
    return qsa(focusableSelectors.join(','), container).filter((el) => !el.hasAttribute('disabled'));
  }

  function trapFocus(event) {
    const focusable = getFocusable(activeModal);
    if (focusable.length === 0) {
      event.preventDefault();
      return;
    }
    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    const { activeElement } = document;

    if (event.shiftKey && activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  }

  function initMobileNav() {
    const toggle = qs('[data-js="nav-toggle"]');
    const drawer = document.getElementById('mobile-nav');
    if (!toggle || !drawer) {
      return;
    }
    drawer.setAttribute('aria-hidden', 'true');

    toggle.addEventListener('click', () => {
      const expanded = toggle.getAttribute('aria-expanded') === 'true';
      setMobileNav(!expanded, toggle, drawer);
    });

    qsa('a', drawer).forEach((link) => {
      link.addEventListener('click', () => setMobileNav(false, toggle, drawer));
    });
  }

  function setMobileNav(open, toggle, drawer) {
    toggle.setAttribute('aria-expanded', String(open));
    if (open) {
      drawer.hidden = false;
      requestAnimationFrame(() => {
        drawer.setAttribute('aria-hidden', 'false');
      });
    } else {
      drawer.setAttribute('aria-hidden', 'true');
      const handleTransitionEnd = () => {
        drawer.hidden = true;
        drawer.removeEventListener('transitionend', handleTransitionEnd);
      };
      drawer.addEventListener('transitionend', handleTransitionEnd);
    }
  }

  function initMenuTabs() {
    const tabList = qs('[role="tablist"]');
    const panelsContainer = qs('[data-js="menu-panels"]');
    if (!tabList || !panelsContainer) {
      return;
    }
    tabList.addEventListener('click', (event) => {
      const tab = event.target.closest('[role="tab"]');
      if (!tab) {
        return;
      }
      event.preventDefault();
      activateTab(tab, panelsContainer);
    });

    tabList.addEventListener('keydown', (event) => {
      const keys = ['ArrowLeft', 'ArrowRight', 'Home', 'End'];
      if (!keys.includes(event.key)) {
        return;
      }
      const tabs = qsa('[role="tab"]', tabList);
      const currentIndex = tabs.indexOf(document.activeElement);
      if (currentIndex === -1) {
        return;
      }
      event.preventDefault();
      let nextIndex = currentIndex;
      if (event.key === 'ArrowRight') {
        nextIndex = (currentIndex + 1) % tabs.length;
      } else if (event.key === 'ArrowLeft') {
        nextIndex = (currentIndex - 1 + tabs.length) % tabs.length;
      } else if (event.key === 'Home') {
        nextIndex = 0;
      } else if (event.key === 'End') {
        nextIndex = tabs.length - 1;
      }
      const nextTab = tabs[nextIndex];
      nextTab.focus();
      activateTab(nextTab, panelsContainer);
    });
  }

  function activateTab(selectedTab, panelsContainer) {
    const tabs = qsa('[role="tab"]', selectedTab.parentElement);
    const category = selectedTab.dataset.category;
    tabs.forEach((tab) => {
      const isActive = tab === selectedTab;
      tab.classList.toggle('is-active', isActive);
      tab.setAttribute('aria-selected', String(isActive));
      tab.setAttribute('tabindex', isActive ? '0' : '-1');
    });

    const panels = qsa('.menu-panel', panelsContainer);
    panels.forEach((panel) => {
      const isMatch = panel.dataset.category === category;
      panel.classList.toggle('is-active', isMatch);
      panel.hidden = !isMatch;
    });
    filterMenuItems();
  }

  function initMenuSearch() {
    const searchInput = qs('[data-js="menu-search"]');
    if (!searchInput) {
      return;
    }
    searchInput.addEventListener('input', filterMenuItems);
  }

  function filterMenuItems() {
    const searchInput = qs('[data-js="menu-search"]');
    const term = searchInput ? searchInput.value.trim().toLowerCase() : '';
    const activePanel = qs('.menu-panel.is-active') || qs('.menu-panel');
    if (!activePanel) {
      return;
    }
    qsa('.menu-item', activePanel).forEach((item) => {
      const name = item.dataset.name ?? '';
      const text = item.textContent.toLowerCase();
      const matches = !term || name.includes(term) || text.includes(term);
      item.classList.toggle('is-hidden', !matches);
    });
  }

  function initTableFilters() {
    const radios = qsa('input[name="capacity"]');
    if (!radios.length) {
      return;
    }
    radios.forEach((radio) => {
      radio.addEventListener('change', filterTablesByCapacity);
    });
    const checked = radios.find((radio) => radio.checked);
    if (checked) {
      filterTablesByCapacity(checked.value);
    }
  }

  function filterTablesByCapacity(eventOrValue) {
    const value = typeof eventOrValue === 'string' ? eventOrValue : eventOrValue.target.value;
    const grid = qs('[data-js="table-grid"]');
    if (!grid) {
      return;
    }
    const cards = qsa('.table-card', grid);
    cards.forEach((card) => {
      const capacity = card.dataset.capacity;
      const show = value === 'all' || capacity === value;
      card.classList.toggle('is-hidden', !show);
      card.setAttribute('aria-hidden', String(!show));
    });
  }

  function updateTableButtons() {
    const buttons = qsa('[data-auth-action="select-table"]');
    buttons.forEach((button) => {
      if (isLogged) {
        button.disabled = false;
        button.removeAttribute('data-tooltip');
        button.textContent = 'Rezervovat';
      } else {
        button.disabled = true;
        button.setAttribute('data-tooltip', 'Přihlas se a rezervuj');
        button.textContent = 'Vybrat';
      }
    });
  }

  return {
    init
  };
})();

document.addEventListener('DOMContentLoaded', app.init);
