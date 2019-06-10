Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'nova-cms-pages',
            path: '/nova-cms-pages',
            component: require('./components/Tool'),
        },
    ])
})
