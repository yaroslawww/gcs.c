Nova.booting((Vue, router, store) => {
    Vue.component('index-nova-template-field', require('./components/IndexField'))
    Vue.component('detail-nova-template-field', require('./components/DetailField'))
    Vue.component('form-nova-template-field', require('./components/FormField'))
})
