import defaultInitSelectors from 'mdb-ui-kit/src/js/autoinit/initSelectors/free.js';
import { InitMDB } from 'mdb-ui-kit/src/js/autoinit/init.js';

const initMDBInstance = new InitMDB(defaultInitSelectors);
const initMDB = initMDBInstance.initMDB;

export default initMDB;
