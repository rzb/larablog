import ago from './date';

export default {
    install(Vue) {
        Vue.filter('ago', ago);
    }
}