$(document).ready(() => {
    $('.btn-toggle').click(e => {
         e.preventDefault()
         $(e.currentTarget).closest('.nav-wrapper').toggleClass('active')
     })
})