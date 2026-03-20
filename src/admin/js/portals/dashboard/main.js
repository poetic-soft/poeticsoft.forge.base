const { dispatch } = wp.data;
import config from 'common/js/config';
import Sections from './sections/main';

dispatch(config.store_key).addPortal({
    selector:
        '.postbox .DashboardWidget.poeticsoft_heart_forge_alexandria_sections',
    target: '.Portal',
    comp: <Sections />
});
