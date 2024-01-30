import EventHandler from 'mdb-ui-kit/src/js/mdb/dom/event-handler.js';
import BSAlert from 'mdb-ui-kit/src/js/bootstrap/mdb-prefix/alert.js';
import Manipulator from 'mdb-ui-kit/src/js/mdb/dom/manipulator.js';
import { bindCallbackEventsIfNeeded } from 'mdb-ui-kit/src/js/autoinit/init.js';

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

const NAME = 'alert';

const EVENT_CLOSE_BS = 'close.bs.alert';
const EVENT_CLOSED_BS = 'closed.bs.alert';

const EXTENDED_EVENTS = [{ name: 'close' }, { name: 'closed' }];

class Alert extends BSAlert {
  constructor(element, data = {}) {
    super(element, data);

    this._init();
    Manipulator.setDataAttribute(this._element, `${this.constructor.NAME}-initialized`, true);
    bindCallbackEventsIfNeeded(this.constructor);
  }

  dispose() {
    EventHandler.off(this._element, EVENT_CLOSE_BS);
    EventHandler.off(this._element, EVENT_CLOSED_BS);
    Manipulator.removeDataAttribute(this._element, `${this.constructor.NAME}-initialized`);

    super.dispose();
  }

  // Getters
  static get NAME() {
    return NAME;
  }

  // Private
  _init() {
    this._bindMdbEvents();
  }

  _bindMdbEvents() {
    EventHandler.extend(this._element, EXTENDED_EVENTS, NAME);
  }
}

export default Alert;
