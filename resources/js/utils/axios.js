import axios from 'axios'

const instance = axios.create()

instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
instance.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector(
    'meta[name="csrf-token"]'
).content

instance.interceptors.response.use(
    response => response,
    error => {
        const { status } = error.response

        // Show the user a 500 error
        if (status >= 500) {

        }

        // Handle Session Timeouts
        if (status === 401) {

        }

        // Handle Forbidden
        if (status === 403) {

        }

        // Handle Token Timeouts
        if (status === 419) {

        }

        return Promise.reject(error)
    }
)

export default instance
