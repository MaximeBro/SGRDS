import EventHandler from 'mdb-ui-kit/src/js/mdb/dom/event-handler.js';
import BSCarousel from 'mdb-ui-kit/src/js/bootstrap/mdb-prefix/carousel.js';
import Manipulator from 'mdb-ui-kit/src/js/mdb/dom/manipulator.js';
import { bindCallbackEventsIfNeeded } from 'mdb-ui-kit/src/js/autoinit/init.js';

/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */

const NAME = 'carousel';

const EVENT_SLIDE_BS = 'slide.bs.carousel';
const EVENT_SLID_BS = 'slid.bs.carousel';

const EXTENDED_EVENTS = [
  { name: 'slide', parametersToCopy: ['relatedTarget', 'direction', 'from', 'to'] },
  { name: 'slid', parametersToCopy: ['relatedTarget', 'direction', 'from', 'to'] },
];

class Carousel extends BSCarousel {
  constructor(element, data) {
    super(element, data);

    this._init();
    Manipulator.setDataAttribute(this._element, `${this.constructor.NAME}-initialized`, true);
    bindCallbackEventsIfNeeded(this.constructor);
  }

  dispose() {
    EventHandler.off(this._element, EVENT_SLIDE_BS);
    EventHandler.off(this._element, EVENT_SLID_BS);
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

export default Carousel;
