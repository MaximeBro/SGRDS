/**
 * --------------------------------------------------------------------------
 * Bootstrap util/component-functions.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 * --------------------------------------------------------------------------
 */

import EventHandler from 'mdb-ui-kit/src/js/bootstrap/mdb-prefix/dom/event-handler.js';
import SelectorEngine from 'mdb-ui-kit/src/js/bootstrap/mdb-prefix/dom/selector-engine.js';
import { isDisabled } from 'mdb-ui-kit/src/js/bootstrap/mdb-prefix/util/index.js';

const enableDismissTrigger = (component, method = 'hide') => {
  const clickEvent = `click.dismiss${component.EVENT_KEY}`;
  const name = component.NAME;

  EventHandler.on(document, clickEvent, `[data-mdb-dismiss="${name}"]`, function (event) {
    if (['A', 'AREA'].includes(this.tagName)) {
      event.preventDefault();
    }

    if (isDisabled(this)) {
      return;
    }

    const target = SelectorEngine.getElementFromSelector(this) || this.closest(`.${name}`);
    const instance = component.getOrCreateInstance(target);

    // Method argument is left, for Alert and only, as it doesn't implement the 'hide' method
    instance[method]();
  });
};

export { enableDismissTrigger };
